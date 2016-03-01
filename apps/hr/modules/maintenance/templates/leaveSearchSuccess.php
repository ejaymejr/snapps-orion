<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div class="grid-toolbar-2">                       
<?php echo HTMLForm::DrawButton('pushbutton1', 'button1', 'Define New Leave', url_for('maintenance/leaveAdd')); ?>
<?php echo HTMLForm::DrawButton('pushbutton2', 'button1', 'Define Individual Leave', url_for('maintenance/individualLeaveSearch')); ?>
<?php 
	if ($sf_user->getUsername() ):
		echo HTMLForm::DrawButton('pushbutton3', 'button1', 'Initialize All Leave Credits', url_for('maintenance/leaveCreditProcessAll'));
		echo '<br><br>';
		echo ' &nbsp;Please Take Note that HR_INDIVIDUAL_LEAVE will be overwritten for those data modified under SYSTEM user';
		echo '<br>';
	endif; 
?>
</div>
<?php
$gridVars = array(
    'searchTemplate' => 'leave_list_header_search',
    'pagerTemplate' => 'leave_pager_list',
    'baseURL' => $sf_request->getModuleAction(),
    'pager' => $pager,
    'searchContainerID' => XIDX::next(),
    'headers' => sfConfig::get('app_leave_grid_headers')
);
include_partial('global/datagrid/container', $gridVars);