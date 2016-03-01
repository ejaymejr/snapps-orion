<?php

class CpfGovtRuleCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(CpfGovtRulePeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('company_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(CpfGovtRulePeer::COMPANY_TYPE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('cpf_year', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(CpfGovtRulePeer::CPF_YEAR, "%$ref%", self::LIKE);
        }
        
        //---------------------------------------- FROM DATE        
        $frdt1 = $req->getParameter('frdt1', '');
        $todt1 = $req->getParameter('todt1', '');
        $tiCrit = false;
        if ($frdt1 != '') {
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::FROM_DATE, 'DATE(' . CpfGovtRulePeer::FROM_DATE . ') >= \'' . $frdt1 . '\'', self::CUSTOM);
        }
        if ($todt1 != '') {
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::FROM_DATE, 'DATE(' . CpfGovtRulePeer::FROM_DATE . ') <= \'' . $todt1 . '\'', self::CUSTOM);
        }
        if ($frdt1 != '' && $todt1 != '') {
            if ($frdt1 > $todt1) {
                $dtmp = $frdt1;
                $frdt1 = $todt1;
                $todt1 = $dtmp;
            }     
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::FROM_DATE, 'DATE(' . CpfGovtRulePeer::FROM_DATE . ') >= \'' . $frdt1 . '\' AND DATE(' . CpfGovtRulePeer::FROM_DATE . ') <= \'' . $todt1 . '\'', self::CUSTOM);
        }
        if ($tiCrit) {
            $criterions[] = $tiCrit;
        }
        
        //---------------------------------------- TO DATE
        $frdt2 = $req->getParameter('frdt2', '');
        $todt2 = $req->getParameter('todt2', '');
        $tiCrit = false;
        if ($frdt2 != '') {
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::TO_DATE, 'DATE(' . CpfGovtRulePeer::TO_DATE . ') >= \'' . $frdt2 . '\'', self::CUSTOM);
        }
        if ($todt2 != '') {
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::TO_DATE, 'DATE(' . CpfGovtRulePeer::TO_DATE . ') <= \'' . $todt2 . '\'', self::CUSTOM);
        }
        if ($frdt2 != '' && $todt2 != '') {
            if ($frdt2 > $todt2) {
                $dtmp = $frdt2;
                $frdt2 = $todt2;
                $todt2 = $dtmp;
            }     
            $tiCrit = $this->getNewCriterion(CpfGovtRulePeer::TO_DATE, 'DATE(' . CpfGovtRulePeer::TO_DATE . ') >= \'' . $frdt2 . '\' AND DATE(' . CpfGovtRulePeer::TO_DATE . ') <= \'' . $todt2 . '\'', self::CUSTOM);
        }
        if ($tiCrit) {
            $criterions[] = $tiCrit;
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
           
        $hs = sfConfig::get('app_cpfgovtrule_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(CpfGovtRulePeer::COMPANY_TYPE);
            $this->addDescendingOrderByColumn(CpfGovtRulePeer::CPF_YEAR);
            $this->addAscendingOrderByColumn(CpfGovtRulePeer::AGE_MIN);
            $this->addAscendingOrderByColumn(CpfGovtRulePeer::PAY_MIN);
        }
    }
    
}