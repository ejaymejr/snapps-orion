<?php use_helper('Validation', 'Javascript') ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('survey/annualWage') ?>" method="post">

<div class="contentBox">
	<table class="table bordered condensed">
	<tr>
	    <td colspan="2" class="alignLeft"><h2>SURVEY ON ANNUAL WAGE CHANGES 2014</h2></td>
	</tr>
	
	<tr>
	    <td class="bg-clearBlue alignRight span3" nowrap><label>FROM</label></td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLLib::CreateDateInput('labour_survey_sdate', $sf_params->get('labour_survey_sdate'), 'span2');
	    //echo HTMLForm::DrawDateInput('labour_survey_sdate', $sf_params->get('labour_survey_sdate'), XIDX::next(), XIDX::next(), 'size="15"');
	    ?>
	    </td>    
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap><label>TO</label></td>
	    <td class="FORMcell-right" nowrap>
	    <?php	
	    	echo HTMLLib::CreateDateInput('labour_survey_edate', $sf_params->get('labour_survey_edate'), 'span2');    
	    	//echo HTMLForm::DrawDateInput('labour_survey_edate', $sf_params->get('labour_survey_edate'), XIDX::next(), XIDX::next(), 'size="15"');
	    ?>
	    </td>    
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap><label>YEAR OF REFERENCE</label></td>
	    <td class="FORMcell-right" nowrap>
	    <?php	
	    	echo HTMLLib::CreateSelect('labour_survey_year', $sf_params->get('labour_survey_year'), $yearList,  'span2');    
	    	//echo HTMLForm::DrawDateInput('labour_survey_edate', $sf_params->get('labour_survey_edate'), XIDX::next(), XIDX::next(), 'size="15"');
	    ?>
	    </td>    
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap><label>HIGHLIGHT BASIC AMOUNT</label></td>
	    <td class="FORMcell-right" nowrap> 
	    <?php	
	    	echo HTMLLib::CreateInputText('basic_amount', $sf_params->get('basic_amount'),  'span2');    
	    	//echo HTMLForm::DrawDateInput('labour_survey_edate', $sf_params->get('labour_survey_edate'), XIDX::next(), XIDX::next(), 'size="15"');
	    ?><small>< Less than equal to ></small>
	    </td>    
	</tr>	
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap></td>
	    <td class="FORMcell-right" nowrap>
	       <input type="submit" name="printAnnualWageSurvey" value=" Print Annual Wage Survey " class="success">
	    </td>
	</tr>
	
	<tr>
	</tr>
	</table>
	<?php 
	if ($showSurvey):
		include_partial('annual_wage', array('surveyPaidStart'=> $surveyPaidStart, 'table'=> $table, 'table_foreign'=>$table_foreign) );
	endif;
	?>
</div>
</form>

<?php 
function computeQ4($table, $sdate, $edate, $year, $list)
{
	$firstPeriod = HrLib::CreatePeriodCode($year - 1 . DateUtils::DUFormat('-m-01', $sdate));
	$secondPeriod =HrLib::CreatePeriodCode($year . DateUtils::DUFormat('-m-t', $edate) );
	$wage = 0;
	$cnt = 0;
	$aveWage = 0;
	foreach($list as $name):
//		$currentWage = 0;
//		$prevWage = 0;
		$currentWage = isset($table[$name][$secondPeriod])? $table[$name][$secondPeriod] : 0;
		$prevWage = isset($table[$name][$firstPeriod])? $table[$name][$firstPeriod] : 0;
		if ($currentWage > 0 and $prevWage > 0):
			$wage += ($currentWage - $prevWage) / $prevWage * 100;
			$cnt ++;
		endif;
		//echo $name . ' ' . $wage .' : ' . $cnt . '<br>';
	endforeach;
	$aveWage = $wage / $cnt;
	return number_format($aveWage, 1);
}

function minimumMaximum($table, $sdate, $edate, $year, $list)
{
	$firstPeriod = HrLib::CreatePeriodCode($year - 1 . DateUtils::DUFormat('-m-01', $sdate));
	$secondPeriod =HrLib::CreatePeriodCode($year . DateUtils::DUFormat('-m-t', $edate) );
	$minimum = 9999999;
	$maximum = 0;
	foreach($list as $name):
		$value = $table[$name][$secondPeriod];
		if ($value > 0):
			if ($minimum > $value ):
				$minimum = $value;
				//echo $name . '<br>';
			endif;
		endif;
		if ($maximum < $value):
			$maximum = $value;
		endif;
		//echo $name .' amount '.$value. '<br>';
	endforeach;
	$maxmin = array('max'=> $maximum, 'min'=>$minimum);
	//var_dump($maxmin);
	$ratio = $maximum / $minimum;
	return number_format($ratio, 2);
}

?>