<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('payroll/payslipPreview?period_code=' . $record->getPeriodCode(), 'PAYSLIP', 'Manual Entry') ?>
<?php
if (isset($pager)):
    $filename = hrPager::EmployeePayslipEdit($pager);
	echo '<pre>';
	echo printf($filename);
	echo '</pre>';
endif;
?>
</div>