<?php use_helper('Validation', 'Javascript') ?>
<script>
	$("#DIVCommenceDate<?php echo $leaveID?>").html("<?php echo $commence?>");
	$("#DIVBalance<?php echo $leaveID?>").html("<?php echo $balance ?>");
</script>
<?php
	echo $cal->LeaveApplyCalendar($cdate,  $empNo, $leaveID);
?>