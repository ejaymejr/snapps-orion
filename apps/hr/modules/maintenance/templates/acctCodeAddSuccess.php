<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">   
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/acctCodeAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table class="bordered condensed table" > 
<tr>
	<td colspan="2"></td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight span2" nowrap>Account Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('acct_code');
    echo HTMLLib::CreateInputText('acct_code',  $sf_params->get('acct_code'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Description</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('description');
    echo HTMLLib::CreateInputText('description',  $sf_params->get('description'), 'span3');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Remarks</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('remarks');
    echo HTMLLib::CreateInputText('remarks',  $sf_params->get('remarks'), 'span3');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Include in CPF Computation</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('cpf');
    echo HTMLLib::CreateSelect('cpf', $sf_params->get('cpf'), array('YES'=>'YES', 'NO'=>'NO'), 'span1' );
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