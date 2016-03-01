<?php use_helper('Validation', 'Javascript') ?>
<?php 
$commence = $empData->getCommenceDate();
if ($leaveID == '2'):
	$alloc = $empData->getAnnualLeave();
	if (! $alloc):
		$alloc = 14;
	endif;
else:
	$alloc = HrLeavePeer::GetEntitlementById($leaveID);
endif;
$months = DateUtils::DateDiff('m', $commence, Date('Y-m-d'));
if ($months >= 12 ) :
	$monthsText = '12+';
	$months = 12;
else:
	$monthsText = $months;
endif;
$prorate = ($months / 12) * 12;
?>
<table class="table bordered bg-white">
<tr>
	<td class="span2">Total Months</td>
	<td><?php echo $months ?></td>
</tr>
<tr>
	<td>Default Allocation</td>
	<td><?php echo $alloc ?></td>
</tr>
<tr>
	<td>Computation</td>
	<td><?php echo $months ?> months / 12 * <?php echo $alloc ?> = <?php echo $months/12*$alloc ?></td>
</tr>
</table>
<script>
$(document).ready(function(){
	$('#days_entitled').val (<?php echo $months/12*$alloc ?>);
});
</script>