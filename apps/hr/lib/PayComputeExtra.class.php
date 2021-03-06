<?php
class PayComputeExtra
{
	var $ndays =  0;        // days per month
	var $hpday  = 0;        // hours per day
	var $empno  = '';
	var $pmin   = 0;
	var $ot     = 0;
	var $ut     = 0;
	var $mu     = 0;
	var $basic  = 0;
	var $process= false;

	function _construct()
	{
	}

	function _destruct()
	{

	}

	public function PrepareDtrData($emparr, $sdate, $edate, $user)
	{
		$cntr = 0;
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'), true);  //load holiday
		$this->leave= HrEmployeeLeavePeer::GetAllDatabyYear(sfConfig::get('fiscal_year')); //get leave
		$holinfo = HrHolidayPeer::getDateHolByDate();   //get holiday
		foreach ($emparr as $vemp)
		{
			if ($vemp)
			{
				
				$empno      = $vemp->getEmployeeNo();
				$this->name = $vemp->getName();
				$wtno       = $vemp->getTkWorktemplateNo();
				$employment = $vemp->getTypeOfEmployment();
				$this->cal->setLeave(self::EmpLeave($empno));  //---------- try to retrive all then use filter to feed
				
				$wtmp   = TkWorktemplateDetailPeer::GetWorkTempDetailbyWTNo($wtno, $holinfo['dates_hol']);
				$nwrktmp= TkWorktemplatePeer::GetDatabyWorktemplateNo($wtno);
				$suc = self::processdtr($empno, $wtno, $sdate, $edate, $employment, $this->cal, $this->name, $user, $vemp->getCompany(), $nwrktmp, $wtmp);
				$cntr++ ;
			}
			//exit();
		}
		unset($this->cal);
		return $cntr;
	}

	public function PrepareDtrDataOptimized($emparr, $sdate, $edate, $user)
	{
		 
		$cntr = 0;
		$this->cal = new TkCalendar(sfConfig::get('fiscal_year'), true);  //load holiday
		$this->leave= HrEmployeeLeavePeer::GetAllDatabyYear(sfConfig::get('fiscal_year')); //get leave

		while($emparr->next())
		{
			$empno      = $emparr->get('EMPLOYEE_NO');
			$this->name = $emparr->get('NAME');
			$wtno       = $emparr->get('TK_WORKTEMPLATE_NO');
			$employment = $emparr->get('TYPE_OF_EMPLOYMENT');
			$this->cal->setLeave(self::EmpLeave($empno));  //---------- try to retrive all then use filter to feed
			$suc = self::processdtr($empno, $wtno, $sdate, $edate, $employment, $this->cal, $this->name, $user, $emparr->get('COMPANY'));
			//echo $cntr++ .' - '.$this->name .  '<br>';
		}
		return $cntr;
	}

	protected function EmpLeave($empNo)
	{
		//$empNo = '401543732121203';
		$x = 0;
		$leave = array('from'=>array(), 'to'=>array(), 'leave_type'=>array(), 'half_day'=>array(), 'id'=>array(), 'employee_no'=>array());
		foreach($this->leave['employee_no'] as $kv=>$vt)
		{
			//echo $x .' =   '. $vt .' - ' .$this->leave['from'][$x] .'<br>';
			if ($vt == $empNo)
			{
				//echo $x .' =   '. $vt .' - ' .$this->leave['from'][$x] .'<br>';
				$leave['from'][]       = $this->leave['from'][$x];
				$leave['to'][]         = $this->leave['to'][$x];
				$leave['leave_type'][] = $this->leave['leave_type'][$x];
				$leave['half_day'][]   = $this->leave['half_day'][$x];
				$leave['id'][]         = $this->leave['id'][$x];
				$leave['employee_no'][]= $this->leave['employee_no'][$x];
			}

			$x++;
		}
//		var_dump($leave);
//		exit();
		return $leave;
	}

	public function IsProcessed()
	{
		return ($this->process);
	}

	//----------------------- compute income deduction based on DTR
	//public function ComputeExtra($empno, $dt, $ot, $ut, $mu, $att, $dof)
	public function ComputeExtra($rec, $wrktmp, $hd, $bp, $othIncome)
	{
		$ot = $rec->getOvertimes();
		$mu = $rec->getMultiplier();
		$ut =($rec->getUndertime() * -1);
		$att= $rec->getAttendance();
		$dof= $rec->getDayoff();
		$extraOtHrs = $rec->getExtraOt();
		$extraOtPay = 0;
		$perhour = 0;
		$orph    = 0;
		$tut     = $ut;
		$othInc = array();
		$oIpd = array();
		if  (! $bp)
		{
			$this->process = false;
			return;
		}

		$all     = $bp->getAllowance();
		$levy    = $bp->getLevy();
		$allpd   = 0;



		// 1,500MONTHLY / 24DAYS / 8HRS / 60MIN = .130 PERMINUTE RATE
		$this->empno = $rec->getEmployeeNo();

		if (!$bp)
		{
			$this->process = false;
			return 0;
		}


		if ($wrktmp->getTypeOfEmployment() == 'PART-TIME')
		{
			$perhour = $bp->getHourlyRate();
			$bas = 0;
			$ut  = 0;
		}else{
			$perhour = $bp->getScheduledAmount() / $hd['days'] / $hd['hours'];
			$bas     = $bp->getScheduledAmount() / $hd['days'];
		}	
		$allpd   =  $all / $hd['days']/ $hd['hours'] ;    //allowance per day
		$levypd  = $levy / $hd['days']/ $hd['hours'] ; //levy per day
		foreach($othIncome as $kOi=>$vOi): //key Ohter Income & Value & income
			$oIpd[$kOi] = $vOi / $hd['days']/ $hd['hours'] ; //other income rate
		endforeach;
		if ($bp->getOtRate())
		{
			$orph = $perhour;
			$perhour = $bp->getOtRate();
		}else{
			$perhour = round($perhour, 3);
		}

		$pmin = $perhour / 2;



		if ($ot > 0)
		{
			$ptinc = ($rec->getAcDura() - $ot) * $perhour;      // partimer income
		}else{
			$ptinc = ($rec->getAcDura()) * $perhour;      // partimer deduction
		}
		//        echo $rec->getAcDura() .' - '. $ut .' := '. $ptinc;
		//        exit();
		if ($att == TkDtrsummaryPeer::FLAG_PRESENT )
		{
			if ($wrktmp->getTypeOfEmployment() !== 'PART-TIME')
			{
				if ($ut > 24)                        //no time in/out - considered absent
				{
					$ut  = 0;
					$bas = 0;
				}else{
					if ($ut > $hd['endurance']/60)
					{
						//$ut =  DateUtils::Hr2Min($ut) * $pmin;
						$ut    = $ut * $perhour;
					}else{
						$ut = 0;
					}
				}
			}
			//        var_dump($this->empno);
			//        var_dump($ot);
			//        var_dump($ut);
			//        exit();
			//$amount = DateUtils::Hr2Min($ot)* $mu * $pmin;   //overtime per minute * multiplier * per minute rate
			//echo $allpd.' = '.$all.' ---- '.$hd['days'].' ---- '. $hd['hours'].' ( '.$ut.' )<br>' ;
			$amount = $ot * $mu * $perhour;
			$amount = round($amount - $ut, 3);                //less undertime
			$extraOtPay = $extraOtHrs * $mu * $perhour;
			$allpd  = -1 * ($allpd * $tut);
			$levypd = -1 * ($levypd * $tut);
			foreach($othIncome as $kOi=>$vOi): //key Ohter Income & Value & income
				$oIpd[$kOi] = -1 * ($oIpd[$kOi] * $tut); //other income rate
			endforeach;			
			//            echo $rec->getName() .' - '.$wrktmp->getTypeofEmployment().'  '.$att.' OT=>'.$ot.' multiplier=>'.$mu.' perhour=>'.$perhour.'<br>';
		}else{
			//------------------- not present presumed absent
			if ($dof == 'Y')
			{
				$amount = 0.00;
				$allpd   = 0;
				$levypd  = 0;
				$ptinc   = 0;
				foreach($othIncome as $kOi=>$vOi): //key Ohter Income & Value & income
					$oIpd[$kOi] = 0 ; //other income rate
				endforeach;					
			}else{
				$amount  = round(0 - ($bas), 3);      // make value negative to consider a deduction
				$perhour = $orph;
				$allpd   = -1 * ( $all / $hd['days']);
				$levypd  = -1 * ($levy / $hd['days']);
				$ptinc   = 0;
				foreach($othIncome as $kOi=>$vOi): //key Ohter Income & Value & income
					$oIpd[$kOi] = -1 * ($vOi / $hd['days']); //other income rate
				endforeach;				
				//--------------------- no deduction for this leave type
				//kebot
				if (trim($rec->getLeaveType()) == 'Others(Basic Only)')
				{
					$levypd = 0;
					$allpd  = 0;
					foreach($othIncome as $kOi=>$vOi): //key Ohter Income & Value & income
						$oIpd[$kOi] = 0 ; //other income rate
					endforeach;					
				}
			}
		}
		$this->process = true;
		//echo $amount;
		//echo $this->empno.': ( '.$dt.' / '.$ut.' / '.$ot.'* '.$mu.'  /  ) '.  ($bas) .' + '.$amount.' = '.$amount.'<br>';
		//echo $perhour.' : '.$pmin;
		//echo $rec->getName() .' - '.$wrktmp->getTypeofEmployment().'  '.$att.' - amount=> '.$amount.' - partime Income=>'.$ptinc.'<br>';
		//echo $rec->getTransDate().' -- '.$rec->getName() .' - '. $allpd .'  '. $all. '<br>';
		return array('amount'=>$amount, 'rph'=>$perhour, 'parttime'=>$ptinc, 'allowance'=>$allpd, 'levy'=>$levypd, 'otherIncome'=>$oIpd, 'extraOtPay'=>$extraOtPay);
	}

	public function SaveToScheduledIncome($batch, $user, $empNo)
	{

		$record = $this->doSQL(
        "SELECT employee_no, name, income_prepost_batch, sum(posted_amount) as amount 
        FROM tk_dtrsummary 
        WHERE INCOME_PREPOST_BATCH = '".$batch."'
        and IS_POSTED = 'Y'
        GROUP BY EMPLOYEE_NO"        
        );
        /*
         * Usually Grouped per Employee...
         */
        for($x=1; $x <= $record->getRecordCount(); $x++)
        {
        	$record->next();
        	$data = PayScheduledIncomePeer::GetDatabyEmployeeNoPeriodCodeAcctCode($record->getstring('employee_no'), $record->getstring('income_prepost_batch'), 'OT' );
        	if (!$data)
        	{
        		$data   = new PayScheduledIncome();
        	}
        	if (round($record->getfloat('amount'), 2) > 0)
        	{
        		$data->setEmployeeNo($record->getstring('employee_no'));
        		$data->setName($record->getstring('name'));
        		$data->setTotalAmount(round($record->getfloat('amount'), 2));
        		$data->setScheduledAmount(round($record->getfloat('amount'), 2));
        		$data->setIncomePrepostBatch($record->getstring('income_prepost_batch'));
        		$data->setTaxableAmount(round($record->getfloat('amount'), 2));
        		$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
        		$data->setTaxPercentage(round(100,0));
        		$data->setAcctCode('OT');         //2-overtime
        		$data->setDescription('OVERTIME  ('.$batch.' )');
        		$data->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
        		$data->setFromDate(DateUtils::GetPrevMonthStartDate());
        		$data->settoDate(DateUtils::GetNextMonthsEndDate(1));
        		$data->setDateCreated(DateUtils::DUNow());
        		$data->setCreatedBy($user);
        		$data->setDateModified(DateUtils::DUNow());
        		$data->setModifiedBy($user);
        		$data->save();
        		$unset($data);
        	}
        }

        /*
         * post partime income
         */
        $sdt = $this->GetStartDate($batch);
        $edt = $this->GetEndDate($batch);

        $record = $this->doSQL(
        "SELECT employee_no, name, income_prepost_batch, sum(part_time_income) as amount 
        FROM tk_dtrsummary 
        WHERE trans_date >= '".$sdt."' and trans_date <= '".$edt."'
        and INCOME_PREPOST_BATCH = '".$batch."'
        and IS_POSTED = 'Y'
        GROUP BY EMPLOYEE_NO"        
        );
        for($x=1; $x <= $record->getRecordCount(); $x++)
        {
        	$record->next();

        	if ($record->getfloat('amount') > 0)
        	{
        		$data = PayScheduledIncomePeer::GetDatabyEmployeeNoPeriodCodeAcctCode($record->getstring('employee_no'), $record->getstring('income_prepost_batch'), 'PI' );
        		if (!$data)
        		{
        			$data   = new PayScheduledIncome();
        		}
        		if (round($record->getfloat('amount'), 2) > 0)
        		{
        			$data->setEmployeeNo($record->getstring('employee_no'));
        			$data->setName($record->getstring('name'));
        			$data->setTotalAmount(round($record->getfloat('amount'), 2));
        			$data->setScheduledAmount(round($record->getfloat('amount'), 2));
        			$data->setIncomePrepostBatch($record->getstring('income_prepost_batch'));
        			$data->setTaxableAmount(round($record->getfloat('amount'), 2));
        			$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
        			$data->setTaxPercentage(round(100,0));
        			$data->setAcctCode('PI');         //2-overtime
        			$data->setDescription('PART-TIME INCOME  ('.$batch.' )');
        			$data->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
        			$data->setFromDate(DateUtils::GetPrevMonthStartDate());
        			$data->settoDate(DateUtils::GetNextMonthsEndDate(1));
        			$data->setDateCreated(DateUtils::DUNow());
        			$data->setCreatedBy($user);
        			$data->setDateModified(DateUtils::DUNow());
        			$data->setModifiedBy($user);
        			$data->save();
        			$unset($data);
        		}
        	}

        }

        /*
         * post meal Allowance
         */
        $sdt = $this->GetStartDate($batch);
        $edt = $this->GetEndDate($batch);

        $record = $this->doSQL(
        "SELECT employee_no, name, income_prepost_batch, sum(meal) as amount 
        FROM tk_dtrsummary 
        WHERE trans_date >= '".$sdt."' and trans_date <= '".$edt."'
        and INCOME_PREPOST_BATCH = '".$batch."'
        and IS_POSTED = 'Y'
        GROUP BY EMPLOYEE_NO"        
        );
        for($x=1; $x <= $record->getRecordCount(); $x++)
        {
        	$record->next();

        	if ($record->getfloat('amount') > 0)
        	{
        		$data = PayScheduledIncomePeer::GetDatabyEmployeeNoPeriodCodeAcctCode($record->getstring('employee_no'), $record->getstring('income_prepost_batch'), 'MR' );
        		if (!$data)
        		{
        			$data   = new PayScheduledIncome();
        		}
        		if (round($record->getfloat('amount'), 2) > 0)
        		{
        			$data->setEmployeeNo($record->getstring('employee_no'));
        			$data->setName($record->getstring('name'));
        			$data->setTotalAmount(round($record->getfloat('amount'), 2));
        			$data->setScheduledAmount(round($record->getfloat('amount'), 2));
        			$data->setIncomePrepostBatch($record->getstring('income_prepost_batch'));
        			$data->setTaxableAmount(round($record->getfloat('amount'), 2));
        			$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
        			$data->setTaxPercentage(round(100,0));
        			$data->setAcctCode('MR');         //2-overtime
        			$data->setDescription('MEAL REIMBURSEMENT  ('.$batch.' )');
        			$data->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
        			$data->setFromDate(DateUtils::GetPrevMonthStartDate());
        			$data->settoDate(DateUtils::GetNextMonthsEndDate(1));
        			$data->setDateCreated(DateUtils::DUNow());
        			$data->setCreatedBy($user);
        			$data->setDateModified(DateUtils::DUNow());
        			$data->setModifiedBy($user);
        			$data->save();
        			$unset($data);
        		}
        	}

        }

        /*
         * Allowance
         */
        $sdt = $this->GetStartDate($batch);
        $edt = $this->GetEndDate($batch);

        //        $record = $this->doSQL(
        //        "SELECT employee_no, name, income_prepost_batch, (sum(allowance) * -1) as amount
        //        FROM tk_dtrsummary
        //        WHERE trans_date >= '".$sdt."' and trans_date <= '".$edt."'
        //        and IS_POSTED = 'Y'
        //        GROUP BY EMPLOYEE_NO"
        //        );

        if ($empNo)
        {
        	$record = $this->doSQL(
            "SELECT employee_no, name, allowance 
            FROM pay_basic_pay
            WHERE allowance > 0
            and employee_no = '".$empNo."'
            ");
        }else{
        	$record = $this->doSQL(
            "SELECT employee_no, name, allowance 
            FROM pay_basic_pay 
            WHERE allowance > 0
            ");
        }
        //        and employee_no in
        //        (select employee_no      FROM tk_dtrsummary
        //            WHERE trans_date >= '".$sdt."' and trans_date <= '".$edt."'
        //            and INCOME_PREPOST_BATCH = '".$batch."'
        //            and IS_POSTED = 'Y'
        //            GROUP BY EMPLOYEE_NO )

        if ($record)
        {
        	for($x=1; $x <= $record->getRecordCount(); $x++)
        	{
        		$record->next();
        		$data = PayScheduledIncomePeer::GetDatabyEmployeeNoPeriodCodeAcctCode($record->getstring('employee_no'), $batch, 'ML' );
        		if (!$data)
        		{
        			$data   = new PayScheduledIncome();
        		}
        		$amt = TkDtrsummaryPeer::GetTotalAllowance($record->getString('employee_no'), $sdt, $edt );
        		$amt = round($record->getfloat('allowance'), 2) + $amt;
        		$data->setEmployeeNo($record->getString('employee_no'));
        		$data->setName($record->getString('name'));
        		$data->setTotalAmount($amt);
        		$data->setScheduledAmount($amt);
        		$data->setIncomePrepostBatch($batch);
        		$data->setTaxableAmount($amt);
        		$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
        		$data->setTaxPercentage(round(100,0));
        		$data->setAcctCode('ML');         //2-overtime
        		$data->setDescription('MONTHLY ALLOWANCE  ('.$batch.' )');
        		$data->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
        		$data->setFromDate(DateUtils::GetPrevMonthStartDate());
        		$data->settoDate(DateUtils::GetNextMonthsEndDate(1));
        		$data->setDateCreated(DateUtils::DUNow());
        		$data->setCreatedBy($user);
        		$data->setDateModified(DateUtils::DUNow());
        		$data->setModifiedBy($user);
        		$data->save();
        		$unset($data);
        	}
        }




        //MYSQLResultset::getFloat()
	}


	public function SaveIncome($eNo, $name, $amt, $batch, $acct, $desc, $user, $entry)
	{
		$data = PayScheduledIncomePeer::GetSystemDatabyEmployeeNo($eNo, $batch, $acct );
		if (! $data)
		{
			$data   = new PayScheduledIncome();
		}
		$amt = round($amt, 2);
		$data->setEmployeeNo($eNo);
		$data->setName($name);
		$data->setTotalAmount($amt);
		$data->setScheduledAmount($amt);
		$data->setIncomePrepostBatch($batch);
		$data->setTaxableAmount($amt);
		$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
		$data->setTaxPercentage(round(100,0));
		$data->setAcctCode($acct);         //2-overtime
		$data->setDescription($desc.' ('.$batch.' )');
		$data->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
		$data->setFromDate(DateUtils::GetPrevMonthStartDate());
		$data->settoDate(DateUtils::GetNextMonthsEndDate(1));
		$data->setEntryType($entry);
		$data->setDateCreated(DateUtils::DUNow());
		$data->setCreatedBy($user);
		$data->setDateModified(DateUtils::DUNow());
		$data->setModifiedBy($user);
		$data->save();
		unset($data);
	}

	public function SaveDeduction($eNo, $name, $amt, $batch, $acct, $desc, $user, $entry)
	{
		//$data = PayScheduledIncomePeer::GetDatabyEmployeeNoPeriodCodeAcctCode($record->getstring('employee_no'), $batch, $acct );
		$data = PayScheduledDeductionPeer::GetSystemDatabyEmployeeNo($eNo, $batch, $acct );
		if (! $data)
		{
			$data   = new PayScheduledDeduction();
		}
		$data->setEmployeeNo($eNo);
		$data->setName($name);
		$data->setTotalAmount(round($amt, 2));
		$data->setScheduledAmount(round($amt, 2));
		$data->setDeductionPrepostBatch($batch);
		//----------------------- should be change if frequency is not only monthly
		$data->setFrequency(PayScheduledIncome::FLAG_FREQUENCY_MONTHLY);
		$data->setAcctCode($acct);         //2-ABSENCES DEDUCTION
		$data->setDescription($desc .'  ('.$batch.' )');
		$data->setStatus(PayScheduledDeductionPeer::FLAG_STATUS_ACTIVE);
		$data->setFromDate(DateUtils::GetPrevMonthStartDate());
		$data->settoDate(DateUtils::GetNextMonthsEndDate(12));
		$data->setEntryType($entry);
		$data->setDateCreated(DateUtils::DUNow());
		$data->setCreatedBy($user);
		$data->setDateModified(DateUtils::DUNow());
		$data->setModifiedBy($user);
		$data->save();
		unset($data);
	}

	public function AbsentWholeMonth($batch, $user, $aCode)
	{
		//        echo $this->GetStartDate($batch).' - ';
		//        echo $this->GetEndDate($batch) .'<br>';
		if ( DateUtils::DateDiff('d', $this->GetStartDate($batch), $this->GetEndDate($batch) ) < 28 )
		{
			return;
		}
		$eList  = TkDtrmasterPeer::GetAllEmployeeNo();
		$sdt    = $this->GetStartDate($batch);
		$edt    = $this->GetEndDate($batch);
		foreach ($eList as $emp)
		{
			$flag   = true;     //is absent whole month?
			$empNo = $emp->getEmployeeNo();
			//            echo $batch.' - '.$sdt .' - '. $edt .': '.$empNo;
			$record = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange1($empNo, $sdt, $edt);
			foreach($record as $rec)
			{
				if ( ($rec->getAttendance() == 'P') && ($rec->getNormal() > 0) && (!$rec->getHolidayCode())  )
				{
					$flag = false;
				}
				//                echo $rec->getEmployeeNo() .' - '. $rec->getName().' - '. $rec->getTransDate().' - '.$rec->getNormal().' - '.$rec->getAttendance().' - '.$rec->getDuration().' : '.$flag.'<br>' ;
			}
			//            echo $rec->getEmployeeNo().' - '.$flag.'<br>';
			if ($flag)
			{
				$data = PayScheduledDeductionPeer::GetDatabyEmployeeNoBatchNoAcctCode($empNo, $batch, $aCode);
				if ($data)
				{
					$data->setTotalAmount(PayBasicPayPeer::GetBasicPaybyEmployeeNo($rec->getEmployeeNo()) * -1 );
					$data->setScheduledAmount(PayBasicPayPeer::GetBasicPaybyEmployeeNo($rec->getEmployeeNo()) * -1 );
					$data->save();
				}
			}
		}
		 
	}

	public function SaveToScheduledDeduction($batch, $user)
	{
		$aCode = 'UL';  //absences
		$tCode = 'TD';  //tardy
		/*
		 * PROCESSING FOR TARDY
		 */
		$record = $this->doSQL("
            SELECT employee_no, name, deduction_prepost_batch, sum(posted_amount) as amount
            FROM tk_dtrsummary
            WHERE DEDUCTION_PREPOST_BATCH = '".$batch."'
            AND ATTENDANCE = 'P'
            AND IS_POSTED = 'Y' 
            GROUP BY EMPLOYEE_NO
        ");
		for($x=1; $x <= $record->getRecordCount(); $x++)
		{
			$record->next();
			$this->SaveDeduction($record->getstring('employee_no'), $record->getstring('name'), round($record->getfloat('amount'), 2), $batch, 'TD', 'Tardy/Late Deduction', $user);
		}

		/*
		 * PROCESSING FOR ABSENCES
		 */
		$record = $this->doSQL("
            SELECT employee_no, name, deduction_prepost_batch, sum(posted_amount) as amount
            FROM tk_dtrsummary
            WHERE DEDUCTION_PREPOST_BATCH = '".$batch."'
            AND ATTENDANCE = 'A' AND DAYOFF <> 'Y'
            AND IS_POSTED = 'Y' 
            GROUP BY EMPLOYEE_NO
            ");
		for($x=1; $x <= $record->getRecordCount(); $x++)
		{
			$record->next();
			$this->SaveDeduction($record->getstring('employee_no'), $record->getstring('name'), round($record->getfloat('amount'), 2), $batch, $aCode, 'Unpaid Leave / Absences', $user);
		}

		$this->absentWholeMonth($batch, $user, $aCode);

		/*
		 * PROCESSING FOR LEVY
		 */
		$record = $this->doSQL("
            SELECT employee_no, name, deduction_prepost_batch, sum(levy) as amount
            FROM tk_dtrsummary
            WHERE DEDUCTION_PREPOST_BATCH = '".$batch."'
            AND IS_POSTED = 'Y' 
            GROUP BY EMPLOYEE_NO
            HAVING amount <> 0
            ");
		for($x=1; $x <= $record->getRecordCount(); $x++)
		{
			$record->next();
			$this->SaveDeduction($record->getstring('employee_no'), $record->getstring('name'), round($record->getfloat('amount'), 2), $batch, 'LV', 'Levy', $user);
		}


		return;
	}

	//----------------------- individual monthly
	public function computeFullTimeIndividual($empno, $pcode, $user, $freq, $cash)
	{
		//$empno = 'S7937236F';
		//$empno = 'S1171855H';
		$this->empno = $empno;
		$this->pcode = $pcode;
		$this->user  = $user;
		$cpfBase     = 0;
		$this->cash  = $cash;
		$this->acctNo= null;
		$this->isCpfCompute = null;
		$totamt = 0;
		$cpfAmt = 0;
		$isBank = '';

		//---------------- delete previous processing
		PayEmployeeLedgerPeer::DeleteDatabyEmpNoPeriodCode($empno, $pcode);

		//---------------- delete log
		//$this->deletelogs();

		$this->basic  = PayBasicPayPeer::GetDatabyEmployeeNo($empno);

		if (!$this->basic)
		{
			return '<br>Please Define basic Pay for '.$empno;
		}

		//-------------------------- get race
		$emp = HrEmployeePeer::GetDatabyEmployeeNo($empno);
		if (! $emp)
		{
			return '<br>Employee is non-existent '.$empno;
		}
		//echo $empno . '<br>';
		$race = $emp->getRace();
		 
		$this->acctNo = $emp->getAcctNo();

		if ($freq == 'MONTHLY' || $freq == 'SPECIAL')
		{
			//----------------------- get B A S I C   P A Y
			$acct = $this->basic->getAcctCode();
			$acct = $acct? $acct : 'BP';
			$desc = PayAccountCodePeer::GetDescriptionbyAcctCode($acct);
			$amt  = $this->basic->getBasicAmount();
			$inex = '1';
			$acso = 'B';     //account source
			$pras = 'Basic'; //basic /income /deduction
			$tamt = $amt;    //taxable amount default to 100% until settled
			if ( $amt )
			{
				//---------------------------------- BASIC PAY SPLIT TO CASH/BANK
				$cpfAmt = $this->basic->getCpfAmount();
				if ( ($amt > $cpfAmt) && ($cpfAmt > 0 ) )
				{
					$this->isCpfCompute = 'NO';
					$this->saver($freq, '', '' ,$acct, $desc . '- Cash Only', $amt - $cpfAmt, $inex, $acso, $pras, $tamt, $race);
					$amt = $cpfAmt;

					//echo $empno .' '. $inc->getAcctCode() .' - '.$cpfAmt .'<br>';
				}

				//-------------------- get total
				$this->isCpfCompute = "YES";
				$isBank = $this->saver($freq, '', '', $acct, $desc, $amt, $inex, $acso, $pras, $tamt, $race);
				if ( $isBank == 'BANK' || $isBank == 'CHEQUE' )
				{
					$cpfBase = $amt; //get basic pay for cpf
				}
			}
			//*********************************************************************************
		}


		//----------------------- get I N C O M E
		$this->income = PayScheduledIncomePeer::GetIncomebyEmployeeNo($empno, $freq);
		$this->UpdateAmountReceived($this->income);
		$this->income = PayScheduledIncomePeer::GetIncomebyEmployeeNo($empno, $freq);
		
		 
		if ($this->income)
		{
			foreach($this->income as $inc)
			{
				 
				//---------------------------- check income effectivity Date
				$dtfrom = DateUtils::DUFormat('Y-m-d', $inc->getFromDate());    //income
				$dtto   = DateUtils::DUFormat('Y-m-d', $inc->getToDate());      //income
				$sdt    = DateUtils::DUFormat('Y-m-d', $this->GetStartDate($pcode)); //frequency
				$edt    = DateUtils::DUFormat('Y-m-d', $this->GetEndDate($pcode));   //frequency
				 

				if ( ($dtfrom >= $sdt) && ($dtfrom <= $edt) ||
				($dtto   >= $sdt) && ($dtto   <= $edt) ||
				($dtfrom <= $sdt) &&  ($dtto >= $edt ) )
				{
					//---------------------------- check scheduled amount if > than balance
					if ( $inc->getScheduledAmount() < ($inc->getTotalAmount() - $inc->getTotAmtReceived()) || $inc->getTotalAmount() == 0)
					{
						$amt  = $inc->getScheduledAmount();
					}else{
						$amt  = $inc->getTotalAmount() - $inc->getTotAmtReceived();
					}

					$incid= $inc->getId();
					$acct = $inc->getAcctCode();
					$desc = $inc->getDescription();
					$inex = '1';
					$acso = 'I';      //account source
					$pras = 'Income'; //basic /income /deduction

					//---------------------------------- P A R T  T I M E  I N C O M E SPLIT TO CASH/BANK
					if ( $inc->getAcctCode() == 'PI' )
					{
						$cpfAmt = $this->basic->getCpfAmount();
						if ( ($amt > $cpfAmt) && ($cpfAmt > 0 ) )
						{
							$this->isCpfCompute = 'NO';
							$this->saver($freq, $incid, '' ,$acct, $desc . '- Cash Only', $amt - $cpfAmt, $inex, $acso, $pras, $tamt, $race);
							$amt = $cpfAmt;
						}
						
					}
					//----------------------------------
					// 
			
					$tamt = $amt;     //taxable amount default to 100% until settled
					$this->isCpfCompute = PayAccountCodePeer::GetCpf($acct);

					$isBank = $this->saver($freq, $incid, '' ,$acct, $desc, $amt, $inex, $acso, $pras, $tamt, $race);


					if ( $isBank == 'BANK' || $isBank == 'CHEQUE')
					{
						$cpfBase = $cpfBase + $amt ;
					}
				}  //effectivity date
				//echo $empno .' '. $inc->getAcctCode() .' - '.$cpfAmt .'<br>';
			} //foreach
		} //income
		//exit();

		if ($freq == 'MONTHLY' || $freq == 'SPECIAL')
		{
			//----------------------------- bank subsidy
			if ($emp->getAcctNo() > 0)
			{
				$acct = 'CBS';
				$this->isCpfCompute = PayAccountCodePeer::GetCpf($acct);
				$this->saver($freq, '', '' , $acct, PayAccountCodePeer::GetDescriptionbyAcctCode($acct), 2, 1, 1, 'Income', 0, $race);
				//$cpfBase = $cpfBase + 2 ;
				//$cpfBase = (PayAccountCodePeer::GetCpf($acct) == 'YES') ? $cpfBase + $amt : $cpfBase;
			}
		}

		if ($freq == 'PAYDAY' || $freq == 'MONTHLY')
		{
			//***********************************************************************************
			//----------------------- get D E D U C T I O N
			$this->deduction = PayScheduledDeductionPeer::GetDeductionbyEmployeeNo($empno, $freq);
			$this->UpdateAmountPaid($this->deduction);
			$this->deduction = PayScheduledDeductionPeer::GetDeductionbyEmployeeNo($empno, $freq);
			//        echo $freq;
			//        var_dump($this->deduction);
			//        exit();
			if ($this->deduction)
			{
				foreach($this->deduction as $ded)
				{
					//---------------------------- check income effectivity Date
					$dtfrom = DateUtils::DUFormat('Y-m-d', $ded->getFromDate());    //income
					$dtto   = DateUtils::DUFormat('Y-m-d', $ded->getToDate());      //income
					$sdt    = DateUtils::DUFormat('Y-m-d', $this->GetStartDate($pcode)); //frequency
					$edt    = DateUtils::DUFormat('Y-m-d', $this->GetEndDate($pcode));   //frequency
					if ( ($dtfrom >= $sdt) && ($dtfrom <= $edt) ||
					($dtto   >= $sdt) && ($dtto   <= $edt) ||
					($dtfrom <= $sdt) && ($dtto >= $edt )  )
					{
						$totamt = $ded->getTotalAmount() * -1;
						$schamt = $ded->getScheduledAmount() * -1;
						$tapaid = $ded->getTotAmtPaid();
						//echo $ded->getId().' - '.$ded->getDescription() .' total:-> '.$totamt.' sched-> '.$schamt.' paid-> '.$tapaid.'<br>';
						//---------------------------- check scheduled amount if > than balance
						if ( $schamt < ( $totamt - $tapaid ) || $totamt == 0)
						{
							$amt  = $schamt;
						}else{
							$amt  = $totamt - $tapaid;
						}
						$dedid= $ded->getId();
						$acct = $ded->getAcctCode();
						$desc = $ded->getDescription();
						$inex = '2';
						$acso = 'D';      //account source
						$pras = 'Deduction'; //basic /income /deduction /contribution
						$tamt = 0;     //taxable amount default to 100% until settled
						//$cpfBase = ($ded->getCpf() == 'YES') ? $cpfBase - $amt : $cpfBase;
						//                        $cpfBase = (PayAccountCodePeer::GetCpf($acct) == 'YES') ? $cpfBase - $amt : $cpfBase;
						$this->isCpfCompute = PayAccountCodePeer::GetCpf($acct);
						$isBank = $this->saver($freq, '', $dedid, $acct, $desc, $amt* -1, $inex, $acso, $pras, $tamt, $race);
						if ( ($isBank == 'BANK' ||  $isBank == 'CHEQUE') && ($acct == 'UT' || $acct == 'TD' || $acct == 'UL') )
						{
							$cpfBase = $cpfBase - $amt ;
						}

					} // effectivity date
				} //foreach
			} //if
		}

		//***********************************************************************************
		if ($freq == 'SPECIAL' || $freq == 'MONTHLY')
		{
			//----------------------- get C O N T R I B U T I O N
			if ($this->basic->getCpf() == 'YES')
			{
				//                echo $empno.'<-- this'.' amount->'.$cpfBase;
				//                echo '<br>';
				$cpf       = array();
				$contrib   = new ComputeCPF();
				$cpf   = $contrib->GetCPF($this->GetStartDate($pcode), $cpfBase, CpfGovtRulePeer::ComputeAgeforCPF($emp->getDateOfBirth(), $this->GetStartDate($pcode)), $this->basic->getCpfCitizenship());
				unset($contrib);
				$acct  = 'CPF';
				//                if ($cpf['em_share'] <> 0 )
				//                {
				$this->isCpfCompute = 'YES';
				$this->saver($freq, '', '', $acct, PayAccountCodePeer::GetDescriptionbyAcctCode($acct) .' || < '.$cpfBase.' > ( '. $cpf['desc'].' )', $cpf['em_share']*-1, '2', 'C', 'Contribution', 0, $race, $cpf['er_share']*-1, $cpf['total']*-1);
				//                }
			}
			//$cAmt = $this->basic->getBasicAmount(); //get basic pay
			if ($this->basic->getCpf() == 'YES')
			{
				$cAmt = $cpfBase;
				$this->contrib = CpfAssocTablePeer::GetDatabyRace($race);
				foreach($this->contrib as $contr)
				{
					$min = $contr->getMin();
					$max = $contr->getMax();
					if ($cAmt >= $min && $cAmt <= $max)
					{
						$acct = $contr->getAcctCode();
						$desc = PayAccountCodePeer::GetDescriptionbyAcctCode($acct);
						$desc = $desc . ' ( ' .$max .' Bracket )' ;
						//($max > 2500)? ' Max': strval($max) ;
						$this->isCpfCompute = 'YES';
						$this->saver($freq, '', '', $acct, $desc , $contr->getAmount() * -1,'2', 'C', 'Contribution', 0, $race);
						return ;
					}
				}
			}
		}
	}


	//----------------------- individual monthly
	public function computeMidMonthIndividual($empno, $pcode, $user, $freq)
	{
		//$empno = 'S1791755B';
		$this->empno = $empno;
		$this->pcode = $pcode;
		$this->user  = $user;
		$cpfBase     = 0;

		if (PayEmployeeLedgerArchivePeer::GetDatabyEmpNoPeriodCode($empno, $pcode))
		{
			return '<br>'.$empno.' is already archived in '.$pcode.' - period code!' ;
		}


		//---------------- delete previous processing
		PayEmployeeLedgerPeer::DeleteDatabyEmpNoPeriodCode($empno, $pcode);

		//---------------- delete log
		//$this->deletelogs();

		$this->basic  = PayBasicPayPeer::GetDatabyEmployeeNo($empno);
		if (!$this->basic)
		{
			return '<br>Please Define basic Pay for '.$empno;
		}
		//-------------------------- get race
		$emp = HrEmployeePeer::GetDatabyEmployeeNo($empno);
		$race = $emp->getRace();

		$iscpf = TkDtrmasterPeer::GetDatabyEmployeeNo($empno);

		//----------------------- get B A S I C   P A Y
		$acct = $this->basic->getAcctCode();
		$desc = PayAccountCodePeer::GetDescriptionbyAcctCode($acct);
		$amt  = $this->basic->getScheduledAmount();
		$inex = '1';
		$acso = 'B';     //account source
		$pras = 'Basic'; //basic /income /deduction
		$tamt = $amt;    //taxable amount default to 100% until settled
		if ( $tamt )
		{
			$this->saver($freq, '', '', $acct, $desc, $amt, $inex, $acso, $pras, $tamt, $race);
		}

		//*********************************************************************************


		//----------------------- get I N C O M E
		$this->income = PayScheduledIncomePeer::GetIncomebyEmployeeNo($empno, $freq);
		$this->UpdateAmountReceived($this->income);
		$this->income = PayScheduledIncomePeer::GetIncomebyEmployeeNo($empno, $freq);
		if ($this->income)
		{
			foreach($this->income as $inc)
			{
				//---------------------------- check income effectivity Date
				$dtfrom = DateUtils::DUFormat('Y-m-d', $inc->getFromDate());    //income
				$dtto   = DateUtils::DUFormat('Y-m-d', $inc->getToDate());      //income
				$sdt    = DateUtils::DUFormat('Y-m-d', $this->GetStartDate($pcode)); //frequency
				$edt    = DateUtils::DUFormat('Y-m-d', $this->GetEndDate($pcode));   //frequency
				if ( ($dtfrom >= $sdt) && ($dtfrom <= $edt) ||
				($dtto   >= $sdt) && ($dtto   <= $edt) ||
				($dtfrom <= $sdt) &&  ($dtto >= $edt ) )
				{
					//---------------------------- check scheduled amount if > than balance
					if ( $inc->getScheduledAmount() < ($inc->getTotalAmount() - $inc->getTotAmtReceived()) || $inc->getTotalAmount() == 0)
					{
						$amt  = $inc->getScheduledAmount();
					}else{
						$amt  = $inc->getTotalAmount() - $inc->getTotAmtReceived();
					}
					$incid= $inc->getId();
					$acct = $inc->getAcctCode();
					$desc = $inc->getDescription();
					$inex = '1';
					$acso = 'I';      //account source
					$pras = 'Income'; //basic /income /deduction
					$tamt = $amt;     //taxable amount default to 100% until settled
					$cpfBase = (PayAccountCodePeer::GetCpf($acct) == 'YES') ? $cpfBase + $amt : $cpfBase;
					$this->saver($freq, $incid, '' ,$acct, $desc, $amt, $inex, $acso, $pras, $tamt, $race);
				}  //effectivity date
			} //foreach
		} //income
	}


	//----------------------- individual monthly
	public function computeMidMonthOT($empno, $pcode, $user, $freq)
	{
		//$empno = 'S1791755B';
		$this->empno = $empno;
		$this->pcode = $pcode;
		$this->user  = $user;
		$cpfBase     = 0;

		if (PayEmployeeLedgerArchivePeer::GetDatabyEmpNoPeriodCode($empno, $pcode))
		{
			return '<br>'.$empno.' is already archived in '.$pcode.' - period code!' ;
		}

		$this->basic  = PayBasicPayPeer::GetDatabyEmployeeNo($empno);

		//---------------- delete previous processing
		PayEmployeeLedgerPeer::DeleteDatabyEmpNoPeriodCode($empno, $pcode);

		//----------------------- get I N C O M E
		$this->income = PayScheduledIncomePeer::GetOvertimebyEmployeeNo($empno, $freq);
		$this->UpdateAmountReceived($this->income);
		$this->income = PayScheduledIncomePeer::GetOvertimebyEmployeeNo($empno, $freq);
		if ($this->income)
		{
			foreach($this->income as $inc)
			{
				//---------------------------- check income effectivity Date
				$dtfrom = DateUtils::DUFormat('Y-m-d', $inc->getFromDate());    //income
				$dtto   = DateUtils::DUFormat('Y-m-d', $inc->getToDate());      //income
				$sdt    = DateUtils::DUFormat('Y-m-d', $this->GetStartDate($pcode)); //frequency
				$edt    = DateUtils::DUFormat('Y-m-d', $this->GetEndDate($pcode));   //frequency
				if ( ($dtfrom >= $sdt) && ($dtfrom <= $edt) ||
				($dtto   >= $sdt) && ($dtto   <= $edt) ||
				($dtfrom <= $sdt) &&  ($dtto >= $edt ) )
				{
					//---------------------------- check scheduled amount if > than balance
					if ( $inc->getScheduledAmount() < ($inc->getTotalAmount() - $inc->getTotAmtReceived()) || $inc->getTotalAmount() == 0)
					{
						$amt  = $inc->getScheduledAmount();
					}else{
						$amt  = $inc->getTotalAmount() - $inc->getTotAmtReceived();
					}
					$incid= $inc->getId();
					$acct = $inc->getAcctCode();
					$desc = $inc->getDescription();
					$inex = '1';
					$acso = 'I';      //account source
					$pras = 'Income'; //basic /income /deduction
					$tamt = $amt;     //taxable amount default to 100% until settled
					$this->saver($freq, $incid, '' ,$acct, $desc, $amt, $inex, $acso, $pras, $tamt, '', 0);
				}  //effectivity date
			} //foreach
		} //income


	}


	protected function saver($freq, $incid, $dedid, $acct, $desc, $amt, $inex, $acso, $pras, $tamt, $race, $cpfer = 0, $cptot = 0)
	{
		$bankCash = 'BANK';
		$xpos = self::IsFound($acct, $this->cash['acct_code'] );

		//-------------------------------- cpf computable and cpf contributor
		if ($this->basic->getCpf() == 'YES')
		{
			if ( $this->isCpfCompute != "YES")
			{
				$bankCash = 'CASH';
			}
		}


		if ( ! is_null($xpos ) )
		{
			if ( ($this->cash['frequency'][$xpos] == $freq ) || ($this->cash['frequency'][$xpos] == 'PAYDAY') )
			{
				$bankCash = 'CASH';
			}
		}


		//---------------------------------- PAID TYPE
		if ( $this->basic->getPaidType() == 'CASH' )
		{
			$bankCash = 'CASH';
		}

		if ( $this->basic->getPaidType() == 'BANK' )
		{
			$bankCash = 'BANK';
		}

		//-------------------------------- no account number
		if ( ! $this->acctNo )
		{
			$bankCash = 'CASH';
		}
		
		if ( $this->basic->getPaidType() == 'CHEQUE' )
		{
			$bankCash = 'CHEQUE';
		}


		if ( $bankCash == 'CASH' )
		{
			$amt = round($amt);
		}

		//-------------- dont proceed with bank subsidy for cash
		if ( $acct == "CBS" &&  $bankCash <> 'BANK')
		{
			return $bankCash;
		}		
		
		if ($acct == "ML" && $this->empno == "S7571257Z"):
			$bankCash = "BANK";
		endif;
		
		if ($acct == 'OA' && $this->basic->getCpfAmount() > 0 ) :
			$bankCash = 'CASH';
		endif;
		//echo $this->empno.': '.$bankCash .' -- '. $acct .' -type-> '. $this->basic->getPaidType().' >>>'.$this->basic->getCpf().'<br>';
		$this->record = new PayEmployeeLedger();
		$this->record->setEmployeeNo($this->empno);
		$this->record->setName($this->basic->getName());
		$this->record->setCompany($this->basic->getCompany());
		$this->record->setDepartment($this->basic->getDepartment());
		$this->record->setPeriodCode($this->pcode);
		$this->record->setFrequency($freq);
		$this->record->setPayScheduledIncomeId($incid);
		$this->record->setPayScheduledDeductionId($dedid);
		$this->record->setAcctCode($acct);
		$this->record->setDescription($desc);
		$this->record->setAmount($amt);
		$this->record->setIncomeExpense($inex);
		$this->record->setAcctSource($acso);
		$this->record->setProcessedAs($pras);
		$this->record->setTaxableAmount($tamt);
		$this->record->setRace($race);
		$this->record->setBankCash($bankCash);
		$this->record->setCpfEr($cpfer);
		$this->record->setCpfTotal($cptot);
		$this->record->setDateCreated(DateUtils::DUNow());
		$this->record->setCreatedBy($this->user);
		$this->record->setDateModified(DateUtils::DUNow());
		$this->record->setModifiedBy($this->user);
		$this->record->save();
		unset($this->record);

		return $bankCash;
	}

	//----------------------- save archive and logs
	public function SaveArchiveLogs($pcode, $user, $dtime)
	{
//		var_dump($pcode);
//		exit();
		$data = PayEmployeeLedgerPeer::GetAllDatabyPeriodCode($pcode);

		//------------------- start backup
		PayEmployeeLedgerArchivePeer::UpdatefromLedger($data);

		//------------------- save pay_scheduled_income_log
		PaySchedIncomeLogPeer::UpdatefromLedger($data);
		PaySchedDeductionLogPeer::UpdatefromLedger($data);


		//------------------- delete old Entry
		//PayEmployeeLedgerPeer::DeleteDatabyPeriodCode($pcode);
	}

	public function UpdateAmountReceived($income)
	{
		if ($income)
		{
			foreach($income as $record)
			{
				$tamt =  PaySchedIncomeLogPeer::GetTotalAmtReceived($record->getId());
				if ($tamt) {
					if ( ($tamt >= $record->getTotalAmount()-1 || $tamt >= $record->getTotalAmount()+1)
					&& $record->getTotalAmount() <> 0)
					{
						$record->setStatus(PayScheduledIncomePeer::FLAG_STATUS_INACTIVE);
					}else{
						$record->setStatus(PayScheduledIncomePeer::FLAG_STATUS_ACTIVE);
					}
					$record->setTotAmtReceived($tamt);
					$record->save();
				} // $tamt
			}//foreach
		}//$income
	}

	public function UpdateAmountPaid($deduction)
	{
		if ($deduction)
		{
			foreach($deduction as $record)
			{
				$tamt =  PaySchedDeductionLogPeer::GetTotalAmtPaid($record->getId());
				//echo ($tamt <= $record->getTotalAmount()).': '.$tamt.' - '.$record->getTotalAmount().' -- '.$record->getEmployeeNo().'<br>';
				if ( ($tamt >= ($record->getTotalAmount()-1)*-1 || $tamt >= ($record->getTotalAmount()+1)*-1 ) && $record->getTotalAmount() <> 0 )
				{
					$record->setStatus(PayScheduledDeductionPeer::FLAG_STATUS_INACTIVE);
				}else{
					$record->setStatus(PayScheduledDeductionPeer::FLAG_STATUS_ACTIVE);
				}
				$record->setTotAmtPaid($tamt);
				$record->save();
			}
		}
	}

	public function UnpostArchive($pcode)
	{
		//------------------- save pay_employee_ledger_archive
		$sql = "
        Insert into pay_employee_ledger 
        SELECT * FROM pay_employee_ledger where 
        period_code = '".$pcode."';
        ";
		if (!$this->DoSQL($sql))
		{
			return "Archive Error/ PayComputeExtra Line: 257-264";
		}

		$inc = PaySchedIncomeLogPeer::GetDatabyPeriodCode($pcode);
		$ded = PaySchedDeductionLogPeer::GetDatabyPeriodCode($pcode);

		//----------------------- delete archive and logs
		if (PayEmployeeLedgerArchivePeer::DeleteDatabyPeriodCode($pcode))
		{
			return 'PayEmployeeLedger is not accesible';
		}

		if (PaySchedIncomeLogPeer::DeleteDatabyPeriodCode($pcode))
		{
			return 'PaySchedIncomeLog is not accesible';
		}

		if (PaySchedDeductionLogPeer::DeleteDatabyPeriodCode($pcode))
		{
			return 'PaySchedDeductionLog is not accesible';
		}

		$this->UpdateAmountReceived($inc);
		$this->UpdateAmountPaid($ded);

	}

	public function GetStartDate($pcode)
	{
//		echo $pcode . '<Br>';
		
		$dt = substr(trim($pcode), 0, 8);
// 		echo $dt;
// 		exit();
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}

	public function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}

	public function DoSQL($sql)
	{
		//var_dump($sql);
		
		$con = Propel::getConnection('hr');
		$stmt = $con->PrepareStatement($sql);
		$rs = $stmt->executeQuery(ResultSet::FETCHMODE_ASSOC);
		return $rs;
		//        $this->sql = "
		//        SELECT *
		//        FROM inventory_transaction
		//        WHERE transaction_date <= '" . $this->date . "'
		//        AND transaction_date > '2006-12-30'
		//        $wheres
		//        ORDER BY transaction_date DESC
		//        LIMIT 1
		//    ";
		//MYSQLResultset::getFloat()

	}

	//---------------------------------------------------- compute leave credits
	public function computecredits($empno, $fiscalyear, $user){
		$emp = HrEmployeePeer::GetDatabyEmployeeNo($empno);
		$rs = HrLeavePeer::GetAnnualLeaves();
		//---------------------- remove existing record situational might be added using override.
		HrEmployeeLeaveCreditsPeer::DeleteCreditsbyEmployeeNoFiscalYear($empno, $fiscalyear);
		if ($rs) {
			foreach ($rs as $r) {
				//--------------- count consumed
				$cnt = HrEmployeeLeavePeer::GetCountLeaves($empno, $r->getID(), $fiscalyear);

				//--------------- check for duplicate
				$lcr = HrEmployeeLeaveCreditsPeer::GetIdbyEmployeeNoLeaveID($empno, $r->getID());

				//--------------- add new leave credits
				if ($lcr) {
					$lc = HrEmployeeLeaveCreditsPeer::retrieveByPK($lcr);
				}else{
					$lc = new HrEmployeeLeaveCredits();
					$lc->setDateCreated(DateUtils::DUNow());
					$lc->setCreatedBy($user);
				}

				$lc->setHrEmployeeId($emp->getId());
				$lc->setEmployeeNo($emp->getEmployeeNo());
				$lc->setName($emp->getName());
				$lc->setHrLeaveId($r->getID());
				$lc->setLeaveType($r->getLeaveType());
				$lc->setFiscalYear($fiscalyear);
				$lc->setConsumed($cnt);
				$lc->setCredits($r->getDaysEntitled());
				$lc->setDateModified(DateUtils::DUNow());
				$lc->setModifiedBy($user);
				$lc->save();
				unset($lc);
				HrLib::LogThis($user,  'Update Leave Credits', '', 'leave/leaveCreditAdd' );
			}
		}
		$this->UpdateFromPersonalizedLeave($empno, $fiscalyear, $user);
		return $emp->getName();
	}

	public function UpdateFromPersonalizedLeave($empno, $fiscalyear, $user)
	{
		$emp = HrEmployeePeer::GetDatabyEmployeeNo($empno);

		//------------------------ update the personalized leave
		$leaves = HrIndividualLeavePeer::GetAllDatabyEmployeeNo($empno, $fiscalyear);
		foreach($leaves as $pleave):
			//------------------ get existing data
			$lc = HrEmployeeLeaveCreditsPeer::GetDatabyEmployeeNoLeaveId($empno, $pleave->getHrLeaveId(), $fiscalyear);
			if (!$lc)
			{
				$lc = new HrEmployeeLeaveCredits();
				$lc->setDateCreated(DateUtils::DUNow());
				$lc->setCreatedBy($user);
			}

			//echo $pleave->getDaysEntitled() .' - '. $pleave->getLeaveType() .'<br>';
			//var_dump($pleave);
			//--------------- count consumed
			$cnt = HrEmployeeLeavePeer::GetCountLeaves($empno, $pleave->getHrLeaveId(), $fiscalyear);
			$lc->setHrEmployeeId($emp->getId());
			$lc->setEmployeeNo($emp->getEmployeeNo());
			$lc->setName($emp->getName());
			$lc->setHrLeaveId($pleave->getHrLeaveId());
			$lc->setLeaveType($pleave->getLeaveType());
			$lc->setFiscalYear($fiscalyear);
			$lc->setCredits($pleave->getDaysEntitled());
			$lc->setDateModified(DateUtils::DUNow());
			$lc->setModifiedBy($user);
			$lc->save();
			unset($lc);
		endforeach;
		//exit();
		return $emp->getName();
	}

	public function UpdateFromGlobalLeave($empno, $fiscalyear, $user, $new = false)
	{
		$emp = HrEmployeePeer::GetDatabyEmployeeNo($empno);
		$rs  = HrLeavePeer::GetActiveLeaves();
		$ent = 0;
		$cbalance = 0 ;
		$balance = 0;
		//$rs = HrLeavePeer::GetAnnualLeaves();
		//---------------------- remove existing record situational might be added using override.
		if ($new)
		{
			HrEmployeeLeaveCreditsPeer::DeleteCreditsbyEmployeeNoFiscalYear($empno, $fiscalyear);
		}
		if ($rs)
		{
			foreach ($rs as $r)
			{
				//--------------- check for duplicate
				$lcr    = HrEmployeeLeaveCreditsPeer::GetIdbyEmployeeNoLeaveID($empno, $r->getID(), $fiscalyear);
				//$hrInd  = HrIndividualLeavePeer::GetOptimizedDatabyEmployeeNo($empno, $fiscalyear, $r->getLeaveType(), array('days_entitled'));
				//--------------- add new leave credits
				if ($lcr) {
					$lc = HrEmployeeLeaveCreditsPeer::retrieveByPK($lcr);
				}else{
					$lc = new HrEmployeeLeaveCredits();
					$lc->setDateCreated(DateUtils::DUNow());
					$lc->setCreatedBy($user);
				}


				//---------------------------- check personalized if so.. go else
				$lc->setHrEmployeeId($emp->getId());
				$lc->setEmployeeNo($emp->getEmployeeNo());
				$lc->setName($emp->getName());
				$lc->setHrLeaveId($r->getID());
				$lc->setLeaveType($r->getLeaveType());
				$lc->setFiscalYear($fiscalyear);
				
				$ent = $r->getDaysEntitled();
				//var_dump($r->getLeaveType());
				if ($r->getLeaveType() == 'Annual Leave'):
					$ent = $emp->getAnnualLeave() > 0 ? $emp->getAnnualLeave() : $r->getDaysEntitled() ;
					//var_dump($r->getLeaveType());
					//var_dump($ent);
				endif;
				
				//exit();
				//$ent = $r->getDaysEntitled() ;
				if ( DateUtils::DateDiff('d', $emp->getCommenceDate(), sfConfig::get('fiscal_year').'-01-01') <= 364 && $r->getID() == '2')
				{
					$ent = 0;
				}
				
				//$ent = 0;		// to initialize without increment
				
				$balance = HrEmployeeLeaveCreditsPeer::GetBalanceLeave($emp->getEmployeeNo(), $r->getID() ,HrFiscalYearPeer::getPreviousYear() );

				if ($r->getID() == 2 && $new)
				{				
					if (($ent * 2) <= $ent + $balance):
						$cbalance = $ent * 2;
					else: 
						$cbalance = $ent + $balance;
					endif; 
// 					echo 'pbalance: ' . $balance . '<br>';
// 					echo 'credits: ' . $ent . '<br>';
// 					echo 'overide balance: ' . $cbalance;
// 					exit();
					$this->addIndividualLeave($emp->getEmployeeNo(), $emp->getName(), $cbalance );
					//$this->addIndividualLeave($emp->getEmployeeNo(), $emp->getName(), $balance );
				}

				
				$lc->setCredits($ent);	
				$lc->setPreviousBalance($balance );
				$lc->setConsumed($this->UpdateConsumedLeave($empno, $fiscalyear, $user, $r->getLeaveType(), $r->getLeaveType()) );
				$lc->setDateModified(DateUtils::DUNow());
				$lc->setModifiedBy($user);
				$lc->save();
				unset($lc);
			}
		}
		//exit();
		return $emp->getName();
	}

	public function addIndividualLeave($empNo, $eName, $balance)
	{
		$record = HrIndividualLeavePeer::GetAnnualLeave($empNo, sfConfig::get('fiscal_year'));
		if (!$record)
		{
			$record = new HrIndividualLeave();
			$record->setDateCreated(DateUtils::DUNow());
			$record->setCreatedBy('SYSTEM');
		}
		$record->setEmployeeNo($empNo);
		$record->setName($eName);
		$record->setHrLeaveId(2);
		$record->setLeaveType('Annual Leave');
		$record->setDescription('Balance from the Previous Year');
		$record->setDaysEntitled($balance);
		$record->setStatus('A');
		$record->setFiscalYear(sfConfig::get('fiscal_year'));
		$record->setDateModified(DateUtils::DUNow());
		$record->setModifiedBy('SYSTEM');
		$record->save();
		unset($record);
	}

	public function UpdateConsumedLeave($empno, $fiscalyear, $user, $ltype)
	{
		$cnt = HrEmployeeLeavePeer::GetCountLeaves($empno, HrLeavePeer::GetIDbyLeaveType($ltype), $fiscalyear);
		return $cnt;
	}

//	public function UpdateConsumedLeave($empno, $fiscalyear, $user, $ltype)
//	{
//		$cnt = HrEmployeeLeavePeer::GetCountLeaves($empno, HrLeavePeer::GetIDbyLeaveType($ltype), $fiscalyear);
//		return $cnt;
//	}	

	public function isAbsenttheWholePeriod($pcode)
	{

	}

	/***************************************************************************
	 * TIMEKEEPING COMPUTATION
	 */

	public function tothr_duration($duration){
		$hr  = $duration['hours'];
		$min = conv_min2hr($duration['minutes']);
		$sec = conv_sec2hr($duration['seconds']);
		return  $hr+$min+$sec;
	}

	public function getottype($cdate){
		//----------- check if holiday, sunday, or regular working day
		if (strtolower(setsdate($cdate,'l')) == 'sunday') {
			return 'sunday';
		}
		return 'normal';
	}

	/*
	 * this function requires calendar object to be passed
	 */
	public function processdtr($empno, $wtno, $dtfrom, $dtto, $emptype, $cal, $name, $user, $xcomp, $nwrktmp=null, $wtmp=null)
	{
		//S1850325E
		//        $empno = 'S1553425G';
		//        $empno = 'S1850325E';
		//		echo $empno . '<-- test';
		//        echo $dtfrom .' - '.$dtto;
		//        exit();
// 		echo '<pre>';
// 		print_r($cal);
// 		echo '</pre>';
// 		exit(); 
		$att = '';
		$mess = '';
		$days   = array();  //------------- hold the required no. of hrs per day
		$noweek = $cal->getTweeks($dtfrom, $dtto); //no_weeks($dtfrom, $dtto);
		$ndate  = '';
		$b4start= 0;
		$sweek  = $cal->getWeekNoByDate($dtfrom);
		$eweek  = $cal->getWeekNoByDate($dtto);
		//$wtmp   = TkWorktemplateDetailPeer::GetWorkTempDetailbyWTNo($wtno, $cal);
		$reqhr  = $wtmp['no_hours']; // req # of hr
		$renhr  = TkAttendancePeer::GetAttendance($empno, $dtfrom, $dtto);
		$dtrdel = TkDtrsummaryPeer::DeletebyEmployeeNo($empno, $dtfrom, $dtto);
		//$nwrktmp= TkWorktemplatePeer::GetDatabyWorktemplateNo($wtno);
		$empMeal = TkMealSummaryPeer::GetMealByDate($empno, $dtfrom, $dtto);
		
		if ( (!$nwrktmp) || (!$renhr) )
		{
			//half day leave without attendance is not computed as half day, that is because it is not allowed
			return;
		}
		
		//----------------------------------- main computation for tk_attendance
		$cpos =  0;
		$dura =  0; //duration
		$wday =  0;
		$cpos =  0;

		
		//----------------------------------- get some extra parameters from worktempalate
		$endurance =  $nwrktmp->getEndurance() / 60;
		$mot1      =  $nwrktmp->getOt1();
		$mot2      =  $nwrktmp->getOt2();
		$mot3      =  $nwrktmp->getOt3();
		$mbreak    =  $nwrktmp->getMealBreak();
		$mtime     =  $nwrktmp->getMinTime();
		$mot       =  $nwrktmp->getMinOt();

		if ($renhr)
		{
			foreach($renhr as $kt){
				//----------------------------------- if existing and already Posted
				$ueDuration = 0;
				$tdate = $kt->getTimeIn();
				$ut   = 0;
				$ot   = 0;
				$wday = 0;
				$dura = 0;
				$att  = '';
				$base = 0;
				$req  = 0;
				$otime= 0;     //out time getTimeout
				$half = 0;     // half day no of hours

				$cdate = DateUtils::DUFormat('Y-m-d',$tdate);
				$wday = intval(DateUtils::DUFormat('d', $tdate));             //------------ day
				$dura = DateUtils::DateDiff("s", $kt->getTimeIn(), $kt->getTimeOut());          //------------ duration
				
				//----------------------------- used in statistics
				if ($kt->getTimeOutOrig()):
					$ueDuration = DateUtils::DateDiff("s", $kt->getTimeIn(), $kt->getTimeOutOrig());
				else:
					$ueDuration = DateUtils::DateDiff("s", $kt->getTimeIn(), $kt->getTimeOut());
				endif;
				//-----------------------------
				
				$dura = ($dura < 0 ? 0 : $dura);
				
				
				$cpos = DateUtils::DUFormat('z', $tdate);
				$gethol= $cal->GetHoliday($cdate);
				//$req  = ($gethol) ? 0 : DateUtils::Hr2Sec($reqhr[$cpos]);       // if holidy 0 normal hours
				$req  = ($gethol && $reqhr[$cpos] < 12 ) ? 0 : DateUtils::Hr2Sec($reqhr[$cpos]);       // if holidy 0 normal hours
				
				//------------------------------ get half day
				$leaveHalfDay = null;
				$leaveHalfDay = $cal->isLeaveHalfDay(DateUtils::DUFormat('Y-m-d', $tdate) );          //------------ leave
				//if ($leaveHalfDay == '' || $leaveHalfDay == 'None' || is_null($leaveHalfDay) )
				if ($leaveHalfDay)
				{
					if (strtolower($leaveHalfDay) == 'none')
					{
						switch (strtolower($cal->GetLeave($cdate)))
						{
							case 'leave without pay':
								$dura = 0;
								break;
							case 'others(basic only)':
								$dura = 0;
								break;
							default:
								$dura = $dura + $req + ($nwrktmp->getMealBreak() * 60);
								break;
						}
					}else{
						$dura = $dura + ($req/2) + ($nwrktmp->getMealBreak() * 60);
					}
					//$dura = $dura + DateUtils::Min2Sec($mbreak);
				}


								
				//---------------------- new rules: deduct the meal break
				if (DateUtils::Sec2Hr($req) <= 0 ) { //|| $cal->GetLeave($cdate) ) {
					$mbreak = 0;
				}else{
					$mbreak =  $nwrktmp->getMealBreak();
				}
				
	
				if ( (DateUtils::DUFormat('h', $tdate) < 12) && $mbreak )		//MCS only because others not sure && $xcomp == 'Micronclean'
				{
					$dura = $dura - DateUtils::Min2Sec($mbreak);
				}
				//                var_dump(sfContext::getUser());
				//                exit();
				
//				echo $dura;
//				exit();
				
//				var_dump($dura);
//				echo '<br>';
//				var_dump($endurance);
//				exit();				
				//---------------------------- get the rounded actual duration
				$adura = 0.0;
				$thrs  = 0;
				$adura = DateUtils::Sec2Hr($dura);
				$thrs = intval($adura);        //whole
				$adura = $adura - $thrs;  // remainder

				
				//echo $empno .' - '.DateUtils::Sec2Hr($dura) .' - '. ($adura + $endurance) .' - '.$endurance .' - '. $wtmp['date'][$cpos] .'<br>';
				 

				if ( ( $adura + $endurance) >= 1  ) //if greater than one hour
				{
					$adura = 1;
				}else{
					$adura = 0;
				}

				$adura = DateUtils::Hr2Sec($adura + $thrs);
//				var_dump($adura);
//				exit();
				//$adura = ($adura == '')? 0 : $adura;
				//echo $dura.' - '. $adura. '<br>';
				$ot     = round(DateUtils::Sec2Hr($adura - $req), 2);  //------------ total OT in hrs: meal should be deducted everytime the employee works...
				//echo $empno .' - '. $ot .' - '. $wtmp['date'][$cpos] .' - '. $adura.'<br>';

				$att    = ($dura > 0 || $req == 0) ? TkDtrsummaryPeer::FLAG_PRESENT : TkDtrsummaryPeer::FLAG_ABSENT;
				$ut     = ($ot > 0 )? 0 : $ot;       //--------- save negative value: considered Undertime
				$ut     = ($ut*-1 < .5 && $ut <> 0)? -.5 : $ut;
				$ot     = ($ot > 0 )? $ot : 0;       //--------- change to 0 if negative

				// echo $empno.' :  '.$wtmp['date'][$cpos].' = '. $kt->getTimeIn().' =-= '.$kt->getTimeOut() .' : duration: '.$dura.' attendance: '.$att;
				// echo '<br>';
				 
				//--------------------- compute meal allowance
				$meal   = ($ot >= $nwrktmp->getMinOt())  ? $nwrktmp->getAllowanceAmt() : 0;   //regular employee

//				echo 'meal: '.$meal . '<br>';
//				var_dump(intval(substr($mtime, 0, 2)));
//				echo '<br>';
//				var_dump(intval(DateUtils::DUFormat('H',$kt->getTimeOut())));
//				var_dump($kt->getTimeOut());
////				var_dump($renhr);
				
				
				if ( intval(substr($mtime, 0, 2)) > intval(DateUtils::DUFormat('H',$kt->getTimeOut()))  )
				{
					$meal = 0;
				}
				
				//$omeal    = TkMealSummaryPeer::GetOptimizedDatabyEmployeeNo($empno, $cdate, array('amount'));
				//$meal = ($omeal) ? $omeal->get('AMOUNT'): $meal;
				$meal = (array_key_exists($cdate, $empMeal )) ? $empMeal[$cdate]: $meal;
//				if (array_key_exists($cdate, $empMeal )){
//					echo $cdate.': '.$empMeal[$cdate] .'<br>';
//				}
//				var_dump($empno);
//				echo '<br>meal: '.$meal;
//				exit();
//				
				
				//echo $gethol .' - '. DateUtils::Sec2Hr($req) ;
				//--------------------- end meal computation
				//echo $empno.' :  '.$wtmp['date'][$cpos].' = '. $tdate .' : duration ( '. $ot .' ) OT Duration ( '.$adura.' )  required( '.DateUtils::Sec2Hr($req).' )'.$mtime.' : '.date('h:i', $otime ).' =>meal: '.$meal.' <'.DateUtils::DUFormat('h:i  ( H )',$kt->getTimeOut()).'> '. intval(substr($mtime, 0, 2)) .'<br>';
				//                var_dump($adura);
				//                exit();
				//                if ( ($empno == '401833668130407' || $empno == 'S1631874D') && $cdate == '2010-01-09'){
				//                	echo $empno .' - '. $nwrktmp->getWorktempNo() .' - '. $mbreak .' - '. $adura . '<br>';
				//                }
				
				//************** maximum declared overtime is 3 hours
				// never change the OT hours because a lot of internal program
				// is dependent on the actual overtime hours
				$extraOt = 0;
				if ( $ot > 3 ):
					$extraOt = $ot - 3;
// 					$ot = 3;				
				endif;
				//************** end extra hours
				
				$ueDuration = $ueDuration > 0? $ueDuration : 0;
				
				$dtrsum = new TkDtrsummary();
				$dtrsum->setTransDate($cdate, '');
				$dtrsum->setEmployeeNo($empno, '');
				$dtrsum->setEmployeeNo($empno, '');
				$dtrsum->setAttendance($att, '');
				$dtrsum->setNormal(DateUtils::Sec2Hr($req), '');
				$dtrsum->setOvertimes($ot, '');
				$dtrsum->setExtraOt($extraOt, '');
				$dtrsum->setUndertime($ut, '');
				$dtrsum->setDuration($dura, '');
				$dtrsum->setAcDura(DateUtils::Sec2Hr($adura) );
				$dtrsum->setTkAttendanceId($kt->getId());
				$dtrsum->setMeal($meal, 0);
				$dtrsum->setUneditedDuration($ueDuration / 3600);
				$dtrsum->save();
				unset($dtrsum);
				
				//echo $dtrsum->getNormal().'<--- ';
			}  //foreach

			
		}
		
		//------------------------------------ get holiday / get leave / get dayoff
		$ccntr = DateUtils::DUFormat('z', $dtto) - DateUtils::DUFormat('z', $dtfrom) + 1;   //get no days to process
		$dof = $nwrktmp->getDayoff();
		$dofd= $nwrktmp->getDayoffDay();
		$dsum = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empno, $dtfrom, $dtto); //-------------- get saved data
		$summ = array('id'=>array(), 'trans_date'=>array(), 'duration'=>array());
		foreach($dsum as $dval)
		{
			$summ['id'][] = $dval->getId();
			$summ['trans_date'][] = DateUtils::DUFormat('Y-m-d', $dval->getTransDate());
			$summ['duration'][]   = $dval->getDuration();
			$summ['attendance'][] = $dval->getAttendance();
		}
		for($ds = 0; $ds < $ccntr; $ds++ ) {
			$cdate = DateUtils::AddDate($dtfrom, $ds);
			$gethol= $cal->GetHoliday($cdate);        //------------ holiday
			$getlev= $cal->GetLeave($cdate);          //------------ leave
//			echo $cdate .': ';
//			var_dump($getlev);
//			echo '<Br>';
			//------------- compute OT ------------
			$doff   = 'N';
			$doffot = 'N';
			$dow    = strtolower(DateUtils::DUFormat('l', $cdate));  //--------- day of week
			$apos   = 0;
			$mult   = 0;
			$inSumm = (in_array($cdate, $summ['trans_date'])) ? array_search($cdate, $summ['trans_date']) : null ;
			$att    = (! is_null($inSumm)) ? ($summ['attendance'][$inSumm]): TkDtrsummaryPeer::FLAG_ABSENT;
			if (in_array($cdate, $wtmp['date']))
			{
				$apos = array_search($cdate, $wtmp['date']);
				//echo $cdate .' | '.$wtmp['date'][$apos].' '.$wtmp['no_hours'][$apos].' '.$wtmp['index'][$apos].'<br>';
				if ($wtmp['no_hours'][$apos])               //------------ tag as working (> 0)
				{
					$mult = $mot1;
				}else{
					$mult = $mot2;
				}
				if ($gethol)                            //------------ tag as Holiday
				{
					$mult = (TkDtrmasterPeer::GetEmployment($empno) == 'PART-TIME') ? $mot2 : $mot3;
				}
				//                //-------------------------------- 12 hours shedule if sunday mult 2.0
				//                if (
				//                ( substr($nwrktmp->getWorktempNo(), 0, 3) == 'LYE' ||
				//                substr($nwrktmp->getWorktempNo(), 0, 7) == 'PATRICK' )
				//
				//                && ( strtolower(DateUtils::DUFormat('l', $cdate)) == 'sunday') )
				//                {
				//                    $mult = $mot2;
				//                }
				//echo $cdate .' - '.$att.'<br>';
				//---------------------- check if holiday or on leave
				if (is_null($inSumm))
				{
					if (($gethol && $wtmp['no_hours'][$apos] < 12) || ($getlev))
					{
						switch (strtolower($getlev))
						{
							case 'leave without pay':
								$att = TkDtrsummaryPeer::FLAG_ABSENT;
								break;
							case 'others(basic only)':
								$att = TkDtrsummaryPeer::FLAG_ABSENT;
								break;
							default:
								$att = TkDtrsummaryPeer::FLAG_PRESENT;
								break;
						}
					}
				}
				
				//----------------------------------- consider absent as dayoff
				if ( ($wtmp['no_hours'][$apos]) && ($att == TkDtrsummaryPeer::FLAG_ABSENT) && ($dof > 0) )
				{
					if  ( strtolower($dow) == strtolower($dofd)  ||  strtolower($dofd) == 'anytime'  )
					{
						$doff = 'Y';
						$dof-- ;
					}
				}
				//---------------------- if not a working day mark present
				if ($wtmp['no_hours'][$apos] <= 0)
				{
					switch (strtolower($getlev))
					{
						case 'leave without pay':
							$att = TkDtrsummaryPeer::FLAG_ABSENT;
							break;
						case 'others(basic only)':
							$att = TkDtrsummaryPeer::FLAG_ABSENT;
							break;
						default:
							$att = TkDtrsummaryPeer::FLAG_PRESENT;
							break;
					}
					//$att = TkDtrsummaryPeer::FLAG_PRESENT;
				}

				//                $dura = 0;
				//                //---------------------- check time in time out by duration
				//                if ( $inSumm)
				//                {
				//                    $dura = $summ['id'][array_search($cdate, $summ['trans_date'])];
				//                    $att = ($dura <= 0)? TkDtrsummaryPeer::FLAG_ABSENT: TkDtrsummaryPeer::FLAG_PRESENT ;
				//                }
				//echo $cdate.' - '.$wtmp['no_hours'][$apos].' - '.$att.' - '.$gethol.' - '.$getlev.' - '.$dura.'<br>';

			}  // in array
// 			if ($getlev)
// 			{
// 				$getlev = ( ($gethol || $wtmp['no_hours'][$apos] == 0) && ($gethol || $wtmp['no_hours'][$apos] <> 12)) ? '' : $getlev;
// 			}

			$inSumm = (in_array($cdate, $summ['trans_date'])) ? array_search($cdate, $summ['trans_date']) : null ;
			if (! $inSumm && ! in_array($cdate, $summ['trans_date']))
			{
				$dsumm = new TkDtrsummary();
				$dsumm->setEmployeeNo($empno);
				$dsumm->setTransDate($cdate);
				$dsumm->setOvertimes(0);
				$dsumm->setUndertime(0);
			}else{
				foreach($dsum as $dval)
				{
					if ($dval->getTransDate() == $cdate)
					{
						$dsumm = $dval;
					}
				}
			}
			//echo $dsumm->getEmployeeNo().' ||'.$cdate.':  '.$gethol .' <-----> '. $getlev.'<br>';
			$dsumm->setName($name);
			$dsumm->setDayoff($doff);
			$dsumm->setHolidayCode($gethol);
			$dsumm->setLeaveType($getlev);
			$dsumm->setAttendance($att);
			$dsumm->setMultiplier($mult);
			$dsumm->setNormal($wtmp['no_hours'][$apos]);
			//$dsumm->setAcDura(0);
			//$dsumm->setHrHolidayId(HrHolidayPeer::GetIdbyDatesHol($cdate));
			//$dsumm->setHrHolidayId(($gethol > 0)? $this->leave['id'][array_search($gethol, $this->leave['desc'])] : null);
			$dsumm->setHrEmployeeLeaveId(($getlev > 0)? $this->leave['id'][array_search($getlev, $this->leave['leave_type'])] : null);
			//$dsumm->setHrEmployeeLeaveId(($getlev)? 1 : null);
			$dsumm->setDateCreated(DateUtils::DUNow());
			$dsumm->setCreatedBy($user);
			$dsumm->setDateModified(DateUtils::DUNow());
			$dsumm->setModifiedBy($user);
			$dsumm->save();
			unset($dsumm);
		} // for  Main loop
		unset($wtmp);
		unset($renhr);
		unset($dtrdel);
		unset($nwrktmp);
		//exit();
		//return true;
	}   //process dtr

	public function DtrImport($sdt, $edt, $empNo, $delData)
	{
		$cnt = 0;
		$att = AttendancePeer::GetDatabyStartDate($sdt, $edt);
		$old = 0;
		if ($delData)
		{
			$old = TkAttendancePeer::DeleteEmployeeTimeIn($sdt, $edt, $empNo);
		}
		if ($empNo)
		{
			$existData = TkAttendancePeer::GetAttendance($empNo, $sdt, $edt);
		}else{
			$existData = TkAttendancePeer::GetAllEmployeeTimeIn($sdt, $edt);
		}
		foreach($att as $a){
			$key = $a->getEmployeeNo() . '_' . $a->getTimeIn();
			if (!in_array($key, $existData))
			{
				//echo $a->getTimeIn() ..
				$tat = new TkAttendance();
				$tat->setEmployeeNo($a->getEmployeeNo());
				$tat->setTimeIn($a->getTimeIn());
				$tat->setTimeOut($a->getTimeOut());
				$tat->setDuration($a->getDuration());
				$tat->setOt1($a->getOt1());
				$tat->setOt2($a->getOt2());
				$tat->setOt3($a->getOt3());
				$tat->save();
				unset($tat);
				$cnt++;
				$existData[] = $key;
			}
			 
		}
		//$timer->addTime();
	}

	public static function IsFound($var, $arr)
	{
		if (is_array($arr) )
		{
			if ( in_array($var, $arr ) )
			{
				return array_search($var, $arr);
			}
		}
		return null;
	}
//as
	//-------------------------------- dtr summary computation
	public function BuildDtrsummary($empNo, $sdate, $edate, $user, $batch)
	{
		if ($empNo)
		{
			$employees = array($empNo=>$empNo);
		}else {
			$employees = TkDtrmasterPeer::GetEmployeeNameList();
		}
		$cnt = 0;
		$incBatch = $batch;
		$dedBatch = $batch;
		foreach($employees as $empNos=>$empName)
		{
			$this->record = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNos, $sdate, $edate );
			if ($this->record)
			{
				
				$cnt = 0;
				$empList = array();
				$empNo    = '';
				$otherIncome = array();
				foreach($this->record as $this->rec)
				{
					$empList[] = $this->rec->getEmployeeNo();
					 
					$incded   = 0;
					$tamt     = 0;
					$meal     = 0;
					$extraOT  = 0;
//					echo $this->rec->getEmployeeNo() . ' - ' . $empNo .'<br>';
					if ($this->rec->getEmployeeNo() !== $empNo)
					{
						$wrktmp  = TkDtrmasterPeer::GetDatabyEmployeeNo1($this->rec->getEmployeeNo());
						$hd      = TkWorktemplatePeer::GetHrsandDaysbyWorktempNo($wrktmp->getTkWorktemplateNo());  //hd = hour and day in array
						$bp      = PayBasicPayPeer::GetDatabyEmployeeNo($this->rec->getEmployeeNo());
						$empNo   = $this->rec->getEmployeeNo();
						$otherIncome = PayFixedIncomePeer::GetIncomeListByEmployeeNo($this->rec->getEmployeeNo());
					}
				
					$cmpinfo  = self::ComputeExtra($this->rec, $wrktmp, $hd, $bp, $otherIncome);
					$tamt     = $cmpinfo['amount'];
					$rph      = $cmpinfo['rph'];
					$allpd    = $cmpinfo['allowance'];
					$levypd   = $cmpinfo['levy'];
					$extraOT  = $cmpinfo['extraOtPay'];
					$ptinc    = 0;
					//$omeal    = TkMealSummaryPeer::GetOptimizedDatabyEmployeeNo($empNo, $this->rec->getTransDate(), array('amount'));

					//echo $empNo .' - '. $this->rec->getTransDate() .' - '. ($omeal ? $omeal->get('AMOUNT') : 'xx').'<br>';
					//$meal     = ($omeal ? $omeal->get('AMOUNT') : $this->rec->getMeal() );
					$meal     = $this->rec->getMeal();
					if ($wrktmp->getTypeOfEmployment() == 'PART-TIME')
					{
						$ptinc    = $cmpinfo['parttime'];
					}
					if (self::IsProcessed())
					{
						if ($tamt > 0 || $meal > 0 || $ptinc > 0) //--------------- income
						{
							$this->rec->setIncomePrepostBatch($incBatch);
							$this->rec->setDeductionPrepostBatch('');
							$incded = TkDtrsummaryPeer::FLAG_INCOME;
						}
						if ($tamt < 0 || $allpd <> 0 || $levypd <> 0 ){ //--------------- deduction
							$this->rec->setIncomePrepostBatch('');
							$this->rec->setDeductionPrepostBatch($dedBatch);
							$incded = TkDtrsummaryPeer::FLAG_DEDUCTION;
						}
						if ($tamt == 0 && $meal == 0 && $ptinc == 0){//--------------- mark blank
							$this->rec->setIncomePrepostBatch('');
							$this->rec->setDeductionPrepostBatch('');
							$incded = '';
						}
						if ($ptinc > 0)
						{
							$this->rec->setPartTimeIncome($ptinc);
						}

						if ($allpd != 0)
						{
							$this->rec->setAllowance($allpd);
						}
						if ($levypd != 0)
						{
							$this->rec->setLevy($levypd);
						}
						$this->rec->setRatePerHour($rph);
						$this->rec->setPostedAmount($tamt);
						$this->rec->setExtraOtPay($extraOT);
						$this->rec->setPostedDate(Date("Y-m-d"));
						$this->rec->setDateModified(DateUtils::GetNow());
						$this->rec->setModifiedBy($user);
						$this->rec->save();
						//echo $this->rec->getId();
						$cnt++;
					} //is procesed
				}//foreach
			}// this record
			//exit();
		}//emplist
	}
	
	public function AutoTopUp12HrsShift($dailyRecord)
	{
		$notIncluded = array("APPANNASAMY BALAMURUGAN", "KASIRAJAN MATTHIYA ARASAN");
		foreach($dailyRecord as $rec):
			$empNo = $rec->getEmployeeNo();
			$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
			$is12HrsShift = TkDtrmasterPeer::Is12HoursShift($empNo);
			if ($is12HrsShift):		
				if (! in_array($empData->getName(), $notIncluded)):
					if (HrCompanyPeer::GetNamebyId($empData->getHrCompanyId()) == 'Micronclean'):
						$dDiff = DateUtils::DateDiff("h",  $rec->getTimeIn(),  $rec->getTimeOut() );
						echo $rec->getName() . ": " .$dDiff . "\n";
						if ( $dDiff >= 6 && $dDiff <= 11):
							$newTimeOut = DateUtils::AddSecondstoTime($rec->getTimeIn(), 43200); // add 12 hours in seconds
// 							echo "\n <br>" .$rec->getName(). ' ' . $rec->getTimeIn() . ' ' . $rec->getTimeOut() 
// 							." ( " . $newTimeOut . " ) ";
							$rec->setTimeOut($newTimeOut);
							$rec->setModifiedBy('AUTO TOPUP');
							$rec->setDateModified(DateUtils::DUNow());
							$rec->save();
							TkMealSummaryPeer::TopUpNoMeal($empNo, DateUtils::DUFormat('Y-m-d', $newTimeOut) );
						endif;
					endif;
				endif; //in array
			endif;
		endforeach;
	}
	
	public function AutoTopUp12HrsShiftEmployeeNo($empNo, $sdt, $edt, $postMeal=null)
	{
		$dailyRecord = TkAttendancePeer::GetAttendance($empNo, $sdt, $edt);
		foreach($dailyRecord as $rec):
			//echo $rec->getTimeIn() . "\n";
			$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
			$is12HrsShift = TkDtrmasterPeer::Is12HoursShift($empNo);
			
			if ($is12HrsShift):
				$dDiff = DateUtils::DateDiff("h",  $rec->getTimeIn(),  $rec->getTimeOut() );
				if ( $dDiff >= 6):  //at least 6 hours work
					$newTimeOut = DateUtils::AddSecondstoTime($rec->getTimeIn(), 43200); // add 12 hours in seconds
					if ($newTimeOut < $rec->getTimeOut()):
						$newTimeOut = $rec->getTimeOut();
					endif;
// 					echo "\n <br>" .$rec->getName(). ' ' . $rec->getTimeIn() . ' ' . $rec->getTimeOut()
// 					." ( " . $newTimeOut . " ) ";
					$rec->setTimeOut($newTimeOut);
					$rec->setModifiedBy('AUTO TOPUP');
					$rec->setDateModified(DateUtils::DUNow());
					$rec->save();
					if ($postMeal):
						TkMealSummaryPeer::TopUpNoMeal($empNo, DateUtils::DUFormat('Y-m-d', $rec->getTimeIn()));
					endif;
					//echo $dDiff . 'Yes ';
					endif;
				//endif;
			endif;
		endforeach;
	}
	
	public static function TopUpSingaporeanTo12($sdt, $edt)
	{
		$empno = '';
//		$empno = 'S7383424D';
// 		var_dump($sdt);
// 		var_dump($edt);
// 		exit();
		$empList = HrEmployeePeer::GetActiveSingaporean($empno);
		foreach($empList as $empNo):
			$dailyRecord = TkAttendancePeer::GetAttendance($empNo, $sdt, $edt);
			foreach($dailyRecord as $rec):
				$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
 				$dDiff = DateUtils::DateDiff("h",  $rec->getTimeIn(),  $rec->getTimeOut() );
 				$cdt = DateUtils::DUFormat('Y-m-d', $rec->getTimeIn());
 				//echo $cdt . ' : ' . DateUtils::DUFormat('D', $cdt) ;
 				if (DateUtils::DUFormat('D', $cdt) <> 'Sun' ):
	 				if (! HrEmployeeLeavePeer::IsOnleave($empNo, $cdt)):

	 					$templateInfo = TkDtrmasterPeer::GetMealBreakHrsPerDay($empNo);
	 					$daily = TkWorktemplateDetailPeer::GetNormalHours($cdt, $templateInfo['template']);
	 					$nohrs = 0;
	 					//echo $cdt . ' : '. $dDiff . ' | ' . $templateInfo['mealbreak'] .'<br>';
	 					
	 					if ($dDiff >= $daily->getIsWorking()):
// 	 						$nohrs =  ( ($daily->getIsWorking() + (11 - $daily->getIsWorking())) * 3600 + $templateInfo['mealbreak'] );
// 	 						$minutes = rand(100, 1500);
// 	 						$nohrs += $minutes;
	 						if (DateUtils::DUFormat('D', $cdt) == 'Sat' ):
	 							$nohrs = ( ($daily->getIsWorking() + 3) * 3600) + $templateInfo['mealbreak'] + rand(10, 1800);
	 						else:
	 							$nohrs = ( ( (11-$daily->getIsWorking()) + $daily->getIsWorking() ) * 3600) + $templateInfo['mealbreak'] + rand(10, 180);
	 						endif;
	 						echo $cdt .' | '. $daily->getIsWorking() . ' | '. $nohrs .' || '.$templateInfo['mealbreak'] .'<Br>';
	 						$newTimeOut  = DateUtils::AddSecondstoTime($rec->getTimeIn(), $nohrs  ); // add 11 hours in seconds
	 						$rec->setTimeOut($newTimeOut);
	 					endif;
	 				endif;
	 			else:
	 				//echo $cdt . '<br>';
	 				$rec->setTimeIn($cdt);
	 				$rec->setTimeOut($cdt);
	 			endif;
// 	 			echo 'herexxx';
// 	 			var_dump($nohrs);
// 	 			exit();
	 			//exit();
	 			//echo $newTimeOut . '<Br>';
				$rec->setModifiedBy('');
				//$rec->setDateModified(DateUtils::DUNow());
				$rec->save();
			endforeach;
		endforeach;
	}
	
}
?>

