<?php

class HrEmployeeLeaveCreditsCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        
        $fiscal = sfConfig::get('fiscal_year');
        $this->addJoin(HrEmployeeLeaveCreditsPeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO, self::LEFT_JOIN);
        $criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_RESIGNED, null, self::ISNULL);
        $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, $fiscal);
        
        //$criterions[] = $this->getNewCriterion(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('leave_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('fiscal_year', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('entitled', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeeLeaveCreditsPeer::CREDITS, $ref);
        }
        
        
        
//        $tis = $req->getParameter('tis', '');
//        $tie = $req->getParameter('tie', '');
//        $tiCrit = false;
//        if ($tis != '' && $tie == '') {
//        	echo 'here';
//            $tiCrit = $this->getNewCriterion(HrEmployeePeer::COMMENCE_DATE, 'DATE(' . HrEmployeePeer::COMMENCE_DATE . ') >= \'' . $tis . '\'', self::CUSTOM);
//        }
//        if ($tie != '') {
//            $tiCrit = $this->getNewCriterion(HrEmployeePeer::COMMENCE_DATE, 'DATE(' . HrEmployeePeer::COMMENCE_DATE . ') <= \'' . $tie . '\'', self::CUSTOM);
//        }
//        if ($tis != '' && $tie != '') {
//            if ($tis > $tie) {
//                $dtmp = $tis;
//                $tis = $tie;
//                $tie = $dtmp;
//            }     
//            $tiCrit = $this->getNewCriterion(HrEmployeePeer::COMMENCE_DATE, 'DATE(' . HrEmployeePeer::COMMENCE_DATE . ') >= \'' . $tis . '\' AND DATE(' . HrEmployeePeer::COMMENCE_DATE . ') <= \'' . $tie . '\'', self::CUSTOM);
//        }
//        if ($tiCrit) {
//            $criterions[] = $tiCrit;
//        }       
         
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
        $hs = sfConfig::get('app_leavecredits_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addDescendingOrderByColumn(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR );            	
                $this->addAscendingOrderByColumn($sqlField );
                $this->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::NAME );
            } else {
                $this->addDescendingOrderByColumn(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR );            	
                $this->addDescendingOrderByColumn($sqlField );
                $this->addDescendingOrderByColumn(HrEmployeeLeaveCreditsPeer::NAME );       
            }
        } else {            
        	$this->addDescendingOrderByColumn(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR );
            $this->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::NAME);
            $this->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE);
        }
    }
    
}