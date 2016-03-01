<?php use_helper('Validation', 'Javascript') ?>
<?php $iconTo = '<i class="icon-arrow-right on-right on-left"
					style="background: red;
					color: white;
					padding: 10px;
					border-radius: 50%"></i>' 
?>
<form name="FORMadd" id="formAdd"
	action="<?php echo url_for('employee/saveExtraIncome?id='.$sf_params->get('id') )?>"
	method="post">
<table width="100%" class="table bordered">
	<tr>
		<td colspan="5" class="bg-lime FORMlabel FORMcell-left" nowrap><span
			class="fg-white">EXTRA INCOME</span></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Account</td>
		<td class="alignLeft" nowrap>
		<?php
		$acctCode = PayAccountCodePeer::GetAcctCodeList();
		echo HTMLLib::CreateSelectSearch('extra_acct_code', $sf_params->get('extra_acct_code'), $acctCode, 'span2' );
		
		//$acctCode = PayAccountCodePeer::GetAcctCodeList();
		//echo HTMLLib::CreateSelectSearch('extra_acct_code', $sf_params->get('extra_acct_code'), $acctCode,'span3' );
		?> <span class="negative"></span></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Scheduled Amount</td>
		<td class="alignLeft" nowrap><?php
		echo HTMLLib::CreateInputText('extra_scheduled_amount', $sf_params->get('extra_scheduled_amount'), 'span1');
		?> <small class="text-warning">To be paid Monthly</small>
		&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Effectivity Date</td>
		<td class="alignLeft" nowrap><?php
		echo HTMLLib::CreateDateInput('extra_sdate', $sf_params->get('extra_sdate'), 'span2');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Frequency</td>
		<td class="alignLeft" nowrap><?php
		echo HTMLLib::CreateSelect('extra_frequency', $sf_params->get('extra_frequency'), PayScheduledIncome::GetFrequencyList(), 'span2' );
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Status</td>
		<td class="alignLeft" nowrap><?php
		echo HTMLLib::CreateSelect('extra_is_active', $sf_params->get('extra_is_active'), array('A'=>'Active', 'I'=>'Inactive'), 'span2');
		?> <span class="negative">*</span></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Remarks</td>
		<td class="alignLeft" nowrap><?php
		echo HTMLLib::CreateTextArea('extra_remark', $sf_params->get('extra_remark'));
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue FORMlabel FORMcell-left" nowrap></td>
		<td><?php 
		echo HTMLLib::CreateSubmitButton('save_extra_income', 'Save Extra Income' );
		?></td>
	</tr>
</table>
</form>