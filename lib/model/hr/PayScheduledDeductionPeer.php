<?php

/**
 * Subclass for performing query and update operations on the 'pay_scheduled_deduction' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayScheduledDeductionPeer extends BasePayScheduledDeductionPeer
{
    const FLAG_STATUS_ACTIVE    = 'A';
    const FLAG_STATUS_INACTIVE  = 'I';
    
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
        $pager = new sfPropelPager('PayScheduledDeduction', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

    public static function GetDeductionbyEmployeeNo($empno, $freq)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::FREQUENCY, 'MONTHLY');
        $c->add(self::SCHEDULED_AMOUNT, 0, Criteria::NOT_EQUAL);
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL);        
        $rs = self::doSelect($c);
//        echo $freq .'=MONTHLY';
//        echo $empno.' - '.$freq . '<br>';      
//        var_dump($rs);
//        exit();
        return $rs;
    }    

    /* check duplicate record used in PayComputeExtra.Class [SaveToScheduledDeduction($batch)] */
    public static function GetDatabyEmployeeNoPeriodCode($empno,$pcode)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::DEDUCTION_PREPOST_BATCH, $pcode);
        $rs = self::doSelectone($c);      
        return $rs;
    }
    
    public static function GetDatabyEmployeeNoBatchNoAcctCode($empno, $batch, $acct)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::ACCT_CODE, $acct);
        $c->add(self::DEDUCTION_PREPOST_BATCH, $batch);
        $rs = self::doSelectOne($c);
        return $rs;
        
    }
    
    public static function GetSystemDatabyEmployeeNo($empno, $batch, $acct)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::ACCT_CODE, $acct);
        $c->add(self::DEDUCTION_PREPOST_BATCH, $batch);
        $c->add(self::ENTRY_TYPE, 'SYSTEM');
        $rs = self::doSelectOne($c);
        return $rs;
        
    }
    
    public static function GetAllDeduction()
    {
        $c = new Criteria();
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        $rs = self::doSelect($c);      
        return $rs;
    }
    
    public static function UpdateStatusbyId($Id)
    {
        $c = new Criteria();
        $c->add(self::ID, $Id);
        $rs = self::doSelectOne($c);
        $rs->setStatus(self::FLAG_STATUS_ACTIVE);
        $rs->save();        
    }    
    
    public static function DeleteDeductionbyBatch($empno=null, $batch)
    {
        $c = new Criteria();
        $c->add(self::DEDUCTION_PREPOST_BATCH, $batch);
        $c->add(self::ENTRY_TYPE, 'SYSTEM');        
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        if ($empno)
        {
            $c->add(self::EMPLOYEE_NO, $empno);
        }
        self::doDelete($c);
        return;
    }
    
    public static function AddDeductionEntry($empNo, $acct, $amount, $cdate, $empName)
    {
    	$sdt = DateUtils::DUFormat('Y-m-01', $cdate);
    	$edt = DateUtils::DUFormat('Y-m-t', $cdate);
    	$empDeduc = PayScheduledDeductionPeer::GetEmpEntry($empNo, $acct, $cdate);
    	if ( ! $empDeduc) {
    		$empDeduc = new PayScheduledDeduction();
    		$empDeduc->setEmployeeNo($empNo);
    		$empDeduc->setName($empName);
    		$empDeduc->setFromDate($sdt);
    		$empDeduc->setToDate($edt);
    		$empDeduc->setFrequency('MONTHLY');
    		//$empDeduc->setIncomeExpense('2');
    		$empDeduc->setStatus('A');
    		$empDeduc->setEntryType('EMAN');
    		$empDeduc->setCreatedBy(sfContext::getInstance()->getUser()->getUsername());
    		$empDeduc->setDateCreated(DateUtils::DUNow());
    	}
    	$empDeduc->setAcctCode($acct);
    	$empDeduc->setDescription(PayAccountCodePeer::GetDescriptionbyAcctCode($acct));
    	$empDeduc->setTotalAmount($amount);
    	$empDeduc->setScheduledAmount($amount);
    	$empDeduc->setModifiedBy(sfContext::getInstance()->getUser()->getUsername());
    	$empDeduc->setDateModified(DateUtils::DUNow());
    	
    	$empDeduc->save();    	
    }
    
    public static function GetEmpEntry($empNo, $acct, $cdate)
    {
    	$sdt = DateUtils::DUFormat('Y-m-01', $cdate);
    	$edt = DateUtils::DUFormat('Y-m-t', $cdate);
    	$c = new Criteria();
    	$c->add(self::EMPLOYEE_NO, $empNo);
    	$c->add(self::ACCT_CODE, $acct);
    	$c->add(self::FROM_DATE, 'date('. self::FROM_DATE .') = "' . $sdt .'"', 'CUSTOM');
    	$c->add(self::TO_DATE, 'date('. self::TO_DATE .') = "' . $edt .'"', 'CUSTOM');
    	//$c->add('date('. self::FROM_DATE .') = '. $edtx);
    	$rs = self::doSelectOne($c);
    }

}

