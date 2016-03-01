
<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<table class="table bordered condensed bg-white striped">
	<?php 
	$seq = 1;
	$names = array_unique($quota['foreign_proof']['name']);
	asort($names);
	echo "<tr><h4>PRC HOLDER WORKERS LIST</h4></tr>";
	foreach( $names as $k=>$name):
	if ($quota['foreign_proof']['epass'][$k] == 'PRC'):
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
