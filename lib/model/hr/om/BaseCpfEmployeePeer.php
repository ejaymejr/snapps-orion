<?php


abstract class BaseCpfEmployeePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'cpf_employee';

	
	const CLASS_DEFAULT = 'lib.model.hr.CpfEmployee';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cpf_employee.ID';

	
	const EMPLOYEE_NO = 'cpf_employee.EMPLOYEE_NO';

	
	const NAME = 'cpf_employee.NAME';

	
	const DEPARTMENT = 'cpf_employee.DEPARTMENT';

	
	const COMPANY = 'cpf_employee.COMPANY';

	
	const FREQUENCY = 'cpf_employee.FREQUENCY';

	
	const PERIOD_CODE = 'cpf_employee.PERIOD_CODE';

	
	const ACCT_CODE = 'cpf_employee.ACCT_CODE';

	
	const DESCRIPTION = 'cpf_employee.DESCRIPTION';

	
	const AMOUNT = 'cpf_employee.AMOUNT';

	
	const CREATED_BY = 'cpf_employee.CREATED_BY';

	
	const DATE_CREATED = 'cpf_employee.DATE_CREATED';

	
	const MODIFIED_BY = 'cpf_employee.MODIFIED_BY';

	
	const DATE_MODIFIED = 'cpf_employee.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'Company', 'Frequency', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (CpfEmployeePeer::ID, CpfEmployeePeer::EMPLOYEE_NO, CpfEmployeePeer::NAME, CpfEmployeePeer::DEPARTMENT, CpfEmployeePeer::COMPANY, CpfEmployeePeer::FREQUENCY, CpfEmployeePeer::PERIOD_CODE, CpfEmployeePeer::ACCT_CODE, CpfEmployeePeer::DESCRIPTION, CpfEmployeePeer::AMOUNT, CpfEmployeePeer::CREATED_BY, CpfEmployeePeer::DATE_CREATED, CpfEmployeePeer::MODIFIED_BY, CpfEmployeePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'company', 'frequency', 'period_code', 'acct_code', 'description', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'Company' => 4, 'Frequency' => 5, 'PeriodCode' => 6, 'AcctCode' => 7, 'Description' => 8, 'Amount' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (CpfEmployeePeer::ID => 0, CpfEmployeePeer::EMPLOYEE_NO => 1, CpfEmployeePeer::NAME => 2, CpfEmployeePeer::DEPARTMENT => 3, CpfEmployeePeer::COMPANY => 4, CpfEmployeePeer::FREQUENCY => 5, CpfEmployeePeer::PERIOD_CODE => 6, CpfEmployeePeer::ACCT_CODE => 7, CpfEmployeePeer::DESCRIPTION => 8, CpfEmployeePeer::AMOUNT => 9, CpfEmployeePeer::CREATED_BY => 10, CpfEmployeePeer::DATE_CREATED => 11, CpfEmployeePeer::MODIFIED_BY => 12, CpfEmployeePeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'company' => 4, 'frequency' => 5, 'period_code' => 6, 'acct_code' => 7, 'description' => 8, 'amount' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/CpfEmployeeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.CpfEmployeeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpfEmployeePeer::getTableMap();
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
		return str_replace(CpfEmployeePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpfEmployeePeer::ID);

		$criteria->addSelectColumn(CpfEmployeePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(CpfEmployeePeer::NAME);

		$criteria->addSelectColumn(CpfEmployeePeer::DEPARTMENT);

		$criteria->addSelectColumn(CpfEmployeePeer::COMPANY);

		$criteria->addSelectColumn(CpfEmployeePeer::FREQUENCY);

		$criteria->addSelectColumn(CpfEmployeePeer::PERIOD_CODE);

		$criteria->addSelectColumn(CpfEmployeePeer::ACCT_CODE);

		$criteria->addSelectColumn(CpfEmployeePeer::DESCRIPTION);

		$criteria->addSelectColumn(CpfEmployeePeer::AMOUNT);

		$criteria->addSelectColumn(CpfEmployeePeer::CREATED_BY);

		$criteria->addSelectColumn(CpfEmployeePeer::DATE_CREATED);

		$criteria->addSelectColumn(CpfEmployeePeer::MODIFIED_BY);

		$criteria->addSelectColumn(CpfEmployeePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(cpf_employee.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpf_employee.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpfEmployeePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpfEmployeePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpfEmployeePeer::doSelectRS($criteria, $con);
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
		$objects = CpfEmployeePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpfEmployeePeer::populateObjects(CpfEmployeePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpfEmployeePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpfEmployeePeer::getOMClass();
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
		return CpfEmployeePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpfEmployeePeer::ID); 

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
			$comparison = $criteria->getComparison(CpfEmployeePeer::ID);
			$selectCriteria->add(CpfEmployeePeer::ID, $criteria->remove(CpfEmployeePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpfEmployeePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpfEmployeePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CpfEmployee) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpfEmployeePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CpfEmployee $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpfEmployeePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpfEmployeePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpfEmployeePeer::DATABASE_NAME, CpfEmployeePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpfEmployeePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpfEmployeePeer::DATABASE_NAME);

		$criteria->add(CpfEmployeePeer::ID, $pk);


		$v = CpfEmployeePeer::doSelect($criteria, $con);

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
			$criteria->add(CpfEmployeePeer::ID, $pks, Criteria::IN);
			$objs = CpfEmployeePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpfEmployeePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/CpfEmployeeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.CpfEmployeeMapBuilder');
}
