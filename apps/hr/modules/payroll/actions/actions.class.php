<?php

/**
 * payroll actions.
 *
 * @package    qualityRecords
 * @subpackage payroll
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class payrollActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeToDoList()
  {
     $pcode = $this->_G('period_code');
     $this->charlieID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S8737902G');
     $this->kennethID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S0225837D');
     $this->cashCheckList = PayEmployeeLedgerArchivePeer::CashCheckList($pcode);
     $this->CBSList = PayEmployeeLedgerArchivePeer::CBSCharges($pcode);
     $this->syedID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S1050919Z');
     $this->sukarniID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S7626368Z');
     $this->sulaimanID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S0808868C');
     $this->meizhenID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S6976982I');
     $this->cocoID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, 'S8167044G');
     $this->chenJieID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, '076695466-200515');
     $this->pariID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, '033781245040314');
     $this->sowwenID = PayEmployeeLedgerArchivePeer::GetIDbyPeriodByEmployeeNo($pcode, '401833668210115');
  }
  
  public function executePayrollTrend()
    {
    	$year = HrFiscalYearPeer::getFiscalYear();
    	//$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->monthList = HTMLLib::GetMonthListStardateKey($year);
    	$this->companyList = HrCompanyPeer::OptCompanyNameListWithAll();
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	$companyListInSalesQuantity = array ("1"=>"Micronclean", "2"=>"Acro Solution",
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
    	
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            //$this->_S('month_start', HrFiscalYearPeer::getFiscalYear(). '-01-01');
	        //$this->_S('month_end', Date('Y-m-01'));
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST)
        {
        	$monthStart = $this->_G('year_1') . substr($this->_G('month_start'), 4 );
	        $monthEnd   = $this->_G('year_2') . substr($this->_G('month_end'), 4 );
	        
	        $this->start = $monthStart; 
	        $this->end   = $monthEnd;
	        
	        // Get Weeks in array format w01, w02, w03\
	        $cmonth = $this->start;
	        $this->months = array();
	        for($x=0; $cmonth <= $monthEnd; $x ++ ):
	        	if (DateUtils::DUFormat('d', $cmonth) == '01'):
	        		$this->months[] = HrLib::CreatePeriodCode($cmonth);
	        	endif;
	        	$cmonth = DateUtils::AddDate($cmonth, 1);
	        endfor;

			// gather data
        	$sdt = $monthStart;
        	$edt = DateUtils::DUFormat('Y-m-t', $monthEnd);
            $this->teamList = HrEmployeePeer::GetTeamList($this->_G('company') );
            $this->benchmark = '1';
            $this->monthlyData = array();
            $this->monthlyHour = array();
            $this->monthlyOvertime = array();
            $empList = array();
            $this->employeeList = array();
            $this->employeeData = array();
            $empDailyData = array();
            
            //Get Employee Daily Data and generate listing
            $this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDate($sdt, $edt, $this->_G('company') );
            foreach($this->employeeDaily as $empDaily):
            	$this->employeeList[$empDaily->getEmployeeNo()] = $empDaily->getName();
            	$empList[] = $empDaily->getEmployeeNo();
            endforeach;
			if ($this->_G('filter_name')):
	            foreach($_POST as $var => $val):
	            	if (substr($var, 0, 4) == 'chk_' ):
	            		$this->employeeList = array();
	            	endif;
	            endforeach;
	            foreach($_POST as $var => $val):
	            	if (substr($var, 0, 4) == 'chk_' ):
	            		//$empList[] = substr($var, 4);
	            		$this->employeeList[substr($var, 4)] = HrEmployeePeer::GetNamebyEmployeeNo(substr($var, 4));
	            	endif;
	            endforeach;
            endif;
            
            //Generate Pager for Employee List
            $c = new Criteria();
            $c->add(HrEmployeePeer::EMPLOYEE_NO, $empList, Criteria::IN);
            $c->addAscendingOrderByColumn(HrEmployeePeer::DATE_RESIGNED);
            $c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
            $this->pager = HrEmployeePeer::doSelect($c);
            
            //initialize total variable
            $this->totalPerMonth = array();
            $this->totalPerEmployee = array();
            $this->totalHoursWorked = array();
            $this->empOvertime = array();
            $companyID = HrCompanyPeer::GetIDbyCompanyName( $this->_G('company') );
            $sqCompanyID = array_search($this->_G('company'), $companyListInSalesQuantity);
            foreach($this->months as $month):
            	$this->totalPerMonth[$month]['total'] = 0;
            	$this->totalPerMonth[$month]['ot'] = 0;
            	$this->totalPerMonth[$month]['cpf_tot'] = 0;
            	$this->totalPerMonth[$month]['levy'] = 0;
            	$this->totalPerMonth[$month]['hours_worked'] = 0;
            	$this->totalPerMonth[$month]['basic'] = 0;
            	$this->totalPerMonth[$month]['cpf_er'] = 0;
            	$this->totalPerMonth[$month]['cpf_em'] = 0;
            	
            	$this->totalPerMonth[$month]['hours_normal'] = 0;
            	$this->totalPerMonth[$month]['ot_normal'] = 0;
            	$this->totalPerMonth[$month]['ot_offday'] = 0;
            	$this->totalPerMonth[$month]['ot_holiday'] = 0;
            	
            	$this->articleData = SalesQuantitySummaryPeer::GetDatabyByDateRange(HrLib::PeriodStartDate($month), HrLib::PeriodGetEndDate($month), $sqCompanyID);
            	foreach($this->articleData as $article => $artTotal):
            		$this->monthlyData[$month][$article] = 0;
            		$this->totalPerMonth[$month]['article'] = 0;
            	endforeach;
            	foreach($this->articleData as $article => $artTotal):
            		$this->monthlyData[$month][$article] = $artTotal;
            		$this->totalPerMonth[$month]['article'] += $artTotal;
            	endforeach;
            	
            	
            	foreach($this->employeeList as $empno => $name):
            		$empDailyData = PayEmployeeLedgerArchivePeer::GetCostToCompany($empno, $month );
            		$this->empOvertime = TkDtrsummaryPeer::GetTotalHoursWorkedPerEmployeeByDate($empno, HrLib::PeriodStartDate($month), HrLib::PeriodGetEndDate($month) );
            		$this->articleData = SalesQuantitySummaryPeer::GetDatabyByDateRange(HrLib::PeriodStartDate($month), HrLib::PeriodGetEndDate($month), $sqCompanyID);
            		
            		$this->monthlyData[$month][$empno]['total'] 	= $empDailyData['total'];
            		$this->monthlyData[$month][$empno]['cpf_tot'] 	= $empDailyData['cpf_tot'] ;
            		$this->monthlyData[$month][$empno]['levy'] 		= $empDailyData['levy'];
            		$this->monthlyData[$month][$empno]['ot'] 		= $empDailyData['ot'];
            		$this->monthlyData[$month][$empno]['basic'] 	= $empDailyData['basic'] + $empDailyData['ul'];
            		$this->monthlyData[$month][$empno]['cpf_er'] 	= $empDailyData['cpf_er'] ;
            		$this->monthlyData[$month][$empno]['cpf_em'] 	= $empDailyData['cpf_em'] ;
            		
            		//******* OVERTIME DATA
            		$this->monthlyData[$month][$empno]['hours_normal'] 	= $this->empOvertime['total_normal'];
            		$this->monthlyData[$month][$empno]['ot_normal'] 	= $this->empOvertime['normal']['total'];
            		$this->monthlyData[$month][$empno]['ot_offday'] 	= $this->empOvertime['off_day']['total'];
            		$this->monthlyData[$month][$empno]['ot_holiday'] 	= $this->empOvertime['holiday']['total'];
            		$this->totalPerMonth[$month]['hours_normal'] 	+= $this->empOvertime['total_normal'];
            		$this->totalPerMonth[$month]['ot_normal'] 	+= $this->empOvertime['normal']['total'];
            		$this->totalPerMonth[$month]['ot_offday'] 	+= $this->empOvertime['off_day']['total'];
            		$this->totalPerMonth[$month]['ot_holiday'] 	+= $this->empOvertime['holiday']['total'];
            		
            		
            		$this->monthlyOvertime[$month][$empno]  = $empDailyData['ot'];
            		$this->totalPerEmployee[$empno] = 0;
            	endforeach;
            endforeach;
            
            // GET CURRENT MONTH ESTIMATE
            if ($this->_G('current_month_estimate') && $this->_G('company')):
            	$periodCode = HrLib::CreatePeriodCode(Date('Y-m-d'));
            	$sdt = Date('Y-m-01');
            	$edt = Date('Y-m-t');
            	foreach($this->employeeList as $empno => $name):
            		$cpfTot = 0;
            		$cpfem = 0;
            		$levy  = 0;
            		$pay  = 0;
            		$dtr = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empno, $sdt, $edt);
            		$basic = PayBasicPayPeer::GetDatabyEmployeeNo($empno);
            		$cpf = PayEmployeeLedgerArchivePeer::GetCpfDataByEmployee($empno, PayEmployeeLedgerArchivePeer::GetLatestPeriodCode());
            		if ($basic):
            			$pay  = $basic->getScheduledAmount();
            			$levy = $basic->getLevy();
            		endif;
            		if ($cpf):
            			$cpfTot = $cpf->getCpfTotal() * -1;
            			$cpfem  = $cpf->getAmount();
            		endif;
            		
//             		echo '<pre>';
//             		print_r($pay);
//             		echo '</pre>';
//             		exit();
	            	$this->monthlyData[$periodCode][$empno]['total'] 	= $pay + $dtr['otPay'] + $cpfem;
	            	$this->monthlyData[$periodCode][$empno]['cpf_tot'] 	= $cpfTot;
	            	$this->monthlyData[$periodCode][$empno]['levy'] 	= $levy;
	            	$this->monthlyData[$periodCode][$empno]['ot'] 		= $dtr['otPay'];
            	endforeach;
            endif;
            

                
            
            //total per month
            foreach($this->months as $month):
            	foreach($this->employeeList as $empno => $name):
            		$this->totalPerMonth[$month]['total'] += $this->monthlyData[$month][$empno]['total'] + $this->monthlyData[$month][$empno]['cpf_tot'] + $this->monthlyData[$month][$empno]['levy']   ;
            		$this->totalPerMonth[$month]['levy'] += $this->monthlyData[$month][$empno]['levy'];
            		$this->totalPerMonth[$month]['cpf_tot'] += $this->monthlyData[$month][$empno]['cpf_tot'] ;
            		$this->totalPerMonth[$month]['ot'] += $this->monthlyData[$month][$empno]['ot'];
            		//$this->totalPerMonth[$month]['ot']    += $this->monthlyOvertime[$month][$empno];
            		$this->totalPerEmployee[$empno] += $this->monthlyData[$month][$empno]['total'] + $this->monthlyData[$month][$empno]['cpf_tot'] + $this->monthlyData[$month][$empno]['levy'];
            	endforeach;
            endforeach;
            
//             //total per employee
//             foreach($this->employeeList as $empno => $name):
//             	 foreach($this->months as $month):
//             	 	$this->totalPerEmployee[$empno] += ( $this->monthlyData[$month][$empno]['total'] + $this->monthlyData[$month][$empno]['ot'] );
//             	 endforeach;
//            	endforeach;
        }
  	
  	
  }
  
	public function executePayrollProcessing()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			$this->pos = PayrollProcessPeer::GetCurrentPos();
			$proc = PayrollProcessPeer::GetRecentPeriod();
			if ($proc) 
			{
				$this->_S('period_code', $proc->getPeriodCode());
				$this->_S('start_date', self::GetStartDate($proc->getPeriodCode()));
				$this->_S('end_date', self::GetEndDate($proc->getPeriodCode()));
			}else{
				$cdate = HrCurrentMonthPeer::GetCurrent();
				$this->_S('start_date', $cdate['start']);
				$this->_S('end_date', DateUtils::DUFormat('Y-m-t', $cdate['end']));
				
			}
		}// unpost
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			if ($this->_G('period_code'))
			{
				$pcode = $this->_G('period_code');
			}else{
				$pcode = DateUtils::DUFormat('Ymd', $this->_G('start_date')).'-'.DateUtils::DUFormat('Ymd', $this->_G('end_date')).'-ALL-MONTHLY';
			}
			
			$sdt = $this->_G('start_date');
			$edt = $this->_G('end_date');
			
			if ($this->_G('newperiod'))
			{
				$sdt = $this->_G('start_date');
				$edt = $this->_G('end_date');
				$proc = PayrollProcessPeer::GetRecentPeriod();
				if ($proc) {
					$this->redirect('payroll/payrollProcessing');
					return;
				}
				$this->ClearEntries($sdt, $edt);
				$proc = new PayrollProcess();
				$proc->setPeriodCode($pcode);
				$proc->setEmployeeData("ON");  //switch on/off for next process
				$proc->save();
				$this->_S('period_code', $proc->getPeriodCode());
				$this->pos = 2;
			}//period
			
			if ($this->_G('reset'))
			{
				$this->ClearEntries($sdt, $edt);				
				$proc = PayrollProcessPeer::DeleteRecentPeriod();
				
				$cdate = HrCurrentMonthPeer::GetCurrent();
				$this->_S('start_date', $cdate['start']);
				$this->_S('end_date', DateUtils::DUFormat('Y-m-t', $cdate['end']));
				$this->_S('period_code', '');
				$this->pos = 1;
				HrLib::LogThis($this->_U(), 'CREATE PAYROLL WORKSPACE', 'CREATE PAYROLL WORKSPACE', $this->getModuleName().'/'.$this->getActionName());
			}
			
			if ($this->_G('employeedetail'))
			{			
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setEmployeeData("OK");
				$proc->setEmpLeave("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 3;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE REVIEW', $this->getModuleName().'/'.$this->getActionName());
			}
			
			if ($this->_G('leave'))
			{			
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setEmpLeave("OK");
				$proc->setIncome("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 4;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE LEAVE', $this->getModuleName().'/'.$this->getActionName());
			}
			
			if ($this->_G('income'))
			{			
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setIncome("OK");  
				$proc->setDeduction("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 5;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE INCOME', $this->getModuleName().'/'.$this->getActionName());
			}
			
			if ($this->_G('deduction'))
			{			
				// must add this again if there was a previous timeout this might prevent it.
				HrLib::ComputeAttendance($sdt, $edt);
				$extra    = new PayComputeExtra();
				$extra->BuildDtrsummary('', $sdt, $edt, $this->_U(), $pcode);
				HrLib::PostScheduledIncomeDeduction($extra, $sdt, $edt, $pcode, $this->_U());
				//exit();
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setDeduction("OK");  
				$proc->setAttendance("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 6;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE DEDUCTION', $this->getModuleName().'/'.$this->getActionName());
			}
			
			if ($this->_G('attendance'))
			{	
				HrLib::ComputeAttendance($sdt, $edt);
	            $extra    = new PayComputeExtra();
	            $extra->BuildDtrsummary('', $sdt, $edt, $this->_U(), $pcode);
	            HrLib::PostScheduledIncomeDeduction($extra, $sdt, $edt, $pcode, $this->_U());
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setAttendance("OK");  
				$proc->setDeficiency("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 7;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE ATTENDANCES', $this->getModuleName().'/'.$this->getActionName());
			}

			if ($this->_G('deficiency'))
			{	
				$proc = PayrollProcessPeer::GetRecentPeriod();
				if ($proc->getDeficiency() == 'ON') {
					$proc->setDeficiency("OK");  
					$proc->setPayslip("ON");  //switch on/off for next process
					$proc->save();
				}
				self::PreviewDeficiency($sdt, $edt);
				$this->pos = 8;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE DEFFICIENCY REVIEW', $this->getModuleName().'/'.$this->getActionName());
			}		
				
			if ($this->_G('proceed2Processing'))
			{		
				$this->pos = 8;	
//				if ($proc->getDeficiency() == 'OK'):
//					$this->_WRN('Must Click the Preview Deficiency...<br>Very important to review the detail of suspected Error(s).');
//				endif;
			}
			
			if ($this->_G('payslip'))
			{	
				$user = $this->_U();		
				HrLib::PreparePayslip($sdt, $edt, $user);
				$this->pos = 9;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'PAYSLIP PREPARED', $this->getModuleName().'/'.$this->getActionName());
			}	

			if ($this->_G('lock'))
			{	
				$user = $this->_U();
				HrLib::LockPayslip($sdt, $edt, $user);
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setPayslip("OK");  
				$proc->setManual("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 9;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'PAYSLIP LOCKED', $this->getModuleName().'/'.$this->getActionName());
			}			
			
			if ($this->_G('manual'))
			{			
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setManual("OK");  
				$proc->setLevyContribution("ON");  //switch on/off for next process
				$proc->save();
				$this->pos = 10;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'CLOSE MANUAL ENTRY', $this->getModuleName().'/'.$this->getActionName());
			}	

			if ($this->_G('levy'))
			{			
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setLevyContribution("OK");  //switch on/off for next process
				$proc->setClosed("ON");
				$proc->save();
				$this->pos = 10;
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'FINISHED EMPLOYEE LEVY', $this->getModuleName().'/'.$this->getActionName());
			}			
			
			if ($this->_G('close'))
			{	
				$pcode = $this->_G('period_code');
//				$pcode = '20101201-20101231-ALL-MONTHLY';
				$user = $this->_U();
				PayEmployeeContribPeer::DeletePreviousEntry($pcode);
				HrLib::PopulateCpfData($pcode, $user);
				$proc = PayrollProcessPeer::GetRecentPeriod();
				$proc->setClosed("OK");  
				$proc->save();
				HrLib::LogThis($this->_U(), 'PAYROLL PROCESSING', 'PAYROLL CLOSED', $this->getModuleName().'/'.$this->getActionName());
			}				
												
		}// post
		
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
	
	public function ClearEntries($sdt, $edt)
	{
		$batch = DateUtils::DUFormat('Ymd', $sdt) .'-'. DateUtils::DUFormat('Ymd', $edt);

		$extra = new PayComputeExtra();
			
		$extra->DoSQL("
	            DELETE
	            FROM pay_scheduled_deduction
	            where acct_code in ('UL', 'TD', 'LV')
	            and entry_type = 'SYSTEM'
	            ");
	
		$extra->DoSQL("
	            DELETE
	            FROM pay_scheduled_income
	            where acct_code in ('MR', 'OT', 'PI', 'TR', 'ML', 'SE', 'MCB','OA')
	            and entry_type = 'SYSTEM'
	            ");
		
		$extra->DoSQL("
	            update
	        	pay_scheduled_income
				set status = 'A'
	            where ( ( from_date <= '".$sdt."' and to_date >= '".$sdt."' ) or
						( from_date <= '".$edt."' and to_date >= '".$edt."' ) ) 
				and entry_type = 'USER'
	            ");	
		
		$extra->DoSQL("
	            update tk_dtrsummary set is_posted = ''
	    	    where trans_date >= '".DateUtils::DUFormat('Y-m-d', $sdt)."' and trans_date < '".DateUtils::DUFormat('Y-m-d', $edt)."' 
	            ");
	
		$extra->DoSQL("
	            DELETE
	            FROM pay_employee_ledger
	            ");
	}
	
	public function executePayrollCheckList()
	{
		$c = new Criteria();
		$c->addJoin(HrEmployeePeer::HR_COMPANY_ID, HrCompanyPeer::ID);
	  	$c->add(HrEmployeePeer::DATE_RESIGNED, null, Criteria::ISNULL);
	  	$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
		$this->pager = HrEmployeePeer::doSelect($c);
	}
	
	public function executeScheduledIncomeSearch()
	{
		$company = '';
		$status = $this->_G('status', 'A');
		$c = new Criteria();
		if ($status) 
		{
			$c->add(PayScheduledIncomePeer::STATUS, $status);
		}
		if ($this->_G('filter_company')):
			if ($this->_G('company')):
				$c->addJoin(HrEmployeePeer::EMPLOYEE_NO, PayScheduledIncomePeer::EMPLOYEE_NO);
				$c->add(HrEmployeePeer::HR_COMPANY_ID, $this->_G('company'));
			endif;
		endif;
		$c->add(PayScheduledIncomePeer::ENTRY_TYPE, 'USER');
		$c->addDescendingOrderByColumn(PayScheduledIncomePeer::TO_DATE);
		$c->addAscendingOrderByColumn(PayScheduledIncomePeer::NAME);
		$this->pager = PayScheduledIncomePeer::doSelect($c);
	}
	
	public function executeLevySearch()
	{
		$c = new Criteria();
		$c->addGroupByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
		$c->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
		$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
	}
	
	public function executeLevyListing()
	{
//		$id = $this->_G('id');
//		$filter = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
//		$this->ppcode = $filter->getPeriodCode();
		$momgroup = $this->_G('');
		if ($this->getRequest()->getMethod() == sfRequest::POST):
			$momgroup = $this->_G('momgroup');
		endif;
		
		$this->ppcode = $this->_G('period_code');
		$c = new Criteria();
		$c->add(PayEmployeeLevyPeer::PERIOD_CODE, $this->ppcode);
		if ($momgroup):
			$c->addJoin(PayEmployeeLevyPeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::MOM_GROUP, $momgroup);
		endif;
		$c->addAscendingOrderByColumn(PayEmployeeLevyPeer::NAME);
		$this->pager = PayEmployeeLevyPeer::doSelect($c);
	}
	
	public function executeLevyListingEdit()
	{
		$rec = PayEmployeeLevyPeer::retrieveByPK($this->_G('id'));
		if ($rec){
			$this->_S('id', $this->_G('id'));
			$this->_S('period_code', $rec->getPeriodCode());
			$this->_S('employee_no', $rec->getEmployeeNo());
			$this->_S('company', $rec->getCompany());
			$this->_S('team', $rec->getTeam());
			$this->_S('levy_rate', $rec->getLevyRate());
			$this->_S('levy_ded', $rec->getLevyDed());
			$this->_S('name', $rec->getName());
		}
		$this->setTemplate('addLevyListing');
	}
	
	public function executeGenerateLevyListing()
	{
		$pcode = $this->_G('period_code');
		$empList = PayEmployeeLedgerArchivePeer::ProcessLevyListing($pcode, $this->_U());
		$this->_SUF('Levy Listing has been Created/Updated!');
		$this->redirect('payroll/levyListing?period_code='.$pcode);
	}
	
	public function executeNewLevyRate()
	{
		//Modules using this:
		//http://orion.micronclean/cityhall/hr/reports/levyListing/id/485323
		//http://orion.micronclean/cityhall/hr/dashboard/index
		//google: annex a schudle of foreign worker levy
		$id = $this->_G('id');
		//$pcode = $this->_G('ppcode');	
		$pcode = PayEmployeeLedgerArchivePeer::GetLatestPeriodCode();
		$sql = "
		update pay_basic_pay, pay_employee_levy
			set pay_basic_pay.levy = pay_employee_levy.levy_rate
			where period_code = '".$pcode."' 
			and pay_basic_pay.employee_no = pay_employee_levy.employee_no
			and pay_basic_pay.status = 'A'
		";
		HrLib::ExecuteSQL($sql);
		HrLib::LogThis($this->_U(), 'UPDATE LEVY', '', $this->getModuleName().'/'.$this->getActionName() );
		
		$sql = "
			select * from pay_basic_pay where levy > 0 and status = 'A'
		";
 		$res = HrLib::ExecuteSQL($sql);
		while($res->next()):
			$levyAmount = $res->get('levy');
			$empData = HrEmployeePeer::GetDatabyEmployeeNo($res->get('employee_no'));
			if ($empData):
				if ($empData->getMomGroup() == 'T.C. Khoo Mfg'):
					//----------------------------  SPASS
					if ($empData->getRankCode() == 'SPASS'):
						if ($res->get('levy') <= 250):
							$empData->setLevyTier(1);
						else:
							$empData->setLevyTier(2);
						endif;
					else:
					//----------------------------  WP AND PRC
						if ($res->get('levy') <= 330):
							$empData->setLevyTier(1);
						endif;
						if ($res->get('levy') > 330 && $res->get('levy') <= 499):
							$empData->setLevyTier(2);
						endif;
						if ($res->get('levy') >= 500):
							$empData->setLevyTier(3);
						endif;
					endif;
					$empData->save();
				else:  // service
					//----------------------------  SPASS
					if ($empData->getRankCode() == 'SPASS'):
						if ($res->get('levy') <= 250):
							$empData->setLevyTier(1);
						else:
							$empData->setLevyTier(2);
						endif;
					else:
						//----------------------------  WP AND PRC
						if ($res->get('levy') <= 370):
							$empData->setLevyTier(1);
						endif;
						if ($res->get('levy') > 370 && $res->get('levy') <= 480):
							$empData->setLevyTier(2);
						endif;
						if ($res->get('levy') > 480):
							$empData->setLevyTier(3);
						endif;
					endif;
					$empData->save();					
				endif;
			endif;
		endwhile;
		if ($id):
			$this->_SUF('Levy Has been updated with this current detail.');
			$this->redirect('payroll/levyListing?id='.$pcode );
		else:
			$this->_SUC('Levy Tier Has been updated with the latest Payroll Levy Rate.');
			$this->redirect('payroll/levyListing?id='.$pcode );
		endif;
	}
	
	public function executePayslipManualEntry()
	{
		$c = new Criteria();
		$c->addGroupByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
		$c->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
		$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
	}
	
	public function executePayslipPreview()
	{
		$period = $this->_G('period_code');
		$c = new Criteria();
		$c->add(PayEmployeeLedgerArchivePeer::PERIOD_CODE, $period);
		$c->addGroupByColumn(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(PayEmployeeLedgerArchivePeer::NAME);
		$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
	}
	
	public function executePayslipEntry()
	{
		$id  = $this->_G('id');
		$this->record = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
		$c = new Criteria();
		if ($this->record) {
			$c->add(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO, $this->record->getEmployeeNo());
			$c->add(PayEmployeeLedgerArchivePeer::PERIOD_CODE, $this->record->getPeriodCode());
			$c->addAscendingOrderByColumn(PayEmployeeLedgerArchivePeer::INCOME_EXPENSE);
			$c->addAscendingOrderbyColumn(PayEmployeeLedgerArchivePeer::DESCRIPTION);
		}
		$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
	}

	public function executePayslipEntryFormatted()
	{
		$empno  = $this->_G('employee_no');
		$period = $this->_G('period_code');
		$format = $this->_G('format');
		$c = new Criteria();
		$c->add(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO, $empno);
		$c->add(PayEmployeeLedgerArchivePeer::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(PayEmployeeLedgerArchivePeer::INCOME_EXPENSE);
		$c->addAscendingOrderbyColumn(PayEmployeeLedgerArchivePeer::DESCRIPTION);
		$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
		$dataJson = hrPager::EmployeePayslipNoTags($this->pager);
		
		$object=new PhpJsonXmlArrayStringInterchanger();
		$json = json_encode($dataJson);
		$xml  = $object->convertArrayToXML($dataJson);
		/*if($xml === false){
			//$object->displayErrorLog();
			$object->displayLastError();
		}
		else{
			echo "<pre>";
			print_r($xml);
			exit;
		}*/		
		if ($format == 'json'):
			$this->var_dump ($json);
		else:
			$this->var_dump($xml);
		endif;

		
		sfView::NONE;
		exit();
		
	}
	
	public function executePayslipEntryEdit()
	{
		$id = $this->_G('id');
		$this->record = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			if ($this->record){
				$amt   = $this->record->getAmount();
				$cpfer = $this->record->getCpfEr();
				$this->_S('name', $this->record->getName());
				$this->_S('employee_no', $this->record->getEmployeeNo());
				$this->_S('amount', $amt > 0? $amt : $amt * -1);
				//$this->_S('cpf_er', $cpfer > 0? $cpfer : $cpfer * -1);
				$this->_S('inc_exp', $this->record->getIncomeExpense());
				$this->_S('bank_cash', $this->record->getBankCash());
				$this->_S('acct_code', $this->record->getAcctCode());
				$this->_S('add_desc', $this->record->getDescription());
				$this->_S('period_code', $this->record->getPeriodCode());
			}
			
			if (($this->_G('period_code') == '') && $this->_G('periodCode')){ 
				$this->_S('period_code', $this->_G('periodCode'));
			}
		}
	}
	
	public function executePayslipEditableEdit()
	{
		$id = $this->_G('id');
		$this->record = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			if ($this->record){
				$amt   = $this->record->getAmount();
				$cpfer = $this->record->getCpfEr();
				$this->_S('name', $this->record->getName());
				$this->_S('employee_no', $this->record->getEmployeeNo());
				$this->_S('amount', $amt > 0? $amt : $amt * -1);
				//$this->_S('cpf_er', $cpfer > 0? $cpfer : $cpfer * -1);
				$this->_S('inc_exp', $this->record->getIncomeExpense());
				$this->_S('bank_cash', $this->record->getBankCash());
				$this->_S('acct_code', $this->record->getAcctCode());
				$this->_S('add_desc', $this->record->getDescription());
				$this->_S('period_code', $this->record->getPeriodCode());
			}
			
			if (($this->_G('period_code') == '') && $this->_G('periodCode')){ 
				$this->_S('period_code', $this->_G('periodCode'));
			}
		}
		$this->setTemplate('payslipEditableAdd');
	}
	
	public function executePayslipEditableDelete()
	{
		$id = $this->_G('id');
		$this->record = PayEmployeeLedgerArchivePeer::retrieveByPK($id);
		if ($this->record){
			$empNo = $this->record->getEmployeeNo();
			$batch = $this->record->getPeriodCode();
			$rec = $this->record->getName().' - '.$this->record->getDescription() .'( ' . $this->record->getAmount() .' )';
			$this->record->delete();
			$id = PayEmployeeLedgerArchivePeer::getIdByEmpNoBatch($empNo, $batch);
			$this->_SUF($rec.' has been deleted successfuly.');
			$nID = PayEmployeeLedgerArchivePeer::GetIDByEmpNoPeriodCode($empNo, $batch);
			if ($nID)
			{
				$this->redirect('payroll/payslipEntry?id='.$nID);
			}else{
				$this->redirect('payroll/payslipPreview?id='.$id);
			}
		}
		return sfView::NONE;
	}
	
	public function executeScheduledIncomeEdit()
	{
		$id = $this->_G('id');
		$this->record = PayScheduledIncomePeer::retrieveByPK($id);
		if (!$this->record) {
			$this->_ERR('Record not found.');
			$this->forward404();
		}
		sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Scheduled Income');
		$this->_S('employee_no', $this->record->getEmployeeNo());
		$this->_S('name', $this->record->getName());
		$this->_S('total_amount', $this->record->getTotalAmount());
		$this->_S('scheduled_amount', $this->record->getScheduledAmount());
		$this->_S('taxable_amount', $this->record->getTaxableAmount());
		$this->_S('frequency', $this->record->getFrequency());
		$this->_S('tax_percentage', $this->record->getTaxPercentage());
		$this->_S('acct_code', $this->record->getAcctCode());
		$this->_S('description', $this->record->getDescription());
		$this->_S('sdate', $this->record->getFromDate());
		$this->_S('edate', $this->record->getToDate());
		$this->_S('status', $this->record->getStatus());
		$this->_S('tot_amt_received', $this->record->getTotAmtReceived());
		$this->setTemplate('scheduledIncomeAdd');

	}
	
	public function executeScheduledIncomeDelete()
	{
		$id = $this->_G('id');
		$this->record = PayScheduledIncomePeer::retrieveByPK($id);
		$rec = $this->record->getName().' ('.$this->record->getDescription().')';
		$batchNo = $this->record->getIncomePrepostBatch();
		TkDtrsummaryPeer::ClearIsPostedIncome($batchNo);
		$this->record->delete();
		$this->_SUF($rec.' has been deleted successfuly.');
		$this->redirect('payroll/scheduledIncomeSearch');
	}
	
	
	public function PreviewDeficiency($sdate, $edate)
	{

		$empList = TkDtrmasterPeer::GetEmployeeNameListActive();
		$notProcessed = array();
		$empData = array('empno'=>array(), 'name'=>array(),
                       'part'=>array(), 'ot'=>array(), 'meal'=>array(), 'all'=>array(), 
                       'levy'=>array(), 'ul'=>array(), 'td'=>array(),
                       'ppart'=>array(), 'pot'=>array(), 'pmeal'=>array(), 'pall'=>array(), 
                       'plevy'=>array(), 'pul'=>array(), 'ptd'=>array()
		);
		$cr = '<br>';
		foreach($empList as $empNo=>$vname)
		{
			$data = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdate, $edate);
			$ded  = PayScheduledDeductionPeer::GetDeductionbyEmployeeNo($empNo, 'MONTHLY');
			$inc  = PayScheduledIncomePeer::GetIncomebyEmployeeNo($empNo, 'MONTHLY');
			$bp   = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);

			if (! $data)
			{
				$notProcessed[] = $empNo ;
			}

			if ($data)
			{
				$part = 0;
				$ot   = 0;
				$meal = 0;
				$all  = 0;
				$lvy  = 0;
				$ul   = 0;
				$td   = 0;
				$iPi  = 0;
				$iOt  = 0;
				$iMr  = 0;
				$iMl  = 0;
				$dLv  = 0;
				$dUt  = 0;
				$dUl  = 0;
				$iVa   = 0; // slash with OT
				foreach($data as $rec)
				{
					$part = $part + $rec->getPartTimeIncome();
					$ot   = $ot   + ( ($rec->getPostedAmount() > 0)? $rec->getPostedAmount() : 0);
					$meal = $meal + $rec->getMeal();
					$all  = $all  + $rec->getAllowance();
					$lvy  = $lvy  + $rec->getLevy();
					$ul   = $ul   + (($rec->getAttendance() == 'A' ) ? $rec->getPostedAmount() : 0 );
					$td   = $td   + (($rec->getPostedAmount() < 0 && ($rec->getAttendance() <> 'A' )) ? $rec->getPostedAmount() : 0 );
				}
				$all = $all + (($bp)? $bp->getAllowance() : 0 );
				//get posted income
				if ($inc)
				{
					foreach($inc as $i)
					{
						switch( $i->getAcctCode() )
						{
							case 'PI':
								$iPi = $iPi + $i->getTotalAmount();
								break;
							case 'OT':
								$iOt = $iOt + $i->getTotalAmount();
								break;
							case 'OA':
								$iOt = $iOt + $i->getTotalAmount();
								break;
							case 'MR':
								$iMr = $iMr + $i->getTotalAmount();
								break;
							case 'ML':
								$iMl = $iMl + $i->getTotalAmount();
								break;
							case 'VA':
								$iVa = $iVa + $i->getTotalAmount();
								break;
						}
					}
				}// income

				if ($ded)
				{
					foreach($ded as $d)
					{
						switch( $d->getAcctCode() )
						{
							case 'LV':
								$dLv = $dLv + $d->getTotalAmount();
								break;
							case 'TD':
								$dUt = $dUt + $d->getTotalAmount();
								break;
							case 'UL':
								$dUl = $dUl + $d->getTotalAmount();
								break;
						}
					}


				} // deduction

				$empData['empno'][] = $empNo;
				$empData['name'][]  = ($bp ? $bp->getName() : 'Not Set');
				$empData['part'][]  = $part;
				$empData['ot'][]    = $ot;
				$empData['meal'][]  = $meal;
				$empData['all'][]   = $all;
				$empData['levy'][]  = $lvy;
				$empData['ul'][]    = $ul;
				$empData['td'][]    = $td;

				$empData['ppart'][]  = $iPi;
				$empData['pot'][]    = $iOt;
				$empData['pmeal'][]  = $iMr;
				$empData['pall'][]   = $iMl;
				$empData['plevy'][]  = $dLv;
				$empData['pul'][]    = $dUl;
				$empData['ptd'][]    = $dUt;
				$empData['va'][]    = $iVa;

			} // $data
		} //empno
		$pdf = new PdfLibrary();
		$pdf->addPage();
		$x = 10;
		$y = 3;
		$pmess = '';

		// display unprocessed
		$pos = 0;
		$name = '';
		if ($notProcessed)
		{
			//echo 'Following List Are Employees that Dont Have DTR' . $cr;
			$pdf->printBoldLn($x, $y, 'Following List Are Employees that Dont Have DTR', 'Arial', 10 );
			foreach($notProcessed as $kn=>$vn)
			{
				$sked = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($vn);
				$name =  HrEmployeePeer::GetNamebyEmployeeNo($vn);
				if (trim($sked) <> 'NON PUNCHING' && $name) {
					$pos++;
					//	                        $pmess =  $pos.': '.$vn
					//	                        .' - ' . HrEmployeePeer::GetNamebyEmployeeNo($vn)
					//	                        . $sked
					//. $cr;
					//	                        ;
					$pdf->printLn($x, $y + $pos, $pos, 'Arial', 10 );
					$pdf->printLn($x+10, $y + $pos, $vn, 'Arial', 10 );
					$pdf->printLn($x+50, $y + $pos, $name, 'Arial', 10 );
					$pdf->printLn($x+100, $y + $pos, $sked, 'Arial', 10 );
				}
			}
			//echo $cr. $cr;
		}
		$this->PrintBirthDateCPFBracket($pdf);
		$this->ShowDefficiency($empData, 'part', 'Part Time', $pdf);
		$this->ShowDefficiency($empData, 'ot',   'Overtime', $pdf);
		$this->ShowDefficiency($empData, 'meal', 'Meal', $pdf);
		$this->ShowDefficiency($empData, 'all',  'Allowance', $pdf);
		$this->ShowDefficiency($empData, 'levy', 'Levy', $pdf);
		$this->ShowDefficiency($empData, 'ul',   'Unpaid Leave', $pdf);
		$this->ShowDefficiency($empData, 'td',   'Tardy/Late', $pdf);
		$pdf->closePDF('test.pdf');
		exit();
	}

	public function ShowDefficiency($empData, $acct, $desc, $pdf)
	{
		$pdf->addPage();
		$x = 10;
		$y = 3;
		$xpos = 0;
		$pdf->printBoldLn( $x,    $xpos   + $y, 'Following List Are Employees that Have '.$desc.' Defficiency', 'Arial', 10);
		$cr = '<br>';
		$pAcct = 'p'.$acct;
		$pos = 0;
		$xpos= 0;
		$mess = '';
		$cpos = 0;
		if ($empData)
		{
			//echo 'Following List Are Employees that Have '.$desc.' Defficiency' . $cr;
			foreach($empData['empno'] as $k=>$rec)
			{
				if ( round($empData[$acct][$pos], 2) <> round($empData[$pAcct][$pos], 2) )
				{
					//					$mess =  ($xpos + 1) .': '. $empData ['empno'][$pos].' - '.$empData ['name'][$pos] .' '.
					//					$empData[$acct][$pos] .' <> '. $empData[$pAcct][$pos] .' - ';
					//. $cr;
					$xpos ++;
					$cpos ++;
					if ($xpos == 51){
						$pdf->addPage();
						$x = 10;
						$y = 3;
						$cpos = 0;
						$pdf->printBoldLn( $x,    $cpos++   + $y, 'Following List Are Employees that Have '.$desc.' Defficiency (cont.)', 'Arial', 10);
						
					}
					$pdf->printLn($x, $y + $cpos, $xpos, 'Arial', 10 );
					$pdf->printLn($x+10, $y + $cpos, substr($empData ['empno'][$pos],0, 20) , 'Arial', 10 );
					$pdf->printLn($x+50, $y + $cpos,  substr($empData ['name'][$pos],0, 20), 'Arial', 10 );
					if ($acct <> 'ot'):
						$pdf->printLn($x+100, $y + $cpos, $empData[$acct][$pos] .' <> '. $empData[$pAcct][$pos], 'Arial', 10 );
					else:
						$pdf->printLn($x+100, $y + $cpos, $empData[$acct][$pos] .' <> '. $empData[$pAcct][$pos] .' + ' . $empData['va'][$pos] .'  <' . ($empData[$pAcct][$pos] + $empData['va'][$pos]) . '>', 'Arial', 10 );
					endif;
				}
				$pos ++ ;
			}
			//echo $cr. $cr;
		} // $empdata

	}	
	
	public function PrintBirthDateCPFBracket($pdf)
	{
		//$pdf = new PdfLibrary();
		$co = null;
		$srtOrder = null;
		$pdf->addPage('Arial', 10);
		$y = 7;
		$x = 8;
		$xpos = 0;
		$pdf->printTCKhooHeader();
		$pdf->printBoldLn( $x + 75, $xpos++   + $y, 'EMPLOYEE DATE OF BIRTH', 'Arial', 12);
		$pdf->Box($x-15, $y * 4, 190, 10, 0, array(221,231,255));
		$pdf->printLn( $x,          $xpos+1   + $y, ' SEQ       EMPLOYEE #              EMPLOYEE NAME                          SEX     AGE         BIRTHDAY       NATIONALITY', 'Arial', 10 );
		$seq = 0;
		$pos = 5;
		$addinfo = '';
		$paytot = 0;
		$addinfo = HrEmployeePeer::GetActiveEmployee($co, 'CPF', $srtOrder);
		$bg = array();
		$xpos = $xpos + 3;
		$bg = array(235,235,235);
		$dt = Date('Y-m-d');
		$ageBracket = array(0, 1, 34, 35, 49, 50, 54, 55, 59, 60, 64, 65);
		foreach($addinfo as $rec)
		{
			$age = number_format(HrEmployeePeer::ComputeAge($rec->getDateOfBirth(), $dt) , 2);
			$brket = intval($age);
			//$brket = 0;
			if ( in_array($brket, $ageBracket) ): 
				if ($seq++ % 2):
				$bg = array(235,235,235);
				else:
				$bg = array(255,255,255);
				endif;
				if ($pos > 49 )
				{
					$pdf->Footer();
					$pdf->addPage('Arial', 10);
					$xpos = 0;
					$y    = 3;
					$pos  = 0;
					$pdf->Box($x-15, $y * 4, 190, 10, 0, array(221,231,255));
					$pdf->printLn( $x,          $xpos+1   + $y, ' SEQ       EMPLOYEE #              EMPLOYEE NAME                          SEX     AGE         BIRTHDAY       NATIONALITY', 'Arial', 10 );
					$xpos = $xpos + 3;
				}
				$bp = PayBasicPayPeer::GetBasicPaybyEmployeeNo($rec->getEmployeeNo());
				$bp = $bp? $bp : 1;
				$payBracket =  CpfGovtRulePeer::GetPayBracket($dt, $bp, $age);
				$pdf->printLnBox($x+2, $xpos   + $y, $seq, 190, $bg, 'Arial', 10 );
				$pdf->printLn($x+13, $xpos   + $y, $rec->getEmployeeNo(), 'Arial', 10 );
				$pdf->printLn($x+46, $xpos   + $y, substr($rec->getName(), 0, 25), 'Arial', 10 );
				$pdf->printLn($x+110, $xpos   + $y, $rec->getGender(), 'Arial', 10 );
				$pdf->printLn($x+119, $xpos   + $y, $age , 'Arial', 10 );
				$pdf->printLn($x+135, $xpos   + $y, DateUtils::DUFormat('m-d-y',$rec->getDateOfBirth()), 'Arial', 10 );
				//$pdf->printLn($x+155, $xpos   + $y, $rec->getNationality(), 'Arial', 10 );
				$pdf->printLn($x+155, $xpos   + $y, substr($payBracket, 0 ,2) . ' \ BRACKET', 'Arial', 10);
				$xpos++;
				$pos++;
			endif;
					
			}
		//$pdf->Footer();
		//$pdf->closePDF('birthday.pdf');
		//exit();
	}
	
	public function executeComputeEmployeeCPF()
	{
		$empNo = $this->_G('empNo');
		$pcode = $this->_G('pcode');
		$urlOrig = ($_SERVER['HTTP_REFERER']);
		$basic = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);
		if ($basic) {
				$dt = $this->GetStartDate($pcode);
				$dt = Date('Y-m-d');
				$comCpf = new ComputeCPF();
				$age = HrEmployeePeer::ComputeAge(HrEmployeePeer::GetBirthdaybyEmployeeNo($empNo), $this->GetStartDate($pcode));
 				//var_dump($age);
 				//exit();
				if ($basic->getCpfAmount() > 0)
				{
					$cpfPay   = $basic->getCpfAmount();
					$grossPay = PayEmployeeLedgerArchivePeer::GetTotalIncomeforCPFDeductable($empNo, $pcode);
					$netPay   = $cpfPay < $grossPay? $cpfPay : $grossPay; //if declared cpf amount is less than the actual computation
					$netPay   = $netPay + PayEmployeeLedgerArchivePeer::GetAccountWithCpfDeductuble($empNo, $pcode);
				}else{
					$netPay = PayEmployeeLedgerArchivePeer::GetTotalIncomeforCPFDeductable($empNo, $pcode);
				}
//  				var_dump($netPay);
//  				exit();
				$netDed = PayEmployeeLedgerArchivePeer::GetTotalDeductionforCPFDeductable($empNo, $pcode);
				$gPay = $netPay + $netDed;
				$cpf = $comCpf->GetCPF($dt, $gPay, $age, $basic->getCpfCitizenship());
				
//				var_dump($gPay);
//				var_dump($netDed);
//				var_dump($basic->getCpfCitizenship());
//				var_dump($cpf);
//				exit();
				
				$data = PayEmployeeLedgerArchivePeer::GetEmployeeCpfByPeriod($empNo, $pcode);
				
				$eeamt = 0;
				$eramt = 0;
				$cpfTot = 0;
				if ($data) {
					$eeamt = $cpf['em_share'] ? $cpf['em_share'] * -1 : 0;
					$eramt = $cpf['er_share'] ? $cpf['er_share'] * -1 : 0;
					$cpfTot= $cpf['total'] ? $cpf['total'] * -1 : 0;
					$data->setCreatedBy($this->_U());
					$data->setDateCreated(DateUtils::DUNow());
					$data->setModifiedBy($this->_U());
					$data->setDateModified(DateUtils::DUNow());
					$data->setIncomeExpense('2');
					$data->setAmount($eeamt);
					$data->setCpfEr($eramt);
					$data->setCpfTotal($cpfTot);
					$data->setDescription('CPF Contribution || <'.$gPay.'> ' .$cpf['desc']);
				}else{
					$data->setAmount(0);
					$data->setCpfEr(0);
					$data->setCpfTotal(0);
				}
				$data->save();
			}
		$this->redirect($urlOrig);
		return SFView::NONE;
		}	
		
		public function executePayslipNano()
		{
			$pcode = $this->_G('period_code');
			$c = new Criteria();
			$c->add(PayEmployeeLedgerNanoPeer::PERIOD_CODE, $pcode);
			$c->addGroupByColumn(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO);
			$this->pager = PayEmployeeLedgerNanoPeer::doSelect($c);
			if ($this->getRequest()->getMethod() == sfRequest::POST )
			{
				if ( $this->_G('generateList') )
				{
					$this->PayslipGenerateNanoList();
				}

				if ( $this->_G('updateList') )
				{
					$this->Payslip3Kings();
					$this->redirect('payroll/payslipNano?period_code='.$pcode);
				}
			
				if ( $this->_G('cpfPreview') )
				{
					$this->PreviewContribution($this->_G('pcode'));
				}

				if ( $this->_G('generateTxt') )
				{
					$this->GenerateCPFText($this->_G('pcode'));
				}
			
				if ( $this->_G('printPayslip') )
				{
					$empNoList = PayEmployeeLedgerNanoPeer::GetEmployeeNoListByPeriod($this->_G('pcode'));
					HrLib::OfficialPayslipNano( $this->_G('pcode'),  $empNoList);
				}
			}
					
		}
		
	public function executeLevyListingDelete()
	{
		$id = $this->_G('id');
		$rec = PayEmployeeLevyPeer::retrieveByPK($id);
		if ($rec){
			$name   = $rec->getName();
			$pcode = $rec->getPeriodCode();
			$rec->delete();
		}
		$this->_SUF($name.' has been deleted successfuly.');
		$this->redirect('payroll/levyListing?period_code='.$pcode );
	}
	
	public function executeNanoManualEntry()
	{

	}
	
	public function executeNanoPayslipEditable()
	{
		$id  = $this->_G('id');
		$this->record = PayEmployeeLedgerNanoPeer::retrieveByPK($id);
		$c = new Criteria();
		$c->add(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO, $this->record->getEmployeeNo());
		$c->add(PayEmployeeLedgerNanoPeer::PERIOD_CODE, $this->record->getPeriodCode());
		$c->addAscendingOrderByColumn(PayEmployeeLedgerNanoPeer::INCOME_EXPENSE);
		$c->addAscendingOrderbyColumn(PayEmployeeLedgerNanoPeer::DESCRIPTION);
		$this->pager = PayEmployeeLedgerNanoPeer::doSelect($c);
	}
	
	
  public function executeScheduledIncomeDeleteAll()
  {
    $c = new Criteria();
    $rs = PayScheduledIncomePeer::doDeleteAll();
    $this->redirect('payroll/scheduledIncomeSearch');
    
    $c = new Criteria();
    $rs = PaySchedIncomeLogPeer::doDeleteAll();
    $this->redirect('payroll/scheduledIncomeSearch');
    
    $c = new Criteria();
    $rs = PayScheduledDeductionPeer::doDeleteAll();
    $this->redirect('payroll/scheduledIncomeSearch');
    
    $c = new Criteria();
    $rs = PaySchedDeductionLogPeer::doDeleteAll();
    $this->redirect('payroll/scheduledIncomeSearch');
  }
  
	public function Payslip3Kings()
	{
		
		$list = array('11111'=>'4500', '12345'=>'4100', '987654321'=>'4500');
		$pcode = $this->_G('period_code');
		$empno = '';
		$sql = new PayComputeExtra();
		foreach ($list as $empno => $val ):
			//$empno  = HrEmployeePeer::GetDatabyEmployeeNo($bacctno);
			$sql->DoSQL(
				"
					INSERT INTO pay_employee_ledger_nano (EMPLOYEE_NO,NAME,COMPANY,FREQUENCY,PERIOD_CODE,ACCT_CODE,DESCRIPTION,AMOUNT,INCOME_EXPENSE,ACCT_SOURCE,PROCESSED_AS,RACE,BANK_CASH,CREATED_BY,DATE_CREATED) 
					select EMPLOYEE_NO,NAME,COMPANY,FREQUENCY,PERIOD_CODE,ACCT_CODE,DESCRIPTION,AMOUNT,INCOME_EXPENSE,ACCT_SOURCE,PROCESSED_AS,RACE,BANK_CASH,CREATED_BY,DATE_CREATED
						 from pay_employee_ledger_archive where period_code = '".$pcode."'
						 and employee_no = '".$empno."'
				");
			$sql->DoSQL(
					"
					delete from pay_employee_ledger_archive 
						 where period_code = '".$pcode."'
						 and employee_no = '".$empno."'
					");
//			$sql->DoSQL(
//					"
//					update pay_employee_ledger_archive set amount = ".$val."
//						 where period_code = '".$pcode."'
//						 and employee_no = '".$empno."'
//						 and acct_code = 'bp'
//					");
			
		endforeach;
						
	}
	
}
