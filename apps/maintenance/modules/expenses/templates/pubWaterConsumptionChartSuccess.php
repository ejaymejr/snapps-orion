
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/pubWaterConsumptionChart'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed">
<tr>
    <td class="bg-clearBlue  text-right" nowrap>MONTHLY</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateDateInput('sdate', $sf_params->get('sdate'), 'span2');
    //echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"' );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    //echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15" ' );
    echo HTMLLib::CreateDateInput('edate', $sf_params->get('edate'), 'span2');
    ?>
    </td>    
</tr>
<tr>
    <td class="bg-clearBlue  text-right" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="power" value=" Show PUB Water Consumption " class="success">
    </td>
</tr>
</table>
</form>

<br>
<?php 
if (isset($benchmark)):
	include_partial('pubwater_consumption_chart', array('chartData'=> $chardataJson ));
endif;
?>
</div>