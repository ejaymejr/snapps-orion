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

$editLink = 'Edit';
$deleteLink = 'Delete';
$editLink = link_to('Edit', 'expenses/powerConsumptionEdit?id=' . $record->getId());
  
$deleteLink = link_to('Delete', 'expenses/powerConsumptionDelete?id=' . $record->getId(),
                    array('confirm' => 'Record [ '.$SN.': - '.$record->getDate() .' / '. $record->getAmpm() .' ]  Sure to delete this record?')); 


$checkBoxID = 'gridCheckBox_item_' . $record->getId();

$pconvert = 0;
$am = PowerUsagePeer::GetOptimizedDatabyDateAmPm($record->getDate(), 'AM', array( 'reading', 'consumption', 'total_cost', 'conversion_factor') );
$amread = ($am) ? $am->get('READING') : '';
$amcons = ($am) ? $am->get('CONSUMPTION') : '';
$aamt   = ($am) ? $am->get('TOTAL_COST') : '';
$pconvert = ($am) ? number_format($am->get('CONSUMPTION') * $am->get('CONVERSION_FACTOR'), 2) : $pconvert;

$pm = PowerUsagePeer::GetOptimizedDatabyDateAmPm($record->getDate(), 'PM', array( 'reading', 'consumption', 'total_cost', 'conversion_factor') );
$pmread = ($pm) ? $pm->get('READING') : '';
$pmcons = ($pm) ? $pm->get('CONSUMPTION') : '';
$pamt   = ($pm) ? $pm->get('TOTAL_COST') : '';
$pconvert = ($pm) ? number_format($pm->get('CONSUMPTION') * $pm->get('CONVERSION_FACTOR'), 2) : $pconvert;


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
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getDate() ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo DateUtils::DUFormat('l', $record->getDate()) ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $amread ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $pmread ?></td>    
    <td class="alignRight alignTop" nowrap ><?php  echo $amcons ?></td>
    <td class="alignRight alignTop" nowrap ><?php echo  $pmcons ?></td>
    <td class="alignCenter alignTop" nowrap ><?php echo $record->getUnit() ?></td>    
    <td class="alignRight alignTop" nowrap ><?php echo  $pconvert?></td>    
    <td class="alignRight alignTop" nowrap ><?php echo $aamt ?></td>    
    <td class="alignRight alignTop" nowrap ><?php echo $pamt ?></td>    
    <td width = "20%" class="alignCenter alignTop" nowrap >	    <?php
        $link = "http://orion.micronclean/cityhall/hr/hrLog.php?modBy=".$record->getModifiedBy().'&modDt='.$record->getDateModified().'&crBy='.$record->getCreatedBy().'&crDt='.$record->getDateCreated();
        echo ("
            <a href='' onClick=\"myRef = window.open(
            '".$link."'
            ,'mywin',
            'left=500,top=200,width=500,height=160,toolbar=0,resizable=0, status=0, location=0, directories=0');
            myRef.focus()\">Show Log</a>
            ");
    ?>  
    </td>
</tr>
<?php $SN++; $rowCount++; endforeach ?>