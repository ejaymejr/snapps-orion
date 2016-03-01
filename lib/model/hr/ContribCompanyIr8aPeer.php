<?php

/**
 * Subclass for performing query and update operations on the 'contrib_company_ir8a' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class ContribCompanyIr8aPeer extends BaseContribCompanyIr8aPeer
{
    public static function GetInfo()
    {
        $c=new Criteria();
        $rs = self::doSelectOne($c);
        return $rs;
    }
    
    public static function GetNanoOrgId()
    {
        $c=new Criteria();
        $rs = self::doSelectOne($c);
        return $rs->getNanoOrgId();
    }
    
}
