<?php


abstract class BasePayEmployeeLedgerNano extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name;


	
	protected $department;


	
	protected $company;


	
	protected $frequency;


	
	protected $period_code;


	
	protected $acct_code;


	
	protected $description;


	
	protected $amount = 0;


	
	protected $pay_scheduled_income_id;


	
	protected $pay_scheduled_deduction_id;


	
	protected $income_expense;


	
	protected $acct_source;


	
	protected $processed_as;


	
	protected $tax_code;


	
	protected $taxable_amount;


	
	protected $cpf_total = 0;


	
	protected $cpf_er = 0;


	
	protected $is_payslip_printed;


	
	protected $race;


	
	protected $bank_cash;


	
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

	
	public function getEmployeeNo()
	{

		return $this->employee_no;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getDepartment()
	{

		return $this->department;
	}

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getFrequency()
	{

		return $this->frequency;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getAcctCode()
	{

		return $this->acct_code;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getPayScheduledIncomeId()
	{

		return $this->pay_scheduled_income_id;
	}

	
	public function getPayScheduledDeductionId()
	{

		return $this->pay_scheduled_deduction_id;
	}

	
	public function getIncomeExpense()
	{

		return $this->income_expense;
	}

	
	public function getAcctSource()
	{

		return $this->acct_source;
	}

	
	public function getProcessedAs()
	{

		return $this->processed_as;
	}

	
	public function getTaxCode()
	{

		return $this->tax_code;
	}

	
	public function getTaxableAmount()
	{

		return $this->taxable_amount;
	}

	
	public function getCpfTotal()
	{

		return $this->cpf_total;
	}

	
	public function getCpfEr()
	{

		return $this->cpf_er;
	}

	
	public function getIsPayslipPrinted()
	{

		return $this->is_payslip_printed;
	}

	
	public function getRace()
	{

		return $this->race;
	}

	
	public function getBankCash()
	{

		return $this->bank_cash;
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
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::NAME;
		}

	} 
	
	public function setDepartment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->department !== $v) {
			$this->department = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::DEPARTMENT;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::COMPANY;
		}

	} 
	
	public function setFrequency($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->frequency !== $v) {
			$this->frequency = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::FREQUENCY;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::PERIOD_CODE;
		}

	} 
	
	public function setAcctCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_code !== $v) {
			$this->acct_code = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::ACCT_CODE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::DESCRIPTION;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::AMOUNT;
		}

	} 
	
	public function setPayScheduledIncomeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pay_scheduled_income_id !== $v) {
			$this->pay_scheduled_income_id = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID;
		}

	} 
	
	public function setPayScheduledDeductionId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pay_scheduled_deduction_id !== $v) {
			$this->pay_scheduled_deduction_id = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID;
		}

	} 
	
	public function setIncomeExpense($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->income_expense !== $v) {
			$this->income_expense = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::INCOME_EXPENSE;
		}

	} 
	
	public function setAcctSource($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acct_source !== $v) {
			$this->acct_source = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::ACCT_SOURCE;
		}

	} 
	
	public function setProcessedAs($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->processed_as !== $v) {
			$this->processed_as = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::PROCESSED_AS;
		}

	} 
	
	public function setTaxCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tax_code !== $v) {
			$this->tax_code = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::TAX_CODE;
		}

	} 
	
	public function setTaxableAmount($v)
	{

		if ($this->taxable_amount !== $v) {
			$this->taxable_amount = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT;
		}

	} 
	
	public function setCpfTotal($v)
	{

		if ($this->cpf_total !== $v || $v === 0) {
			$this->cpf_total = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::CPF_TOTAL;
		}

	} 
	
	public function setCpfEr($v)
	{

		if ($this->cpf_er !== $v || $v === 0) {
			$this->cpf_er = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::CPF_ER;
		}

	} 
	
	public function setIsPayslipPrinted($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_payslip_printed !== $v) {
			$this->is_payslip_printed = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED;
		}

	} 
	
	public function setRace($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->race !== $v) {
			$this->race = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::RACE;
		}

	} 
	
	public function setBankCash($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_cash !== $v) {
			$this->bank_cash = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::BANK_CASH;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::CREATED_BY;
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
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayEmployeeLedgerNanoPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->department = $rs->getString($startcol + 3);

			$this->company = $rs->getString($startcol + 4);

			$this->frequency = $rs->getString($startcol + 5);

			$this->period_code = $rs->getString($startcol + 6);

			$this->acct_code = $rs->getString($startcol + 7);

			$this->description = $rs->getString($startcol + 8);

			$this->amount = $rs->getFloat($startcol + 9);

			$this->pay_scheduled_income_id = $rs->getString($startcol + 10);

			$this->pay_scheduled_deduction_id = $rs->getString($startcol + 11);

			$this->income_expense = $rs->getInt($startcol + 12);

			$this->acct_source = $rs->getString($startcol + 13);

			$this->processed_as = $rs->getString($startcol + 14);

			$this->tax_code = $rs->getString($startcol + 15);

			$this->taxable_amount = $rs->getFloat($startcol + 16);

			$this->cpf_total = $rs->getFloat($startcol + 17);

			$this->cpf_er = $rs->getFloat($startcol + 18);

			$this->is_payslip_printed = $rs->getString($startcol + 19);

			$this->race = $rs->getString($startcol + 20);

			$this->bank_cash = $rs->getString($startcol + 21);

			$this->created_by = $rs->getString($startcol + 22);

			$this->date_created = $rs->getTimestamp($startcol + 23, null);

			$this->modified_by = $rs->getString($startcol + 24);

			$this->date_modified = $rs->getTimestamp($startcol + 25, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 26; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayEmployeeLedgerNano object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayEmployeeLedgerNanoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayEmployeeLedgerNanoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayEmployeeLedgerNanoPeer::DATABASE_NAME);
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
					$pk = PayEmployeeLedgerNanoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayEmployeeLedgerNanoPeer::doUpdate($this, $con);
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


			if (($retval = PayEmployeeLedgerNanoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeLedgerNanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDepartment();
				break;
			case 4:
				return $this->getCompany();
				break;
			case 5:
				return $this->getFrequency();
				break;
			case 6:
				return $this->getPeriodCode();
				break;
			case 7:
				return $this->getAcctCode();
				break;
			case 8:
				return $this->getDescription();
				break;
			case 9:
				return $this->getAmount();
				break;
			case 10:
				return $this->getPayScheduledIncomeId();
				break;
			case 11:
				return $this->getPayScheduledDeductionId();
				break;
			case 12:
				return $this->getIncomeExpense();
				break;
			case 13:
				return $this->getAcctSource();
				break;
			case 14:
				return $this->getProcessedAs();
				break;
			case 15:
				return $this->getTaxCode();
				break;
			case 16:
				return $this->getTaxableAmount();
				break;
			case 17:
				return $this->getCpfTotal();
				break;
			case 18:
				return $this->getCpfEr();
				break;
			case 19:
				return $this->getIsPayslipPrinted();
				break;
			case 20:
				return $this->getRace();
				break;
			case 21:
				return $this->getBankCash();
				break;
			case 22:
				return $this->getCreatedBy();
				break;
			case 23:
				return $this->getDateCreated();
				break;
			case 24:
				return $this->getModifiedBy();
				break;
			case 25:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeLedgerNanoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getDepartment(),
			$keys[4] => $this->getCompany(),
			$keys[5] => $this->getFrequency(),
			$keys[6] => $this->getPeriodCode(),
			$keys[7] => $this->getAcctCode(),
			$keys[8] => $this->getDescription(),
			$keys[9] => $this->getAmount(),
			$keys[10] => $this->getPayScheduledIncomeId(),
			$keys[11] => $this->getPayScheduledDeductionId(),
			$keys[12] => $this->getIncomeExpense(),
			$keys[13] => $this->getAcctSource(),
			$keys[14] => $this->getProcessedAs(),
			$keys[15] => $this->getTaxCode(),
			$keys[16] => $this->getTaxableAmount(),
			$keys[17] => $this->getCpfTotal(),
			$keys[18] => $this->getCpfEr(),
			$keys[19] => $this->getIsPayslipPrinted(),
			$keys[20] => $this->getRace(),
			$keys[21] => $this->getBankCash(),
			$keys[22] => $this->getCreatedBy(),
			$keys[23] => $this->getDateCreated(),
			$keys[24] => $this->getModifiedBy(),
			$keys[25] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeLedgerNanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDepartment($value);
				break;
			case 4:
				$this->setCompany($value);
				break;
			case 5:
				$this->setFrequency($value);
				break;
			case 6:
				$this->setPeriodCode($value);
				break;
			case 7:
				$this->setAcctCode($value);
				break;
			case 8:
				$this->setDescription($value);
				break;
			case 9:
				$this->setAmount($value);
				break;
			case 10:
				$this->setPayScheduledIncomeId($value);
				break;
			case 11:
				$this->setPayScheduledDeductionId($value);
				break;
			case 12:
				$this->setIncomeExpense($value);
				break;
			case 13:
				$this->setAcctSource($value);
				break;
			case 14:
				$this->setProcessedAs($value);
				break;
			case 15:
				$this->setTaxCode($value);
				break;
			case 16:
				$this->setTaxableAmount($value);
				break;
			case 17:
				$this->setCpfTotal($value);
				break;
			case 18:
				$this->setCpfEr($value);
				break;
			case 19:
				$this->setIsPayslipPrinted($value);
				break;
			case 20:
				$this->setRace($value);
				break;
			case 21:
				$this->setBankCash($value);
				break;
			case 22:
				$this->setCreatedBy($value);
				break;
			case 23:
				$this->setDateCreated($value);
				break;
			case 24:
				$this->setModifiedBy($value);
				break;
			case 25:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeLedgerNanoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDepartment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCompany($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFrequency($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPeriodCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAcctCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDescription($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAmount($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPayScheduledIncomeId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPayScheduledDeductionId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIncomeExpense($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAcctSource($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setProcessedAs($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTaxCode($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTaxableAmount($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCpfTotal($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCpfEr($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setIsPayslipPrinted($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setRace($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setBankCash($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCreatedBy($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDateCreated($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setModifiedBy($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDateModified($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayEmployeeLedgerNanoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::ID)) $criteria->add(PayEmployeeLedgerNanoPeer::ID, $this->id);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO)) $criteria->add(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::NAME)) $criteria->add(PayEmployeeLedgerNanoPeer::NAME, $this->name);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::DEPARTMENT)) $criteria->add(PayEmployeeLedgerNanoPeer::DEPARTMENT, $this->department);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::COMPANY)) $criteria->add(PayEmployeeLedgerNanoPeer::COMPANY, $this->company);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::FREQUENCY)) $criteria->add(PayEmployeeLedgerNanoPeer::FREQUENCY, $this->frequency);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::PERIOD_CODE)) $criteria->add(PayEmployeeLedgerNanoPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::ACCT_CODE)) $criteria->add(PayEmployeeLedgerNanoPeer::ACCT_CODE, $this->acct_code);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::DESCRIPTION)) $criteria->add(PayEmployeeLedgerNanoPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::AMOUNT)) $criteria->add(PayEmployeeLedgerNanoPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID)) $criteria->add(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID, $this->pay_scheduled_income_id);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID)) $criteria->add(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID, $this->pay_scheduled_deduction_id);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::INCOME_EXPENSE)) $criteria->add(PayEmployeeLedgerNanoPeer::INCOME_EXPENSE, $this->income_expense);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::ACCT_SOURCE)) $criteria->add(PayEmployeeLedgerNanoPeer::ACCT_SOURCE, $this->acct_source);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::PROCESSED_AS)) $criteria->add(PayEmployeeLedgerNanoPeer::PROCESSED_AS, $this->processed_as);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::TAX_CODE)) $criteria->add(PayEmployeeLedgerNanoPeer::TAX_CODE, $this->tax_code);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT)) $criteria->add(PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT, $this->taxable_amount);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::CPF_TOTAL)) $criteria->add(PayEmployeeLedgerNanoPeer::CPF_TOTAL, $this->cpf_total);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::CPF_ER)) $criteria->add(PayEmployeeLedgerNanoPeer::CPF_ER, $this->cpf_er);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED)) $criteria->add(PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED, $this->is_payslip_printed);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::RACE)) $criteria->add(PayEmployeeLedgerNanoPeer::RACE, $this->race);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::BANK_CASH)) $criteria->add(PayEmployeeLedgerNanoPeer::BANK_CASH, $this->bank_cash);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::CREATED_BY)) $criteria->add(PayEmployeeLedgerNanoPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::DATE_CREATED)) $criteria->add(PayEmployeeLedgerNanoPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::MODIFIED_BY)) $criteria->add(PayEmployeeLedgerNanoPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayEmployeeLedgerNanoPeer::DATE_MODIFIED)) $criteria->add(PayEmployeeLedgerNanoPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayEmployeeLedgerNanoPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLedgerNanoPeer::ID, $this->id);

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

		$copyObj->setDepartment($this->department);

		$copyObj->setCompany($this->company);

		$copyObj->setFrequency($this->frequency);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setAcctCode($this->acct_code);

		$copyObj->setDescription($this->description);

		$copyObj->setAmount($this->amount);

		$copyObj->setPayScheduledIncomeId($this->pay_scheduled_income_id);

		$copyObj->setPayScheduledDeductionId($this->pay_scheduled_deduction_id);

		$copyObj->setIncomeExpense($this->income_expense);

		$copyObj->setAcctSource($this->acct_source);

		$copyObj->setProcessedAs($this->processed_as);

		$copyObj->setTaxCode($this->tax_code);

		$copyObj->setTaxableAmount($this->taxable_amount);

		$copyObj->setCpfTotal($this->cpf_total);

		$copyObj->setCpfEr($this->cpf_er);

		$copyObj->setIsPayslipPrinted($this->is_payslip_printed);

		$copyObj->setRace($this->race);

		$copyObj->setBankCash($this->bank_cash);

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
			self::$peer = new PayEmployeeLedgerNanoPeer();
		}
		return self::$peer;
	}

} 