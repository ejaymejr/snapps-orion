<?php

class individualLeaveAddAction extends SnappsAction
{
    var $preCount = 0;
    
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Personalized Leave Credits ');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $redir = $this->_G('redirect');
        $this->record = HrIndividualLeavePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new HrIndividualLeave();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('description',  $this->record->getDescription());
            $this->_S('status',      'A');
            $this->_S('update_current', true);
        }
        
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $emp = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
            $lev = HrLeavePeer::retrieveByPK($this->_G('leave_id'));
            
            $this->record->setEmployeeNo($emp->getEmployeeNo());
            $this->record->setName($emp->getName());
            $this->record->setHrLeaveId($this->_G('leave_id'));
            $this->record->setLeaveType($lev->getLeaveType());
            $this->record->setDescription($lev->getDescription());
            $this->record->setDaysEntitled($this->_G('days_entitled'));            
            $this->record->setStatus($this->_G('status'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());
            $this->record->setFiscalYear(sfConfig::get('fiscal_year'));  
            $this->record->save();
            HrLib::LogThis($this->_U(),  'Update Individual Leave', '', $this->getModuleName().'/'.$this->getActionName() );
            if ($this->_G('update_current'))
            {
                $req  = new PayComputeExtra();  //request object computecredits
                $req->UpdateFromPersonalizedLeave($this->_G('employee_no'), sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
                $req->UpdateConsumedLeave($this->_G('employee_no'), sfConfig::get('fiscal_year'), $this->getUser()->getUsername(), $lev->getLeaveType());
            }
            $this->_SUF('Record <b>' . $emp->getName() .' - '. $lev->getLeaveType() . '</b> saved.');
            $this->redirect('maintenance/individualLeaveSearch?hIDs[]=' . $this->record->getId());
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
