<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<?php //sfConfig::set('app_page_heading', '&nbsp;&nbsp;&nbsp;&nbsp;    Reports Printing'); ?>

<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('payroll/payslipNano?pcode=' . $sf_params->get('pcode')) ?>" method="post">                       
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
<!-- 		<input type="submit" name="generateList" value=" Generate Listing " class="success" >  -->
    	<input type="submit" name="updateList" value=" UpdateList Listing " class="success" >
<!--      	<input type="submit" name="printPayslip" value=" Print Payslip " class="success">  -->
<!-- 		<input type="submit" name="generateTxt" value=" Generate Text File " class="success">  -->
    </td>
</tr>
<?php echo input_tag('period_code', $sf_params->get('period_code'), 'type=hidden'); ?> 
</form>

<?php
if (isset($pager)):
    $filename = hrPager::NanocleanPayslip($pager);
	$cols = array('seq','action','employee_no', 'name', 'company', 'period', 'amount');
    echo PagerJson::ShowInFlatTable($cols, $filename, strtoupper(DateUtils::DUFormat('F Y', HrLib::PeriodStartDate($sf_params->get('period_code')) )) .' PAYROLL PERIOD');
endif;
?>

</div>