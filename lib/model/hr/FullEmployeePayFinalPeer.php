<?php

/**
 * Subclass for performing query and update operations on the 'full_employee_pay_final' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class FullEmployeePayFinalPeer extends BaseFullEmployeePayFinalPeer
{
    public static function GetAllData()
    {
        $c  = new Criteria();
        $rs = self::doSelect($c);
        return ($rs);
    }
    
    public static function GetAllDatawhereTotalisGreaterThanZero()
    {
        $c  = new Criteria();
        $c->add(self::TOTAL, 0, Criteria::GREATER_THAN);
        $rs = self::doSelect($c);
        return ($rs);
    }    
    
    public static function GetDataforBank()
    {
        $c  = new Criteria();
        $c->add(self::ACCOUNT_NO, 'cash', Criteria::NOT_EQUAL);
        $c->add(self::TOTAL, 0, Criteria::GREATER_THAN);
        $rs = self::doSelect($c);
        return ($rs);
    }    
    
}
