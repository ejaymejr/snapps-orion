<?php

class PayEmployeeLedgerArchiveCriteria extends Criteria
{
    protected $critJoin = 'AND';
        
    function __construct($parm = null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::COMPANY, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('department', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::DEPARTMENT, "%$ref%", self::LIKE);
        }        
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('period_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::PERIOD_CODE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('race', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(PayEmployeeLedgerArchivePeer::RACE, "%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('rank_code', '');
        if ($ref != '') {
        	$this->addjoin(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO, self::LEFT_JOIN);
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::RANK_CODE, "%$ref%", self::LIKE);
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
                $this->addGroupByColumn(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO);
                break;
            case 'ARCHIVE_GROUP':
                $hs = sfConfig::get('app_archiveempledgergroup_grid_headers');            
                $this->addGroupByColumn(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO);
                break;
            case 'PAYSLIP':
                $hs = sfConfig::get('app_payslip_grid_headers');
                break;
            case 'ARCHIVE_PAYSLIP':
                $hs = sfConfig::get('app_archivepayslip_grid_headers');
                break;
            case 'PERIOD GROUP':
                $hs = sfConfig::get('app_periodcode_grid_headers');
                $this->addGroupByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
                $this->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::DATE_CREATED);
                break;
            case 'ARCHIVE_PERIOD GROUP':
                $hs = sfConfig::get('app_archiveperiodcode_grid_headers');
                $this->addGroupByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
                $this->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::DATE_CREATED);
                //$this->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::PERIOD_CODE);
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
            $this->addDescendingOrderByColumn(PayEmployeeLedgerArchivePeer::NAME);
        }
    }
}