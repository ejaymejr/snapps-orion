<?php use_helper('Form', 'Javascript'); ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/displayTimeKeeper'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" width="10%">&nbsp;</td>
    <td class="FORMcell-right" nowrap width="60%"></td>
    <td class="alignCenter" nowrap rowspan='6'><?php echo link_to (image_tag('hr/cautionSign.jpg'),              'dtr/cautionInfo')  ?>
    <br><span class="tk-style6" ><blink>Please be informed that you <br>are being Logged.</blink></span>
    </td>
    <td class="FORMcell-right" nowrap width="10%" rowspan='6'></td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('employee_no'); 
        echo select_tag('employee_no', 
             options_for_select(HrEmployeePeer::GetNumonyxNameList(), 
             $sf_params->get('employee_no') ) );
        echo input_tag('empNo', '-employee no-', "id='empNo' readonly='true'");
           
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15"');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Per Day</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
    echo HTMLForm::DrawDateInput('pdate', $sf_params->get('pdate'), XIDX::next(), XIDX::next(), 'size="15"');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;Company</span>";
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );    
    
    ?>
    <span class="positive">&nbsp;&nbsp;Yesterday's Attendance</span>    
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Notice:</td>
    <td class="FORMcell-right" nowrap>
    <span class="negative">The System will NOT Re-Compute the Previous Month Data</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" onclick="showHideElement('setMonth');" style="cursor:pointer;">Set Current Month</td>
    <td class="FORMcell-right" nowrap>
    <div id="setMonth" style="display:none;">
    <?php
        $cyear = array('2008'=>'2008', '2009'=>'2009', '2010'=>'2010', '2011'=>'2011');
        $cmonth = sfconfig::get('monthlyCalendar');
        echo select_tag('cmonth', 
             options_for_select($cmonth, 
             $sf_params->get('cmonth') ) );
        echo select_tag('cyear', 
             options_for_select($cyear, 
             $sf_params->get('cyear') ) );    
        
    ?>
    &nbsp;&nbsp;&nbsp;
    <input type="submit" name="CMSave"  value=" Save Current Month " class="submit-button">
    </div>
    </td>
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="search"  value=" Show DTR " class="submit-button">
    <?php
    	//var_dump(sfContext::getInstance()->getUser()->getProfile());
    	$user = sfContext::getInstance()->getUser()->getProfile();
    	if ($user) :
    	   if (sfContext::getInstance()->getUser()->getUsername() == 'emmanuel' ||
    	       sfContext::getInstance()->getUser()->getUsername() == 'david'
    	   ) :
    ?>
    
    <input type="submit" name="masterlist"  value=" Show Numonyx Masterlist " class="submit-button">
    <input type="submit" name="attendance"  value=" Show Attendance Sheet " class="submit-button">
    <?php endif; endif;?>
    </td>
</tr>
</table>
</form>

<?php
echo javascript_tag("
	
	function onEmpNoChange(ev, args)
	{
		obj = YAHOO.util.Event.getTarget(ev);
		empno = obj.options[obj.selectedIndex].value;
		document.getElementById('empNo').value = empno;
		//alert ( empno );
	}
	YAHOO.util.Event.addListener('employee_no', 'change', onEmpNoChange);
");

?>


<?php
//<input type="submit" name="process" value=" Process DTR " class="submit-button">
//var_dump(isset($pager));

if (isset($pager))
{
    $gridVars = array(
        'searchTemplate' => '',
        'pagerTemplate' => 'proofdisplay_pager_list',
        'baseURL' => $sf_request->getModuleAction() . '?search=1&refDate='.$sf_params->get('pdate').'&comp='.$sf_params->get('company').'&id=' . ($sf_params->get('id')? $sf_params->get('id'): '0') ,
        'pager' => $pager,
        'searchContainerID' => XIDX::next(),
        'headers' => sfConfig::get('app_dtrprooflist_grid_headers')
    );
    

    include_partial('global/datagrid/container', $gridVars );

//	echo input_tag('wscan', $sf_params->get('wscan'));
//	echo input_tag('wleave', $sf_params->get('wleave'));
//	echo input_tag('absent', $sf_params->get('absent'));    
    $raw = ($sf_params->get('raw') ? $sf_params->get('raw') : array('group'=>array()));
    $group = array_unique($raw['group']);
    asort($group);

?>
<table border="0" width="100%">
<tr class="tk-bgimgmon" >
	<td colspan="14" height="25" class="alignCenter alignMiddle tk-bgimgmon tk-style16">DATA SUMMARY</td>
</tr > 
<?php $xclr = 'tk-dgra' ?> 
<tr class="tk-bgimgmon" >
	<td rowspan="2" height="25" class="alignCenter alignMiddle <?php echo $xclr ?>">COUNT</td>
	<td rowspan="2" height="25" class="alignCenter alignMiddle <?php echo $xclr ?>">DESCRIPTION</td>
    <td height="23" colspan="5" class="alignCenter alignMiddle tk-bgimgmon"><?php echo 'EMPLOYEE COUNT' ?></td>
    <td colspan="3" class="alignCenter alignMiddle tk-bgimgmon"><?php echo 'MAN-HOUR SUMMARY' ?></td>
    <td colspan="3" class="alignCenter alignMiddle tk-bgimgmon"><?php echo 'PAY SUMMARY' ?></td>
    <td width="10%" class="alignCenter alignTop tk-bgimgmon" nowrap >&nbsp;</td>
</tr >    
<tr class="tk-bgimgmon alignMiddle" >
    <td height="23" class="alignCenter alignMiddle alignTop <?php echo $xclr ?>" nowrap ><?php echo 'With SCAN'    ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Leave'  ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Off Day'  ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Present' ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Absent'?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Normal' ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Overtime' ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'TOTAL' ?></td>
    
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'Normal Pay' ?></td>
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'OT Pay' ?></td>
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'TOTAL' ?></td>
    
    <td class="alignCenter alignTop <?php echo $xclr ?>" nowrap >&nbsp;</td>
</tr>
<tr class="tk-bgimgmon alignMiddle" >
	<?php $xclr = 'tk-gree' ?>
    <td class="alignCenter alignTop  alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('counter')    ?></td>        
    <td class="alignCenter alignTop  alignMiddle <?php echo $xclr ?>" nowrap ><?php echo 'OVERALL DATA'    ?></td>
    <td height="23" class="alignCenter alignMiddle alignTop <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('wscan')    ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('wleave')  ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('cntOffDay') ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('wscan') + $sf_params->get('wleave') + $sf_params->get('cntOffDay') //$sf_params->get('cntAtt') ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('cntAbs')?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('cntDura') ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('cntOt') ?></td>    
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php echo $sf_params->get('cntDura') +  $sf_params->get('cntOt')?></td>
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php //echo number_format($sf_params->get('totNorm'), 2) ?></td>
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php //echo number_format($sf_params->get('totOver'), 2) ?></td>
	<td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap ><?php //echo number_format($sf_params->get('totNorm') + $sf_params->get('totOver'),2) ?></td>
    <td class="alignCenter alignTop alignMiddle <?php echo $xclr ?>" nowrap >&nbsp;</td>
</tr>
<?php
    $grp = 0;
    foreach($group as $ke=>$team)
    {
        $xclr = (($grp % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
        echo '
        	<tr class="tk-bgimgmon alignMiddle" >
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
        	<td height="23" class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $cnt.'</td>        
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. ($team ? $team : 'UNDEFINED') .'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $wscan.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $leave.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $dof.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $pres.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $abs.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $dura.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. $ot.'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >'. ($dura + $ot).'</td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap > - </td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap > - </td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap > - </td>
        	<td class="alignCenter alignTop  alignMiddle '.$xclr.'" nowrap >&nbsp;</td>
        ';
        
        echo '
        	</tr>
        ';
        $grp++;
    }        
?>
</table>


<?php
}  //close isset
 ?>