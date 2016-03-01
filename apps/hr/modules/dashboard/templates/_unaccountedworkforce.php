
<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<table border="0">
	<?php 

	$seq = 1;
	$names = array_unique($quota['foreign_proof']['name']);
	asort($names);
	echo "<tr><h4>NO PASS</h4>Update Employee Info if necessary</tr>";
	foreach( $names as $k=>$name):
	if ($quota['foreign_proof']['epass'][$k] == ''):
		echo "<tr>";
		echo "<td><small>". $seq ."</small></td>";
		echo "<td><small>". $quota['foreign_proof']['name'][$k] ."</small></td>";
		echo "<td><small>". $quota['foreign_proof']['employment'][$k] ."</small></td>";
		echo "<td><small>". $quota['foreign_proof']['epass'][$k] ."</small></td>";
		echo "<td><small>". $quota['foreign_proof']['sector'][$k] ."</small></td>";
		$seq++;
		echo "</tr>";
	endif;
	endforeach;
	?>
</table>
