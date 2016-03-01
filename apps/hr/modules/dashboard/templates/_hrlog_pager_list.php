<?php use_helper('Text', 'Number', 'Form', 'Javascript', 'PagerNavigation'); ?>


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

?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php //echo $record->getDateCreated(); ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
        <td class="alignCenter alignTop"  nowrap>
        <?php echo $record->getDateCreated(); ?>
    </td>
    <td class="alignLeft alignTop" width="50px" ><?php echo $record->getUser(); ?></td>
    
    <td class="alignLeft alignTop" width="200px" ><?php echo $record->getUserAction(); ?></td>
    <td class="alignLeft alignTop" width="200px" ><?php echo $record->getActionModule(); ?></td>
    <td class="alignLeft alignTop" width="200px"><?php 
    	echo link_to('show/hide','', "onclick=showHideElement( '".$divID."' );return false;" . " style=cursor:pointer;" );
    	?>
    	<div id="<?php echo $divID; ?>" style="display: none"><?php echo $record->getDescription() ?></div>
    </td>
    <td class="alignLeft alignTop" width="200px" ><?php echo GETSelectStatement($record->getDescription(), $record->getUserAction()) ; ?></td>  
    <td width= '100px' class="alignLeft alignTop" nowrap ></td>
</tr>

<?php $SN++; $rowCount++; endforeach ?>
<?php 
	function GetSelectStatement($sql, $userAction)
	{
		$employeeName = '';
		$dest = '';
		if ($userAction == 'UPDATE PERSONAL INFO'): 
			$where = explode('WHERE', $sql);
			$mainTable = '';
			$selectSql = '';
			$employeeName = '';
			if (isset($where[1])):
				$mainTable = explode('.', $where[1]);
				$selectSql = 'select name from ' . $mainTable[0] . ' where ' . $where[1];
				$result = HrLib::ExecuteSQL($selectSql);
				while ($result->next()):
					$employeeName = $result->getString('name');
				endwhile;
			endif;
			if (strpos($sql, "HR_COMPANY_ID = '1'") !== false) $dest = ' to Acro';
			if (strpos($sql, "HR_COMPANY_ID = '2'") !== false) $dest = ' to Micronclean';
			if (strpos($sql, "HR_COMPANY_ID = '3'") !== false) $dest = ' to Nano';
			if (strpos($sql, "HR_COMPANY_ID = '4'") !== false) $dest = ' to TcKhoo';
			if (strpos($sql, "HR_COMPANY_ID = '5'") !== false) $dest = ' to micronDR';
		endif;
 		return $employeeName . $dest;
	}

?>