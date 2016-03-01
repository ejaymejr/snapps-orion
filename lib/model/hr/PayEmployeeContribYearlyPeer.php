<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_contrib_yearly' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeContribYearlyPeer extends BasePayEmployeeContribYearlyPeer
{
	
	public static function DeleteByYear($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);	
		$rs = self::doDelete($c);
		return ;
	}
	
	public static function GetDataByYear($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->addAscendingOrderByColumn(self::NAME);	
		$rs = self::doSelect($c);
		return $rs;
	}	
}
