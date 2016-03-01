 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
 <table>
 <?php 
 	$seq = 1;
 	$names = array_unique($quota['spr_proof']['name']);
 	asort($names);
 	echo "<tr><h1>SPR WORKERS LIST</h1></tr>";
 foreach( $names as $k=>$name):
 	echo "<tr>";
 	echo "<td>". $seq ."</td>";
	echo "<td>". $quota['spr_proof']['name'][$k] ."</td>";	 
	echo "<td>". $quota['spr_proof']['employment'][$k] ."</td>";
	echo "<td>". $quota['spr_proof']['epass'][$k] ."</td>";
	echo "<td>". $quota['spr_proof']['sector'][$k] ."</td>";
	echo "</tr>";
	$seq++;
 endforeach;
 echo '</table>';
 
	echo '<br>';
	echo '<br>';
	echo '<table>';
 	$seq = 1;
 	$names = array_unique($quota['foreign_proof']['name']);
 	asort($names);
 	echo "<tr><h1>FOREIGN WORKERS LIST</h1></tr>";
 	foreach( $names as $k=>$name):
 		echo "<tr>";
 		echo "<td>". $seq ."</td>";
 		echo "<td>". $quota['foreign_proof']['name'][$k] ."</td>";
 		echo "<td>". $quota['foreign_proof']['employment'][$k] ."</td>";
 		echo "<td>". $quota['foreign_proof']['epass'][$k] ."</td>";
 		echo "<td>". $quota['foreign_proof']['sector'][$k] ."</td>";
 		$seq++;
 		echo "</tr>";
 	endforeach;
 	?>
 </table>