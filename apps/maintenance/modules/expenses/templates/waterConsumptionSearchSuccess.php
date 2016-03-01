<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/waterConsumptionSearch' ) ?>
	WATER CONSUMPTION <small>SEARCH</small></h2>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="<?php echo url_for("") ?>"><i class="icon-home"></i></a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/waterConsumptionAdd') ?>" class="" >Add Water Reading</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/waterConsumptionChart') ?>" class="" >Show Chart</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/waterConsumptionCompute') ?>" class="" >Compute</a></li>
			<!-- <li class=" "><a id="save" href="<?php echo url_for('expenses/waterConsumptionMonthly') ?>" class="" >Show Monthly Reading</a></li> -->
			<!-- <li class=" "><a id="save" href="<?php echo url_for('expenses/waterConsumptionChart') ?>" class="" >Power Usage Chart</a></li>  -->
			<li><a href="#"><i class="icon-arrow-left fg-white"></i></a></li>
			</ul>
		</nav>
	</td>
</tr>
</table>

<?php 
if (isset($pager))
{
    $filename = maintenancePager::SearchWaterConsumption($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'date', 'day_of_week', 'reading','ampm', 'consumption', 'unit', 'cov(15)', 'daily_cost');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>
