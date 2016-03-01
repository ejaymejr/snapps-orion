<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('payroll/payslipManualEntry', 'PAYSLIP', 'Preview') ?>
<?php

if (isset($pager)):
    $filename = hrPager::EmployeeJournal($pager);
	$cols = array('seq', 'action', 'name', 'company', 'employment', 'type', 'bank_check', 'cash', 'cpf_em', 'deduction','pay');
    echo PagerJson::AkoDataTableForTicking($cols, $filename,'','', 20); //create the table
endif;
?>
<script>
	$('.td_amount').addClass(' alignRight');
</script>
</div>


