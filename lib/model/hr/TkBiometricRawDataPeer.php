<?php

/**
 * Subclass for performing query and update operations on the 'tk_biometric_raw_data' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkBiometricRawDataPeer extends BaseTkBiometricRawDataPeer
{
	public static function GetDataBadgeNoDateTime($badge, $dttime)
	{
		$c = new Criteria();
		$c->add(self::BADGENO, $badge);
		$c->add(self::PUNCHIN, $dttime);
		$rs = self::doSelectOne($c);
		return $rs;
	}		
	
	
	
	
}
