<?php use_helper('Form', 'Javascript'); 
sfConfig::set('app_page_heading', 'Daily Efficiency');
?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('production/weeklyMatrix'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Week</td>
    <td colspan="3" class="FORMcell-right" nowrap>
    <?php
    	$weekList = DateUtils::GetWeeksOfYearNumber(Date('Y'));
    	//var_dump($weekList);
 		echo select_tag('week_no', 
         options_for_select(($weekList), 
         $sf_params->get('week_no') ),'onchange=getDateOfWeekNo($F("week_no"), "2012")' );    
        //echo input_tag('test');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Daily</td>
    <td colspan="3" class="FORMcell-right" nowrap>
    <?php
//    echo input_tag('sdate', '', 'size=12');
//    echo ' to ';
//    echo input_tag('edate', '', 'size=12');
    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"' );
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15" ' );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td colspan="3" class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );

    echo select_tag('eGroup', 
         options_for_select(HrEmployeePeer::OptionEmploymentGroup(), 
         $sf_params->get('eGroup') ) );    
         
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Department(s)</td>
    <td width="20" class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('cleanroompacking', 'CLEANROOM PACKING', $sf_params->get('cleanroompacking')) . ' - CLEANROOM PACKING';
    ?>
    </td>
    <td width="20" class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('incoming', 'INCOMING(SORTING JUMPSUIT)', $sf_params->get('incoming')) . ' - INCOMING(SORTING JUMPSUIT)';
    ?>
    </td>    
    <td width="100%" class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('mcsother', 'MCS OTHER', $sf_params->get('mcsother')) . ' - MCS OTHER';
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>    <span class="negative">&nbsp;&nbsp;(no selection means no filter)</span></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('shoewashing', 'SHOE WASHING', $sf_params->get('shoewashing')) . ' - SHOE WASHING';
    ?>
    </td>  
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('shoepacking', 'SHOE PACKING', $sf_params->get('shoepacking')) . ' - SHOE PACKING';
    ?>
    </td>        
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('shoesvacuumpack', 'SHOES VACUUM PACK', $sf_params->get('shoesvacuumpack')) . ' - SHOES VACUUM PACK';
    ?>
    </td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('mcssupport', 'MCS SUPPORT', $sf_params->get('mcssupport')) . ' - MCS SUPPORT';
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('packingjumpsuit', 'PACKING (JUMPSUIT)', $sf_params->get('packingjumpsuit')) . ' - PACKING (JUMPSUIT)';
    ?>
    </td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo checkbox_tag('outsideshoepacking', 'OUTSIDE SHOE PACKING', $sf_params->get('outsideshoepacking')) . ' - OUTSIDE SHOE PACKING';
    ?>
    </td>    
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="benchmark" value=" Compute Efficiency " class="submit-button">
    </td>
</tr>
</table>
</form>

<?php echo javascript_tag("


function onWeekChanged(ev, args) {
    
    obj = YAHOO.util.Event.getTarget(ev);
    alert(obj.options[obj.selectedIndex].value);
}

YAHOO.util.Event.addListener('week2', 'change', onWeekChanged);
YAHOO.util.Event.addListener('week1', 'change', onWeekChanged);

") 

?>

<?php

	if (isset($benchmark))
	{ 
		$colors = sfConfig::get('app_amcharts_colors');
		$col = array('#CC0000', '#339900', '#478FB7', '#333366', '#F39308', '#A1C51D', '#F6BD0E', '#73B1B7', '#AF4035',
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900', '#663333', '#006699', '#336633', '#73B1B7', '#AF4035', 
					 '#FEE68C', '#C264C2', '#CCFF00', '#CC9900');
        $sdate = $sf_params->get('sdate');
        $edate = $sf_params->get('edate');
        $empNo = $sf_params->get('employee_no');
        $co   = ($sf_params->get('company') <> 'ALL') ? $sf_params->get('company') : '';
        $egrp = ($sf_params->get('eGroup')  <> 'ALL')  ? $sf_params->get('eGroup') : null;
		$seq=1;        
		$gbasi  = 0;
		$gpart  = 0;
		$got    = 0;
		$gallo  = 0;
		$gmeal  = 0;
		$gunde  = 0;
		$gabse  = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota  = 0;
		$proof  = '';
		$gptot  = 0;
		$sproof = '';
		$twdith = '600';
		$dgroup = array();
		    
         $dept = array();
         $dept = $sf_params->get('cleanroompacking')? array_merge($dept, array($sf_params->get('cleanroompacking'))) : $dept;
         $dept = $sf_params->get('incoming')? array_merge($dept, array($sf_params->get('incoming'))) : $dept;
         $dept = $sf_params->get('shoewashing')? array_merge($dept, array($sf_params->get('shoewashing'))) : $dept;
         $dept = $sf_params->get('shoepacking')? array_merge($dept, array($sf_params->get('shoepacking'))) : $dept;
         $dept = $sf_params->get('shoesvacuumpack')? array_merge($dept, array($sf_params->get('shoesvacuumpack'))) : $dept;
         $dept = $sf_params->get('mcssupport')? array_merge($dept, array($sf_params->get('mcssupport'))) : $dept;
         $dept = $sf_params->get('packingjumpsuit')? array_merge($dept, array($sf_params->get('packingjumpsuit') )) : $dept;
         $dept = $sf_params->get('outsideshoepacking')? array_merge($dept, array($sf_params->get('outsideshoepacking'))) : $dept;
         $dept = $sf_params->get('mcsother')? array_merge($dept, array($sf_params->get('mcsother'))) : $dept;
         
        	$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, $dept);
        	$empList = $empData['list'];
//        	var_dump($empList);
//        	exit();
            
            if (! implode($dept)) {
                return $this->getContext()->getRequest()->getErrorMsg()->addMsg('Must Select a Group.');
            }

        	//------------------------------------------- ARTICLE
        	//$serList = SalesQuantitySummaryPeer::GetServiceListbyDate($sdate, $edate);
        	$serList = SalesQuantitySummaryPeer::GetOptimizedDatabyProductGroupDateRange($sdate, $edate, $dept);

        	//$serList = array('BOOTIES', 'JUMPSUIT /COVERALL');
       	    $proof =  $proof .  '
       	    
			<table width="'.$twdith.'" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
			  <tr>
			    <td colspan="'. (DateUtils::DUFormat('t', $edate) + 3) .'" class="tk-style36 tk-menu alignCenter" nowrap>ARTICLES</td>
			  </tr>';
            $proof =  $proof .  '       	
			  <tr class="tk-dgra">
			    <td colspan="2" width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate ).'</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $proof = $proof .  '
        	        <td width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('D', $cdate ).'</td>
        	        ';
        	    }
        	$proof = $proof . '
        	  <td width="20" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
            
        	$proof =  $proof .  '       	
			  <tr class="tk-dgra">
			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Description</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $proof = $proof .  '
        	        <td width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('j', $cdate ).'</td>
        	        ';
        	    }
        	$proof = $proof . '
        	  <td width="20" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
        	
       	    $seq = 1;     
       	    foreach($serList as $ke=>$ve)
       	    {
       	        $bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
       	        $serData = SalesQuantitySummaryPeer::GetDataByProductGroupDateRange($ve, $sdate, $edate);
                $proof =  $proof .  '       	
    			  <tr class="">
    			    <td width="20" class="alignCenter FORMcell-left '.$bgclr.'"  nowrap>'.$seq++.'</td>
    			    <td width="130" class="alignCenter FORMcell-Center '.$bgclr.'" nowrap>'.$ve.'</td>
    			    ';
            	    $tqty = 0;
            	    $mArt = array();
           	        for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
            	    {
            	        $cdate = DateUtils::AddDate($sdate, $x);
            	        $nqty = 0;
            	        foreach( $serData as $rec)
            	        {
            	            if ($cdate == $rec->getDateTransaction())
            	            {
            	               $nqty = ($rec->getQuantity() > 0? $rec->getQuantity() : 0);
            	               $tqty = $tqty + $nqty;
            	               $mArt[$cdate][] = $nqty ;         	               
            	            }
            	        }
            	       
       	                $proof = $proof .  '
       	        			<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$nqty.'</td>
            			';
           	        }
       	        $proof = $proof . '
       	        <td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$tqty.'</td>
       	          </tr>
       	        ';
       	    }
       	    //---------------------------------------- summary of data
            $pdqty = array();   //total hour
        	for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	{
        	    $ntot = 0;
        	    $nemp = 0;
        	    $cdate = DateUtils::AddDate($sdate, $x);
        	    foreach ($serList as $ke=>$service)
        	    {
        	        $sData = SalesQuantitySummaryPeer::GetOptimizedDatabyProductGroupDate($service, $cdate, array('quantity'));
        	        if ($sData)
        	        {
        	            $ntot  = $ntot + ($sData->get('QUANTITY') > 0? $sData->get('QUANTITY') : 0);
        	        }
        	    }
        	    $pdqty[$x+1] = $ntot;
        	}        	    
       	    //--------------------------- TOTAL QUANTITY
        	$bgclr = 'tk-pink';
        	$gtotal = 0;
        	$proof = $proof . '
				  <tr>
				    <td colspan="2" height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>TOTAL QUANTITY</td>
        		';
        	    foreach($pdqty as $ke=>$ve)
        	    {
        	        $gtotal = $gtotal + $ve;
        	        $proof = $proof . '
        	               <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $ve .'</td>
        	               ';
        	    }
//    	    foreach($mAmt as $ke=>$ve)
//    	    {
//    	        $proof = $proof . '
//    	               <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $ve .'</td>
//    	               ';
//    	    }
       	                
            	$proof = $proof . '
        	               <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $gtotal .'</td>            	
           		</tr>';
            	
        		$proof =  $proof .  '
        			</table>
        			';
		
		
		
		//--------------------------------- employee effeciency
		$seq = 1;
       	$proof =  $proof .  '
       		
			<table width="'.$twdith.'" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
			  <tr>
			    <td colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-style36 tk-menu alignCenter" nowrap>DAILY WORKING HOURS</td>
			  </tr>
			  <tr class="tk-dgra">
			    <td colspan="3" width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
//        	        echo DateUtils::DUFormat('M-d-Y', $cdate) . '<br>';
        	        $proof = $proof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('D', $cdate).'</td>
        	        ';
        	    }
            	$proof = $proof . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
              
              $proof =  $proof .  '            	
			  <tr class="tk-dgra">
			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Name</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Team</td>';
        	    for($x=1; $x<= DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x-1);
        	        $proof = $proof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('j', $cdate).'</td>
        	        ';
        	    }
            	$proof = $proof . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
            	
        	//$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, $dept);
        	//$empList = $empData['list'];
        	$cdate = $sdate;
        	//$empList = array('033039697170209');
        	foreach($empList as $ke=>$empNo)
        	{
        	    $empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdate, $edate);
        		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        		$empDetail = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','team'));
        		$proof = $proof . '
				  <tr>
				    <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('NAME').'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('TEAM').'</td>
        		';
        		$totpday = 0;
        		$gpday   = 0;
        		$dhrs    = 0;
        		$cdaily  = 0;
        		$nohrs =0;
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        //echo DateUtils::DUFormat('M-d-Y', $cdate) . '<br>';
        	        $nohrs = 0;
        	        foreach( $empData as $rec)
        	        {
        	            if ($cdate == $rec->getTransDate())
        	            {
        	               $nohrs = ($rec->getAcDura() > 0? $rec->getAcDura() : 0);
        	               $dhrs = $dhrs + $nohrs;        	               
        	            }
        	        }
   	                $proof = $proof .  '
   	        			<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $nohrs .'</td>
        			';
       	        }
       	        //exit();
        	        $proof = $proof .  '
        	        	<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.($dhrs? $dhrs: 0).'</td>
        	        ';
       	        
            	$proof = $proof . '
           		</tr>';
        	}

//***********generate summary     
            $summ = GenerateSummary($empList, $sdate, $edate);
            $proof = $proof . $summ['proof'];
            $totem = $summ['totem'];
            $tothr = $summ['tothr'];
            	
        	$proof = $proof . '
			</table>
			
			';   
        	
        	//------------------------------------------------ summary
       	    $sproof = $sproof .  '
       	    
			<table width="'.$twdith.'" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
			  <tr>
			    <td width="20" colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-style36 tk-menu alignCenter" nowrap>DATA SUMMARY</td>
			  </tr>';
        	       	    
       	    $sproof = $sproof .  '
			  <tr class="tk-dgra">
			    <td colspan="3" width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
			    ';       	   
       	  // var_dump( DateUtils::DateDiff('d', $sdate, $edate));
       	  // exit();
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $sproof = $sproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('D', $cdate).'</td>
        	        ';
        	    }
            	$sproof = $sproof . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
        	       	    
            $sproof =  $sproof .  '       	
			  <tr class="tk-dgra">
			    <td colspan="3" height="25" width="40" class="alignCenter FORMcell-Center " nowrap>Description</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $sproof = $sproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center " nowrap>'.DateUtils::DUFormat('j', $cdate).'</td>
        	        ';
        	    }
        	$sproof = $sproof . '
        	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
        	
            //------------------------------ per day washed
            $bgclr = 'tk-lgra';
            $pdart = 0;
        	$sproof =  $sproof .  '       	
			  <tr class="'. $bgclr .'">
			    
			    <td colspan="3" height="25" width="80" class="alignCenter FORMlabel FORMcell-Center" nowrap>Per Day Articles Washed</td>
			    ';
        	    for($x=1; $x<= DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x-1);
        	        $pdart = $pdart + $pdqty[$x];
        	        $sproof = $sproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.$pdqty[$x].'</td>
        	        ';
        	    }
        	$sproof = $sproof . '
        	  <td width="30" class="alignCenter FORMcell-Center" nowrap>'.number_format($gtotal).'</td>        	
        	</tr>';
            $sproof = $sproof . $summ['proof'];
     	
        	
        	//------------------------------ PRODUCTIVITY
        	$pdmhrs = 0;
        	foreach($tothr as $ke=>$ve) {
        	    $pdmhrs = $pdmhrs + $ve;
        	}
        	
            $tprod = 0;
        	$sproof =  $sproof .  '       	
			  <tr class="tk-gree">
			    <td colspan="3" height="25" width="80" class="alignCenter FORMcell-Center" nowrap>PRODUCTIVITY</td>
			    ';
        	    for($x=1; $x<= DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x-1);
        	        $avemhr = number_format($tothr[$x] / ($totem[$x] > 0? $totem[$x]: 1 ) );
        	        $prod = $pdqty[$x] / ($avemhr?$avemhr: 1)/ ($totem[$x] > 0? $totem[$x]: 1 );
        	        $tprod = $tprod + $prod;
        	        $sproof = $sproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'. number_format($prod , 1).'</td>
        	        ';
        	    }
        	$gProductivity = $pdmhrs ? number_format($gtotal / $pdmhrs) : 0;
        	$sproof = $sproof . '
        	  <td width="30" class="alignCenter FORMcell-Center" nowrap>'.$gProductivity.'</td>        	
        	</tr>';
            
        	$sproof = $sproof . '
        	</table>
        	
        	';
        	
        //*********************************************************************** by group
        foreach($dept as $ke=>$group)
        {
            $seq = 1;
            $proofList = '';
       	    $proofList =  $proofList .  '
       	    
			<table width="'.$twdith.'" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
			  <tr>
			    <td colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-style36 tk-menu alignCenter" nowrap>'.$group.'</td>
			  </tr>
			  <tr class="tk-dgra">
			    <td colspan="3" width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $proofList = $proofList .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('D', $cdate).'</td>
        	        ';
        	    }
            	$proofList = $proofList . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
              
              $proofList =  $proofList .  '            	
			  <tr class="tk-dgra">
			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Name</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Team</td>';
        	    for($x=1; $x<= DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x-1);
        	        $proofList = $proofList .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('j', $cdate).'</td>
        	        ';
        	    }
            	$proofList = $proofList . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
            
//	       	$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, array($group));
//        	$empList = $empData? $empData['list'] : array();
        	$cdate = $sdate;
        	//$empList = array('033039697170209');
        	foreach($empList as $ke=>$empNo)
        	{
        	    $empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdate, $edate);
        		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        		$empDetail = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','team'));
        		$proofList = $proofList . '
				  <tr>
				    <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('NAME').'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('TEAM').'</td>
        		';
        		$totpday = 0;
        		$gpday   = array();
        		$dhrs    = 0;
        		$cdaily  = 0;
        		$nohrs =0;
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
        	        $nohrs = 0;
        	        foreach( $empData as $rec)
        	        {
        	            if ($cdate == $rec->getTransDate())
        	            {
        	               $nohrs = ($rec->getAcDura() > 0? $rec->getAcDura() : 0);
        	               $dhrs = $dhrs + $nohrs;
        	               $gpday[] = $nohrs;        	               
        	            }
        	        }
   	                $proofList = $proofList .  '
   	        			<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $nohrs .'</td>
        			';
       	        }
//       	        var_dump($gpday);
//       	        exit();
    	        $proofList = $proofList .  '
    	        	<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.($dhrs? $dhrs: 0).'</td>
    	        ';
            	

    	        
    	        $proofList = $proofList . '
           		</tr>';
    	        
        	}
    	    $summ = GenerateSummary($empList, $sdate, $edate);
            $proofList = $proofList . $summ['proof'];
        	$proofList = $proofList . '
      		</table>
      		';
      		
        	$dgroup[$group]['proof'] = $proofList;
        }
        
//*************************************************************************************************************** data 
//            var_dump($empList);
//            exit();
	//--------------------------------- employee effeciency
		$seq = 1;
		$incproof = '';
       	$incproof =  $incproof .  '
       		
			<table width="'.$twdith.'" class="FORMtable" border="0" cellpadding="4" cellspacing="2">
			  <tr>
			    <td colspan="'. (DateUtils::DUFormat('d', $edate) + 4) .'" class="tk-style36 tk-menu alignCenter" nowrap>DAILY EMPLOYEE INCOME (SELECTED)</td>
			  </tr>
			  <tr class="tk-dgra">
			    <td colspan="3" width="20" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('F', $sdate).'</td>
			    ';
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x);
//        	        echo DateUtils::DUFormat('M-d-Y', $cdate) . '<br>';
        	        $incproof = $incproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('D', $cdate).'</td>
        	        ';
        	    }
            	$incproof = $incproof . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
              
              $incproof =  $incproof .  '            	
			  <tr class="tk-dgra">
			    <td width="20" class="alignCenter FORMcell-left" nowrap>Seq</td>
			    <td width="80" class="alignCenter FORMcell-Center" nowrap>Name</td>
			    <td width="50" class="alignCenter FORMcell-Center" nowrap>Team</td>';
        	    for($x=1; $x<= DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	        $cdate = DateUtils::AddDate($sdate, $x-1);
        	        $incproof = $incproof .  '
        	        <td width="30" class="alignCenter FORMcell-Center" nowrap>'.DateUtils::DUFormat('j', $cdate).'</td>
        	        ';
        	    }
            	$incproof = $incproof . '
    	    	  <td width="30" class="alignCenter FORMcell-Center" nowrap>total</td>        	
        	</tr>';
            	
        	//$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, $dept);
        	//$empList = $empData['list'];
        	$cdate = $sdate;
        	//$empList = array('034275785150311');
        	foreach($empList as $ke=>$empNo)
        	{
        	    $empData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdate, $edate);
        		$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        		$empDetail = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name','team'));
        		$incproof = $incproof . '
				  <tr>
				    <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$seq++.'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'.$empDetail->get('NAME').'</td>
				    <td width="80" class="alignCenter FORMlabel '.$bgclr.'" nowrap></td>
        		';
        		$totpday = 0;
        		$gpday   = 0;
        		$dhrs    = 0;
        		$cdaily  = 0;
        		$nohrs =0;
        		$incTot = 0;
        		$dtTotal = array();
        	    for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	    {
        	    	if (! isset($dtTotal[$cdate])) $dtTotal[$cdate] = 0;
        	    	$empInc = 0;
        	        $cdate = DateUtils::AddDate($sdate, $x);
 					$empInc += round(TkDtrsummaryPeer::GetEmployeeIncomeEstimate($empNo, $cdate, $cdate ), 2);
 					$incTot = $incTot + $empInc;
 					//$dtTotal[$cdate] = $dtTotal[$cdate] + $empInc;
   	                $incproof = $incproof .  '
   	        			<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'. $empInc .'</td>
        			';
       	        }
				//$dtTotal[$cdate] = $dtTotal[$cdate] + $empInc;
                $incproof = $incproof .  '
                	<td width="30" class="alignCenter FORMcell-Center '.$bgclr.'"  nowrap>'.$incTot.'</td>
                ';
       	        
            	$incproof = $incproof . '
           		</tr>';
        	}
            	
//        	$incproof = $incproof . '
//        	<tr>
//        	<td width="30" class="alignCenter FORMcell-Center tk-pink"  nowrap></td>
//        	<td width="30" class="alignCenter FORMcell-Center tk-pink"  nowrap>TOTAL</td>
//        	<td width="30" class="alignCenter FORMcell-Center tk-pink"  nowrap></td>
//        	';
//        	for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
//        	{
//        		$cdate = DateUtils::AddDate($sdate, $x);
//        		$incproof = $incproof .  '
//                	<td width="30" class="alignCenter FORMcell-Center tk-pink"  nowrap>'.$dtTotal[$cdate].'</td>
//                ';
//        	}
        	$incproof= $incproof . '</tr>
			</table>
			
			';   
        	        
		//******************************************************
			//***   Daily Overall
			//******************************************************
		    if ($co == "Micronclean") $xco = 1; 
		    if ($co == "Acro Solution") $xco = 2; 
		    if ($co == "NanoClean") $xco = 5; 
		    if ($co == "T.C. Khoo") $xco = 4; 
			$dSumm = FinanceSummaryPeer::GetDailyTransaction($sdate, $edate, $xco);
			$tickLabels = array();
			$ballonLabels = array();
			foreach($dSumm as $ke=>$ve)
			{
				$ballonLabels[] = '';
				$tickLabels[]   = $ke;
			}
			$spara = array('ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabels
			);
			include_partial('clustered_chart', array_merge($spara, array('title'=>'Daily Sales vs Expense Trend\nAll Micronclean Employee','plotDatas'=>$dSumm), array('colors'=>$col), array('units'=>'Amount')));
			       	
		//******************************************************
			//***   Daily Transaction
			//******************************************************
		    if ($co == "Micronclean") $xco = 1; 
		    if ($co == "Acro Solution") $xco = 2; 
		    if ($co == "NanoClean") $xco = 5; 
		    if ($co == "T.C. Khoo") $xco = 4; 
        	//$empData = TkDtrsummaryPeer::GetTotalManWorkingbyDateRange($sdate, $edate, $co, $dept);
        	//$empList = $empData['list'];		  
        	//$empList = array('034275785150311');
			$dSumm = FinanceSummaryPeer::GetDailyTransactionSelectedEmployee($sdate, $edate, $xco, $empList);
			$tickLabels = array();
			$ballonLabels = array();
			foreach($dSumm as $ke=>$ve)
			{
				$ballonLabels[] = '';
				$tickLabels[]   = $ke;
			}
			$spara = array('ballonLabels'=>$ballonLabels , 
				'tickLabels'=>$tickLabels
			);
			include_partial('clustered_chart', array_merge($spara, array('title'=>'Daily Sales vs Expense Trend\nSelected Micronclean Employee','plotDatas'=>$dSumm), array('colors'=>$col), array('units'=>'Amount')));
//        var_dump($empList);
//		exit();

        //*********************************************************************** by group
        echo '<div id="DIVFinanceHalfScreen">';     
        echo '<div id="DIVFinanceDataScreen">' . $sproof . "</div>";
        echo '<div id="DIVFinanceDataScreen">' . $proof . "</div>";
        if (sizeof($dgroup) > 1):
	        foreach($dgroup as $ke=>$group){
	            echo $group['proof'];
	        }
        endif;
        echo '</div>';
        echo '<div id="DIVFinanceHalfScreen">';

			 echo '<div id="DIVFinanceDataScreen">' . $incproof . "</div>";        
        echo '</div>';
        echo '<div id="clear"></div>';
        
	}
	        
        function GenerateSummary($empList, $sdate, $edate)
        {
            $seq = 1;
            $proof = '';
            //---------------------------------------- summary of data
            $tothr = array();   //total hour
            $totem = array();   //total employee
        	for($x=0; $x< DateUtils::DateDiff('d', $sdate, $edate) + 1; $x++)
        	{
        	    $ntot = 0;
        	    $nemp = 0;
        	    $cdate = DateUtils::AddDate($sdate, $x);
        	    foreach ($empList as $ke=>$empNo)
        	    {
        	        $eData = TkDtrsummaryPeer::GetOptimizedDatabyEmployeeNoDate($empNo, $cdate, array('ac_dura'));
        	        if ($eData)
        	        {
        	            $ntot  = $ntot + ($eData->get('AC_DURA') > 0? $eData->get('AC_DURA') : 0);
        	            if ( $eData->get('AC_DURA') > 0 )  $nemp++;
        	        }
        	    }
        	    $tothr[$x+1] = $ntot;
        	    $totem[$x+1] = $nemp;
        	}            
        	
        	//--------------------------- TOTAL MAN-HOURS
        	$tmh = 0;
        	$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        	$proof = $proof . '
				  <tr>
				    <td colspan="3" height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>TOTAL MAN-HOURS</td>
        		';
        	     foreach($tothr as $ke=>$ve)
        	    {
        	        $tmh = $tmh + $ve;
        	        $proof = $proof . '
        	               <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $ve .'</td>
        	               ';
        	    }
            	$proof = $proof . '
            	           <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $tmh .'</td>
           		</tr>';
        	
        	//--------------------------- DIRECT STAFF
        	$bgclr = ($seq % 2 == 0)? 'tk-gray' : 'tk-lgra';
        	$tdstaff = 0;
        	$proof = $proof . '
				  <tr>
				    <td colspan="3" height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>DIRECT STAFF</td>
        		';
        	    foreach($totem as $ke=>$ve)
        	    {
        	        $tdstaff = $tdstaff + $ve ;
        	        $proof = $proof . '
        	               <td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $ve .'</td>
        	               ';
        	    }
            	$proof = $proof . '
            	<td height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>'. $tdstaff .'</td>
           		</tr>';
            	
        	//--------------------------- AVERAGE MAN-HOUR PER DAY
        	$bgclr = 'tk-pink';
        	$pos = 1;
        	$gave = 0;
        	$proof = $proof . '
				  <tr class="tk-pink">
				    <td colspan="3" height="25" width="20" class="alignCenter FORMlabel '.$bgclr.'" nowrap>AVERAGE MAN-HOUR <br>( TOTAL MAN HOURS / STAFF)</td>
        		';
        	    foreach($totem as $ke=>$ve)
        	    {
        	        $avemhr = number_format($tothr[$pos] / ($totem[$pos] > 0? $totem[$pos]: 1 ) );
        	        $gave = $gave + $avemhr;
        	        $proof = $proof . '
        	               <td height="25" width="20" class="alignCenter FORMlabel '. $bgclr .'" nowrap>'. $avemhr .'</td>
        	               ';
        	        $pos++;
        	    }
        	    $gTotalManHours = $tdstaff ?  number_format($tmh/$tdstaff, 1) : 0;
        	    $proof = $proof . '
        	             <td height="25" width="20" class="alignCenter FORMlabel '. $bgclr .'" nowrap>'. $gTotalManHours .'</td>
        	               ';
        	    
            	$proof = $proof . '
           		</tr>';
            	
        return array('proof'=>$proof, 'tothr'=>$tothr, 'totem'=>$totem);            
        }
        
        
?>
	 
<script type="text/javascript">

function getDateOfWeekNo(week, year)
{
  Date.prototype.toDateString = function() {
    return [[['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][this.getMonth()], this.getDate()].join('. '), this.getFullYear()].join(', ');
  }
  
  //var weekNum = "201206";
  var weekNum = year + week;
  //alert(weekNum);
  
  var yr = weekNum.substr(0,4);
  var wk = weekNum.substr(4,6);

  var tm = 1000*60*60*24;
  var d=0;
  do {
    var start = new Date(yr,0,1+d);
    d++
  } while(start.getDay() != 1)

  var sta_dt = new Date(start.getTime()+tm*(wk-1)*7);
  //var end_dt = new Date(sta_dt.getTime()+tm*6);
  
  var curr_date  = pad(sta_dt.getDate() - 1);
  var curr_month = pad(sta_dt.getMonth() + 1); //Months are zero based
  var curr_year  = sta_dt.getFullYear();
  var startdt = curr_year + "-" + curr_month + "-" + curr_date;
  var end_dt = new Date(curr_year, sta_dt.getMonth(),  (sta_dt.getDate() + 5) );
  var enddt = end_dt.getFullYear() + "-" + pad(end_dt.getMonth() + 1) + "-" + pad(end_dt.getDate());
  //alert(sta_dt.getDate());
  //var startdt = sta_dt.getFullYear() + "-" + sta_dt.getMonth() + 1 + "-" + (sta_dt.getDate() - 1);
  //var enddt = end_dt.getFullYear() + "-" + end_dt.getMonth() + 1 + "-" + (end_dt.getDate() - 1);
  
  document.getElementById("xIDx_1").value =  startdt ;
  document.getElementById("xIDx_3").value = enddt;
  //alert(end_dt.getDate() - 1);
  //alert(startdt  + " to " + enddt); 

}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

</script>