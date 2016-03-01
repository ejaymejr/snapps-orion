<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_pay_signature' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrEmployeePaySignaturePeer extends BaseHrEmployeePaySignaturePeer
{
	public static function GetDataByEmployeeNoPeriod($empno, $period)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::PERIOD_CODE, $period);
		$rs = self::doSelectOne($c);
		return $rs;
	}
}
