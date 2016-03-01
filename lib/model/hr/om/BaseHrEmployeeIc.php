<?php


abstract class BaseHrEmployeeIc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $sector;


	
	protected $occupation;


	
	protected $pass_type;


	
	protected $pass_no;


	
	protected $date_of_application;


	
	protected $date_of_issue;


	
	protected $date_of_expiry;


	
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

	
	public function getSector()
	{

		return $this->sector;
	}

	
	public function getOccupation()
	{

		return $this->occupation;
	}

	
	public function getPassType()
	{

		return $this->pass_type;
	}

	
	public function getPassNo()
	{

		return $this->pass_no;
	}

	
	public function getDateOfApplication($format = 'Y-m-d')
	{

		if ($this->date_of_application === null || $this->date_of_application === '') {
			return null;
		} elseif (!is_int($this->date_of_application)) {
						$ts = strtotime($this->date_of_application);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_of_application] as date/time value: " . var_export($this->date_of_application, true));
			}
		} else {
			$ts = $this->date_of_application;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDateOfIssue($format = 'Y-m-d')
	{

		if ($this->date_of_issue === null || $this->date_of_issue === '') {
			return null;
		} elseif (!is_int($this->date_of_issue)) {
						$ts = strtotime($this->date_of_issue);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_of_issue] as date/time value: " . var_export($this->date_of_issue, true));
			}
		} else {
			$ts = $this->date_of_issue;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDateOfExpiry($format = 'Y-m-d')
	{

		if ($this->date_of_expiry === null || $this->date_of_expiry === '') {
			return null;
		} elseif (!is_int($this->date_of_expiry)) {
						$ts = strtotime($this->date_of_expiry);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_of_expiry] as date/time value: " . var_export($this->date_of_expiry, true));
			}
		} else {
			$ts = $this->date_of_expiry;
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

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::NAME;
		}

	} 
	
	public function setSector($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sector !== $v) {
			$this->sector = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::SECTOR;
		}

	} 
	
	public function setOccupation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->occupation !== $v) {
			$this->occupation = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::OCCUPATION;
		}

	} 
	
	public function setPassType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pass_type !== $v) {
			$this->pass_type = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::PASS_TYPE;
		}

	} 
	
	public function setPassNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pass_no !== $v) {
			$this->pass_no = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::PASS_NO;
		}

	} 
	
	public function setDateOfApplication($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_of_application] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_of_application !== $ts) {
			$this->date_of_application = $ts;
			$this->modifiedColumns[] = HrEmployeeIcPeer::DATE_OF_APPLICATION;
		}

	} 
	
	public function setDateOfIssue($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_of_issue] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_of_issue !== $ts) {
			$this->date_of_issue = $ts;
			$this->modifiedColumns[] = HrEmployeeIcPeer::DATE_OF_ISSUE;
		}

	} 
	
	public function setDateOfExpiry($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_of_expiry] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_of_expiry !== $ts) {
			$this->date_of_expiry = $ts;
			$this->modifiedColumns[] = HrEmployeeIcPeer::DATE_OF_EXPIRY;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrEmployeeIcPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeIcPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrEmployeeIcPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->sector = $rs->getString($startcol + 3);

			$this->occupation = $rs->getString($startcol + 4);

			$this->pass_type = $rs->getString($startcol + 5);

			$this->pass_no = $rs->getString($startcol + 6);

			$this->date_of_application = $rs->getDate($startcol + 7, null);

			$this->date_of_issue = $rs->getDate($startcol + 8, null);

			$this->date_of_expiry = $rs->getDate($startcol + 9, null);

			$this->created_by = $rs->getString($startcol + 10);

			$this->date_created = $rs->getTimestamp($startcol + 11, null);

			$this->modified_by = $rs->getString($startcol + 12);

			$this->date_modified = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeIc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeIcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeIcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeIcPeer::DATABASE_NAME);
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
					$pk = HrEmployeeIcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeIcPeer::doUpdate($this, $con);
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


			if (($retval = HrEmployeeIcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeIcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSector();
				break;
			case 4:
				return $this->getOccupation();
				break;
			case 5:
				return $this->getPassType();
				break;
			case 6:
				return $this->getPassNo();
				break;
			case 7:
				return $this->getDateOfApplication();
				break;
			case 8:
				return $this->getDateOfIssue();
				break;
			case 9:
				return $this->getDateOfExpiry();
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
		$keys = HrEmployeeIcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getSector(),
			$keys[4] => $this->getOccupation(),
			$keys[5] => $this->getPassType(),
			$keys[6] => $this->getPassNo(),
			$keys[7] => $this->getDateOfApplication(),
			$keys[8] => $this->getDateOfIssue(),
			$keys[9] => $this->getDateOfExpiry(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getDateCreated(),
			$keys[12] => $this->getModifiedBy(),
			$keys[13] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeIcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSector($value);
				break;
			case 4:
				$this->setOccupation($value);
				break;
			case 5:
				$this->setPassType($value);
				break;
			case 6:
				$this->setPassNo($value);
				break;
			case 7:
				$this->setDateOfApplication($value);
				break;
			case 8:
				$this->setDateOfIssue($value);
				break;
			case 9:
				$this->setDateOfExpiry($value);
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
		$keys = HrEmployeeIcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSector($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOccupation($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPassType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPassNo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateOfApplication($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateOfIssue($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDateOfExpiry($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateCreated($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setModifiedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateModified($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeIcPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeIcPeer::ID)) $criteria->add(HrEmployeeIcPeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeIcPeer::EMPLOYEE_NO)) $criteria->add(HrEmployeeIcPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(HrEmployeeIcPeer::NAME)) $criteria->add(HrEmployeeIcPeer::NAME, $this->name);
		if ($this->isColumnModified(HrEmployeeIcPeer::SECTOR)) $criteria->add(HrEmployeeIcPeer::SECTOR, $this->sector);
		if ($this->isColumnModified(HrEmployeeIcPeer::OCCUPATION)) $criteria->add(HrEmployeeIcPeer::OCCUPATION, $this->occupation);
		if ($this->isColumnModified(HrEmployeeIcPeer::PASS_TYPE)) $criteria->add(HrEmployeeIcPeer::PASS_TYPE, $this->pass_type);
		if ($this->isColumnModified(HrEmployeeIcPeer::PASS_NO)) $criteria->add(HrEmployeeIcPeer::PASS_NO, $this->pass_no);
		if ($this->isColumnModified(HrEmployeeIcPeer::DATE_OF_APPLICATION)) $criteria->add(HrEmployeeIcPeer::DATE_OF_APPLICATION, $this->date_of_application);
		if ($this->isColumnModified(HrEmployeeIcPeer::DATE_OF_ISSUE)) $criteria->add(HrEmployeeIcPeer::DATE_OF_ISSUE, $this->date_of_issue);
		if ($this->isColumnModified(HrEmployeeIcPeer::DATE_OF_EXPIRY)) $criteria->add(HrEmployeeIcPeer::DATE_OF_EXPIRY, $this->date_of_expiry);
		if ($this->isColumnModified(HrEmployeeIcPeer::CREATED_BY)) $criteria->add(HrEmployeeIcPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeIcPeer::DATE_CREATED)) $criteria->add(HrEmployeeIcPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeIcPeer::MODIFIED_BY)) $criteria->add(HrEmployeeIcPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeIcPeer::DATE_MODIFIED)) $criteria->add(HrEmployeeIcPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeIcPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeIcPeer::ID, $this->id);

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

		$copyObj->setSector($this->sector);

		$copyObj->setOccupation($this->occupation);

		$copyObj->setPassType($this->pass_type);

		$copyObj->setPassNo($this->pass_no);

		$copyObj->setDateOfApplication($this->date_of_application);

		$copyObj->setDateOfIssue($this->date_of_issue);

		$copyObj->setDateOfExpiry($this->date_of_expiry);

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
			self::$peer = new HrEmployeeIcPeer();
		}
		return self::$peer;
	}

} 