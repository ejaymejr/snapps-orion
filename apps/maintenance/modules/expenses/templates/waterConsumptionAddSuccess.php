<div class="contentBox">
<h2><?php echo link_to('<i class="icon-arrow-left "  style="background: green; color: white; padding: 10px; border-radius: 50%"></i>', 'expenses/waterConsumptionSearch' ) ?>
	WATER CONSUMPTION <small>SEARCH</small></h2>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/waterConsumptionAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed">
<tr class="bg-clearGreen">
	<td colspan="5"><h4>WATER CONSUMPTION ENTRY SHEET</h4></td>
</tr>
<tr>
    <td class="text-right bg-clearBlue span2" nowrap><label>Date/Time</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    $ampm = array ( "AM"=>" AM ", "PM"=>" PM ");
    echo HTMLLib::CreateDateInput('date', $sf_params->get('date'), 'span2');
    echo HTMLLib::CreateSelect('ampm', $sf_params->get('ampm'), $ampm,  'span1');
    echo input_tag('time', $sf_params->get('time'),'size="15" type="hidden"');
    ?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Reading</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('reading', $sf_params->get('reading'), 'span2');
	?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Computation</label></td>
    <td class="FORMcell-right" nowrap>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Formula</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    //echo HTMLLib::CreateInputText('formula', $sf_params->get('formula'), 'span3', array('readonly'=>"readonly") ); 
	echo input_tag('formula', $sf_params->get('formula'), array('readonly'=>"readonly", 'size'=>"35", 'class'=>"readonly"));    
	//echo '$ '.$sf_params->get('unitprice'). ' /   '. $sf_params->get('unit');    
	echo input_tag('unit', $sf_params->get('unit'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    
	echo input_tag('unitprice', $sf_params->get('unitprice'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    
	echo input_tag('conversion_factor', $sf_params->get('conversion_factor'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));
	?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Prev-D Reading</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('pdReading', $sf_params->get('pdReading'), 'span2', '',  ' readonly="readonly"' );
    ?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap><label>Consumption</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('consumption', $sf_params->get('consumption'), 'span2' );
	//echo input_tag('consumption', $sf_params->get('consumption'),array('readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    ?>
    </td>    
</tr>
<tr>
    <td class="text-right bg-clearBlue" nowrap>Payable</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('totalcost', $sf_params->get('totalcost'), 'span2' );
	//echo input_tag('totalcost', $sf_params->get('totalcost'),array('readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly") );    ?>    
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
	$("#reading").change( function() {
		read = ($("#reading").val());
		cons = read - ($("#pdReading").val());
		$("#consumption").val(cons);
		$("#totalcost").val(cons * ($("#conversion_factor").val()) * ($("#unitprice").val()) );
	});
</script>

<?php //echo javascript_tag("

// function onReadingChanged(ev, args) {
//     obj = YAHOO.util.Event.getTarget(ev);
//     read = document.getElementById('reading').value;
//     cons = (read - document.getElementById('pdReading').value);
//     document.getElementById('consumption').value = cons;
//     document.getElementById('totalcost').value = cons * document.getElementById('conversion_factor').value * document.getElementById('unitprice').value;
// }

// YAHOO.util.Event.addListener('reading', 'change', onReadingChanged);

//") 

?>

</div>
	