<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_daily' table.
 *
 *
 *
 * @package lib.model.hr
 */
class HrEmployeeDailyPeer extends BaseHrEmployeeDailyPeer
{
	const CUSTOM = 'CUSTOM';

	public static function UpdateDaily($sdt, $edt, $user)
	{
		$empNo = null;
//		$empNo = '11111';
		$empList = PayBasicPayPeer::GetEmpList($empNo);
// 		var_dump($empList);
// 		exit();
		$xcnt = DateUtils::DateDiff('d', $sdt, $edt) ;
		for ($x=0; $x <= $xcnt; $x++)
		{
			$cdate = DateUtils::AddDate($sdt, $x);
			$pos   = 0;
			$ot    = 0;
			$basic = 0;
			foreach($empList['empNo'] as $kemp=>$empNo)
			{
				$dtr = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $cdate, $cdate);
				//$record = HrEmployeeDailyPeer::GetEmployeeNobyDate($empNo, $cdate);
				$record = false;
				if (!$record)
				{
					$record = new HrEmployeeDaily();
					$record->setCreatedBy($user);
					$record->setDateCreated(DateUtils::DUNow());
				}

				$basic     = $empList['basi'][$pos];
				$allowance = $empList['allo'][$pos];

				$shift = $dtr['acDura']? $dtr['acDura'] : 0 ; //self::GetShift($empNo);
				$record->setEmployeeNo($empNo);
				$record->setName($empList['name'][$pos]);
				$record->setDepartment(HrEmployeePeer::GetTeambyEmployee($empNo) );
				$record->setCompany($empList['comp'][$pos]);
				$record->setHourlyRate($empList['hour'][$pos]);
				
// 				echo '<pre>';
// 				print_r($dtr);
// 				echo '</pre>';
// 				exit();
				echo $empNo. ' : shift: '. $shift.' '. $cdate ."\n\t";
				//$record->setDuration($empList['acDura'][$pos]? $empList['acDura'][$pos] : 0);

				if ($dtr)
				{
					$ot = $dtr['totalOt'];
					$record->setOt($dtr['totalOt']);
					$record->setMeal($dtr['meal']);
					$record->setAllowance($dtr['all']);
					$record->setUndertime($dtr['tardy']);
					$record->setAbsent($dtr['absent']);
					$record->setPartTime($dtr['pt']);
					$record->setDuration($dtr['acDura']);
				}
				$record->setShift($shift);
				if ($shift == 12)
				{
					$basic     = (self::ComputeAmtDaily($basic, $sdt, '12', $empList['name'][$pos]) );
					$allowance = (self::ComputeAmtDaily($allowance, $sdt, '12', $empList['name'][$pos]) );
				}else{
					if (strtolower(DateUtils::DUFormat('l',$cdate)) == 'sunday')
					{
						$basic     = 0;
						$allowance = 0;
					}else{
						$basic     = (self::ComputeAmtDaily($basic, $sdt, '8', $empList['name'][$pos]) );
						$allowance = (self::ComputeAmtDaily($allowance, $sdt, '8', $empList['name'][$pos]) );
					}
	     
				}
				
				$record->setBasic($basic);
				$record->setMonthAllowance($allowance);
				$record->setIsOnLeave(HrEmployeeLeavePeer::IsOnWhatleave($empNo, $cdate));
				$record->setTransDate($cdate);
				$record->setModifiedBy($user);
				$record->setDateModified(DateUtils::DUNow());
				$record->save();
				$pos++;
			}
			//			echo $cdate .' : '. $dtr['totalOt'] . '<br>';
		}
		//		exit();
	}

	public static function ComputeAmtDaily($basic, $cdt, $shift, $name)
	{
		$doff  = ($shift == '12') ? 2 : 0;
		$days  = DateUtils::DUFormat('t', $cdt);
		$sdt   = DateUtils::DUFormat('Y-m-01', $cdt);
		$edt   = DateUtils::DUFormat('Y-m-', $cdt) . $days;
		$cdat  = $sdt;
		$sun   = 0;
		$daily = 0;

		//------------------------- get sundays
		for($x=0; $x <= $days; $x++)
		{
			$cdat = DateUtils::AddDate($sdt, $x);
			//echo $name.':->  '.$cdat .' - '.$days.'\n\t';
			if (strtolower(DateUtils::DUFormat('l', $cdat)) == 'sunday')
			{
				$sun ++;
			}
		}
		$daily = ($basic / ($days - ($sun-$doff) + (dateUtils::DUFormat('t', $cdt) <= 30 ? 0 : 1 ) ) );
		return $daily;

	}

	public static function DeleteData($sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		//$c->add(self::EMPLOYEE_NO, '&& || &&', Criteria::CUSTOM);
		$rs = self::doDelete($c);
		return $rs;
	}

	public static function GetShift($empNo)
	{
		$wrkTmp = TkDtrmasterPeer::GetOptimizedDatabyEmployeeNo($empNo, array('tk_worktemplate_no'));
		if ($wrkTmp)
		{
			$hrs = TkWorktemplatePeer::GetOptimizedDatabyWorkTemplateNo($wrkTmp->get('TK_WORKTEMPLATE_NO'), array('hrs_per_day'));
		}
		if ($hrs){
			if ($hrs->get('HRS_PER_DAY') == 12)
			{
				return 12;
			}else{
				return 8;
			}
		}else{
			return 8;
		}
	}

	public static function UpdateActualCpf($period = null, $isForecast = null) 
	{
		//self::PostContrib(DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt), 'micronclean',   $mcs + 260 + 5400 + 100 , $user);	//
		if (! $period):
			$period = PayEmployeeLedgerArchivePeer::GetLatestPeriodCode();
			$edt = PayEmployeeLedgerArchivePeer::GetEndDate($period);
		endif;
		//isforecast is using the data of the previous month as current
		if ($isForecast):
			$edt = Date('Y-m-t');
		endif;
		$cpfData = self::PopulateContributionData($period);
		$companyList = HrCompanyPeer::GetCompanyList2();
		
		$grandTotal = 0;
		//var_dump($companyList);
		//exit();
		foreach ($companyList as $cID=>$company):
			$pos = 0;
			$ctot = 0;
			//echo '<br> [ '. $company . ' =============> ] <br>';
			foreach( $cpfData['company'] as $co):
				$tot = 0;
				if ($co == $company):
					$tot = $cpfData['tot_cpf'][$pos] + $cpfData['mbmf'][$pos] + $cpfData['sinda'][$pos] + $cpfData['cdac'][$pos] + $cpfData['sdl'][$pos];
					$tot = $tot + PayEmployeeLevyPeer::GetLevyByPeriodEmployeeNo($period, $cpfData['empno'][$pos]);
					$ctot += $tot;
					//echo $cpfData['name'][$pos] . ' : ' . $tot . '<br>';
				endif;	
				$pos ++;
			endforeach;
			$grandTotal += $ctot;
			self::PostContrib($edt, $cID,   $ctot , $user);
		endforeach;
		//echo 'Total: ' . $grandTotal . '<Br><br>';
		return;
	}
	
	public static function UpdateCPF($sdt, $edt, $user)
	{
		$empNo = null;
		$empList = self::GetEmployeeListbyDateRange($sdt, $edt);
		$mcs =  0;
		$nano = 0;
		$tckh = 0;
		$acro = 0;
		foreach($empList as $empNo=>$vemp)
		{
			//echo $empNo .' - '. $vemp .'<br>';
			$bp      = PayBasicPayPeer::GetDatabyEmployeeNo( $empNo );
			if ( $bp )
			{
				if ($bp->getCpf() == 'YES')
				{
					$age     = HrEmployeePeer::CPFAge($empNo);
					$empData = self::GetEmployeeDatabyDateRange($empNo, $sdt, $edt);
					$net   = $empData['basi'] + $empData['part'] + $empData['ot'] + $empData['unde'] + $empData['abse'] ;
					if ($bp->getPaidType() == 'STANDARD' )
					{
						if ($bp->getCpfAmount() <  $net)
						{
							$net = $bp->getCpfAmount()? $bp->getCpfAmount(): 0;
						}
					}
					
					$cpf     = self::GetCPFDaily($sdt, $net, $age, DateUtils::DUFormat('Y', $sdt) );
					self::DoSQL(
					'Update hr_employee_daily set 
					cpf_er = '.$cpf['er_share'] .' 
					, cpf_em = '.$cpf['em_share'] .'
					where employee_no = "'.$empNo.'" 
					and trans_date = "'.DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt).'"
					'
					);
						
					switch(strtolower($bp->getCompany()))
					{
						case 'micronclean':                 //sdl + fwl + levy
							$mcs = $mcs + $cpf['er_share'] + $cpf['em_share'];
							break;
						case 'acro solution':
							$nano = $nano + $cpf['er_share'] + $cpf['em_share'];
							break;
						case 'nanoclean':
							$acro = $acro + $cpf['er_share'] + $cpf['em_share'];
							break;
						default:
							$tckh = $tckh + $cpf['er_share'] + $cpf['em_share'];
							break;
					}
				}
			}
		}
		self::PostContrib(DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt), 'micronclean',   $mcs + 260 + 5400 + 100 , $user);	//
		self::PostContrib(DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt), 'acro solution', $acro+ 100 + 100, $user);
		self::PostContrib(DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt), 'nano',          $nano+ 100 + 100, $user);
		self::PostContrib(DateUtils::DUFormat('Y-m-', $sdt). DateUtils::DUFormat('t', $sdt), 't.c. khoo',     $tckh+ 20, $user);
	}

	public static function GetEmployeeNobyDate($empNo, $dt)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::TRANS_DATE, $dt);
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
	public static function ComputeCostByDateRange($empNo, $sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		//$c->add(self::NAME, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$basic = 0;
		$tot = 0;
		$hrs = 0;
		$ot = 0;
		foreach($rs as $r):
			$basic += $r->getBasic() + $r->getMeal() +  $r->getAllowance() + $r->getMonthAllowance() + $r->getPartTime() + $r->getAbsent() + $r->getUndertime() ;
			$ot    += $r->getOt() ;
			$hrs   += $r->getDuration();
		endforeach;
		return array('basic' => $basic, 'ot'=> $ot, 'hrs' => $hrs);
	}

	public static function GetEmployeeListbyDateRange($sdt, $edt, $co=null, $egrp=null, $team=null)
	{
		//var_dump(isset($egrp));
		//var_dump($edt);
		//exit();
		//--------------------------------------- not posted only mao ni
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->addSelectColumn(self::EMPLOYEE_NO);
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		if ($egrp) //(isset($egrp))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::EMPLOYMENT_AS, $egrp);
		}

		if ($team) //(isset($team))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::TEAM, $team);
		}

		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelectRS($c);
//		var_dump($rs);
//		exit();
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
		$empList = array();
		while ($rs->next())
		{
			$empList[$rs->get('EMPLOYEE_NO')] = $rs->get('EMPLOYEE_NO');
		}
		return array_unique($empList);
	}
	
	public static function GetEmployeeByDate($sdt, $edt, $co=null, $egrp=null, $team=null)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		if ($egrp) //(isset($egrp))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::EMPLOYMENT_AS, $egrp);
		}

		if ($team) //(isset($team))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::TEAM, $team);
		}
		$c->add(self::EMPLOYEE_NO, self::ExcludingNumbers() , Criteria::NOT_IN);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::CPF_EM, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	//TEAM SHOULD BE ARRAY A LIST OF TEAMS
	public static function GetEmployeeByDateTeamList($sdt, $edt, $co=null, $condition, $team=null)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		if ($co):
			$c->add(self::COMPANY, $co);
		endif;
		if ($condition == 'IN' ):
			$c->add(self::DEPARTMENT, $team, Criteria::IN);
		endif;
		if ($condition == 'NOTIN' ):
			$c->add(self::DEPARTMENT, $team, Criteria::NOT_IN);
		endif;
		$c->add(self::EMPLOYEE_NO, self::ExcludingNumbers() , Criteria::NOT_IN);
		$c->addAscendingOrderByColumn(self::DEPARTMENT);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addGroupByColumn(self::EMPLOYEE_NO);
		//$c->add(self::CPF_EM, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetEmployeeListByDate($sdt, $edt, $co=null, $egrp=null, $team=null)
	{
		//var_dump(isset($egrp));
		//var_dump($edt);
		//exit();
		//--------------------------------------- not posted only mao ni
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->addSelectColumn(self::EMPLOYEE_NO);
		$c->addSelectColumn(self::NAME);
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		if ($co)
		{
			$c->add(self::COMPANY, $co);
		}
		if ($egrp) //(isset($egrp))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::EMPLOYMENT_AS, $egrp);
		}

		if ($team) //(isset($team))
		{
			$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
			$c->add(HrEmployeePeer::TEAM, $team);
		}

		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelectRS($c);
//		var_dump($rs);
//		exit();
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
		$empList = array();
		while ($rs->next())
		{
			$empList[$rs->get('EMPLOYEE_NO')] = $rs->get('NAME');
		}
		return array_unique($empList);
	}
	
	

	public static function GetEmployeeDatabyDateRange($empNo, $sdt, $edt, $perday=null)
	{
		//--------------------------------------- not posted only aw
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->addSelectColumn(self::EMPLOYEE_NO);
		$c->addSelectColumn(self::NAME);
		$c->addSelectColumn(self::DEPARTMENT);
		$c->addSelectColumn(self::COMPANY);
		$c->addSelectColumn(self::BASIC);
		$c->addSelectColumn(self::PART_TIME);
		$c->addSelectColumn(self::OT);
		$c->addSelectColumn(self::ALLOWANCE);
		$c->addSelectColumn(self::MEAL);
		$c->addSelectColumn(self::UNDERTIME);
		$c->addSelectColumn(self::ABSENT);
		$c->addSelectColumn(self::CPF_ER);
		$c->addSelectColumn(self::CPF_EM);
		$c->addSelectColumn(self::MONTH_ALLOWANCE);
		$c->addSelectColumn(self::SHIFT);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$rs = self::doSelectRS($c);
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);

		//$empNo='';
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

		while ($rs->next())
		{

			//$empNo = $rs->get('EMPLOYEE_NO');
			$name  = $rs->get('NAME');
			$dept  = $rs->get('DEPARTMENT');
			$comp  = $rs->get('COMPANY');
			if ($perday)  //computed daily, not total whole month... used in Batch File
			{
				$basi  = $rs->get('BASIC') + $basi;
			}else{
				$basi = PayBasicPayPeer::GetBasicPaybyEmployeeNo($empNo);
			}
			$mall  = $rs->get('MONTH_ALLOWANCE') + $mall;
			$part  = $rs->get('PART_TIME') + $part ;
			$ot    = $rs->get('OT') + $ot;
			$allo  = $rs->get('ALLOWANCE') + $allo;
			$meal  = $rs->get('MEAL') + $meal;
			$unde  = $rs->get('UNDERTIME') + $unde;
			$abse  = $rs->get('ABSENT') + $abse;
			$cpfer = $rs->get('CPF_ER') + $cpfer;
			$cpfem = ($rs->get('CPF_EM') * -1) + $cpfem;
		}
		$allo = $mall + $allo;
		//$tota = ($basi + $ot + $mall + $meal + $part + $unde + $abse + $cpfem + $cpfer);
		$tota = $basi + $part + $ot + $allo + $meal + $unde + $abse + $cpfem ;

		$empData = array(
    	    'empNo'=> $empNo,
    		'name'=> $name,
    		'dept'=> $dept,
    		'comp'=> $comp,
    		'basi'=> $basi,
        	'part'=> $part,
        	'ot'  => $ot,
    		'allo'=> $allo,
        	'meal'=> $meal,
        	'unde'=> $unde,
            'abse'=> $abse,
            'cpfem'=>$cpfem,
        	'cpfer'=>$cpfer,
            'assoc'=>0,
    		'tota'=> $tota
		);

		return $empData;
	}


	public static function GetCPFDaily($dt, $net, $age, $cpfyear)
	{
		//echo $dt .' ** '. $net .' ** '. $age .'<br>';
		//$net = 502.5;
		$mess = '';
		if (!$age){
			return array('total'=>0, 'em_share'=>0, 'er_share'=>0, 'desc'=>'', 'cpfyear'=>'');
		}
		$cpfRule = CpfGovtRulePeer::GetAllData($dt, $net, $age, $cpfyear);
		if (!$cpfRule)
		{
			return array('total'=>0, 'em_share'=>0, 'er_share'=>0, 'desc'=>'', 'cpfyear'=>'');
		}
		$net       = ($net > 4500)? 4500 : $net;
		$tcpf      = 0;
		$emcpf     = 0;
		$mess      = $mess . $cpfRule->getDescription();
		$erformula = ($cpfRule->getErFormula()) ? $cpfRule->getErFormula() : 0;
		$emformula = ($cpfRule->getEmFormula()) ? $cpfRule->getEmFormula() : 0;
		eval("\$tcpf  = $erformula;");
		eval("\$emcpf = $emformula;");
		$mess = array('total'=>round($tcpf), 'em_share'=>intval($emcpf), 'er_share'=>round($tcpf) - intval($emcpf), 'desc'=>$cpfRule->getDescription(), 'cpfyear'=>$cpfRule->getCpfYear());

		return $mess;
	}

	public static function DoSQL($sql)
	{
		$con = Propel::getConnection('hr');
		$stmt = $con->PrepareStatement($sql);
		$rs = $stmt->executeQuery(ResultSet::FETCHMODE_ASSOC);
		return $rs;
	}

	 
	public static function PostDailyData($sdate, $edate, $user, $company)
	{
		$empList = HrEmployeeDailyPeer::GetEmployeeListbyDateRange($sdate, $edate, $company);
		$gtota = 0;
		$company = strtolower($company);
		$co = 0;
		$co = self::GetCompanyId($company);
		$cpf = 0;
		$cpfData =0;
		for($x=0; $x<= DateUtils::DateDiff('d', $sdate, $edate); $x++)
		{
			$cdt = DateUtils::AddDate($sdate, $x);
			$gtota  = 0;
			foreach($empList as $ke=>$empNo)
			{
				$empData = HrEmployeeDailyPeer::GetEmployeeDatabyDateRange($empNo, $cdt, $cdt, 'perday');
				$gtota = $gtota + $empData['tota'] - $empData['cpfer'];
				/*  ADDED TO GET THE LAST CPF AMOUNT */
// 				$pcode = PayEmployeeLedgerArchivePeer::GetLatestPeriodCode();
// 				$cpfData = PayEmployeeLedgerArchivePeer::GetCpfDataByEmployee($empNo, $pcode);
// 				if ($cpfData):
// 					$cpf = $cpfData->getAmount() + $cpfData->getCpfEr();
// 					$gtota = $gtota + $cpf;
// 				endif;
			}
			 
			$record = FinanceSummaryPeer::GetSourceCompanyandDate('SUBCON - HR Forecast', $co, $cdt);
			if (! ($record) )
			{
				$record = new FinanceSummary();
				$record->setCreatedBy($user);
				$record->setDateCreated(DateUtils::DUNow());
			}

			$record->setCompanyId($co);
			$record->setComponent('SUBCON - HR Forecast');
			$record->setValue($gtota);
			$record->setTransDate($cdt);
			$record->setIncomeExpense('EXPENSE');
			$record->setClassification('EXPENSE');
			$record->setModifiedBy($user);
			$record->setDateModified(DateUtils::DUNow());
			$record->save();
		}
	}

	public static function PostContrib($dt, $co, $amt, $user)
	{
		$desc = 'SUBCON GOVERNMENT (CPF/SDL/FWL/LEVY)';
		echo $co .' : ' .$desc . ' < '.$dt. ' : '. $amt.' >\n';
		//$co = self::GetCompanyId($co);
		$record = FinanceSummaryPeer::GetSourceCompanyAndDate($desc, $co, $dt);
		if (! ($record) )
		{
			$record = new FinanceSummary();
			$record->setCreatedBy($user);
			$record->setDateCreated(DateUtils::DUNow());
		}
		$record->setCompanyId($co);
		$record->setComponent($desc);
		$record->setValue($amt);
		$record->setTransDate($dt);
		$record->setIncomeExpense('EXPENSE');
		$record->setClassification('EXPENSE');
		$record->setModifiedBy($user);
		$record->setDateModified(DateUtils::DUNow());
		$record->save();
		//	    echo $co .' - '. $amt;
		//	    exit();
	}
	 
	public static function GetCompanyId($company)
	{
		$co = '';
		switch($company)
		{
			case 'acro solution':
				$co = 2;
				break;
			case 'micronclean':
				$co = 1;
				break;
			case 'nanoclean':
				$co = 5;
				break;
			case 't.c. khoo':
				$co = 4;
				break;
		}
		return $co;
	}

	public static function SumEmployeeData($empData)
	{
		$gbasi = 0;
		$gpart = 0;
		$got   = 0;
		$gallo = 0;
		$gmeal = 0;
		$gunde = 0;
		$gabse = 0;
		$gcpfr  = 0;
		$gcpfm  = 0;
		$gtota = 0;
		if (is_array($empData))
		{
			$gbasi = $gbasi + $empData['basi'];
			$gpart = $gpart + $empData['part'];
			$got   = $got   + $empData['ot'];
			$gallo = $gallo + $empData['allo'];
			$gmeal = $gmeal + $empData['meal'];
			$gunde = $gunde + $empData['unde'];
			$gabse = $gabse + $empData['abse'];
			$gcpfr = $gcpfr + $empData['cpfer'];
			$gcpfm = $gcpfm + $empData['cpfem'];
			$gtota = $gbasi + $gpart + $got + $gallo + $gmeal + $gunde + $gabse + $gcpfr + $gcpfm;
		}

		return $gtota;
	}
	 
	public static function GetEmployeeManHours($sdt, $edt, $empNo)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		$c->add(self::EMPLOYEE_NO, $empNo);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByDateRange($sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByDateRangeByEmployeeList($sdt, $edt, $employeeList)
	{
		$c = new Criteria();
		$c->add(self::TRANS_DATE,  'DATE(' . self::TRANS_DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::TRANS_DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		$c->add(self::NAME, $employeeList, Criteria::IN);
		$rs = self::doSelect($c);
		return $rs;
	}
	 
	
	public static function PopulateContributionData($period)
	{
		$empNoList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($period);
		$empData = array('empno'=>array(), 'name'=>array(), 'amount'=>array(),
				'er_share'=>array(), 'em_share'=>array(), 'cdac'=>array(),
				'sinda'=>array(), 'mbmf'=>array(),
				'er_share'=>array(), 'em_share'=>array(), 'tot_cpf'=>array(),
				'sdl'=>array(), 'wage'=>array(),
				'total'=>array(), 'islevy'=>array(),
				'grossInc'=>array(), 'grossDed'=>array(),
		);
//  				var_dump($empNoList);
//  				var_dump($period);
//  				exit();
		foreach ($empNoList as $kemp=>$vno)
		{
			$data = PayEmployeeLedgerArchivePeer::GetEmployeeData($period, $kemp);
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
			$pi    = 0;
			$co    = '';
			$em_share = 0;
			$er_share = 0;
			$tot_cpf  = 0;
			$total = 0;
			$sdl   = 0;
			$isLevy = 0;
			$grossInc = 0;
			$grossDed = 0;
	
			foreach($data as $rec)
			{
				//echo $rec->getAcctCode() .' - '. $rec->getAmount().'<br>';
	
				switch($rec->getAcctCode())
				{
					case 'BP':
						$basic = $basic + $rec->getAmount();
						break;
					case 'PI':
						$basic = $basic + $rec->getAmount();
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
					case 'CPF' :
						$cpf  = $cpf + $rec->getAmount();
						$em_share = $em_share + $rec->getAmount();
						$er_share = $er_share + $rec->getCpfEr();
						$tot_cpf  = $tot_cpf  + $rec->getCpfTotal();
						break;
					case 'AP':
						$ap  = $ap + $rec->getAmount() ;
						break;
					case 'OT':
						if ($rec->getAmount() > 0)
						{
							$ot = $ot + $rec->getAmount();
						}else{
							$advot = $advot + $rec->getAmount() ;
						}
						break;
					case 'CBS':
						break;
					case 'TD':
						$others = $others + $rec->getAmount();
						break;
					case 'UL':
						$others = $others + $rec->getAmount();
						break;
					default:
						if ($rec->getIncomeExpense() == '1')
						{
							$others = $others + $rec->getAmount();
						}
						break;
				}
				$empno = $rec->getEmployeeNo();
				$name  = $rec->getName();
				$co    = $rec->getCompany();
				if ($rec->getAmount() > 0 && $rec->getAcctCode() != 'CBS')
				{
					$grossInc= $grossInc + $rec->getAmount();
				}else{
					$grossDed= $grossDed + $rec->getAmount();
				}
				//                echo $empno .' - '.  $rec->getAcctCode() .' = ' . $rec->getAmount() . ' [ot] ' . $ot;
				//                echo '<br>';
	
			}
				
			$basic = $basic + (($basic > 0) ? 0 : (-1 * $ap));
			$basic = $basic + $pi;
	
			$total = $basic + $ot + $advot + $others;
			$sdl = $grossInc * .0025;
				
			//			echo $basic .'<---basic <br>'. $ot .'<---Ot <br>'. $advot .'<---advot <br>'. $others .'<---others <br>';
			//			echo $grossInc ;
			//			exit();
	
			if ($sdl < 2)
			{
				$sdl = 2;
			}
	
			if ($total >= 4500)
			{
				$sdl = 11.25;
			}
				
	
	
			$empData['empno'][]    = $empno;
			$empData['name'][]     = $name;
			$empData['company'][]  = $co;
			$empData['basic'][]    = $basic;
			$empData['ot'][]       = $ot;
			$empData['ap'][]       = (-1 * $ap);
			$empData['adv_ot'][]   = 0; //(-1 * $advot);
			$empData['cdac'][]     = (-1 * $cdac);
			$empData['sinda'][]    = (-1 * $sinda);
			$empData['mbmf'][]     = (-1 * $mbmf);
			$empData['cpf'][]      = $cpf;
			$empData['others'][]   = $others;
			$empData['sdl'][]      = round($sdl, 2);
			$empData['em_share'][]   = ($em_share <> 0 )? $em_share * -1 : 0 ;
			$empData['er_share'][]   = ($er_share <> 0 )? $er_share * -1 : 0 ;
			$empData['tot_cpf'][]    = ($tot_cpf <> 0 )?  $tot_cpf * -1 : 0 ;
			$empData['wage'][]       = $total;
			$empData['islevy'][]     = $isLevy;
			$empData['grossInc'][]     = $grossInc;
			$empData['grossDed'][]     = $grossDed;
			
		}
	
		return $empData;
	
	}
	
	public static function GetLastUpdate()
	{

		$c = new Criteria();
		$c->addDescendingOrderByColumn(self::DATE_MODIFIED);
		$rs = self::doSelectOne($c);
		$lastUpdate = '';
		if ($rs):
			$lastUpdate = $rs->getDateModified() .' on ' . $rs->getTransDate() .' ';
		endif;
		return $lastUpdate;
	}
	
	public static function ExcludingNumbers()
	{
		return array('11111', '12345', '987654321');
	}
	
}