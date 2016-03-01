<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_contrib' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeContribPeer extends BasePayEmployeeContribPeer
{
	
	public function DeletePreviousEntry($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$rs = self::doDelete($c);
		return;
	}
}
