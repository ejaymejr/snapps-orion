<div class="contentBox">
	<a href="<?php echo url_for('contribution/cpfGovtRuleAdd') ?>" class="button success">Define New Rule</a>
	<a href="<?php echo url_for('contribution/cpfGovtRuleTest') ?>" class="button success">Run Test Page</a>
	<a href="<?php echo url_for('contribution/cpfGovtEmployeeTest') ?>" class="button success">Show Employee CPF</a>
	<br><br>
	<?php 
	if (isset($pager))
	{
	    $filename = hrPager::GovtCPF($pager);
		$cols = array('seq', 'action', 'cpf_year', 'description', 'company_type', 'age_minimum', 'age_maximum', 'net_pay_min', 'net_pay_max', 'cpf_batch');
		echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
	}
	?>
</div>