<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('contribution/cpfGovtRuleAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table class="table bordered condensed" >

<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td width="70%" class="FORMcell-right" nowrap></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Company Type</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo $sf_params->get('company_type')
//    echo HTMLForm::Error('company_type');
//    echo input_tag('company_type',  $sf_params->get('company_type'), 'size="25"');
    ?>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>CPF Year</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('cpf_year',  $sf_params->get('cpf_year'), 'span2');
    echo HTMLLib::CreateInputText('page',  $sf_params->get('page'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Description</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('description',  $sf_params->get('description'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Effectivity From</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateDateInput('from_date', $sf_params->get('from_date'), 'span2');
    ?>
    &nbsp;&nbsp;to&nbsp;&nbsp;
    <?php
	echo HTMLLib::CreateDateInput('to_date', $sf_params->get('to_date'), 'span2');
    ?>
    
    <span class="negative">*</span>
    <span class="positive">- effectivity date start
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Age From</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('age_min',  $sf_params->get('age_min'), 'span2');
    ?>
    &nbsp;&nbsp;to&nbsp;&nbsp;
    <?php
    echo HTMLLib::CreateInputText('age_max',  $sf_params->get('age_max'), 'span2');
    ?>    
    <span class="negative">*</span>
    <span class="positive">- age bracket
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>NetPay Min</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('pay_min',  $sf_params->get('pay_min'), 'span2');
    ?>
    &nbsp;&nbsp;Net Pay Max&nbsp;&nbsp;
    <?php
    echo HTMLLib::CreateInputText('pay_max',  $sf_params->get('pay_max'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- minimum net pay /take-home pay bracket
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Total CPF</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('er_share',  $sf_params->get('er_share'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- employer share
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Employee Share</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('em_share',  $sf_params->get('em_share'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- employee share
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Ordinary</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('ordinary',  $sf_params->get('ordinary'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- ordinary account
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Special</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('special',  $sf_params->get('special'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- special account
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Medisave</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('medisave',  $sf_params->get('medisave'), 'span2');
    ?>
    <span class="negative">*</span>
    <span class="positive">- medisave
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Employeer Share</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateTextArea('er_formula',  $sf_params->get('er_formula'), 'span6');
    ?>
    <span class="negative">*</span>
    <span class="positive"><br>- please paste/key-in the original statement/rule here
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Employee Share</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateTextArea('em_formula',  $sf_params->get('em_formula'), 'span6');
    ?>
    <span class="negative">*</span>
    <span class="positive"><br>- please paste/key-in the original statement/rule here
    </span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>CPF Batch</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('cpf_batch',  $sf_params->get('cpf_batch'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="save" value=" Save Details " class="success">
    </td>
</tr>
</table>
</form>
</div>