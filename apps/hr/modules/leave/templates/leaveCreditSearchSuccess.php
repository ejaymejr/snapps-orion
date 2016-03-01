<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('leave/leaveCreditSearch') ?>" method="post">

<table class="table condensed bordered">
<tr>
	<td class="" colspan="2">
	<?php echo link_to('RECOMPUTE LEAVE CREDITS', 'leave/leaveCreditProcessAll', 'class="button info"')?>
	&nbsp;
	<?php echo link_to('PREVIEW ANNUAL BALANCE', 'leave/annualLeaveListing', 'class="button info"')?>
	
	</div>
	
<tr>
	<td class="alignRight bg-clearBlue span2">FISCAL YEAR</td>
	<td class="span10"><?php echo HTMLLib::CreateSelect('fiscal_year', $sf_params->get('fiscal_year'), HrFiscalYearPeer::GetFiscalYearListYK(), 'span2')?></td>
</tr>
<tr>
	<td class="alignRight bg-clearBlue"></td>
	<td><?php echo HTMLLib::CreateSubmitButton('filter_year', 'SHOW THIS YEAR')?></td>
</tr>
</table>
</form>


<?php 
if (isset($pager))
{
    $filename = hrPager::LeaveCredits($pager);
	$cols = array('seq', 'employee_no', 'name', 'join_date', 'leave', 'previous_year', 'balance', 'fiscal_year', 'entitled', 'consumed', 'available');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>

