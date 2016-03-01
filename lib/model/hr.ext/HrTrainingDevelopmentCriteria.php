<?php

class HrTrainingDevelopmentCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::DESCRIPTION,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('place_held', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::PLACE_HELD,       "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('remarks', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::REMARKS,       "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('name_trainor', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::NAME_TRAINOR,       "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('license_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrTrainingDevelopmentPeer::LICENSE_NO, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_trainingsearch_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrTrainingDevelopmentPeer::FISCAL_YEAR);
        }
    }
}