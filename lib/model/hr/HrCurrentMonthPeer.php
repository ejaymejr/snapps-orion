<?php

/**
 * Subclass for performing query and update operations on the 'hr_current_month' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrCurrentMonthPeer extends BaseHrCurrentMonthPeer
{
    public static function GetCurrent()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::DATE_MODIFIED);
        $rs = self::doSelectOne($c);
        
        return ($rs? self::GetStartandEnd($rs->getCdate()) : self::GetStartandEnd(date('Y-m-d')) );
    }
    
    public static function GetStartandEnd($dt)
    {
        $sdt = DateUtils::DUFormat('Y-m-01', $dt);
        $edt = DateUtils::GetLastDate($sdt);
        return (array('start'=>$sdt, 'end'=>$edt));
    }
    
    public static function GetData()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::DATE_MODIFIED);
        $rs = self::doSelectOne($c);
        return $rs;
    }    
}
