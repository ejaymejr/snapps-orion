<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<table class="table bordered condensed ">
  <tr>
    <td class="FORMlabel" colspan="7"><h2>PART I. LABOUR TURNOVER AND JOB VACANCIES </h2></td>
  </tr>
  <tr>
    <td height="48" colspan="3"><div align="center"><h2>T. C. Khoo &amp; Co Pte. Ltd. </h2> <br><h2>Labour Market Survey from <?php echo DateUtils::DUFormat('M-Y', $sf_params->get('labour_survey_sdate')) .' to ' . DateUtils::DUFormat('M-Y', $sf_params->get('labour_survey_edate'))?> </h2></div></td>
    <td width="11%"><div align="center">Professionals, managers, executives and technicians </div></td>
    <td width="10%"><div align="center">Clerical, sales and service workers </div></td>
    <td width="10%"><div align="center">Production &amp; transport operators, tradesmen, cleaners and labourers </div></td>
    <td width="8%"><div align="center">TOTAL</div></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" width="5%" rowspan="4">1</td>
    <td class="FORMcell-left FORMlabel" width="37%" rowspan="4">Total number of paid employees as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) ?> </td>
    <td class="FORMcell-left FORMlabel" width="19%">Singapore Citizen </td>
    <td class="FORMcell-left FORMlabel">
    	<?php echo link_to( $surveyPaidStart['total_singaporean_profession'],'',
			"onclick=showHideElement('DIVShowHideTotalSingProf');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingProf" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['list']['singaporean_professional'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( $surveyPaidStart['total_singaporean_clerk'],'',
			"onclick=showHideElement('DIVShowHideTotalSingclerk');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingclerk" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['list']['singaporean_clerk'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo link_to( $surveyPaidStart['total_singaporean_production'],'',
			"onclick=showHideElement('DIVShowHideTotalSingProd');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSingProd" style="display:none"><small>
    		<?php 	
					$seq = 1;
    				foreach($surveyPaidStart['list']['s_prod'] as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div><?php //echo $surveyPaidStart['total_singaporean_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php //echo $surveyPaidStart['total_singaporean'] ?>
    <?php echo link_to( $surveyPaidStart['total_singaporean'],'',
			"onclick=showHideElement('DIVShowHideTotalSing');return false;" . " style=cursor:pointer;" );
    	?><div id="DIVShowHideTotalSing" style="display:none"><small>
    		<?php 	
    				$allSing = (array_merge($surveyPaidStart['list']['singaporean_professional'], $surveyPaidStart['list']['singaporean_clerk'], $surveyPaidStart['list']['s_prod']));
    				asort($allSing);
					$seq = 1;
    				foreach($allSing as $name ): 
    					echo $seq++. '. ' . $name .'<br>'; 
    				endforeach;?>
    		</small></div>
    	<?php //echo $surveyPaidStart['total_singaporean_profession']; ?>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Permanent Resident</td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_pr_profession'],'',
		"onclick=showHideElement('DIVShowHideTotalPRProf');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideTotalPRProf" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['pr_professional'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_pr_clerk'],'',
		"onclick=showHideElement('DIVShowHideTotalPRClerk');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideTotalPRClerk" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['pr_clerk'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>	
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_pr_production'],'',
		"onclick=showHideElement('DIVShowHideTotalPRProd');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideTotalPRProd" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['pr_prod'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>	
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_pr'],'',
		"onclick=showHideElement('DIVShowHideTotalPR');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideTotalPR" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['pr'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_foreign_profession'],'',
		"onclick=showHideElement('DIVShowHideForPro');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForPro" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['for_professional'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_foreign_clerk'],'',
		"onclick=showHideElement('DIVShowHideForClerk');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForClerk" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['for_clerk'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_foreign_production'],'',
		"onclick=showHideElement('DIVShowHideForProd');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideForProd" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['for_prod'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_foreign'],'',
		"onclick=showHideElement('DIVShowHideFor');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideFor" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['for'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_profession'] + $surveyPaidStart['total_foreign_profession']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_clerk'] + $surveyPaidStart['total_foreign_clerk']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_production'] + $surveyPaidStart['total_foreign_production']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr'] + $surveyPaidStart['total_foreign'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">2</td>
    <td class="FORMcell-left FORMlabel" rowspan="3">Number of new employees who joined your establishment during <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) .' to '. DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') )?> </td>
    <td class="FORMcell-left FORMlabel" width="19%">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_professional'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_production'] + $surveyNew['new_spr_clerk'] + $surveyNew['new_spr_professional'] ?>
    <?php 
//     foreach($surveyNew['list'] as $list):
//     	echo $list .'<br>';
//     endforeach;
    ?>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_foreign_professional'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_foreign_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_foreign_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_foreign_professional'] + $surveyNew['new_foreign_clerk'] + $surveyNew['new_foreign_production']?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_professional'] + $surveyNew['new_foreign_professional']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_clerk'] + $surveyNew['new_foreign_clerk']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_production'] + $surveyNew['new_foreign_production']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyNew['new_spr_professional'] + $surveyNew['new_foreign_professional']
    												+ $surveyNew['new_spr_clerk'] + $surveyNew['new_foreign_clerk']
    												+ $surveyNew['new_spr_production']+ $surveyNew['new_foreign_production']
    												?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">3</td>
    <td class="FORMcell-left FORMlabel" rowspan="3">Total number of employees who left your establishment during   <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) .' to '. DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> </td>
    <td class="FORMcell-left FORMlabel" width="19%">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_professional'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_production'] + $surveyResigned['resigned_spr_clerk'] + $surveyResigned['resigned_spr_professional'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_foreign_professional'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_foreign_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_foreign_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_foreign_production'] + $surveyResigned['resigned_foreign_clerk'] + $surveyResigned['resigned_foreign_professional'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_professional'] + $surveyResigned['resigned_foreign_professional']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_clerk'] + $surveyResigned['resigned_foreign_clerk']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_production'] + $surveyResigned['resigned_foreign_production']?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyResigned['resigned_spr_professional'] + $surveyResigned['resigned_foreign_professional']
    												+ $surveyResigned['resigned_spr_clerk'] + $surveyResigned['resigned_foreign_clerk']
    												+ $surveyResigned['resigned_spr_production']+ $surveyResigned['resigned_foreign_production']
    												?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">(I) Resignations</div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
      <p>(II) Expiry of Contracts<br />
        (written / verbal ) </p>
      </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(III) Retirements </p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(IV) Retrenchments </p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(V) Early release of contract (written/verbal)<br />
          workers due to redundancy</p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(VI) Dismissal </p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(VII) Transfer to subsidiaries/associate<br />
          establishments</p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>(VII) Others </p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" height="25">Total</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" rowspan="3">4</td>
    <td class="FORMcell-left FORMlabel" rowspan="3"><div align="center">
        <p>Total number of paid employees as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> </p>
    </div></td>
    <td class="FORMcell-left FORMlabel">Singapore Citizen &amp; PR </td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_profession'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Foreigners</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_foreign_profession'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_foreign_clerk'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_foreign_production'] ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_foreign'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">Total</td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_profession'] + $surveyPaidStart['total_foreign_profession']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_clerk'] + $surveyPaidStart['total_foreign_clerk']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr_production'] + $surveyPaidStart['total_foreign_production']  ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_spr'] + $surveyPaidStart['total_foreign'] ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">5</td>
    <td class="FORMcell-left FORMlabel">No of job vacancies as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">6</td>
    <td class="FORMcell-left FORMlabel">No of employees laid-off temporarily at any time during <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) .'to '. DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> to &lt;End Month&gt; </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">7</td>
    <td class="FORMcell-left FORMlabel">Number of employees placed on short work-week at any time during  <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_sdate') ) .'to '. DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') )?>  </td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
    <td class="FORMcell-left FORMlabel">&nbsp;</td>
  </tr>
</table>
<table class="table condensed bordered" >
  <tr>
    <td class="FORMlabel" colspan="4"><h2>PART II. Hours Worked </h2></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" colspan="2">&nbsp;</td>
    <td class="FORMcell-left FORMlabel" width="12%"><div align="center">Full-time Employeees </div></td>
    <td class="FORMcell-left FORMlabel" width="11%"><div align="center">Part-time Employees </div></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel" width="8%">1</td>
    <td class="FORMcell-left FORMlabel" width="69%">Total number of paid employees as at <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') );  ?></td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_fulltime'],'',
		"onclick=showHideElement('DIVShowHideFulltime');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideFulltime" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['fulltime'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
    <td class="FORMcell-left FORMlabel">
    <?php echo link_to( $surveyPaidStart['total_parttime'],'',
		"onclick=showHideElement('DIVShowHideParttime');return false;" . " style=cursor:pointer;" );
    ?><div id="DIVShowHideParttime" style="display:none"><small>
    	<?php 	
				$seq = 1;
    			foreach($surveyPaidStart['list']['parttime'] as $name ): 
    				echo $seq++. '. ' . $name .'<br>'; 
    			endforeach;?>
    	</small></div>
    </td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">2</td>
    <td class="FORMcell-left FORMlabel">Total weekly standard hours of work for a normal week in <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ; ?> </td>
    <td class="FORMcell-left FORMlabel"><?php echo $surveyPaidStart['total_fulltime'] * 44//echo '42' ?> <br>(44hrs/week) <br><span class="negative"></span></td>
    <td class="FORMcell-left FORMlabel"><?php //echo round($surveyOT['parttime_allowed_ot_hrs'] / 4 , 1) ?> (0-36hrs/week)<br><span class="negative"></span></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">3</td>
    <td class="FORMcell-left FORMlabel">Total number of employees who were paid for overtime worked in <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> <br> <span class="negative">specify the last month only to get the value for this</span></td>
    <td class="FORMcell-left FORMlabel"><?php echo sizeof($surveyOT['employee_list_fulltime']) ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo sizeof($surveyOT['employee_list_parttime']) ?></td>
  </tr>
  <tr>
    <td class="FORMcell-left FORMlabel">4</td>
    <td class="FORMcell-left FORMlabel">Total paid overtime hours worked in <?php echo DateUtils::DUFormat('Y-m-d' , $sf_params->get('labour_survey_edate') ) ?> <br> <span class="negative">specify the last month only to get the value for this</span></td>
    <td class="FORMcell-left FORMlabel"><?php echo round($surveyOT['fulltime_allowed_ot_hrs'] , 1) ?></td>
    <td class="FORMcell-left FORMlabel"><?php echo round($surveyOT['parttime_allowed_ot_hrs'] , 1) ?></td>
  </tr>
</table>