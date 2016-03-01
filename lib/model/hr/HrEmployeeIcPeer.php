<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_ic' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrEmployeeIcPeer extends BaseHrEmployeeIcPeer
{
	
    public static function GetPager($cd)
    {        
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 200);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }
        
        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1); 
        
        $c = clone($cd);
        $pager = new sfPropelPager('HrEmployeeIc', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

	public static function GetDataByEmployeeNo($empNo)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);    
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
	public static function GetOccupationByEmployeeNo($empNo)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$rs = self::doSelectOne($c);
		return $rs? $rs->getOccupation() : '';
	}
	
	public static function GetPassTypeByEmployeeNo($empNo)
	{
//		if ($empNo == 'S8360501D' ):
//			echo 'ehera';
//		endif;
//		$isPR = false;
//		if ($empNo == 'S8360501D' ): //|| $empNo == 'S1325467B' || $empNo == 'S1575762J' || $empNo == 'S6976982I'):
//			$isPR = true;
//		endif;
//		return $isPR;
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);    
		$rs = self::doSelectOne($c);
		if ($rs):
			if ($rs->getPassType() == 'PR'):
				return true;
			else:
				return false;
			endif;
		endif;
		
	}
	
	public static function GetJuniorManager()
	{
		return array(
			 'S8360501D' => 'LAI HUI PING'
			,'S1325467B' => 'LEE YUE WAH'
			,'S1575762J' => 'NEO CHWEE HER'
		);
	}
	
	public static function GetJuniorManagerWithBasic($pcode)
	{
		$jrManager = array(
				'S8360501D' => 'LAI HUI PING'
				,'S1325467B' => 'LEE YUE WAH'
				,'S1575762J' => 'NEO CHWEE HER'
				,'S6976982I' => 'YANG MEIZHEN'
		);
		$jrManagerList = array();
		foreach($jrManager as $empno => $name ):
			$jrManagerList[$name] = PayEmployeeLedgerArchivePeer::GetBasicByEmpNoPeriodCode($empno, $pcode);
		endforeach;
		return $jrManagerList;
	}
}
