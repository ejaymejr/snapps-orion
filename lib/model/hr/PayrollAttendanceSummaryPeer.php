<?php

/**
 * Subclass for performing query and update operations on the 'payroll_attendance_summary' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayrollAttendanceSummaryPeer extends BasePayrollAttendanceSummaryPeer
{
	public static function GetTotalComplianceOt($empno, $pcode)
	{
		$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
		$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::TRANS_DATE, self::TRANS_DATE .' >= date( "' .$sdt .'" ) && ' . self::TRANS_DATE .' <= date ( "' .$edt . '" )', Criteria::CUSTOM );
		//$c->add(self::TEAM, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$complianceOT = 0;
		$complianceOTOriginalTime = 0;
		foreach ($rs as $r):
			$complianceOT += $r->getComplianceOtAmt();
			$complianceOTOriginalTime += $r->getComplianceOtAmtOriginalTime();
		endforeach;
		return array('complianceOT'=>$complianceOT, 'complianceOTOriginalTime'=>$complianceOTOriginalTime);
	}
	
	public static function UpdateMultiplier()
	{
		$c = new Criteria();
		$c->add(self::MULTIPLIER, 0, Criteria::LESS_EQUAL);
		$c->add(self::NORMAL, 12);
		//$c->setLimit(500);
		$rs = self::doSelect($c);
		foreach($rs as $r):
			$day = DateUtils::DUFormat('D', $r->getTransDate() );
			$multiplier = 1.5;
			if ( $day == 'Sat' ||  $day == 'Sun'):
				$multiplier = 2.0;
			endif;
			echo $r->getTransDate() . ' ' . $day . ' ' . $multiplier . ' ' . $r->getNormal() . '<br>';
			$r->setMultiplier($multiplier);
			$r->save();
		endforeach;
		return;
	}

	public static function UpdateComplianceOT()
	{
		$c = new Criteria();
		//$c->add(self::NORMAL, 12);
		//$c->add(self::NAME, '%'.'faizal'.'%', Criteria::LIKE);
		$c->add(self::TRANS_DATE, ' year( ' .self::TRANS_DATE . ' ) = "2008" ', Criteria::CUSTOM);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$c->addDescendingOrderByColumn(self::TRANS_DATE);
		$rs = self::doSelect($c);
		$adjusted_ot = 0;
		$adjusted_ot_amount = 0;
		$orig_ot = 0;
		$orig_ot_amount = 0;
		$normal = 0;
		$break = 0;
		foreach($rs as $r):
			//echo $r->getTransDate() .' : '. ($r->getDuration() / 3600)	. ' ' . $r->getAcDura() . '<br>';
			$normal = $r->getNormal();
			if ($normal == '12') $normal = 8;
			$break = TkDtrmasterPeer::GetMealBreak($r->getEmployeeNo());
			$adjustedDuration = ($r->getAcDura() - $normal ); 			//this tim has already taken out the meal
			$originalDuration = ($r->getUneditedDuration() - $break - $normal ); //per hour less  30 min break
			$r->setComplianceOt($adjustedDuration);
			$r->setComplianceOtOriginalTime($originalDuration);
			
			$adjusted_ot = floor($adjustedDuration); //get the decimal part
			$adjusted_ot += ( ( ($adjustedDuration - $adjusted_ot) >= .75) ?  1 : 0)  ;  //get the integer value and add 1 hr if the adjested ot >= 75
			
			$orig_ot = floor($originalDuration); //get the decimal part
			$orig_ot += ( ( ($originalDuration - $orig_ot) >= .75) ?  1 : 0)  ;  //get the integer value and add 1 hr if the adjested ot >= 75

			
// 			$adjusted_ot = $adjustedDuration ;
// 			$orig_ot = $originalDuration;
			
			$r->setComplianceOt($adjustedDuration);
			$r->setComplianceOtOriginalTime($originalDuration);
			$r->setComplianceOtAmt($adjusted_ot * $r->getRatePerHour() * $r->getMultiplier() );
			$r->setComplianceOtAmtOriginalTime($orig_ot * $r->getRatePerHour() * $r->getMultiplier() );
			$r->save();
		endforeach;
		return;
	}
	
	public static function Get12HoursOccurenceViaPaidDuration($empno, $pcode)
	{
		$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
		$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::TRANS_DATE, self::TRANS_DATE .' >= date( "' .$sdt .'" ) && ' . self::TRANS_DATE .' <= date ( "' .$edt . '" )', Criteria::CUSTOM );
		//$c->add(self::AC_DURA, 12, Criteria::GREATER_EQUAL);
		$rs = self::doSelect($c);
		$occur = 0;
		$totHrs = 0;
		foreach($rs as $r):
			if ($r->getAcDura() >= 12) $occur++;
			$totHrs += $r->getAcDura();
		endforeach;
		return array('occurrence'=>$occur, 'total'=>$totHrs);
	}
	
	public static function Get12HoursOccurenceViaPaidDurationCount($empList, $pcode)
	{
		$sdt = PayEmployeeLedgerArchivePeer::GetStartDate($pcode);
		$edt = PayEmployeeLedgerArchivePeer::GetEndDate($pcode);
		$empData = array();
		foreach($empList as $emp):
			$empData[$emp->getEmployeeNo()] = 0;
		endforeach;
		$sql = "
				Select employee_no, name, count(ac_dura) as occurrence from payroll_attendance_summary
				where ac_dura > 12
				and trans_date>= '".$sdt."' and trans_date <= '".$edt."'
				group by employee_no
				order by occurrence
				";
				
		$result = HrLib::ExecuteSQL($sql);
		while ($result->next()):
		//echo $result->getString('name') .' | '. $result->getString('occurrence') .'<br>' ;
			$empData[$result->getString('employee_no')] = $result->getString('occurrence');
		endwhile;
		return $empData;
	}
	
	public static function GetSPREmployeeListByYear($sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE, self::TRANS_DATE .' >= date( "' .$sdt .'" ) && ' . self::TRANS_DATE .' <= date ( "' .$edt . '" )', Criteria::CUSTOM );
		//$c->add(self::EMPLOYEE_NO, 'substring('.self::EMPLOYEE_NO.', 1, 1) = "s"', Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		$rs = self::doSelect($c);
		return $rs;
	}
}
