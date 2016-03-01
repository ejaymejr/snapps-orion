<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_ledger_nano' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeLedgerNanoPeer extends BasePayEmployeeLedgerNanoPeer
{

	public static function doCountGroupBy(Criteria $criteria, $con = null)
	{
		$criteria = clone $criteria;
		$criteria->clearSelectColumns()->clearOrderByColumns();
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn("COUNT(DISTINCT " . $column . ")");
		}
		$criteria ->clearGroupByColumns();
		$rs = PayEmployeeLedgerNanoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			return 0;
		}
	}
	
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
		$pager = new PayEmployeeLedgerNanoPager('PayEmployeeLedgerNano', $rowsPerPage);
		//$pager = new sfPropelPager('PayEmployeeLedgerNano', $rowsPerPage);

		$pager->setCriteria($c);
		$pager->setPage($page);
		$pager->init();
		return $pager;
	}	
	
	public static function ComputeAmountbyEmpNoPeriodCode($empno, $pcode)
	{
		$sql = "
            SELECT employee_no, period_code, sum(amount) as total 
            FROM `pay_employee_ledger_nano` where employee_no = '".$empno."' 
            and period_code = '".$pcode."' 
            group by period_code
        ";
		$total = HrLib::ExecuteSQL($sql);
		$total->next();
		return $total->getFloat('total');
		//        $c = new Criteria();
		//        $c = $c->clearSelectColumns();
		//        $c->add(self::EMPLOYEE_NO, $empno );
		//        $c->add(self::PERIOD_CODE, $pcode );
		//        $c->addAsColumn('total', " SUM(ROUND(" . self::AMOUNT . ",2))");
		//        $c->addGroupByColumn(self::EMPLOYEE_NO);
		//        $c->addGroupByColumn(self::PERIOD_CODE);
		//        $rs = self::doSelectone($c);
		//
		//        $tmp = new PayEmployeeLedger();
		//        $col = $tmp->hydrate($rs);
		//        var_dump($rs->getfloat($col));
		//        return ($rs) ? $rs->getfloat('total') : '0.00';

	}

	public static function GetEmployeeNoListByPeriod($period)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}	
	
	
	public static function GetEmployeeData($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetEmployeeBasicByPeriod($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::ACCT_CODE, 'BP');
		$rs = self::doSelectOne($c);
		return $rs? $rs->getAmount() : 0;
	}

	public static function GetEmployeeCpfByPeriod($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::ACCT_CODE, 'CPF');
		$rs = self::doSelectOne($c);
		return $rs;
	}	
	
	public static function GetEmployeeDonationByPeriod($empNo, $period)
	{
		$c  = new Criteria();
		$c1 = $c->getNewCriterion(self::ACCT_CODE, 'MBMF'); 
		$c2 = $c->getNewCriterion(self::ACCT_CODE, 'CDAC');
		$c3 = $c->getNewCriterion(self::ACCT_CODE, 'SINDA');
		$c2->addOr($c3);
		$c1->addOr($c2);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add($c1);
		//$c->add(self::ACCT_SOURCE, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelectOne($c);
		return $rs;
	}
		
	public static function GetIncomeAmount($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		$rs = self::doSelect($c);
	}

	//---------------------------- reports
	public static function GetTotalIncomeforCPFDeductable($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->add(self::INCOME_EXPENSE, 1);
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r)
		{
			if ($r->getAcctCOde() <> 'CBS')
			{
				$amt = $amt + $r->getAmount();
			}
		}
		return $amt;
	}	
	
}
