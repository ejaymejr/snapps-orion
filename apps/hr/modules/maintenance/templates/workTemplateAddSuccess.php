<?php //sfConfig::set('app_page_heading', 'Leave Request Form'); ?>
<?php use_helper('Validation', 'Javascript') ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="100" class="at">
<?php 

    $wtmp = $cal->getWrkTemplate();
    if (count($wtmp['date']) > 100 ) {
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-01-01');     
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-02-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-03-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-04-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-05-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-06-01');
    }else{
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-01-01');    
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-02-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-03-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-04-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-05-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-06-01');    
    }
  ?>
</td>
<td width="100%" align="center" valign="top">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for($sf_request->getModuleAction()).  '?id=' . $sf_params->get('id'); ?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0"> 
<tr>
    <td align="center">
    <?php
        if ($cal) {
            $cdt = isset($_GET['cdt'])? $_GET['cdt']: '';
            $currdate = DateUtils::IsValidDate($cdt)? $cdt: $sf_params->get('currdate');
            $sf_params->set('currdate', $currdate);
            if (!is_array($vtmp)){
                echo $cal->HourCalendar($currdate);
            }else{
                echo $cal->FirstWeekTemp($vtmp);
            }
        }
    ?>
    </td>
    </tr>
    <tr>
    <tr>
        <td class="alignCenter" nowrap>
            <input type='submit' name='fweek' value=' Same as First Week for the Whole Year' class='submit-button'>
        </td>
    </tr>
</table>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <?php  echo input_tag('currdate',  $sf_params->get('currdate'), 'type="hidden" size="10"');  ?>
</tr>
<?php 
//if (!is_array($vtmp)){
//    echo "       
//    <tr>
//        <td width='30%' class='FORMcell-left FORMlabel' nowrap ></td>
//        <td class='FORMcell-right' nowrap>
//            <input type='submit' name='savemonth' value=' Save This Month ' class='submit-button'>
//        </td>
//    </tr>
//    ";    
//}else{
//    echo "       
//    <tr>
//        <td width='30%' class='FORMcell-left FORMlabel' nowrap ></td>
//        <td class='FORMcell-right' nowrap>
//            <input type='submit' name='fweek' value=' Same as First Week for the Whole Year' class='submit-button'>
//        </td>
//    </tr>
//    ";
//}
?>

<tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Note:</td>
    <td class="FORMcell-right" nowrap><span style=color:red>The data below is applicable per month of the given year.<br>
    <span class='dgra' >Shaded Color</span> in the calendar(<-LEFT and RIGHT-> display) indicates an Official Working Day. 
    </span></td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Worktemplate No</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('worktemp_no'); 
    echo input_tag('worktemp_no',  $sf_params->get('worktemp_no'), 'size="30"'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Description</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('description'); 
    echo input_tag('description',  $sf_params->get('description'), 'size="50"'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Total DayOff</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('dayoff'); 
    echo input_tag('dayoff',  $sf_params->get('dayoff'), 'size="10"'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>DayOff Day</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $doday = array ('Sunday'=>'Sunday', 'Monday'=>'Monday', 'Tuesday'=>'Tuesday', 
                    'Wednesday'=>'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 
                    'Saturday'=>'Saturday', 'Anytime'=>'Anytime');
    echo HTMLForm::Error('dayoff_day'); 
    echo select_tag('dayoff_day', options_for_select(array($doday), $dday ));
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Shift</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $ampm = array ('Morning Shift', 'Afternoon Shift', 'Evening Shift');
    echo HTMLForm::Error('am_pm_ev'); 
    echo select_tag('am_pm_ev', options_for_select(array($ampm), $am_pm ));
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Working Days / Month</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('days_per_month'); 
    echo input_tag('days_per_month',  $sf_params->get('days_per_month'), 'size="10"'); 
    ?>
    <span class="negative">* required to calculate rate</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Working Hours / Week</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('hrs_per_week'); 
    echo input_tag('hrs_per_week',  $sf_params->get('hrs_per_week'), 'size="10"'); 
    ?>
    <span class="negative">* used in survey</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Working Hours / Day</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('hrs_per_day'); 
    echo input_tag('hrs_per_day',  $sf_params->get('hrs_per_day'), 'size="10"'); 
    ?>
    <span class="negative">* required to calculate rate</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Endurance</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('endurance'); 
    echo input_tag('endurance',  $sf_params->get('endurance'), 'size="10"'); 
    ?>
    <span class="negative">* work duration addon for considering an overtime 30min / 1hr (in minutes).</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Break</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('break'); 
    echo input_tag('break',  $sf_params->get('break'), 'size="10"'); 
    ?>
    <span class="negative">* Must be in minutes form</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Overtime Multiplier</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo input_tag('ot1',  $sf_params->get('ot1'), 'size="10"');
    echo "  "; 
    echo input_tag('ot2',  $sf_params->get('ot2'), 'size="10"');
    echo "  ";
    echo input_tag('ot3',  $sf_params->get('ot3'), 'size="10"');
    ?>
    <span class="negative">* OT 1, OT 2, OT 3 multiplier</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-Center FORMlabel alignCenter" colspan="2" height="40" nowrap>- Allowance -</td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Allowance</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('acct_code'); 
    echo select_tag('acct_code', options_for_select(PayAccountCodePeer::GetAcctCodeList(), $sf_params->get('acct_code'))); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>OT Hours</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('min_ot'); 
    echo input_tag('min_ot',  $sf_params->get('min_ot'), 'size="10"'); 
    ?>
    <span class="negative">* Minumum Hours before allowance is given</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Time Onwards</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('min_time'); 
    echo input_tag('min_time',  $sf_params->get('min_time'), 'size="10"'); 
    ?>
    <span class="negative">* Should be at least this hour.</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Allowance Days</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $days = $sf_params->get('allowance_days');
    echo HTMLForm::Error('allowance_days'); 
    //echo input_tag('allowance_days',  $sf_params->get('allowance_days'), 'size="10"');
    echo checkbox_tag('mo','mo', (substr($days,0, 2)) == 'mo'  ) . '&nbsp;&nbsp; Monday <br>';
    echo checkbox_tag('tu','tu', (substr($days,3, 2)) == 'tu'  ). '&nbsp;&nbsp; Tuesday <br>';
    echo checkbox_tag('we','we', (substr($days,6, 2)) == 'we'  ). '&nbsp;&nbsp; Wednesday <br>';
    echo checkbox_tag('th','th', (substr($days,9, 2)) == 'th'  ). '&nbsp;&nbsp; Thursday <br>';
    echo checkbox_tag('fr','fr', (substr($days,12, 2)) == 'fr'  ). '&nbsp;&nbsp; Friday <br>';
    echo checkbox_tag('sa','sa', (substr($days,15, 2)) == 'sa'  ). '&nbsp;&nbsp; Saturday <br>';
    echo checkbox_tag('su','su', (substr($days,18, 2)) == 'su'  ). '&nbsp;&nbsp; Sunday <br>'; 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Allowance Amount</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('allowance_amt'); 
    echo input_tag('allowance_amt',  $sf_params->get('allowance_amt'), 'size="10"'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="savesame" value=" Save " class="submit-button">
    </td>
</tr>
</table>
</form>


</td>
<td width="100" class="at">
<?php
    if (count($wtmp['date']) > 100 ) {
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-07-01');     
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-08-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-09-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-10-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-11-01');
        echo $cal->WrkTmpCalendar(sfConfig::get('fiscal_year'). '-12-01');
     }else{
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-07-01');    
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-08-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-09-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-10-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-11-01');
        echo $cal->MonthlyCalendar(sfConfig::get('fiscal_year'). '-12-01');    
    }
?>          
</td>
</tr>
</table>




