<?php

/**
 * Subclass for performing query and update operations on the 'payroll_audit_compliance' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayrollAuditCompliancePeer extends BasePayrollAuditCompliancePeer
{
	public static function GetAllData($year = null, $period=null, $empno=null)
	{
		$c = new Criteria();
		if ($empno) $c->add(self::EMPLOYEE_NO, $empno);
		if ($year) $c->add(self::PERIOD_CODE, 'substring('.self::PERIOD_CODE.', 1, 4) = "'.$year.'"', Criteria::CUSTOM);
		if ($period) $c->add(self::PERIOD_CODE, $period);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetAllPeriodCode()
	{
		$c =  new Criteria();
		$c->addGroupByColumn(self::PERIOD_CODE);
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getPeriodCode()] = ' :: '.$r->getPeriodCode() . ' :: ';
		endforeach;
		return $list;
	}
	
	
	public static function GetSPREmployeeListByPeriodCode($period=null, $year=null)
	{
		$c = new Criteria();
		if ($period) $c->add(self::PERIOD_CODE, $period);
		if ($year) $c->add(self::PERIOD_CODE, 'substring(' .self::PERIOD_CODE. ', 1, 4) = "'.$year. '"', Criteria::CUSTOM);
		$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) = "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetFWEmployeeListByPeriodCode($period)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) <> "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetSPREmployeeListByYear( $year=null)
	{
		$c = new Criteria();
		if ($year) $c->add(self::PERIOD_CODE, 'substring(' .self::PERIOD_CODE. ', 1, 4) = "'.$year. '"', Criteria::CUSTOM);
		$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) = "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetFWEmployeeListByYear( $year=null)
	{
		$c = new Criteria();
		if ($year) $c->add(self::PERIOD_CODE, 'substring(' .self::PERIOD_CODE. ', 1, 4) = "'.$year. '"', Criteria::CUSTOM);
		$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) <> "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetSPREmployeeListfromList( $empList )
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empList, Criteria::IN);
		$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) = "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
}
