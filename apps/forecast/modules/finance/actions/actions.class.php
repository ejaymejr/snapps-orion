<?php

/**
 * finance actions.
 *
 * @package    qualityRecords
 * @subpackage finance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class financeActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  }
  
  public function executeBallastSearch()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST):
  		$this->_S('year', 2015);
  	endif;
  	
  	$expenseApi = new ExpenseApi();
	$this->data = $expenseApi->getBallastTransactions();
	$ballastData = array();
	$dataSummaryPerDay = array();
	$refDates = array();
	$this->ballastData = '';
	$cdate = '';
	$cdatePrice = 0;
	$price = 0;
	foreach($this->data as $r):
		if (DateUtils::DUFormat('Y', $r['reference_date'] ) == $this->_G('year') ):
			$refDates[ $r['reference_date'] ] = $r['reference_date'] ;
		endif;
	endforeach;
	
	foreach($refDates as $dates):
		$price = 0;
		foreach($this->data as $r):
			if ( $dates == $r['reference_date']):
				$price += $r['price'];
			endif;
		endforeach;
		//$ballastData[] = array( 'date' => DateUtils::DUFormat('M d, y', $dates), 'price'=> $price );
		$ballastData[] = array( 'date' => $dates, 'price'=> $price );
	endforeach;

	
	$this->ballastData = json_encode($ballastData);
  	 
  }
  
  public function executeTrendIncomeExpense()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
            //$this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
            $this->_S('months1', '2009-01-01') ;
            $this->_S('months2', DateUtils::GetThisMonthStartDate() );
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', Date('Y'));            
            $this->_S('year2', Date('Y'));
            $this->benchmark = 0;
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->benchmark = '1'; 
            $sdt1 = $this->_G('year1').DateUtils::DUFormat('-m-01', $this->_G('months1'));
			$edt1 = DateUtils::GetLastDate($sdt1);
			$sdt2 = $this->_G('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($this->_G('months2')));
			$edt2 = DateUtils::GetLastDate($sdt2);
			$empNo = $this->_G('employee_no');
			$month1    = DateUtils::DUFormat('M', $sdt1);
			$month2    = DateUtils::DUFormat('M', $sdt2);
			$co   = ($this->_G('company') <> '0') ? $this->_G('company') : null;
			$egrp = ($this->_G('eGroup')  <> 'ALL')  ? $this->_G('eGroup') : null;
			$sales_source = $this->_G('sales_source');
            
			$months = FinanceSummaryPeer::GetMonths($sdt1, $edt2);
			$pos = 0;
			$ginc = 0;
			$gexp = 0;
			$mcsTarget = 500000; //Target Sales
			$acroTarget = 187000; //Target Sales
			$company = array ("1"=>"Micronclean", "2"=>"Acro Solution",
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
			$this->iData = array();
			$this->eData = array();
			$this->noOtData = array();
			$this->iTot = 0;
			$this->eTot = 0;
			$this->ginc = 0;
			$this->gexp = 0;
			$this->salesVexpense = array();
			$this->pager = '';
			$this->subtotal = array();
			$data = array('month'=>0, 'Income'=>0, 'Expenses'=>0, 'alpha'=>0, 'Target'=> 0);
			$this->titles = array();

			/* HR COST *
			 *  SALARY, Overtime, CPF Em, CPF Er, Levy
			 */
			$this->hrCost = array();
			$overtime = array();
			$this->overtime = array();
			$this->seagateSales = array();
			$this->seagateCassetteSales = array();
			$this->otherSales = array();
			foreach($months as $mStart=>$mEnd):
				$period = DateUtils::DUFormat('Ymd', $mStart).'-'.DateUtils::DUFormat('Ymt', $mStart).'-ALL-MONTHLY';
				$overtime = PayEmployeeLedgerArchivePeer::GetTotalOvertimeByPeriodByCode($company[$co], $period);
				
				$this->titles[] = $mStart; //strtolower(DateUtils::DUFormat('M', $mStart))  ;
				$dataSummary = FinanceSummaryPeer::getSummarizedData($mStart, $mEnd, $co, strtolower($company[$co]), 'NOSUBCONTRACTORS', $sales_source);
				$this->iData[] = $dataSummary[0];
				$this->noOtData[] = $dataSummary[1];
				//var_dump($company);
				if ($co == 5):
					$this->nanoPayslip = PayEmployeeLedgerArchivePeer::GetNanoEmployeeData(HrLib::CreatePeriodCode($mStart));
					$dataSummary[1]['sub contractor - Nano Direct'] = $this->nanoPayslip['direct']['salary'];  //inject nano data
					$dataSummary[1]['sub contractor - Nano Indirect'] = $this->nanoPayslip['indirect']['salary'];  //inject nano data
				endif;
				$dataSummary[1]['sub contractor - manpower overtime'] = $overtime;  //inject overtime data
				//unset($dataSummary[1]['subcon - hr forecast']);
				$this->eData[] = $dataSummary[1];
				$this->seagateSales[] = $dataSummary[2];
				$this->otherSales[] = $dataSummary[3];
				$this->seagateCassetteSales[] = $dataSummary[4];
// 				$this->var_dump($dataSummary[2]);
// 				exit();
				
				$this->hrCost[] = PayEmployeeLedgerArchivePeer::GetBreakDownDataByCompanyByPeriod($company[$co], $period);
				//$this->var_dump($this->hrCost);
				
				$this->pager[$mStart] = $dataSummary[1];
				 
				$this->iTot = FinanceSummaryPeer::SumData($this->iData[$pos]);
				$this->eTot = FinanceSummaryPeer::SumData($this->eData[$pos]);
				$this->noOTTot = FinanceSummaryPeer::SumData($this->noOtData[$pos]);
				 
				$this->subtotal[] = $this->noOTTot;  //per month total 
				
				$this->ginc = $this->ginc + $this->iTot;
				$this->gexp = $this->gexp + $this->eTot;

				$this->target = 0;
				$alpha = 0;
				switch($co):
        			case '1':
						$this->target = $mcsTarget;
						$alpha = ($this->iTot < $this->target ? 0.2 : 1 );
						break;
        			case '2':
        				$this->target = $acroTarget;
        				$alpha = ($this->iTot < $this->target ? 0.2 : 1 );
        				break;
        			default:
        				break;
        		endswitch;
				
        		if ($alpha <= 0):
        			$data['alpha'] = ($this->iTot < $this->noOTTot ? 0.2 : 1 );
        		else:
        			$data['alpha'] = $alpha;
        		endif;
        		
				// salves vs expenses
				//$targetTitle = 'Target($'.number_format($target).')';
				$data['month'] = DateUtils::DUFormat('M', $mStart);
				$data['Income'] = $this->iTot;
				$data['Expenses'] = $this->noOTTot;
				$data['Target'] = $this->target;
				$this->salesVexpense[] = $data;
				$pos++;
			endforeach;
// 							self::var_dump($this->seagateCassetteSales);
// 							exit();
// 			$this->var_dump($this->eData);
// 			exit();
			//PieCHart
			$pie = array();
			$others = 0;
			$this->particularTotal = array();
			$this->pie = array();
			foreach($this->eData[0] as $particular => $amt):
				$pie[$particular] = 0;
			endforeach;
			foreach($this->eData[0] as $particular => $amt):
				foreach($this->titles as $pos => $cdate ):
					$amt = (isset($this->eData[$pos][$particular])? $this->eData[$pos][$particular] : 0);
					$pie[$particular] += $amt;
				endforeach;
			endforeach;
			foreach($pie as $particular => $amount):
				if ($amount > 100000):
					if ($particular !== 'subcon - hr forecast' && $particular !== 'overtime'):
						$this->pie[] = array('particular'=>$particular, 'amount' => $amount);
					endif;
				else :	
					$others += $amount;
				endif;
				$this->particularTotal[$particular] = $amount;
			endforeach;
			$this->pie[] = array('particular'=>'Others Below $100,000', 'amount' => $others);
			ksort($this->particularTotal);
			
			$this->salesVexpense = json_encode(($this->salesVexpense));
			$this->pie = json_encode(($this->pie));
			//$this->var_dump($this->pie);
			//exit();
        }   	
  }
  
  
  public function executeWeeklySalesExpense()
  {
  		$year = HrFiscalYearPeer::getFiscalYear();
    	$this->monthList = HTMLLib::GetMonthList();
    	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
    	$this->weekList = HtmlLib::GetWeekList($year);
    	$this->etypeList = array('FULL-TIME'=>'FULL-TIME', 'PART-TIME'=>'PART-TIME');
    	$this->teamList = HrEmployeePeer::GetTeamList();
    	$this->benchmark = 0;
    	
	    $company = array ("1"=>"Micronclean", "2"=>"Acro Solution",
	                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" ); 	
	    $this->companyList = $company;
    	
        if ( $this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('start_date', date('Y-m-01'));
	        $this->_S('end_date', Date('Y-m-d'));
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST)
        {
        	if ($this->_G('daily_update')):
        		$sdt = Date('Y-m-01');
        		$edt = Date('Y-m-d');
        		HrEmployeeDailyPeer::UpdateDaily($sdt, $edt, $this->_U());
        		$this->_SUF('Daily Summary has been updated');
        		$this->redirect('finance/weeklySalesExpense');
        	endif;
        	$this->pager = '';
        	$co = $this->_G('company');
			$sales_source = $this->_G('sales_source');
			$pos = 0;
			$pos = 0;
			$ginc = 0;
			$gexp = 0;
			$mcsTarget = round(500000  * 12 / 52); //Target Sales
			$acroTarget = round(187000 * 12 / 52); //Target Sales
			
	        $weekStart =  DateUtils::DUFormat('W', $this->_G('start_date') ); //$this->_G('week_start');
	        $weekEnd   =  DateUtils::DUFormat('W', $this->_G('end_date') ); //$this->_G('week_end');
	        
	        // Get Weeks in array format w01, w02, w03
	        $this->weeks = array();
	        $wkstart = intval(substr($weekStart,0, 2));
			$wkend = intval(substr($weekEnd, 0, 2));
			$totalWeeks = $wkend - $wkstart ;
			for($x=$wkstart; $x < $totalWeeks + $wkstart ; $x++):
				$this->weeks[] =  'W'. str_pad($x, 2, '0', STR_PAD_LEFT);
			endfor;
			
			//$this->var_dump($this->weeks);
			//exit();
			
			// gather data
        	$sdt = $this->_G('start_date');
        	$edt = $this->_G('end_date');
            $this->teamList = HrEmployeePeer::GetTeamList($this->_G('company') );
            $this->benchmark = '1';
            $this->weeklyData = array();
            $this->weeklyHour = array();
            $this->weeklyOvertime = array();
            $empList = array();
            $this->employeeList = array();
            $this->employeeData = array();
            $empDailyData = array();
            
            //Get Employee Daily Data and generate listing
            $this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDate($sdt, $edt, $company[$co] );
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
            
            
            
            //$this->var_dump($this->weeks);
            //exit();
            //initialize total variable
            $this->totalPerWeek = array();
            $this->totalPerEmployee = array();
            $cdate = '';
            foreach($this->weeks as $week):
            	$this->totalPerWeek[$week]['basic'] = 0;
            	$this->totalPerWeek[$week]['ot'] = 0;
            	foreach($this->employeeList as $empno => $name):
            		$cdate = DateUtils::GetStartAndEndDateOftheWeekNumber(substr($week,1) , DateUtils::DUFormat('Y', $sdt) );
            		$empDailyData = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, $cdate['start'], $cdate['end']);
            		$this->weeklyData[$week][$empno] = $empDailyData['basic'];
            		$this->weeklyOvertime[$week][$empno]  = $empDailyData['ot'];
            		//$this->weeklyHour[$week][$empno] = HrEmployeeDailyPeer::ComputeCostByDateRange($empno, DateUtils::GetFirstDayOfTheWeek($year.$week), DateUtils::GetLastDayOfTheWeek($year.$week));
            		$this->totalPerEmployee[$empno] = 0;
            	endforeach;
            endforeach;
            
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
           	
           	/* HR COST *
			 *  SALARY, Overtime, CPF Em, CPF Er, Levy
			 */
			$this->hrCost = array();
			$overtime = array();
			$this->overtime = array();
			$this->seagateSales = array();
			$this->seagateCassetteSales = array();
			$this->otherSales = array();
			$cweek = array();
			
			$this->iData = array();
			$this->eData = array();
			$this->noOtData = array();
			$this->iTot = 0;
			$this->eTot = 0;
			$this->ginc = 0;
			$this->gexp = 0;
			$this->salesVexpense = array();
			$this->subtotal = array();
			$data = array('week'=>0, 'Income'=>0, 'Expenses'=>0, 'alpha'=>0, 'Target'=> 0);
			$this->titles = array();
			
			foreach($this->weeks as $week):
				$cweek  = DateUtils::GetStartAndEndDateOftheWeekNumber(substr($week, 1), DateUtils::DUFormat('Y', $this->_G('start_date') ) );
				//$this->var_dump($this->totalPerWeek);
				//$this->var_dump($cweek);
				//exit();
				$mStart = $cweek['start'];
				$mEnd   = $cweek['end'];
				//$this->var_dump($cweek);
				//$period = DateUtils::DUFormat('Ymd', $mStart).'-'.DateUtils::DUFormat('Ymt', $mStart).'-ALL-MONTHLY';
				
				$overtime = 0;
				
				
				
				$this->titles[] = $mStart; //$cweek['start']; //strtolower(DateUtils::DUFormat('M', $mStart))  ;
				$dataSummary = FinanceSummaryPeer::getSummarizedData($mStart, $mEnd, $co, strtolower($company[$co]), 'NOSUBCONTRACTORS', $sales_source);
				$this->iData[] = $dataSummary[0];
				$this->noOtData[] = $dataSummary[1];
				
				if ($co == 5):
					$this->nanoPayslip = PayEmployeeLedgerArchivePeer::GetNanoEmployeeData(HrLib::CreatePeriodCode($mStart));
					$dataSummary[1]['sub contractor - Nano Direct'] = $this->nanoPayslip['direct']['salary'];  //inject nano data
					$dataSummary[1]['sub contractor - Nano Indirect'] = $this->nanoPayslip['indirect']['salary'];  //inject nano data
				endif;
				$dataSummary[1]['sub contractor basic - estimate'] = $this->totalPerWeek[$week]['basic'];  //inject basic data
				$dataSummary[1]['sub contractor overtime - estimate'] = $this->totalPerWeek[$week]['ot'];  //inject basic data
				//unset($dataSummary[1]['subcon - hr forecast']);
				$this->eData[] = $dataSummary[1];
				$this->seagateSales[] = $dataSummary[2];
				$this->otherSales[] = $dataSummary[3];
				$this->seagateCassetteSales[] = $dataSummary[4];
				//$this->hrCost[] = PayEmployeeLedgerArchivePeer::GetBreakDownDataByCompanyByPeriod($company[$co], $period);
				//$this->var_dump($this->hrCost);
				
				//$this->pager[$mStart] = $dataSummary[1];
				
				$this->iTot = FinanceSummaryPeer::SumData($this->iData[$pos]);
				$this->eTot = FinanceSummaryPeer::SumData($this->eData[$pos]);
				$this->noOTTot = FinanceSummaryPeer::SumData($this->noOtData[$pos]);
				 
				$this->subtotal[] = $this->noOTTot;  //per month total 
				
				$this->ginc = $this->ginc + $this->iTot;
				$this->gexp = $this->gexp + $this->eTot;

				$this->target = 0;
				$alpha = 0;
				switch($co):
        			case '1':
						$this->target = $mcsTarget;
						$alpha = ($this->iTot < $this->target ? 0.2 : 1 );
						break;
        			case '2':
        				$this->target = $acroTarget;
        				$alpha = ($this->iTot < $this->target ? 0.2 : 1 );
        				break;
        			default:
        				break;
        		endswitch;
				
        		if ($alpha <= 0):
        			$data['alpha'] = ($this->iTot < $this->noOTTot ? 0.2 : 1 );
        		else:
        			$data['alpha'] = $alpha;
        		endif;
        		
				// salves vs expenses
				//$targetTitle = 'Target($'.number_format($target).')';
				$data['week'] = $week;
				$data['Income'] = $this->iTot;
				$data['Expenses'] = $this->noOTTot;
				$data['Target'] = $this->target;
				$this->salesVexpense[] = $data;
				$pos++;
			endforeach;
			$pie = array();
			$others = 0;
			$this->particularTotal = array();
			$this->pie = array();
			foreach($this->eData[0] as $particular => $amt):
				$pie[$particular] = 0;
			endforeach;
			foreach($this->eData[0] as $particular => $amt):
				foreach($this->titles as $pos => $cdate ):
					$amt = (isset($this->eData[$pos][$particular])? $this->eData[$pos][$particular] : 0);
					$pie[$particular] += $amt;
				endforeach;
			endforeach;
			foreach($pie as $particular => $amount):
				if ($amount > 1000):
					if ($particular !== 'subcon - hr forecast' && $particular !== 'overtime'):
						$this->pie[] = array('particular'=>$particular, 'amount' => $amount);
					endif;
				else :	
					$others += $amount;
				endif;
				$this->particularTotal[$particular] = $amount;
			endforeach;
			$this->pie[] = array('particular'=>'Others Below $1,000', 'amount' => $others);
			ksort($this->particularTotal);
			
			$this->salesVexpense = json_encode(($this->salesVexpense));
			$this->pie = json_encode(($this->pie));
        }
  }
  
    public function executePayrollCosts()
    {
    	
    }
    
  public function executeDailyIncomeExpense()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
            $this->_S('sdate', DateUtils::GetThisMonthStartDate());
            $this->_S('edate', DateUtils::GetThisMonthEndDate());
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', Date('Y'));            
            $this->_S('year2', Date('Y'));
        }
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->benchmark = '1'; 
            $company = array ("1"=>"Micronclean", "2"=>"Acro Solution", 
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
            $co    = $this->_G('company');
            $sdate = $this->_G('sdate');
	        $edate = $this->_G('edate');
	        $this->iData = array();
	        $this->eData = array();
	        $this->dailyExpense = array();
	
	        
	        // Get Weeks in array format w01, w02, w03
	        $days = array();
	        $totalDays = DateUtils::DateDiff('d', $sdate, $edate);
			for($x=0; $x <= $totalDays; $x++):
				$days[] =  DateUtils::AddDate($sdate, $x) ;
				$this->iData[DateUtils::AddDate($sdate, $x) ] = array();
				$this->eData[DateUtils::AddDate($sdate, $x) ] = array();
				$this->dailyExpense[DateUtils::AddDate($sdate, $x) ] = 0;
			endfor;
			
			foreach($days as $day):
				$dataSummary = FinanceSummaryPeer::getSummarizedData($day, $day, $co, strtolower($company[$co]), 'NOSUBCONTRACTORS', $this->_G('sales_source') );
				$this->iData[$day] = $dataSummary[0];
				$this->eData[$day] = $dataSummary[1];
			endforeach;
			
			
			$totalExpensePerDay = 0;
			$excludethis = array('management fee (fix)', 'flat rental (fix)', 'car rental (fix)', 'extra salaries', 'depreciation (fix)');
			foreach ($this->eData as $day => $component):
				$totalExpensePerDay = 0;
				foreach($component as $comp => $amt):
					if (! in_array($comp, $excludethis)  ):
						$totalExpensePerDay +=  $amt;
					endif;
				endforeach;
				$this->dailyExpense[$day] = $totalExpensePerDay;
			endforeach;
// 			HTMLLib::vardump($this->iData);
        }   	
  	
  }
  
    public function executeHrCost()
    {
    	if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
        	$this->_S('sdate', Date('Y').'-01-01' );
        	$this->_S('edate', Date('Y').'-12-31' );
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST):
	        $this->benchmark = 1;
	        $this->_S('sdate', $this->_G('year') .'-01-01');
	        $this->_S('edate', $this->_G('year') .'-12-31');
	    endif;
	    $this->year = HrFiscalYearPeer::GetFiscalYearListYK();
        $company = $this->_G('company');
        $year = DateUtils::DUFormat('Y', $this->_G('sdate') );
        $this->acctCodes = PayEmployeeLedgerArchivePeer::GetAccountCodeList($year);
        $employeeList = PayEmployeeLedgerArchivePeer::GetEmployeeList($company, $year);
        //$employeeList = array('S2653006G' => 'HUNG LEOK SEW');
        $periodList = PayEmployeeLedgerArchivePeer::GetPeriodList($year);
        asort($periodList);
        $this->periodList = $periodList;
        $this->employeeList = $employeeList;
        if ( $this->getRequest()->getMethod() == sfRequest::POST):
        	$acctCode = array();
        	foreach($_POST as $var => $whatever):
        		if ( substr($var, 0, 4) == 'chk_' ):
        			$acct = str_replace('chk_', '', $var);
        			$acctCode[$acct] = PayAccountCodePeer::GetDescriptionbyAcctCode($acct);
        			if ($acct == 'TAKEHOMEPAY'):
						$acctCode[$acct] = 'TAKE HOME PAY';
					endif;
					if ($acct == 'LEVYCOST'):
						$acctCode[$acct] = 'LEVY COST';
					endif;
					if ($acct == 'CPFEMPLOYER'):
						$acctCode[$acct] = 'CPF EMPLOYER SHARE';
					endif;
        		endif;
        	endforeach;
        	$this->acctCode = $acctCode;
        	$this->data = array();
        	//$analysisAccount = $acctCode;
        	foreach($employeeList as $empNo => $name):
        		foreach($periodList as $period):
        			$paydata = PayEmployeeLedgerArchivePeer::GetEmployeeData($period, $empNo);
        			foreach($acctCode as $acct_code => $whatever):
        				if (! isset($this->data[$name][$period][$acct_code])):
        					$this->data[$name][$period][$acct_code] = 0 ;
        				endif;
        				if ($acct_code == 'TAKEHOMEPAY'):
        					$this->data[$name][$period]['TAKEHOMEPAY'] = PayEmployeeLedgerArchivePeer::GetTakeHomePay($empNo, $period); 
        				endif; 
        				if ($acct_code == 'LEVYCOST'):
        					$this->data[$name][$period]['LEVYCOST'] = PayEmployeeLevyPeer::GetLevyByPeriodEmployeeNo($period, $empNo);
        				endif; 
        				
        	
        				if ($acct_code <> 'TAKEHOMEPAY' && $acct_code <> 'LEVYCOST'):
	        				foreach($paydata as $r):
	        					if ($r->getAcctCode() == $acct_code):
	        						$this->data[$name][$period][$acct_code] += $r->getAmount();
	        					endif; 
	        					if (($r->getAcctCode() == 'TD' || $r->getAcctCode() == 'UL') && $r->getAcctCode() == 'PI' && $acct_code == 'BP'):
	        						$this->data[$name][$period][$acct_code] += $r->getAmount();
	        					endif; 
//	        					if ( ($r->getAcctCode() == 'HA' || $r->getAcctCode() == 'VA') && $acct_code == 'OT'):
//	        						$this->data[$name][$period][$acct_code] += $r->getAmount();
//	        					endif; 
//	        					if (  $acct_code == 'OT'):
//	        						$this->data[$name][$period][$acct_code] += $r->getAmount();
//	        					endif; 
	        					if ($acct_code == 'CPFEMPLOYER' && $r->getAcctCode() == 'CPF'):
        							$this->data[$name][$period]['CPFEMPLOYER'] = $r->getCpfEr() * -1;
        						endif; 
	        				endforeach;
	        			endif;
        			endforeach;
        		endforeach;
        	endforeach;
        	
        	// analysis chart
        	foreach($employeeList as $empNo => $name):
        		$analysisAccount = $acctCode;
        		$analysisAccount['income'] = 0;
        		$deduct = 0;
        		$income = 0;
        		foreach($periodList as $period):
					foreach($acctCode as $acct_code => $whatever):
						$analysisAccount[$acct_code] += $this->data[$name][$period][$acct_code];
						$analysisAccount['name'] = substr($name, 0 ,15);
						$deduct +=  $this->data[$name][$period][$acct_code];
        			endforeach;
        		endforeach;
        		$income = PayEmployeeLedgerArchivePeer::GetIncomeSumPerYear($empNo, substr($period,0,4));
        		$analysisAccount['income'] += $income - $deduct;
        		$this->data['analysis'][] = ( $analysisAccount); 
        		$this->data['acctList'] = array_merge($acctCode, array('income'=> 'Other Income'));
        	endforeach;
    	$this->var_dump($this->data['analysis']);
        endif;
		
    }
}
