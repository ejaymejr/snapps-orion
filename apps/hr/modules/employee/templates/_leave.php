<?php use_helper('Validation', 'Javascript') ?>
<?php echo input_tag('id',  $sf_params->get('id'), 'size="40" type="hidden"'); ?>


<div id="saveStatus"></div>	
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/leaveInfo?id=' . $sf_params->get('id') ) ?>" method="post">
<table class="table bordered">
<tr>
	<td class="bg-lime alignRight fg-white" colspan="3" >FIXED ANNUAL/YEARLY LEAVE INCREMENT</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span3" ><label>Yearly Increment</label></td>
	<td class=""><?php
	echo HTMLLib::CreateInputText('annual_leave', $sf_params->get('annual_leave'), 'span1');
	echo input_tag('id', $sf_params->get('id'),'type=hidden');
	?><small class="fg-pink">This value is used to add balance at the start of the year.</small></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Adjustment</label></td>
	<td class=""><label><?php echo $sf_params->get('annual_leave_adjustment');
	?><small class="fg-pink">&nbsp;&nbsp;( Balance + Increment this year )</small></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label></label></td>
	<td ><?php echo HTMLLib::CreateSubmitButton('save_yearlyincrement', 'Save Yearly Increment');?></td>
</tr>
</table>
<br>
<table class="table bordered">
<tr>
	<td class="bg-lime alignRight fg-white" colspan="3" >FILTER YEAR</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span3" ><label>Year</label></td>
	<td class=""><?php echo HTMLLib::CreateSelect('year', $sf_params->get('year'), HrFiscalYearPeer::GetFiscalYearListYK(), 'span2');
	
	?></td>
</tr>
</table>
<?php 
	echo AjaxLib::AjaxScriptOnChange('year', 'employee/ajaxLeaveHistory', 'year,employee_no','','DIVLeaveHistory', 'change');
?>
<div id="DIVLeaveHistory">
<?php //var_dump($lhpager);exit(); ?>
<?php 

		include_partial('leave_history', array('lcpager'=>$lcpager, 'lhpager'=>$lhpager) ); 
?>
</div>
</form>