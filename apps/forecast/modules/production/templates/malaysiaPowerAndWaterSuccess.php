<div class="contentBox">
<H2>MALAYSIA POWER AND WATER EFFECIENCY</H2>
	<table class="table bordered condensed">
  		<tr><td class="bg-clearGreen alignRight" colspan="<?php echo sizeof($powerData) + 1?>"> ARTICLE PER CUBIC METER (WATER) </td></tr>
  		<tr>
  			<td class="text-right  bg-clearBlue span2"><small>MONTH</td>
  			<?php foreach($waterData as $month => $val): ?>
  			<td class="text-right" ><small><?php echo DateUtils::DUFormat('M-y', $month) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr>
  			<td class="text-right  bg-clearBlue"><small>WATER COST/M<sup>3</sup> </small></td>
  			<?php foreach($waterData as $month => $val): ?>
  			<td class="text-right"><small><?php echo number_format($val) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr>
  			<td class="text-right  bg-clearBlue"><small>ARTICLE</small></td>
  			<?php foreach($articleData as $month => $val): ?>
  			<td class="text-right"><small><?php echo number_format($val) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr class="bg-clearRed" >
  			<td class="text-right  "><small>ARTICLE/M<sup>3</sup></small></td>
  			<?php $articleperkwhData = array(); ?>
  			<?php foreach($articleData as $month => $val): ?>
  			<td class="text-right"><small>
  				<?php 
  					$articleperm3 = 0;
  					$articleperm3 = number_format($articleData[$month] / $waterData[$month]);
  					$watertrend = 693; //based on 2015 data
  					echo $articleperm3; 
  					
  					//--------------graphData
  					$articleperm3Data[] = array(
  							  'month' => DateUtils::DUFormat('M-Y', $month )
  							, 'total' => $articleperm3
  							, 'average' => $watertrend
  					);
  				?></small></td>
  			<?php 
  				endforeach;
  				$articleperm3Json = json_encode($articleperm3Data);
//   				echo '<pre>';
//   				print_r($articleperm3Data);
//   				echo '</pre>';
  			?>
  		</tr>
  	</table>

<?php 
	echo include_partial('articleperm3', array('articleperm3Json' => $articleperm3Json ) );
	
?>		

  	<br>
  	<table class="table bordered condensed">
  		<tr><td class="bg-clearGreen alignRight" colspan="<?php echo sizeof($powerData) + 1?>"> ARTICLE PER KILLOWATT HOUR (ELECTRICITY) </td></tr>
  		<tr>
  			<td class="text-right  bg-clearBlue span2"><small>MONTH</td>
  			<?php foreach($powerData as $month => $val): ?>
  			<td class="text-right" ><small><?php echo DateUtils::DUFormat('M-y', $month) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr>
  			<td class="text-right  bg-clearBlue"><small>POWER COST / KWH</small></td>
  			<?php foreach($powerData as $month => $val): ?>
  			<td class="text-right"><small><?php echo number_format($val) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr>
  			<td class="text-right  bg-clearBlue"><small>ARTICLE</small></td>
  			<?php foreach($articleData as $month => $val): ?>
  			<td class="text-right"><small><?php echo number_format($val) ?></small></td>
  			<?php endforeach;?>
  		</tr>
  		<tr class="bg-clearRed" >
  			<td class="text-right  "><small>ARTICLE/KWH</small></td>
  			<?php $articleperkwhData = array(); ?>
  			<?php foreach($articleData as $month => $val): ?>
  			<td class="text-right"><small>
  				<?php 
  					$articleperkwh = 0;
  					$articleperkwh = number_format($articleData[$month] / $powerData[$month]);
  					//$articleperkwh = $articleperkwh? $articleperkwh : 220;
  					$powertrend = 5; //based on 2015 data
  					echo $articleperkwh; 
  					
  					//--------------graphData
  					$articleperkwhData[] = array(
  							  'month' => DateUtils::DUFormat('M-Y', $month )
  							, 'total' => $articleperkwh
  							, 'average' => $powertrend
  					);
  				?></small></td>
  			<?php 
  				endforeach;
  				$articleperkwhJson = json_encode($articleperkwhData);
//   				echo '<pre>';
//   				print_r($articleperkwhData);
//   				echo '</pre>';
  			?>
  		</tr>
  	</table>
  	<?php 
    	echo include_partial('articleperkwh', array('articleperkwhJson' => $articleperkwhJson ) );
	?>
	<br>


</div>