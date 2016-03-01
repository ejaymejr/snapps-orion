<?php

class TkDtrsummaryCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        
        $criterions = array();
        
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::NAME , "%$ref%", self::LIKE);
        }        
        
        $ref = $req->getParameter('attendance', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::ATTENDANCE , "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('holiday_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::HOLIDAY_CODE , "%$ref%", self::LIKE);
        }                                        
        $ref = $req->getParameter('leave_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::LEAVE_TYPE , "%$ref%", self::LIKE);
        }                                        
        $ref = $req->getParameter('dayoff', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::DAYOFF , "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('overtimes', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrsummaryPeer::OVERTIMES , "%$ref%", self::LIKE);
        }                                                
        
        $tdate = $req->getParameter('trans_date', '');
        if ($tdate != '') {
            $criterions[] = $this->getNewCriterion(TKDtrsummaryPeer::TRANS_DATE , "%$ref%", self::LIKE);
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
        
        
        $hs = sfConfig::get('app_dtrsummary_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'DESC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(TKDtrsummaryPeer::TRANS_DATE);
        }
    }
}