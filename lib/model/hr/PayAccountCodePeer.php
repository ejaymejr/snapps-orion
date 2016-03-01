<?php

/**
 * Subclass for performing query and update operations on the 'pay_account_code' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayAccountCodePeer extends BasePayAccountCodePeer
{
    
    public static function GetPager($cd)
    {
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }

        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1);

        $c = clone($cd);
        $pager = new sfPropelPager('PayAccountCode', $rowsPerPage);

        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

    public static function GetAcctCodeList() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::DESCRIPTION);
        //$c->setLimit(13);
        $rs = self::doSelect($c);
        foreach($rs as $res)
        {
            $val[$res->getAcctCode()] = $res->getDescription();
        }
        return $val;
    }
    
    public static function OptContributionList() {
        $c = new Criteria();
        $c->add(self::REMARKS, 'CONTRIBUTION');
        $c->addAscendingOrderByColumn(self::DESCRIPTION);
        $rs = self::doSelect($c);
        foreach($rs as $res)
        {
            $val[$res->getAcctCode()] = $res->getDescription();
        }
        return $val;
    }

 
    public static function GetDescriptionbyAcctCode($acode) {
        $c = new Criteria();
        $c->add(self::ACCT_CODE, $acode);
        $rs = self::doSelectone($c);
        return ($rs)? $rs->getDescription(): null ;
    }
    
    public static function GetAcctCodebyDescription($desc) {
        $c = new Criteria();
        $c->add(self::DESCRIPTION, $desc);
        $rs = self::doSelectone($c);
        return ($rs)? $rs->getAcctCode(): null ;
    }    
    
    public static function GetCpf($acct)
    {
        $c = new Criteria();
        $c->add(self::ACCT_CODE, $acct);
        $rs = self::doSelectOne($c);
        return ($rs)? $rs->getCpf(): null;
    }

    public static function GetAccountNameList() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::DESCRIPTION);        
        $rs = self::doSelect($c);
        $val[] = '';
        foreach($rs as $res){
            $val[$res->getAcctCode()] = $res->getDescription();
        }
        return $val;
    }

}
