<?php


abstract class BasePayrollAuditTemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $period_code;


	
	protected $basic_pay = 0;


	
	protected $ot_amount = 0;


	
	protected $ot_compliance_amount = 0;


	
	protected $allowance = 0;

	
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

	
	public function getBasicPay()
	{

		return $this->basic_pay;
	}

	
	public function getOtAmount()
	{

		return $this->ot_amount;
	}

	
	public function getOtComplianceAmount()
	{

		return $this->ot_compliance_amount;
	}

	
	public function getAllowance()
	{

		return $this->allowance;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::NAME;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::PERIOD_CODE;
		}

	} 
	
	public function setBasicPay($v)
	{

		if ($this->basic_pay !== $v || $v === 0) {
			$this->basic_pay = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::BASIC_PAY;
		}

	} 
	
	public function setOtAmount($v)
	{

		if ($this->ot_amount !== $v || $v === 0) {
			$this->ot_amount = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::OT_AMOUNT;
		}

	} 
	
	public function setOtComplianceAmount($v)
	{

		if ($this->ot_compliance_amount !== $v || $v === 0) {
			$this->ot_compliance_amount = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT;
		}

	} 
	
	public function setAllowance($v)
	{

		if ($this->allowance !== $v || $v === 0) {
			$this->allowance = $v;
			$this->modifiedColumns[] = PayrollAuditTempPeer::ALLOWANCE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->period_code = $rs->getString($startcol + 3);

			$this->basic_pay = $rs->getFloat($startcol + 4);

			$this->ot_amount = $rs->getFloat($startcol + 5);

			$this->ot_compliance_amount = $rs->getFloat($startcol + 6);

			$this->allowance = $rs->getFloat($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayrollAuditTemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayrollAuditTempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayrollAuditTempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayrollAuditTempPeer::DATABASE_NAME);
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
					$pk = PayrollAuditTempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayrollAuditTempPeer::doUpdate($this, $con);
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


			if (($retval = PayrollAuditTempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAuditTempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getBasicPay();
				break;
			case 5:
				return $this->getOtAmount();
				break;
			case 6:
				return $this->getOtComplianceAmount();
				break;
			case 7:
				return $this->getAllowance();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAuditTempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getPeriodCode(),
			$keys[4] => $this->getBasicPay(),
			$keys[5] => $this->getOtAmount(),
			$keys[6] => $this->getOtComplianceAmount(),
			$keys[7] => $this->getAllowance(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAuditTempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setBasicPay($value);
				break;
			case 5:
				$this->setOtAmount($value);
				break;
			case 6:
				$this->setOtComplianceAmount($value);
				break;
			case 7:
				$this->setAllowance($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAuditTempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPeriodCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBasicPay($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOtAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOtComplianceAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAllowance($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayrollAuditTempPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayrollAuditTempPeer::ID)) $criteria->add(PayrollAuditTempPeer::ID, $this->id);
		if ($this->isColumnModified(PayrollAuditTempPeer::EMPLOYEE_NO)) $criteria->add(PayrollAuditTempPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayrollAuditTempPeer::NAME)) $criteria->add(PayrollAuditTempPeer::NAME, $this->name);
		if ($this->isColumnModified(PayrollAuditTempPeer::PERIOD_CODE)) $criteria->add(PayrollAuditTempPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayrollAuditTempPeer::BASIC_PAY)) $criteria->add(PayrollAuditTempPeer::BASIC_PAY, $this->basic_pay);
		if ($this->isColumnModified(PayrollAuditTempPeer::OT_AMOUNT)) $criteria->add(PayrollAuditTempPeer::OT_AMOUNT, $this->ot_amount);
		if ($this->isColumnModified(PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT)) $criteria->add(PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT, $this->ot_compliance_amount);
		if ($this->isColumnModified(PayrollAuditTempPeer::ALLOWANCE)) $criteria->add(PayrollAuditTempPeer::ALLOWANCE, $this->allowance);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayrollAuditTempPeer::DATABASE_NAME);

		$criteria->add(PayrollAuditTempPeer::ID, $this->id);

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

		$copyObj->setBasicPay($this->basic_pay);

		$copyObj->setOtAmount($this->ot_amount);

		$copyObj->setOtComplianceAmount($this->ot_compliance_amount);

		$copyObj->setAllowance($this->allowance);


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
			self::$peer = new PayrollAuditTempPeer();
		}
		return self::$peer;
	}

} 