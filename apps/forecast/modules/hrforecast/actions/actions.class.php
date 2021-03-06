<?php

/**
 * hrforecast actions.
 *
 * @package    snapps
 * @subpackage hrforecast
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class hrforecastActions extends SnappsActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {
    }

    public function executeDailyForecast()
    {
        $year = HrFiscalYearPeer::getFiscalYear();
    	$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->etypeList = array('FULL-TIME'=>'FULL-TIME', 'PART-TIME'=>'PART-TIME');
    	$this->companyList = HrCompanyPeer::OptCompanyNameListWithAll();
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('start_date', Date('Y-m-01'));
	        $this->_S('end_date', Date('Y-m-t'));
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST)
        {
        	if ($this->_G('daily_update')):
        		$sdt = Date('Y-m-01');
        		$edt = Date('Y-m-d');
        		HrEmployeeDailyPeer::UpdateDaily($sdt, $edt, $this->_U());
        		$this->_SUF('Daily Summary has been updated');
        		$this->redirect('hrforecast/dailyForecast');
        	endif;
        	
	        $this->start = $this->_G('start_date');  
	        $this->end   = $this->_G('end_date');
	        
	        // Get Weeks in array format w01, w02, w03
	        $this->days = array();
	        $totalDays = DateUtils::DateDiff('d', $this->start, $this->end);
			for($x=0; $x <= $totalDays; $x++):
				$this->days[] =  DateUtils::AddDate($this->start, $x) ;
			endfor;
			
			// gather data
        	$sdt = $this->_G('start_date');
        	$edt = $this->_G('end_date');
            $this->teamList = HrEmployeePeer::GetTeamList($this->_G('company') );
            $this->benchmark = '1';
            $this->dailyData = array();
            $this->dailyHour = array();
            $this->dailyOvertime = array();
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
            $this->totalPerDay = array();
            $this->totalPerEmployee = array();
            foreach($this->days as $day):
            	$this->totalPerDay[$day]['basic'] = 0;
            	$this->totalPerDay[$day]['ot'] = 0;
            	foreach($this->employeeList as $empno => $name):
            		$empDailyData = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, $day, $day);
            		$this->dailyData[$day][$empno] = $empDailyData['basic'];
            		$this->dailyOvertime[$day][$empno]  = $empDailyData['ot'];
            		//$this->weeklyHour[$week][$empno] = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, DateUtils::GetFirstDayOfTheWeek($year.$week), DateUtils::GetLastDayOfTheWeek($year.$week));
            		$this->totalPerEmployee[$empno] = 0;
            	endforeach;
            endforeach;
            
//                    echo '<pre>';
//		            print_r($this->weeklyData);
//		            echo '</pre>';
//		            exit();
            
            //total per week
            foreach($this->days as $day):
            	foreach($this->employeeList as $empno => $name):
            		$this->totalPerDay[$day]['basic'] += $this->dailyData[$day][$empno];
            		$this->totalPerDay[$day]['ot']    += $this->dailyOvertime[$day][$empno];
            	endforeach;
            endforeach;
            
            //total per employee
            foreach($this->employeeList as $empno => $name):
            	 foreach($this->days as $day):
            	 	$this->totalPerEmployee[$empno] += ( $this->dailyData[$day][$empno] + $this->dailyOvertime[$day][$empno] );
            	 endforeach;
           	endforeach;
        }

    }
    
    public function executeWeeklyForecast()
    {
    	$year = HrFiscalYearPeer::getFiscalYear();
    	$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->weekList = HtmlLib::GetWeekList($year);
    	$this->etypeList = array('FULL-TIME'=>'FULL-TIME', 'PART-TIME'=>'PART-TIME');
    	//$this->companyList = HrCompanyPeer::GetCompanyList();
    	$this->companyList = HrCompanyPeer::OptCompanyNameListWithAll();
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('start_date', date('Y-01-01'));
	        $this->_S('end_date', Date('Y-m-d'));
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST)
        {
        	if ($this->_G('daily_update')):
        		$sdt = Date('Y-m-01');
        		$edt = Date('Y-m-d');
//        		$sdt = $this->_G('start_date');
//        		$edt = $this->_G('end_date');
//        		var_dump($sdt);
//        		var_dump($edt);
//        		exit();
        		HrEmployeeDailyPeer::UpdateDaily($sdt, $edt, $this->_U());
        		$this->_SUF('Daily Summary has been updated');
        		$this->redirect('hrforecast/weeklyForecast');
        	endif;
//        	$weekStart = $this->_G('week_start');
//	        $weekEnd = $this->_G('week_end');
	        
	        $weekStart =  DateUtils::DUFormat('W', $this->_G('start_date') ); //$this->_G('week_start');
	        $weekEnd   =  DateUtils::DUFormat('W', $this->_G('end_date') ); //$this->_G('week_end');
	        
	        $YrWeekNo1 = $this->_G('year') . $this->_G('week_start');
	        $YrWeekNo2 = $this->_G('year') . $this->_G('week_end');
	        $year = $this->_G('year');
	        $this->start = DateUtils::GetFirstDayOfTheWeek($YrWeekNo1);  
	        $this->end   = DateUtils::GetLastDayOfTheWeek($YrWeekNo2);
	        
	        // Get Weeks in array format w01, w02, w03
	        $this->weeks = array();
	        $wkstart = intval(substr($weekStart,0, 2));
			$wkend = intval(substr($weekEnd, 0, 2));
			$totalWeeks = $wkend - $wkstart ;
			for($x=$wkstart; $x < $wkend + 1; $x++):
				$this->weeks[] =  'W'. str_pad($x, 2, '0', STR_PAD_LEFT);
			endfor;
			
			// gather data
        	$sdt = $this->_G('start_date');
        	$edt = $this->_G('end_date');
            $this->teamList = HrEmployeePeer::GetTeamList($this->_G('company') );
            $this->benchmark = '1';
            //$this->employeeList = HrEmployeeDailyPeer::GetEmployeeListByDate($sdt, $edt, $this->_G('company') );
            $this->weeklyData = array();
            $this->weeklyHour = array();
            $this->weeklyOvertime = array();
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
            $this->totalPerWeek = array();
            $this->totalPerEmployee = array();
            foreach($this->weeks as $week):
            	$this->totalPerWeek[$week]['basic'] = 0;
            	$this->totalPerWeek[$week]['ot'] = 0;
            	foreach($this->employeeList as $empno => $name):
            		$empDailyData = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, DateUtils::GetFirstDayOfTheWeek($year.$week), DateUtils::GetLastDayOfTheWeek($year.$week));
            		$this->weeklyData[$week][$empno] = $empDailyData['basic'];
            		$this->weeklyOvertime[$week][$empno]  = $empDailyData['ot'];
            		//$this->weeklyHour[$week][$empno] = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, DateUtils::GetFirstDayOfTheWeek($year.$week), DateUtils::GetLastDayOfTheWeek($year.$week));
            		$this->totalPerEmployee[$empno] = 0;
            	endforeach;
            endforeach;
//                    echo '<pre>';
//		            print_r($this->weeklyData);
//		            echo '</pre>';
//		            exit();
            
            //total per week
            foreach($this->weeks as $week):
            	foreach($this->employeeList as $empno => $name):
            		$this->totalPerWeek[$week]['basic'] += $this->weeklyData[$week][$empno];
            		$this->totalPerWeek[$week]['ot'] += $this->weeklyOvertime[$week][$empno];
            	endforeach;
            endforeach;
            
            //total per employee
            foreach($this->employeeList as $empno => $name):
            	 foreach($this->weeks as $week):
            	 	$this->totalPerEmployee[$empno] += ( $this->weeklyData[$week][$empno] + $this->weeklyOvertime[$week][$empno] );
            	 endforeach;
           	endforeach;
        }

    }
    
    public function executeMonthlyForecast()
    {
    	$year = HrFiscalYearPeer::getFiscalYear();
    	$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->monthList = HtmlLib::GetMonthListStardateKey($year);
    	$this->companyList = HrCompanyPeer::OptCompanyNameListWithAll();
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('month_start', HrFiscalYearPeer::getFiscalYear(). '-01-01');
	        $this->_S('month_end', Date('Y-m-01'));
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
	        		$this->months[] = $cmonth;
	        	endif;
	        	$cmonth = DateUtils::AddDate($cmonth, 1);
	        endfor;
	        
//            echo '<pre>';
//            print_r($this->months);
//            echo '</pre>';
//            exit();

			// gather data
        	$sdt = $monthStart;
        	$edt = DateUtils::DUFormat('Y-m-t', $monthEnd);
            $this->teamList = HrEmployeePeer::GetTeamList($this->_G('company') );
            $this->benchmark = '1';
            //$this->employeeList = HrEmployeeDailyPeer::GetEmployeeListByDate($sdt, $edt, $this->_G('company') );
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
            foreach($this->months as $month):
            	$this->totalPerMonth[$month]['basic'] = 0;
            	$this->totalPerMonth[$month]['ot'] = 0;
            	foreach($this->employeeList as $empno => $name):
            		$empDailyData = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, DateUtils::DUFormat('Y-m-01', $month), DateUtils::DUFormat('Y-m-t', $month) );
            		$this->monthlyData[$month][$empno] = $empDailyData['basic'];
            		$this->monthlyOvertime[$month][$empno]  = $empDailyData['ot'];
            		$this->totalPerEmployee[$empno] = 0;
            	endforeach;
            endforeach;
//                    echo '<pre>';
//		            print_r($this->monthlyData);
//		            echo '</pre>';
//		            exit();
            
            //total per month
            foreach($this->months as $month):
            	foreach($this->employeeList as $empno => $name):
            		$this->totalPerMonth[$month]['basic'] += $this->monthlyData[$month][$empno];
            		$this->totalPerMonth[$month]['ot'] += $this->monthlyOvertime[$month][$empno];
            	endforeach;
            endforeach;
            
            //total per employee
            foreach($this->employeeList as $empno => $name):
            	 foreach($this->months as $month):
            	 	$this->totalPerEmployee[$empno] += ( $this->monthlyData[$month][$empno] + $this->monthlyOvertime[$month][$empno] );
            	 endforeach;
           	endforeach;
        }

    }
    
    public function executeMonthlyPayroll()
    {
    	$year = HrFiscalYearPeer::getFiscalYear();
    	$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->monthList = HtmlLib::GetMonthListStardateKey($year);
    	$this->companyList = HrCompanyPeer::OptCompanyNameListWithAll();
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	$companyListInSalesQuantity = array ("1"=>"Micronclean", "2"=>"Acro Solution",
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('month_start', HrFiscalYearPeer::getFiscalYear(). '-01-01');
	        $this->_S('month_end', Date('Y-m-01'));
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
            		$cpf_em = 0;
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
    
    public function executeWeekDescriptionAjax()
    {
        $weekStart = $this->_G('week_start');
        $weekEnd   = $this->_G('week_end');
        $YrWeekNo1 = $this->_G('year') . $this->_G('week_start');
        $YrWeekNo2 = $this->_G('year') . $this->_G('week_end');
        $this->start = DateUtils::GetFirstDayOfTheWeek($YrWeekNo1);  
        $this->end   = DateUtils::GetLastDayOfTheWeek($YrWeekNo2);
        
    }

    public function executeGetTeamAjax()
    {
    	$this->teams = HrEmployeePeer::GetTeamList();
    }
    
    public function executeAjaxCompany()
    {
        $comp = $this->_G('comp');
        $this->comp = $comp;
    }

    public function executeMonthlyTrend()
    {
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
            $this->_S('months2', DateUtils::GetThisMonthStartDate() );
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', Date('Y'));
            $this->_S('year2', Date('Y'));
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST )
        {
            $this->benchmark = '1';
        }
    }

    public function executeDailyGroupSummary()
    {
        $sdate = $this->_G('sdt');
        $edate = $this->_G('edt');
        $co  = $this->_G('comp');
        $egrp = '';
        $grSumm = array('grp'=>array(), 'cnt'=>array(), 'tot'=>array(), 'cpf'=>array());
        $teams = HrEmployeePeer::GetTeamList($co);
        
		$pdata = array();
		$pdata = $this->DataProof($sdate, $edate, $co, $egrp, '', $teams);
		$empPay = $pdata['empPay'];     
        foreach($teams as $ke=>$ve)
        {
            if ($ve)
            {
                $pdata = $this->tableProof($sdate, $edate, $co, $egrp, $empPay, $ve);
                $grSumm['grp'][] = $ve;
                $grSumm['cnt'][] = $pdata['cnt'];
                $grSumm['tot'][] = $pdata['tot'];
                $grSumm['cpf'][] = $pdata['cpf'];
            }
        }

        $e = "\r\n";
        $t = "\t";
        $seq = 1;
        $pos = 0;
        $netot = 0;
        $atot  = 0;
        $ggtot = 0;
        $csvCont = '';
        $csvCont .= 'SEQ' . $t . 'MONTH' . $t. 'GROUP' . $t . '#EMP' . $t . 'AMOUNT' .$t. 'CPF' . $t. 'TOTAL' .$e;
        foreach($grSumm['grp'] as $kCo=>$vCo)
        {
            if ($grSumm['grp'][$pos]) {
                $bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
                $netot = $netot + $grSumm['cnt'][$pos];
                $atot  = $atot + $grSumm['tot'][$pos] - $grSumm['cpf'][$pos];
                $gtot  = ($grSumm['tot'][$pos]);
                $ggtot = $gtot + $ggtot;
                $csvCont .= $seq++ .$t. DateUtils::DUFormat('M-Y', $sdate) . $t .$grSumm['grp'][$pos]
                            . $t . $grSumm['cnt'][$pos] 
                            . $t . number_format($grSumm['tot'][$pos] - $grSumm['cpf'][$pos])
                            . $t . number_format($grSumm['cpf'][$pos]) 
                            . $t . number_format($gtot)  
                            . $e;
            }
            $pos++;
        }
        $csvCont .= ''.$t.''.$t.'TOTAL'.$t.$netot.$t.number_format($atot)
                    .$t.number_format($ggtot - $atot).$t.number_format($ggtot);
        
        $summaryHeaderString = 'Payroll Forecast for the Month of ' . DateUtils::DUFormat('M-Y', $sdate);
        $exportFilename = $summaryHeaderString . '.xls';

        $this->setLayout(false);
        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->addCacheControlHttpHeader("Cache-control","private");
        $this->getResponse()->setHttpHeader("Content-Description","File Transfer");
        $this->getResponse()->setContentType('application/octet-stream',TRUE);
        $this->getResponse()->setHttpHeader("Content-Length",(string) strlen($csvCont), TRUE);
        $this->getResponse()->setHttpHeader('content-transfer-encoding', 'binary', TRUE);
        $this->getResponse()->setHttpHeader("Content-Disposition","attachment; filename=\"".$exportFilename."\"", TRUE);
        $this->getResponse()->sendHttpHeaders();
        echo $csvCont;
        exit();
        return sfView::NONE;         
    }
    
    public function tableProof($sdate, $edate, $co, $egrp, $empData, $grpName=null)
    {
		$seq=1;        
		$gbasi = 0;
		$gpart = 0;
		$got   = 0;
		$gallo = 0;
		$gmeal = 0;
		$gunde = 0;
		$gabse = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota = 0;
		$proof = '';
		$gptot = 0;
		$cperiod = '';
		$cteam = '';        
		$title =  ($grpName? $grpName : 'EMPLOYEE LISTS');


        	$pos = 0;
        	
    	    if ( $grpName )
    	    {
            	$proof =  '
    			<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
    			  <tr>
    			    <td colspan="15" class="tk-style36 tk-menu alignCenter" nowrap>'.$title.'</td>
    			  </tr>
    			  <tr class="tk-dgra">
    			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
    			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Name</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Company</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Basic</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>PartTime</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Overtime</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Allowance</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Meal</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Tardy</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Absent</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF EM</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Pay</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF ER/ASSOC</td>    
    			    <td width="50" class="alignCenter " nowrap>Total</td>    
    			  </tr>
    			  ';    	        
    	        //---------------------------------------- specified group
            	foreach($empData['team'] as $ke=>$teams)
            	{
                    	if ($teams == $grpName) 
                    	{
                		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
                		$ptot = $empData['total'][$pos] - $empData['cpfer'][$pos];
                		//echo $empData['name'][$pos] . '<br>';
                		$proof = $proof . '        	
        				  <tr>
        				    <td height="20" width="10" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
        				    <td width="30" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empData['name'][$pos].'</td>
        				    <td width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empData['comp'][$pos].'</td>
        				    <td width="10%" class="alignRight  FORMlabel '.$bgclr.' " nowrap>'.number_format($empData['basic'][$pos],2).'</td>
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['part'][$pos],2).'</td>
        					<td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['ot'][$pos],2).'</td>				    
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['allo'][$pos],2).'</td>
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['meal'][$pos],2).'</td>
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['unde'][$pos],2).'</td>    
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['abse'][$pos],2).'</td>
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['cpfem'][$pos],2).'</td>
        					<td width="10%" class="alignRight FORMlabel  tk-oran" nowrap>'.number_format($empData['total'][$pos],2).'</td>				    
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['cpfer'][$pos] + $empData['assoc'][$pos],2).'</td>
        				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['total'][$pos] + $empData['cpfer'][$pos] + $empData['assoc'][$pos],2).'</td>
        				  </tr>
        	        	';
            				$gbasi = $gbasi + $empData['basic'][$pos];
            				$gpart = $gpart + $empData['part'][$pos];
            				$got   = $got   + $empData['ot'][$pos];
            				$gallo = $gallo + $empData['allo'][$pos];
            				$gmeal = $gmeal + $empData['meal'][$pos];
            				$gunde = $gunde + $empData['unde'][$pos];
            				$gabse = $gabse + $empData['abse'][$pos];
            				$gcpfr  = $gcpfr  + $empData['cpfer'][$pos] + $empData['assoc'][$pos];
            				$gcpfm  = $gcpfm  + $empData['cpfem'][$pos];
            				$gptot  = $gptot  + $empData['total'][$pos];
            				$gtota = $gtota + $empData['total'][$pos] + $empData['cpfer'][$pos] + $empData['assoc'][$pos];
                    	}
            			$pos++;
        	    }
        	    
        	}else{
            	$proof =  '
    			<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
    			  <tr>
    			    <td colspan="15" class="tk-style36 tk-menu alignCenter" nowrap>'.$title.'</td>
    			  </tr>
    			  <tr class="tk-dgra">
    			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
    			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Name</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Company</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Team</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Basic</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>PartTime</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Overtime</td>    
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Allowance</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Meal</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Tardy</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Absent</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF EM</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Pay</td>
    			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF ER/ASSOC</td>    
    			    <td width="50" class="alignCenter " nowrap>Total</td>    
    			  </tr>
    			  ';        	    
        	    //---------------------------------------- list all
            	foreach($empData['team'] as $ke=>$teams)
            	{
        		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        		$ptot = $empData['total'][$pos] - $empData['cpfer'][$pos];
        		//echo $empData['name'][$pos] . '<br>';
        		$proof = $proof . '        	
				  <tr>
				    <td height="20" width="10" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
				    <td width="30" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empData['name'][$pos].'</td>
				    <td width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empData['comp'][$pos].'</td>
				    <td width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.hrEmployeePeer::getTeambyEmployee($empData['empNo'][$pos]).'</td>
				    <td width="10%" class="alignRight  FORMlabel '.$bgclr.' " nowrap>'.number_format($empData['basic'][$pos],2).'</td>
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['part'][$pos],2).'</td>
					<td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['ot'][$pos],2).'</td>				    
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['allo'][$pos],2).'</td>
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['meal'][$pos],2).'</td>
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['unde'][$pos],2).'</td>    
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['abse'][$pos],2).'</td>
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['cpfem'][$pos],2).'</td>
					<td width="10%" class="alignRight FORMlabel  tk-oran" nowrap>'.number_format($empData['total'][$pos],2).'</td>				    
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['cpfer'][$pos] + $empData['assoc'][$pos],2).'</td>
				    <td width="10%" class="alignRight FORMlabel  '.$bgclr.' " nowrap>'.number_format($empData['total'][$pos] + $empData['cpfer'][$pos] + $empData['assoc'][$pos],2).'</td>
				  </tr>
	        	';
    				$gbasi = $gbasi + $empData['basic'][$pos];
    				$gpart = $gpart + $empData['part'][$pos];
    				$got   = $got   + $empData['ot'][$pos];
    				$gallo = $gallo + $empData['allo'][$pos];
    				$gmeal = $gmeal + $empData['meal'][$pos];
    				$gunde = $gunde + $empData['unde'][$pos];
    				$gabse = $gabse + $empData['abse'][$pos];
    				$gcpfr  = $gcpfr  + $empData['cpfer'][$pos] + $empData['assoc'][$pos];
    				$gcpfm  = $gcpfm  + $empData['cpfem'][$pos];
    				$gptot  = $gptot  + $empData['total'][$pos];
    				$gtota = $gtota + $empData['total'][$pos] + $empData['cpfer'][$pos] + $empData['assoc'][$pos];
    				$pos++;
        	    }
        	    
        	}
        	
        	
        	
        	$proof = $proof . '
        	  <tr>
			    <td height="25" class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    <td class="tk-style28 alignCenter FORMcell-Center" nowrap></td>';
			     if ( ! $grpName ) $proof = $proof . '<td class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    ';
        	$proof = $proof . '
			    <td class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gbasi,2).'</td>
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gpart,2).'</td>
				<td class="tk-style28 alignRight" nowrap>'. number_format($got,2).'</td>				    
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gallo,2).'</td>
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gmeal,2).'</td>
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gunde,2).'</td>    
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gabse ,2).'</td>
			    <td class="tk-style28 alignRight" nowrap>'. number_format($gcpfm,2).'</td>
			    <td class="tk-style28 alignRight tk-oran" nowrap>'. number_format($gptot,2).'</td>			    
			    <td class="tk-style28 alignRight " nowrap>'. number_format($gcpfr,2).'</td>
			    <td class="tk-style28 alignRight tk-gree" nowrap>'. number_format($gtota,2).'</td>
			  </tr>
			</table>
			';
            return array('proof'=>$proof, 'cnt'=>$seq -1 , 'tot'=>$gtota, 'cpf'=>$gcpfr );
    }    

    function DataProof($sdate, $edate, $co, $egrp, $grpName=null, $teams)
    {
        //echo $sdate .' - '. $edate .' - '. $co .' - '. $egrp .' - '. $grpName .' - '. $teams;
		$seq=1;        
		$gbasi = 0;
		$gpart = 0;
		$got   = 0;
		$gallo = 0;
		$gmeal = 0;
		$gunde = 0;
		$gabse = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota = 0;
		$proof = '';
		$gptot = 0;
		$cperiod = '';
		$cteam = '';        
    	$periods  = PayEmployeeLedgerArchivePeer::GetPeriodCode();
    	$cperiod  = DateUtils::DUFormat('Ymd', $sdate) . '-' . DateUtils::DUFormat('Ymd', $edate).'-ALL-MONTHLY';
    	$posted   = in_array($cperiod, $periods);
    	$empPay   = array('empNo'=>array(), 'name'=>array(), 
    					  'basic'=>array(), 'part'=>array(),
    					  'ot'=>array(), 'allo'=>array(),
    					  'meal'=>array(), 'unde'=>array(),
    					  'abse'=>array(), 'cpfer'=>array(),
    					  'cpfem'=>array(), 'total'=>array(),
    					  'others'=>array(), 'comp'=>array(),
    					  'allo'=>array(), 'cpfem'=>array(), 
    					  'assoc'=>array(), 
    					  '');
    	if (!$posted){
    	    $empList = HrEmployeeDailyPeer::GetEmployeeListbyDateRange($sdate, $edate, $co, $egrp);
    	    $empList = HrEmployeePeer::GetEmployeeWithTeamList($empList, $teams);
    	}else{
    	    $empList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListbyCompany($cperiod, $co);
    	}

  	
    	foreach($empList as $ke=>$empNo)
    	{
    	    if (!$posted){
    		    $empData = HrEmployeeDailyPeer::GetEmployeeDatabyDateRange($empNo, $sdate, $edate);
    	    }else{
    	        $empData = PayEmployeeLedgerArchivePeer::GetEmployeePay($empNo, $cperiod);
    	    }
    		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
    		$ptot = $empData['tota'] - $empData['cpfer'];

    		$gbasi = $gbasi + $empData['basi'];
			$gpart = $gpart + $empData['part'];
			$got   = $got   + $empData['ot'];
			$gallo = $gallo + $empData['allo'];
			$gmeal = $gmeal + $empData['meal'];
			$gunde = $gunde + $empData['unde'];
			$gabse = $gabse + $empData['abse'];
			$gcpfr  = $gcpfr  + $empData['cpfer'] + $empData['assoc'];
			$gcpfm  = $gcpfm  + $empData['cpfem'];
			$gptot  = $gptot  + $empData['tota'];
			$gtota = $gtota + $empData['tota'] + $empData['cpfer'] + $empData['assoc'];
			
			//------------------------------ grouping purpose
			$cteam = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('team'));
			$empPay['empNo'][]  = $empNo;
			$empPay['name'][]   = $empData['name'];
			$empPay['comp'][]   = $empData['comp'];
			$empPay['team'][]   = ($cteam? $cteam->get('TEAM') : '');
			$empPay['basic'][]  = $empData['basi'];
			$empPay['part'][]   = $empData['part'];
			$empPay['ot'][]     = $empData['ot'];
			$empPay['meal'][]   = $empData['meal'];
			$empPay['allo'][]   = $empData['allo'];
			$empPay['unde'][]     = $empData['unde'];
			$empPay['abse'][]     = $empData['abse'];
			$empPay['unde'][]     = $empData['unde'];
			$empPay['assoc'][]     = $empData['assoc'];
			$empPay['cpfem'][]     = $empData['cpfem'];
			$empPay['others'][] = ($empData['tota'] - $empData['ot'] - $empData['basi']);
			$empPay['total'][]  = $empData['tota'];
			$empPay['cpfer'][]  = $empData['cpfer']  + $empData['assoc']; 
    	}
    	return  array(	'proof'=>$proof, 
    					'gbasi'=>$gbasi, 
    					'gpart'=>$gpart, 
    					'got'=>$got, 
    					'gallo'=>$gallo, 
    					'gmeal'=>$gmeal,
    	                'gunde'=>$gunde,
    	                'gabse'=>$gabse,
    	                'gcpfr'=>$gcpfr,
    	                'gcpfm'=>$gcpfm,
    	                'gptot'=>$gptot,
    	                'gtota'=>$gtota,
    	                'empPay'=>$empPay
    	                
    	);
    }


}
