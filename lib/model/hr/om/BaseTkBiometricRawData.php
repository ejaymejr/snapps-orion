<?php


abstract class BaseTkBiometricRawData extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $clkid = 'null';


	
	protected $badgeno = 'null';


	
	protected $punchin = 'null';


	
	protected $xtion = 'null';


	
	protected $activity = 'null';


	
	protected $trans_date;


	
	protected $slot = 'null';


	
	protected $clock_v = 'null';


	
	protected $ate_time;


	
	protected $ate;


	
	protected $date_created;


	
	protected $created_by = 'null';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getClkid()
	{

		return $this->clkid;
	}

	
	public function getBadgeno()
	{

		return $this->badgeno;
	}

	
	public function getPunchin()
	{

		return $this->punchin;
	}

	
	public function getXtion()
	{

		return $this->xtion;
	}

	
	public function getActivity()
	{

		return $this->activity;
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

	
	public function getSlot()
	{

		return $this->slot;
	}

	
	public function getClockV()
	{

		return $this->clock_v;
	}

	
	public function getAteTime()
	{

		return $this->ate_time;
	}

	
	public function getAte()
	{

		return $this->ate;
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::ID;
		}

	} 
	
	public function setClkid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->clkid !== $v || $v === 'null') {
			$this->clkid = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::CLKID;
		}

	} 
	
	public function setBadgeno($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->badgeno !== $v || $v === 'null') {
			$this->badgeno = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::BADGENO;
		}

	} 
	
	public function setPunchin($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->punchin !== $v || $v === 'null') {
			$this->punchin = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::PUNCHIN;
		}

	} 
	
	public function setXtion($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->xtion !== $v || $v === 'null') {
			$this->xtion = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::XTION;
		}

	} 
	
	public function setActivity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->activity !== $v || $v === 'null') {
			$this->activity = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::ACTIVITY;
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
			$this->modifiedColumns[] = TkBiometricRawDataPeer::TRANS_DATE;
		}

	} 
	
	public function setSlot($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slot !== $v || $v === 'null') {
			$this->slot = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::SLOT;
		}

	} 
	
	public function setClockV($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->clock_v !== $v || $v === 'null') {
			$this->clock_v = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::CLOCK_V;
		}

	} 
	
	public function setAteTime($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ate_time !== $v) {
			$this->ate_time = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::ATE_TIME;
		}

	} 
	
	public function setAte($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ate !== $v) {
			$this->ate = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::ATE;
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
			$this->modifiedColumns[] = TkBiometricRawDataPeer::DATE_CREATED;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v || $v === 'null') {
			$this->created_by = $v;
			$this->modifiedColumns[] = TkBiometricRawDataPeer::CREATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->clkid = $rs->getString($startcol + 1);

			$this->badgeno = $rs->getString($startcol + 2);

			$this->punchin = $rs->getString($startcol + 3);

			$this->xtion = $rs->getString($startcol + 4);

			$this->activity = $rs->getString($startcol + 5);

			$this->trans_date = $rs->getDate($startcol + 6, null);

			$this->slot = $rs->getString($startcol + 7);

			$this->clock_v = $rs->getString($startcol + 8);

			$this->ate_time = $rs->getString($startcol + 9);

			$this->ate = $rs->getString($startcol + 10);

			$this->date_created = $rs->getTimestamp($startcol + 11, null);

			$this->created_by = $rs->getString($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TkBiometricRawData object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TkBiometricRawDataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TkBiometricRawDataPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TkBiometricRawDataPeer::DATABASE_NAME);
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
					$pk = TkBiometricRawDataPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TkBiometricRawDataPeer::doUpdate($this, $con);
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


			if (($retval = TkBiometricRawDataPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkBiometricRawDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getClkid();
				break;
			case 2:
				return $this->getBadgeno();
				break;
			case 3:
				return $this->getPunchin();
				break;
			case 4:
				return $this->getXtion();
				break;
			case 5:
				return $this->getActivity();
				break;
			case 6:
				return $this->getTransDate();
				break;
			case 7:
				return $this->getSlot();
				break;
			case 8:
				return $this->getClockV();
				break;
			case 9:
				return $this->getAteTime();
				break;
			case 10:
				return $this->getAte();
				break;
			case 11:
				return $this->getDateCreated();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkBiometricRawDataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getClkid(),
			$keys[2] => $this->getBadgeno(),
			$keys[3] => $this->getPunchin(),
			$keys[4] => $this->getXtion(),
			$keys[5] => $this->getActivity(),
			$keys[6] => $this->getTransDate(),
			$keys[7] => $this->getSlot(),
			$keys[8] => $this->getClockV(),
			$keys[9] => $this->getAteTime(),
			$keys[10] => $this->getAte(),
			$keys[11] => $this->getDateCreated(),
			$keys[12] => $this->getCreatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkBiometricRawDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setClkid($value);
				break;
			case 2:
				$this->setBadgeno($value);
				break;
			case 3:
				$this->setPunchin($value);
				break;
			case 4:
				$this->setXtion($value);
				break;
			case 5:
				$this->setActivity($value);
				break;
			case 6:
				$this->setTransDate($value);
				break;
			case 7:
				$this->setSlot($value);
				break;
			case 8:
				$this->setClockV($value);
				break;
			case 9:
				$this->setAteTime($value);
				break;
			case 10:
				$this->setAte($value);
				break;
			case 11:
				$this->setDateCreated($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkBiometricRawDataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClkid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBadgeno($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPunchin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setXtion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActivity($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTransDate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSlot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setClockV($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAteTime($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAte($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateCreated($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TkBiometricRawDataPeer::DATABASE_NAME);

		if ($this->isColumnModified(TkBiometricRawDataPeer::ID)) $criteria->add(TkBiometricRawDataPeer::ID, $this->id);
		if ($this->isColumnModified(TkBiometricRawDataPeer::CLKID)) $criteria->add(TkBiometricRawDataPeer::CLKID, $this->clkid);
		if ($this->isColumnModified(TkBiometricRawDataPeer::BADGENO)) $criteria->add(TkBiometricRawDataPeer::BADGENO, $this->badgeno);
		if ($this->isColumnModified(TkBiometricRawDataPeer::PUNCHIN)) $criteria->add(TkBiometricRawDataPeer::PUNCHIN, $this->punchin);
		if ($this->isColumnModified(TkBiometricRawDataPeer::XTION)) $criteria->add(TkBiometricRawDataPeer::XTION, $this->xtion);
		if ($this->isColumnModified(TkBiometricRawDataPeer::ACTIVITY)) $criteria->add(TkBiometricRawDataPeer::ACTIVITY, $this->activity);
		if ($this->isColumnModified(TkBiometricRawDataPeer::TRANS_DATE)) $criteria->add(TkBiometricRawDataPeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(TkBiometricRawDataPeer::SLOT)) $criteria->add(TkBiometricRawDataPeer::SLOT, $this->slot);
		if ($this->isColumnModified(TkBiometricRawDataPeer::CLOCK_V)) $criteria->add(TkBiometricRawDataPeer::CLOCK_V, $this->clock_v);
		if ($this->isColumnModified(TkBiometricRawDataPeer::ATE_TIME)) $criteria->add(TkBiometricRawDataPeer::ATE_TIME, $this->ate_time);
		if ($this->isColumnModified(TkBiometricRawDataPeer::ATE)) $criteria->add(TkBiometricRawDataPeer::ATE, $this->ate);
		if ($this->isColumnModified(TkBiometricRawDataPeer::DATE_CREATED)) $criteria->add(TkBiometricRawDataPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(TkBiometricRawDataPeer::CREATED_BY)) $criteria->add(TkBiometricRawDataPeer::CREATED_BY, $this->created_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TkBiometricRawDataPeer::DATABASE_NAME);

		$criteria->add(TkBiometricRawDataPeer::ID, $this->id);

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

		$copyObj->setClkid($this->clkid);

		$copyObj->setBadgeno($this->badgeno);

		$copyObj->setPunchin($this->punchin);

		$copyObj->setXtion($this->xtion);

		$copyObj->setActivity($this->activity);

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setSlot($this->slot);

		$copyObj->setClockV($this->clock_v);

		$copyObj->setAteTime($this->ate_time);

		$copyObj->setAte($this->ate);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setCreatedBy($this->created_by);


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
			self::$peer = new TkBiometricRawDataPeer();
		}
		return self::$peer;
	}

} 