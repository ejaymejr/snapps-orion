<?php


abstract class BaseHrMedicalHistory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $hospital_clinic;


	
	protected $name_examinee;


	
	protected $symptoms;


	
	protected $diagnosis;


	
	protected $date_examined;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $hr_employee_id;

	
	protected $aHrEmployee;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getHospitalClinic()
	{

		return $this->hospital_clinic;
	}

	
	public function getNameExaminee()
	{

		return $this->name_examinee;
	}

	
	public function getSymptoms()
	{

		return $this->symptoms;
	}

	
	public function getDiagnosis()
	{

		return $this->diagnosis;
	}

	
	public function getDateExamined($format = 'Y-m-d')
	{

		if ($this->date_examined === null || $this->date_examined === '') {
			return null;
		} elseif (!is_int($this->date_examined)) {
						$ts = strtotime($this->date_examined);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_examined] as date/time value: " . var_export($this->date_examined, true));
			}
		} else {
			$ts = $this->date_examined;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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
			$this->modifiedColumns[] = HrMedicalHistoryPeer::ID;
		}

	} 
	
	public function setHospitalClinic($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hospital_clinic !== $v) {
			$this->hospital_clinic = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::HOSPITAL_CLINIC;
		}

	} 
	
	public function setNameExaminee($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name_examinee !== $v) {
			$this->name_examinee = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::NAME_EXAMINEE;
		}

	} 
	
	public function setSymptoms($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->symptoms !== $v) {
			$this->symptoms = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::SYMPTOMS;
		}

	} 
	
	public function setDiagnosis($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->diagnosis !== $v) {
			$this->diagnosis = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::DIAGNOSIS;
		}

	} 
	
	public function setDateExamined($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_examined] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_examined !== $ts) {
			$this->date_examined = $ts;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::DATE_EXAMINED;
		}

	} 
	
	public function setRemarks($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrMedicalHistoryPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrMedicalHistoryPeer::DATE_MODIFIED;
		}

	} 
	
	public function setHrEmployeeId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_id !== $v) {
			$this->hr_employee_id = $v;
			$this->modifiedColumns[] = HrMedicalHistoryPeer::HR_EMPLOYEE_ID;
		}

		if ($this->aHrEmployee !== null && $this->aHrEmployee->getId() !== $v) {
			$this->aHrEmployee = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->hospital_clinic = $rs->getString($startcol + 1);

			$this->name_examinee = $rs->getString($startcol + 2);

			$this->symptoms = $rs->getString($startcol + 3);

			$this->diagnosis = $rs->getString($startcol + 4);

			$this->date_examined = $rs->getDate($startcol + 5, null);

			$this->remarks = $rs->getString($startcol + 6);

			$this->created_by = $rs->getString($startcol + 7);

			$this->date_created = $rs->getTimestamp($startcol + 8, null);

			$this->modified_by = $rs->getString($startcol + 9);

			$this->date_modified = $rs->getTimestamp($startcol + 10, null);

			$this->hr_employee_id = $rs->getString($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrMedicalHistory object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrMedicalHistoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrMedicalHistoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrMedicalHistoryPeer::DATABASE_NAME);
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


												
			if ($this->aHrEmployee !== null) {
				if ($this->aHrEmployee->isModified()) {
					$affectedRows += $this->aHrEmployee->save($con);
				}
				$this->setHrEmployee($this->aHrEmployee);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HrMedicalHistoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrMedicalHistoryPeer::doUpdate($this, $con);
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


												
			if ($this->aHrEmployee !== null) {
				if (!$this->aHrEmployee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHrEmployee->getValidationFailures());
				}
			}


			if (($retval = HrMedicalHistoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrMedicalHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getHospitalClinic();
				break;
			case 2:
				return $this->getNameExaminee();
				break;
			case 3:
				return $this->getSymptoms();
				break;
			case 4:
				return $this->getDiagnosis();
				break;
			case 5:
				return $this->getDateExamined();
				break;
			case 6:
				return $this->getRemarks();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getDateCreated();
				break;
			case 9:
				return $this->getModifiedBy();
				break;
			case 10:
				return $this->getDateModified();
				break;
			case 11:
				return $this->getHrEmployeeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrMedicalHistoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getHospitalClinic(),
			$keys[2] => $this->getNameExaminee(),
			$keys[3] => $this->getSymptoms(),
			$keys[4] => $this->getDiagnosis(),
			$keys[5] => $this->getDateExamined(),
			$keys[6] => $this->getRemarks(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getDateCreated(),
			$keys[9] => $this->getModifiedBy(),
			$keys[10] => $this->getDateModified(),
			$keys[11] => $this->getHrEmployeeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrMedicalHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setHospitalClinic($value);
				break;
			case 2:
				$this->setNameExaminee($value);
				break;
			case 3:
				$this->setSymptoms($value);
				break;
			case 4:
				$this->setDiagnosis($value);
				break;
			case 5:
				$this->setDateExamined($value);
				break;
			case 6:
				$this->setRemarks($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setDateCreated($value);
				break;
			case 9:
				$this->setModifiedBy($value);
				break;
			case 10:
				$this->setDateModified($value);
				break;
			case 11:
				$this->setHrEmployeeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrMedicalHistoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setHospitalClinic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNameExaminee($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSymptoms($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiagnosis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateExamined($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemarks($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateCreated($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setModifiedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateModified($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setHrEmployeeId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrMedicalHistoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrMedicalHistoryPeer::ID)) $criteria->add(HrMedicalHistoryPeer::ID, $this->id);
		if ($this->isColumnModified(HrMedicalHistoryPeer::HOSPITAL_CLINIC)) $criteria->add(HrMedicalHistoryPeer::HOSPITAL_CLINIC, $this->hospital_clinic);
		if ($this->isColumnModified(HrMedicalHistoryPeer::NAME_EXAMINEE)) $criteria->add(HrMedicalHistoryPeer::NAME_EXAMINEE, $this->name_examinee);
		if ($this->isColumnModified(HrMedicalHistoryPeer::SYMPTOMS)) $criteria->add(HrMedicalHistoryPeer::SYMPTOMS, $this->symptoms);
		if ($this->isColumnModified(HrMedicalHistoryPeer::DIAGNOSIS)) $criteria->add(HrMedicalHistoryPeer::DIAGNOSIS, $this->diagnosis);
		if ($this->isColumnModified(HrMedicalHistoryPeer::DATE_EXAMINED)) $criteria->add(HrMedicalHistoryPeer::DATE_EXAMINED, $this->date_examined);
		if ($this->isColumnModified(HrMedicalHistoryPeer::REMARKS)) $criteria->add(HrMedicalHistoryPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(HrMedicalHistoryPeer::CREATED_BY)) $criteria->add(HrMedicalHistoryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrMedicalHistoryPeer::DATE_CREATED)) $criteria->add(HrMedicalHistoryPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrMedicalHistoryPeer::MODIFIED_BY)) $criteria->add(HrMedicalHistoryPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrMedicalHistoryPeer::DATE_MODIFIED)) $criteria->add(HrMedicalHistoryPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(HrMedicalHistoryPeer::HR_EMPLOYEE_ID)) $criteria->add(HrMedicalHistoryPeer::HR_EMPLOYEE_ID, $this->hr_employee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrMedicalHistoryPeer::DATABASE_NAME);

		$criteria->add(HrMedicalHistoryPeer::ID, $this->id);

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

		$copyObj->setHospitalClinic($this->hospital_clinic);

		$copyObj->setNameExaminee($this->name_examinee);

		$copyObj->setSymptoms($this->symptoms);

		$copyObj->setDiagnosis($this->diagnosis);

		$copyObj->setDateExamined($this->date_examined);

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
			self::$peer = new HrMedicalHistoryPeer();
		}
		return self::$peer;
	}

	
	public function setHrEmployee($v)
	{


		if ($v === null) {
			$this->setHrEmployeeId(NULL);
		} else {
			$this->setHrEmployeeId($v->getId());
		}


		$this->aHrEmployee = $v;
	}


	
	public function getHrEmployee($con = null)
	{
		if ($this->aHrEmployee === null && (($this->hr_employee_id !== "" && $this->hr_employee_id !== null))) {
						include_once 'lib/model/hr/om/BaseHrEmployeePeer.php';

			$this->aHrEmployee = HrEmployeePeer::retrieveByPK($this->hr_employee_id, $con);

			
		}
		return $this->aHrEmployee;
	}

} 