<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div class="grid-toolbar-2">                       
<h1>HR ACTIVITY LOG</h1>
</div>
<?php
//HrLib::UpdateHrLogTarget();
$gridVars = array(
    'searchTemplate' => 'hrlog_list_header_search',
    'pagerTemplate' => 'hrlog_pager_list',
    'baseURL' => $sf_request->getModuleAction(),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_hrlog_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);