 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
 <div id="DIVCalculator">
 <div class="window">
<div class="caption">
<span class="icon icon-windows"></span> 
<div class="title">PASS CALCULATOR</div> 
</div>
<div class="content">
 <table class="table condensed bordered">
 <tr>
 	<td class="span2 alignRight bg-clearBlue"><label><small>SPR</small></label></td>
 	<td class="span2 alignLeft bg-white">
 		<?php 
 			echo HTMLLib::CreateInputText('com_spr', $com_spr, 'span1' ) ;
 			?>
 	</td>	
 	<td class="span2 alignLeft bg-white">
 	<?php
 		//style="border-radius:50%; background: green; color: white; padding: 8px;"
 		echo AjaxLib::AjaxScript('spr_plus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'spr_plus_1=1', 'DIVCalculator');
 		echo AjaxLib::AjaxScript('spr_minus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'spr_minus_1=1', 'DIVCalculator');
		$compute1 = link_to('<i class="icon-plus-2"></i>', '#', 'id="spr_plus_1" class="button mini default" ');
		$compute2 = link_to('<i class="icon-minus-2"></i>', '#', 'id="spr_minus_1" class="button mini default"');
		echo $compute1 .'&nbsp;'. $compute2;
 	?></td>
 	<td class="span2 alignRight bg-clearBlue"><label><small>PRC</small></label></td>
 	<td class="span2 alignLeft bg-white">
 		<?php 
 			echo HTMLLib::CreateInputText('com_prc', $com_prc, 'span1' ) ;
 			?>
 	</td>	
 	<td class="span2 alignLeft bg-white">
 	<?php
 		echo AjaxLib::AjaxScript('prc_plus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'prc_plus_1=1', 'DIVCalculator');
 		echo AjaxLib::AjaxScript('prc_minus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'prc_minus_1=1', 'DIVCalculator');
		$compute1 = link_to('<i class="icon-plus-2"></i>', '#', 'id="prc_plus_1" class="button mini default"');
		$compute2 = link_to('<i class="icon-minus-2"></i>', '#', 'id="prc_minus_1" class="button mini default"');
		echo $compute1 .'&nbsp;'. $compute2;
 	?></td>
 </tr> 
 <tr>
 	<td class="span2 alignRight bg-clearBlue"><label><small>SPASS</small></label></td>
 	<td class="span2 alignLeft bg-white">
 		<?php 
 			
 			echo HTMLLib::CreateInputText('com_spass', $com_spass, 'span1' ) ;
 			?>
 	</td>	
 	<td class="span2 alignLeft bg-white">
 	<?php
 		echo AjaxLib::AjaxScript('spass_plus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'spass_plus_1=1', 'DIVCalculator');
 		echo AjaxLib::AjaxScript('spass_minus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'spass_minus_1=1', 'DIVCalculator');
		$compute1 = link_to('<i class="icon-plus-2"></i>', '#', 'id="spass_plus_1" class="button mini default"');
		$compute2 = link_to('<i class="icon-minus-2"></i>', '#', 'id="spass_minus_1" class="button mini default"');
		echo $compute1 .'&nbsp;'. $compute2;
 	?></td>
 	 	<td class="span2 alignRight bg-clearBlue"><label><small>WP</small></label></td>
 	<td class="span2 alignLeft bg-white">
 		<?php 
 			echo HTMLLib::CreateInputText('com_wp', $com_wp, 'span1' ) ;
 			?>
 	</td>	
 	<td class="span2 alignLeft bg-white">
 	<?php
 		echo AjaxLib::AjaxScript('wp_plus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'wp_plus_1=1', 'DIVCalculator');
 		echo AjaxLib::AjaxScript('wp_minus_1', 'dashboard/ajaxQuotaUpdate', 'com_spr, com_spass, com_prc, com_wp', 'wp_minus_1=1', 'DIVCalculator');
		$compute1 = link_to('<i class="icon-plus-2"></i>', '#', 'id="wp_plus_1" class="button mini default"');
		$compute2 = link_to('<i class="icon-minus-2"></i>', '#', 'id="wp_minus_1" class="button mini default"');
		echo $compute1 .'&nbsp;'. $compute2;
 	?></td>
 	</tr> 
 	<tr>
 		<td class="span2 alignRight bg-clearBlue"><label><small>CALC</small></label></td>
 		<td colspan="5" class="span2 alignLeft bg-white">
 			<small><a href="http://www.mom.gov.sg/Documents/services-forms/Quota_Calculator.xls">Quota Calculator Online (XLS)</a></small>
 		</td>
 	</tr>
 		
</table>
<?php include_partial('mfg_calculator', array('com_spr' => $com_spr, 'com_spass' => $com_spass, 'com_prc' => $com_prc, 'com_wp' => $com_wp) ) ?>
 </div>
 </div>