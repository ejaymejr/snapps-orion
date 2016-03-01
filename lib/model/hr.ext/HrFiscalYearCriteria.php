<?php

class HrFiscalYearCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('fiscal_year', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrFiscalYearPeer::FISCAL_YEAR,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('previous_year', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrFiscalYearPeer::PREVIOUS_YEAR,       "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('start_date', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrFiscalYearPeer::START_DATE,       "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('end_date', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrFiscalYearPeer::END_DATE,       "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('remarks', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrFiscalYearPeer::REMARKS, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_fiscalyear_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrFiscalYearPeer::FISCAL_YEAR);
        }
    }
}