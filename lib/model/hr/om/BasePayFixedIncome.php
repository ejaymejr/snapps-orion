<?php


abstract class BasePayFixedIncome extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $acct_code = 'null';


	
	protected $description;


	
	protected $scheduled_amount;


	
	protected $taxable_amount;


	
	protected $tax_percentage;


	
	protected $from_date;


	
	protected $to_date;


	
	protected $frequency;


	
	protected $paid_type;


	
	protected $is_active;


	
	protected $entry_type;


	
	protected $remark;


	
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

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getScheduledAmount()
	{

		return $this->scheduled_amount;
	}

	
	public function getTaxableAmount()
	{

		return $this->taxable_amount;
	}

	
	public function getTaxPercentage()
	{

		return $this->tax_percentage;
	}

	
	public function getFromDate($format = 'Y-m-d H:i:s')
	{

		if ($this->from_date === null || $this->from_date === '') {
			return null;
		} elseif (!is_int($this->from_date)) {
						$ts = strtotime($this->from_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [from_date] as date/time value: " . var_export($this->from_date, true));
			}
		} else {
			$ts = $this->from_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getToDate($format = 'Y-m-d H:i:s')
	{

		if ($this->to_date === null || $this->to_date === '') {
			return null;
		} elseif (!is_int($this->to_date)) {
						$ts = strtotime($this->to_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [to_date] as date/time value: " . var_export($this->to_date, true));
			}
		} else {
			$ts = $this->to_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFrequency()
	{

		return $this->frequency;
	}

	
	public function getPaidType()
	{

		return $this->paid_type;
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getEntryType()
	{

		return $this->entry_type;
	}

	
	public function getRemark()
	{

		return $this->remark;
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
			$this->modifiedColumns[] = PayFixedIncomePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::NAME;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v || $v === 'null') {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::DESCRIPTION;
		}

	} 
	
	public function setScheduledAmount($v)
	{

		if ($this->scheduled_amount !== $v) {
			$this->scheduled_amount = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::SCHEDULED_AMOUNT;
		}

	} 
	
	public function setTaxableAmount($v)
	{

		if ($this->taxable_amount !== $v) {
			$this->taxable_amount = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::TAXABLE_AMOUNT;
		}

	} 
	
	public function setTaxPercentage($v)
	{

		if ($this->tax_percentage !== $v) {
			$this->tax_percentage = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::TAX_PERCENTAGE;
		}

	} 
	
	public function setFromDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [from_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->from_date !== $ts) {
			$this->from_date = $ts;
			$this->modifiedColumns[] = PayFixedIncomePeer::FROM_DATE;
		}

	} 
	
	public function setToDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [to_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->to_date !== $ts) {
			$this->to_date = $ts;
			$this->modifiedColumns[] = PayFixedIncomePeer::TO_DATE;
		}

	} 
	
	public function setFrequency($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->frequency !== $v) {
			$this->frequency = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::FREQUENCY;
		}

	} 
	
	public function setPaidType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->paid_type !== $v) {
			$this->paid_type = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::PAID_TYPE;
		}

	} 
	
	public function setIsActive($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::IS_ACTIVE;
		}

	} 
	
	public function setEntryType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->entry_type !== $v) {
			$this->entry_type = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::ENTRY_TYPE;
		}

	} 
	
	public function setRemark($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayFixedIncomePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayFixedIncomePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayFixedIncomePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->acct_code = $rs->getString($startcol + 3);

			$this->description = $rs->getString($startcol + 4);

			$this->scheduled_amount = $rs->getFloat($startcol + 5);

			$this->taxable_amount = $rs->getFloat($startcol + 6);

			$this->tax_percentage = $rs->getFloat($startcol + 7);

			$this->from_date = $rs->getTimestamp($startcol + 8, null);

			$this->to_date = $rs->getTimestamp($startcol + 9, null);

			$this->frequency = $rs->getString($startcol + 10);

			$this->paid_type = $rs->getString($startcol + 11);

			$this->is_active = $rs->getString($startcol + 12);

			$this->entry_type = $rs->getString($startcol + 13);

			$this->remark = $rs->getString($startcol + 14);

			$this->created_by = $rs->getString($startcol + 15);

			$this->date_created = $rs->getTimestamp($startcol + 16, null);

			$this->modified_by = $rs->getString($startcol + 17);

			$this->date_modified = $rs->getTimestamp($startcol + 18, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayFixedIncome object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayFixedIncomePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayFixedIncomePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayFixedIncomePeer::DATABASE_NAME);
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
					$pk = PayFixedIncomePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayFixedIncomePeer::doUpdate($this, $con);
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


			if (($retval = PayFixedIncomePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayFixedIncomePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAcctCode();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getScheduledAmount();
				break;
			case 6:
				return $this->getTaxableAmount();
				break;
			case 7:
				return $this->getTaxPercentage();
				break;
			case 8:
				return $this->getFromDate();
				break;
			case 9:
				return $this->getToDate();
				break;
			case 10:
				return $this->getFrequency();
				break;
			case 11:
				return $this->getPaidType();
				break;
			case 12:
				return $this->getIsActive();
				break;
			case 13:
				return $this->getEntryType();
				break;
			case 14:
				return $this->getRemark();
				break;
			case 15:
				return $this->getCreatedBy();
				break;
			case 16:
				return $this->getDateCreated();
				break;
			case 17:
				return $this->getModifiedBy();
				break;
			case 18:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayFixedIncomePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getAcctCode(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getScheduledAmount(),
			$keys[6] => $this->getTaxableAmount(),
			$keys[7] => $this->getTaxPercentage(),
			$keys[8] => $this->getFromDate(),
			$keys[9] => $this->getToDate(),
			$keys[10] => $this->getFrequency(),
			$keys[11] => $this->getPaidType(),
			$keys[12] => $this->getIsActive(),
			$keys[13] => $this->getEntryType(),
			$keys[14] => $this->getRemark(),
			$keys[15] => $this->getCreatedBy(),
			$keys[16] => $this->getDateCreated(),
			$keys[17] => $this->getModifiedBy(),
			$keys[18] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayFixedIncomePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAcctCode($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setScheduledAmount($value);
				break;
			case 6:
				$this->setTaxableAmount($value);
				break;
			case 7:
				$this->setTaxPercentage($value);
				break;
			case 8:
				$this->setFromDate($value);
				break;
			case 9:
				$this->setToDate($value);
				break;
			case 10:
				$this->setFrequency($value);
				break;
			case 11:
				$this->setPaidType($value);
				break;
			case 12:
				$this->setIsActive($value);
				break;
			case 13:
				$this->setEntryType($value);
				break;
			case 14:
				$this->setRemark($value);
				break;
			case 15:
				$this->setCreatedBy($value);
				break;
			case 16:
				$this->setDateCreated($value);
				break;
			case 17:
				$this->setModifiedBy($value);
				break;
			case 18:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayFixedIncomePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAcctCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setScheduledAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTaxableAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTaxPercentage($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFromDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setToDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFrequency($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPaidType($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIsActive($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEntryType($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRemark($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDateCreated($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setModifiedBy($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDateModified($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayFixedIncomePeer::DATABASE_NAME);

		if ($this->isColumnModified(PayFixedIncomePeer::ID)) $criteria->add(PayFixedIncomePeer::ID, $this->id);
		if ($this->isColumnModified(PayFixedIncomePeer::EMPLOYEE_NO)) $criteria->add(PayFixedIncomePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayFixedIncomePeer::NAME)) $criteria->add(PayFixedIncomePeer::NAME, $this->name);
		if ($this->isColumnModified(PayFixedIncomePeer::ACCT_CODE)) $criteria->add(PayFixedIncomePeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayFixedIncomePeer::DESCRIPTION)) $criteria->add(PayFixedIncomePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayFixedIncomePeer::SCHEDULED_AMOUNT)) $criteria->add(PayFixedIncomePeer::SCHEDULED_AMOUNT, $this->scheduled_amount);
		if ($this->isColumnModified(PayFixedIncomePeer::TAXABLE_AMOUNT)) $criteria->add(PayFixedIncomePeer::TAXABLE_AMOUNT, $this->taxable_amount);
		if ($this->isColumnModified(PayFixedIncomePeer::TAX_PERCENTAGE)) $criteria->add(PayFixedIncomePeer::TAX_PERCENTAGE, $this->tax_percentage);
		if ($this->isColumnModified(PayFixedIncomePeer::FROM_DATE)) $criteria->add(PayFixedIncomePeer::FROM_DATE, $this->from_date);
		if ($this->isColumnModified(PayFixedIncomePeer::TO_DATE)) $criteria->add(PayFixedIncomePeer::TO_DATE, $this->to_date);
		if ($this->isColumnModified(PayFixedIncomePeer::FREQUENCY)) $criteria->add(PayFixedIncomePeer::FREQUENCY, $this->frequency);
		if ($this->isColumnModified(PayFixedIncomePeer::PAID_TYPE)) $criteria->add(PayFixedIncomePeer::PAID_TYPE, $this->paid_type);
		if ($this->isColumnModified(PayFixedIncomePeer::IS_ACTIVE)) $criteria->add(PayFixedIncomePeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(PayFixedIncomePeer::ENTRY_TYPE)) $criteria->add(PayFixedIncomePeer::ENTRY_TYPE, $this->entry_type);
		if ($this->isColumnModified(PayFixedIncomePeer::REMARK)) $criteria->add(PayFixedIncomePeer::REMARK, $this->remark);
		if ($this->isColumnModified(PayFixedIncomePeer::CREATED_BY)) $criteria->add(PayFixedIncomePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayFixedIncomePeer::DATE_CREATED)) $criteria->add(PayFixedIncomePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayFixedIncomePeer::MODIFIED_BY)) $criteria->add(PayFixedIncomePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayFixedIncomePeer::DATE_MODIFIED)) $criteria->add(PayFixedIncomePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayFixedIncomePeer::DATABASE_NAME);

		$criteria->add(PayFixedIncomePeer::ID, $this->id);

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

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setDescription($this->description);

		$copyObj->setScheduledAmount($this->scheduled_amount);

		$copyObj->setTaxableAmount($this->taxable_amount);

		$copyObj->setTaxPercentage($this->tax_percentage);

		$copyObj->setFromDate($this->from_date);

		$copyObj->setToDate($this->to_date);

		$copyObj->setFrequency($this->frequency);

		$copyObj->setPaidType($this->paid_type);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setEntryType($this->entry_type);

		$copyObj->setRemark($this->remark);

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
			self::$peer = new PayFixedIncomePeer();
		}
		return self::$peer;
	}

} 