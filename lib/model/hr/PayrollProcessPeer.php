<?php

/**
 * Subclass for performing query and update operations on the 'payroll_process' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayrollProcessPeer extends BasePayrollProcessPeer
{
	public static function GetRecentPeriod()
	{
		$c = new Criteria();
		$c->add(self::CLOSED, 'ISNULL('. self::CLOSED.') or '.self::CLOSED.' <> "OK" ', 'CUSTOM');
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
	public static function DeleteRecentPeriod()
	{
		$c = new Criteria();
		$c->add(self::CLOSED, 'ISNULL('. self::CLOSED.') or '.self::CLOSED.' <> "YES" ', 'CUSTOM');
		//$c->add(self::PERIOD_CODE, '>= YES', 'CUSTOM');
		$rs = self::doDelete($c);
		return $rs;
	}	
	
	public static function GetCurrentPos()
	{
		$rec = self::GetRecentPeriod();
		$pos = 1;
		if ($rec) 
		{
			if ($rec->getEmployeeData() == 'ON') $pos = 2;
			if ($rec->getEmpLeave() == 'ON') $pos = 3;
			if ($rec->getIncome() == 'ON') $pos = 4;
			if ($rec->getDeduction() == 'ON') $pos = 5;
			if ($rec->getAttendance() == 'ON') $pos = 6;
			if ($rec->getPayslip() == 'ON') $pos = 7;
			if ($rec->getManual() == 'ON') $pos = 8;
			if ($rec->getLevyContribution() == 'ON') $pos = 9;
			if ($rec->getClosed() == 'ON') $pos = 1;
		}
		return $pos;
	}
}
