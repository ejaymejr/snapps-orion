<div class="contentBox">                       
<?php 
	echo link_to('Define New Holiday', 'maintenance/holidayAdd', 'class="button success"');
	echo '&nbsp;';
	echo link_to('ReCompute Available Credits', 'maintenance/leaveCreditProcessAll', 'class="button success"');
?>
<?php 
if (isset($pager))
{
    $filename = hrPager::HolidayPager($pager);
	$cols = array('seq', 'action', 'code', 'description', 'date');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>

</div>
