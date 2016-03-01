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

$desc = $record->getEmployeeNo();
$editLink = 'Edit';
$deleteLink = 'Delete';
$editLink = link_to('Edit', 'timekeeping/dtrEdit?id=' . $record->getId());
  
$deleteLink = link_to('Delete', 'timekeeping/dtrDelete?id=' . $record->getId(),
                    array('confirm' => 'Record [ '.$SN.': - '.$desc . ' ]  Sure to delete this record?')); 


$checkBoxID = 'gridCheckBox_item_' . $record->getId();
$name = '';
$name = TkDtrmasterPeer::GetDatabyEmployeeNo1($record->getEmployeeNo()); 
$team = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($record->getEmployeeNo(), array('team'));
?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php //echo $editLink . ' | ' . $deleteLink; ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getEmployeeNo() ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo ($name)? $name->getName() : $record->getName() ?></td>
    <td class="alignCenter alignTop" nowrap><?php echo $record->getTimeIn('j M Y H:i:s') ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getTimeOut('j M Y H:i:s') ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo round($record->getDuration()/3600, 2) ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo ($name)? $name->getCompany() : '' ?></td>
    <td class="alignLeft alignTop"  nowrap><?php echo ($name)? $team->get('TEAM') : '' ?></td>
    <td class="alignLeft alignTop" nowrap><?php  echo ($name)? $name->getTypeOfEmployment(): '' ?></td>
    
    <td width='5%' class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>

<?php $SN++; $rowCount++; endforeach ?>