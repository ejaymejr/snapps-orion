<div class="contentBoxx">
<?php 
	$employeeList = HrEmployeePeer::GetEmployeeNumberNameList('', $sf_user->getUsername())  ; 
	$previousEmployee = '';
	$currentEmployee = '';
	$nextEmployee = '';
	if (sizeof($employeeList) > 0):
		$previousEmployee = '';
		$currentEmployee = $employeeList[0];
		$nextEmployee = $employeeList[1];
	endif;
		
	//HTMLLib::vardump($employeeList);
?>
<table class="table condensed">
	<tr>
		<td><h1>
			<?php 
				echo AjaxLib::AjaxScript('prev', 'dtr/ajaxTimesheet', 'previous_employee', 'exec=previous', 'tableTimesheet');
				echo link_to('<i class="icon-arrow-left-3 fg-Blue "></i>  PREVIOUS', '', 'id=prev class="fg-Blue"'); 
				echo input_tag('previous_employee', $previousEmployee, 'type=hidden');
				echo input_tag('current_employee', $currentEmployee, 'type=hidden');
			?></h1>
		</td>
		<td class="text-right" ><h1>
			<?php 
				echo AjaxLib::AjaxScript('next', 'dtr/ajaxTimesheet', 'next_employee', 'exec=next', 'tableTimesheet');
				echo link_to('NEXT <i class="icon-arrow-right-3 fg-Blue"></i>', '', 'id=next class="fg-Blue"'); 
				echo input_tag('next_employee', $nextEmployee, 'type=hidden');
			?></h1>
		</td>
	</tr>
</table>
</div>
<div id="tableTimesheet" class="contentBoxCondensed">
	<?php include_partial('timesheet_content', array('currentEmployee' => $currentEmployee) ) ?>
</div>
