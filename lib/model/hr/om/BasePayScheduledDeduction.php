<?php


abstract class BasePayScheduledDeduction extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $acct_code = 'null';


	
	protected $description;


	
	protected $total_amount;


	
	protected $scheduled_amount;


	
	protected $tot_amt_paid;


	
	protected $from_date;


	
	protected $to_date;


	
	protected $frequency;


	
	protected $status;


	
	protected $paid_type;


	
	protected $post_batch;


	
	protected $deduction_prepost_batch;


	
	protected $entry_type;


	
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

	
	public function getTotAmtPaid()
	{

		return $this->tot_amt_paid;
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

	
	public function getDeductionPrepostBatch()
	{

		return $this->deduction_prepost_batch;
	}

	
	public function getEntryType()
	{

		return $this->entry_type;
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
			$this->modifiedColumns[] = PayScheduledDeductionPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::NAME;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v || $v === 'null') {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::DESCRIPTION;
		}

	} 
	
	public function setTotalAmount($v)
	{

		if ($this->total_amount !== $v) {
			$this->total_amount = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::TOTAL_AMOUNT;
		}

	} 
	
	public function setScheduledAmount($v)
	{

		if ($this->scheduled_amount !== $v) {
			$this->scheduled_amount = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::SCHEDULED_AMOUNT;
		}

	} 
	
	public function setTotAmtPaid($v)
	{

		if ($this->tot_amt_paid !== $v) {
			$this->tot_amt_paid = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::TOT_AMT_PAID;
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
			$this->modifiedColumns[] = PayScheduledDeductionPeer::FROM_DATE;
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
			$this->modifiedColumns[] = PayScheduledDeductionPeer::TO_DATE;
		}

	} 
	
	public function setFrequency($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->frequency !== $v) {
			$this->frequency = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::FREQUENCY;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::STATUS;
		}

	} 
	
	public function setPaidType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->paid_type !== $v) {
			$this->paid_type = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::PAID_TYPE;
		}

	} 
	
	public function setPostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->post_batch !== $v) {
			$this->post_batch = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::POST_BATCH;
		}

	} 
	
	public function setDeductionPrepostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deduction_prepost_batch !== $v) {
			$this->deduction_prepost_batch = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH;
		}

	} 
	
	public function setEntryType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->entry_type !== $v) {
			$this->entry_type = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::ENTRY_TYPE;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayScheduledDeductionPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayScheduledDeductionPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayScheduledDeductionPeer::DATE_MODIFIED;
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

			$this->tot_amt_paid = $rs->getFloat($startcol + 7);

			$this->from_date = $rs->getDate($startcol + 8, null);

			$this->to_date = $rs->getDate($startcol + 9, null);

			$this->frequency = $rs->getString($startcol + 10);

			$this->status = $rs->getString($startcol + 11);

			$this->paid_type = $rs->getString($startcol + 12);

			$this->post_batch = $rs->getString($startcol + 13);

			$this->deduction_prepost_batch = $rs->getString($startcol + 14);

			$this->entry_type = $rs->getString($startcol + 15);

			$this->created_by = $rs->getString($startcol + 16);

			$this->date_created = $rs->getTimestamp($startcol + 17, null);

			$this->modified_by = $rs->getString($startcol + 18);

			$this->date_modified = $rs->getTimestamp($startcol + 19, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 20; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayScheduledDeduction object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayScheduledDeductionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayScheduledDeductionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayScheduledDeductionPeer::DATABASE_NAME);
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
					$pk = PayScheduledDeductionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayScheduledDeductionPeer::doUpdate($this, $con);
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


			if (($retval = PayScheduledDeductionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayScheduledDeductionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTotAmtPaid();
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
				return $this->getStatus();
				break;
			case 12:
				return $this->getPaidType();
				break;
			case 13:
				return $this->getPostBatch();
				break;
			case 14:
				return $this->getDeductionPrepostBatch();
				break;
			case 15:
				return $this->getEntryType();
				break;
			case 16:
				return $this->getCreatedBy();
				break;
			case 17:
				return $this->getDateCreated();
				break;
			case 18:
				return $this->getModifiedBy();
				break;
			case 19:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayScheduledDeductionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getAcctCode(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getTotalAmount(),
			$keys[6] => $this->getScheduledAmount(),
			$keys[7] => $this->getTotAmtPaid(),
			$keys[8] => $this->getFromDate(),
			$keys[9] => $this->getToDate(),
			$keys[10] => $this->getFrequency(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getPaidType(),
			$keys[13] => $this->getPostBatch(),
			$keys[14] => $this->getDeductionPrepostBatch(),
			$keys[15] => $this->getEntryType(),
			$keys[16] => $this->getCreatedBy(),
			$keys[17] => $this->getDateCreated(),
			$keys[18] => $this->getModifiedBy(),
			$keys[19] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayScheduledDeductionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTotAmtPaid($value);
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
				$this->setStatus($value);
				break;
			case 12:
				$this->setPaidType($value);
				break;
			case 13:
				$this->setPostBatch($value);
				break;
			case 14:
				$this->setDeductionPrepostBatch($value);
				break;
			case 15:
				$this->setEntryType($value);
				break;
			case 16:
				$this->setCreatedBy($value);
				break;
			case 17:
				$this->setDateCreated($value);
				break;
			case 18:
				$this->setModifiedBy($value);
				break;
			case 19:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayScheduledDeductionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAcctCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotalAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setScheduledAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotAmtPaid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFromDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setToDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFrequency($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPaidType($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPostBatch($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeductionPrepostBatch($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEntryType($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDateCreated($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setModifiedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDateModified($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayScheduledDeductionPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayScheduledDeductionPeer::ID)) $criteria->add(PayScheduledDeductionPeer::ID, $this->id);
		if ($this->isColumnModified(PayScheduledDeductionPeer::EMPLOYEE_NO)) $criteria->add(PayScheduledDeductionPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayScheduledDeductionPeer::NAME)) $criteria->add(PayScheduledDeductionPeer::NAME, $this->name);
		if ($this->isColumnModified(PayScheduledDeductionPeer::ACCT_CODE)) $criteria->add(PayScheduledDeductionPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayScheduledDeductionPeer::DESCRIPTION)) $criteria->add(PayScheduledDeductionPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayScheduledDeductionPeer::TOTAL_AMOUNT)) $criteria->add(PayScheduledDeductionPeer::TOTAL_AMOUNT, $this->total_amount);
		if ($this->isColumnModified(PayScheduledDeductionPeer::SCHEDULED_AMOUNT)) $criteria->add(PayScheduledDeductionPeer::SCHEDULED_AMOUNT, $this->scheduled_amount);
		if ($this->isColumnModified(PayScheduledDeductionPeer::TOT_AMT_PAID)) $criteria->add(PayScheduledDeductionPeer::TOT_AMT_PAID, $this->tot_amt_paid);
		if ($this->isColumnModified(PayScheduledDeductionPeer::FROM_DATE)) $criteria->add(PayScheduledDeductionPeer::FROM_DATE, $this->from_date);
		if ($this->isColumnModified(PayScheduledDeductionPeer::TO_DATE)) $criteria->add(PayScheduledDeductionPeer::TO_DATE, $this->to_date);
		if ($this->isColumnModified(PayScheduledDeductionPeer::FREQUENCY)) $criteria->add(PayScheduledDeductionPeer::FREQUENCY, $this->frequency);
		if ($this->isColumnModified(PayScheduledDeductionPeer::STATUS)) $criteria->add(PayScheduledDeductionPeer::STATUS, $this->status);
		if ($this->isColumnModified(PayScheduledDeductionPeer::PAID_TYPE)) $criteria->add(PayScheduledDeductionPeer::PAID_TYPE, $this->paid_type);
		if ($this->isColumnModified(PayScheduledDeductionPeer::POST_BATCH)) $criteria->add(PayScheduledDeductionPeer::POST_BATCH, $this->post_batch);
		if ($this->isColumnModified(PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH)) $criteria->add(PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH, $this->deduction_prepost_batch);
		if ($this->isColumnModified(PayScheduledDeductionPeer::ENTRY_TYPE)) $criteria->add(PayScheduledDeductionPeer::ENTRY_TYPE, $this->entry_type);
		if ($this->isColumnModified(PayScheduledDeductionPeer::CREATED_BY)) $criteria->add(PayScheduledDeductionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayScheduledDeductionPeer::DATE_CREATED)) $criteria->add(PayScheduledDeductionPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayScheduledDeductionPeer::MODIFIED_BY)) $criteria->add(PayScheduledDeductionPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayScheduledDeductionPeer::DATE_MODIFIED)) $criteria->add(PayScheduledDeductionPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayScheduledDeductionPeer::DATABASE_NAME);

		$criteria->add(PayScheduledDeductionPeer::ID, $this->id);

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

		$copyObj->setTotAmtPaid($this->tot_amt_paid);

		$copyObj->setFromDate($this->from_date);

		$copyObj->setToDate($this->to_date);

		$copyObj->setFrequency($this->frequency);

		$copyObj->setStatus($this->status);

		$copyObj->setPaidType($this->paid_type);

		$copyObj->setPostBatch($this->post_batch);

		$copyObj->setDeductionPrepostBatch($this->deduction_prepost_batch);

		$copyObj->setEntryType($this->entry_type);

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
			self::$peer = new PayScheduledDeductionPeer();
		}
		return self::$peer;
	}

} 