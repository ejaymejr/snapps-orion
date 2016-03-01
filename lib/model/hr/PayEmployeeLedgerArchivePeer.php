<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_ledger_archive' table.
 *
 *
 *
 * @package lib.model.hr
 */
class PayEmployeeLedgerArchivePeer extends BasePayEmployeeLedgerArchivePeer
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
		$rs = PayEmployeeLedgerArchivePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			return 0;
		}
	}

	public static function GetPager($cd, $pgRes = null)
	{
		$pgRes = $pgRes? $pgRes : 20;
		$startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
		$rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', $pgRes);
		$page = (int) ( ($startIndex + 1) / $rowsPerPage);
		if (( ($startIndex + 1) % $rowsPerPage) != 0) {
			$page++;
		}

		$page = sfContext::getInstance()->getRequest()->getParameter('page', 1);

		$c = clone($cd);
		$pager = new PayEmployeeLedgerArchivePager('PayEmployeeLedgerArchive', $rowsPerPage);
		//$pager = new sfPropelPager('PayEmployeeLedgerArchive', $rowsPerPage);

		$pager->setCriteria($c);
		$pager->setPage($page);
		$pager->init();
		return $pager;
	}

	//---------------------------- data = records from archive
	public static function UpdatefromLedger($data)
	{
		if (!$data)
		{
			return;
		}
		$fin = false;
		foreach($data as $rec)
		{
			//--------------------- execute delete target data once
			if (!$fin)
			{
				$fin = self::DeleteDatabyPeriodCode($rec->getPeriodCode());
			}

			$record = new PayEmployeeLedgerArchive();
			$record->setEmployeeNo($rec->getEmployeeNo());
			$record->setName($rec->getName());
			$record->setCompany($rec->getCompany());
			$record->setDepartment( $rec->getDepartment());
			$record->setFrequency($rec->getFrequency());
			$record->setPeriodCode($rec->getPeriodCode());
			$record->setAcctCode($rec->getAcctCode());
			$record->setDescription($rec->getDescription());
			$record->setAmount($rec->getAmount());
			$record->setPayScheduledIncomeId($rec->getPayScheduledIncomeId());
			$record->setPayScheduledDeductionId($rec->getPayScheduledDeductionId());
			$record->setIncomeExpense($rec->getIncomeExpense());
			$record->setAcctSource($rec->getAcctSource());
			$record->setProcessedAs($rec->getProcessedAs());
			$record->setTaxCode($rec->getTaxCode());
			$record->setTaxableAmount($rec->getTaxableAmount());
			$record->setIsPayslipPrinted($rec->getIsPayslipPrinted());
			$record->setCpfEr($rec->getCpfEr());
			$record->setCpfTotal($rec->getCpfTotal());
			$record->setRace($rec->getRace());
			$record->setCreatedBy($rec->getCreatedBy());
			$record->setDateCreated($rec->getDateCreated());
			$record->setModifiedBy($rec->getModifiedBy());
			$record->setDateModified($rec->getDateModified());
			$record->setBankCash($rec->getBankCash());
			$record->save();
		}
	}

	public static function ComputeAmountbyEmpNoPeriodCode($empno, $pcode, $bankCash = null)
	{
		if ($bankCash):
			$sql = "
	            SELECT employee_no, period_code, sum(amount) as total 
	            FROM `pay_employee_ledger_archive` where employee_no = '".$empno."' 
	            and period_code = '".$pcode."' 
	            and bank_cash = '".$bankCash."'
	            group by period_code
	        ";
		else:
			$sql = "
	            SELECT employee_no, period_code, sum(amount) as total 
	            FROM `pay_employee_ledger_archive` where employee_no = '".$empno."' 
	            and period_code = '".$pcode."' 
	            group by period_code
	        ";
		endif;
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

	public static function GetIncomeAmount($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		$rs = self::doSelect($c);
	}
	
	public static function GetIncomeSum($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			$amt = $amt + $r->getAmount();
		}
		return $amt;
	}	
	
	public static function GetIncomeSumPerYear($empno, $year)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, ''.$year.'%', Criteria::LIKE );
		//$c->add(self::INCOME_EXPENSE, '1' );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			if ($r->getIncomeExpense() == '2' && ($r->getAcctCode() == 'UL' || $r->getAcctCode() == 'UL') ):
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getIncomeExpense() == '1'):
				$amt = $amt + $r->getAmount();
			endif;
		}
		return $amt;
	}
	
	public static function GetGrossIncomeCPF($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		$c->add(self::BANK_CASH,'CASH', Criteria::NOT_EQUAL );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			$amt = $amt + $r->getAmount();
		}
		return $amt;
	}
	
	
	public static function GetDeductionSum($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '2' );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			$amt += $r->getAmount();
		}
		return $amt;
	}	

	public static function GetDatabyEmpNoPeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return $rs;
	}

	public static function DeleteDatabyEmpNoPeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$rs = self::doDelete($c);
		return $rs;
	}

	public static function DeleteDatabyPeriodCode($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$rs = self::doDelete($c);
		return true;
	}

	public static function GetAllDatabyPeriodCode($pcode)
	{
		$c= new criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs= self::doSelect($c);
		return $rs;
	}

	//---------------------------- data = records from archive
	public static function UpdatefromArchive($data)
	{
		if (!$data)
		{
			return;
		}
		$fin = false;
		foreach($data as $rec)
		{
			//--------------------- execute delete target data once
			if (!$fin)
			{
				$fin = self::DeleteDatabyPeriodCode($rec->getPeriodCode());
			}

			$record = new PayEmployeeLedger();
			$record->setEmployeeNo($rec->getEmployeeNo());
			$record->setName($rec->getName());
			$record->setCompany($rec->getCompany());
			$record->setDepartment( $rec->getDepartment());
			$record->setFrequency($rec->getFrequency());
			$record->setPeriodCode($rec->getPeriodCode());
			$record->setAcctCode($rec->getAcctCode());
			$record->setDescription($rec->getDescription());
			$record->setAmount($rec->getAmount());
			$record->setPayScheduledIncomeId($rec->getPayScheduledIncomeId());
			$record->setPayScheduledDeductionId($rec->getPayScheduledDeductionId());
			$record->setIncomeExpense($rec->getIncomeExpense());
			$record->setAcctSource($rec->getAcctSource());
			$record->setProcessedAs($rec->getProcessedAs());
			$record->setTaxCode($rec->getTaxCode());
			$record->setTaxableAmount($rec->getTaxableAmount());
			$record->setIsPayslipPrinted($rec->getIsPayslipPrinted());
			$record->setCpfEr($rec->getCpfEr());
			$record->setCpfTotal($rec->getCpfTotal());
			$record->setCreatedBy($rec->getCreatedBy());
			$record->setDateCreated($rec->getDateCreated());
			$record->setModifiedBy($rec->getModifiedBy());
			$record->setDateModified($rec->getDateModified());
			$record->setBankCash($rec->getBankCash());
			$record->save();
		}
	}

	public static function GetCpfNet($empno, $pcode)
	{
		//        echo $empno .' '. $pcode;
		//        exit();
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$rs = self::doSelect($c);
		$amount = 0;
		if ($rs)
		{
			foreach($rs as $r)
			{
				if (PayAccountCodePeer::GetCpf($r->getAcctCode()))
				{
					$amount = $amount + $r->getAmount();
				}
			}
		}
		return $amount;
	}

	//---------------------------- reports
	public static function GetDataforBank($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetDataforCheque($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CHEQUE');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		return ($rs);
	}
	
	public static function GetDataforCashCheck($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH-CHECK');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		return ($rs);
	}
	

	public static function GetEmployeeNoListforBank($period)
	{
		$empNo = array();
		$list = self::GetDataforBank($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}


	public static function GetEmployeeNoListforBankCPF($period)
	{
		$empNo = array();
		$list = self::GetDataforBank($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				//if ( self::CheckCpf($rec->getEmployeeNo(), $period))
				//            	if ($rec->getAcctCode() == 'CPF')
				//            	{
				$empNo[] = $rec->getEmployeeNo();
				//            	}
			}
		}
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforCheckCPF($period)
	{
		$empNo = array();
		$list = self::GetDataforCheque($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				//if ( self::CheckCpf($rec->getEmployeeNo(), $period))
				//            	if ($rec->getAcctCode() == 'CPF')
				//            	{
				$empNo[] = $rec->getEmployeeNo();
				//            	}
			}
		}
		return (array_unique($empNo));
	}

	public static function CheckCpf($empNo, $period)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::ACCT_CODE, '33');
		$rs = self::doSelect($c);
		return $rs;
	}
	//    public static function GetEmployeeNoListforCheque($period)
	//    {
	//        $empNo = array();
	//        $list = self::GetDataforCheque($period);
	//        if ($list)
	//        {
	//            foreach($list as $rec)
	//            {
	//                $empNo[] = $rec->getEmployeeNo();
	//            }
	//        }
	//        return (array_unique($empNo));
	//    }



	public static function GetEmployeeNoListbyCompany($period, $co=null, $team = null)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		if ( $co )
		{
			$c->add(self::COMPANY, $co);
		}

		if ($team)
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::TEAM, $team);
		}

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

	public static function GetEmployeeNoListforBankbyCompany($period)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'BANK');
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

	public static function GetEmployeeNoListforBankCheque($period)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
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

	public static function GetEmployeeNoListforBankChequeForLevy($period, $order = null, $momGroup = null)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		//if (!$order) $c->addAscendingOrderByColumn(self::COMPANY);
		//if (!$order) $c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::ACCT_CODE, '&& || &&', Criteria::CUSTOM);
		$list = self::doSelect($c);
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
//		var_dump($empNo);
//		echo 'test';
//		exit();
		$lList = PayEmployeeLevyPeer::GetEmployeeListByPeriod($period);
		foreach($lList as $k=>$v)
		{
			if (PayEmployeeLedgerArchivePeer::GetEmployeeData($period, $v) ) {
				$empNo[] = $v;	
			}
		}
		$eList = (array_unique($empNo));
		if ($momGroup):
			$eList = HrEmployeePeer::GetEmployeeListByMomGroup($eList, $momGroup);
		endif;
		return $eList;
	}



	public static function GetEmployeeNoListforBankChequeorderbyName($period, $co=null)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		if ( $co ) {
			$c->add(self::COMPANY, $co);
		}
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


	public static function GetEmployeeNoListforChequebyCompany($period)
	{
		$empNo = array();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CHEQUE');
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
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return ($rs);
	}
	
	public static function GetEmployeeDataOneRecordOnly($period, $empNo)
	{
// 		var_dump($period);
// 		var_dump($empNo);
// 		exit();
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelectOne($c);
		return ($rs);
	}

	public static function GetEmployeeDataforBank($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetEmployeeDataforBankCash($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CHEQUE', Criteria::NOT_EQUAL);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$rs = self::doSelect($c);
		return ($rs);
	}


	public static function GetEmployeeDataforBankCheque($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$rs = self::doSelect($c);
		return ($rs);
	}


	public static function GetDataforCash($period, $company = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
		if ($company)
		{
			$c->add(self::COMPANY, $company);
		}
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return ($rs);
	}
	
	public static function GetDataforBankCheck($period, $company = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		if ($company)
		{
			$c->add(self::COMPANY, $company);
		}
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetEmployeeNoListforCash($period)
	{
		$empNo = array();
		$list = self::GetDataforCash($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforCheque($period)
	{
		$empNo = array();
		$list = self::GetDataforCheque($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}
	
	public static function GetEmployeeNoListforCashCheck($period)
	{
		$empNo = array();
		$list = self::GetDataforCashCheck($period);
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}


	public static function GetEmployeeNoListforCashbyCompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
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

	public static function GetEmployeeNoListforBankCashbyCompany($period, $co=null)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$c->add(self::BANK_CASH, 'CHEQUE', Criteria::NOT_EQUAL);
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


	public static function GetEmployeeDataforCash($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH');
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		//$c->add(self::NAME, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return ($rs);
	}
	

	public static function GetEmployeeDataforCheque($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CHEQUE');
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}
	
	public static function GetEmployeeDataforCashCheck($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH-CHECK');
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}


	public static function GetEmployeeDataforCashandBank($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetEmployeeDataforChequeandBank($period, $empNo)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		//$c->add(self::ACCT_SOURCE, '&& || &&');
		$rs = self::doSelect($c);
		return ($rs);
	}

	
	public static function GetEmployeeDataforCashandBankbyAcct($period, $empNo, $acct)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::ACCT_CODE, $acct);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetAllDatabyPeriodCodeAcctCode($pcode, $acct, $src=null)
	{
		$c= new criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::ACCT_CODE,   $acct);
		if ($src)
		{
			$c->add(self::BANK_CASH,   $src);
		}
		$c->addAscendingOrderByColumn(self::NAME);
		$rs= self::doSelect($c);
		return $rs;
	}

	public static function GetPeriodCodeOrig()
	{
		$pcode = array();
		$c= new Criteria();
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		$rs = self::doSelect($c);
//		if ($rs)
//		{
//			foreach($rs as $rec)
//			{
//				$pcode[$rec->getPeriodCode()] = $rec->getPeriodCode();
//			}
//		}
		foreach($rs as $rec)
		{
			$pcode[$rec->getPeriodCode()] = $rec->getPeriodCode();
		}
		
		//return array_unique($pcode);
		return  $pcode;
	}

	public static function GetPeriodCode()
	{
		$pcode = array();
		$c= new Criteria();
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		$rs = self::doSelect($c);
		foreach($rs as $rec)
		{
			$cpcode = self::GetStartDate( $rec->getPeriodCode() );
			$payrollType = substr($rec->getPeriodCode(), 18 );
			//$payrollType = strpos($cpcode, 'monthly') > 0 ? 'SPECIAL' : 'MONTHLY';
			$pcode[$rec->getPeriodCode()] = DateUtils::DUFormat('F - Y', $cpcode) . ' ' . $payrollType;
			//$pcode[$rec->getPeriodCode()] = $rec->getPeriodCode();
		}
		return  $pcode;
	}
	

	
	public static function GetLatestPeriodCode()
	{
		$pcode = array();
		$c= new Criteria();
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		$rs = self::doSelectOne($c);
		return $rs? $rs->getPeriodCode() : '';
		
	}	
	
	public static function GetLast3PeriodCode()
	{
		$pcode = array();
		$c= new Criteria();
		$c->add(self::PERIOD_CODE, '%ALL-MONTHLY%', Criteria::LIKE);
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		$c->setLimit(4);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[] = $r->getPeriodCode();
		endforeach;
		unset($list[0]);
		// get the previous-previous period if date is not yet 14
		// that is because the qouta will be update after the 
		// cpf submission which has a deadline of 14th of the month
//		if (date('d') <= 14 ):
//			unset($list[0]);
//		else:
//			unset($list[3]);
//		endif;
//		var_dump($list);
//		exit();
		return $list;
	}	

	public static function GetEmployeeNoListforBankPerCompany($period, $company)
	{
		$empNo = array();
		if ($company == 'ALL'):
			$list = self::GetDataforBank($period);
		else:
			$list = self::GetDataforBank($period, $company);
		endif;
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		//var_dump($empNo);
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforCashPerCompany($period, $company)
	{
		$empNo = array();
		//$list = self::GetDataforCash($period, $company);
		if ($company == 'ALL'):
			$list = self::GetDataforCash($period);
		else:
			$list = self::GetDataforCash($period, $company);
		endif;
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}
	
	public static function GetEmployeeNoListforCashCheckPerCompany($period, $company)
	{
		$empNo = array();
		//$list = self::GetDataforCash($period, $company);
		if ($company == 'ALL'):
		$list = self::GetDataforCashCheck($period);
		else:
		$list = self::GetDataforCashCheck($period, $company);
		endif;
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforBankChequePerCompany($period, $company)
	{
		$empNo = array();
		//$list = self::GetDataforCash($period, $company);
		if ($company == 'ALL'):
			$list = self::GetDataforBankCheck($period);
		else:
			$list = self::GetDataforBankCheck($period, $company);
		endif;
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}
	
	public static function GetEmployeeNoListforChequePerCompany($period, $company)
	{
		$empNo = array();
		//$list = self::GetDataforCheque($period, $company);
		if ($company == 'ALL'):
			$list = self::GetDataforCheque($period);
		else:
			$list = self::GetDataforCheque($period, $company);
		endif;
		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[] = $rec->getEmployeeNo();
			}
		}
		return (array_unique($empNo));
	}


	public static function GetEmployeeNoListforCashSubConbyCompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo())) <> 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforCashNoSubConbyCompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo()))  == 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}


	public static function GetEmployeeNoListforBankSubConbyCompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo())) <> 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}

	public static function GetEmployeeNoListforBankNoSubConbyCompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo())) == 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}

	public static function Getemployeenolistnosubconbycompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo())) == 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}


	public static function Getemployeenolistforsubconbycompany($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		//$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				if ( strtolower(HrEmployeePeer::GetEmployment($rec->getEmployeeNo())) != 'full-time' )
				{
					$empNo[] = $rec->getEmployeeNo();
				}
			}
		}
		return (array_unique($empNo));
	}



	public static function GetEmployeeDatalikePeriod($period, $empNo, $source)
	{
		$period = '%'.$period.'%';
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period, Criteria::LIKE);
		$c->add(self::BANK_CASH, $source);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function Getemployeedatabyperiod($pcode, $empno)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetemployeedatabyperiodbyAcct($pcode, $empno, $acct)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::ACCT_CODE, $acct);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		return ($rs);
	}

	public static function GetOptimizedDatabyEmployeeNo($empNo, $period, $fldList)
	{
		$c = new Criteria();
		$c->clearSelectColumns();
		foreach($fldList as $kf=>$vf)
		{
			switch(strtolower($vf))
			{
				case 'employee_no':
					$c->addSelectColumn(self::EMPLOYEE_NO);
					break;
				case 'name':
					$c->addSelectColumn(self::NAME);
					break;
				case 'company':
					$c->addSelectColumn(self::COMPANY);
					break;
			}
		}

		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$rs = self::doSelectRS($c);
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
		while ($rs->next())
		{
			return $rs; // nr of column in select clause
		}
	}

	public static function GetJournalListing($empNo, $batch, $mess = null, $company = null, $eGroup)
	{
		switch($mess)
		{
			case 'BANK':
				$empNoList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListforBankPerCompany($batch, $company);
				break;
			case 'CASH':
				$empNoList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListforCashPerCompany($batch, $company);
				break;
			case 'CHEQUE':
				$empNoList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListforChequePerCompany($batch, $company);
				break;
			default    :
				$empNoList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListbyCompany($batch, $company);
				break;
		}
		$empNoList  = HrEmployeePeer::CheckEmplistbyEmpGroup1($empNoList, $eGroup);
		if ($empNo)
		{
			$empNoList = array($empNo);
		}

		$empData = array('empno'=>array(), 'name'=>array(), 'basic'=>array(),
                         'ot'=>array(), 'cbs'=>array(), 'ap'=>array(), 
                         'adv_ot'=>array(), 'meal'=>array(), 'cdac'=>array(), 
                         'sinda'=>array(), 'mbmf'=>array(),  'others'=>array(), 
                         'all'=>array(), 'bk'=>array(),  'cpf'=>array(),
                         'ha'=>array(), 'lv'=>array(),  'mr'=>array(),
                         'ml'=>array(), 'td'=>array(),  'ul'=>array(),
                         'total'=>array());
		// $empNoList = array('S1553425G');
		foreach ($empNoList as $kemp=>$vno)
		{
			switch($mess)
			{
				case 'BANK':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBank($batch, $vno);
					break;
				case 'CASH':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCash($batch, $vno);
					break;
				case 'CHEQUE':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCheque($batch, $vno);
					break;
				default    :
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCashandBank($batch, $vno);
					break;

			}

			$empno = '';
			$name  = '';
			$basic = 0;
			$ot    = 0;
			$bank  = 0;
			$ap    = 0;
			$advot = 0;
			$others= 0;
			$tot   = 0;
			$meal  = 0;
			$cdac  = 0;
			$sinda = 0;
			$mbmf  = 0;
			$all   = 0;
			$bk    = 0;
			$cpf   = 0;
			$ha    = 0;
			$lv    = 0;
			$mr    = 0;
			$ml    = 0;
			$td    = 0;
			$ul    = 0;
			foreach($data as $rec)
			{
				switch($rec->getAcctCode())
				{
					case 'AL':
						$all = $all + $rec->getAmount();
						break;
						//                    case 'BK':
						//                        $bk = $bk + $rec->getAmount();
						//                        break;
					case 'BP':
						$basic = $basic + $rec->getAmount();
						break;
					case 'CPF':
						$cpf = $cpf + $rec->getAmount();
						break;
					case 'HA':
						$ha = $ha + $rec->getAmount();
						break;
					case 'LV':
						$lv = $lv + $rec->getAmount();
						break;
					case 'MR':
						$mr = $mr + $rec->getAmount();
						break;
					case 'ML':
						$ml = $ml + $rec->getAmount();
						break;
					case 'TD':
						$td = $td + $rec->getAmount();
						break;
					case 'UL':
						$ul = $ul + $rec->getAmount();
						break;

					case 'PI':
						$basic = $basic + $rec->getAmount();
						break;
					case 'CBS':
						$bank  = $bank + $rec->getAmount();
						break;
					case 'AP':
						$ap  = $ap + $rec->getAmount();
						break;
					case 'OT':
						if ($rec->getAmount() > 0)
						{
							$ot = $ot + $rec->getAmount();
						}else{
							$advot = $advot + $rec->getAmount();
						}
						break;
					case 'MEAL':
						$meal  = $meal + $rec->getAmount();
						break;
					case 'CDAC':
						$cdac  = $cdac + $rec->getAmount();
						break;
					case 'SINDA':
						$sinda  = $sinda + $rec->getAmount();
						break;
					case 'MBMF':
						$mbmf  = $mbmf + $rec->getAmount();
						break;

					default:
						$others = $others + $rec->getAmount();
						break;
				}
				$empno = $rec->getEmployeeNo();
				$name  = $rec->getName();
				//                echo $empno .' - '.  $rec->getAcctCode() .' = ' . $rec->getAmount() . ' [ot] ' . $ot;
				//                echo '<br>';
				$tot = $tot + $rec->getAmount();
				//echo $name .' - ' . $ul .' = '. $td .' <--- <br>' ;//. $rec->getTransDate();
			}

			//exit();
			$empData['empno'][]    = $empno;
			$empData['name'][]     = $name;
			$empData['basic'][]    = $basic;
			$empData['ot'][]       = $ot + $advot;
			$empData['cbs'][]      = $bank;
			$empData['ap'][]       = $ap;
			$empData['adv_ot'][]   = $advot;
			$empData['meal'][]     = $mr;
			$empData['meal_backpay'][] = $meal;
			$empData['cdac'][]     = $cdac;
			$empData['sinda'][]    = $sinda;
			$empData['mbmf'][]     = $mbmf;
			$empData['all'][]   = $all + $ha;
			$empData['bk'][]   = $bk;
			$empData['cpf'][]   = $cpf;
			$empData['lv'][]   = $lv;
			$empData['ml'][]   = $ml;
			$empData['ul'][]   = $ul + $td;

			$empData['others'][]   = $others;
			$empData['total'][]    = $tot;
		}
		return $empData;
	}//GetJournalListing


	public static function GetEmployeePay($empNo, $period)
	{
		//--------------------------------------- not posted only aw
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->addSelectColumn(self::EMPLOYEE_NO);
		$c->addSelectColumn(self::NAME);
		$c->addSelectColumn(self::DEPARTMENT);
		$c->addSelectColumn(self::COMPANY);
		$c->addSelectColumn(self::ACCT_CODE);
		$c->addSelectColumn(self::AMOUNT);
		$c->addSelectColumn(self::CPF_ER);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelectRS($c);
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);

		$empNo='';
		$name='';
		$dept='';
		$comp='';
		$basi=0;
		$part=0;
		$ot  =0;
		$allo=0;
		$meal=0;
		$unde=0;
		$abse=0;
		$cpfer=0;
		$cpfem=0;
		$total=0;
		$mall = 0;
		$oth = 0;
		$ded = 0;

		while ($rs->next())
		{
			$name = $rs->get('NAME');
			$dept = $rs->get('DEPARTMENT');
			$comp = $rs->get('COMPANY');
			switch ($rs->get('ACCT_CODE'))
			{
				case 'BP':
					$basi = $basi + $rs->get('AMOUNT');
					break;
				case 'PI':
					$part = $part + $rs->get('AMOUNT');
					break;
				case 'OT':
					$ot = $ot + $rs->get('AMOUNT');
					break;
				case 'MR':
					$meal = $meal + $rs->get('AMOUNT');
					break;
				case 'TD':
					$unde = $unde + $rs->get('AMOUNT');
					break;
				case 'UL':
					$abse = $abse + $rs->get('AMOUNT');
					break;
				case 'CPF':
					$cpfem = $cpfem + $rs->get('AMOUNT');
					$cpfer = $cpfer + $rs->get('CPF_ER');
					break;
				case 'SINDA':
					$ded = $ded + $rs->get('AMOUNT');
					break;
				case 'MBMF':
					$ded = $ded + $rs->get('AMOUNT');
					break;
				case 'CDAC':
					$ded = $ded + $rs->get('AMOUNT');
					break;
				default:
					$oth  = $oth + + $rs->get('AMOUNT');
					break;
			}
		}
		//$tota = ($basi + $ot + $mall + $meal + $part + $unde + $abse + $cpfem + $cpfer);
		$tota = $basi + $part + $ot + $meal + $unde + $abse + $cpfem + $oth ;

		$empData = array(
    	    'empNo'=> $empNo,
    		'name'=> $name,
    		'dept'=> $dept,
    		'comp'=> $comp,
    		'basi'=> $basi,
        	'part'=> $part,
        	'ot'  => $ot,
    		'allo'=> $oth,
        	'meal'=> $meal,
        	'unde'=> $unde,
            'abse'=> $abse,
            'cpfem'=>$cpfem,
        	'cpfer'=>($cpfer * -1),
        	'assoc'=> $ded,
    		'tota'=> $tota
		);

		return $empData;
	}

	public static function GetLevyDeduction($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::ACCT_CODE, 'LV');
		$rs = self::doSelect($c);
		$levy = 0;
		$amount = 0;
		foreach($rs as $r){
			$levy = ($r->getAmount() <= 0 ? $r->getAmount() : 0);
			$amount = $amount + $levy;
		}

		return ($amount);
	}

	public static function GetListforMasterListInActive($list)
	{
		$c = new Criteria();
		//        $c->add(self::EMPLOYEE_NO, $list, Criteria::NOT_IN);
		//        $c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO, Criteria::NOT_EQUAL);
		//        $c->add(HrEmployeePeer::TEAM, 0, Criteria::GREATER_THAN);
		//        $c->add(HrEmployeePeer::HR_COMPANY_ID, 2);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::NAME);
		$rs = self::doSelect($c);
		return $rs;
	}

	public static function ProcessLevyListing($period, $user)
	{
		//--------------------------------------- not posted only aw
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		foreach($rs as $r){
			$empNo = $r->getEmployeeNo();
			$lvy = PayBasicPayPeer::GetLevyDataEmployeeNo($empNo);
			//$lvyDed = self::GetLevyDeduction($empNo, $period);
			$lvyDed = 0;
			if ($lvy){
				$rec = PayEmployeeLevyPeer::CheckEmployeePeriod($empNo, $period);
				//$rec='';
				if (! $rec){
					$rec = new PayEmployeeLevy();
					$rec->setCreatedBy($user);
					$rec->setDateCreated(DateUtils::DUNow());
					$rec->setEmployeeNo($empNo);
					$rec->setName($r->getName());
					$rec->setCompany($r->getCompany());
					$rec->setTeam('');
					$rec->setPeriodCode($period);
					//                $rec->setFrom(DateUtils::DUNow());
					//                $rec->setTo(DateUtils::DUNow());
					$rec->setLevyRate($lvy->getLevy());
					$rec->setLevyDed($lvyDed);
					$rec->setAmount($lvy->getLevy() + $lvyDed);
					$rec->setDateModified(DateUtils::DUNow());
					$rec->setModifiedBy($user);
					$rec->save();
				}
				$rec->setCompany($r->getCompany());
				$rec->save();
			}
		}
		return;
	}

	public static function getIdByEmpNoBatch($empNo, $batch){
		$cc = new Criteria();
		$cc->add(self::PERIOD_CODE, $batch);
		$batch = self::doSelectOne($cc);

		return $batch->getId();

		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $batch);
		$rs = self::doSelectOne($c);

		echo $rs->getId();

		return ($rs? $rs->getId(): $batch->getId());
	}

	public static function GetEmployeeNoListByPeriod($period)
	{
		$empNo = array();
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		//        $c->addAscendingOrderByColumn(self::COMPANY);
		$c->addAscendingOrderByColumn(self::NAME);
		$list = self::doSelect($c);

		if ($list)
		{
			foreach($list as $rec)
			{
				$empNo[$rec->getEmployeeNo()] = $rec->getName();
			}
		}
		return (array_unique($empNo));
	}

	public static function GetBasicByEmpNoPeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		//$c->add(self::DESCRIPTION, 'BASIC PAY');
		$c->add(self::ACCT_CODE, 'BP');
		$rs = self::doSelectOne($c);
		return $rs? $rs->getAmount() : 0;
	}
	
	public static function GetBasicPartTimeIncomeByEmployeePeriod($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
//		$c->addJoin(self::EMPLOYEE_NO, PayEmployeeLevyPeer::EMPLOYEE_NO);
//		$c->add(PayEmployeeLevyPeer::PERIOD_CODE, $pcode);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c1= $c->getNewCriterion(self::ACCT_CODE, 'BP');
		$c2= $c->getNewCriterion(self::ACCT_CODE, 'PI');
		$c1->addOr($c2);
		$c->addAnd($c1);
		$rs = self::doSelect($c);
		$amt = 0;
		foreach($rs as $r):
			if ($r->getAcctCode() == 'BP'):
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getAcctCode() == 'PI' and $r->getBankCash() <> 'CASH'):
				$amt = $amt + $r->getAmount();
			endif;
		endforeach;
		return $amt;
	}
	

	public static function GetBankTotal($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'BANK');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		$tot = 0;
		foreach($rs as $r){
			$tot = $tot + $r->getAmount();
		}
		return ($tot);
	}

	public static function GetCashTotal($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		$tot = 0;
		foreach($rs as $r){
			$tot = $tot + $r->getAmount();
		}
		return ($tot);
	}
	
	public static function GetCashTotalByPeriodCodeByEmployee($period, $empno)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH');
		$c->add(self::EMPLOYEE_NO, $empno);
		//$c->add(self::ACCT_CODE, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$tot = 0;
		foreach($rs as $r){
			$tot = $tot + $r->getAmount();
		}
		return ($tot);
	}

	public static function GetChequeTotal($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CHEQUE');
		$c->addAscendingOrderByColumn(self::NAME);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		$rs = self::doSelect($c);
		$tot = 0;
		foreach($rs as $r){
			$tot = $tot + $r->getAmount();
		}
		return ($tot);
	}

	public static function GetPeriodList($cyear = null)
	{
		$c = new Criteria();
		if ($cyear): 
			$c->add(self::PERIOD_CODE, 'substr(period_code,1,4)= ' . $cyear, Criteria::CUSTOM  );
			//$c->add(self::PERIOD_CODE, "%ALL-SPECIAL%", Criteria::NOT_LIKE  );
		endif;
		
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		//$c->add(self::EMPLOYEE_NO, '&& || &&', Criteria::CUSTOM  );
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r)
		{
			$list[] = $r->getPeriodCode();
		}
		return $list;
		 
	}
	
	
	public static function GetPeriodListByEmployeeNo($empNo)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->addDescendingOrderByColumn(self::PERIOD_CODE);
		$c->addGroupByColumn(self::PERIOD_CODE);
		//$c->add(self::EMPLOYEE_NO, '&& || &&', Criteria::CUSTOM  );
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r)
		{
			$list[$r->getPeriodCode()] = self::HumanReadablePeriod($r->getPeriodCode());
		}
		return $list;
		 
	}
	
	public static function GetPeriodListManual($cyear = null)
	{
		$list =array();
		if ($cyear) :
			$list[] = $cyear.'0101-'.$cyear.'0131-ALL-MONTHLY';
			$list[] = $cyear.'0201-'.$cyear.'02'.DateUtils::DUFormat('t', $cyear.'-02-01').'-ALL-MONTHLY';
			$list[] = $cyear.'0301-'.$cyear.'0331-ALL-MONTHLY';
			$list[] = $cyear.'0401-'.$cyear.'0430-ALL-MONTHLY';
			$list[] = $cyear.'0501-'.$cyear.'0531-ALL-MONTHLY';
			$list[] = $cyear.'0601-'.$cyear.'0630-ALL-MONTHLY';
			$list[] = $cyear.'0701-'.$cyear.'0731-ALL-MONTHLY';
			$list[] = $cyear.'0801-'.$cyear.'0831-ALL-MONTHLY';
			$list[] = $cyear.'0901-'.$cyear.'0930-ALL-MONTHLY';
			$list[] = $cyear.'1001-'.$cyear.'1031-ALL-MONTHLY';
			$list[] = $cyear.'1101-'.$cyear.'1130-ALL-MONTHLY';
			$list[] = $cyear.'1201-'.$cyear.'1231-ALL-MONTHLY';
		endif;
		return $list; 
	}
		
	public static function GetTakeHomePay($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::CPF_TOTAL, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$pay = 0;
		foreach($rs as $r){
			$pay = $pay + $r->getAmount();
		}
		return ($pay);
	}
	
	public static function GetIncomeTaxIncome($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->add(self::INCOME_EXPENSE, 1);
		$c->add(self::INCOME_EXPENSE, '('.self::INCOME_EXPENSE.'= "1" or '.self::ACCT_CODE.' = "UL" or '.self::ACCT_CODE.' = "TD") ' , Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::NAME);
//		$c->add(self::BANK_CASH, 'BANK ("")', Criteria::CUSTOM);		
		$rs = self::doSelect($c);
		$pay = 0;
		foreach($rs as $r){
			$pay += $r->getAmount();
		}
		return ($pay);
	}	
	
	public static function GetIncomeTaxDeduction($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		//$c->add(self::INCOME_EXPENSE, 2);
		$c->add(self::INCOME_EXPENSE, '('.self::INCOME_EXPENSE.'<> "1" and ('.self::ACCT_CODE.' <> "UL" and '.self::ACCT_CODE.' <> "TD") ) ' , Criteria::CUSTOM);		
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::BANK_CASH, 'BANK ("")', Criteria::CUSTOM);	
		$rs = self::doSelect($c);
		$pay = 0;
		foreach($rs as $r){
			$pay = $pay + $r->getAmount();
		}
		return ($pay);
	}	

	public static function GetDataByEmployeePeriodAcct($empNo, $period, $acct)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::ACCT_CODE, $acct);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		$pay = 0;
		foreach($rs as $r){
			$pay = $pay + $r->getAmount();
		}
		return ($pay);
	}	

	public static function GetDataByEmpNoPeriodAcct($empNo, $period, $acct)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::ACCT_CODE, $acct);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return $rs;
		
	}
	
	public static function GetCpfDataByEmployee($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::ACCT_CODE, 'CPF' );
		$rs = self::doSelectOne($c);
		return $rs;
	}	
	
	public static function GetLatestEmployerShare($empno)
	{
		$pcode = self::GetLatestPeriodCode();
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::ACCT_CODE, 'CPF' );
		$rs = self::doSelectOne($c);
		return $rs? ($rs->getCpfEr() * -1) : 0;
	}	
	
	public static function GetCpfDataByEmployeeByPeriodList($empno, $periodList)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $periodList, Criteria::IN );
		$c->add(self::ACCT_CODE, 'CPF' );
		$rs = self::doSelectOne($c);
		return $rs? true : false;
	}
	
	public static function IsActive($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$rs = self::doSelectOne($c);
		return $rs;
	}

	public static function GetSmsMessage($period, $empNo, $bankCash = null, $depositDate = null)
	{
		//var_dump($bankCash);
		$depositDate = $depositDate? $depositDate : '';
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		if ($bankCash) $c->add(self::BANK_CASH, $bankCash);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		$mess = '';
		$pos = 0;
		$name = '';
		$bp = 0;
		$ot1 = 0;
		$ot2 = 0;
		$ot3 = 0;
		$inc = 0;
		$ded = 0;
		$ot = 0;
		$cpf = 0;
		$don = 0;
		$lv = 0;
		$meal = 0;
		$ml = 0; //monthly allowance
		$ul = 0;
		$mcb = 0;
		$sep = '\0x0A';

		//$sep = "<br>";
		foreach($rs as $r) {
			if (! $name) $name = $r->getName();
			switch ($r->getAcctCode())
			{
				case 'BP':
					$bp = $bp + $r->getAmount();
					break;
				case 'PI':
					$bp = $bp + $r->getAmount();
					break;
				case 'OT':
					$ot = $ot + $r->getAmount();
					break;
				case 'VA':
					$ot = $ot + $r->getAmount();
					break;
				case 'CPF':
					$cpf = $cpf + $r->getAmount();
					break;
				case 'SINDA':
					$don = $don + $r->getAmount();
					break;
				case 'CDAC':
					$don = $don + $r->getAmount();
					break;
				case 'MBMF':
					$don = $don + $r->getAmount();
					break;
				case 'UL':
					$ul = $ul + $r->getAmount();
					break;
				case 'LV':
					$lv = $lv + $r->getAmount();
					break;
				case 'MR':
					$meal = $meal + $r->getAmount();
					break;
				case 'ML':
					$ml = $ml + $r->getAmount();
					break;	
				case 'MCB':
					$mcb = $mcb + $r->getAmount();
					break;				
			}
			if ($r->getIncomeExpense() == 1) {
				$inc = $inc + $r->getAmount();
			}else{
				$ded = $ded + $r->getAmount();
			}
			$pos++;
		}
//		cpfGovtRulePeer::
//		var_dump($ul);
//		var_dump($ded);
// //		exit();
// 		var_dump($cpf);
// 		exit();
		if ($inc || $ded) :
		$net =  $inc + $ded;
		$sdt = self::GetStartDate($period);
		$edt = self::GetEndDate($period);
		$dtr = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $sdt, $edt);
		
		switch ($bankCash) {
			case 'BANK':
				//$mess = substr($name, 0, 15) . $sep;
				$mess = $mess . DateUtils::DUFormat('m/y', $sdt) ;
				if ( (  $r->getEmployeeNo() == 'S0808868C')
						|| ($r->getEmployeeNo() == 'S1050919Z')
						|| ($r->getEmployeeNo() == 'S7626368Z')
						|| ($r->getEmployeeNo() == 'S0252072I') ):
						$mess .= ' ['. $r->getName() .'] ';
				endif;
				$mess = $mess . $sep;
				$mess = $mess . 'Dep: ' . $depositDate . $sep;    //Deposit Date
//				var_dump($sdt);
//				echo 'test';
// 				var_dump($mess);
// 				exit();
				$mess = $mess . 'BGR: ' . $net . $sep;			   //BANK GIRO
				if ($ml)  $mess = $mess . 'All: ' . $ml . $sep;    //Allowance
				if ($mcb)  $mess = $mess . 'MCB: ' . $mcb . $sep;  //MC Benefit
				if ($cpf) $mess = $mess . 'Ee: ' . $cpf . $sep;    //CPF Employee Share
				if ($don) $mess = $mess . 'Don: ' . $don . $sep;   //Donation
				if ($ot)  $mess = $mess . 'VR: ' . $ot . $sep;     //OT or Variable Pay
				if ($ul):
					$mess = $mess . 'unPd: '. $ul .'/'. $dtr['unpaidleave'].'d' . $sep;  //unpaid Leave
					$mess = $mess . 'PdL: '. $dtr['paidleave'].'d' . $sep; //Paid Leave
				endif;
				if ($lv) $mess = $mess . 'Lvy: '. $lv . $sep;      //Levy
				break;
			case 'CASH-CHECK':
				//$mess = substr($name, 0, 15) . $sep;
				$mess = $mess . DateUtils::DUFormat('m/y', $sdt) ;
				if ( (  $r->getEmployeeNo() == 'S0808868C')
						|| ($r->getEmployeeNo() == 'S1050919Z')
						|| ($r->getEmployeeNo() == 'S7626368Z')
						|| ($r->getEmployeeNo() == 'S0252072I') ):
						$mess .= ' ['. $r->getEmployeeNo() .'] ';
				endif;
				$mess = $mess . $sep;
				$mess = $mess . 'Dep: ' . $depositDate . $sep;    //Deposit Date
				//				var_dump($sdt);
				//				echo 'test';
				// 				var_dump($mess);
				// 				exit();
				$mess = $mess . 'BGR: ' . $net . $sep;			   //BANK GIRO
				if ($ml)  $mess = $mess . 'All: ' . $ml . $sep;    //Allowance
				if ($mcb)  $mess = $mess . 'MCB: ' . $mcb . $sep;  //MC Benefit
				if ($cpf) $mess = $mess . 'Ee: ' . $cpf . $sep;    //CPF Employee Share
				if ($don) $mess = $mess . 'Don: ' . $don . $sep;   //Donation
				if ($ot)  $mess = $mess . 'VR: ' . $ot . $sep;     //OT or Variable Pay
				if ($ul):
				$mess = $mess . 'unPd: '. $ul .'/'. $dtr['unpaidleave'].'d' . $sep;  //unpaid Leave
				$mess = $mess . 'PdL: '. $dtr['paidleave'].'d' . $sep; //Paid Leave
				endif;
				if ($lv) $mess = $mess . 'Lvy: '. $lv . $sep;      //Levy
				break;
			case 'CASH':
				//$mess = substr($name, 0, 15) . $sep;
				$mess = $mess . DateUtils::DUFormat('m/y', $sdt) ;
				if ( (  $r->getEmployeeNo() == 'S0808868C')
						|| ($r->getEmployeeNo() == 'S1050919Z')
						|| ($r->getEmployeeNo() == 'S7626368Z')
						|| ($r->getEmployeeNo() == 'S0252072I') ):
						$mess .= ' ['. $r->getEmployeeNo() .'] ';
				endif;
				$mess = $mess . $sep;
				$mess = $mess . 'CSH: ' . $net . $sep;
				if ($ml)  $mess = $mess . 'All: ' . $ml . $sep;
				if ($mcb)  $mess = $mess . 'MCB: ' . $mcb . $sep;
				if ($meal) $mess = $mess . 'Eat: ' . $meal . $sep;
				if ($cpf) $mess = $mess . 'Ee: ' . $cpf . $sep;
				if ($don) $mess = $mess . 'Don ' . $don . $sep;
				if ($ot):
					$mess = $mess . 'VR1: '. $dtr['ot1']. 'h = '. round($dtr['ot1amt'], 2) . $sep;
					$mess = $mess . 'VR2: '. $dtr['ot2']. 'h = '. round($dtr['ot2amt'], 2) . $sep;
					$mess = $mess . 'VR3: '. $dtr['ot3']. 'h = '. round($dtr['ot3amt'], 2) . $sep;
				endif;
				if ($ul):
					$mess = $mess . 'unPd: '. $ul .'/'. $dtr['unpaidleave'].'d' . $sep;
					$mess = $mess . 'PdL: '. $dtr['paidleave'].'d' . $sep;
				endif;
				if ($lv) $mess = $mess . 'Lvy: '. $lv . $sep;
				break;
			case 'CHEQUE':
				//$mess = substr($name, 0, 15) . $sep;
				$mess = $mess . DateUtils::DUFormat('m/y', $sdt) ;
				if ( (  $r->getEmployeeNo() == 'S0808868C')
						|| ($r->getEmployeeNo() == 'S1050919Z')
						|| ($r->getEmployeeNo() == 'S7626368Z')
						|| ($r->getEmployeeNo() == 'S0252072I') ):
						$mess .= ' ['. $r->getEmployeeNo() .'] ';
				endif;
				$mess = $mess . $sep;
				$mess = $mess . 'CHECK: ' . $net . $sep;
				if ($ml)  $mess = $mess . 'All: ' . $ml . $sep;
				if ($mcb)  $mess = $mess . 'MCB: ' . $mcb . $sep;
				if ($cpf) $mess = $mess . 'Ee: ' . $cpf . $sep;
				if ($don) $mess = $mess . 'Don: ' . $don . $sep;
				if ($ot)  $mess = $mess . 'VR: ' . $ot . $sep;
				if ($ul):
					$mess = $mess . 'unPd: '. $ul .'/'. $dtr['unpaidleave'].'d' . $sep;
					$mess = $mess . 'Pd Leave: '. $dtr['paidleave'].'d' . $sep;
				endif;
				if ($lv) $mess = $mess . 'Levy: '. $lv . $sep;
				break;				
			default:
				break;
		}
		endif;		
//		var_dump($mess);
//		exit();
		return $mess;
	}
	
	public static function GetStartDate($pcode)
	{
		$dt = substr($pcode, 0, 8);
		//return DateUtils::DUFormat('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
		return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
	}

	public static function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
	}

	//---------------------------- reports
	public static function GetTotalIncomeforCPFDeductable($empNo, $period)
	{
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->add(self::ACCT_CODE, array('CBS'), Criteria::NOT_IN);
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
		//var_dump($amt);
		return $amt;
	}
	
	public static function GetTotalDeductionforCPFDeductable($empNo, $period)
	{
//				echo 'here';
//		exit();
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		//$c->add(self::ACCT_CODE, array('UL', 'TD'), Criteria::IN);
		$c->add(self::INCOME_EXPENSE, 2);
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r)
		{
			$acct = $r->getAcctCode();
			//echo $acct . '<br>';
			if ($acct == 'UL' || $acct == 'TD'): 
				$amt = $amt + $r->getAmount();
			endif;
		}
		return $amt;
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
	
	public static function GetEmployeeListwithCpfByPeriod($period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::ACCT_CODE, 'CPF');
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		return $rs;
	}

	public static function GetIDByEmpNoPeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelectOne($c);
		return $rs? $rs->getId() : '';
	}

	public static function GetIDByPeriodCode($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelectOne($c);
		return $rs? $rs->getId() : '';
	}	
	
	public static function GetDataByPeriodCode($pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$rs = self::doSelect($c);
		return $rs;
	}	
	
	public static function GetDataByEmployeePeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::EMPLOYEE_NO, $empno );
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function DeleteDataByEmployeePeriodCode($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$rs = self::doDelete($c);
		return $rs;
	}
	
	public static function GetDataByPeriodCodeByMomGroupRankCode($pcode, $momGroup, $rankCode = null)
	{
		$isCpf = true;
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addJoin(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
		if($rankCode) $c->add(HrEmployeePeer::RANK_CODE, $rankCode, Criteria::IN);
		if($momGroup <> 'ALL') $c->add(HrEmployeePeer::MOM_GROUP, $momGroup);
		//$c->add(self::NAME, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}

	public static function GetDataByPeriodCodeByCompanyByPass($pcode, $co, $pass = null)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode );
// 		var_dump($co);
// 		exit();
		if ($co <> 'ALL COMPANY') $c->add(self::COMPANY, $co );
		if ($pass <> '') :
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::RANK_CODE, $pass);
		endif;
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetYearlyMasterList($year)
    {
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, 'substr('.self::PERIOD_CODE.', 1, 4) = "'.$year.'"', Criteria::CUSTOM);
    	$c->addGroupByColumn(self::NAME);
    	$c->addAscendingOrderByColumn(self::NAME);
    	$rs = self::doSelect($c);
    	return $rs;
    		
    }

    public static function GetTotalAmountByPeriodByCode($co, $period, $acct, $pass, $min, $max)
    {
    	$c  = new Criteria();
    	$c->add(self::PERIOD_CODE, $period);
    	$c->add(self::ACCT_CODE, $acct);
    	if ($co <> 'ALL COMPANY') $c->add(self::COMPANY, $co );
    	$c1 = $c->getNewCriterion(self::AMOUNT, $min, Criteria::GREATER_EQUAL);
    	$c2 = $c->getNewCriterion(self::AMOUNT, $max, Criteria::LESS_EQUAL);
    	$c1->addAnd($c2);
    	$c->addAnd($c1);
    	if ($pass <> '') :
	    	$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
	    	$c->add(HrEmployeePeer::RANK_CODE, $pass, Criteria::IN);
    	endif;
    	$c->addAscendingOrderByColumn(self::NAME);
    	$c->add(self::INCOME_EXPENSE, 1);
    	//$c->add(self::INCOME_EXPENSE, '&& || &&', Criteria::CUSTOM);
    	$rs = self::doSelect($c);
    	$amt = 0;
    	$list = array();
    	foreach ($rs as $r)
    	{
    		$amt = 0;
    		if ($acct == 'OT'):
	    		if ($r->getAcctCode() == 'OT' || $r->getAcctCode() == 'HA')
	    		{
	    			$amt = $amt + $r->getAmount();
	    		}
    		else
    			if ($r->getAcctCode() == $acct)
    			{
    				$amt = $amt + $r->getAmount();
    			}
    		endif;
    		$list[$r->getEmployeeNo()] = $amt;
    			//    		$amt = $amt + $r->getAmount();
    	}
    	return $list;
    }
    
    public static function GetTotalAmountByEmployeeByPeriodByCode($empNo, $period, $acct, $min, $max)
    {
    	$c  = new Criteria();
    	$c->add(self::EMPLOYEE_NO, $empNo);
    	$c->add(self::PERIOD_CODE, $period);
//    	$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
    	$c->add(self::ACCT_CODE, $acct);
//     	$c->add(self::AMOUNT, $min, Criteria::GREATER_EQUAL);
//     	$c->add(self::AMOUNT, $max, Criteria::LESS_EQUAL);
    	$c1 = $c->getNewCriterion(self::AMOUNT, $min, Criteria::GREATER_EQUAL);
    	$c2 = $c->getNewCriterion(self::AMOUNT, $max, Criteria::LESS_EQUAL);
    	$c1->addAnd($c2);
    	$c->addAnd($c1);
    	//$c->add(self::INCOME_EXPENSE, '&& || &&', Criteria::CUSTOM);
    	$c->add(self::INCOME_EXPENSE, 1);
    	$rs = self::doSelect($c);
    	$amt = 0;
    	$list = array();
    	foreach ($rs as $r)
    	{
    		if ($acct == 'OT'):
	    		if ($r->getAcctCode() == 'OT' || $r->getAcctCode() == 'HA')
	    		{
	    			$amt = $amt + $r->getAmount();
	    		}
    		else 
	    		if ($r->getAcctCode() == $acct)
	    		{
	    			$amt = $amt + $r->getAmount();
	    		}
    		endif;
    		$list[$r->getEmployeeNo()] = $amt;
//    		$amt = $amt + $r->getAmount();
    	}
    	return $list;
    }

//	public static function GetYearlyDataByEmployeeNoPeriodList($empNo, $periodList)
//	{
//		//sum( IF(acct_code='CBS', amount, 0) )
//		
//		$c = new Criteria();
//		$c->clearSelectColumns();
//		$c->addSelectColumn(self::EMPLOYEE_NO);
//		$c->addSelectColumn(self::NAME);
//		$c->addSelectColumn(self::COMPANY);
//		$c->addSelectColumn('SUM(' . self::GROSS_INC . ') AS INCOME');
//		$c->addSelectColumn('SUM(' . self::MBF . ') AS MBF');
//		$c->addSelectColumn('SUM(' . self::DONATION. ') AS DONATION');
//		$c->addSelectColumn('SUM(' . self::CPF. ') AS CPF');
//		$c->addSelectColumn('SUM(' . self::INSURANCE. ') AS INSURANCE');
//		$c->addSelectColumn('SUM(' . self::SALARY. ') AS SALARY');
//		$c->addSelectColumn('SUM(' . self::BONUS. ') AS BONUS');
//		$c->addSelectColumn('SUM(' . self::DIRECTORS_FEE. ') AS DIRECTORS_FEE');
//		$c->addSelectColumn('SUM(' . self::OTHER_FEE. ') AS OTHER_FEE');
//		$c->addSelectColumn('SUM(' . self::COMMISSION. ') AS COMMISSION');
//		$c->addSelectColumn('SUM(' . self::TRANSPORT_ALLOWANCE. ') AS TRANSPORT_ALLOWANCE');
//		$c->addSelectColumn('SUM(' . self::ENTERTAINMENT. ') AS ENTERTAINMENT');
//		$c->addSelectColumn('SUM(' . self::OTHER_ALLOWANCE. ') AS OTHER_ALLOWANCE');
//		$c->addSelectColumn('SUM(' . self::CPF_EM. ') AS CPF_EM');
//		$c->addSelectColumn('SUM(' . self::CPF_ER. ') AS CPF_ER');
//		$c->add(self::EMPLOYEE_NO, $empNo);
//		$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
//		//$c->add(self::COMPANY, 'period <> 0', Criteria::CUSTOM);
//		$c->addGroupByColumn(self::EMPLOYEE_NO);
//		$rs = self::doSelectRS($c);
//		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
//		while ($rs->next())
//		{
//			return $rs;	
//		}
//		
//	}    

    public static function GetPeriodListByDateRange($sdt, $edt)
    {
    	$months = array();
    	$dDiff = DateUtils::DateDiff('d', $sdt, $edt);
    	for($x=0; $x<= $dDiff; $x++):
    		$months[] = DateUtils::DUFormat('Y-m-01', DateUtils::AddDate($sdt, $x) );
    	endfor;
    	$months = array_unique($months);
    	$periodList = array();
    	foreach($months as $month):
    		$periodList[] = DateUtils::DUFormat('Ym01', $month) .'-'. DateUtils::DUFormat('Ymt', $month) . '-ALL-MONTHLY'; 
    	endforeach;
    	//var_dump($periodList);
    	return $periodList;
    }
    
    public static function SurveyCPFOneYearAndAboveNoParttime($sdate, $edate)
    {
    	$empList = HrEmployeePeer::GetEmployeeNoWithCPFOneYearAndAboveNoParttime($sdate);
    	$periodList = self::GetPeriodListByDateRange($sdate, $edate);
    	$cdt = DateUtils::DUFormat('Ymd', $sdate);
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
    	$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
    	$c->addGroupByColumn(self::NAME);
    	$c->addAscendingOrderByColumn(self::NAME);
    	$c->add(self::NAME, $empList, Criteria::IN);
    	//$c->add(self::INCOME_EXPENSE, '&& || &&', Criteria::CUSTOM);
    	$rs = self::doSelect($c);
    	$list = array();
    	foreach($rs as $r):
    		$list[] = $r->getName();
    	endforeach;
    	return $list;
    }	
    
	public static function SurveyPaidEmployee($sdate, $edate)
    {
    	$periodList = self::GetPeriodListByDateRange($sdate, $edate);
    	$cdt = DateUtils::DUFormat('Ymd', $sdate);
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
    	$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
    	$c->addGroupByColumn(self::NAME);
    	$c->addAscendingOrderByColumn(self::NAME);
    	//$c->add(self::INCOME_EXPENSE, '&& || &&', Criteria::CUSTOM);
    	$rs = self::doSelect($c);
    	$total =1;
    	$paidforiegn = 0;
		$paidsPR = 0;    	
		$profPR = 0;
		$profSingaporean = 0;
		$clerkPR =0;
		$clerkSingaporean = 0;
		$prodPR = 0;
		$prodSingaporean = 0;
    	$proForiegnTot = 0;
    	$cleForiegnTot = 0;
    	$traForiegnTot = 0;

    	$proSprTot = 0;
    	$cleSprTot = 0;
    	$traSprTot = 0;
    	    	
    	$partTime = 0;
    	$fullTime = 0;
    	$hasCpf = 0;
    	$cpfcounter = 1;
    	$res = array();  
    	$sprName = array(
    			  'singaporean_professional'=>array()
    			, 'pr_professional'=>array()
    			, 'pr_clerk'=>array()
    			, 's_clerk'=>array()
    			, 'pr_prod'=>array()
    			, 's_prod'=>array()
    			, 'singaporean'=>array()
    			, 'pr'=>array()
    			, 'for' => array()
    			, 'for_professional'=>array()
    			, 'for_clerk'=>array()
    			, 'for_prod'=>array()
    			);
    	foreach($rs as $r):
    		//--------------- process for foreign
    		$employee = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($r->getEmployeeNo(), array('profession', 'commence_date', 'date_resigned', 'type_of_employment', 'name'));
    		$basic = self::GetBasicByEmpNoPeriodCode($r->getEmployeeNo(), $periodList[0]);
    		if (!$employee):
    			$employee = HrEmployeePeer::GetOptimizedDatabyName($r->getName(), array('profession', 'commence_date', 'date_resigned', 'type_of_employment', 'name') );
    		endif;
    		//$isPR = PayBasicPayPeer::GetCpfCitizenshipbyEmployeeNo($r->getEmployeeNo());
    		$isPR = HrEmployeeIcPeer::GetPassTypeByEmployeeNo($r->getEmployeeNo());
			if (strtoupper(substr($r->getEmployeeNo(), 0, 1)) <> 'S') :
				if (PayEmployeeLevyPeer::CheckEmployeePeriod($r->getEmployeeNo(), $r->getPeriodCode()) || $r->getEmployeeNo() == 'G1135672P050115SVP'):
					$paidforiegn = $paidforiegn + 1;
					if (self::isProfessional($employee->get('PROFESSION'))):
						$sprName['for_professional'][] = $r->getName();
						$sprName['for'][] = $r->getName();
						$proForiegnTot ++;
					endif;
					if (self::isClerk($employee->get('PROFESSION'))):
						$sprName['for_clerk'][] = $r->getName();
						$sprName['for'][] = $r->getName();
						$cleForiegnTot ++;
					endif;

					//echo $cpfcounter++.'. '.$r->getName() . ' : ' . $employee->get('PROFESSION').' || '.$employee->get('TYPE_OF_EMPLOYMENT'). ' <br>';
						
					if (self::isProduction($employee->get('PROFESSION'))):
						$sprName['for_prod'][] = $r->getName();
						$sprName['for'][] = $r->getName();
						//echo $total++ . ' : ' . $r->getEmployeeNo() .' : '.$r->getName() .' [ ' . $employee->get('PROFESSION') . ']<Br>';
						$traForiegnTot ++;
					endif; 
					if (strtoupper($employee->get('TYPE_OF_EMPLOYMENT')) == 'PART-TIME'):				
						$partTime ++;
						$sprName['parttime'][] = $employee->get('NAME');					else:				
						$fullTime ++;
						$sprName['fulltime'][] = $employee->get('NAME');
					endif;
				endif;
			endif;
			//kebot
			$hasCpf = self::GetCpfDataByEmployeeByPeriodList($r->getEmployeeNo(), $periodList);
			
			if ($hasCpf):
				$paidsPR = $paidsPR + 1;
				switch(trim($employee->get('PROFESSION'))):
    				case 'Professional, Managers, Executives, Technician':
						$proSprTot +=  1;
						if ($isPR ):
							$profPR += 1;
							$sprName['pr_professional'][] = $r->getName();
							$sprName['pr'][] = $r->getName();
						else:
							$profSingaporean += 1;
							$sprName['singaporean_professional'][] = $r->getName();
							$sprName['singaporean'][] = $r->getName();
						endif;
						//echo $cpfcounter++.'. '.$r->getName() . ' : ' . $employee->get('PROFESSION').' || '.$employee->get('TYPE_OF_EMPLOYMENT'). ' <br>';
						
						break;
					case 'Clerical, Sales, Service Worker':
						$cleSprTot +=  1;
						if ($isPR ):
							$clerkPR += 1;
							$sprName['pr_clerk'][] = $r->getName();
							$sprName['pr'][] = $r->getName();
						else:
							$clerkSingaporean += 1;
							$sprName['singaporean_clerk'][] = $r->getName();
							$sprName['singaporean'][] = $r->getName();
						endif;
						//echo $cpfcounter++.'. '.$r->getName() . ' : ' . $employee->get('PROFESSION').' || '.$employee->get('TYPE_OF_EMPLOYMENT'). ' <br>';
						
						break;
					default:
						$traSprTot +=  1;
						if ($isPR):
							$prodPR += 1;
							$sprName['pr_prod'][] = $r->getName();
							$sprName['pr'][] = $r->getName();
						else:
							$prodSingaporean += 1;
							$sprName['s_prod'][] = $r->getName();
							$sprName['singaporean'][] = $r->getName();
						endif;
						
						break;
    			endswitch;
	    		if (strtoupper($employee->get('TYPE_OF_EMPLOYMENT')) == 'PART-TIME'):				
					$partTime ++;
					$sprName['parttime'][] = $employee->get('NAME');
				else:				
					$fullTime ++;
					$sprName['fulltime'][] = $employee->get('NAME');
					//echo $cpfcounter++.'. '.$r->getName() . ' : ' . $employee->get('PROFESSION').' || '.$employee->get('TYPE_OF_EMPLOYMENT'). ' <br>';
				endif;
			endif;
			


    	endforeach;
//    	var_dump($sprName);
//    	exit();
    	
    	$res['total_foreign'] = $paidforiegn;
    	$res['total_spr'] = $paidsPR;
    	
    	$res['total_foreign_profession'] = $proForiegnTot;
    	$res['total_foreign_clerk'] = $cleForiegnTot;
    	$res['total_foreign_production'] = $traForiegnTot;
    	
	   	$res['total_spr_profession'] = $proSprTot;
    	$res['total_spr_clerk'] = $cleSprTot;
    	$res['total_spr_production'] = $traSprTot;
    	
    	$res['total_parttime'] = $partTime;
    	$res['total_fulltime'] = $fullTime;
    	
    	$res['total_singaporean_profession'] = $profSingaporean;
    	$res['total_singaporean_clerk'] = $clerkSingaporean;
    	$res['total_singaporean_production'] = $prodSingaporean;	
    	$res['total_singaporean'] = $prodSingaporean + $clerkSingaporean + $profSingaporean;
    	
    	$res['total_pr_profession'] = $profPR;
    	$res['total_pr_clerk'] = $clerkPR;
    	$res['total_pr_production'] = $prodPR;
    	$res['total_pr'] = $prodPR + $clerkPR + $profPR;
    	
    	$res['senior_management_with_cpf'] = $sprName['singaporean_professional'];
//    	$res['junior_management_with_cpf'] = $sprName['pr_professional'];
    	$res['junior_management_with_cpf'] = HrEmployeeIcPeer::GetJuniorManager(); //$sprName['pr_professional'];
    	$res['rank_and_file_with_cpf'] = array_merge($sprName['pr_clerk'], $sprName['pr_prod'], $sprName['singaporean_clerk'], $sprName['s_prod']);
    	
    	$seniorJrMgt = array_merge($res['senior_management_with_cpf'], $res['junior_management_with_cpf'] );
    	$rankNFile = self::SurveyCPFOneYearAndAboveNoParttime($sdate, $edate);
    	$res['rank_and_file_no_parttime'] = array_diff($rankNFile, $seniorJrMgt);
//    	var_dump($seniorJrMgt);
//    	echo '<br>';
//    	var_dump($res['rank_and_file_no_parttime']);
//    	exit(); 
//    	
    	$res['senior_management_without_cpf'] = array();
    	$res['junior_management_without_cpf'] = $sprName['for_professional'];
    	$res['rank_and_file_without_cpf'] = array_merge($sprName['for_clerk'], $sprName['for_prod']);
    	
    	$res['list'] = $sprName;
    	
    	//var_dump($res['list']);
    	return $res;
    		
    }

	public static function SurveyOvertime($sdate, $edate)
    {
    	$periodList = self::GetPeriodListByDateRange($sdate, $edate);
    	$empList = array();
		$cnt =1;
    	$c = new Criteria();
    	$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
    	$c->add(self::ACCT_CODE, 'OT');
    	$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_LIKE);
    	$c->addAscendingOrderByColumn(self::NAME);
    	//$c->addGroupByColumn(self::NAME);
    	//$c->add(self::ACCT_SOURCE, '&& ||', Criteria::CUSTOM);
    	$rs = self::doSelect($c);
    	$fulltimeOt = 0;
    	$parttimeOt = 0;
    	$fulltimeOtHrs = 0;
    	$parttimeOtHrs = 0;
    	$parttimeOtPaid = 0;
    	$fulltimeOtPaid = 0;
    	$employeeListFulltime = array();
    	$employeeListParttime = array();
    	$ot = array();
    	$parttimeExtraOt = 0;
    	$parttimeExtraOtPay = 0;
    	$fulltimeExtraOt = 0;
    	$fulltimeExtraOtPay = 0;
    	foreach($rs as $r):
    		$empList[] = $r->getEmployeeNo();
    		$employee = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($r->getEmployeeNo(), array('profession', 'commence_date', 'date_resigned', 'type_of_employment'));
    		if (!$employee):
    			$employee = HrEmployeePeer::GetOptimizedDatabyName($r->getName(), array('profession', 'commence_date', 'date_resigned', 'type_of_employment') );
    		endif;
    		$sdt = DateUtils::DUFormat('Y-m-01', $sdate);
    		$edt = DateUtils::DUFormat('Y-m-t', $sdate);
			$timekepr = TkDtrsummaryPeer::GetDurationByEmployeeNoDateRange($r->getEmployeeNo(), $sdt, $edt );
			//echo $cnt++ .' : '.$r->getName(). ' - ' . $employee->get('TYPE_OF_EMPLOYMENT') . ' - ' .$timekepr['ot'] .' - '.$r->getPeriodCode().'<br>';
			if (strtoupper($employee->get('TYPE_OF_EMPLOYMENT')) == 'PART-TIME'):
				$parttimeOt ++;
				$parttimeOtHrs = $parttimeOtHrs + $timekepr['ot'];
				$parttimeOtPaid += $r->getAmount();
				$employeeListParttime[] = $r->getEmployeeNo();
				$parttimeExtraOt += $timekepr['extraOt'];
				$parttimeExtraOtPay += $timekepr['extraOtPay'];
			else:
				$fulltimeOt ++;
				$fulltimeOtHrs   += $timekepr['ot'];
				$fulltimeOtPaid  += $r->getAmount();
				$employeeListFulltime[] = $r->getEmployeeNo();
				$fulltimeExtraOt += $timekepr['extraOt'];
				$fulltimeExtraOtPay = $timekepr['extraOtPay'];
				//echo $r->getName() . ' : ' . $timekepr['ot'] . ' : ' . $timekepr['extraOt'] . '<br>';
			endif;
    	endforeach;
    	//echo $fulltimeOtHrs . ' : ' . $fulltimeExtraOt . '<br>';
    	$ot['employee_list_fulltime'] = array_unique($employeeListFulltime);
    	$ot['employee_list_parttime'] = array_unique($employeeListParttime);
    	$ot['parttime_ot'] = $parttimeOt;
    	$ot['fulltime_ot'] = $fulltimeOt;
    	$ot['parttime_ot_hrs'] = $parttimeOtHrs;
    	$ot['fulltime_ot_hrs'] = $fulltimeOtHrs;
    	$ot['parttime_ot_paid'] = $parttimeOtPaid;
    	$ot['fulltime_ot_paid'] = $fulltimeOtPaid;
    	$ot['fulltime_allowed_ot_hrs'] =  $fulltimeOtHrs  - $fulltimeExtraOt;
    	$ot['parttime_allowed_ot_hrs'] =  $parttimeOtHrs  - $parttimeExtraOt;
    	$ot['fulltime_allowed_ot_pay'] =  $fulltimeExtraOtPay;
    	$ot['parttime_allowed_ot_pay'] =  $parttimeExtraOtPay;
    	return $ot;
    }    
    
    public static function chkIfSameMonth($sdate, $edate, $givenDate)
    {
    	$flag = false;
    	if ($givenDate >= $sdate && $givenDate <= $edate) :
    		$flag = true;
    	endif;
    	return $flag;
    }
    
    public static function isProfessional($prof)
    {    
    	$chk = false;
    	if (trim($prof) == 'Professional, Managers, Executives, Technician'):
    		$chk = true;
    	endif;
    	return $chk;
    }
    
    public static function isClerk($prof)
    {    
    	$chk = false;
    	if (trim($prof) == 'Clerical, Sales, Service Worker'):
    		$chk = true;
    	endif;
    	return $chk;
    }
    
    public static function isProduction($prof)
    {    
    	$chk = false;
    	if (trim($prof) == 'Production, Transport, Tradesman, Cleaners, Labourers'):
    		$chk = true;
    	endif;
    	return $chk;
    }

	public static function MarkPrinted($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$rs = self::doSelect($c);
		foreach($rs as $r):
			$r->setIsPayslipPrinted('Y');
			$r->save();
			//echo $r->getName(). ' '.$r->getAcctCode() . ' ' . $r->getIsPaySlipPrinted() .' : '. $r->getPeriodCode() . '<br>';
		endforeach;
		return;
	}
	    
	public static function GetEmployeeWithCpf($period, $co = null)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::ACCT_CODE, 'cpf');
		$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
		//$c->addAscendingOrderByColumn(HrEmployeePeer::COMMENCE_DATE);
		if ($co) $c->add(self::COMPANY, $co);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[] = $r->getEmployeeNo();
		endforeach;
		return ($list);
	}

	
	public static function GetForiegnWorkers($period)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::ACCT_CODE, 'upper(substr('.self::EMPLOYEE_NO.', 1, 1)) <> "S" ', Criteria::CUSTOM);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[] = $r->getEmployeeNo();
		endforeach;
		return ($list);
	}
	
	public static function GetGrossIncomeForQouta($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			$amt = $amt + $r->getAmount();
		}
		return $amt;
	}
	
	public static function GetBasePayrollforQouta()
	{
		$cdt = Date('Y-m-d');
		$ext = '-ALL-MONTHLY';
		$baseMonth1 = substr($cdt, 0, 5) . str_pad(intval(DateUtils::DUFormat('m', $cdt)) - 2, 2,  "0", STR_PAD_LEFT)  . '-01';
		$baseMonth2 = substr($cdt, 0, 5) . str_pad(intval(DateUtils::DUFormat('m', $cdt)) - 3, 2,  "0", STR_PAD_LEFT)  . '-01';
		$baseMonth3 = substr($cdt, 0, 5) . str_pad(intval(DateUtils::DUFormat('m', $cdt)) - 4, 2,  "0", STR_PAD_LEFT)  . '-01';
		$periods = array(DateUtils::DUFormat('Ymd',$baseMonth1 ) .'-'.DateUtils::DUFormat('Ymt',$baseMonth1 ).$ext 
				       , DateUtils::DUFormat('Ymd',$baseMonth2 ) .'-'.DateUtils::DUFormat('Ymt',$baseMonth2 ).$ext
				       , DateUtils::DUFormat('Ymd',$baseMonth3 ) .'-'.DateUtils::DUFormat('Ymt',$baseMonth3 ).$ext );
		return $periods;
	}
	
	public static function GetFulltimeLocalEmployeesCountForQouta($sector)
	{
		$periods = self::GetLast3PeriodCode();
//		var_dump($periods);
//		exit();
		$employeeDetails = array('name'=>array(), 'company'=>array(), 'sector'=>array(), 'employment'=>array(), 'epass'=>array(),'income'=>array() );
		$totalSpr = 0;
		$fspr = 0;
		$pspr = 0;
		$income = 0;
		$local = array('fulltime'=>0 ,'parttime'=>0, 'proof'=>'');
		$part = array();
		$full = array();
		$names = array();
		$mfg = 0;
		$svs = 0;
		$seq = 0;
		foreach ($periods as $pcode):
			$empList = self::GetEmployeeWithCpf($pcode);
			foreach($empList as $emp):
				$momGroup = HrEmployeePeer::GetDatabyEmployeeNo($emp);
				if ($momGroup->getMomGroup() == 'T.C. Khoo Mfg' ) $mfg += 1; 
				if ($momGroup->getMomGroup() == 'T.C. Khoo Svs' ) $svs += 1;
				if ($sector ==  $momGroup->getMomGroup() ):
					$income = self::GetGrossIncomeForQouta($emp, $pcode);
					if ($income >= 1000) :
						$fspr += 1;
						$names['fulltime'][$emp]  = $momGroup->getName();
						$employeeDetails['name'][$emp] = $momGroup->getName();
						$employeeDetails['company'][$emp] = $momGroup->getHrCompanyId();
						$employeeDetails['sector'][$emp] = $momGroup->getMomGroup();
						$employeeDetails['employment'][$emp] = 'FULLTIME';
						$employeeDetails['epass'][$emp] = $momGroup->getRankCode();
					endif;
					if ($income < 1000 )://($income >= 0 && $income <= 500):
						 $pspr += .5;
						 $names['parttime'][$emp]  = $momGroup->getName();
						 $employeeDetails['name'][$emp] = $momGroup->getName();
						 $employeeDetails['company'][$emp] = $momGroup->getHrCompanyId();
						 $employeeDetails['sector'][$emp] = $momGroup->getMomGroup();
						 $employeeDetails['employment'][$emp] = 'PARTTIME';		
						 $employeeDetails['epass'][$emp] = $momGroup->getRankCode();
					endif;
				endif;
			endforeach;
		endforeach;
		$local['fulltime'] = intval(sizeOf($names['fulltime'])); 
		$local['parttime'] = intval(sizeOf($names['parttime']) / 2); 
		$local['proof'] = $employeeDetails;
		return $local;
	}
	
	public static function GetForeignWorkerCountForQouta($sector)
	{
		$periods = self::GetLast3PeriodCode();
		$pass = '';
		$passes = array('spass'=>0, 'epass'=>0, 'prc'=>0, 'wp'=>0, 'others'=>array());
		$others = array();
		$spass = 0;
		$epass = 0;
		$prc   = 0;
		$wp    = 0;
		$total = 0;
		$spassTier1 = 0;
		$spassTier2 = 0;
		$rpassTier1 = 0;
		$rpassTier2 = 0;
		$rpassTier3 = 0;
		$employeeDetails = array('name'=>array(), 'company'=>array(), 'sector'=>array(), 'employment'=>array(), 'epass'=>array(),'income'=>array() );
		foreach ($periods as $pcode):
			$empList = self::GetForiegnWorkers($pcode);
			foreach($empList as $emp):
				$empData = HrEmployeePeer::GetDatabyEmployeeNo($emp);
				//echo $empData->getName() . ' ' . $empData->getMomGroup() . ' ' . $empData->getRankCode() .'<br>';
				if ($empData):
					if ($sector ==  $empData->getMomGroup() ):
						$employeeDetails['name'][$emp] = $empData->getName();
						$employeeDetails['company'][$emp] = $empData->getHrCompanyId();
						$employeeDetails['sector'][$emp] = $empData->getMomGroup();
						$employeeDetails['employment'][$emp] = 'FULLTIME';
						$employeeDetails['epass'][$emp] = $empData->getRankCode();
						$employeeDetails['levy_tier'][$emp] = $empData->getLevyTier();
						$pass = $empData->getRankCode();
						
						if ($empData->getRankCode() == ''  ) :
							$others[$emp] = $empData->getName();
						endif;
						
// 						switch($empData->getLevyTier()):
// 							case 'SPASS':
// 								$empData->getLevyTier();
// 								break;
// 							default:
// 								//$others[$emp] = 'unknown pass';
// 								$others[$emp] = $empData->getName();
// 						endswitch;
						$total += 1;
						//echo $total . ' ' . $empData->getName() . '<br>';
					endif;
				endif; //empdata
			endforeach;
		endforeach;
// 		var_dump($others);
// 		exit();
		$passes = array_count_values($employeeDetails['epass']);
//		$passes['levy_tier'] = array_count_values($employeeDetails['levy_tier']);
		$passes['others'] = $others;
		$passes['total'] = sizeOf($employeeDetails['name']);
 		$passes['proof'] = $employeeDetails;
// 				var_dump($passes['levy_tier']);
// 				exit();
		return $passes;
	}	
	
//	public static function GetFulltimeLocalEmployeesCountForQouta()
//	{
//		$periods = array('20121001-20121031-ALL-MONTHLY');
//		$totalSpr = 0;
//		$fspr = 0;
//		$pspr = 0;
//		$income = 0;
//		$local = array('fulltime'=>0 ,'parttime'=>0);
//		foreach ($period as $pcode):
//			$empList = self::GetEmployeeWithCpf($pcode);
//			foreach($empList as $emp):
//				$income = self::GetGrossIncomeForQouta($emp, $pcode);
//				if ($income >= 850) $fspr += 1;
//				if ($income >= 425 && $income <= 849.99) $pspr += .5;
//			endforeach;
//		endforeach;
//		$local['fulltime'] = $fspr; 
//		$local['parttime'] = $pspr; 
//		return $local;
//	}
	
	public static function HumanReadablePeriod($period)
	{
		$sdt = self::GetStartDate($period);
		return DateUtils::DUFormat('M-Y', $sdt);
	}
	
	public static function GetBankAndCashIncome($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		//$c->add(self::INCOME_EXPENSE, '1' );
		$rs = self::doSelect($c);
		$amt = 0;
		$bank = 0;
		$cash = 0;
		$cpf = 0;
		$cpfEr = 0;
		foreach ($rs as $r) {
			$amt = $r->getAmount();

			if ($r->getAcctCode() == 'CPF'):
				$cpf = $amt * -1;
				$cpfEr = $r->getCpfEr() * -1;
			endif;
			
			if ($r->getIncomeExpense() == '1'):
				if ($r->getAcctCode() == 'CBS'):
					$amt = 0;
				endif;
				if ($r->getBankCash() == 'CASH'):
					$cash = $cash + $amt;
				else:
					$bank = $bank + $amt;
				endif;
			endif;
		}
		return array('bank'=>$bank, 'cash'=>$cash, 'cpf'=>$cpf, 'cpf_er'=>$cpfEr);
	}
	
	//****************************************************** Used by this module
	// http://orion.micronclean/hr2/account/reports/ballastSearch
	public static function GetSalaryRecordForNanoStartingFrom($sdt)
	{
		$edt = Date('Y-m-t');
		$periodList = self::GetPeriodListByDateRange($sdt, $edt);
		$addedtoEmpList = array(
				 'S1267682D' //david
				,'S2198564C' //moses
				,'S1236996D' //khong weng kee
				,'S1246891A' //patrick
				,'S8609233F' //wilson
				,'033781245160412'  //pari
				,'S1575492C' //lim chuan huat
				,'S8019101D' //faizal
				);
		foreach($periodList as $period):
			$empList = self::GetEmployeeNoListbyCompany($period, 'NanoClean');
			$empList = array_merge($empList, $addedtoEmpList);
			$empList = array_unique($empList);
			$empIncome = 0;
			$empCount = 0;
			$listOfEmployee = '';
			$cost = 0;
			foreach($empList as $empNo):
				$empInfo   = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
				//$empInfo = self::GetEmployeeDataOneRecordOnly($empNo, $period);
				if ($empInfo):
					$cost = self::PayrollCost($empNo, $period);
					if ($cost > 0):
						$empIncome += $cost;
						$listOfEmployee.= $empInfo->getName() . ', ';
						$empCount ++;
					endif;
				endif;
			endforeach;
			$datas[ substr($period,0,8) . '1' ] = array ('company'=>'Nanoclean', 'category'=>'BALLAST WATER TREATMENT LAB', 'reference_date'=>self::GetEndDate($period), 'vendor'=>'NANOCLEAN PAYROLL <br>(' . $empCount . ' Employees )', 'items'=>$listOfEmployee, 'price'=>$empIncome);
		endforeach;
		return $datas;
	}
	
	public static function PayrollCost($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::INCOME_EXPENSE, '1' );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			$amt = $amt + $r->getAmount() + $r->getCpfEr();
		}
		return $amt;
	}
	
	public static function GetPayDetailAudit($empNo, $period)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
		$c->addAscendingOrderByColumn(self::DESCRIPTION);
		$rs = self::doSelect($c);
		$mess = '';
		$pos = 0;
		$name = '';
		$bp = 0;
		$ot1 = 0;
		$ot2 = 0;
		$ot3 = 0;
		$inc = 0;
		$ded = 0;
		$ot = 0;
		$cpf = 0;
		$don = 0;
		$lv = 0;
		$meal = 0;
		$ml = 0; //monthly allowance
		$ul = 0;
		$mcb = 0;
		$cbs = 0;
		$ap = 0;
		$cpf_em = 0;
		$cpf_er = 0;
		$td = 0;
		$empno = '';
		$name = '';
		$ha = 0;
		$se = 0;
		foreach($rs as $r) {
			if (! $name) $name = $r->getName();
			switch ($r->getAcctCode())
			{
				case 'BP':
					$bp = $bp + $r->getAmount();
					break;
				case 'PI':
					$bp = $bp + $r->getAmount();
					break;
				case 'OT':
					$ot = $ot + $r->getAmount();
					break;
				case 'HA':
					$ha = $ha + $r->getAmount();
					break;
				case 'CPF':
					$cpf_em = $cpf_em + $r->getAmount();
					$cpf_er = $cpf_er + $r->getCpfEr();
					break;
				case 'CBS':
					$cbs = $cbs + $r->getAmount();
					break;
				case 'AP':
					$ap = $ap + $r->getAmount();
					break;
				case 'SINDA':
					$don = $don + $r->getAmount();
					break;
				case 'CDAC':
					$don = $don + $r->getAmount();
					break;
				case 'MBMF':
					$don = $don + $r->getAmount();
					break;
				case 'UL':
					$ul = $ul + $r->getAmount();
					break;
				case 'TD':
					$td = $td + $r->getAmount();
					break;
				case 'LV':
					$lv = $lv + $r->getAmount();
					break;
				case 'MR':
					$meal = $meal + $r->getAmount();
					break;
				case 'ML':
					$ml = $ml + $r->getAmount();
					break;
				case 'MCB':
					$mcb = $mcb + $r->getAmount();
					break;
				case 'SE':
					$se = $se + $r->getAmount();
					break;
			}
			if ($r->getIncomeExpense() == 1) {
				$inc = $inc + $r->getAmount();
			}else{
				$ded = $ded + $r->getAmount();
			}
			$pos++;
			
// 			$empno = $r->getEmployeeNo();
// 			$name = $r->getName();
		}
//		$empData['empno']    = $empno;
		$empData['name']     = $name;
		$empData['basic']    = $bp;
		$empData['ot']       = $ot;
		$empData['cbs']      = $cbs; //bank subsidy
		$empData['ap']       = $ap; //advance pay
		$empData['meal']     = $meal;
		$empData['donation']     = $don; //sinda mbmf cdac
		$empData['mcb']   = $mcb; //mc benefit
		$empData['cpf_er']   = $cpf_er; //cpf employer
		$empData['cpf_em']   = $cpf_em; //cpf employee
		$empData['lv']   = $lv;  //unpaid Allowance
		$empData['ml']   = $ml;  //monthly allowance
		$empData['mcb']  = $mcb;  //monthly allowance
		$empData['ul']   = $ul + $td; //tardy absences
		$empData['ha']   = $ha;
		$empData['se']   = $se; //specialist excellence
		$empData['tot_income']   = $inc;
		$empData['tot_deduction']   = $ded;
		

		return $empData;
	}
	
	//---------------------------- reports
	public static function GetAccountWithCpfDeductuble($empNo, $period)
	{
		$acctList = array('mcb');
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		$c->add(self::ACCT_CODE, $acctList, Criteria::IN);
		$c->add(self::INCOME_EXPENSE, 1);
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r)
		{
			$amt = $amt + $r->getAmount();
				
		}
		//var_dump($amt);
		return $amt;
	}
	
	public static function GetTotalOvertimeByPeriodByCode($co, $period)
    {
    	$c  = new Criteria();
    	$c->add(self::PERIOD_CODE, $period);
    	$c->add(self::ACCT_CODE, array('OT', 'HA', 'VA'), Criteria::IN);
    	if ($co <> 'ALL COMPANY') $c->add(self::COMPANY, $co );
    	$c->addAscendingOrderByColumn(self::NAME);
    	$rs = self::doSelect($c);
    	$amt = 0;
    	foreach ($rs as $r):
    		$amt+= $r->getAmount();
    	endforeach;
    	return $amt;
    }
    
	public static function GetEmployeeCountByDate($date, $co)
	{
		$company = array ("1"=>"Micronclean", "2"=>"Acro Solution",
				"5"=>"NanoClean", "4"=>"T.C. Khoo", "0"=>"- ALL -" );
		//$company = HrCompanyPeer::retrieveByPK($co);
		$sdate = DateUtils::DUFormat('Ymd', $date);
		$edate = DateUtils::DUFormat('Ymt', $date);
		$period = $sdate . '-' . $edate.'-ALL-MONTHLY';
// 		var_dump($period);
// 		var_dump($company[$co]);
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $period);
		$c->add(self::COMPANY, $company[$co]);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$list = array();
		$indirecteEmployee = array('CHUA SWEE TAT', 'LIM CHUAN HUAT');
		foreach ($rs as $r):
			if ( in_array( strtoupper($r->getName()), $indirecteEmployee) === true):
				$list[$r->getEmployeeNo()] = $r->getName() .'(indirect)';
			else:
				$list[$r->getEmployeeNo()] = $r->getName();
			endif;
			//echo $r->getName() . '<br>';
		endforeach;
		return $list;
	}
	
	public static function GetAccountCodeList($year = null)
	{
		$c = new Criteria();
		if ($year):
			$c->add(self::PERIOD_CODE, '%'.$year.'%', Criteria::LIKE);
		endif;
		$c->addGroupByColumn(self::ACCT_CODE);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[] = $r->getAcctCode();
		endforeach;
		return $list;
	}
	
	public static function GetEmployeeList($co = null, $year = null)
	{
		$c = new Criteria();
		if ($year):
			$c->add(self::PERIOD_CODE, '%'.$year.'%', Criteria::LIKE);
		endif;
		if ($co):
			$c->add(self::COMPANY, $co);
		endif;
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->setLimit(5);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getName();
		endforeach;
		return $list;
	}
	
	
	public static function GetEmployeeListByPeriodList($periodList)
	{
		$c = new Criteria();
		$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->setLimit(5);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getName();
		endforeach;
		return $list;
	}
	
	public static function GetEmployeeListBlank($co = null, $year = null)
	{
		$c = new Criteria();
		if ($year):
			$c->add(self::PERIOD_CODE, '%'.$year.'%', Criteria::LIKE);
		endif;
		if ($co):
			$c->add(self::COMPANY, $co);
		endif;
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		//$c->setLimit(5);
		$rs = self::doSelect($c);
		$list = array('' => ' - SELECT EMPLOYEE - ');
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getName();
		endforeach;
		return $list;
	}
	
	public static function GetEmployeeListBySource($co = null, $year = null, $source)
	{
		$periodList = self::GetPeriodListManual($year);
		$c = new Criteria();
		if ($year):
			$c->add(self::PERIOD_CODE, $periodList, Criteria::IN);
		endif;
		if ($co):
			$c->add(self::COMPANY, $co);
		endif;
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		switch($source):
			case 'taxable':
				$c->add(self::BANK_CASH, 'cash', Criteria::NOT_EQUAL);
				break;
			case 'all':
				//$c->add(self::BANK_CASH, 'cash', Criteria::NOT_EQUAL);
				break;
			default:
				$c->add(self::BANK_CASH, $source);
				break;
		endswitch;
		
		//$c->setLimit(5);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getName();
		endforeach;
		return $list;
	}
	
	public static function GetAmountByAccountCode($name, $pcode, $acct)
	{
		$c = new Criteria();
		$c->add(self::NAME, $name );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::ACCT_CODE, $acct );
		$rs = self::doSelect($c);
		$amount = 0;
		if ($rs)
		{
			foreach($rs as $r)
			{
				$amount += $r->getAmount();
			}
		}
		return $amount;
	}
	
	public static function GetListSummary($list, $periodList)
	{
		$tbasic = 0;
		$tpcode = 0;
			$tpcode = 0;
			$tbasic = 0;
			$basic  = 0;
			$names = HrLib::ArrayToSql($list);
			foreach($periodList as $period):
				//$basic = PayEmployeeLedgerArchivePeer::GetAmountByAccountCode($name, $period, 'BP') ;
				$sql = "
					select employee_no, name, sum(amount) as amount, period_code  
					from pay_employee_ledger_archive where name in (".$names.") 
					and period_code='".$period."' and acct_code = 'BP' group by name";
				$res = HrLib::ExecuteSQL($sql);
				while ($res->next()):
					$table['name'][$res->getString('name')] = $res->getString('name');
					$basic = $res->getInt('amount');
					$table[$res->getString('name')][$res->getString('period_code')] = $basic;
				endwhile;
			endforeach;
			foreach($list as $name):
				$tbasic = 0;
				$tpcode = 0;
				foreach($table[$name] as $basic):
					if ($basic > 0):
						$tbasic += $basic;
						$tpcode ++;
					endif;
				endforeach;
				//echo $name .' - '. $tbasic .'/'. $tpcode .'<br>';
				$table[$name]['average'] = number_format($tbasic / $tpcode, 1);
			endforeach;
		return $table;
	}
	
	public static function GetTaxableIncome($empno, $pcode)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		$c->add(self::BANK_CASH,'CASH', Criteria::NOT_EQUAL );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			if ($r->getIncomeExpense() == 1):			//*** ADD ALL INCOME
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getAcctCode() == 'TD'):				//*** ADD TARDY
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getAcctCode() == 'UL'):				//*** ADD UNPAID LEAVE
				$amt = $amt + $r->getAmount();
			endif;
			
		}
		return $amt;
	}
	
	public static function GetIncomeBySource($empno, $pcode, $source)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno );
		$c->add(self::PERIOD_CODE, $pcode );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM );
		switch($source):
			case 'taxable':
				$c->add(self::BANK_CASH, 'cash', Criteria::NOT_EQUAL);
				break;
			case 'all':
				//$c->add(self::BANK_CASH, 'cash', Criteria::NOT_EQUAL);
				break;
			default:
				$c->add(self::BANK_CASH, $source);
				break;
		endswitch;
		$rs = self::doSelect($c);
		$amt = 0;
		foreach ($rs as $r) {
			if ($r->getIncomeExpense() == 1):			//*** ADD ALL INCOME
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getAcctCode() == 'TD'):				//*** ADD TARDY
				$amt = $amt + $r->getAmount();
			endif;
			if ($r->getAcctCode() == 'UL'):				//*** ADD UNPAID LEAVE
				$amt = $amt + $r->getAmount();
			endif;
			
		}
		return $amt;
	}
	
	public static function GetCostToCompany($empNo, $batch, $mess = null)
	{
		$empNoList = array($empNo);
		
		$empData = array('empno'=>array(), 'name'=>array(), 'basic'=>array(),
                         'ot'=>array(), 'cbs'=>array(), 'ap'=>array(), 
                         'adv_ot'=>array(), 'meal'=>array(), 'cdac'=>array(), 
                         'sinda'=>array(), 'mbmf'=>array(),  'others'=>array(), 
                         'all'=>array(), 'bk'=>array(),  'cpf_em'=>array(),
                         'ha'=>array(), 'lv'=>array(),  'mr'=>array(),
                         'ml'=>array(), 'td'=>array(),  'ul'=>array(),
					     'cpf_er' => array(), 'total_cpf' => array(),
                         'total'=>array());
		// $empNoList = array('S1553425G');
		foreach ($empNoList as $kemp=>$vno)
		{
			switch($mess)
			{
				case 'BANK':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBank($batch, $vno);
					break;
				case 'CASH':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCash($batch, $vno);
					break;
				case 'CHEQUE':
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCheque($batch, $vno);
					break;
				default    :
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCashandBank($batch, $vno);
					break;

			}

			$empno = '';
			$name  = '';
			$basic = 0;
			$ot    = 0;
			$bank  = 0;
			$ap    = 0;
			$advot = 0;
			$others= 0;
			$tot   = 0;
			$meal  = 0;
			$cdac  = 0;
			$sinda = 0;
			$mbmf  = 0;
			$all   = 0;
			$bk    = 0;
			$cpf   = 0;
			$ha    = 0;
			$lv    = 0;
			$mr    = 0;
			$ml    = 0;
			$td    = 0;
			$ul    = 0;
			$cpf_em = 0;
			$cpf_er = 0;
			$cpf_tot = 0;
			
			foreach($data as $rec)
			{
				switch($rec->getAcctCode())
				{
					case 'AL':
						$all = $all + $rec->getAmount();
						break;
						//                    case 'BK':
						//                        $bk = $bk + $rec->getAmount();
						//                        break;
					case 'BP':
						$basic = $basic + $rec->getAmount();
						break;
					case 'CPF':
						$cpf_em  += $rec->getAmount();
						$cpf_er  += $rec->getCpfEr();
						$cpf_tot += $rec->getCpfTotal();
						break;
					case 'HA':
						$ot += $rec->getAmount();
						break;
					case 'LV':
						$lv = $lv + $rec->getAmount();
						break;
					case 'MR':
						$mr = $mr + $rec->getAmount();
						break;
					case 'ML':
						$ml = $ml + $rec->getAmount();
						break;
					case 'TD':
						$td = $td + $rec->getAmount();
						break;
					case 'UL':
						$ul = $ul + $rec->getAmount();
						break;

					case 'PI':
						$basic = $basic + $rec->getAmount();
						break;
					case 'CBS':
						$bank  = $bank + $rec->getAmount();
						break;
					case 'AP':
						$ap  = $ap + $rec->getAmount();
						break;
					case 'OT':
						if ($rec->getAmount() > 0)
						{
							$ot = $ot + $rec->getAmount();
						}else{
							$advot = $advot + $rec->getAmount();
						}
						break;
					case 'VA':
						$ot  += $rec->getAmount();
						break;
					case 'MEAL':
						$meal  = $meal + $rec->getAmount();
						break;
					case 'CDAC':
						$cdac  = $cdac + $rec->getAmount();
						break;
					case 'SINDA':
						$sinda  = $sinda + $rec->getAmount();
						break;
					case 'MBMF':
						$mbmf  = $mbmf + $rec->getAmount();
						break;

					default:
						$others = $others + $rec->getAmount();
						break;
				}
				$empno = $rec->getEmployeeNo();
				$name  = $rec->getName();
				//                echo $empno .' - '.  $rec->getAcctCode() .' = ' . $rec->getAmount() . ' [ot] ' . $ot;
				//                echo '<br>';
				$tot = $tot + $rec->getAmount();
				//echo $name .' - ' . $ul .' = '. $td .' <--- <br>' ;//. $rec->getTransDate();
			}

			//exit();
			$empData['empno']    = $empno;
			$empData['name']     = $name;
			$empData['basic']    = $basic;
			$empData['ot']       = $ot + $advot;
			$empData['cbs']      = $bank;
			$empData['ap']       = $ap;
			$empData['adv_ot']   = $advot;
			$empData['meal']     = $mr;
			$empData['meal_backpay'] = $meal;
			$empData['cdac']     = $cdac;
			$empData['sinda']    = $sinda;
			$empData['mbmf']     = $mbmf;
			$empData['all']      = $all;
			$empData['bk']       = $bk;
			$empData['cpf_er']   = $cpf_er;
			$empData['cpf_em']   = $cpf_em;  //should account this 
			$empData['cpf_tot']   = $cpf_tot * -1;
			$empData['lv']   = $lv;
			$empData['ml']   = $ml;
			$empData['ul']   = $ul + $td;
			$empData['levy']   = PayEmployeeLevyPeer::GetLevyByPeriodEmployeeNo($batch, $empNo) ;
			$empData['others']   = $others;
			$empData['total']    = $tot;
		}
		return $empData;
	}//GetJournalListing
	
	public static function HasDataBankCashNotCash($empno, $period=null)
	{
		$c  = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		if ($period):
			$c->add(self::PERIOD_CODE, $period, Criteria::IN);
		endif;
		$c->add(self::BANK_CASH, 'CASH', Criteria::NOT_EQUAL);
		//$c->addAscendingOrderByColumn(self::NAME);
		//$c->add(self::NAME, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelectOne($c);
		return ($rs? true : false);
	}
	
	public static function GetNanoEmployeeData($period)
	{
		$nanoEmployeeList = PayEmployeeLedgerArchivePeer::GetEmployeeListByPeriodByCompany($period, 'nanoclean');
		$indirecteEmployee = array('CHUA SWEE TAT', 'LIM CHUAN HUAT');
		$indirect = array('detail' => array(), 'salary' => 0 );
		$direct   = array('detail' => array(), 'salary' => 0 );
		$totPay = 0;
		$pay = 0;
		foreach($nanoEmployeeList as $empno => $name):
			$c  = new Criteria();
			$c->add(self::COMPANY, 'nanoclean');
			$c->add(self::EMPLOYEE_NO, $empno);
			$c->add(self::PERIOD_CODE, $period);
			$c->add(self::ACCT_CODE, array('CPF', 'SINDA', 'CDAC', 'MBMF'), Criteria::NOT_IN );
			$c->addAscendingOrderByColumn(self::INCOME_EXPENSE);
			$c->addAscendingOrderByColumn(self::NAME);
			$rs = self::doSelect($c);
			$salary = array($name => 0);
			foreach ($rs as $r):
				$salary[$name] += $r->getAmount(); 
			endforeach;
			if ( in_array( strtoupper($name), $indirecteEmployee) === true):
				$indirect['detail'][] = $salary;
			else:
				$direct['detail'][] = $salary;
			endif;
		endforeach;
		
 		foreach($indirect['detail'] as $empsalary):
 			foreach($empsalary as $pay):
 				$totPay += $pay;
 			endforeach;
 			$indirect['salary'] = $totPay;
 		endforeach;
 		
 		foreach($direct['detail'] as $empsalary):
	 		foreach($empsalary as $pay):
	 			$totPay += $pay;
	 		endforeach;
 			$direct['salary'] = $totPay;
 		endforeach;
 		 
 		//HTMLLib::vardump($direct);
		return array('direct'=>$direct, 'indirect'=>$indirect);
	}
	
	
	public static function GetEmployeeListByPeriodByCompany($period, $company = null)
	{
		$c = new Criteria();
		if ($company):
			$c->add(self::COMPANY, $company);
		endif;
		$c->add(self::PERIOD_CODE, $period);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getEmployeeNo()] = $r->getName();
		endforeach;
		return $list;
	}
	
	public static function GetBreakDownDataByCompanyByPeriod($co, $period)
	{
		$c = new Criteria();
		$c->add(self::COMPANY, $co);
		$c->add(self::PERIOD_CODE, $period);
		//$c->add(self::EMPLOYEE_NO, '400615179310311');
		$c->addAscendingOrderByColumn(self::EMPLOYEE_NO);
		$rs = self::doSelect($c);
		$component = array( 'Salary' => 0, 'Overtime' => 0, 'CPF Employee' => 0,  'CPF Employer' => 0, 'Levy' => 0, 'Total' => 0 );
		foreach($rs as $r):
			switch($r->getAcctCode()):
				case 'OT':
					$component['Overtime'] += $r->getAmount();
					$component['Total'] += $r->getAmount();
					break;
				case 'CBS':
					break;
				case 'CPF':
					$component['CPF Employee'] += $r->getAmount();
					$component['CPF Employer'] += $r->getCpfEr();
					$component['Total'] +=  ( $r->getCpfEr()  * -1 ) ;
					$component['Salary'] += $r->getAmount();
					break;
				default:
					$component['Salary'] += $r->getAmount();
					$component['Total'] += $r->getAmount();
					break;
			endswitch;
		endforeach;
		$component['CPF Employee'] = $component['CPF Employee'] * -1;
		$component['CPF Employer'] = $component['CPF Employer'] * -1;
		$component['Levy'] = PayEmployeeLevyPeer::GetTotalLevyByCompanyByPeriod($co, $period);
		$component['Total'] += $component['Levy'];
		return $component;
	}
	
	public static function GetIDbyPeriodByEmployeeNo($pcode, $empno)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::EMPLOYEE_NO, $empno);
		$rs = self::doSelectOne($c);
		return ($rs? $rs->getId() : 0);
	}
	
	public static function CashCheckList($pcode)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::BANK_CASH, 'cash-check');
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			$list[$r->getId()] = $r->getName();
		endforeach;
		return $list;
	}
	
	public static function CBSCharges($pcode)
	{
		$c  = new Criteria();
		$c->add(self::PERIOD_CODE, $pcode);
		$c->add(self::ACCT_CODE, 'CBS');
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $r):
			if ($r->getBankCash() <> 'BANK'):
				$list[$r->getId()] = $r->getName();
			endif;
		endforeach;
		return $list;
	}
	
}

