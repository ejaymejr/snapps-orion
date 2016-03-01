<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('', 'PAYSLIP', 'Manual Entry') ?>
<?php
    $filename = hrPager::NanoPayslip();
	$cols = array('seq', 'action','month', 'period_code', 'from', 'to');
    //$cols = array('seq');
    echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
?>
</div>

