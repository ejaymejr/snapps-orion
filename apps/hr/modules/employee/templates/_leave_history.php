<?php use_helper('Validation', 'Javascript') ?>
<?php include_partial('updateLeaveCredits')?>
<div class="grid">
 	<div class="row">
 		<div class="">
 			<div class="panel" data-role="panel">
				<div class="panel-header bg-green fg-white">
				LEAVE CREDITS
				</div>
				<div class="panel-content bg-clearBlue"><?php 
				if (isset($lcpager))
				{
				    $filename = hrPager::LeaveCreditsPager($lcpager);
					$cols = array('seq', 'leave_type', 'allocation', 'consumed', 'balance', 'fiscal_year');
					echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
				}
				?>
				</div>
			</div>	
 		</div>
 	</div>
 	
  	<div class="row">
 		<div class="">
 			<div class="panel" data-role="panel">
				<div class="panel-header  bg-green fg-white">
				LEAVE HISTORY
				</div>
				<div class="panel-content bg-clearBlue">
				<?php //var_dump($lhpager);exit(); ?>
				<?php 
				if (isset($lhpager))
				{
				    $filename = hrPager::LeaveHistory($lhpager);
					$cols = array('seq', 'leave', 'from', 'to', 'no_of_days', 'half_day');
					echo PagerJson::AkoDataTableForTicking($cols, $filename ); //create the table
				}
				?>
				</div>
			</div>	
 		</div>
 	</div>
 	
 	
</div>