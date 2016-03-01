<?php use_helper('Form', 'Javascript');
sfConfig::set('app_page_heading', 'Trend Income and Expense(s) Summary');
?>

<form name="FORMadd" id="IDFORMadd"
	action="<?php echo url_for('reports/trendIncomeExpense'). '?id=' . $sf_params->get('id');?>"
	method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td class="FORMcell-left FORMlabel" nowrap>Month From</td>
		<td class="FORMcell-right" nowrap><?php
		
		$year1 = HrFiscalYearPeer::GetFiscalYearListYK();
		$year2 = HrFiscalYearPeer::GetFiscalYearListYK();
		//$year1 = array('2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011', '2012'=>'2012');
		//$year2 = array('2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011', '2012'=>'2012');
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
			
		?></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel" nowrap>Company</td>
		<td class="FORMcell-right" nowrap><?php
		$company = array ("1"=>"Micronclean", "2"=>"Acro Solution",
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
		echo select_tag('company',
		options_for_select($company,
		$sf_params->get('company') ) );
		?></td>
	</tr>

	<tr>
		<td class="FORMcell-left FORMlabel" nowrap>Frequency</td>
		<td class="FORMcell-right" nowrap><?php
		$freq = array ( "monthly"=>" - Monthly - ");
		echo select_tag('frequency',
		options_for_select($freq,
		$sf_params->get('frequency') ) );

		?></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel" nowrap>Sales Source</td>
		<td class="FORMcell-right" nowrap><?php
		$sales_source = array('INVOICE'=>' -INVOICE- ', 'DO'=>' -DELIVERY ORDER-');
		echo select_tag('sales_source',
		options_for_select($sales_source,
		$sf_params->get('sales_source') ) );
		?></td>
	</tr>

	<tr>
		<td class="FORMcell-left FORMlabel" nowrap></td>
		<td class="FORMcell-right" nowrap><input type="submit"
			name="benchmark" value=" Show Cost and Sales Monthly Trend "
			class="submit-button"></td>
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
			echo '
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr><td class="tk-style23 alignCenter">REAL-TIME OPERATION - Cost and Sales Information</td></tr>
<tr><td class="tk-style23 alignCenter">as of '.date('jS \of F Y ').'</td></tr>
<tr><td class="tk-style23 alignCenter">&nbsp;</td></tr>
</table>
';	     
			$colors = sfConfig::get('app_amcharts_colors');
			$col = array('#CC0000', '#339900', '#478FB7', '#333366', '#F39308', '#A1C51D', '#F6BD0E', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900', '#663333', '#006699', '#336633', '#73B1B7', '#AF4035', 
					 '#84598C', '#3214C2', '#842348', '#987652', '#122421', '#551351', '#378435', '#881354', '#188538',
		             '#CC0000', '#339900', '#478FB7', '#333366', '#F39308', '#A1C51D', '#F6BD0E', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900', '#663333', '#006699', '#336633', '#73B1B7', '#AF4035',
				     '#84598C', '#3214C2', '#842348', '#987652', '#122421', '#551351', '#378435', '#881354', '#188538',
		             '#CC0000', '#339900', '#478FB7', '#333366', '#F39308', '#A1C51D', '#F6BD0E', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900', '#663333', '#006699', '#336633', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900');
			$sdt1 = $sf_params->get('year1').DateUtils::DUFormat('-m-01', $sf_params->get('months1'));
			$edt1 = DateUtils::GetLastDate($sdt1);
			$sdt2 = $sf_params->get('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($sf_params->get('months2')));
			$edt2 = DateUtils::GetLastDate($sdt2);
			$sales_source = $sf_params->get('sales_source');

			$empNo = $sf_params->get('employee_no');
			$month1    = DateUtils::DUFormat('M', $sdt1);
			$month2    = DateUtils::DUFormat('M', $sdt2);
			$co   = ($sf_params->get('company') <> '0') ? $sf_params->get('company') : null;
			$egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
			$gCost = 0;
			$proof = '';
			$ballonLabels = '';
			$tickLabels = '';
			$pos = 0;
			$pData      = array();
			$comp       = array();
			$ginc       = 0;
			$gexp       = 0;
			$dinc       = 0;
			$dexp       = 0;
			$tinc       = array();
			$tded       = array();
			$gTinc      = array();
			$gTded      = array();

			$months = FinanceSummaryPeer::GetMonths($sdt1, $edt2);
			$mData  = array('Expense'=>array(), 'Income'=>array());
			$monthSeries = array();
			$ginc = 0;
			$gexp = 0;
			$pos = 0;
			$mTotal = array();
			
			
//			$spara = array('ballonLabels'=>array('balloon 1'=>1, 'balloon 2'=>2),
//			'tickLabels'=>array('labels 1'=>1, 'labelss 2'=>2)
//			);
//			$pdata = array($spara);
//			include_partial('amline', array_merge($spara, array('title'=>'Income / Expense \nMargin: ','plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
//			exit();

			foreach($months as $mStart=>$mEnd)
			{
				//$hrForecast = FinanceSummaryPeer::GetTotalComponentDateRange('SUBCON - HR Forecast', $mStart, $mEnd, $co);
//				var_dump($hrForecast);
//				exit();
				$dataSummary = FinanceSummaryPeer::getSummarizedData($mStart, $mEnd, $co, strtolower($company[$sf_params->get('company')]), 'NOSUBCONTRACTORS', $sales_source);
				$iData[] = $dataSummary[0];
				$eData[] = $dataSummary[1];
				 
				$iTot = FinanceSummaryPeer::SumData($iData[$pos]);
				$eTot = FinanceSummaryPeer::SumData($eData[$pos]);
				//var_dump($eTot);
				//exit();
				 
				$ginc = $ginc + $iTot;
				$gexp = $gexp + $eTot;
				$mData['Income'][]  = $iTot;
				$mData['Expense'][] = $eTot;
				$monthSeries[]  = $mStart;
				$tickLabels[]   = DateUtils::DUFormat('M-Y', $mStart);
				$ballonLabels[] = $mStart;
				$pos++;
				 
			}


			
			$spara = array('ballonLabels'=>$ballonLabels,
			'tickLabels'=>$tickLabels
			);

			$pData = $mData;
			include_partial('single_line', array_merge($spara, array('title'=>'Sales Information \n\t' . number_format($ginc,2),'statsData'=>$mData['Income']), array('colors'=>'#339900'), array('units'=>'Amount')));
			include_partial('single_line', array_merge($spara, array('title'=>'Cost Information \n\t'. number_format($gexp, 2),'statsData'=>$mData['Expense']), array('colors'=>'#CC0000'), array('units'=>'Amount')));
			include_partial('multiple_line_chart', array_merge($spara, array('title'=>'Sales/Cost Information \n\t','statsData'=>$mData), array('colors'=>$col), array('units'=>'Amount')));
			
//			include_partial('single_chart', array_merge($spara, array('title'=>'Sales Information \n\t' . number_format($ginc,2),'plotDatas'=>$mData['Income']), array('colors'=>'#339900'), array('units'=>'Amount')));
//			include_partial('single_chart', array_merge($spara, array('title'=>'Cost Information \n\t'. number_format($gexp, 2),'plotDatas'=>$mData['Expense']), array('colors'=>'#CC0000'), array('units'=>'Amount')));
			$spara = array('ballonLabels'=>$ballonLabels,
			'tickLabels'=>$tickLabels
			);
			include_partial('clustered_chart_orig', array_merge($spara, array('title'=>'Income / Expense \nMargin: '.number_format($ginc - $gexp, 2) ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
 
			$cSpan = sizeof($ballonLabels) + 4;
			$calInc = FinanceSummaryPeer::ConvertToCalendarFormat($iData);
			$calDec = FinanceSummaryPeer::ConvertToCalendarFormat($eData);

			//--------------------------------------------------- stacked chart
			$plot = FinanceSummaryPeer::GenerateChartData($calDec, $months);
// 			var_dump($plot['data']);
// 			exit();
			$pData = $plot['data'];
			$ballonLabels = $plot['ballonLabels'];
			$tickLabels   = $plot['tickLabels'];
			$spara = array('ballonLabels'=>$ballonLabels,
			'tickLabels'=>$tickLabels
			);
			include_partial('stacked_chart_orig', array_merge($spara, array('title'=>'Expense Chart: ' ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amt')));
			//--------------------------------------------------- stacked chart
			$summTable = '
		<table width="100%" bgcolor="#6699FF" border="0" cellpadding="4" cellspacing="2"><tr><td align="center">
		<table width="100%" bgcolor="#FFFFFF"  border="0" cellpadding="4" cellspacing="0">
		  <tr>
		  	<td height="25" class="tk-style36 tk-menu alignCenter" colspan="'. ($cSpan + 1) .'" width="5%">
		  	<h>SUMMARY</h>
		  	</td>
		  </tr>
		  <tr>
		  	<td height="30" class="FORMlabel tk-style18" width="5%">&nbsp</td>
		    <td colspan="2" class="alignCenter tk-style19" width="10%">PARTICULAR&nbsp;&nbsp;<span class="tk-gree"><i>amount are rounded per item</i></span></td>
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
			$seq = 1;
			if ($iData)
			{
				$igTot = 0;
				foreach ($calInc as $kCal=>$vCal)
				{
					$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
					$eTot = 0;
					$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
					    <td colspan="2" class="FORMcell-right FORMlabel '.$bgclr.'"  nowrap><span class="tk-grn tk-style19 " >'.$kCal.'</span><span class="negative">&nbsp;&nbsp;&nbsp;based on D.O. and Retail (GST not included)</span></td>
					    ';
					foreach($vCal as $kv=>$vAmt)
					{
						$summTable = $summTable . '<td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap><span class="tk-grn tk-style19" >'.number_format($vAmt).'</span></td>';
						$eTot = $eTot + $vAmt;
					}
					$incSum = $eTot;
					$summTable = $summTable. '
					    <td class="alignRight FORMlabel tk-style19 '.$bgclr.'"  nowrap><span class="tk-grn tk-style19">'.number_format($incSum).'</span></td>
					    <td class="alignRight FORMlabel '.$bgclr.'" nowrap>&nbsp;</td>
					  </tr>
				';
					$igTot = $igTot + $eTot;
				}
			}
			

			//------------------------------------ expense summary
			$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
			$summTable = $summTable . '
		<tr>
		  <td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
		  <td colspan="2" class="FORMcell-right FORMlabel '.$bgclr.'"  nowrap><span class="tk-dred tk-style19" >Expenses/Cost</span></td>
			    ';
			$expSum = 0;
			foreach($mData['Expense'] as $ke=>$ve)
			{
				$summTable = $summTable . '<td  class="FORMcell-left FORMlabel '.$bgclr.'" nowrap><span class=" tk-style19 tk-dred" >'.number_format($ve).'</span></td>';
				$expSum = $expSum + $ve;
			}
			$expSum = $expSum;
			$summTable = $summTable. '
		   <td class="alignRight FORMlabel tk-style19 '.$bgclr.'"  nowrap><span class="tk-dred tk-style19">'.number_format($expSum).'</span></td>
		   <td class="alignRight FORMlabel '.$bgclr.'" nowrap>&nbsp;</td>
		</tr>
		';
			//------------------------------------ expense summary
			$seq = 1;
				
			if ($eData)
			{
				$egTot = 0;
				foreach ($calDec as $kCal=>$vCal)
				{
					$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
					$eTot = 0;
					$subconTotalPersonel = '';
					if (strpos(strtolower($kCal), 'hr forecast') )
					{
						$bgclr = 'tk-gree';
						$kCal = $kCal . ' || amount not included on the total expense';
					}

					$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp;</td>
					  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
					    <td class="FORMcell-right FORMlabel '.$bgclr.'"  nowrap><span class="tk-dred" >'.strtoupper($kCal) . ( (strpos($kCal, 'fix'))? '' : ' ( gst inc. )') .'</span></td>
					    ';
					foreach($vCal as $kv=>$vAmt)
					{
						$empList = PayEmployeeLedgerArchivePeer::GetEmployeeCountByDate($monthSeries[$kv], $sf_params->get('company'));
						$desc = PayEmployeeLedgerArchivePeer::GetNameToolTip(sizeof($empList), implode('<br>', $empList));
						
						if (strtoupper(trim($kCal)) == 'SUB-CONTRACTORS' || strtoupper(trim($kCal)) == 'SUB CONTRACTORS'):
							$subconTotalPersonel = ' | '  . $desc  ;
						endif;
						$summTable = $summTable . '<td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap><span class="tk-dred" >'.number_format($vAmt) . $subconTotalPersonel .'</span></td>';
						$eTot = $eTot + $vAmt;
					}
					$summTable = $summTable. '
					    <td class="alignRight FORMlabel tk-style19 '.$bgclr.'"  nowrap><span class="tk-dred" >'. number_format($eTot).'</span></td>
					    <td class="alignRight FORMlabel '.$bgclr.'" nowrap>&nbsp;</td>
					  </tr>
				';
					$egTot = $egTot + $eTot;
				}
			}
			$summTable = $summTable . '
		  <tr>
		  	<td colspan="3" bgcolor="#6699FF" height="25" class="tk-oran alignRight" >
		  	<h>GRAND TOTAL</h>
		  	</td>
		  	';
			//echo '<div id="" >'.implode('<br>', $empList).'</div>';
			$xpos = 0;
			$dsum = 0;
			$gsum = 0;
			foreach($mData['Income'] as $ke=>$ve)
			{
				//echo 'total: '. $mData['Income'][$xpos] .' - '. $mData['Expense'][$xpos] . '<br>';
				$dsum = 0;
				$dsum = $mData['Income'][$xpos] - $mData['Expense'][$xpos];
				$summTable = $summTable . '
		  			<td bgcolor="#6699FF" height="25" class="tk-oran alignRight " width="5%">
		  			<span class=" tk-oran negative">'. number_format($dsum ) .'</span>
		  			</td>';
				$gsum = $gsum + $dsum;
				
				//$dsum = 0;
				$xpos++;
			}
			$summTable = $summTable . '
		  			<td bgcolor="#6699FF" height="25" class="tk-oran alignRight " width="5%">
		  			<span class=" tk-oran tk-white">'. number_format($gsum) .'</span>
		  			</td>
                    <td bgcolor="#6699FF" height="25" class="tk-oran alignRight " width="5%">&nbsp;</td>'
                    ;

                    //--------------------------------------- SUB CONTRACTORS
                    $pos = 0;
                    foreach($months as $mStart=>$mEnd)
                    {
                    	$dataSummary = FinanceSummaryPeer::getSummarizedData($mStart, $mEnd, $co, strtolower($company[$sf_params->get('company')]), 'WITHSUBCONTRACTORS','');
                    	//        	var_dump($dataSummary);
                    	//        	exit();

                    	$oiData[] = $dataSummary[0];
                    	$oeData[] = $dataSummary[1];
                    	 
                    	$iTot = FinanceSummaryPeer::SumData($oiData[$pos]);
                    	$eTot = FinanceSummaryPeer::SumData($oeData[$pos]);
                    	 
                    	$ginc = $ginc + $iTot;
                    	$gexp = $gexp + $eTot;
                    	$mData['Income'][]  = $iTot;
                    	$mData['Expense'][] = $eTot;
                    	$pos++;
                    }

                    $summTable = $summTable . '
		</table>
		</td></tr></table>
		';		
                    echo $summTable;
                    	
		}
		?>
