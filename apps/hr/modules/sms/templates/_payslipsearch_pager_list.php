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
$editLink = link_to('Re-Process', 'payroll/scheduledIncomeEdit?id=' . $record->getId());
  
$deleteLink = link_to('Delete', 'payroll/schedIncomeDelete?id=' . $record->getId(),
                    array('confirm' => 'Sure to delete this record?')); 

$dt = PayEmployeeLedgerArchivePeer::GetStartDate($record->getPeriodCode());

$paysliplink= link_to(DateUtils::DUFormat('M-Y', $dt), 'reports/payslipView?id=' . $record->getId());                    


$rowClass = (($rowCount % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
$rowID = 'gridRow_dtr_' . $record->getId();

$checkBoxID = 'gridCheckBox_item_' . trim($record->getEmployeeNo());

$empDet = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($record->getEmployeeNo(), array('cell_no')); 

$chkbox = '';

if ($empDet->get('CELL_NO')):
	$chkbox = checkbox_tag($checkBoxID, 1, true);
endif;
if ($sf_params->get('group')):
	$smsLog = SmsLogPeer::GetSms($record->getEmployeeNo(), $record->getPeriodCode(), $sf_params->get('bank_cash_group'));
else:
	$smsLog = SmsLogPeer::GetSms($record->getEmployeeNo(), $record->getPeriodCode(), $sf_params->get('bank_cash'));
endif; 
if ($smsLog):
	$chkbox = DateUtils::DUFormat('Y-m-d', $smsLog->getDateCreated() );
endif;



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
    <td class="alignLeft alignTop" nowrap ><?php echo $chkbox ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getEmployeeNo(); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getName(); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $record->getCompany(); ?></td>    
    <td class="alignLeft alignTop" nowrap ><?php echo $empDet->get('CELL_NO'); ?></td>
    <td class="alignLeft alignTop" nowrap ><?php echo $paysliplink ; ?></td>
    <td class="alignRight alignTop" nowrap ><?php echo number_format(PayEmployeeLedgerArchivePeer::ComputeAmountbyEmpNoPeriodCode($record->getEmployeeNo(), $record->getPeriodCode(),  $sf_params->get('bank_cash_group')), 2 ) ; ?></td>
    <td width = "10%" class="alignCenter alignTop" nowrap ><?php echo $record->getBankCash() ?>    </td>
</tr>
<?php $SN++; $rowCount++; endforeach ?>
<tr class="<?=$rowClass?>"
    id="<?=$rowID?>"
    onMouseOver="rowHovered('<?=$rowID?>');"
    onMouseOut="rowUnhovered('<?=$rowID?>');"
    onMouseDown="rowClicked('<?=$rowID?>', null);"
    >
    <td class="alignCenter alignTop"  colspan="5" nowrap>
    	<input type="submit" name="sendAll" value=" Send SMS To Selected Employee " class="submit-button">
    </td>
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  nowrap></td>
    <td class="alignCenter alignTop"  nowrap></td>
    