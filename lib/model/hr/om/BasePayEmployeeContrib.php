<?php


abstract class BasePayEmployeeContrib extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $company;


	
	protected $department;


	
	protected $period_code;


	
	protected $subcon = 0;


	
	protected $wage = 0;


	
	protected $em_share = 0;


	
	protected $er_share = 0;


	
	protected $cdac = 0;


	
	protected $sinda = 0;


	
	protected $mbmf = 0;


	
	protected $sdl = 0;


	
	protected $levy = 0;


	
	protected $gross_inc = 0;


	
	protected $gross_ded = 0;


	
	protected $is_levy;


	
	protected $date_modified;


	
	protected $modified_by = 'null';


	
	protected $date_created;


	
	protected $created_by = 'null';

	
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

	
	public function getDepartment()
	{

		return $this->department;
	}

	
	public function getPeriodCode()
	{

		return $this->period_code;
	}

	
	public function getSubcon()
	{

		return $this->subcon;
	}

	
	public function getWage()
	{

		return $this->wage;
	}

	
	public function getEmShare()
	{

		return $this->em_share;
	}

	
	public function getErShare()
	{

		return $this->er_share;
	}

	
	public function getCdac()
	{

		return $this->cdac;
	}

	
	public function getSinda()
	{

		return $this->sinda;
	}

	
	public function getMbmf()
	{

		return $this->mbmf;
	}

	
	public function getSdl()
	{

		return $this->sdl;
	}

	
	public function getLevy()
	{

		return $this->levy;
	}

	
	public function getGrossInc()
	{

		return $this->gross_inc;
	}

	
	public function getGrossDed()
	{

		return $this->gross_ded;
	}

	
	public function getIsLevy()
	{

		return $this->is_levy;
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

	
	public function getModifiedBy()
	{

		return $this->modified_by;
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
			$this->modifiedColumns[] = PayEmployeeContribPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::NAME;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::COMPANY;
		}

	} 
	
	public function setDepartment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->department !== $v) {
			$this->department = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::DEPARTMENT;
		}

	} 
	
	public function setPeriodCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->period_code !== $v) {
			$this->period_code = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::PERIOD_CODE;
		}

	} 
	
	public function setSubcon($v)
	{

		if ($this->subcon !== $v || $v === 0) {
			$this->subcon = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::SUBCON;
		}

	} 
	
	public function setWage($v)
	{

		if ($this->wage !== $v || $v === 0) {
			$this->wage = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::WAGE;
		}

	} 
	
	public function setEmShare($v)
	{

		if ($this->em_share !== $v || $v === 0) {
			$this->em_share = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::EM_SHARE;
		}

	} 
	
	public function setErShare($v)
	{

		if ($this->er_share !== $v || $v === 0) {
			$this->er_share = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::ER_SHARE;
		}

	} 
	
	public function setCdac($v)
	{

		if ($this->cdac !== $v || $v === 0) {
			$this->cdac = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::CDAC;
		}

	} 
	
	public function setSinda($v)
	{

		if ($this->sinda !== $v || $v === 0) {
			$this->sinda = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::SINDA;
		}

	} 
	
	public function setMbmf($v)
	{

		if ($this->mbmf !== $v || $v === 0) {
			$this->mbmf = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::MBMF;
		}

	} 
	
	public function setSdl($v)
	{

		if ($this->sdl !== $v || $v === 0) {
			$this->sdl = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::SDL;
		}

	} 
	
	public function setLevy($v)
	{

		if ($this->levy !== $v || $v === 0) {
			$this->levy = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::LEVY;
		}

	} 
	
	public function setGrossInc($v)
	{

		if ($this->gross_inc !== $v || $v === 0) {
			$this->gross_inc = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::GROSS_INC;
		}

	} 
	
	public function setGrossDed($v)
	{

		if ($this->gross_ded !== $v || $v === 0) {
			$this->gross_ded = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::GROSS_DED;
		}

	} 
	
	public function setIsLevy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_levy !== $v) {
			$this->is_levy = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::IS_LEVY;
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
			$this->modifiedColumns[] = PayEmployeeContribPeer::DATE_MODIFIED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v || $v === 'null') {
			$this->modified_by = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = PayEmployeeContribPeer::DATE_CREATED;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v || $v === 'null') {
			$this->created_by = $v;
			$this->modifiedColumns[] = PayEmployeeContribPeer::CREATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->company = $rs->getString($startcol + 3);

			$this->department = $rs->getString($startcol + 4);

			$this->period_code = $rs->getString($startcol + 5);

			$this->subcon = $rs->getFloat($startcol + 6);

			$this->wage = $rs->getFloat($startcol + 7);

			$this->em_share = $rs->getFloat($startcol + 8);

			$this->er_share = $rs->getFloat($startcol + 9);

			$this->cdac = $rs->getFloat($startcol + 10);

			$this->sinda = $rs->getFloat($startcol + 11);

			$this->mbmf = $rs->getFloat($startcol + 12);

			$this->sdl = $rs->getFloat($startcol + 13);

			$this->levy = $rs->getFloat($startcol + 14);

			$this->gross_inc = $rs->getFloat($startcol + 15);

			$this->gross_ded = $rs->getFloat($startcol + 16);

			$this->is_levy = $rs->getString($startcol + 17);

			$this->date_modified = $rs->getTimestamp($startcol + 18, null);

			$this->modified_by = $rs->getString($startcol + 19);

			$this->date_created = $rs->getTimestamp($startcol + 20, null);

			$this->created_by = $rs->getString($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PayEmployeeContrib object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PayEmployeeContribPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PayEmployeeContribPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PayEmployeeContribPeer::DATABASE_NAME);
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
					$pk = PayEmployeeContribPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PayEmployeeContribPeer::doUpdate($this, $con);
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


			if (($retval = PayEmployeeContribPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeContribPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDepartment();
				break;
			case 5:
				return $this->getPeriodCode();
				break;
			case 6:
				return $this->getSubcon();
				break;
			case 7:
				return $this->getWage();
				break;
			case 8:
				return $this->getEmShare();
				break;
			case 9:
				return $this->getErShare();
				break;
			case 10:
				return $this->getCdac();
				break;
			case 11:
				return $this->getSinda();
				break;
			case 12:
				return $this->getMbmf();
				break;
			case 13:
				return $this->getSdl();
				break;
			case 14:
				return $this->getLevy();
				break;
			case 15:
				return $this->getGrossInc();
				break;
			case 16:
				return $this->getGrossDed();
				break;
			case 17:
				return $this->getIsLevy();
				break;
			case 18:
				return $this->getDateModified();
				break;
			case 19:
				return $this->getModifiedBy();
				break;
			case 20:
				return $this->getDateCreated();
				break;
			case 21:
				return $this->getCreatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeContribPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getCompany(),
			$keys[4] => $this->getDepartment(),
			$keys[5] => $this->getPeriodCode(),
			$keys[6] => $this->getSubcon(),
			$keys[7] => $this->getWage(),
			$keys[8] => $this->getEmShare(),
			$keys[9] => $this->getErShare(),
			$keys[10] => $this->getCdac(),
			$keys[11] => $this->getSinda(),
			$keys[12] => $this->getMbmf(),
			$keys[13] => $this->getSdl(),
			$keys[14] => $this->getLevy(),
			$keys[15] => $this->getGrossInc(),
			$keys[16] => $this->getGrossDed(),
			$keys[17] => $this->getIsLevy(),
			$keys[18] => $this->getDateModified(),
			$keys[19] => $this->getModifiedBy(),
			$keys[20] => $this->getDateCreated(),
			$keys[21] => $this->getCreatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PayEmployeeContribPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDepartment($value);
				break;
			case 5:
				$this->setPeriodCode($value);
				break;
			case 6:
				$this->setSubcon($value);
				break;
			case 7:
				$this->setWage($value);
				break;
			case 8:
				$this->setEmShare($value);
				break;
			case 9:
				$this->setErShare($value);
				break;
			case 10:
				$this->setCdac($value);
				break;
			case 11:
				$this->setSinda($value);
				break;
			case 12:
				$this->setMbmf($value);
				break;
			case 13:
				$this->setSdl($value);
				break;
			case 14:
				$this->setLevy($value);
				break;
			case 15:
				$this->setGrossInc($value);
				break;
			case 16:
				$this->setGrossDed($value);
				break;
			case 17:
				$this->setIsLevy($value);
				break;
			case 18:
				$this->setDateModified($value);
				break;
			case 19:
				$this->setModifiedBy($value);
				break;
			case 20:
				$this->setDateCreated($value);
				break;
			case 21:
				$this->setCreatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PayEmployeeContribPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCompany($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepartment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPeriodCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSubcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setWage($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEmShare($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setErShare($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCdac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSinda($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMbmf($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSdl($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLevy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setGrossInc($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setGrossDed($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setIsLevy($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDateModified($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setModifiedBy($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDateCreated($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedBy($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PayEmployeeContribPeer::DATABASE_NAME);

		if ($this->isColumnModified(PayEmployeeContribPeer::ID)) $criteria->add(PayEmployeeContribPeer::ID, $this->id);
		if ($this->isColumnModified(PayEmployeeContribPeer::EMPLOYEE_NO)) $criteria->add(PayEmployeeContribPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(PayEmployeeContribPeer::NAME)) $criteria->add(PayEmployeeContribPeer::NAME, $this->name);
		if ($this->isColumnModified(PayEmployeeContribPeer::COMPANY)) $criteria->add(PayEmployeeContribPeer::COMPANY, $this->company);
		if ($this->isColumnModified(PayEmployeeContribPeer::DEPARTMENT)) $criteria->add(PayEmployeeContribPeer::DEPARTMENT, $this->department);
		if ($this->isColumnModified(PayEmployeeContribPeer::PERIOD_CODE)) $criteria->add(PayEmployeeContribPeer::PERIOD_CODE, $this->period_code);
		if ($this->isColumnModified(PayEmployeeContribPeer::SUBCON)) $criteria->add(PayEmployeeContribPeer::SUBCON, $this->subcon);
		if ($this->isColumnModified(PayEmployeeContribPeer::WAGE)) $criteria->add(PayEmployeeContribPeer::WAGE, $this->wage);
		if ($this->isColumnModified(PayEmployeeContribPeer::EM_SHARE)) $criteria->add(PayEmployeeContribPeer::EM_SHARE, $this->em_share);
		if ($this->isColumnModified(PayEmployeeContribPeer::ER_SHARE)) $criteria->add(PayEmployeeContribPeer::ER_SHARE, $this->er_share);
		if ($this->isColumnModified(PayEmployeeContribPeer::CDAC)) $criteria->add(PayEmployeeContribPeer::CDAC, $this->cdac);
		if ($this->isColumnModified(PayEmployeeContribPeer::SINDA)) $criteria->add(PayEmployeeContribPeer::SINDA, $this->sinda);
		if ($this->isColumnModified(PayEmployeeContribPeer::MBMF)) $criteria->add(PayEmployeeContribPeer::MBMF, $this->mbmf);
		if ($this->isColumnModified(PayEmployeeContribPeer::SDL)) $criteria->add(PayEmployeeContribPeer::SDL, $this->sdl);
		if ($this->isColumnModified(PayEmployeeContribPeer::LEVY)) $criteria->add(PayEmployeeContribPeer::LEVY, $this->levy);
		if ($this->isColumnModified(PayEmployeeContribPeer::GROSS_INC)) $criteria->add(PayEmployeeContribPeer::GROSS_INC, $this->gross_inc);
		if ($this->isColumnModified(PayEmployeeContribPeer::GROSS_DED)) $criteria->add(PayEmployeeContribPeer::GROSS_DED, $this->gross_ded);
		if ($this->isColumnModified(PayEmployeeContribPeer::IS_LEVY)) $criteria->add(PayEmployeeContribPeer::IS_LEVY, $this->is_levy);
		if ($this->isColumnModified(PayEmployeeContribPeer::DATE_MODIFIED)) $criteria->add(PayEmployeeContribPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(PayEmployeeContribPeer::MODIFIED_BY)) $criteria->add(PayEmployeeContribPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(PayEmployeeContribPeer::DATE_CREATED)) $criteria->add(PayEmployeeContribPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(PayEmployeeContribPeer::CREATED_BY)) $criteria->add(PayEmployeeContribPeer::CREATED_BY, $this->created_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PayEmployeeContribPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeContribPeer::ID, $this->id);

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

		$copyObj->setDepartment($this->department);

		$copyObj->setPeriodCode($this->period_code);

		$copyObj->setSubcon($this->subcon);

		$copyObj->setWage($this->wage);

		$copyObj->setEmShare($this->em_share);

		$copyObj->setErShare($this->er_share);

		$copyObj->setCdac($this->cdac);

		$copyObj->setSinda($this->sinda);

		$copyObj->setMbmf($this->mbmf);

		$copyObj->setSdl($this->sdl);

		$copyObj->setLevy($this->levy);

		$copyObj->setGrossInc($this->gross_inc);

		$copyObj->setGrossDed($this->gross_ded);

		$copyObj->setIsLevy($this->is_levy);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setModifiedBy($this->modified_by);

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
			self::$peer = new PayEmployeeContribPeer();
		}
		return self::$peer;
	}

} 