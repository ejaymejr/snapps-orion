 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
 <table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
 <?php 
 	$seq = 1;
 	switch($levytier):
	 	case 'TIER 1':
	 		$tier = 1;
	 		break;
		case 'TIER 2': 
			$tier = 2;
			break;
		case 'TIER 3':
			$tier = 3;
			break;
		default:
			$tier = 0;
			break;
 	endswitch;
 	$names = array_unique($quota['foreign_proof']['name']);
 	asort($names);
 	echo "<tr><td colspan='2' class='alignCenter'><h1>".$pass."</h1></td></tr>";
	 foreach( $names as $k=>$name):
	    if ($pass == 'RPASS'):
		    if (($quota['foreign_proof']['epass'][$k] == 'WP' || $quota['foreign_proof']['epass'][$k] == 'PRC') && ($quota['foreign_proof']['levy_tier'][$k] == $tier) ):
			    echo "<tr>";
			    echo "<td class='FORMcell-left alignLeft' nowrap>". $seq ."</td>";
			    echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['name'][$k] ."</td>";
			    //echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['employment'][$k] ."</td>";
			    //echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['epass'][$k] ."</td>";
			   // echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['sector'][$k] ."</td>";
			   // echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['levy_tier'][$k] ."</td>";
			    echo "</tr>";
			    $seq++;
		    endif;
	    endif;
	    
	    if ($pass == 'SPASS'):
		    if ( $quota['foreign_proof']['epass'][$k] == 'SPASS' && ($quota['foreign_proof']['levy_tier'][$k] == $tier) ):
			    echo "<tr>";
			    echo "<td class='FORMcell-left alignLeft' nowrap>". $seq ."</td>";
			    echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['name'][$k] ."</td>";
			   // echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['employment'][$k] ."</td>";
			    //echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['epass'][$k] ."</td>";
			    //echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['sector'][$k] ."</td>";
			    //echo "<td class='FORMcell-left alignLeft' nowrap>". $quota['foreign_proof']['levy_tier'][$k] ."</td>";
			    echo "</tr>";
			    $seq++;
		    endif;
	    endif; 	
	 endforeach;
 echo '</table>';
 echo "<br><center>".link_to('close','',"onclick=showHideElement('".$divName."');return false;" . " style=cursor:pointer;" ) . "</center>";
  
 