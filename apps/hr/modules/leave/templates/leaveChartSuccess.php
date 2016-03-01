<?php sfConfig::set('app_page_heading', 'Leave Request Form'); ?>
<?php use_helper('Validation', 'Javascript') ?>
<?php 
	$companyList = HrCompanyPeer::GetCompanyList();
?>
<div class="contentBox">
<form name="FORMadd" autocomplete="off" id="IDFORMadd"
	action="<?php echo url_for('leave/leaveChart'). '?id=' . $sf_params->get('id');?>"
	method="post">
<div class="panel" data-role="panel">
<div class="panel-header bg-orange fg-white">
LEAVE CHART SHEET
</div>
<div class="panel-content">	
	
	<table class="table condensed bordered">
		<tr>
			<td width="150px" class="FORMcell-left FORMlabel" nowrap><label>Company</label></td>
			<td colspan="5" class="FORMcell-right" nowrap><?php
			echo HTMLLib::CreateSelect('company', $sf_params->get('company'), $companyList, 'span2');
			
			?> <span class="negative">* &nbsp;&nbsp; </span></td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel" nowrap><label>Month</label></td>
			<td colspan="5" class="FORMcell-right" nowrap><?php 
			echo HTMLLib::CreateSelect('cmonth', $sf_params->get('cmonth'), sfConfig::get('monthlyCalendar'), 'span2');
			echo HTMLLib::CreateSelect('year', $sf_params->get('year'), HrFiscalYearPeer::GetFiscalYearListYK(), 'span1');
			?> 
			</td>
		</tr>
			<tr>
			<td class="FORMcell-left FORMlabel" nowrap><label>&nbsp;</label></td>
			<td colspan="5" class="FORMcell-right" nowrap><?php 
			echo HTMLLib::CreateSubmitButton('show_leave', 'Show Leave');
			
			?></td>
		</tr>
	</table>
</div>
</div>

</form>
<table class="table condensed bordered striped hovered">
	<tr>
		<td class="bg-orange alignCenter" colspan="35"><h4 class="fg-white"><?php echo DateUtils::DUFormat('F Y', $sf_params->get('cdate') ) ?></h4></td>
	</tr>
	<tr>
		<td rowspan="2" class="span1 alignCenter"><small>SEQ</small></td>
		<td rowspan="2" class="span12 alignCenter"><small>NAME</small></td>
		<?php 
			$days = DateUtils::DUFormat('t', $sf_params->get('cdate'));
		?>
		<?php for($x=1; $x<=$days; $x++): ?>
		<td class="span1 alignCenter bg-clearBlue"><small><?php echo str_pad($x, 2, '0', STR_PAD_LEFT) ?></small></td>
		<?php endfor;?>
	</tr>
	<tr>
		<?php 
			for($x=1; $x<=$days; $x++): 
				$cday = DateUtils::AddDate($sf_params->get('cdate'), $x - 1);
				$whatDay = DateUtils::DUFormat('D', $cday);
				$satSun = 'bg-white';
				if ($whatDay == 'Sat' || $whatDay == 'Sun'):
					$satSun = "bg-clearBlue ";
				endif;
		?>
		<td class="span1 alignCenter <?php echo $satSun ?>"><small><?php echo substr($whatDay, 0, 1 ); ?></small></td>
		<?php endfor;?>
	</tr>
	<?php 
	$rowCount = sizeof($empList);
	$seq = 1;
	foreach ( $empList as $empNo => $name):  
	?>
	<tr>
		<td class=""><small><?php echo $seq++; ?></small></td>
		<td class=""><small><?php echo substr($name, 0, 15)  ?></small></td>
		<?php 
			for($x=1; $x<=$days; $x++): 
				$cday = DateUtils::AddDate($sf_params->get('cdate'), $x - 1);
				$whatDay = DateUtils::DUFormat('D', $cday);
				$satSun = 'bg-white';// 'bg-white fg-white';
				$label = '';
				$tooltip = '';
				if ($whatDay == 'Sat' || $whatDay == 'Sun'):
					$satSun = "bg-clearBlue fg-white";
				endif;
				$leave = HrEmployeeLeavePeer::IsOnleave($empNo, $cday);
				if ($leave):
					$isOnleave = 'bg-lightGreen fg-white';
					$label = substr($leave->getLeaveType(), 0, 1);
					$tooltip = 'data-hint="Leave Type|'.$leave->getLeaveType().'<br>'.DateUtils::DUFormat('d M, y', $cday).'" data-hint-position="bottom"'; 
					$satSun = '';
				endif;
		?>
		<td  class="span1 alignCenter <?php echo $satSun . $isOnleave ?>"><small <?php echo $tooltip ?> ><?php echo $label ?></small></td>
		<?php endfor;?>
	</tr>
	<?php endforeach; ?>
</table>
</div>