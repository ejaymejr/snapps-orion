<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('report/yearlyTax', 'INTERNAL BILLING', 'Preview') ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/internalBilling') ?>" method="post">
<table class="table condensed bordered">
<tr>
    <td class="alignRight bg-clearBlue">Period Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateSelect('period_code', $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span4'); 
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue">SDL Rounding Error</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('rounding_error', $sf_params->get('rounding_error'), 'span2');
    ?>
    <small class="negative"> MFG CPF + SVS CPF the difference <+/- $4> is Considered Rounding Error </small>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue">Penalty Interest</td>
    <td class="FORMcell-right" nowrap>
    <?php
        //echo input_tag('penalty_interest', $sf_params->get('penalty_interest') , 'size="10"');   
        echo HTMLLib::CreateInputText('penalty_interest', $sf_params->get('penalty_interest'), 'span2');
        
    ?>
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="printBilling" value=" Internal Billing " class="success" onclick="return confirm('LEVY Submission is done and i want to proceed... ');" >
    <?php 
//    echo '
//    <input type="submit" name="dinner" value=" Dinner List " class="submit-button">
//    <input type="submit" name="employment" value=" Employment Group " class="submit-button">
//    '; ?>
    
    </td>
</tr>

</table>
</form>
</div>

