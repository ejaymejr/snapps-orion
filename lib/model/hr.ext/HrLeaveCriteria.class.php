<?php

class HrLeaveCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('leave_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLeavePeer::LEAVE_TYPE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLeavePeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('status', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLeavePeer::STATUS, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('remarks', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLeavePeer::REMARKS, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('days_entitled', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLeavePeer::DAYS_ENTITLED, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_leave_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrLeavePeer::LEAVE_TYPE);
        }
    }
    
}