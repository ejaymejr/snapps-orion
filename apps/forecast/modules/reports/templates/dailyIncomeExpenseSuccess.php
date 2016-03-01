<?php use_helper('Form', 'Javascript'); 
sfConfig::set('app_page_heading', 'Daily Income and Expense(s) Summary');
?>


<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('reports/dailyIncomeExpense'). '?id=' . $sf_params->get('id');?>" method="post">
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
    $freq = array ( "daily"=>" - Daily - ");
    echo select_tag('frequency', 
         options_for_select($freq, 
         $sf_params->get('frequency') ) );
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Sales Source</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $sales_source = array('INVOICE'=>' -INVOICE- ', 'DO'=>' -DELIVERY ORDER-');
    echo select_tag('sales_source', 
         options_for_select($sales_source, 
         $sf_params->get('sales_source') ) );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Show Cost and Sales Daily " class="submit-button">
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

        
        $empNo = $sf_params->get('employee_no');
        $co   = ($sf_params->get('company') <> '0') ? $sf_params->get('company') : null;
        $egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
        $sales_source = $sf_params->get('sales_source');
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

		$dataSummary = FinanceSummaryPeer::getSummarizedData($sdate, $edate, $co, strtolower($company[$sf_params->get('company')]),null, $sales_source);
        	$iData = $dataSummary[0];
        	$eData = $dataSummary[1];
        	
			$summTable = '
			<table width="100%" bgcolor="#6699FF" border="0" cellpadding="4" cellspacing="2"><tr><td align="center">
			<table width="100%" bgcolor="#FFFFFF"  border="0" cellpadding="4" cellspacing="0">
			  <tr>
			  	<td height="25" class="tk-style36 tk-menu alignCenter" colspan="8" width="5%">
			  	<h>ESTIMATED SUMMARY AS OF THE TIME BEING</h> <b><i><u><blink><span style="color:#FF0000">&nbsp;&nbsp;&nbsp;live</span></blink></u></i></b>
			  	</td>
			  </tr>
			  <tr>
			  	<td height="30" class="FORMlabel tk-style20" width="5%">&nbsp</td>
			    <td class="tk-style20" width="10%">&nbsp</td>
			    <td class="alignCenter tk-style20" width="30%">PARTICULAR</td>
			    <td class="alignCenter tk-style20" width="10%">DEBIT</td>
			    <td class="alignCenter tk-style20" width="10%">CREDIT</td>
			    <td class="alignCenter tk-style20" width="10%">TOTAL</td>
			    <td class="alignCenter tk-style20" width="20%">MARGIN</td>
			    <td class="alignCenter tk-style20" width="100%">&nbsp;</td>
			  </tr>
			';
			if ($iData)
			{
				$iTot = 0;
				$seq = 1;
				foreach ($iData as $ke=>$ve)
				{
					$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
					$summTable = $summTable . '
						  <tr>
						  	<td class="FORMcell-left FORMlabel '.$bgclr.'">'.$seq++.'</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >INCOME</td>
						    <td class="FORMcell-right FORMlabel '.$bgclr.'" >'.strtoupper($ke).'</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >'.number_format($ve, 2 ).'</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
						  </tr>
					';
					$iTot = $iTot + $ve;
				}
				$summTable = $summTable . '
					  <tr>
					    <td colspan="5" class="FORMcell-right FORMlabel tk-style20" >&nbsp;</td>
					    <td class="FORMcell-right FORMlabel tk-style18" >'.number_format($iTot, 2).'</td>
					    <td class="FORMcell-left FORMlabel >&nbsp</td>
					    <td class="FORMcell-left FORMlabel >&nbsp</td>
					    <td class="tk-style20">&nbsp;</td>
					  </tr>
				';
				
			}
			ksort($eData);
			if ($iData)
			{
				//--------------------------------- EXPENSE
			    $eTot = 0;
				$seq = 1;
				$classi = '';
				foreach ($eData as $ke=>$ve)
				{
					$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
					$classi = FinanceSummaryPeer::GetClassification($ke);
					if ($classi == 'EXPENSE' || $classi == 'EXPENSES')
					{ 
    					$summTable = $summTable . '
    						  <tr>
    						  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap>'.$classi.'</td>
    						    <td class="FORMcell-right FORMlabel '.$bgclr.'" >'.strtoupper($ke) . ( (strpos($ke, 'fix'))? '' : ' ( gst inc. )') .'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp;</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >'.number_format($ve, 2 ).'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						  </tr>
    					';
    					$eTot = $eTot + $ve;					    					
					}					
				}
				
				//--------------------------------- COST OF GOODS
				$classi = '';
				foreach ($eData as $ke=>$ve)
				{
					$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
					$classi = FinanceSummaryPeer::GetClassification($ke);
					if ($classi <> 'EXPENSE' && $classi <> 'EXPENSES')
					{ 
    					$summTable = $summTable . '
    						  <tr>
    						  	<td class="FORMcell-left FORMlabel '.$bgclr.'" >'.$seq++.'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" nowrap>'.$classi.'</td>
    						    <td class="FORMcell-right FORMlabel '.$bgclr.'" >'.strtoupper($ke) . ( (strpos($ke, 'fix'))? '' : ' ( gst inc. )') .'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp;</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >'.number_format($ve, 2 ).'</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						    <td class="FORMcell-left FORMlabel '.$bgclr.'" >&nbsp</td>
    						  </tr>
    					';
    					$eTot = $eTot + $ve;
					}					
				}
				$xtot = $iTot - $eTot;
				$summTable = $summTable . '
					  <tr>
					  	<td class="FORMcell-left FORMlabel" >&nbsp;</td>
					    <td class="FORMcell-left FORMlabel" >&nbsp;</td>
					    <td class="alignCenter FORMlabel tk-style20" colspan="2">&nbsp;</td>
					    <td class="FORMcell-left FORMlabel" >&nbsp;</td>
					    <td class="alignCenter FORMlabel tk-style18">'.number_format($eTot, 2).'</td>
					    <td class="alignCenter FORMlabel "><span class="'.($xtot<0 ? 'tk-red' : 'tk-grn').' tk-style20">'.number_format($xtot, 2).'</span></td>
					    <td class="tk-style20">&nbsp;</td>
					  </tr>
				';
			}
			$summTable = $summTable . '
			</table>
			</td></tr></table>
			';
			
			
			//------------------------------------------- stacked
			$ballonLabels = array('Income', 'Expense');			
			$tickLabels   = array('Income for '.DateUtils::DUFormat('M', $sdate), 'Expense for '.DateUtils::DUFormat('M', $sdate));
			$spara = array('ballonLabels'=>$ballonLabels, 
				'tickLabels'=>$tickLabels
			);
			$pData = array('Expense'=>array(0, $eTot), 'Income'=>array($iTot, 0) );
			include_partial('clustered_chart_orig', array_merge($spara, array('title'=>'Income / Expense \nMargin: '.number_format($iTot - $eTot, 2) ,'plotDatas'=>$pData), array('colors'=>$col), array('units'=>'Amount')));
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
			include_partial('clustered_chart', array_merge($spara, array('title'=>'Daily Income vs Expense Trend','plotDatas'=>$dSumm), array('colors'=>$col), array('units'=>'Amount')));
			
			echo $summTable;
            
            echo '
            <div id="previousMonth" style="float:left;">
    			<table width="300" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
    			  <tr>
    			    <td colspan="3" class="tk-style36 tk-menu alignCenter" nowrap>PREVIOUS MONTH PAYROLL</td>
    			  </tr>
    			  <tr class="tk-dgra">
    			    <td width="10%" class="alignCenter FORMcell-left" nowrap>Seq</td>
    			    <td class="alignCenter FORMcell-Center" nowrap>Company</td>
    			    <td class="alignCenter FORMcell-Center" nowrap>Amount (w/gst)</td>
    			  </tr>';
            $seq = 1;
            $co = $sf_params->get('company') == '0' ? $company : array($sf_params->get('company'));
            foreach($co as $kCo=>$vCo)
            {
                $pDate = DateUtils::AddDate($sf_params->get('sdate'), -27);
                $bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
               	switch ($vCo )
        	    {
        			case '1':
        			    $vCo = 'Micronclean';
        			    break;
        			case '2':
        			    $vCo = 'Acro Solution';
        			    break;
        			case '5':
        			    $vCo = 'NanoClean';
        			    break;
        			case '4':
        			    $vCo = 'T.C. Khoo';
        			    break;
        			case '0':
        			    $vCo = '';
        			    break;
        	    }
        	    //var_dump($vCo);                
                echo '
    			  <tr>
    			    <td width="10%" height="25" class="alignRight '.$bgclr.'" nowrap>'.$seq++.'</td>
    			    <td class="alignCenter '.$bgclr.'" nowrap>'.$vCo.'</td>
    			    <td class="alignCenter '.$bgclr.'" nowrap>'.number_format(FinanceSummaryPeer::GetSubconByMonth($vCo, $pDate), 2).'</td>
    			  </tr>';
            }
            echo '			  
            	</table>
            </div>
            ';
            echo '
            <div id="thisMonth" style="float:left;">
    			<table width="300" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
    			  <tr>
    			    <td colspan="3" class="tk-style36 tk-menu alignCenter" nowrap>THIS MONTH PAYROLL</td>
    			  </tr>
    			  <tr class="tk-dgra">
    			    <td width="10%" class="alignCenter FORMcell-left" nowrap>Seq</td>
    			    <td class="alignCenter FORMcell-Center" nowrap>Company</td>
    			    <td class="alignCenter FORMcell-Center" nowrap>Amount (w/gst)</td>
    			  </tr>';
            $seq = 1;
            $co = $sf_params->get('company') == '0' ? $company : array($sf_params->get('company'));
            foreach($co as $kCo=>$vCo)
            {
                $pDate = DateUtils::AddDate($sf_params->get('sdate'), $seq);
                $bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
               	switch ($vCo )
        	    {
        			case '1':
        			    $vCo = 'Micronclean';
        			    break;
        			case '2':
        			    $vCo = 'Acro Solution';
        			    break;
        			case '5':
        			    $vCo = 'NanoClean';
        			    break;
        			case '4':
        			    $vCo = 'T.C. Khoo';
        			    break;
        			case '0':
        			    $vCo = '';
        			    break;
        	    }
        	    //var_dump($vCo);                
                echo '
    			  <tr>
    			    <td width="10%" height="25" class="alignRight '.$bgclr.'" nowrap>'.$seq++.'</td>
    			    <td class="alignCenter '.$bgclr.'" nowrap>'.$vCo.'</td>
    			    <td class="alignCenter '.$bgclr.'" nowrap>'.number_format(FinanceSummaryPeer::GetSubconByMonth($vCo, $pDate), 2).'</td>
    			  </tr>';
            }
            echo '			  
            	</table>
            </div>
            ';
            echo '<div class="clear"></div>';
        
	}
?>
