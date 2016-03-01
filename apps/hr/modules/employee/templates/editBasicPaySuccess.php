<?php use_helper('Validation', 'Javascript') ?>
<?php $iconTo = '<i class="icon-arrow-right on-right on-left"
					style="background: red;
					color: white;
					padding: 10px;
					border-radius: 50%"></i>' ;
	  $iconTo = " TO ";
?>
<form name="FORMadd" id="formAdd" 
	action="<?php echo url_for('employee/saveBasicPay?id='.$sf_params->get('id') )?>" method="post">
<table class="table bordered condensed">
	<tr>
		<td colspan="3" height="25px" class="bg-lime FORMlabel FORMcell-left" nowrap><span
			class="fg-white">BASIC PAY (EDIT MODE)</span></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel span1 bg-clearBlue" nowrap>Bank
		Acct #</small></td>
		<td class="alignLeft text-muted" width="10px" nowrap><?php
		echo input_tag('id', $sf_params->get('id'), 'type=hidden');
		echo $sf_params->get('acct_no');
		?></td>
		<td class="span3"><?php echo HTMLLib::CreateInputText('acct_no', $sf_params->get('acct_no'), 'span2'); ?></td>
	</tr>
	
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Commence Date</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('commence_date');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php echo HTMLLib::CreateDateInput('commence_date', $sf_params->get('commence_date'), 'span2' ); ?></td>
	</tr>
	
		<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Effectivity
		Date</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('effectivity_date');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php echo HTMLLib::CreateDateInput('effectivity_date', $sf_params->get('effectivity_date'), 'span2' ); ?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Pay</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('scheduled_amount') ;
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateInputText('scheduled_amount', $sf_params->get('scheduled_amount'),'span1'  );
			?></td>
		
	</tr>
		<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Payment Every</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('frequency');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateSelect('frequency', $sf_params->get('scheduled_amount'), PayBasicPayPeer::GetFrequencyList(),'span2');
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Hourly Rate</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('hourly_rate');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateInputText('hourly_rate', $sf_params->get('hourly_rate'),'span2'  );
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Allowance</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('allowance');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateInputText('allowance', $sf_params->get('allowance'),'span2'  );
			?></td>
		
	</tr>
		<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Levy</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('levy');
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateInputText('levy', $sf_params->get('levy'),'span2'  );
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Paid Type</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('paid_type') ;
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateSelect('paid_type', $sf_params->get('paid_type'), PayBasicPayPeer::GetPaidType(),'span2');
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Employment</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('type_of_employment') ;
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateSelect('type_of_employment', $sf_params->get('type_of_employment'), PayBasicPayPeer::TypeOfEmploymet(),'span2');
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Has MC Benefit</small></td>
		<td class="alignLeft text-muted" nowrap><?php
		echo $sf_params->get('has_mc_benefit') ;
		?></td>
		<!-- <td class="alignCenter "><?php echo $iconTo ?></td> -->
		<td class=""><?php 
			echo HTMLLib::CreateSelect('has_mc_benefit', $sf_params->get('has_mc_benefit'), PayBasicPayPeer::HasMcBenefit(),'span2');
			?></td>
		
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap>Remarks</small></td>
		<td class="alignLeft text-muted" colspan="4" nowrap><?php
		echo HTMLLib::CreateTextArea('remark', $sf_params->get('remark'));
		?></td>
	</tr>
	<tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap></td>
		<td colspan="2" class="alignLeft text-muted" nowrap><?php
		//echo AjaxLib::AjaxScript('edit_basic', 'employee/saveBasic', 'acct_no,commence_date,effectivity_date,scheduled_income,frequency,hourly_rate,allowance,levy,paid_type,type_of_employment,has_mc_benefit,remark','', 'DIVbasicPay');
		//echo AjaxLib::AjaxScript('edit_basic', 'employee/editBasicPay', 'employee_no','', 'DIVbasicPay');
		echo HTMLLib::CreateSubmitButton('save_basic', 'Save Basic Pay');
		?></td>
	</tr>
</table>
</form>