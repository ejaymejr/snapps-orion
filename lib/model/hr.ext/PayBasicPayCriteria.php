<?php

class PayBasicPayCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct($para = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayBasicPayPeer::EMPLOYEE_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayBasicPayPeer::NAME,       "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('frequency', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayBasicPayPeer::FREQUENCY, "%$ref%", self::LIKE);
        }
        
        //$this->add(PayBasicPayPeer::STATUS, PayBasicPayPeer::FLAG_STATUS_ACTIVE);
        
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
        switch ($para)
        {
            case 'CPF':
                $hs = sfConfig::get('app_cpfemp_grid_headers');
                break;
            default:
                $hs = sfConfig::get('app_basicpay_grid_headers');
                break;
        }
        
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(PayBasicPayPeer::NAME);
        }
    }
}