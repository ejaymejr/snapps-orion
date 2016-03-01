<div class="contentBox">
	<a href="<?php echo url_for('contribution/cpfAssocAdd') ?>" class="button success">Define New Rule</a>
	<br><br>
	<?php 
	if (isset($pager))
	{
	    $filename = hrPager::AssocDonation($pager);
		$cols = array('seq', 'action', 'agency', 'description', 'race', 'minimum', 'maximum', 'amount');
		echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
	}
	?>
</div>


