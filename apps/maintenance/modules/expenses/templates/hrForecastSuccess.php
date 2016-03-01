<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('expenses/hrForecast'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Daily</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"' );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15" ' );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Week From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $week1 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo select_tag('week1', 
         options_for_select($week1, 
         $sf_params->get('week1') ) );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    $week2 = DateUtils::GetWeeksOfYear(HrFiscalYearPeer::getFiscalYear());
    echo select_tag('week2', 
         options_for_select($week2, 
         $sf_params->get('week2')) );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Month From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $months1 = sfconfig::get('monthlyCalendar');
    echo select_tag('months1', 
         options_for_select($months1, 
         $sf_params->get('months1') ) );    
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";         
    $months2 = sfconfig::get('monthlyCalendar');
    echo select_tag('months2', 
         options_for_select($months2, 
         $sf_params->get('months2') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );
//    echo HTMLForm::DrawDateInput('pdate', $sf_params->get('pdate'), XIDX::next(), XIDX::next(), 'size="15"');
//    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;Company</span>";
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );

    echo select_tag('eGroup', 
         options_for_select(HrEmployeePeer::OptionEmploymentGroup(), 
         $sf_params->get('eGroup') ) );    
         
    
    ?>
    </td>    
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Frequency</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $freq = array ( "monthly"=>" - Monthly - ", "daily"=>" - Daily - ", "weekly"=>" - Weekly - ");
    echo select_tag('frequency', 
         options_for_select($freq, 
         $sf_params->get('frequency') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Compute Forecast " class="submit-button">
    </td>
</tr>
</table>
</form>

<?php echo javascript_tag("


function onWeekChanged(ev, args) {
    
    obj = YAHOO.util.Event.getTarget(ev);
    alert(obj.options[obj.selectedIndex].value);
}

YAHOO.util.Event.addListener('week2', 'change', onWeekChanged);
YAHOO.util.Event.addListener('week1', 'change', onWeekChanged);

") 

?>

<?php

	if (isset($benchmark))
	{ 
		$colors = sfConfig::get('app_amcharts_colors');
		$col = array('666633', '999966', 'CC6666', '663333', 'A97D5D', '5C755E', '336699', 'CC6600', '000063', '5A79A5', '9ACCA6', '0191C8', '005B9A');
        $sdate = $sf_params->get('sdate');
        $edate = $sf_params->get('edate');
        $sdt1 = $sf_params->get('months1');
        $edt1 = DateUtils::GetLastDate($sdt1);
        $sdt2 = $sf_params->get('months2');
        $edt2 = DateUtils::GetLastDate($sdt2);
        $empNo = $sf_params->get('employee_no');
   		$month1    = DateUtils::DUFormat('M', $sdt1);
		$month2    = DateUtils::DUFormat('M', $sdt2);
        $co   = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
        $egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$seq=1;        
		$gbasi = 0;
		$gpart = 0;
		$got   = 0;
		$gallo = 0;
		$gmeal = 0;
		$gunde = 0;
		$gabse = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota = 0;
		$proof = '';
		
        if ($sf_params->get('frequency') == 'daily')
        {
        	$proof =  '
			<table width="100%" class="FORMtable" border="1" cellpadding="4" cellspacing="0">
			  <tr>
			    <td colspan="13" class="tk-style25 alignCenter FORMcell-right" nowrap>EMPLOYEE LISTS</td>
			  </tr>
			  <tr>
			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
			    <td width="100" class="alignCenter FORMcell-Center" nowrap>Name</td>
			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Company</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Basic</td>    
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>PartTime</td>    
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Overtime</td>    
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Allowance</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Meal</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Tardy</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Absent</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF EM</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>CPF ER</td>    
			    <td width="50" class="alignCenter " nowrap>Total</td>    
			  </tr>
			  ';        	
        	$empList = HrEmployeeDailyPeer::GetEmployeeListbyDateRange($sdate, $edate, $co, $egrp);
        	
        	foreach($empList as $ke=>$empNo)
        	{
        		$empData = HrEmployeeDailyPeer::GetEmployeeDatabyDateRange($empNo, $sdate, $edate);
        		$proof = $proof . '        	
				  <tr>
				    <td width="20" class="alignCenter FORMcell-Center" nowrap>'.$seq++.'</td>
				    <td width="80" class="alignCenter FORMcell-Center" nowrap>'.$empData['name'].'</td>
				    <td width="50" class="alignCenter FORMcell-Center" nowrap>'.$empData['comp'].'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['basi'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['part'],2).'</td>
					<td width="50" class="alignRight" nowrap>'.number_format($empData['ot'],2).'</td>				    
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['allo'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['meal'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['unde'],2).'</td>    
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['abse'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['cpfem'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['cpfer'],2).'</td>
				    <td width="50" class="alignRight" nowrap>'.number_format($empData['tota'],2).'</td>
				  </tr>
	        	';
				$gbasi = $gbasi + $empData['basi'];
				$gpart = $gpart + $empData['part'];
				$got   = $got   + $empData['ot'];
				$gallo = $gallo + $empData['allo'];
				$gmeal = $gmeal + $empData['meal'];
				$gunde = $gunde + $empData['unde'];
				$gabse = $gabse + $empData['abse'];
				$gcpfr  = $gcpfr  + $empData['cpfer'];
				$gcpfm  = $gcpfm  + $empData['cpfem'];
				$gtota = $gtota + $empData['tota'];
        	}
        	$proof = $proof . '
        	  <tr>
			    <td width="20" class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    <td width="80" class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    <td width="50" class="tk-style28 alignCenter FORMcell-Center" nowrap></td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gbasi,2).'</td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gpart,2).'</td>
				<td width="50" class="tk-style28 alignRight" nowrap>'. number_format($got,2).'</td>				    
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gallo,2).'</td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gmeal,2).'</td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gunde,2).'</td>    
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gabse ,2).'</td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gcpfm,2).'</td>
			    <td width="50" class="tk-style28 alignRight tk-lgra" nowrap>'. number_format($gcpfr,2).'</td>
			    <td width="50" class="tk-style28 alignRight" nowrap>'. number_format($gtota,2).'</td>
			  </tr>
			</table>
			';
        }
        $data = array(
        'basic'=> ($gbasi + $gunde + $gabse + $gcpfm),
        'cpf-employee'=>($gcpfm * -1), 
        'parttime'=>$gpart,
        'overtime'=>$got,
        'allowance'=>$gallo,
        'meal'=>$gmeal,
        'cpf-employer'=>$gcpfr
        );
        include_partial('pie_chart', array('title'=>'PAYROLL FORECAST '. strtoupper 
        (DateUtils::DUFormat('F Y', $sdate)).'\n'. $sf_params->get('company') .' ( $'.number_format($gtota,2) .' )',
        'data'=>$data, 'pullout'=>7) );
        echo $proof;
	}
?>
	