<?php 
	$empDetail = HrEmployeePeer::GetDatabyEmployeeNo($currentEmployee);
	$name = '';
	if ($empDetail):	
		$name = $empDetail->getName();
		$emp = $empDetail->getEmployeeNo();
		$currentMonth = HrCurrentMonthPeer::GetCurrent();
		$sdt = $currentMonth['start'];
		$edt = $currentMonth['end'];
		
		$c = new Criteria();
		$c->add(TkDtrsummaryPeer::TRANS_DATE,  'DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . TkDtrsummaryPeer::TRANS_DATE . ') <= \'' . $edt . '\'', TkDtrsummaryPeer::CUSTOM);
		$c->add(TkDtrsummaryPeer::EMPLOYEE_NO, $emp );
		$c->addDescendingOrderByColumn(TkDtrsummaryPeer::TRANS_DATE);
		$pager = TkDtrsummaryPeer::doSelect($c);
		
		$cols = array('seq', 'action', 'name', 'time_in', 'time_out', 'hrs', 'meal', 'dura', 'req', 'ot', 'ut', 'mult', 'holiday', 'leave_type', 'd-off', 'amount', 'rate_hr', 'pt_inc', 'm_all', 'levy', 'att');
		$content = hrPager::DtrPager($pager);
		//HTMLLib::vardump($filename);
		if ($content):
			echo PagerJson::ShowInFlatTable($cols, $content, $name . ' TIMESHEET', array('meal', 'comp_dura', 'ot','att'));
		else:
			echo '<h2><strong>'.$name.'</strong> has <strong class="fg-red">NO ATTENDANCE</strong><br>('.TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($emp).')</h2><br>';
			
		endif;

		$ot1 = 0;
		$ot2 = 0;
		$ot3 = 0;
		$rph = 0;
		foreach($content as $r):
		switch(strip_tags($r['mult']) )
		{
			case 1.5:
				$ot1 = $ot1 + strip_tags($r['ot']);
				break;
			case 2.0:
				$ot2 = $ot2 + strip_tags($r['ot']);
				break;
			case 2.5:
				$ot3 = $ot3 + strip_tags($r['ot']);
				break;
		}
		if (strip_tags($r['rate_hr']) > 0 && $rph == 0 ):
		$rph = strip_tags($r['rate_hr']);
		endif;
		// highlight undertime
		if ( (strval(strip_tags($r['ut'])) < -5) && (strval(strip_tags($r['amount'])) < 0) ):
		?>
		   			<script>
		   				$('#tr_<?php echo strip_tags($r['record_id']) ?>').addClass('bg-clearOrange ');
					</script>
					<?php 
		   		endif;
		   		
		   			// highlight no scan in
		   		if ( (strval(strip_tags($r['ut'])) >= -5) && (strval(strip_tags($r['amount'])) < 0) ):
		   			?>
		   			<script>
		   				$('#tr_<?php echo strip_tags($r['record_id']) ?>').addClass('bg-clearRed ');
					</script>
					<?php 
		   		endif;
		   endforeach;
		
		?>
		<!-- change the vertical color -->
		<script>
			//$('.td_normal').addClass('bg-clearBlue alignCenter');
			$('.td_ot').addClass('bg-clearOrange alignCenter');
			$('.td_action').addClass('alignCenter');
			$('.td_hrs').addClass('alignRight');
			$('.td_meal').addClass('alignRight');
		</script>
<?php 
	endif;
?>