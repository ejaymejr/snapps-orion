<?php
$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
$rowID = 'sq_' . $record->getId();  
$groupID = 'tbody_' . $record->getId();

if ($sf_params->get('hIDs') && is_array($sf_params->get('hIDs')) && in_array($record->getId(), $sf_params->get('hIDs'))) {
    $rowClass .= ' highlightRow';
}



$desc = $record->getId();
$editLink = 'Edit';
$deleteLink = 'Delete';

$checkBoxID = 'gridCheckBox_item_' . $record->getId();

//($times || $record->getAcDura() == 0)
//var_dump($record);
//echo $record->getTransDate() .'<----'.$record->getAcDura(). '  <br>';


//$times  = TkAttendancePeer::GetEmpDaily ($record->getEmployeeNo(), $record->getTransDate());
////$timeIn = ( ($times || $record->getAcDura() <> 0) ?  $times->getTimeIn(): $record->getTransDate());
////$timeOut= ( ($times || $record->getAcDura() <> 0) ?  $times->getTimeOut(): ( (DateUtils::DUFormat('D',$record->getTransDate() ) <> 'Sun' )? 'Did Not Work' : 'Sunday') );
////echo $record->getName().'<br>';
////if $times)
//
////$timeIn = ( ($record->getAcDura() > 0) ?  $times->getTimeIn(): $record->getTransDate());
//$timeIn = ( $times ?  $times->getTimeIn(): $record->getTransDate());
//$timeOut= ( ($record->getAcDura() > 0) ?  $times->getTimeOut(): ( (DateUtils::DUFormat('D',$record->getTransDate() ) <> 'Sun' )? 'Did Not Work' : 'Sunday') );
//

$timeIn = '';
$timeOut = '';
$params = array(
    'record' => $record,
    'SN'     => $SN,
    'rowCount'  => $rowCount,
    'timeIn'    => $timeIn,
    'timeOut'   => $timeOut,
    'rowClass'  => $rowClass,
    'rowID'     => $rowID,
    'groupID'   => $groupID
);
?>

<?php include_partial('proofpayslip_row_display', $params) ?>
<?php include_partial('proofpayslip_row_form', $params) ?>

