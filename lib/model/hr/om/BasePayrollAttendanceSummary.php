<?php


abstract class BasePayrollAttendanceSummary extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $trans_date;


	
	protected $employee_no;


	
	protected $name;


	
	protected $multiplier;


	
	protected $rate_per_hour;


	
	protected $normal;


	
	protected $undertime;


	
	protected $overtimes;


	
	protected $posted_amount = 0;


	
	protected $extra_ot;


	
	protected $extra_ot_pay;


	
	protected $attendance = 'P';


	
	protected $holiday_code;


	
	protected $leave_type;


	
	protected $dayoff;


	
	protected $duration;


	
	protected $ac_dura;


	
	protected $unedited_duration;


	
	protected $meal = 0;


	
	protected $allowance;


	
	protected $part_time_income;


	
	protected $team;


	
	protected $compliance_ot = 0;


	
	protected $compliance_ot_amt = 0;


	
	protected $compliance_ot_original_time = 0;


	
	protected $compliance_ot_amt_original_time = 0;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTransDate($format = 'Y-m-d')
	{

		if ($this->trans_date === null || $this->trans_date === '') {
			return null;
		} elseif (!is_int($this->trans_date)) {
						$ts = strtotime($this->trans_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [trans_date] as date/time value: " . var_export($this->trans_date, true));
			}
		} else {
			$ts = $this->trans_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getMultiplier()
	{

		return $this->multiplier;
	}

	
	public function getRatePerHour()
	{

		return $this->rate_per_hour;
	}

	
	public function getNormal()
	{

		return $this->normal;
	}

	
	public function getUndertime()
	{

		return $this->undertime;
	}

	
	public function getOvertimes()
	{

		return $this->overtimes;
	}

	
	public function getPostedAmount()
	{

		return $this->posted_amount;
	}

	
	public function getExtraOt()
	{

		return $this->extra_ot;
	}

	
	public function getExtraOtPay()
	{

		return $this->extra_ot_pay;
	}

	
	public function getAttendance()
	{

		return $this->attendance;
	}

	
	public function getHolidayCode()
	{

		return $this->holiday_code;
	}

	
	public function getLeaveType()
	{

		return $this->leave_type;
	}

	
	public function getDayoff()
	{

		return $this->dayoff;
	}

	
	public function getDuration()
	{

		return $this->duration;
	}

	
	public function getAcDura()
	{

		return $this->ac_dura;
	}

	
	public function getUneditedDuration()
	{

		return $this->unedited_duration;
	}

	
	public function getMeal()
	{

		return $this->meal;
	}

	
	public function getAllowance()
	{

		return $this->allowance;
	}

	
	public function getPartTimeIncome()
	{

		return $this->part_time_income;
	}

	
	public function getTeam()
	{

		return $this->team;
	}

	
	public function getComplianceOt()
	{

		return $this->compliance_ot;
	}

	
	public function getComplianceOtAmt()
	{

		return $this->compliance_ot_amt;
	}

	
	public function getComplianceOtOriginalTime()
	{

		return $this->compliance_ot_original_time;
	}

	
	public function getComplianceOtAmtOriginalTime()
	{

		return $this->compliance_ot_amt_original_time;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::ID;
		}

	} 
	
	public function setTransDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [trans_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->trans_date !== $ts) {
			$this->trans_date = $ts;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::TRANS_DATE;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::NAME;
		}

	} 
	
	public function setMultiplier($v)
	{

		if ($this->multiplier !== $v) {
			$this->multiplier = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::MULTIPLIER;
		}

	} 
	
	public function setRatePerHour($v)
	{

		if ($this->rate_per_hour !== $v) {
			$this->rate_per_hour = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::RATE_PER_HOUR;
		}

	} 
	
	public function setNormal($v)
	{

		if ($this->normal !== $v) {
			$this->normal = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::NORMAL;
		}

	} 
	
	public function setUndertime($v)
	{

		if ($this->undertime !== $v) {
			$this->undertime = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::UNDERTIME;
		}

	} 
	
	public function setOvertimes($v)
	{

		if ($this->overtimes !== $v) {
			$this->overtimes = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::OVERTIMES;
		}

	} 
	
	public function setPostedAmount($v)
	{

		if ($this->posted_amount !== $v || $v === 0) {
			$this->posted_amount = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::POSTED_AMOUNT;
		}

	} 
	
	public function setExtraOt($v)
	{

		if ($this->extra_ot !== $v) {
			$this->extra_ot = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::EXTRA_OT;
		}

	} 
	
	public function setExtraOtPay($v)
	{

		if ($this->extra_ot_pay !== $v) {
			$this->extra_ot_pay = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::EXTRA_OT_PAY;
		}

	} 
	
	public function setAttendance($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->attendance !== $v || $v === 'P') {
			$this->attendance = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::ATTENDANCE;
		}

	} 
	
	public function setHolidayCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->holiday_code !== $v) {
			$this->holiday_code = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::HOLIDAY_CODE;
		}

	} 
	
	public function setLeaveType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->leave_type !== $v) {
			$this->leave_type = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::LEAVE_TYPE;
		}

	} 
	
	public function setDayoff($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dayoff !== $v) {
			$this->dayoff = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::DAYOFF;
		}

	} 
	
	public function setDuration($v)
	{

		if ($this->duration !== $v) {
			$this->duration = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::DURATION;
		}

	} 
	
	public function setAcDura($v)
	{

		if ($this->ac_dura !== $v) {
			$this->ac_dura = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::AC_DURA;
		}

	} 
	
	public function setUneditedDuration($v)
	{

		if ($this->unedited_duration !== $v) {
			$this->unedited_duration = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::UNEDITED_DURATION;
		}

	} 
	
	public function setMeal($v)
	{

		if ($this->meal !== $v || $v === 0) {
			$this->meal = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::MEAL;
		}

	} 
	
	public function setAllowance($v)
	{

		if ($this->allowance !== $v) {
			$this->allowance = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::ALLOWANCE;
		}

	} 
	
	public function setPartTimeIncome($v)
	{

		if ($this->part_time_income !== $v) {
			$this->part_time_income = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::PART_TIME_INCOME;
		}

	} 
	
	public function setTeam($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->team !== $v) {
			$this->team = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::TEAM;
		}

	} 
	
	public function setComplianceOt($v)
	{

		if ($this->compliance_ot !== $v || $v === 0) {
			$this->compliance_ot = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::COMPLIANCE_OT;
		}

	} 
	
	public function setComplianceOtAmt($v)
	{

		if ($this->compliance_ot_amt !== $v || $v === 0) {
			$this->compliance_ot_amt = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT;
		}

	} 
	
	public function setComplianceOtOriginalTime($v)
	{

		if ($this->compliance_ot_original_time !== $v || $v === 0) {
			$this->compliance_ot_original_time = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME;
		}

	} 
	
	public function setComplianceOtAmtOriginalTime($v)
	{

		if ($this->compliance_ot_amt_original_time !== $v || $v === 0) {
			$this->compliance_ot_amt_original_time = $v;
			$this->modifiedColumns[] = PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->trans_date = $rs->getDate($startcol + 1, null);

			$this->employee_no = $rs->getString($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->multiplier = $rs->getFloat($startcol + 4);

			$this->rate_per_hour = $rs->getFloat($startcol + 5);

			$this->normal = $rs->getFloat($startcol + 6);

			$this->undertime = $rs->getFloat($startcol + 7);

			$this->overtimes = $rs->getFloat($startcol + 8);

			$this->posted_amount = $rs->getFloat($startcol + 9);

			$this->extra_ot = $rs->getFloat($startcol + 10);

			$this->extra_ot_pay = $rs->getFloat($startcol + 11);

			$this->attendance = $rs->getString($startcol + 12);

			$this->holiday_code = $rs->getString($startcol + 13);

			$this->leave_type = $rs->getString($startcol + 14);

			$this->dayoff = $rs->getString($startcol + 15);

			$this->duration = $rs->getFloat($startcol + 16);

			$this->ac_dura = $rs->getFloat($startcol + 17);

			$this->unedited_duration = $rs->getFloat($startcol + 18);

			$this->meal = $rs->getFloat($startcol + 19);

			$this->allowance = $rs->getFloat($startcol + 20);

			$this->part_time_income = $rs->getFloat($startcol + 21);

			$this->team = $rs->getString($startcol + 22);

			$this->compliance_ot = $rs->getFloat($startcol + 23);

			$this->compliance_ot_amt = $rs->getFloat($startcol + 24);

			$this->compliance_ot_original_time = $rs->getFloat($startcol + 25);

			$this->compliance_ot_amt_original_time = $rs->getFloat($startcol + 26);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 27; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayrollAttendanceSummary object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayrollAttendanceSummaryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayrollAttendanceSummaryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayrollAttendanceSummaryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PayrollAttendanceSummaryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayrollAttendanceSummaryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = PayrollAttendanceSummaryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAttendanceSummaryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTransDate();
				break;
			case 2:
				return $this->getEmployeeNo();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getMultiplier();
				break;
			case 5:
				return $this->getRatePerHour();
				break;
			case 6:
				return $this->getNormal();
				break;
			case 7:
				return $this->getUndertime();
				break;
			case 8:
				return $this->getOvertimes();
				break;
			case 9:
				return $this->getPostedAmount();
				break;
			case 10:
				return $this->getExtraOt();
				break;
			case 11:
				return $this->getExtraOtPay();
				break;
			case 12:
				return $this->getAttendance();
				break;
			case 13:
				return $this->getHolidayCode();
				break;
			case 14:
				return $this->getLeaveType();
				break;
			case 15:
				return $this->getDayoff();
				break;
			case 16:
				return $this->getDuration();
				break;
			case 17:
				return $this->getAcDura();
				break;
			case 18:
				return $this->getUneditedDuration();
				break;
			case 19:
				return $this->getMeal();
				break;
			case 20:
				return $this->getAllowance();
				break;
			case 21:
				return $this->getPartTimeIncome();
				break;
			case 22:
				return $this->getTeam();
				break;
			case 23:
				return $this->getComplianceOt();
				break;
			case 24:
				return $this->getComplianceOtAmt();
				break;
			case 25:
				return $this->getComplianceOtOriginalTime();
				break;
			case 26:
				return $this->getComplianceOtAmtOriginalTime();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAttendanceSummaryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTransDate(),
			$keys[2] => $this->getEmployeeNo(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getMultiplier(),
			$keys[5] => $this->getRatePerHour(),
			$keys[6] => $this->getNormal(),
			$keys[7] => $this->getUndertime(),
			$keys[8] => $this->getOvertimes(),
			$keys[9] => $this->getPostedAmount(),
			$keys[10] => $this->getExtraOt(),
			$keys[11] => $this->getExtraOtPay(),
			$keys[12] => $this->getAttendance(),
			$keys[13] => $this->getHolidayCode(),
			$keys[14] => $this->getLeaveType(),
			$keys[15] => $this->getDayoff(),
			$keys[16] => $this->getDuration(),
			$keys[17] => $this->getAcDura(),
			$keys[18] => $this->getUneditedDuration(),
			$keys[19] => $this->getMeal(),
			$keys[20] => $this->getAllowance(),
			$keys[21] => $this->getPartTimeIncome(),
			$keys[22] => $this->getTeam(),
			$keys[23] => $this->getComplianceOt(),
			$keys[24] => $this->getComplianceOtAmt(),
			$keys[25] => $this->getComplianceOtOriginalTime(),
			$keys[26] => $this->getComplianceOtAmtOriginalTime(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAttendanceSummaryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTransDate($value);
				break;
			case 2:
				$this->setEmployeeNo($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setMultiplier($value);
				break;
			case 5:
				$this->setRatePerHour($value);
				break;
			case 6:
				$this->setNormal($value);
				break;
			case 7:
				$this->setUndertime($value);
				break;
			case 8:
				$this->setOvertimes($value);
				break;
			case 9:
				$this->setPostedAmount($value);
				break;
			case 10:
				$this->setExtraOt($value);
				break;
			case 11:
				$this->setExtraOtPay($value);
				break;
			case 12:
				$this->setAttendance($value);
				break;
			case 13:
				$this->setHolidayCode($value);
				break;
			case 14:
				$this->setLeaveType($value);
				break;
			case 15:
				$this->setDayoff($value);
				break;
			case 16:
				$this->setDuration($value);
				break;
			case 17:
				$this->setAcDura($value);
				break;
			case 18:
				$this->setUneditedDuration($value);
				break;
			case 19:
				$this->setMeal($value);
				break;
			case 20:
				$this->setAllowance($value);
				break;
			case 21:
				$this->setPartTimeIncome($value);
				break;
			case 22:
				$this->setTeam($value);
				break;
			case 23:
				$this->setComplianceOt($value);
				break;
			case 24:
				$this->setComplianceOtAmt($value);
				break;
			case 25:
				$this->setComplianceOtOriginalTime($value);
				break;
			case 26:
				$this->setComplianceOtAmtOriginalTime($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAttendanceSummaryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTransDate($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmployeeNo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMultiplier($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRatePerHour($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNormal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUndertime($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOvertimes($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPostedAmount($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setExtraOt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setExtraOtPay($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAttendance($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setHolidayCode($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLeaveType($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDayoff($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDuration($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAcDura($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUneditedDuration($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setMeal($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setAllowance($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPartTimeIncome($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTeam($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setComplianceOt($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setComplianceOtAmt($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setComplianceOtOriginalTime($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setComplianceOtAmtOriginalTime($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayrollAttendanceSummaryPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::ID)) $criteria->add(PayrollAttendanceSummaryPeer::ID, $this->id);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::TRANS_DATE)) $criteria->add(PayrollAttendanceSummaryPeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::EMPLOYEE_NO)) $criteria->add(PayrollAttendanceSummaryPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::NAME)) $criteria->add(PayrollAttendanceSummaryPeer::NAME, $this->name);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::MULTIPLIER)) $criteria->add(PayrollAttendanceSummaryPeer::MULTIPLIER, $this->multiplier);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::RATE_PER_HOUR)) $criteria->add(PayrollAttendanceSummaryPeer::RATE_PER_HOUR, $this->rate_per_hour);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::NORMAL)) $criteria->add(PayrollAttendanceSummaryPeer::NORMAL, $this->normal);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::UNDERTIME)) $criteria->add(PayrollAttendanceSummaryPeer::UNDERTIME, $this->undertime);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::OVERTIMES)) $criteria->add(PayrollAttendanceSummaryPeer::OVERTIMES, $this->overtimes);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::POSTED_AMOUNT)) $criteria->add(PayrollAttendanceSummaryPeer::POSTED_AMOUNT, $this->posted_amount);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::EXTRA_OT)) $criteria->add(PayrollAttendanceSummaryPeer::EXTRA_OT, $this->extra_ot);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::EXTRA_OT_PAY)) $criteria->add(PayrollAttendanceSummaryPeer::EXTRA_OT_PAY, $this->extra_ot_pay);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::ATTENDANCE)) $criteria->add(PayrollAttendanceSummaryPeer::ATTENDANCE, $this->attendance);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::HOLIDAY_CODE)) $criteria->add(PayrollAttendanceSummaryPeer::HOLIDAY_CODE, $this->holiday_code);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::LEAVE_TYPE)) $criteria->add(PayrollAttendanceSummaryPeer::LEAVE_TYPE, $this->leave_type);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::DAYOFF)) $criteria->add(PayrollAttendanceSummaryPeer::DAYOFF, $this->dayoff);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::DURATION)) $criteria->add(PayrollAttendanceSummaryPeer::DURATION, $this->duration);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::AC_DURA)) $criteria->add(PayrollAttendanceSummaryPeer::AC_DURA, $this->ac_dura);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::UNEDITED_DURATION)) $criteria->add(PayrollAttendanceSummaryPeer::UNEDITED_DURATION, $this->unedited_duration);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::MEAL)) $criteria->add(PayrollAttendanceSummaryPeer::MEAL, $this->meal);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::ALLOWANCE)) $criteria->add(PayrollAttendanceSummaryPeer::ALLOWANCE, $this->allowance);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::PART_TIME_INCOME)) $criteria->add(PayrollAttendanceSummaryPeer::PART_TIME_INCOME, $this->part_time_income);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::TEAM)) $criteria->add(PayrollAttendanceSummaryPeer::TEAM, $this->team);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::COMPLIANCE_OT)) $criteria->add(PayrollAttendanceSummaryPeer::COMPLIANCE_OT, $this->compliance_ot);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT)) $criteria->add(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT, $this->compliance_ot_amt);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME)) $criteria->add(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME, $this->compliance_ot_original_time);
		if ($this->isColumnModified(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME)) $criteria->add(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME, $this->compliance_ot_amt_original_time);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayrollAttendanceSummaryPeer::DATABASE_NAME);

		$criteria->add(PayrollAttendanceSummaryPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setEmployeeNo($this->employee_no);

		$copyObj->setName($this->name);

		$copyObj->setMultiplier($this->multiplier);

		$copyObj->setRatePerHour($this->rate_per_hour);

		$copyObj->setNormal($this->normal);

		$copyObj->setUndertime($this->undertime);

		$copyObj->setOvertimes($this->overtimes);

		$copyObj->setPostedAmount($this->posted_amount);

		$copyObj->setExtraOt($this->extra_ot);

		$copyObj->setExtraOtPay($this->extra_ot_pay);

		$copyObj->setAttendance($this->attendance);

		$copyObj->setHolidayCode($this->holiday_code);

		$copyObj->setLeaveType($this->leave_type);

		$copyObj->setDayoff($this->dayoff);

		$copyObj->setDuration($this->duration);

		$copyObj->setAcDura($this->ac_dura);

		$copyObj->setUneditedDuration($this->unedited_duration);

		$copyObj->setMeal($this->meal);

		$copyObj->setAllowance($this->allowance);

		$copyObj->setPartTimeIncome($this->part_time_income);

		$copyObj->setTeam($this->team);

		$copyObj->setComplianceOt($this->compliance_ot);

		$copyObj->setComplianceOtAmt($this->compliance_ot_amt);

		$copyObj->setComplianceOtOriginalTime($this->compliance_ot_original_time);

		$copyObj->setComplianceOtAmtOriginalTime($this->compliance_ot_amt_original_time);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PayrollAttendanceSummaryPeer();
		}
		return self::$peer;
	}

} 