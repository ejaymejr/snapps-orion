<?php


abstract class BasePubWaterUsage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $trans_date;


	
	protected $consumption;


	
	protected $rate;


	
	protected $amount;


	
	protected $total_amount_paid;


	
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

	
	public function getTransDate($format = 'Y-m-d')
	{

		if ($this->trans_date === null || $this->trans_date === '') {
			return null;
		} elseif (!is_int($this->trans_date)) {
						$ts = strtotime($this->trans_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [trans_date] as date/time value: " . var_export($this->trans_date, true));
			}
		} else {
			$ts = $this->trans_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getConsumption()
	{

		return $this->consumption;
	}

	
	public function getRate()
	{

		return $this->rate;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getTotalAmountPaid()
	{

		return $this->total_amount_paid;
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
			$this->modifiedColumns[] = PubWaterUsagePeer::ID;
		}

	} 
	
	public function setTransDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [trans_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->trans_date !== $ts) {
			$this->trans_date = $ts;
			$this->modifiedColumns[] = PubWaterUsagePeer::TRANS_DATE;
		}

	} 
	
	public function setConsumption($v)
	{

		if ($this->consumption !== $v) {
			$this->consumption = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::CONSUMPTION;
		}

	} 
	
	public function setRate($v)
	{

		if ($this->rate !== $v) {
			$this->rate = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::RATE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::AMOUNT;
		}

	} 
	
	public function setTotalAmountPaid($v)
	{

		if ($this->total_amount_paid !== $v) {
			$this->total_amount_paid = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::TOTAL_AMOUNT_PAID;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::CREATED_BY;
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
			$this->modifiedColumns[] = PubWaterUsagePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PubWaterUsagePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PubWaterUsagePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->trans_date = $rs->getDate($startcol + 1, null);

			$this->consumption = $rs->getFloat($startcol + 2);

			$this->rate = $rs->getFloat($startcol + 3);

			$this->amount = $rs->getFloat($startcol + 4);

			$this->total_amount_paid = $rs->getFloat($startcol + 5);

			$this->created_by = $rs->getString($startcol + 6);

			$this->date_created = $rs->getTimestamp($startcol + 7, null);

			$this->modified_by = $rs->getString($startcol + 8);

			$this->date_modified = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PubWaterUsage object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PubWaterUsagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PubWaterUsagePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PubWaterUsagePeer::DATABASE_NAME);
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
					$pk = PubWaterUsagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PubWaterUsagePeer::doUpdate($this, $con);
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


			if (($retval = PubWaterUsagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PubWaterUsagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTransDate();
				break;
			case 2:
				return $this->getConsumption();
				break;
			case 3:
				return $this->getRate();
				break;
			case 4:
				return $this->getAmount();
				break;
			case 5:
				return $this->getTotalAmountPaid();
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
		$keys = PubWaterUsagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTransDate(),
			$keys[2] => $this->getConsumption(),
			$keys[3] => $this->getRate(),
			$keys[4] => $this->getAmount(),
			$keys[5] => $this->getTotalAmountPaid(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getDateCreated(),
			$keys[8] => $this->getModifiedBy(),
			$keys[9] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PubWaterUsagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTransDate($value);
				break;
			case 2:
				$this->setConsumption($value);
				break;
			case 3:
				$this->setRate($value);
				break;
			case 4:
				$this->setAmount($value);
				break;
			case 5:
				$this->setTotalAmountPaid($value);
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
		$keys = PubWaterUsagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTransDate($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConsumption($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotalAmountPaid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateCreated($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setModifiedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDateModified($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PubWaterUsagePeer::DATABASE_NAME);

		if ($this->isColumnModified(PubWaterUsagePeer::ID)) $criteria->add(PubWaterUsagePeer::ID, $this->id);
		if ($this->isColumnModified(PubWaterUsagePeer::TRANS_DATE)) $criteria->add(PubWaterUsagePeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(PubWaterUsagePeer::CONSUMPTION)) $criteria->add(PubWaterUsagePeer::CONSUMPTION, $this->consumption);
		if ($this->isColumnModified(PubWaterUsagePeer::RATE)) $criteria->add(PubWaterUsagePeer::RATE, $this->rate);
		if ($this->isColumnModified(PubWaterUsagePeer::AMOUNT)) $criteria->add(PubWaterUsagePeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PubWaterUsagePeer::TOTAL_AMOUNT_PAID)) $criteria->add(PubWaterUsagePeer::TOTAL_AMOUNT_PAID, $this->total_amount_paid);
		if ($this->isColumnModified(PubWaterUsagePeer::CREATED_BY)) $criteria->add(PubWaterUsagePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PubWaterUsagePeer::DATE_CREATED)) $criteria->add(PubWaterUsagePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PubWaterUsagePeer::MODIFIED_BY)) $criteria->add(PubWaterUsagePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PubWaterUsagePeer::DATE_MODIFIED)) $criteria->add(PubWaterUsagePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PubWaterUsagePeer::DATABASE_NAME);

		$criteria->add(PubWaterUsagePeer::ID, $this->id);

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

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setConsumption($this->consumption);

		$copyObj->setRate($this->rate);

		$copyObj->setAmount($this->amount);

		$copyObj->setTotalAmountPaid($this->total_amount_paid);

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
			self::$peer = new PubWaterUsagePeer();
		}
		return self::$peer;
	}

} 