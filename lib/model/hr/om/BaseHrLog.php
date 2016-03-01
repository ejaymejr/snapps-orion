<?php


abstract class BaseHrLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user = 'null';


	
	protected $target = 'null';


	
	protected $user_action = 'null';


	
	protected $description = 'null';


	
	protected $action_module = 'null';


	
	protected $employee_no = 'null';


	
	protected $period_code = 'null';


	
	protected $acct_code = 'null';


	
	protected $amount = 0;


	
	protected $bank_cash = 'null';


	
	protected $mac_addr;


	
	protected $date_created;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUser()
	{

		return $this->user;
	}

	
	public function getTarget()
	{

		return $this->target;
	}

	
	public function getUserAction()
	{

		return $this->user_action;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getActionModule()
	{

		return $this->action_module;
	}

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getBankCash()
	{

		return $this->bank_cash;
	}

	
	public function getMacAddr()
	{

		return $this->mac_addr;
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

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrLogPeer::ID;
		}

	} 
	
	public function setUser($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user !== $v || $v === 'null') {
			$this->user = $v;
			$this->modifiedColumns[] = HrLogPeer::USER;
		}

	} 
	
	public function setTarget($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->target !== $v || $v === 'null') {
			$this->target = $v;
			$this->modifiedColumns[] = HrLogPeer::TARGET;
		}

	} 
	
	public function setUserAction($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_action !== $v || $v === 'null') {
			$this->user_action = $v;
			$this->modifiedColumns[] = HrLogPeer::USER_ACTION;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v || $v === 'null') {
			$this->description = $v;
			$this->modifiedColumns[] = HrLogPeer::DESCRIPTION;
		}

	} 
	
	public function setActionModule($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->action_module !== $v || $v === 'null') {
			$this->action_module = $v;
			$this->modifiedColumns[] = HrLogPeer::ACTION_MODULE;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = HrLogPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v || $v === 'null') {
			$this->period_code = $v;
			$this->modifiedColumns[] = HrLogPeer::PERIOD_CODE;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v || $v === 'null') {
			$this->acct_code = $v;
			$this->modifiedColumns[] = HrLogPeer::ACCT_CODE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = HrLogPeer::AMOUNT;
		}

	} 
	
	public function setBankCash($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_cash !== $v || $v === 'null') {
			$this->bank_cash = $v;
			$this->modifiedColumns[] = HrLogPeer::BANK_CASH;
		}

	} 
	
	public function setMacAddr($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mac_addr !== $v) {
			$this->mac_addr = $v;
			$this->modifiedColumns[] = HrLogPeer::MAC_ADDR;
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
			$this->modifiedColumns[] = HrLogPeer::DATE_CREATED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->user = $rs->getString($startcol + 1);

			$this->target = $rs->getString($startcol + 2);

			$this->user_action = $rs->getString($startcol + 3);

			$this->description = $rs->getString($startcol + 4);

			$this->action_module = $rs->getString($startcol + 5);

			$this->employee_no = $rs->getString($startcol + 6);

			$this->period_code = $rs->getString($startcol + 7);

			$this->acct_code = $rs->getString($startcol + 8);

			$this->amount = $rs->getFloat($startcol + 9);

			$this->bank_cash = $rs->getString($startcol + 10);

			$this->mac_addr = $rs->getString($startcol + 11);

			$this->date_created = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrLog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrLogPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrLogPeer::DATABASE_NAME);
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
					$pk = HrLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrLogPeer::doUpdate($this, $con);
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


			if (($retval = HrLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUser();
				break;
			case 2:
				return $this->getTarget();
				break;
			case 3:
				return $this->getUserAction();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getActionModule();
				break;
			case 6:
				return $this->getEmployeeNo();
				break;
			case 7:
				return $this->getPeriodCode();
				break;
			case 8:
				return $this->getAcctCode();
				break;
			case 9:
				return $this->getAmount();
				break;
			case 10:
				return $this->getBankCash();
				break;
			case 11:
				return $this->getMacAddr();
				break;
			case 12:
				return $this->getDateCreated();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUser(),
			$keys[2] => $this->getTarget(),
			$keys[3] => $this->getUserAction(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getActionModule(),
			$keys[6] => $this->getEmployeeNo(),
			$keys[7] => $this->getPeriodCode(),
			$keys[8] => $this->getAcctCode(),
			$keys[9] => $this->getAmount(),
			$keys[10] => $this->getBankCash(),
			$keys[11] => $this->getMacAddr(),
			$keys[12] => $this->getDateCreated(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUser($value);
				break;
			case 2:
				$this->setTarget($value);
				break;
			case 3:
				$this->setUserAction($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setActionModule($value);
				break;
			case 6:
				$this->setEmployeeNo($value);
				break;
			case 7:
				$this->setPeriodCode($value);
				break;
			case 8:
				$this->setAcctCode($value);
				break;
			case 9:
				$this->setAmount($value);
				break;
			case 10:
				$this->setBankCash($value);
				break;
			case 11:
				$this->setMacAddr($value);
				break;
			case 12:
				$this->setDateCreated($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTarget($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserAction($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActionModule($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmployeeNo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPeriodCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAcctCode($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAmount($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBankCash($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMacAddr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateCreated($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrLogPeer::ID)) $criteria->add(HrLogPeer::ID, $this->id);
		if ($this->isColumnModified(HrLogPeer::USER)) $criteria->add(HrLogPeer::USER, $this->user);
		if ($this->isColumnModified(HrLogPeer::TARGET)) $criteria->add(HrLogPeer::TARGET, $this->target);
		if ($this->isColumnModified(HrLogPeer::USER_ACTION)) $criteria->add(HrLogPeer::USER_ACTION, $this->user_action);
		if ($this->isColumnModified(HrLogPeer::DESCRIPTION)) $criteria->add(HrLogPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(HrLogPeer::ACTION_MODULE)) $criteria->add(HrLogPeer::ACTION_MODULE, $this->action_module);
		if ($this->isColumnModified(HrLogPeer::EMPLOYEE_NO)) $criteria->add(HrLogPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(HrLogPeer::PERIOD_CODE)) $criteria->add(HrLogPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(HrLogPeer::ACCT_CODE)) $criteria->add(HrLogPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(HrLogPeer::AMOUNT)) $criteria->add(HrLogPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(HrLogPeer::BANK_CASH)) $criteria->add(HrLogPeer::BANK_CASH, $this->bank_cash);
		if ($this->isColumnModified(HrLogPeer::MAC_ADDR)) $criteria->add(HrLogPeer::MAC_ADDR, $this->mac_addr);
		if ($this->isColumnModified(HrLogPeer::DATE_CREATED)) $criteria->add(HrLogPeer::DATE_CREATED, $this->date_created);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrLogPeer::DATABASE_NAME);

		$criteria->add(HrLogPeer::ID, $this->id);

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

		$copyObj->setUser($this->user);

		$copyObj->setTarget($this->target);

		$copyObj->setUserAction($this->user_action);

		$copyObj->setDescription($this->description);

		$copyObj->setActionModule($this->action_module);

		$copyObj->setEmployeeNo($this->employee_no);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setAmount($this->amount);

		$copyObj->setBankCash($this->bank_cash);

		$copyObj->setMacAddr($this->mac_addr);

		$copyObj->setDateCreated($this->date_created);


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
			self::$peer = new HrLogPeer();
		}
		return self::$peer;
	}

} 