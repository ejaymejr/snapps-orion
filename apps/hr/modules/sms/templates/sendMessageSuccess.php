<?php sfConfig::set('app_page_heading', 'Send Message'); ?>
<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', 'sms/inboxSearch') ?>
	SMS <small>Send </small></h1>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('sms/sendMessage'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table condensed bordered">
<tr>
    <td width="200" class="FORMcell-left FORMlabel" nowrap>Name</td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php 
    	echo AjaxLib::AjaxScriptOnChange('employee_no', 'sms/ajaxGetContactNo', 'employee_no', '', 'DIVContactNo');
    	echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameList(), 'span5');
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Mobile #</td>
    <td colspan="5" class="FORMcell-right" nowrap>+65 &nbsp;
    	<div id="DIVContactNo">
	    	<?php echo input_tag('contact_no',  $sf_params->get('contact_no'), 'size="30"'); ?>
        </div>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>message</td>
    <td colspan="3" class="FORMcell-right" nowrap>
    <?php
        echo textarea_tag('message',  $sf_params->get('message'), 'size=50x5'); 
    ?>
    <span class="negative">*</span>    
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="send" value=" Send SMS " class="success">
    </td>
</tr>
</table>
</form>
</div>
