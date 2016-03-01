<?php


abstract class BasePayManualPayroll extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $acct_code;


	
	protected $description;


	
	protected $amount = 0;


	
	protected $income_expense;


	
	protected $acct_source;


	
	protected $processed_as;


	
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

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getIncomeExpense()
	{

		return $this->income_expense;
	}

	
	public function getAcctSource()
	{

		return $this->acct_source;
	}

	
	public function getProcessedAs()
	{

		return $this->processed_as;
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
			$this->modifiedColumns[] = PayManualPayrollPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::NAME;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v) {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::DESCRIPTION;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::AMOUNT;
		}

	} 
	
	public function setIncomeExpense($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_expense !== $v) {
			$this->income_expense = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::INCOME_EXPENSE;
		}

	} 
	
	public function setAcctSource($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_source !== $v) {
			$this->acct_source = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::ACCT_SOURCE;
		}

	} 
	
	public function setProcessedAs($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->processed_as !== $v) {
			$this->processed_as = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::PROCESSED_AS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayManualPayrollPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayManualPayrollPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayManualPayrollPeer::DATE_MODIFIED;
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

			$this->amount = $rs->getFloat($startcol + 5);

			$this->income_expense = $rs->getInt($startcol + 6);

			$this->acct_source = $rs->getString($startcol + 7);

			$this->processed_as = $rs->getString($startcol + 8);

			$this->created_by = $rs->getString($startcol + 9);

			$this->date_created = $rs->getTimestamp($startcol + 10, null);

			$this->modified_by = $rs->getString($startcol + 11);

			$this->date_modified = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayManualPayroll object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayManualPayrollPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayManualPayrollPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayManualPayrollPeer::DATABASE_NAME);
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
					$pk = PayManualPayrollPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayManualPayrollPeer::doUpdate($this, $con);
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


			if (($retval = PayManualPayrollPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayManualPayrollPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAmount();
				break;
			case 6:
				return $this->getIncomeExpense();
				break;
			case 7:
				return $this->getAcctSource();
				break;
			case 8:
				return $this->getProcessedAs();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getDateCreated();
				break;
			case 11:
				return $this->getModifiedBy();
				break;
			case 12:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayManualPayrollPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getAcctCode(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getAmount(),
			$keys[6] => $this->getIncomeExpense(),
			$keys[7] => $this->getAcctSource(),
			$keys[8] => $this->getProcessedAs(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getDateCreated(),
			$keys[11] => $this->getModifiedBy(),
			$keys[12] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayManualPayrollPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAmount($value);
				break;
			case 6:
				$this->setIncomeExpense($value);
				break;
			case 7:
				$this->setAcctSource($value);
				break;
			case 8:
				$this->setProcessedAs($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setDateCreated($value);
				break;
			case 11:
				$this->setModifiedBy($value);
				break;
			case 12:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayManualPayrollPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAcctCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIncomeExpense($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAcctSource($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProcessedAs($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateCreated($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setModifiedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateModified($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayManualPayrollPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayManualPayrollPeer::ID)) $criteria->add(PayManualPayrollPeer::ID, $this->id);
		if ($this->isColumnModified(PayManualPayrollPeer::EMPLOYEE_NO)) $criteria->add(PayManualPayrollPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayManualPayrollPeer::NAME)) $criteria->add(PayManualPayrollPeer::NAME, $this->name);
		if ($this->isColumnModified(PayManualPayrollPeer::ACCT_CODE)) $criteria->add(PayManualPayrollPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayManualPayrollPeer::DESCRIPTION)) $criteria->add(PayManualPayrollPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayManualPayrollPeer::AMOUNT)) $criteria->add(PayManualPayrollPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PayManualPayrollPeer::INCOME_EXPENSE)) $criteria->add(PayManualPayrollPeer::INCOME_EXPENSE, $this->income_expense);
		if ($this->isColumnModified(PayManualPayrollPeer::ACCT_SOURCE)) $criteria->add(PayManualPayrollPeer::ACCT_SOURCE, $this->acct_source);
		if ($this->isColumnModified(PayManualPayrollPeer::PROCESSED_AS)) $criteria->add(PayManualPayrollPeer::PROCESSED_AS, $this->processed_as);
		if ($this->isColumnModified(PayManualPayrollPeer::CREATED_BY)) $criteria->add(PayManualPayrollPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayManualPayrollPeer::DATE_CREATED)) $criteria->add(PayManualPayrollPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayManualPayrollPeer::MODIFIED_BY)) $criteria->add(PayManualPayrollPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayManualPayrollPeer::DATE_MODIFIED)) $criteria->add(PayManualPayrollPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayManualPayrollPeer::DATABASE_NAME);

		$criteria->add(PayManualPayrollPeer::ID, $this->id);

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

		$copyObj->setAmount($this->amount);

		$copyObj->setIncomeExpense($this->income_expense);

		$copyObj->setAcctSource($this->acct_source);

		$copyObj->setProcessedAs($this->processed_as);

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
			self::$peer = new PayManualPayrollPeer();
		}
		return self::$peer;
	}

} 