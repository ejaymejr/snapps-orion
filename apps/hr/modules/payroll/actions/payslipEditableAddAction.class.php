<?php

class payslipEditableAddAction extends SnappsAction
{
    var $preCount = 0;
    public function preExecute()
    {
        if (!$this->preCount) {
            $this->preCount++;
        }
        
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('amount',           ''  );
            $this->_S('inc_exp',          '1'  );
            $this->_S('bank_cash',        'BANK'  );
        }
        
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {	
        	//*********** EDITING
	        if ($this->_G('id')):
		        $id= $this->_G('id');
		        $this->record = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
		        $empData = HrEmployeePeer::GetDatabyEmployeeNo($this->record->getEmployeeNo());
			    //*********** EDITING
		        $company = $this->record->getCompany();
		        $frequency = $this->record->getFrequency();
		        $period = $this->record->getPeriodCode();
		        $race = $this->record->getRace();
		    endif;
		    
		    //-------------------------- if empno is passed as parameter then its adding
			if ($this->_G('archiveID')):
		    	$archive = PayEmployeeLedgerArchivePeer::retrieveByPK($this->_G('archiveID'));
		    	$this->record = new PayEmployeeLedgerArchive();
		        $this->record->setDateCreated(DateUtils::DUNow());
	            $this->record->setCreatedBy($this->_U()); 
	            $empData = HrEmployeePeer::GetDatabyEmployeeNo($archive->getEmployeeNo());
	            $company = $archive->getCompany();
		        $frequency = $archive->getFrequency();
		        $period = $archive->getPeriodCode();
		        $race = $empData->getRace();
	        endif;

		    
        	$amt   = ($this->_G('inc_exp') == '2' ? $this->_G('amount') * -1 : $this->_G('amount') );
			$cpfer = ($this->_G('inc_exp') == '2' ? $this->_G('cpf_er') * -1 : $this->_G('cpf_er') );
        	$proc  =  ($this->_G('inc_exp') == '2'? 'I' : 'D');
        	$acctDesc = PayAccountCodePeer::GetDescriptionbyAcctCode($this->_G('acct_code') );
        	$adddesc   = $this->_G('add_desc');
        	$desc  =  str_replace($acctDesc . ' - Manual Entry', '', $adddesc );
        	$desc  .= ' '. $acctDesc. ' - Manual Entry';
			
        	$this->record->setEmployeeNo($empData->getEmployeeNo());
        	$this->record->setName($empData->getName());
        	$this->record->setCompany($company);
        	$this->record->setFrequency($frequency);
        	$this->record->setPeriodCode($period);
        	$this->record->setAcctCode($this->_G('acct_code'));
        	$this->record->setDescription($desc);
        	$this->record->setAmount($amt);
        	$this->record->setIncomeExpense($this->_G('inc_exp'));
        	$this->record->setAcctSource('M');
        	$this->record->setProcessedAs($proc);
//        	$this->record->setCpfEr($cpfer);
//        	$cpftot = ($this->_G('cpf_er')? $this->record->getAmount() + $this->record->getCpfEr() : 0 );
//        	$this->record->setCpfTotal($cpftot);
        	$this->record->setRace($race);
        	$this->record->setBankCash($this->_G('bank_cash'));
        	$this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U()); 
        	$this->record->save();
        	HrLib::LogThis($this->_U(),  'MANUAL UPDATE OF PAYROLL ENTRY', '', $this->getModuleName().'/'.$this->getActionName() );
            $this->_SUF('Record <b>' . $this->record->getName() . '</b> saved.');
            $this->redirect('payroll/payslipEntry?id=' . $this->record->getId().'&HID='.$this->record->getId());
        }
    }
    
    public function validatePayslipEditableAdd()
    {
        $this->preExecute();
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            return true;            
        }
        $localError = 0;
        return ($localError == 0);        
    }
        
    public function handleErrorPayslipEditableAdd()
    {
        return sfView::SUCCESS;
    }
    
        
}
