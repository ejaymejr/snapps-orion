<?php
$xuser  = $sf_user->getUsername();

if ($record->getUndertime() <> 0 )
{
	$rowClass = "tk-oran";
}
if ($record->getAttendance() == 'A' )
{
	$rowClass = "tk-pink";
}
if ( ($sf_params->get('refEmp') == $record->getEmployeeNo() ) && ($sf_params->get('refresh_date') == $record->getTransDate()) )
{
	$rowClass = "tk-gree";
}

//echo $sf_params->get('refEmp') .' - '. $sf_params->get('refresh_date') . '<br>';
?>
<?php
$desc    = HrEmployeePeer::GetNameToolTip($record->getEmployeeNo());
$times   = TkAttendancePeer::GetEmpDaily ($record->getEmployeeNo(), $record->getTransDate());
$timeIn  = ( $times ?  $times->getTimeIn(): $record->getTransDate());
$timeOut = ( $times ?  $times->getTimeOut(): $record->getTransDate());
$cday    = $timeIn? $timeIn : $timeOut;
$cday    = DateUtils::DUFormat('j', $cday);
$log    = TkAttendancePeer::ToolTipLog($record->getAcDura(), $times);
$cdura = 0;
if ($record->getAcDura() > 0){
	$cdura = $record->getAcDura();
}else{
	$cdura = DateUtils::DateDiff('h', $timeIn, $timeOut);
}
if ($record->getLeaveType()){
	$leaveInfo = HrEmployeeLeavePeer::IsOnleave($record->getEmployeeNo(), $record->getTransDate()	);
	if ($leaveInfo) {
		if ($leaveInfo->getHalfDay() == 'none'){
			$cdura = $record->getNormal();
		}else{
			$cdura = $record->getNormal() / 2;
		}
		if ($leaveInfo->getHrLeaveId() == 6 || $leaveInfo->getHrLeaveId() == 14 ){
			$cdura = 0;
		}
	}
	$log = $log . '<div id="divLeaveLabel" ><span class="tk-style55">( '.$cdura.' hrs leave )</span> </div>';
}
//

//$timeOut= ( ($record->getAcDura() > 0) ?  $times->getTimeOut(): ( (DateUtils::DUFormat('D',$record->getTransDate() ) <> 'Sun' )? 'Did Not Work' : 'Sunday') );


////$log = $record->getAcDura();
//
//if ($timeIn && $timeOut) {
//
//	var_dump($cdura);
//
////$cdura = DateUtils::DateDiff('h', $timeIn, ($record->getAcDura() > 0? $times->getTimeOut(): $timeIn) );
////$cdura = $cdura > 0? $cdura : 0 ;
////var_dump($log);
////exit();
//	$cdura = $record->getAcDura() - $cdura;
//}
?>
<tr class="<?=$rowClass?>" id="<?=$rowID?>_display" style="display: ''"
	onMouseOver="rowHovered('<?=$rowID?>');"
	onMouseOut="rowUnhovered('<?=$rowID?>');"
	onMouseDown="rowClicked('<?=$rowID?>', null);">
	<td class="alignCenter alignTop" nowrap><?php
	$rOnly = true;
	if ($record->getIsPosted() <> 'Y')
	{
		$rOnly = false;
	}

	//-------------------------- override for administrator
	if ( $this->getContext()->getUser()->getUsername() == 'hr_super'  )

	{
		$rOnly = false;
	}

	if (! $rOnly)
	{
		echo submit_tag('edit',
		array('onclick' => "hideElement('" . $rowID . "_display');showElement('" . $rowID . "_form');return false;"));
	}else{
		echo 'Posted';
	}
	//          echo submit_tag('edit',
	//             array('onclick' => "hideElement('" . $rowID . "_display');showElement('" . $rowID . "_form');return false;"));
	//echo link_to('change', 'dtr/dtrEdit?='.$rowID);
	//<?=$SN
	?></td>
	<td class="alignCenter alignTop"><?php echo $cday; ?>
	<?php
	//        $link = "http://orion.micronclean/cityhall/hr/hrLog.php?modBy=".$record->getModifiedBy().'&modDt='.$record->getDateModified().'&crBy='.$record->getCreatedBy().'&crDt='.$record->getDateCreated();
	//        echo ("
	//            <a href='' onClick=\"myRef = window.open(
	//            '".$link."'
	//            ,'mywin',
	//            'left=500,top=200,width=500,height=160,toolbar=0,resizable=0, status=0, location=0, directories=0');
	//            myRef.focus()\">".DateUtils::DuFormat('j', $timeIn)."</a>
	//            ");

	if  ($record->getOvertimes() && $record->getLeaveType()) {
		$blnk1 = '<blink><span class="negative">';
		$blnk2 = '</span></blink>';
	}else{
		$blnk1 = '';
		$blnk2 = '';
	}
	//var_dump($xuser);
	    if  ($xuser == 'terence' || $xuser == 'adeline' || $xuser == 'kathy' || 
    	 $xuser == 'melvin' || $xuser == 'nyoman' || $xuser == 'emmanuel' )
    	 {  
		    $eAmt   = $record->getPostedAmount();
		    $ePInc  = $record->getPartTimeIncome();
		    $eAll   = $record->getAllowance();
		    $eLevy  = $record->getLevy();
		    $erph   = $record->getRatePerHour();
    	 }else{
		    $eAmt   = 0;
		    $ePInc  = 0;
		    $eAll   = 0;
		    $eLevy  = 0;
		    $erph   = 0;
    	 }	
    	 
	?></td>
	<td class="alignLeft   alignTop" nowrap><?php echo $desc   ?></td>
	<td class="alignLeft   alignTop" nowrap><?php echo $timeIn  ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $timeOut ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $blnk1 . number_format($record->getDuration()/60/60, 2) . $blnk2 ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getMeal() ?></td>
	<td class="alignCenter alignTop tk-yell" nowrap><span
		class="tk-style10"><?php echo $log ?></span></td>
	<td class="alignCenter alignTop" nowrap><span class="tk-style6"><?php echo $record->getNormal() ?></span></td>
	<td class="alignCenter alignTop" nowrap><?php echo $blnk1 . $record->getOvertimes() . $blnk2?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getUndertime() ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getMultiplier() ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getHolidayCode() ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $blnk1 . $record->getLeaveType() . $blnk2?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getDayoff() ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $eAmt ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $erph ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $ePInc ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $eAll ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $eLevy ?></td>
	<td class="alignCenter alignTop" nowrap><?php echo $record->getAttendance() ?></td>
	<td class="alignCenter alignTop" nowrap>&nbsp;</td>
</tr>
