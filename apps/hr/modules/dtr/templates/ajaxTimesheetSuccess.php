<?php //echo HTMLLib::vardump($previousEmployee) ?>
<?php include_partial('timesheet_content', array('currentEmployee' => $currentEmployee) ) ?>
<script>
$( document ).ready(function() {
	$("#previous_employee").val("<?php echo $previousEmployee ?>");
	$("#next_employee").val("<?php echo $nextEmployee ?>");
	$("#current_employee").val("<?php echo $currentEmployee ?>");
});
</script>