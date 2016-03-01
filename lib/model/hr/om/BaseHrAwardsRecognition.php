<?php


abstract class BaseHrAwardsRecognition extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $recognition_desc;


	
	protected $place_given;


	
	protected $date_given;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_id;

	
	protected $aHrEmployee;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getRecognitionDesc()
	{

		return $this->recognition_desc;
	}

	
	public function getPlaceGiven()
	{

		return $this->place_given;
	}

	
	public function getDateGiven($format = 'Y-m-d')
	{

		if ($this->date_given === null || $this->date_given === '') {
			return null;
		} elseif (!is_int($this->date_given)) {
						$ts = strtotime($this->date_given);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_given] as date/time value: " . var_export($this->date_given, true));
			}
		} else {
			$ts = $this->date_given;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::ID;
		}

	} 
	
	public function setRecognitionDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->recognition_desc !== $v) {
			$this->recognition_desc = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::RECOGNITION_DESC;
		}

	} 
	
	public function setPlaceGiven($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->place_given !== $v) {
			$this->place_given = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::PLACE_GIVEN;
		}

	} 
	
	public function setDateGiven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_given] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_given !== $ts) {
			$this->date_given = $ts;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::DATE_GIVEN;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = HrAwardsRecognitionPeer::HR_EMPLOYEE_ID;
		}

		if ($this->aHrEmployee !== null && $this->aHrEmployee->getId() !== $v) {
			$this->aHrEmployee = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->recognition_desc = $rs->getString($startcol + 1);

			$this->place_given = $rs->getString($startcol + 2);

			$this->date_given = $rs->getDate($startcol + 3, null);

			$this->remarks = $rs->getString($startcol + 4);

			$this->created_by = $rs->getString($startcol + 5);

			$this->date_created = $rs->getTimestamp($startcol + 6, null);

			$this->modified_by = $rs->getString($startcol + 7);

			$this->date_modified = $rs->getTimestamp($startcol + 8, null);

			$this->hr_employee_id = $rs->getString($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrAwardsRecognition object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrAwardsRecognitionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrAwardsRecognitionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrAwardsRecognitionPeer::DATABASE_NAME);
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
					$pk = HrAwardsRecognitionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrAwardsRecognitionPeer::doUpdate($this, $con);
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


			if (($retval = HrAwardsRecognitionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrAwardsRecognitionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getRecognitionDesc();
				break;
			case 2:
				return $this->getPlaceGiven();
				break;
			case 3:
				return $this->getDateGiven();
				break;
			case 4:
				return $this->getRemarks();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getDateCreated();
				break;
			case 7:
				return $this->getModifiedBy();
				break;
			case 8:
				return $this->getDateModified();
				break;
			case 9:
				return $this->getHrEmployeeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrAwardsRecognitionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getRecognitionDesc(),
			$keys[2] => $this->getPlaceGiven(),
			$keys[3] => $this->getDateGiven(),
			$keys[4] => $this->getRemarks(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getDateCreated(),
			$keys[7] => $this->getModifiedBy(),
			$keys[8] => $this->getDateModified(),
			$keys[9] => $this->getHrEmployeeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrAwardsRecognitionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setRecognitionDesc($value);
				break;
			case 2:
				$this->setPlaceGiven($value);
				break;
			case 3:
				$this->setDateGiven($value);
				break;
			case 4:
				$this->setRemarks($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setDateCreated($value);
				break;
			case 7:
				$this->setModifiedBy($value);
				break;
			case 8:
				$this->setDateModified($value);
				break;
			case 9:
				$this->setHrEmployeeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrAwardsRecognitionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecognitionDesc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPlaceGiven($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateGiven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRemarks($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDateCreated($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setModifiedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateModified($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setHrEmployeeId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrAwardsRecognitionPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrAwardsRecognitionPeer::ID)) $criteria->add(HrAwardsRecognitionPeer::ID, $this->id);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::RECOGNITION_DESC)) $criteria->add(HrAwardsRecognitionPeer::RECOGNITION_DESC, $this->recognition_desc);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::PLACE_GIVEN)) $criteria->add(HrAwardsRecognitionPeer::PLACE_GIVEN, $this->place_given);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::DATE_GIVEN)) $criteria->add(HrAwardsRecognitionPeer::DATE_GIVEN, $this->date_given);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::REMARKS)) $criteria->add(HrAwardsRecognitionPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::CREATED_BY)) $criteria->add(HrAwardsRecognitionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::DATE_CREATED)) $criteria->add(HrAwardsRecognitionPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::MODIFIED_BY)) $criteria->add(HrAwardsRecognitionPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::DATE_MODIFIED)) $criteria->add(HrAwardsRecognitionPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID)) $criteria->add(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, $this->hr_employee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrAwardsRecognitionPeer::DATABASE_NAME);

		$criteria->add(HrAwardsRecognitionPeer::ID, $this->id);

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

		$copyObj->setRecognitionDesc($this->recognition_desc);

		$copyObj->setPlaceGiven($this->place_given);

		$copyObj->setDateGiven($this->date_given);

		$copyObj->setRemarks($this->remarks);

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
			self::$peer = new HrAwardsRecognitionPeer();
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