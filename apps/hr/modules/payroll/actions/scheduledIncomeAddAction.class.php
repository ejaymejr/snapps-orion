<?php

class scheduledIncomeAddAction extends SnappsAction
{
    var $preCount = 0;
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Scheduled Income');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = PayScheduledIncomePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new PayScheduledIncome();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
//            $this->_S('sdate',      DateUtils::GetThisMonthStartDate() );
//            $this->_S('edate',      DateUtils::GetNextMonthsEndDate(1)   );
            $curMonth = HrCurrentMonthPeer::GetCurrent();
            $this->_S('sdate', $curMonth['start']);
            $this->_S('edate', $curMonth['end']);
            
            $this->_S('status',      0);
            $this->_S('tax_percentage' ,      100);
            $this->_S('frequency',  PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
            $this->_S('tot_amt_received', $this->record->getTotAmtReceived());
        }
        
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->_S('name', HrEmployeePeer::GetNamebyEmployeeNo($this->_G('employee_no')));
            $this->_S('description', PayAccountCodePeer::GetDescriptionbyAcctCode($this->_G('acct_code')));
            if ($this->_G('save'))
            {
            	$xtraDesc = '';
            	if ($this->_G('acctDesc') ){
            		$xtraDesc = ' ('. $this->_G('acctDesc') .') ';
            	}
                $this->record->setEmployeeNo($this->_G('employee_no'));
                $this->record->setName($this->_G('name'));
                $this->record->setTotalAmount(round($this->_G('total_amount'), 2));
                $this->record->setScheduledAmount(round($this->_G('total_amount'), 2));            
                $this->record->setTaxableAmount(round($this->_G('total_amount'), 2));
                $this->record->setFrequency($this->_G('frequency'));
                $this->record->setTaxPercentage(round(100,0));
                $this->record->setAcctCode($this->_G('acct_code'));         //2-overtime
                $this->record->setDescription($this->_G('description') . $xtraDesc );
                $this->record->setFromDate($this->_G('sdate'));
                $this->record->settoDate($this->_G('edate'));
                $this->record->setStatus($this->_G('status'));
                $this->record->setEntryType('USER');
                $this->record->setDateModified(DateUtils::DUNow());
                $this->record->setModifiedBy($this->_U());            
                $this->record->save();
                HrLib::LogThis($this->_U(),  'MANUAL INCOME ENTRY', '', $this->getModuleName().'/'.$this->getActionName() );
                $this->_SUF('Record <b>' . $this->record->getAcctCode() . '</b> saved.');
                $this->redirect('payroll/scheduledIncomeSearch?hIDs[]=' . $this->record->getId());
            }
        }
    }
    
    public function validateBasicPayAdd()
    {
        $this->preExecute();
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            return true;            
        }
        $localError = 0;
        return ($localError == 0);        
    }
        
    public function handleErrorBasicPayAdd()
    {
        return sfView::SUCCESS;
    }
    
        
}