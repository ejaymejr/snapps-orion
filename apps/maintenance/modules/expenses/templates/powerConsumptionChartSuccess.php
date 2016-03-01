
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/powerConsumptionChart'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed">
<tr>
    <td class="bg-clearBlue  text-right" nowrap>Daily</td>
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
<!-- 
<tr>
    <td class="bg-clearBlue  text-right" nowrap>Week From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $week1 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo HTMLLib::CreateSelect('week1',  $sf_params->get('week1'), $week1, 'span2');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    $week2 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo HTMLLib::CreateSelect('week2',  $sf_params->get('week2'), $week2, 'span2');
    ?>
    </td>    
</tr>
<tr>
    <td class="bg-clearBlue  text-right" nowrap>Month From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $months1 = sfconfig::get('monthlyCalendar');
    echo HTMLLib::CreateSelect('months1',  $sf_params->get('months1'), $months1, 'span2');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";         
    $months2 = sfconfig::get('monthlyCalendar');
    echo HTMLLib::CreateSelect('months2',  $sf_params->get('months2'), $months2, 'span2'); 
    ?>
    </td>    
</tr>
 -->
<tr>
    <td class="bg-clearBlue  text-right" nowrap>Frequency</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $freq = array ( "monthly"=>" - Monthly - ", "daily"=>" - Daily - ", "weekly"=>" - Weekly - ");
    echo HTMLLib::CreateSelect('frequency',  $sf_params->get('frequency'), $freq, 'span2');
    ?>
    </td>    
</tr>
<tr>
    <td class="bg-clearBlue  text-right" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="power" value=" Show Power Consumption " class="success">
    </td>
</tr>
</table>
</form>

<br>
<?php 
if (isset($benchmark)):
	include_partial('power_consumption_chart', array('chartData'=> $chardataJson ));
endif;
?>
</div>