<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/holidayAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table condensed bordered">
<tr>
    <td class="bg-clearBlue alignRight">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Holiday Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('holiday_code'); 
    echo HTMLLib::CreateInputText('holiday_code', $sf_params->get('holiday_code'), 'span4');
     ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Description</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('holiday'); 
        echo HTMLLib::CreateInputText('holiday', $sf_params->get('holiday'), 'span4'); ?>
        <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Date</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo HTMLLib::CreateDateInput('date_hol', $sf_params->get('date_hol'), 'span2');
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