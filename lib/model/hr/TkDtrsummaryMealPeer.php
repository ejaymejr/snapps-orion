<?php

/**
 * Subclass for performing query and update operations on the 'tk_dtrsummary_meal' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkDtrsummaryMealPeer extends BaseTkDtrsummaryMealPeer
{
    public static function GetOptimizedDatabyEmployeeNo($empNo, $fldList)
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
                case 'amount':
                    $c->addSelectColumn(self::AMOUNT);                    
                    break;
            }
        }
        
        $c->add(self::EMPLOYEE_NO, $empNo);
        $c->add(self::TRANS_DATE,  $cDate);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        while ($rs->next()) 
        {
            return $rs; // nr of column in select clause
        }
    }
    
    public static function GetDatabyEmployeeNo($empno, $cDate) 
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::TRANS_DATE, $cDate);
        $rs = self::doSelectone($c);
        return $rs;
    }
}
