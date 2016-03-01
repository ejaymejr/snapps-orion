<?php


abstract class BasePayAccountCodes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $acct_code;


	
	protected $description;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;

	
	protected $collPayBasicPays;

	
	protected $lastPayBasicPayCriteria = null;

	
	protected $collPayEmployeeLedgers;

	
	protected $lastPayEmployeeLedgerCriteria = null;

	
	protected $collPayBilledDeductions;

	
	protected $lastPayBilledDeductionCriteria = null;

	
	protected $collPayRemittances;

	
	protected $lastPayRemittanceCriteria = null;

	
	protected $collPayScheduledDeductions;

	
	protected $lastPayScheduledDeductionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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
			$this->modifiedColumns[] = PayAccountCodesPeer::ID;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v) {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayAccountCodesPeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayAccountCodesPeer::DESCRIPTION;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = PayAccountCodesPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayAccountCodesPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayAccountCodesPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayAccountCodesPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayAccountCodesPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->acct_code = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->remarks = $rs->getString($startcol + 3);

			$this->created_by = $rs->getString($startcol + 4);

			$this->date_created = $rs->getTimestamp($startcol + 5, null);

			$this->modified_by = $rs->getString($startcol + 6);

			$this->date_modified = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayAccountCodes object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayAccountCodesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayAccountCodesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayAccountCodesPeer::DATABASE_NAME);
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
					$pk = PayAccountCodesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayAccountCodesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPayBasicPays !== null) {
				foreach($this->collPayBasicPays as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPayEmployeeLedgers !== null) {
				foreach($this->collPayEmployeeLedgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPayBilledDeductions !== null) {
				foreach($this->collPayBilledDeductions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPayRemittances !== null) {
				foreach($this->collPayRemittances as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPayScheduledDeductions !== null) {
				foreach($this->collPayScheduledDeductions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = PayAccountCodesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPayBasicPays !== null) {
					foreach($this->collPayBasicPays as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPayEmployeeLedgers !== null) {
					foreach($this->collPayEmployeeLedgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPayBilledDeductions !== null) {
					foreach($this->collPayBilledDeductions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPayRemittances !== null) {
					foreach($this->collPayRemittances as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPayScheduledDeductions !== null) {
					foreach($this->collPayScheduledDeductions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayAccountCodesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAcctCode();
				break;
			case 2:
				return $this->getDescription();
				break;
			case 3:
				return $this->getRemarks();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getDateCreated();
				break;
			case 6:
				return $this->getModifiedBy();
				break;
			case 7:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayAccountCodesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAcctCode(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getRemarks(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getDateCreated(),
			$keys[6] => $this->getModifiedBy(),
			$keys[7] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayAccountCodesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAcctCode($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
			case 3:
				$this->setRemarks($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setDateCreated($value);
				break;
			case 6:
				$this->setModifiedBy($value);
				break;
			case 7:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayAccountCodesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAcctCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRemarks($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateCreated($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setModifiedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateModified($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayAccountCodesPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayAccountCodesPeer::ID)) $criteria->add(PayAccountCodesPeer::ID, $this->id);
		if ($this->isColumnModified(PayAccountCodesPeer::ACCT_CODE)) $criteria->add(PayAccountCodesPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayAccountCodesPeer::DESCRIPTION)) $criteria->add(PayAccountCodesPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayAccountCodesPeer::REMARKS)) $criteria->add(PayAccountCodesPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(PayAccountCodesPeer::CREATED_BY)) $criteria->add(PayAccountCodesPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayAccountCodesPeer::DATE_CREATED)) $criteria->add(PayAccountCodesPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayAccountCodesPeer::MODIFIED_BY)) $criteria->add(PayAccountCodesPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayAccountCodesPeer::DATE_MODIFIED)) $criteria->add(PayAccountCodesPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayAccountCodesPeer::DATABASE_NAME);

		$criteria->add(PayAccountCodesPeer::ID, $this->id);

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

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setDescription($this->description);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPayBasicPays() as $relObj) {
				$copyObj->addPayBasicPay($relObj->copy($deepCopy));
			}

			foreach($this->getPayEmployeeLedgers() as $relObj) {
				$copyObj->addPayEmployeeLedger($relObj->copy($deepCopy));
			}

			foreach($this->getPayBilledDeductions() as $relObj) {
				$copyObj->addPayBilledDeduction($relObj->copy($deepCopy));
			}

			foreach($this->getPayRemittances() as $relObj) {
				$copyObj->addPayRemittance($relObj->copy($deepCopy));
			}

			foreach($this->getPayScheduledDeductions() as $relObj) {
				$copyObj->addPayScheduledDeduction($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new PayAccountCodesPeer();
		}
		return self::$peer;
	}

	
	public function initPayBasicPays()
	{
		if ($this->collPayBasicPays === null) {
			$this->collPayBasicPays = array();
		}
	}

	
	public function getPayBasicPays($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayBasicPayPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayBasicPays === null) {
			if ($this->isNew()) {
			   $this->collPayBasicPays = array();
			} else {

				$criteria->add(PayBasicPayPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayBasicPayPeer::addSelectColumns($criteria);
				$this->collPayBasicPays = PayBasicPayPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PayBasicPayPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayBasicPayPeer::addSelectColumns($criteria);
				if (!isset($this->lastPayBasicPayCriteria) || !$this->lastPayBasicPayCriteria->equals($criteria)) {
					$this->collPayBasicPays = PayBasicPayPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPayBasicPayCriteria = $criteria;
		return $this->collPayBasicPays;
	}

	
	public function countPayBasicPays($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayBasicPayPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PayBasicPayPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

		return PayBasicPayPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPayBasicPay(PayBasicPay $l)
	{
		$this->collPayBasicPays[] = $l;
		$l->setPayAccountCodes($this);
	}

	
	public function initPayEmployeeLedgers()
	{
		if ($this->collPayEmployeeLedgers === null) {
			$this->collPayEmployeeLedgers = array();
		}
	}

	
	public function getPayEmployeeLedgers($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayEmployeeLedgers === null) {
			if ($this->isNew()) {
			   $this->collPayEmployeeLedgers = array();
			} else {

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayEmployeeLedgerPeer::addSelectColumns($criteria);
				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayEmployeeLedgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastPayEmployeeLedgerCriteria) || !$this->lastPayEmployeeLedgerCriteria->equals($criteria)) {
					$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPayEmployeeLedgerCriteria = $criteria;
		return $this->collPayEmployeeLedgers;
	}

	
	public function countPayEmployeeLedgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

		return PayEmployeeLedgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPayEmployeeLedger(PayEmployeeLedger $l)
	{
		$this->collPayEmployeeLedgers[] = $l;
		$l->setPayAccountCodes($this);
	}


	
	public function getPayEmployeeLedgersJoinPayBasicPay($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayEmployeeLedgers === null) {
			if ($this->isNew()) {
				$this->collPayEmployeeLedgers = array();
			} else {

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayBasicPay($criteria, $con);
			}
		} else {
									
			$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayEmployeeLedgerCriteria) || !$this->lastPayEmployeeLedgerCriteria->equals($criteria)) {
				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayBasicPay($criteria, $con);
			}
		}
		$this->lastPayEmployeeLedgerCriteria = $criteria;

		return $this->collPayEmployeeLedgers;
	}


	
	public function getPayEmployeeLedgersJoinPayScheduledIncome($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayEmployeeLedgers === null) {
			if ($this->isNew()) {
				$this->collPayEmployeeLedgers = array();
			} else {

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayScheduledIncome($criteria, $con);
			}
		} else {
									
			$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayEmployeeLedgerCriteria) || !$this->lastPayEmployeeLedgerCriteria->equals($criteria)) {
				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayScheduledIncome($criteria, $con);
			}
		}
		$this->lastPayEmployeeLedgerCriteria = $criteria;

		return $this->collPayEmployeeLedgers;
	}


	
	public function getPayEmployeeLedgersJoinPayRemittance($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayEmployeeLedgers === null) {
			if ($this->isNew()) {
				$this->collPayEmployeeLedgers = array();
			} else {

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayRemittance($criteria, $con);
			}
		} else {
									
			$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayEmployeeLedgerCriteria) || !$this->lastPayEmployeeLedgerCriteria->equals($criteria)) {
				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayRemittance($criteria, $con);
			}
		}
		$this->lastPayEmployeeLedgerCriteria = $criteria;

		return $this->collPayEmployeeLedgers;
	}


	
	public function getPayEmployeeLedgersJoinPayScheduledDeduction($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayEmployeeLedgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayEmployeeLedgers === null) {
			if ($this->isNew()) {
				$this->collPayEmployeeLedgers = array();
			} else {

				$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayScheduledDeduction($criteria, $con);
			}
		} else {
									
			$criteria->add(PayEmployeeLedgerPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayEmployeeLedgerCriteria) || !$this->lastPayEmployeeLedgerCriteria->equals($criteria)) {
				$this->collPayEmployeeLedgers = PayEmployeeLedgerPeer::doSelectJoinPayScheduledDeduction($criteria, $con);
			}
		}
		$this->lastPayEmployeeLedgerCriteria = $criteria;

		return $this->collPayEmployeeLedgers;
	}

	
	public function initPayBilledDeductions()
	{
		if ($this->collPayBilledDeductions === null) {
			$this->collPayBilledDeductions = array();
		}
	}

	
	public function getPayBilledDeductions($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayBilledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayBilledDeductions === null) {
			if ($this->isNew()) {
			   $this->collPayBilledDeductions = array();
			} else {

				$criteria->add(PayBilledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayBilledDeductionPeer::addSelectColumns($criteria);
				$this->collPayBilledDeductions = PayBilledDeductionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PayBilledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayBilledDeductionPeer::addSelectColumns($criteria);
				if (!isset($this->lastPayBilledDeductionCriteria) || !$this->lastPayBilledDeductionCriteria->equals($criteria)) {
					$this->collPayBilledDeductions = PayBilledDeductionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPayBilledDeductionCriteria = $criteria;
		return $this->collPayBilledDeductions;
	}

	
	public function countPayBilledDeductions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayBilledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PayBilledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

		return PayBilledDeductionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPayBilledDeduction(PayBilledDeduction $l)
	{
		$this->collPayBilledDeductions[] = $l;
		$l->setPayAccountCodes($this);
	}


	
	public function getPayBilledDeductionsJoinPayEmployeeLedger($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayBilledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayBilledDeductions === null) {
			if ($this->isNew()) {
				$this->collPayBilledDeductions = array();
			} else {

				$criteria->add(PayBilledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayBilledDeductions = PayBilledDeductionPeer::doSelectJoinPayEmployeeLedger($criteria, $con);
			}
		} else {
									
			$criteria->add(PayBilledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayBilledDeductionCriteria) || !$this->lastPayBilledDeductionCriteria->equals($criteria)) {
				$this->collPayBilledDeductions = PayBilledDeductionPeer::doSelectJoinPayEmployeeLedger($criteria, $con);
			}
		}
		$this->lastPayBilledDeductionCriteria = $criteria;

		return $this->collPayBilledDeductions;
	}

	
	public function initPayRemittances()
	{
		if ($this->collPayRemittances === null) {
			$this->collPayRemittances = array();
		}
	}

	
	public function getPayRemittances($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayRemittancePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayRemittances === null) {
			if ($this->isNew()) {
			   $this->collPayRemittances = array();
			} else {

				$criteria->add(PayRemittancePeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayRemittancePeer::addSelectColumns($criteria);
				$this->collPayRemittances = PayRemittancePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PayRemittancePeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayRemittancePeer::addSelectColumns($criteria);
				if (!isset($this->lastPayRemittanceCriteria) || !$this->lastPayRemittanceCriteria->equals($criteria)) {
					$this->collPayRemittances = PayRemittancePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPayRemittanceCriteria = $criteria;
		return $this->collPayRemittances;
	}

	
	public function countPayRemittances($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayRemittancePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PayRemittancePeer::PAY_ACCOUNT_CODES_ID, $this->getId());

		return PayRemittancePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPayRemittance(PayRemittance $l)
	{
		$this->collPayRemittances[] = $l;
		$l->setPayAccountCodes($this);
	}

	
	public function initPayScheduledDeductions()
	{
		if ($this->collPayScheduledDeductions === null) {
			$this->collPayScheduledDeductions = array();
		}
	}

	
	public function getPayScheduledDeductions($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayScheduledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayScheduledDeductions === null) {
			if ($this->isNew()) {
			   $this->collPayScheduledDeductions = array();
			} else {

				$criteria->add(PayScheduledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayScheduledDeductionPeer::addSelectColumns($criteria);
				$this->collPayScheduledDeductions = PayScheduledDeductionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PayScheduledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				PayScheduledDeductionPeer::addSelectColumns($criteria);
				if (!isset($this->lastPayScheduledDeductionCriteria) || !$this->lastPayScheduledDeductionCriteria->equals($criteria)) {
					$this->collPayScheduledDeductions = PayScheduledDeductionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPayScheduledDeductionCriteria = $criteria;
		return $this->collPayScheduledDeductions;
	}

	
	public function countPayScheduledDeductions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayScheduledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PayScheduledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

		return PayScheduledDeductionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPayScheduledDeduction(PayScheduledDeduction $l)
	{
		$this->collPayScheduledDeductions[] = $l;
		$l->setPayAccountCodes($this);
	}


	
	public function getPayScheduledDeductionsJoinTkPrepostSummary($criteria = null, $con = null)
	{
				include_once 'lib/model/hr/om/BasePayScheduledDeductionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPayScheduledDeductions === null) {
			if ($this->isNew()) {
				$this->collPayScheduledDeductions = array();
			} else {

				$criteria->add(PayScheduledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

				$this->collPayScheduledDeductions = PayScheduledDeductionPeer::doSelectJoinTkPrepostSummary($criteria, $con);
			}
		} else {
									
			$criteria->add(PayScheduledDeductionPeer::PAY_ACCOUNT_CODES_ID, $this->getId());

			if (!isset($this->lastPayScheduledDeductionCriteria) || !$this->lastPayScheduledDeductionCriteria->equals($criteria)) {
				$this->collPayScheduledDeductions = PayScheduledDeductionPeer::doSelectJoinTkPrepostSummary($criteria, $con);
			}
		}
		$this->lastPayScheduledDeductionCriteria = $criteria;

		return $this->collPayScheduledDeductions;
	}

} 