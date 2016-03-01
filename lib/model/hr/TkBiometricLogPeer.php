<?php

/**
 * Subclass for performing query and update operations on the 'tk_biometric_log' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkBiometricLogPeer extends BaseTkBiometricLogPeer
{
	const CUSTOM = "CUSTOM";
	public static function GetDataByUIDDate($uID, $dt)
	{
		$c = new Criteria();
		$c->add(self::USER_ID, $uID);
		$c->add(self::TRANS_DATE, $dt);
		$rs = self::doSelectOne($c);
		return $rs;
		
	}
	
   public static function GetAttendanceFromList($sdt, $edt, $list=null)
   {
//   	var_dump($sdt);
//   	var_dump($edt);
//   	exit();
	   //$list = array('024747352270509');
       $c = new Criteria();
       //$c->addJoin(HrEmployeePeer::FIN_NO, self::USER_ID);
       //$c->add(HrEmployeePeer::EMPLOYEE_NO, $list, Criteria::IN);
       $c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
       $c->addAscendingOrderByColumn(self::TRANS_DATE);
       $rs = self::doSelect($c);
       return !empty($rs) > 0 ? $rs : null;
   } 	
}
