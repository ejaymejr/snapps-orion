<?php

/**
 * Subclass for performing query and update operations on the 'hr_individual_leave' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrIndividualLeavePeer extends BaseHrIndividualLeavePeer
{
    const FLAG_STATUS_ACTIVE = 'A';
    const FLAG_STATUS_INACTIVE = 'I';
    
    
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
        $pager = new sfPropelPager('HrIndividualLeave', $rowsPerPage);

        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
    
    public static function GetFlagStatus($status)
    {
        return ($status == 'A')? 'ACTIVE' : 'INACTIVE';
    }

    public static function GetDatabyEmployeeNo($empno, $fiscal = null)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        if (! $fiscal):
       		$c->add(self::FISCAL_YEAR, sfConfig::get('fiscal_year'));
       	else:
       		$c->add(self::FISCAL_YEAR, $fiscal);
       	endif;
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = self::doSelectOne($c);
        return $rs;
    }
    
    
    public static function GetAllDatabyEmployeeNo($empno, $fiscal = null)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        if (! $fiscal):
       		$c->add(self::FISCAL_YEAR, sfConfig::get('fiscal_year'));
       	else:
       		$c->add(self::FISCAL_YEAR, $fiscal);
       	endif;
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = self::doSelect($c);
        return $rs;
    }    
    /******************************************************************
    used in :
        UpdateFromGlobalLeave
    *****************************************************************/
    public static function GetDatabyEmployeeNoLeaveType($empno, $ltype)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::LEAVE_TYPE, $ltype);
        $c->add(self::FISCAL_YEAR, sfConfig::get('fiscal_year'));
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = self::doSelectOne($c);
        return $rs;
    }
    
    public static function GetDatabyEmployeeNoLeaveTypeYear($empno, $ltype, $fiscal)
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::LEAVE_TYPE, $ltype);
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $c->add(self::FISCAL_YEAR, $fiscal);
        $rs = self::doSelectOne($c);
        return $rs;
    }    
    
    public static function GetAnnualLeave($empno, $fiscal, $ltype = null)
    {
    	$ltype = ($ltype)? $ltype : 'Annual Leave';
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::LEAVE_TYPE, 'Annual Leave');
        $c->add(self::FISCAL_YEAR, $fiscal);
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = self::doSelectOne($c);
        return $rs;
    }
    
    public static function GetAnnualLeaveCount($empno, $fiscal, $ltype = null)
    {
    	$ltype = ($ltype)? $ltype : 'Annual Leave';
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::LEAVE_TYPE, 'Annual Leave');
        $c->add(self::FISCAL_YEAR, $fiscal);
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = self::doSelectOne($c);
        return $rs? $rs->getDaysEntitled(): 0;
    }
    
        
    public static function GetOptimizedDatabyEmployeeNo($empNo, $fiscal, $ltype, $fldList)
    {
    	$ltype = ($ltype)? $ltype : 'Annual Leave';
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
                case 'leave_type':
                    $c->addSelectColumn(self::LEAVE_TYPE);
                    break;
				case 'days_entitled':
                    $c->addSelectColumn(self::DAYS_ENTITLED);
                    break;                    
                   
            }
        }
        $c->add(self::EMPLOYEE_NO, $empNo);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        while ($rs->next()) 
        {
            return $rs; // nr of column in select clause
        }
    }
    
    public static function GetCurrentAnnualLeavebyEmployeeNo($empno) 
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::HR_LEAVE_ID, 2);
        $c->add(self::FISCAL_YEAR, sfConfig::get('fiscal_year'));
        $rs = self::doSelectone($c);
        return $rs;
    }     
}
