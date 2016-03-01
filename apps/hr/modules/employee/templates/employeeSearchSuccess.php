<?php use_helper('Validation', 'Javascript') ?>
<!--<div class="contentBox">-->
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/employeeSearch') ?>" method="post"
	 >
<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', '') ?>
	EMPLOYEE <small>SEARCH</small></h1>
<table class="table bordered condensed">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><a href="#">Home</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('employee/employeeAdd') ?>" class="" >Add New Employee</a></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav>
	</td>
</tr>
<tr>
	<td class="alignRight bg-clearBlue span3"><label>STATUS</label></td>
	<td class="">
		<?php echo HTMLLib::CreateSelect('status', $sf_params->get('status'), array('Work Status' => array('A' => 'ACTIVE', '' => 'ALL') ), 'span2'); ?>
		&nbsp;<input id="filter_status" name="filter_status" type="submit" class="success" value=" SHOW FILTER" />
	</td>
</tr>
</table>
</form>
<?php 
if (isset($pager))
{
    $filename = hrPager::SearchEmployee($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'employee_no', 'name', 'company', 'account_no', 'joined-date', 'work-schedule', 'type', 'mom', 'race');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
<!--</div>-->
