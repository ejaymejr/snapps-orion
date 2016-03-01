<?php use_helper('Form', 'Javascript'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Print', url_for('payroll/printPaysliptoPdf?id='.$sf_params->get('id'))); ?>
</div>
<?php

$gridVars = array(
    'searchTemplate' => 'proofpayslip_list_header_search',
    'pagerTemplate' => 'proofpayslip_pager_list',
    'baseURL' => $sf_request->getModuleAction() . '?id=' . $sf_params->get('id'),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_dtrprooflist_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);
//include_partial('payroll/payslipproof');

