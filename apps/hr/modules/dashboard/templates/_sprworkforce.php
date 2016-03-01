 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
 <table class="bordered condensed striped">
 <?php 
 	$seq = 1;
 	$names = array_unique($quota['spr_proof']['name']);
 	asort($names);
 	echo "<tr><h4>SPR FULLTIME WORKERS LIST</h4></tr>";
 foreach( $names as $k=>$name):
	 if (strtoupper($quota['spr_proof']['employment'][$k]) == 'FULLTIME'):
	 	echo "<tr>";
	 	echo "<td><small>". $seq ."</small></td>";
		echo "<td><small>". $quota['spr_proof']['name'][$k] ."</small></td>";	 
		echo "<td><small>". $quota['spr_proof']['employment'][$k] ."</small></td>";
		echo "<td><small>". $quota['spr_proof']['epass'][$k] ."</small></td>";
		echo "<td><small>". $quota['spr_proof']['sector'][$k] ."</small></td>";
		echo "</tr>";
		$seq++;
	 endif;
 endforeach;
 echo '</table>';
 
	echo '<br>';
	echo '<br>';
	echo '<table class="bordered condensed striped">';
 	$seq = 1;
 	$names = array_unique($quota['spr_proof']['name']);
 	asort($names);
 	echo "<tr><td colspan='5' ><h4>SPR PARTTIME WORKERS LIST</h4></td></tr>";
 	foreach( $names as $k=>$name):
	 	if (strtoupper($quota['spr_proof']['employment'][$k]) == 'PARTTIME'):
	 		echo "<tr>";
	 		echo "<td><small>". $seq ."</small></td>";
	 		echo "<td><small>". $quota['spr_proof']['name'][$k] ."</small></td>";
	 		echo "<td><small>". $quota['spr_proof']['employment'][$k] ."</small></td>";
	 		echo "<td><small>". $quota['spr_proof']['epass'][$k] ."</small></td>";
	 		echo "<td><small>". $quota['spr_proof']['sector'][$k] ."</small></td>";
	 		$seq++;
	 		echo "</tr>";
	 	endif;
 	endforeach;
 	?>
 </table>