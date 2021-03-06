<?php
/**
 * dtr actions.
 *
 * @package    snapps
 * @subpackage dtr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class dtrActions extends SnappsActions
{
	const BIO_CHECK_IN = '00';
	const BIO_CHECK_OUT = '01';
	const BIO_OT_IN = '04';
	const BIO_OT_OUT = '05';
	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{
		//$this->forward('default', 'module');
	}
	
	public function executeTimesheet()
	{
		//$this->forward('default', 'module');
	}
	
	public function executeAjaxTimesheet()
	{
		if ($this->_G('exec') == 'next'):
			$this->currentEmployee = $this->_G('next_employee');
		endif;
		if ($this->_G('exec') == 'previous'):
			$this->currentEmployee = $this->_G('previous_employee');
		endif;
		$employeeList = HrEmployeePeer::GetEmployeeNumberNameList()  ;
		$key = array_search($this->currentEmployee, $employeeList);
		if ($this->_G('exec') == 'next' ):
			if ($this->currentEmployee == ''):
				$this->currentEmployee =  $employeeList[$key];
				$key = 0;
			endif;
		endif;
		if ($this->_G('exec') == 'previous' ):
			if ($this->currentEmployee == ''):
				$key = (sizeof($employeeList) -1 );
				$this->currentEmployee =  $employeeList[$key];
			endif;
		endif;
		$this->previousEmployee = isset($employeeList[$key - 1])? $employeeList[$key - 1] : '' ;
		$this->nextEmployee = isset($employeeList[$key + 1])? $employeeList[$key + 1] : '';
	}

	public function executeAjaxEmpList()
	{

		$this->pcode = $this->_G('period_code');
	}
	
	
	public function executeScanIn()
	{
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$leave = link_to('Here', 'leave/leaveEmployeeApply');
		sfConfig::set('app_page_heading', 'DAILY TIME RECORD Click '. $leave .' to Apply Leave');
		$this->_S('company_clock', Date('F d, Y H:i:s'));
		$this->_S('military_clock', Date('H:i:s'));
		$this->_S('ampm', Date('A'));
		//$this->_S('company_clock', Date('F d, Y 07:14:55'));
		$this->pager = self::ScanInPager();
		
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			if (! $this->_G('employee_no'))
			{
				$this->pager = self::ScanInPager();
				$this->empName = 'PLEASE SCAN IDENTIFICATION CARD.';
				return;
			}
			$current_date_time = Date('Y-m-d H:i:s'); //'2015-02-09 08:30:01'; 
			$record = TkAttendancePeer::GetEmpDaily($this->_G('employee_no'), DateUtils::DUFormat('Y-m-d', $current_date_time));
			$empInfo = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($this->_G('employee_no'), array('name','company', 'id'));
			
			if (! $empInfo)
			{
				$this->pager = self::ScanInPager();
				$this->_ERF($this->_G('employee_no') . ' Employee Not Found!');
				return;
			}
			$actualTime = $current_date_time; // Date('Y-m-d H:i:s');
			$timeRecord = $current_date_time; //Date('Y-m-d H:i:s');
			if (! $record)
			{
				$dtrMaster = TkDtrmasterPeer::GetDatabyEmployeeNo($this->_G('employee_no'));
				if (($dtrMaster) ):
					if ($dtrMaster->getAmTimeIn()):
						if ($this->_G('ampm') == "AM"):
							$designatedTime = date('Y-m-d') .' '. $dtrMaster->getAmTimeIn();
							$timeRecord =  $actualTime >= $designatedTime ? $actualTime : $designatedTime;
						endif;
					else:
						$restrictTime = array(7);//, 9, 10);  //catch 7am timein
						$hours = DateUtils::DUFormat('H', $timeRecord);
						$minute = DateUtils::DUFormat('i', $timeRecord);
						if ( in_array($hours, $restrictTime ) === true):
							if ( $minute >= 15):
								$timeRecord = DateUtils::DUFormat('Y-m-d ', $timeRecord) . str_pad(intval($hours+1), 2, '0', STR_PAD_LEFT). DateUtils::DUDate(':00:01');
							endif;
						endif;
						//$timeRecord = ($this->_G('ampm') == "AM") ?  $this->_G('military_clock') : $timeRecord;
					endif;
				endif;
//				var_dump(str_pad(intval($hours+1), 2, '0', STR_PAD_LEFT));
//				exit();
				$record = new TkAttendance();
				$record->setDateCreated(DateUtils::GetNow());
				$record->setTimeIn($timeRecord);
				$record->setEmployeeNo($this->_G('employee_no'));
				$record->setName($empInfo->get('NAME'));
				if ($empInfo)
				{
					$messAdd = '&nbsp;&nbsp;&nbsp;Logged-In: '.DateUtils::DUFormat(' h:i a', $record->getTimeIn()) . ' ';
					$this->empName = $empInfo->get('NAME') . $messAdd;
					$this->_SUC($this->empName );
				}else{
					$record->setName('NOT FOUND. PLEASE RESCAN');
					$this->empName = 'NOT FOUND. PLEASE RESCAN' ;
				}
			}else{
				$record->setName($empInfo->get('NAME'));
				$record->setTimeOut($timeRecord);
				$record->setTimeOutOrig($timeRecord);
				$record->setDuration(DateUtils::DateDiff('s', $record->getTimeIn(), $record->getTimeOut()));
				$mesAdd = '&nbsp;&nbsp;&nbsp;&nbsp; Logged-Out: '.DateUtils::DUFormat(' h:i a', $record->getTimeOut()).' ' ;
				$this->empName = $record->getName() . $mesAdd  ;
				$this->_SUC($this->empName );
			}
			$record->setDateModified(DateUtils::GetNow());
			//$record->setModifiedBy($this->_U());
			$record->save();
			
			$this->BackupAttendance($this->_G('employee_no'), $empInfo, $actualTime);
			HrLib::LogThis('SYSTEM DTR',  'Scan Time', '', $this->getModuleName().'/'.$this->getActionName() );
			$this->pos = $record->getId();
			$this->pager = self::ScanInPager();
			$this->_S('name', $empInfo->get('NAME') );
			$this->_S('id', $empInfo->get('ID') );
			$this->_S('employee_no', '');
		}
	}

	public function executeScanInMobile()
	{
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		//sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; For <B>CONVEYOR</B> Daily Scan '. link_to('Click Here', 'dtr/multipleScanIn') . '<br><br>' . ' EMPLOYEE LEAVE '. link_to('Click Here', 'leave/leaveEmployeeApply'));
	
		//echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		//$this->redirectURL = url_for('dtr/timeKeeper')
		//url_for('Go to SCAN-IN for Conveyor', 'dtr/multipleScanIn' );
		//$sdt = Date('Y-m-d 00:00:01');
		//$edt = Date('Y-m-d 23:59:59');
		//        $sdt = DateUtils::DUFormat('Y-m-d', '2008-11-14');
		//        $edt = DateUtils::DUFormat('Y-m-d', '2008-11-14');
	
		$this->pager = self::ScanInPager();
	}
	
	public function executeScanInFingertec()
	{
		HrLib::updateFingerTecScan();
		$this->pager = self::ScanInPager();
	}
	
	public function executeAjaxDtr()
	{
		if (! $this->_G('employee_no'))
		{
			$this->pager = self::ScanInPager();
			$this->empName = 'PLEASE SCAN IDENTIFICATION CARD.';
			return;
		}
		$record = TkAttendancePeer::GetEmpDaily($this->_G('employee_no'), Date('Y-m-d'));
		$empInfo = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($this->_G('employee_no'), array('name','company'));
		
		if (! $empInfo)
		{
			$this->pager = self::ScanInPager();
			$this->_ERF($this->_G('employee_no') . ' Employee Not Found!');
			$this->redirect('dtr/scanIn');
			return;
		}

		
		$actualTime = Date('Y-m-d H:i:s');
		$timeRecord = Date('Y-m-d H:i:s');
		//if ( strtolower($empInfo->get('COMP_NAME')) == 'micronclean'):
		//$timeRecord = ($this->_G('ampm') == "AM") ?  $this->_G('military_clock') : $timeRecord;
		//endif;
		if (! $record)
		{		
			$dtrMaster = TkDtrmasterPeer::GetDatabyEmployeeNo($this->_G('employee_no'));
			if (($dtrMaster) ):
				if ($dtrMaster->getAmTimeIn()):
					if ($this->_G('ampm') == "AM"):
						$designatedTime = date('Y-m-d') .' '. $dtrMaster->getAmTimeIn();
						$timeRecord =  $actualTime >= $designatedTime ? $actualTime : $designatedTime;
					endif;
				else:
					$timeRecord = ($this->_G('ampm') == "AM") ?  $this->_G('military_clock') : $timeRecord;
				endif;
			endif;
		
			$record = new TkAttendance();
			$record->setDateCreated(DateUtils::GetNow());
			$record->setTimeIn($timeRecord);
			$record->setEmployeeNo($this->_G('employee_no'));
			$record->setName($empInfo->get('NAME'));
			if ($empInfo)
			{
				$messAdd = '&nbsp;&nbsp;&nbsp;Logged-In on '.DateUtils::DUFormat('D d, M-Y h:i a', $record->getTimeIn()) . ')';
				$this->empName = $empInfo->get('NAME') . $messAdd;
			}else{
				$record->setName('NOT FOUND. PLEASE RESCAN');
				$this->empName = 'NOT FOUND. PLEASE RESCAN' ;
			}
		}else{
			$record->setName($empInfo->get('NAME'));
			$record->setTimeOut($timeRecord);
			$record->setTimeOutOrig($timeRecord);
			$record->setDuration(DateUtils::DateDiff('s', $record->getTimeIn(), $record->getTimeOut()));
			$mesAdd = '&nbsp;&nbsp;&nbsp;&nbsp; (Logged-Out on '.DateUtils::DUFormat('D d, M-Y h:i a', $record->getTimeOut()).')' ;
			$this->empName = $record->getName() . $mesAdd  ;
		}
		$record->setDateModified(DateUtils::GetNow());
		//$record->setModifiedBy($this->_U());
		$record->save();
		$this->BackupAttendance($this->_G('employee_no'), $empInfo, $actualTime);
		HrLib::LogThis('SYSTEM DTR',  'Scan Time', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->pos = $record->getId();
		$this->pager = self::ScanInPager();
		$this->setLayout(false);
	}
	
	public function BackupAttendance($empNo, $empInfo, $timeRecord)
	{
		$cdt = Date('Y-m-d');
		$record = AttendancePeer::GetEmpDaily($empNo, $cdt);
		if (! $record)
		{
			$record = new Attendance();
			$record->setTimeIn($timeRecord);
			$record->setEmployeeNo($empNo);
			$record->setName($empInfo->get('NAME'));
		}else{
			$record->setName($empInfo->get('NAME'));
			$record->setTimeOut($timeRecord);
			$record->setTimeOutOrig($timeRecord );
			$record->setDuration(DateUtils::DateDiff('s', $record->getTimeIn(), $record->getTimeOut()));
		}
		$record->save();
	}

	public function executeAjaxDtrMultiple()
	{
		$inout = $this->_G('inout');
		$this->empName = ''  ;
		if (! $this->_G('empNo'))
		{
			$this->pager = self::MultipleScanInPager();
			$this->empName = 'PLEASE SCAN IDENTIFICATION CARD.';
			return;
		}
		$empInfo = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($this->_G('empNo'), array('name','company'));
		if (! $empInfo)
		{
			$this->pager = self::MultipleScanInPager();
			$this->empName = 'FAILED, Please Try Again!';
			return sfView::SUCCESS;
		}

		if ($inout == 'IN')
		{
			$record = TkAttendanceMultiplePeer::GetEmpDaily($this->_G('empNo'), Date('Y-m-d'));
			if (! $record)
			{
				$record = new TkAttendanceMultiple();
				$record->setDateCreated(DateUtils::GetNow());
				$record->setTimeIn(Date('Y-m-d H:i:s'));
				$record->setEmployeeNo($this->_G('empNo'));
				$record->setName($empInfo->get('NAME'));
				if ($empInfo)
				{
					$messAdd = '&nbsp;&nbsp;&nbsp;Logged-In on '.DateUtils::DUFormat('D d, M-Y h:i a', $record->getTimeIn()) . ')';
					$this->empName = $empInfo->get('NAME') . $messAdd;
				}else{
					$record->setName('NAME NOT FOUND. PLEASE RESCAN');
					$this->empName = 'NAME NOT FOUND. PLEASE RESCAN' ;
				}
				$record->setDateModified(DateUtils::GetNow());
				$record->save();
				$this->pos = $record->getId();
			}
		}
		if ($inout == 'OUT')
		{
			$rec = TkAttendanceMultiplePeer::GetEmpDaily($this->_G('empNo'), Date('Y-m-d'));
			if ($rec)
			{
				$rec->setName($empInfo->get('NAME'));
				$rec->setTimeOut(Date('Y-m-d H:i:s') );
				$rec->setTimeOutOrig(Date('Y-m-d H:i:s') );
				$rec->setDuration(DateUtils::DateDiff('s', $rec->getTimeIn(), $rec->getTimeOut()));
				$rec->setDateModified(DateUtils::GetNow());
				$rec->save();
				$mesAdd = '&nbsp;&nbsp;&nbsp;&nbsp; (Logged-Out on '.DateUtils::DUFormat('D d, M-Y h:i a', $rec->getTimeOut()).')' ;
				$this->empName = $rec->getName() . $mesAdd  ;
				$this->pos = $rec->getId();
			}
		}
		$this->pager = self::MultipleScanInPager();
		$this->setLayout(false);
	}


	public function ScanInPager()
	{
		$sdt = Date('Y-m-d');
		$edt = Date('Y-m-d');
		$c = new Criteria('scanIn');
		$c->add(TkAttendancePeer::TIME_IN,  'DATE(' . TkAttendancePeer::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . TkAttendancePeer::TIME_IN . ') <= \'' . $edt . '\'', TkAttendancePeer::CUSTOM);
		$c->addDescendingOrderByColumn(TkAttendancePeer::DATE_MODIFIED);
		$c->addDescendingOrderByColumn(TkAttendancePeer::TIME_IN);
// 		$c->add(TkAttendancePeer::EMPLOYEE_NO, '&& || &&', Criteria::CUSTOM);
		//return TkAttendancePeer::GetPager($c);
		return TkAttendancePeer::doSelect($c);
	}

	public function MultipleScanInPager()
	{
		$sdt = Date('Y-m-d');
		$edt = Date('Y-m-d');
		$c = new TkAttendanceMultipleCriteria('scanIn');
		//$c->add(TkAttendanceMultiplePeer::TIME_IN,  'DATE(' . TkAttendanceMultiplePeer::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . TkAttendanceMultiplePeer::TIME_IN . ') <= \'' . $edt . '\'', TkAttendanceMultiplePeer::CUSTOM);
		$c->addDescendingOrderByColumn(TkAttendanceMultiplePeer::DATE_MODIFIED);
		$c->addDescendingOrderByColumn(TkAttendanceMultiplePeer::TIME_IN);
		return TkAttendanceMultiplePeer::GetPager($c);
	}


	public function executeTimeKeeper()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST)
		{
			$curMonth = HrCurrentMonthPeer::GetCurrent();
			$this->_S('sdate', $curMonth['start']);
			$this->_S('edate', $curMonth['end']);
			$this->_S('pdate', $this->_G('refDate')? $this->_G('refDate') : DateUtils::AddDate(Date('Y-m-d'), -1));
			$this->_S('company', $this->_G('comp')? $this->_G('comp') : 'Micronclean');
			$this->_S('empName', '-empty-');
			$this->_S('cyear', DateUtils::DUFormat('Y', $curMonth['start']) );
			$this->_S('cmonth', $curMonth['start']);
		}

// 		This is for the Old Select Employee Window.  Must change the variable to 'name' instead of 'employee_no'
// 		$name = $this->_G('name');
// 		$emp = HrEmployeePeer::GetEmployeeNoByName($name);
// 		$this->_S('employee_no', $emp);

		$emp = $this->_G('employee_no');
		if ($this->_G('search')) //(($this->_G('search', false) !== false))
		{
			$sdt = $this->_G('sdate');
			$edt = $this->_G('edate');
			$empList = array();
			$xcnt = DateUtils::DateDiff('d', $sdt,  $edt );
			$empref  = $this->_G('refEmp');             //employee No
			$refresh = $this->_G('refresh_date');       //force Refresh
			if ($emp)
			{
				$isProc = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRangeNotPosted($emp, $sdt, $edt, array('employee_no') );
				if ( ! $isProc   )
				{
					self::RefreshInfo($emp, $sdt, $edt);
				}
			}
			//----------------------------- force refresh
			if ($empref)
			{
				self::RefreshInfo($empref, $refresh, $refresh);
				$this->_S('pdate', $refresh);
			}
			
			if ($emp)
			{
				$c = new Criteria();
				$c->add(TKDtrsummaryPeer::TRANS_DATE,  'DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TKDtrsummaryPeer::CUSTOM);
				$c->add(TKDtrsummaryPeer::EMPLOYEE_NO, $emp );
				//$c->add(TKDtrsummaryPeer::NAME, '&& || &&', Criteria::CUSTOM );
				$c->addDescendingOrderByColumn(TkDtrsummaryPeer::TRANS_DATE);
				$this->pager = TkDtrsummaryPeer::doSelect($c);
//				$this->var_dump($this->pager);
//				exit();
			}else{
				$sdt = $this->_G('pdate');
				$edt = $this->_G('pdate');
				//$comp = $this->_G('comp')? $this->_G('comp') : $this->_G('company');
				$comp = $this->_G('company');
// 				$c = new Criteria(); //sfCriteria()
// 				$c->add(TkDtrsummaryPeer::TRANS_DATE,  'DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TkDtrsummaryPeer::CUSTOM);
// 				$c->addJoin(TkDtrsummaryPeer::EMPLOYEE_NO, TkDtrmasterPeer::EMPLOYEE_NO);
// 				//$c->addJoin(TkDtrsummaryPeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
// 				$c->add(TkDtrmasterPeer::COMPANY, $this->_G('company') );
// 				if (strtolower($this->_G('company')) == 'micronclean') {
// 					//$c->clearOrderByColumns();
// 					$c->addOrderByField(HrEmployeePeer::EMPLOYMENT_AS, array('FULL-TIME', 'PART-TIME'));
// // 					$c->addAscendingOrderByColumn(TkDtrsummaryPeer::NORMAL);
// // 					$c->addAscendingOrderByColumn(TkDtrsummaryPeer::NAME);
// 				}
// 				//$c->add(TkDtrsummaryPeer::NORMAL, '&& || &&', Criteria::CUSTOM);
// 				$this->pager = TkDtrsummaryPeer::doSelect($c);
//				if (strtolower($this->_G('company')) == 'micronclean') :
				$c = new sfCriteria();
				$c->addJoin(TkDtrsummaryPeer::EMPLOYEE_NO, TkDtrmasterPeer::EMPLOYEE_NO);
				$c->add(TkDtrsummaryPeer::TRANS_DATE,  'DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TkDtrsummaryPeer::CUSTOM);
				$c->add(TkDtrmasterPeer::COMPANY, $this->_G('company') );
				if (strtolower($this->_G('company')) == 'micronclean') :
					$c->addOrderByCase(TkDtrmasterPeer::TK_WORKTEMPLATE_NO, array('STANDARD PART-TIMER SCHEDULE', 'STANDARD TWELVE(12) HOURS') );
				endif;
				$c->addAscendingOrderByColumn(TkDtrsummaryPeer::NAME);
				//$c->add(TkDtrsummaryPeer::NORMAL, '&& || &&', Criteria::CUSTOM);
				$this->pager = TkDtrsummaryPeer::doSelect($c);
			}
		} 

		// POPULATE TIMESHEET
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('tsheet') ):
			$currentMonth   = HrCurrentMonthPeer::GetCurrent();
			$sdt = $currentMonth['start'];
			$edt = $currentMonth['end'];
			$empNo = $this->_G('employee_no');
			echo $empNo.' '. $sdt .' '. $edt;
			$commencedDate = HrEmployeePeer::GetCommenceDate($empNo);
			if (DateUtils::DUFormat('Y-m-01', $sdt) == DateUtils::DUFormat('Y-m-01', $commencedDate) ):
				$sdt = $commencedDate;
			endif;
			if (  ! TkAttendancePeer::GetAttendance($empNo, $sdt, $edt ) ):
				$this->populateTimeSheet($empNo, $sdt, $edt);
				self::RefreshInfo($empNo, $sdt, $edt);
			endif;
		endif;
		
		// POPULATE TIMESHEET
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('populate_oneday') ):
			$empNo = $this->_G('employee_no');
			$commencedDate = HrEmployeePeer::GetCommenceDate($empNo);
			$sdt = $commencedDate;
			$edt = DateUtils::DUFormat('Y-m-t', $commencedDate);
			if (  ! TkAttendancePeer::GetAttendance($empNo, $sdt, $sdt ) ):
				$this->populateTimeSheet($empNo, $sdt, $sdt);
				self::RefreshInfo($empNo, $sdt, $edt);
			endif;
		endif;
		
		// DELETE ENTRIES 
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('deleteEntries') ):
			$empNo = $this->_G('employee_no');
			$sdt   = $this->_G('sdate');
			$edt   = $this->_G('edate');
			TkDtrsummaryPeer::DeletebyEmployeeNo($empNo, $sdt, $edt);
			TkAttendancePeer::DeleteEmployeeTimeIn($sdt, $edt, $empNo);
		endif;
		
		// PROCESS ATTENDANCE
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('computeAttendance') ):
			$sdt   = $this->_G('sdate');
			$edt   = $this->_G('edate');
			$empNo = $this->_G('employee_no');
			HrLib::ComputeAttendance($sdt, $edt, $empNo);
		endif;

		// COMPUTE PER DAY
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('compute') ):
			$sdt = $this->_G('pdate');
			$edt = $this->_G('pdate');
			self::RefreshInfo('', $sdt, $edt);
			//                FinanceSummaryPeer::PostThisValue('payroll', $this->_G('pdate'), TkDtrsummaryPeer::, DateUtils::DUFormat('d', $this->_G('pdate')), $this->_U());
		endif;
		
		// PRINT ATTENDANCE
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('printAttendance') ):
			$empNo =$this->_G('employee_no');
			$sdt   = $this->_G('sdate');
			$edt   = $this->_G('edate');
			$this->PrintAttendance($empNo, $sdt, $edt);
		endif;
		
		//12 HOURS TOPUP
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('12hrstopup') ):
			$empNo =$this->_G('employee_no');
			$sdt   = $this->_G('sdate');
			$edt   = $this->_G('edate');
			$extra = new PayComputeExtra();
			$processMeal = true;
			$extra->AutoTopUp12HrsShiftEmployeeNo($empNo, $sdt, $edt, $processMeal);
			$emparr = array(TkDtrmasterPeer::GetDatabyEmployeeNo($empNo));
			$extra->PrepareDtrData($emparr, $sdt, $edt, $this->_U());
		endif;
		
		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('CMSave') ):
			$rcdt = HrCurrentMonthPeer::GetData();
			if (!$rcdt)
			{
				$rcdt = new HrCurrentMonth();
				$rcdt->setDateCreated(DateUtils::DUNow());
				$rcdt->setCreatedBy($this->_U() );
			}
			$rcdt->setDateModified(DateUtils::DUNow());
			$rcdt->setModifiedBy($this->_U());
			$rcdt->setCdate($this->_G('cyear') . DateUtils::DUFormat('-m-d', $this->_G('cmonth'))  );
			$rcdt->save();
			HrLib::LogThis($this->_U(),  'Update Current Month', '', $this->getModuleName().'/'.$this->getActionName() );
			$this->redirect('dtr/timeKeeper');
		endif;
//		$this->var_dump($this->pager);
//		exit();
//
//		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('finance') )
//		{
//			$batchFile = SF_ROOT_DIR."/batch/dailyUpdate.php";
//			//        	echo $batchFile;
//			//        	exit();
//			echo 'Please wait while Updating File...\n In Progress...';
//			include($batchFile);
//		}
//

//
//		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('descripancy') ){
//			$comp = $this->_G('company');
//			$sdt   = $this->_G('sdate');
//			$edt   = $this->_G('edate');
//			$empList = TkDtrmasterPeer::GetEmployeeNameListActive($comp);
//			$descList = array('empno'=>array(), 'cdate'=>array() );
//			foreach($empList as $empNo=>$empName){
//				$empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdt, $edt) ;
//				foreach($empData as $empDetail){
//					//---------------- employee without timeout
//					if ( ( $empDetail->getLeaveType() != 'Leave without Pay' || $empDetail->getHolidayCode() )
//					&& ($empDetail->getDuration() < 0 ) )	{
//						$descList['empno'][] = $empDetail->getEmployeeNo();
//						$descList['cdate'][] = $empDetail->getTransDate();
//					}
//
//					//---------------- employee with Leave and OT
//					if  ( $empDetail->getLeaveType() != 'Leave without Pay' && $empDetail->getLeaveType() && $empDetail->getPostedAmount()  ) {
//						$descList['empno'][] = $empDetail->getEmployeeNo();
//						$descList['cdate'][] = $empDetail->getTransDate();
//					}
//
//				}
//			}
//			//			var_dump($descList);
//			//			exit();
//			self::DescripancyPDF($descList, $comp, $sdt, $edt);
//			//$dtrData
//		}
//

//		

//		
//		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('deleteEntries') )
//		{
//			$empNo = $this->_G('employee_no');
//			$sdt   = $this->_G('sdate');
//			$edt   = $this->_G('edate');
//			TkDtrsummaryPeer::DeletebyEmployeeNo($empNo, $sdt, $edt);
//			TkAttendancePeer::DeleteEmployeeTimeIn($sdt, $edt, $empNo);
//		}
//
//		if ( ($this->getRequest()->getMethod() == sfRequest::POST) && $this->_G('computeAttendance') )
//		{
//			$sdt   = $this->_G('sdate');
//			$edt   = $this->_G('edate');
//			$empNo = $this->_G('employee_no');
//			HrLib::ComputeAttendance($sdt, $edt, $empNo);
//		}
	}

	public function executeAjaxEditDtr()
	{
		if ( $this->_G('form_time_out') == '' && $this->_G('form_duration') == ''):
			$this->_ERR('Select only time out or duration when editing time');
			return;
		endif;
		sfLoader::loadHelpers(array('Url', 'Text'));
		$sDura = intval($this->_G('form_duration'));
		$this->record = TkDtrsummaryPeer::retrieveByPK($this->_G('form_id'));
		if (!$this->record) {
			echo 'No Summary Record Sorry!';
			return;
		}
		
		$cdat = DateUtils::DUFormat('Y-m-d', $this->_G('form_time_in'));
		$ndura = $sDura * 3600;
		$wtno = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($this->_G('form_employee_no'));
		
		//----------------- if no of hours > 0 then add meal
		if ($sDura ) {
			if ($this->record->getLeaveType() == 'leave without pay' ||
			$this->record->getLeaveType() == 'others(basic only)' ||
			! $this->record->getLeaveType() ){
				$ndura = $ndura + (TkWorktemplatePeer::GetMealBreak($wtno) * 60 );
			}
			$ntout = DateUtils::AddSecondstoTime($this->_G('form_time_in'), $ndura);
		}
		
		if ($this->_G('form_time_out')) {
			$ntout = $this->_G('form_time_out');
		}

		$tkAttendance = TkAttendancePeer::GetEmpDaily ($this->record->getEmployeeNo(), $this->record->getTransDate());
		$ename = HrEmployeePeer::GetNamebyEmployeeNo($this->_G('form_employee_no'));
		

		if (!$tkAttendance)
		{
			//add data in tk_attendance
			$tin = DateUtils::DUFormatTime('Y-m-d H:i:s', $this->_G('form_time_in'));
			$att = new TkAttendance();
			$att->setEmployeeNo($this->_G('form_employee_no'));
			$att->setName($ename, 'Not Registered');
			$att->setTimeIn($tin);
			$att->setTimeOut($ntout);
			$att->setTimeOutOrig($ntout);
			$att->setDuration($ndura);
			$att->save();
			$sdt = DateUtils::DUFormat('Y-m-d', $att->getTimeIn());
			$edt = DateUtils::DUFormat('Y-m-d', $att->getTimeOut());
		}else{
			// update tk attendance
			$tkAttendance->setTimeIn($this->_G('form_time_in'));
			$tkAttendance->setTimeOut($ntout);
			$tkAttendance->setDuration($ndura);
			$tkAttendance->setDateModified(DateUtils::DUNow());
			$tkAttendance->setModifiedBy($this->_U());
			$tkAttendance->save();
			$sdt = DateUtils::DUFormat('Y-m-d', $this->_G('form_time_in'));
			$edt = DateUtils::DUFormat('Y-m-d', $this->_G('form_time_in'));
		}

		//---------------------- update meal
		$meal = $this->_G('form_meal');
		$mrec = TkMealSummaryPeer::GetDatabyEmployeeNo($this->_G('form_employee_no'), $cdat);
		if (! $mrec)
		{
			$mrec = new TkMealSummary();
			$mrec->setEmployeeNo($this->_G('form_employee_no'));
			$mrec->setName($ename, 'Not Registered');
			$mrec->setTransDate($cdat);
			$mrec->setDateCreated(DateUtils::GetNow());
			$mrec->setCreatedBy($this->_U());
		}
		$mrec->setAmount($this->_G('form_meal'));
		$mrec->setDateModified(DateUtils::GetNow());
		$mrec->setModifiedBy($this->_U());
		$mrec->save();
		HrLib::LogThis($this->_U(),  'Update Meal', '', $this->getModuleName().'/'.$this->getActionName() );
		HrLib::ComputeAttendance($cdat, $cdat, $this->_G('form_employee_no'));
		
		$sdt = $cdat;
		$edt = $cdat;
		$c = new Criteria();
		$c->add(TkDtrsummaryPeer::EMPLOYEE_NO ,$this->_G('form_employee_no') );
		$c->add(TkDtrsummaryPeer::TRANS_DATE,  'DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TkDtrsummaryPeer::CUSTOM);
		$this->summary = TkDtrsummaryPeer::doSelectOne($c);
		

		$att = new Criteria();
		$att->add(TkAttendancePeer::TIME_IN,  'DATE(' . TkAttendancePeer::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . TkAttendancePeer::TIME_IN . ') <= \'' . $edt . '\'', TkAttendancePeer::CUSTOM);
		$this->att = TkAttendancePeer::doSelectOne($att);
		
		
	}

	public function executeAjaxEdit()
	{
		$this->redirectURL = '';
		$redirectURL = ('dtr/timeKeeper?employee_no='.$this->_G('empRef').'&sdate='.$this->_G('time_in').'&edate='.$this->_G('time_out') );
		if ( $this->_G('time_out') && $this->_G('duration')):
			$this->_ERF('Select only time out or duration when editing time');
			$this->redirect($redirectURL);
		endif;
		sfLoader::loadHelpers(array('Url', 'Text'));
		$sDura = intval($this->_G('duration'));
		$this->record = TkDtrsummaryPeer::retrieveByPK($this->_G('id'));
		if (!$this->record) {
			$this->forward404();
			return sfView::NONE;
		}

		$cdat = DateUtils::DUFormat('Y-m-d', $this->_G('time_in'));
		$ndura = $sDura * 3600;
		$wtno = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($this->_G('empRef'));
		
		//----------------- if no of hours > 0 then add meal
		if ($sDura ) {
			if ($this->record->getLeaveType() == 'leave without pay' ||
			$this->record->getLeaveType() == 'others(basic only)' ||
			! $this->record->getLeaveType() ){
				$ndura = $ndura + (TkWorktemplatePeer::GetMealBreak($wtno) * 60 );
			}
			$ntout = DateUtils::AddSecondstoTime($this->_G('time_in'), $ndura);
		}
		
		if ($this->_G('time_out')) {
			$ntout = $this->_G('time_out');
		}

		$tkAttendance = TkAttendancePeer::GetEmpDaily ($this->record->getEmployeeNo(), $this->record->getTransDate());
		$ename = HrEmployeePeer::GetNamebyEmployeeNo($this->_G('empRef'));
		

		if (!$tkAttendance)
		{
			//add data in tk_attendance
			$tin = DateUtils::DUFormatTime('Y-m-d H:i:s', $this->_G('time_in'));
			$att = new TkAttendance();
			$att->setEmployeeNo($this->_G('empRef'));
			$att->setName($ename, 'Not Registered');
			$att->setTimeIn($tin);
			$att->setTimeOut($ntout);
			$att->setTimeOutOrig($ntout);
			$att->setDuration($ndura);
			$att->save();
			$sdt = DateUtils::DUFormat('Y-m-d', $att->getTimeIn());
			$edt = DateUtils::DUFormat('Y-m-d', $att->getTimeOut());
		}else{
			// update tk attendance
			$tkAttendance->setTimeIn($this->_G('time_in'));
			$tkAttendance->setTimeOut($ntout);
			$tkAttendance->setDuration($ndura);
			$tkAttendance->setDateModified(DateUtils::DUNow());
			$tkAttendance->setModifiedBy($this->_U());
			$tkAttendance->save();
			$sdt = DateUtils::DUFormat('Y-m-d', $this->_G('time_in'));
			$edt = DateUtils::DUFormat('Y-m-d', $this->_G('time_in'));
		}

		//---------------------- update meal
		$meal = $this->_G('meal');
		$mrec = TkMealSummaryPeer::GetDatabyEmployeeNo($this->_G('empRef'), $cdat);
		if (! $mrec)
		{
			$mrec = new TkMealSummary();
			$mrec->setEmployeeNo($this->_G('empRef'));
			$mrec->setName($ename, 'Not Registered');
			$mrec->setTransDate($cdat);
			$mrec->setDateCreated(DateUtils::GetNow());
			$mrec->setCreatedBy($this->_U());
		}
		$mrec->setAmount($this->_G('meal'));
		$mrec->setDateModified(DateUtils::GetNow());
		$mrec->setModifiedBy($this->_U());
		$mrec->save();
		HrLib::LogThis($this->_U(),  'Update Meal', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->redirect($redirectURL);
	}



	public function PopulateTimeSheet($empNo, $sdt, $edt)
	{
		//echo $empNo.$sdt.$edt;
		$wtno = TkDtrmasterPeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','tk_worktemplate_no'));
        //var_dump($wtno);
		$wtHdr = TkWorktemplatePeer::GetDatabyWorktemplateNo($wtno->get('TK_WORKTEMPLATE_NO'));
		$wtDet = TkWorktemplateDetailPeer::GetWorkTempDetailbyWTNo($wtno->get('TK_WORKTEMPLATE_NO'));
		$cdate = $sdt;

		//$edt = DateUtils::AddDate($edt, -29);
		while ($cdate <= $edt )
		{

			$normal = $this->getNormal($cdate, $wtDet);
			$leave  = HrEmployeeLeavePeer::IsOnleave($empNo, $cdate);
			//echo $normal .' : '. $cdate . '<br>';
			if ($leave){
				if ($leave->getHrLeaveId() != 6 || $leave->getHrLeaveId() != 14) //leave without pay, basic only
				{
					$normal = 0;
				}
			}

			if ( $normal == 0){
				$mealbr = 0;
				$sttime = 0;
			}else{
				$mealbr  = $wtHdr->getMealBreak() * 60;
				$sttime = 30600;
			}
			$record= TkAttendancePeer::GetEmpDaily($empNo, $cdate);

			if (!$record)
			{
				$record = new TkAttendance();
				$record->setEmployeeNo($empNo);
				$record->setName($wtno->get('NAME'));
				$record->setTimeIn(DateUtils::AddSecondstoTime($cdate, $sttime));
				$record->setTimeOut(DateUtils::AddSecondstoTime($cdate, $sttime + ($normal * 3600) + $mealbr));
				$record->setDuration(DateUtils::DateDiff('s', $record->getTimeIn(), $record->getTimeOut()));
				$record->setDateModified(DateUtils::GetNow());
				$record->setModifiedBy($this->_U());
				$record->setDateCreated(DateUtils::GetNow());
				$record->setCreatedBy($this->_U());
				$record->save();
				HrLib::LogThis($this->_U(),  'ADD ATTENDANCE', '', $this->getModuleName().'/'.$this->getActionName() );
			}
			$cdate = DateUtils::AddDate($cdate, 1);
		}

	}

	public function GetNormal($cdate, $arr)
	{
		$pos = 0;
		if ($arr)
		{
			if (in_array($cdate, $arr['date']) )
			{
				$pos = array_search($cdate, $arr['date']);
				return $arr['no_hours'][$pos];
			}
		}
		return null;
	}

	public function executeTeamAssignment()
	{
		sfConfig::set('app_page_heading', 'Team Grouping');
		$c = new HrEmployeeCriteria();
		$c->add(HrEmployeePeer::TEAM, '', Criteria::NOT_EQUAL);
		$this->pager = HrEmployeePeer::GetPager($c);
			
	}

	public function executeTeamMemberEdit()
	{
		sfConfig::set('app_page_heading', 'Team Grouping' . ' &raquo; Edit Team Member');
		$id = $this->_G('id');
		$record = HrEmployeePeer::retrieveByPK($id);
		if (! $record)
		{
			$this->forward404('default', 'module');
		}
		$this->_S('employee_no', $record->getEmployeeNo());
		$this->setTemplate('teamMemberAdd');
	}

	public function executeTeamMemberDelete()
	{
		$id = $this->_G('id');
		$record = HrEmployeePeer::retrieveByPK($id);
		if (! $record)
		{
			$this->forward404('default', 'module');
		}
		$team = $record->getTeam();
		$record->setTeam('');
		$record->save();
		HrLib::LogThis($this->_U(),  'Update Team', '', $this->getModuleName().'/'.$this->getActionName() );
		$this->_SUF('Record <b>' . $record->getEmployeeNo() . '</b> removed in <b>' . $team .' </b>Team.');
		$this->redirect('dtr/teamAssignment');
	}


	public function executeIndividualPaySlip()
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->pcode  = $this->_G('period_code');
			$this->mess  = $this->_G('bank_cash');
			$this->sdt    = $this->GetStartDate($this->pcode);
			$this->edt    = $this->GetEndDate($this->pcode);
			$this->empNoList = array($this->_G('employee_no')=>$this->_G('employee_no'));
			//$this->mess   = 'ALL';

			$this->setTemplate('individualPaysllipPreview', $this->empNoList);

			//$this->OfficialPayslipHTMLVersion($pcode, 'ALL', $empNoList);
			//return sfView::NONE;
		}
	}

	public function GetStartDate($pcode)
	{
		$dt = substr($pcode, 0, 8);
		//return DateUtils::DUFormat('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
		return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
	}

	public function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
	}

	public function executeMultipleScanIn()
	{
		$this->_S('inout', 'IN');
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		//sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Conveyor Daily Scan');
		sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; For Daily Scan '. link_to('Click Here', 'dtr/scanIn' ));
		$this->pager = self::MultipleScanInPager();
	}


	public function executeEmergencyScanIn()
	{
		sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Daily Scan Emergency');
		$this->pager = self::ScanInPager();
	}

	public function executeAjaxDtrEmergency()
	{
		if (! $this->_G('empNo'))
		{
			$this->pager = self::ScanInPager();
			$this->empName = 'PLEASE SCAN IDENTIFICATION CARD.';
			return;
		}
		$record = TkAttendancePeer::GetEmpDaily($this->_G('empNo'), Date('Y-m-d'));
		$empInfo = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($this->_G('empNo'), array('name','company'));
		if (! $empInfo)
		{
			$this->pager = self::ScanInPager();
			$this->empName = 'FAILED, Please Try Again!';
			return sfView::SUCCESS;
		}
		if (! $record)
		{
			$record = new TkAttendance();
			$record->setDateCreated(DateUtils::GetNow());
			//$record->setTimeIn(Date('Y-m-d H:i:s'));
			$record->setTimeIn( mktime(8, 30, 0, 3, 31, 2009) );
			$record->setEmployeeNo($this->_G('empNo'));
			$record->setName($empInfo->get('NAME'));
			if ($empInfo)
			{
				$messAdd = '&nbsp;&nbsp;&nbsp;Logged-In on '.DateUtils::DUFormat('D d, M-Y h:i a', $record->getTimeIn()) . ')';
				$this->empName = $empInfo->get('NAME') . $messAdd;
			}else{
				$record->setName('NOT FOUND. PLEASE RESCAN');
				$this->empName = 'NOT FOUND. PLEASE RESCAN' ;
			}
		}else{
			$record->setName($empInfo->get('NAME'));
			$record->setTimeOut(Date('Y-m-d H:i:s') );
			$record->setTimeOutOrig(Date('Y-m-d H:i:s') );
			$record->setDuration(DateUtils::DateDiff('s', $record->getTimeIn(), $record->getTimeOut()));
			$mesAdd = '&nbsp;&nbsp;&nbsp;&nbsp; (Logged-Out on '.DateUtils::DUFormat('D d, M-Y h:i a', $record->getTimeOut()).')' ;
			$this->empName = $record->getName() . $mesAdd  ;
		}
		$record->setDateModified(DateUtils::GetNow());
		//$record->setModifiedBy($this->_U());
		$record->save();
		$this->pos = $record->getId();
		$this->pager = self::ScanInPager();
		$this->setLayout(false);
	}


	public function DescripancyPDF($data, $co, $sdt, $edt)
	{
		//        echo $co.' - '.$wt.' = ' .($wt == 0);
		//        exit();
		$pdf = new PdfLibrary();
		$pdf->addPage('Arial', 10, 'L');
		$y = 7;
		$x = 13;
		$xpos = 0;
		$pdf->printTCKhooHeader();
		$pdf->printBoldLn( $x + 45, $xpos++   + $y, 'DAILY TIME RECORD - DESCRIPANCY LIST', 'Arial', 12);
		$pdf->printLn( $x+50 ,       $xpos++   + $y, $co . ' ( '. DateUtils::DUFormat('M-Y', $sdt) . ' )', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, ' SEQ  EMPLOYEE #              NAME                                     DATE       DURATION        HOLIDAY     LEAVE TYPE     AMOUNT', 'Arial', 11 );
		$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );


		$seq = 1;
		$pos = 0;
		$addinfo = '';
		//		var_dump($data['empno']);
		//		exit();

		foreach($data['empno'] as $ke=>$empNo)
		{
			$pos = $ke;
			$cdate = $data['cdate'][$pos];
			if ($xpos > 30 )
			{
				$pdf->Footer();
				$pdf->addPage('Arial', 10, 'L');
				$xpos = 0;
				$y    = 3;
				$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
				$pdf->printLn( $x,          $xpos++   + $y, ' SEQ  EMPLOYEE #              NAME                                     DATE       DURATION        HOLIDAY     LEAVE TYPE     AMOUNT', 'Arial', 11 );
				$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
			}
			$empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDate($empNo, $cdate);
			if ($empData)
			{
				$pdf->printLn( $x, $xpos  + $y, $seq++, 'Arial', 10 );
				$pdf->printLn( $x+10, $xpos   + $y, $empData->getEmployeeNo(), 'Arial', 10 );
				$pdf->printLn( $x+45, $xpos   + $y, substr($empData->getName(), 0, 25), 'Arial', 10 );
				$pdf->printLn( $x+100, $xpos   + $y, $empData->getTransDate() );
				$pdf->printLn( $x+130, $xpos   + $y, $empData->getDuration() );
				$pdf->printLn( $x+142, $xpos   + $y, $empData->getHolidayCode() );
				$pdf->printLn( $x+175, $xpos   + $y, $empData->getLeaveType() );
				$pdf->printLn( $x+205, $xpos   + $y, $empData->getPostedAmount() );
				$xpos++;
				$pos++;

			}
		}
		$pdf->Footer();
		$pdf->closePDF('testing.pdf');
		exit();


	}

	public function executeDisplayTimeKeeper()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST)
		{
			//            $this->_S('sdate', DateUtils::GetPrevMonthStartDate());
			//            $this->_S('edate', DateUtils::GetPrevMonthEndDate());
			//            $this->_S('sdate', DateUtils::GetThisMonthStartDate());
			//            $this->_S('edate', DateUtils::GetThisMonthEndDate());

			$curMonth = HrCurrentMonthPeer::GetCurrent();

			$this->_S('sdate', $curMonth['start']);
			$this->_S('edate', $curMonth['end']);

			$this->_S('pdate', $this->_G('refDate')? $this->_G('refDate') : DateUtils::AddDate(Date('Y-m-d'), -1));
			$this->_S('company', $this->_G('comp')? $this->_G('comp') : 'Micronclean');
			$this->_S('empName', '-empty-');
			$this->_S('cyear', DateUtils::DUFormat('Y', $curMonth['start']) );
			$this->_S('cmonth', $curMonth['start']);
		}

		if (($this->_G('search', false) !== false))
		{
			$sdt = $this->_G('sdate');
			$edt = $this->_G('edate');
			$empList = array();
			$xcnt = DateUtils::DateDiff('d', $sdt,  $edt );
			$emp = $this->_G('employee_no');
			$empref  = $this->_G('refEmp');             //employee No
			$refresh = $this->_G('refresh_date');       //force Refresh

			if ($emp)
			{
				$c = new TkDtrsummaryCriteria();
				$c->add(TKDtrsummaryPeer::TRANS_DATE,  'DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TKDtrsummaryPeer::CUSTOM);
				$c->add(TKDtrsummaryPeer::EMPLOYEE_NO, $emp );
				$c->addDescendingOrderByColumn(TkDtrsummaryPeer::TRANS_DATE);
				$this->pager = TkDtrsummaryPeer::GetPagerCount($c, ($xcnt + 1) );
			}
		} //method::get

		//		if ($this->_U()){
		//			$this->cUser = $this->_U();
		//		}

		if (($this->_G('masterlist', false) !== false))
		{
			$this->MasterlistInsurance('Nanoclean','','' );
		}

		if (($this->_G('attendance', false) !== false))
		{
			$sdt = $this->_G('sdate');
			$edt = $this->_G('edate');
			$this->NumonyxAttendance('Nanoclean','','', $sdt, $edt);
		}
			
	}

	public function MasterlistInsurance($co=null, $wt=null, $team=null)
	{
		//        echo $co.' - '.$wt.' = ' .($wt == 0);
		//        exit();
		$pdf = new PdfLibrary();
		$pdf->addPage('Arial', 10, 'L');
		$y = 7;
		$x = 10;
		$xpos = 0;
		$pdf->printTCKhooHeader();
		$pdf->printBoldLn( $x + 65, $xpos++   + $y, 'EMPLOYEE MASTERLIST FOR NUMONYX', 'Arial', 12);
		$pdf->printLn( $x+50 + (($wt)? 0 : 22),       $xpos++   + $y, $co.'  - Numonyx On-Site', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, 'SEQ           NAME                                      COMMENCE          SECTION                                                     BASIC PAY', 'Arial', 11 );
		$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		$empData = HrEmployeePeer::GetNumonyxNameList();
		$seq = 1;
		$pos = 5;
		$addinfo = '';
		foreach($empData as $empNo=>$name)
		{
			if (strtoupper(substr($empNo, 0, 1)) != "S"){
				if ($pos > 30 )
				{
					$pdf->Footer();
					$pdf->addPage('Arial', 10, 'L');
					$xpos = 0;
					$y    = 3;
					$pos  = 0;
					$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
					$pdf->printLn( $x,          $xpos++   + $y, 'SEQ           NAME                                      COMMENCE          SECTION                                              BASIC PAY', 'Arial', 11 );
					$pdf->printLn( $x,          $xpos++   + $y, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
				}

				$addinfo = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
				$bp      = PayBasicPayPeer::GetLastPayByEmployeeNo($empNo);
				if ($addinfo){
					$pdf->printLn( $x, $xpos  + $y, $seq++.'.', 'Arial', 10 );

					$pdf->printLn( $x+10, $xpos   + $y, substr($addinfo->getName(), 0, 25), 'Arial', 10 );
					$pdf->printLn( $x+75, $xpos   + $y, $addinfo->getCommenceDate() );
					$pdf->printLn( $x+105, $xpos   + $y, $addinfo->getTeam() );
					$pdf->printLn( $x+185, $xpos   + $y, number_format($bp, 2)  );  //$addinfo->getSinId()
					$xpos++;
					$pos++;
				}
			}
		}
		$pdf->Footer();
		$pdf->closePDF('testing.pdf');
		exit();
	}

	public function NumonyxAttendance($co=null, $wt=null, $team=null, $sdt, $edt)
	{
		$pdf = new PdfLibrary();
		$pdf->addPage('Arial', 10);
		$y = 7;
		$x = 10;
		$xpos = 0;
		$pdf->printKelstarHeader();
		$pdf->printBoldLn( $x + 65, $xpos++   + $y, 'MICRON ATTENDANCE LOG', 'Arial', 12);
		//$pdf->printLn( $x+50 + (($wt)? 0 : 22),       $xpos++   + $y, $co.'  - MICRON On-Site', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, '------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		$pdf->printLn( $x,          $xpos++   + $y, 'SEQ           NAME                                         DATE         TIMEIN      TIMEOUT     DURATION', 'Arial', 11 );
		$pdf->printLn( $x,          $xpos++   + $y, '------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
		//		$empList = HrEmployeePeer::GetNumonyxEmpNoList();
		//$empData = TkAttendancePeer::GetAttendanceFromList($sdt, $edt, $empList);
		$empData = TkBiometricLogPeer::GetAttendanceFromList($sdt, $edt);
		//		var_dump($empData);
		//		exit();
		$seq = 1;
		$pos = 5;
		$addinfo = '';
		$dura = 0;
		foreach($empData as $att)
		{
			if ($pos > 50 )
			{
				$pdf->Footer();
				$pdf->addPage('Arial', 10);
				$xpos = 0;
				$y    = 3;
				$pos  = 0;
				$pdf->printLn( $x,          $xpos++   + $y, '------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
				$pdf->printLn( $x,          $xpos++   + $y, 'SEQ           NAME                                         DATE         TIMEIN      TIMEOUT     DURATION', 'Arial', 11 );
				$pdf->printLn( $x,          $xpos++   + $y, '------------------------------------------------------------------------------------------------------------------------------------', 'Arial', 12 );
			}

			$addinfo = HrEmployeePeer::GetDatabyEmployeeNo($att->getUserId());
			if ($addinfo){
				$dura = DateUtils::DateDiff('n', $att->getTimeIn(), $att->getTimeOut() );
				$dura = number_format($dura /60, 1 );
				$dura = $dura > 0? $dura . ' hrs' : '-';
				$pdf->printLn( $x, $xpos  + $y, $seq++.'.', 'Arial', 10 );
				$pdf->printLn( $x+10, $xpos   + $y,  substr($addinfo->getName(), 0, 25), 'Arial', 10 );
				$pdf->printLn( $x+72, $xpos   + $y,  DateUtils::DUFormat('Y-m-d', $att->getTransDate() ) );
				$pdf->printLn( $x+95, $xpos   + $y,  substr($att->getTimeIn(), 0, 5 ) );
				$pdf->printLn( $x+115, $xpos   + $y, substr($att->getTimeOut(), 0, 5 ) );
				$pdf->printLn( $x+135, $xpos   + $y, $dura );
				$xpos++;
				$pos++;
			}

		}
		$pdf->Footer();
		$pdf->closePDF('testing.pdf');
		exit();
	}

	public function executeAdjustTime()
	{
		if ( $this->getRequest()->getMethod() != sfRequest::POST)
		{
			$curMonth = HrCurrentMonthPeer::GetCurrent();

			$this->_S('cdate', $this->_G('refDate')? $this->_G('refDate') : DateUtils::AddDate(Date('Y-m-d'), -1));
			$this->_S('timeIn', '08:00:00');
			$this->_S('company', $this->_G('comp')? $this->_G('comp') : 'Micronclean');
			$this->_S('cyear', DateUtils::DUFormat('Y', $curMonth['start']) );
			$this->_S('cmonth', $curMonth['start']);
			$this->_S('isChecked', '');
		}

		if ( $this->getRequest()->getMethod() == sfRequest::POST)
		{
			$cdate = $this->_G('cdate');
			$timeIn = $cdate . ' '. $this->_G('timeIn');
			$empList = array();
				
			//			if ($this->_G('mark')){
			////				$this->isChecked = true;
			//				$this->_S('isChecked', 'true');
			//				//$this->redirect('dtr/adjustTime?isChecked=true' );
			//			}
			//
			//			if ($this->_G('unmark')){
			//				$this->_S('isChecked', '');
			//			}
			//
			//			if ($this->_G('save')){
			//				$this->_S('isChecked', 'false');
			//			}
				
				
			$c = new Criteria();
			$c->add(TKDtrsummaryPeer::TRANS_DATE,  'DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') >= \'' . $cdate . '\' AND DATE(' . TKDtrsummaryPeer::TRANS_DATE . ') <= \'' . $cdate . '\'', TKDtrsummaryPeer::CUSTOM);
			$c->addJoin(TkDtrsummaryPeer::EMPLOYEE_NO, TkDtrmasterPeer::EMPLOYEE_NO);
			$c->add(TkDtrmasterPeer::COMPANY, $this->_G('company'));
			$c->addAscendingOrderByColumn(TkDtrsummaryPeer::NAME);
			$this->pager = TkDtrsummaryPeer::GetPagerCount($c, 100 );
			$idList = array();
			if ($this->_G('save')){
				$cnt = $this->pager->getNbResults();
				for($x=1; $x<= $cnt; $x++){
					if ($this->_G('cb_' . $x)) {
						$idList[] = $this->_G('cb_' . $x);
					}
				}
			}
			//			var_dump($idList);
			$batch = DateUtils::DUFormat("Ymd",$this->_G('cdate')).'-'.DateUtils::DUFormat("Ymd",$this->_G('cdate')) ;
			$extra = new PayComputeExtra();
			foreach($idList as $dtrID){
				$dtr = TkDtrsummaryPeer::retrieveByPK($dtrID);
				$att = TkAttendancePeer::GetEmpDaily($dtr->getEmployeeNo(), $dtr->getTransDate());
				if ($att) {
					$att->setTimeIn($timeIn);
					$att->save();
					$emparr = array(TkDtrmasterPeer::GetDatabyEmployeeNo($dtr->getEmployeeNo()));
					$extra->PrepareDtrData($emparr, $this->_G('cdate'), $this->_G('cdate'), 'CHANGE TIMEIN');
					$extra->BuildDtrsummary($dtr->getEmployeeNo(), $this->_G('cdate'),$this->_G('cdate'), 'CHANGE TIMEIN', $batch);
				}
			}
				
				
				
				
				
		}
	}

	public function executeUploadBiometrics()
	{
		$fileName = $this->getRequest()->getFileName('file');
		if ($this->_G('send')){
			if ($_FILES['file']['type'] == 'text/plain') {
				$this->getRequest()->moveFile('file', sfConfig::get('sf_app_biometrics_dir').$fileName  .'_'.date('Y-m-d'));
				$dtr = $this->ProcessBiometricData($fileName);
				switch ($dtr)
				{
					case 0:
						$this->_ERR($fileName . ' - No Valid Data is Present');
						break;
					case 1:
						$this->_SUC($fileName . ' - Biometric data has been saved and processed');
						break;
					case 2:
						$this->_ERR($fileName . ' - Data Count Error');
						break;
				}

			}else{
				$this->_ERR($fileName . ' - is Invalid or Missing!');
			}

			//			$id = $this->_G('id');
			//			$empData = HrEmployeePeer::retrieveByPK($id);
			//			$cfile = $this->getRequest()->moveFile('file', sfConfig::get('sf_app_biometrics_dir').'/'.$fileName );
			//			$rec = new HrEmployeeDocument();
			//			$rec->setEmployeeNo($empData->getEmployeeNo());
			//			$rec->setName($empData->getName());
			//			$rec->setFileName($_FILES['file']['name']);
			//			$rec->setMimeType($_FILES['file']['type']);
			//			$rec->setSize($_FILES['file']['size']);
			//			$rec->setDescription($this->_G('docdesc'));
			//			$rec->setDateCreated(DateUtils::DUNow());
			//			$rec->setCreatedBy($this->_U());
			//			$rec->setDateModified(DateUtils::DUNow());
			//			$rec->setModifiedBy($this->_U());
			//			$rec->save();
			//			var_dump('its here');
			//var_dump($cfile);
		}
	}

	public function executeUploadRawData()
	{
		$fileName = $this->getRequest()->getFileName('file');
		if ($this->_G('send')){
			if ($_FILES['file']['type'] == 'text/plain') {
				$this->getRequest()->moveFile('file', sfConfig::get('sf_app_biometrics_dir').$fileName  .'_'.date('Y-m-d'));
				$dtr = $this->ProcessBiometricRawData($fileName);
				switch ($dtr)
				{
					case 0:
						$this->_ERR($fileName . ' - No Valid Data is Present');
						break;
					case 1:
						$this->_SUC($fileName . ' - Biometric data has been saved and processed');
						break;
					case 2:
						$this->_ERR($fileName . ' - Data Count Error');
						break;
				}

			}else{
				$this->_ERR($fileName . ' - is Invalid or Missing!');
			}

			//			$id = $this->_G('id');
			//			$empData = HrEmployeePeer::retrieveByPK($id);
			//			$cfile = $this->getRequest()->moveFile('file', sfConfig::get('sf_app_biometrics_dir').'/'.$fileName );
			//			$rec = new HrEmployeeDocument();
			//			$rec->setEmployeeNo($empData->getEmployeeNo());
			//			$rec->setName($empData->getName());
			//			$rec->setFileName($_FILES['file']['name']);
			//			$rec->setMimeType($_FILES['file']['type']);
			//			$rec->setSize($_FILES['file']['size']);
			//			$rec->setDescription($this->_G('docdesc'));
			//			$rec->setDateCreated(DateUtils::DUNow());
			//			$rec->setCreatedBy($this->_U());
			//			$rec->setDateModified(DateUtils::DUNow());
			//			$rec->setModifiedBy($this->_U());
			//			$rec->save();
			//			var_dump('its here');
			//var_dump($cfile);
		}
	}

	public function ProcessBiometricData($fileName)
	{
		$fname = sfConfig::get('sf_app_biometrics_dir').$fileName  .'_'.date('Y-m-d');
		$line = '';
		$flag = 0;
		if (!file_exists($fname)) return -3;
		$fArr = file($fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($fArr as $line)
		{
			$rec = explode(',' , $line);
			if (count($rec))
			{
				$flag = 2;
			}
			$uID  = isset($rec[0]) ? trim(str_replace('"','', $rec[0])) : '';
			$name = isset($rec[1]) ? trim(str_replace('"','', $rec[1])) : '';
			$dt   = isset($rec[2]) ? trim(str_replace('"','', $rec[2])) : '';
			$tIn  = isset($rec[3]) ? trim(str_replace('"','', $rec[3])) : '';
			$tOut = isset($rec[4]) ? trim(str_replace('"','', $rec[4])) : '';
			$ot   = isset($rec[5]) ? trim(str_replace('"','', $rec[5])) : '';
			$bio = TkBiometricLogPeer::GetDataByUIDDate($uID, $dt);
			$dt = str_replace('/','-', $dt);
				
			$tIn = $tIn? $tIn .':00' : '';
			$tOut = $tOut? $tOut .':00' : '';
				
			if (!$bio)
			{
				$bio = new TkBiometricLog();
				$bio->setCreatedBy($this->_U());
				$bio->setDateCreated(DateUtils::DUNow());
			}
			$empNo = HrEmployeePeer::GetEmployeeNoByFinNo($uID);
			$bio->setUserId($uID);
			$bio->setName($name);
			$bio->setTransDate($dt);
			$bio->setTimeIn($tIn);
			$bio->setTimeOut($tOut);
			$bio->setOt($ot);
			$bio->setUploadDate(DateUtils::DUNow());
			$bio->setSource($fname);
			$bio->setEmployeeNo($empNo);
			$bio->save();
				
			//$employeeMaster = HrEmployeePeer::
			if ($empNo)
			{
				$att = TkAttendancePeer::GetEmpDaily($empNo, $dt);
				if (!$att)
				{
					$att = new TkAttendance();
					$att->setCreatedBy($this->_U());
					$att->setDateCreated(DateUtils::DUNow());
				}
				$timeIn = str_replace('/','-', $dt) . ' '. $tIn;
				$timeIn = DateUtils::BioTime('Y-m-d H:i:s', trim($timeIn));

				$timeOut = str_replace('/','-', $dt) . ' '. $tOut;
				$timeOut = DateUtils::BioTime('Y-m-d H:i:s', trim($timeOut));
				//				$timeOut = '';

				$att->setEmployeeNo($bio->getEmployeeNo());
				$att->setName($name);
				$att->setTimeIn($timeIn);
				$att->setTimeOut($timeOut);
				$att->setTimeOutOrig($timeOut);
				$att->setCreatedBy('BIOMETRICS');
				$att->save();
				//echo $name .' - '. $timeIn . ' '. $timeOut .'<br>';
				//echo $name .' - '. $xdt . '<br>';
			}
			$flag = 1;
		}
		return $flag;
	}

	public function ProcessBiometricRawData($fileName)
	{
		$fname = sfConfig::get('sf_app_biometrics_dir').$fileName  .'_'.date('Y-m-d');
		$line = '';
		$flag = 0;
		$xvar = '';
		if (!file_exists($fname)) return -3;
		$fArr = file($fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($fArr as $line)
		{
			$rec = '';
			$rec = explode(',' , $line);
			if (count($rec) < 5)
			{
				$rec[0] = '0';
				$rec[1] = 'xx';
				$rec[2] = '01/01/1970 00:00:01';
				$rec[3] = '0';
				$rec[4] = '0';
				$rec[5] = '01/01/1970';
				$rec[6] = '0';
				$rec[7] = '0';
				$rec[8] = '0';
				$rec[9] = '0';
			}
//			echo $line .' = '. $rec[2] . '<br>';
//			var_dump($rec);
//			var_dump($rec);
//			echo '<br>';
			
			$clkid   = isset($rec[0]) ? trim(str_replace('"','', $rec[0])) : '';
			$badgeno = isset($rec[1]) ? trim(str_replace('"','', $rec[1])) : '';
			$punchin = isset($rec[2]) ? trim(str_replace('"','', $rec[2])) : '';
			$xtion   = isset($rec[3]) ? trim(str_replace('"','', $rec[3])) : '';
			$activity= isset($rec[4]) ? trim(str_replace('"','', $rec[4])) : '';
			$transdt = isset($rec[5]) ? trim(str_replace('"','', $rec[5])) : '';
			$slot    = isset($rec[6]) ? trim(str_replace('"','', $rec[6])) : '';
			$clk_v   = isset($rec[7]) ? trim(str_replace('"','', $rec[7])) : '';
			$atetime = isset($rec[8]) ? trim(str_replace('"','', $rec[8])) : null;
			$ate     = isset($rec[9]) ? trim(str_replace('"','', $rec[9])) : '';

			$punchin = str_replace('/','-', $punchin);
			$raw = TkBiometricRawDataPeer::GetDataBadgeNoDateTime($badgeno, $punchin);
			//$transdt = date("Y-", strtotime($transdt)).date("m-", strtotime($transdt)).date("d", strtotime($transdt));
			//---------------- this is block
			$punchin = self::TransFormBioTime($punchin);
			$xvar = explode(' ',$punchin);
			$transdt = isset($xvar[0])? $xvar[0] : '';
			
//			if (! $transdt){
//				exit();
//			}

			
//			var_dump($transdt);
//			exit();
			
//			$xvar = explode(' ',$punchin);
//			$transdt = $punchin;
//			$punchin = $punchin .' '. $xvar[1];
			//---------------- donot re arrange


			if (!$raw)
			{
				$raw = new TkBiometricRawData();
				$raw->setCreatedBy($this->_U());
				$raw->setDateCreated(DateUtils::DUNow());
			}
			$raw->setClkid($clkid);
			$raw->setBadgeno($badgeno);
			$raw->setpunchin($punchin);
			$raw->setXtion($xtion);
			$raw->setActivity($activity);
			$raw->setTransdate($transdt);
			$raw->setSlot($slot);
			$raw->setClockV($clk_v);
			$raw->setAtetime($atetime);
			$raw->setAte($ate);
			$raw->save();
			
			if ($badgeno) {
				$bio = HrEmployeePeer::GetDatabyFinNo($badgeno);
			}
			if ($bio && $badgeno)
			{	
				
//			var_dump($transdt);
//			exit();
							
				$timeIn = '';
				$timeOut = '';
				$att = TkAttendancePeer::GetDaily($bio->getEmployeeNo(), $transdt);
				if (! $att)
				{
					$att = new TkAttendance();
					$att->setCreatedBy($this->_U());
					$att->setDateCreated(DateUtils::DUNow());
				}
				
				// timeIn/TimeOut Only Determine the earliest TimeIn and latest TimeOut
				if( $activity == self::BIO_CHECK_IN || $activity == self::BIO_OT_IN)
				{
					$timeIn = self::DetermineTimeIn($att->getTimeIn(), $punchin);
				}
				
				if( $activity == self::BIO_CHECK_OUT || $activity == self::BIO_OT_OUT)
				{
					$timeOut = self::DetermineTimeOut($att->getTimeOut(), $punchin);
				}
				$att->setEmployeeNo($bio->getEmployeeNo());
				$att->setName($bio->getName());
				if ($timeIn) $att->setTimeIn($timeIn);
				if ($timeOut) :
					$att->setTimeOut($timeOut);
					$att->setTimeOutOrig($timeOut);
				endif;
				$att->setCreatedBy('BIOMETRICS');
				$att->save();
			}
			$flag = 1;
		}
		return $flag;
	}

	
	public static function TransFormBioTime($bioTime)
	{
		if ($bioTime){
			$cdt = explode(' ',$bioTime);
			$dt = isset($cdt[0])? trim($cdt[0]) : '';	
			$tm = isset($cdt[1])? $cdt[1] : '';
			$dy = isset($cdt[2])? $cdt[2] : '';
			//$dt = date("Y-", strtotime($dt)); //. date("m-", strtotime($dt)).date("d", strtotime($dt));
			$adt = explode('-',$dt);
			if (is_array($adt) )
			{
				$dt = $adt[2] .'-'. $adt[0].'-'. $adt[1];
			}
			
			//time processing
			$atm = explode(':', $tm);
			if (is_array($atm) )
			{
				$ntm = intval($atm[0]); //get hour
				if (strtolower($dy) == 'pm' && $ntm <> 12){
					$ntm = $ntm + 12; //+12 hours if pm
				}
				$ntm = str_pad($ntm, 2, "0", STR_PAD_LEFT);
				$tm = $ntm .':'. $atm[1].':'. $atm[2];
			}
			$dt = DateUtils::TransFormToStandardDate($dt);
			return $dt .' '. $tm;
		}
	}
	
	public static function DetermineTimeIn($fromAtt, $fromRaw)
	{
		if (!$fromAtt) {
			return $fromRaw;
		}
		if (!$fromRaw) {
			return $fromAtt;
		}	
		
		if ($fromAtt && $fromRaw){
			$cdt = $fromAtt < $fromRaw ? $fromAtt : $fromRaw ; //check the earliest time
		}
		
		return $cdt;
	}

	public static function DetermineTimeOut($fromAtt, $fromRaw)
	{
		if (!$fromAtt) {
			return $fromRaw;
		}
		if (!$fromRaw) {
			return $fromAtt;
		}	
		
		if ($fromAtt && $fromRaw){
			$cdt = $fromAtt > $fromRaw ? $fromAtt : $fromRaw ; //check the latest time
		}
		return $cdt;
	}	
	
	
	public function PrintAttendance($empNo, $sdt, $edt)
	{
		$pdf = new PdfLibrary();
		$x = 0;
		$y = 0;
		$pdf->addPage();
		$xpos = 2;
		$pdf->printTCKhooHeader();
		$x = 13;
		$y = 5;

		$pdf->printBoldLn( $x+45,   $xpos++ + $y, HrEmployeePeer::GetNamebyEmployeeNo( $empNo ) .  ' Attendance Sheet','Arial', '13' );
		$pdf->printBoldLn( $x+55,   $xpos++ + $y, ' For the Period '. DateUtils::DUFormat('M j - ', $sdt).DateUtils::DUFormat('j,', $edt).DateUtils::DUFormat(' Y', $sdt) ,'Arial', '12' );
		$xpos++;
		$pdf->printLn( $x,          $xpos++   + $y, '=========================================================================================', 'Arial', 10);
		$pdf->printLn( $x,          $xpos++   + $y, '   DATE         TIME-IN    TIME-OUT     DURATION      NORMAL     OT       U-TIME      STATUS', 'Arial', 10);
		$pdf->printLn( $x,          $xpos++   + $y, '=========================================================================================', 'Arial', 10 );
		$seq = 1;
		$empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdt, $edt);
		$gdura = 0;
		$gnormal = 0;
		$gOt = 0;
		$gUt = 0;
		foreach ($empData as $rec)
		{
			$tin = '';
			$tout = '';
			$cdt = $rec->getTransDate();
			$daily = TkAttendancePeer::GetEmpDaily($empNo, $rec->getTransDate());
			if ($daily) {
				$tin =  substr($daily->getTimeIn(), 11);
				$tout = substr($daily->getTimeOut(), 11);
			}

			$dura = $rec->getDuration() / 3600;
			$tin  = $dura?  $tin  : strtoupper(DateUtils::DUFormat('l', $cdt));
			$cdura = $dura ? intval($dura) .' hrs | ' . round($dura - intval($dura), 1 ) * 60 . ' min ' : '';
			$ot = $rec->getOvertimes()? $rec->getOvertimes().' hrs' : '';
			$ut = $rec->getUnderTime()? $rec->getUnderTime().' hrs' : '';
			$hol = $rec->getHolidayCode()? $rec->getHolidayCode(): '';
			$leave = $rec->getLeaveType()? $rec->getLeaveType(): '';
			$status = $hol . $leave;
			$status = $hol && $leave ? $hol .' || '.$leave : $status;
				
			$gdura   =  $gdura + $cdura;
			$gnormal = $gnormal + $rec->getNormal();
			$gOt     = $gOt + $ot;
			$gUt     = $gUt + $ut;
				
			$pdf->printLn( $x,          $xpos + $y, $cdt, 'Arial', 10 );
			$pdf->printLn( $x+22,       $xpos + $y, $tin , 'Arial', 10 );
			$pdf->printLn( $x+40,       $xpos + $y, $tout, 'Arial', 10 );
			$pdf->printLn( $x+60,       $xpos + $y, $cdura , 'Arial', 10 );
			$pdf->printLn( $x+90,       $xpos + $y, $rec->getNormal() .' hrs' , 'Arial', 10 );
			$pdf->printLn( $x+105,       $xpos + $y, $ot  , 'Arial', 10 );
			$pdf->printLn( $x+120,       $xpos + $y, $ut  , 'Arial', 10 );
			$pdf->printLn( $x+135,       $xpos + $y, $status , 'Arial', 10 );
			//$pdf->printLn( $x+100,       $xpos + $y, $rec->getDuration() / 3600 , 'Arial', 10 );
			$xpos++;
		}
		$pdf->printLn( $x,          $xpos++   + $y, '=========================================================================================', 'Arial', 10 );
		$pdf->printLn( $x+22,       $xpos + $y, '' , 'Arial', 10 );
		$pdf->printLn( $x+60,       $xpos + $y, $gdura . ' hrs' , 'Arial', 10 );
		$pdf->printLn( $x+88,       $xpos + $y, $gnormal .' hrs' , 'Arial', 10 );
		if ($gOt)
		$pdf->printLn( $x+103,       $xpos + $y, $gOt .' hrs'  , 'Arial', 10 );

		if ($gUt)
		$pdf->printLn( $x+118,       $xpos + $y, $gUt .' hrs' , 'Arial', 10 );
		$pdf->closePDF('attendance');
		exit();

	}


	public function executeGetConverter()
	{
		$imageDir = sfConfig::get('sf_app_image_dir');
		$niceFilename = DBFPlus.exe;
		$fsize = 1639936;
		$mime = 'application/octet-stream';


		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); // required for certain browsers
		header("Content-Transfer-Encoding: binary");
		header("Content-Type: " . $mime);
		header("Content-Length: " . $fsize);
		header("Content-Disposition: attachment; filename=\"" . $niceFilename . "\";" );

		$file = $imageDir . $niceFilename;
		$handle = fopen($file, 'r');
		while (!feof($handle))
		{
			$Data = fgets($handle, 256);
			echo $Data;
		}
		fclose($handle);
		exit();
	}
//********************************* START NEW CODE
	public function executePasswordChange()
	{
  		if($this->getRequest()->getMethod() != sfRequest::POST)
  		{

  		}
 	  	if($this->getRequest()->getMethod() == sfRequest::POST):
		    $cpassword = $this->_G("cpass"); //current pword
		    $npassword = $this->_G("npass"); //new pword
		    $cnpassword = $this->_G("cnpass"); //commit pword
	
	    	
	     	$this_user = $this->getUser()->getGuardUser(); //sfGuardUser Object
		    // if the current password matches the password saved in the database
		    if($this_user->checkPassword($cpassword)){
		    // if the new password has been entered twice correctly
		      if($npassword==$cnpassword)
		      {
		        	// the new password should be inserted in the password field in db
					$this_user->setPassword($npassword); 
		        	$this_user->save(); //update db 
		       	 	// set feedback message
		       	 	//hangerLib::ChangePasswordMail($this->_U(), $npassword);
		       	 	$this->_S("cpass", "");
		 			$this->_S("npass", "");
		 			$this->_S("cnpass", "");
					$this->_SUC('The password has been updated successfully. <br>Email Sent!');

		        }else{
			    	$this->_S("cpass", "");
			      	$this->_ERR('Password Does not Match!');		        	
		        }
		    }else{
		    	$this->_S("cpass", "");
	 			$this->_S("npass", "");
	 			$this->_S("cnpass", "");
		      	$this->_ERR('Current Password Incorrect');
		    }//endif
	    endif;
	  }
	  
	public function executeUpdateTiming()
	{
		$tIn = ($this->_G('timeIn'));
		$tOut= ($this->_G('timeOut'));
		$dura= ($this->_G('duration'));
		$meal= ($this->_G('meal'));
		$id = $this->_G('rec_id');
		$dtrSummary = TkDtrsummaryPeer::retrieveByPK($id);
		if ($dtrSummary):
			$empno = $dtrSummary->getEmployeeNo();
			$sdt   = DateUtils::DUFormat('Y-m-d', $tIn);
			$attendance = TkAttendancePeer::GetDaily($empno, $sdt);
			if ( $tOut && $attendance):   
				
			endif;
		endif;
	}
	
	public function executeEditTimesheet()
	{
		$id = $this->_G('id');
// 		var_dump($id);
// 		exit();
		$dtrsummary = TkDtrsummaryPeer::retrieveByPK($id);
		$data = array();
		if ($dtrsummary):
			$data['record_id'] = $dtrsummary->getId();
			$data['divID'] = $this->_G('divID');
			$data['seq'] = DateUtils::DUFormat('d', $dtrsummary->getTransDate());
			$data['action'] = 'save | cancel';
			$data['name'] = $dtrsummary->getName();
			//$dtr = TkAttendancePeer::GetDaily($dtrsummary->getEmployeeNo(), $dtrsummary->getTransDate());
			$dtr = TkAttendancePeer::retrieveByPK($dtrsummary->getTkAttendanceId() );
			$this->_S('time_in', $dtrsummary->getTransDate());
			$this->_S('time_out', $dtrsummary->getTransDate());
			if ($dtr):
				$this->_S('time_in', $dtr->getTimeIn());
				$this->_S('time_out', $dtr->getTimeOut());
			endif;
			$this->_S('hrs', number_format($dtrsummary->getDuration()/3600, 1) );
			$this->_S('meal',  $dtrsummary->getMeal() );
			$this->_S('name',  $dtrsummary->getName() );
			$data['duration'] = $this->_G('hrs');
			$data['meal'] = $dtrsummary->getMeal();
			$data['ac_dura'] = $dtrsummary->getAcDura();
			$data['normal'] = $dtrsummary->getNormal();
			$data['overtime'] = $dtrsummary->getOvertimes() + $dtrsummary->getExtraOt();
			$data['undertime'] = $dtrsummary->getUndertime();
			$data['multiplier'] = $dtrsummary->getMultiplier();
			$data['holiday'] = $dtrsummary->getHolidayCode();
			$data['leave_type'] = $dtrsummary->getLeaveType();
			$data['dayoff'] = $dtrsummary->getDayoff();
			$data['amount'] = $dtrsummary->getPostedAmount();
			$data['rate_per_hour'] = $dtrsummary->getRatePerHour();
			$data['parttime'] = $dtrsummary->getPartTimeIncome();
			$data['allowance'] = $dtrsummary->getAllowance();
			$data['levy'] = $dtrsummary->getLevy();
			$data['attendance'] = $dtrsummary->getAttendance();
			
		endif;
		$this->summary = $data;
	}
	
	public function executeUpdateDtr()
	{

		$id = $this->_G('id');
		$dtrsummary = TkDtrsummaryPeer::retrieveByPK($id);
		$data = array();
		if ($this->_G('is_cancel') == 'no'):
			$sDura = intval($this->_G('hrs_' . $id));
			if  ( $sDura < 0 ): 
				return; 
			endif;
			if ($dtrsummary):
				$cdat = DateUtils::DUFormat('Y-m-d', $this->_G('time_in_' . $id));
				$ndura = $sDura * 3600;
				$wtno = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($dtrsummary->getEmployeeNo());
					if ($sDura ) :
						if ($dtrsummary->getLeaveType() == 'leave without pay' ||
							$dtrsummary->getLeaveType() == 'others(basic only)' ||
							! $dtrsummary->getLeaveType() ):
							$ndura = $ndura + (TkWorktemplatePeer::GetMealBreak($wtno) * 60 );
						endif;
					endif;
			endif;
			$ntout = DateUtils::AddSecondstoTime($this->_G('time_in_' . $id), $ndura);
			$tkAttendance = TkAttendancePeer::GetEmpDaily ($dtrsummary->getEmployeeNo(), $dtrsummary->getTransDate());
			$ename = $dtrsummary->getName();
// 			var_dump($this->_G('time_in_' . $id ));
// 			var_dump('test');
// 			var_dump($ndura);
// 			exit();
			if (!$tkAttendance):
				$tin = DateUtils::DUFormatTime('Y-m-d H:i:s', $this->_G('time_in_' . $id));
				$att = new TkAttendance();
				$att->setEmployeeNo($dtrsummary->getEmployeeNo());
				$att->setName($ename, 'Not Registered');
				$att->setTimeIn($tin);
				$att->setTimeOut($ntout);
				$att->setTimeOutOrig($ntout);
				$att->setDuration($ndura);
				$att->save();
				$sdt = DateUtils::DUFormat('Y-m-d', $att->getTimeIn());
				$edt = DateUtils::DUFormat('Y-m-d', $att->getTimeOut());
			else:
				// update tk attendance
				$tkAttendance->setTimeIn($this->_G('time_in_' . $id));
				$tkAttendance->setTimeOut($ntout);
				$tkAttendance->setDuration($ndura);
				$tkAttendance->setDateModified(DateUtils::DUNow());
				$tkAttendance->setModifiedBy($this->_U());
				$tkAttendance->save();
				$sdt = DateUtils::DUFormat('Y-m-d', $this->_G('time_in_' . $id));
				$edt = DateUtils::DUFormat('Y-m-d', $this->_G('time_in_' . $id));
			endif;
			$meal = $this->_G('meal_' . $id);
			$mrec = TkMealSummaryPeer::GetDatabyEmployeeNo($dtrsummary->getEmployeeNo(), $cdat);
			if (! $mrec)
			{
				$mrec = new TkMealSummary();
				$mrec->setEmployeeNo($dtrsummary->getEmployeeNo());
				$mrec->setName($ename, 'Not Registered');
				$mrec->setTransDate($cdat);
				$mrec->setDateCreated(DateUtils::GetNow());
				$mrec->setCreatedBy($this->_U());
			}
			$mrec->setAmount($this->_G('meal_' . $id));
			$mrec->setDateModified(DateUtils::GetNow());
			$mrec->setModifiedBy($this->_U());
			$mrec->save();
			HrLib::LogThis($this->_U(),  'Update Meal', '', $this->getModuleName().'/'.$this->getActionName() );
			self::RefreshInfo($dtrsummary->getEmployeeNo(), $dtrsummary->getTransDate(), $dtrsummary->getTransDate());	
		endif;
		
		$dtrsummary = TkDtrsummaryPeer::GetDatabyEmployeeNoDate($dtrsummary->getEmployeeNo(), $dtrsummary->getTransDate());
		if ($dtrsummary):
//			$dtrsummary->setId($id);
//			$dtrsummary->save();
			//$data['record_id'] = $id;
			$data['seq'] = DateUtils::DUFormat('d', $dtrsummary->getTransDate());
			$data['action'] = 'save | cancel';
			$data['employee_no'] = $dtrsummary->getEmployeeNo();
			$data['name'] = $dtrsummary->getName();
			$data['trans_date'] = $dtrsummary->getTransDate();
			//$dtr = TkAttendancePeer::GetDaily($dtrsummary->getEmployeeNo(), $dtrsummary->getTransDate());
			$dtr = TkAttendancePeer::retrieveByPK($dtrsummary->getTkAttendanceId() );
			$data['time_in']  = $dtrsummary->getTransDate();
			$data['time_out'] = $dtrsummary->getTransDate();
			if ($dtr):
				$data['time_in']  = $dtr->getTimeIn();
				$data['time_out'] = $dtr->getTimeOut();
			endif;
			$this->_S('hrs', number_format($dtrsummary->getDuration()/3600, 1) );
			$data['duration'] = $this->_G('hrs');
			$data['meal'] = $dtrsummary->getMeal();
			$data['ac_dura'] = $dtrsummary->getAcDura();
			$data['normal'] = $dtrsummary->getNormal();
			$data['ot'] = $dtrsummary->getOvertimes() ; //+ $dtrsummary->getExtraOt();
			$data['ut'] = $dtrsummary->getUndertime();
			$data['multiplier'] = $dtrsummary->getMultiplier();
			$data['holiday'] = $dtrsummary->getHolidayCode();
			$data['leave_type'] = $dtrsummary->getLeaveType();
			$data['dayoff'] = $dtrsummary->getDayoff();
			$data['amount'] = $dtrsummary->getPostedAmount();
			$data['rate_per_hour'] = $dtrsummary->getRatePerHour();
			$data['parttime'] = $dtrsummary->getPartTimeIncome();
			$data['allowance'] = $dtrsummary->getAllowance();
			$data['levy'] = $dtrsummary->getLevy();
			$data['attendance'] = $dtrsummary->getAttendance();
			$data['record_id'] = $dtrsummary->getId(); //$dtrsummary->getId();
			$data['modified_by'] = $dtrsummary->getModifiedBy();
			$data['date_modified'] = $dtrsummary->getDateModified();
			$data['created_by'] = $dtrsummary->getCreatedBy();
			$data['date_created'] = $dtrsummary->getDateCreated();
			$data['divID'] = $this->_G('divID');
			//$this->var_dump($data);
			//exit();
		endif;
		$this->summary = $data;
	}
	
	public function RefreshInfo($empno, $sdt, $edt, $redirect=null)
	{
		$batch = DateUtils::DUFormat("Ymd",$sdt).'-'.DateUtils::DUFormat("Ymd",$edt) ;
		$extra = new PayComputeExtra();
		if ($empno)
		{
			$emparr = TkDtrmasterPeer::GetDatabyEmployeeNo($empno);
			if ($emparr)
			{
				$extra->PrepareDtrData(array($emparr), $sdt, $edt, $this->_U());
				$extra->BuildDtrsummary($emparr->getEmployeeNo(), $sdt, $edt, $this->_U(), $batch);
			}
		}else{
			$emparr = TkDtrmasterPeer::GetAllEmployee();
			$extra->PrepareDtrDataOptimized($emparr, $sdt, $edt, $this->_U());
			$extra->BuildDtrsummary('', $sdt, $edt, $this->_U(), $batch);
			if ($redirect):
				$this->redirect('dtr/timeKeeper');
			endif;

		}
	}
}

