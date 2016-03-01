<?php

/**
 * maintenance actions.
 *
 * @package    snapps
 * @subpackage maintenance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class maintenanceActions extends SnappsActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {

    }
    
    public function executeWorkTemplateUpdate()
    {
    	if ($this->getRequest()->getMethod() == sfRequest::POST)
    	{
    		TkWorktemplateDetailPeer::DoEmptyData();
    		//exit();
    		 
    		$wrkTemp = TkWorktemplatePeer::GetOptions();
    		$ndays = date("z", mktime(0,0,0,12,31,sfConfig::get('fiscal_year'))) + 1;
    		$stDate = sfConfig::get('fiscal_year') .'-01-01'  ;
    		 
    		foreach($wrkTemp as $wno=>$desc){
    			$wData = TkWorktemplatePeer::GetDatabyWorktemplateNo($wno);
    			$days = array();
    			if ($wData) {
    				$days =  explode(',' , $wData->getTemplate()) ;
    				for($cday=0; $cday < $ndays; $cday++)
    				{
    				$cdate = DateUtils::AddDate($stDate, $cday);
    	
    				//echo DateUtils::DUFormat('Y-m-d, D', $cdate) .'<br>';
    				$req = 0;
    				switch(DateUtils::DUFormat('D', $cdate)){
    				case 'Sun':
    				$req = $days[0];
    					break;
    					case 'Mon':
    					$req = $days[1];
    					break;
    					case 'Tue':
    					$req = $days[2];
    					break;
    					case 'Wed':
    					$req = $days[3];
    					break;
    					case 'Thu':
    					$req = $days[4];
    					break;
    							case 'Fri':
    							$req = $days[5];
    					break;
    					case 'Sat':
    						$req = $days[6];
    						break;
    				}
    				$wtDet = TkWorktemplateDetailPeer::GetDataByDayWorktemplate($cday + 1, $wData->getWorktempNo());
    				if (! $wtDet) {
    				$wtDet = new TkWorktemplateDetail();
    				$wtDet->setCreatedBy($this->_U());
    				$wtDet->setDateCreated(DateUtils::DUNow());
    				}
    				$wtDet->setDay( ($cday + 1) );
    					$wtDet->setIsWorking($req);
    					$wtDet->setTkWorktemplateNo($wData->getWorktempNo());
    					$wtDet->setModifiedBy($this->_U());
    					$wtDet->setDateModified(DateUtils::DUNow());
    					$wtDet->setDateDet($cdate);
    					$wtDet->save();
    					HrLib::LogThis($this->_U(), 'UPDATE WORKTEMPLATE', '', $this->getModuleName().'/'.$this->getActionName() );
    	
    				} //cday
    				} //wdata
    				}//foreach
    				$this->hide = true;
    				$this->_SUC('Update has been successful...');
    			}//post
    }
    
    public function executeWorkTemplateSearch()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(TkWorktemplatePeer::WORKTEMP_NO);
        $this->pager = TkWorktemplatePeer::doSelect($c);
    }
    
    public function executeWorkTemplateDelete()
    {
        $id = $this->_G('id');
        $this->record = TkWorktemplatePeer::retrieveByPK($id);
        $rec = $this->record->getWorktempNo();
        $this->record->delete();
        $this->record1 = TkWorktemplateDetailPeer::DeleteWorkTempDetailbyWTNo($rec);
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/workTemplateSearch');
    }
    


    public function executeEmployeeSearch()
    {

    }

    public function executeHolidaySearch()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(HrHolidayPeer::DATE_HOL);
        $this->pager = HrHolidayPeer::doSelect($c);
    }

    public function executeHolidayEdit()
    {
        $id = $this->_G('id');
        $this->record = HrHolidayPeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Holiday Definition' . $this->record->getHolidayCode());

        $this->_S('holiday_code',   $this->record->getHolidayCode());
        $this->_S('holiday',        $this->record->getHoliday());
        $this->_S('date_hol',       $this->record->getDateHol());
        $this->setTemplate('holidayAdd');
    }
    
    

    public function executeHolidayDelete()
    {
        $id = $this->_G('id');
        $this->record = HrHolidayPeer::retrieveByPK($id);
        $rec = $this->record->getHolidayCode();
        $this->record->delete();
        HrLib::LogThis($this->_U(),  'Delete Holiday', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/holidaySearch');
    }

    public function executeLeaveSearch()
    {
        $c = new HrLeaveCriteria();
        $this->pager = HrLeavePeer::GetPager($c);
    }

    public function executeLeaveEdit()
    {
        $id = $this->_G('id');
        $this->record = HrLeavePeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Leave Definition' . $this->record->getLeaveType());

        $this->_S('leave_type',     $this->record->getLeaveType());
        $this->_S('description',    $this->record->getDescription());
        $this->_S('days_entitled',  $this->record->getDaysEntitled());
        $this->_S('remarks',        $this->record->getRemarks());
        $this->_S('status',         HrLeavePeer::GetFlagStatus($this->record->getStatus()));
        $this->setTemplate('leaveAdd');
    }

    public function executeLeaveDelete()
    {
        $id = $this->_G('id');
        $this->record = HrLeavePeer::retrieveByPK($id);
        $rec = $this->record->getLeaveType();
        $this->record->delete();
        HrLib::LogThis($this->_U(),  'Delete Leave', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/leaveSearch');
    }

    public function executeAcctTypeSearch()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(PayAccountCodePeer::ACCT_CODE);
        $this->pager = PayAccountCodePeer::doSelect($c);
    }

    public function executeAcctCodeEdit()
    {
        $id = $this->_G('id');
        $this->record = PayAccountCodePeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }
        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; ' . $this->record->getAcctCode());
        $this->_S('acct_code',  $this->record->getAcctCode());
        $this->_S('description',$this->record->getDescription());
        $this->_S('remarks',    $this->record->getRemarks());
        $this->_S('cpf',    $this->record->getCpf());
        $this->setTemplate('acctCodeAdd');
    }

    public function executeAcctCodeDelete()
    {
        $id = $this->_G('id');
        $this->record = PayAccountCodePeer::retrieveByPK($id);
        $rec = $this->record->getDescription();
        $this->record->delete();
        HrLib::LogThis($this->_U(),  'Delete Account Code', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/acctTypeSearch');
    }

    public function executeFiscalSearch()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(HrFiscalYearPeer::FISCAL_YEAR);
        $this->pager = HrFiscalYearPeer::doSelect($c);
    }

    public function executeFiscalYearEdit()
    {
        $id = $this->_G('id');
        $this->record = HrFiscalYearPeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Fiscal Year' . $this->record->getFiscalYear());

        $this->_S('fiscal_year',        $this->record->getFiscalYear());
        $this->_S('previous_year',      $this->record->getPreviousYear());
        $this->_S('start_date',         $this->record->getStartDate());
        $this->_S('end_date',           $this->record->getEndDate());
        $this->_S('remarks',            $this->record->getRemarks());
        $this->_S('is_current',         $this->record->getIsCurrent());        
        $this->setTemplate('fiscalYearAdd');
    }
    
    public function executeFiscalYearDelete()
    {
        $id = $this->_G('id');
        $this->record = HrFiscalYearPeer::retrieveByPK($id);
        $rec = $this->record->getFiscalYear();
        $this->record->delete();
        HrLib::LogThis($this->_U(), 'Delete Fiscal Year', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/fiscalSearch');
    }    

    public function executeIndividualLeaveSearch()
    {
        $c = new HrIndividualLeaveCriteria();
        $this->pager = HrIndividualLeavePeer::GetPager($c);
        
    }
    
    public function executeIndividualLeaveEdit()
    {
        $id = $this->_G('id');
        $this->record = HrIndividualLeavePeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Personalized Leave Credits' . $this->record->getName());

        
        $this->_S('employee_no',        $this->record->getEmployeeNo());
        $this->_S('leave_id',           $this->record->getHrLeaveId());
        $this->_S('days_entitled',      $this->record->getDaysEntitled());
        $this->_S('status',             $this->record->getStatus());        
        $this->setTemplate('individualLeaveAdd');
    }
    
    public function executeIndividualLeaveSet()
    {
        $empNo = $this->_G('empNo');
        $lID = $this->_G('leave_id');
        $credits = $this->_G('ent');
        $empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Personalized Leave Credits');

        if ($empData) 
        {
	        $this->_S('employee_no',        $empData->getEmployeeNo());
	        $this->_S('leave_id',           $lID);
	        $this->_S('days_entitled',      $credits);
	        $this->_S('status',             'A');
        }        
        $this->setTemplate('individualLeaveAdd');
    }    
    
    

    public function executeIndividualLeaveDelete()
    {
        $id = $this->_G('id');
        $this->record = HrIndividualLeavePeer::retrieveByPK($id);
        $rec = $this->record->getName() .'  '.$this->record->getDescription();
        $this->record->delete();
        HrLib::LogThis($this->_U(),  'Delete Individual Leave', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('maintenance/individualLeaveSearch');
    }
    
    public function executeLeaveCreditProcessAll()
    {
        $emp = HrEmployeePeer::GetEmployeeNameList();
        $req  = new PayComputeExtra();  //request object computecredits
        $data = '';    
        //$emp = array('024747352270509'=>'024747352270509');
        foreach ($emp as $ke=>$ve)
        {
            if ($ke)
            {
                $req->UpdateFromGlobalLeave($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername(), true);
                $req->UpdateFromPersonalizedLeave($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
            }
        }
        $this->_SUF('Compute all leave credits done.');
        //$this->redirect('leave/leaveCreditSearch?hIDs[]=' );
        $this->redirect('maintenance/leaveSearch?hIDs[]=' );
    }     

}

