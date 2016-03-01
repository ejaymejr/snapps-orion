<div class="contentBox">                       
<?php 
	echo link_to('Create New Fiscal Year', 'maintenance/fiscalYearAdd', 'class="button success"');
?>
<?php 
if (isset($pager))
{
    $filename = hrPager::FiscalYearPager($pager);
	$cols = array('seq', 'action', 'fiscal_year', 'previous_year', 'start_date', 'end_date', 'current');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>

</div>