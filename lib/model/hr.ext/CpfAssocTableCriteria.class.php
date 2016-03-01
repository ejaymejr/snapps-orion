<?php

class CpfAssocTableCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(CpfAssocTablePeer::ACCT_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('race', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(CpfAssocTablePeer::RACE, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_cpfassoctable_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(CpfAssocTablePeer::RACE);
        }
    }
    
}