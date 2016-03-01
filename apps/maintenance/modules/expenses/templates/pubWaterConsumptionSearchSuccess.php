<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/powerConsumptionSearch' ) ?>
	PUB WATER CONSUMPTION <small>SEARCH</small></h2>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="<?php echo url_for("") ?>"><i class="icon-home"></i></a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/pubWaterConsumptionAdd') ?>" class="" >Add Water Bill</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/pubWaterConsumptionChart') ?>" class="" >Show Chart</a></li>
			<li><a href="#"><i class="icon-arrow-left fg-white"></i></a></li>
			</ul>
		</nav>
	</td>
</tr>
<tr>
	<td><pre>
	The Information of this Form is based on the <strong>SP SERVICES WATER BILL</strong> which is a Monthly Billing.  
	At time of Creating this form the bill is usually on the 28 of the month. 
	
	Sample Bill
	28 Sept 2015 to 28 Oct 2015
	<strong>Oct 2015 Water Bill</strong> Dated 28 Oct 2015.
	</pre></td>
</tr>
</table>

<?php 
if (isset($pager))
{
    $filename = maintenancePager::SearchPubPowerConsumption($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'trans_date', 'consumption', 'rate', 'amount', 'total_amount_paid');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>
