<?php

        	$ndays = DateUtils::DUFormat('t', $sdate);
        	$cdays = array();
        	$ndAll = 0;
        	for($x=0; $x <= (DateUtils::DateDiff('d',$sdate, $edate) ); $x++)
        	{
        		$cdays[DateUtils::AddDate($sdate, $x)] = DateUtils::AddDate($sdate, $x); 	
        	}
        	
        	foreach ($cdays as $kdt=>$vdt)
        	{
      			if ( $sf_params->get('employee_no') )
				{
					//-------------------------- Individual
					$empList = array($sf_params->get('employee_no')=>$sf_params->get('employee_no'));
					$empNoDtr = array();
				}else{
					//-------------------------- Per Company
					$empList  = TkDtrsummaryPeer::GetEmpListbyDateRange($kdt, $kdt, $co);
					$empNoDtr = TkDtrmasterPeer::GetEmployeeListForNoDtr($co);
		 		}
		 		$arrDays[$kdt] = HrLib::GetChartData($empList, $kdt, $kdt);
        	}
        	$ndBas = 0;
        	$ndEmpInfo = '';
        	$ndDtr = 0;
        	//----------------------------------- get Basic and Allowance for all employee with NO dtr
        	foreach($empNoDtr as $ndEmpno=>$ve)
        	{
        		$ndEmpInfo = PayBasicPayPeer::GetOptimizedDatabyEmployeeNo($ndEmpno, array('scheduled_amount', 'allowance'));
        		$ndBas = $ndBas + round( $ndEmpInfo->get('SCHEDULED_AMOUNT') / $ndays );
        		$ndAll = round( $ndEmpInfo->get('ALLOWANCE') / $ndays - 4 );
        	}
        	
        	$all   = round($ndAll, 2);
        	$ndDtr = round($ndBas, 2);
        	$allw  = array();
			$normal=  array();
			$ot    = array();
			$basic = array();
			$total = array();
			$otPay = array();
			$comData = array();
			$meal   = array();
			$noDtr = array();
			$tickLabelsAmount = array();
			$ballonLabels = array();
			$tickLabelsHour = array();
			$gAmt  = 0;
			$sAllw = 0;
			$sMeal = 0;
			$sBasic = 0;
			$sOvertime = 0;
			$sNoDtr = 0;
        	foreach($arrDays as $ka=>$va)
        	{
        		if ( isset($arrDays[$ka]) )
        		{
        			//echo  $ka. ' :  ' . $arrMonth[$ka][1][8] .'<-------------- basic<br>';
        			$basic[]  = $arrDays[$ka][1][8];
        			$otPay[]  = $arrDays[$ka][1][6];
        			$normal[] = $arrDays[$ka][1][5];
        			$ot[]     = $arrDays[$ka][1][2];
        			$meal[]   = $arrDays[$ka][1][9];
					$totHr    = $arrDays[$ka][1][5] + $arrDays[$ka][1][2];         			        			
        			$tickLabelsAmount[]  = DateUtils::DUFormat('M-d', $ka);
        			$ballonLabels[] 	 = $ka .'\nEmp-Count: '. $arrDays[$ka][1][10];
        			$tickLabelsHour[]    = DateUtils::DUFormat('d', $ka);
        			$noDtr[] 		   	 = $ndDtr;
        			$allw[]  			 = $all  + $arrDays[$ka][1][11];
        			$sAllw               = $sAllw + $all  + $arrDays[$ka][1][11];
        			$sMeal				 = $sMeal + $arrDays[$ka][1][9];
        			$sBasic				 = $sBasic + $arrDays[$ka][1][8];
        			$sOvertime			 = $sOvertime + $arrDays[$ka][1][6];
        			$sNoDtr				 = $sNoDtr + $ndDtr;
        			$totAmt[]   		 = $arrDays[$ka][1][8] + $arrDays[$ka][1][6] + $arrDays[$ka][1][9] + $all + $ndDtr + $arrDays[$ka][1][11] ;
        			$gAmt 				 = $gAmt + $arrDays[$ka][1][8] + $arrDays[$ka][1][6] + $arrDays[$ka][1][9] + $all + $ndDtr + $arrDays[$ka][1][11];
        			//echo $all .' - '. $arrDays[$ka][1][11] . $arrDays[$ka] .'<br>';
        		}
        	}
