<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/generalInfo'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Daily</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"' );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15" ' );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Week From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $week1 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo select_tag('week1', 
         options_for_select($week1, 
         $sf_params->get('week1') ) );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    $week2 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo select_tag('week2', 
         options_for_select($week2, 
         $sf_params->get('week2')) );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Month From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $months1 = sfconfig::get('monthlyCalendar');
    echo select_tag('months1', 
         options_for_select($months1, 
         $sf_params->get('months1') ) );    
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";         
    $months2 = sfconfig::get('monthlyCalendar');
    echo select_tag('months2', 
         options_for_select($months2, 
         $sf_params->get('months2') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );
//    echo HTMLForm::DrawDateInput('pdate', $sf_params->get('pdate'), XIDX::next(), XIDX::next(), 'size="15"');
//    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;Company</span>";
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );

    echo select_tag('eGroup', 
         options_for_select(HrEmployeePeer::OptionEmploymentGroup(), 
         $sf_params->get('eGroup') ) );    
         
    
    ?>
    </td>    
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Frequency</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $freq = array ( "monthly"=>" - Monthly - ", "daily"=>" - Daily - ", "weekly"=>" - Weekly - ");
    echo select_tag('frequency', 
         options_for_select($freq, 
         $sf_params->get('frequency') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('employee_no'); 
        echo select_tag('employee_no', 
             options_for_select(HrEmployeePeer::GetEmployeeNameList(), 
             $sf_params->get('employee_no') ) );    
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Show Benchmark " class="submit-button">
    </td>
</tr>
</table>
</form>

<?php echo javascript_tag("


function onWeekChanged(ev, args) {
    
    obj = YAHOO.util.Event.getTarget(ev);
    alert(obj.options[obj.selectedIndex].value);
}

YAHOO.util.Event.addListener('week2', 'change', onWeekChanged);
YAHOO.util.Event.addListener('week1', 'change', onWeekChanged);

") 

?>


<?php
	if (isset($benchmark))
	{ 
		
		$colors = sfConfig::get('app_amcharts_colors');
		$col = array('666633', '999966', 'CC6666', '663333', 'A97D5D', '5C755E', '336699', 'CC6600', '000063', '5A79A5', '9ACCA6', '0191C8', '005B9A');
		//$col   = array('CC6600', 'FF9900', 'C13100');
        //$col = array('FF0000', 'FF6600', 'FFFF00', '0000FF', '00CCFF',   '330066');
        //array('990000', 'FF6600', 'ff9999', '993300', );
        //$col = array('3300CC', '3366FF', '0099FF', '66CCFF', '0000FF', '3333CC', '666699');
        //$col = array('660000', '990000', 'CC0000', 'FF0000', 'FF3333', 'FF6666', 'FF9999');
        $sdate = $sf_params->get('sdate');
        $edate = $sf_params->get('edate');
        $sdt1 = $sf_params->get('months1');
        $edt1 = DateUtils::GetLastDate($sdt1);
        $sdt2 = $sf_params->get('months2');
        $edt2 = DateUtils::GetLastDate($sdt2);
        $empNo = $sf_params->get('employee_no');
   		$month1    = DateUtils::DUFormat('M', $sdt1);
		$month2    = DateUtils::DUFormat('M', $sdt2);
        $co = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
        		
//		if ( $sf_params->get('employee_no') )
//		{
//			//-------------------------- Individual
//			$empList = array($sf_params->get('employee_no')=>$sf_params->get('employee_no'));
//			$empNoDtr = array();
//		}else{
//			//-------------------------- Per Company
//			$empList  = TkDtrsummaryPeer::GetEmpListbyDateRange($sdt1, $edt2, $co);
//			$empList  = HrEmployeePeer::CheckEmplistbyEmpGroup($empList, $sf_params->get('eGroup'));
//			$empNoDtr = TkDtrmasterPeer::GetEmployeeListForNoDtr($co);
//			$empNoDtr = HrEmployeePeer::CheckEmplistbyEmpGroup($empNoDtr, $sf_params->get('eGroup'));
// 		}
		

        if ($sf_params->get('frequency') == 'monthly' )
        {
        	
        	$arrMonth = array();
        	$process = false;
        	foreach(sfConfig::get('monthlyCalendar') as $km=>$vm)
        	{
        		$ndAll = 0;
        		$sdt = $km;
        		$edt = DateUtils::GetLastDate($sdt);
        		if ( ! $process )
        		{ 
	        		if (DateUtils::DUFormat('F', $sdt1) == $vm )   
	        		{
	        			$process = true;
	        		}
        		}
			 	
        		if ($process)
        		{
      				if ( $sf_params->get('employee_no') )
					{
						//-------------------------- Individual
						$empList = array($sf_params->get('employee_no')=>$sf_params->get('employee_no'));
						$empNoDtr = array();
					}else{
						//-------------------------- Per Company
						$empList  = TkDtrsummaryPeer::GetEmpListbyDateRange($sdt, $edt, $co);
						$empList  = HrEmployeePeer::CheckEmplistbyEmpGroup($empList, $sf_params->get('eGroup'));
						$empNoDtr = TkDtrmasterPeer::GetEmployeeListForNoDtr($co);
						$empNoDtr = HrEmployeePeer::CheckEmplistbyEmpGroup($empNoDtr, $sf_params->get('eGroup'));
			 		}        			

					$arrMonth[$vm] = HrLib::GetChartData($empList, $sdt, $edt);
		        	//----------------------------------- get Allowance for all employee with dtr
		        	foreach($empList as $ndEmpno=>$ve)
		        	{
		        		$ndEmpInfo = PayBasicPayPeer::GetOptimizedDatabyEmployeeNo($ndEmpno, array('allowance'));
		        		if ($ndEmpInfo)
		        		{
		        			$ndAll = $ndAll + $ndEmpInfo->get('ALLOWANCE');
			       		}
		        	} //foreach
					
        		}
        	}
        	
        	$ndBas = 0;
        	$ndEmpInfo = '';
        	$ndDtr = 0;
        	//----------------------------------- get Basic and Allowance for all employee with NO dtr
        	foreach($empNoDtr as $ndEmpno=>$ve)
        	{
        		$ndEmpInfo = PayBasicPayPeer::GetOptimizedDatabyEmployeeNo($ndEmpno, array('scheduled_amount', 'allowance'));
        		$ndBas = $ndBas + $ndEmpInfo->get('SCHEDULED_AMOUNT');
        		$ndAll = $ndAll + $ndEmpInfo->get('ALLOWANCE');
        	}
        	
        	$all   = $ndAll;
        	$ndDtr = round($ndBas);
			$normal=  array();
			$ot    = array();
			$basic = array();
			$total = array();
			$otPay = array();
			$comData = array();
			$meal   = array();
			$noDtr = array();
			$tEmp  = sizeof($empNoDtr) + sizeof($empList);
        	foreach($arrMonth as $ka=>$va)
        	{
        		if ( isset($arrMonth[$ka]) )
        		{
        			//echo  $ka. ' :  ' . $arrMonth[$ka][1][8] .'<-------------- basic<br>';
        			$basic[]  = $arrMonth[$ka][1][8];
        			$otPay[]  = $arrMonth[$ka][1][6];
        			$normal[] = $arrMonth[$ka][1][5];
        			$ot[]     = $arrMonth[$ka][1][2];
        			$meal[]   = $arrMonth[$ka][1][9];
        			$totAmt   = $arrMonth[$ka][1][11] 
        						+ $arrMonth[$ka][1][8] + $arrMonth[$ka][1][6] 
        						+ $arrMonth[$ka][1][9] +  $ndDtr   
        			;
					$totHr    = $arrMonth[$ka][1][5] + $arrMonth[$ka][1][2];         			        			
        			$tickLabelsAmount[]  = substr($ka, 0, 3) . ' ( $'.number_format($totAmt, 2 ) .  ' ) \n( Total Employee: '.( $arrMonth[$ka][1][12] + sizeof($empNoDtr) ).')';
        			$ballonLabels[] = $ka ;
        			$tickLabelsHour[]    = substr($ka, 0, 3) . ' ( '. number_format($totHr ) . ' Hrs ) \n( Total Employee: '.( $arrMonth[$ka][1][12] + sizeof($empNoDtr) ).')';
        			$noDtr[] = $ndDtr;
        			$allw[]  = $arrMonth[$ka][1][11] ;
        			//echo $all .' - '. $arrMonth[$ka][1][11] . $arrMonth[$ka] .'<br>';
        		}
        	}
			//******************************************************
			//***   DTR Summary - PAY
			//******************************************************
			$spara = array('empNo'=>$sf_params->get('employee_no'), 
				'sdate'=>$sdt2, 'edate'=>$edt2
				,'ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabelsAmount
			);
			$sData2 = array('Basic'=>$basic, 'OT-Pay'=> $otPay, 'Meal'=>$meal, 'NoDtr'=>$noDtr, 'Allowance'=> $allw  );
			include_partial('businessIntelligence/stacked_chart', array_merge($spara, array('title'=>'Daily Pay Summary \nSource: Daily Time Record','plotDatas'=>$sData2), array('colors'=>$col), array('units'=>'Amount')));
        	
			
			//******************************************************
			//***   DTR Summary - HOURS
			//******************************************************
			$spara = array('empNo'=>$sf_params->get('employee_no'), 
				'sdate'=>$sdt2, 'edate'=>$edt2
				,'ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabelsHour
			);
			$sData2 = array('Normal '=>$normal, 'Overtime'=> $ot );
			include_partial('businessIntelligence/stacked_chart', array_merge($spara, array('title'=>'Daily Hours Worked Summary \nSource: Daily Time Record','plotDatas'=>$sData2), array('colors'=>$col), array('units'=>'Hours')));
			
		} //monthly
    	
		if ($sf_params->get('frequency') == 'daily' )
        {
        	$ndays = DateUtils::DUFormat('t', $sdate);
        	$cdays = array();
        	$ndAll = 0;
        	for($x=0; $x <= (DateUtils::DateDiff('d',$sdate, $edate) ); $x++)
        	{
        		$cdays[DateUtils::AddDate($sdate, $x)] = DateUtils::AddDate($sdate, $x); 	
        	}
			
        	
        	foreach ($cdays as $kdt=>$vdt)
        	{
        		
//     			if ( $sf_params->get('employee_no') )
//				{
//					//-------------------------- Individual
//					$empList = array($sf_params->get('employee_no')=>$sf_params->get('employee_no'));
//					$empNoDtr = array();
//				}else{
//					//-------------------------- Per Company
//					
//					$empList  = TkDtrsummaryPeer::GetEmpListbyDateRange($kdt, $kdt, $co);
//					
//					$empList  = HrEmployeePeer::CheckEmplistbyEmpGroup($empList, $sf_params->get('eGroup'));
//					$empNoDtr = TkDtrmasterPeer::GetEmployeeListForNoDtr($co);
//					$empNoDtr = HrEmployeePeer::CheckEmplistbyEmpGroup($empNoDtr, $sf_params->get('eGroup'));
//		 		}
//		 		
//		 		$arrDays[$kdt] = HrLib::GetChartData($empList, $kdt, $kdt);
		 		
		 		echo $kdt;
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
			//******************************************************
			//***   DTR Summary - PAY
			//******************************************************
			$spara = array('empNo'=>$sf_params->get('employee_no'), 
				'sdate'=>$sdt2, 'edate'=>$edt2
				,'ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabelsAmount
			);
			$sData2 = array('Basic - '.$sBasic =>$basic, 'OT-Pay - '.$sOvertime => $otPay, 'Meal - '.$sMeal =>$meal, 'NoDtr - '.$sNoDtr =>$noDtr, 'Allowance - '.$sAllw => $allw  );
			include_partial('businessIntelligence/stacked_chart', array_merge($spara, array('title'=>'Daily Pay Summary \nSource: Daily Time Record','plotDatas'=>$sData2), array('colors'=>$col), array('units'=>'Amount')));
        	
			//******************************************************
			//***   DTR Summary - PAY
			//******************************************************
			
			$spara = array('empNo'=>$sf_params->get('employee_no'), 
				'sdate'=>$sdt2, 'edate'=>$edt2
				,'ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabelsAmount
			);
			$sData2 = array('Total Expenses Per Day\n( '.number_format($gAmt, 2).' )'=>$totAmt);
			include_partial('businessIntelligence/stacked_chart', array_merge($spara, array('title'=>'Daily Pay Summary \nSource: Daily Time Record','plotDatas'=>$sData2), array('colors'=>$col), array('units'=>'Amount')));
			
			
			//******************************************************
			//***   DTR Summary - HOURS
			//******************************************************
			$spara = array('empNo'=>$sf_params->get('employee_no'), 
				'sdate'=>$sdt2, 'edate'=>$edt2
				,'ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabelsHour
			);
			$sData2 = array('Normal '=>$normal, 'Overtime'=> $ot );
			include_partial('businessIntelligence/stacked_chart', array_merge($spara, array('title'=>'Daily Hours Worked Summary \nSource: Daily Time Record','plotDatas'=>$sData2), array('colors'=>$col), array('units'=>'Hours')));
        	
        	
        } //daily
	

	};
	