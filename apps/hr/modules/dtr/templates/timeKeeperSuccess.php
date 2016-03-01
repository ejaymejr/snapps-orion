<?php use_helper('Form', 'Javascript'); ?>
</div>
<div class="contentBoxCondensed">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/timeKeeper'). '?id=' . $sf_params->get('id');?>" method="post">
<div class="contentBoxx">
<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', '') ?>
	TIMESHEET <small>Record</small></h1>
	
<div class="panel" >
<div class="panel-header bg-orange fg-white">
	EMPLOYEE'S TIMESHEET
</div>
<div class="panel-content">
	<table class="table bordered condensed">
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue"><label><small>EMPLOYEE NO</small></label></td>
	    <td class="" nowrap>
	    <?php
	        echo HTMLForm::Error('name'); 
	        //echo HTMLLib::CreateSelectSearch('name', $sf_params->get('name'), HrEmployeePeer::GetEmployeeNameList('', $sf_user->getUsername()), 'span5' );
	        echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameList('', $sf_user->getUsername()), 'span5' );
	    ?>
	    </td>
	    <td class="alignCenter" nowrap rowspan='7'>
	    <?php
	    	$myphoto = HrEmployeePeer::GetPhotoByEmployeeNo($sf_params->get('empNo'));
			echo link_to(image_tag('employee/' . $myphoto,'size="180x250"'),'#', 'id="uploadPhoto" ') ;
	    ?>
	    <br><span class="tk-style6" ><blink>Please be informed that you <br>are being Logged.</blink></span>
	    </td>
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label><small>FROM</small></label></td>
	    <td class="" nowrap>
	    <?php
	    echo HTMLLib::CreateDateInput('sdate', $sf_params->get('sdate'), 'span2');
	    echo "<span class=''>&nbsp;&nbsp;&nbsp;to</span>";
	    echo HTMLLib::CreateDateInput('edate', $sf_params->get('edate'), 'span2');
	    ?>
	    </td>    
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue" nowrap><small>PER DAY</small></td>
	    <td class="" nowrap>
	    <?php
	
	    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
	                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
		if ($sf_user->getUsername() == 'lyeheng' ):
			$company = array ("Acro Solution"=>"Acro Solution", 
	                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
		endif;	
	
	    echo HTMLLib::CreateDateInput('pdate', $sf_params->get('pdate'), 'span2');
	    echo "<span class=''>&nbsp;&nbsp;&nbsp;Company&nbsp;&nbsp;</span>";
	    echo '<div class="input-control select span2">';
	    echo HTMLLib::CreateSelect('company',  $sf_params->get('company'), $company, 'span2');
// 	    echo select_tag('company', 
// 	         options_for_select($company, 
// 	         $sf_params->get('company') ) );    
		echo '</div>';
	    ?>
	    </td>    
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue"><small>NOTICE</small></td>
	    <td class="" nowrap>
	    <span class="negative">The System will NOT Re-Compute the Previous Month Data</span>
	    </td>
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue" onclick="showHideElement('setMonth');" style="cursor:pointer;"><small>SET CURRENT MONTH</small></td>
	    <td class="" nowrap>
	    <div id="setMonth" style="display:none;">
	    <div class="input-control select span2">
	    <?php
			$cyear = HrFiscalYearPeer::GetFiscalYearListYK();
	        $cmonth = sfconfig::get('monthlyCalendar');
	        echo select_tag('cmonth', 
	             options_for_select($cmonth, 
	             $sf_params->get('cmonth') ) );
	    ?>
	    </div>
	    <div class="input-control select span2">
	    <?php
	    echo '&nbsp;';
	        echo select_tag('cyear', 
	             options_for_select($cyear, 
	             $sf_params->get('cyear') ) );    
	    ?>
	    </div>    
	    &nbsp;
		<input type="submit" name="CMSave"  value=" SAVE CURRENT MONTH " class="success">
	    </div>
	    </td>
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue" nowrap></td>
	    <td class="" nowrap>
	    <input type="submit" name="search"  value=" Show DTR " class="success">
	    <input type="submit" name="tsheet"  value=" Populate TimeSheet " class="success">
	    <input type="submit" name="compute" value=" Compute Per Day Date " class="success">
	    <input type="submit" name="descripancy" value=" Descripancy List " class="success">
	    <input type="submit" name="printAttendance" value=" Print Attendance " class="success">
	    
	    </td>
	</tr>
	<tr>
	    <td class="FORMcell-left FORMlabel bg-clearBlue" nowrap></td>
	    <td class="" nowrap>
	    	<?php if ($sf_user->getUsername() == 'emmanuel' ):?>
	    	<input type="submit" name="12hrstopup"  value=" 12 Hours Topup " class="success">
	    	<input type="submit" name="deleteEntries"  value=" Delete Entries " class="success">
	    	<input type="submit" name="computeAttendance"  value=" Compute Attendance " class="success">
	    	<input type="submit" name="populate_oneday"  value=" Populate Commence Date " class="success">
	    	<?php endif; ?>
	    </td>
	</tr>
	</table>
</div>
</div>
</form>
<br>
<?php
if (isset($pager))
{

    $filename = hrPager::DtrPager($pager);
    if (HrLib::GetUser() == 'emmanuel'):
		$cols = array('seq', 'action', 'name', 'time_in', 'time_out', 'hrs', 'meal', 'dura', 'req', 'ot', 'ut', 'mult', 'holiday', 'leave_type', 'd-off', 'amount', 'rate_hr', 'pt_inc', 'm_all', 'levy', 'att', 'record_id');
    else:
    	$cols = array('seq', 'action', 'name', 'time_in', 'time_out', 'hrs', 'meal', 'dura', 'req', 'ot', 'ut', 'mult', 'holiday', 'leave_type', 'att');    	
    endif;
    $colspace = array('1', '1', '4', '4', '4', '1', '1', '1', '1', '1', '1', '1', '2', '2', '1', '1', '1', '1', '1', '1', '1');
   	echo PagerJson::ShowInFlatTable($cols, $filename, 'EMPLOYEE TIMESHEET', array('meal', 'comp_dura', 'ot','att'));
    		
    $raw = ($sf_params->get('raw') ? $sf_params->get('raw') : array('group'=>array()));
    $group = array_unique($raw['group']);
    asort($group);
    
    $ot1 = 0;
    $ot2 = 0;
    $ot3 = 0;
    $rph = 0;
   foreach($filename as $r):
	    switch(strip_tags($r['mult']) )
	    {
	        case 1.5:
	            $ot1 = $ot1 + strip_tags($r['ot']);
	            break;
	        case 2.0:
	            $ot2 = $ot2 + strip_tags($r['ot']);
	            break;
	        case 2.5:
	            $ot3 = $ot3 + strip_tags($r['ot']);
	            break;
	    }
	    if (strip_tags($r['rate_hr']) > 0 && $rph == 0 ):
	    	$rph = strip_tags($r['rate_hr']);
	    endif;
   		// highlight undertime
   		if ( (strval(strip_tags($r['ut'])) < -5) && (strval(strip_tags($r['amount'])) < 0) ):
   			?>
   			<script>
   				$('#tr_<?php echo strip_tags($r['record_id']) ?>').addClass('bg-clearOrange ');
			</script>
			<?php 
   		endif;
   		
   			// highlight no scan in
   		if ( (strval(strip_tags($r['ut'])) >= -5) && (strval(strip_tags($r['amount'])) < 0) ):
   			?>
   			<script>
   				$('#tr_<?php echo strip_tags($r['record_id']) ?>').addClass('bg-clearRed ');
			</script>
			<?php 
   		endif;
   endforeach;

?>
<!-- change the vertical color -->
<script>
	//$('.td_normal').addClass('bg-clearBlue alignCenter');
	$('.td_ot').addClass('bg-clearOrange alignCenter');
	$('.td_action').addClass('alignCenter');
	$('.td_hrs').addClass('alignRight');
	$('.td_meal').addClass('alignRight');
</script>
<?php
    $xuser  = $sf_user->getUsername();
    if  ($xuser == 'terence' || $xuser == 'adeline' || $xuser == 'kathy' || 
    	 $xuser == 'melvin' || $xuser == 'nyoman' || $xuser == 'emmanuel' )
    	 :   
?>  
	<br>
	<table class="table condensed bordered">
	<tr class="bg-clearBlue" >
		<td colspan="4" >OVERTIME</td>
	</tr>
	<tr>
		<td>OT 1 = <?php echo $ot1; ?> X 1.5 X <?php echo $rph; ?> [ $<small><?php echo $ot1 * 1.5 * $rph; ?></small> ]</td>
		<td>OT 2 = <?php echo $ot2; ?> X 2.0 X <?php echo $rph; ?> [ $<small><?php echo $ot2 * 2.0 * $rph; ?></small> ]</td>
		<td>OT 3 = <?php echo $ot3; ?> X 2.5 X <?php echo $rph; ?> [ $<small><?php echo $ot3 * 2.5 * $rph; ?></small> ]</td>
		<td>Total OT = [ $<small><?php echo  ($ot1 * $rph * 1.5) + ($ot2 * $rph * 2.0) + ($ot3 * $rph * 2.5) ; ?></small> ]</td>
	</tr>
	</table>
<?php 
	else:
	?>
	<br>
	<table class="table condensed bordered">
	<tr class="bg-clearBlue" >
		<td colspan="4" >OVERTIME</td>
	</tr>
	<tr>
		<td>OT 1 = <?php echo $ot1; ?> </td>
		<td>OT 2 = <?php echo $ot2; ?> </td>
		<td>OT 3 = <?php echo $ot3; ?> </td>
		<td>Total OT = </td>
	</tr>
	</table>	
<?php 
	endif; //close xuser 
?>
<!-- 
<table class="table condensed bordered">
<tr class="" >
	<td class="bg-clearBlue" colspan="14" >DATA SUMMARY</td>
</tr > 
<tr >
	<td class="alignCenter bg-clearGreens ">COUNT</td>
	<td class="alignCenter bg-clearGreens ">DESCRIPTION</td>
    <td class="alignCenter bg-clearGreens "><?php echo 'EMPLOYEE COUNT' ?></td>
    <td colspan="3" class="alignCenter bg-clearGreens "><?php echo 'MAN-HOUR SUMMARY' ?></td>
    <td colspan="3" class="alignCenter bg-clearGreens "><?php echo 'PAY SUMMARY' ?></td>
    <td colspan="3" class="alignCenter  bg-clearGreens" nowrap >&nbsp;</td>
</tr >    
<tr class=" " >
    <td class="alignCenter bg-clearGreens  " nowrap ><?php echo 'With SCAN'    ?></td>    
    <td class="alignCenter bg-clearGreens  " nowrap ><?php echo 'Leave'  ?></td>
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Off Day'  ?></td>
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Present' ?></td>
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Absent'?></td>
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Normal' ?></td>    
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Overtime' ?></td>    
    <td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'TOTAL' ?></td>
    
	<td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'Normal Pay' ?></td>
	<td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'OT Pay' ?></td>
	<td class="alignCenter  bg-clearGreens " nowrap ><?php echo 'TOTAL' ?></td>
    
    <td class="alignCenter  bg-clearGreens" nowrap >&nbsp;</td>
</tr>
<tr class=" " >
    <td class="alignCenter    " nowrap ><?php echo $sf_params->get('counter')    ?></td>        
    <td class="alignCenter    " nowrap ><?php echo 'OVERALL DATA'    ?></td>
    <td height="23" class="alignCenter   " nowrap ><?php echo $sf_params->get('wscan')    ?></td>    
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('wleave')  ?></td>
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('cntOffDay') ?></td>
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('wscan') + $sf_params->get('wleave') + $sf_params->get('cntOffDay') //$sf_params->get('cntAtt') ?></td>
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('cntAbs')?></td>
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('cntDura') ?></td>    
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('cntOt') ?></td>    
    <td class="alignCenter   " nowrap ><?php echo $sf_params->get('cntDura') +  $sf_params->get('cntOt')?></td>
	<td class="alignCenter   " nowrap ><?php echo number_format($sf_params->get('totNorm'), 2) ?></td>
	<td class="alignCenter   " nowrap ><?php echo number_format($sf_params->get('totOver'), 2) ?></td>
	<td class="alignCenter   " nowrap ><?php echo number_format($sf_params->get('totNorm') + $sf_params->get('totOver'),2) ?></td>
    <td class="alignCenter   " nowrap >&nbsp;</td>
</tr>
<?php
    $grp = 0;
    $xuser  = $sf_user->getUsername();
    foreach($group as $ke=>$team)
    {
        $xclr = (($grp % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
        echo '
        	<tr class=" " >
        ';
        $pos = 0;
        $cnt = 0;
        $wscan = 0;
        $leave = 0;
        $pres  = 0;
        $abs   = 0;
        $dof   = 0;
        $dura  = 0;
        $ot    = 0;
        $npay  = 0;
        $otpay = 0;
        $desc  = '';
        foreach($raw['group'] as $ke=>$cteam)
        {
            if ($team == $cteam)
            {
                $desc =  $desc . $raw['wscan'][$pos] . '<br>'; 
                $cnt++;
                $wscan = $wscan + $raw['wscan'][$pos];
                $leave = $leave + $raw['wleave'][$pos];
                $dof   = $dof   + $raw['cntOffDay'][$pos];
                $pres  = $pres  + $raw['cntAtt'][$pos];
                $abs   = $abs   + $raw['cntAbs'][$pos];     
                $dura  = $dura  + $raw['cntDura'][$pos];
                $ot    = $ot    + $raw['cntOt'][$pos];
                $npay  = $npay  + $raw['totNorm'][$pos];
                $otpay = $otpay + $raw['totOver'][$pos];
            }
            $pos ++;
        }

        
        echo '
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $cnt.'</td>        
        	<td class="alignCenter    '.$xclr.'" nowrap >'. ($team ? $team : 'UNDEFINED') .'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $wscan.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $leave.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $dof.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $pres.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $abs.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $dura.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. $ot.'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. ($dura + $ot).'</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. number_format($npay,2). '</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. number_format($otpay,2). '</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >'. number_format($npay + $otpay, 2). '</td>
        	<td class="alignCenter    '.$xclr.'" nowrap >&nbsp;</td>
        ';
        
        echo '
        	</tr>
        ';
        $grp++;
    }        
?>
</table>
 -->
<?php
    	 
}  //close isset
 ?>
 </div>
