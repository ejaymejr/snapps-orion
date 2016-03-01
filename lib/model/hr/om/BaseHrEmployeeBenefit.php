<?php


abstract class BaseHrEmployeeBenefit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $benefit_code = 'null';


	
	protected $date_start;


	
	protected $date_end;


	
	protected $amount = 0;


	
	protected $remarks;


	
	protected $is_active;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_id;

	
	protected $aHrEmployee;

	
	protected $collHrBenefits;

	
	protected $lastHrBenefitCriteria = null;

	
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

	
	public function getDateStart($format = 'Y-m-d H:i:s')
	{

		if ($this->date_start === null || $this->date_start === '') {
			return null;
		} elseif (!is_int($this->date_start)) {
						$ts = strtotime($this->date_start);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_start] as date/time value: " . var_export($this->date_start, true));
			}
		} else {
			$ts = $this->date_start;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDateEnd($format = 'Y-m-d H:i:s')
	{

		if ($this->date_end === null || $this->date_end === '') {
			return null;
		} elseif (!is_int($this->date_end)) {
						$ts = strtotime($this->date_end);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_end] as date/time value: " . var_export($this->date_end, true));
			}
		} else {
			$ts = $this->date_end;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
	}

	
	public function getIsActive()
	{

		return $this->is_active;
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
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::ID;
		}

	} 
	
	public function setBenefitCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->benefit_code !== $v || $v === 'null') {
			$this->benefit_code = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::BENEFIT_CODE;
		}

	} 
	
	public function setDateStart($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_start] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_start !== $ts) {
			$this->date_start = $ts;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::DATE_START;
		}

	} 
	
	public function setDateEnd($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_end] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_end !== $ts) {
			$this->date_end = $ts;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::DATE_END;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::AMOUNT;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::REMARKS;
		}

	} 
	
	public function setIsActive($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::IS_ACTIVE;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = HrEmployeeBenefitPeer::HR_EMPLOYEE_ID;
		}

		if ($this->aHrEmployee !== null && $this->aHrEmployee->getId() !== $v) {
			$this->aHrEmployee = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->benefit_code = $rs->getString($startcol + 1);

			$this->date_start = $rs->getTimestamp($startcol + 2, null);

			$this->date_end = $rs->getTimestamp($startcol + 3, null);

			$this->amount = $rs->getFloat($startcol + 4);

			$this->remarks = $rs->getString($startcol + 5);

			$this->is_active = $rs->getString($startcol + 6);

			$this->created_by = $rs->getString($startcol + 7);

			$this->date_created = $rs->getTimestamp($startcol + 8, null);

			$this->modified_by = $rs->getString($startcol + 9);

			$this->date_modified = $rs->getTimestamp($startcol + 10, null);

			$this->hr_employee_id = $rs->getString($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeBenefit object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeBenefitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeBenefitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeBenefitPeer::DATABASE_NAME);
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
					$pk = HrEmployeeBenefitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeBenefitPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collHrBenefits !== null) {
				foreach($this->collHrBenefits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = HrEmployeeBenefitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collHrBenefits !== null) {
					foreach($this->collHrBenefits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeBenefitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDateStart();
				break;
			case 3:
				return $this->getDateEnd();
				break;
			case 4:
				return $this->getAmount();
				break;
			case 5:
				return $this->getRemarks();
				break;
			case 6:
				return $this->getIsActive();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getDateCreated();
				break;
			case 9:
				return $this->getModifiedBy();
				break;
			case 10:
				return $this->getDateModified();
				break;
			case 11:
				return $this->getHrEmployeeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeBenefitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBenefitCode(),
			$keys[2] => $this->getDateStart(),
			$keys[3] => $this->getDateEnd(),
			$keys[4] => $this->getAmount(),
			$keys[5] => $this->getRemarks(),
			$keys[6] => $this->getIsActive(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getDateCreated(),
			$keys[9] => $this->getModifiedBy(),
			$keys[10] => $this->getDateModified(),
			$keys[11] => $this->getHrEmployeeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeBenefitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDateStart($value);
				break;
			case 3:
				$this->setDateEnd($value);
				break;
			case 4:
				$this->setAmount($value);
				break;
			case 5:
				$this->setRemarks($value);
				break;
			case 6:
				$this->setIsActive($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setDateCreated($value);
				break;
			case 9:
				$this->setModifiedBy($value);
				break;
			case 10:
				$this->setDateModified($value);
				break;
			case 11:
				$this->setHrEmployeeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeBenefitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBenefitCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDateStart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateEnd($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRemarks($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsActive($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateCreated($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setModifiedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateModified($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setHrEmployeeId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeBenefitPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeBenefitPeer::ID)) $criteria->add(HrEmployeeBenefitPeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::BENEFIT_CODE)) $criteria->add(HrEmployeeBenefitPeer::BENEFIT_CODE, $this->benefit_code);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::DATE_START)) $criteria->add(HrEmployeeBenefitPeer::DATE_START, $this->date_start);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::DATE_END)) $criteria->add(HrEmployeeBenefitPeer::DATE_END, $this->date_end);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::AMOUNT)) $criteria->add(HrEmployeeBenefitPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::REMARKS)) $criteria->add(HrEmployeeBenefitPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::IS_ACTIVE)) $criteria->add(HrEmployeeBenefitPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::CREATED_BY)) $criteria->add(HrEmployeeBenefitPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::DATE_CREATED)) $criteria->add(HrEmployeeBenefitPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::MODIFIED_BY)) $criteria->add(HrEmployeeBenefitPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::DATE_MODIFIED)) $criteria->add(HrEmployeeBenefitPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID)) $criteria->add(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, $this->hr_employee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeBenefitPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeBenefitPeer::ID, $this->id);

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

		$copyObj->setDateStart($this->date_start);

		$copyObj->setDateEnd($this->date_end);

		$copyObj->setAmount($this->amount);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setHrEmployeeId($this->hr_employee_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getHrBenefits() as $relObj) {
				$copyObj->addHrBenefit($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new HrEmployeeBenefitPeer();
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

	
	public function initHrBenefits()
	{
		if ($this->collHrBenefits === null) {
			$this->collHrBenefits = array();
		}
	}

	
	public function getHrBenefits($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BaseHrBenefitPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHrBenefits === null) {
			if ($this->isNew()) {
			   $this->collHrBenefits = array();
			} else {

				$criteria->add(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, $this->getId());

				HrBenefitPeer::addSelectColumns($criteria);
				$this->collHrBenefits = HrBenefitPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, $this->getId());

				HrBenefitPeer::addSelectColumns($criteria);
				if (!isset($this->lastHrBenefitCriteria) || !$this->lastHrBenefitCriteria->equals($criteria)) {
					$this->collHrBenefits = HrBenefitPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHrBenefitCriteria = $criteria;
		return $this->collHrBenefits;
	}

	
	public function countHrBenefits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BaseHrBenefitPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, $this->getId());

		return HrBenefitPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addHrBenefit(HrBenefit $l)
	{
		$this->collHrBenefits[] = $l;
		$l->setHrEmployeeBenefit($this);
	}

} 