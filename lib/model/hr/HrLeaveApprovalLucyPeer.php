<?php

/**
 * Subclass for performing query and update operations on the 'hr_leave_approval_lucy' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrLeaveApprovalLucyPeer extends BaseHrLeaveApprovalLucyPeer
{
	public static function GetList()
	{
		$c = new Criteria();
		$rs=self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getEmployeeNo();
		endforeach;
		return $list;
	}
}
