<?php


abstract class BaseTkPrepostSummary extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $prepost_batch;


	
	protected $description;


	
	protected $ot_hr;


	
	protected $ut_hr;


	
	protected $absences_hr;


	
	protected $ot_pay;


	
	protected $ut_ded;


	
	protected $absences_ded;


	
	protected $post_batch;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;


	
	protected $tk_dtrmaster_id;


	
	protected $tk_dtrsummary_id;

	
	protected $aTkDtrmaster;

	
	protected $aTkDtrsummary;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPrepostBatch()
	{

		return $this->prepost_batch;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getOtHr()
	{

		return $this->ot_hr;
	}

	
	public function getUtHr()
	{

		return $this->ut_hr;
	}

	
	public function getAbsencesHr()
	{

		return $this->absences_hr;
	}

	
	public function getOtPay()
	{

		return $this->ot_pay;
	}

	
	public function getUtDed()
	{

		return $this->ut_ded;
	}

	
	public function getAbsencesDed()
	{

		return $this->absences_ded;
	}

	
	public function getPostBatch()
	{

		return $this->post_batch;
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

	
	public function getTkDtrmasterId()
	{

		return $this->tk_dtrmaster_id;
	}

	
	public function getTkDtrsummaryId()
	{

		return $this->tk_dtrsummary_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::ID;
		}

	} 
	
	public function setPrepostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->prepost_batch !== $v) {
			$this->prepost_batch = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::PREPOST_BATCH;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::DESCRIPTION;
		}

	} 
	
	public function setOtHr($v)
	{

		if ($this->ot_hr !== $v) {
			$this->ot_hr = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::OT_HR;
		}

	} 
	
	public function setUtHr($v)
	{

		if ($this->ut_hr !== $v) {
			$this->ut_hr = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::UT_HR;
		}

	} 
	
	public function setAbsencesHr($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->absences_hr !== $v) {
			$this->absences_hr = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::ABSENCES_HR;
		}

	} 
	
	public function setOtPay($v)
	{

		if ($this->ot_pay !== $v) {
			$this->ot_pay = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::OT_PAY;
		}

	} 
	
	public function setUtDed($v)
	{

		if ($this->ut_ded !== $v) {
			$this->ut_ded = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::UT_DED;
		}

	} 
	
	public function setAbsencesDed($v)
	{

		if ($this->absences_ded !== $v) {
			$this->absences_ded = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::ABSENCES_DED;
		}

	} 
	
	public function setPostBatch($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->post_batch !== $v) {
			$this->post_batch = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::POST_BATCH;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = TkPrepostSummaryPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = TkPrepostSummaryPeer::DATE_MODIFIED;
		}

	} 
	
	public function setTkDtrmasterId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tk_dtrmaster_id !== $v) {
			$this->tk_dtrmaster_id = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::TK_DTRMASTER_ID;
		}

		if ($this->aTkDtrmaster !== null && $this->aTkDtrmaster->getId() !== $v) {
			$this->aTkDtrmaster = null;
		}

	} 
	
	public function setTkDtrsummaryId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tk_dtrsummary_id !== $v) {
			$this->tk_dtrsummary_id = $v;
			$this->modifiedColumns[] = TkPrepostSummaryPeer::TK_DTRSUMMARY_ID;
		}

		if ($this->aTkDtrsummary !== null && $this->aTkDtrsummary->getId() !== $v) {
			$this->aTkDtrsummary = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->prepost_batch = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->ot_hr = $rs->getFloat($startcol + 3);

			$this->ut_hr = $rs->getFloat($startcol + 4);

			$this->absences_hr = $rs->getInt($startcol + 5);

			$this->ot_pay = $rs->getFloat($startcol + 6);

			$this->ut_ded = $rs->getFloat($startcol + 7);

			$this->absences_ded = $rs->getFloat($startcol + 8);

			$this->post_batch = $rs->getString($startcol + 9);

			$this->created_by = $rs->getString($startcol + 10);

			$this->date_created = $rs->getTimestamp($startcol + 11, null);

			$this->modified_by = $rs->getString($startcol + 12);

			$this->date_modified = $rs->getTimestamp($startcol + 13, null);

			$this->tk_dtrmaster_id = $rs->getString($startcol + 14);

			$this->tk_dtrsummary_id = $rs->getString($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TkPrepostSummary object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TkPrepostSummaryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TkPrepostSummaryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TkPrepostSummaryPeer::DATABASE_NAME);
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


												
			if ($this->aTkDtrmaster !== null) {
				if ($this->aTkDtrmaster->isModified()) {
					$affectedRows += $this->aTkDtrmaster->save($con);
				}
				$this->setTkDtrmaster($this->aTkDtrmaster);
			}

			if ($this->aTkDtrsummary !== null) {
				if ($this->aTkDtrsummary->isModified()) {
					$affectedRows += $this->aTkDtrsummary->save($con);
				}
				$this->setTkDtrsummary($this->aTkDtrsummary);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TkPrepostSummaryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TkPrepostSummaryPeer::doUpdate($this, $con);
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


												
			if ($this->aTkDtrmaster !== null) {
				if (!$this->aTkDtrmaster->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTkDtrmaster->getValidationFailures());
				}
			}

			if ($this->aTkDtrsummary !== null) {
				if (!$this->aTkDtrsummary->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTkDtrsummary->getValidationFailures());
				}
			}


			if (($retval = TkPrepostSummaryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkPrepostSummaryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPrepostBatch();
				break;
			case 2:
				return $this->getDescription();
				break;
			case 3:
				return $this->getOtHr();
				break;
			case 4:
				return $this->getUtHr();
				break;
			case 5:
				return $this->getAbsencesHr();
				break;
			case 6:
				return $this->getOtPay();
				break;
			case 7:
				return $this->getUtDed();
				break;
			case 8:
				return $this->getAbsencesDed();
				break;
			case 9:
				return $this->getPostBatch();
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
			case 14:
				return $this->getTkDtrmasterId();
				break;
			case 15:
				return $this->getTkDtrsummaryId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkPrepostSummaryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPrepostBatch(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getOtHr(),
			$keys[4] => $this->getUtHr(),
			$keys[5] => $this->getAbsencesHr(),
			$keys[6] => $this->getOtPay(),
			$keys[7] => $this->getUtDed(),
			$keys[8] => $this->getAbsencesDed(),
			$keys[9] => $this->getPostBatch(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getDateCreated(),
			$keys[12] => $this->getModifiedBy(),
			$keys[13] => $this->getDateModified(),
			$keys[14] => $this->getTkDtrmasterId(),
			$keys[15] => $this->getTkDtrsummaryId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TkPrepostSummaryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPrepostBatch($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
			case 3:
				$this->setOtHr($value);
				break;
			case 4:
				$this->setUtHr($value);
				break;
			case 5:
				$this->setAbsencesHr($value);
				break;
			case 6:
				$this->setOtPay($value);
				break;
			case 7:
				$this->setUtDed($value);
				break;
			case 8:
				$this->setAbsencesDed($value);
				break;
			case 9:
				$this->setPostBatch($value);
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
			case 14:
				$this->setTkDtrmasterId($value);
				break;
			case 15:
				$this->setTkDtrsummaryId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TkPrepostSummaryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrepostBatch($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOtHr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUtHr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAbsencesHr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOtPay($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUtDed($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAbsencesDed($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPostBatch($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateCreated($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setModifiedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDateModified($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTkDtrmasterId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTkDtrsummaryId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TkPrepostSummaryPeer::DATABASE_NAME);

		if ($this->isColumnModified(TkPrepostSummaryPeer::ID)) $criteria->add(TkPrepostSummaryPeer::ID, $this->id);
		if ($this->isColumnModified(TkPrepostSummaryPeer::PREPOST_BATCH)) $criteria->add(TkPrepostSummaryPeer::PREPOST_BATCH, $this->prepost_batch);
		if ($this->isColumnModified(TkPrepostSummaryPeer::DESCRIPTION)) $criteria->add(TkPrepostSummaryPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(TkPrepostSummaryPeer::OT_HR)) $criteria->add(TkPrepostSummaryPeer::OT_HR, $this->ot_hr);
		if ($this->isColumnModified(TkPrepostSummaryPeer::UT_HR)) $criteria->add(TkPrepostSummaryPeer::UT_HR, $this->ut_hr);
		if ($this->isColumnModified(TkPrepostSummaryPeer::ABSENCES_HR)) $criteria->add(TkPrepostSummaryPeer::ABSENCES_HR, $this->absences_hr);
		if ($this->isColumnModified(TkPrepostSummaryPeer::OT_PAY)) $criteria->add(TkPrepostSummaryPeer::OT_PAY, $this->ot_pay);
		if ($this->isColumnModified(TkPrepostSummaryPeer::UT_DED)) $criteria->add(TkPrepostSummaryPeer::UT_DED, $this->ut_ded);
		if ($this->isColumnModified(TkPrepostSummaryPeer::ABSENCES_DED)) $criteria->add(TkPrepostSummaryPeer::ABSENCES_DED, $this->absences_ded);
		if ($this->isColumnModified(TkPrepostSummaryPeer::POST_BATCH)) $criteria->add(TkPrepostSummaryPeer::POST_BATCH, $this->post_batch);
		if ($this->isColumnModified(TkPrepostSummaryPeer::CREATED_BY)) $criteria->add(TkPrepostSummaryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TkPrepostSummaryPeer::DATE_CREATED)) $criteria->add(TkPrepostSummaryPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(TkPrepostSummaryPeer::MODIFIED_BY)) $criteria->add(TkPrepostSummaryPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(TkPrepostSummaryPeer::DATE_MODIFIED)) $criteria->add(TkPrepostSummaryPeer::DATE_MODIFIED, $this->date_modified);
		if ($this->isColumnModified(TkPrepostSummaryPeer::TK_DTRMASTER_ID)) $criteria->add(TkPrepostSummaryPeer::TK_DTRMASTER_ID, $this->tk_dtrmaster_id);
		if ($this->isColumnModified(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID)) $criteria->add(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, $this->tk_dtrsummary_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TkPrepostSummaryPeer::DATABASE_NAME);

		$criteria->add(TkPrepostSummaryPeer::ID, $this->id);

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

		$copyObj->setPrepostBatch($this->prepost_batch);

		$copyObj->setDescription($this->description);

		$copyObj->setOtHr($this->ot_hr);

		$copyObj->setUtHr($this->ut_hr);

		$copyObj->setAbsencesHr($this->absences_hr);

		$copyObj->setOtPay($this->ot_pay);

		$copyObj->setUtDed($this->ut_ded);

		$copyObj->setAbsencesDed($this->absences_ded);

		$copyObj->setPostBatch($this->post_batch);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);

		$copyObj->setTkDtrmasterId($this->tk_dtrmaster_id);

		$copyObj->setTkDtrsummaryId($this->tk_dtrsummary_id);


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
			self::$peer = new TkPrepostSummaryPeer();
		}
		return self::$peer;
	}

	
	public function setTkDtrmaster($v)
	{


		if ($v === null) {
			$this->setTkDtrmasterId(NULL);
		} else {
			$this->setTkDtrmasterId($v->getId());
		}


		$this->aTkDtrmaster = $v;
	}


	
	public function getTkDtrmaster($con = null)
	{
		if ($this->aTkDtrmaster === null && (($this->tk_dtrmaster_id !== "" && $this->tk_dtrmaster_id !== null))) {
						include_once 'lib/model/hr/om/BaseTkDtrmasterPeer.php';

			$this->aTkDtrmaster = TkDtrmasterPeer::retrieveByPK($this->tk_dtrmaster_id, $con);

			
		}
		return $this->aTkDtrmaster;
	}

	
	public function setTkDtrsummary($v)
	{


		if ($v === null) {
			$this->setTkDtrsummaryId(NULL);
		} else {
			$this->setTkDtrsummaryId($v->getId());
		}


		$this->aTkDtrsummary = $v;
	}


	
	public function getTkDtrsummary($con = null)
	{
		if ($this->aTkDtrsummary === null && (($this->tk_dtrsummary_id !== "" && $this->tk_dtrsummary_id !== null))) {
						include_once 'lib/model/hr/om/BaseTkDtrsummaryPeer.php';

			$this->aTkDtrsummary = TkDtrsummaryPeer::retrieveByPK($this->tk_dtrsummary_id, $con);

			
		}
		return $this->aTkDtrsummary;
	}

} 