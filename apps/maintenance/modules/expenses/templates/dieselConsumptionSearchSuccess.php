<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/dieselConsumptionSearch' ) ?>
	BOILER DIESEL CONSUMPTION <small>SEARCH</small></h2>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="<?php echo url_for("") ?>"><i class="icon-home"></i></a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/dieselConsumptionAdd') ?>" class="" >Add Diesel Consumption</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/dieselConsumptionChart') ?>" class="" >Show Chart</a></li>
			<li><a href="#"><i class="icon-arrow-left fg-white"></i></a></li>
			</ul>
		</nav>
	</td>
</tr>
<tr>
	<td><pre>
	The Information of this Form is based on the <strong>DELIVERY OF DIESEL FUEL</strong> which is every two weeks.  
	At time of Creating this form there is no fixed date of delivery.  The delivery is based on the tolerance of the fuel 
	left in the boiler then Meizhen will request for a delivery. 
	</pre></td>
</tr>
</table>

<?php 
if (isset($pager))
{
    $filename = maintenancePager::SearchDieselConsumption($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'trans_date', 'consumption', 'cost_per_unit','unit', 'amount');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>
