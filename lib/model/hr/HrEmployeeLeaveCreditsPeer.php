<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_leave_credits' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrEmployeeLeaveCreditsPeer extends BaseHrEmployeeLeaveCreditsPeer
{
    public static function GetBalanceLeave($empno, $lId, $fiscal)
    {
//    	echo $empno.' -- '.$lId.' -- '.$fiscal.'<br>';
//    	exit();
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::HR_LEAVE_ID, $lId);
        $c->add(self::FISCAL_YEAR , $fiscal);
        $rs = self::doSelectOne($c);
        return ($rs)? ($rs->getCredits()) - $rs->getConsumed() : 0;
    }
    
    public static function GetDatabyEmployeeNoLeaveId($empno, $lId, $fiscal)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::HR_LEAVE_ID, $lId);
        $c->add(self::FISCAL_YEAR , $fiscal);
        $rs = self::doSelectOne($c);
        return $rs;
    }
    
    public static function GetIdbyEmployeeNoLeaveID($empno, $lID, $fiscal)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::HR_LEAVE_ID, $lID);
        $c->add(self::FISCAL_YEAR , $fiscal);
        $id = false;
        $rs = self::doSelectOne($c);
        if ($rs) {
            $id = $rs->getId();
        }
        return $id;
    }
}
