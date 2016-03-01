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

