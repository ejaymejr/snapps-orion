<?php

/**
 * Subclass for performing query and update operations on the 'tk_attendance_multiple' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkAttendanceMultiplePeer extends BaseTkAttendanceMultiplePeer
{
    
    const CUSTOM = "CUSTOM";
    
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
        $pager = new sfPropelPager('TkAttendanceMultiple', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
    
   
   public static function CheckDuplicateforEmpnoTimeIn($emp, $tin)
   {
       $c = new Criteria();
       $c->add(self::EMPLOYEE_NO, $emp);
       $c->add(self::TIME_IN, $tin);
       $total = self::doCount($c);
       return ($total > 0);
   }
   
   public static function GetAllEmployeeTimeIn($sdt, $edt)
   {
       $c = new Criteria();
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $edt . '\'', self::CUSTOM);
       $rs = self::doSelect($c);
       $list = array();
       if ($rs) {
            foreach ($rs as $r) {
                $key = $r->getEmployeeNo() . '_' . $r->getTimeIn();
                $list[] = $key;
            }
       }
       return $list;
       
   }
   
   
   
   public static function GetDateProcessed()
   {
       $c = new Criteria();
       $c->addGroupByColumn(self::TIME_IN);
       $rs = self::doSelect($c);
       return !empty($rs) > 0 ? $rs[0] : null;
   }
   
   public static function GetAttendance($empno, $sdt, $edt)
   {
       $c = new Criteria();
       $c->add(self::EMPLOYEE_NO, $empno);
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $edt . '\'', self::CUSTOM);
       $c->addAscendingOrderByColumn(self::TIME_IN);
       //$c->addJoin(self::)
       $rs = self::doSelect($c);
       return !empty($rs) > 0 ? $rs : null;
   }   

   public static function GetEmpDaily($empno, $sdt)
   {
       $c = new Criteria();
       $c->add(self::EMPLOYEE_NO, $empno);
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $sdt . '\'', self::CUSTOM);
       $c->add(self::TIME_OUT, '0000-00-00 00:00:00');
       $rs = self::doSelectone($c);
       return $rs;
   }   
   
   public static function DeleteEmployeeTimeIn($sdt, $edt, $empNo=null)
   {
       $c = new Criteria();
       $c->add(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $edt . '\'', self::CUSTOM);
       if($empNo)
       {
           $c->add(self::EMPLOYEE_NO, $empNo);
       }
       self::doDelete($c);
       return;
   }
   
   /* Take the most recent Record */
   public static function GetDaily($empno, $sdt)
   {
   	$c = new Criteria();
   	$c->add(self::EMPLOYEE_NO, $empno);
   	$c1 = $c->getNewCriterion(self::TIME_IN,  'DATE(' . self::TIME_IN . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_IN . ') <= \'' . $sdt . '\'', self::CUSTOM);
   	$c2 = $c->getNewCriterion(self::TIME_OUT,  'DATE(' . self::TIME_OUT . ') >= \'' . $sdt . '\' AND DATE(' . self::TIME_OUT . ') <= \'' . $sdt . '\'', self::CUSTOM);
   	$c1->addOr($c2);
   	$c->add($c1);
   	$c->addDescendingOrderByColumn(self::TIME_IN);
   	$rs = self::doSelectOne($c);
   	return !empty($rs) > 0 ? $rs : null;
   }

   
}
