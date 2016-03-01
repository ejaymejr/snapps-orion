<?php

class HrLogCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        $ref = $req->getParameter('user', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrLogPeer::USER, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('user_action', '');
        if ($ref != '') {
        	$criterions[] = $this->getNewCriterion(HrLogPeer::USER_ACTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('action_module', '');
        if ($ref != '') {
        	$criterions[] = $this->getNewCriterion(HrLogPeer::USER_ACTION, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('description', '');
        if ($ref != '') {
        	$criterions[] = $this->getNewCriterion(HrLogPeer::DESCRIPTION, "%$ref%", self::LIKE);
        }
        
        $tos = $req->getParameter('tos', '');
        $toe = $req->getParameter('toe', '');
        $toCrit = false;
        if ($tos != '') {
        	$toCrit = $this->getNewCriterion(HrLogPeer::DATE_CREATED, 'DATE(' . HrLogPeer::DATE_CREATED . ') >= \'' . $tos . '\'', self::CUSTOM);
        }
        if ($toe != '') {
        	$toCrit = $this->getNewCriterion(HrLogPeer::DATE_CREATED, 'DATE(' . HrLogPeer::DATE_CREATED . ') <= \'' . $toe . '\'', self::CUSTOM);
        }
        if ($tos != '' && $toe != '') {
        	if ($tos > $toe) {
        		$dtmp = $tos;
        		$tos = $toe;
        		$toe = $dtmp;
        	}
        	$toCrit = $this->getNewCriterion(HrLogPeer::DATE_CREATED, 'DATE(' . HrLogPeer::DATE_CREATED . ') >= \'' . $tos . '\' AND DATE(' . HrLogPeer::DATE_CREATED . ') <= \'' . $toe . '\'', self::CUSTOM);
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
        $hs = sfConfig::get('app_hrlog_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrLogPeer::DATE_CREATED);
        }
    }
    
}