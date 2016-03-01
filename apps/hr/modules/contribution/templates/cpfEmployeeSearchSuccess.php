<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Add New Employee with CPF Contribution',    url_for('contribution/cpfEmpContribAdd')); ?>
</div>
<?php
$gridVars = array(
    'searchTemplate' => 'cpfemp_list_header_search',
    'pagerTemplate' => 'cpfemp_pager_list',
    'baseURL' => $sf_request->getModuleAction(),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_cpfemp_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);