<?php


abstract class BasePayrollProcess extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $period_code = 'null';


	
	protected $employee_data = 'null';


	
	protected $emp_leave = 'null';


	
	protected $attendance = 'null';


	
	protected $income = 'null';


	
	protected $deduction = 'null';


	
	protected $deficiency = 'null';


	
	protected $payslip = 'null';


	
	protected $manual = 'null';


	
	protected $levy_contribution = 'null';


	
	protected $closed = 'null';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getEmployeeData()
	{

		return $this->employee_data;
	}

	
	public function getEmpLeave()
	{

		return $this->emp_leave;
	}

	
	public function getAttendance()
	{

		return $this->attendance;
	}

	
	public function getIncome()
	{

		return $this->income;
	}

	
	public function getDeduction()
	{

		return $this->deduction;
	}

	
	public function getDeficiency()
	{

		return $this->deficiency;
	}

	
	public function getPayslip()
	{

		return $this->payslip;
	}

	
	public function getManual()
	{

		return $this->manual;
	}

	
	public function getLevyContribution()
	{

		return $this->levy_contribution;
	}

	
	public function getClosed()
	{

		return $this->closed;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::ID;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v || $v === 'null') {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::PERIOD_CODE;
		}

	} 
	
	public function setEmployeeData($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_data !== $v || $v === 'null') {
			$this->employee_data = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::EMPLOYEE_DATA;
		}

	} 
	
	public function setEmpLeave($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->emp_leave !== $v || $v === 'null') {
			$this->emp_leave = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::EMP_LEAVE;
		}

	} 
	
	public function setAttendance($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->attendance !== $v || $v === 'null') {
			$this->attendance = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::ATTENDANCE;
		}

	} 
	
	public function setIncome($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->income !== $v || $v === 'null') {
			$this->income = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::INCOME;
		}

	} 
	
	public function setDeduction($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deduction !== $v || $v === 'null') {
			$this->deduction = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::DEDUCTION;
		}

	} 
	
	public function setDeficiency($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deficiency !== $v || $v === 'null') {
			$this->deficiency = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::DEFICIENCY;
		}

	} 
	
	public function setPayslip($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payslip !== $v || $v === 'null') {
			$this->payslip = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::PAYSLIP;
		}

	} 
	
	public function setManual($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->manual !== $v || $v === 'null') {
			$this->manual = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::MANUAL;
		}

	} 
	
	public function setLevyContribution($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->levy_contribution !== $v || $v === 'null') {
			$this->levy_contribution = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::LEVY_CONTRIBUTION;
		}

	} 
	
	public function setClosed($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->closed !== $v || $v === 'null') {
			$this->closed = $v;
			$this->modifiedColumns[] = PayrollProcessPeer::CLOSED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->period_code = $rs->getString($startcol + 1);

			$this->employee_data = $rs->getString($startcol + 2);

			$this->emp_leave = $rs->getString($startcol + 3);

			$this->attendance = $rs->getString($startcol + 4);

			$this->income = $rs->getString($startcol + 5);

			$this->deduction = $rs->getString($startcol + 6);

			$this->deficiency = $rs->getString($startcol + 7);

			$this->payslip = $rs->getString($startcol + 8);

			$this->manual = $rs->getString($startcol + 9);

			$this->levy_contribution = $rs->getString($startcol + 10);

			$this->closed = $rs->getString($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayrollProcess object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayrollProcessPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayrollProcessPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayrollProcessPeer::DATABASE_NAME);
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
					$pk = PayrollProcessPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayrollProcessPeer::doUpdate($this, $con);
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


			if (($retval = PayrollProcessPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollProcessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPeriodCode();
				break;
			case 2:
				return $this->getEmployeeData();
				break;
			case 3:
				return $this->getEmpLeave();
				break;
			case 4:
				return $this->getAttendance();
				break;
			case 5:
				return $this->getIncome();
				break;
			case 6:
				return $this->getDeduction();
				break;
			case 7:
				return $this->getDeficiency();
				break;
			case 8:
				return $this->getPayslip();
				break;
			case 9:
				return $this->getManual();
				break;
			case 10:
				return $this->getLevyContribution();
				break;
			case 11:
				return $this->getClosed();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollProcessPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPeriodCode(),
			$keys[2] => $this->getEmployeeData(),
			$keys[3] => $this->getEmpLeave(),
			$keys[4] => $this->getAttendance(),
			$keys[5] => $this->getIncome(),
			$keys[6] => $this->getDeduction(),
			$keys[7] => $this->getDeficiency(),
			$keys[8] => $this->getPayslip(),
			$keys[9] => $this->getManual(),
			$keys[10] => $this->getLevyContribution(),
			$keys[11] => $this->getClosed(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayrollProcessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPeriodCode($value);
				break;
			case 2:
				$this->setEmployeeData($value);
				break;
			case 3:
				$this->setEmpLeave($value);
				break;
			case 4:
				$this->setAttendance($value);
				break;
			case 5:
				$this->setIncome($value);
				break;
			case 6:
				$this->setDeduction($value);
				break;
			case 7:
				$this->setDeficiency($value);
				break;
			case 8:
				$this->setPayslip($value);
				break;
			case 9:
				$this->setManual($value);
				break;
			case 10:
				$this->setLevyContribution($value);
				break;
			case 11:
				$this->setClosed($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayrollProcessPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPeriodCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmployeeData($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmpLeave($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAttendance($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIncome($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeduction($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeficiency($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPayslip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setManual($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLevyContribution($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setClosed($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayrollProcessPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayrollProcessPeer::ID)) $criteria->add(PayrollProcessPeer::ID, $this->id);
		if ($this->isColumnModified(PayrollProcessPeer::PERIOD_CODE)) $criteria->add(PayrollProcessPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayrollProcessPeer::EMPLOYEE_DATA)) $criteria->add(PayrollProcessPeer::EMPLOYEE_DATA, $this->employee_data);
		if ($this->isColumnModified(PayrollProcessPeer::EMP_LEAVE)) $criteria->add(PayrollProcessPeer::EMP_LEAVE, $this->emp_leave);
		if ($this->isColumnModified(PayrollProcessPeer::ATTENDANCE)) $criteria->add(PayrollProcessPeer::ATTENDANCE, $this->attendance);
		if ($this->isColumnModified(PayrollProcessPeer::INCOME)) $criteria->add(PayrollProcessPeer::INCOME, $this->income);
		if ($this->isColumnModified(PayrollProcessPeer::DEDUCTION)) $criteria->add(PayrollProcessPeer::DEDUCTION, $this->deduction);
		if ($this->isColumnModified(PayrollProcessPeer::DEFICIENCY)) $criteria->add(PayrollProcessPeer::DEFICIENCY, $this->deficiency);
		if ($this->isColumnModified(PayrollProcessPeer::PAYSLIP)) $criteria->add(PayrollProcessPeer::PAYSLIP, $this->payslip);
		if ($this->isColumnModified(PayrollProcessPeer::MANUAL)) $criteria->add(PayrollProcessPeer::MANUAL, $this->manual);
		if ($this->isColumnModified(PayrollProcessPeer::LEVY_CONTRIBUTION)) $criteria->add(PayrollProcessPeer::LEVY_CONTRIBUTION, $this->levy_contribution);
		if ($this->isColumnModified(PayrollProcessPeer::CLOSED)) $criteria->add(PayrollProcessPeer::CLOSED, $this->closed);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayrollProcessPeer::DATABASE_NAME);

		$criteria->add(PayrollProcessPeer::ID, $this->id);

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

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setEmployeeData($this->employee_data);

		$copyObj->setEmpLeave($this->emp_leave);

		$copyObj->setAttendance($this->attendance);

		$copyObj->setIncome($this->income);

		$copyObj->setDeduction($this->deduction);

		$copyObj->setDeficiency($this->deficiency);

		$copyObj->setPayslip($this->payslip);

		$copyObj->setManual($this->manual);

		$copyObj->setLevyContribution($this->levy_contribution);

		$copyObj->setClosed($this->closed);


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
			self::$peer = new PayrollProcessPeer();
		}
		return self::$peer;
	}

} 