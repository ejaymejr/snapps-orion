<?php use_helper('Validation', 'Javascript') ?>
<?php echo input_tag('id',  $sf_params->get('id'), 'size="40" type="hidden"'); ?>
<?php 
	//$extraparm = '';
	//echo AjaxLib::AjaxScript('save_info', 'employee/ajaxSaveEducation', 'id,primary_ed,primary_grade,secondary,secondary_grade,tertiary,tertiary_grade, jr_college,jr_college_grade,post_graduate,post_graduate_grade',$extraparm,'saveStatus')
?>
<div id="saveStatus"></div>	
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/employeeEducation?id='.$sf_params->get('id') )?>" method="post">
<table class="table bordered">
<tr>
	<td class="bg-lime alignCenter fg-white" >EDUCATION</td>
	<td class="bg-lime alignCenter fg-white" >SCHOOL / INSTITUTION </td>
	<td class="bg-lime alignCenter fg-white" >GPA</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label>PRIMARY </label></td>
	<td ><?php echo HTMLLib::CreateInputText('primary_ed', $sf_params->get('primary_ed'));
		echo input_tag('id', $sf_params->get('id'), 'type=hidden');?></td>
	<td ><?php echo HTMLLib::CreateInputText('primary_grade', $sf_params->get('primary_grade'), 'span1');?></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label>SECONDARY </label></td>
	<td ><?php echo HTMLLib::CreateInputText('secondary', $sf_params->get('secondary'));?></td>
	<td ><?php echo HTMLLib::CreateInputText('secondary_grade', $sf_params->get('secondary_grade'), 'span1');?></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label>JUNIOR COLLEGE </label></td>
	<td ><?php echo HTMLLib::CreateInputText('jr_college', $sf_params->get('jr_college'));?></td>
	<td ><?php echo HTMLLib::CreateInputText('jr_college_grade', $sf_params->get('jr_college_grade'), 'span1');?></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label>TERTIARY </label></td>
	<td ><?php echo HTMLLib::CreateInputText('tertiary', $sf_params->get('tertiary'));?></td>
	<td ><?php echo HTMLLib::CreateInputText('tertiary_grade', $sf_params->get('tertiary_grade'), 'span1');?></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label>POST GRADUATE </label></td>
	<td ><?php echo HTMLLib::CreateInputText('post_graduate', $sf_params->get('post_graduate'));?></td>
	<td ><?php echo HTMLLib::CreateInputText('post_graduate_grade', $sf_params->get('post_graduate_grade'), 'span1');?></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight" ><label> </label></td>
	<td ><?php echo HTMLLib::CreateSubmitButton('save_info', 'Save Education');?></td>
</tr>
</table>
</form>