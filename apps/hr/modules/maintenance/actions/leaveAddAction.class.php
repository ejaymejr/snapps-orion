<?php

/**
 * maintenance actions.
 *
 * @package    snapps
 * @subpackage maintenance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class leaveAddAction extends SnappsAction
{
    var $preCount = 0;

    public function preExecute()
    {
        if (!$this->preCount) 
        {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Define New Leave');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = HrLeavePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new HrLeave();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('remarks',  'Situational');
            $this->_S('status',   HrLeavePeer::FLAG_STATUS_ACTIVE);
        }

    }  
        
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
            $this->record->setLeaveType($this->_G('leave_type') );
            $this->record->setDescription($this->_G('description') );
            $this->record->setDaysEntitled($this->_G('days_entitled') );
            $this->record->setStatus($this->_G('status'));
            $this->record->setRemarks($this->_G('remarks'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();     
            HrLib::LogThis($this->_U(),  'Update Leave', '', $this->getModuleName().'/'.$this->getActionName() );     
            $this->_SUF('Record <b>' . $this->record->getLeaveType() . '</b> saved.');
            $this->redirect('maintenance/leaveSearch?hIDs[]=' . $this->record->getId());
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
