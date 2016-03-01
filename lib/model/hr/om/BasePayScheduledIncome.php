<?php


abstract class BasePayScheduledIncome extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $acct_code = 'null';


	
	protected $description;


	
	protected $total_amount;


	
	protected $scheduled_amount;


	
	protected $tot_amt_received;


	
	protected $taxable_amount;


	
	protected $tax_percentage;


	
	protected $from_date;


	
	protected $to_date;


	
	protected $frequency;


	
	protected $status;


	
	protected $paid_type;


	
	protected $post_batch;


	
	protected $entry_type;


	
	protected $income_prepost_batch;


	
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

	
	public function getTotalAmount()
	{

		return $this->total_amount;
	}

	
	public function getScheduledAmount()
	{

		return $this->scheduled_amount;
	}

	
	public function getTotAmtReceived()
	{

		return $this->tot_amt_received;
	}

	
	public function getTaxableAmount()
	{

		return $this->taxable_amount;
	}

	
	public function getTaxPercentage()
	{

		return $this->tax_percentage;
	}

	
	public function getFromDate($format = 'Y-m-d')
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

	
	public function getToDate($format = 'Y-m-d')
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

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getPaidType()
	{

		return $this->paid_type;
	}

	
	public function getPostBatch()
	{

		return $this->post_batch;
	}

	
	public function getEntryType()
	{

		return $this->entry_type;
	}

	
	public function getIncomePrepostBatch()
	{

		return $this->income_prepost_batch;
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
			$this->modifiedColumns[] = PayScheduledIncomePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::NAME;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v || $v === 'null') {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::DESCRIPTION;
		}

	} 
	
	public function setTotalAmount($v)
	{

		if ($this->total_amount !== $v) {
			$this->total_amount = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::TOTAL_AMOUNT;
		}

	} 
	
	public function setScheduledAmount($v)
	{

		if ($this->scheduled_amount !== $v) {
			$this->scheduled_amount = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::SCHEDULED_AMOUNT;
		}

	} 
	
	public function setTotAmtReceived($v)
	{

		if ($this->tot_amt_received !== $v) {
			$this->tot_amt_received = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::TOT_AMT_RECEIVED;
		}

	} 
	
	public function setTaxableAmount($v)
	{

		if ($this->taxable_amount !== $v) {
			$this->taxable_amount = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::TAXABLE_AMOUNT;
		}

	} 
	
	public function setTaxPercentage($v)
	{

		if ($this->tax_percentage !== $v) {
			$this->tax_percentage = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::TAX_PERCENTAGE;
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
			$this->modifiedColumns[] = PayScheduledIncomePeer::FROM_DATE;
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
			$this->modifiedColumns[] = PayScheduledIncomePeer::TO_DATE;
		}

	} 
	
	public function setFrequency($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->frequency !== $v) {
			$this->frequency = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::FREQUENCY;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::STATUS;
		}

	} 
	
	public function setPaidType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->paid_type !== $v) {
			$this->paid_type = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::PAID_TYPE;
		}

	} 
	
	public function setPostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->post_batch !== $v) {
			$this->post_batch = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::POST_BATCH;
		}

	} 
	
	public function setEntryType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->entry_type !== $v) {
			$this->entry_type = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::ENTRY_TYPE;
		}

	} 
	
	public function setIncomePrepostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_prepost_batch !== $v) {
			$this->income_prepost_batch = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::INCOME_PREPOST_BATCH;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayScheduledIncomePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayScheduledIncomePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayScheduledIncomePeer::DATE_MODIFIED;
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

			$this->total_amount = $rs->getFloat($startcol + 5);

			$this->scheduled_amount = $rs->getFloat($startcol + 6);

			$this->tot_amt_received = $rs->getFloat($startcol + 7);

			$this->taxable_amount = $rs->getFloat($startcol + 8);

			$this->tax_percentage = $rs->getFloat($startcol + 9);

			$this->from_date = $rs->getDate($startcol + 10, null);

			$this->to_date = $rs->getDate($startcol + 11, null);

			$this->frequency = $rs->getString($startcol + 12);

			$this->status = $rs->getString($startcol + 13);

			$this->paid_type = $rs->getString($startcol + 14);

			$this->post_batch = $rs->getString($startcol + 15);

			$this->entry_type = $rs->getString($startcol + 16);

			$this->income_prepost_batch = $rs->getString($startcol + 17);

			$this->created_by = $rs->getString($startcol + 18);

			$this->date_created = $rs->getTimestamp($startcol + 19, null);

			$this->modified_by = $rs->getString($startcol + 20);

			$this->date_modified = $rs->getTimestamp($startcol + 21, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayScheduledIncome object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayScheduledIncomePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayScheduledIncomePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayScheduledIncomePeer::DATABASE_NAME);
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
					$pk = PayScheduledIncomePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayScheduledIncomePeer::doUpdate($this, $con);
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


			if (($retval = PayScheduledIncomePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayScheduledIncomePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTotalAmount();
				break;
			case 6:
				return $this->getScheduledAmount();
				break;
			case 7:
				return $this->getTotAmtReceived();
				break;
			case 8:
				return $this->getTaxableAmount();
				break;
			case 9:
				return $this->getTaxPercentage();
				break;
			case 10:
				return $this->getFromDate();
				break;
			case 11:
				return $this->getToDate();
				break;
			case 12:
				return $this->getFrequency();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getPaidType();
				break;
			case 15:
				return $this->getPostBatch();
				break;
			case 16:
				return $this->getEntryType();
				break;
			case 17:
				return $this->getIncomePrepostBatch();
				break;
			case 18:
				return $this->getCreatedBy();
				break;
			case 19:
				return $this->getDateCreated();
				break;
			case 20:
				return $this->getModifiedBy();
				break;
			case 21:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayScheduledIncomePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getAcctCode(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getTotalAmount(),
			$keys[6] => $this->getScheduledAmount(),
			$keys[7] => $this->getTotAmtReceived(),
			$keys[8] => $this->getTaxableAmount(),
			$keys[9] => $this->getTaxPercentage(),
			$keys[10] => $this->getFromDate(),
			$keys[11] => $this->getToDate(),
			$keys[12] => $this->getFrequency(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getPaidType(),
			$keys[15] => $this->getPostBatch(),
			$keys[16] => $this->getEntryType(),
			$keys[17] => $this->getIncomePrepostBatch(),
			$keys[18] => $this->getCreatedBy(),
			$keys[19] => $this->getDateCreated(),
			$keys[20] => $this->getModifiedBy(),
			$keys[21] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayScheduledIncomePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTotalAmount($value);
				break;
			case 6:
				$this->setScheduledAmount($value);
				break;
			case 7:
				$this->setTotAmtReceived($value);
				break;
			case 8:
				$this->setTaxableAmount($value);
				break;
			case 9:
				$this->setTaxPercentage($value);
				break;
			case 10:
				$this->setFromDate($value);
				break;
			case 11:
				$this->setToDate($value);
				break;
			case 12:
				$this->setFrequency($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setPaidType($value);
				break;
			case 15:
				$this->setPostBatch($value);
				break;
			case 16:
				$this->setEntryType($value);
				break;
			case 17:
				$this->setIncomePrepostBatch($value);
				break;
			case 18:
				$this->setCreatedBy($value);
				break;
			case 19:
				$this->setDateCreated($value);
				break;
			case 20:
				$this->setModifiedBy($value);
				break;
			case 21:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayScheduledIncomePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAcctCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotalAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setScheduledAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotAmtReceived($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTaxableAmount($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTaxPercentage($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFromDate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setToDate($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFrequency($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPaidType($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPostBatch($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEntryType($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setIncomePrepostBatch($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDateCreated($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setModifiedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDateModified($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayScheduledIncomePeer::DATABASE_NAME);

		if ($this->isColumnModified(PayScheduledIncomePeer::ID)) $criteria->add(PayScheduledIncomePeer::ID, $this->id);
		if ($this->isColumnModified(PayScheduledIncomePeer::EMPLOYEE_NO)) $criteria->add(PayScheduledIncomePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayScheduledIncomePeer::NAME)) $criteria->add(PayScheduledIncomePeer::NAME, $this->name);
		if ($this->isColumnModified(PayScheduledIncomePeer::ACCT_CODE)) $criteria->add(PayScheduledIncomePeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayScheduledIncomePeer::DESCRIPTION)) $criteria->add(PayScheduledIncomePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayScheduledIncomePeer::TOTAL_AMOUNT)) $criteria->add(PayScheduledIncomePeer::TOTAL_AMOUNT, $this->total_amount);
		if ($this->isColumnModified(PayScheduledIncomePeer::SCHEDULED_AMOUNT)) $criteria->add(PayScheduledIncomePeer::SCHEDULED_AMOUNT, $this->scheduled_amount);
		if ($this->isColumnModified(PayScheduledIncomePeer::TOT_AMT_RECEIVED)) $criteria->add(PayScheduledIncomePeer::TOT_AMT_RECEIVED, $this->tot_amt_received);
		if ($this->isColumnModified(PayScheduledIncomePeer::TAXABLE_AMOUNT)) $criteria->add(PayScheduledIncomePeer::TAXABLE_AMOUNT, $this->taxable_amount);
		if ($this->isColumnModified(PayScheduledIncomePeer::TAX_PERCENTAGE)) $criteria->add(PayScheduledIncomePeer::TAX_PERCENTAGE, $this->tax_percentage);
		if ($this->isColumnModified(PayScheduledIncomePeer::FROM_DATE)) $criteria->add(PayScheduledIncomePeer::FROM_DATE, $this->from_date);
		if ($this->isColumnModified(PayScheduledIncomePeer::TO_DATE)) $criteria->add(PayScheduledIncomePeer::TO_DATE, $this->to_date);
		if ($this->isColumnModified(PayScheduledIncomePeer::FREQUENCY)) $criteria->add(PayScheduledIncomePeer::FREQUENCY, $this->frequency);
		if ($this->isColumnModified(PayScheduledIncomePeer::STATUS)) $criteria->add(PayScheduledIncomePeer::STATUS, $this->status);
		if ($this->isColumnModified(PayScheduledIncomePeer::PAID_TYPE)) $criteria->add(PayScheduledIncomePeer::PAID_TYPE, $this->paid_type);
		if ($this->isColumnModified(PayScheduledIncomePeer::POST_BATCH)) $criteria->add(PayScheduledIncomePeer::POST_BATCH, $this->post_batch);
		if ($this->isColumnModified(PayScheduledIncomePeer::ENTRY_TYPE)) $criteria->add(PayScheduledIncomePeer::ENTRY_TYPE, $this->entry_type);
		if ($this->isColumnModified(PayScheduledIncomePeer::INCOME_PREPOST_BATCH)) $criteria->add(PayScheduledIncomePeer::INCOME_PREPOST_BATCH, $this->income_prepost_batch);
		if ($this->isColumnModified(PayScheduledIncomePeer::CREATED_BY)) $criteria->add(PayScheduledIncomePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayScheduledIncomePeer::DATE_CREATED)) $criteria->add(PayScheduledIncomePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayScheduledIncomePeer::MODIFIED_BY)) $criteria->add(PayScheduledIncomePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayScheduledIncomePeer::DATE_MODIFIED)) $criteria->add(PayScheduledIncomePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayScheduledIncomePeer::DATABASE_NAME);

		$criteria->add(PayScheduledIncomePeer::ID, $this->id);

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

		$copyObj->setTotalAmount($this->total_amount);

		$copyObj->setScheduledAmount($this->scheduled_amount);

		$copyObj->setTotAmtReceived($this->tot_amt_received);

		$copyObj->setTaxableAmount($this->taxable_amount);

		$copyObj->setTaxPercentage($this->tax_percentage);

		$copyObj->setFromDate($this->from_date);

		$copyObj->setToDate($this->to_date);

		$copyObj->setFrequency($this->frequency);

		$copyObj->setStatus($this->status);

		$copyObj->setPaidType($this->paid_type);

		$copyObj->setPostBatch($this->post_batch);

		$copyObj->setEntryType($this->entry_type);

		$copyObj->setIncomePrepostBatch($this->income_prepost_batch);

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
			self::$peer = new PayScheduledIncomePeer();
		}
		return self::$peer;
	}

} 