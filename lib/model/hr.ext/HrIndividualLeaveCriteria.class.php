<?php

class HrIndividualLeaveCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::REMARKS, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::NAME, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('leave_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::LEAVE_TYPE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('status', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::STATUS, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('days_entitled', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrIndividualLeavePeer::DAYS_ENTITLED, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_individualleave_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrIndividualLeavePeer::NAME);
        }
    }
    
}