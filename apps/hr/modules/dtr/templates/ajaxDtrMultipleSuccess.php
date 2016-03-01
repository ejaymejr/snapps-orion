<?php use_helper('Javascript'); ?>


<SCRIPT Language="JavaScript">
<!--//
function setFocus(){
    $('empId').focus();
    textfieldFocus('empId');
}

function clearField(frm){
  frm.employee_no.value = ""
}
//-->
</SCRIPT>

<?php
    //echo javascript_tag('frm.employee_no.value = ""');

    $gridVars = array(
        'searchTemplate' => 'multipledtrsearch_list_header_search',
        'pagerTemplate' => 'multipledtrsearch_pager_list',
        'baseURL' => $sf_request->getModuleAction() . '?id=' . $sf_params->get('id'),
        'pager' => $pager,
        'searchContainerID' => XIDX::next(),
        'headers' => sfConfig::get('app_dtrmultiplesearch_grid_headers')
    );
    
    include_partial('global/datagrid/container', $gridVars );
    
   echo javascript_tag("\$('empName').innerHTML='" . escape_javascript($empName) . "';");
   
   echo javascript_tag("setFocus();");