<?php

/**
 * Subclass for performing query and update operations on the 'pay_scheduled_income' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayScheduledIncomePeer extends BasePayScheduledIncomePeer
{
    const FLAG_STATUS_ACTIVE    = 'A';
    const FLAG_STATUS_INACTIVE  = 'I';
    const CUSTOM                = 'CUSTOM';
    
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
        $pager = new sfPropelPager('PayScheduledIncome', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

    public static function GetIncomebyEmployeeNo($empno, $freq)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::FREQUENCY, $freq);        
        $c->add(self::SCHEDULED_AMOUNT, 0, Criteria::NOT_EQUAL);
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        //$c->add(self::NAME, 'I<>', Criteria::CUSTOM );
        $rs = self::doSelect($c);      
        return $rs;
    }
    
    public static function GetOvertimebyEmployeeNo($empno, $freq)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::ACCT_CODE, 'OT');
        $c->add(self::FREQUENCY, $freq);
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        $rs = self::doSelect($c);      
        return $rs;
    }
    
    
    public static function GetAllIncome()
    {
        $c = new Criteria();
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        $rs = self::doSelect($c);      
        return $rs;
    }

    /* check duplicate record used in PayComputeExtra.Class [SaveToScheduledIncome($batch)] */
    public static function GetDatabyEmployeeNoPeriodCode($empno,$pcode)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::INCOME_PREPOST_BATCH, $pcode);
        $rs = self::doSelectone($c);      
        return $rs;
    }
    
    public static function GetDatabyEmployeeNoPeriodCodeAcctCode($empno, $pcode, $acctCode)
    {
        //$batch =  SUBSTR($pcode, 0, 17);
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::INCOME_PREPOST_BATCH, $pcode );
        $c->add(self::ACCT_CODE, $acctCode);
        $rs = self::doSelectone($c);      
        return $rs;
    }
    
    public static function GetSystemDatabyEmployeeNo($empno, $pcode, $acctCode)
    {
        //$batch =  SUBSTR($pcode, 0, 17);
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::INCOME_PREPOST_BATCH, $pcode );
        $c->add(self::ACCT_CODE, $acctCode);
        $c->add(self::ENTRY_TYPE, 'SYSTEM');
        $rs = self::doSelectone($c);      
        return $rs;
    }    
    //$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
    
    public static function UpdateStatusbyId($Id)
    {
        $c = new Criteria();
        $c->add(self::ID, $Id);
        $rs = self::doSelectOne($c);
        if ($rs)
        {
            $rs->setStatus(self::FLAG_STATUS_ACTIVE);
            $rs->save();
        }        
    }

    public static function DeleteIncomebyBatch($empno=null, $batch)
    {
        $c = new Criteria();
        $c->add(self::INCOME_PREPOST_BATCH, $batch);
        $c->add(self::ENTRY_TYPE, 'SYSTEM');        
        $c->add(self::STATUS, 'I', Criteria::NOT_EQUAL );  //not equal to Inactive so.
        if ($empno)
        {
            $c->add(self::EMPLOYEE_NO, $empno);
        }
        self::doDelete($c);
        return;
    }
}

