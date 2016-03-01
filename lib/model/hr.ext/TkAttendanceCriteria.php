<?php

class TkAttendanceCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct($params=null)
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $this->addjoin(TkAttendancePeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO, self::LEFT_JOIN);
        //$this->addjoin(TkAttendancePeer::EMPLOYEE_NO, TkDtrmasterPeer::EMPLOYEE_NO, self::LEFT_JOIN);
        //$this->addJoin(TkAttendancePeer::ID, TkAttendanceHasCustomerEntityPeer::SALES_QUOTE_ID, self::LEFT_JOIN);
        //$this->addJoin(TkAttendancePeer::ID, TkAttendanceItemPeer::SALES_QUOTE_ID, self::LEFT_JOIN);
        
        /*
        $entityConcatSQL = 
            " GROUP_CONCAT(DISTINCT " . TkAttendanceHasCustomerEntityPeer::CUSTOMER_ENTITY_NAME .
            " ORDER BY " . TkAttendanceHasCustomerEntityPeer::CUSTOMER_ENTITY_NAME . " ASC " . 
            " SEPARATOR '|')";
        $this->addAsColumn('entity_names', $entityConcatSQL);
        
        $groupConcatSQL = 
            " GROUP_CONCAT(DISTINCT " . TkAttendanceHasCustomerEntityPeer::CUSTOMER_GROUP_NAME .
            " ORDER BY " . TkAttendanceHasCustomerEntityPeer::CUSTOMER_GROUP_NAME . " ASC " . 
            " SEPARATOR '|')";
        
        $this->addAsColumn('group_names', $groupConcatSQL);
        
        $itemConcatSQL = 
            " GROUP_CONCAT(DISTINCT " . TkAttendanceItemPeer::NAME .
            " ORDER BY " . TkAttendanceItemPeer::NAME . " ASC " . 
            " SEPARATOR '|')";
        
        $this->addAsColumn('item_names', $itemConcatSQL);
        
        $this->addGroupByColumn(TkAttendancePeer::ID);
		*/
        
        $criterions = array();
        
        /*
        $c = $req->getParameter('c', '');
        if ($c != '') {
            $company = snappsCompanyPeer::GetCompanyByName($c);
            if ($company) {
                $criterions[] = $this->getNewCriterion(TkAttendancePeer::COMPANY_ID, $company->getIndexNo());
            }
        }
		*/
//        $ref = $req->getParameter('employee_no', '');
//        if ($ref != '') {
//            $criterions[] = $this->getNewCriterion(TkAttendancePeer::EMPLOYEE_NO, "%$ref%", self::LIKE);
//        }

        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkAttendancePeer::NAME, "%$ref%", self::LIKE);
        }        
                
        
        
        $tis = $req->getParameter('tis', '');
        $tie = $req->getParameter('tie', '');
        $tiCrit = false;
        if ($tis != '') {
            $tiCrit = $this->getNewCriterion(TkAttendancePeer::TIME_IN, 'DATE(' . TkAttendancePeer::TIME_IN . ') >= \'' . $tis . '\'', self::CUSTOM);
        }
        if ($tie != '') {
            $tiCrit = $this->getNewCriterion(TkAttendancePeer::TIME_IN, 'DATE(' . TkAttendancePeer::TIME_IN . ') <= \'' . $tie . '\'', self::CUSTOM);
        }
        if ($tis != '' && $tie != '') {
            if ($tis > $tie) {
                $dtmp = $tis;
                $tis = $tie;
                $tie = $dtmp;
            }     
            $tiCrit = $this->getNewCriterion(TkAttendancePeer::TIME_IN, 'DATE(' . TkAttendancePeer::TIME_IN . ') >= \'' . $tis . '\' AND DATE(' . TkAttendancePeer::TIME_IN . ') <= \'' . $tie . '\'', self::CUSTOM);
        }
        if ($tiCrit) {
            $criterions[] = $tiCrit;
        }
        
       $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(TkDtrmasterPeer::COMPANY, "%$ref%", self::LIKE);
        }

       $ref = $req->getParameter('employment', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TYPE_OF_EMPLOYMENT, "%$ref%", self::LIKE);
        }
        
        $tos = $req->getParameter('tos', '');
        $toe = $req->getParameter('toe', '');
        $toCrit = false;
        if ($tos != '') {
            $toCrit = $this->getNewCriterion(TkAttendancePeer::TIME_OUT, 'DATE(' . TkAttendancePeer::TIME_OUT . ') >= \'' . $tos . '\'', self::CUSTOM);
        }
        if ($toe != '') {
            $toCrit = $this->getNewCriterion(TkAttendancePeer::TIME_OUT, 'DATE(' . TkAttendancePeer::TIME_OUT . ') <= \'' . $toe . '\'', self::CUSTOM);
        }
        if ($tos != '' && $toe != '') {
            if ($tos > $toe) {
                $dtmp = $tos;
                $tos = $toe;
                $toe = $dtmp;
            }     
            $toCrit = $this->getNewCriterion(TkAttendancePeer::TIME_OUT, 'DATE(' . TkAttendancePeer::TIME_OUT . ') >= \'' . $tos . '\' AND DATE(' . TkAttendancePeer::TIME_OUT . ') <= \'' . $toe . '\'', self::CUSTOM);
        }
        if ($toCrit) {
            $criterions[] = $toCrit;
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
        
        
        $hs = sfConfig::get('app_dtrsearch_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {       
            switch($params)
            {
                case 'scanIn':
                    $this->addDescendingOrderByColumn(TkAttendancePeer::DATE_MODIFIED);
                    break;
                default:
                    $this->addDescendingOrderByColumn(TkAttendancePeer::TIME_IN);
                    break;     
            } // switch
        }
    }
}