<?php


abstract class BaseHrHiring extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $contact;


	
	protected $nric_fin;


	
	protected $date_of_employment;


	
	protected $place_of_work;


	
	protected $job_title;


	
	protected $salary;


	
	protected $working_days;


	
	protected $other_condition;


	
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

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getNricFin()
	{

		return $this->nric_fin;
	}

	
	public function getDateOfEmployment($format = 'Y-m-d')
	{

		if ($this->date_of_employment === null || $this->date_of_employment === '') {
			return null;
		} elseif (!is_int($this->date_of_employment)) {
						$ts = strtotime($this->date_of_employment);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_of_employment] as date/time value: " . var_export($this->date_of_employment, true));
			}
		} else {
			$ts = $this->date_of_employment;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPlaceOfWork()
	{

		return $this->place_of_work;
	}

	
	public function getJobTitle()
	{

		return $this->job_title;
	}

	
	public function getSalary()
	{

		return $this->salary;
	}

	
	public function getWorkingDays()
	{

		return $this->working_days;
	}

	
	public function getOtherCondition()
	{

		return $this->other_condition;
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
			$this->modifiedColumns[] = HrHiringPeer::ID;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HrHiringPeer::NAME;
		}

	} 
	
	public function setContact($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = HrHiringPeer::CONTACT;
		}

	} 
	
	public function setNricFin($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nric_fin !== $v) {
			$this->nric_fin = $v;
			$this->modifiedColumns[] = HrHiringPeer::NRIC_FIN;
		}

	} 
	
	public function setDateOfEmployment($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_of_employment] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_of_employment !== $ts) {
			$this->date_of_employment = $ts;
			$this->modifiedColumns[] = HrHiringPeer::DATE_OF_EMPLOYMENT;
		}

	} 
	
	public function setPlaceOfWork($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->place_of_work !== $v) {
			$this->place_of_work = $v;
			$this->modifiedColumns[] = HrHiringPeer::PLACE_OF_WORK;
		}

	} 
	
	public function setJobTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->job_title !== $v) {
			$this->job_title = $v;
			$this->modifiedColumns[] = HrHiringPeer::JOB_TITLE;
		}

	} 
	
	public function setSalary($v)
	{

		if ($this->salary !== $v) {
			$this->salary = $v;
			$this->modifiedColumns[] = HrHiringPeer::SALARY;
		}

	} 
	
	public function setWorkingDays($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->working_days !== $v) {
			$this->working_days = $v;
			$this->modifiedColumns[] = HrHiringPeer::WORKING_DAYS;
		}

	} 
	
	public function setOtherCondition($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->other_condition !== $v) {
			$this->other_condition = $v;
			$this->modifiedColumns[] = HrHiringPeer::OTHER_CONDITION;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrHiringPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrHiringPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrHiringPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrHiringPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->contact = $rs->getString($startcol + 2);

			$this->nric_fin = $rs->getString($startcol + 3);

			$this->date_of_employment = $rs->getDate($startcol + 4, null);

			$this->place_of_work = $rs->getString($startcol + 5);

			$this->job_title = $rs->getString($startcol + 6);

			$this->salary = $rs->getFloat($startcol + 7);

			$this->working_days = $rs->getString($startcol + 8);

			$this->other_condition = $rs->getString($startcol + 9);

			$this->created_by = $rs->getString($startcol + 10);

			$this->date_created = $rs->getTimestamp($startcol + 11, null);

			$this->modified_by = $rs->getString($startcol + 12);

			$this->date_modified = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrHiring object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrHiringPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrHiringPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrHiringPeer::DATABASE_NAME);
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
					$pk = HrHiringPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrHiringPeer::doUpdate($this, $con);
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


			if (($retval = HrHiringPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrHiringPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getContact();
				break;
			case 3:
				return $this->getNricFin();
				break;
			case 4:
				return $this->getDateOfEmployment();
				break;
			case 5:
				return $this->getPlaceOfWork();
				break;
			case 6:
				return $this->getJobTitle();
				break;
			case 7:
				return $this->getSalary();
				break;
			case 8:
				return $this->getWorkingDays();
				break;
			case 9:
				return $this->getOtherCondition();
				break;
			case 10:
				return $this->getCreatedBy();
				break;
			case 11:
				return $this->getDateCreated();
				break;
			case 12:
				return $this->getModifiedBy();
				break;
			case 13:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrHiringPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getContact(),
			$keys[3] => $this->getNricFin(),
			$keys[4] => $this->getDateOfEmployment(),
			$keys[5] => $this->getPlaceOfWork(),
			$keys[6] => $this->getJobTitle(),
			$keys[7] => $this->getSalary(),
			$keys[8] => $this->getWorkingDays(),
			$keys[9] => $this->getOtherCondition(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getDateCreated(),
			$keys[12] => $this->getModifiedBy(),
			$keys[13] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrHiringPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setContact($value);
				break;
			case 3:
				$this->setNricFin($value);
				break;
			case 4:
				$this->setDateOfEmployment($value);
				break;
			case 5:
				$this->setPlaceOfWork($value);
				break;
			case 6:
				$this->setJobTitle($value);
				break;
			case 7:
				$this->setSalary($value);
				break;
			case 8:
				$this->setWorkingDays($value);
				break;
			case 9:
				$this->setOtherCondition($value);
				break;
			case 10:
				$this->setCreatedBy($value);
				break;
			case 11:
				$this->setDateCreated($value);
				break;
			case 12:
				$this->setModifiedBy($value);
				break;
			case 13:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrHiringPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNricFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDateOfEmployment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlaceOfWork($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setJobTitle($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalary($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWorkingDays($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOtherCondition($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateCreated($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setModifiedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateModified($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrHiringPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrHiringPeer::ID)) $criteria->add(HrHiringPeer::ID, $this->id);
		if ($this->isColumnModified(HrHiringPeer::NAME)) $criteria->add(HrHiringPeer::NAME, $this->name);
		if ($this->isColumnModified(HrHiringPeer::CONTACT)) $criteria->add(HrHiringPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(HrHiringPeer::NRIC_FIN)) $criteria->add(HrHiringPeer::NRIC_FIN, $this->nric_fin);
		if ($this->isColumnModified(HrHiringPeer::DATE_OF_EMPLOYMENT)) $criteria->add(HrHiringPeer::DATE_OF_EMPLOYMENT, $this->date_of_employment);
		if ($this->isColumnModified(HrHiringPeer::PLACE_OF_WORK)) $criteria->add(HrHiringPeer::PLACE_OF_WORK, $this->place_of_work);
		if ($this->isColumnModified(HrHiringPeer::JOB_TITLE)) $criteria->add(HrHiringPeer::JOB_TITLE, $this->job_title);
		if ($this->isColumnModified(HrHiringPeer::SALARY)) $criteria->add(HrHiringPeer::SALARY, $this->salary);
		if ($this->isColumnModified(HrHiringPeer::WORKING_DAYS)) $criteria->add(HrHiringPeer::WORKING_DAYS, $this->working_days);
		if ($this->isColumnModified(HrHiringPeer::OTHER_CONDITION)) $criteria->add(HrHiringPeer::OTHER_CONDITION, $this->other_condition);
		if ($this->isColumnModified(HrHiringPeer::CREATED_BY)) $criteria->add(HrHiringPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrHiringPeer::DATE_CREATED)) $criteria->add(HrHiringPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrHiringPeer::MODIFIED_BY)) $criteria->add(HrHiringPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrHiringPeer::DATE_MODIFIED)) $criteria->add(HrHiringPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrHiringPeer::DATABASE_NAME);

		$criteria->add(HrHiringPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setContact($this->contact);

		$copyObj->setNricFin($this->nric_fin);

		$copyObj->setDateOfEmployment($this->date_of_employment);

		$copyObj->setPlaceOfWork($this->place_of_work);

		$copyObj->setJobTitle($this->job_title);

		$copyObj->setSalary($this->salary);

		$copyObj->setWorkingDays($this->working_days);

		$copyObj->setOtherCondition($this->other_condition);

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
			self::$peer = new HrHiringPeer();
		}
		return self::$peer;
	}

} 