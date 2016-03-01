<?php use_helper('Form', 'Javascript'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Add New Member to Teams',    url_for('dtr/teamMemberAdd')); ?>
</div>
<?php
if (isset($pager))
{
    $gridVars = array(
        'searchTemplate' => 'teammembersearch_list_header_search',
        'pagerTemplate' => 'teammember_pager_list',
        'baseURL' => $sf_request->getModuleAction()  ,
        'pager' => $pager,
        'searchContainerID' => XIDX::next(),
        'headers' => sfConfig::get('app_employeesearch_grid_headers')
    );
    
   include_partial('global/datagrid/container', $gridVars );
}
