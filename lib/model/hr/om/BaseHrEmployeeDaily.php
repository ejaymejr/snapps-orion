<?php


abstract class BaseHrEmployeeDaily extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $department;


	
	protected $is_on_leave;


	
	protected $company;


	
	protected $basic = 0;


	
	protected $ot = 0;


	
	protected $meal = 0;


	
	protected $allowance = 0;


	
	protected $month_allowance = 0;


	
	protected $part_time = 0;


	
	protected $cpf_em = 0;


	
	protected $cpf_er = 0;


	
	protected $hourly_rate = 0;


	
	protected $undertime = 0;


	
	protected $absent = 0;


	
	protected $shift = 0;


	
	protected $duration = 0;


	
	protected $basic_adjustment = 0;


	
	protected $trans_date;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getDepartment()
	{

		return $this->department;
	}

	
	public function getIsOnLeave()
	{

		return $this->is_on_leave;
	}

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getBasic()
	{

		return $this->basic;
	}

	
	public function getOt()
	{

		return $this->ot;
	}

	
	public function getMeal()
	{

		return $this->meal;
	}

	
	public function getAllowance()
	{

		return $this->allowance;
	}

	
	public function getMonthAllowance()
	{

		return $this->month_allowance;
	}

	
	public function getPartTime()
	{

		return $this->part_time;
	}

	
	public function getCpfEm()
	{

		return $this->cpf_em;
	}

	
	public function getCpfEr()
	{

		return $this->cpf_er;
	}

	
	public function getHourlyRate()
	{

		return $this->hourly_rate;
	}

	
	public function getUndertime()
	{

		return $this->undertime;
	}

	
	public function getAbsent()
	{

		return $this->absent;
	}

	
	public function getShift()
	{

		return $this->shift;
	}

	
	public function getDuration()
	{

		return $this->duration;
	}

	
	public function getBasicAdjustment()
	{

		return $this->basic_adjustment;
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getDateCreated($format = 'Y-m-d H:i:s')
	{

		if ($this->date_created === null || $this->date_created === '') {
			return null;
		} elseif (!is_int($this->date_created)) {
						$ts = strtotime($this->date_created);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_created] as date/time value: " . var_export($this->date_created, true));
			}
		} else {
			$ts = $this->date_created;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getModifiedBy()
	{

		return $this->modified_by;
	}

	
	public function getDateModified($format = 'Y-m-d H:i:s')
	{

		if ($this->date_modified === null || $this->date_modified === '') {
			return null;
		} elseif (!is_int($this->date_modified)) {
						$ts = strtotime($this->date_modified);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_modified] as date/time value: " . var_export($this->date_modified, true));
			}
		} else {
			$ts = $this->date_modified;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::NAME;
		}

	} 
	
	public function setDepartment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->department !== $v) {
			$this->department = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::DEPARTMENT;
		}

	} 
	
	public function setIsOnLeave($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_on_leave !== $v) {
			$this->is_on_leave = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::IS_ON_LEAVE;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::COMPANY;
		}

	} 
	
	public function setBasic($v)
	{

		if ($this->basic !== $v || $v === 0) {
			$this->basic = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::BASIC;
		}

	} 
	
	public function setOt($v)
	{

		if ($this->ot !== $v || $v === 0) {
			$this->ot = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::OT;
		}

	} 
	
	public function setMeal($v)
	{

		if ($this->meal !== $v || $v === 0) {
			$this->meal = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::MEAL;
		}

	} 
	
	public function setAllowance($v)
	{

		if ($this->allowance !== $v || $v === 0) {
			$this->allowance = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::ALLOWANCE;
		}

	} 
	
	public function setMonthAllowance($v)
	{

		if ($this->month_allowance !== $v || $v === 0) {
			$this->month_allowance = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::MONTH_ALLOWANCE;
		}

	} 
	
	public function setPartTime($v)
	{

		if ($this->part_time !== $v || $v === 0) {
			$this->part_time = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::PART_TIME;
		}

	} 
	
	public function setCpfEm($v)
	{

		if ($this->cpf_em !== $v || $v === 0) {
			$this->cpf_em = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::CPF_EM;
		}

	} 
	
	public function setCpfEr($v)
	{

		if ($this->cpf_er !== $v || $v === 0) {
			$this->cpf_er = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::CPF_ER;
		}

	} 
	
	public function setHourlyRate($v)
	{

		if ($this->hourly_rate !== $v || $v === 0) {
			$this->hourly_rate = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::HOURLY_RATE;
		}

	} 
	
	public function setUndertime($v)
	{

		if ($this->undertime !== $v || $v === 0) {
			$this->undertime = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::UNDERTIME;
		}

	} 
	
	public function setAbsent($v)
	{

		if ($this->absent !== $v || $v === 0) {
			$this->absent = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::ABSENT;
		}

	} 
	
	public function setShift($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->shift !== $v || $v === 0) {
			$this->shift = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::SHIFT;
		}

	} 
	
	public function setDuration($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->duration !== $v || $v === 0) {
			$this->duration = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::DURATION;
		}

	} 
	
	public function setBasicAdjustment($v)
	{

		if ($this->basic_adjustment !== $v || $v === 0) {
			$this->basic_adjustment = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::BASIC_ADJUSTMENT;
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
			$this->modifiedColumns[] = HrEmployeeDailyPeer::TRANS_DATE;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::CREATED_BY;
		}

	} 
	
	public function setDateCreated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_created] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_created !== $ts) {
			$this->date_created = $ts;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::MODIFIED_BY;
		}

	} 
	
	public function setDateModified($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_modified] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_modified !== $ts) {
			$this->date_modified = $ts;
			$this->modifiedColumns[] = HrEmployeeDailyPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->department = $rs->getString($startcol + 3);

			$this->is_on_leave = $rs->getString($startcol + 4);

			$this->company = $rs->getString($startcol + 5);

			$this->basic = $rs->getFloat($startcol + 6);

			$this->ot = $rs->getFloat($startcol + 7);

			$this->meal = $rs->getFloat($startcol + 8);

			$this->allowance = $rs->getFloat($startcol + 9);

			$this->month_allowance = $rs->getFloat($startcol + 10);

			$this->part_time = $rs->getFloat($startcol + 11);

			$this->cpf_em = $rs->getFloat($startcol + 12);

			$this->cpf_er = $rs->getFloat($startcol + 13);

			$this->hourly_rate = $rs->getFloat($startcol + 14);

			$this->undertime = $rs->getFloat($startcol + 15);

			$this->absent = $rs->getFloat($startcol + 16);

			$this->shift = $rs->getInt($startcol + 17);

			$this->duration = $rs->getInt($startcol + 18);

			$this->basic_adjustment = $rs->getFloat($startcol + 19);

			$this->trans_date = $rs->getDate($startcol + 20, null);

			$this->created_by = $rs->getString($startcol + 21);

			$this->date_created = $rs->getTimestamp($startcol + 22, null);

			$this->modified_by = $rs->getString($startcol + 23);

			$this->date_modified = $rs->getTimestamp($startcol + 24, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 25; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeDaily object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeDailyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeDailyPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeDailyPeer::DATABASE_NAME);
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
					$pk = HrEmployeeDailyPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeDailyPeer::doUpdate($this, $con);
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


			if (($retval = HrEmployeeDailyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeDailyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEmployeeNo();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getDepartment();
				break;
			case 4:
				return $this->getIsOnLeave();
				break;
			case 5:
				return $this->getCompany();
				break;
			case 6:
				return $this->getBasic();
				break;
			case 7:
				return $this->getOt();
				break;
			case 8:
				return $this->getMeal();
				break;
			case 9:
				return $this->getAllowance();
				break;
			case 10:
				return $this->getMonthAllowance();
				break;
			case 11:
				return $this->getPartTime();
				break;
			case 12:
				return $this->getCpfEm();
				break;
			case 13:
				return $this->getCpfEr();
				break;
			case 14:
				return $this->getHourlyRate();
				break;
			case 15:
				return $this->getUndertime();
				break;
			case 16:
				return $this->getAbsent();
				break;
			case 17:
				return $this->getShift();
				break;
			case 18:
				return $this->getDuration();
				break;
			case 19:
				return $this->getBasicAdjustment();
				break;
			case 20:
				return $this->getTransDate();
				break;
			case 21:
				return $this->getCreatedBy();
				break;
			case 22:
				return $this->getDateCreated();
				break;
			case 23:
				return $this->getModifiedBy();
				break;
			case 24:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeDailyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getDepartment(),
			$keys[4] => $this->getIsOnLeave(),
			$keys[5] => $this->getCompany(),
			$keys[6] => $this->getBasic(),
			$keys[7] => $this->getOt(),
			$keys[8] => $this->getMeal(),
			$keys[9] => $this->getAllowance(),
			$keys[10] => $this->getMonthAllowance(),
			$keys[11] => $this->getPartTime(),
			$keys[12] => $this->getCpfEm(),
			$keys[13] => $this->getCpfEr(),
			$keys[14] => $this->getHourlyRate(),
			$keys[15] => $this->getUndertime(),
			$keys[16] => $this->getAbsent(),
			$keys[17] => $this->getShift(),
			$keys[18] => $this->getDuration(),
			$keys[19] => $this->getBasicAdjustment(),
			$keys[20] => $this->getTransDate(),
			$keys[21] => $this->getCreatedBy(),
			$keys[22] => $this->getDateCreated(),
			$keys[23] => $this->getModifiedBy(),
			$keys[24] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeDailyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEmployeeNo($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setDepartment($value);
				break;
			case 4:
				$this->setIsOnLeave($value);
				break;
			case 5:
				$this->setCompany($value);
				break;
			case 6:
				$this->setBasic($value);
				break;
			case 7:
				$this->setOt($value);
				break;
			case 8:
				$this->setMeal($value);
				break;
			case 9:
				$this->setAllowance($value);
				break;
			case 10:
				$this->setMonthAllowance($value);
				break;
			case 11:
				$this->setPartTime($value);
				break;
			case 12:
				$this->setCpfEm($value);
				break;
			case 13:
				$this->setCpfEr($value);
				break;
			case 14:
				$this->setHourlyRate($value);
				break;
			case 15:
				$this->setUndertime($value);
				break;
			case 16:
				$this->setAbsent($value);
				break;
			case 17:
				$this->setShift($value);
				break;
			case 18:
				$this->setDuration($value);
				break;
			case 19:
				$this->setBasicAdjustment($value);
				break;
			case 20:
				$this->setTransDate($value);
				break;
			case 21:
				$this->setCreatedBy($value);
				break;
			case 22:
				$this->setDateCreated($value);
				break;
			case 23:
				$this->setModifiedBy($value);
				break;
			case 24:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeDailyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDepartment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsOnLeave($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCompany($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBasic($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMeal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAllowance($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonthAllowance($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPartTime($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCpfEm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCpfEr($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setHourlyRate($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUndertime($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAbsent($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setShift($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDuration($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setBasicAdjustment($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTransDate($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedBy($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDateCreated($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setModifiedBy($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDateModified($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeDailyPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeDailyPeer::ID)) $criteria->add(HrEmployeeDailyPeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeDailyPeer::EMPLOYEE_NO)) $criteria->add(HrEmployeeDailyPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(HrEmployeeDailyPeer::NAME)) $criteria->add(HrEmployeeDailyPeer::NAME, $this->name);
		if ($this->isColumnModified(HrEmployeeDailyPeer::DEPARTMENT)) $criteria->add(HrEmployeeDailyPeer::DEPARTMENT, $this->department);
		if ($this->isColumnModified(HrEmployeeDailyPeer::IS_ON_LEAVE)) $criteria->add(HrEmployeeDailyPeer::IS_ON_LEAVE, $this->is_on_leave);
		if ($this->isColumnModified(HrEmployeeDailyPeer::COMPANY)) $criteria->add(HrEmployeeDailyPeer::COMPANY, $this->company);
		if ($this->isColumnModified(HrEmployeeDailyPeer::BASIC)) $criteria->add(HrEmployeeDailyPeer::BASIC, $this->basic);
		if ($this->isColumnModified(HrEmployeeDailyPeer::OT)) $criteria->add(HrEmployeeDailyPeer::OT, $this->ot);
		if ($this->isColumnModified(HrEmployeeDailyPeer::MEAL)) $criteria->add(HrEmployeeDailyPeer::MEAL, $this->meal);
		if ($this->isColumnModified(HrEmployeeDailyPeer::ALLOWANCE)) $criteria->add(HrEmployeeDailyPeer::ALLOWANCE, $this->allowance);
		if ($this->isColumnModified(HrEmployeeDailyPeer::MONTH_ALLOWANCE)) $criteria->add(HrEmployeeDailyPeer::MONTH_ALLOWANCE, $this->month_allowance);
		if ($this->isColumnModified(HrEmployeeDailyPeer::PART_TIME)) $criteria->add(HrEmployeeDailyPeer::PART_TIME, $this->part_time);
		if ($this->isColumnModified(HrEmployeeDailyPeer::CPF_EM)) $criteria->add(HrEmployeeDailyPeer::CPF_EM, $this->cpf_em);
		if ($this->isColumnModified(HrEmployeeDailyPeer::CPF_ER)) $criteria->add(HrEmployeeDailyPeer::CPF_ER, $this->cpf_er);
		if ($this->isColumnModified(HrEmployeeDailyPeer::HOURLY_RATE)) $criteria->add(HrEmployeeDailyPeer::HOURLY_RATE, $this->hourly_rate);
		if ($this->isColumnModified(HrEmployeeDailyPeer::UNDERTIME)) $criteria->add(HrEmployeeDailyPeer::UNDERTIME, $this->undertime);
		if ($this->isColumnModified(HrEmployeeDailyPeer::ABSENT)) $criteria->add(HrEmployeeDailyPeer::ABSENT, $this->absent);
		if ($this->isColumnModified(HrEmployeeDailyPeer::SHIFT)) $criteria->add(HrEmployeeDailyPeer::SHIFT, $this->shift);
		if ($this->isColumnModified(HrEmployeeDailyPeer::DURATION)) $criteria->add(HrEmployeeDailyPeer::DURATION, $this->duration);
		if ($this->isColumnModified(HrEmployeeDailyPeer::BASIC_ADJUSTMENT)) $criteria->add(HrEmployeeDailyPeer::BASIC_ADJUSTMENT, $this->basic_adjustment);
		if ($this->isColumnModified(HrEmployeeDailyPeer::TRANS_DATE)) $criteria->add(HrEmployeeDailyPeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(HrEmployeeDailyPeer::CREATED_BY)) $criteria->add(HrEmployeeDailyPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeDailyPeer::DATE_CREATED)) $criteria->add(HrEmployeeDailyPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeDailyPeer::MODIFIED_BY)) $criteria->add(HrEmployeeDailyPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeDailyPeer::DATE_MODIFIED)) $criteria->add(HrEmployeeDailyPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeDailyPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeDailyPeer::ID, $this->id);

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

		$copyObj->setEmployeeNo($this->employee_no);

		$copyObj->setName($this->name);

		$copyObj->setDepartment($this->department);

		$copyObj->setIsOnLeave($this->is_on_leave);

		$copyObj->setCompany($this->company);

		$copyObj->setBasic($this->basic);

		$copyObj->setOt($this->ot);

		$copyObj->setMeal($this->meal);

		$copyObj->setAllowance($this->allowance);

		$copyObj->setMonthAllowance($this->month_allowance);

		$copyObj->setPartTime($this->part_time);

		$copyObj->setCpfEm($this->cpf_em);

		$copyObj->setCpfEr($this->cpf_er);

		$copyObj->setHourlyRate($this->hourly_rate);

		$copyObj->setUndertime($this->undertime);

		$copyObj->setAbsent($this->absent);

		$copyObj->setShift($this->shift);

		$copyObj->setDuration($this->duration);

		$copyObj->setBasicAdjustment($this->basic_adjustment);

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);


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
			self::$peer = new HrEmployeeDailyPeer();
		}
		return self::$peer;
	}

} 