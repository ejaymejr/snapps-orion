<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/powerConsumptionSearch' ) ?>
	POWER CONSUMPTION <small>SEARCH</small></h2>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/pubPowerConsumptionAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed">
<tr class="bg-clearGreen">
	<td colspan="5"><h4>SP SERVICES POWER CONSUMPTION ENTRY SHEET</h4></td>
</tr>
<tr>
    <td class="text-right bg-clearBlue span2" nowrap><label>Date</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo input_tag('id', $sf_params->get('id'), 'type=hidden');
    echo HTMLLib::CreateDateInput('date', $sf_params->get('date'), 'span2');
    ?>&nbsp;&nbsp;&nbsp;&nbsp;<small>input the last day of the billing month (2016-01-31)</small>
    
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Usage</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('usage', $sf_params->get('usage'), 'span2');
	?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Rate</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('rate', $sf_params->get('rate'), 'span2');
	?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Amount</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('amount', $sf_params->get('amount'), 'span2');
	?>
	<small>&nbsp;&nbsp;the total here may differ because the bill is not accurate</small>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Total Amount Paid</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('total_amount_paid', $sf_params->get('total_amount_paid'), 'span2');
	?>
    </td>    
</tr>

<tr>
    <td class="text-right bg-clearBlue" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <?php echo HTMLLib::CreateSubmitButton('save', 'Save Data'); ?>
    </td>
</tr>
</table>
</form>
<script>
	$("#usage").change( function() {
 		amount = $("#usage").val()* $("#rate").val();
		$("#amount").val( amount.toLocaleString() );
	});
	$("#rate").change( function() {
		amount = $("#usage").val()* $("#rate").val();
		$("#amount").val( amount.toLocaleString());
	});
</script>


</div>
	