<?php use_helper('Form', 'Javascript'); ?>

<SCRIPT Language="JavaScript">
<!--//
function setFocus(){
    $('empId').focus();
    textfieldFocus('empId');
}

function clearField(frm){
  frm.employee_no.value = ""
}


var clockID = 0;

function UpdateClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
   }

   var tDate = new Date(); 
   
   document.theClock.theTime.value = "" 
                                   + tDate.getHours() + ":" 
                                   + tDate.getMinutes() + ":" 
                                   + tDate.getSeconds();
   clockID = setTimeout("UpdateClock()", 1000);
}

function StartClock(ntime) {
   clockID = setTimeout("UpdateClock()", 500);
}

function KillClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
   }
}

//-->
</SCRIPT>


<?php 
//$xdate = date("F j, Y h:i:s");
//echo $xdate;
//echo javascript_tag("StartClock();");
//echo date('U');
//exit(); 
 
//<form name="theClock">
//<input type=text name="theTime" size=8>
//</form>
?>


<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dtr/emergencyScanIn'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td width = '35%' class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">IC #</td>
    <td class="FORMcell-right" nowrap>
    <?php
        $nameString = '';
        echo HTMLForm::Error('employee_no');
        echo input_tag('employee_no','', 'id="empId"  size="30"' );
        echo '&nbsp;&nbsp;&nbsp;';
        $qParams = "'empNo=' + \$F('empId')";
        $ajaxOption = array(
            'url'      => 'dtr/ajaxDtrEmergency',
            'with'     => $qParams,
            'update'   => 'scanInfo',
            'script'   => true,
            'loading'  => 'stop_remote_pager();',
            'before'   => 'showLoader();',
            'complete' => 'hideLoader();formatFormStyle();',
            'type'     => 'synchronous',
        );
        echo submit_tag('save',  array('onclick'=>remote_function($ajaxOption) . ';clearField(this.form);return false; ' )); 
        //echo submit_tag('xxx', array('onclick'=>'showAndClearField(this.form)' ));
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">NAME</td>
    <td class="FORMcell-right" nowrap>
    <div id='empName' class='tk-style28'>
    </div>
    </td>
</tr>
</table>
</form>
<div id="scanInfo">
<?php

if (isset($pager))
{
    $gridVars = array(
        'searchTemplate' => 'dtrsearch_list_header_search',
        'pagerTemplate' => 'dtrsearch_pager_list',
        'baseURL' => $sf_request->getModuleAction() . '?id=' . $sf_params->get('id'),
        'pager' => $pager,
        'searchContainerID' => XIDX::next(),
        'headers' => sfConfig::get('app_dtrsearch_grid_headers')
    );
    
    include_partial('global/datagrid/container', $gridVars );
}
?>
</div>

<?php echo javascript_tag("setFocus();"); ?>
