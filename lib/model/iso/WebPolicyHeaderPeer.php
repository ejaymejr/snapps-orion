<?php

/**
 * Subclass for performing query and update operations on the 'web_policy_header' table.
 *
 * 
 *
 * @package lib.model.iso
 */ 
class WebPolicyHeaderPeer extends BaseWebPolicyHeaderPeer
{
	public static function GetActivePolicy()
	{
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::INDEX_NO);
		$rs = self::doSelect($c);
		return $rs;
	}
}
