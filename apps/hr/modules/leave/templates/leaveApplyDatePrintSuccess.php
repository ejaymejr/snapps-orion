<?php use_helper('Validation', 'Javascript') ?>
  <?php   	
  	$data = HrEmployeeLeaveSignaturePeer::GetDataByHrEmployeeLeaveId($sf_params->get('id') ); 
  	$needToSign = true;
  	$dVerified = '';
  	$dApproved = '';
  	if ($data) :
  		if ($data->getApproval() ):
  			$needToSign = false;
  		endif; 
  		$dVerified = $data->getDateVerified();
  		$dApproved = $data->getDateApproved();
  	endif;?>
<script>
$(document).ready(function() {
	$('#search').bind('click', function(e){
		window.location.href = "<?php echo url_for('leave/leaveApprovalSearch') ?>";
	});
	
	 $('#print').on('click', function(){
         window.print();
     });
});
</script>


<div class="print no-print">
	<button class="btn btn-lg btn-info pull-left" id="search">GOTO SEARCH</button>
	<?php if (! $needToSign):?>
    <button class="btn btn-lg btn-info pull-right" id="print">PRINT LEAVE</button>
    <?php endif; ?>
</div>

<div class="clearfix"></div>

<div class="wrapper">

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('leave/leaveApplyDatePrint'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bg-clearGray bordered">
  <tr height="25px">
  	<td  colspan="2" align="center" class="rowTitleHeader"> 
  		LEAVE FORM (Verification)
  	</td>
  </tr>
  <tr>
    <td width="60%" >
    <?php 	    	
		echo $cal->LeaveDisplayCalendar($xdate, $empNo, 1);
	 ?></td>
    <td width="40%">
    	<div align="center">
    	<?php 
    		echo image_tag('employee/'.$empDetail->getPhoto(),'size="200x200"'); 
    	?>
    	<br>Applicant<h3><?php echo $empDetail->getName() ?></h3>
    	<br><div>Leave Type: <h3><?php echo $leaveID->getLeaveType() ?></h3></div>
    		</div>
    	</div>
    </td>
  </tr>
  
  <tr >
  <?php if ($needToSign) : ?>
  	<td class="alignCenter" style="background-color: #EFF4FF;"><div  align="center">
	  	<div id="signature"></div><br><h2><?php echo HrLeaveApproverPeer::GetApprover($empDetail->getEmployeeNo()) ?></h2>
	  	<div id="tools"><?php echo input_tag('signature_data', $sf_params->get('signature_data'),'type=hidden');?></div>
		</div>
  	</td>
  <?php else: ?>
  <td class="alignCenter"  >
  		<img src="<?php echo $data->getApproval(); ?>" height=150px width=400px />
  		<br>____________________________________________________________
  		<br><h2><?php echo HrLeaveApproverPeer::GetApprover($empDetail->getEmployeeNo()) .' | '. $dApproved ?></h2>
  </td>
  <?php endif;?>
  
  <td align="center"  >
	<?php 
//    		var_dump($leaveID->getId());
    		$sdate = DateUtils::DUFormat('Y-m-01', $leaveID->getInclusiveDateFrom());
    		$edate = DateUtils::DUFormat('Y-m-t', $leaveID->getInclusiveDateTo());
//    		$sdate = '2014-10-01';
//    		$edate = '2014-10-31';
    		$cdate = $sdate;
			$isHoliday = false;
			$isOnleave = false;
			$isWorking = false;
			$workTemp = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($empDetail->getEmployeeNo());
    		for($x=1; $cdate <= $edate; $x++):
    			$leaveDetail = HrEmployeeLeavePeer::GetLeaveDetail($empDetail->getEmployeeNo(), $cdate);
    			$isOnLeave = false;
    			$isApprove = false;
    			if ($leaveDetail):
    				$isWorking = TkWorktemplateDetailPeer::IsWorkingThisDay($cdate, $workTemp); 
					$isHalfDay = $leaveID->getHalfDay() == 'none'? '' : '| '.$leaveID->getHalfDay();
					if ($isWorking):
						if ($leaveDetail->getLeaveType() == $leaveID->getLeaveType()):
							echo $cdate .' | '. ($isHalfDay? $isWorking/2 : $isWorking) .'hrs '. $isHalfDay . '   '. $isApprove. '<br>';
						endif;
					endif;
    				//echo $cdate . ' '. $isWorking . "<Br>";
    				//$isOnLeave =  $leaveDetail->getLeaveType();
    				//$isOnLeave = true;
    				$isApprove =  $leaveDetail->getDateApproved()? 'approved' : '';
    			endif;
				$cdate = DateUtils::AddDate($sdate, $x);
			endfor;
    		?>
  	</td>
</tr>
  
</table>
</span>
<script>
/*  @preserve
jQuery pub/sub plugin by Peter Higgins (dante@dojotoolkit.org)
Loosely based on Dojo publish/subscribe API, limited in scope. Rewritten blindly.
Original is (c) Dojo Foundation 2004-2010. Released under either AFL or new BSD, see:
http://dojofoundation.org/license for more information.
*/
(function($) {
	var topics = {};
	$.publish = function(topic, args) {
	    if (topics[topic]) {
	        var currentTopic = topics[topic],
	        args = args || {};
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            currentTopic[i].call($, args);
	        }
	    }
	};
	$.subscribe = function(topic, callback) {
	    if (!topics[topic]) {
	        topics[topic] = [];
	    }
	    topics[topic].push(callback);
	    return {
	        "topic": topic,
	        "callback": callback
	    };
	};
	$.unsubscribe = function(handle) {
	    var topic = handle.topic;
	    if (topics[topic]) {
	        var currentTopic = topics[topic];
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            if (currentTopic[i] === handle.callback) {
	                currentTopic.splice(i, 1);
	            }
	        }
	    }
	};
})(jQuery);

$(document).ready(function() {
	
	// This is the part where jSignature is initialized.
	//var $sigdiv = $("#signature").jSignature({'UndoButton':true, height: '200', width: '300'})
	var $sigdiv = $("#signature").jSignature({'UndoButton':false, height: '150', width: '400'})
	
	// All the code below is just code driving the demo. 
	, $tools = $('#tools')
	, $extraarea = $('#displayarea')
	, pubsubprefix = 'jSignature.demo.'
	

/*	$('<input type="button" value="Save" id="saveImage">').bind('click', function(e){
			var data = $sigdiv.jSignature('getData', 'svgbase64')
			$.publish(pubsubprefix + 'formatchanged')
			if($.isArray(data) && data.length === 2){
				$('textarea', $tools).val(data.join(','))
				$('#signature_data').val(data.join(','))
				$.publish(pubsubprefix + data[0], data);
			}
			document.FORMadd.submit();*/
//			var urlData = encodeURIComponent(data);
//			var postData = "<?php echo url_for('leave/saveLeaveFormToPng') ?>?data="+urlData+"&id="+<?php echo $sf_params->get('id')?>;
//			var ajax = new XMLHttpRequest();
//			ajax.open("POST",postData,true);
//			ajax.send();
		
//	}).appendTo($tools)
	
//	$('<input type="button" value="Reset">').bind('click', function(e){
//		$sigdiv.jSignature('reset')
//	}).appendTo($tools)
	
	$('#reset').on('click', function(){
		$sigdiv.jSignature('reset')
     });

	$('#save').on('click', function(){
		var data = $sigdiv.jSignature('getData', 'svgbase64')
		$.publish(pubsubprefix + 'formatchanged')
		if($.isArray(data) && data.length === 2){
			$('textarea', $tools).val(data.join(','))
			$('#signature_data').val(data.join(','))
			$.publish(pubsubprefix + data[0], data);
		}
		document.FORMadd.submit();
//		var urlData = encodeURIComponent(data);
//		var postData = "<?php echo url_for('leave/saveLeaveFormToPng') ?>?data="+urlData+"&id="+<?php echo $sf_params->get('id')?>;
//		var ajax = new XMLHttpRequest();
//		ajax.open("POST",postData,true);
//		ajax.send();
     });
	
	
	if (Modernizr.touch){
		$('#scrollgrabber').height($('#content').height())		
	}
	
})
</script>
</form>
</div>
<div class="clearfix"></div>
<?php if($needToSign): ?>
<div class="print no-print">
	<button class="btn btn-lg btn-info pull-left" id="save">SAVE</button>
    <button class="btn btn-lg btn-info pull-left" id="reset">CLEAR SIGNATURE</button>
</div>
<?php endif;?>
