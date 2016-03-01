<?php

/**
 * Subclass for performing query and update operations on the 'tk_meal_summary' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkMealSummaryPeer extends BaseTkMealSummaryPeer
{
    public static function GetOptimizedDatabyEmployeeNo($empNo, $cDate, $fldList)
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
    
    public static function GetMealByDate($empno, $sdt, $edt) 
    {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $empno);
        $c->add(self::TRANS_DATE
        ,'( Date('.self::TRANS_DATE.') >= "'. $sdt .'" and Date('.self::TRANS_DATE.') <= "' . $edt . '")'
        , Criteria::CUSTOM);
        $rs = self::doSelect($c);
        $meal = array();
        foreach ($rs as $r) {
        	$meal[$r->getTransDate()] = $r->getAmount();
        }
        return $meal;
    }        
    
    public static function TopUpNoMeal($empNo, $cDate)
    {
//     	var_dump($cDate);
//     	exit();
//    	$posted = TkDtrsummaryPeer::GetDatabyEmployeeNoDate($empNo, $cDate);
    	$topUp = 'TOPUP 12 HOURS';
    	$addEntry = false;
    	$mealInfo = self::GetDatabyEmployeeNo($empno, $cDate); 
    	$mealAmount = 0;
    	if ($mealInfo):
    		if ($mealInfo->getCreatedBy() == $topUp):
    			$addEntry = true;
    		endif;
    	else:
    		$addEntry = true;
    	endif;
    	if ( $addEntry  ):
    		$empData = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('name'));
    		$posted = TkDtrsummaryPeer::GetDatabyEmployeeNoDate($empNo, $cDate);
    		if ($posted):
    			$mealAmount = $posted->getMeal();
    		endif;
    		$c = new TkMealSummary();
    		$c->setEmployeeNo($empNo);
    		$c->setName($empData->get('NAME'));
    		$c->setTransDate($cDate);
    		$c->setAmount($mealAmount);
    		$c->setDateCreated(DateUtils::DUNow());
    		$c->setDateModified(DateUtils::DUNow());
    		$c->setCreatedBy($topUp);
    		$c->setModifiedBy($topUp);
    		$c->save();
    	endif;
    }
}
