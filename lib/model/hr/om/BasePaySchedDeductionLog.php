<?php


abstract class BasePaySchedDeductionLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pay_scheduled_deduction_id;


	
	protected $employee_no;


	
	protected $period_code;


	
	protected $acct_code;


	
	protected $description;


	
	protected $amount = 0;


	
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

	
	public function getPayScheduledDeductionId()
	{

		return $this->pay_scheduled_deduction_id;
	}

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getAmount()
	{

		return $this->amount;
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
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::ID;
		}

	} 
	
	public function setPayScheduledDeductionId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pay_scheduled_deduction_id !== $v) {
			$this->pay_scheduled_deduction_id = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::PERIOD_CODE;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v) {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::DESCRIPTION;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::AMOUNT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PaySchedDeductionLogPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->pay_scheduled_deduction_id = $rs->getString($startcol + 1);

			$this->employee_no = $rs->getString($startcol + 2);

			$this->period_code = $rs->getString($startcol + 3);

			$this->acct_code = $rs->getString($startcol + 4);

			$this->description = $rs->getString($startcol + 5);

			$this->amount = $rs->getFloat($startcol + 6);

			$this->created_by = $rs->getString($startcol + 7);

			$this->date_created = $rs->getTimestamp($startcol + 8, null);

			$this->modified_by = $rs->getString($startcol + 9);

			$this->date_modified = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PaySchedDeductionLog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaySchedDeductionLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PaySchedDeductionLogPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PaySchedDeductionLogPeer::DATABASE_NAME);
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
					$pk = PaySchedDeductionLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PaySchedDeductionLogPeer::doUpdate($this, $con);
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


			if (($retval = PaySchedDeductionLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaySchedDeductionLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPayScheduledDeductionId();
				break;
			case 2:
				return $this->getEmployeeNo();
				break;
			case 3:
				return $this->getPeriodCode();
				break;
			case 4:
				return $this->getAcctCode();
				break;
			case 5:
				return $this->getDescription();
				break;
			case 6:
				return $this->getAmount();
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaySchedDeductionLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPayScheduledDeductionId(),
			$keys[2] => $this->getEmployeeNo(),
			$keys[3] => $this->getPeriodCode(),
			$keys[4] => $this->getAcctCode(),
			$keys[5] => $this->getDescription(),
			$keys[6] => $this->getAmount(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getDateCreated(),
			$keys[9] => $this->getModifiedBy(),
			$keys[10] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaySchedDeductionLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPayScheduledDeductionId($value);
				break;
			case 2:
				$this->setEmployeeNo($value);
				break;
			case 3:
				$this->setPeriodCode($value);
				break;
			case 4:
				$this->setAcctCode($value);
				break;
			case 5:
				$this->setDescription($value);
				break;
			case 6:
				$this->setAmount($value);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaySchedDeductionLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPayScheduledDeductionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmployeeNo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPeriodCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcctCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescription($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateCreated($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setModifiedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateModified($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PaySchedDeductionLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaySchedDeductionLogPeer::ID)) $criteria->add(PaySchedDeductionLogPeer::ID, $this->id);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID)) $criteria->add(PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID, $this->pay_scheduled_deduction_id);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::EMPLOYEE_NO)) $criteria->add(PaySchedDeductionLogPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::PERIOD_CODE)) $criteria->add(PaySchedDeductionLogPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::ACCT_CODE)) $criteria->add(PaySchedDeductionLogPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::DESCRIPTION)) $criteria->add(PaySchedDeductionLogPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::AMOUNT)) $criteria->add(PaySchedDeductionLogPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::CREATED_BY)) $criteria->add(PaySchedDeductionLogPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::DATE_CREATED)) $criteria->add(PaySchedDeductionLogPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::MODIFIED_BY)) $criteria->add(PaySchedDeductionLogPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PaySchedDeductionLogPeer::DATE_MODIFIED)) $criteria->add(PaySchedDeductionLogPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaySchedDeductionLogPeer::DATABASE_NAME);

		$criteria->add(PaySchedDeductionLogPeer::ID, $this->id);

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

		$copyObj->setPayScheduledDeductionId($this->pay_scheduled_deduction_id);

		$copyObj->setEmployeeNo($this->employee_no);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setDescription($this->description);

		$copyObj->setAmount($this->amount);

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
			self::$peer = new PaySchedDeductionLogPeer();
		}
		return self::$peer;
	}

} 