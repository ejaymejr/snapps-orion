<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('maintenance/fiscalYearAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed">
<tr>
    <td class="bg-clearBlue alignRight">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Fiscal Year</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('fiscal_year'); 
    echo HTMLLib::CreateInputText('fiscal_year', $sf_params->get('fiscal_year'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Previous Year</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateSelect('previous_year', $sf_params->get('previous_year'), HrFiscalYearPeer::OptPreviousYear(), 'span1');   
    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Start Date</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo HTMLLib::CreateDateInput('start_date', $sf_params->get('start_date'), 'span2');
   ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">End Date</td>
    <td class="FORMcell-right" nowrap>
    <?php
   		echo HTMLLib::CreateDateInput('end_date', $sf_params->get('end_date'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Remarks</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('remarks'); 
        echo HTMLLib::CreateTextArea('remarks',  $sf_params->get('remarks'), 'span5');
    ?>
        <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight">Current</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateSelect('is_current', $sf_params->get('is_current'), HrFiscalYearPeer::OptIsCurrent(), 'span1');   
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