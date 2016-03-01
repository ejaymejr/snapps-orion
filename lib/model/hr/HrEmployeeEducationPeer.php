<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_education' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrEmployeeEducationPeer extends BaseHrEmployeeEducationPeer
{
	
	public static function GetDataByEmployeeNo($empno)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$rs = self::doSelectOne($c);
		return $rs;
	}
}
