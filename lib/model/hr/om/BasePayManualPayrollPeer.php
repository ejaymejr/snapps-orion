<?php


abstract class BasePayManualPayrollPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_manual_payroll';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayManualPayroll';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_manual_payroll.ID';

	
	const EMPLOYEE_NO = 'pay_manual_payroll.EMPLOYEE_NO';

	
	const NAME = 'pay_manual_payroll.NAME';

	
	const ACCT_CODE = 'pay_manual_payroll.ACCT_CODE';

	
	const DESCRIPTION = 'pay_manual_payroll.DESCRIPTION';

	
	const AMOUNT = 'pay_manual_payroll.AMOUNT';

	
	const INCOME_EXPENSE = 'pay_manual_payroll.INCOME_EXPENSE';

	
	const ACCT_SOURCE = 'pay_manual_payroll.ACCT_SOURCE';

	
	const PROCESSED_AS = 'pay_manual_payroll.PROCESSED_AS';

	
	const CREATED_BY = 'pay_manual_payroll.CREATED_BY';

	
	const DATE_CREATED = 'pay_manual_payroll.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_manual_payroll.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_manual_payroll.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'AcctCode', 'Description', 'Amount', 'IncomeExpense', 'AcctSource', 'ProcessedAs', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayManualPayrollPeer::ID, PayManualPayrollPeer::EMPLOYEE_NO, PayManualPayrollPeer::NAME, PayManualPayrollPeer::ACCT_CODE, PayManualPayrollPeer::DESCRIPTION, PayManualPayrollPeer::AMOUNT, PayManualPayrollPeer::INCOME_EXPENSE, PayManualPayrollPeer::ACCT_SOURCE, PayManualPayrollPeer::PROCESSED_AS, PayManualPayrollPeer::CREATED_BY, PayManualPayrollPeer::DATE_CREATED, PayManualPayrollPeer::MODIFIED_BY, PayManualPayrollPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'acct_code', 'description', 'amount', 'income_expense', 'acct_source', 'processed_as', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'AcctCode' => 3, 'Description' => 4, 'Amount' => 5, 'IncomeExpense' => 6, 'AcctSource' => 7, 'ProcessedAs' => 8, 'CreatedBy' => 9, 'DateCreated' => 10, 'ModifiedBy' => 11, 'DateModified' => 12, ),
		BasePeer::TYPE_COLNAME => array (PayManualPayrollPeer::ID => 0, PayManualPayrollPeer::EMPLOYEE_NO => 1, PayManualPayrollPeer::NAME => 2, PayManualPayrollPeer::ACCT_CODE => 3, PayManualPayrollPeer::DESCRIPTION => 4, PayManualPayrollPeer::AMOUNT => 5, PayManualPayrollPeer::INCOME_EXPENSE => 6, PayManualPayrollPeer::ACCT_SOURCE => 7, PayManualPayrollPeer::PROCESSED_AS => 8, PayManualPayrollPeer::CREATED_BY => 9, PayManualPayrollPeer::DATE_CREATED => 10, PayManualPayrollPeer::MODIFIED_BY => 11, PayManualPayrollPeer::DATE_MODIFIED => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'acct_code' => 3, 'description' => 4, 'amount' => 5, 'income_expense' => 6, 'acct_source' => 7, 'processed_as' => 8, 'created_by' => 9, 'date_created' => 10, 'modified_by' => 11, 'date_modified' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayManualPayrollMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayManualPayrollMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayManualPayrollPeer::getTableMap();
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
		return str_replace(PayManualPayrollPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayManualPayrollPeer::ID);

		$criteria->addSelectColumn(PayManualPayrollPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayManualPayrollPeer::NAME);

		$criteria->addSelectColumn(PayManualPayrollPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayManualPayrollPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayManualPayrollPeer::AMOUNT);

		$criteria->addSelectColumn(PayManualPayrollPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(PayManualPayrollPeer::ACCT_SOURCE);

		$criteria->addSelectColumn(PayManualPayrollPeer::PROCESSED_AS);

		$criteria->addSelectColumn(PayManualPayrollPeer::CREATED_BY);

		$criteria->addSelectColumn(PayManualPayrollPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayManualPayrollPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayManualPayrollPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_manual_payroll.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_manual_payroll.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayManualPayrollPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayManualPayrollPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayManualPayrollPeer::doSelectRS($criteria, $con);
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
		$objects = PayManualPayrollPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayManualPayrollPeer::populateObjects(PayManualPayrollPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayManualPayrollPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayManualPayrollPeer::getOMClass();
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
		return PayManualPayrollPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayManualPayrollPeer::ID); 

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
			$comparison = $criteria->getComparison(PayManualPayrollPeer::ID);
			$selectCriteria->add(PayManualPayrollPeer::ID, $criteria->remove(PayManualPayrollPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayManualPayrollPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayManualPayrollPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayManualPayroll) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayManualPayrollPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayManualPayroll $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayManualPayrollPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayManualPayrollPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayManualPayrollPeer::DATABASE_NAME, PayManualPayrollPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayManualPayrollPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayManualPayrollPeer::DATABASE_NAME);

		$criteria->add(PayManualPayrollPeer::ID, $pk);


		$v = PayManualPayrollPeer::doSelect($criteria, $con);

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
			$criteria->add(PayManualPayrollPeer::ID, $pks, Criteria::IN);
			$objs = PayManualPayrollPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayManualPayrollPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayManualPayrollMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayManualPayrollMapBuilder');
}
