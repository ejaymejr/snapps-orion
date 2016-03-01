<?php use_helper('Form', 'Javascript'); ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/adjustTime');?>" method="post">
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
    <td class="FORMcell-left FORMlabel" nowrap>Change TimeIn</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('cdate', $sf_params->get('cdate'), XIDX::next(), XIDX::next(), 'size="15"');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo input_tag('timeIn', $sf_params->get('timeIn'));

    //echo input_tag('isChecked', $sf_params->get('isChecked'));
    //, 'type="hidden"'

    ?>
    

    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );    
    
    ?>
    <span class="positive">&nbsp;&nbsp;Yesterday's Attendance</span>    
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
    <input type="submit" name="unmark"  value=" Show Unmark " class="submit-button">
    <input type="submit" name="mark"  value=" Show Marked " class="submit-button">
    <?php
	if (isset($pager)) {
    	echo '<input type="submit" name="save"  value=" Save Request " class="submit-button">';		
	}
	?>
    </td>
</tr>
</table>


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
        'searchTemplate' => 'adjtime_list_header_search',
        'pagerTemplate' => 'adjtime_pager_list',
        'baseURL' => $sf_request->getModuleAction()  ,
        'pager' => $pager,
        'searchContainerID' => XIDX::next(),
        'headers' => sfConfig::get('app_adjtime_grid_headers'),
    );
    

    include_partial('global/datagrid/container', $gridVars );
}

?>
</form>