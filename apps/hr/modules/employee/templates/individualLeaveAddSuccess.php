<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<div class="panel" data-role="panel">
<div class="panel-header bg-orange fg-white">
UPDATE LEAVE CREDITS
</div>
<div class="panel-content">

		<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('employee/individualLeaveAdd'). '?id=' . $sf_params->get('id');?>" method="post">
		
		<table width="100%" class="table bordered" > 
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight span2" nowrap><label>Name</label></td>
		    <td colspan="4" class="alignLeft span3" nowrap>
		    <?php
		    echo input_tag('employee_no', $sf_params->get('employee_no'), 'type=hidden');
		    echo input_tag('name', $sf_params->get('name'),'type=hidden' );
		    echo $sf_params->get('name') ;
		    ?>
		    <span class="negative">*</span>
		    </td>
		</tr>
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight " nowrap><label>Leave Type</label></td>
		    <td colspan="4" class="alignLeft span2" nowrap><label>
		    <?php
		    echo input_tag('leave_type', $sf_params->get('leave_type'),'type=hidden' );
		     echo input_tag('leave_id', $sf_params->get('leave_id'),'type=hidden');
		    echo $sf_params->get('leave_type');
		    ?></label>
		    </td>
		</tr>
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight span3" nowrap><label>Current Allocation</label></td>
		    <td class="alignLeft span3" nowrap><label class="fg-red">
		    <?php
		    echo $sf_params->get('current_entitled');
		    ?></label>
			</td>
		    <td class="bg-clearBlue fg-darkBlue alignRight span2" nowrap><label>New Allocation</label></td>
		    <td class="span3"><?php 
		    	echo HTMLLib::CreateInputText('days_entitled',  $sf_params->get('days_entitled'), 'span2');
		    	?></td>
		    	<td class="span5"><label>Commence Date: <span class="text-info"><?php
				    echo $sf_params->get('commence_date');
				    echo input_tag('commence_date', $sf_params->get('commence_date'), 'type=hidden' );
				    ?></span></label></td>
		</tr>
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight span3" nowrap>Status</td>
		    <td ><?php echo HTMLLib::CreateSelect('status', $sf_params->get('status'), array('A'=>' - A - ','I'=>' - I - '), 'span2') ?>
		    </td>
		</tr>
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight span3" nowrap>MOM Guidelines</td>
		    <td class="span3" colspan="4">
		    <p class="alignLeft">
		    <?php echo AjaxLib::AjaxScript('prorate', 'employee/prorate', 'employee_no,commence_date,leave_id',null,'DIVProrate')?>
		    <?php echo submit_tag('Pro Rate','id="prorate" class="success"') ?>
		    <br />
		    <div id="DIVProrate"></div>
		    (No. of completed months of service / 12 months) X No. of days of annual leave entitlement 
			<br />See more at: <a target="_TARGET" href="http://www.mom.gov.sg/employment-practices/leave-and-holidays/Pages/annual-leave.aspx">MOM Website</a>
		    </p>
		    </td>
		</tr>
		<tr>
		    <td class="bg-clearBlue fg-darkBlue alignRight " nowrap><label>Remarks</label></td>
		    <td class="alignLeft" colspan="4" ><label>
		    <?php
		    echo HTMLLib::CreateTextArea('remark', $sf_params->get('remark'));
		    ?></label>
		    </td>
		</tr>
		<tr>
		    <td class="bg-clearBlue" nowrap></td>
		    <td class="alignLeft" nowrap>
		        <input type="submit" name="save" value=" Save Details " class="success">
		    </td>
		</tr>
		</table>
		</form>
	</div>
	</div>
	
</div>