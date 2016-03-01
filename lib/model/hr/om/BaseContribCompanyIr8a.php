<?php


abstract class BaseContribCompanyIr8a extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $source;


	
	protected $org_id_type;


	
	protected $org_id_no;


	
	protected $nano_org_id;


	
	protected $authorized_person;


	
	protected $auth_designation;


	
	protected $tel_no;


	
	protected $employer;


	
	protected $email;


	
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

	
	public function getSource()
	{

		return $this->source;
	}

	
	public function getOrgIdType()
	{

		return $this->org_id_type;
	}

	
	public function getOrgIdNo()
	{

		return $this->org_id_no;
	}

	
	public function getNanoOrgId()
	{

		return $this->nano_org_id;
	}

	
	public function getAuthorizedPerson()
	{

		return $this->authorized_person;
	}

	
	public function getAuthDesignation()
	{

		return $this->auth_designation;
	}

	
	public function getTelNo()
	{

		return $this->tel_no;
	}

	
	public function getEmployer()
	{

		return $this->employer;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getDateCreated($format = 'Y-m-d')
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
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::ID;
		}

	} 
	
	public function setSource($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->source !== $v) {
			$this->source = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::SOURCE;
		}

	} 
	
	public function setOrgIdType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->org_id_type !== $v) {
			$this->org_id_type = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::ORG_ID_TYPE;
		}

	} 
	
	public function setOrgIdNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->org_id_no !== $v) {
			$this->org_id_no = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::ORG_ID_NO;
		}

	} 
	
	public function setNanoOrgId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nano_org_id !== $v) {
			$this->nano_org_id = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::NANO_ORG_ID;
		}

	} 
	
	public function setAuthorizedPerson($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->authorized_person !== $v) {
			$this->authorized_person = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::AUTHORIZED_PERSON;
		}

	} 
	
	public function setAuthDesignation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->auth_designation !== $v) {
			$this->auth_designation = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::AUTH_DESIGNATION;
		}

	} 
	
	public function setTelNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tel_no !== $v) {
			$this->tel_no = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::TEL_NO;
		}

	} 
	
	public function setEmployer($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employer !== $v) {
			$this->employer = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::EMPLOYER;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::EMAIL;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = ContribCompanyIr8aPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->source = $rs->getString($startcol + 1);

			$this->org_id_type = $rs->getString($startcol + 2);

			$this->org_id_no = $rs->getString($startcol + 3);

			$this->nano_org_id = $rs->getString($startcol + 4);

			$this->authorized_person = $rs->getString($startcol + 5);

			$this->auth_designation = $rs->getString($startcol + 6);

			$this->tel_no = $rs->getString($startcol + 7);

			$this->employer = $rs->getString($startcol + 8);

			$this->email = $rs->getString($startcol + 9);

			$this->created_by = $rs->getString($startcol + 10);

			$this->date_created = $rs->getDate($startcol + 11, null);

			$this->modified_by = $rs->getString($startcol + 12);

			$this->date_modified = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ContribCompanyIr8a object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContribCompanyIr8aPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContribCompanyIr8aPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContribCompanyIr8aPeer::DATABASE_NAME);
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
					$pk = ContribCompanyIr8aPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContribCompanyIr8aPeer::doUpdate($this, $con);
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


			if (($retval = ContribCompanyIr8aPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContribCompanyIr8aPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSource();
				break;
			case 2:
				return $this->getOrgIdType();
				break;
			case 3:
				return $this->getOrgIdNo();
				break;
			case 4:
				return $this->getNanoOrgId();
				break;
			case 5:
				return $this->getAuthorizedPerson();
				break;
			case 6:
				return $this->getAuthDesignation();
				break;
			case 7:
				return $this->getTelNo();
				break;
			case 8:
				return $this->getEmployer();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getCreatedBy();
				break;
			case 11:
				return $this->getDateCreated();
				break;
			case 12:
				return $this->getModifiedBy();
				break;
			case 13:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContribCompanyIr8aPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSource(),
			$keys[2] => $this->getOrgIdType(),
			$keys[3] => $this->getOrgIdNo(),
			$keys[4] => $this->getNanoOrgId(),
			$keys[5] => $this->getAuthorizedPerson(),
			$keys[6] => $this->getAuthDesignation(),
			$keys[7] => $this->getTelNo(),
			$keys[8] => $this->getEmployer(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getDateCreated(),
			$keys[12] => $this->getModifiedBy(),
			$keys[13] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContribCompanyIr8aPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSource($value);
				break;
			case 2:
				$this->setOrgIdType($value);
				break;
			case 3:
				$this->setOrgIdNo($value);
				break;
			case 4:
				$this->setNanoOrgId($value);
				break;
			case 5:
				$this->setAuthorizedPerson($value);
				break;
			case 6:
				$this->setAuthDesignation($value);
				break;
			case 7:
				$this->setTelNo($value);
				break;
			case 8:
				$this->setEmployer($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setCreatedBy($value);
				break;
			case 11:
				$this->setDateCreated($value);
				break;
			case 12:
				$this->setModifiedBy($value);
				break;
			case 13:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContribCompanyIr8aPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSource($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrgIdType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrgIdNo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNanoOrgId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAuthorizedPerson($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAuthDesignation($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelNo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEmployer($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateCreated($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setModifiedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateModified($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContribCompanyIr8aPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContribCompanyIr8aPeer::ID)) $criteria->add(ContribCompanyIr8aPeer::ID, $this->id);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::SOURCE)) $criteria->add(ContribCompanyIr8aPeer::SOURCE, $this->source);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::ORG_ID_TYPE)) $criteria->add(ContribCompanyIr8aPeer::ORG_ID_TYPE, $this->org_id_type);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::ORG_ID_NO)) $criteria->add(ContribCompanyIr8aPeer::ORG_ID_NO, $this->org_id_no);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::NANO_ORG_ID)) $criteria->add(ContribCompanyIr8aPeer::NANO_ORG_ID, $this->nano_org_id);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::AUTHORIZED_PERSON)) $criteria->add(ContribCompanyIr8aPeer::AUTHORIZED_PERSON, $this->authorized_person);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::AUTH_DESIGNATION)) $criteria->add(ContribCompanyIr8aPeer::AUTH_DESIGNATION, $this->auth_designation);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::TEL_NO)) $criteria->add(ContribCompanyIr8aPeer::TEL_NO, $this->tel_no);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::EMPLOYER)) $criteria->add(ContribCompanyIr8aPeer::EMPLOYER, $this->employer);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::EMAIL)) $criteria->add(ContribCompanyIr8aPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::CREATED_BY)) $criteria->add(ContribCompanyIr8aPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::DATE_CREATED)) $criteria->add(ContribCompanyIr8aPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::MODIFIED_BY)) $criteria->add(ContribCompanyIr8aPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(ContribCompanyIr8aPeer::DATE_MODIFIED)) $criteria->add(ContribCompanyIr8aPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContribCompanyIr8aPeer::DATABASE_NAME);

		$criteria->add(ContribCompanyIr8aPeer::ID, $this->id);

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

		$copyObj->setSource($this->source);

		$copyObj->setOrgIdType($this->org_id_type);

		$copyObj->setOrgIdNo($this->org_id_no);

		$copyObj->setNanoOrgId($this->nano_org_id);

		$copyObj->setAuthorizedPerson($this->authorized_person);

		$copyObj->setAuthDesignation($this->auth_designation);

		$copyObj->setTelNo($this->tel_no);

		$copyObj->setEmployer($this->employer);

		$copyObj->setEmail($this->email);

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
			self::$peer = new ContribCompanyIr8aPeer();
		}
		return self::$peer;
	}

} 