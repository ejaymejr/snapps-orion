<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', '') ?>
	INCOME VS SALES <small>Daily</small></h1>

<div class="contentBoxCondensed">
<!-- <div class="contentBox"> -->
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('production/dailyForecast')?>" method="post">
<div class="panel" data-role="panel">
<div class="panel-header bg-lightBlue">
<span class="fg-white">DAILY INCOME EXPENSE</span>
</div>
<div class="panel-content">
<table class="table bordered condensed" >
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label>Daily</label></td>
    <td class="alignLeft" nowrap>
    <?php
    echo HTMLLib::CreateDateInput('start_date', $sf_params->get('start_date'), 'span2');
    ?>
    </td>
    <td class="bg-clearBlue alignRight" nowrap><label>TO</label></td>
    <td><?php echo HTMLLib::CreateDateInput('end_date', $sf_params->get('end_date'), 'span2'); ?></td>    
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label>Company</td>
    <td class="alignLeft" nowrap>
    <?php
    $company = array ("1"=>"Micronclean", "2"=>"Acro Solution", 
                      "5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
    echo HTMLLib::CreateSelect('company', $sf_params->get('company'), $company, "span2");
    ?>
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><label>Frequency</label></td>
    <td><?php
    $freq = array ( "daily"=>" - Daily - ");
    echo HTMLLib::CreateSelect('frequency', $sf_params->get('frequency'), $freq, "span2");
    ?></td> 
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label>Sales Source</label></td>
    <td class="alignLeft" nowrap>
    <?php
    $sales_source = array('PAID HOURS'=>'PAID HOURS', 'ACTUAL IN-OUT RECORD'=>'ACTUAL IN-OUT RECORD');
    echo HTMLLib::CreateSelect('sales_source', $sf_params->get('sales_source'), $sales_source, "span2");
    ?>
    </td>    
    <td class="bg-clearBlue alignRight" nowrap><label></label></td>
    <td><input type="submit" name="benchmark" value=" Show Cost and Sales Daily " class="success"></td>
</tr>
</table>
</div>
</div>
</form>
</div>
</div>

<?php

	if (isset($benchmark)):
		$sdate = $sf_params->get('sdate');
		$edate = $sf_params->get('edate');
		$co   = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
		$egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$seq=1;
		$gbasi  = 0;
		$gpart  = 0;
		$got    = 0;
		$gallo  = 0;
		$gmeal  = 0;
		$gunde  = 0;
		$gabse  = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota  = 0;
		$proof  = '';
		$gptot  = 0;
		$sproof = '';
		$twdith = '600';
		$dgroup = array();	
		
	endif;
?>