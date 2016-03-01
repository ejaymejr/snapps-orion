<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_cash' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeCashPeer extends BasePayEmployeeCashPeer
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
        $pager = new sfPropelPager('PayEmployeeCash', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

    public static function GetAllDatabyFrequency($freq)
    {
        $c = new Criteria();
        if ($freq != 'PAYDAY')
        {
            $c->add(self::FREQUENCY, $freq);            
        }
        $rs = self::doSelect($c);
        return $rs;
        
    }
    
        
}
