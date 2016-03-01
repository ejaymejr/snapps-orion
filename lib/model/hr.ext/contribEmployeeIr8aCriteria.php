<?php

class PayEmployeeLevyCriteria extends Criteria
{
    protected $critJoin = 'AND';
        
    function __construct($parm = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('team', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::TEAM, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('from', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::FROM, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('to', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLevyPeer::TO, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_emplevy_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(PayEmployeeLevyPeer::NAME);
        }
    }
}