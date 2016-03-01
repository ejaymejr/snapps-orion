<?php use_helper('Validation', 'Javascript') ?>
<?php

if ($sf_params->get('citizenship') == 'SPR' ):
//****************************** SPR 
$year = $sf_params->get('year');
$pcodeList = PayEmployeeLedgerArchivePeer::GetPeriodListManual($year);
$pcode = ($sf_params->get('period_code'));
$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
$seq = 1;
$sprEmpList = PayrollAttendanceSummaryPeer::GetSPREmployeeListByYear($year);
foreach($pcodeList as $pcode):
	$hrs12[$pcode] = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDurationCount($sprEmpList, $pcode);
endforeach;
?>
<table width="100%" class="FORMtable" border="1" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Seq</td>
    <td class="FORMcell-right" nowrap>Name</td>
    <?php 
    	foreach($pcodeList as $pcode): 
    		$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
    		
    ?>
    <td class="FORMcell-right" nowrap><?php echo DateUtils::DUFormat('M-Y', $sdt) ?></td>
    <?php endforeach;?>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php foreach ($sprEmpList as $spr): ?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo $spr->getName() ?></td>
     <?php 
    foreach($pcodeList as $pcode): 
    	
    	//$hrs12 = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDuration($spr->getEmployeeNo(), $pcode);
    ?>   
    <td class="FORMcell-right" nowrap><?php echo $hrs12[$pcode][$spr->getEmployeeNo()] ?></td>
    <?php endforeach; ?>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

