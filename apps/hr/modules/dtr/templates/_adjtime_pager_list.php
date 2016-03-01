<?php use_helper('Text', 'Number', 'Form', 'Javascript'); ?>

<?php 
$SN = 1;
$rowCount = 0;

$SN = $pager->getFirstIndice();
foreach ($pager->getResults() as $record): ?>
<?php
$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
$rowID = 'sq_' . $record->getId();  

if ($sf_params->get('hIDs') && is_array($sf_params->get('hIDs')) && in_array($record->getId(), $sf_params->get('hIDs'))) {
    $rowClass .= ' highlightRow';
}

$desc = $record->getEmployeeNo();


$checkBoxID = 'gridCheckBox_item_' . $record->getId();

$name = TkDtrmasterPeer::GetDatabyEmployeeNo1($record->getEmployeeNo());
$time = TkAttendancePeer::GetEmpDaily($record->getEmployeeNo(), $record->getTransDate());

if ($sf_params->get('save')) {
	$ischk = $sf_params->get('cb_' . $SN) ? true : false;
}	  
if ($sf_params->get('unmark')) {
	$ischk = false;
}
if ($sf_params->get('mark')) {
	$ischk = true;
}
?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php
        	if ($time) {
        		echo checkbox_tag('cb_' . $SN, $record->getId(), $ischk);
        	} 
        ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getEmployeeNo() ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo ($name)? $name->getName() : $record->getName() ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($record->getEmployeeNo()) ?></td>
    <td class="alignCenter alignTop" nowrap><?php echo $time? $time->getTimeIn('j M Y H:i:s') : '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $time? $time->getTimeOut('j M Y H:i:s') : '' ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo round($record->getDuration()/3600, 2) ?></td>
    
    <td width='5%' class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>

<?php $SN++; $rowCount++; endforeach ?>
