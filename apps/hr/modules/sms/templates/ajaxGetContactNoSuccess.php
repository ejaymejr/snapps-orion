<?php use_helper('Validation', 'Javascript') ?>
<?php 
	$contact = $cellNo->get('CELL_NO');
	echo input_tag('contact_no',  $contact, 'size="30"'); 
