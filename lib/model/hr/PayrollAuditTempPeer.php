<?php

/**
 * Subclass for performing query and update operations on the 'payroll_audit_temp' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayrollAuditTempPeer extends BasePayrollAuditTempPeer
{
	public static function GetAllData()
	{
		$c = new Criteria();
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->setLimit(10);
		$rs = self::doSelect($c);
		return $rs;
	}
}
