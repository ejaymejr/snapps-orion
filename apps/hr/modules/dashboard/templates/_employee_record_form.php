<?php use_helper('Validation', 'Javascript') ?>
<?php
if ($sf_params->get('citizenship_er_form') == 'SPR' ):
//****************************** SPR 
$pcode = ($sf_params->get('period_code'));
$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
$year = substr($pcode, 0, 4);
$seq = 1;
$sprEmpList = PayrollAuditCompliancePeer::GetSPREmployeeListByPeriodCode($pcode);
?>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" width="10%">Seq</td>
    <td class="FORMcell-right" width="10%" >Name</td>
    <td class="FORMcell-right" width="10%">NRIC/FIN</td>
   	<td class="FORMcell-right" width="10%">CONTACT #</td>
   	<td class="FORMcell-right" width="10%">DOB</td>
   	<td class="FORMcell-right" width="10%">GENDER</td>
   	<td class="FORMcell-right" width="10%">OCCUPATION/DESIGNATION</td>
   	<td class="FORMcell-right" width="10%">COMMENCE</td>
   	<td class="FORMcell-right" width="10%">MONTHLY BASIC</td>
   	<td class="FORMcell-right" width="10%">ALLOWANCES</td>
   	<td class="FORMcell-right" width="10%">DEDUCTIONS</td>
   	<td class="FORMcell-right" width="10%">ANNUAL LEAVE</td>
   	<td class="FORMcell-right" width="10%">SICK LEAVE</td>
   	<td class="FORMcell-right" width="10%">CPF EM</td>
   	<td class="FORMcell-right" width="10%">CPF ER</td>
   	<td class="FORMcell-right" width="10%">DONATION</td>
   	<td class="FORMcell-right" width="10%">UNPAID LEAVE</td>
    <td class="FORMcell-right" width="10%">&nbsp;</td>
</tr>
<?php 
	//<td class="FORMcell-right" nowrap><?php echo HrCompanyPeer::GetNamebyId($empData->getHrCompanyId()) </td>

	foreach ($sprEmpList as $spr):
	$empData = HrEmployeePeer::GetDatabyEmployeeNo($spr->getEmployeeNo());
	$empLedger = PayEmployeeLedgerArchivePeer::GetPayDetailAudit($spr->getEmployeeNo(), $pcode);
	if ($empData && $empLedger['basic'] > 0):
?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo substr($spr->getName(), 0, 20) ?></td>
    <td class="FORMcell-right" nowrap><?php echo $empData->getFinNo()? $empData->getFinNo() : $empData->getEmployeeNo() ?></td>
       	<td class="FORMcell-right" nowrap><?php echo substr($empData->getCellNo(),0,10) ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getDateOfBirth() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getGender() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getTeam() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getCommenceDate() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['basic'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo ($empLedger['ml'] + $empLedger['meal'] + $empLedger['mcb'] + $empLedger['ot'] + $empLedger['ha'] + $empLedger['se']  + $empLedger['ul'] ) ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['tot_deduction'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Annual Leave')?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Medical Leave')?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['cpf_em'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['cpf_er'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['donation'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Leave without Pay')?></td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php endif; endforeach; ?>
</table>
<?php endif;?>

<?php
if ($sf_params->get('citizenship_er_form') <> 'SPR' ):
//****************************** SPR 
$pcode = ($sf_params->get('period_code'));
$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
$year = substr($pcode, 0, 4);
$seq = 1;
$fwEmpList = PayrollAuditCompliancePeer::GetFWEmployeeListByPeriodCode($pcode);
?>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" width="10%">Seq</td>
    <td class="FORMcell-right" width="10%" >Name</td>
    <td class="FORMcell-right" width="10%">NRIC/FIN</td>
   	<td class="FORMcell-right" width="10%">CONTACT #</td>
   	<td class="FORMcell-right" width="10%">DOB</td>
   	<td class="FORMcell-right" width="10%">GENDER</td>
   	<td class="FORMcell-right" width="10%">OCCUPATION/DESIGNATION</td>
   	<td class="FORMcell-right" width="10%">COMMENCE</td>
   	<td class="FORMcell-right" width="10%">MONTHLY BASIC</td>
   	<td class="FORMcell-right" width="10%">ALLOWANCES</td>
   	<td class="FORMcell-right" width="10%">DEDUCTIONS</td>
   	<td class="FORMcell-right" width="10%">ANNUAL LEAVE</td>
   	<td class="FORMcell-right" width="10%">SICK LEAVE</td>
   	<td class="FORMcell-right" width="10%">CPF EM</td>
   	<td class="FORMcell-right" width="10%">CPF ER</td>
   	<td class="FORMcell-right" width="10%">DONATION</td>
   	<td class="FORMcell-right" width="10%">UNPAID LEAVE</td>
    <td class="FORMcell-right" width="10%">&nbsp;</td>
</tr>
<?php 
	foreach ($fwEmpList as $fw):
	$empData = HrEmployeePeer::GetDatabyEmployeeNo($fw->getEmployeeNo());
	$empLedger = PayEmployeeLedgerArchivePeer::GetPayDetailAudit($fw->getEmployeeNo(), $pcode);
	if ($empData && $empLedger['basic'] > 0):
?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo substr($fw->getName(), 0, 20) ?></td>
    <td class="FORMcell-right" nowrap><?php echo $empData->getFinNo()? $empData->getFinNo() : $empData->getEmployeeNo() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo substr($empData->getCellNo(),0,10) ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getDateOfBirth() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getGender() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getTeam() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empData->getCommenceDate() ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['basic'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo ($empLedger['ml'] + $empLedger['meal'] + $empLedger['mcb'] + $empLedger['ot'] + $empLedger['ha']) ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['tot_deduction'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Annual Leave')?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Medical Leave')?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['cpf_em'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['cpf_er'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo $empLedger['donation'] ?></td>
   	<td class="FORMcell-right" nowrap><?php echo HrEmployeeLeavePeer::IsOnLeaveGetDays($empData->getEmployeeNo(), $sdt, $edt, 'Leave without Pay')?></td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php endif; endforeach; ?>
</table>
<?php endif;?>