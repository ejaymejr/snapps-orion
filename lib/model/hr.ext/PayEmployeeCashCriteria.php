<?php

class PayEmployeeCashCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct($para = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::ACCT_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::DESCRIPTION, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('remarks', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::REMARKS, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('frequency', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeCashPeer::FREQUENCY, "%$ref%", self::LIKE);
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
        
        $hs = sfConfig::get('app_cashregistration_grid_headers');
        
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(PayEmployeeCashPeer::NAME);
        }
    }
}