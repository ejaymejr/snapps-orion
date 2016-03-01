<?php


abstract class BaseHrEmployeeSpouse extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $spousename = 'null';


	
	protected $remarks;


	
	protected $hr_employee_id;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;

	
	protected $aHrEmployee;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSpousename()
	{

		return $this->spousename;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
	}

	
	public function getHrEmployeeId()
	{

		return $this->hr_employee_id;
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
			$this->modifiedColumns[] = HrEmployeeSpousePeer::ID;
		}

	} 
	
	public function setSpousename($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->spousename !== $v || $v === 'null') {
			$this->spousename = $v;
			$this->modifiedColumns[] = HrEmployeeSpousePeer::SPOUSENAME;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrEmployeeSpousePeer::REMARKS;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = HrEmployeeSpousePeer::HR_EMPLOYEE_ID;
		}

		if ($this->aHrEmployee !== null && $this->aHrEmployee->getId() !== $v) {
			$this->aHrEmployee = null;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeSpousePeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrEmployeeSpousePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeSpousePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrEmployeeSpousePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->spousename = $rs->getString($startcol + 1);

			$this->remarks = $rs->getString($startcol + 2);

			$this->hr_employee_id = $rs->getString($startcol + 3);

			$this->created_by = $rs->getString($startcol + 4);

			$this->date_created = $rs->getTimestamp($startcol + 5, null);

			$this->modified_by = $rs->getString($startcol + 6);

			$this->date_modified = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeSpouse object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeSpousePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeSpousePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeSpousePeer::DATABASE_NAME);
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


												
			if ($this->aHrEmployee !== null) {
				if ($this->aHrEmployee->isModified()) {
					$affectedRows += $this->aHrEmployee->save($con);
				}
				$this->setHrEmployee($this->aHrEmployee);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HrEmployeeSpousePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeSpousePeer::doUpdate($this, $con);
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


												
			if ($this->aHrEmployee !== null) {
				if (!$this->aHrEmployee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHrEmployee->getValidationFailures());
				}
			}


			if (($retval = HrEmployeeSpousePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeSpousePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSpousename();
				break;
			case 2:
				return $this->getRemarks();
				break;
			case 3:
				return $this->getHrEmployeeId();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getDateCreated();
				break;
			case 6:
				return $this->getModifiedBy();
				break;
			case 7:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeSpousePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSpousename(),
			$keys[2] => $this->getRemarks(),
			$keys[3] => $this->getHrEmployeeId(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getDateCreated(),
			$keys[6] => $this->getModifiedBy(),
			$keys[7] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeSpousePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSpousename($value);
				break;
			case 2:
				$this->setRemarks($value);
				break;
			case 3:
				$this->setHrEmployeeId($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setDateCreated($value);
				break;
			case 6:
				$this->setModifiedBy($value);
				break;
			case 7:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeSpousePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSpousename($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRemarks($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHrEmployeeId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateCreated($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setModifiedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateModified($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeSpousePeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeSpousePeer::ID)) $criteria->add(HrEmployeeSpousePeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeSpousePeer::SPOUSENAME)) $criteria->add(HrEmployeeSpousePeer::SPOUSENAME, $this->spousename);
		if ($this->isColumnModified(HrEmployeeSpousePeer::REMARKS)) $criteria->add(HrEmployeeSpousePeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrEmployeeSpousePeer::HR_EMPLOYEE_ID)) $criteria->add(HrEmployeeSpousePeer::HR_EMPLOYEE_ID, $this->hr_employee_id);
		if ($this->isColumnModified(HrEmployeeSpousePeer::CREATED_BY)) $criteria->add(HrEmployeeSpousePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeSpousePeer::DATE_CREATED)) $criteria->add(HrEmployeeSpousePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeSpousePeer::MODIFIED_BY)) $criteria->add(HrEmployeeSpousePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeSpousePeer::DATE_MODIFIED)) $criteria->add(HrEmployeeSpousePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeSpousePeer::DATABASE_NAME);

		$criteria->add(HrEmployeeSpousePeer::ID, $this->id);

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

		$copyObj->setSpousename($this->spousename);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setHrEmployeeId($this->hr_employee_id);

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
			self::$peer = new HrEmployeeSpousePeer();
		}
		return self::$peer;
	}

	
	public function setHrEmployee($v)
	{


		if ($v === null) {
			$this->setHrEmployeeId(NULL);
		} else {
			$this->setHrEmployeeId($v->getId());
		}


		$this->aHrEmployee = $v;
	}


	
	public function getHrEmployee($con = null)
	{
		if ($this->aHrEmployee === null && (($this->hr_employee_id !== "" && $this->hr_employee_id !== null))) {
						include_once 'lib/model/hr/om/BaseHrEmployeePeer.php';

			$this->aHrEmployee = HrEmployeePeer::retrieveByPK($this->hr_employee_id, $con);

			
		}
		return $this->aHrEmployee;
	}

} 