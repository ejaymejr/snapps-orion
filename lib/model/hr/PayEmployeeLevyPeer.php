<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_levy' table.
 *
 *
 *
 * @package lib.model.hr
 */
class PayEmployeeLevyPeer extends BasePayEmployeeLevyPeer
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
		$pager = new PayEmployeeLedgerArchivePager('PayEmployeeLevy', $rowsPerPage);
		//$pager = new sfPropelPager('PayEmployeeLedgerArchive', $rowsPerPage);

		$pager->setCriteria($c);
		$pager->setPage($page);
		$pager->init();
		return $pager;
	}

	public static function CheckEmployeePeriod($emp, $period)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $emp);
		$c->add(self::PERIOD_CODE, $period);
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
	public static function GetDataByPeriod($period)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return $rs;
	}

	public static function GetEmployeeListByPeriod($period)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		$empNo = array();
		foreach($rs as $r)
		{
			$empNo[] = $r->getEmployeeNo();
		}
		return $empNo;
	}
	
	public static function GetLevyList($period)
    {
        $list = array('empno'=>array(), 'basic'=>array());
        $c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::EMPLOYEE_NO, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
        foreach($rs as $rec)
        {
            $list['empno'][]= $rec->getEmployeeNo();
            $list['basic'][]= $rec->getAmount();
        }
//        var_dump($period);
//        exit();
        return $list;
    } 
    
    public static function GetLevyByPeriodEmployeeNo($period, $empNo)
    {
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, $period);
    	$c->add(self::EMPLOYEE_NO, $empNo);
    	$rs = self::doSelectOne($c);
    	return $rs? $rs->getAmount() : 0;
    }
    
    public static function GetYearlyMasterList($year, $co)
    {
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, 'substr('.self::PERIOD_CODE.', 1, 4) = "'.$year.'"', Criteria::CUSTOM);
    	if ($co) $c->add(self::COMPANY, $co);
    	$c->addGroupByColumn(self::NAME);
    	$c->addAscendingOrderByColumn(self::NAME);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetDataByEmployeePeriodAcct($empNo, $period)
    {
    	$c  = new Criteria();
    	$c->add(self::PERIOD_CODE, $period);
    	$c->add(self::EMPLOYEE_NO, $empNo);
    	//$c->add(self::AMOUNT, 0, Criteria::GREATER_THAN);
    	$rs = self::doSelect($c);
    	$pay = 0;
    	foreach($rs as $r){
    		$pay = $pay + $r->getAmount();
    	}
    	return ($pay);
    }
    
    public static function GetTotalLevyByCompanyByPeriod($co, $period)
    {
    	$c = new Criteria();
    	$c->add(self::COMPANY, $co);
    	$c->add(self::PERIOD_CODE, $period);
    	$c->addAscendingOrderByColumn(self::NAME);
    	$rs = self::doSelect($c);
    	$total = 0;
    	foreach($rs as $r):
    		$total += $r->getAmount();
    	endforeach;
    	return $total;
    }
    
    

}
