<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('report/yearlyTax', 'IRAS', 'Preview') ?>
<?php if (isset($pager)): ?>
<div class="panel">
<div class="panel-header bg-lightBlue fg-white">
	EMPLOYEE LIST FOR <?php echo DateUtils::DUFormat('F Y', HrLib::PeriodStartDate($sf_params->get('period_code')) )  ?>
</div>
<div class="panel-content">
	<?php 
	    $filename = hrPager::IrasPreviewMonthly($pager);
		$cols = array('seq', 'action','nric_fin', 'name', 'company', 'gross_inc', 'gross_ded', 'net_pay', 'donation', 'others');
		echo PagerJson::AkoDataTableForTicking($cols, $filename,'','', 12); //create the table
	?>
</div>
<?php endif; //pager?>
</div>

</div>