<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('', 'LEVY', 'Contribution') ?>
<?php
if (isset($pager)):

    $filename = hrPager::LevyContribution($pager);
	$cols = array('seq', 'action','month', 'period_code', 'from', 'to');
    //$cols = array('seq');
    echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
endif;
?>
</div>

