 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
 <?php 
 	echo "Income < 450 doesnt count; Income < 850 count as .5; Income > 850 as 1 <br>";
 	$seq = 1;
 	foreach($empList as $emp):
 		echo $seq++ . ' ( ' . $emp->getRankCode() . ' ): ' . $emp->getName() . '<br>';
 	endforeach;
 ?>