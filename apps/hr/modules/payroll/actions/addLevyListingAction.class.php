<?php

class addLevyListingAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Levy Listing');
            $this->preCount++;
        }
        
        $this->id = $this->_G('id');
        $id = $this->id;
        $this->record = PayEmployeeLevyPeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new PayEmployeeLevy();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('levy_rate',  0);
            $this->_S('levy_ded',  0);
            $this->_S('period_code',  $this->_G('period_code'));
            $this->_S('id',  $this->id);
        }
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->record->setEmployeeNo($this->_G('employee_no'));
            $this->record->setName(HrEmployeePeer::GetNamebyEmployeeNo( $this->_G('employee_no') ));
            $this->record->setCompany( HrEmployeePeer::GetCompanyByEmployeeNo( $this->_G('employee_no') ));
            $this->record->setTeam($this->_G('team'));
            $this->record->setLevyRate($this->_G('levy_rate'));
            $this->record->setLevyDed($this->_G('levy_ded'));
            $this->record->setPeriodCode($this->_G('period_code'));
            $this->record->setAmount($this->_G('levy_rate') + $this->_G('levy_ded'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();
            $this->_SUF('Record <b>' . $this->record->getEmployeeNo() . '</b> saved.');
            $this->redirect('payroll/levyListing?period_code=' . $this->record->getPeriodCode().'&HID='.$this->record->getId() );
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