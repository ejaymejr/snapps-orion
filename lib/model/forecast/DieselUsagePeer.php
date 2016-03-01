<?php

/**
 * Subclass for performing query and update operations on the 'diesel_usage' table.
 *
 * 
 *
 * @package lib.model.forecast
 */ 
class DieselUsagePeer extends BaseDieselUsagePeer
{
	public static function GetDieselConsumptionbyDateRange($sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::TRANS_DATE);
		$rs = self::doSelect($c);
		return $rs;
	}
}
