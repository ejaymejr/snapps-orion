<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('payroll/payslipPreview?period_code=' . $record->getPeriodCode(), 'PAYSLIP', 'Manual Entry') ?>
<nav class="breadcrumbs">
	<ul>
		<li class="active"><a href="<?php echo url_for('payroll/payslipEditableAdd?name='. $record->getName().'&archiveID='.$record->getId()) ?>" >Add New Entry</a></li>
		<?php if (HrLib::GetUser() == 'emmanuel'): ?>
			<li class=""><a href="<?php echo url_for('payroll/payslipEntryFormatted?employee_no='. $record->getEmployeeNo().'&period_code='.$record->getPeriodCode().'&format=json' ) ?>" >Show JSON</a></li>
			<li class=""><a href="<?php echo url_for('payroll/payslipEntryFormatted?employee_no='. $record->getEmployeeNo().'&period_code='.$record->getPeriodCode().'&format=xml' ) ?>" >Show XML</a></li>
		<?php endif;?>
	</ul>
</nav>
<?php
if (isset($pager)):
    $filename = hrPager::EmployeePayslipEdit($pager);
	$cols = array('seq','name', 'action', 'acct_code', 'description', 'income', 'deduction', 'bank_cash');
    //echo PagerJson::AkoDataTableForTicking($cols, $filename,'','', 20); //create the table
    echo PagerJson::ShowInFlatTable($cols, $filename, strtoupper(DateUtils::DUFormat('F Y', HrLib::PeriodStartDate($record->getPeriodCode()) )) .' PAYROLL PERIOD', array('income','deduction'));
	//echo PagerJson::Highlight($sf_params->get('HID'));
endif;
?>
</div>
<script>
	$('.td_action').addClass(' alignCenter');
	$('.td_bank_cash').addClass(' alignCenter');
	$('.td_income').addClass(' alignRight');
	$('.td_deduction').addClass(' alignRight');
</script>

