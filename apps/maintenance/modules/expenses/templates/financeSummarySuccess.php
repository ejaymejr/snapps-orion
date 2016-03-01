<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/financeSummary'). '?id=' . $sf_params->get('id');?>" method="post">
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
    $company = array ("1"=>"Micronclean", "2"=>"Acro Solution", 
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );
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
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Show Income / Expense " class="submit-button">
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
        $sdate = $sf_params->get('sdate');
        $edate = $sf_params->get('edate');
        $sdt1 = $sf_params->get('year1').DateUtils::DUFormat('-m-01', $sf_params->get('months1'));
        $edt1 = DateUtils::GetLastDate($sdt1);
        $sdt2 = $sf_params->get('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($sf_params->get('months2')));
        $edt2 = DateUtils::GetLastDate($sdt2);

//        $this->_S('sdate', $this->_G('year1').DateUtils::DUFormat('-m-01', $this->_G('months1')) );
//        $this->_S('edate', $this->_G('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($this->_G('months2'))) );
        
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
        if ($sf_params->get('frequency') == 'daily')
        {
        	$dataSummary = FinanceSummaryPeer::getSummarizedData($sdate, $edate, $co, strtolower($company[$sf_params->get('company')]));
        	$iData = $dataSummary[0];
        	$eData = $dataSummary[1];
        	
			//--------------------- hr forecast
//			$data = FinanceSummaryPeer::GetForeCastbyDateRange($sdate, $edate, $co);
//			$comp = array_unique($data['component']);
//			$gCost = 0;
//			$dSumm = array('income'=>array(), 'expense'=>array(), 'trans_date'=>array());
//			$power = 0;
//			foreach($comp as $kd=>$component)
//			{
//				$val = 0;
//				$pos = 0;
//				foreach($data['component'] as $ke=>$kv)
//				{
//					if ($component == $kv)
//					{
//						$val = $val + round($data['value'][$pos]);
//						if ($data['type'][$pos] == 'INCOME')
//						{
//							$ginc   = $ginc + round($data['value'][$pos]);
//							$tinc[] = + round($data['value'][$pos]);
//						}else{
//							$gexp = $gexp + round($data['value'][$pos]);
//							$tded[] = round($data['value'][$pos]);
//						}
//					}
//					$pos++;
//				}
//				//---------------------- segregate income and expense
//				if (strtolower($component) == 'sales')
//				{ 
//					$iData[$component] = $val;
//				}else{
//					if (strtolower($component) == 'power')
//					{
//						switch (strtolower($company[$sf_params->get('company')]) )
//						{
//							case 'micronclean':
//								$val = round($val * .30);
//								break;
//							case 'acro solution':
//								$val = round($val * .0);
//								break;
//							case 'nanoclean':
//								$val = round($val * .70);
//								break;
//							default:
//								$val = round($val * .00);
//								break; 
//						}
//						
//					}
//					$eData[strtolower($component)] = $val;
//				}
//			}


			$summTable = '
			<table width="100%" bgcolor="#6699FF" border="0" cellpadding="4" cellspacing="2"><tr><td align="center">
			<table width="100%" bgcolor="#FFFFFF"  border="0" cellpadding="4" cellspacing="0">
			  <tr>
			  	<td height="25" class="tk-style36 tk-menu alignCenter" colspan="6" width="5%">
			  	<h>SUMMARY</h>
			  	</td>
			  </tr>
			  <tr>
			  	<td height="30" class="FORMlabel tk-style20" width="5%">&nbsp</td>
			    <td class="tk-style20" width="10%">&nbsp</td>
			    <td class="alignCenter tk-style20" width="30%">PARTICULAR</td>
			    <td class="alignCenter tk-style20" width="15%">DEBIT</td>
			    <td class="alignCenter tk-style20" width="15%">CREDIT</td>
			    <td class="tk-style20" width="100%">TOTAL</td>
			  </tr>
			
			';
			if ($iData)
			{
				$iTot = 0;
				$seq = 1;
				foreach ($iData as $ke=>$ve)
				{
					$summTable = $summTable . '
						  <tr>
						  	<td class="FORMcell-left FORMlabel" width="5%">'.$seq++.'</td>
						    <td class="FORMcell-left FORMlabel" width="10%">INCOME</td>
						    <td class="FORMcell-right FORMlabel" width="30%">'.strtoupper($ke).'</td>
						    <td class="FORMcell-left FORMlabel" width="15%">'.number_format($ve, 2 ).'</td>
						    <td class="FORMcell-left FORMlabel" width="15%">&nbsp</td>
						    <td class="FORMcell-left FORMlabel" width="100%">&nbsp</td>
						  </tr>
					';
					$iTot = $iTot + $ve;
				}
				$summTable = $summTable . '
					  <tr>
					    <td colspan="5" class="FORMcell-right FORMlabel tk-style20" width="100%">&nbsp;</td>
					    <td class="FORMcell-right FORMlabel tk-style20" width="100%">'.number_format($iTot, 2).'</td>
					  </tr>
				';
				
			}
			ksort($eData);
			if ($iData)
			{
				$eTot = 0;
				$seq = 1;
				foreach ($eData as $ke=>$ve)
				{
					$summTable = $summTable . '
						  <tr>
						  	<td class="FORMcell-left FORMlabel" width="5%">'.$seq++.'</td>
						    <td class="FORMcell-left FORMlabel" width="10%">EXPENSE</td>
						    <td class="FORMcell-right FORMlabel" width="30%">'.strtoupper($ke) . ( (strpos($ke, 'fix'))? '' : ' ( gst inc. )') .'</td>
						    <td class="FORMcell-left FORMlabel" width="15%">&nbsp;</td>
						    <td class="FORMcell-left FORMlabel" width="15%">'.number_format($ve, 2 ).'</td>
						    <td class="FORMcell-left FORMlabel" width="100%">&nbsp</td>
						  </tr>
					';
					$eTot = $eTot + $ve;					
				}
				$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel" width="5%">&nbsp;</td>
					    <td class="FORMcell-left FORMlabel" width="10%">&nbsp;</td>
					    <td class="alignCenter FORMlabel tk-style20" width="30%" colspan="2">&nbsp;</td>
					    <td class="FORMcell-left FORMlabel" width="15%">&nbsp;</td>
					    <td class="FORMcell-right FORMlabel tk-style20" width="100%">'.number_format($eTot, 2).'</td>
					  </tr>
				';
			}
			$summTable = $summTable . '
			</table>
			</td></tr></table>
			';
//-------------------------------------------			
//			$ballonLabels = array('Income', 'Expense');			
//			$tickLabels   = array('Income for '.DateUtils::DUFormat('M', $sdate), 'Expense for '.DateUtils::DUFormat('M', $sdate));
//			$spara = array('ballonLabels'=>$ballonLabels, 
//				'tickLabels'=>$tickLabels
//			);
//			$pData = array($iTot, $eTot );
//			include_partial('expenses/single_chart', array_merge($spara, array('title'=>'Income vs Expense \nProfit: '.number_format($iTot - $eTot, 2) ,'plotDatas'=>$pData), array('colors'=>'#478FB7'), array('units'=>'Amount')));
//-------------------------------------------			
			
			
//------------------------------------------- stacked
			$ballonLabels = array('Income', 'Expense');			
			$tickLabels   = array('Income for '.DateUtils::DUFormat('M', $sdate), 'Expense for '.DateUtils::DUFormat('M', $sdate));
			$spara = array('ballonLabels'=>$ballonLabels, 
				'tickLabels'=>$tickLabels
			);
			$pData = array('Expense'=>array(0, $eTot), 'Income'=>array($iTot, 0) );
			include_partial('expenses/clustered_chart_orig', array_merge($spara, array('title'=>'Income / Expense \nMargin: '.number_format($iTot - $eTot, 2) ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
//------------------------------------------- stacked
			
			include_partial('pie_chart', array('title'=>'ESTIMATED COMPANY PAYABLE '. strtoupper 
	        (DateUtils::DUFormat('F Y', $sdate)).'\n'. $company[$sf_params->get('company')] .' ( $'.number_format($eTot,2) .' )',
	        'data'=>$eData, 'pullout'=>FinanceSummaryPeer::GetElementNumberfromKey('hr payroll', $eData)) );			
			
		
			//******************************************************
			//***   Daily Transaction
			//******************************************************
			$dSumm = FinanceSummaryPeer::GetDailyTransaction($sdate, $edate, $co);
			$tickLabels = array();
			$ballonLabels = array();
			foreach($dSumm as $ke=>$ve)
			{
				$ballonLabels[] = '';
				$tickLabels[]   = $ke;
			}
			$spara = array('ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabels
			);
			include_partial('expenses/clustered_chart', array_merge($spara, array('title'=>'Daily Income vs Expense Trend','plotDatas'=>$dSumm), array('colors'=>$col), array('units'=>'Amount')));
			
			echo $summTable;

        }//daily

        if ($sf_params->get('frequency') == 'monthly')
        {
        	$months = FinanceSummaryPeer::GetMonths($sdt1, $edt2);
        	$mData  = array('Expense'=>array(), 'Income'=>array());
        	$monthSeries = array();
        	$ginc = 0;
        	$gexp = 0;
        	$pos = 0;
        	foreach($months as $mStart=>$mEnd)
        	{
	        	$dataSummary = FinanceSummaryPeer::getSummarizedData($mStart, $mEnd, $co, strtolower($company[$sf_params->get('company')]));
	        	$iData[] = $dataSummary[0];
	        	$eData[] = $dataSummary[1];
	        	
	        	$iTot = FinanceSummaryPeer::SumData($iData[$pos]);
	        	$eTot = FinanceSummaryPeer::SumData($eData[$pos]);
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
			include_partial('expenses/clustered_chart_orig', array_merge($spara, array('title'=>'Income / Expense \nMargin: '.number_format($ginc - $gexp, 2) ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
        	
			
        
        $cSpan = sizeof($ballonLabels) + 4;
        $calInc = FinanceSummaryPeer::ConvertToCalendarFormat($iData);
        $calDec = FinanceSummaryPeer::ConvertToCalendarFormat($eData);

        //--------------------------------------------------- stacked chart
        $plot = FinanceSummaryPeer::GenerateChartData($calDec, $months);
		$pData = $plot['data'];
		$ballonLabels = $plot['ballonLabels'];
		$tickLabels   = $plot['tickLabels'];
		$spara = array('ballonLabels'=>$ballonLabels, 
			'tickLabels'=>$tickLabels
		);
		include_partial('expenses/stacked_chart_orig', array_merge($spara, array('title'=>'Expense Chart: ' ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
        //--------------------------------------------------- stacked chart

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
		    <td class="alignCenter tk-style19" width="10%">PARTICULAR</td>
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
		
		if ($eData)
		{
			$egTot = 0;
			foreach ($calDec as $kCal=>$vCal)
			{
				$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
				$eTot = 0;	
				$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
					    <td class="FORMcell-right FORMlabel '.$bgclr.'"  nowrap><span style="color:#'.$col[0].'" >'.$kCal.'</span></td>
					    ';
						foreach($vCal as $kv=>$vAmt)
						{
							$summTable = $summTable . '<td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap><span style="color:#'.$col[0].'" >'.number_format($vAmt).'</span></td>';
							$eTot = $eTot + $vAmt;
						}
						$summTable = $summTable. '		
					    <td class="alignRight FORMlabel tk-style19 '.$bgclr.'"  nowrap><span style="color:#'.$col[0].'" >'.number_format($eTot).'</span></td>
					    <td class="alignRight FORMlabel '.$bgclr.'" nowrap>&nbsp;</td>
					  </tr>
				';
				$egTot = $egTot + $eTot;
			}
		}
		
		$summTable = $summTable . '
		  <tr>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight" colspan="'. ($cSpan - 4)  .'" width="5%"></td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight" colspan="2" width="5%">
		  	<h>GRAND TOTAL</h>
		  	</td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight " width="5%">
		  	<span class=" tk-style36 negative">'.number_format($igTot - $egTot).'</span>
		  	</td>
		  	<td bgcolor="#6699FF" height="25" class="tk-style36 alignRight " width="5%"></td>
		  </tr>
		
		</table>
		</td></tr></table>
		';		
		echo $summTable;
			
		}

        
        
        
        
        
        
	}
?>
	