<?php


abstract class BaseHrEmployeePaySignature extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name = 'null';


	
	protected $period_code = 'null';


	
	protected $created_by = 'null';


	
	protected $date_created;


	
	protected $date_modified;


	
	protected $modified_by = 'null';


	
	protected $cash_signed;


	
	protected $date_cash_signed;

	
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

	
	public function getPeriodCode()
	{

		return $this->period_code;
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

	
	public function getModifiedBy()
	{

		return $this->modified_by;
	}

	
	public function getCashSigned()
	{

		return $this->cash_signed;
	}

	
	public function getDateCashSigned($format = 'Y-m-d H:i:s')
	{

		if ($this->date_cash_signed === null || $this->date_cash_signed === '') {
			return null;
		} elseif (!is_int($this->date_cash_signed)) {
						$ts = strtotime($this->date_cash_signed);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_cash_signed] as date/time value: " . var_export($this->date_cash_signed, true));
			}
		} else {
			$ts = $this->date_cash_signed;
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v || $v === 'null') {
			$this->name = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::NAME;
		}

	} 
	
	public function setPeriodCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v || $v === 'null') {
			$this->period_code = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::PERIOD_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v || $v === 'null') {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::DATE_CREATED;
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
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::DATE_MODIFIED;
		}

	} 
	
	public function setModifiedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v || $v === 'null') {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::MODIFIED_BY;
		}

	} 
	
	public function setCashSigned($v)
	{

								if ($v instanceof Lob && $v === $this->cash_signed) {
			$changed = $v->isModified();
		} else {
			$changed = ($this->cash_signed !== $v);
		}
		if ($changed) {
			if ( !($v instanceof Lob) ) {
				$obj = new Clob();
				$obj->setContents($v);
			} else {
				$obj = $v;
			}
			$this->cash_signed = $obj;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::CASH_SIGNED;
		}

	} 
	
	public function setDateCashSigned($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_cash_signed] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_cash_signed !== $ts) {
			$this->date_cash_signed = $ts;
			$this->modifiedColumns[] = HrEmployeePaySignaturePeer::DATE_CASH_SIGNED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->period_code = $rs->getString($startcol + 3);

			$this->created_by = $rs->getString($startcol + 4);

			$this->date_created = $rs->getTimestamp($startcol + 5, null);

			$this->date_modified = $rs->getTimestamp($startcol + 6, null);

			$this->modified_by = $rs->getString($startcol + 7);

			$this->cash_signed = $rs->getBlob($startcol + 8);

			$this->date_cash_signed = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeePaySignature object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeePaySignaturePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeePaySignaturePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeePaySignaturePeer::DATABASE_NAME);
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
					$pk = HrEmployeePaySignaturePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeePaySignaturePeer::doUpdate($this, $con);
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


			if (($retval = HrEmployeePaySignaturePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeePaySignaturePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPeriodCode();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getDateCreated();
				break;
			case 6:
				return $this->getDateModified();
				break;
			case 7:
				return $this->getModifiedBy();
				break;
			case 8:
				return $this->getCashSigned();
				break;
			case 9:
				return $this->getDateCashSigned();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeePaySignaturePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getPeriodCode(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getDateCreated(),
			$keys[6] => $this->getDateModified(),
			$keys[7] => $this->getModifiedBy(),
			$keys[8] => $this->getCashSigned(),
			$keys[9] => $this->getDateCashSigned(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeePaySignaturePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPeriodCode($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setDateCreated($value);
				break;
			case 6:
				$this->setDateModified($value);
				break;
			case 7:
				$this->setModifiedBy($value);
				break;
			case 8:
				$this->setCashSigned($value);
				break;
			case 9:
				$this->setDateCashSigned($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeePaySignaturePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPeriodCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateCreated($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDateModified($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setModifiedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCashSigned($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDateCashSigned($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeePaySignaturePeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeePaySignaturePeer::ID)) $criteria->add(HrEmployeePaySignaturePeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::EMPLOYEE_NO)) $criteria->add(HrEmployeePaySignaturePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::NAME)) $criteria->add(HrEmployeePaySignaturePeer::NAME, $this->name);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::PERIOD_CODE)) $criteria->add(HrEmployeePaySignaturePeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::CREATED_BY)) $criteria->add(HrEmployeePaySignaturePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::DATE_CREATED)) $criteria->add(HrEmployeePaySignaturePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::DATE_MODIFIED)) $criteria->add(HrEmployeePaySignaturePeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::MODIFIED_BY)) $criteria->add(HrEmployeePaySignaturePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::CASH_SIGNED)) $criteria->add(HrEmployeePaySignaturePeer::CASH_SIGNED, $this->cash_signed);
		if ($this->isColumnModified(HrEmployeePaySignaturePeer::DATE_CASH_SIGNED)) $criteria->add(HrEmployeePaySignaturePeer::DATE_CASH_SIGNED, $this->date_cash_signed);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeePaySignaturePeer::DATABASE_NAME);

		$criteria->add(HrEmployeePaySignaturePeer::ID, $this->id);

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

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setCashSigned($this->cash_signed);

		$copyObj->setDateCashSigned($this->date_cash_signed);


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
			self::$peer = new HrEmployeePaySignaturePeer();
		}
		return self::$peer;
	}

} 