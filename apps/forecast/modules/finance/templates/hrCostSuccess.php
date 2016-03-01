<?php use_helper('Form', 'Javascript'); 
sfConfig::set('app_page_heading', 'Daily Income and Expense(s) Summary');
?>

<script type='text/javascript'>
$(document).ready(function(){
	$( "#chk_OT" ).click(function() {
		$("#chk_HA").prop('checked', $( "#chk_OT" ).is(':checked'));
		$("#chk_VA").prop('checked', $( "#chk_OT" ).is(':checked'));
	});
	
	$( "#chk_CDAC" ).click(function() {
		$("#chk_MBMF").prop('checked', $( "#chk_CDAC" ).is(':checked'));
		$("#chk_SINDA").prop('checked', $( "#chk_CDAC" ).is(':checked'));
	});

});
</script>

<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('finance/hrCost'). '?id=' . $sf_params->get('id');?>" method="post">
<div class="panel" data-role="panel">
<div class="panel-header bg-lightBlue">
<span class="fg-white">HR COST TO COMPANY</span>
</div>
<div class="panel-content">
<table class="table bordered condensed" >
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>FROM</small></label></td>
    <td class="alignLeft" nowrap>
    <?php
    //echo HTMLLib::CreateDateInput('sdate', $sf_params->get('sdate'), 'span2');
    echo HTMLLib::CreateSelect('year', $sf_params->get('year'), $year, 'span2');
    ?>
    </td>
    <td class="bg-clearBlue alignRight" nowrap><label><small>SALES SOURCE</small></label></td>
    <td><?php 
    //echo HTMLLib::CreateDateInput('edate', $sf_params->get('edate'), 'span2'); 
        $sales_source = array('INVOICE'=>' -INVOICE- ', 'DO'=>' -DELIVERY ORDER-');
    	echo HTMLLib::CreateSelect('sales_source', $sf_params->get('sales_source'), $sales_source, "span2");
    ?></td>    
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>COMPANY</small></td>
    <td class="alignLeft" nowrap>
    <?php
    $company = HrCompanyPeer::GetCompanyListName();
    echo HTMLLib::CreateSelect('company', $sf_params->get('company'), $company, "span2");
    ?>
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><label><small>FREQUENCY</small></label></td>
    <td><?php
    $freq = array ( "MONTHLY"=>" - MONTHLY - ");
    echo HTMLLib::CreateSelect('frequency', $sf_params->get('frequency'), $freq, "span2");
    ?></td> 
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small></small></label></td>
    <td class="alignLeft" nowrap>
	<input type="submit" name="benchmark" value=" SHOW HR COSTS " class="success">
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><label></label></td>
    <td></td>
</tr>
</table>
</div>
</div>
<br />
<div class="panel" data-role="panel">
<div class="panel-header bg-lightBlue">
<span class="fg-white">ACCOUNT CODES INCLUDED ON THE GRAPH</span>
</div>
<div class="panel-content">
<?php 
	$acctCodeRows = (sizeof($acctCodes) / 3) ;
?>

<table class="table bordered condensed"><!--
	<?php 
		for($x=0; $x<= $acctCodeRows; $x++) :
			if (isset($acctCodes[($x * 3) + 0])):
				 $acctCodeCol1 = $acctCodes[($x * 3) + 0] ;
				 $acctCodeChkID1 = 'chk_' . $acctCodeCol1;
				 $chkBox1 = HTMLLib::CreateCheckBox($acctCodeChkID1, PayAccountCodePeer::GetDescriptionbyAcctCode($acctCodeCol1), $sf_params->get($acctCodeChkID1) ) ; 
			endif;
			if (isset($acctCodes[($x * 3) + 1])):
				 $acctCodeCol2 = $acctCodes[($x * 3) + 1] ;
				 $acctCodeChkID2 = 'chk_' . $acctCodeCol2;
				 $chkBox2 = HTMLLib::CreateCheckBox($acctCodeChkID2, PayAccountCodePeer::GetDescriptionbyAcctCode($acctCodeCol2), $sf_params->get($acctCodeChkID2)); 
			endif;
			if (isset($acctCodes[($x * 3) + 2])):
				 $acctCodeCol3 = $acctCodes[($x * 3) + 2] ;
				 $acctCodeChkID3 = 'chk_' . $acctCodeCol3;
				 $chkBox3 = HTMLLib::CreateCheckBox($acctCodeChkID3, PayAccountCodePeer::GetDescriptionbyAcctCode($acctCodeCol3), $sf_params->get($acctCodeChkID3)); 
			endif;
			
			$acctCodeCol2 = isset($acctCodes[($x * 3) + 1])? $acctCodes[($x * 3) + 1] : '';
			$acctCodeCol3 = isset($acctCodes[($x * 3) + 2])? $acctCodes[($x * 3) + 2] : '';
			
			$acctCodeChkID2 = 'chk_' . $acctCodeCol2;
			$acctCodeChkID3 = 'chk_' . $acctCodeCol3;
	?>
	<tr>
		<td><?php echo $chkBox1; ?></td>
		<td><?php echo $chkBox2; ?></td>
		<td><?php echo $chkBox3; ?></td>
	</tr>
	<?php endfor;?>
	-->
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_TAKEHOMEPAY', 'TAKE HOME PAY', $sf_params->get('chk_TAKEHOMEPAY'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_LEVYCOST', 'LEVY COST', $sf_params->get('chk_LEVYCOST'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_CPFEMPLOYER', 'CPF EMPLOYER', $sf_params->get('chk_CPFEMPLOYER'))?></label></td>
	<tr>
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_BP', 'BASIC PAY', $sf_params->get('chk_BP'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_PI', 'PART-TIME INCOME', $sf_params->get('chk_PI'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_BK', 'BACK PAY', $sf_params->get('chk_BK'))?></label></td>
	<tr>
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_OT', 'OVERTIME', $sf_params->get('chk_OT'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_HA', 'HARDSHIP ALLOWANCE', $sf_params->get('chk_HA'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_VA', 'VARIABLE ALLOWANCE', $sf_params->get('chk_VA'))?></label></td>
	<tr>
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_CDAC', 'CDAC FUND', $sf_params->get('chk_CDAC'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_MBMF', 'MBMF', $sf_params->get('chk_MBMF'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_SINDA', 'SINDA', $sf_params->get('chk_SINDA'))?></label></td>
	<tr>
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_MEAL', 'MEAL ALLOWANCE', $sf_params->get('chk_MEAL'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_MR', 'MEAL REIMBURSEMENT', $sf_params->get('chk_MR'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_TR', 'TRANSPORT ALLOWANCE', $sf_params->get('chk_TR'))?></label></td>
	<tr>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_ML', 'MONTHLY ALLOWANCE', $sf_params->get('chk_MEAL'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_SE', 'SPECIALIST EXCELLENCE ', $sf_params->get('chk_MR'))?></label></td>
		<td><label><?php echo HTMLLib::CreateCheckBox('chk_MCB', 'MC BENEFIT', $sf_params->get('chk_TR'))?></label></td>
	<tr>
</table>
</div>
</div>
</form>



<?php

	if (isset($benchmark)):
	
		//comparative chart
		$height = (sizeof($data['analysis']) > 2)? sizeof($data['analysis']) * 40 : 120;
		$costChart = json_encode($data['analysis']);
		include_partial('hrCostAnalysisChart', array('chartData' => $costChart, 'acctList'=> $data['acctList'], 'height' => $height ));		
	
?>
	<?php 
		foreach($acctCode as $acct => $acctName):
//		$acctName = PayAccountCodePeer::GetDescriptionbyAcctCode($acct);
//		if ($acct == 'TAKEHOMEPAY'):
//			$acctName = 'TAKE HOME PAY';
//		endif;
//		if ($acct == 'LEVYCOST'):
//			$acctName = 'LEVY COST';
//		endif;
//		if ($acct == 'CPFEMPLOYER'):
//			$acctName = 'CPF EMPLOYER SHARE';
//		endif;
	?>
	<div class="panel" data-role="panel">
	<div class="panel-header bg-orange fg-white"><?php echo $acctName; ?></div>
	<div class="panel-content">
	<table class="table bordered striped condensed">
	<tr>
		<td class="bg-clearBlue alignCenter"><label>SEQ</label></td>
		<td class="bg-clearBlue alignCenter"><label>NAME</label></td>
		<?php
			$cdate = ''; 
			foreach($periodList as $period):
				$cdate = DateUtils::PeriodToDate($period) ; 
		?>
        	  <td class="bg-clearBlue alignCenter"><label><?php echo strtoupper(DateUtils::DUFormat('M', $cdate )) ; ?></label></td>
        <?php endforeach; ?>
        <td class="bg-clearBlue alignCenter"><label>TOTAL</label></td>
	</tr>
	
	<?php 
		$seq = 0;
		// init variables
		$totalPerName  = array();
		$totalPerPeriod = array();
		foreach($employeeList as $empNo => $name):
			$totalPerName[$name] = 0;
			foreach($periodList as $period): 
				$totalPerPeriod[$period] = 0;
			endforeach;
		endforeach;
		
		foreach($employeeList as $empNo => $name):
			$seq++;
	?>
	<tr>
		<td class=" alignCenter"><small><?php echo $seq ?></small></td>
		<td class=" alignLeft"><small><?php echo substr($name, 0, 20) ?></small></td>
		<?php 
			foreach($periodList as $period): 
				$amount = isset($data[$name][$period][$acct])? $data[$name][$period][$acct] : 0;
				$totalPerName[$name]+= $amount;
				$totalPerPeriod[$period] += $amount; 
				$showBreakDown = link_to ($amount, sfConfig::get('http_intranet').'orion/hr/report/employeeLedgerAnnual?year='.substr($period, 0, 4).'&name=' . $name,'target=_BLANK');
		?>
		<td class=" alignRight"><small><?php echo $showBreakDown ?></small></td>
		<?php endforeach;?>
		<td class=" alignRight"><small><?php echo number_format($totalPerName[$name], 2 ) ?></small></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td class="alignRight bg-green"></td>
		<td class="alignRight bg-green fg-white">Total</td>
		<?php
			$grandTotal = 0; 
			foreach($periodList as $period): 
				$grandTotal += $totalPerPeriod[$period];
		?>
			<td class=" alignRight bg-green fg-white"><small><?php echo number_format($totalPerPeriod[$period],2) ?></small></td>
		<?php endforeach;?>
		<td class=" alignRight bg-green fg-white"><small><?php echo number_format($grandTotal,2) ?></small></td>
	</tr>
	</table>
	</div>
	</div>
	<br>
	<?php 
		//prepare the chart
		$seq = 0;
		foreach($employeeList as $empNo => $name):
			if ($totalPerName[$name] > 0 ):
				$seq ++;
			endif;
		endforeach;
		$average = round($grandTotal / $seq);
		$height = $seq * 30;
		$costChart = array();
		foreach($employeeList as $empNo => $name):
			if ($totalPerName[$name] > 0 ):
				$costChart[] = array('name' => strtolower(substr($name, 0, 25)), 'total' => $totalPerName[$name], 'average' => $average );
			endif;
		endforeach;
		
		$costChart = json_encode($costChart);
		//include_partial('hrCostChart', array('chartData' => $costChart, 'title'=> $acctName, 'height' => $height ));		
		endforeach; // acctCode
		endif;
		
		
		?>
	 
	
</div>