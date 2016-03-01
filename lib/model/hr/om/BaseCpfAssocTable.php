<?php


abstract class BaseCpfAssocTable extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $min = 0;


	
	protected $max = 0;


	
	protected $amount = 0;


	
	protected $acct_code;


	
	protected $race;


	
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

	
	public function getMin()
	{

		return $this->min;
	}

	
	public function getMax()
	{

		return $this->max;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getRace()
	{

		return $this->race;
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
			$this->modifiedColumns[] = CpfAssocTablePeer::ID;
		}

	} 
	
	public function setMin($v)
	{

		if ($this->min !== $v || $v === 0) {
			$this->min = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::MIN;
		}

	} 
	
	public function setMax($v)
	{

		if ($this->max !== $v || $v === 0) {
			$this->max = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::MAX;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::AMOUNT;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v) {
			$this->acct_code = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::ACCT_CODE;
		}

	} 
	
	public function setRace($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->race !== $v) {
			$this->race = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::RACE;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::CREATED_BY;
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
			$this->modifiedColumns[] = CpfAssocTablePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = CpfAssocTablePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = CpfAssocTablePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->min = $rs->getFloat($startcol + 1);

			$this->max = $rs->getFloat($startcol + 2);

			$this->amount = $rs->getFloat($startcol + 3);

			$this->acct_code = $rs->getString($startcol + 4);

			$this->race = $rs->getString($startcol + 5);

			$this->created_by = $rs->getString($startcol + 6);

			$this->date_created = $rs->getTimestamp($startcol + 7, null);

			$this->modified_by = $rs->getString($startcol + 8);

			$this->date_modified = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CpfAssocTable object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpfAssocTablePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpfAssocTablePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpfAssocTablePeer::DATABASE_NAME);
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
					$pk = CpfAssocTablePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpfAssocTablePeer::doUpdate($this, $con);
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


			if (($retval = CpfAssocTablePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpfAssocTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMin();
				break;
			case 2:
				return $this->getMax();
				break;
			case 3:
				return $this->getAmount();
				break;
			case 4:
				return $this->getAcctCode();
				break;
			case 5:
				return $this->getRace();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getDateCreated();
				break;
			case 8:
				return $this->getModifiedBy();
				break;
			case 9:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpfAssocTablePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMin(),
			$keys[2] => $this->getMax(),
			$keys[3] => $this->getAmount(),
			$keys[4] => $this->getAcctCode(),
			$keys[5] => $this->getRace(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getDateCreated(),
			$keys[8] => $this->getModifiedBy(),
			$keys[9] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpfAssocTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMin($value);
				break;
			case 2:
				$this->setMax($value);
				break;
			case 3:
				$this->setAmount($value);
				break;
			case 4:
				$this->setAcctCode($value);
				break;
			case 5:
				$this->setRace($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setDateCreated($value);
				break;
			case 8:
				$this->setModifiedBy($value);
				break;
			case 9:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpfAssocTablePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMax($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcctCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRace($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateCreated($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setModifiedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDateModified($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpfAssocTablePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpfAssocTablePeer::ID)) $criteria->add(CpfAssocTablePeer::ID, $this->id);
		if ($this->isColumnModified(CpfAssocTablePeer::MIN)) $criteria->add(CpfAssocTablePeer::MIN, $this->min);
		if ($this->isColumnModified(CpfAssocTablePeer::MAX)) $criteria->add(CpfAssocTablePeer::MAX, $this->max);
		if ($this->isColumnModified(CpfAssocTablePeer::AMOUNT)) $criteria->add(CpfAssocTablePeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(CpfAssocTablePeer::ACCT_CODE)) $criteria->add(CpfAssocTablePeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(CpfAssocTablePeer::RACE)) $criteria->add(CpfAssocTablePeer::RACE, $this->race);
		if ($this->isColumnModified(CpfAssocTablePeer::CREATED_BY)) $criteria->add(CpfAssocTablePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(CpfAssocTablePeer::DATE_CREATED)) $criteria->add(CpfAssocTablePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(CpfAssocTablePeer::MODIFIED_BY)) $criteria->add(CpfAssocTablePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(CpfAssocTablePeer::DATE_MODIFIED)) $criteria->add(CpfAssocTablePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpfAssocTablePeer::DATABASE_NAME);

		$criteria->add(CpfAssocTablePeer::ID, $this->id);

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

		$copyObj->setMin($this->min);

		$copyObj->setMax($this->max);

		$copyObj->setAmount($this->amount);

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setRace($this->race);

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
			self::$peer = new CpfAssocTablePeer();
		}
		return self::$peer;
	}

} 