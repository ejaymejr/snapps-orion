<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', '') ?>
	EMPLOYEE <small>PAYSLIP PRINTING</small></h1>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('employee/individualPayslip') ?>" method="post">
<table class="table bordered condensed ">
<tr>
    <td class="bg-clearBlue alignRight">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Source</td>
    <td class="FORMcell-right" nowrap>
    <?php
        $bankCash = array('BANK'=>' - BANK - ', 'CASH'=>' - CASH - ', 'CHEQUE'=>' - CHEQUE - ', 'ALL'=>' - ALL - ');  
       	echo HTMLLib::CreateSelect('bank_cash', $sf_params->get('bank_cash'), $bankCash, 'span2');
    ?>
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Employee No</td>
    <td class="FORMcell-right" nowrap><div id="DIVajaxEmpList">
    <?php
        echo HTMLForm::Error('employee_no'); 
        echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), PayEmployeeLedgerArchivePeer::GetEmployeeListBlank(), 'span4');
        //echo AjaxLib::AjaxScriptOnChange('employee_no', 'employee/ajaxPeriodList', 'employee_no','', 'DIVajaxPeriodList');
    ?>
    </div>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Period Code</td>
    <td class="FORMcell-right" nowrap><div id="DIVajaxPeriodList">
    <?php
   	 	echo HTMLLib::CreateSelectMultiple('period_code', $sf_params->get('period_code'), $list, 'span3' );
    ?>
    <input type="submit" name="show_period" value=" Show Period " class="success">
    </div></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="print_payslip" value=" Preview " class="success">
    <input type="submit" name="show_sms_payslip" value=" Show SMS Payslip " class="success">
    </td>
</tr>
</table>
</form>

<?php 
	if (isset($pager))
	{
	    $filename = hrPager::SmsMessageOut($pager);
		$cols = array('seq', 'receiver', 'msg', 'senttime');
		echo PagerJson::AkoDataTableForTicking($cols, $filename, 'SMS SENT', '', 10); //create the table
	}
?>
</div>