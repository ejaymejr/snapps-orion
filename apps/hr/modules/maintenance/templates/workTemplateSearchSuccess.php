<div class="contentBox">                       
<?php 
	echo link_to('Define New Work-Template', 'maintenance/workTemplateAdd', 'class="button success"');
	echo '&nbsp;';
	echo link_to('New Fiscal-Year WorkTemplate Update', 'maintenance/workTemplateUpdate', 'class="button success"');
?>
<?php 
if (isset($pager))
{
    $filename = hrPager::WorktemplatePager($pager);
	$cols = array('seq', 'action', 'wortktemp_no', 'description', 'pattern');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>

</div>
