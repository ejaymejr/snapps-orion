<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/powerConsumption'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Date/Time</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('date', $sf_params->get('date'), XIDX::next(), XIDX::next(), 'size="15"' );
    echo '&nbsp;&nbsp;';
    //echo input_tag('time', $sf_params->get('time'),'size="15"');
    $ampm = array ( "am"=>" - AM - ", "pm"=>" - PM - ");
    echo select_tag('ampm', 
         options_for_select($ampm, 
         $sf_params->get('ampm') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Reading</td>
    <td class="FORMcell-right" nowrap>
    <?php
	echo input_tag('reading', $sf_params->get('reading'), array('size'=>15) );
	
	?>
	&nbsp;&nbsp;
	<input type="submit" name="compute" value=" compute " class="submit-button">	
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Computation</td>
    <td class="FORMcell-right" nowrap>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Formula</td>
    <td class="FORMcell-right" nowrap>
    <?php
	echo input_tag('formula', $sf_params->get('formula'), array('readonly'=>"readonly", 'size'=>"35", 'class'=>"readonly"));    
	//echo '$ '.$sf_params->get('unitprice'). ' /   '. $sf_params->get('unit');    
	echo input_tag('unit', $sf_params->get('unit'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    
	echo input_tag('unitprice', $sf_params->get('unitprice'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    
	echo input_tag('conversion_factor', $sf_params->get('conversion_factor'), array('type'=>'hidden', 'readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));
	?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Consumption</td>
    <td class="FORMcell-right" nowrap>
    <?php
	echo input_tag('consumption', $sf_params->get('consumption'),array('readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Payable</td>
    <td class="FORMcell-right" nowrap>
    <?php
	echo input_tag('totalcost', $sf_params->get('totalcost'),array('readonly'=>"readonly", 'size'=>"15", 'class'=>"readonly"));    ?>    
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="save" value=" Save Data " class="submit-button">
    </td>
</tr>
</table>
</form>

<?php echo javascript_tag("


function onReadingChanged(ev, args) {
    alert('here');
    obj = YAHOO.util.Event.getTarget(ev);
    alert(obj.options[obj.selectedIndex].value );

}

YAHOO.util.Event.addListener('readings', 'change', onReadingChanged);

") 

?>


	