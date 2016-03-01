<?php

class teamMemberAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', 'Team Grouping' . ' &raquo; Add Team Member');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = HrEmployeePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
        }
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->record->setTeam($this->_G('team'));
            $this->record->setDateModified(DateUtils::GetNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();
            HrLib::LogThis($this->_U(),  'Update Team Member', '', $this->getModuleName().'/'.$this->getActionName() );
            $this->_SUC('Record <b>' . $this->record->getEmployeeNO() . '</b> saved in <b>' . $this->record->getTeam() .' </b>Team.');
            //$this->redirect('maintenance/acctTypeSearch?hIDs[]=' . $this->record->getId());
            
        }
    }
    
    public function validateTeamMemberAdd()
    {
        $this->preExecute();
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            return true;            
        }
        $localError = 0;
        return ($localError == 0);        
    }
        
    public function handleErrorTeamMemberAdd()
    {
        return sfView::SUCCESS;
    }
    
}