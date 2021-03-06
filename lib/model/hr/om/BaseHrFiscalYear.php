<?php


abstract class BaseHrFiscalYear extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fiscal_year = 'null';


	
	protected $previous_year = 'null';


	
	protected $start_date;


	
	protected $end_date;


	
	protected $remarks = 'null';


	
	protected $is_current = 'N';


	
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

	
	public function getFiscalYear()
	{

		return $this->fiscal_year;
	}

	
	public function getPreviousYear()
	{

		return $this->previous_year;
	}

	
	public function getStartDate($format = 'Y-m-d')
	{

		if ($this->start_date === null || $this->start_date === '') {
			return null;
		} elseif (!is_int($this->start_date)) {
						$ts = strtotime($this->start_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [start_date] as date/time value: " . var_export($this->start_date, true));
			}
		} else {
			$ts = $this->start_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEndDate($format = 'Y-m-d')
	{

		if ($this->end_date === null || $this->end_date === '') {
			return null;
		} elseif (!is_int($this->end_date)) {
						$ts = strtotime($this->end_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [end_date] as date/time value: " . var_export($this->end_date, true));
			}
		} else {
			$ts = $this->end_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRemarks()
	{

		return $this->remarks;
	}

	
	public function getIsCurrent()
	{

		return $this->is_current;
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
			$this->modifiedColumns[] = HrFiscalYearPeer::ID;
		}

	} 
	
	public function setFiscalYear($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fiscal_year !== $v || $v === 'null') {
			$this->fiscal_year = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::FISCAL_YEAR;
		}

	} 
	
	public function setPreviousYear($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->previous_year !== $v || $v === 'null') {
			$this->previous_year = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::PREVIOUS_YEAR;
		}

	} 
	
	public function setStartDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [start_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->start_date !== $ts) {
			$this->start_date = $ts;
			$this->modifiedColumns[] = HrFiscalYearPeer::START_DATE;
		}

	} 
	
	public function setEndDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [end_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->end_date !== $ts) {
			$this->end_date = $ts;
			$this->modifiedColumns[] = HrFiscalYearPeer::END_DATE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v || $v === 'null') {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::REMARKS;
		}

	} 
	
	public function setIsCurrent($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_current !== $v || $v === 'N') {
			$this->is_current = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::IS_CURRENT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrFiscalYearPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrFiscalYearPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrFiscalYearPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->fiscal_year = $rs->getString($startcol + 1);

			$this->previous_year = $rs->getString($startcol + 2);

			$this->start_date = $rs->getDate($startcol + 3, null);

			$this->end_date = $rs->getDate($startcol + 4, null);

			$this->remarks = $rs->getString($startcol + 5);

			$this->is_current = $rs->getString($startcol + 6);

			$this->created_by = $rs->getString($startcol + 7);

			$this->date_created = $rs->getTimestamp($startcol + 8, null);

			$this->modified_by = $rs->getString($startcol + 9);

			$this->date_modified = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrFiscalYear object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrFiscalYearPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrFiscalYearPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrFiscalYearPeer::DATABASE_NAME);
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
					$pk = HrFiscalYearPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrFiscalYearPeer::doUpdate($this, $con);
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


			if (($retval = HrFiscalYearPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrFiscalYearPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFiscalYear();
				break;
			case 2:
				return $this->getPreviousYear();
				break;
			case 3:
				return $this->getStartDate();
				break;
			case 4:
				return $this->getEndDate();
				break;
			case 5:
				return $this->getRemarks();
				break;
			case 6:
				return $this->getIsCurrent();
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
		$keys = HrFiscalYearPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFiscalYear(),
			$keys[2] => $this->getPreviousYear(),
			$keys[3] => $this->getStartDate(),
			$keys[4] => $this->getEndDate(),
			$keys[5] => $this->getRemarks(),
			$keys[6] => $this->getIsCurrent(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getDateCreated(),
			$keys[9] => $this->getModifiedBy(),
			$keys[10] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrFiscalYearPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFiscalYear($value);
				break;
			case 2:
				$this->setPreviousYear($value);
				break;
			case 3:
				$this->setStartDate($value);
				break;
			case 4:
				$this->setEndDate($value);
				break;
			case 5:
				$this->setRemarks($value);
				break;
			case 6:
				$this->setIsCurrent($value);
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
		$keys = HrFiscalYearPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFiscalYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPreviousYear($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStartDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEndDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRemarks($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsCurrent($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateCreated($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setModifiedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateModified($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrFiscalYearPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrFiscalYearPeer::ID)) $criteria->add(HrFiscalYearPeer::ID, $this->id);
		if ($this->isColumnModified(HrFiscalYearPeer::FISCAL_YEAR)) $criteria->add(HrFiscalYearPeer::FISCAL_YEAR, $this->fiscal_year);
		if ($this->isColumnModified(HrFiscalYearPeer::PREVIOUS_YEAR)) $criteria->add(HrFiscalYearPeer::PREVIOUS_YEAR, $this->previous_year);
		if ($this->isColumnModified(HrFiscalYearPeer::START_DATE)) $criteria->add(HrFiscalYearPeer::START_DATE, $this->start_date);
		if ($this->isColumnModified(HrFiscalYearPeer::END_DATE)) $criteria->add(HrFiscalYearPeer::END_DATE, $this->end_date);
		if ($this->isColumnModified(HrFiscalYearPeer::REMARKS)) $criteria->add(HrFiscalYearPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrFiscalYearPeer::IS_CURRENT)) $criteria->add(HrFiscalYearPeer::IS_CURRENT, $this->is_current);
		if ($this->isColumnModified(HrFiscalYearPeer::CREATED_BY)) $criteria->add(HrFiscalYearPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrFiscalYearPeer::DATE_CREATED)) $criteria->add(HrFiscalYearPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrFiscalYearPeer::MODIFIED_BY)) $criteria->add(HrFiscalYearPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrFiscalYearPeer::DATE_MODIFIED)) $criteria->add(HrFiscalYearPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrFiscalYearPeer::DATABASE_NAME);

		$criteria->add(HrFiscalYearPeer::ID, $this->id);

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

		$copyObj->setFiscalYear($this->fiscal_year);

		$copyObj->setPreviousYear($this->previous_year);

		$copyObj->setStartDate($this->start_date);

		$copyObj->setEndDate($this->end_date);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setIsCurrent($this->is_current);

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
			self::$peer = new HrFiscalYearPeer();
		}
		return self::$peer;
	}

} 