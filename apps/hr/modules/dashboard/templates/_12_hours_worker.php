<?php use_helper('Validation', 'Javascript') ?>
<?php
//****************************** SPR 
$pcode = ($sf_params->get('period_code'));
$seq = 1;
$sprEmpList = PayrollAuditCompliancePeer::GetSPREmployeeListByPeriodCode($pcode);
?>
<table width="100%" class="FORMtable" border="1" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Seq</td>
    <td class="FORMcell-right" nowrap>Name</td>
    <td class="FORMcell-right" nowrap>Occurrence</td>
    <td class="FORMcell-right" nowrap>Total Hours</td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php 
foreach($sprEmpList as $spr):
	$hrs12 = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDuration($spr->getEmployeeNo(), $pcode); 
	if ($hrs12['occurrence'] > 0):
?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo $spr->getName() ?></td>
    <td class="FORMcell-right" nowrap><?php echo $hrs12['occurrence'] ?></td>
    <td class="FORMcell-right" nowrap><?php echo $hrs12['total'] ?></td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>

<?php
endif; endforeach;
?>
</table>
<br>
<?php
//****************************** Foreign Worker
$pcode = ($sf_params->get('period_code'));
$seq = 1;
$fwEmpList = PayrollAuditCompliancePeer::GetFWEmployeeListByPeriodCode($pcode);
?>
<table width="100%" class="FORMtable" border="1" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Seq</td>
    <td class="FORMcell-right" nowrap>Name</td>
    <td class="FORMcell-right" nowrap>Occurrence</td>
    <td class="FORMcell-right" nowrap>Total Hours</td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>
<?php 
foreach($fwEmpList as $fw):
	$hrs12 = PayrollAttendanceSummaryPeer::Get12HoursOccurenceViaPaidDuration($fw->getEmployeeNo(), $pcode); 
	if ($hrs12['occurrence'] > 0):
?>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $seq++ ?></td>
    <td class="FORMcell-right" nowrap><?php echo $fw->getName() ?></td>
    <td class="FORMcell-right" nowrap><?php echo $hrs12['occurrence'] ?></td>
    <td class="FORMcell-right" nowrap><?php echo $hrs12['total'] ?></td>
    <td class="FORMcell-right" nowrap>&nbsp;</td>
</tr>

<?php
endif; endforeach;
?>
</table>