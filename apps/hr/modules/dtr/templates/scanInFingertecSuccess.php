<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<!--<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', 'dtr/scanIn') ?>
	LEAVE <small>Apply</small></h1>

--><div id="scanIn">
<script>
	function timedRefresh(timeoutPeriod) 
	{
		window.location = "<?php echo url_for('dtr/scanIn') ?>"
	}

	function refocus() 
	{
		$(document).ready(function(){
			$("#employee_no").focus();
			$("#employee_no").val('');
		});
	}
	
</script>

<form name="FORMadd" id="IDFORMadd"
	action="<?php echo url_for('dtr/scanIn') ?>"
	method="post">
	<table class="table bordered condensed">
	<tr>
		<td width='15%' rowspan="3" class="alignCenter">
  					<?php include_partial('telltime');?>
		</td>
	</tr>
	<tr >
		<td class="bg-clearBlue FORMcell-right span6" nowrap>
			<div class="span6 notice marker-on-bottom bg-darkOrange fg-white alignCenter">
				<h3>Company Clock:</h3>
				<br>Company clock is the current timing <br>
				used when clocking in the morning.  <br>
				Will take effect on ALL Employees.
				<h2>07:15:am is 08:00am</h2>
			</div>
		</td>
		<td rowspan="2" >
			<?php //var_dump(HrEmployeePeer::GetPhoto($sf_params->get('employee_no') ) ); exit(); ?>
			<?php
				//$id = HrEmployeePeer::GetIDByEmployeeNo($sf_params->get('employee_no'));
				$myphoto = HrEmployeePeer::GetPhoto($sf_params->get('id')); 
				echo link_to(image_tag('employee/' . $myphoto,'size="150x300"'),'#', 'id="uploadPhoto" ') ; 
			?>
		</td>
	</tr>
	<tr>
		<td class="bg-clearBlue"><label>
		<?php
			$nameString = ''; 
			echo HTMLLib::CreateInputText('employee_no', $sf_params->get('employee_no'), 'span4', '', ' autocomplete="off"');
			echo '&nbsp;&nbsp;&nbsp;';
			echo HTMLLib::CreateSubmitButton('saveScan', 'TimeIn / Out');
		  
		?></label>
		</td>
	</tr>
	
</table>
</form>

<?php 
    if (isset($pager)):
		$filename = hrPager::scanInPager($pager);
		$cols = array('seq', 'employee_no', 'name', 'time_in','time_out','duration', 'company', 'team', 'employment');
		//echo PagerJson::TableHeaderFooter($cols, $filename, '', sizeof($pager)); //create the table
		echo PagerJson::AkoDataTableForTicking($cols, $filename);
	endif;
?>
</div></div>
