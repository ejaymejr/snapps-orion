<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/dummyPayslip') ?>" method="post">
<table width="100%" class="table" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>

<tr>
    <td class="FORMcell-left FORMlabel">Period Code</td>
    <td class="FORMcell-right" nowrap><?php echo HTMLLib::CreateDateInput('cmonth', $sf_params->get('cmonth'),'span2' ) ?>
    <span class="negative"> *</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php 
    	echo input_tag('employee_no', $sf_params->get('employee_no') ); 
    	echo input_tag('name', $sf_params->get('name') , 'size="50"' );
    ?>
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Basic Pay</td>
    <td class="FORMcell-right" nowrap>
    <?php echo input_tag('basic_pay', $sf_params->get('basic_pay')); ?>
    
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>CPF Employee</td>
    <td class="FORMcell-right" nowrap>
    <?php echo input_tag('cpf_em', $sf_params->get('cpf_em')); ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>CPF Employer</td>
    <td class="FORMcell-right" nowrap>
    <?php echo input_tag('cpf_er', $sf_params->get('cpf_er')); ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>CDAC</td>
    <td class="FORMcell-right" nowrap>
    <?php echo input_tag('cdac', $sf_params->get('cdac')); ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>BONUS</td>
    <td class="FORMcell-right" nowrap>
    <?php echo input_tag('bonus', $sf_params->get('bonus')); ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="show" value=" Preview " class="submit-button">
    
    </td>
</tr>
</table>
</form>
</div>