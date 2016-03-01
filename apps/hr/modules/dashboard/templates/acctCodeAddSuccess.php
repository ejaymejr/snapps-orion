<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/acctCodeAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Account Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('acct_code');
    echo input_tag('acct_code',  $sf_params->get('acct_code'), 'size="25"');
//    echo select_tag('employee_no', 
//             options_for_select(HrEmployeePeer::GetEmployeeNameList(), 
//             $sf_params->get('employee_no') ) );
    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Description</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('description');
    echo input_tag('description',  $sf_params->get('description'), 'size="50"');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Remarks</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('remarks');
    echo input_tag('remarks',  $sf_params->get('remarks'), 'size="50"');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Include in CPF Computation</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('cpf');
    echo select_tag('cpf', 
         options_for_select(array('YES'=>'YES', 'NO'=>'NO'),$sf_params->get('cpf') ) , 
         $sf_params->get('cpf') ) ;
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