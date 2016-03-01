<?php use_helper('Validation', 'Javascript') ?>
<?php
echo javascript_tag("
		function closeAllInstruction()
		{
		document.getElementById('DIVShowHideMfgSPassT1').style.display = 'none';
		document.getElementById('DIVShowHideMfgSPassT2').style.display = 'none';
		document.getElementById('DIVShowHideMfgSPassT3').style.display = 'none';
		document.getElementById('DIVShowHideMfgSPassT4').style.display = 'none';
		
		document.getElementById('DIVShowHideMfgRPassT1').style.display = 'none';
		document.getElementById('DIVShowHideMfgRPassT2').style.display = 'none';
		document.getElementById('DIVShowHideMfgRPassT3').style.display = 'none';
		document.getElementById('DIVShowHideMfgRPassT4').style.display = 'none';

		}");
		
sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Qouta Computation');
?>
<div class="grid-toolbar-2">                       
<?php 
	echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Online Manufacturing Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx');
	echo HTMLForm::DrawButton('pushbutton2', 'button1', 'Online Service Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx'); 
	echo HTMLForm::DrawButton('pushbutton3', 'button1', 'New Excel File Computation', 'http://www.mom.gov.sg/Documents/services-forms/Quota_Calculator.xls');
?>
</div>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('reports/fwQuota'). '?id=' . $sf_params->get('id');?>" method="post">
<?php
if ($mfgQuota):
?>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="30%" class="FORMcell-left  tableMfgQoutaTitle" nowrap>MANUFACTURING SECTOR</td>
    <td width="10%" class="FORMcell-left tableMfgQoutaTitle " nowrap><center>Entitlement</center></td>
    <td width="10%" class="FORMcell-left tableMfgQoutaTitle " nowrap><center>Utilised</center></td>
    <td width="10%" class="FORMcell-left tableMfgQoutaTitle " nowrap><center>Balance</center></td>
    <td width="40%" class="FORMcell-left tableMfgQoutaTitle" nowrap></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Foreign Worker Quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['max_fw']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['max_fw'] - $mfgQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total Spass Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>PRC R Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    Refer to the Excel File Computation
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['prc_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['prc_quota'] - $mfgQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative">Total PRC Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>S Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['spass_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($mfgQuota['spass_quota'] - $mfgQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total SPASS Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableNotesEntries" nowrap>Workforce Ratio</td>
    <td class="FORMcell-left tableNotesEntries alignLeft" colspan="5" nowrap><span class="positive">Every SPR(10 <40%>) = FW(15<60%>)</span> | <span class="negative">OUT OF 15, SPASS(5 <20%>) PRC(6 <25%>) WP(4 <15%>) </span></td> 
</tr>

<tr>
    <td height="3px" colspan="5" class="FORMcell-left  " nowrap></td>
</tr>
<tr>
    <td class="FORMcell-left  tableMfgQoutaTitle" nowrap>LEVY ALLOCATION</td>
    <td class="FORMcell-left  tableMfgQoutaTitle" nowrap><center>Tier 1 (S$ 330 | 230)</center></td>
    <td class="FORMcell-left  tableMfgQoutaTitle" nowrap><center>Tier 2 (S$ 430 | 330)</center></td>
    <td class="FORMcell-left  tableMfgQoutaTitle" nowrap><center>Tier 3 (S$ 500)</center></td>
    <td class="FORMcell-right  tableMfgQoutaTitle" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Levy tier for work permit (R Pass) holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($mfgQuota['rpass_holder_T1_list']) .' / '.$mfgQuota['levy_t1']),'',
    				"onclick=showHideElement('DIVShowHideMfgRPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgRPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'RPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgRPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($mfgQuota['rpass_holder_T2_list']) .' / '.$mfgQuota['levy_t2']),'',
    				"onclick=showHideElement('DIVShowHideMfgRPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgRPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'RPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgRPassT2' )); ?></div>
    	</td>
    	<td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
        	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($mfgQuota['rpass_holder_T3_list']) .' / '. $mfgQuota['levy_t3']),'',
    				"onclick=showHideElement('DIVShowHideMfgRPassT3');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgRPassT3" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 3', 'pass'=>'RPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgRPassT3' )); ?></div>
    </td>
        <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap>
        	<?php 
    		echo link_to('unaccounted','',
    				"onclick=showHideElement('DIVShowHideMfgRPassT4');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgRPassT4" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 0', 'pass'=>'RPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgRPassT4' )); ?></div>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Levy tier for S Pass holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($mfgQuota['spass_holder_T1_list']) .' / '. $mfgQuota['levy_t1_sp']),'',
    				"onclick=showHideElement('DIVShowHideMfgSPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	
    	<div class="DIVInstruction" id="DIVShowHideMfgSPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'SPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgSPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($mfgQuota['spass_holder_T2_list']) .' / '. $mfgQuota['levy_t2_sp']),'',
    				"onclick=showHideElement('DIVShowHideMfgSPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgSPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'SPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgSPassT2' )); ?></div>
    </td>    
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>&nbsp;</td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap>
        	<?php 
    		echo link_to('unaccounted','',
    				"onclick=showHideElement('DIVShowHideMfgSPassT4');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideMfgSPassT4" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 0', 'pass'=>'SPASS', 'quota'=> $mfgQuota, 'divName'=>'DIVShowHideMfgSPassT4' )); ?></div>
    
    </td>
</tr>
    <?php
    	$MaxlevyT1 = ($mfgQuota['levy_t1']  * 330) + ($mfgQuota['levy_t1_sp'] * 330);
    	$MaxlevyT2 = ($mfgQuota['levy_t2']  * 430) + ($mfgQuota['levy_t2_sp'] * 430);
    	$MaxlevyT3 = ($mfgQuota['levy_t3']  * 500 ); 
    ?>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Levy Cost at Max (S$ 330)</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT1) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT2) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT3) ) ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableNotesEntries" nowrap>Notes:</td>
    <td class="FORMcell-left tableNotesEntries alignLeft" colspan="5" nowrap>Utilised / Entitlement | <span class="positive">Click on the Numbers to display proof</span> | <span class="negative">Unaccounted refers to Unknown Levy Tier</span></td> 
</tr>

<tr>
    <td height="3px" colspan="5" class="FORMcell-left " nowrap></td>
</tr>
</table>
 
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="30%" class="FORMcell-left tableMfgQoutaTitle" nowrap>EXISTING WORKFORCE</td>
    <td class="FORMcell-right tableMfgQoutaTitle" nowrap>CURRENT DETAILS
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total Existing Workforces</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
//     	$jsTotalWorkForce = "'batchNo=' + \$F('batch_no')   +  "
//     		."'&servicingType=' + \$F('servicing_type') "
//     	;
    	$jsTotalWorkForce = "'momGroup=T.C. Khoo Mfg'  + "
				. "'&rankCode=ALL' "
    			;
    	$ajaxTotalWorkForce = array(
    			'url'		=>'dashboard/ajaxWorkersList',
    			'with'		=> $jsTotalWorkForce,
    			'update' 	=> 'DIVShowHideMfgTotalWorkForceList',
    			'script'    => true,
    			'loading'   => 'stop_remote_pager();',
    			'before'   	=> 'showLoader();',
    			'complete'  => 'hideLoader();formatFormStyle();',
    			'type'      => 'synchronous',
    		);
//     	echo link_to($mfgQuota['total_workforce'],'',
//     		array('onclick'=>remote_function($ajaxTotalWorkForce) . ';return false;') );

		echo link_to($mfgQuota['total_workforce'],'',
		"onclick=showHideElement('DIVShowHideMfgTotalWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgTotalWorkForceList" style="display:none"><?php include_partial('totalworkforce', array('quota'=>$mfgQuota)); ?></div>
    <span class="negative">&nbsp;&nbsp;&nbsp;*Total Currently working personnel</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total Fulltime SPR Workers</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($mfgQuota['total_fulltime_spr_worker'],'',
		"onclick=showHideElement('DIVShowHideMfgSPRWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgSPRWorkForceList" style="display:none"><?php include_partial('sprworkforce', array('quota'=>$mfgQuota)); ?></div>
    <span class="negative"> * Criteria: income < 850 = .5 | income >= 850 = 1</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total Foreign Workers</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($mfgQuota['total_fulltime_foreign_worker'],'',
		"onclick=showHideElement('DIVShowHideMfgforeignWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgforeignWorkForceList" style="display:none"><?php
    	include_partial('totalforeignworkforce', array('quota'=>$mfgQuota)); 
    	?></div>
    <span class="negative">* </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total SPass Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($mfgQuota['spass_holder'],'',
		"onclick=showHideElement('DIVShowHideMfgSPassWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgSPassWorkForceList" style="display:none"><?php
    	include_partial('spassworkforce', array('quota'=>$mfgQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total WP Holder</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($mfgQuota['wp_holder'],'',
		"onclick=showHideElement('DIVShowHideMfgWPWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgWPWorkForceList" style="display:none"><?php
    	include_partial('wpworkforce', array('quota'=>$mfgQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total PRC Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($mfgQuota['prc_holder'],'',
		"onclick=showHideElement('DIVShowHideMfgPRCWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgPRCWorkForceList" style="display:none"><?php
    	include_partial('prcworkforce', array('quota'=>$mfgQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Un-Accounted</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($mfgQuota['others'],'',
		"onclick=showHideElement('DIVShowHideMfgOthersWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideMfgOthersWorkForceList" style="display:none"><?php
    	include_partial('unaccountedworkforce', array('quota'=>$mfgQuota)); 
    	?></div>
    	
    <span class="negative">*</span>
    </td>
</tr>
</table>

<?php
	endif; //mfgQuota
?>





















<?php
if ($svsQuota):
?>

<br><br>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="30%" class="FORMcell-left  tableSVSQoutaTitle" nowrap>SERVICE SECTOR</td>
    <td width="10%" class="FORMcell-left tableSVSQoutaTitle " nowrap><center>Entitlement</center></td>
    <td width="10%" class="FORMcell-left tableSVSQoutaTitle " nowrap><center>Utilised</center></td>
    <td width="10%" class="FORMcell-left tableSVSQoutaTitle " nowrap><center>Balance</center></td>
    <td width="40%" class="FORMcell-left tableSVSQoutaTitle" nowrap></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Foreign Worker Quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['max_fw']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    Refer to Excel File Computation
    <?php
    	//echo ShowLabelInHighlights($svsQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['max_fw'] - $svsQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total Spass Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>PRC R Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['prc_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['prc_quota'] - $svsQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative">Total PRC Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>S Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['spass_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	//echo ShowLabelInHighlights($svsQuota['spass_quota'] - $svsQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total SPASS Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableNotesEntries" nowrap>Workforce Ratio</td>
    <td colspan="4" class="FORMcell-left tableNotesEntries alignLeft" colspan="5" nowrap><span class="positive">Every SPR(10 <55.5%>) = FW(8<44.5%>)</span> || <span class="negative">OUT OF 8, SPASS(3 <37.5%>) PRC(1 <12.5%>) WP(4 <50%>) </span></td> 
</tr>
<tr>
    <td height="3px" colspan="5" class="FORMcell-left  " nowrap></td>
</tr>
<tr>
    <td class="FORMcell-left  tableSVSQoutaTitle" nowrap>LEVY ALLOCATION</td>
    <td class="FORMcell-left  tableSVSQoutaTitle" nowrap><center>Tier 1 (S$ 370 | 270)</center></td>
    <td class="FORMcell-left  tableSVSQoutaTitle" nowrap><center>Tier 2 (S$ 480 | 380)</center></td>
    <td class="FORMcell-left  tableSVSQoutaTitle" nowrap><center>Tier 3 (S$ 550)</center></td>
    <td class="FORMcell-right  tableSVSQoutaTitle" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Levy tier for work permit (R Pass) holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['rpass_holder_T1_list']) .' / '. $svsQuota['levy_t1']),'',
    				"onclick=showHideElement('DIVShowHideSvsRPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsRPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsRPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['rpass_holder_T2_list']) .' / '. $svsQuota['levy_t2']),'',
    				"onclick=showHideElement('DIVShowHideSvsRPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsRPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsRPassT2' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['rpass_holder_T3_list']) .' / '. $svsQuota['levy_t3']),'',
    				"onclick=showHideElement('DIVShowHideSvsRPassT3');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsRPassT3" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 3', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsRPassT3' )); ?></div>
    </td>
        <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap>
        	<?php 
    		echo link_to('unaccounted','',
    				"onclick=showHideElement('DIVShowHideSvsRPassT4');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsRPassT4" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 0', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsRPassT4' )); ?></div>
    
    </td>
</tr>

<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Levy tier for S Pass holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['spass_holder_T1_list']) .' / '. $svsQuota['levy_t1_sp']),'',
    				"onclick=showHideElement('DIVShowHideSvsSPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsSPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'SPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsSPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['spass_holder_T2_list']) .' / '. $svsQuota['levy_t2_sp']),'',
    				"onclick=showHideElement('DIVShowHideSvsSPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHideSvsSPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'SPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHideSvsSPassT2' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>&nbsp;</td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative"></span></td>
</tr>
    <?php
    	$MaxlevyT1 = ($svsQuota['levy_t1']  * 370) + ($svsQuota['levy_t1_sp'] * 250);
    	$MaxlevyT2 = ($svsQuota['levy_t2']  * 480) + ($svsQuota['levy_t2_sp'] * 390);
    	$MaxlevyT3 = ($svsQuota['levy_t3']  * 550 ); 
    ?>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Levy Cost at Max (S$ 370)</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT1) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT2) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT3) ) ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableNotesEntries" nowrap>Notes</td>
    <td class="FORMcell-left tableNotesEntries alignLeft" colspan="5" nowrap>Utilised / Entitlement | <span class="positive">Click on the Numbers to display proof</span> | <span class="negative">Unaccounted refers to Unknown Levy Tier</span></td> 
</tr>
</table>
<br>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="30%" class="FORMcell-left tableSvsQoutaTitle" nowrap>EXISTING WORKFORCE</td>
    <td class="FORMcell-right tableSvsQoutaTitle" nowrap>CURRENT DETAILS
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Existing Workforces</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['total_workforce'],'',
		"onclick=showHideElement('DIVShowHideSvsTotalWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsTotalWorkForceList" style="display:none"><?php include_partial('totalworkforce', array('quota'=>$svsQuota)); ?></div>
    <span class="negative">&nbsp;&nbsp;&nbsp;*Total Currently working personnel</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Fulltime SPR Workers</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['total_fulltime_spr_worker'],'',
		"onclick=showHideElement('DIVShowHideSvsSPRWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsSPRWorkForceList" style="display:none"><?php include_partial('sprworkforce', array('quota'=>$svsQuota)); ?></div>
    <span class="negative"> * Criteria: income < 850 = .5 | income >= 850 = 1</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Foreign Workers</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['total_fulltime_foreign_worker'],'',
		"onclick=showHideElement('DIVShowHideSvsforeignWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsforeignWorkForceList" style="display:none"><?php
    	include_partial('totalforeignworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">* </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total SPass Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['spass_holder'],'',
		"onclick=showHideElement('DIVShowHideSvsSPassWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsSPassWorkForceList" style="display:none"><?php
    	include_partial('spassworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total WP Holder</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['wp_holder'],'',
		"onclick=showHideElement('DIVShowHideSvsWPWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsWPWorkForceList" style="display:none"><?php
    	include_partial('wpworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total PRC Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['prc_holder'],'',
		"onclick=showHideElement('DIVShowHideSvsPRCWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsPRCWorkForceList" style="display:none"><?php
    	include_partial('prcworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Un-Accounted</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['others'],'',
		"onclick=showHideElement('DIVShowHideSvsOthersWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHideSvsOthersWorkForceList" style="display:none"><?php
    	include_partial('unaccountedworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    	
    <span class="negative">*</span>
    </td>
</tr>
</table>
</form>
<h3>
source: http://www.mom.gov.sg/Documents/services-forms/Quota_Calculator.xls
</h3>
<?php
	endif; //svsQuota
?>
<!--<div class="grid-toolbar-2">-->
<!--<H1>General MFG Qouta: </h1>-->
<!--<ul>	-->
<!--	<li>MFG Ratio 10:6</li>-->
<!--	<li>MFG PRC Ratio 10:2.5</li>-->
<!--	<li>MFG PRC Ratio 10:2</li>-->
<!--</ul>-->
<!--<Br>-->
<!--<H1>General SVS Qouta: </h1>-->
<!--<ul>	-->
<!--	<li>SVS Ratio 10:4</li>-->
<!--	<li>SVS PRC Ratio 10:.8</li>-->
<!--	<li>SVS PRC Ratio 10:1.5</li>-->
<!--</ul>-->
<!--</div>-->
<?php
function ShowLabelInHighlights($val)
{
	if ($val < 0 ):
		return '<div class="alignCenter"><span class="tableLabelAboveQuota"> ' . $val . '</span></div>';
	else:
		return '<div class="alignCenter"><span class="tableLabelBelowQuota"> ' . $val . '</span></div>';
	endif;
}
?>