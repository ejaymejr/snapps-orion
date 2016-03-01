<?php


abstract class BaseTkAttendance extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $time_in;


	
	protected $time_out;


	
	protected $time_out_orig;


	
	protected $duration = 0;


	
	protected $normal = 0;


	
	protected $ot1 = 0;


	
	protected $ot2 = 0;


	
	protected $ot3 = 0;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_id;

	
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

	
	public function getTimeIn($format = 'Y-m-d H:i:s')
	{

		if ($this->time_in === null || $this->time_in === '') {
			return null;
		} elseif (!is_int($this->time_in)) {
						$ts = strtotime($this->time_in);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [time_in] as date/time value: " . var_export($this->time_in, true));
			}
		} else {
			$ts = $this->time_in;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTimeOut($format = 'Y-m-d H:i:s')
	{

		if ($this->time_out === null || $this->time_out === '') {
			return null;
		} elseif (!is_int($this->time_out)) {
						$ts = strtotime($this->time_out);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [time_out] as date/time value: " . var_export($this->time_out, true));
			}
		} else {
			$ts = $this->time_out;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTimeOutOrig($format = 'Y-m-d H:i:s')
	{

		if ($this->time_out_orig === null || $this->time_out_orig === '') {
			return null;
		} elseif (!is_int($this->time_out_orig)) {
						$ts = strtotime($this->time_out_orig);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [time_out_orig] as date/time value: " . var_export($this->time_out_orig, true));
			}
		} else {
			$ts = $this->time_out_orig;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDuration()
	{

		return $this->duration;
	}

	
	public function getNormal()
	{

		return $this->normal;
	}

	
	public function getOt1()
	{

		return $this->ot1;
	}

	
	public function getOt2()
	{

		return $this->ot2;
	}

	
	public function getOt3()
	{

		return $this->ot3;
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

	
	public function getHrEmployeeId()
	{

		return $this->hr_employee_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TkAttendancePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = TkAttendancePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = TkAttendancePeer::NAME;
		}

	} 
	
	public function setTimeIn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [time_in] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->time_in !== $ts) {
			$this->time_in = $ts;
			$this->modifiedColumns[] = TkAttendancePeer::TIME_IN;
		}

	} 
	
	public function setTimeOut($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [time_out] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->time_out !== $ts) {
			$this->time_out = $ts;
			$this->modifiedColumns[] = TkAttendancePeer::TIME_OUT;
		}

	} 
	
	public function setTimeOutOrig($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [time_out_orig] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->time_out_orig !== $ts) {
			$this->time_out_orig = $ts;
			$this->modifiedColumns[] = TkAttendancePeer::TIME_OUT_ORIG;
		}

	} 
	
	public function setDuration($v)
	{

		if ($this->duration !== $v || $v === 0) {
			$this->duration = $v;
			$this->modifiedColumns[] = TkAttendancePeer::DURATION;
		}

	} 
	
	public function setNormal($v)
	{

		if ($this->normal !== $v || $v === 0) {
			$this->normal = $v;
			$this->modifiedColumns[] = TkAttendancePeer::NORMAL;
		}

	} 
	
	public function setOt1($v)
	{

		if ($this->ot1 !== $v || $v === 0) {
			$this->ot1 = $v;
			$this->modifiedColumns[] = TkAttendancePeer::OT1;
		}

	} 
	
	public function setOt2($v)
	{

		if ($this->ot2 !== $v || $v === 0) {
			$this->ot2 = $v;
			$this->modifiedColumns[] = TkAttendancePeer::OT2;
		}

	} 
	
	public function setOt3($v)
	{

		if ($this->ot3 !== $v || $v === 0) {
			$this->ot3 = $v;
			$this->modifiedColumns[] = TkAttendancePeer::OT3;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TkAttendancePeer::CREATED_BY;
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
			$this->modifiedColumns[] = TkAttendancePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = TkAttendancePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = TkAttendancePeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = TkAttendancePeer::HR_EMPLOYEE_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->time_in = $rs->getTimestamp($startcol + 3, null);

			$this->time_out = $rs->getTimestamp($startcol + 4, null);

			$this->time_out_orig = $rs->getTimestamp($startcol + 5, null);

			$this->duration = $rs->getFloat($startcol + 6);

			$this->normal = $rs->getFloat($startcol + 7);

			$this->ot1 = $rs->getFloat($startcol + 8);

			$this->ot2 = $rs->getFloat($startcol + 9);

			$this->ot3 = $rs->getFloat($startcol + 10);

			$this->created_by = $rs->getString($startcol + 11);

			$this->date_created = $rs->getTimestamp($startcol + 12, null);

			$this->modified_by = $rs->getString($startcol + 13);

			$this->date_modified = $rs->getTimestamp($startcol + 14, null);

			$this->hr_employee_id = $rs->getString($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TkAttendance object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TkAttendancePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TkAttendancePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TkAttendancePeer::DATABASE_NAME);
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
					$pk = TkAttendancePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TkAttendancePeer::doUpdate($this, $con);
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


			if (($retval = TkAttendancePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkAttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTimeIn();
				break;
			case 4:
				return $this->getTimeOut();
				break;
			case 5:
				return $this->getTimeOutOrig();
				break;
			case 6:
				return $this->getDuration();
				break;
			case 7:
				return $this->getNormal();
				break;
			case 8:
				return $this->getOt1();
				break;
			case 9:
				return $this->getOt2();
				break;
			case 10:
				return $this->getOt3();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getDateCreated();
				break;
			case 13:
				return $this->getModifiedBy();
				break;
			case 14:
				return $this->getDateModified();
				break;
			case 15:
				return $this->getHrEmployeeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkAttendancePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getTimeIn(),
			$keys[4] => $this->getTimeOut(),
			$keys[5] => $this->getTimeOutOrig(),
			$keys[6] => $this->getDuration(),
			$keys[7] => $this->getNormal(),
			$keys[8] => $this->getOt1(),
			$keys[9] => $this->getOt2(),
			$keys[10] => $this->getOt3(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getDateCreated(),
			$keys[13] => $this->getModifiedBy(),
			$keys[14] => $this->getDateModified(),
			$keys[15] => $this->getHrEmployeeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkAttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTimeIn($value);
				break;
			case 4:
				$this->setTimeOut($value);
				break;
			case 5:
				$this->setTimeOutOrig($value);
				break;
			case 6:
				$this->setDuration($value);
				break;
			case 7:
				$this->setNormal($value);
				break;
			case 8:
				$this->setOt1($value);
				break;
			case 9:
				$this->setOt2($value);
				break;
			case 10:
				$this->setOt3($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setDateCreated($value);
				break;
			case 13:
				$this->setModifiedBy($value);
				break;
			case 14:
				$this->setDateModified($value);
				break;
			case 15:
				$this->setHrEmployeeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkAttendancePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTimeIn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTimeOut($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTimeOutOrig($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDuration($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNormal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOt1($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOt2($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setOt3($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateCreated($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setModifiedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDateModified($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHrEmployeeId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TkAttendancePeer::DATABASE_NAME);

		if ($this->isColumnModified(TkAttendancePeer::ID)) $criteria->add(TkAttendancePeer::ID, $this->id);
		if ($this->isColumnModified(TkAttendancePeer::EMPLOYEE_NO)) $criteria->add(TkAttendancePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(TkAttendancePeer::NAME)) $criteria->add(TkAttendancePeer::NAME, $this->name);
		if ($this->isColumnModified(TkAttendancePeer::TIME_IN)) $criteria->add(TkAttendancePeer::TIME_IN, $this->time_in);
		if ($this->isColumnModified(TkAttendancePeer::TIME_OUT)) $criteria->add(TkAttendancePeer::TIME_OUT, $this->time_out);
		if ($this->isColumnModified(TkAttendancePeer::TIME_OUT_ORIG)) $criteria->add(TkAttendancePeer::TIME_OUT_ORIG, $this->time_out_orig);
		if ($this->isColumnModified(TkAttendancePeer::DURATION)) $criteria->add(TkAttendancePeer::DURATION, $this->duration);
		if ($this->isColumnModified(TkAttendancePeer::NORMAL)) $criteria->add(TkAttendancePeer::NORMAL, $this->normal);
		if ($this->isColumnModified(TkAttendancePeer::OT1)) $criteria->add(TkAttendancePeer::OT1, $this->ot1);
		if ($this->isColumnModified(TkAttendancePeer::OT2)) $criteria->add(TkAttendancePeer::OT2, $this->ot2);
		if ($this->isColumnModified(TkAttendancePeer::OT3)) $criteria->add(TkAttendancePeer::OT3, $this->ot3);
		if ($this->isColumnModified(TkAttendancePeer::CREATED_BY)) $criteria->add(TkAttendancePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TkAttendancePeer::DATE_CREATED)) $criteria->add(TkAttendancePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(TkAttendancePeer::MODIFIED_BY)) $criteria->add(TkAttendancePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(TkAttendancePeer::DATE_MODIFIED)) $criteria->add(TkAttendancePeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(TkAttendancePeer::HR_EMPLOYEE_ID)) $criteria->add(TkAttendancePeer::HR_EMPLOYEE_ID, $this->hr_employee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TkAttendancePeer::DATABASE_NAME);

		$criteria->add(TkAttendancePeer::ID, $this->id);

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

		$copyObj->setTimeIn($this->time_in);

		$copyObj->setTimeOut($this->time_out);

		$copyObj->setTimeOutOrig($this->time_out_orig);

		$copyObj->setDuration($this->duration);

		$copyObj->setNormal($this->normal);

		$copyObj->setOt1($this->ot1);

		$copyObj->setOt2($this->ot2);

		$copyObj->setOt3($this->ot3);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setHrEmployeeId($this->hr_employee_id);


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
			self::$peer = new TkAttendancePeer();
		}
		return self::$peer;
	}

} 