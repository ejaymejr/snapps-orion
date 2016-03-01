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
$showLog  = link_to('Show Log', javascript_tag("openindex()") );
$editLink = 'Edit';
$deleteLink = 'Delete';
$editLink = link_to('Edit', 'maintenance/acctCodeEdit?id=' . $record->getId());

$deleteLink = link_to('Delete', 'maintenance/acctCodeDelete?id=' . $record->getId(),
array('confirm' => 'Sure to delete this record?'));

$checkBoxID = 'gridCheckBox_item_' . $record->getId();


?>
<tr class="<?=$rowClass?>" id="<?=$rowID?>"
	onMouseOver="rowHovered('<?=$rowID?>');"
	onMouseOut="rowUnhovered('<?=$rowID?>');"
	onMouseDown="rowClicked('<?=$rowID?>', null);">
	<td class="alignCenter alignTop" nowrap><?php echo $editLink . ' | ' . $deleteLink; ?>
	</td>
	<td class="alignCenter alignTop"><?=$SN?>&nbsp;</td>
	<td class="alignLeft alignTop" nowrap><?php echo $record->getAcctCode(); ?></td>
	<td class="alignLeft alignTop" nowrap><?php echo $record->getDescription() ?></td>
	<td class="alignLeft alignTop" nowrap><?php echo $record->getRemarks() ?></td>
	<td class="alignLeft alignTop" nowrap><?php echo $record->getCpf() ?></td>
	<td width="20%" class="alignCenter alignTop" nowrap>
	    <?php
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

	<?php
	//	<form>
	//	<input type=button value="Open new window"
	//	onClick="myRef = window.open(''+self.location,'mywin',
	//	'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
	//	myRef.focus()">
	//	</form>

	//	<a href="#" onClick="myRef = window.open('?id=','mywin',
	//	'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
	//	myRef.focus()">show</a>


	//echo javascript_tag("open_win();");


	//	<div id="eBrowse"></div>
	//	<div id="head">Title</div>
	//	<div id="bd">body</div>
	//	<div id="ft">footer</div>
	//	    $eBrowse = new Snapps.PanelDragResize ('ebrowse', 'bd', minWidth, minHeight, modal, fixedCenter, x, y);

	?>


