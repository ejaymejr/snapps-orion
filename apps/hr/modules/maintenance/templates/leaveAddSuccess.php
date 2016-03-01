<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/leaveAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Leave Type</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('leave_type'); 
    echo input_tag('leave_type', $sf_params->get('leave_type'), 'size="15"'); ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Description</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('description'); 
        echo input_tag('description',  $sf_params->get('description'), 'size="40"'); ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Days Entitled</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('days_entitled'); 
        echo input_tag('days_entitled',  $sf_params->get('days_entitled'), 'size="10"'); ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Remarks</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('remarks'); 
        echo select_tag('remarks', 
             options_for_select(HrLeavePeer::GetOptionRemarks(), 
             $sf_params->get('remarks') ) );    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
<td class="FORMcell-left FORMlabel">Status</td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('status'); 
        echo select_tag('status', 
             options_for_select(HrLeavePeer::GetOptionStatus(), 
             $sf_params->get('status') ) );    
    ?>
    <span class="negative">*</span>        
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

