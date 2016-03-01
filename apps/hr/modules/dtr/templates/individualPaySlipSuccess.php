<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/individualPaySlip') ?>" method="post">
<table class="table bordered condensed" >
<th colspan="3"><h2>SHOW PAYSLIP</h2></th>
<tr>
    <td class="bg-clearBlue alignRight">Source</td>
    <td class="" nowrap>
    <?php
        $bankCash = array('BANK'=>' - BANK - ', 'CASH'=>' - CASH - ', 'CHEQUE'=>' - CHEQUE - ', 'ALL'=>' - ALL - ');  
        echo HTMLLib::CreateSelect('bank_cash',  $sf_params->get('bank_cash'), $bankCash, 'span2');
    ?>
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Period Code</td>
    <td class="" nowrap>
    <?php
        echo AjaxLib::AjaxScriptOnChange('period_code', 'dtr/ajaxEmpList', 'period_code', '', 'DIVajaxEmpList');  
    	echo HTMLLib::CreateSelect('period_code',  $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span3');
             ?>
    <span class="negative">*</span>
    </td>
</tr>


<tr>
    <td class="bg-clearBlue alignRight">Employee No</td>
    <td class="" nowrap><div id="DIVajaxEmpList">
    <?php  
        echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameList(), 'span4');
             
    ?>
    </div>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td class="" nowrap>
    <input type="submit" name="show" value=" Preview " class="success">
    </td>
</tr>
</table>
</form>
</div>