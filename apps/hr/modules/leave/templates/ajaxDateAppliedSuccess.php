<?php use_helper('Validation', 'Javascript') ?>
<?php
echo javascript_tag("
	//vDates = document.getElementById('dates').value;
	document.getElementById('dates".$leaveID."').value = '".$sf_params->get('date_list')."'
	//vDates = vdates + document.getElementById('dates').value;
	//document.getElementById('dates').value = vDates;
");
echo input_tag('cdate', $sf_params->get('cdate'), 'type=hidden');
echo input_tag('date_list', $sf_params->get('date_list'), 'size=10x1 type=hidden');
$ydt = $sf_params->get('cdate');
$dt = DateUtils::DUFormat("j", $sf_params->get('cdate'));
$dates = "dates".$leaveID;

$calendarDateID = $dt.'_'.$leaveID;
echo AjaxLib::AjaxScript($calendarDateID, 'leave/ajaxDateCanceled', $dates, 'leaveID=+'.$leaveID.'&cdate=+'.$ydt, 'calendar_'.$dt.'_'.$leaveID );
$dateButton = link_to ($dt, '#', 'id="'.$calendarDateID.'"' );
//$dateButton = link_to ($dt, '', array('onclick'=>remote_function($ajaxLeaveCancel) . ';return false;') );
?>
<div id='calendar_"<?php echo $ydt.'_'.$leaveID ?>'>
<ul id='navlist'>
	<li> 
		<div id="DIVSelectedDate" align="center"><?php echo $dateButton; ?></div>
	</li>
</ul>
</div>
