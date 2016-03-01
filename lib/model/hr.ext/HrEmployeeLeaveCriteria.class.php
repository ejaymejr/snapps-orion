<?php

class HrEmployeeLeaveCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('leave_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::LEAVE_TYPE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('date_filed', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::DATE_FILED, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('reason_leave', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::REASON_LEAVE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('inclusive_datefrom', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::INCLUSIVE_DATEFROM, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('inclusive_dateto', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::INCLUSIVE_DATETO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('half_day', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeavePeer::HALF_DAY, "%$ref%", self::LIKE);
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
        $hs = sfConfig::get('app_applyleave_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addAscendingOrderByColumn(HrEmployeeLeavePeer::NAME);
        }
    }
    
}