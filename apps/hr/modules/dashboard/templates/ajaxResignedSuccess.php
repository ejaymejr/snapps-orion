<table class="table bordered condensed span10">
	<th class="bg-orange fg-white" colspan="2" height="30px">RESIGNED WORKER REQUEST</h2></th>
	<tr>
		<td class="bg-clearBlue alignRight span2"><label>EMPLOYEE</label></td>
		<td class=""><?php 
			echo HTMLLib::CreateSelectSearch('name', $sf_params->get('name'), HrEmployeePeer::GetActiveEmployeeList(), 'span4');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">DATE RESIGNED</td>
		<td class=""><?php echo HTMLLib::CreateDateInput('date_resigned', $sf_params->get('date_resigned'), 'span2') ?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">DATE REQUESTED</td>
		<td class=""><?php echo HTMLLib::CreateDateInput('date_requested', $sf_params->get('date_requested', Date('Y-m-d')), 'span2') ?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Remark</td>
		<td class=""><?php echo HTMLLib::CreateTextArea('remark', $sf_params->get('remark'), 'span5') ?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight"></td>
		<td class=""><?php echo HTMLLib::CreateSubmitButton('request_resigned', 'Request Resigned')?></td>
	</tr>
</table>