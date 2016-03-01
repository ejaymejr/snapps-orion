 <?php use_helper('Form', 'Javascript', 'PagerNavigation');
// sfConfig::set('app_page_heading', 'Trend Income and Expense(s) Summary');
?>
<div class="contentBox">
<h2><i class=" icon-arrow-left-3"></i> Service Sector Quota Calculator</h2>
<?php
echo javascript_tag("
		function closeAllInstruction()
		{
		document.getElementById('DIVShowHidesvsSPassT1').style.display = 'none';
		document.getElementById('DIVShowHidesvsSPassT2').style.display = 'none';
		document.getElementById('DIVShowHidesvsSPassT3').style.display = 'none';
		document.getElementById('DIVShowHidesvsSPassT4').style.display = 'none';
		
		document.getElementById('DIVShowHidesvsRPassT1').style.display = 'none';
		document.getElementById('DIVShowHidesvsRPassT2').style.display = 'none';
		document.getElementById('DIVShowHidesvsRPassT3').style.display = 'none';
		document.getElementById('DIVShowHidesvsRPassT4').style.display = 'none';

		}");
		
sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Qouta Computation');
?>
<?php 
//	echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Online Manufacturing Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx');
//	echo HTMLForm::DrawButton('pushbutton2', 'button1', 'Online Service Computation', 'https://app.quotacal.mom.gov.sg/ecalculator/industryinput.aspx'); 
//	echo HTMLForm::DrawButton('pushbutton3', 'button1', 'New Excel File Computation', 'http://www.mom.gov.sg/Documents/services-forms/Quota_Calculator.xls');
?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('reports/fwQuota'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table condensed bordered" > 
<tr>
    <td class="bg-green fg-white alignCenter" nowrap>EXISTING WORKFORCE</td>
    <td class="bg-green fg-white alignCenter" nowrap>CURRENT DETAILS
    <span class="negative"></span>
    </td >
    <td class="bg-green fg-white">CALCULATOR</td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span3" nowrap>Total Existing Workforce</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['total_workforce'],'',
		"onclick=showHideElement('DIVShowHidesvsTotalWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsTotalWorkForceList" style="display:none"><?php include_partial('totalworkforce', array('quota'=>$svsQuota)); ?></div>
    </td>
    <td rowspan="7" class="span8"><?php include_partial('svs_quota_calculator', array('com_spr'=>$svsQuota['total_fulltime_spr_worker'], 'com_spass'=>$svsQuota['spass_holder'], 'com_prc'=>$svsQuota['prc_holder'], 'com_wp'=>$svsQuota['wp_holder']  , 'quota'=>$svsQuota)) ?></td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Total Fulltime SPR Workers<p><small class="fg-red">Criteria: income < 500 = .5 <br> income >= 1000 = 1</small></p></td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['total_fulltime_spr_worker'],'',
		"onclick=showHideElement('DIVShowHidesvsSPRWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsSPRWorkForceList" style="display:none"><?php include_partial('sprworkforce', array('quota'=>$svsQuota)); ?></div>
    
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Total Foreign Workers</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['total_fulltime_foreign_worker'],'',
		"onclick=showHideElement('DIVShowHidesvsforeignWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsforeignWorkForceList" style="display:none"><?php
    	include_partial('totalforeignworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">* </span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Total SPass Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['spass_holder'],'',
		"onclick=showHideElement('DIVShowHidesvsSPassWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsSPassWorkForceList" style="display:none"><?php
    	include_partial('spassworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Total WP Holder</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['wp_holder'],'',
		"onclick=showHideElement('DIVShowHidesvsWPWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsWPWorkForceList" style="display:none"><?php
    	include_partial('wpworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Total PRC Holder</td>
    <td class="FORMcell-right dataGridRowOdd" nowrap>
    <?php
		echo link_to($svsQuota['prc_holder'],'',
		"onclick=showHideElement('DIVShowHidesvsPRCWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsPRCWorkForceList" style="display:none"><?php
    	include_partial('prcworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue span1" nowrap>Un-Accounted</td>
    <td class="FORMcell-right dataGridRowEven" nowrap>
    <?php
		echo link_to($svsQuota['others'],'',
		"onclick=showHideElement('DIVShowHidesvsOthersWorkForceList');return false;" . " style=cursor:pointer;" );
    ?>
    <div id="DIVShowHidesvsOthersWorkForceList" style="display:none"><?php
    	include_partial('unaccountedworkforce', array('quota'=>$svsQuota)); 
    	?></div>
    	
    <span class="negative">*</span>
    </td>
</tr>
</table>


<table class="table condensed bordered" > 
<tr>
    <td class="bg-green fg-white alignCenter span3" nowrap>MANUFACTURING SECTOR</td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>ENTITLEMENT</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>UTILISED</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap><center>BALANCE</center></td>
    <td class="bg-green fg-white alignCenter span3" nowrap></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Foreign Worker Quota</td>
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
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="fg-green"><small>Total Spass Work Permit a firm can employ</small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>PRC R Passes quota</td>
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
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap><span class="fg-green"><small>Total PRC Work Permit a firm can employ</small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>S Passes quota</td>
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
    <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap><span class="fg-green"><small>Total SPASS Permit a firm can employ</small></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Workforce Ratio</td>
    <td class="" colspan="2" nowrap><small>
 	
	        <div class="span5 window shadow">
		    <div class="caption">
				<span class="icon icon-user"></span> 
				<strong class="fg-white">Illustration 1</strong>
			</div>
			<div class="content"><pre>
 Mr Tan runs a factory, licensed by AVA, producing 
 nonya kueh. He supplies various hotels and cafes.
 He employs <strong class="fg-green">20</strong> full-time locals and <strong class="fg-green">10</strong> Malaysian 
 work permit holders in his factory. Of the 10 
 work permit holders, 8 are skilled workers while 
 the other 2 are classified as unskilled.
 
 He is thinking of expanding his factory, but he is 
 not sure how many more foreign workers he can hire.
 
 Mr Tan's factory is in the Manufacturing Sector; 
 so his quota is 60%.
 <strong>Step 1:</strong>
	Max no of FWs = 20 Local FTE x 1.5 = <strong class="fg-green">30</strong> FWs
	So Mr Tan can hire 20 more foreign workers 
	before he reaches his quota.

 If Mr Tan is allowed to hire 20 more FWs.

 His maximum total workforce:
 <strong class="fg-red">20 local FTEs + 30 FWs = 50</strong>

 But Mr Tan wants to phase his expansion plan, 
 so he only hires another 12 FWs in phase 1:
			</pre></div>		
	        </div>
    </small>
    </td> 
    
    <td class="" colspan="2" nowrap><small>
 	
	        <div class="span5 window shadow">
		    <div class="caption">
				<span class="icon icon-user"></span> 
				<strong class="fg-white">Illustration 2</strong>
			</div>
			<div class="content"><pre>
 <strong>Step 2:</strong>
 His actual <strong class="fg-green">total workforce:</strong>
 <strong class="fg-red">20 local FTEs + 22 FWs = 42</strong>
 
 <strong>Step 3:</strong>
 Calculate the number of <strong class="fg-green">S Passes</strong> you can hire
 
 Manufacturing, Construction, Process, Marine sectors:
 <strong class="fg-red">S Pass sub-quota = 20% x (total workforce + 1)</strong>
 
 Step 4: Calculate the number of <strong class="fg-green">PRC foreign workers</strong> 
 you can hire
 <strong class="fg-red">PRC sub-quota = 25% x (total workforce + 1) </strong>
			</pre></div>		
	        </div>
    </small>
    </td>
    
</tr>
</table>

<table class="table condensed bordered" > 
<tr>
    <td class="bg-green alignCenter fg-white" nowrap>LEVY ALLOCATION</td>
    <td class="bg-green alignCenter fg-white" nowrap><center>Tier 1 (S$ 330 | 230)</center></td>
    <td class="bg-green alignCenter fg-white" nowrap><center>Tier 2 (S$ 430 | 330)</center></td>
    <td class="bg-green alignCenter fg-white" nowrap><center>Tier 3 (S$ 500)</center></td>
    <td class="bg-green alignCenter fg-white" nowrap><span class="negative"></span></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Levy tier for work permit (R Pass) holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($svsQuota['rpass_holder_T1_list']) .' / '.$svsQuota['levy_t1']),'',
    				"onclick=showHideElement('DIVShowHidesvsRPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsRPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsRPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($svsQuota['rpass_holder_T2_list']) .' / '.$svsQuota['levy_t2']),'',
    				"onclick=showHideElement('DIVShowHidesvsRPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsRPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsRPassT2' )); ?></div>
    	</td>
    	<td class="FORMcell-left FORMlabel dataGridRowEven" nowrap>
        	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($svsQuota['rpass_holder_T3_list']) .' / '. $svsQuota['levy_t3']),'',
    				"onclick=showHideElement('DIVShowHidesvsRPassT3');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsRPassT3" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 3', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsRPassT3' )); ?></div>
    </td>
        <td class="FORMcell-right FORMlabel dataGridRowEven" nowrap>
        	<?php 
    		echo link_to('unaccounted','',
    				"onclick=showHideElement('DIVShowHidesvsRPassT4');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsRPassT4" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 0', 'pass'=>'RPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsRPassT4' )); ?></div>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Levy tier for S Pass holders</td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights(sizeof($svsQuota['spass_holder_T1_list']) .' / '. $svsQuota['levy_t1_sp']),'',
    				"onclick=showHideElement('DIVShowHidesvsSPassT1');return false;" . " style=cursor:pointer;" );
    	?>
    	
    	<div class="DIVInstruction" id="DIVShowHidesvsSPassT1" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 1', 'pass'=>'SPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsSPassT1' )); ?></div>
    </td>
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>
    	<?php 
    		echo link_to(ShowLabelInHighlights( sizeof($svsQuota['spass_holder_T2_list']) .' / '. $svsQuota['levy_t2_sp']),'',
    				"onclick=showHideElement('DIVShowHidesvsSPassT2');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsSPassT2" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 2', 'pass'=>'SPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsSPassT2' )); ?></div>
    </td>    
    <td class="FORMcell-left FORMlabel dataGridRowOdd" nowrap>&nbsp;</td>
    <td class="FORMcell-right FORMlabel dataGridRowOdd" nowrap>
        	<?php 
    		echo link_to('unaccounted','',
    				"onclick=showHideElement('DIVShowHidesvsSPassT4');return false;" . " style=cursor:pointer;" );
    	?>
    	<div class="DIVInstruction" id="DIVShowHidesvsSPassT4" class="FORMcell-right" style="display:none"><?php include_partial('levytier', array('levytier'=>'TIER 0', 'pass'=>'SPASS', 'quota'=> $svsQuota, 'divName'=>'DIVShowHidesvsSPassT4' )); ?></div>
    
    </td>
</tr>
    <?php
    	$MaxlevyT1 = ($svsQuota['levy_t1']  * 330) + ($svsQuota['levy_t1_sp'] * 330);
    	$MaxlevyT2 = ($svsQuota['levy_t2']  * 430) + ($svsQuota['levy_t2_sp'] * 430);
    	$MaxlevyT3 = ($svsQuota['levy_t3']  * 500 ); 
    ?>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Levy Cost at Max (S$ 330)</td>
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