<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/powerConsumptionSearch' ) ?>
	POWER CONSUMPTION <small>SEARCH</small></h2>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="<?php echo url_for("") ?>"><i class="icon-home"></i></a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/powerConsumptionAdd') ?>" class="" >Add Power Reading</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/powerConsumptionChart') ?>" class="" >Show Chart</a></li>
			<!-- <li class=" "><a id="save" href="<?php echo url_for('expenses/powerConsumptionCompute') ?>" class="" >Compute Daily Reading</a></li>
			 <li class=" "><a id="save" href="<?php echo url_for('expenses/powerConsumptionChart') ?>" class="" >Power Usage Chart</a></li>  -->
			<li><a href="#"><i class="icon-arrow-left fg-white"></i></a></li>
			</ul>
		</nav>
	</td>
</tr>
</table>

<?php 
if (isset($pager))
{
    $filename = maintenancePager::SearchPowerConsumption($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'date', 'day_of_week', 'reading', 'ampm', 'consumption', 'unit', 'cov(15)', 'daily_cost');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>
