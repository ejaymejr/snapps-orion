<?php


abstract class BaseAttendance extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $time_in;


	
	protected $time_out;


	
	protected $time_out_orig;


	
	protected $duration = 0;


	
	protected $normal = 0;


	
	protected $ot1 = 0;


	
	protected $ot2 = 0;


	
	protected $ot3 = 0;


	
	protected $name;

	
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

	
	public function getName()
	{

		return $this->name;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AttendancePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = AttendancePeer::EMPLOYEE_NO;
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
			$this->modifiedColumns[] = AttendancePeer::TIME_IN;
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
			$this->modifiedColumns[] = AttendancePeer::TIME_OUT;
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
			$this->modifiedColumns[] = AttendancePeer::TIME_OUT_ORIG;
		}

	} 
	
	public function setDuration($v)
	{

		if ($this->duration !== $v || $v === 0) {
			$this->duration = $v;
			$this->modifiedColumns[] = AttendancePeer::DURATION;
		}

	} 
	
	public function setNormal($v)
	{

		if ($this->normal !== $v || $v === 0) {
			$this->normal = $v;
			$this->modifiedColumns[] = AttendancePeer::NORMAL;
		}

	} 
	
	public function setOt1($v)
	{

		if ($this->ot1 !== $v || $v === 0) {
			$this->ot1 = $v;
			$this->modifiedColumns[] = AttendancePeer::OT1;
		}

	} 
	
	public function setOt2($v)
	{

		if ($this->ot2 !== $v || $v === 0) {
			$this->ot2 = $v;
			$this->modifiedColumns[] = AttendancePeer::OT2;
		}

	} 
	
	public function setOt3($v)
	{

		if ($this->ot3 !== $v || $v === 0) {
			$this->ot3 = $v;
			$this->modifiedColumns[] = AttendancePeer::OT3;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AttendancePeer::NAME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->time_in = $rs->getTimestamp($startcol + 2, null);

			$this->time_out = $rs->getTimestamp($startcol + 3, null);

			$this->time_out_orig = $rs->getTimestamp($startcol + 4, null);

			$this->duration = $rs->getFloat($startcol + 5);

			$this->normal = $rs->getFloat($startcol + 6);

			$this->ot1 = $rs->getFloat($startcol + 7);

			$this->ot2 = $rs->getFloat($startcol + 8);

			$this->ot3 = $rs->getFloat($startcol + 9);

			$this->name = $rs->getString($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Attendance object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AttendancePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AttendancePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AttendancePeer::DATABASE_NAME);
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
					$pk = AttendancePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AttendancePeer::doUpdate($this, $con);
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


			if (($retval = AttendancePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTimeIn();
				break;
			case 3:
				return $this->getTimeOut();
				break;
			case 4:
				return $this->getTimeOutOrig();
				break;
			case 5:
				return $this->getDuration();
				break;
			case 6:
				return $this->getNormal();
				break;
			case 7:
				return $this->getOt1();
				break;
			case 8:
				return $this->getOt2();
				break;
			case 9:
				return $this->getOt3();
				break;
			case 10:
				return $this->getName();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttendancePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getTimeIn(),
			$keys[3] => $this->getTimeOut(),
			$keys[4] => $this->getTimeOutOrig(),
			$keys[5] => $this->getDuration(),
			$keys[6] => $this->getNormal(),
			$keys[7] => $this->getOt1(),
			$keys[8] => $this->getOt2(),
			$keys[9] => $this->getOt3(),
			$keys[10] => $this->getName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTimeIn($value);
				break;
			case 3:
				$this->setTimeOut($value);
				break;
			case 4:
				$this->setTimeOutOrig($value);
				break;
			case 5:
				$this->setDuration($value);
				break;
			case 6:
				$this->setNormal($value);
				break;
			case 7:
				$this->setOt1($value);
				break;
			case 8:
				$this->setOt2($value);
				break;
			case 9:
				$this->setOt3($value);
				break;
			case 10:
				$this->setName($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttendancePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTimeIn($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTimeOut($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTimeOutOrig($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDuration($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNormal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOt1($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOt2($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOt3($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setName($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AttendancePeer::DATABASE_NAME);

		if ($this->isColumnModified(AttendancePeer::ID)) $criteria->add(AttendancePeer::ID, $this->id);
		if ($this->isColumnModified(AttendancePeer::EMPLOYEE_NO)) $criteria->add(AttendancePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(AttendancePeer::TIME_IN)) $criteria->add(AttendancePeer::TIME_IN, $this->time_in);
		if ($this->isColumnModified(AttendancePeer::TIME_OUT)) $criteria->add(AttendancePeer::TIME_OUT, $this->time_out);
		if ($this->isColumnModified(AttendancePeer::TIME_OUT_ORIG)) $criteria->add(AttendancePeer::TIME_OUT_ORIG, $this->time_out_orig);
		if ($this->isColumnModified(AttendancePeer::DURATION)) $criteria->add(AttendancePeer::DURATION, $this->duration);
		if ($this->isColumnModified(AttendancePeer::NORMAL)) $criteria->add(AttendancePeer::NORMAL, $this->normal);
		if ($this->isColumnModified(AttendancePeer::OT1)) $criteria->add(AttendancePeer::OT1, $this->ot1);
		if ($this->isColumnModified(AttendancePeer::OT2)) $criteria->add(AttendancePeer::OT2, $this->ot2);
		if ($this->isColumnModified(AttendancePeer::OT3)) $criteria->add(AttendancePeer::OT3, $this->ot3);
		if ($this->isColumnModified(AttendancePeer::NAME)) $criteria->add(AttendancePeer::NAME, $this->name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AttendancePeer::DATABASE_NAME);

		$criteria->add(AttendancePeer::ID, $this->id);

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

		$copyObj->setTimeIn($this->time_in);

		$copyObj->setTimeOut($this->time_out);

		$copyObj->setTimeOutOrig($this->time_out_orig);

		$copyObj->setDuration($this->duration);

		$copyObj->setNormal($this->normal);

		$copyObj->setOt1($this->ot1);

		$copyObj->setOt2($this->ot2);

		$copyObj->setOt3($this->ot3);

		$copyObj->setName($this->name);


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
			self::$peer = new AttendancePeer();
		}
		return self::$peer;
	}

} 