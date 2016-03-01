<?php use_helper('Validation', 'Javascript') ?>
<script>
$(document).ready(function() {
    $("#updateAnnualLeave").on('click', function(){
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
                    	'<form class="user-input" action="<?php echo url_for("employee/updateLeaveCredit") ?>?id=<?php echo $sf_params->get("id")?>&employee_no=<?php echo $sf_params->get("employee_no")?>" method="post">' +
                    	'<table class="table bordered">'+
                    	'<th class="span5 bg-orange" colspan="2">'+
                    	'<h2 class="fg-white" ><?php echo $sf_params->get("name")?></h2>'+
                    	'</th>'+
                    	'<tr class="">'+
                    		'<td class="span2 alignCenter bg-teal fg-white">'+
                        		'CURRENT ALLOCATION' +
                        	'</td>'+
                    		'<td class="span2 alignCenter bg-teal fg-white">'+
                    			'NEW ALLOCATION' +
                    		'</td>'+
                        '</tr>'+
                    	'<tr class="">'+
	                		'<td class="">'+
	                    		'<label></label>' +
	                    	'</td>'+
	                		'<td class="">'+
	                        '<div class="input-control text"><input type="text" name="allocation" value="<?php echo $sf_params->get("allocation")?>" placeholder="<?php echo $sf_params->get("employee_no")?>" ><button class="btn-clear"></button></div>' +
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
	                			'<button class="button success" onkeydown="" >Save Credits</button>&nbsp;'+
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
