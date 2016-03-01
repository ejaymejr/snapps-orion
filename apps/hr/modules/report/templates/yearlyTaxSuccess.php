<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('', 'IRAS', 'Submission') ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/yearlyTax'). '?id=' . $sf_params->get('id');?>" method="post">
<div class="panel">
<div class="panel-header bg-lightBlue fg-white">
	SELECT YEAR TO PROCESS
</div>
<div class="panel-content">
	<table class="table condensed bordered"> 
	<tr>
	    <td class="text-right bg-clearBlue" nowrap>Year</td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	    	echo HTMLLib::CreateSelect('year', $sf_params->get('year'), HrFiscalYearPeer::GetFiscalYearListYK(), 'span2');
	    ?>
	    </td>
	</tr>
	<tr>
	    <td class="text-right bg-clearBlue" nowrap></td>
	    <td class="FORMcell-right" nowrap>
	    <input class="success" type="submit" id="process_tax" name=process_tax value="Show Monthly Tax" />
	    <input class="success" type="submit" id="generate_employee_tax" name="generate_employee_tax" value="Generate Employee Tax" />
	    <input class="success" type="submit" id="generate_tax_file" name="generate_tax_file" value="Generate Tax File" />
<!--	    <a href="<?php echo url_for('report/CreateTaxTxtFile?year=' . $sf_params->get('year') ) ?>" class="success">Generate Tax File</a>-->
	    </td>
	</tr>
	</table>
</div>
</div>
</form>

<?php if (isset($pager)): ?>
<div class="panel">
<div class="panel-header bg-lightBlue fg-white">
	PAYROLL PERIOD LIST
</div>
<div class="panel-content">
	<?php 
	    $filename = hrPager::IRASSubmissionPeriodList($pager);
		$cols = array('seq', 'action','month', 'period_code', 'from', 'to');
		echo PagerJson::AkoDataTableForTicking($cols, $filename,'','', 12); //create the table
	?>
</div>
<?php endif; //pager?>
</div>

</div>