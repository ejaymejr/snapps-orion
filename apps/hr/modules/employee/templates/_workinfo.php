<?php use_helper('Validation', 'Javascript') ?>
<?php echo input_tag('id',  $sf_params->get('id'), 'size="40" type="hidden"'); ?>
<?php 
	$extraparm = '';
	$worktempList = TkWorktemplatePeer::WorktemplateLists();
	echo AjaxLib::AjaxScriptOnChange('worktemp_no', 'employee/ajaxWorktemplate', 'worktemp_no',$extraparm,'DIVWorkscheduleDetail', 'change')
?>

<div id="saveStatus"></div>	
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/employeeWorkinfo?id=' . $sf_params->get('id') )?>" method="post">
<table class="table bordered">
<tr>
	<td class="bg-lime alignRight fg-white" colspan="3" >WORKSCHEDULE</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>WorkSchedule</label></td>
	<td class=""><?php echo HTMLLib::CreateSelect('worktemp_no', $sf_params->get('worktemp_no'), $worktempList,'span5');
	//echo input_tag('id', $sf_params->get('id'),'type=hidden');
	?></td>

</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Morning Time In</label></td>
	<td class=""><?php echo HTMLLib::CreateInputText('am_time_in', $sf_params->get('am_time_in'),'span3');
	?><small class="fg-pink">[ hh:mm:ss ]   Earlier than this time will use this time as time in </small></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label> </label></td>
	<td ><?php echo HTMLLib::CreateSubmitButton('save_workinfo', 'Save Work Information');?></td>
</tr>
</table>

<div id="DIVWorkscheduleDetail">
<?php include_partial('worktemplateDetail', array('workTemp'=>$workTemp) ) ?>

<?php
//	$cal= new TkCalendar(HrFiscalYearPeer::getFiscalYear());
//	echo $cal->MonthlyCalendar(Date('Y-m-d'));
?>
</div>
</form>