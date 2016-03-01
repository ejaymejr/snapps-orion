<?php

class PayEmployeeLedgerNanoCriteria extends Criteria
{
    protected $critJoin = 'AND';
        
    function __construct($parm = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('department', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::DEPARTMENT, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('period_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('race', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerNanoPeer::RACE, "%$ref%", self::LIKE);
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
            case 'ARCHIVE_GROUP':
                $hs = sfConfig::get('app_nanoempledgergroup_grid_headers');            
                $this->addGroupByColumn(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO);
                break;
            case 'ARCHIVE_PERIOD GROUP':
                $hs = sfConfig::get('app_nanoperiodcode_grid_headers');
                $this->addGroupByColumn(PayEmployeeLedgerNanoPeer::PERIOD_CODE);
                $this->addDescendingOrderByColumn(PayEmployeeLedgerNanoPeer::PERIOD_CODE);
                break;            
            case 'ARCHIVE_PAYSLIP':
                $hs = sfConfig::get('app_archivepayslip_grid_headers');
                break;
            default:
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
            $this->addDescendingOrderByColumn(PayEmployeeLedgerNanoPeer::NAME);
        }
    }
}