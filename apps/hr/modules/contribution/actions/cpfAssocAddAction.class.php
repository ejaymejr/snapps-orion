<?php

class cpfAssocAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Cpf Association Contribution');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = CpfAssocTablePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new CpfAssocTable();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
//            $this->_S('description',  $this->record->getDescription());
//            $this->_S('remarks',      $this->record->getRemarks());
        }
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $amt = (strtoupper($this->_G('max')) == 'MAX') ? 1000000000 : $this->_G('max');
            $this->record->setAcctCode($this->_G('acct_code'));
            $this->record->setRace($this->_G('race'));            
            $this->record->setMin($this->_G('min'));
            $this->record->setMax($amt);
            $this->record->setAmount($this->_G('amount'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();
            HrLib::LogThis($this->_U(), 'New/Change CPF Association', '', $this->getModuleName().'/'.$this->getActionName() );
            //HrLib::LogThis($this->_U(), 'New/Change CPF Association', 'MBMF, CDAC, Sinda', $this->getActionName() .'/' . $this->getModuleName());
            $this->_SUF('Record <b>' . $this->record->getAcctCode() . '</b> saved.');
            $this->redirect('contribution/cpfAssocSearch?hIDs[]=' . $this->record->getId());
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