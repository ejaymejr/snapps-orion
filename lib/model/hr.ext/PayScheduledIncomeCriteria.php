<?php

class PayScheduledIncomeCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayScheduledIncomePeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayScheduledIncomePeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayScheduledIncomePeer::ACCT_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayScheduledIncomePeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        
        if (sizeof($criterions)) {
            
            $this->add($criterions[0]);
            for ($i = 1; $i < sizeof($criterions); $i++) {
                if ($this->critJoin == 'AND') {
                    $this->addAnd($criterions[$i]);
                } else {
                    $this->addOr($criterions[$i]);                    
                }
            }
        }        
        $hs = sfConfig::get('app_schedincome_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
//        if ($sqlField) {
//            if ($sortOrder == 'ASC') {
//                $this->addAscendingOrderByColumn($sqlField);
//            } else {
//                $this->addDescendingOrderByColumn($sqlField);                
//            }
//        } else {            
//            $this->addDescendingOrderByColumn(PayScheduledIncomePeer::DESCRIPTION);
//        }
    }
}