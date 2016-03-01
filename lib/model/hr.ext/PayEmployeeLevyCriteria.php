<?php

class ContribEmployeeIr8aCriteria extends Criteria
{
    protected $critJoin = 'AND';
        
    function __construct($parm = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('gross_inc', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::g, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('gross_ded', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::FROM, "%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('to', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(ContribEmployeeIr8aPeer::TO, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_wtax_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(ContribEmployeeIr8aPeer::NAME);
        }
    }
}