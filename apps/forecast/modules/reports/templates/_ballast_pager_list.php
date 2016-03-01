<?php use_helper('Text', 'Number', 'Form', 'Javascript'); ?>


<?php 
//var_dump($pager);
$SN = 1;
$rowCount = 0;

$SN = $pager->getFirstIndice();
foreach ($pager->getResults() as $record): ?>
<?php
$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
$rowID = "sq_" . $record->getId();
$divID = "DIVShowHide_" . $record->getId();

if ($sf_params->get('hIDs') && is_array($sf_params->get('hIDs')) && in_array($record->getId(), $sf_params->get('hIDs'))) {
    $rowClass .= ' highlightRow';
}
$description = '';

// $expenseApi = new ExpenseApi();
// $data = $expenseApi->getBallastTransactions('', '', $record->getTransDate(), $record->getTransDate() );
// foreach($data as $r):
	
// 	$description = $r["items"] ;
// 	var_dump($r);
// exit();
// endforeach;
// unset($expenseApi);


$downloadDetail = link_to('download','reports/ballastReport');
?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php echo $downloadDetail ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
    <td class="alignLeft alignTop" width="50px" ><?php echo $record->getTransDate(); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getTransDate(); ?></td>
    <td class="alignLeft alignTop"  ><?php echo $record->getValue(); ?></td>
    <td class="alignLeft alignTop"  ><?php //echo $record->getIncomeExpense(); ?></td>
    <td class="alignLeft alignTop"  ><?php //echo $record->getSalesSource(); ?></td>
    <td class="alignLeft alignTop"  ><?php echo $record->getCompanyId(); ?></td>
    <td width= '100px' class="alignLeft alignTop" nowrap ></td>
</tr>

<?php $SN++; $rowCount++; endforeach ?>
<?php 
function GetDetail()
{
	$this->expenseApi = new ExpenseApi();
	$data = $this->expenseApi->getBallastTransactions();
	foreach($data as $r):
		//echo $r["component"] . '<br>';
		var_dump($r);
	endforeach;
}
?>
