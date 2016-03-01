<?php use_helper('Text', 'Number', 'Form', 'Javascript'); ?>


<?php 
//var_dump($pager);
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

$desc = $record->getName();
$editLink = 'Edit';
$deleteLink = 'Delete';
$editLink = link_to('Edit', 'dtr/teamMemberEdit?id=' . $record->getId());
  
$deleteLink = link_to('Delete', 'dtr/teamMemberDelete?id=' . $record->getId(),
                    array('confirm' => 'Record [ '.$SN.': - '.$desc . ' ]  Sure to delete this record?')); 


$checkBoxID = 'gridCheckBox_item_' . $record->getId();

$workid = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($record->getEmployeeNo());

//$empInfo = HrEmployeePeer::GetDatabyEmployeeNo($record->getEmployeeNo());
//$leaveInfo = HrEmployeeLeaveCredits::GetDatabyEmployeeNo($record->getEmployeeNo());
?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php echo $editLink . ' | ' . $deleteLink; ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getEmployeeNo(); ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $desc ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo HrCompanyPeer::GetNamebyId($record->getHrCompanyId()) ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getTeam() ?></td>    
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getTypeOfEmployment() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getEmploymentAs() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo TkWorktemplatePeer::GetDescriptionbyWorktempNo($workid) ?></td>
    <td width = "5%" class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>
<?php $SN++; $rowCount++; endforeach ?>