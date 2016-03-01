<?php

/**
 * Subclass for performing query and update operations on the 'contrib_country_code' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class ContribCountryCodePeer extends BaseContribCountryCodePeer
{
	public static function NationalityCode($natl)
	{
		switch($natl){
			case "M'SIAN";
				$natl = 'MALAYSIAN';
				break;
		}
		$natl = "%".substr($natl, 0, 5)."%";
		$c = new Criteria();
		$c->add(self::NATIONALITY, $natl, Criteria::LIKE);
		$rs = self::doSelectOne($c);
		return ($rs? $rs->getCode() : '');
	}
	
	public static function GetNationalityList(){
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::COUNTRY);
		$rs = self::doSelect($c);
		$list = array(''=> ' -SELECT NATIONALITY- ', 'SINGAPORE'=>'SINGAPORE');
		foreach($rs as $r){
			$list[$r->getCountry()] = $r->getNationality(); 
		}
		return $list;
			
	}
}
