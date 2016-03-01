<?php


abstract class BasePayEmployeeLevy extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $company;


	
	protected $team;


	
	protected $period_code;


	
	protected $from;


	
	protected $to;


	
	protected $levy_rate;


	
	protected $levy_ded;


	
	protected $amount;


	
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

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getTeam()
	{

		return $this->team;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getFrom($format = 'Y-m-d')
	{

		if ($this->from === null || $this->from === '') {
			return null;
		} elseif (!is_int($this->from)) {
						$ts = strtotime($this->from);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [from] as date/time value: " . var_export($this->from, true));
			}
		} else {
			$ts = $this->from;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTo($format = 'Y-m-d')
	{

		if ($this->to === null || $this->to === '') {
			return null;
		} elseif (!is_int($this->to)) {
						$ts = strtotime($this->to);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [to] as date/time value: " . var_export($this->to, true));
			}
		} else {
			$ts = $this->to;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getLevyRate()
	{

		return $this->levy_rate;
	}

	
	public function getLevyDed()
	{

		return $this->levy_ded;
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
			$this->modifiedColumns[] = PayEmployeeLevyPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::NAME;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::COMPANY;
		}

	} 
	
	public function setTeam($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->team !== $v) {
			$this->team = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::TEAM;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::PERIOD_CODE;
		}

	} 
	
	public function setFrom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [from] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->from !== $ts) {
			$this->from = $ts;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::FROM;
		}

	} 
	
	public function setTo($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [to] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->to !== $ts) {
			$this->to = $ts;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::TO;
		}

	} 
	
	public function setLevyRate($v)
	{

		if ($this->levy_rate !== $v) {
			$this->levy_rate = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::LEVY_RATE;
		}

	} 
	
	public function setLevyDed($v)
	{

		if ($this->levy_ded !== $v) {
			$this->levy_ded = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::LEVY_DED;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::AMOUNT;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayEmployeeLevyPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayEmployeeLevyPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayEmployeeLevyPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->company = $rs->getString($startcol + 3);

			$this->team = $rs->getString($startcol + 4);

			$this->period_code = $rs->getString($startcol + 5);

			$this->from = $rs->getDate($startcol + 6, null);

			$this->to = $rs->getDate($startcol + 7, null);

			$this->levy_rate = $rs->getFloat($startcol + 8);

			$this->levy_ded = $rs->getFloat($startcol + 9);

			$this->amount = $rs->getFloat($startcol + 10);

			$this->created_by = $rs->getString($startcol + 11);

			$this->date_created = $rs->getTimestamp($startcol + 12, null);

			$this->modified_by = $rs->getString($startcol + 13);

			$this->date_modified = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayEmployeeLevy object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayEmployeeLevyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayEmployeeLevyPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayEmployeeLevyPeer::DATABASE_NAME);
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
					$pk = PayEmployeeLevyPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayEmployeeLevyPeer::doUpdate($this, $con);
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


			if (($retval = PayEmployeeLevyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeLevyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCompany();
				break;
			case 4:
				return $this->getTeam();
				break;
			case 5:
				return $this->getPeriodCode();
				break;
			case 6:
				return $this->getFrom();
				break;
			case 7:
				return $this->getTo();
				break;
			case 8:
				return $this->getLevyRate();
				break;
			case 9:
				return $this->getLevyDed();
				break;
			case 10:
				return $this->getAmount();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getDateCreated();
				break;
			case 13:
				return $this->getModifiedBy();
				break;
			case 14:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeLevyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getCompany(),
			$keys[4] => $this->getTeam(),
			$keys[5] => $this->getPeriodCode(),
			$keys[6] => $this->getFrom(),
			$keys[7] => $this->getTo(),
			$keys[8] => $this->getLevyRate(),
			$keys[9] => $this->getLevyDed(),
			$keys[10] => $this->getAmount(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getDateCreated(),
			$keys[13] => $this->getModifiedBy(),
			$keys[14] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeLevyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCompany($value);
				break;
			case 4:
				$this->setTeam($value);
				break;
			case 5:
				$this->setPeriodCode($value);
				break;
			case 6:
				$this->setFrom($value);
				break;
			case 7:
				$this->setTo($value);
				break;
			case 8:
				$this->setLevyRate($value);
				break;
			case 9:
				$this->setLevyDed($value);
				break;
			case 10:
				$this->setAmount($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setDateCreated($value);
				break;
			case 13:
				$this->setModifiedBy($value);
				break;
			case 14:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeLevyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCompany($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTeam($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPeriodCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFrom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLevyRate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLevyDed($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateCreated($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setModifiedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDateModified($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayEmployeeLevyPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayEmployeeLevyPeer::ID)) $criteria->add(PayEmployeeLevyPeer::ID, $this->id);
		if ($this->isColumnModified(PayEmployeeLevyPeer::EMPLOYEE_NO)) $criteria->add(PayEmployeeLevyPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayEmployeeLevyPeer::NAME)) $criteria->add(PayEmployeeLevyPeer::NAME, $this->name);
		if ($this->isColumnModified(PayEmployeeLevyPeer::COMPANY)) $criteria->add(PayEmployeeLevyPeer::COMPANY, $this->company);
		if ($this->isColumnModified(PayEmployeeLevyPeer::TEAM)) $criteria->add(PayEmployeeLevyPeer::TEAM, $this->team);
		if ($this->isColumnModified(PayEmployeeLevyPeer::PERIOD_CODE)) $criteria->add(PayEmployeeLevyPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayEmployeeLevyPeer::FROM)) $criteria->add(PayEmployeeLevyPeer::FROM, $this->from);
		if ($this->isColumnModified(PayEmployeeLevyPeer::TO)) $criteria->add(PayEmployeeLevyPeer::TO, $this->to);
		if ($this->isColumnModified(PayEmployeeLevyPeer::LEVY_RATE)) $criteria->add(PayEmployeeLevyPeer::LEVY_RATE, $this->levy_rate);
		if ($this->isColumnModified(PayEmployeeLevyPeer::LEVY_DED)) $criteria->add(PayEmployeeLevyPeer::LEVY_DED, $this->levy_ded);
		if ($this->isColumnModified(PayEmployeeLevyPeer::AMOUNT)) $criteria->add(PayEmployeeLevyPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PayEmployeeLevyPeer::CREATED_BY)) $criteria->add(PayEmployeeLevyPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayEmployeeLevyPeer::DATE_CREATED)) $criteria->add(PayEmployeeLevyPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayEmployeeLevyPeer::MODIFIED_BY)) $criteria->add(PayEmployeeLevyPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayEmployeeLevyPeer::DATE_MODIFIED)) $criteria->add(PayEmployeeLevyPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayEmployeeLevyPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLevyPeer::ID, $this->id);

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

		$copyObj->setCompany($this->company);

		$copyObj->setTeam($this->team);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setFrom($this->from);

		$copyObj->setTo($this->to);

		$copyObj->setLevyRate($this->levy_rate);

		$copyObj->setLevyDed($this->levy_ded);

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
			self::$peer = new PayEmployeeLevyPeer();
		}
		return self::$peer;
	}

} 