<?php use_helper('Validation', 'Javascript') ?>
<script>
$(document).ready(function() {
    $("#update_employee_no").on('click', function(){
        $.Dialog({
            overlay: true,
            shadow: true,
            flat: true,
            draggable: true,
            icon: '<i class="icon-user"></i>',
            title: 'Flat window',
            content: '',
            padding: 10,
            onShow: function(_dialog){
                var content = '<script>$(document).ready(function(){ $("html").bind("keypress", function(e){ if(e.keyCode == 13) return false; }); });<\/script>'+
                    	'<form class="user-input" action="<?php echo url_for("employee/updateEmployeeNoName") ?>?id=<?php echo $sf_params->get("id")?>&employee_no=<?php echo $sf_params->get("employee_no")?>" method="post">' +
                    	'<table class="table bordered">'+
                    	'<tr class="span10">'+
                    		'<td class="span5 alignCenter bg-teal fg-white">'+
                        		'EXISTING' +
                        	'</td>'+
                    		'<td class="span5 alignCenter bg-teal fg-white">'+
                    			'NEW' +
                    		'</td>'+
                        '</tr>'+
                    	'<tr class="">'+
	                		'<td class="">'+
	                    		'<label><?php echo $sf_params->get("employee_no")?></label>' +
	                    	'</td>'+
	                		'<td class="">'+
	                        '<div class="input-control text"><input type="text" name="new_employee_no" value="<?php echo $sf_params->get("employee_no")?>" placeholder="<?php echo $sf_params->get("employee_no")?>" ><button class="btn-clear"></button></div>' +
	                		'</td>'+
                    	'</tr>'+
                    	'<tr class="">'+
	                		'<td class="">'+
	                    		'<label><?php echo $sf_params->get("name")?></label>' +
	                    	'</td>'+
	                		'<td class="">'+
	                        '<div class="input-control text "><input type="text" name="new_name" value="<?php echo $sf_params->get("name")?>" ><button class="btn-clear"></button></div>' +
	                		'</td>'+
	                	'</tr>'+
                    	'<tr class="alignCenter">'+
	                		'<td colspan="2">'+
	                			'<button class="button success" onkeydown="" >Save Name / Employee Number</button>&nbsp;'+
	                			'<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> '+
	                    	'</td>'+
	                	'</tr>'+
                        '<div class="form-actions">' +
                        '</div>'+
                        '</table>';
                        '</form>';

                $.Dialog.title("Update Employee No / Name");
                $.Dialog.content(content);
            }
        });
    });
});
</script>
<table class="table bordered">
	<tr>
		<td class="bg-clearBlue span2 alignRight">EMPLOYEE NO</td>
		<td class="span7"><?php echo $employeeData->getEmployeeNo();
				echo input_tag('employee_no',  $sf_params->get('employee_no'), 'size="40" type="hidden"' );
				//echo input_tag('id',  $sf_params->get('id'), 'size="40" type="hidden"');
		?></td>
		<td rowspan="5">
			<div id="DIVUploadPhoto" class="alignCenter">
			<?php include_partial('upload_photo',array('id'=> $sf_params->get('id') ))?>
			</div>
		</td>
	</tr>
	<tr>
		<td class="bg-clearBlue span2 alignRight">FULLNAME</td>
		<td class=""><?php 
			echo $employeeData->getName(); 
			echo input_tag('name',  $sf_params->get('name'), 'size="40" type="hidden"' );
			?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue span2 alignRight">STATUS</td>
		<td ><?php 
				$stat =  hrEmployeePeer::GetOptimizedDatabyEmployeeNo($sf_params->get('employee_no'), array('date_resigned') );
				if ($stat):
					echo ($stat->get('DATE_RESIGNED')? '<span class="text-muted"><strong>INACTIVE </strong></span>' . $stat->get('DATE_RESIGNED') .' (date left)</span>' : '<span class="text-success"><strong>ACTIVE</strong></span>');
				endif;
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue span2 alignRight">NOTICE</td>
		<td ><span class="text-warning"><strong><?php
			$notice =  hrEmployeePeer::GetEmployeeNotices($sf_params->get('employee_no'));
			echo $notice;
			?></strong></span>
		</td>
	</tr>
	<tr>
		<td class="bg-clearBlue span2 alignRight">ACTION</td>
		<td><span class="text-warning"><strong><?php
			echo HTMLLib::CreateSubmitButton('update_employee_no', 'Update Employee No / Name');
			?></strong></span>
		</td>
	</tr>
</table>