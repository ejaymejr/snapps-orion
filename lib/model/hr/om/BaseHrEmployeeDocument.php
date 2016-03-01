<?php


abstract class BaseHrEmployeeDocument extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no;


	
	protected $name;


	
	protected $file_name;


	
	protected $file_name_original;


	
	protected $mime_type;


	
	protected $size;


	
	protected $description;


	
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

	
	public function getFileName()
	{

		return $this->file_name;
	}

	
	public function getFileNameOriginal()
	{

		return $this->file_name_original;
	}

	
	public function getMimeType()
	{

		return $this->mime_type;
	}

	
	public function getSize()
	{

		return $this->size;
	}

	
	public function getDescription()
	{

		return $this->description;
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
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v) {
			$this->employee_no = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::NAME;
		}

	} 
	
	public function setFileName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name !== $v) {
			$this->file_name = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::FILE_NAME;
		}

	} 
	
	public function setFileNameOriginal($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name_original !== $v) {
			$this->file_name_original = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL;
		}

	} 
	
	public function setMimeType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mime_type !== $v) {
			$this->mime_type = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::MIME_TYPE;
		}

	} 
	
	public function setSize($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->size !== $v) {
			$this->size = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::SIZE;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::DESCRIPTION;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::CREATED_BY;
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
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrEmployeeDocumentPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->file_name = $rs->getString($startcol + 3);

			$this->file_name_original = $rs->getString($startcol + 4);

			$this->mime_type = $rs->getString($startcol + 5);

			$this->size = $rs->getInt($startcol + 6);

			$this->description = $rs->getString($startcol + 7);

			$this->created_by = $rs->getString($startcol + 8);

			$this->date_created = $rs->getTimestamp($startcol + 9, null);

			$this->modified_by = $rs->getString($startcol + 10);

			$this->date_modified = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeDocument object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeDocumentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeDocumentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeDocumentPeer::DATABASE_NAME);
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
					$pk = HrEmployeeDocumentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeDocumentPeer::doUpdate($this, $con);
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


			if (($retval = HrEmployeeDocumentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFileName();
				break;
			case 4:
				return $this->getFileNameOriginal();
				break;
			case 5:
				return $this->getMimeType();
				break;
			case 6:
				return $this->getSize();
				break;
			case 7:
				return $this->getDescription();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getDateCreated();
				break;
			case 10:
				return $this->getModifiedBy();
				break;
			case 11:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeDocumentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getFileName(),
			$keys[4] => $this->getFileNameOriginal(),
			$keys[5] => $this->getMimeType(),
			$keys[6] => $this->getSize(),
			$keys[7] => $this->getDescription(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getDateCreated(),
			$keys[10] => $this->getModifiedBy(),
			$keys[11] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFileName($value);
				break;
			case 4:
				$this->setFileNameOriginal($value);
				break;
			case 5:
				$this->setMimeType($value);
				break;
			case 6:
				$this->setSize($value);
				break;
			case 7:
				$this->setDescription($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setDateCreated($value);
				break;
			case 10:
				$this->setModifiedBy($value);
				break;
			case 11:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeDocumentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFileName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFileNameOriginal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMimeType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSize($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDateCreated($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setModifiedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateModified($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeDocumentPeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeDocumentPeer::ID)) $criteria->add(HrEmployeeDocumentPeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::EMPLOYEE_NO)) $criteria->add(HrEmployeeDocumentPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::NAME)) $criteria->add(HrEmployeeDocumentPeer::NAME, $this->name);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::FILE_NAME)) $criteria->add(HrEmployeeDocumentPeer::FILE_NAME, $this->file_name);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL)) $criteria->add(HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL, $this->file_name_original);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::MIME_TYPE)) $criteria->add(HrEmployeeDocumentPeer::MIME_TYPE, $this->mime_type);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::SIZE)) $criteria->add(HrEmployeeDocumentPeer::SIZE, $this->size);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::DESCRIPTION)) $criteria->add(HrEmployeeDocumentPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::CREATED_BY)) $criteria->add(HrEmployeeDocumentPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::DATE_CREATED)) $criteria->add(HrEmployeeDocumentPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::MODIFIED_BY)) $criteria->add(HrEmployeeDocumentPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeDocumentPeer::DATE_MODIFIED)) $criteria->add(HrEmployeeDocumentPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeDocumentPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeDocumentPeer::ID, $this->id);

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

		$copyObj->setFileName($this->file_name);

		$copyObj->setFileNameOriginal($this->file_name_original);

		$copyObj->setMimeType($this->mime_type);

		$copyObj->setSize($this->size);

		$copyObj->setDescription($this->description);

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
			self::$peer = new HrEmployeeDocumentPeer();
		}
		return self::$peer;
	}

} 