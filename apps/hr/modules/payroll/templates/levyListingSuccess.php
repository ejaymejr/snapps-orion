<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<!-- .'&momgroup=' . $sf_params->get('momgroup') -->
<form id="FormEmployeeLevy" name="FormEmployeeLevy" method="post" action="<?php echo url_for('payroll/levyListing') .'?period_code='. $sf_params->get('period_code') ?>" >
<?php echo HTMLLib::CreateBackBanner('', 'LEVY', 'Employee List') ?>
<table class="table condensed bordered">
	<tr>
		<td>
		<nav class="breadcrumbs small">
			<ul>
			<li><a href="<?php echo url_for('payroll/generateLevyListing?period_code='.$sf_params->get('period_code') ) ?>">Generate Listing</a></li>
			<li><a href="<?php echo url_for('payroll/addLevyListing?period_code='.$sf_params->get('period_code') ) ?>">Add Employee</a></li>
			<li><a href="<?php echo url_for('payroll/printLevyListing?period_code='.$sf_params->get('period_code') )?>">Print List</a></li>
			<li><a href="<?php echo url_for('payroll/newLevyRate?period_code='.$sf_params->get('period_code') ) ?>">Update Employee Info with new Levy Rate</a></li>
			<li class="active"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			</ul>
		</nav>
		</td>
	</tr>
</table>
<table class="table condensed bordered">
	<tr>
		<td class="bg-clearBlue span2 alignRight">FILTER</td>
		<td><?php echo HTMLLib::CreateSelect('momgroup', $sf_params->get('momgroup'), HrEmployeePeer::GetMomGroup(), 'span3' ); ?>
	</td>
	<tr>
		<td class="bg-clearBlue"></td>
		<td><input type="submit" class="success" name="filter" value="FILTER"></td>
	</tr>
</table>

<?php
if (isset($pager)):

    $filename = hrPager::LevyListing($pager, $sf_params->get('momgroup'));
	$cols = array('seq', 'action','employee_no', 'name', 'company', 'mom_group', 'period_code', 'amount', 'pass');
    //$cols = array('seq');
    echo PagerJson::AkoDataTableForTicking($cols, $filename, $sf_params->get('period_code'), '', sizeof($filename)); //create the table
endif;
?>

</div>

</form>


