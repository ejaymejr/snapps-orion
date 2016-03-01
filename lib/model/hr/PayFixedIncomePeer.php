<?php

/**
 * Subclass for performing query and update operations on the 'pay_fixed_income' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayFixedIncomePeer extends BasePayFixedIncomePeer
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
        $pager = new sfPropelPager('PayFixedIncome', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
    
    public static function GetIncomeListByEmployeeNo($empno)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $rs = self::doSelect($c);       //do not change used in dtrComputeTime Individual
        $list = array();
        foreach($rs as $r):
        	$list[$r->getAcctCode()] = $r->getScheduledAmount();
        endforeach;
        return $list;
    }   


}
