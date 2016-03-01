<?php


abstract class BaseFullEmployeePayFinal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $employee_no = 'null';


	
	protected $name = 'null';


	
	protected $company = 'null';


	
	protected $hourly_rate = 0;


	
	protected $nationality = 'null';


	
	protected $type_of_employement = 'null';


	
	protected $ot1 = 0;


	
	protected $ot2 = 0;


	
	protected $ot3 = 0;


	
	protected $ot_amount = 0;


	
	protected $advance_pay = 0;


	
	protected $total = 0;


	
	protected $account_no = 'null';

	
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

	
	public function getHourlyRate()
	{

		return $this->hourly_rate;
	}

	
	public function getNationality()
	{

		return $this->nationality;
	}

	
	public function getTypeOfEmployement()
	{

		return $this->type_of_employement;
	}

	
	public function getOt1()
	{

		return $this->ot1;
	}

	
	public function getOt2()
	{

		return $this->ot2;
	}

	
	public function getOt3()
	{

		return $this->ot3;
	}

	
	public function getOtAmount()
	{

		return $this->ot_amount;
	}

	
	public function getAdvancePay()
	{

		return $this->advance_pay;
	}

	
	public function getTotal()
	{

		return $this->total;
	}

	
	public function getAccountNo()
	{

		return $this->account_no;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::ID;
		}

	} 
	
	public function setEmployeeNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->employee_no !== $v || $v === 'null') {
			$this->employee_no = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::EMPLOYEE_NO;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v || $v === 'null') {
			$this->name = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::NAME;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v || $v === 'null') {
			$this->company = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::COMPANY;
		}

	} 
	
	public function setHourlyRate($v)
	{

		if ($this->hourly_rate !== $v || $v === 0) {
			$this->hourly_rate = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::HOURLY_RATE;
		}

	} 
	
	public function setNationality($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nationality !== $v || $v === 'null') {
			$this->nationality = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::NATIONALITY;
		}

	} 
	
	public function setTypeOfEmployement($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type_of_employement !== $v || $v === 'null') {
			$this->type_of_employement = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT;
		}

	} 
	
	public function setOt1($v)
	{

		if ($this->ot1 !== $v || $v === 0) {
			$this->ot1 = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::OT1;
		}

	} 
	
	public function setOt2($v)
	{

		if ($this->ot2 !== $v || $v === 0) {
			$this->ot2 = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::OT2;
		}

	} 
	
	public function setOt3($v)
	{

		if ($this->ot3 !== $v || $v === 0) {
			$this->ot3 = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::OT3;
		}

	} 
	
	public function setOtAmount($v)
	{

		if ($this->ot_amount !== $v || $v === 0) {
			$this->ot_amount = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::OT_AMOUNT;
		}

	} 
	
	public function setAdvancePay($v)
	{

		if ($this->advance_pay !== $v || $v === 0) {
			$this->advance_pay = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::ADVANCE_PAY;
		}

	} 
	
	public function setTotal($v)
	{

		if ($this->total !== $v || $v === 0) {
			$this->total = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::TOTAL;
		}

	} 
	
	public function setAccountNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->account_no !== $v || $v === 'null') {
			$this->account_no = $v;
			$this->modifiedColumns[] = FullEmployeePayFinalPeer::ACCOUNT_NO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->employee_no = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->company = $rs->getString($startcol + 3);

			$this->hourly_rate = $rs->getFloat($startcol + 4);

			$this->nationality = $rs->getString($startcol + 5);

			$this->type_of_employement = $rs->getString($startcol + 6);

			$this->ot1 = $rs->getFloat($startcol + 7);

			$this->ot2 = $rs->getFloat($startcol + 8);

			$this->ot3 = $rs->getFloat($startcol + 9);

			$this->ot_amount = $rs->getFloat($startcol + 10);

			$this->advance_pay = $rs->getFloat($startcol + 11);

			$this->total = $rs->getFloat($startcol + 12);

			$this->account_no = $rs->getString($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FullEmployeePayFinal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FullEmployeePayFinalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FullEmployeePayFinalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FullEmployeePayFinalPeer::DATABASE_NAME);
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
					$pk = FullEmployeePayFinalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FullEmployeePayFinalPeer::doUpdate($this, $con);
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


			if (($retval = FullEmployeePayFinalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FullEmployeePayFinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getHourlyRate();
				break;
			case 5:
				return $this->getNationality();
				break;
			case 6:
				return $this->getTypeOfEmployement();
				break;
			case 7:
				return $this->getOt1();
				break;
			case 8:
				return $this->getOt2();
				break;
			case 9:
				return $this->getOt3();
				break;
			case 10:
				return $this->getOtAmount();
				break;
			case 11:
				return $this->getAdvancePay();
				break;
			case 12:
				return $this->getTotal();
				break;
			case 13:
				return $this->getAccountNo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FullEmployeePayFinalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmployeeNo(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getCompany(),
			$keys[4] => $this->getHourlyRate(),
			$keys[5] => $this->getNationality(),
			$keys[6] => $this->getTypeOfEmployement(),
			$keys[7] => $this->getOt1(),
			$keys[8] => $this->getOt2(),
			$keys[9] => $this->getOt3(),
			$keys[10] => $this->getOtAmount(),
			$keys[11] => $this->getAdvancePay(),
			$keys[12] => $this->getTotal(),
			$keys[13] => $this->getAccountNo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FullEmployeePayFinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setHourlyRate($value);
				break;
			case 5:
				$this->setNationality($value);
				break;
			case 6:
				$this->setTypeOfEmployement($value);
				break;
			case 7:
				$this->setOt1($value);
				break;
			case 8:
				$this->setOt2($value);
				break;
			case 9:
				$this->setOt3($value);
				break;
			case 10:
				$this->setOtAmount($value);
				break;
			case 11:
				$this->setAdvancePay($value);
				break;
			case 12:
				$this->setTotal($value);
				break;
			case 13:
				$this->setAccountNo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FullEmployeePayFinalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmployeeNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCompany($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHourlyRate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNationality($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTypeOfEmployement($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOt1($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setOt2($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOt3($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setOtAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAdvancePay($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTotal($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAccountNo($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FullEmployeePayFinalPeer::DATABASE_NAME);

		if ($this->isColumnModified(FullEmployeePayFinalPeer::ID)) $criteria->add(FullEmployeePayFinalPeer::ID, $this->id);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::EMPLOYEE_NO)) $criteria->add(FullEmployeePayFinalPeer::EMPLOYEE_NO, $this->employee_no);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::NAME)) $criteria->add(FullEmployeePayFinalPeer::NAME, $this->name);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::COMPANY)) $criteria->add(FullEmployeePayFinalPeer::COMPANY, $this->company);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::HOURLY_RATE)) $criteria->add(FullEmployeePayFinalPeer::HOURLY_RATE, $this->hourly_rate);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::NATIONALITY)) $criteria->add(FullEmployeePayFinalPeer::NATIONALITY, $this->nationality);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT)) $criteria->add(FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT, $this->type_of_employement);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::OT1)) $criteria->add(FullEmployeePayFinalPeer::OT1, $this->ot1);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::OT2)) $criteria->add(FullEmployeePayFinalPeer::OT2, $this->ot2);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::OT3)) $criteria->add(FullEmployeePayFinalPeer::OT3, $this->ot3);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::OT_AMOUNT)) $criteria->add(FullEmployeePayFinalPeer::OT_AMOUNT, $this->ot_amount);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::ADVANCE_PAY)) $criteria->add(FullEmployeePayFinalPeer::ADVANCE_PAY, $this->advance_pay);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::TOTAL)) $criteria->add(FullEmployeePayFinalPeer::TOTAL, $this->total);
		if ($this->isColumnModified(FullEmployeePayFinalPeer::ACCOUNT_NO)) $criteria->add(FullEmployeePayFinalPeer::ACCOUNT_NO, $this->account_no);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FullEmployeePayFinalPeer::DATABASE_NAME);

		$criteria->add(FullEmployeePayFinalPeer::ID, $this->id);

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

		$copyObj->setHourlyRate($this->hourly_rate);

		$copyObj->setNationality($this->nationality);

		$copyObj->setTypeOfEmployement($this->type_of_employement);

		$copyObj->setOt1($this->ot1);

		$copyObj->setOt2($this->ot2);

		$copyObj->setOt3($this->ot3);

		$copyObj->setOtAmount($this->ot_amount);

		$copyObj->setAdvancePay($this->advance_pay);

		$copyObj->setTotal($this->total);

		$copyObj->setAccountNo($this->account_no);


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
			self::$peer = new FullEmployeePayFinalPeer();
		}
		return self::$peer;
	}

} 