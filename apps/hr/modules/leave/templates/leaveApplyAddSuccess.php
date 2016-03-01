<?php sfConfig::set('app_page_heading', 'Leave Request Form'); ?>
<?php use_helper('Validation', 'Javascript') ?>
<?php //sfConfig::set('app_page_heading', 'Leave Request Form'); ?>
<div class="contentBox">
<div class="panel" >
<div class="panel-header bg-lightGreen fg-white">
	LEAVE APPLICATION
</div>
<div class="panel-content">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('leave/leaveApplyAdd'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table condensed bordered">
<tr>
    <td width="200" class="bg-clearBlue alignRight" nowrap><label><small>Employee No / Name</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    	<?php echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameList(), 'span4'); ?>
    <span class="negative">* &nbsp;&nbsp; </span><span class="positive">Date Started : </span><span class="negative"><?php echo $sf_params->get('commence_date')  ?></span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>Contact Info</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('contact_no',  $sf_params->get('contact_no'), 'span3');
     ?>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>Date of Request</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php    
        echo HTMLLib::CreateDateInput('date_filed', $sf_params->get('date_filed'), 'span3' );
    ?>
    <span class="negative">*</span>        
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>&nbsp;</td>
    <td class="FORMcell-right FORMlabel" colspan="3"><b>DATE INCLUSIVE</b></td>
</tr>
<tr>    
    <td class="bg-clearBlue alignRight"><label><small>From</small></label></td>
    <td class="FORMcell-right" nowrap width="10%">
    <?php    
        echo HTMLLib::CreateDateInput('inclusive_datefrom', $sf_params->get('inclusive_datefrom'), 'span2' );
        ?>
        </td>
    <td class="bg-clearBlue alignRight" width="70" nowrap><label><small>To</small></label></td>
    <td class="FORMcell-right" nowrap>
    <?php    
    	echo HTMLLib::CreateDateInput('inclusive_dateto', $sf_params->get('inclusive_dateto'), 'span2' );
        ?>
    <span class="negative">*</span>        
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>Half Day</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php
    	$hDay = array('none'=>'- None -', 'Am Leave'=>'- Am Leave -', 'Pm Leave'=>'- Pm Leave -', 'Ev Leave'=>'Ev Leave'); 
        echo HTMLLib::CreateSelect('half_day', $sf_params->get('half_day'), $hDay, 'span2');
        
    ?>
    <span class="negative">*</span>            
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>Leave Type</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateSelect('leave_type', $sf_params->get('leave_type'), HrLeavePeer::GetLeaveType(), 'span3');
        echo HTMLLib::CreateInputText('credits', $sf_params->get('credits'), 'span2', '', ' readonly = "true" ');
    ?>
        <span class="negative">*</span>
        <?php 
        if ($sf_params->get('id') )
        {
            echo ($sf_params->get('no_days')) ? '+ ' . ($sf_params->get('no_days')) : '+ ' . $sf_params->get('consumed');
            echo input_tag('consumed', $sf_params->get('consumed'));
        } 
        ?>    
        &nbsp;&nbsp;&nbsp;
   		<input type="submit" name="validate" value=" Validate Leave " class="info">
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>Reason</small></label></td>
    <td colspan="3" class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateTextArea('reason_leave',  $sf_params->get('reason_leave'));
    ?>
    <span class="negative">*</span>    
    </td>
</tr>
<tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap><label><small>No of Days / Available</small></label></td>
    <td colspan="5" class="FORMcell-right" nowrap>
    <?php
        //echo HTMLForm::Error('no_days');         
        //echo input_tag('no_days',  $sf_params->get('no_days'), 'size="10"'); 
        echo '<span class="tk-style11"><b>'.$sf_params->get('no_days') . '</b> / '. $sf_params->get('credits') . '</span>';
    ?>    
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="save" value=" Apply Leave " class="success">
    </td>
</tr>
</table>

</form>
</div>
</div>
</div>
