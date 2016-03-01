<?php use_helper('Javascript'); ?>
<?php //echo $summary['ut']; exit(); ?>
<td class="alignCenterz"><small><?php echo $summary['seq'] ?></small></td>
<td class="alignCenter" ><small>
	<?php 
		echo AjaxLib::AjaxScript('edit_' . $summary['record_id'], 'dtr/editTimesheet', '', 'id='.$summary['record_id'].'+&divID='. $summary['divID'], 'tr_'. $summary['divID']);
		$edit 	= link_to('Edit', '#', 'id="edit_'.$summary['record_id'].'"');
		echo $edit;
		
		$durationLog = HTMLLib::Showlog($summary['duration'], $summary['modified_by'], $summary['date_modified']);
		$mealInfo = TkMealSummaryPeer::GetDatabyEmployeeNo($summary['employee_no'], $summary['trans_date']);
		if ($mealInfo):
			$mealLog = HTMLLib::Showlog($summary['meal'], $mealInfo->getModifiedBy(), $mealInfo->getDateModified());
		else:
			$mealLog = HTMLLib::Showlog($summary['meal'], $summary['modified_by'], $summary['date_modified']);
		endif;
		?>
	</small></td>
<td class="alignCenterz"><small><?php echo $summary['name'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['time_in'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['time_out'] ?></small></td>
<td class="alignRight"><small><?php echo $durationLog ?></small></td>
<td class="alignRight"><small><?php echo $mealLog ?></small></td>
<td class="alignRight"><small><?php echo $summary['ac_dura'] ?></small></td>
<td class="alignRight"><small><?php echo $summary['normal'] ?></small></td>
<td class="alignRight"><small><?php echo $summary['ot'] ?></small></td>
<td class="alignRight"><small><?php echo $summary['ut'] ?></small></td>
<td class="alignRight"><small><?php echo $summary['multiplier'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['holiday'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['leave_type'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['dayoff'] ?></small></td>
<?php if (HrLib::GetUser() == 'emmanuel'): ?>
<td class="alignCenterz"><small><?php echo $summary['amount'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['rate_per_hour'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['parttime'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['allowance'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['levy'] ?></small></td>
<td class="alignCenterz"><small><?php echo $summary['attendance'] ?></small></td>
<?php endif; ?>
<?php 
   		// highlight undertime
   	if ( (intval(strip_tags($summary['ut'])) > 5) && (strval(strip_tags($summary['amount'])) < 0) ):
   			?>
   	<script>
   		$('#tr_<?php echo strip_tags($summary['divID']) ?>').addClass('bg-clearOrange ');
	</script>
	<?php 
   	endif;
   		
   			// highlight no scan in
   	if ( (intval($summary['ut']) <= 5) &&  (intval($summary['ut']) !== 0) && (strval(strip_tags($summary['amount'])) < 0) ):
   			?>
   	<script>
   		$('#tr_<?php echo strip_tags($summary['divID']) ?>').addClass('bg-clearRed ');
	</script>
	<?php 
   	endif;
   	
   	
   		
   		