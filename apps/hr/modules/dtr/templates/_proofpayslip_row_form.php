<?php use_helper('Javascript') ?>
<?php
if ($record->getUndertime() <> 0 )
{
    $rowClass = "tk-oran";
}
if ($record->getAttendance() == 'A' )
{
    $rowClass = "tk-pink";
}
        $times  = TkAttendancePeer::GetEmpDaily ($record->getEmployeeNo(), $record->getTransDate());
        $timeIn = ( $times ?  $times->getTimeIn(): $record->getTransDate());
        $timeOut= ( ($record->getAcDura() > 0) ?  $times->getTimeOut(): ( (DateUtils::DUFormat('D',$record->getTransDate() ) <> 'Sun' )? 'Did Not Work' : 'Sunday') );

?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>_form"
    style="display:none"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php 
            
        $timeInID   = 'input_' . $rowID . '_time_in';
        $timeOutID  = 'input_' . $rowID . '_time_out';
        $durationID = 'input_' . $rowID . '_time_duration';
        $mealID     = 'input_' . $rowID . '_meal';

        $jsQueryString = "'id=" . $record->getId() . 
                    "&SN=" . $SN . 
                    "&rowCount=" . $rowCount .
                    "&empRef=" . $record->getEmployeeNo() . 
                    "&time_in=' + \$F('" . $timeInID . "') + '" .
                    "&meal=' + \$F('" . $mealID . "') + '" .
                    "&sdate=".$sf_params->get('sdate').
                    "&edate=".$sf_params->get('edate').
                    "&employee_no=".$sf_params->get('employee_no').
                    "&comp=".$sf_params->get('company').
                    "&duration=' + \$F('" . $durationID . "')";
                    //"&time_out=' + \$F('" . $timeOutID . "') + '" .
                    
            $ajaxOptions =     
            array('url' => 'dtr/ajaxEdit', 
                'with' => $jsQueryString,
                'update' => $groupID,
                'script'    => true,
                'loading'   => 'stop_remote_pager();',
                'before'   => 'showLoader();',
                'complete'  => 'hideLoader();formatFormStyle();',
                'type'      => 'synchronous',
                ); 
            echo submit_tag('Save', array('onclick' => remote_function($ajaxOptions) . ';return false;'));
            echo ' ' ;
            echo link_to('Cancel', 
                    '',
                    array('onclick' => "hideElement('" . $rowID . "_form');showElement('" . $rowID . "_display');return false;"));
            //echo link_to('change', 'dtr/dtrEdit?='.$rowID);
            //<td class="alignCenter alignTop" nowrap ><?php echo input_tag('time_out', $timeOut, ' id="' . $timeOutID . '" size="19"') </td>
        ?>
    </td>
    <?php 
    	$desc = HrEmployeePeer::GetNameToolTip($record->getEmployeeNo());
		//$att = TkAttendancePeer::GetEmpDaily($record->getEmployeeNo(), DateUtils::DuFormat('Y-m-d', $timeIn))
		$cdura = DateUtils::DateDiff('h', $timeIn, $timeOut);
		//TkDtrsummaryPeer::InitDuration($record->getDuration())
    ?>
    <td class="alignCenter alignTop"  ><?php echo DateUtils::DuFormat('d', $timeIn); ?></td>    
    <td class="alignLeft   alignTop" nowrap ><?php echo $desc   ?></td>    
    <td class="alignLeft   alignTop" nowrap ><?php echo input_tag('time_in', $timeIn, ' id="' . $timeInID . '" size="19"') ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $timeOut ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo input_tag('duration', $cdura, ' id="' . $durationID . '"  size="8" onClick= "this.select()"')?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo input_tag('meal', $record->getMeal(), ' id="' . $mealID . '" size="5"')  ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getAcDura() ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getNormal() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getOvertimes() ?></td>            
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getUndertime() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getMultiplier() ?></td>        
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getHolidayCode() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getLeaveType() ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getDayoff() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getPostedAmount() ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getRatePerHour() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getPartTimeIncome() ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getAllowance() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getLevy() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getAttendance() ?></td>    
    <td class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>
