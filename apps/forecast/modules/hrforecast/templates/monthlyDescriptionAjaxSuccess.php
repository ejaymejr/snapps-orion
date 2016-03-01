<h5 class="fg-crimson">
<?php 
	echo DateUtils::DUFormat('M d, Y', $start) . ' to ' . DateUtils::DUFormat('M d, Y', $end); 
	echo input_tag('start_date', $start , 'type="hidden"');
	echo input_tag('end_date', $end , 'type="hidden"');
	?>
</h5>
