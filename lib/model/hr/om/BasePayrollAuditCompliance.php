<?php


abstract class BasePayrollAuditCompliance extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $period_code;


	
	protected $basic_pay = 0;


	
	protected $ot_amount = 0;


	
	protected $ot_compliance_amount = 0;


	
	protected $ot_compliance_amount_original_time = 0;


	
	protected $allowance = 0;


	
	protected $compliance_deduction_amount = 0;


	
	protected $compliance_amount = 0;


	
	protected $compliance_amount_original_time = 0;


	
	protected $paid_amount = 0;


	
	protected $mom_compliance_amount = 0;


	
	protected $rate_per_hour = 0;


	
	protected $total_income = 0;


	
	protected $posted_ot = 0;


	
	protected $posted_ha = 0;


	
	protected $total_ot_hours = 0;

	
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

	
	public function getOtComplianceAmountOriginalTime()
	{

		return $this->ot_compliance_amount_original_time;
	}

	
	public function getAllowance()
	{

		return $this->allowance;
	}

	
	public function getComplianceDeductionAmount()
	{

		return $this->compliance_deduction_amount;
	}

	
	public function getComplianceAmount()
	{

		return $this->compliance_amount;
	}

	
	public function getComplianceAmountOriginalTime()
	{

		return $this->compliance_amount_original_time;
	}

	
	public function getPaidAmount()
	{

		return $this->paid_amount;
	}

	
	public function getMomComplianceAmount()
	{

		return $this->mom_compliance_amount;
	}

	
	public function getRatePerHour()
	{

		return $this->rate_per_hour;
	}

	
	public function getTotalIncome()
	{

		return $this->total_income;
	}

	
	public function getPostedOt()
	{

		return $this->posted_ot;
	}

	
	public function getPostedHa()
	{

		return $this->posted_ha;
	}

	
	public function getTotalOtHours()
	{

		return $this->total_ot_hours;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::NAME;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::PERIOD_CODE;
		}

	} 
	
	public function setBasicPay($v)
	{

		if ($this->basic_pay !== $v || $v === 0) {
			$this->basic_pay = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::BASIC_PAY;
		}

	} 
	
	public function setOtAmount($v)
	{

		if ($this->ot_amount !== $v || $v === 0) {
			$this->ot_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::OT_AMOUNT;
		}

	} 
	
	public function setOtComplianceAmount($v)
	{

		if ($this->ot_compliance_amount !== $v || $v === 0) {
			$this->ot_compliance_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT;
		}

	} 
	
	public function setOtComplianceAmountOriginalTime($v)
	{

		if ($this->ot_compliance_amount_original_time !== $v || $v === 0) {
			$this->ot_compliance_amount_original_time = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME;
		}

	} 
	
	public function setAllowance($v)
	{

		if ($this->allowance !== $v || $v === 0) {
			$this->allowance = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::ALLOWANCE;
		}

	} 
	
	public function setComplianceDeductionAmount($v)
	{

		if ($this->compliance_deduction_amount !== $v || $v === 0) {
			$this->compliance_deduction_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT;
		}

	} 
	
	public function setComplianceAmount($v)
	{

		if ($this->compliance_amount !== $v || $v === 0) {
			$this->compliance_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT;
		}

	} 
	
	public function setComplianceAmountOriginalTime($v)
	{

		if ($this->compliance_amount_original_time !== $v || $v === 0) {
			$this->compliance_amount_original_time = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME;
		}

	} 
	
	public function setPaidAmount($v)
	{

		if ($this->paid_amount !== $v || $v === 0) {
			$this->paid_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::PAID_AMOUNT;
		}

	} 
	
	public function setMomComplianceAmount($v)
	{

		if ($this->mom_compliance_amount !== $v || $v === 0) {
			$this->mom_compliance_amount = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT;
		}

	} 
	
	public function setRatePerHour($v)
	{

		if ($this->rate_per_hour !== $v || $v === 0) {
			$this->rate_per_hour = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::RATE_PER_HOUR;
		}

	} 
	
	public function setTotalIncome($v)
	{

		if ($this->total_income !== $v || $v === 0) {
			$this->total_income = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::TOTAL_INCOME;
		}

	} 
	
	public function setPostedOt($v)
	{

		if ($this->posted_ot !== $v || $v === 0) {
			$this->posted_ot = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::POSTED_OT;
		}

	} 
	
	public function setPostedHa($v)
	{

		if ($this->posted_ha !== $v || $v === 0) {
			$this->posted_ha = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::POSTED_HA;
		}

	} 
	
	public function setTotalOtHours($v)
	{

		if ($this->total_ot_hours !== $v || $v === 0) {
			$this->total_ot_hours = $v;
			$this->modifiedColumns[] = PayrollAuditCompliancePeer::TOTAL_OT_HOURS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->period_code = $rs->getString($startcol + 3);

			$this->basic_pay = $rs->getFloat($startcol + 4);

			$this->ot_amount = $rs->getFloat($startcol + 5);

			$this->ot_compliance_amount = $rs->getFloat($startcol + 6);

			$this->ot_compliance_amount_original_time = $rs->getFloat($startcol + 7);

			$this->allowance = $rs->getFloat($startcol + 8);

			$this->compliance_deduction_amount = $rs->getFloat($startcol + 9);

			$this->compliance_amount = $rs->getFloat($startcol + 10);

			$this->compliance_amount_original_time = $rs->getFloat($startcol + 11);

			$this->paid_amount = $rs->getFloat($startcol + 12);

			$this->mom_compliance_amount = $rs->getFloat($startcol + 13);

			$this->rate_per_hour = $rs->getFloat($startcol + 14);

			$this->total_income = $rs->getFloat($startcol + 15);

			$this->posted_ot = $rs->getFloat($startcol + 16);

			$this->posted_ha = $rs->getFloat($startcol + 17);

			$this->total_ot_hours = $rs->getFloat($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayrollAuditCompliance object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayrollAuditCompliancePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayrollAuditCompliancePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayrollAuditCompliancePeer::DATABASE_NAME);
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
					$pk = PayrollAuditCompliancePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayrollAuditCompliancePeer::doUpdate($this, $con);
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


			if (($retval = PayrollAuditCompliancePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAuditCompliancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOtComplianceAmountOriginalTime();
				break;
			case 8:
				return $this->getAllowance();
				break;
			case 9:
				return $this->getComplianceDeductionAmount();
				break;
			case 10:
				return $this->getComplianceAmount();
				break;
			case 11:
				return $this->getComplianceAmountOriginalTime();
				break;
			case 12:
				return $this->getPaidAmount();
				break;
			case 13:
				return $this->getMomComplianceAmount();
				break;
			case 14:
				return $this->getRatePerHour();
				break;
			case 15:
				return $this->getTotalIncome();
				break;
			case 16:
				return $this->getPostedOt();
				break;
			case 17:
				return $this->getPostedHa();
				break;
			case 18:
				return $this->getTotalOtHours();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAuditCompliancePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getPeriodCode(),
			$keys[4] => $this->getBasicPay(),
			$keys[5] => $this->getOtAmount(),
			$keys[6] => $this->getOtComplianceAmount(),
			$keys[7] => $this->getOtComplianceAmountOriginalTime(),
			$keys[8] => $this->getAllowance(),
			$keys[9] => $this->getComplianceDeductionAmount(),
			$keys[10] => $this->getComplianceAmount(),
			$keys[11] => $this->getComplianceAmountOriginalTime(),
			$keys[12] => $this->getPaidAmount(),
			$keys[13] => $this->getMomComplianceAmount(),
			$keys[14] => $this->getRatePerHour(),
			$keys[15] => $this->getTotalIncome(),
			$keys[16] => $this->getPostedOt(),
			$keys[17] => $this->getPostedHa(),
			$keys[18] => $this->getTotalOtHours(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollAuditCompliancePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOtComplianceAmountOriginalTime($value);
				break;
			case 8:
				$this->setAllowance($value);
				break;
			case 9:
				$this->setComplianceDeductionAmount($value);
				break;
			case 10:
				$this->setComplianceAmount($value);
				break;
			case 11:
				$this->setComplianceAmountOriginalTime($value);
				break;
			case 12:
				$this->setPaidAmount($value);
				break;
			case 13:
				$this->setMomComplianceAmount($value);
				break;
			case 14:
				$this->setRatePerHour($value);
				break;
			case 15:
				$this->setTotalIncome($value);
				break;
			case 16:
				$this->setPostedOt($value);
				break;
			case 17:
				$this->setPostedHa($value);
				break;
			case 18:
				$this->setTotalOtHours($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollAuditCompliancePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPeriodCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBasicPay($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOtAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOtComplianceAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOtComplianceAmountOriginalTime($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAllowance($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setComplianceDeductionAmount($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setComplianceAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setComplianceAmountOriginalTime($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPaidAmount($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMomComplianceAmount($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRatePerHour($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTotalIncome($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPostedOt($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPostedHa($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTotalOtHours($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayrollAuditCompliancePeer::DATABASE_NAME);

		if ($this->isColumnModified(PayrollAuditCompliancePeer::ID)) $criteria->add(PayrollAuditCompliancePeer::ID, $this->id);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::EMPLOYEE_NO)) $criteria->add(PayrollAuditCompliancePeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::NAME)) $criteria->add(PayrollAuditCompliancePeer::NAME, $this->name);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::PERIOD_CODE)) $criteria->add(PayrollAuditCompliancePeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::BASIC_PAY)) $criteria->add(PayrollAuditCompliancePeer::BASIC_PAY, $this->basic_pay);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::OT_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::OT_AMOUNT, $this->ot_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT, $this->ot_compliance_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME)) $criteria->add(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME, $this->ot_compliance_amount_original_time);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::ALLOWANCE)) $criteria->add(PayrollAuditCompliancePeer::ALLOWANCE, $this->allowance);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT, $this->compliance_deduction_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT, $this->compliance_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME)) $criteria->add(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME, $this->compliance_amount_original_time);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::PAID_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::PAID_AMOUNT, $this->paid_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT)) $criteria->add(PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT, $this->mom_compliance_amount);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::RATE_PER_HOUR)) $criteria->add(PayrollAuditCompliancePeer::RATE_PER_HOUR, $this->rate_per_hour);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::TOTAL_INCOME)) $criteria->add(PayrollAuditCompliancePeer::TOTAL_INCOME, $this->total_income);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::POSTED_OT)) $criteria->add(PayrollAuditCompliancePeer::POSTED_OT, $this->posted_ot);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::POSTED_HA)) $criteria->add(PayrollAuditCompliancePeer::POSTED_HA, $this->posted_ha);
		if ($this->isColumnModified(PayrollAuditCompliancePeer::TOTAL_OT_HOURS)) $criteria->add(PayrollAuditCompliancePeer::TOTAL_OT_HOURS, $this->total_ot_hours);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayrollAuditCompliancePeer::DATABASE_NAME);

		$criteria->add(PayrollAuditCompliancePeer::ID, $this->id);

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

		$copyObj->setOtComplianceAmountOriginalTime($this->ot_compliance_amount_original_time);

		$copyObj->setAllowance($this->allowance);

		$copyObj->setComplianceDeductionAmount($this->compliance_deduction_amount);

		$copyObj->setComplianceAmount($this->compliance_amount);

		$copyObj->setComplianceAmountOriginalTime($this->compliance_amount_original_time);

		$copyObj->setPaidAmount($this->paid_amount);

		$copyObj->setMomComplianceAmount($this->mom_compliance_amount);

		$copyObj->setRatePerHour($this->rate_per_hour);

		$copyObj->setTotalIncome($this->total_income);

		$copyObj->setPostedOt($this->posted_ot);

		$copyObj->setPostedHa($this->posted_ha);

		$copyObj->setTotalOtHours($this->total_ot_hours);


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
			self::$peer = new PayrollAuditCompliancePeer();
		}
		return self::$peer;
	}

} 