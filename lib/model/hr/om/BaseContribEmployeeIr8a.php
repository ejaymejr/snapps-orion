<?php


abstract class BaseContribEmployeeIr8a extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $company;


	
	protected $period_code;


	
	protected $nationality;


	
	protected $nationality_code;


	
	protected $address;


	
	protected $from;


	
	protected $to;


	
	protected $amount;


	
	protected $mbf;


	
	protected $donation;


	
	protected $cpf;


	
	protected $insurance;


	
	protected $salary;


	
	protected $bonus;


	
	protected $directors_fee;


	
	protected $other_fee;


	
	protected $commission;


	
	protected $transport_allowance;


	
	protected $entertainment;


	
	protected $other_allowance;


	
	protected $gross_inc;


	
	protected $gross_ded;


	
	protected $cpf_em;


	
	protected $cpf_er;


	
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

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getNationality()
	{

		return $this->nationality;
	}

	
	public function getNationalityCode()
	{

		return $this->nationality_code;
	}

	
	public function getAddress()
	{

		return $this->address;
	}

	
	public function getFrom($format = 'Y-m-d')
	{

		if ($this->from === null || $this->from === '') {
			return null;
		} elseif (!is_int($this->from)) {
						$ts = strtotime($this->from);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [from] as date/time value: " . var_export($this->from, true));
			}
		} else {
			$ts = $this->from;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTo($format = 'Y-m-d')
	{

		if ($this->to === null || $this->to === '') {
			return null;
		} elseif (!is_int($this->to)) {
						$ts = strtotime($this->to);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [to] as date/time value: " . var_export($this->to, true));
			}
		} else {
			$ts = $this->to;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getMbf()
	{

		return $this->mbf;
	}

	
	public function getDonation()
	{

		return $this->donation;
	}

	
	public function getCpf()
	{

		return $this->cpf;
	}

	
	public function getInsurance()
	{

		return $this->insurance;
	}

	
	public function getSalary()
	{

		return $this->salary;
	}

	
	public function getBonus()
	{

		return $this->bonus;
	}

	
	public function getDirectorsFee()
	{

		return $this->directors_fee;
	}

	
	public function getOtherFee()
	{

		return $this->other_fee;
	}

	
	public function getCommission()
	{

		return $this->commission;
	}

	
	public function getTransportAllowance()
	{

		return $this->transport_allowance;
	}

	
	public function getEntertainment()
	{

		return $this->entertainment;
	}

	
	public function getOtherAllowance()
	{

		return $this->other_allowance;
	}

	
	public function getGrossInc()
	{

		return $this->gross_inc;
	}

	
	public function getGrossDed()
	{

		return $this->gross_ded;
	}

	
	public function getCpfEm()
	{

		return $this->cpf_em;
	}

	
	public function getCpfEr()
	{

		return $this->cpf_er;
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

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::NAME;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::COMPANY;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::PERIOD_CODE;
		}

	} 
	
	public function setNationality($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nationality !== $v) {
			$this->nationality = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::NATIONALITY;
		}

	} 
	
	public function setNationalityCode($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nationality_code !== $v) {
			$this->nationality_code = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::NATIONALITY_CODE;
		}

	} 
	
	public function setAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::ADDRESS;
		}

	} 
	
	public function setFrom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [from] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->from !== $ts) {
			$this->from = $ts;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::FROM;
		}

	} 
	
	public function setTo($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [to] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->to !== $ts) {
			$this->to = $ts;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::TO;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::AMOUNT;
		}

	} 
	
	public function setMbf($v)
	{

		if ($this->mbf !== $v) {
			$this->mbf = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::MBF;
		}

	} 
	
	public function setDonation($v)
	{

		if ($this->donation !== $v) {
			$this->donation = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::DONATION;
		}

	} 
	
	public function setCpf($v)
	{

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::CPF;
		}

	} 
	
	public function setInsurance($v)
	{

		if ($this->insurance !== $v) {
			$this->insurance = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::INSURANCE;
		}

	} 
	
	public function setSalary($v)
	{

		if ($this->salary !== $v) {
			$this->salary = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::SALARY;
		}

	} 
	
	public function setBonus($v)
	{

		if ($this->bonus !== $v) {
			$this->bonus = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::BONUS;
		}

	} 
	
	public function setDirectorsFee($v)
	{

		if ($this->directors_fee !== $v) {
			$this->directors_fee = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::DIRECTORS_FEE;
		}

	} 
	
	public function setOtherFee($v)
	{

		if ($this->other_fee !== $v) {
			$this->other_fee = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::OTHER_FEE;
		}

	} 
	
	public function setCommission($v)
	{

		if ($this->commission !== $v) {
			$this->commission = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::COMMISSION;
		}

	} 
	
	public function setTransportAllowance($v)
	{

		if ($this->transport_allowance !== $v) {
			$this->transport_allowance = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE;
		}

	} 
	
	public function setEntertainment($v)
	{

		if ($this->entertainment !== $v) {
			$this->entertainment = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::ENTERTAINMENT;
		}

	} 
	
	public function setOtherAllowance($v)
	{

		if ($this->other_allowance !== $v) {
			$this->other_allowance = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::OTHER_ALLOWANCE;
		}

	} 
	
	public function setGrossInc($v)
	{

		if ($this->gross_inc !== $v) {
			$this->gross_inc = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::GROSS_INC;
		}

	} 
	
	public function setGrossDed($v)
	{

		if ($this->gross_ded !== $v) {
			$this->gross_ded = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::GROSS_DED;
		}

	} 
	
	public function setCpfEm($v)
	{

		if ($this->cpf_em !== $v) {
			$this->cpf_em = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::CPF_EM;
		}

	} 
	
	public function setCpfEr($v)
	{

		if ($this->cpf_er !== $v) {
			$this->cpf_er = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::CPF_ER;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = ContribEmployeeIr8aPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->company = $rs->getString($startcol + 3);

			$this->period_code = $rs->getString($startcol + 4);

			$this->nationality = $rs->getString($startcol + 5);

			$this->nationality_code = $rs->getInt($startcol + 6);

			$this->address = $rs->getString($startcol + 7);

			$this->from = $rs->getDate($startcol + 8, null);

			$this->to = $rs->getDate($startcol + 9, null);

			$this->amount = $rs->getFloat($startcol + 10);

			$this->mbf = $rs->getFloat($startcol + 11);

			$this->donation = $rs->getFloat($startcol + 12);

			$this->cpf = $rs->getFloat($startcol + 13);

			$this->insurance = $rs->getFloat($startcol + 14);

			$this->salary = $rs->getFloat($startcol + 15);

			$this->bonus = $rs->getFloat($startcol + 16);

			$this->directors_fee = $rs->getFloat($startcol + 17);

			$this->other_fee = $rs->getFloat($startcol + 18);

			$this->commission = $rs->getFloat($startcol + 19);

			$this->transport_allowance = $rs->getFloat($startcol + 20);

			$this->entertainment = $rs->getFloat($startcol + 21);

			$this->other_allowance = $rs->getFloat($startcol + 22);

			$this->gross_inc = $rs->getFloat($startcol + 23);

			$this->gross_ded = $rs->getFloat($startcol + 24);

			$this->cpf_em = $rs->getFloat($startcol + 25);

			$this->cpf_er = $rs->getFloat($startcol + 26);

			$this->created_by = $rs->getString($startcol + 27);

			$this->date_created = $rs->getTimestamp($startcol + 28, null);

			$this->modified_by = $rs->getString($startcol + 29);

			$this->date_modified = $rs->getTimestamp($startcol + 30, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 31; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ContribEmployeeIr8a object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContribEmployeeIr8aPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContribEmployeeIr8aPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContribEmployeeIr8aPeer::DATABASE_NAME);
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
					$pk = ContribEmployeeIr8aPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContribEmployeeIr8aPeer::doUpdate($this, $con);
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


			if (($retval = ContribEmployeeIr8aPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContribEmployeeIr8aPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCompany();
				break;
			case 4:
				return $this->getPeriodCode();
				break;
			case 5:
				return $this->getNationality();
				break;
			case 6:
				return $this->getNationalityCode();
				break;
			case 7:
				return $this->getAddress();
				break;
			case 8:
				return $this->getFrom();
				break;
			case 9:
				return $this->getTo();
				break;
			case 10:
				return $this->getAmount();
				break;
			case 11:
				return $this->getMbf();
				break;
			case 12:
				return $this->getDonation();
				break;
			case 13:
				return $this->getCpf();
				break;
			case 14:
				return $this->getInsurance();
				break;
			case 15:
				return $this->getSalary();
				break;
			case 16:
				return $this->getBonus();
				break;
			case 17:
				return $this->getDirectorsFee();
				break;
			case 18:
				return $this->getOtherFee();
				break;
			case 19:
				return $this->getCommission();
				break;
			case 20:
				return $this->getTransportAllowance();
				break;
			case 21:
				return $this->getEntertainment();
				break;
			case 22:
				return $this->getOtherAllowance();
				break;
			case 23:
				return $this->getGrossInc();
				break;
			case 24:
				return $this->getGrossDed();
				break;
			case 25:
				return $this->getCpfEm();
				break;
			case 26:
				return $this->getCpfEr();
				break;
			case 27:
				return $this->getCreatedBy();
				break;
			case 28:
				return $this->getDateCreated();
				break;
			case 29:
				return $this->getModifiedBy();
				break;
			case 30:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContribEmployeeIr8aPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getCompany(),
			$keys[4] => $this->getPeriodCode(),
			$keys[5] => $this->getNationality(),
			$keys[6] => $this->getNationalityCode(),
			$keys[7] => $this->getAddress(),
			$keys[8] => $this->getFrom(),
			$keys[9] => $this->getTo(),
			$keys[10] => $this->getAmount(),
			$keys[11] => $this->getMbf(),
			$keys[12] => $this->getDonation(),
			$keys[13] => $this->getCpf(),
			$keys[14] => $this->getInsurance(),
			$keys[15] => $this->getSalary(),
			$keys[16] => $this->getBonus(),
			$keys[17] => $this->getDirectorsFee(),
			$keys[18] => $this->getOtherFee(),
			$keys[19] => $this->getCommission(),
			$keys[20] => $this->getTransportAllowance(),
			$keys[21] => $this->getEntertainment(),
			$keys[22] => $this->getOtherAllowance(),
			$keys[23] => $this->getGrossInc(),
			$keys[24] => $this->getGrossDed(),
			$keys[25] => $this->getCpfEm(),
			$keys[26] => $this->getCpfEr(),
			$keys[27] => $this->getCreatedBy(),
			$keys[28] => $this->getDateCreated(),
			$keys[29] => $this->getModifiedBy(),
			$keys[30] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContribEmployeeIr8aPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCompany($value);
				break;
			case 4:
				$this->setPeriodCode($value);
				break;
			case 5:
				$this->setNationality($value);
				break;
			case 6:
				$this->setNationalityCode($value);
				break;
			case 7:
				$this->setAddress($value);
				break;
			case 8:
				$this->setFrom($value);
				break;
			case 9:
				$this->setTo($value);
				break;
			case 10:
				$this->setAmount($value);
				break;
			case 11:
				$this->setMbf($value);
				break;
			case 12:
				$this->setDonation($value);
				break;
			case 13:
				$this->setCpf($value);
				break;
			case 14:
				$this->setInsurance($value);
				break;
			case 15:
				$this->setSalary($value);
				break;
			case 16:
				$this->setBonus($value);
				break;
			case 17:
				$this->setDirectorsFee($value);
				break;
			case 18:
				$this->setOtherFee($value);
				break;
			case 19:
				$this->setCommission($value);
				break;
			case 20:
				$this->setTransportAllowance($value);
				break;
			case 21:
				$this->setEntertainment($value);
				break;
			case 22:
				$this->setOtherAllowance($value);
				break;
			case 23:
				$this->setGrossInc($value);
				break;
			case 24:
				$this->setGrossDed($value);
				break;
			case 25:
				$this->setCpfEm($value);
				break;
			case 26:
				$this->setCpfEr($value);
				break;
			case 27:
				$this->setCreatedBy($value);
				break;
			case 28:
				$this->setDateCreated($value);
				break;
			case 29:
				$this->setModifiedBy($value);
				break;
			case 30:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContribEmployeeIr8aPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCompany($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPeriodCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNationality($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNationalityCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAddress($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFrom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMbf($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDonation($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCpf($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInsurance($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSalary($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBonus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDirectorsFee($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setOtherFee($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCommission($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTransportAllowance($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setEntertainment($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOtherAllowance($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setGrossInc($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setGrossDed($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCpfEm($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCpfEr($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCreatedBy($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDateCreated($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setModifiedBy($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setDateModified($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContribEmployeeIr8aPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContribEmployeeIr8aPeer::ID)) $criteria->add(ContribEmployeeIr8aPeer::ID, $this->id);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::EMPLOYEE_NO)) $criteria->add(ContribEmployeeIr8aPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::NAME)) $criteria->add(ContribEmployeeIr8aPeer::NAME, $this->name);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::COMPANY)) $criteria->add(ContribEmployeeIr8aPeer::COMPANY, $this->company);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::PERIOD_CODE)) $criteria->add(ContribEmployeeIr8aPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::NATIONALITY)) $criteria->add(ContribEmployeeIr8aPeer::NATIONALITY, $this->nationality);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::NATIONALITY_CODE)) $criteria->add(ContribEmployeeIr8aPeer::NATIONALITY_CODE, $this->nationality_code);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::ADDRESS)) $criteria->add(ContribEmployeeIr8aPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::FROM)) $criteria->add(ContribEmployeeIr8aPeer::FROM, $this->from);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::TO)) $criteria->add(ContribEmployeeIr8aPeer::TO, $this->to);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::AMOUNT)) $criteria->add(ContribEmployeeIr8aPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::MBF)) $criteria->add(ContribEmployeeIr8aPeer::MBF, $this->mbf);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::DONATION)) $criteria->add(ContribEmployeeIr8aPeer::DONATION, $this->donation);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::CPF)) $criteria->add(ContribEmployeeIr8aPeer::CPF, $this->cpf);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::INSURANCE)) $criteria->add(ContribEmployeeIr8aPeer::INSURANCE, $this->insurance);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::SALARY)) $criteria->add(ContribEmployeeIr8aPeer::SALARY, $this->salary);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::BONUS)) $criteria->add(ContribEmployeeIr8aPeer::BONUS, $this->bonus);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::DIRECTORS_FEE)) $criteria->add(ContribEmployeeIr8aPeer::DIRECTORS_FEE, $this->directors_fee);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::OTHER_FEE)) $criteria->add(ContribEmployeeIr8aPeer::OTHER_FEE, $this->other_fee);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::COMMISSION)) $criteria->add(ContribEmployeeIr8aPeer::COMMISSION, $this->commission);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE)) $criteria->add(ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE, $this->transport_allowance);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::ENTERTAINMENT)) $criteria->add(ContribEmployeeIr8aPeer::ENTERTAINMENT, $this->entertainment);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::OTHER_ALLOWANCE)) $criteria->add(ContribEmployeeIr8aPeer::OTHER_ALLOWANCE, $this->other_allowance);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::GROSS_INC)) $criteria->add(ContribEmployeeIr8aPeer::GROSS_INC, $this->gross_inc);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::GROSS_DED)) $criteria->add(ContribEmployeeIr8aPeer::GROSS_DED, $this->gross_ded);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::CPF_EM)) $criteria->add(ContribEmployeeIr8aPeer::CPF_EM, $this->cpf_em);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::CPF_ER)) $criteria->add(ContribEmployeeIr8aPeer::CPF_ER, $this->cpf_er);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::CREATED_BY)) $criteria->add(ContribEmployeeIr8aPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::DATE_CREATED)) $criteria->add(ContribEmployeeIr8aPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::MODIFIED_BY)) $criteria->add(ContribEmployeeIr8aPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(ContribEmployeeIr8aPeer::DATE_MODIFIED)) $criteria->add(ContribEmployeeIr8aPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContribEmployeeIr8aPeer::DATABASE_NAME);

		$criteria->add(ContribEmployeeIr8aPeer::ID, $this->id);

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

		$copyObj->setCompany($this->company);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setNationality($this->nationality);

		$copyObj->setNationalityCode($this->nationality_code);

		$copyObj->setAddress($this->address);

		$copyObj->setFrom($this->from);

		$copyObj->setTo($this->to);

		$copyObj->setAmount($this->amount);

		$copyObj->setMbf($this->mbf);

		$copyObj->setDonation($this->donation);

		$copyObj->setCpf($this->cpf);

		$copyObj->setInsurance($this->insurance);

		$copyObj->setSalary($this->salary);

		$copyObj->setBonus($this->bonus);

		$copyObj->setDirectorsFee($this->directors_fee);

		$copyObj->setOtherFee($this->other_fee);

		$copyObj->setCommission($this->commission);

		$copyObj->setTransportAllowance($this->transport_allowance);

		$copyObj->setEntertainment($this->entertainment);

		$copyObj->setOtherAllowance($this->other_allowance);

		$copyObj->setGrossInc($this->gross_inc);

		$copyObj->setGrossDed($this->gross_ded);

		$copyObj->setCpfEm($this->cpf_em);

		$copyObj->setCpfEr($this->cpf_er);

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
			self::$peer = new ContribEmployeeIr8aPeer();
		}
		return self::$peer;
	}

} 