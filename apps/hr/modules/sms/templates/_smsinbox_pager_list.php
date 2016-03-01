<?php use_helper('Text', 'Number', 'Form', 'Javascript', 'PagerNavigation'); ?>


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
//$desc = $record->getName();
//$editLink = 'Edit';
//$deleteLink = 'Delete';
//$editLink = link_to('Edit', 'leave/leaveCreditEdit?id=' . $record->getId());
//  
//$deleteLink = link_to('Delete', 'leave/leaveCreditDelete?id=' . $record->getId(),
//                    array('confirm' => 'Record [ '.$SN.': - '.$desc . ' ]  Sure to delete this record?')); 
//
//
//$checkBoxID = 'gridCheckBox_item_' . $record->getId();
//
//	$jsGetLeaveInfo = "'employee_no=".$record->getEmployeeNo()."'";	
//	
//	$ajaxGetLeave = array(
//			'url'		=>'leave/leaveSearch',
//			'with'		=> $jsGetLeaveInfo,
//            'update' 	=> 'DIVLeaveSearch',
//            'script'    => true,
//            'loading'   => 'stop_remote_pager();',
//            'before'   	=> 'showLoader();',
//            'complete'  => 'hideLoader();formatFormStyle();',
//            'type'      => 'synchronous',			
//	);


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
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getSender(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getName(); ?></td>
    <td class="alignLeft alignTop" nowrap > <?php echo $record->getMsg(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getSenttime(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getReceivedtime(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getOperator(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getMsgtype(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getIsUpdated(); ?></td>
    <td class="alignCenter alignTop" nowrap > <?php echo $record->getUpdateRemark(); ?></td>
    <td class="alignCenter alignTop" nowrap >&nbsp;</td>
</tr>
<?php $SN++; $rowCount++; endforeach ?>
