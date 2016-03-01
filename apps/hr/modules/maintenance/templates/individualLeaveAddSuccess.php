<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/individualLeaveAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('employee_no');
    echo select_tag('employee_no', 
             options_for_select(HrEmployeePeer::GetEmployeeNameList(), 
             $sf_params->get('employee_no') ) );
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Leave Type</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('leave_id');
    echo select_tag('leave_id', 
             options_for_select(HrLeavePeer::OptLeaveType(), 
             $sf_params->get('leave_id') ) );
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Days Entitled</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('days_entitled');
    echo input_tag('days_entitled',  $sf_params->get('days_entitled'), 'size="10"');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Status</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('status');
    echo select_tag('status', 
             options_for_select(HrLeavePeer::OptionStatus(), 
             $sf_params->get('status') ) );
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Fiscal Year</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo sfConfig::get('fiscal_year');
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo checkbox_tag('update_current', true, true);
    ?>
    <span class="positive">Include Current Year?</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="save" value=" Save Details " class="submit-button">
    </td>
</tr>
</table>
</form>