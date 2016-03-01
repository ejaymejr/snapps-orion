<?php


abstract class BaseContribEmployeeIr8aPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'contrib_employee_ir8a';

	
	const CLASS_DEFAULT = 'lib.model.hr.ContribEmployeeIr8a';

	
	const NUM_COLUMNS = 31;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'contrib_employee_ir8a.ID';

	
	const EMPLOYEE_NO = 'contrib_employee_ir8a.EMPLOYEE_NO';

	
	const NAME = 'contrib_employee_ir8a.NAME';

	
	const COMPANY = 'contrib_employee_ir8a.COMPANY';

	
	const PERIOD_CODE = 'contrib_employee_ir8a.PERIOD_CODE';

	
	const NATIONALITY = 'contrib_employee_ir8a.NATIONALITY';

	
	const NATIONALITY_CODE = 'contrib_employee_ir8a.NATIONALITY_CODE';

	
	const ADDRESS = 'contrib_employee_ir8a.ADDRESS';

	
	const FROM = 'contrib_employee_ir8a.FROM';

	
	const TO = 'contrib_employee_ir8a.TO';

	
	const AMOUNT = 'contrib_employee_ir8a.AMOUNT';

	
	const MBF = 'contrib_employee_ir8a.MBF';

	
	const DONATION = 'contrib_employee_ir8a.DONATION';

	
	const CPF = 'contrib_employee_ir8a.CPF';

	
	const INSURANCE = 'contrib_employee_ir8a.INSURANCE';

	
	const SALARY = 'contrib_employee_ir8a.SALARY';

	
	const BONUS = 'contrib_employee_ir8a.BONUS';

	
	const DIRECTORS_FEE = 'contrib_employee_ir8a.DIRECTORS_FEE';

	
	const OTHER_FEE = 'contrib_employee_ir8a.OTHER_FEE';

	
	const COMMISSION = 'contrib_employee_ir8a.COMMISSION';

	
	const TRANSPORT_ALLOWANCE = 'contrib_employee_ir8a.TRANSPORT_ALLOWANCE';

	
	const ENTERTAINMENT = 'contrib_employee_ir8a.ENTERTAINMENT';

	
	const OTHER_ALLOWANCE = 'contrib_employee_ir8a.OTHER_ALLOWANCE';

	
	const GROSS_INC = 'contrib_employee_ir8a.GROSS_INC';

	
	const GROSS_DED = 'contrib_employee_ir8a.GROSS_DED';

	
	const CPF_EM = 'contrib_employee_ir8a.CPF_EM';

	
	const CPF_ER = 'contrib_employee_ir8a.CPF_ER';

	
	const CREATED_BY = 'contrib_employee_ir8a.CREATED_BY';

	
	const DATE_CREATED = 'contrib_employee_ir8a.DATE_CREATED';

	
	const MODIFIED_BY = 'contrib_employee_ir8a.MODIFIED_BY';

	
	const DATE_MODIFIED = 'contrib_employee_ir8a.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Company', 'PeriodCode', 'Nationality', 'NationalityCode', 'Address', 'From', 'To', 'Amount', 'Mbf', 'Donation', 'Cpf', 'Insurance', 'Salary', 'Bonus', 'DirectorsFee', 'OtherFee', 'Commission', 'TransportAllowance', 'Entertainment', 'OtherAllowance', 'GrossInc', 'GrossDed', 'CpfEm', 'CpfEr', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (ContribEmployeeIr8aPeer::ID, ContribEmployeeIr8aPeer::EMPLOYEE_NO, ContribEmployeeIr8aPeer::NAME, ContribEmployeeIr8aPeer::COMPANY, ContribEmployeeIr8aPeer::PERIOD_CODE, ContribEmployeeIr8aPeer::NATIONALITY, ContribEmployeeIr8aPeer::NATIONALITY_CODE, ContribEmployeeIr8aPeer::ADDRESS, ContribEmployeeIr8aPeer::FROM, ContribEmployeeIr8aPeer::TO, ContribEmployeeIr8aPeer::AMOUNT, ContribEmployeeIr8aPeer::MBF, ContribEmployeeIr8aPeer::DONATION, ContribEmployeeIr8aPeer::CPF, ContribEmployeeIr8aPeer::INSURANCE, ContribEmployeeIr8aPeer::SALARY, ContribEmployeeIr8aPeer::BONUS, ContribEmployeeIr8aPeer::DIRECTORS_FEE, ContribEmployeeIr8aPeer::OTHER_FEE, ContribEmployeeIr8aPeer::COMMISSION, ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE, ContribEmployeeIr8aPeer::ENTERTAINMENT, ContribEmployeeIr8aPeer::OTHER_ALLOWANCE, ContribEmployeeIr8aPeer::GROSS_INC, ContribEmployeeIr8aPeer::GROSS_DED, ContribEmployeeIr8aPeer::CPF_EM, ContribEmployeeIr8aPeer::CPF_ER, ContribEmployeeIr8aPeer::CREATED_BY, ContribEmployeeIr8aPeer::DATE_CREATED, ContribEmployeeIr8aPeer::MODIFIED_BY, ContribEmployeeIr8aPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'company', 'period_code', 'nationality', 'nationality_code', 'address', 'from', 'to', 'amount', 'mbf', 'donation', 'cpf', 'insurance', 'salary', 'bonus', 'directors_fee', 'other_fee', 'commission', 'transport_allowance', 'entertainment', 'other_allowance', 'gross_inc', 'gross_ded', 'cpf_em', 'cpf_er', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Company' => 3, 'PeriodCode' => 4, 'Nationality' => 5, 'NationalityCode' => 6, 'Address' => 7, 'From' => 8, 'To' => 9, 'Amount' => 10, 'Mbf' => 11, 'Donation' => 12, 'Cpf' => 13, 'Insurance' => 14, 'Salary' => 15, 'Bonus' => 16, 'DirectorsFee' => 17, 'OtherFee' => 18, 'Commission' => 19, 'TransportAllowance' => 20, 'Entertainment' => 21, 'OtherAllowance' => 22, 'GrossInc' => 23, 'GrossDed' => 24, 'CpfEm' => 25, 'CpfEr' => 26, 'CreatedBy' => 27, 'DateCreated' => 28, 'ModifiedBy' => 29, 'DateModified' => 30, ),
		BasePeer::TYPE_COLNAME => array (ContribEmployeeIr8aPeer::ID => 0, ContribEmployeeIr8aPeer::EMPLOYEE_NO => 1, ContribEmployeeIr8aPeer::NAME => 2, ContribEmployeeIr8aPeer::COMPANY => 3, ContribEmployeeIr8aPeer::PERIOD_CODE => 4, ContribEmployeeIr8aPeer::NATIONALITY => 5, ContribEmployeeIr8aPeer::NATIONALITY_CODE => 6, ContribEmployeeIr8aPeer::ADDRESS => 7, ContribEmployeeIr8aPeer::FROM => 8, ContribEmployeeIr8aPeer::TO => 9, ContribEmployeeIr8aPeer::AMOUNT => 10, ContribEmployeeIr8aPeer::MBF => 11, ContribEmployeeIr8aPeer::DONATION => 12, ContribEmployeeIr8aPeer::CPF => 13, ContribEmployeeIr8aPeer::INSURANCE => 14, ContribEmployeeIr8aPeer::SALARY => 15, ContribEmployeeIr8aPeer::BONUS => 16, ContribEmployeeIr8aPeer::DIRECTORS_FEE => 17, ContribEmployeeIr8aPeer::OTHER_FEE => 18, ContribEmployeeIr8aPeer::COMMISSION => 19, ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE => 20, ContribEmployeeIr8aPeer::ENTERTAINMENT => 21, ContribEmployeeIr8aPeer::OTHER_ALLOWANCE => 22, ContribEmployeeIr8aPeer::GROSS_INC => 23, ContribEmployeeIr8aPeer::GROSS_DED => 24, ContribEmployeeIr8aPeer::CPF_EM => 25, ContribEmployeeIr8aPeer::CPF_ER => 26, ContribEmployeeIr8aPeer::CREATED_BY => 27, ContribEmployeeIr8aPeer::DATE_CREATED => 28, ContribEmployeeIr8aPeer::MODIFIED_BY => 29, ContribEmployeeIr8aPeer::DATE_MODIFIED => 30, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'company' => 3, 'period_code' => 4, 'nationality' => 5, 'nationality_code' => 6, 'address' => 7, 'from' => 8, 'to' => 9, 'amount' => 10, 'mbf' => 11, 'donation' => 12, 'cpf' => 13, 'insurance' => 14, 'salary' => 15, 'bonus' => 16, 'directors_fee' => 17, 'other_fee' => 18, 'commission' => 19, 'transport_allowance' => 20, 'entertainment' => 21, 'other_allowance' => 22, 'gross_inc' => 23, 'gross_ded' => 24, 'cpf_em' => 25, 'cpf_er' => 26, 'created_by' => 27, 'date_created' => 28, 'modified_by' => 29, 'date_modified' => 30, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/ContribEmployeeIr8aMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.ContribEmployeeIr8aMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContribEmployeeIr8aPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ContribEmployeeIr8aPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::ID);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::NAME);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::COMPANY);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::PERIOD_CODE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::NATIONALITY);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::NATIONALITY_CODE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::ADDRESS);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::FROM);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::TO);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::AMOUNT);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::MBF);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::DONATION);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::CPF);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::INSURANCE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::SALARY);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::BONUS);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::DIRECTORS_FEE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::OTHER_FEE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::COMMISSION);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::TRANSPORT_ALLOWANCE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::ENTERTAINMENT);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::OTHER_ALLOWANCE);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::GROSS_INC);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::GROSS_DED);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::CPF_EM);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::CPF_ER);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::CREATED_BY);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::DATE_CREATED);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::MODIFIED_BY);

		$criteria->addSelectColumn(ContribEmployeeIr8aPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(contrib_employee_ir8a.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contrib_employee_ir8a.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContribEmployeeIr8aPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContribEmployeeIr8aPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContribEmployeeIr8aPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ContribEmployeeIr8aPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContribEmployeeIr8aPeer::populateObjects(ContribEmployeeIr8aPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContribEmployeeIr8aPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContribEmployeeIr8aPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ContribEmployeeIr8aPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ContribEmployeeIr8aPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ContribEmployeeIr8aPeer::ID);
			$selectCriteria->add(ContribEmployeeIr8aPeer::ID, $criteria->remove(ContribEmployeeIr8aPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ContribEmployeeIr8aPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ContribEmployeeIr8aPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContribEmployeeIr8a) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContribEmployeeIr8aPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(ContribEmployeeIr8a $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContribEmployeeIr8aPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContribEmployeeIr8aPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ContribEmployeeIr8aPeer::DATABASE_NAME, ContribEmployeeIr8aPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContribEmployeeIr8aPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ContribEmployeeIr8aPeer::DATABASE_NAME);

		$criteria->add(ContribEmployeeIr8aPeer::ID, $pk);


		$v = ContribEmployeeIr8aPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ContribEmployeeIr8aPeer::ID, $pks, Criteria::IN);
			$objs = ContribEmployeeIr8aPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContribEmployeeIr8aPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/ContribEmployeeIr8aMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.ContribEmployeeIr8aMapBuilder');
}
