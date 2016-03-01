<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/powerConsumptionSearch' ) ?>
	PUB POWER CONSUMPTION <small>SEARCH</small></h2>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="<?php echo url_for("") ?>"><i class="icon-home"></i></a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/pubPowerConsumptionAdd') ?>" class="" >Add Electricity Bill</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('expenses/pubPowerConsumptionChart') ?>" class="" >Show Chart</a></li>
			<li><a href="#"><i class="icon-arrow-left fg-white"></i></a></li>
			</ul>
		</nav>
	</td>
</tr>
<tr>
	<td><pre>
	The Information of this Form is based on the <strong>SP SERVICES ELECTRICITY BILL</strong> which is a Monthly Billing.  
	At time of Creating this form the bill usually cover 20th to 19th of the following month. 
	
	Sample Bill
	20 Sept 2015 to 19 Oct 2015
	<strong>Oct 15 Electricity Bill</strong> Dated 03 Nov 2015.
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
