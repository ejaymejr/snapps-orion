<?php use_helper('Form', 'Javascript');
sfConfig::set('app_page_heading', 'Payroll/Subcon Trend'); 
?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('hrforecast/monthlyTrend'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Month From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $year1 = array('2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011');
    $year2 = array('2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011');
    $months1 = sfconfig::get('monthlyCalendar');
    echo select_tag('months1', 
         options_for_select($months1, 
         $sf_params->get('months1') ) );
             
    echo select_tag('year1', 
         options_for_select($year1, 
         $sf_params->get('year1') ) );    
         
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";         
    $months2 = sfconfig::get('monthlyCalendar');
    echo select_tag('months2', 
         options_for_select($months2, 
         $sf_params->get('months2') ) );    

    echo select_tag('year2', 
         options_for_select($year2, 
         $sf_params->get('year2') ) );    
         
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );
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
    $freq = array ( "monthly"=>" - Monthly - ");
    echo select_tag('frequency', 
         options_for_select($freq, 
         $sf_params->get('frequency') ) );
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Show HR Monthly Trend " class="submit-button">
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
		$col = array('#CC0000', '#339900', '#478FB7', '#333366', '#F39308', '#A1C51D', '#F6BD0E', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900', '#663333', '#006699', '#336633', '#73B1B7', '#AF4035', 
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900');
        $sdt1 = $sf_params->get('year1').DateUtils::DUFormat('-m-01', $sf_params->get('months1'));
        $edt1 = DateUtils::GetLastDate($sdt1);
        $sdt2 = $sf_params->get('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($sf_params->get('months2')));
        $edt2 = DateUtils::GetLastDate($sdt2);

        $empNo = $sf_params->get('employee_no');
   		$month1    = DateUtils::DUFormat('M', $sdt1);
		$month2    = DateUtils::DUFormat('M', $sdt2);
        $co   = ($sf_params->get('company') <> '0') ? $sf_params->get('company') : null;
        $egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$gCost = 0;
		$proof = '';
		$ballonLabels = array();
		$tickLabels = array();
		$pos = 0;
		$seq=1;        

		$proof = '';

        $months = FinanceSummaryPeer::GetMonths($sdt1, $edt2);
        $monthSeries = array();
        $ginc = 0;
        $gexp = 0;
        $total = 0;
        $pos = 0;
        $gtota = 0;
        $pos = 0;
        $mData = array();
        $pData = array();
        foreach($months as $mStart=>$mEnd)
        {
        	$eData   = array();        	
        	$empList = HrEmployeeDailyPeer::GetEmployeeListbyDateRange($mStart, $mEnd, $co);
        	$mtota = 0;
	        foreach($empList as $ke=>$empNo)
        	{
        		$empData = HrEmployeeDailyPeer::GetEmployeeDatabyDateRange($empNo, $mStart, $mEnd);
        		$total = HrEmployeeDailyPeer::SumEmployeeData($empData);
				$mtota = $mtota + $total;
				$eData[$empData['name']] = $total;  
        	}
        	if (!sizeof($empList))
        	{
        		$eData[] = 0;
        	}
        	$gtota = $gtota + $mtota;
        	$mData[] = $eData;
        	$pData[] = $mtota;
        	$pos++;
        	$ballonLabels[] = $mStart;
        	$tickLabels[]   = DateUtils::DUFormat('M-Y', $mStart);
        	$monthSeries[]  = $mStart;
        }

                
        $calData = FinanceSummaryPeer::ConvertToCalendarFormat($mData);

        $cSpan = sizeof($ballonLabels) + 4;

        //--------------------------------------------------- stacked chart
        $plot = FinanceSummaryPeer::GenerateChartData($calData, $months);
		$pData = $plot['data'];
//		$ballonLabels = $plot['ballonLabels'];
//		$tickLabels   = $plot['tickLabels'];
		$spara = array('ballonLabels'=>$ballonLabels, 
			'tickLabels'=>$tickLabels
		);
		include_partial('stacked_chart_orig', array_merge($spara, array('title'=>'Expense Chart: ' ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
        
        
		$summTable = '
		<table width="100%" bgcolor="#6699FF" border="0" cellpadding="4" cellspacing="2"><tr><td align="center">
		<table width="100%" bgcolor="#FFFFFF"  border="0" cellpadding="4" cellspacing="0">
		  <tr>
		  	<td height="25" class="tk-style36 tk-menu alignCenter" colspan="'. ($cSpan) .'" width="5%">
		  	<h>SUMMARY</h>
		  	</td>
		  </tr>
		  <tr>
		  	<td height="30" class="FORMlabel tk-style18" width="5%">&nbsp</td>
		    <td class="alignCenter tk-style19" width="10%">EMP-NAME</td>
		    ';
			foreach($monthSeries as $km=>$vm)
			{
				$summTable = $summTable . '<td class="alignCenter tk-style17" width="6%">'.DateUtils::DUFormat('M-y', $vm).'</td>';
			}
			$summTable = $summTable. '
		    <td class="alignCenter tk-style19" width="11%">TOTAL</td>
		    <td class="alignRight FORMlabel" width="100%" nowrap>&nbsp;</td>
		  </tr>
		';	
		if (sizeof($calData))
		{
			$igTot = 0;
			foreach ($calData as $kCal=>$vCal)
			{
				$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
				$eTot = 0;	
				$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
					    <td class="FORMcell-right FORMlabel '.$bgclr.'"  nowrap><span style="color:#'.$col[1].'" >'.$kCal.'</span></td>
					    ';
						foreach($vCal as $kv=>$vAmt)
						{
							$summTable = $summTable . '<td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap><span style="color:#'.$col[1].'" >'.number_format($vAmt).'</span></td>';
							$eTot = $eTot + $vAmt;
						}
						$summTable = $summTable. '		
					    <td class="alignRight FORMlabel tk-style19 '.$bgclr.'"  nowrap><span style="color:#'.$col[1].'">'.number_format($eTot).'</span></td>
					    <td class="alignRight FORMlabel '.$bgclr.'" nowrap>&nbsp;</td>
					  </tr>
				';
				$igTot = $igTot + $eTot;
			}			
		}
		

		
		$summTable = $summTable . '
		  <tr>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight" colspan="'. ($cSpan - 4)  .'" width="5%"></td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight" colspan="2" width="5%">
		  	<h>GRAND TOTAL</h>
		  	</td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight " width="5%">
		  	<span class=" tk-style36 negative">'.number_format($gtota).'</span>
		  	</td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight " width="5%"></td>
		  </tr>
		
		</table>
		</td></tr></table>
		';		
		echo $summTable;					
	}
?>
	