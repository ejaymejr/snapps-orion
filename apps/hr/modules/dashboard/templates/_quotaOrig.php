<?php use_helper('Validation', 'Javascript') ?>
<?php
sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Qouta Computation');
?>
<div class="grid-toolbar-2">                       
<?php 
	echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Online Manufacturing Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx');
	echo HTMLForm::DrawButton('pushbutton2', 'button1', 'Online Service Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx'); 
?>
</div>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('reports/fwQuota'). '?id=' . $sf_params->get('id');?>" method="post">
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
    	echo ShowLabelInHighlights($mfgQuota['max_fw']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['max_fw'] - $mfgQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total Spass Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>PRC R Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['prc_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['prc_quota'] - $mfgQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative">Total PRC Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>S Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['spass_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($mfgQuota['spass_quota'] - $mfgQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total SPASS Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries dataGridRowOdd" nowrap>Workforce Ratio</td>
    <td colspan="4" class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo '<span class="positive">Every SPR(10 <40%>) = FW(15<60%>)</span> || <span class="negative">OUT OF 15, SPASS(5 <20%>) PRC(6 <25%>) WP(4 <15%>) </span>';
    ?>
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
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($mfgQuota['levy_t1'])   ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($mfgQuota['levy_t2']) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($mfgQuota['levy_t3']) ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Levy tier for S Pass holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights($mfgQuota['levy_t1_sp'] ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights($mfgQuota['levy_t2_sp'] ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>&nbsp;</td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative"></span></td>
</tr>
    <?php
    	$MaxlevyT1 = ($mfgQuota['levy_t1']  * 330) + ($mfgQuota['levy_t1_sp'] * 330);
    	$MaxlevyT2 = ($mfgQuota['levy_t2']  * 430) + ($mfgQuota['levy_t2_sp'] * 430);
    	$MaxlevyT3 = ($mfgQuota['levy_t3']  * 500 ); 
    ?>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Levy Cost at Max (S$ 330)</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT1) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT2) ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights( '$'.number_format($MaxlevyT3) ) ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative"></span></td>
</tr>

<tr>
    <td height="3px" colspan="5" class="FORMcell-left " nowrap></td>
</tr>
</table>

<!-- 
<table width="100%" class="FORMtable" border="1" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="250px" class="FORMcell-left FORMlabel" nowrap><h3>OVERALL QUOTA BALANCE</h3></td>
    <td class="FORMcell-right" nowrap><h3>MANUFACTURING (Every SPR(10) = FW(15) | OUT OF 15, SPASS(5) PRC(6) WP(4)</h3>
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Max Foreign Workers you can employ</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo $mfgQuota['max_fw'];
    ?>
    <span class="negative">
        <?php
    		echo '&nbsp;&nbsp;&nbsp;&nbsp; (Fulltime SPR Worker + 1) * 1.5 || ( ' . ($mfgQuota['total_fulltime_spr_worker'] + 1 ) .' * 1.5 )';
    	?>
    </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Available SPass you can employ</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo $mfgQuota['spass_quota'] - $mfgQuota['spass_holder'] ;
    ?>
    <span class="negative">
        <?php
    		echo '&nbsp;&nbsp;&nbsp;&nbsp; (Total Existing Workforces + 1) * .2 || ( ' . ($mfgQuota['total_workforce']+1) .' * .2 = '. intval(($mfgQuota['total_workforce']+1) * .2) .' ) result does not round off';
    	?>
    </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Available PRC you can employ</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo $mfgQuota['prc_quota'] - $mfgQuota['prc_holder'] ;
    	
    ?>
    <span class="negative">
        <?php
    		echo '&nbsp;&nbsp;&nbsp;&nbsp; (Total Existing Workforces + 1) * .25 ( ' . ($mfgQuota['total_workforce']+1) .' * .25 = '. intval(($mfgQuota['total_workforce']+1) * .25) .' ) result does not round off';
    	?>
    </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Available WP you can employ</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo $mfgQuota['wp_quota'] - $mfgQuota['wp_holder'] ;
    	//echo intval(($mfgQuota['total_workforce'] + 1) * .15);
    	//echo $mfgQuota['max_fw'] - intval($mfgQuota['prc_holder'] + $mfgQuota['wp_holder'] + $mfgQuota['spass_holder']) ;
    ?>
    <span class="negative">
        <?php
    		echo '&nbsp;&nbsp;&nbsp;&nbsp; Maximum FW - Current FW';
    	?>
    </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Workforce Ratio</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo 'SPR(40%), SPASS(20%), PRC(25%), WP (15%?)';
    ?>
    <span class="negative">
        <?php
    		echo '&nbsp;&nbsp;&nbsp;This is based on the computation stated on the Website';
    	?>
    </span>
    </td>
</tr>
</table>
 -->
 
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
    	echo $mfgQuota['total_workforce'];
    ?>
    <span class="negative">&nbsp;&nbsp;&nbsp;*Total Currently working personnel</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total Fulltime SPR Workers</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $mfgQuota['total_fulltime_spr_worker'];
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total Foreign Workers</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo $mfgQuota['total_fulltime_foreign_worker']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total SPass Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $mfgQuota['spass_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total WP Holder</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo $mfgQuota['wp_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Total PRC Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $mfgQuota['prc_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableMfgQoutaEntries" nowrap>Un-Accounted</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo sizeof($mfgQuota['others']) . '<br>';
    	foreach ($mfgQuota['others'] as $empno=>$empname):
    		echo $empno . ': ' .$empname . '<br>';
    	endforeach;
    ?>
    <span class="negative">*</span>
    </td>
</tr>
</table>
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
    	echo ShowLabelInHighlights($svsQuota['max_fw']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['max_fw'] - $svsQuota['total_fulltime_foreign_worker']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total Spass Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>PRC R Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['prc_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['prc_quota'] - $svsQuota['prc_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="negative">Total PRC Work Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>S Passes quota</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['spass_quota']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>    
    <?php
    	echo ShowLabelInHighlights($svsQuota['spass_quota'] - $svsQuota['spass_holder']);
    ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative">Total SPASS Permit a firm can employ</span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries dataGridRowOdd" nowrap>Workforce Ratio</td>
    <td colspan="4" class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo '<span class="positive">Every SPR(10 <55.5%>) = FW(8<44.5%>)</span> || <span class="negative">OUT OF 8, SPASS(3 <37.5%>) PRC(1 <12.5%>) WP(4 <50%>) </span>';
    ?>
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
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($svsQuota['levy_t1'])   ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($svsQuota['levy_t2']) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap><?php echo ShowLabelInHighlights($svsQuota['levy_t3']) ?></td>
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Levy tier for S Pass holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights($svsQuota['levy_t1_sp'] ) ?></td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap><?php echo ShowLabelInHighlights($svsQuota['levy_t2_sp'] ) ?></td>
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
    <td height="3px" colspan="5" class="FORMcell-left " nowrap></td>
</tr>
</table>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="30%" class="FORMcell-left tableSVSQoutaTitle" nowrap>EXISTING WORKFORCE</td>
    <td class="FORMcell-right tableSVSQoutaTitle" nowrap>CURRENT DETAILS
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Existing Workforces</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo $svsQuota['total_workforce'];
    ?>
    <span class="negative">&nbsp;&nbsp;&nbsp;*Total Currently working personnel</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Fulltime SPR Workers</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $svsQuota['total_fulltime_spr_worker'];
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total Foreign Workers</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo $svsQuota['total_fulltime_foreign_worker']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total SPass Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $svsQuota['spass_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total WP Holder</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo $svsQuota['wp_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Total PRC Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
    	echo $svsQuota['prc_holder']
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left tableSvsQoutaEntries" nowrap>Un-Accounted</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
    	echo sizeof($svsQuota['others']) . '<br>';
    	foreach ($svsQuota['others'] as $empno=>$empname):
    		echo $empno . ': ' .$empname . '<br>';
    	endforeach;
    ?>
    <span class="negative">*</span>
    </td>
</tr>
</table>
</form>
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