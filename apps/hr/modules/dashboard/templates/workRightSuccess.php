<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dashboard/workRight'). '?id=' . $sf_params->get('id');?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Period Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('period_code');
//    echo input_tag('acct_code',  $sf_params->get('acct_code'), 'size="25"');
	   echo select_tag('period_code', 
	            options_for_select(PayEmployeeLedgerArchivePeer::GetPeriodList('2013'), 
	            $sf_params->get('period_code') ) );
    echo HTMLForm::Error('year');
	echo select_tag('citizenship_er_form',
			options_for_select(array('SPR'=>'SPR', 'FOREIGN'=>'FOREIGN'),
					$sf_params->get('citizenship_er_form') ) );
    ?>
    &nbsp;<input type="submit" name=employeeRecordForm value=" Employee Record Form " class="submit-button">
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Year</td>
    <td class="FORMcell-right" nowrap>
    <?php
//     echo HTMLForm::Error('year');
// 	   echo select_tag('year', 
// 	            options_for_select(HrFiscalYearPeer::GetFiscalYearListYK(), 
// 	            $sf_params->get('year') ) );

// 	echo select_tag('citizenship',
// 			options_for_select(array('SPR'=>'SPR', 'FOREIGN'=>'FOREIGN'),
// 					$sf_params->get('citizenship') ) );

    
    ?>
<!--     &nbsp;<input type="submit" name="12hoursTabulated" value=" Show > 12 hrs Tabulated " class="submit-button"> -->
    <span class="negative"></span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <?php if( $sf_user->getUsername() == 'emmanuel' ): ?>
	<input type="submit" name=runquery value=" Run Query " class="submit-button"> 
	<?php endif; ?>
    <span class="negative"></span>
    </td>
</tr>
</table>
</form>

<?php if (isset($hours12 )) include_partial('12_hours_worker') ?>
<?php if (isset($hours12Tabulated )) include_partial('12_hours_tabulated') ?>
<?php if (isset($employeeRecordForm )) include_partial('employee_record_form') ?>
<?php if (isset($employeeOTPay )) include_partial('employee_ot_pay') ?>