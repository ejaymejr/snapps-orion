<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_ledger_nano_template' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeLedgerNanoTemplatePeer extends BasePayEmployeeLedgerNanoTemplatePeer
{
    public static function GetPager($cd)
    {        
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }
        
        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1); 
        
        $c = clone($cd);
        $pager = new sfPropelPager('PayEmployeeLedgerNanoTemplate', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }	
    
    public static function GetBasicByEmployeeNo($empNo)
    {
    	$c = new Criteria();
    	$c->add(self::EMPLOYEE_NO, $empNo);
    	$c->add(self::ACCT_CODE, 'BP');
    	$rs = self::doSelectOne($c);
    	return $rs;
    }
}
