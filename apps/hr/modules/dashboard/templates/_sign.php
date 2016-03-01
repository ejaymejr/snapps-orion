<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('reports/signPayslip'). '?id=' . $sf_params->get('id');?>" method="post">
<div><center>
<div id="DIVSmsIndividual">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" >
<tr>
    <td colspan="2" class="alignCenter tk-menu tableHeader"  height="23px" nowrap>PAYSLIP SIGNATURE</td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Period Code</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo select_tag('period_code', 
             options_for_select(PayEmployeeLedgerArchivePeer::GetPeriodCode(), 
             $sf_params->get('period_code') ) );
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Bank Cash</td>
    <td class="FORMcell-right" nowrap>
    <?php
    $bankCash = array('CASH'=>' -CASH-');
    echo select_tag('bank_cash', 
             options_for_select($bankCash, 
             $sf_params->get('bank_cash') ) );
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('company'); 
        echo select_tag('company', 
             options_for_select(HrCompanyPeer::OptCompanyNameListWithAll(), 
             $sf_params->get('company') ) );    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="createPDF" value=" Create PDF Files " class="submit-button">
        <!-- <input type="submit" name="createPDF" value=" Show Employee List " class="submit-button">  -->
    </td>
</tr>
</table>
</div>
<?php if (isset($pager)): ?>
<div id="DIVSmsBrowse">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" >
<tr>
    <td colspan="2" class="alignCenter tk-menu tableHeader"  height="23px" nowrap>Employee List</td>
</tr>
</table>
	<?php //include_partial('sms_list', array('pager'=>$pager));

		$gridVars = array(
		    'searchTemplate' => '',
		    'pagerTemplate' => 'signpayslipsearch_pager_list',
		    'baseURL' => $sf_request->getModuleAction(),
		    'pager' => $pager,
		    'searchContainerID' => XIDX::next(),
		    'headers' => sfConfig::get('app_signpayslip_grid_headers')
		);
		include_partial('global/datagrid/container', $gridVars);
		
 		
	?>
</div>

<?php endif; ?>
</center></div>
<div style="clear:both;"></div>

</form>