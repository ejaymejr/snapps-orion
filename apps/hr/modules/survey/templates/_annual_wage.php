<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<table class="table bordered condensed ">
  <tr>
    <td class="FORMlabel" colspan="7"><h2>ESTABLISHMENT PROFILE</h2></td>
  </tr>
  <tr>
    <td height="48" colspan="3"><div align="center"><h2>T. C. Khoo &amp; Co Pte. Ltd. </h2> <br><h2>Labour Market Survey from <?php echo DateUtils::DUFormat('M-Y', $sf_params->get('labour_survey_sdate')) .' to ' . DateUtils::DUFormat('M-Y', $sf_params->get('labour_survey_edate'))?> </h2></div></td>
    <td class="span2"><div align="center">Senior Management</div></td>
    <td class="span2"><div align="center">Junior Management</div></td>
    <td class="span2"><div align="center">Rank and File</div></td>
    <td class="span2"><div align="center">Total</div></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel span1"  rowspan="3">Q2</td>
    <td class="FORMcell-left FORMlabel span5"  rowspan="3">Total number of paid employees (local and foreign) as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) ?> </td>
    <td class="FORMcell-left FORMlabel span2" >Singaporean/PR </td>
    <td class="FORMcell-left FORMlabel">
    	<?php echo link_to( sizeof($surveyPaidStart['senior_management_with_cpf']),'',
			"onclick=showHideElement('DIVShowHideTotalSingProf');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingProf" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['senior_management_with_cpf'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( sizeof($surveyPaidStart['junior_management_with_cpf']),'',
			"onclick=showHideElement('DIVShowHideTotalSingclerk');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingclerk" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['junior_management_with_cpf'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( sizeof($surveyPaidStart['rank_and_file_with_cpf']),'',
			"onclick=showHideElement('DIVShowHideTotalSingProd');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingProd" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['rank_and_file_with_cpf'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_production'] ?></td>
    <td class="FORMcell-left FORMlabel">
    <?php $totalwithcpf = array_merge($surveyPaidStart['senior_management_with_cpf'], $surveyPaidStart['junior_management_with_cpf'], $surveyPaidStart['rank_and_file_with_cpf']  ) ?>
    <?php echo link_to( sizeof($totalwithcpf),'',
			"onclick=showHideElement('DIVShowHideTotalSing');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSing" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($totalwithcpf as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div>
    	<?php //echo $surveyPaidStart['total_singaporean_profession']; ?>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( sizeof($surveyPaidStart['senior_management_without_cpf']),'',
		"onclick=showHideElement('DIVShowHideForPro');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForPro" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['senior_management_without_cpf'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( sizeof($surveyPaidStart['junior_management_without_cpf']),'',
		"onclick=showHideElement('DIVShowHideForClerk');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForClerk" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['junior_management_without_cpf'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( sizeof($surveyPaidStart['rank_and_file_without_cpf']),'',
		"onclick=showHideElement('DIVShowHideForProd');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForProd" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['rank_and_file_without_cpf'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php $totalwithoutcpf = array_merge($surveyPaidStart['senior_management_without_cpf'], $surveyPaidStart['junior_management_without_cpf'], $surveyPaidStart['rank_and_file_without_cpf']  ) ?>
    <?php echo link_to( sizeof($totalwithoutcpf),'',
		"onclick=showHideElement('DIVShowHideFor');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideFor" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($totalwithoutcpf as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel"><?php echo sizeof($surveyPaidStart['senior_management_with_cpf']) + sizeof($surveyPaidStart['senior_management_without_cpf'])  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo sizeof($surveyPaidStart['junior_management_with_cpf']) + sizeof($surveyPaidStart['junior_management_without_cpf'])  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo sizeof($surveyPaidStart['rank_and_file_with_cpf']) + sizeof($surveyPaidStart['rank_and_file_without_cpf'])  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr'] + $surveyPaidStart['total_foreign'] ?></td>
  </tr>  
  <tr>
    <td class="FORMcell-left FORMlabel" >Q3</td>
    <td class="FORMcell-left FORMlabel" >Please state the number of employees on CPF Scheme with one ormore years of service (excluding parttime and piece rated workers) as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) ?> </td>
    <td class="FORMcell-left FORMlabel" >Singaporean/PR</td>
       <td class="FORMcell-left FORMlabel">
    	<?php echo link_to( sizeof($surveyPaidStart['senior_management_with_cpf']),'',
			"onclick=showHideElement('senior_management_with_cpf');return false;" . " style=cursor:pointer;" );
    	?><div id="senior_management_with_cpf" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['senior_management_with_cpf'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( sizeof($surveyPaidStart['junior_management_with_cpf']),'',
			"onclick=showHideElement('junior_management_with_cpf');return false;" . " style=cursor:pointer;" );
    	?><div id="junior_management_with_cpf" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['junior_management_with_cpf'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( sizeof($surveyPaidStart['rank_and_file_no_parttime']),'',
			"onclick=showHideElement('rank_and_file_with_cpf');return false;" . " style=cursor:pointer;" );
    	?><div id="rank_and_file_with_cpf" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['rank_and_file_no_parttime'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_production'] ?></td>
    <td class="FORMcell-left FORMlabel">
    <?php $totalwithcpf = array_merge($surveyPaidStart['senior_management_with_cpf'], $surveyPaidStart['junior_management_with_cpf'], $surveyPaidStart['rank_and_file_no_parttime']  ) ?>
    <?php echo link_to( sizeof($totalwithcpf),'',
			"onclick=showHideElement('DIVShowHideTotalNoParttime');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalNoParttime" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($totalwithcpf as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div>
    	<?php //echo $surveyPaidStart['total_singaporean_profession']; ?>
    </td>
  </tr> 
  <tr>
    <td class="FORMcell-left FORMlabel span1" >Q4</td>
    <td class="FORMcell-left FORMlabel span5" >With Reference to the employees on CPF Scheme with one or more years of service, (excluding partime and piece-rated workers) as stated in Question 3, what was the average change in Basic Wage paid to them in <?php echo DateUtils::DUFormat('Y' , $sf_params->get('labour_survey_sdate') ) ?> </td>
    <td class="FORMcell-left FORMlabel span2" >Singaporean/PR</td>
    <td class="FORMcell-left FORMlabel"><?php echo computeQ4($table, $sf_params->get('labour_survey_sdate'), $sf_params->get('labour_survey_edate'), $sf_params->get('labour_survey_year'), $surveyPaidStart['senior_management_with_cpf']) ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo computeQ4($table, $sf_params->get('labour_survey_sdate'), $sf_params->get('labour_survey_edate'), $sf_params->get('labour_survey_year'), $surveyPaidStart['junior_management_with_cpf']) ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo computeQ4($table, $sf_params->get('labour_survey_sdate'), $sf_params->get('labour_survey_edate'), $sf_params->get('labour_survey_year'), $surveyPaidStart['rank_and_file_no_parttime']) ?></td>
    <td class="FORMcell-left FORMlabel"></td>
  </tr> 
  <tr>
    <td class="FORMcell-left FORMlabel span1" >Q13</td>
    <td class="FORMcell-left FORMlabel span5" >With reference to the employees on CPF Scheme with one or more years of service, (excluding part-time and piece-rated workers) as stated in Question 3, what is the maximum-minimum salary ratio of the most common job among the following categories of full-time empoyees in your establishment? </td>
    <td class="FORMcell-left FORMlabel span2" >Singaporean/PR</td>
    <td class="FORMcell-left FORMlabel"><?php echo '' ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo minimumMaximum($table, $sf_params->get('labour_survey_sdate'), $sf_params->get('labour_survey_edate'), $sf_params->get('labour_survey_year'), $surveyPaidStart['junior_management_with_cpf'])  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo minimumMaximum($table, $sf_params->get('labour_survey_sdate'), $sf_params->get('labour_survey_edate'), $sf_params->get('labour_survey_year'), $surveyPaidStart['rank_and_file_no_parttime']) ?></td>
    <td class="FORMcell-left FORMlabel"></td>

  </tr> 
</table>

<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>Q4 SENIOR MANAGER PROOF LIST </h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-green fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-green fg-white alignCenter" >NAME</td>
    <td class=" span4 bg-green fg-white alignCenter" >STATUS</td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span3 bg-green fg-white alignCenter" >CHANGE</td>
  </tr>
  <?php
  $seq = 1; 
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  foreach( $surveyPaidStart['senior_management_with_cpf'] as $name ): 
  	$bgBasicHighlight = ($table[$name][$firstPeriod] <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class=" " ><?php echo HrEmployeePeer::GetEmploymentByName($name); ?></td>
    <td class="  alignRight" ><?php echo number_format($table[$name][$firstPeriod], 1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($table[$name][$secondPeriod], 1)  ?></td>
    <td class=" " ><?php echo number_format( ( ($table[$name][$secondPeriod] - $table[$name][$firstPeriod] ) / $table[$name][$secondPeriod])  * 100, 1) ?></td>
  </tr>
  <?php 	
 endforeach;?>
</table> 

<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>Q4 JUNIOR MANAGEMENT PROOF LIST </h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-green fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-green fg-white alignCenter" >NAME</td>
    <td class=" span4 bg-green fg-white alignCenter" >STATUS</td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span3 bg-green fg-white alignCenter" >CHANGE</td>
  </tr>
  <?php
  $seq = 1; 
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  foreach( $surveyPaidStart['junior_management_with_cpf'] as $name ): 
  $bgBasicHighlight = ($table[$name][$firstPeriod] <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class=" " ><?php echo HrEmployeePeer::GetEmploymentByName($name); ?></td>
    <td class="  alignRight" ><?php echo number_format($table[$name][$firstPeriod], 1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($table[$name][$secondPeriod], 1)  ?></td>
    <td class=" " ><?php echo number_format( ( ($table[$name][$secondPeriod] - $table[$name][$firstPeriod] ) / $table[$name][$secondPeriod])  * 100, 1) ?></td>
  </tr>
  <?php 	
 endforeach;?>
</table>

<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>Q4 RANK AND FILE PROOF LIST </h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-green fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-green fg-white alignCenter" >NAME</td>
    <td class=" span4 bg-green fg-white alignCenter" >STATUS</td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-green fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span3 bg-green fg-white alignCenter" >CHANGE</td>
  </tr>
  <?php
  $seq = 1; 
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  foreach( $surveyPaidStart['rank_and_file_no_parttime'] as $name ): 
  	$firstval = isset($table[$name][$firstPeriod])? $table[$name][$firstPeriod] : 0;
  	$secondval= isset($table[$name][$secondPeriod])? $table[$name][$secondPeriod] : 0;
  	$bgBasicHighlight = ($table[$name][$firstPeriod] <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class=" " ><?php echo HrEmployeePeer::GetEmploymentByName($name); ?></td>
    <td class="  alignRight" ><?php echo number_format($firstval,1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($secondval, 1)  ?></td>
    <td class=" " ><?php echo number_format( ( ($table[$name][$secondPeriod] - $table[$name][$firstPeriod] ) / $table[$name][$secondPeriod])  * 100, 1) ?></td>
  </tr>
  <?php 	
 endforeach;?>
</table>


<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>FOREIGN WORKER EPASS</h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-amber fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-amber fg-white alignCenter" >NAME</td>
    <td class=" span4 bg-amber fg-white alignCenter" >STATUS</td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span3 bg-amber fg-white alignCenter" >&nbsp;</td>
  </tr>
  <?php
  $seq = 1; 
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  $foreignList = HrEmployeePeer::GetEmployeeListByRankCode($surveyPaidStart['list']['for'], 'EPASS');
  foreach( $foreignList as $name ): 
  	$firstval = isset($table_foreign[$name][$firstPeriod])? $table_foreign[$name][$firstPeriod] : 0;
  	$secondval= isset($table_foreign[$name][$secondPeriod])? $table_foreign[$name][$secondPeriod] : 0;
  $bgBasicHighlight = ($table[$name][$firstPeriod] <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class=" " ><?php echo HrEmployeePeer::GetEmploymentByName($name); ?></td>
    <td class="  alignRight" ><?php echo number_format($firstval,1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($secondval, 1)  ?></td>
    <td class=" " >&nbsp;</td>
  </tr>
  <?php 	
 endforeach;?>
</table>

<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>FOREIGN WORKER SPASS</h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-amber fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-amber fg-white alignCenter" >NAME</td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span2 bg-amber fg-white alignCenter" >Avg Change</td>
    <td class=" span2 bg-amber fg-white alignCenter" >Less $1000</td>
    <td class=" span2 bg-amber fg-white alignCenter" >&nbsp;</td>
  </tr>
  <?php
  $seq = 1;
  $seq_less_1000 = 0; 
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  $foreignList = HrEmployeePeer::GetEmployeeListByRankCode($surveyPaidStart['list']['for'], 'SPASS');
  $total = 0;
  foreach( $foreignList as $name ): 
  	$firstval = isset($table_foreign[$name][$firstPeriod])? $table_foreign[$name][$firstPeriod] : 0;
  	$secondval= isset($table_foreign[$name][$secondPeriod])? $table_foreign[$name][$secondPeriod] : 0;
  	$avgChange = ($secondval - $firstval) / $firstval * 100;
  	$total += $avgChange;
  	$less_1000 = 0;
  	$show = '';
  	if ($secondval < 1001):
  		$less_1000 = $secondval - $firstval;
  		$seq_less_1000 ++;
  		$show = $seq_less_1000;
  	endif;
  	$bgBasicHighlight = ($firstval <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class="  alignRight" ><?php echo number_format($firstval,1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($secondval, 1)  ?></td>
    <td class=" alignRight" ><?php echo number_format($avgChange, 1) ?></td>
    <td class=" alignRight" ><?php echo number_format($less_1000, 1) ?></td>
    <td class=" alignRight" ><?php echo $show ?></td>
  </tr>
  <?php 	
 endforeach;?>
  <tr>
    <td class=" " colspan="4" ></td>
    <td class=" alignRight" ><?php echo number_format($total, 1) ?></td>
    <td class=" alignRight" >&nbsp;</td>
  </tr>
</table>

<table class="table condensed bordered striped" >
  <tr>
    <td class="bg-white" colspan="5"><h3>FOREIGN WORKER WP</h3></td>
  </tr>
  <tr>
    <td class=" span1 bg-amber fg-white alignCenter" >SEQ</td>
    <td class=" span4 bg-amber fg-white alignCenter" >NAME</td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M', $sf_params->get('labour_survey_sdate') )  .', ' . ($sf_params->get('labour_survey_year') - 1) ?></td>
    <td class=" span2 bg-amber fg-white alignCenter" ><?php echo DateUtils::DUFormat('M, Y', $sf_params->get('labour_survey_sdate') ) ?></td>
    <td class=" span2 bg-amber fg-white alignCenter" >Avg Change</td>
    <td class=" span2 bg-amber fg-white alignCenter" >Less $1000</td>
    <td class=" span1 bg-amber fg-white alignCenter" >&nbsp;</td>
  </tr>
  <?php
  $seq = 1; 
  $seq_less_1000 = 0;
  $firstPeriod = HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') - 1 . DateUtils::DUFormat('-m-01', $sf_params->get('labour_survey_sdate')));
  $secondPeriod =HrLib::CreatePeriodCode($sf_params->get('labour_survey_year') . DateUtils::DUFormat('-m-t', $sf_params->get('labour_survey_edate')) );
  $foreignList = HrEmployeePeer::GetEmployeeListByRankCode($surveyPaidStart['list']['for'], 'WP');
  $total = 0;
  foreach( $foreignList as $name ): 
  	$firstval = isset($table_foreign[$name][$firstPeriod])? $table_foreign[$name][$firstPeriod] : 0;
  	$secondval= isset($table_foreign[$name][$secondPeriod])? $table_foreign[$name][$secondPeriod] : 0;
  	$avgChange = ($secondval - $firstval) / $firstval * 100;
  	$total += $avgChange;
  	$less_1000 = 0;
  	$show = '';
  	if ($secondval < 1001):
  		$less_1000 = $secondval - $firstval;
  		$seq_less_1000 ++;
  		$show = $seq_less_1000;
  	endif; 
  	$bgBasicHighlight = ($firstval <= $sf_params->get('basic_amount') ? 'bg-clearRed' : '');
  ?>
  <tr class="<?php echo $bgBasicHighlight; ?>" >
    <td class=" " ><?php echo $seq++ ?></td>
    <td class=" " ><?php echo $name ?></td>
    <td class="  alignRight" ><?php echo number_format($firstval,1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($secondval, 1)  ?></td>
    <td class="  alignRight" ><?php echo number_format($avgChange, 1)  ?></td>
    <td class=" alignRight" ><?php echo number_format($less_1000, 1) ?></td>
    <td class=" alignRight" ><?php echo $show ?></td>
  </tr>
  <?php 	
 endforeach;?>
  <tr>
    <td class=" " colspan="4" ></td>
    <td class=" alignRight" ><?php echo number_format($total, 1) ?></td>
    <td class=" alignRight" >&nbsp;</td>
  </tr>
</table>

