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


$editLink = 'Edit';
$deleteLink = 'Delete';

//$paylink = link_to('Sign', 'reports/signPayslipPDF?id=' . $record->getId(),
//                    array('confirm' => 'Do you really want to sign '.$record->getName().' Payslip?')); //,'target'=>'_BLANK' 

//$paylink = link_to('Sign', 'reports/dlPayslip?id=' . $record->getId(),
//                    array('confirm' => 'Do you really want to sign '.$record->getName().' Payslip?')); //,'target'=>'_BLANK'

$paylink = link_to('Sign', 'reports/dlPayslip?id=' . $record->getId(), 'onclick=ConfirmSign("'. $record->getEmployeeNo().'", "'. $record->getName().'"); return false;'  ); //,'target'=>'_BLANK' 


$dt = PayEmployeeLedgerArchivePeer::GetStartDate($record->getPeriodCode());

$paysliplink= link_to(DateUtils::DUFormat('M-Y', $dt), 'reports/payslipView?id=' . $record->getId());                    


$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
$rowID = 'gridRow_dtr_' . $record->getId();

$checkBoxID = 'gridCheckBox_item_' . trim($record->getEmployeeNo());

//$empDet = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($record->getEmployeeNo(), array('cell_no')); 

$chkbox = '';

?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  nowrap>
        <?php echo $paylink; ?>
    </td>
    <td class="alignCenter alignTop"  ><?=$SN?>&nbsp;</td>
    <td class="alignLeft alignTop" nowrap ><div id="<?php echo $record->getEmployeeNo(); ?>"><?php echo $record->getIsPayslipPrinted() ?></div></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getEmployeeNo(); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getName(); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getCompany(); ?></td>    
    <td class="alignLeft alignTop" nowrap ><?php echo $paysliplink ; ?></td>
    <td class="alignRight alignTop" nowrap ><?php //echo number_format(PayEmployeeLedgerArchivePeer::ComputeAmountbyEmpNoPeriodCode($record->getEmployeeNo(), $record->getPeriodCode(),  $sf_params->get('bank_cash_group')), 2 ) ; ?></td>
    <td width = "10%" class="alignCenter alignTop" nowrap ><?php echo $record->getBankCash() ?>    </td>
</tr>
<?php $SN++; $rowCount++; endforeach ?>
<?php
echo javascript_tag(
"
	function ConfirmSign(id, name)
	{
		message = 'Do you want to Print ' + name + ' Payslip?';
		if (confirm(message)) 
		{ 
			document.getElementById(id).innerHTML  = 'Y';
			throw 'stop execution';
		}else{
			return;
		}
	}	
"
);
?>    