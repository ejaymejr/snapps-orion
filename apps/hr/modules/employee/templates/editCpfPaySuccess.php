<?php use_helper('Validation', 'Javascript') ?>
<?php $iconTo = '<i class="icon-arrow-right on-right on-left"
					style="background: red;
					color: white;
					padding: 10px;
					border-radius: 50%"></i>' 
?>
<form name="FORMadd" id="formAdd"
	action="<?php echo url_for('employee/saveCpfPay?id='.$sf_params->get('id') )?>"
	method="post">
<table class="table bordered condensed">
	<tr>
		<td colspan="3" class="bg-lime FORMlabel FORMcell-left" nowrap><span
			class="fg-white">CPF INFORMATION</span></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue span1" width="50px"
			nowrap><label>Contribute CPF</label></td>
		<td class="FORMcell-right span1" nowrap><?php
		echo HTMLLib::CreateSelect('cpf',  $sf_params->get('cpf'), PayBasicPayPeer::HasCPF(),  'span1');
		?></td>
		<td class="text-warning">* <small>YES/NO</small></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>CPF Amount</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateInputText('cpf_amount', $sf_params->get('cpf_amount'), 'span1');
		?></td>
		<td class="text-warning">* <small>to set limit.  0 is advised, to declare all CPF</small></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>CPF
		Citizenship</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelect('cpf_citizenship',  $sf_params->get('cpf_citizenship'), PayBasicPayPeer::GetCpfCitizenship(),  'span2');
		?></td>
		<td class="text-warning">* <small>Based on the number of Years</small></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Nationality</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelectNationality($sf_params->get('nationality'), 'span2'); 
		?></td>
		<td class="text-warning">* <small>Country of Origin</small></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Race</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelect('race', $sf_params->get('race'), HrEmployeePeer::GetRaceList(), 'span2');
		?></td>
		<td class="text-warning">* <small>For the Donation</small></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap></td>
		<td class="FORMcell-right" nowrap><?php
		echo AjaxLib::AjaxScript('edit_cpf', 'employee/editCpfPay', 'id','', 'DIVcpfPay');
		echo HTMLLib::CreateSubmitButton('save_cpf', 'Save CPF Pay');
		?></td>
	</tr>
</table>
</form>