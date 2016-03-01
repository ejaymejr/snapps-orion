<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Add Power Reading', url_for('expenses/powerConsumptionAdd')); ?>
<?php echo HTMLForm::DrawButton('pushbutton2', 'button1', 'Power Usage Chart', url_for('expenses/powerConsumptionChart')); ?>
</div>
<?php
$gridVars = array(
    'searchTemplate' => 'pconsume_list_header_search',
    'pagerTemplate' => 'pconsume_pager_list',
    'baseURL' => $sf_request->getModuleAction(),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_powerusage_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);