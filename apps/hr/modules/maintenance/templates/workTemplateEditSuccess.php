<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for($sf_request->getModuleAction()).  '?id=' . $sf_params->get('id'); ?>" method="post">
	<table class="table bordered condensed">
	<tr>
		<td >
		<td class="bg-clearBlue alignRight" nowrap>Calendar Schedule</td>
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
	
	<tr>
		<td class="bg-clearBlue alignRight" nowrap>Month</td>
		<td class="FORMcell-right" nowrap>
	    <?php  //echo input_tag('currdate',  $sf_params->get('currdate'), 'type="hidden" size="10"');  ?>
	</tr>
	<?php 
	if (!is_array($vtmp)){
	    echo "       
	    <tr>
	        <td class='FORMcell-right' nowrap>
	            <input type='submit' name='savemonth' value=' Save This Month ' class='success'>
	            <input type='submit' name='UpdateWorkSchedule' value=' UpdateWorkSchedule Using Pattern ' class='success'>
	        </td>
	    </tr>
	    ";    
	}else{
	    echo "       
	    <tr>
	        <td class='FORMcell-right' nowrap>
	            <input type='submit' name='fweek' value=' Same as First Week ' class='success'>
	        </td>
	    </tr>
	    ";
	}
	?>
	</table>
	<table class="table bordered condensed">
	<tr>
	    <td >&nbsp;</td>
	    <td >&nbsp;</td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Note:</td>
	    <td class="FORMcell-right" nowrap><span style=color:red>The data below is applicable per month of the given year.<br>
	    <span class='dgra' >Shaded Color</span> in the calendar(<-LEFT and RIGHT-> display) indicates an Official Working Day. 
	    </span></td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Worktemplate No</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('worktemp_no'); 
	    echo HTMLLib::CreateInputText('worktemp_no',  $sf_params->get('worktemp_no'), 'span2');
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Description</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('description'); 
	    echo HTMLLib::CreateInputText('description',  $sf_params->get('description'), 'span4');
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Total DayOff</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('dayoff'); 
	    echo HTMLLib::CreateInputText('dayoff',  $sf_params->get('dayoff'), 'span2');
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>DayOff Day</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    $doday = array ('Sunday'=>'Sunday', 'Monday'=>'Monday', 'Tuesday'=>'Tuesday', 
	                    'Wednesday'=>'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 
	                    'Saturday'=>'Saturday', 'Anytime'=>'Anytime');
	    echo HTMLForm::Error('dayoff_day'); 
	    //echo select_tag('dayoff_day', options_for_select(array($doday), $dday ));
	    echo HTMLLib::CreateSelect('dayoff_day',  $sf_params->get('dayoff_day'), $doday, 'span2' );
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Shift</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    $ampm = array ('Morning Shift', 'Afternoon Shift', 'Evening Shift');
	    echo HTMLForm::Error('am_pm_ev'); 
	    //echo select_tag('am_pm_ev', options_for_select(array($ampm), $am_pm ));
	    echo HTMLLib::CreateSelect('am_pm_ev',  $sf_params->get('am_pm_ev'), $ampm, 'span2' );
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Working Days / Month</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('days_per_month'); 
	    //echo input_tag('days_per_month',  $sf_params->get('days_per_month'), 'size="10"'); 
	    echo HTMLLib::CreateInputText('days_per_month',  $sf_params->get('days_per_month'), 'span2');
	    ?>
	    <span class="negative">* required to calculate rate</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Working Hours / Week</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('hrs_per_week'); 
	    //echo input_tag('hrs_per_week',  $sf_params->get('hrs_per_week'), 'size="10"'); 
	    echo HTMLLib::CreateInputText('hrs_per_week',  $sf_params->get('hrs_per_week'), 'span2');
	    ?>
	    <span class="negative">* used in survey</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Working Hours / Day</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('hrs_per_day'); 
	    //echo input_tag('hrs_per_day',  $sf_params->get('hrs_per_day'), 'size="10"'); 
	    echo HTMLLib::CreateInputText('hrs_per_day',  $sf_params->get('hrs_per_day'), 'span2');
	    ?>
	    <span class="negative">* required to calculate rate</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Endurance</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('endurance'); 
	    //echo input_tag('endurance',  $sf_params->get('endurance'), 'size="10"');
	    echo HTMLLib::CreateInputText('endurance',  $sf_params->get('endurance'), 'span2'); 
	    ?>
	    <span class="negative">* work duration addon for considering an overtime 30min / 1hr (in minutes).</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Break</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('break'); 
	    //echo input_tag('break',  $sf_params->get('break'), 'size="10"'); 
	    echo HTMLLib::CreateInputText('break',  $sf_params->get('break'), 'span2'); 
	    ?>
	    <span class="negative">* Must be in minutes form</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Overtime Multiplier</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLLib::CreateInputText('ot1',  $sf_params->get('ot1'), 'span1');
	    echo "  "; 
	    echo HTMLLib::CreateInputText('ot2',  $sf_params->get('ot2'), 'span1');
	    echo "  ";
	    echo HTMLLib::CreateInputText('ot3',  $sf_params->get('ot3'), 'span1');
	    ?>
	    <span class="negative">* OT 1, OT 2, OT 3 multiplier</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Allowance</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('acct_code'); 
	    echo HTMLLib::CreateSelect('acct_code',  $sf_params->get('acct_code'), PayAccountCodePeer::GetAcctCodeList(), 'span4' );
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>OT Hours</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('min_ot'); 
	    echo HTMLLib::CreateInputText('min_ot',  $sf_params->get('min_ot'), 'span1');
	    ?>
	    <span class="negative">* Minumum Hours before allowance is given</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Time Onwards</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('min_time'); 
	    echo HTMLLib::CreateInputText('min_time',  $sf_params->get('min_time'), 'span1');
	    ?>
	    <span class="negative">* Time is between this hour</span>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Allowance Days</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    $days = $sf_params->get('allowance_days');
	    echo HTMLForm::Error('allowance_days'); 
	    //echo input_tag('allowance_days',  $sf_params->get('allowance_days'), 'size="10"');
	    echo HTMLLib::CreateCheckBox('mo', 'Monday', (substr($days, 0, 2) == 'mo'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('tu', 'Tuesday', (substr($days, 3, 2) == 'tu'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('we', 'Wednesday', (substr($days, 6, 2) == 'we'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('th', 'Thursday', (substr($days, 9, 2) == 'th'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('fr', 'Friday', (substr($days, 12, 2) == 'fr'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('sa', 'Saturday', (substr($days, 15, 2) == 'sa'? 'checked' : ''  ) );
	    echo '<br>';
	    echo HTMLLib::CreateCheckBox('su', 'Sunday', (substr($days, 18, 2) == 'su'? 'checked' : ''  ) );
	    
//	    echo checkbox_tag('mo','mo', (substr($days,0, 2)) == 'mo'  ) . '&nbsp;&nbsp; Monday <br>';
//	    echo checkbox_tag('tu','tu', (substr($days,3, 2)) == 'tu'  ). '&nbsp;&nbsp; Tuesday <br>';
//	    echo checkbox_tag('we','we', (substr($days,6, 2)) == 'we'  ). '&nbsp;&nbsp; Wednesday <br>';
//	    echo checkbox_tag('th','th', (substr($days,9, 2)) == 'th'  ). '&nbsp;&nbsp; Thursday <br>';
//	    echo checkbox_tag('fr','fr', (substr($days,12, 2)) == 'fr'  ). '&nbsp;&nbsp; Friday <br>';
//	    echo checkbox_tag('sa','sa', (substr($days,15, 2)) == 'sa'  ). '&nbsp;&nbsp; Saturday <br>';
//	    echo checkbox_tag('su','su', (substr($days,18, 2)) == 'su'  ). '&nbsp;&nbsp; Sunday <br>'; 
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap>Allowance Amount</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    echo HTMLForm::Error('allowance_amt'); 
	    echo HTMLLib::CreateInputText('allowance_amt',  $sf_params->get('allowance_amt'), 'span1');
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="bg-clearBlue alignRight" nowrap></td>
	    <td class="FORMcell-right" nowrap>
	        <input type="submit" name="savesame" value=" Save " class="success">
	    </td>
	</tr>
	</table>
	</form>
</div>


