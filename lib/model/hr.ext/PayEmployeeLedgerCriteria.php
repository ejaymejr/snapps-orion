<?php

class PayEmployeeLedgerCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct($parm = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('department', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::DEPARTMENT, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('period_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('race', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerPeer::RACE, "%$ref%", self::LIKE);
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
        switch($parm) //parameter passed
        {
            case 'GROUP':
                $hs = sfConfig::get('app_empledgergroup_grid_headers');            
                $this->addGroupByColumn('employee_no');
                break;
            case 'PAYSLIP':
                $hs = sfConfig::get('app_payslip_grid_headers');
                break;
            case 'PERIOD GROUP':
                $hs = sfConfig::get('app_periodcode_grid_headers');
                $this->addGroupByColumn('period_code');
                break;            
            default:
                $hs = sfConfig::get('app_empledger_grid_headers');
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
            $this->addDescendingOrderByColumn(PayEmployeeLedgerPeer::NAME);
        }
        
        $this->setDistinct();
    }
}