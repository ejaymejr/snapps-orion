<?php


abstract class BaseTkBiometricLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id = 'null';


	
	protected $employee_no = 'null';


	
	protected $name = 'null';


	
	protected $trans_date = 'null';


	
	protected $time_in = 'null';


	
	protected $time_out = 'null';


	
	protected $ot = 'null';


	
	protected $source = 'null';


	
	protected $upload_date;


	
	protected $date_created;


	
	protected $created_by = 'null';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getTransDate()
	{

		return $this->trans_date;
	}

	
	public function getTimeIn()
	{

		return $this->time_in;
	}

	
	public function getTimeOut()
	{

		return $this->time_out;
	}

	
	public function getOt()
	{

		return $this->ot;
	}

	
	public function getSource()
	{

		return $this->source;
	}

	
	public function getUploadDate($format = 'Y-m-d H:i:s')
	{

		if ($this->upload_date === null || $this->upload_date === '') {
			return null;
		} elseif (!is_int($this->upload_date)) {
						$ts = strtotime($this->upload_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [upload_date] as date/time value: " . var_export($this->upload_date, true));
			}
		} else {
			$ts = $this->upload_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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
			$this->modifiedColumns[] = TkBiometricLogPeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v || $v === 'null') {
			$this->user_id = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::USER_ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v || $v === 'null') {
			$this->name = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::NAME;
		}

	} 
	
	public function setTransDate($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->trans_date !== $v || $v === 'null') {
			$this->trans_date = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::TRANS_DATE;
		}

	} 
	
	public function setTimeIn($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->time_in !== $v || $v === 'null') {
			$this->time_in = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::TIME_IN;
		}

	} 
	
	public function setTimeOut($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->time_out !== $v || $v === 'null') {
			$this->time_out = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::TIME_OUT;
		}

	} 
	
	public function setOt($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ot !== $v || $v === 'null') {
			$this->ot = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::OT;
		}

	} 
	
	public function setSource($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->source !== $v || $v === 'null') {
			$this->source = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::SOURCE;
		}

	} 
	
	public function setUploadDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [upload_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->upload_date !== $ts) {
			$this->upload_date = $ts;
			$this->modifiedColumns[] = TkBiometricLogPeer::UPLOAD_DATE;
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
			$this->modifiedColumns[] = TkBiometricLogPeer::DATE_CREATED;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v || $v === 'null') {
			$this->created_by = $v;
			$this->modifiedColumns[] = TkBiometricLogPeer::CREATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->user_id = $rs->getString($startcol + 1);

			$this->employee_no = $rs->getString($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->trans_date = $rs->getString($startcol + 4);

			$this->time_in = $rs->getString($startcol + 5);

			$this->time_out = $rs->getString($startcol + 6);

			$this->ot = $rs->getString($startcol + 7);

			$this->source = $rs->getString($startcol + 8);

			$this->upload_date = $rs->getTimestamp($startcol + 9, null);

			$this->date_created = $rs->getTimestamp($startcol + 10, null);

			$this->created_by = $rs->getString($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TkBiometricLog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TkBiometricLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TkBiometricLogPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TkBiometricLogPeer::DATABASE_NAME);
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
					$pk = TkBiometricLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TkBiometricLogPeer::doUpdate($this, $con);
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


			if (($retval = TkBiometricLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkBiometricLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getEmployeeNo();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getTransDate();
				break;
			case 5:
				return $this->getTimeIn();
				break;
			case 6:
				return $this->getTimeOut();
				break;
			case 7:
				return $this->getOt();
				break;
			case 8:
				return $this->getSource();
				break;
			case 9:
				return $this->getUploadDate();
				break;
			case 10:
				return $this->getDateCreated();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkBiometricLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getEmployeeNo(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getTransDate(),
			$keys[5] => $this->getTimeIn(),
			$keys[6] => $this->getTimeOut(),
			$keys[7] => $this->getOt(),
			$keys[8] => $this->getSource(),
			$keys[9] => $this->getUploadDate(),
			$keys[10] => $this->getDateCreated(),
			$keys[11] => $this->getCreatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkBiometricLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setEmployeeNo($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setTransDate($value);
				break;
			case 5:
				$this->setTimeIn($value);
				break;
			case 6:
				$this->setTimeOut($value);
				break;
			case 7:
				$this->setOt($value);
				break;
			case 8:
				$this->setSource($value);
				break;
			case 9:
				$this->setUploadDate($value);
				break;
			case 10:
				$this->setDateCreated($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkBiometricLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmployeeNo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTransDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTimeIn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTimeOut($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSource($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUploadDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateCreated($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TkBiometricLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(TkBiometricLogPeer::ID)) $criteria->add(TkBiometricLogPeer::ID, $this->id);
		if ($this->isColumnModified(TkBiometricLogPeer::USER_ID)) $criteria->add(TkBiometricLogPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(TkBiometricLogPeer::EMPLOYEE_NO)) $criteria->add(TkBiometricLogPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(TkBiometricLogPeer::NAME)) $criteria->add(TkBiometricLogPeer::NAME, $this->name);
		if ($this->isColumnModified(TkBiometricLogPeer::TRANS_DATE)) $criteria->add(TkBiometricLogPeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(TkBiometricLogPeer::TIME_IN)) $criteria->add(TkBiometricLogPeer::TIME_IN, $this->time_in);
		if ($this->isColumnModified(TkBiometricLogPeer::TIME_OUT)) $criteria->add(TkBiometricLogPeer::TIME_OUT, $this->time_out);
		if ($this->isColumnModified(TkBiometricLogPeer::OT)) $criteria->add(TkBiometricLogPeer::OT, $this->ot);
		if ($this->isColumnModified(TkBiometricLogPeer::SOURCE)) $criteria->add(TkBiometricLogPeer::SOURCE, $this->source);
		if ($this->isColumnModified(TkBiometricLogPeer::UPLOAD_DATE)) $criteria->add(TkBiometricLogPeer::UPLOAD_DATE, $this->upload_date);
		if ($this->isColumnModified(TkBiometricLogPeer::DATE_CREATED)) $criteria->add(TkBiometricLogPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(TkBiometricLogPeer::CREATED_BY)) $criteria->add(TkBiometricLogPeer::CREATED_BY, $this->created_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TkBiometricLogPeer::DATABASE_NAME);

		$criteria->add(TkBiometricLogPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setEmployeeNo($this->employee_no);

		$copyObj->setName($this->name);

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setTimeIn($this->time_in);

		$copyObj->setTimeOut($this->time_out);

		$copyObj->setOt($this->ot);

		$copyObj->setSource($this->source);

		$copyObj->setUploadDate($this->upload_date);

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
			self::$peer = new TkBiometricLogPeer();
		}
		return self::$peer;
	}

} 