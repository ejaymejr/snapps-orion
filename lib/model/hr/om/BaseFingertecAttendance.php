<?php


abstract class BaseFingertecAttendance extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $trans_date;


	
	protected $enroll_no = '0';


	
	protected $machine_no = '0';


	
	protected $is_processed;


	
	protected $date_dump;

	
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

	
	public function getTransDate($format = 'Y-m-d H:i:s')
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

	
	public function getEnrollNo()
	{

		return $this->enroll_no;
	}

	
	public function getMachineNo()
	{

		return $this->machine_no;
	}

	
	public function getIsProcessed()
	{

		return $this->is_processed;
	}

	
	public function getDateDump($format = 'Y-m-d H:i:s')
	{

		if ($this->date_dump === null || $this->date_dump === '') {
			return null;
		} elseif (!is_int($this->date_dump)) {
						$ts = strtotime($this->date_dump);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_dump] as date/time value: " . var_export($this->date_dump, true));
			}
		} else {
			$ts = $this->date_dump;
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

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::NAME;
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
			$this->modifiedColumns[] = FingertecAttendancePeer::TRANS_DATE;
		}

	} 
	
	public function setEnrollNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enroll_no !== $v || $v === '0') {
			$this->enroll_no = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::ENROLL_NO;
		}

	} 
	
	public function setMachineNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->machine_no !== $v || $v === '0') {
			$this->machine_no = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::MACHINE_NO;
		}

	} 
	
	public function setIsProcessed($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_processed !== $v) {
			$this->is_processed = $v;
			$this->modifiedColumns[] = FingertecAttendancePeer::IS_PROCESSED;
		}

	} 
	
	public function setDateDump($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_dump] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_dump !== $ts) {
			$this->date_dump = $ts;
			$this->modifiedColumns[] = FingertecAttendancePeer::DATE_DUMP;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->trans_date = $rs->getTimestamp($startcol + 3, null);

			$this->enroll_no = $rs->getString($startcol + 4);

			$this->machine_no = $rs->getString($startcol + 5);

			$this->is_processed = $rs->getString($startcol + 6);

			$this->date_dump = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FingertecAttendance object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FingertecAttendancePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FingertecAttendancePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FingertecAttendancePeer::DATABASE_NAME);
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
					$pk = FingertecAttendancePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FingertecAttendancePeer::doUpdate($this, $con);
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


			if (($retval = FingertecAttendancePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FingertecAttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTransDate();
				break;
			case 4:
				return $this->getEnrollNo();
				break;
			case 5:
				return $this->getMachineNo();
				break;
			case 6:
				return $this->getIsProcessed();
				break;
			case 7:
				return $this->getDateDump();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FingertecAttendancePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getTransDate(),
			$keys[4] => $this->getEnrollNo(),
			$keys[5] => $this->getMachineNo(),
			$keys[6] => $this->getIsProcessed(),
			$keys[7] => $this->getDateDump(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FingertecAttendancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTransDate($value);
				break;
			case 4:
				$this->setEnrollNo($value);
				break;
			case 5:
				$this->setMachineNo($value);
				break;
			case 6:
				$this->setIsProcessed($value);
				break;
			case 7:
				$this->setDateDump($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FingertecAttendancePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTransDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEnrollNo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMachineNo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsProcessed($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateDump($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FingertecAttendancePeer::DATABASE_NAME);

		if ($this->isColumnModified(FingertecAttendancePeer::ID)) $criteria->add(FingertecAttendancePeer::ID, $this->id);
		if ($this->isColumnModified(FingertecAttendancePeer::EMPLOYEE_NO)) $criteria->add(FingertecAttendancePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(FingertecAttendancePeer::NAME)) $criteria->add(FingertecAttendancePeer::NAME, $this->name);
		if ($this->isColumnModified(FingertecAttendancePeer::TRANS_DATE)) $criteria->add(FingertecAttendancePeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(FingertecAttendancePeer::ENROLL_NO)) $criteria->add(FingertecAttendancePeer::ENROLL_NO, $this->enroll_no);
		if ($this->isColumnModified(FingertecAttendancePeer::MACHINE_NO)) $criteria->add(FingertecAttendancePeer::MACHINE_NO, $this->machine_no);
		if ($this->isColumnModified(FingertecAttendancePeer::IS_PROCESSED)) $criteria->add(FingertecAttendancePeer::IS_PROCESSED, $this->is_processed);
		if ($this->isColumnModified(FingertecAttendancePeer::DATE_DUMP)) $criteria->add(FingertecAttendancePeer::DATE_DUMP, $this->date_dump);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FingertecAttendancePeer::DATABASE_NAME);

		$criteria->add(FingertecAttendancePeer::ID, $this->id);

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

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setEnrollNo($this->enroll_no);

		$copyObj->setMachineNo($this->machine_no);

		$copyObj->setIsProcessed($this->is_processed);

		$copyObj->setDateDump($this->date_dump);


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
			self::$peer = new FingertecAttendancePeer();
		}
		return self::$peer;
	}

} 