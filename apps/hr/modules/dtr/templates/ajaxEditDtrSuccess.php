<?php use_helper('Validation', 'Javascript') ?>
<?php 
$updateID = explode('_', $sf_params->get('form_updateID'));
$rowNumber =$updateID[3];

if (isset($att) && isset($summary)):
	
?>
	<td  class="bg-orange fg-white"><?php echo $rowNumber ?></td>
	<td  class="bg-orange fg-white"><small><?php echo substr($summary->getName(),0, 3) ?></small></td>
	<td  class="bg-orange fg-white"><?php echo $att->getTimeIn() ?></td>
	<td  class="bg-orange fg-white"><?php echo $att->getTimeOut() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getDuration() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getMeal() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getAcDura() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getNormal() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getOvertimes() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getUndertime() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getMultiplier() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getHolidayCode() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getLeaveType() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getDayoff() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getPostedAmount() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getRatePerHour() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getPartTimeIncome() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getAllowance() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getLevy() ?></td>
	<td class="bg-orange fg-white"><?php echo $summary->getAttendance() ?></td>
	<script>
		scrollIntoView("<?php echo $sf_params->get('form_updateID') ?>");
	</script>
<?php 
else:
?>
	<script>alert('Please provide TimeOut or Duration');</script>
<?php 	
endif;?>