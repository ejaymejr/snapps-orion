<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php
    if (isset($pager)):
		$filename = hrPager::smsInbox($pager);
		$cols = array('seq', 'sender', 'name', 'message', 'sent','recieved', 'operator', 'type', 'updated', 'remarks');
		//echo PagerJson::TableHeaderFooter($cols, $filename, '', sizeof($pager)); //create the table
		echo PagerJson::AkoDataTableForTicking($cols, $filename);
	endif;
?>
</div>
