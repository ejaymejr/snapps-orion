<?php

/**
 * leave actions.
 *
 * @package    snapps
 * @subpackage leave
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class leaveActions extends SnappsActions
{
	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{
		$this->redirect('leave/leaveApprovalSearch');
	}
	
	public function executeLeaveCalendar()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST ):
			$this->currentMonth = '2013-01-10';
			$this->_S('cmonth', date('Y-m-01'));
		endif;
		
		if ( $this->getRequest()->getMethod() == sfRequest::POST ):
			$this->empList = HrEmployeeLeavePeer::GetEmployeeNoPerMonth($this->currentMonth);
		endif;
	}

	public function executeLeaveCreditSearch()
	{
		$fiscal = $this->_G('fiscal_year');
		if ($this->getRequest()->getMethod() == sfRequest::POST ):
			$c = new Criteria();
			$c->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::NAME);
			$c->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE);
			$c->add(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, $fiscal);
			$this->pager = HrEmployeeLeaveCreditsPeer::doSelect($c);
		endif;
	}

	public function executeLeaveCreditProcessAll()
	{
		$emp = HrEmployeePeer::GetActiveEmployeeListAll();
//		$emp = HrEmployeePeer::GetEmployeeNameListNoPartTime();
//		var_dump($emp);
//		exit();
//		$emp = array('024747352270509'=>'024747352270509');
//					, '035187324301010'=>'035187324301010');
		
		$req  = new PayComputeExtra();  //request object computecredits
		$data = '';
		foreach ($emp as $ke=>$ve)
		{
			if ($ke)
			{
				//$data = $data . '<br>' . $req->computecredits($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
				$this->UpdateLeave($req, $ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());

			}
		}
		$this->_SUF('Re-Compute all leave credits done.');
		$this->redirect('leave/leaveCreditSearch?hIDs[]=' );
	}

	 
	public function executeLeaveCreditDelete()
	{
		$id = $this->_G('id');
		$this->record = HrEmployeeLeaveCreditsPeer::retrieveByPK($id);
		$rec = $this->record->getName().'('.$this->record->getLeaveType().')';
		$this->record->delete();
		HrLib::LogThis($this->_U(),  'Delete Leave Credit', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->_SUF($rec.' has been deleted successfuly.');
		$this->redirect('leave/leaveCreditSearch');
	}

	public function executeLeaveApplySearch()
	{
		//        var_dump($this->_G('cMonth'));
		//        var_dump($this->_G('cYear'));
		 
		$sdt = '';
		$edt = '';

		if ( $this->getRequest()->getMethod() != sfRequest::POST && ! $this->_G('cDate')){
			$current = HrCurrentMonthPeer::GetCurrent();
			$cDt = $current['start'];
			$this->_S('cMonth',DateUtils::DUFormat('Y-m-01', $cDt));
			$this->_S('cMon', DateUtils::DUFormat('Y-m-01', $cDt));
			$this->_S('cYear', DateUtils::DUFormat('Y', $cDt));

		}

		if (($this->getRequest()->getMethod() == sfRequest::POST ))
		{
			if ( $this->_G('cMonth') == 'ALL' )
			{
				$sdt = $this->_G('cYear') . '-01-01';
				$edt = $this->_G('cYear') . '-12-31';
			}
			if (! $this->_G('cdate'))
			{
				$this->_S('cDate', $sdt);
			}
		}
		if ( $this->_G('cMonth') != 'ALL' ){
			$sdt = $this->_G('cDate')? $this->_G('cDate') : $this->_G('cMonth');
			$sdt = DateUtils::DUFormat($this->_G('cYear').'-m-d', $sdt);
			$edt = DateUtils::DUFormat($this->_G('cYear').'-m-', $sdt) . DateUtils::DUFormat('t', $sdt);
		}

		$c = new Criteria();
		$c->add(HrEmployeeLeavePeer::INCLUSIVE_DATEFROM,  'DATE(' . HrEmployeeLeavePeer::INCLUSIVE_DATEFROM . ') >= \'' . $sdt . '\' AND DATE(' . HrEmployeeLeavePeer::INCLUSIVE_DATEFROM . ') <= \'' . $edt . '\'', 'CUSTOM');
		$c->addAscendingOrderByColumn(HrEmployeeLeavePeer::NAME);
		$this->pager = HrEmployeeLeavePeer::doSelect($c);

	}

	public function executeLeaveSearch()
	{	
		$empNo  = $this->_G('employee_no');
		//$fiscal = $this->_G('fiscal');
		$fiscal = sfConfig::get('fiscal_year');
//		var_dump($this->_G('employee_no'));
//		var_dump('test');
//		exit();
		$c = new HrEmployeeLeaveCriteria();
		$c->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $empNo);
		$c->add(HrEmployeeLeavePeer::FISCAL_YEAR, $fiscal);
		$c->addAscendingOrderByColumn(HrEmployeeLeavePeer::LEAVE_TYPE);
		$c->addAscendingOrderByColumn(HrEmployeeLeavePeer::DATE_FILED);
		//$this->pager = HrEmployeeLeavePeer::GetPager($c);		
		$this->pager = HrEmployeeLeavePeer::doSelect($c);	
	}
	
	public function executeLeaveApplyEdit()
	{
		$id = $this->_G('id');
		$this->record = HrEmployeeLeavePeer::retrieveByPK($id);

		if (!$this->record) {
			$this->_ERR('Record not found.');
			$this->forward404();
		}

		sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Leave Application' . $this->record->getName());

		$this->_S('employee_no',        $this->record->getEmployeeNo());
		$this->_S('name',               $this->record->getName());
		$this->_S('contact_no',         $this->record->getContactNo());
		$this->_S('ic_no',              $this->record->getIcNo());
		$this->_S('inclusive_datefrom', $this->record->getInclusiveDateFrom());
		$this->_S('inclusive_dateto',   $this->record->getInclusiveDateTo());
		$this->_S('date_filed',         $this->record->getDateFiled());
		$this->_S('reason_leave',       $this->record->getReasonLeave());
		$this->_S('no_days',            $this->record->getNoDays());
		$this->_S('half_day',           $this->record->getHalfDay());
		$this->_S('leave_type',         $this->record->getHrLeaveId());
		$this->_S('consumed',           $this->record->getNoDays());
		$this->_S('fiscal_year',        $this->record->getFiscalYear());
		$this->_S('commence_date',      HrEmployeePeer::GetCommenceDate($this->_G('employee_no')) );


		//        //--------------------- get consumed
		//        $this->con   = HrEmployeeLeavePeer::GetCountLeaves($this->_G('employee_no'), $this->_G('leave_type'), $this->_G('fiscal_year'));
		//        $this->_S('consumed', $this->con);
		//
		//--------------------- available credits
		$this->leave = HrEmployeeLeaveCreditsPeer::GetDatabyEmployeeNoLeaveId($this->_G('employee_no'), $this->_G('leave_type'), sfConfig::get('fiscal_year') );
		//var_dump($this->leave->getConsumed());
		$this->_S('credits', ($this->leave)? ($this->leave->getCredits() - $this->leave->getConsumed())  : 'Open');

		//----------------------- get Detail 366 days
		$emp  = TkDtrmasterPeer::GetDatabyEmployeeNo1($this->_G('employee_no'));
		$vtmp = TkWorktemplateDetailPeer::getWorkTempDetailbyWTNo($emp->getTkWorktemplateNo());

		//----------------------- get holiday
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		//----------------------- init calendar object
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->cal->setMonthBaseURL('timekeeping/workTemplateEdit', $id);
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$this->cal->setWorkTemplate($vtmp);


		$this->setTemplate('leaveApplyAdd');

	}

	public function executeLeaveApplyDelete()
	{
		$id = $this->_G('id');
		$this->record = HrEmployeeLeavePeer::retrieveByPK($id);
		$empNo = $this->record->getEmployeeNo();
		$sdt = $this->record->getInclusiveDateFrom();
		$edt = $this->record->getInclusiveDateTo();
		$rec = $this->record->getName().'('.$this->record->getReasonLeave().')';
		$this->record->delete();
		HrLib::LogThis($this->_U(),  'Delete Leave', '', $this->getModuleName().'/'.$this->getActionName() );
		$req  = new PayComputeExtra();
		$this->UpdateLeave($req, $empNo, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
		$this->ProcessAttendance($empNo, $sdt, $edt);		
		$this->_SUF($rec.' has been deleted successfuly.');
		$this->redirect('leave/leaveApplySearch');


	}
	
	
	public function executeLeaveEmployeeApplyDelete()
	{
		$id = $this->_G('id');
		$cDate = $this->_G('cDate');
		$this->record = HrEmployeeLeavePeer::retrieveByPK($id);
		$empNo = $this->record->getEmployeeNo();
		$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
		$empCredit = HrEmployeeLeaveCreditsPeer::GetDatabyEmployeeNoLeaveId($empNo, $this->record->getHrLeaveId(), HrFiscalYearPeer::getFiscalYear() );
		if ($empCredit):
			$consumed = HrEmployeeLeavePeer::GetCountLeaves($empNo, $this->record->getHrLeaveId(), HrFiscalYearPeer::getFiscalYear());
			$empCredit->setConsumed($consumed);
			$empCredit->save();
		endif;
		$sdt = $this->record->getInclusiveDateFrom();
		$edt = $this->record->getInclusiveDateTo();
		$rec = $this->record->getName().'('.$this->record->getReasonLeave().')';
		$this->record->delete();
		HrLib::LogThis($this->_U(),  'Delete Leave', '', $this->getModuleName().'/'.$this->getActionName() );
		$req  = new PayComputeExtra();
		$this->UpdateLeave($req, $empNo, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
		$this->ProcessAttendance($empNo, $sdt, $edt);		
		$this->_SUF($rec.' has been deleted successfuly.');
		//$this->redirect('leave/leaveApprovalSearch');
		$this->redirect('leave/leaveApprovalSearch?hr_company_id=' . $empData->getHrCompanyId() . '&cDate=' . $cDate);
	}

	public function executeDepositNDelivery()
	{

	}

	public function UpdateLeave($req, $empNo, $fiscal, $user ){
		$req->UpdateFromGlobalLeave($empNo, $fiscal, $user);
		$req->UpdateFromPersonalizedLeave($empNo, $fiscal, $user)  ;
		$req->UpdateConsumedLeave($empNo, $fiscal, $user,'Annual Leave');
	}
	
	public function executeAnnualLeaveListing()
	{
		$pdf = new PdfLibrary();
		$pdf->addPage('Arial', 10, 'P');
		$y = 7;
		$x = 13;
		$co = '';
		$wt = '';
		$team = '';
		$xpos = 0;
		$companyList = HrCompanyPeer::OptCompanyList();
		$companyID = 4;
// 		var_dump($co);
// 		exit();
		$pdf->printTCKhooHeader();
		$pdf->printBoldLn( $x + 60, $xpos++   + $y, 'EMPLOYEE ANNUAL LEAVE CREDITS', 'Arial', 12);
		$pdf->printBoldLn( $x + 60, $xpos++   + $y, $companyList[$companyID], 'Arial', 12);
		//$pdf->printLn( $x+50 + (($wt)? 0 : 22),       $xpos++   + $y, $co.'  - '.(($wt)? $wt : 'YEAR END '. sfConfig::get('fiscal_year') .' -'), 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, '--------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		//        $pdf->printLn( $x,          $xpos++   + $y, ' SEQ  EMPLOYEE #              NAME                               DEPARTMENT/TEAM      BASIC ', 'Arial', 11 );
		$pdf->printLn( $x,          $xpos++   + $y, ' SEQ    #YEARS   YEARLY-INC      NAME                                 ALLOCATION     TAKEN        BALANCE ', 'Arial', 11 );
		$pdf->printLn( $x,          $xpos++   + $y, '--------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		$empData = TkDtrmasterPeer::GetListforMasterList($co, $wt, $team);
		//        $list = HrEmployeePeer::GetEmployeeNoList();
		//        $empData = PayEmployeeLedgerArchivePeer::GetListforMasterListInActive($list);


		$seq = 1;
		$pos = 5;
		$addinfo = '';
		foreach($empData as $rec)
		{
			if ($pos > 48 )
			{
				$pdf->Footer();
				$pdf->addPage('Arial', 10, 'P');
				$xpos = 0;
				$y    = 3;
				$pos  = 0;
				$pdf->printLn( $x,          $xpos++   + $y, '--------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
				$pdf->printLn( $x,          $xpos++   + $y, ' SEQ  #YEARS             NAME                                 ALLOCATION     ENTITLED     BALANCE ', 'Arial', 11 );
				$pdf->printLn( $x,          $xpos++   + $y, '--------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
			}

			$bp = PayBasicPayPeer::GetOptimizedDatabyEmployeeNo($rec->getEmployeeNo(), array("basic_amount", "hourly_rate", "allowance", "cpf", "cpf_amount"));
			$addinfo = HrEmployeePeer::GetDatabyEmployeeNo($rec->getEmployeeNo());
			$noYears = number_format(DateUtils::DateDiff('m', $addinfo->getCommenceDate(), Date('Y-m-d')) / 12, 1);
			//            if ($bp && strtolower($addinfo->getTelNo()) == 'none')
			if ($bp)
			{
				$basic = $bp->get('BASIC_AMOUNT');
				$rate  = $bp->get('HOURLY_RATE');
				$all   = $bp->get('ALLOWANCE');
				$cpf   = $bp->get('CPF');
				$cpfamt= $bp->get('CPF_AMOUNT');
				
				//                $pdf->printLn( $x+10, $xpos   + $y, $rec->getEmployeeNo(), 'Arial', 10 );
				//                $pdf->printLn( $x+45, $xpos   + $y, substr($rec->getName(), 0, 25), 'Arial', 10 );
				//                $pdf->printLn( $x+100, $xpos   + $y, substr(HrEmployeePeer::GetEmployeeTeam($rec->getEmployeeNo()), 0, 25), 'Arial', 10 );
				//$pdf->printLn( $x+142, $xpos   + $y, number_format(( ($basic > 0)? $basic : $rate.'/Hr') , 2), 'Arial', 10 );
				//$pdf->printLn( $x+125, $xpos   + $y, number_format($all, 2), 'Arial', 10 );
				//$pdf->printLn( $x+145, $xpos   + $y, $cpf, 'Arial', 10 );
				//$pdf->printLn( $x+165, $xpos   + $y, number_format($cpfamt, 2), 'Arial', 10 );
				$fiscal = HrFiscalYearPeer::getFiscalYear();
				//$allocated = HrEmployeeLeaveCreditsPeer::GetAnnualLeavebyEmployeeNo($rec->getEmployeeNo());
				$allocated = HrIndividualLeavePeer::GetAnnualLeaveCount($rec->getEmployeeNo(), $fiscal);
				$consumed  = HrEmployeeLeavePeer::GetCountLeaves($rec->getEmployeeNo(), 2, $fiscal);
				$balance   = HrEmployeeLeaveCreditsPeer::GetBalanceLeave($rec->getEmployeeNo(), 2, $fiscal);
				//$allocated = HrEmployeeLeaveCreditsPeer::get
				//$pdf->printLn( $x+10, $xpos   + $y, $rec->getEmployeeNo(), 'Arial', 10 );
				//if ( ($noYears == 1 and $allocated >= 7) || 
				if ( $addinfo->getHrCompanyId() == $companyID):
					$pdf->printLn( $x, 		$xpos  + $y, $seq++, 'Arial', 10 );
					$pdf->printLn( $x+15, $xpos   + $y, number_format($noYears,1), 'Arial', 10 );
					$pdf->printLn( $x+35, $xpos   + $y, number_format($addinfo->getAnnualLeave(),1) , 'Arial', 10 );
					$pdf->printLn( $x+60, $xpos   + $y, substr($rec->getName(), 0, 25), 'Arial', 10 );
					$pdf->printLn( $x+120, $xpos   + $y, $allocated );
//					$pdf->printLn( $x+140, $xpos   + $y, $addinfo->getAnnualLeave()  );
 					$pdf->printLn( $x+145, $xpos   + $y, $consumed );
 					$pdf->printLn( $x+170, $xpos   + $y, $balance );

					$xpos++;
					$pos++;
				endif;

			}
		}
		$pdf->Footer();
		$pdf->closePDF('testing.pdf');
		exit();
		
	}

	public function executeLeaveApplicationSearch()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST ):
			$this->_S('cdate', DateUtils::GetThisMonthStartDate());
			$this->_S('cMonth',DateUtils::DUFormat('Y-m-01', $this->_G('cdate')));
			$this->_S('cMon',DateUtils::DUFormat('Y-m-01', $this->_G('cdate')));
			$this->_S('cYear', DateUtils::DUFormat('Y', $this->_G('cdate')));
			$this->_S('approver', $this->_U());
		endif;
		
		if ( $this->getRequest()->getMethod() == sfRequest::POST ):
			$this->_G('cdate');
		endif;
		$sdt = DateUtils::DUFormat('Y-m-01', $this->_G('cdate'));
		$edt = DateUtils::DUFormat('Y-m-t', $this->_G('cdate'));
		$c = new Criteria();
		$c->add(HrEmployeeLeavePeer::INCLUSIVE_DATEFROM,  'DATE(' . HrEmployeeLeavePeer::INCLUSIVE_DATEFROM . ') >= "' . $sdt  . '" and DATE(' . HrEmployeeLeavePeer::INCLUSIVE_DATEFROM . ') <= "' . $edt  . '"', 'CUSTOM');
		$c->addAscendingOrderByColumn(HrEmployeeLeavePeer::NAME);
		$this->pager = HrEmployeeLeavePeer::doSelect($c);
	}
	
	public function executeLeaveApprovalSearch()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST && ! $this->_G('cDate')){
			$cDt = DateUtils::GetThisMonthStartDate();
			$this->_S('cMonth',DateUtils::DUFormat('Y-m-01', $cDt));
			$this->_S('cMon',DateUtils::DUFormat('Y-m-01', $cDt));
			$this->_S('cYear', DateUtils::DUFormat('Y', $cDt));
			$this->_S('approver', $this->_U());
			$sdt = DateUtils::DUFormat('Y-m-01', $cDt);
			$edt = DateUtils::DUFormat('Y-m-t', $cDt);
		}
		
		$empList = HrLeaveApproverPeer::GetList();
		$c = new Criteria();
		$c->add(HrEmployeeLeavePeer::INCLUSIVE_DATEFROM,  'DATE(' . HrEmployeeLeavePeer::INCLUSIVE_DATEFROM . ') >= \'' . $sdt  . '\'', 'CUSTOM');
		$c->addAscendingOrderByColumn(HrEmployeeLeavePeer::NAME);
		if ($empList) $c->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $empList, Criteria::IN);
		$this->pager = HrEmployeeLeavePeer::doSelect($c);
	}
	
	public function executeLeaveVerify()
	{
		$id = $this->_G('id');
		$rec = HrEmployeeLeavePeer::retrieveByPK($id);
		if (!$rec) {
			$this->redirect404('No Entries found!');
		}
		$rec->setVerified('OK');
		$rec->setVerifiedBy($this->_U());
		$rec->setDateVerified(DateUtils::DUNow());
		$rec->save();
		HrLib::LogThis($this->_U(),  'Verify Leave', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->_SUF($rec->getName() . ' Leave has been Verified!');
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

	public function executeLeaveApprove()
	{
		$id = $this->_G('id');
		$cDate = $this->_G('cDate');
		$rec = HrEmployeeLeavePeer::retrieveByPK($id);
		if (!$rec) {
			//$this->redirect404('No Entries found!');
			$this->msg = 'NOT FOUND';
		}
		$rec->setApproved('OK');
		$rec->setApprovedBy($this->_U());
		$rec->setDateApproved(DateUtils::DUNow());
		$rec->save();
		$empData = HrEmployeePeer::GetDatabyEmployeeNo($rec->getEmployeeNo());
		HrLib::LogThis($this->_U(),  'Leave Approve', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->msg = 'OK';
		//$this->_SUF($rec->getName() . ' Leave has been Approved!');
		//$this->redirect($_SERVER['HTTP_REFERER']);
		$this->redirect('leave/leaveApprovalSearch?hr_company_id=' . $empData->getHrCompanyId() . '&cDate=' . $cDate);
	}	
	
	public function executeLeaveApproveIndividual()
	{
		$id = $this->_G('id');
		$rec = HrEmployeeLeavePeer::retrieveByPK($id);
		$rec->setApproved('OK');
		$rec->setApprovedBy($this->_U());
		$rec->setDateApproved(DateUtils::DUNow());
		$rec->save();
		$empData = HrEmployeePeer::GetDatabyEmployeeNo($rec->getEmployeeNo());
		HrLib::LogThis($this->_U(),  'Leave Approve', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->msg = 'OK';
		$this->redirect('leave/leaveApplySearch');
	}
	
	public function executeLeaveDeny()
	{
		$id = $this->_G('id');
		$cDate = $this->_G('cDate');
		$rec = HrEmployeeLeavePeer::retrieveByPK($id);
		if (!$rec) {
			$this->redirect404('No Entries found!');
		}
		$oldLeaveID = $rec->getHrLeaveId();
		$rec->setReasonLeave(' Leave Denied (' . $rec->getLeaveType() .')');
		$rec->setHrLeaveId(6);
		$rec->setLeaveType('Leave without Pay');
		
		$rec->setApproved('OK');
		$rec->setApprovedBy($this->_U());
		$rec->setDateApproved(DateUtils::DUNow());
		$rec->save();
		$empCredit = HrEmployeeLeaveCreditsPeer::GetDatabyEmployeeNoLeaveId($rec->getEmployeeNo(), $oldLeaveID, HrFiscalYearPeer::getFiscalYear() );
		if ($empCredit):
			$consumed = HrEmployeeLeavePeer::GetCountLeaves($rec->getEmployeeNo(), $oldLeaveID, HrFiscalYearPeer::getFiscalYear());
			$empCredit->setConsumed($consumed);
			$empCredit->save();
		endif;
		$empData = HrEmployeePeer::GetDatabyEmployeeNo($rec->getEmployeeNo());
		HrLib::LogThis($this->_U(),  'Leave Deny', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->_SUF($rec->getName() . ' Leave has been Change to no unpaid leave!');
		//$this->redirect($_SERVER['HTTP_REFERER']);
		$this->redirect('leave/leaveApprovalSearch?hr_company_id=' . $empData->getHrCompanyId() . '&cDate=' . $cDate);
	}	

	public function executeLeaveCreditBrowser()
	{
		$empNo = $this->_G('employee_no');
		if ($empNo) {
			$this->leaveData = HrEmployeeLeaveCreditsPeer::GetCreditsByEmployeeNo($empNo);
		}		
	}
	
	public function ProcessAttendance($empNo, $sdt, $edt){
//		$sdt = dateUtils::DUFormat('Y-m-d', $sdt);
//		$edt = dateUtils::DUFormat('Y-m-d', $edt);
		
		$sdt = DateUtils::DUFormat('Y-m-01', $sdt);
		$edt = DateUtils::DUFormat('Y-m-t', $sdt);
		
		$batch = DateUtils::DUFormat("Ymd",$sdt).'-'.DateUtils::DUFormat("Ymd",$edt) ;
		$emparr = array(TkDtrmasterPeer::GetDatabyEmployeeNo($empNo));
		$extra = new PayComputeExtra();
		$extra->PrepareDtrData($emparr, $sdt, $edt, 'LEAVE DELETE');
		$cnt =1;
		foreach ($emparr as $emp){
			$cnt++;
			$extra->BuildDtrsummary($emp->getEmployeeNo(), $sdt,$edt, 'CRON SYSTEM', $batch);
		}
	}	
	
	public function executeAjaxDateApplied()
	{
		foreach($_GET as $k=>$v):
			if (substr($k, 0, 5) == 'dates'):
				$dates = trim($v);
			endif;
		endforeach;
		$this->leaveID = trim($this->_G('leaveID'));
		$cdate = trim($this->_G('cdate'));
		$dtList = str_replace($cdate .',', '', $dates);
		$dtList = $cdate . ", " . $dtList;
		$this->dtList = $dtList;
		$this->_S('date_list',  $dtList );
		$this->_S('cdate',  $cdate );
	}

	public function executeAjaxDateCanceled()
	{
		foreach($_GET as $k=>$v):
			if (substr($k, 0, 5) == 'dates'):
				$dates = trim($v);
			endif;
		endforeach;
		$this->leaveID = trim($this->_G('leaveID'));
		$cdate = trim($this->_G('cdate'));
		$dtList = str_replace($cdate .',', '', $dates);
		$this->dtList = $dtList;
		
		$this->_S('date_list',  $dtList );
		$this->_S('cdate',  $cdate );
	}
	
	public function executeAjaxLeaveCreditCount()
	{
		foreach($_GET as $k=>$v):
			if (substr($k, 0, 6) == 'leave_'):
				$this->leaveID = $v;
				$this->_S('leaveID', $v);
			endif;
		endforeach;
		$empNo  = $this->_G('employee_no_' . $this->leaveID );
		$cmonth = $this->_G('cmonth_'. $this->leaveID);
		$name   = $this->_G('name_'. $this->leaveID);
		if ($name && ! $empNo):
			$empNo = HrEmployeePeer::GetEmployeeNoByName($name);
		endif;

		$this->name = $name;
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
		$this->balance = HrEmployeeLeaveCreditsPeer::GetBalanceLeave($empNo, $this->leaveID, HrFiscalYearPeer::getFiscalYear());
		if ($empData):
			$this->commence = $empData->getCommenceDate();
			$this->name = $empData->getName();
			//$this->_S('employee_no', $this->name);
		else:
			$this->commence = '';
		endif;
		$this->cdate = $cmonth;
		$this->empNo = $empNo;
	}
	
	public function executeAjaxChangeCalendar()
	{
		foreach($_GET as $k=>$v):
			if (substr($k, 0, 6) == 'leave_'):
				$this->leaveID = $v;
				$this->_S('leaveID', $v);
			endif;
		endforeach;
		$empNo  = $this->_G('employee_no_' . $this->leaveID );
		$cmonth = $this->_G('cmonth_'. $this->leaveID);
		$name   = $this->_G('name_'. $this->leaveID);
		if ($name && ! $empNo):
			$empNo = HrEmployeePeer::GetEmployeeNoByName($name);
		endif;
		$this->empNo = $empNo;
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$this->cdate = $cmonth; // $this->_G('cmonth');
		$this->leaveID = $this->_G('leaveID');
	}
	
	public function executeAjaxMonthlyCalendar()
	{
		$this->empNo = $this->_G('employee_no');
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$this->cdate   = $this->_G('year') . DateUtils::DUFormat('-m-d', $this->_G('cmonth') )  ;
		$this->company = $this->_G('company');
		$this->leaveID = $this->_G('leaveID');
		//$this->empNo = $this->_G('employee_no');
	}
	
	public function executeAjaxShowAppliedLeave()
	{
		$empNo = $this->_G('employee_no');
		$leaveID = $this->_G('leaveID');
		//$fiscals = HrFiscalYearPeer::GetFiscalYearListInCriteria();
		$c = new Criteria();
		$c->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $empNo);
		$c->add(HrEmployeeLeavePeer::HR_LEAVE_ID, $leaveID);
		//$c->add(HrEmployeeLeavePeer::FISCAL_YEAR, $fiscals, Criteria::IN);
		$c->addDescendingOrderByColumn(HrEmployeeLeavePeer::INCLUSIVE_DATEFROM);
		$this->pager = HrEmployeeLeavePeer::GetPager($c);
	}	
	
	public function executeLeaveApproval()
	{
		
	}
	
	public function executeLeaveApplyDatePrint()
	{
		$appID = $this->_G('id');
		$this->leaveID = HrEmployeeLeavePeer::retrieveByPK($appID);
		$empNo = $this->leaveID->getEmployeeNo();
		$this->empNo = $empNo;
		$this->xdate = $this->leaveID->getInclusiveDateFrom();
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$emp = TkDtrmasterPeer::GetDatabyEmployeeNo1($empNo);
		$vtmp = TkWorktemplateDetailPeer::GetWorkTempDetailbyWTNo($emp->getTkWorktemplateNo(), $this->holinfo['dates_hol']);
		$this->cal->setWorkTemplate($vtmp);
		$this->empDetail = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
		if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
        	if ($appID):
				$data = HrEmployeeLeaveSignaturePeer::GetDataByHrEmployeeLeaveId($appID);
				if (! $data):
					$data = new HrEmployeeLeaveSignature();
					$data->setDateCreated(DateUtils::DUNow());
					$data->setCreatedBy($this->_U());
				endif;
				$data->setDateModified(DateUtils::DUNow());
				$data->setModifiedBy($this->_U());
				$data->setHrEmployeeLeaveId($appID);
				$data->setApproval('data:'. $this->_G('signature_data'));
				$data->setDateApproved(DateUtils::DUNow());
				$data->setDateCreated(DateUtils::DUNow());
				$data->setCreatedBy($this->_U());
				$data->save();
				
				$leave = HrEmployeeLeavePeer::retrieveByPK($appID);
				if ($leave):
					$leave->setApprovedBy(HrLeaveApproverPeer::GetApprover($empNo));
					$leave->setApproved(true);
					$leave->setDateApproved(DateUtils::DUNow());
					$leave->save();
				endif;
			endif;
        }
		$this->setLayout('layout_print');
		//$this->setTemplate('leaveApplyPrint');
	}
	
	public function executeLeaveApplyDatePrintVerify()
	{
		$appID = $this->_G('id');
		$this->leaveID = HrEmployeeLeavePeer::retrieveByPK($appID);
		$empNo = $this->leaveID->getEmployeeNo();
		$this->empNo = $empNo;
		$this->xdate = $this->leaveID->getInclusiveDateFrom();
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
		$this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
		$this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
		$emp = TkDtrmasterPeer::GetDatabyEmployeeNo1($empNo);
		$vtmp = TkWorktemplateDetailPeer::GetWorkTempDetailbyWTNo($emp->getTkWorktemplateNo(), $this->holinfo['dates_hol']);
		$this->cal->setWorkTemplate($vtmp);
		$this->empDetail = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
		if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
        	if ($appID):
				$data = HrEmployeeLeaveSignaturePeer::GetDataByHrEmployeeLeaveId($appID);
				if (! $data):
					$data = new HrEmployeeLeaveSignature();
					$data->setDateCreated(DateUtils::DUNow());
					$data->setCreatedBy($this->_U());
				endif;
				$data->setDateModified(DateUtils::DUNow());
				$data->setModifiedBy($this->_U());
				$data->setHrEmployeeLeaveId($appID);
				$data->setVerified('data:'. $this->_G('signature_data'));
				$data->setDateVerified(DateUtils::DUNow());
				$data->setDateCreated(DateUtils::DUNow());
				$data->setCreatedBy($this->_U());
				$data->save();
				
				$leave = HrEmployeeLeavePeer::retrieveByPK($appID);
				if ($leave):
					$leave->setVerifiedBy(HrLeaveApproverPeer::GetVerifier($empNo));
					$leave->setVerified(true);
					$leave->setDateVerified(DateUtils::DUNow());
					$leave->save();
				endif;
			endif;
        }
		$this->setLayout('layout_print');
		//$this->setTemplate('leaveApplyPrint');
	}
	
	public function executeSaveLeaveFormToPng()
	{
		$this->data = ($this->_G('data'));
		$id = ($this->_G('id'));
		if ($id):
			$data = HrEmployeeLeaveSignaturePeer::GetDataByHrEmployeeLeaveId($id);
			if (! $data):
				$data = new HrEmployeeLeaveSignature();
				$data->setDateCreated(DateUtils::DUNow());
				$data->setCreatedBy($this->_U());
			endif;
			$data->setDateModified(DateUtils::DUNow());
			$data->setModifiedBy($this->_U());
			$data->setHrEmployeeLeaveId($id);
			$data->setSignature('data:'. $this->data);
			$data->setDateCreated(DateUtils::DUNow());
			$data->setCreatedBy($this->_U());
			$data->save();
			
			$leave = HrEmployeeLeavePeer::retrieveByPK($id);
			if ($leave):
				$leave->setApproveBy($this->_U());
				$leave->setApprove(true);
				$leave->setDateApprove(DateUtils::DUNow());
				$leave->save();
			endif;
			
		endif;
		$this->redirect('leave/leaveApplyDatePrint');
	}
	
	public function executeLeaveChart()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST ):
			$cdate = HrCurrentMonthPeer::GetCurrent();
			$this->_S('cdate', date('Y-m-d'));//$cdate['start'] );
//			var_dump($this->_G('cdate'));
//			exit();
			$this->_S('company', '');
			$this->_S('cmonth', $this->_G('cdate') );
			$this->_S('year', DateUtils::DUFormat('Y', $this->_G('cdate') ) );
			//$this->empList = HrEmployeeLeavePeer::GetEmployeeNoPerMonthPerCompany( $this->_G('cdate'), $this->_G('company') );
		endif;
		
		if ( $this->getRequest()->getMethod() == sfRequest::POST ):;
//			var_dump($this->_G('company'));
//			exit();
			$this->_S('cdate', $this->_G('year') .'-'. DateUtils::DUFormat('m-d', $this->_G('cmonth')) );
			$this->empList = HrEmployeeLeavePeer::GetEmployeeNoPerMonthPerCompany( $this->_G('cdate'), $this->_G('company') );
		endif;
	}
}

