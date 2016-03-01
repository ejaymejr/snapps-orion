<?php use_helper('Validation', 'Javascript') ?>
<?php if ($workTemp): ?>
<table class="table bordered">
<tr>
	<td class="bg-lime alignRight fg-white" colspan="5" >WORKTEMPLATE DETAIL</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Daily Schedule</label></td>
	<td class="" colspan="3">
		<table class="table bordered bg-white span5" >
		<tr class="alignCenter" >
			<td colspan="7" class="bg-clearBlue"><h2>WEEKLY SCHEDULE PER HOUR REQUIREMENT</h2></td>
		</tr>
		<tr>
			<td class="alignCenter bg-clearBlue">SUN</td>
			<td class="alignCenter bg-clearBlue">MON</td>
			<td class="alignCenter bg-clearBlue">TUE</td>
			<td class="alignCenter bg-clearBlue">WED</td>
			<td class="alignCenter bg-clearBlue">THU</td>
			<td class="alignCenter bg-clearBlue">FRI</td>
			<td class="alignCenter bg-clearBlue">SAT</td>
		</tr>
		<tr>
			<?php 
				$days = array(1,2,3,4,5,6,7);
				$days = explode(',', $workTemp->getTemplate());
				$dayname = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
				foreach($days as $k=> $day):
			?>
					<td >
						<div class="tile half bg-blue">
							<div class="tile-content icon">
								<h2 class="fg-white alignCenter" ><?php echo $days[$k]?></h2>
							</div>
						<div class="brand">
						<span class="name alignRight">Hrs<?php //echo $dayname[$k]?></span>
						</div>
						</div>
					</td>
			<?php endforeach; ?>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>WorkSchedule</label></td>
	<td class=""><label><?php echo $workTemp->getWorktempNo() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>Description</label></td>
	<td class=""><label><?php echo $workTemp->getDescription() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Shift</label></td>
	<td class=""><label><?php echo $workTemp->getAmPmEv() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>Off Day</label></td>
	<td class=""><label><?php echo $workTemp->getDayoffDay() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Meal Break</label></td>
	<td class=""><label><?php echo $workTemp->getMealbreak() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>Endurance</label></td>
	<td class=""><label><?php echo $workTemp->getEndurance() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Days / Month</label></td>
	<td class=""><label><?php echo $workTemp->getDaysPerMonth() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>Hours / Week</label></td>
	<td class=""><label><?php echo $workTemp->getHrsPerWeek() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Hours / Day</label></td>
	<td colspan="3" class=""><label><?php echo $workTemp->getHrsPerDay() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>OT 1 Multiplier</label></td>
	<td class=""><label><?php echo $workTemp->getOt1() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>OT 2 Multiplier</label></td>
	<td class=""><label><?php echo $workTemp->getOt2() ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>OT 3 Multiplier</label></td>
	<td class=""><label><?php echo $workTemp->getOt3() ?></label></td>
	<td class="bg-clearBlue alignRight span2" ><label>Min OT Hours</label></td>
	<td class=""><label><?php  echo $workTemp->getMinOt(); ?></label></td>
</tr>
<tr>
	<td class="bg-clearBlue alignRight span2" ><label>Allowance Days</label></td>
	<td class="">
	<?php 
		$days = $workTemp->getAllowanceDays();
		echo HTMLLib::CreateCheckBox('mo', 'MONDAY', (strpos($days, 'mo') !== false? 'checked' : '' ) );
		echo '<Br>';
		echo HTMLLib::CreateCheckBox('tu', 'TUESDAY', (strpos($days, 'tu') !== false? 'checked' : '' ));
		echo '<Br>';
		echo HTMLLib::CreateCheckBox('we', 'WEDNESDAY', (strpos($days, 'we') !== false? 'checked' : '' ));
		echo '<Br>';
		echo HTMLLib::CreateCheckBox('th', 'THURSDAY', (strpos($days, 'th') !== false? 'checked' : '' ));
	?>
	</td>
	<td colspan="2" class="" >
	<?php 		
		echo HTMLLib::CreateCheckBox('fr', 'FRIDAY', (strpos($days, 'fr') !== false? 'checked' : '' ));
		echo '<Br>';
		echo HTMLLib::CreateCheckBox('sa', 'SATURDAY', (strpos($days, 'sa') !== false? 'checked' : '' ));
		echo '<Br>';
		echo HTMLLib::CreateCheckBox('su', 'SUNDAY', (strpos($days, 'su') !== false? 'checked' : '' ));
		?></td>
</tr>
</table>
<?php endif; ?>