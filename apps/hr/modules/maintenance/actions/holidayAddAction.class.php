<?php

/**
 * maintenance actions.
 *
 * @package    snapps
 * @subpackage maintenance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class holidayAddAction extends SnappsAction
{
    var $preCount = 0;
    
    public function preExecute()
    {
        if (!$this->preCount) 
        {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Define New Holiday');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = HrHolidayPeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new HrHoliday();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('date_hol',  Date('Y-m-d'));
        }

    }  
        
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
            $this->record->setHoliday($this->_G('holiday') );
            $this->record->setHolidayCode($this->_G('holiday_code') );
            $this->record->setDateHol($this->_G('date_hol') );
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();     
            HrLib::LogThis($this->_U(),  'Update Holiday', '', $this->getModuleName().'/'.$this->getActionName() );    
            $this->LeaveCreditProcessAll(); 
            $this->_SUF('Record <b>' . $this->record->getHolidayCode() . '</b> saved.');
            $this->redirect('maintenance/holidaySearch?hIDs[]=' . $this->record->getId());
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
    
    public function LeaveCreditProcessAll()
    {
//    	var_dump(sfConfig::get('fiscal_year'));
//    	exit();
        //$emp = HrEmployeePeer::GetEmployeeNameList();
        $emp = HrEmployeePeer::GetActiveEmployeeList();
        $req  = new PayComputeExtra();  //request object computecredits
        $data = '';    
        foreach ($emp as $ke=>$ve)
        {
            if ($ke)
            {
                //$data = $data . '<br>' . $req->computecredits($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
                //$req->UpdateFromGlobalLeave($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
                $this->UpdateLeave($req, $ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
            }
        }
    }

	public function UpdateLeave($req, $empNo, $fiscal, $user ){
		$req->UpdateFromGlobalLeave($empNo, $fiscal, $user);
		$req->UpdateFromPersonalizedLeave($empNo, $fiscal, $user)  ;
		$req->UpdateConsumedLeave($empNo, $fiscal, $user,'Annual Leave');
	}
    
}
