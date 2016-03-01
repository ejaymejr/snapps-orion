<?php

class acctCodeAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Account Code');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = PayAccountCodePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new PayAccountCode();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('description',  $this->record->getDescription());
            $this->_S('remarks',      $this->record->getRemarks());
            $this->_S('cpf', 'YES');
        }
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->record->setAcctCode($this->_G('acct_code'));
            $this->record->setDescription($this->_G('description'));
            $this->record->setRemarks($this->_G('remarks'));
            $this->record->setCpf($this->_G('cpf'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();
            HrLib::LogThis($this->_U(),  'Update Account Coding', '', $this->getModuleName().'/'.$this->getActionName() );
            $this->_SUF('Record <b>' . $this->record->getAcctCode() . '</b> saved.');
            $this->redirect('maintenance/acctTypeSearch?hIDs[]=' . $this->record->getId());
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