<?php


abstract class BaseHrBenefit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $benefit_code = 'null';


	
	protected $description;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_benefit_id;

	
	protected $aHrEmployeeBenefit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getBenefitCode()
	{

		return $this->benefit_code;
	}

	
	public function getDescription()
	{

		return $this->description;
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

	
	public function getHrEmployeeBenefitId()
	{

		return $this->hr_employee_benefit_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrBenefitPeer::ID;
		}

	} 
	
	public function setBenefitCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->benefit_code !== $v || $v === 'null') {
			$this->benefit_code = $v;
			$this->modifiedColumns[] = HrBenefitPeer::BENEFIT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = HrBenefitPeer::DESCRIPTION;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrBenefitPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrBenefitPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrBenefitPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrBenefitPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrBenefitPeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeBenefitId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_benefit_id !== $v) {
			$this->hr_employee_benefit_id = $v;
			$this->modifiedColumns[] = HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID;
		}

		if ($this->aHrEmployeeBenefit !== null && $this->aHrEmployeeBenefit->getId() !== $v) {
			$this->aHrEmployeeBenefit = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->benefit_code = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->remarks = $rs->getString($startcol + 3);

			$this->created_by = $rs->getString($startcol + 4);

			$this->date_created = $rs->getTimestamp($startcol + 5, null);

			$this->modified_by = $rs->getString($startcol + 6);

			$this->date_modified = $rs->getTimestamp($startcol + 7, null);

			$this->hr_employee_benefit_id = $rs->getString($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrBenefit object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrBenefitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrBenefitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrBenefitPeer::DATABASE_NAME);
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


												
			if ($this->aHrEmployeeBenefit !== null) {
				if ($this->aHrEmployeeBenefit->isModified()) {
					$affectedRows += $this->aHrEmployeeBenefit->save($con);
				}
				$this->setHrEmployeeBenefit($this->aHrEmployeeBenefit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HrBenefitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrBenefitPeer::doUpdate($this, $con);
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


												
			if ($this->aHrEmployeeBenefit !== null) {
				if (!$this->aHrEmployeeBenefit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHrEmployeeBenefit->getValidationFailures());
				}
			}


			if (($retval = HrBenefitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrBenefitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getBenefitCode();
				break;
			case 2:
				return $this->getDescription();
				break;
			case 3:
				return $this->getRemarks();
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
			case 8:
				return $this->getHrEmployeeBenefitId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrBenefitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBenefitCode(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getRemarks(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getDateCreated(),
			$keys[6] => $this->getModifiedBy(),
			$keys[7] => $this->getDateModified(),
			$keys[8] => $this->getHrEmployeeBenefitId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrBenefitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setBenefitCode($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
			case 3:
				$this->setRemarks($value);
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
			case 8:
				$this->setHrEmployeeBenefitId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrBenefitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBenefitCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRemarks($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateCreated($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setModifiedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateModified($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHrEmployeeBenefitId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrBenefitPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrBenefitPeer::ID)) $criteria->add(HrBenefitPeer::ID, $this->id);
		if ($this->isColumnModified(HrBenefitPeer::BENEFIT_CODE)) $criteria->add(HrBenefitPeer::BENEFIT_CODE, $this->benefit_code);
		if ($this->isColumnModified(HrBenefitPeer::DESCRIPTION)) $criteria->add(HrBenefitPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(HrBenefitPeer::REMARKS)) $criteria->add(HrBenefitPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrBenefitPeer::CREATED_BY)) $criteria->add(HrBenefitPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrBenefitPeer::DATE_CREATED)) $criteria->add(HrBenefitPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrBenefitPeer::MODIFIED_BY)) $criteria->add(HrBenefitPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrBenefitPeer::DATE_MODIFIED)) $criteria->add(HrBenefitPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID)) $criteria->add(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, $this->hr_employee_benefit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrBenefitPeer::DATABASE_NAME);

		$criteria->add(HrBenefitPeer::ID, $this->id);

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

		$copyObj->setBenefitCode($this->benefit_code);

		$copyObj->setDescription($this->description);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setHrEmployeeBenefitId($this->hr_employee_benefit_id);


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
			self::$peer = new HrBenefitPeer();
		}
		return self::$peer;
	}

	
	public function setHrEmployeeBenefit($v)
	{


		if ($v === null) {
			$this->setHrEmployeeBenefitId(NULL);
		} else {
			$this->setHrEmployeeBenefitId($v->getId());
		}


		$this->aHrEmployeeBenefit = $v;
	}


	
	public function getHrEmployeeBenefit($con = null)
	{
		if ($this->aHrEmployeeBenefit === null && (($this->hr_employee_benefit_id !== "" && $this->hr_employee_benefit_id !== null))) {
						include_once 'lib/model/hr/om/BaseHrEmployeeBenefitPeer.php';

			$this->aHrEmployeeBenefit = HrEmployeeBenefitPeer::retrieveByPK($this->hr_employee_benefit_id, $con);

			
		}
		return $this->aHrEmployeeBenefit;
	}

} 