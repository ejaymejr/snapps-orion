<?php use_helper('Form', 'Javascript'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/teamMemberAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel">Team</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('team'); 
        echo select_tag('team', 
             options_for_select(sfConfig::get('MCSTeam'), 
             $sf_params->get('team') ) );    
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('employee_no'); 
        echo select_tag('employee_no', 
             options_for_select(HrEmployeePeer::GetEmployeeNameList(2), 
             $sf_params->get('employee_no') ) );    
    ?>
    </td>
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="search" value=" Add Member " class="submit-button">
    </td>
</tr>
</table>
</form>


<?php
//<input type="submit" name="process" value=" Process DTR " class="submit-button">

//if (isset($pager))
//{
//    $gridVars = array(
//        'searchTemplate' => 'proofpayslip_list_header_search',
//        'pagerTemplate' => 'proofpayslip_pager_list',
//        'baseURL' => $sf_request->getModuleAction() . '?search=1&refDate='.$sf_params->get('pdate').'&comp='.$sf_params->get('company').'&id=' . ($sf_params->get('id')? $sf_params->get('id'): '0') ,
//        'pager' => $pager,
//        'searchContainerID' => XIDX::next(),
//        'headers' => sfConfig::get('app_dtrprooflist_grid_headers')
//    );
//    
//    include_partial('global/datagrid/container', $gridVars );
//}
