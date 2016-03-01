<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox" >
<form name="FORMadd" autocomplete="off" id="IDFORMadd" action="<?php echo url_for('leave/leaveApplicationSearch')?>" method="post">
<table class="table condensed bordered">
	<tr>
		<td class="span2 bg-clearBlue alignRight" >Choose Month</td>
		<td class="" ><?php echo HTMLLib::CreateSelect('cdate', $sf_params->get('cdate'), sfConfig::get('monthlyCalendar'), 'span2'); ?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" ></td>
		<td class="" ><?php echo HTMLLib::CreateSubmitButton('change_month', 'Change Month'); ?></td>
	</tr>
</table>
</form>
<?php 
if (isset($pager))
{
    $filename = hrPager::LeaveApprovalAllEmployee($pager);
	$cols = array('seq','action', 'name', 'leave', 'from', 'to', 'no_days', 'deny', 'approved');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}

?>
</div>