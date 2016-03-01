<?php use_helper('Form', 'Javascript'); ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('payroll/scheduledIncomeSearch') ?>" method="post">

<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('', 'INCOME', 'Additional') ?>

<table class="table bordered condensed">
<tr>
	<td>
		<nav class="breadcrumbs">
			<ul>
			<li class=" "><a id="save" href="<?php echo url_for('payroll/scheduledIncomeAdd') ?>" class="" >Add Income</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('payroll/scheduledIncomeDeleteAll') ?>" class="" onclick="return confirm('are you sure?')" >Delete Entry</a></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav>
	</td>
</tr>
<tr>
	<td class="">
		<?php 
			echo HTMLLib::CreateSelect('company', $sf_params->get('company'), HrCompanyPeer::GetCompanyList(), 'span3' );
			//echo HTMLLib::CreateSubmitButton('filter_company', 'SHOW PER COMPANY');
			?>
		<input type="submit" id="filter_company" name="filter_company" value="SHOW PER COMPANY" class="success">
	</td>
	<td class="span4"></td>
</tr>
</table>

<?php
if (isset($pager)):
    $filename = hrPager::ScheduledIncomeSearch($pager);
	$cols = array('seq', 'action', 'employee_no','name', 'company', 'description', 'amount', 'from', 'to');
    //$cols = array('seq');
    echo PagerJson::ShowInFlatTable($cols, $filename, 'OTHER INCOME', array('amount')); //create the table
endif;
?>
</div>
<script>
$('.td_amount').addClass(' alignRight');
</script>
</form>