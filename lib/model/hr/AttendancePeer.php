<?php

/**
 * Subclass for performing query and update operations on the 'attendance' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class AttendancePeer extends BaseAttendancePeer
{
    const CUSTOM = "CUSTOM";
    
    public static function GetAllData($sdt = null) {
        $sdt = ($sdt)? $sdt : date("Y-m-d H:i:s", mktime(1, 1, 1, 1, 1, 2008));
        $c = new Criteria();
        $c->add(self::TIME_IN, $sdt, Criteria::GREATER_EQUAL);
        //$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
        //$c->addDescendingOrderByColumn(self::TIME_IN);
        $rs = self::doSelect($c);
        return $rs;
    }
    
    public static function GetDatabyStartDate($sdt, $edt)
    {
        $c = new Criteria();
        $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $edt . '\'', self::CUSTOM);
//tkDtrsummaryPeer
//        $c->add(self::TIME_IN, DateUtils::DUFormat('Y-m-d H:i:s', $edt), Criteria::LESS_THAN);
        $rs = self::doSelect($c);
        return $rs;
    }

   public static function GetAttendance($empno, $sdt, $edt)
   {
       $c = new Criteria();
       $c->add(self::EMPLOYEE_NO, $empno);
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $edt . '\'', self::CUSTOM);
       //$c->addJoin(self::)
       $rs = self::doSelect($c);
       return !empty($rs) > 0 ? $rs : null;
   }   
   
   public static function GetAttendancePerDay($empno, $sdt)
   {
       $c = new Criteria();
       $c->add(self::EMPLOYEE_NO, $empno);
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') = \'' . $sdt . '\'', self::CUSTOM);
       //$c->addJoin(self::)
       $rs = self::doSelectone($c);
       return !empty($rs) > 0 ? $rs : null;
   }
   
   public static function GetEmpDaily($empno, $sdt)
   {
	   	$c = new Criteria();
	   	$c->add(self::EMPLOYEE_NO, $empno);
	   	$c1 = $c->getNewCriterion(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $sdt . '\'', self::CUSTOM);
	   	$c->add($c1);
	   	$rs = self::doSelectOne($c);
	   	return !empty($rs) > 0 ? $rs : null;
   }
}

