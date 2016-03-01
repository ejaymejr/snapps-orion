<?php use_helper('Form', 'Javascript'); 
sfConfig::set('app_page_heading', 'Daily Efficiency');
?>
<script type="text/javascript">

function selectAll() { 
    // have we been passed an ID 
     selectBox = document.getElementById('teamList');
     selected = document.getElementById("SELECT_ALL").checked ;
 //    alert(selected);
//    if (typeof selectBox == "string") { 
//        selectBox = document.getElementById(teamList);
//    } 
    // is the select box a multiple select box? 
    
    if (selectBox.type == "select-multiple") { 
        for (var i = 0; i < selectBox.options.length; i++) { 
             selectBox.options[i].selected = selected; 
        } 
    }
}

function getDateOfWeekNo(week, year)
{
  Date.prototype.toDateString = function() {
    return [[['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][this.getMonth()], this.getDate()].join('. '), this.getFullYear()].join(', ');
  }
  
  //var weekNum = "201206";
  var weekNum = year + week;
  //alert(weekNum);
  
  var yr = weekNum.substr(0,4);
  var wk = weekNum.substr(4,6);

  var tm = 1000*60*60*24;
  var d=0;
  do {
    var start = new Date(yr,0,1+d);
    d++
  } while(start.getDay() != 1)

  var sta_dt = new Date(start.getTime()+tm*(wk-1)*7);
  //var end_dt = new Date(sta_dt.getTime()+tm*6);
  
  var curr_date  = pad(sta_dt.getDate() - 1);
  var curr_month = pad(sta_dt.getMonth() + 1); //Months are zero based
  var curr_year  = sta_dt.getFullYear();
  var startdt = curr_year + "-" + curr_month + "-" + curr_date;
  var end_dt = new Date(curr_year, sta_dt.getMonth(),  (sta_dt.getDate() + 5) );
  var enddt = end_dt.getFullYear() + "-" + pad(end_dt.getMonth() + 1) + "-" + pad(end_dt.getDate());
  //alert(sta_dt.getDate());
  //var startdt = sta_dt.getFullYear() + "-" + sta_dt.getMonth() + 1 + "-" + (sta_dt.getDate() - 1);
  //var enddt = end_dt.getFullYear() + "-" + end_dt.getMonth() + 1 + "-" + (end_dt.getDate() - 1);
  
  document.getElementById("xIDx_1").value =  startdt ;
  document.getElementById("xIDx_3").value = enddt;
  //alert(end_dt.getDate() - 1);
  //alert(startdt  + " to " + enddt); 

}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

</script>
<form name="FORMadd" id="IDFORMadd"
	action="<?php echo url_for('production/weeklyMatrix'). '?id=' . $sf_params->get('id');?>"
	method="post">
	<table width="100%" class="FORMtable" border="0" cellpadding="4"
		cellspacing="0">
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>Week</td>
			<td colspan="3" class="FORMcell-right" nowrap><?php

			//$fiscalYear = HrFiscalYearPeer::GetFiscalYear();
			$weekList = DateUtils::GetWeeksOfYearNumber($sf_params->get('cyear'));
			//     	var_dump($fiscalYear);
			//     	exit();
			//var_dump($weekList);
			echo select_tag('from_week_no',
         options_for_select(($weekList),
         $sf_params->get('from_week_no') ),'onchange=getDateOfWeekNo($F("from_week_no"), "'.$sf_params->get('cyear').'")' );
       	echo ' to ';
        echo select_tag('to_week_no',
         options_for_select(($weekList),
         $sf_params->get('to_week_no') ),'onchange=getDateOfWeekNo($F("to_week_no"), "'.$sf_params->get('cyear').'")' );
        echo '&nbsp;';
        echo select_tag('cyear',
        		options_for_select(HrFiscalYearPeer::GetFiscalYearListYK(),
        				$sf_params->get('cyear') ) );

        //echo input_tag('cyear', $sf_params->get('cyear'), 'size=6');
        //echo input_tag('test');
        //    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15" type="hidden" ');
        //    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
        //    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15"  type="hidden"' );
    ?>
			</td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>Company</td>
			<td colspan="3" class="FORMcell-right" nowrap><?php
			$jsTeamQString = "'company=' + \$F('company')    "
		//					." + '&cmonth=' + \$F('cmonth".$leaveID."') "
			//					." + '&leaveID=" . $leaveID ."'"
			;
			$ajaxGetTeamList = array(
			'url'		=>'production/ajaxGetTeamList',
			'with'		=> $jsTeamQString,
            'update' 	=> 'DIVTeamList',
	            'script'    => true,
	            'loading'   => 'stop_remote_pager();',
	            'before'   	=> 'showLoader();',
	            'complete'  => 'hideLoader();formatFormStyle();',
	            'type'      => 'synchronous',
	);
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution",
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );
//	    echo select_tag('company',
//         options_for_select($company,
//         $sf_params->get('company') ) );

        echo select_tag('company',
	             options_for_select($company,
	             $sf_params->get('company') ), array('onchange'=>remote_function($ajaxGetTeamList) . ';return false;') );

	    echo select_tag('race',
        options_for_select(HrEmployeePeer::GetRaceList(),
        $sf_params->get('race') ) );

//    echo HTMLForm::Error('employee_no');
//    $empNoEntry = '';
//    if ($sf_user->isAuthenticated()):
//	    $empNoEntry = select_tag('employee_no'.$leaveID,
//	             options_for_select(HrEmployeePeer::GetEmployeeNameList(),
//	             $sf_params->get('employee_no'.$leaveID) ), array('onchange'=>remote_function($ajaxLCredit) . ';return false;') );
//	else:
//		$empNoEntry = input_tag('employee_no'.$leaveID, $sf_params->get('employee_no'.$leaveID) , array('onchange'=>remote_function($ajaxLCredit) . ';return false;', 'size'=>35, 'onkeydown'=>"return DisableKeypress()" ) );
//	endif;
//
//
//    echo select_tag('company',
//         options_for_select($company,
//         $sf_params->get('company') ) );

//    echo select_tag('eGroup',
//         options_for_select(HrEmployeePeer::OptionEmploymentGroup(),
//         $sf_params->get('eGroup') ) );
    ?></td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>DURATION</td>
			<td class="FORMcell-right" colspan="3" nowrap><?php //
    echo select_tag('duration',
		        options_for_select(array('PAID HOURS'=>'PAID HOURS', 'ACTUAL IN-OUT RECORD'=>'ACTUAL IN-OUT RECORD'),
		        $sf_params->get('duration') ) );
			?> <span class="negative">Paid Duration means that it accounts the
					leaves, holidays and dayoff, While actual record Accounts the
					actual in-out record of the employee</span>
			</td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap><span class="negative">&nbsp;&nbsp;(You
					can check Select ALL)</span></td>
			<td class="FORMcell-right" nowrap><div id="DIVTeamList">
					<?php echo select_tag('teamList', options_for_select(
							HrEmployeePeer::GetTeamList($sf_params->get('company') )), 'multiple=multiple size=15x30');
			  echo "&nbsp;&nbsp;";
			  echo checkbox_tag('SELECT_ALL', '', '', 'onclick="selectAll()"') . ' - SELECT ALL';
			  ?>
				</div></td>
		</tr>

		<tr>
			<td class="FORMcell-left FORMlabel" nowrap><span class="negative">&nbsp;&nbsp;(You
					can check Select ALL)</span></td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('shoewashing', 'SHOE WASHING', $sf_params->get('shoewashing')) . ' - SHOE WASHING';
			?>
			</td>
			<td width="20" class="FORMcell-right" nowrap><?php
			echo checkbox_tag('cleanroompacking', 'CLEANROOM PACKING', $sf_params->get('cleanroompacking')) . ' - CLEANROOM PACKING';
			?>
			</td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('mcssupport', 'MCS SUPPORT', $sf_params->get('mcssupport')) . ' - MCS SUPPORT';
			?>
			</td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>Department(s)</td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('shoepacking', 'SHOE PACKING', $sf_params->get('shoepacking')) . ' - SHOE PACKING';
			?>
			</td>

			<td width="20" class="FORMcell-right" nowrap><?php
			echo checkbox_tag('incoming', 'INCOMING(SORTING JUMPSUIT)', $sf_params->get('incoming')) . ' - INCOMING(SORTING JUMPSUIT)';
			?>
			</td>
			<td width="100%" class="FORMcell-right" nowrap><?php
			echo checkbox_tag('mcsother', 'MCS OTHER', $sf_params->get('mcsother')) . ' - MCS OTHER';
			?>
			</td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('shoesvacuumpack', 'SHOES VACUUM PACK', $sf_params->get('shoesvacuumpack')) . ' - SHOES VACUUM PACK';
			?>
			</td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('packingjumpsuit', 'PACKING (JUMPSUIT)', $sf_params->get('packingjumpsuit')) . ' - PACKING (JUMPSUIT)';
			?>
			</td>
			<td width="100%" class="FORMcell-right" nowrap><?php
			echo checkbox_tag('SELECT_ALL', '', '', 'onclick="selectAll()"') . ' - SELECT ALL';
			?>
			</td>

		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
			<td class="FORMcell-right" nowrap><?php
			echo checkbox_tag('outsideshoepacking', 'OUTSIDE SHOE PACKING', $sf_params->get('outsideshoepacking')) . ' - OUTSIDE SHOE PACKING';
			?>
			</td>
			<td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
			<td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" class="FORMcell-right FORMlabel" nowrap><b> Note: </b>Please
				limit your filter to 1 group if days is more than 30days.<br>
				Employee not assigned to a team on a particular day will not be
				included on te DIRECT STAFF Head count.<Br> But Daily Income will
				still be reflected. This happen if employee has no assignment on a
				particular day. (May only apply to new Employee)</td>

		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap></td>
			<td class="FORMcell-right" nowrap><input type="submit"
				name="benchmark" value=" Compute Efficiency " class="submit-button">
			</td>
			<td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>

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
<div>
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
		$co   = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
		$egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$seq=1;
		$gbasi  = 0;
		$gpart  = 0;
		$got    = 0;
		$gallo  = 0;
		$gmeal  = 0;
		$gunde  = 0;
		$gabse  = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota  = 0;
		$proof  = '';
		$gptot  = 0;
		$sproof = '';
		$twdith = '100%';
		$dgroup = array();

		$dept = array();
		$dept = $sf_params->get('cleanroompacking')? array_merge($dept, array($sf_params->get('cleanroompacking'))) : $dept;
		$dept = $sf_params->get('incoming')? array_merge($dept, array($sf_params->get('incoming'))) : $dept;
		$dept = $sf_params->get('shoewashing')? array_merge($dept, array($sf_params->get('shoewashing'))) : $dept;
		$dept = $sf_params->get('shoepacking')? array_merge($dept, array($sf_params->get('shoepacking'))) : $dept;
		$dept = $sf_params->get('shoesvacuumpack')? array_merge($dept, array($sf_params->get('shoesvacuumpack'))) : $dept;
		$dept = $sf_params->get('mcssupport')? array_merge($dept, array($sf_params->get('mcssupport'))) : $dept;
		$dept = $sf_params->get('packingjumpsuit')? array_merge($dept, array($sf_params->get('packingjumpsuit') )) : $dept;
		$dept = $sf_params->get('outsideshoepacking')? array_merge($dept, array($sf_params->get('outsideshoepacking'))) : $dept;
		$dept = $sf_params->get('mcsother')? array_merge($dept, array($sf_params->get('mcsother'))) : $dept;
		$dept = $sf_params->get('teamList')? array_merge($dept, $sf_params->get('teamList')) : $dept;
		$wk1Dt = HrFiscalYearPeer::GetDateRangeByWeekNo($sf_params->get('from_week_no'), $sf_params->get('cyear'));
		$wk2Dt = HrFiscalYearPeer::GetDateRangeByWeekNo($sf_params->get('to_week_no'), $sf_params->get('cyear'));
		$sdate = $wk1Dt['start'];
		$edate = $wk2Dt['end'];

		$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, $dept, $sf_params->get('race'));
		$empList = $empData['list'];
		//         $empList = array('400615179310311'=>'400615179310311');
		//          var_dump($empList);
		//          exit();
		//          var_dump($sdate);
		//          var_dump($edate);
		//          exit();
		$wkDiff = $sf_params->get('to_week_no') - $sf_params->get('from_week_no') + 1;
		//
		//		var_dump($sf_params->get('teamList'));
		//		echo '<br>s------------<br>';
		//		var_dump($dept);
		//		exit();

		//         foreach($empData as $empNo):
		//             //$empName = HrEmployeePeer::GetDataByEmployeeNo($empNo);
		//             //echo $empName->getName().'<br>';
		//             echo $empNo .'<br>';
		//         endforeach;
		//         exit();

		if (! implode($dept)) {
			return $this->getContext()->getRequest()->getErrorMsg()->addMsg('Must Select a Group.');
		}

		//--------------------------------------- ARTICLE PROOF PER WEEK
		//$serList = SalesQuantitySummaryPeer::GetServiceListbyDate($sdate, $edate);
		$serList = SalesQuantitySummaryPeer::GetOptimizedDatabyProductGroupDateRange($sdate, $edate, $dept);

		//$serList = array('BOOTIES', 'JUMPSUIT /COVERALL');
		$proof =  $proof .  '

        		<table width="'.$twdith.'" class="quantity-table " border="0" cellpadding="2" cellspacing="0">
        		<tr>
        		<td colspan="'. (DateUtils::DUFormat('t', $edate) + 3) .'" class="tk-oran alignCenter" nowrap><h2>ARTICLES (QUANTITY)</h2></td>
        		</tr>';
		$proof =  $proof .  '
        		<tr class="tk-dgra">
        		<td colspan="2" class="section-header alignCenter FORMcell-Center" nowrap>ARTICLE</td>
        		<td colspan="'. $wkDiff .'"  class="section-header alignCenter FORMcell-Center" nowrap>WEEK NUMBER</td>
					<td  class="section-header alignCenter FORMcell-Center" nowrap></td>
					</tr>';

		$proof =  $proof .  '
			  <tr class="tk-dgra">
					<td  class="section-header alignCenter FORMcell-left" nowrap>Seq</td>
					<td width="80" class="section-header alignCenter FORMcell-Center" nowrap>Description</td>
					';
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{

			$proof = $proof .  '
	            		<td  class="section-header alignCenter FORMcell-Center" nowrap>'.$x.'</td>
    		';
		}
		$proof = $proof . '
                      		<td  class="section-header alignCenter FORMcell-Center" nowrap>TOTAL</td>
                      		</tr>';
			
		$seq = 1;
		$mArt = array();
		foreach($serList as $ke=>$ve)
		{
			$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';

			$proof =  $proof .  '
	             		<tr class="">
	             		<td  class="section-header '.$bgclr.'"  nowrap>'.$seq++.'</td>
	             		<td width="130" class="section-header  '.$bgclr.'" nowrap>'.$ve.'</td>
        		';
			$tqty = 0;

			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$cWK = HrFiscalYearPeer::GetDateRangeByWeekNo($x, $sf_params->get('cyear'));
				$nqty = 0;
				$serData = SalesQuantitySummaryPeer::GetDataByProductGroupDateRange($ve, $cWK['start'], $cWK['end']);
				//echo $x .' : '. $cWK['start'] .' - '. $cWK['end'] .'<br>';
				foreach( $serData as $rec)
				{
					$nqty = $nqty + ($rec->getQuantity() > 0? $rec->getQuantity() : 0);
				}
				//echo $nqty . '<br>';
				$mArt[$x][$ve] = $nqty ;

				$tqty = $tqty + $nqty;
				$proof = $proof .  '
		<td  class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$nqty.'</td>
		';
			}

			$proof = $proof . '
		<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$tqty.'</td>
		</tr>
		';
		}

		$bgclr = 'tk-pink';
		$gtotal = 0;
		$proof = $proof . '
				<tr>
				<td colspan="2" height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>TOTAL QUANTITY</td>
					';
		$grossArticles = 0;
		$articleTotalPerWeek = array();
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$articlePerWeek = 0;
			if (isset($mArt[$x]) ):
			foreach($mArt[$x] as $articleTotal):
			$articlePerWeek = $articlePerWeek + $articleTotal;
			endforeach;
			else:
			$articleTotal = 0;
			$articlePerWeek = 0;
			endif;
			$articleTotalPerWeek[$x] = $articlePerWeek;
			$grossArticles += $articlePerWeek;
			$proof = $proof . '
					<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $articlePerWeek .'</td>
					';
		}

		$proof = $proof . '
							<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $grossArticles .'</td>
									</tr>';
			
		$proof =  $proof .  '
			  		</table>
			  		';
			
		//--------------------------------------- END OF ARTICLE PER WEEK
		// $mArt[$x] CONTAIN PER WEEK VALUE OF THE ARTICLES


		//--------------------------------------- ARTICLE SALE PER WEEK
		//$serList = SalesQuantitySummaryPeer::GetServiceListbyDate($sdate, $edate);
		$serList = SalesQuantitySummaryPeer::GetOptimizedDatabyProductGroupDateRange($sdate, $edate, $dept);

		//$serList = array('BOOTIES', 'JUMPSUIT /COVERALL');
		$proof =  $proof .  '

					<table width="'.$twdith.'" class="quantity-table " border="0" cellpadding="2" cellspacing="0">
			  <tr>
					<td colspan="'. (DateUtils::DUFormat('t', $edate) + 3) .'" class="tk-oran alignCenter" nowrap><h2>ARTICLES (SALES)</h2></td>
			  </tr>';
		$proof =  $proof .  '
			  <tr class="tk-dgra">
					<td colspan="2" class="section-header alignCenter FORMcell-Center" nowrap>ARTICLE</td>
					<td colspan="'. $wkDiff .'"  class="section-header alignCenter FORMcell-Center" nowrap>WEEK NUMBER</td>
					<td  class="section-header alignCenter FORMcell-Center" nowrap></td>
					</tr>';

		$proof =  $proof .  '
			  <tr class="tk-dgra">
					<td  class="section-header alignCenter FORMcell-left" nowrap>Seq</td>
					<td width="80" class="section-header alignCenter FORMcell-Center" nowrap>Description</td>
					';
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{

			$proof = $proof .  '
					<td  class="section-header alignCenter FORMcell-Center" nowrap>'.$x.'</td>
					';
		}
		$proof = $proof . '
					<td  class="section-header alignCenter FORMcell-Center" nowrap>TOTAL</td>
					</tr>';
			
		$seq = 1;
		$sales = array();
		$expense = array();
		$tsales = 0;
		$texpense = 0;
		$salesExpense = array('sales', 'expense');
		$seDisplay =0;
		$tseDisplay = 0;
		foreach($salesExpense as $sE)
		{
			$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';

			$proof =  $proof .  '
					<tr class="">
					<td  class="section-header '.$bgclr.'"  nowrap>'.$seq++.'</td>
					<td width="130" class="section-header  '.$bgclr.'" nowrap>'. strtoupper($sE) .'</td>
					';
			$tqty = 0;

			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$cWK = HrFiscalYearPeer::GetDateRangeByWeekNo($x, $sf_params->get('cyear'));
				$nqty = 0;
				$serData   = FinanceSummaryPeer::GetWeeklyTransaction( $cWK['start'], $cWK['end'], $co);
				$sales[$x][]   = $serData['income'];
				$expense[$x][] = $serData['expense'];
				$seDisplay = ($sE == 'sales'?  $serData['income'] : $serData['expense'] );
				$texpense += $serData['expense'];
				$tsales += $serData['income'];
				$tseDisplay = ($sE == 'sales'?  $tsales : $texpense );
				$proof = $proof .  '
						<td  class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$seDisplay.'</td>
					';
			}

			$proof = $proof . '
					<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$tseDisplay.'</td>
					</tr>
					';
		}

		$bgclr = 'tk-pink';
		$gtotal = 0;
		$proof = $proof . '
		<tr>
		<td colspan="2" height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>MARGIN</td>
				';
		$grossMargin = 0;
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$salePerWeek = 0;
			$expensePerWeek = 0;
			if (isset($sales[$x]) ):
			foreach($sales[$x] as $k=>$sale):
			$salePerWeek    += $sales[$x][$k];
			$expensePerWeek += $expense[$x][$k];
			$margin = $salePerWeek - $expensePerWeek;
			endforeach;
			else:
			$salePerWeek = 0;
			$expensePerWeek = 0;
			endif;
			$grossMargin += $margin;
			$proof = $proof . '
						<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $margin .'</td>
						';
		}

		$proof = $proof . '
				<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $grossMargin .'</td>
				</tr>';
			
		$proof =  $proof .  '
				</table>
				';
			
		//--------------------------------------- END OF ARTICLE SALES
		// $mArt[$x] CONTAIN PER WEEK VALUE OF THE ARTICLES
			
			
		//--------------------------------- MANHOURS DETAIL
		$seq = 1;
		$proof =  $proof .  '
				<br>
				<table width="'.$twdith.'" class="quantity-table" border="0" cellpadding="2" cellspacing="0">
				<tr>
				<td colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-oran alignCenter" nowrap><h2>WEEKLY WORKING HOURS</h2></td>
				</tr>
				<tr class="tk-dgra">
				<td colspan="3"  class="section-header alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
				';

		$proof = $proof .  '
				<td width="30" colspan="'. ($wkDiff ).'" class="section-header alignCenter FORMcell-Center" nowrap>WEEK NUMBER</td>
				';
			
		$proof = $proof . '
				<td width="30" class="section-header alignCenter FORMcell-Center" nowrap></td>
				</tr>';

		$proof =  $proof .  '
				<tr class="tk-dgra">
				<td class="section-header alignCenter FORMcell-left" nowrap>Seq</td>
				<td class="section-header alignCenter FORMcell-Center" nowrap>Name</td>
				<td class="section-header alignCenter FORMcell-Center" nowrap>Department</td>';
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$proof = $proof .  '
				<td width="30" class="section-header alignCenter FORMcell-Center" nowrap>'.$x.'</td>
				';
		}
		$proof = $proof . '
				<td width="30" class="section-header alignCenter FORMcell-Center" nowrap>total</td>
				</tr>';
			
		$empHrs = array();
		//$empList = array('033039697170209');

			
		$overtimeHours = array();
		$overtimeCost  = array();
		$normalHours   = array();
		$ratePerHour   = array();
		$empHrs        = array();
		$clkHr         = array();
		foreach($empList as $ke=>$empNo)
		{
			$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';

			$empDetail = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','team'));
			$totHrs  = 0;
			$totClkHrs = 0;
			$showTotal = 0;
			$showWeekly = 0;
			$proof = $proof . '
				<tr>
				<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
				<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('NAME').'</td>
				<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('TEAM').'</td>
				';
			$totpday = 0;
			$gpday   = 0;
			$dhrs    = 0;
			$cdaily  = 0;
			$nohrs     =0;
			$othrs     =0;
			$otcost    =0;
			$normalhrs =0;
			$ratePHour =0;
			$clockHrs  =0;
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$cWK = HrFiscalYearPeer::GetDateRangeByWeekNo($x, $sf_params->get('cyear'));
				$nohrs = 0;
				$empData = TkDtrsummaryPeer::GetEmployeeTotalHoursByDateRangeByTeam($empNo, $cWK['start'], $cWK['end'], $dept);
				while ($empData->next())
				{
					$clockHrs  = $empData->get('CLOCK_HOURS');
					$nohrs     = $empData->get('TOTAL_HOURS');
					$othrs     = $empData->get('TOTAL_OT');
					$otcost    = round($empData->get('POSTED_AMOUNT'), 2);
					$normalhrs = $empData->get('NORMAL_HOUR');
					$ratePHour = round($empData->get('RATE_PER_HOUR'), 2);
					if (! isset($empHrs[$x])) $empHrs[$x] = 0;
					if (! isset($overtimeHours[$x])) $overtimeHours[$x] = 0;
					if (! isset($overtimeCost[$x])) $overtimeCost[$x] = 0;
					if (! isset($normalHours[$x])) $normalHours[$x] = 0;
					if (! isset($ratePerHour[$x])) $ratePerHour[$x] = 0;
					$totHrs            += $nohrs;
					$totClkHrs         += $clockHrs;
					$empHrs[$x]        += intval($nohrs) ;
					$overtimeHours[$x] += intval($othrs) ;
					$overtimeCost[$x]  += $otcost ;
					$normalHours[$x]   += intval($normalhrs) ;
					$ratePerHour[$x]   += $ratePHour ;
					$clkHr[$x]         += $clockHrs;
				}
					
				if ($sf_params->get('duration') == 'PAID HOURS' ):
				$showWeekly = intval($nohrs);
				$showTotal  = intval($totHrs);
				else:
				$showWeekly = number_format($clockHrs, 2);
				$showTotal  = number_format($totClkHrs, 2);
				endif;
				$proof = $proof .  '
				<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $showWeekly .'</td>
                      				';
			}
			$proof = $proof .  '
				<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $showTotal .'</td>
					';

			$proof = $proof . '
	             				</tr>';
		}
		$bgclr = 'tk-pink';
		$gtotal = 0;
		$proof = $proof . '
	             				<tr>
	             				<td colspan="3" height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>TOTAL MAN-HOURS</td>
					';
		$grossHours = 0;

		$hrsTotalPerWeek = array();
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$hrsPerWeek = 0;
			//$hrsPerWeek = $empHrs[$x];
			//$hrsTotalPerWeek[$x] += $hrsPerWeek;


			if ($sf_params->get('duration') == 'PAID HOURS' ):
			$showWeekly =  $empHrs[$x];
			$showTotal  = intval($totHrs);
			else:
			$showWeekly = $clkHr[$x];
			$showTotal  = number_format($totClkHrs, 2);
			endif;

			$grossHours += $showWeekly;
			$proof = $proof . '
						<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $showWeekly .'</td>
				';
		}

		$proof = $proof . '
				<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $grossHours .'</td>
				</tr>';
			
		$proof =  $proof .  '
				</table>
				';
		//--------------- END MAN HOURS DETAIL
		//var_dump($clkHr);


		//--------------------------------- MANHOURS COST
		$seq = 1;
		$proof =  $proof .  '
						<br>
						<table width="'.$twdith.'" class="quantity-table" border="0" cellpadding="2" cellspacing="0">
				<tr>
				<td colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-oran alignCenter" nowrap><h2>WEEKLY MAN-HOUR COST</h2></td>
					</tr>
					<tr class="tk-dgra">
					<td colspan="3"  class="section-header alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
					';

		$proof = $proof .  '
					<td width="30" colspan="'. ($wkDiff ).'" class="section-header alignCenter FORMcell-Center" nowrap>WEEK NUMBER</td>
					';
			
		$proof = $proof . '
							<td width="30" class="section-header alignCenter FORMcell-Center" nowrap></td>
							</tr>';

		$proof =  $proof .  '
									<tr class="tk-dgra">
									<td class="section-header alignCenter FORMcell-left" nowrap>Seq</td>
									<td class="section-header alignCenter FORMcell-Center" nowrap>Name</td>
									<td class="section-header alignCenter FORMcell-Center" nowrap>Department</td>';
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$proof = $proof .  '
				<td width="30" class="section-header alignCenter FORMcell-Center" nowrap>'.$x.'</td>
				';
		}
		$proof = $proof . '
				<td width="30" class="section-header alignCenter FORMcell-Center" nowrap>total</td>
				</tr>';
			
		//$empHrs = array();
		//$empList = array('033039697170209');

		$totCost = 0;
		$empCost = array();
		foreach($empList as $ke=>$empNo)
		{
			$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';

			$empDetail = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','team'));
			$totHrs  = 0;
			$proof = $proof . '
							<tr>
							<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
							<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('NAME').'</td>
				<td class="section-header alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('TEAM').'</td>
							';
			$totCost = 0;
			$totpday = 0;
			$gpday   = 0;
			$dhrs    = 0;
			$cdaily  = 0;
			$nohrs     =0;
			$othrs     =0;
			$otcost    =0;
			$normalhrs =0;
			$ratePHour =0;
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$cWK = HrFiscalYearPeer::GetDateRangeByWeekNo($x, $sf_params->get('cyear'));
				$nohrs = 0;
				$empData = TkDtrsummaryPeer::GetEmployeeTotalHoursByDateRangeByTeam($empNo, $cWK['start'], $cWK['end'], $dept);
				while ($empData->next())
				{
					$nohrs     = $empData->get('TOTAL_HOURS');
					$othrs     = $empData->get('TOTAL_OT');
					$otcost    = round($empData->get('POSTED_AMOUNT'), 2);
					$normalhrs = $empData->get('NORMAL_HOUR');
					$ratePHour = round($empData->get('RATE_PER_HOUR'), 2);
					$wkCost    = round(intval($normalhrs * $ratePHour), 2);
					$totCost   += $wkCost;
					if (! isset($empCost[$x])) $empCost[$x] = 0;
					//			            if (! isset($overtimeHours[$x])) $overtimeHours[$x] = 0;
					//			            if (! isset($overtimeCost[$x])) $overtimeCost[$x] = 0;
					//			            if (! isset($normalHours[$x])) $normalHours[$x] = 0;
					//			            if (! isset($ratePerHour[$x])) $ratePerHour[$x] = 0;
					//			            $totHrs            += $nohrs;
					$empCost[$x]        += intval($wkCost) ;
					//			            $overtimeHours[$x] += intval($othrs) ;
					//			            $overtimeCost[$x]  += $otcost ;
					//		                $normalHours[$x]   += intval($normalhrs) ;
					//		                $ratePerHour[$x]   += $ratePHour ;
				}
				$proof = $proof .  '
								<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $wkCost .'</td>
							';
			}
			$proof = $proof .  '
							<td width="30" class="section-subheader alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $totCost .'</td>
				';

			$proof = $proof . '
				</tr>';
		}
		$bgclr = 'tk-pink';
		$gtotal = 0;
		$proof = $proof . '
				<tr>
				<td colspan="3" height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>TOTAL MAN-HOUR COST</td>
				';
		$grossHours = 0;

		//$hrsTotalPerWeek = array();
		$grossCost = 0;
		for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
		{
			$costPerWeek = 0;
			$costPerWeek = intval($empCost[$x] + $overtimeCost[$x]);
			//$hrsTotalPerWeek[$x] += $hrsPerWeek;
			$grossCost += $costPerWeek;
			$proof = $proof . '
					<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $costPerWeek .'</td>
								';
		}

		$proof = $proof . '
				<td height="25"  class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $grossCost .'</td>
						</tr>';
			
		$proof =  $proof .  '
				</table>
				';
		//--------------- END MAN HOURS COST

		//******************************************************
		//***   Daily Overall
		//******************************************************
		$ballonLabels = array();
		$tickLabels = array();
		$cnt = 0;
		$tArt = 0;
		$tHrs = 0;
		foreach($articleTotalPerWeek as $wkNo=>$article):
		$tArt +=  $article;
		$tHrs +=  $empHrs[$wkNo];
		$cnt++;
		endforeach;
		$avg = round($tArt / $tHrs);
		foreach($articleTotalPerWeek as $wkNo=>$article):
		$cWK = HrFiscalYearPeer::GetDateRangeByWeekNo($wkNo, $sf_params->get('cyear'));
		$ballonLabels[] = ' (' . DateUtils::DuFormat('M-d',$cWK['start']).' to '. DateUtils::DuFormat('M-d',$cWK['end']) .')';
		$tickLabels[] = 'WK '.$wkNo ;
		$plotData['ARTICLE (VALUE x 100)'][]  = $article / 100;
		$plotData['MAN-HOUR'][] = $empHrs[$wkNo];
		$plotDataHours['OVERTIME HOURS'][] = $overtimeHours[$wkNo];
		$plotDataHours['NORMAL HOURS'][]   = $normalHours[$wkNo];
		$plotDataPay['NORMAL HOUR COST'][] = $empCost[$wkNo];
		$plotDataPay['OVERTIME COST'][]    = $overtimeCost[$wkNo];
		$plotDataEff['AVERAGE'][] =  $avg;
		$plotDataEff['EFFECIENCY'][] =  round($article / $empHrs[$wkNo], 2);
			
		endforeach;
		$spara = array('ballonLabels'=>$ballonLabels ,
				'tickLabels'=>$tickLabels
			);
			include_partial('multiple_line_chart', array_merge($spara, array('title'=>'ARTICLES','statsData'=>$plotData), array('colors'=>$col), array('units'=>'Amount')));
			include_partial('multiple_line_chart', array_merge($spara, array('title'=>'MAN HOUR (adding both is the total man-hours) The Chart will tell us what is the percentage of the OVERTIME Hours Vs NORMAL Hours','statsData'=>$plotDataHours), array('colors'=>$col), array('units'=>'Hours')));
			include_partial('multiple_line_chart', array_merge($spara, array('title'=>'PRODUCTIVITY OUTPUT','statsData'=>$plotDataEff), array('colors'=>$col), array('units'=>'unit')));

			include_partial('multiple_line_chart', array_merge($spara, array('title'=>'MANPOWER COST','statsData'=>$plotDataPay), array('colors'=>$col), array('units'=>'Hours')));

			//------------------------------------------------ summary
			$sproof = $sproof .  '
							
						<table width="'.$twdith.'" class=" quantity-table " border="0" cellpadding="2" cellspacing="0">
						<tr>
		    <td  colspan="'. ($wkDiff + 4) .'" class="tk-oran alignCenter" nowrap><h2>DATA SUMMARY</h2></td>
						</tr>';

			$sproof = $sproof .  '
					<tr class="tk-dgra">
					<td colspan="3"  class="section-header alignCenter FORMcell-Center" nowrap>DESCRIPTION</td>
					';
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$cdate = DateUtils::AddDate($sdate, $x);
				$sproof = $sproof .  '
						<td  class="section-header alignCenter FORMcell-Center" nowrap>'.$x.'</td>
						';
			}
			$sproof = $sproof . '
						<td width="30" class="section-header alignCenter FORMcell-Center" nowrap>total</td>
						</tr>';

			//----------------------------------- ARTICLE PER WEEK
			$bgclr = 'tk-lgra';
			$hrsTotal = 0;
			$sproof =  $sproof .  '
							<tr class="'. $bgclr .'">

							<td colspan="3" width="80" class="section-header alignCenter" nowrap>Per Day Articles Washed</td>
							';
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$articleTotal = $articleTotal + $articleTotalPerWeek[$x];
				$sproof = $sproof .  '
							<td width="30" class="section-subheader " nowrap>'.$articleTotalPerWeek[$x].'</td>
							';
			}
			$sproof = $sproof . '
							<td width="30" class="section-subheader " nowrap>'.number_format($articleTotal).'</td>
							</tr>';


			//------------------------------ HOURS PER WEEK
			$bgclr = 'tk-lgra';
			$pdart = 0;
			$articleTotal = 0;
			$sproof =  $sproof .  '
							<tr class="'. $bgclr .'">

							<td colspan="3" width="80" class="section-header alignCenter" nowrap>Hours Per Week</td>
							';
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
			{
				$hrsTotal = $hrsTotal + $empHrs[$x];
				$sproof = $sproof .  '
						<td width="30" class="section-subheader " nowrap>'.$empHrs[$x].'</td>
						';
			}
			$sproof = $sproof . '
						<td width="30" class="section-subheader " nowrap>'.number_format($hrsTotal).'</td>
						</tr>';

			//------------------------------ EFFICIENCY INDEX
			$bgclr = 'tk-gree';
			$pdart = 0;
			$effIndex = 0;
			$effIndexTotal = 0;
			$sproof =  $sproof .  '
				<tr class="'. $bgclr .'">

				<td colspan="3" height="25" width="80" class="alignCenter FORMlabel FORMcell-Center" nowrap>Efficiency Index</td>
				';
			//$x=$sf_params->get('from_week_no');
			for($x=$sf_params->get('from_week_no'); $x <= $sf_params->get('to_week_no'); $x++)
				//foreach($articleTotalPerWeek as $art)
			{
				//$x++;
				$effIndex = $articleTotalPerWeek[$x] / $empHrs[$x];
				$effIndexTotal += $effIndex;

				$sproof = $sproof .  '
					<td width="30" class="alignCenter FORMcell-Center" nowrap>'.number_format($effIndex, 2 ).'</td>
					';
			}
			$sproof = $sproof . '
					<td width="30" class="alignCenter FORMcell-Center" nowrap>'.number_format($effIndexTotal / $wkDiff, 2).'</td>
								</tr>';

			$sproof = $sproof . '
								</table>
								';

			echo '<div id="DIVProductivityProof">';
			echo $sproof;
			echo $proof;
			echo '</div>';
			echo '<div id="DIVFinanceHalfScreen">';
			echo '</div>';
			echo '<div id="clear"></div>';

	}



	?>


</div>
