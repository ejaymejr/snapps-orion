<?php use_helper('Validation', 'Javascript') ?>
<?php

if ($sf_params->get('citizenship') == 'SPR' ):
//****************************** SPR 
$year = $sf_params->get('year');
$pcodeList = PayEmployeeLedgerArchivePeer::GetPeriodListManual($year);
$pcode = ($sf_params->get('period_code'));
$seq = 1;
$sprEmpList = PayrollAuditCompliancePeer::GetSPREmployeeListByYear($year);
foreach($pcodeList as $pcode):
	$hrs12[$pcode] = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDurationCount($sprEmpList, $pcode);
	foreach($hrs12[$pcode] as $empno => $watever):
		if ( $watever > 0 ):
			$nsprEmpList[$empno] = $empno;
		endif; 
	endforeach;
endforeach;
//$sprEmpList = PayrollAuditCompliancePeer::GetSPREmployeeListfromList($nsprEmpList);
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
<?php 
	foreach ($sprEmpList as $spr): 
		if (in_array($spr->getEmployeeNo(), $nsprEmpList) ):
?>
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
<?php endif; endforeach; ?>
</table>
<?php endif; ?>

<?php
if ($sf_params->get('citizenship') <> 'SPR' ):
//****************************** SPR 
$year = $sf_params->get('year');
$pcodeList = PayEmployeeLedgerArchivePeer::GetPeriodListManual($year);
$pcode = ($sf_params->get('period_code'));
$seq = 1;
$fwEmpList = PayrollAuditCompliancePeer::GetFWEmployeeListByYear($year);
foreach($pcodeList as $pcode):
	$hrs12[$pcode] = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDurationCount($fwEmpList, $pcode);
	foreach($hrs12[$pcode] as $empno => $watever):
		if ( $watever > 0 ):
			$nsprEmpList[$empno] = $empno;
		endif;
	endforeach;
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
<?php 
	foreach ($fwEmpList as $fw): 
		if (in_array($fw->getEmployeeNo(), $nsprEmpList) ):
	?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo $fw->getName() ?></td>
     <?php 
    foreach($pcodeList as $pcode): 
    	
    	//$hrs12 = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDuration($spr->getEmployeeNo(), $pcode);
    ?>   
    <td class="FORMcell-right" nowrap><?php echo $hrs12[$pcode][$fw->getEmployeeNo()] ?></td>
    <?php endforeach; ?>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php endif; endforeach; ?>
</table>
<?php endif; ?>

