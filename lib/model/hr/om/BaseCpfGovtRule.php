<?php


abstract class BaseCpfGovtRule extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $description;


	
	protected $company_type;


	
	protected $cpf_year;


	
	protected $from_date;


	
	protected $to_date;


	
	protected $age_min;


	
	protected $age_max;


	
	protected $pay_min = 0;


	
	protected $pay_max = 0;


	
	protected $em_share = 0;


	
	protected $er_share = 0;


	
	protected $ordinary = 0;


	
	protected $special = 0;


	
	protected $medisave = 0;


	
	protected $er_formula;


	
	protected $em_formula;


	
	protected $cpf_batch;


	
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

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getCompanyType()
	{

		return $this->company_type;
	}

	
	public function getCpfYear()
	{

		return $this->cpf_year;
	}

	
	public function getFromDate($format = 'Y-m-d')
	{

		if ($this->from_date === null || $this->from_date === '') {
			return null;
		} elseif (!is_int($this->from_date)) {
						$ts = strtotime($this->from_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [from_date] as date/time value: " . var_export($this->from_date, true));
			}
		} else {
			$ts = $this->from_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getToDate($format = 'Y-m-d')
	{

		if ($this->to_date === null || $this->to_date === '') {
			return null;
		} elseif (!is_int($this->to_date)) {
						$ts = strtotime($this->to_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [to_date] as date/time value: " . var_export($this->to_date, true));
			}
		} else {
			$ts = $this->to_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAgeMin()
	{

		return $this->age_min;
	}

	
	public function getAgeMax()
	{

		return $this->age_max;
	}

	
	public function getPayMin()
	{

		return $this->pay_min;
	}

	
	public function getPayMax()
	{

		return $this->pay_max;
	}

	
	public function getEmShare()
	{

		return $this->em_share;
	}

	
	public function getErShare()
	{

		return $this->er_share;
	}

	
	public function getOrdinary()
	{

		return $this->ordinary;
	}

	
	public function getSpecial()
	{

		return $this->special;
	}

	
	public function getMedisave()
	{

		return $this->medisave;
	}

	
	public function getErFormula()
	{

		return $this->er_formula;
	}

	
	public function getEmFormula()
	{

		return $this->em_formula;
	}

	
	public function getCpfBatch()
	{

		return $this->cpf_batch;
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
			$this->modifiedColumns[] = CpfGovtRulePeer::ID;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::DESCRIPTION;
		}

	} 
	
	public function setCompanyType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company_type !== $v) {
			$this->company_type = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::COMPANY_TYPE;
		}

	} 
	
	public function setCpfYear($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cpf_year !== $v) {
			$this->cpf_year = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::CPF_YEAR;
		}

	} 
	
	public function setFromDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [from_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->from_date !== $ts) {
			$this->from_date = $ts;
			$this->modifiedColumns[] = CpfGovtRulePeer::FROM_DATE;
		}

	} 
	
	public function setToDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [to_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->to_date !== $ts) {
			$this->to_date = $ts;
			$this->modifiedColumns[] = CpfGovtRulePeer::TO_DATE;
		}

	} 
	
	public function setAgeMin($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->age_min !== $v) {
			$this->age_min = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::AGE_MIN;
		}

	} 
	
	public function setAgeMax($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->age_max !== $v) {
			$this->age_max = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::AGE_MAX;
		}

	} 
	
	public function setPayMin($v)
	{

		if ($this->pay_min !== $v || $v === 0) {
			$this->pay_min = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::PAY_MIN;
		}

	} 
	
	public function setPayMax($v)
	{

		if ($this->pay_max !== $v || $v === 0) {
			$this->pay_max = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::PAY_MAX;
		}

	} 
	
	public function setEmShare($v)
	{

		if ($this->em_share !== $v || $v === 0) {
			$this->em_share = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::EM_SHARE;
		}

	} 
	
	public function setErShare($v)
	{

		if ($this->er_share !== $v || $v === 0) {
			$this->er_share = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::ER_SHARE;
		}

	} 
	
	public function setOrdinary($v)
	{

		if ($this->ordinary !== $v || $v === 0) {
			$this->ordinary = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::ORDINARY;
		}

	} 
	
	public function setSpecial($v)
	{

		if ($this->special !== $v || $v === 0) {
			$this->special = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::SPECIAL;
		}

	} 
	
	public function setMedisave($v)
	{

		if ($this->medisave !== $v || $v === 0) {
			$this->medisave = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::MEDISAVE;
		}

	} 
	
	public function setErFormula($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->er_formula !== $v) {
			$this->er_formula = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::ER_FORMULA;
		}

	} 
	
	public function setEmFormula($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->em_formula !== $v) {
			$this->em_formula = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::EM_FORMULA;
		}

	} 
	
	public function setCpfBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cpf_batch !== $v) {
			$this->cpf_batch = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::CPF_BATCH;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::CREATED_BY;
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
			$this->modifiedColumns[] = CpfGovtRulePeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = CpfGovtRulePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = CpfGovtRulePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->description = $rs->getString($startcol + 1);

			$this->company_type = $rs->getString($startcol + 2);

			$this->cpf_year = $rs->getString($startcol + 3);

			$this->from_date = $rs->getDate($startcol + 4, null);

			$this->to_date = $rs->getDate($startcol + 5, null);

			$this->age_min = $rs->getInt($startcol + 6);

			$this->age_max = $rs->getInt($startcol + 7);

			$this->pay_min = $rs->getFloat($startcol + 8);

			$this->pay_max = $rs->getFloat($startcol + 9);

			$this->em_share = $rs->getFloat($startcol + 10);

			$this->er_share = $rs->getFloat($startcol + 11);

			$this->ordinary = $rs->getFloat($startcol + 12);

			$this->special = $rs->getFloat($startcol + 13);

			$this->medisave = $rs->getFloat($startcol + 14);

			$this->er_formula = $rs->getString($startcol + 15);

			$this->em_formula = $rs->getString($startcol + 16);

			$this->cpf_batch = $rs->getString($startcol + 17);

			$this->created_by = $rs->getString($startcol + 18);

			$this->date_created = $rs->getTimestamp($startcol + 19, null);

			$this->modified_by = $rs->getString($startcol + 20);

			$this->date_modified = $rs->getTimestamp($startcol + 21, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CpfGovtRule object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpfGovtRulePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpfGovtRulePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpfGovtRulePeer::DATABASE_NAME);
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
					$pk = CpfGovtRulePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpfGovtRulePeer::doUpdate($this, $con);
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


			if (($retval = CpfGovtRulePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpfGovtRulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDescription();
				break;
			case 2:
				return $this->getCompanyType();
				break;
			case 3:
				return $this->getCpfYear();
				break;
			case 4:
				return $this->getFromDate();
				break;
			case 5:
				return $this->getToDate();
				break;
			case 6:
				return $this->getAgeMin();
				break;
			case 7:
				return $this->getAgeMax();
				break;
			case 8:
				return $this->getPayMin();
				break;
			case 9:
				return $this->getPayMax();
				break;
			case 10:
				return $this->getEmShare();
				break;
			case 11:
				return $this->getErShare();
				break;
			case 12:
				return $this->getOrdinary();
				break;
			case 13:
				return $this->getSpecial();
				break;
			case 14:
				return $this->getMedisave();
				break;
			case 15:
				return $this->getErFormula();
				break;
			case 16:
				return $this->getEmFormula();
				break;
			case 17:
				return $this->getCpfBatch();
				break;
			case 18:
				return $this->getCreatedBy();
				break;
			case 19:
				return $this->getDateCreated();
				break;
			case 20:
				return $this->getModifiedBy();
				break;
			case 21:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpfGovtRulePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescription(),
			$keys[2] => $this->getCompanyType(),
			$keys[3] => $this->getCpfYear(),
			$keys[4] => $this->getFromDate(),
			$keys[5] => $this->getToDate(),
			$keys[6] => $this->getAgeMin(),
			$keys[7] => $this->getAgeMax(),
			$keys[8] => $this->getPayMin(),
			$keys[9] => $this->getPayMax(),
			$keys[10] => $this->getEmShare(),
			$keys[11] => $this->getErShare(),
			$keys[12] => $this->getOrdinary(),
			$keys[13] => $this->getSpecial(),
			$keys[14] => $this->getMedisave(),
			$keys[15] => $this->getErFormula(),
			$keys[16] => $this->getEmFormula(),
			$keys[17] => $this->getCpfBatch(),
			$keys[18] => $this->getCreatedBy(),
			$keys[19] => $this->getDateCreated(),
			$keys[20] => $this->getModifiedBy(),
			$keys[21] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpfGovtRulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescription($value);
				break;
			case 2:
				$this->setCompanyType($value);
				break;
			case 3:
				$this->setCpfYear($value);
				break;
			case 4:
				$this->setFromDate($value);
				break;
			case 5:
				$this->setToDate($value);
				break;
			case 6:
				$this->setAgeMin($value);
				break;
			case 7:
				$this->setAgeMax($value);
				break;
			case 8:
				$this->setPayMin($value);
				break;
			case 9:
				$this->setPayMax($value);
				break;
			case 10:
				$this->setEmShare($value);
				break;
			case 11:
				$this->setErShare($value);
				break;
			case 12:
				$this->setOrdinary($value);
				break;
			case 13:
				$this->setSpecial($value);
				break;
			case 14:
				$this->setMedisave($value);
				break;
			case 15:
				$this->setErFormula($value);
				break;
			case 16:
				$this->setEmFormula($value);
				break;
			case 17:
				$this->setCpfBatch($value);
				break;
			case 18:
				$this->setCreatedBy($value);
				break;
			case 19:
				$this->setDateCreated($value);
				break;
			case 20:
				$this->setModifiedBy($value);
				break;
			case 21:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpfGovtRulePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescription($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCompanyType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCpfYear($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFromDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setToDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAgeMin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAgeMax($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPayMin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPayMax($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmShare($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setErShare($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOrdinary($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSpecial($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMedisave($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setErFormula($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEmFormula($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCpfBatch($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDateCreated($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setModifiedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDateModified($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpfGovtRulePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpfGovtRulePeer::ID)) $criteria->add(CpfGovtRulePeer::ID, $this->id);
		if ($this->isColumnModified(CpfGovtRulePeer::DESCRIPTION)) $criteria->add(CpfGovtRulePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CpfGovtRulePeer::COMPANY_TYPE)) $criteria->add(CpfGovtRulePeer::COMPANY_TYPE, $this->company_type);
		if ($this->isColumnModified(CpfGovtRulePeer::CPF_YEAR)) $criteria->add(CpfGovtRulePeer::CPF_YEAR, $this->cpf_year);
		if ($this->isColumnModified(CpfGovtRulePeer::FROM_DATE)) $criteria->add(CpfGovtRulePeer::FROM_DATE, $this->from_date);
		if ($this->isColumnModified(CpfGovtRulePeer::TO_DATE)) $criteria->add(CpfGovtRulePeer::TO_DATE, $this->to_date);
		if ($this->isColumnModified(CpfGovtRulePeer::AGE_MIN)) $criteria->add(CpfGovtRulePeer::AGE_MIN, $this->age_min);
		if ($this->isColumnModified(CpfGovtRulePeer::AGE_MAX)) $criteria->add(CpfGovtRulePeer::AGE_MAX, $this->age_max);
		if ($this->isColumnModified(CpfGovtRulePeer::PAY_MIN)) $criteria->add(CpfGovtRulePeer::PAY_MIN, $this->pay_min);
		if ($this->isColumnModified(CpfGovtRulePeer::PAY_MAX)) $criteria->add(CpfGovtRulePeer::PAY_MAX, $this->pay_max);
		if ($this->isColumnModified(CpfGovtRulePeer::EM_SHARE)) $criteria->add(CpfGovtRulePeer::EM_SHARE, $this->em_share);
		if ($this->isColumnModified(CpfGovtRulePeer::ER_SHARE)) $criteria->add(CpfGovtRulePeer::ER_SHARE, $this->er_share);
		if ($this->isColumnModified(CpfGovtRulePeer::ORDINARY)) $criteria->add(CpfGovtRulePeer::ORDINARY, $this->ordinary);
		if ($this->isColumnModified(CpfGovtRulePeer::SPECIAL)) $criteria->add(CpfGovtRulePeer::SPECIAL, $this->special);
		if ($this->isColumnModified(CpfGovtRulePeer::MEDISAVE)) $criteria->add(CpfGovtRulePeer::MEDISAVE, $this->medisave);
		if ($this->isColumnModified(CpfGovtRulePeer::ER_FORMULA)) $criteria->add(CpfGovtRulePeer::ER_FORMULA, $this->er_formula);
		if ($this->isColumnModified(CpfGovtRulePeer::EM_FORMULA)) $criteria->add(CpfGovtRulePeer::EM_FORMULA, $this->em_formula);
		if ($this->isColumnModified(CpfGovtRulePeer::CPF_BATCH)) $criteria->add(CpfGovtRulePeer::CPF_BATCH, $this->cpf_batch);
		if ($this->isColumnModified(CpfGovtRulePeer::CREATED_BY)) $criteria->add(CpfGovtRulePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(CpfGovtRulePeer::DATE_CREATED)) $criteria->add(CpfGovtRulePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(CpfGovtRulePeer::MODIFIED_BY)) $criteria->add(CpfGovtRulePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(CpfGovtRulePeer::DATE_MODIFIED)) $criteria->add(CpfGovtRulePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpfGovtRulePeer::DATABASE_NAME);

		$criteria->add(CpfGovtRulePeer::ID, $this->id);

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

		$copyObj->setDescription($this->description);

		$copyObj->setCompanyType($this->company_type);

		$copyObj->setCpfYear($this->cpf_year);

		$copyObj->setFromDate($this->from_date);

		$copyObj->setToDate($this->to_date);

		$copyObj->setAgeMin($this->age_min);

		$copyObj->setAgeMax($this->age_max);

		$copyObj->setPayMin($this->pay_min);

		$copyObj->setPayMax($this->pay_max);

		$copyObj->setEmShare($this->em_share);

		$copyObj->setErShare($this->er_share);

		$copyObj->setOrdinary($this->ordinary);

		$copyObj->setSpecial($this->special);

		$copyObj->setMedisave($this->medisave);

		$copyObj->setErFormula($this->er_formula);

		$copyObj->setEmFormula($this->em_formula);

		$copyObj->setCpfBatch($this->cpf_batch);

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
			self::$peer = new CpfGovtRulePeer();
		}
		return self::$peer;
	}

} 