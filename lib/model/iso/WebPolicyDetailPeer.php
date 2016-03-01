<?php

/**
 * Subclass for performing query and update operations on the 'web_policy_detail' table.
 *
 * 
 *
 * @package lib.model.iso
 */ 
class WebPolicyDetailPeer extends BaseWebPolicyDetailPeer
{
	
	public static function GetDetailByWebPolicyHeaderId($webPolicyHeaderId)
	{
		$c = new Criteria();
		$c->add(self::WEB_POLICY_HEADER_ID, $webPolicyHeaderId);
		$c->addAscendingOrderByColumn(self::INDEX_NO);
		$rs = self::doSelect($c);
		return $rs;
	}
}
