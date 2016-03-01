<table class="table bordered striped " >
<tr>
	<td class="bg-blue span1 alignCenter fg-white" nowrap><label>Account</label></td>
	<?php
		foreach($periodList as $period): 
			$cdate = HrLib::GetDateByPeriod($period);
			$month = DateUtils::DUFormat('M', $cdate);
	?>
	<td class="bg-blue span1 alignCenter fg-white" nowrap><label><?php echo $month; ?></label></td>
	<?php	
		endforeach;
	?>
</tr>
<?php 
	foreach($rows as $row => $desc):
		if ($row == 'OTHERS'):
			$highlight = 'fg-white bg-green';
		else:
			$highlight = '';
		endif;
?>
	<tr>
		<td class="alignRight <?php echo $highlight ?>" nowrap><small><?php echo $desc ?></small></td>
		<?php 
			foreach($periodList as $period): 
		?>
		<td class="alignRight <?php echo $highlight ?>" nowrap><small><?php echo number_format($data[$period][$row], 2) ?></small></td>
		<?php 
			endforeach;
		?>
	</tr>
<?php 
	endforeach;
?>
</table>