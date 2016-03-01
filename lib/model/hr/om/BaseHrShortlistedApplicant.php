<?php


abstract class BaseHrShortlistedApplicant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $lastname;


	
	protected $firstname;


	
	protected $midname;


	
	protected $position_applied_for;


	
	protected $chinese_name;


	
	protected $birth_date;


	
	protected $birth_place;


	
	protected $street;


	
	protected $bldg_room_no;


	
	protected $city;


	
	protected $province;


	
	protected $zip_code;


	
	protected $tel_no;


	
	protected $cell_no;


	
	protected $email_add;


	
	protected $sex;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getLastname()
	{

		return $this->lastname;
	}

	
	public function getFirstname()
	{

		return $this->firstname;
	}

	
	public function getMidname()
	{

		return $this->midname;
	}

	
	public function getPositionAppliedFor()
	{

		return $this->position_applied_for;
	}

	
	public function getChineseName()
	{

		return $this->chinese_name;
	}

	
	public function getBirthDate($format = 'Y-m-d')
	{

		if ($this->birth_date === null || $this->birth_date === '') {
			return null;
		} elseif (!is_int($this->birth_date)) {
						$ts = strtotime($this->birth_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [birth_date] as date/time value: " . var_export($this->birth_date, true));
			}
		} else {
			$ts = $this->birth_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBirthPlace()
	{

		return $this->birth_place;
	}

	
	public function getStreet()
	{

		return $this->street;
	}

	
	public function getBldgRoomNo()
	{

		return $this->bldg_room_no;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getProvince()
	{

		return $this->province;
	}

	
	public function getZipCode()
	{

		return $this->zip_code;
	}

	
	public function getTelNo()
	{

		return $this->tel_no;
	}

	
	public function getCellNo()
	{

		return $this->cell_no;
	}

	
	public function getEmailAdd()
	{

		return $this->email_add;
	}

	
	public function getSex()
	{

		return $this->sex;
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

	
	public function getHrEmployeeId()
	{

		return $this->hr_employee_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::ID;
		}

	} 
	
	public function setLastname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lastname !== $v) {
			$this->lastname = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::LASTNAME;
		}

	} 
	
	public function setFirstname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->firstname !== $v) {
			$this->firstname = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::FIRSTNAME;
		}

	} 
	
	public function setMidname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->midname !== $v) {
			$this->midname = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::MIDNAME;
		}

	} 
	
	public function setPositionAppliedFor($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->position_applied_for !== $v) {
			$this->position_applied_for = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::POSITION_APPLIED_FOR;
		}

	} 
	
	public function setChineseName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->chinese_name !== $v) {
			$this->chinese_name = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::CHINESE_NAME;
		}

	} 
	
	public function setBirthDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [birth_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->birth_date !== $ts) {
			$this->birth_date = $ts;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::BIRTH_DATE;
		}

	} 
	
	public function setBirthPlace($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->birth_place !== $v) {
			$this->birth_place = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::BIRTH_PLACE;
		}

	} 
	
	public function setStreet($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->street !== $v) {
			$this->street = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::STREET;
		}

	} 
	
	public function setBldgRoomNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bldg_room_no !== $v) {
			$this->bldg_room_no = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::BLDG_ROOM_NO;
		}

	} 
	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::CITY;
		}

	} 
	
	public function setProvince($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->province !== $v) {
			$this->province = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::PROVINCE;
		}

	} 
	
	public function setZipCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->zip_code !== $v) {
			$this->zip_code = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::ZIP_CODE;
		}

	} 
	
	public function setTelNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tel_no !== $v) {
			$this->tel_no = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::TEL_NO;
		}

	} 
	
	public function setCellNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cell_no !== $v) {
			$this->cell_no = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::CELL_NO;
		}

	} 
	
	public function setEmailAdd($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email_add !== $v) {
			$this->email_add = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::EMAIL_ADD;
		}

	} 
	
	public function setSex($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sex !== $v) {
			$this->sex = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::SEX;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = HrShortlistedApplicantPeer::HR_EMPLOYEE_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->lastname = $rs->getString($startcol + 1);

			$this->firstname = $rs->getString($startcol + 2);

			$this->midname = $rs->getString($startcol + 3);

			$this->position_applied_for = $rs->getString($startcol + 4);

			$this->chinese_name = $rs->getString($startcol + 5);

			$this->birth_date = $rs->getDate($startcol + 6, null);

			$this->birth_place = $rs->getString($startcol + 7);

			$this->street = $rs->getString($startcol + 8);

			$this->bldg_room_no = $rs->getString($startcol + 9);

			$this->city = $rs->getString($startcol + 10);

			$this->province = $rs->getString($startcol + 11);

			$this->zip_code = $rs->getString($startcol + 12);

			$this->tel_no = $rs->getString($startcol + 13);

			$this->cell_no = $rs->getString($startcol + 14);

			$this->email_add = $rs->getString($startcol + 15);

			$this->sex = $rs->getString($startcol + 16);

			$this->remarks = $rs->getString($startcol + 17);

			$this->created_by = $rs->getString($startcol + 18);

			$this->date_created = $rs->getTimestamp($startcol + 19, null);

			$this->modified_by = $rs->getString($startcol + 20);

			$this->date_modified = $rs->getTimestamp($startcol + 21, null);

			$this->hr_employee_id = $rs->getString($startcol + 22);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 23; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrShortlistedApplicant object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrShortlistedApplicantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrShortlistedApplicantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrShortlistedApplicantPeer::DATABASE_NAME);
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
					$pk = HrShortlistedApplicantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrShortlistedApplicantPeer::doUpdate($this, $con);
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


			if (($retval = HrShortlistedApplicantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrShortlistedApplicantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLastname();
				break;
			case 2:
				return $this->getFirstname();
				break;
			case 3:
				return $this->getMidname();
				break;
			case 4:
				return $this->getPositionAppliedFor();
				break;
			case 5:
				return $this->getChineseName();
				break;
			case 6:
				return $this->getBirthDate();
				break;
			case 7:
				return $this->getBirthPlace();
				break;
			case 8:
				return $this->getStreet();
				break;
			case 9:
				return $this->getBldgRoomNo();
				break;
			case 10:
				return $this->getCity();
				break;
			case 11:
				return $this->getProvince();
				break;
			case 12:
				return $this->getZipCode();
				break;
			case 13:
				return $this->getTelNo();
				break;
			case 14:
				return $this->getCellNo();
				break;
			case 15:
				return $this->getEmailAdd();
				break;
			case 16:
				return $this->getSex();
				break;
			case 17:
				return $this->getRemarks();
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
			case 22:
				return $this->getHrEmployeeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrShortlistedApplicantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLastname(),
			$keys[2] => $this->getFirstname(),
			$keys[3] => $this->getMidname(),
			$keys[4] => $this->getPositionAppliedFor(),
			$keys[5] => $this->getChineseName(),
			$keys[6] => $this->getBirthDate(),
			$keys[7] => $this->getBirthPlace(),
			$keys[8] => $this->getStreet(),
			$keys[9] => $this->getBldgRoomNo(),
			$keys[10] => $this->getCity(),
			$keys[11] => $this->getProvince(),
			$keys[12] => $this->getZipCode(),
			$keys[13] => $this->getTelNo(),
			$keys[14] => $this->getCellNo(),
			$keys[15] => $this->getEmailAdd(),
			$keys[16] => $this->getSex(),
			$keys[17] => $this->getRemarks(),
			$keys[18] => $this->getCreatedBy(),
			$keys[19] => $this->getDateCreated(),
			$keys[20] => $this->getModifiedBy(),
			$keys[21] => $this->getDateModified(),
			$keys[22] => $this->getHrEmployeeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrShortlistedApplicantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLastname($value);
				break;
			case 2:
				$this->setFirstname($value);
				break;
			case 3:
				$this->setMidname($value);
				break;
			case 4:
				$this->setPositionAppliedFor($value);
				break;
			case 5:
				$this->setChineseName($value);
				break;
			case 6:
				$this->setBirthDate($value);
				break;
			case 7:
				$this->setBirthPlace($value);
				break;
			case 8:
				$this->setStreet($value);
				break;
			case 9:
				$this->setBldgRoomNo($value);
				break;
			case 10:
				$this->setCity($value);
				break;
			case 11:
				$this->setProvince($value);
				break;
			case 12:
				$this->setZipCode($value);
				break;
			case 13:
				$this->setTelNo($value);
				break;
			case 14:
				$this->setCellNo($value);
				break;
			case 15:
				$this->setEmailAdd($value);
				break;
			case 16:
				$this->setSex($value);
				break;
			case 17:
				$this->setRemarks($value);
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
			case 22:
				$this->setHrEmployeeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrShortlistedApplicantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLastname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFirstname($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMidname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPositionAppliedFor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setChineseName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBirthDate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBirthPlace($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStreet($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBldgRoomNo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCity($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setProvince($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setZipCode($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTelNo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCellNo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEmailAdd($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSex($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRemarks($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDateCreated($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setModifiedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDateModified($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setHrEmployeeId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrShortlistedApplicantPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrShortlistedApplicantPeer::ID)) $criteria->add(HrShortlistedApplicantPeer::ID, $this->id);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::LASTNAME)) $criteria->add(HrShortlistedApplicantPeer::LASTNAME, $this->lastname);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::FIRSTNAME)) $criteria->add(HrShortlistedApplicantPeer::FIRSTNAME, $this->firstname);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::MIDNAME)) $criteria->add(HrShortlistedApplicantPeer::MIDNAME, $this->midname);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::POSITION_APPLIED_FOR)) $criteria->add(HrShortlistedApplicantPeer::POSITION_APPLIED_FOR, $this->position_applied_for);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::CHINESE_NAME)) $criteria->add(HrShortlistedApplicantPeer::CHINESE_NAME, $this->chinese_name);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::BIRTH_DATE)) $criteria->add(HrShortlistedApplicantPeer::BIRTH_DATE, $this->birth_date);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::BIRTH_PLACE)) $criteria->add(HrShortlistedApplicantPeer::BIRTH_PLACE, $this->birth_place);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::STREET)) $criteria->add(HrShortlistedApplicantPeer::STREET, $this->street);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::BLDG_ROOM_NO)) $criteria->add(HrShortlistedApplicantPeer::BLDG_ROOM_NO, $this->bldg_room_no);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::CITY)) $criteria->add(HrShortlistedApplicantPeer::CITY, $this->city);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::PROVINCE)) $criteria->add(HrShortlistedApplicantPeer::PROVINCE, $this->province);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::ZIP_CODE)) $criteria->add(HrShortlistedApplicantPeer::ZIP_CODE, $this->zip_code);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::TEL_NO)) $criteria->add(HrShortlistedApplicantPeer::TEL_NO, $this->tel_no);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::CELL_NO)) $criteria->add(HrShortlistedApplicantPeer::CELL_NO, $this->cell_no);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::EMAIL_ADD)) $criteria->add(HrShortlistedApplicantPeer::EMAIL_ADD, $this->email_add);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::SEX)) $criteria->add(HrShortlistedApplicantPeer::SEX, $this->sex);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::REMARKS)) $criteria->add(HrShortlistedApplicantPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::CREATED_BY)) $criteria->add(HrShortlistedApplicantPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::DATE_CREATED)) $criteria->add(HrShortlistedApplicantPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::MODIFIED_BY)) $criteria->add(HrShortlistedApplicantPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::DATE_MODIFIED)) $criteria->add(HrShortlistedApplicantPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrShortlistedApplicantPeer::HR_EMPLOYEE_ID)) $criteria->add(HrShortlistedApplicantPeer::HR_EMPLOYEE_ID, $this->hr_employee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrShortlistedApplicantPeer::DATABASE_NAME);

		$criteria->add(HrShortlistedApplicantPeer::ID, $this->id);

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

		$copyObj->setLastname($this->lastname);

		$copyObj->setFirstname($this->firstname);

		$copyObj->setMidname($this->midname);

		$copyObj->setPositionAppliedFor($this->position_applied_for);

		$copyObj->setChineseName($this->chinese_name);

		$copyObj->setBirthDate($this->birth_date);

		$copyObj->setBirthPlace($this->birth_place);

		$copyObj->setStreet($this->street);

		$copyObj->setBldgRoomNo($this->bldg_room_no);

		$copyObj->setCity($this->city);

		$copyObj->setProvince($this->province);

		$copyObj->setZipCode($this->zip_code);

		$copyObj->setTelNo($this->tel_no);

		$copyObj->setCellNo($this->cell_no);

		$copyObj->setEmailAdd($this->email_add);

		$copyObj->setSex($this->sex);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setHrEmployeeId($this->hr_employee_id);


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
			self::$peer = new HrShortlistedApplicantPeer();
		}
		return self::$peer;
	}

} 