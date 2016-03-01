<?php

/**
 * production actions.
 *
 * @package    snapps
 * @subpackage production
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class productionActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  }
  
  public function executeDailyMatrix()
  {
	  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
	  	{
	  		$this->_S('start_date', Date('Y-m-01'));
	  		$this->_S('end_date', Date('Y-m-t'));
	  		$this->_S('cleanroompacking', true);
	  		$this->_S('incoming', true);
	  		$this->_S('shoewashing', true);
	  		$this->_S('shoepacking', true);
	  		$this->_S('shoesvacuumpack', true);
	  		$this->_S('mcssupport', true);
	  		$this->_S('packingjumpsuit', true);
	  		$this->_S('outsideshoepacking', true);
	  		$this->_S('mcsother', false);
	  		$this->_S('mcsall', false);
	  	}
	  	$this->company = array ("1"=>"Micronclean", "2"=>"Acro Solution",
	  			"5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
        
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
        	$this->start = $this->_G('start_date');
        	$this->end   = $this->_G('end_date');
        	$this->days = array();
        	$totalDays = DateUtils::DateDiff('d', $this->start, $this->end);
        	for($x=0; $x <= $totalDays; $x++):
        		$this->days[] =  DateUtils::AddDate($this->start, $x) ;
        	endfor;
        	
        	
			// gather data
        	$sdt = $this->_G('start_date');
        	$edt = $this->_G('end_date');
            $this->benchmark = '1';
            $this->dailyData = array();
            $this->dailyHour = array();
            $this->dailyOvertime = array();
            $empList = array();
            $this->employeeList = array();
            $this->employeeData = array();
            $empDailyData = array();
            $co = $this->company[$this->_G('company')];
            
            $deptList = array (
            		'CLEANROOM PACKING' => 'CLEANROOM PACKING',
            		'INCOMING(SORTING JUMPSUIT)' => 'INCOMING(SORTING JUMPSUIT)',
            		'SHOE WASHING' => 'SHOE WASHING',
            		'SHOE PACKING' => 'SHOE PACKING',
            		'SHOES VACUUM PACK' => 'SHOES VACUUM PACK',
            		'MCS SUPPORT' => 'MCS SUPPORT',
            		'PACKING (JUMPSUIT)' => 'PACKING (JUMPSUIT)',
            		'OUTSIDE SHOE PACKING' => 'OUTSIDE SHOE PACKING',
            );
            
            $dept = array();
            $dept = $this->_G('cleanroompacking')? array_merge($dept, array($this->_G('cleanroompacking'))) : $dept;
            $dept = $this->_G('incoming')? array_merge($dept, array($this->_G('incoming'))) : $dept;
            $dept = $this->_G('shoewashing')? array_merge($dept, array($this->_G('shoewashing'))) : $dept;
            $dept = $this->_G('shoepacking')? array_merge($dept, array($this->_G('shoepacking'))) : $dept;
            $dept = $this->_G('shoesvacuumpack')? array_merge($dept, array($this->_G('shoesvacuumpack'))) : $dept;
            $dept = $this->_G('mcssupport')? array_merge($dept, array($this->_G('mcssupport'))) : $dept;
            $dept = $this->_G('packingjumpsuit')? array_merge($dept, array($this->_G('packingjumpsuit') )) : $dept;
            $dept = $this->_G('outsideshoepacking')? array_merge($dept, array($this->_G('outsideshoepacking'))) : $dept;
            $dept = $this->_G('mcsother')? array_merge($dept, array($this->_G('mcsother'))) : $dept;
            
           	$hasTeamFilter = false;
            if ( $this->_G('mcsother')):
            	foreach($dept as $d):
            		unset($deptList[$d]);
            	endforeach;
            	$this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDateTeamList($sdt, $edt, $co, 'NOTIN', $deptList );
            	$hasTeamFilter = true;
            endif;
            if ( $this->_G('mcsall') ):
            	$this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDateTeamList($sdt, $edt, $co, 'ALL' );
            	$dept = array_diff($dept, $deptList);
            	$hasTeamFilter = true;
            endif;
            if (  ! $hasTeamFilter ):
            	$this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDateTeamList($sdt, $edt, $co, 'IN', $dept );
            	$hasTeamFilter = true;
            endif;
            
//             if (! implode($dept)) {
//             	return $this->getContext()->getRequest()->getErrorMsg()->addMsg('Must Select a Group.');
//             }
            
            //Get Employee Daily Data and generate listing
            //$this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDate($sdt, $edt, $co );
            //$this->employeeDaily = HrEmployeeDailyPeer::GetEmployeeByDateTeamList($sdt, $edt, $co, $dept );
            $this->employeeTeam = array();
            $this->employeeList = array();
            $this->teamList = array();
            foreach($this->employeeDaily as $empDaily):
	            $this->employeeList[$empDaily->getEmployeeNo()] = $empDaily->getName();
            	$this->employeeTeam[$empDaily->getEmployeeNo()] = $empDaily->getDepartment();
            	$this->teamList[$empDaily->getDepartment()] = $empDaily->getDepartment();
	            $empList[] = $empDaily->getEmployeeNo();
	            $this->teamList[$empDaily->getDepartment()] = $empDaily->getDepartment();
             endforeach;
//             $this->var_dump($this->teamList);
//             exit();
//             if ($this->_G('filter_name')):
//             	foreach($_POST as $var => $val):
// 	           	 	if (substr($var, 0, 4) == 'chk_' ):
// 	            		$this->employeeList = array();
// 	            	endif;
// 	            endforeach;
// 	            foreach($_POST as $var => $val):
// 	            	if (substr($var, 0, 4) == 'chk_' ):
// 	            	$this->employeeList[substr($var, 4)] = HrEmployeePeer::GetNamebyEmployeeNo(substr($var, 4));
// 	            endif;
//             	endforeach;
//             endif; 
//             $this->var_dump($this->employeeList);
//             exit();
//             $this->var_dump($this->employeeList);
//             exit();
            //GATHER DATA EMPLOYEE DATA
            $this->employeeData = array();
            $this->totalSalaryPerDay = array();
            $this->totalHrsWrkPerDay = array();
            foreach($this->employeeList as $empNo => $name ):
           		foreach($this->days as $cdate):
           			$this->employeeData[$empNo][$cdate]['hrs_worked'] = 0;
            		$this->employeeData[$empNo][$cdate]['salary'] = 0;
            		$this->employeeData[$empNo][$cdate]['is_on_leave'] = '';
            		$this->totalSalaryPerDay[$cdate] = 0;
            		$this->totalHrsWrkPerDay[$cdate] = 0;
           		endforeach;
            endforeach;
            
            $dailyComputedData = HrEmployeeDailyPeer::GetDataByDateRangeByEmployeeList($sdt, $edt, $this->employeeList);
            foreach($dailyComputedData as $r):
            	$this->employeeData[$r->getEmployeeNo()][$r->getTransDate()]['hrs_worked'] = $r->getShift();
           		$this->employeeData[$r->getEmployeeNo()][$r->getTransDate()]['salary'] = $r->getBasic() + $r->getOt() + $r->getAllowance() + $r->getMeal() + $r->getParttime();
           		$this->employeeData[$r->getEmployeeNo()][$r->getTransDate()]['is_on_leave'] = $r->getIsOnLeave();
           		$this->employeeData[$r->getEmployeeNo()][$r->getTransDate()]['shift'] = $r->getShift();
            endforeach;
            foreach($this->employeeList as $empNo => $name ):
	            $totalHrsWorked = 0;
	            $totalSalary = 0;
            	foreach($this->days as $cdate):
            		$totalHrsWorked += $this->employeeData[$empNo][$cdate]['hrs_worked'];
            		$totalSalary += $this->employeeData[$empNo][$cdate]['salary'];
            	endforeach;
            	$this->employeeData[$empNo]['total_hrs_worked'] = $totalHrsWorked;
            	$this->employeeData[$empNo]['total_salary'] = $totalSalary;
            endforeach;
            foreach($this->employeeList as $empNo => $name ):
           		foreach($this->days as $cdate):
           			$this->totalSalaryPerDay[$cdate] += $this->employeeData[$empNo][$cdate]['salary'];
            		$this->totalHrsWrkPerDay[$cdate] += $this->employeeData[$empNo][$cdate]['salary'];
           		endforeach;
            endforeach;
            
            // GATHER ARTICLE DATA
            $mArt = array();
            $this->articleList = array();
            $serList = SalesQuantitySummaryPeer::GetOptimizedDatabyProductGroupDateRange($sdt, $edt, $dept);
            // INITIALIZE THE ARRAY FOR ARTICLES
            foreach($this->days as $cdate):
            	foreach($serList as $ke=>$ve):
            		$mArt[$cdate][$ve] = 0 ;
            		$this->articleList[$ve] = $ve;
            	endforeach;
            	$mArt[$cdate]['total'] = 0 ;
            endforeach;
           
            foreach($serList as $ke=>$ve):
            	$serData = SalesQuantitySummaryPeer::GetDataByProductGroupDateRange($ve, $sdt, $edt);
            	foreach($this->days as $cdate):
	            	foreach( $serData as $rec):
	            		if ($cdate == $rec->getDateTransaction()):
	            			$nqty = ($rec->getQuantity() > 0? $rec->getQuantity() : 0);
	            			$mArt[$cdate][$ve] = $nqty ;
	            		endif;
	            	endforeach;
            	endforeach;
            endforeach;

            
            // SUM THE TOTAL ARTICLES
            foreach($this->days as $cdate):
            $total = 0;
	            foreach($serList as $ke=>$ve):
	            	$total += $mArt[$cdate][$ve] ;
	            endforeach;
	            $mArt[$cdate]['total'] = $total ;
            endforeach;
            foreach($serList as $ke=>$ve):
	            $total = 0;
	            foreach($this->days as $cdate):
	            	$total += $mArt[$cdate][$ve] ;
	            endforeach;
	            $mArt[$ve]['total'] = $total ;
            endforeach;

            $this->articleData = $mArt;
//             $this->var_dump($this->employeeData);
//             exit();
            
            
            $this->employeeSalaryChart = array();
            $this->employeeHours = array();
            $this->employeeCount = array();
            $counter = 0;
            foreach($this->days as $cdate):
            	$this->employeeSalaryChart[$cdate]['salary'] = 0;
            	$this->employeeHours[$cdate]['hrs_worked'] = 0;
            	$this->employeeCount[$cdate]['employee_count'] = 0;
            endforeach;
            
            foreach($this->employeeData as $empNo => $whatever):
	            foreach($this->days as $cdate):
	            	if (! $this->employeeData[$empNo][$cdate]['is_on_leave'] ):
	            		$this->employeeSalaryChart[$cdate]['salary'] += $this->employeeData [$empNo][$cdate]['salary'] ;
	            		$this->employeeHours[$cdate]['hrs_worked'] += $this->employeeData[$empNo][$cdate]['hrs_worked'];
	            	endif;
	            endforeach;
            endforeach;
            foreach($this->days as $cdate):
            	$counter = 0;
            	foreach($this->employeeData as $empNo => $whatever):
            		if ($this->employeeData[$empNo][$cdate]['shift'] > 0 && ! $this->employeeData[$empNo][$cdate]['is_on_leave']):
            			$counter ++;
            		endif;
            	endforeach;
            	$this->employeeCount[$cdate]['employee_count'] = $counter;
           	endforeach;
           	
           	//PRODUCTIVITY COMPUTATION
           	$this->productivityByTeam = array();
           	$this->salaryByTeam = array();
           	$this->salaryByTeamByDate = array();
           	foreach($this->teamList as $team):
           		foreach($this->days as $cdate):
           			$manhour = 0;
           			$manpowercost = 0;
           			foreach($this->employeeTeam as $empNo => $dept):
           				if ($dept == $team):
           					//$manhour += $this->employeeData[$empNo][$cdate]['hrs_worked'];
           					$manpowercost += $this->employeeData[$empNo][$cdate]['salary'];
           					$this->salaryByTeamByDate[$cdate] = 0;
           				endif;
           			endforeach;
           			//$this->productivityByTeam[$team][$cdate] = $this->articleData[$cdate]['total'] / $manhour;
           			$this->salaryByTeam[$team][$cdate] = $manpowercost;
           		endforeach;
           	endforeach;
           	foreach($this->days as $cdate):
           		foreach($this->salaryByTeam as $team => $whatever):
           		$this->salaryByTeamByDate[$cdate] += $this->salaryByTeam[$team][$cdate];
           		endforeach;
           	endforeach;
//            	$this->var_dump($this->productivityByTeam);
//            	exit();
           
           	//PREPARE CHART DATA
           	//FIRST CHART
            $productivity=array();
            $this->productivity = '';
            $average = 10;
            foreach($this->days as $cdate):
            	$productivity[] = array(
            			  'productivity' => number_format($this->articleData[$cdate]['total'] / $this->employeeHours[$cdate]['hrs_worked'], 1) 
            			, 'date' => DateUtils::DUFormat('D-d', $cdate)
            			, 'average' => $average 
            	);
            endforeach;
            $this->productivityChart= json_encode($productivity);
            
            
            //SECOND CHART
            $manhour = array();
            $average  = 840;
            foreach($this->days as $cdate):
            	$manhour[] = array(
            			  'manhour' => $this->employeeHours[$cdate]['hrs_worked']
            			, 'date' => DateUtils::DUFormat('D-d', $cdate)
            			, 'average' => $average
            	);
            endforeach;
            $this->manhourChart = json_encode($manhour);
            
            
            //THIRD CHART
            $productivityByTeam = array();
            $salary = array();
            $salaryChart = array();
            $this->teamSalaryColor = array();
            //$col = array('666633', '999966', 'CC6666', '663333', 'A97D5D', '5C755E', '336699', 'CC6600', '000063', '5A79A5', '9ACCA6', '0191C8', '005B9A'); 
            foreach($this->days as $cdate):
            	foreach($this->salaryByTeam as $team => $whatever):
		            $salary = array_merge( $salary, array($team => $this->salaryByTeam[$team][$cdate]) );
           			//$this->teamSalaryColor[$team] = "#".$col[array_rand($col)];
            		$this->teamSalaryColor[$team] = HTMLLib::GenerateRandomColor();
	            endforeach;
	            $salaryChart[] = array_merge($salary, array('date' => DateUtils::DUFormat('D-d', $cdate) ) );
            endforeach;
            //$this->var_dump($this->teamSalaryColor);
            $this->salaryChartJson = json_encode($salaryChart);
            
            
            
        }     	

 
  }
  
  public function executeWeeklyMatrix()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
        	$this->_S('from_week_no', 1);
        	$this->_S('to_week_no', 10);
        	$this->_S('cyear', HrFiscalYearPeer::GetFiscalYear());
        	$this->_S('duration', 'PAID HOURS');
            //$this->_S('sdate', DateUtils::GetThisMonthStartDate());
            //$this->_S('edate', DateUtils::GetThisMonthEndDate());
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            if (! $this->_G('from_week_no') || ! $this->_G('to_week_no')) :
            	$this->_ERR('Please Provide the week number...');
            	return;
            endif;
            $this->benchmark = '1'; 
        }     	
 
  }  

  public function executeMonthlyMatrix()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
            $this->_S('months1', '2015-01-01') ;
            //$this->_S('months1', DateUtils::GetPrevMonthStartDate() );
            $this->_S('months2', DateUtils::GetPrevMonthStartDate() );
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', HrFiscalYearPeer::getFiscalYear());            
            $this->_S('year2', HrFiscalYearPeer::getFiscalYear());
            $this->_S('cleanroompacking', true);
            $this->_S('incoming', true);
            $this->_S('shoewashing', true);
            $this->_S('shoepacking', true);
            $this->_S('shoesvacuumpack', true);
            $this->_S('mcssupport', true);
            $this->_S('packingjumpsuit', true);
            $this->_S('outsideshoepacking', true);
            $this->_S('mcsother', true);
            $this->powerData = array();
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->benchmark = '1'; 
            $sdt1 = $this->_G('year1').DateUtils::DUFormat('-m-01', $this->_G('months1'));
            $edt1 = DateUtils::GetLastDate($sdt1);
            $sdt2 = $this->_G('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($this->_G('months2')));
            $edt2 = DateUtils::GetLastDate($sdt2);
            $this->powerData = array();
            $this->waterData = array();
			$start = $month = strtotime($sdt1);
			$end = strtotime($edt2);
			while($month < $end)
			{
				 $this->powerData[date('Y-m-d', $month)] = 0;
				 $this->waterData[date('Y-m-d', $month)] = 0;
			     //echo date('Y-m-d', $month), PHP_EOL;
			     $month = strtotime("+1 month", $month);
			}
			
			$this->powerData = array(
					'2015-01-01' => 167387
					,'2015-02-01' => 173303
					,'2015-03-01' => 150728
					,'2015-04-01' => 169408
					,'2015-05-01' => 163035
					,'2015-06-01' => 159093
					,'2015-07-01' => 148516
					,'2015-08-01' => 162981
					,'2015-09-01' => 164223
					,'2015-10-01' => 159008
					,'2015-11-01' => 0
					,'2015-12-01' => 0
			);
			 
			$this->waterData = array(
					'2015-01-01' => 2688
					,'2015-02-01' => 2778
					,'2015-03-01' => 2158
					,'2015-04-01' => 2593
					,'2015-05-01' => 2571
					,'2015-06-01' => 2625
					,'2015-07-01' => 2111
					,'2015-08-01' => 2631
					,'2015-09-01' => 3811
					,'2015-10-01' => 2965
					,'2015-11-01' => 0
					,'2015-12-01' => 0
			);
// 			$monthlyUsage = 0;
// 			foreach($this->powerData as $month => $whatever):
// 				$this->powerData[$month] = PowerUsagePeer::ComputeMonthlyConsumption($month );
// 				$this->waterData[$month] = WaterUsagePeer::ComputeMonthlyConsumption($month );
// 			endforeach;
// 			$this->var_dump($powerData);
// 			exit();
//             $powerData = PowerUsagePeer::getMonthlyData();
//             $waterData = WaterUsagePeer::getMonthlyData();
        }     	
      
  }
  
  public function executeAjaxGetTeamList()
  {
  	$this->company = $this->_G('company');
    
  }
  
  public function executeMalaysiaPowerAndWater()
  {
  	$this->powerData = array(
  		 '2015-01-01' => 80031
  		,'2015-02-01' => 70624
  		,'2015-03-01' => 77005
  		,'2015-04-01' => 80565
  		,'2015-05-01' => 77182
  		,'2015-06-01' => 72085
  		,'2015-07-01' => 77247
  		,'2015-08-01' => 87663
  		,'2015-09-01' => 79093
  		,'2015-10-01' => 0
  		,'2015-11-01' => 0
  		,'2015-12-01' => 0
  	);
  	
  	$this->waterData = array(
  			'2015-01-01' => 662
  			,'2015-02-01' => 604
  			,'2015-03-01' => 677
  			,'2015-04-01' => 643
  			,'2015-05-01' => 507
  			,'2015-06-01' => 489
  			,'2015-07-01' => 529
  			,'2015-08-01' => 624
  			,'2015-09-01' => 602
  			,'2015-10-01' => 0
  			,'2015-11-01' => 0
  			,'2015-12-01' => 0
  	);
  	
  	$this->articleData = array(
  			 '2015-01-01' => 460800
  			,'2015-02-01' => 379200
  			,'2015-03-01' => 410880
  			,'2015-04-01' => 452640
  			,'2015-05-01' => 426720
  			,'2015-06-01' => 305280
  			,'2015-07-01' => 368180
  			,'2015-08-01' => 459840
  			,'2015-09-01' => 427369
  			,'2015-10-01' => 479040
  			,'2015-11-01' => 376320
  			,'2015-12-01' => 0
  	);
  	
  	
  	
  
  }
    
}
