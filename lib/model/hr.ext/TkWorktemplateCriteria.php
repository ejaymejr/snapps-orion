<?php

class TkWorktemplateCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('worktemp_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkWorktemplatePeer::WORKTEMP_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkWorktemplatePeer::DESCRIPTION, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_worktemplate_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(TkWorktemplatePeer::DESCRIPTION);
        }
    }
}