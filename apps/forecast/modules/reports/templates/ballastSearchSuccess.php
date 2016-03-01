<?php use_helper('Form', 'Javascript'); ?>

<div class="grid-toolbar-2">                       
<h3>BALLAST WATER TREATMENT EXPENSES</h3>
</div>
<?php
// //HrLib::UpdateHrLogTarget();
// $gridVars = array(
//     'searchTemplate' => 'ballast_list_header_search',
//     'pagerTemplate' => 'ballast_pager_list',
//     'baseURL' => $sf_request->getModuleAction(),
//     'pager' => $pager,
//     'searchContainerID' => XIDX::next(),
//     'headers' => sfConfig::get('app_ballast_grid_headers')
// );
// include_partial('global/datagrid/container', $gridVars);

//************** save into an array and make a dateto integer
$datas = array();
$id = 0;
$cnt = 0;
$suffix = '';
foreach($data as $r):
	$cnt ++;
	$genID = str_pad($cnt, 3, '0', STR_PAD_LEFT);
	$id = DateUtils::DUFormat('Ymd', trim($r['reference_date']) );
	$genID =  $id . $genID ;
	$datas[ $genID  ] = array ('company'=>$r['company'], 'category'=>$r['category'], 'reference_date'=>$r['reference_date'], 'vendor'=>$r['vendor'], 'items'=>$r['items'], 'price'=>$r['price']);
endforeach;
$id = 0;
$cnt = 0;
$suffix = '';
$hrData = PayEmployeeLedgerArchivePeer::GetSalaryRecordForNanoStartingFrom('2013-03-01');
foreach($hrData as $r):
	$cnt ++;
	$genID = str_pad($cnt, 3, '0', STR_PAD_LEFT);
	$id = DateUtils::DUFormat('Ymd', trim($r['reference_date']) );
	$genID =  $id . $genID ;
	$datas[ $genID ] = array ('company'=>$r['company'], 'category'=>$r['category'], 'reference_date'=>$r['reference_date'], 'vendor'=>$r['vendor'], 'items'=>$r['items'], 'price'=>$r['price']);
endforeach;
krsort($datas);
?>
<table class="table bordered condensed" >
<tbody><tr  height="23px" class="dataGridTableHeader">
	<td width="100" nowrap="" class="dataGridTableHeaderColumn alignCenter">&nbsp;</td>
	<td width="50" nowrap="" class="dataGridTableHeaderColumn alignCenter">No</td>
	<td width="100" nowrap="" class="dataGridTableHeaderColumn alignCenter">Date</td>
	<td width="200" nowrap="" class="dataGridTableHeaderColumn alignCenter">Vendor</td>
	<td width="400" nowrap="" class="dataGridTableHeaderColumn alignCenter">Description</td>
	<td width="100" nowrap="" class="dataGridTableHeaderColumn alignCenter">Price</td>
	<td width="100" nowrap="" class="dataGridTableHeaderColumn alignCenter">Labor</td>
	<td width="100" nowrap="" class="dataGridTableHeaderColumn alignLeft">&nbsp;</td>
</tr>

<?php 
$SN = 1;
$totalMaterials = 0;
$totalOverall = 0;
$totalPayroll = 0;
foreach($datas as $k=>$r):
	$rowCount = 1;
	$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";	
	//<td nowrap="" class="alignCenter ">'. $k / 1000 .' : '. $r['reference_date'] .'</td>
	if (strpos($r['vendor'], 'NANOCLEAN PAYROLL') === false ):
		$mats =  $r['price'];
		$payroll = 0;
		$totalMaterials += $mats;
		$payrollClass = '';
	else:
		$mats = 0;
		$payroll = $r['price'];
		$totalPayroll += $payroll;
		$payrollClass = 'tk-yell';
	endif;
	echo '
	<tr height="23px" onmousedown="rowClicked('.$SN.', null);" onmouseout="rowUnhovered('.$SN.');" onmouseover="rowHovered('.$SN.');" id="'.$SN.'" class="'.$rowClass.' '. $payrollClass .' ">		
		<td nowrap="" class="alignCenter "></td>
		<td class="alignCenter "> '.$SN.'</td>
		<td width="50px" class="alignCenter "> '.$r['reference_date'].'</td>
		<td width="50px" class="alignCenter "> '.$r['vendor'].'</td>
		<td class="alignLeft ">&nbsp;&nbsp; '.$r['items'].'</td>
		<td class="alignRight "> '. ($mats > 0? number_format($mats, 3) : '-') . '&nbsp;&nbsp;</td>
		<td class="alignRight "> '.($payroll > 0? number_format($payroll, 3) : '-') .'&nbsp;&nbsp;</td>
		<td width="100px" nowrap="" class="alignRight "></td>
	</tr>';
	$totalOverall += $r['price'];
	//echo $r['company'] . ' ' . $r['reference_date'] . ' ' . $r['category'] . ' ' . $r['items'] . ' ' . $r['price'] . '<br>';
	$SN++;
	$rowCount;
endforeach;

echo '
<tr height="23px" class="'.$rowClass.'">
	<td class="alignCenter tk-oran " colspan=3 > TOTAL </td>
	<td class="alignRight tk-oran "> '.number_format($totalOverall, 3).' (Overall)</td>
	<td class="alignRight tk-oran "> '.number_format($totalMaterials, 3).' (P)</td>
	<td class="alignRight tk-oran "> '.number_format($totalPayroll, 3).' (L)</td>
</tr>';

	?>
	
		
</tbody></table>

