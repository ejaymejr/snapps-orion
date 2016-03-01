<?php

class TkDtrmasterCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct($para = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('department', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::DEPARTMENT, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('worktemp_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::WORKTEMP_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('type_of_employment', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::TYPE_OF_EMPLOYMENT, "%$ref%", self::LIKE);
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
        
        switch ($para)
        {
            case 'CPF':
                $hs = sfConfig::get('app_cpfemp_grid_headers');
                break;
            case 'MANUAL PAYSLIP' :
                $hs = sfConfig::get('app_manualpayslip_grid_headers');
                break;
            default:
                $hs = sfConfig::get('app_workschedule_grid_headers');
                break;                
        }
        
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(TkDtrmasterPeer::NAME);
        }
    }
}