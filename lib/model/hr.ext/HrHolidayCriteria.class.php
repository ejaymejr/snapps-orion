<?php

class HrHolidayCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('holiday_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrHolidayPeer::HOLIDAY_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('holiday', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrHolidayPeer::HOLIDAY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('date_hol', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrHolidayPeer::DATE_HOL, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_holiday_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrHolidayPeer::DATE_HOL);
        }
    }
    
}