<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Add Personalize Leave', url_for('maintenance/individualLeaveAdd')); ?>
</div>
<?php
$gridVars = array(
    'searchTemplate' => 'individual_list_header_search',
    'pagerTemplate' => 'individual_pager_list',
    'baseURL' => $sf_request->getModuleAction(),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_individualleave_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);