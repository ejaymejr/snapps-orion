<?php


abstract class BasePayRemittance extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $employee_share = 0;


	
	protected $employer_share = 0;


	
	protected $period_code;


	
	protected $status;


	
	protected $gross_pay = 0;


	
	protected $emp_name;


	
	protected $ded_inc_code;


	
	protected $ded_inc_desc;


	
	protected $income_type;


	
	protected $dept_code;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $pay_account_code_id;

	
	protected $aPayAccountCode;

	
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

	
	public function getEmployeeShare()
	{

		return $this->employee_share;
	}

	
	public function getEmployerShare()
	{

		return $this->employer_share;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getGrossPay()
	{

		return $this->gross_pay;
	}

	
	public function getEmpName()
	{

		return $this->emp_name;
	}

	
	public function getDedIncCode()
	{

		return $this->ded_inc_code;
	}

	
	public function getDedIncDesc()
	{

		return $this->ded_inc_desc;
	}

	
	public function getIncomeType()
	{

		return $this->income_type;
	}

	
	public function getDeptCode()
	{

		return $this->dept_code;
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

	
	public function getPayAccountCodeId()
	{

		return $this->pay_account_code_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PayRemittancePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayRemittancePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setEmployeeShare($v)
	{

		if ($this->employee_share !== $v || $v === 0) {
			$this->employee_share = $v;
			$this->modifiedColumns[] = PayRemittancePeer::EMPLOYEE_SHARE;
		}

	} 
	
	public function setEmployerShare($v)
	{

		if ($this->employer_share !== $v || $v === 0) {
			$this->employer_share = $v;
			$this->modifiedColumns[] = PayRemittancePeer::EMPLOYER_SHARE;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayRemittancePeer::PERIOD_CODE;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PayRemittancePeer::STATUS;
		}

	} 
	
	public function setGrossPay($v)
	{

		if ($this->gross_pay !== $v || $v === 0) {
			$this->gross_pay = $v;
			$this->modifiedColumns[] = PayRemittancePeer::GROSS_PAY;
		}

	} 
	
	public function setEmpName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->emp_name !== $v) {
			$this->emp_name = $v;
			$this->modifiedColumns[] = PayRemittancePeer::EMP_NAME;
		}

	} 
	
	public function setDedIncCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ded_inc_code !== $v) {
			$this->ded_inc_code = $v;
			$this->modifiedColumns[] = PayRemittancePeer::DED_INC_CODE;
		}

	} 
	
	public function setDedIncDesc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ded_inc_desc !== $v) {
			$this->ded_inc_desc = $v;
			$this->modifiedColumns[] = PayRemittancePeer::DED_INC_DESC;
		}

	} 
	
	public function setIncomeType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income_type !== $v) {
			$this->income_type = $v;
			$this->modifiedColumns[] = PayRemittancePeer::INCOME_TYPE;
		}

	} 
	
	public function setDeptCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dept_code !== $v) {
			$this->dept_code = $v;
			$this->modifiedColumns[] = PayRemittancePeer::DEPT_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayRemittancePeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayRemittancePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayRemittancePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayRemittancePeer::DATE_MODIFIED;
		}

	} 
	
	public function setPayAccountCodeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pay_account_code_id !== $v) {
			$this->pay_account_code_id = $v;
			$this->modifiedColumns[] = PayRemittancePeer::PAY_ACCOUNT_CODE_ID;
		}

		if ($this->aPayAccountCode !== null && $this->aPayAccountCode->getId() !== $v) {
			$this->aPayAccountCode = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->employee_share = $rs->getFloat($startcol + 2);

			$this->employer_share = $rs->getFloat($startcol + 3);

			$this->period_code = $rs->getString($startcol + 4);

			$this->status = $rs->getString($startcol + 5);

			$this->gross_pay = $rs->getFloat($startcol + 6);

			$this->emp_name = $rs->getString($startcol + 7);

			$this->ded_inc_code = $rs->getString($startcol + 8);

			$this->ded_inc_desc = $rs->getString($startcol + 9);

			$this->income_type = $rs->getString($startcol + 10);

			$this->dept_code = $rs->getString($startcol + 11);

			$this->created_by = $rs->getString($startcol + 12);

			$this->date_created = $rs->getTimestamp($startcol + 13, null);

			$this->modified_by = $rs->getString($startcol + 14);

			$this->date_modified = $rs->getTimestamp($startcol + 15, null);

			$this->pay_account_code_id = $rs->getString($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayRemittance object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayRemittancePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayRemittancePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayRemittancePeer::DATABASE_NAME);
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


												
			if ($this->aPayAccountCode !== null) {
				if ($this->aPayAccountCode->isModified()) {
					$affectedRows += $this->aPayAccountCode->save($con);
				}
				$this->setPayAccountCode($this->aPayAccountCode);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PayRemittancePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayRemittancePeer::doUpdate($this, $con);
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


												
			if ($this->aPayAccountCode !== null) {
				if (!$this->aPayAccountCode->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPayAccountCode->getValidationFailures());
				}
			}


			if (($retval = PayRemittancePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayRemittancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEmployeeShare();
				break;
			case 3:
				return $this->getEmployerShare();
				break;
			case 4:
				return $this->getPeriodCode();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getGrossPay();
				break;
			case 7:
				return $this->getEmpName();
				break;
			case 8:
				return $this->getDedIncCode();
				break;
			case 9:
				return $this->getDedIncDesc();
				break;
			case 10:
				return $this->getIncomeType();
				break;
			case 11:
				return $this->getDeptCode();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			case 13:
				return $this->getDateCreated();
				break;
			case 14:
				return $this->getModifiedBy();
				break;
			case 15:
				return $this->getDateModified();
				break;
			case 16:
				return $this->getPayAccountCodeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayRemittancePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getEmployeeShare(),
			$keys[3] => $this->getEmployerShare(),
			$keys[4] => $this->getPeriodCode(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getGrossPay(),
			$keys[7] => $this->getEmpName(),
			$keys[8] => $this->getDedIncCode(),
			$keys[9] => $this->getDedIncDesc(),
			$keys[10] => $this->getIncomeType(),
			$keys[11] => $this->getDeptCode(),
			$keys[12] => $this->getCreatedBy(),
			$keys[13] => $this->getDateCreated(),
			$keys[14] => $this->getModifiedBy(),
			$keys[15] => $this->getDateModified(),
			$keys[16] => $this->getPayAccountCodeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayRemittancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEmployeeShare($value);
				break;
			case 3:
				$this->setEmployerShare($value);
				break;
			case 4:
				$this->setPeriodCode($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setGrossPay($value);
				break;
			case 7:
				$this->setEmpName($value);
				break;
			case 8:
				$this->setDedIncCode($value);
				break;
			case 9:
				$this->setDedIncDesc($value);
				break;
			case 10:
				$this->setIncomeType($value);
				break;
			case 11:
				$this->setDeptCode($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
			case 13:
				$this->setDateCreated($value);
				break;
			case 14:
				$this->setModifiedBy($value);
				break;
			case 15:
				$this->setDateModified($value);
				break;
			case 16:
				$this->setPayAccountCodeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayRemittancePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmployeeShare($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmployerShare($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPeriodCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGrossPay($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmpName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDedIncCode($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDedIncDesc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIncomeType($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDeptCode($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateCreated($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setModifiedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDateModified($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPayAccountCodeId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayRemittancePeer::DATABASE_NAME);

		if ($this->isColumnModified(PayRemittancePeer::ID)) $criteria->add(PayRemittancePeer::ID, $this->id);
		if ($this->isColumnModified(PayRemittancePeer::EMPLOYEE_NO)) $criteria->add(PayRemittancePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayRemittancePeer::EMPLOYEE_SHARE)) $criteria->add(PayRemittancePeer::EMPLOYEE_SHARE, $this->employee_share);
		if ($this->isColumnModified(PayRemittancePeer::EMPLOYER_SHARE)) $criteria->add(PayRemittancePeer::EMPLOYER_SHARE, $this->employer_share);
		if ($this->isColumnModified(PayRemittancePeer::PERIOD_CODE)) $criteria->add(PayRemittancePeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayRemittancePeer::STATUS)) $criteria->add(PayRemittancePeer::STATUS, $this->status);
		if ($this->isColumnModified(PayRemittancePeer::GROSS_PAY)) $criteria->add(PayRemittancePeer::GROSS_PAY, $this->gross_pay);
		if ($this->isColumnModified(PayRemittancePeer::EMP_NAME)) $criteria->add(PayRemittancePeer::EMP_NAME, $this->emp_name);
		if ($this->isColumnModified(PayRemittancePeer::DED_INC_CODE)) $criteria->add(PayRemittancePeer::DED_INC_CODE, $this->ded_inc_code);
		if ($this->isColumnModified(PayRemittancePeer::DED_INC_DESC)) $criteria->add(PayRemittancePeer::DED_INC_DESC, $this->ded_inc_desc);
		if ($this->isColumnModified(PayRemittancePeer::INCOME_TYPE)) $criteria->add(PayRemittancePeer::INCOME_TYPE, $this->income_type);
		if ($this->isColumnModified(PayRemittancePeer::DEPT_CODE)) $criteria->add(PayRemittancePeer::DEPT_CODE, $this->dept_code);
		if ($this->isColumnModified(PayRemittancePeer::CREATED_BY)) $criteria->add(PayRemittancePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayRemittancePeer::DATE_CREATED)) $criteria->add(PayRemittancePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayRemittancePeer::MODIFIED_BY)) $criteria->add(PayRemittancePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayRemittancePeer::DATE_MODIFIED)) $criteria->add(PayRemittancePeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(PayRemittancePeer::PAY_ACCOUNT_CODE_ID)) $criteria->add(PayRemittancePeer::PAY_ACCOUNT_CODE_ID, $this->pay_account_code_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayRemittancePeer::DATABASE_NAME);

		$criteria->add(PayRemittancePeer::ID, $this->id);

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

		$copyObj->setEmployeeShare($this->employee_share);

		$copyObj->setEmployerShare($this->employer_share);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setStatus($this->status);

		$copyObj->setGrossPay($this->gross_pay);

		$copyObj->setEmpName($this->emp_name);

		$copyObj->setDedIncCode($this->ded_inc_code);

		$copyObj->setDedIncDesc($this->ded_inc_desc);

		$copyObj->setIncomeType($this->income_type);

		$copyObj->setDeptCode($this->dept_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setPayAccountCodeId($this->pay_account_code_id);


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
			self::$peer = new PayRemittancePeer();
		}
		return self::$peer;
	}

	
	public function setPayAccountCode($v)
	{


		if ($v === null) {
			$this->setPayAccountCodeId(NULL);
		} else {
			$this->setPayAccountCodeId($v->getId());
		}


		$this->aPayAccountCode = $v;
	}


	
	public function getPayAccountCode($con = null)
	{
		if ($this->aPayAccountCode === null && (($this->pay_account_code_id !== "" && $this->pay_account_code_id !== null))) {
						include_once 'lib/model/hr/om/BasePayAccountCodePeer.php';

			$this->aPayAccountCode = PayAccountCodePeer::retrieveByPK($this->pay_account_code_id, $con);

			
		}
		return $this->aPayAccountCode;
	}

} 