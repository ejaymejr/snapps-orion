<?php use_helper('Text', 'Number', 'Form', 'Javascript'); ?>

<?php
    //var_dump(sfContext::getInstance()->getUser()->getcredentials() ) ;


$xuser  = $sf_user->getUsername();
$tDura  = 0;
$tADura = 0;
$tNormal= 0;
$tOt    = 0;
$tUt    = 0;
$tMeal  = 0;
$tAmt   = 0;
$tPInc  = 0;
$tAll   = 0;
$tLevy  = 0;
$ot1    = 0;
$ot2    = 0;
$ot3    = 0;
$SN = 1;
$rowCount = 0;
$tbas = 0;
$tOv  = 0;
$tUn  = 0;
$wscan  = 0;
$wleave = 0;
$cntAtt = 0;
$cntAbs = 0;
$cntDura = 0;
$cntOt   = 0;
$totNorm = 0;
$totOver = 0;
$cntOffDay = 0;
$counter = 0;
$dReq = 0;
$addHol = 0;
$rph    = 0;
$raw = array(
			 'name'=>array()
			,'group'=>array()
			,'wscan'=>array()
			,'wleave'=>array()
			,'cntAtt'=>array()
			,'cntAbs'=>array()
			,'cntDura'=>array()
			,'cntOt'=>array()
			,'totNorm'=>array()
			,'totOver'=>array()
			,'cntOffDay'=>array()
			);

$SN = $pager->getFirstIndice();
$tincome = 0;
$tdeduction = 0;
foreach ($pager->getResults() as $record){
    $counter++;
    $dReq = ($record->getNormal() > $dReq? $record->getNormal() : $dReq );
    $rph  = ($record->getRatePerHour() > $rph? $record->getRatePerHour() : $rph );
    $wscan   = $wscan + ($record->getAcDura()?  1 : 0); 
    $wleave  = $wleave + ($record->getLeaveType() ? ($record->getLeaveType() != 'Leave without Pay'? 1 : 0) : 0);
    $cntOffDay   = $cntOffDay + ($record->getDayoff() == 'Y'?  1 : 0);
    $groupID = 'tbody_' . $record->getId();
    $cntAtt  = $cntAtt + ($record->getAttendance() == 'P'?  1 : 0);
    $cntAbs  = $cntAbs + ($record->getAttendance() != 'P'?  1 : 0);
    $cntDura = $cntDura + ($record->getAcDura()?  $record->getAcDura() : 0);
    $addHol  = $addHol + ($record->getHolidayCode() && $record->getAcDura() <= 0?  $dReq : 0);
    $cntOt   = $cntOt + ($record->getOvertimes()?  $record->getOvertimes() : 0);
    
    $totNorm  = $totNorm + ($record->getPartTimeIncome()?  
                $record->getPartTimeIncome() : 
                $record->getRatePerHour() *  $record->getAcDura());
    
    
                
    $totOver  = $totOver + ($record->getRatePerHour() *  $record->getOvertimes() * $record->getMultiplier());
    ?>    
    <tbody id="<?=$groupID?>">
    <?php
    include_partial('proofpayslip_row', 
                    array('record' => $record,
                        'SN' => $SN,
                        'rowCount' => $rowCount,
                        'groupID' => $groupID)); 
                    
                    
    switch($record->getMultiplier())
    {
        case 1.5:
            $ot1 = $ot1 + $record->getOvertimes();
            break;
        case 2.0:
            $ot2 = $ot2 + $record->getOvertimes();
            break;
        case 2.5:
            $ot3 = $ot3 + $record->getOvertimes();
            break;
    }
    $tDura  = $tDura   + $record->getDuration();
    $tADura = $tADura  + $record->getAcDura();
    $tNormal= $tNormal + $record->getNormal();
    $tOt    = $tOt   + $record->getOvertimes();
    $tUt    = $tUt   + $record->getUndertime();
    $tMeal  = $tMeal + $record->getMeal();
     
    if  ($xuser == 'terence' || $xuser == 'adeline' || $xuser == 'kathy' || 
    	 $xuser == 'melvin' || $xuser == 'nyoman' || $xuser == 'emmanuel' )
    	 {  
		    $tAmt   = $tAmt  + $record->getPostedAmount();
		    $tPInc  = $tPInc + $record->getPartTimeIncome();
		    $tAll   = $tAll  + $record->getAllowance();
		    $tLevy  = $tLevy + $record->getLevy();
    	 }else{
		    $tAmt   = 0;
		    $tPInc  = 0;
		    $tAll   = 0;
		    $tLevy  = 0;
    	 	
    	 }
    
    if ($record->getPostedAmount() < 0)
    {
        //echo $record->getAcDura().'<br>';
    	$tbas   = $tbas  + ( $record->getRatePerHour() *  $record->getAcDura());
    }else{
    	$tbas   = $tbas  + ( $record->getRatePerHour() *  $record->getNormal()) ;
    }
//   	echo $record->getName() . ' - ' . $record->getTransDate() .' - '. ( $record->getRatePerHour() *  $record->getNormal()) . '<br>';    
    if($record->getPostedAmount() > 0 )
    {
    	$tOv = $tOv + $record->getPostedAmount();
    }else{
    	$tUn = $tUn + $record->getPostedAmount();
    }

    $SN++; $rowCount++; 
    ?>
    </tbody>
    <?php
    $teams = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($record->getEmployeeNo(), array('team'));       
    $raw['name'][]    =  $record->getName();
    $raw['group'][]   =  $teams->get('TEAM');
    $raw['wscan'][]   = ($record->getAcDura()?  1 : 0);
    $raw['wleave'][]  = ($record->getLeaveType() ? ($record->getLeaveType() != 'Leave without Pay'? 1 : 0) : 0);
    $raw['cntAtt'][]  = ($record->getAttendance() == 'P'?  1 : 0);
    $raw['cntAbs'][]  = ($record->getAttendance() != 'P'?  1 : 0);
    $raw['cntDura'][] = ($record->getAcDura()?  $record->getAcDura() : 0);
    $raw['cntOt'][]   = ($record->getOvertimes()?  $record->getOvertimes() : 0);
    $raw['totNorm'][] = ($record->getPartTimeIncome()?  
                        $record->getPartTimeIncome() : 
                        $record->getRatePerHour() *  $record->getAcDura());
    $raw['totOver'][] = ($record->getRatePerHour() *  $record->getOvertimes() * $record->getMultiplier());
    $raw['cntOffDay'][] = $cntOffDay;
}
$sf_params->set('counter', $counter);
$sf_params->set('wscan', $wscan);
$sf_params->set('wleave', $wleave);
$sf_params->set('cntAtt', $cntAtt);
$sf_params->set('cntAbs', $cntAbs);
$sf_params->set('cntDura', $cntDura + $addHol);  //normal + holiday hours
$sf_params->set('cntOt', $cntOt);
//$sf_params->set('cntOt', $cntOt);
$sf_params->set('totNorm', $tbas + ($addHol * $rph) );//$totNorm);
$sf_params->set('totOver', $totOver);
$sf_params->set('cntOffDay', $cntOffDay);
$sf_params->set('raw', $raw);
//$this->raw = $raw;
//var_dump($raw);
//exit();

?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  ><?php echo 'Total:' ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo 'OT 1 ='. $ot1   ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo 'OT 2 ='. $ot2 ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo 'OT 3 ='. $ot3 ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo number_format($tDura /60/60, 2) ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $tMeal ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $tADura ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $tNormal ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $tOt ?></td>            
    <td class="alignCenter alignTop" nowrap ><?php echo $tUt ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>        
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $tAmt ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $tPInc ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $tAll ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $tLevy ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo '' ?></td>    
    <td class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr> 
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  ><?php //echo 'Basic: ' ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo 'Basic = '. $tbas   ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo 'OT = '. $tOv ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo 'UT = '. $tUn ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo number_format($tDura /60/60, 2) ?></td>
    <td class="alignCenter alignTop" nowrap ><?php // ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $addHol . ('hrs Hol') ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo $tNormal ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo $tOt ?></td>            
    <td class="alignCenter alignTop" nowrap ><?php //echo $tUt ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>        
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo $tAmt ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo $tPInc ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php //echo $tAll ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo $tLevy ?></td>
    <td class="alignCenter alignTop" nowrap ><?php //echo '' ?></td>    
    <td class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>

<tr class=" class='tk-bgimgmon'"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop tk-bgimgmon"  nowrap></td>
    <td class="alignCenter alignTop tk-bgimgmon"><?php echo 'NO' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Name'    ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'TimeIn'  ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'TimeOut' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Duration'?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Meal' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Comp-Dura' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Required' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Overtime' ?></td>            
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Undertime' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Multiplier' ?></td>        
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Holiday' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon"nowrap ><?php echo 'Leave' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'DayOff' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Amount' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Rate/Hr' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'PT-Inc' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Allowance' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Levy' ?></td>
    <td class="alignCenter alignTop tk-bgimgmon" nowrap ><?php echo 'Attend' ?></td>    
    <td class="alignCenter alignTop tk-bgimgmon" nowrap >&nbsp;</td>
</tr>
