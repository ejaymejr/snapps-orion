<?php

/**
 * Subclass for performing query and update operations on the 'pay_employee_ledger' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayEmployeeLedgerPeer extends BasePayEmployeeLedgerPeer
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
        $pager = new sfPropelPager('PayEmployeeLedger', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
    
	public static function CheckIfThereIsData()
	{
		$c = new Criteria();
		$rs = self::doSelectOne($c);
		return $rs? TRUE: FALSE;    
	}

    public static function ComputeAmountbyEmpNoPeriodCode($empno, $pcode)
    {
        $sql = "
            SELECT employee_no, period_code, sum(amount) as total 
            FROM `pay_employee_ledger` where employee_no = '".$empno."' 
            and period_code = '".$pcode."' 
            group by period_code
        ";
        $total = HrLib::ExecuteSQL($sql);
        $total->next();
        return $total->getFloat('total');
    }
    
    public static function GetIncomeAmount($empno, $pcode)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno );
        $c->add(self::PERIOD_CODE, $pcode );
        $c->add(self::INCOME_EXPENSE, '1' );
        $rs = self::doSelect($c);
        
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
    
    public static function GetBasicByEmpNoPeriodCode($empno, $pcode)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno );        
        $c->add(self::PERIOD_CODE, $pcode );
        $c->add(self::ACCT_CODE, 'BP');
        $rs = self::doSelectOne($c);
        return $rs? $rs->getAmount() : 0;
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

    
    public static function GetEmployeeDataforCash($period, $empNo)
    {
        $c  = new Criteria();
        $c->add(self::PERIOD_CODE, $period);        
        $c->add(self::EMPLOYEE_NO, $empNo);
        $c->add(self::BANK_CASH, 'CASH');
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
    
    public static function GetAllDatabyPeriodCodeAcctCode($pcode, $acct)
    {
        $c= new criteria();
        $c->add(self::PERIOD_CODE, $pcode);
        $c->add(self::ACCT_CODE,   $acct);
        $c->addAscendingOrderByColumn(self::NAME);
        $rs= self::doSelect($c);
        return $rs;
    }

    public static function GetPeriodCode()
    {
        $pcode = array();
        $c= new Criteria();
        $rs = self::doSelect($c);
        if ($rs)
        {
            foreach($rs as $rec)
            {
                $pcode[$rec->getPeriodCode()] = $rec->getPeriodCode();
            }
        }
        return array_unique($pcode);
    }
    
    public static function GetPeriodList()
    {
    	$c = new Criteria();
    	$c->addDescendingOrderByColumn(self::PERIOD_CODE);
    	$c->addGroupByColumn(self::PERIOD_CODE);
    	$rs = self::doSelect($c);
    	$list = array();
    	foreach($rs as $r)
    	{
    		$list[] = $r->getPeriodCode();
    	}
    	return $list;
    }

    public static function GetEmployeeNoListforBankPerCompany($period, $company)
    {
        $empNo = array();
        $list = self::GetDataforBank($period, $company);
        if ($list)
        {
            foreach($list as $rec)
            {
                $empNo[] = $rec->getEmployeeNo();
            }
        }
        return (array_unique($empNo));
    }

    public static function GetEmployeeNoListforCashPerCompany($period, $company)
    {
        $empNo = array();
        $list = self::GetDataforCash($period, $company);
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
    
    public static function GetEmployeewithCPF($period)
    {
        $empNo = array();
        $c = new Criteria();
        $c->add(self::PERIOD_CODE, $period);        
        $c->add(self::ACCT_CODE, 'CPF');
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
    

   
        
    
}
