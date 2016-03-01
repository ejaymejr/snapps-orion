<?php


abstract class BasePayEmployeeCashPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_cash';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeCash';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_cash.ID';

	
	const EMPLOYEE_NO = 'pay_employee_cash.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_cash.NAME';

	
	const ACCT_CODE = 'pay_employee_cash.ACCT_CODE';

	
	const DESCRIPTION = 'pay_employee_cash.DESCRIPTION';

	
	const FREQUENCY = 'pay_employee_cash.FREQUENCY';

	
	const REMARKS = 'pay_employee_cash.REMARKS';

	
	const CREATED_BY = 'pay_employee_cash.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_cash.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_cash.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_cash.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'AcctCode', 'Description', 'Frequency', 'Remarks', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeCashPeer::ID, PayEmployeeCashPeer::EMPLOYEE_NO, PayEmployeeCashPeer::NAME, PayEmployeeCashPeer::ACCT_CODE, PayEmployeeCashPeer::DESCRIPTION, PayEmployeeCashPeer::FREQUENCY, PayEmployeeCashPeer::REMARKS, PayEmployeeCashPeer::CREATED_BY, PayEmployeeCashPeer::DATE_CREATED, PayEmployeeCashPeer::MODIFIED_BY, PayEmployeeCashPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'acct_code', 'description', 'frequency', 'remarks', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'AcctCode' => 3, 'Description' => 4, 'Frequency' => 5, 'Remarks' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeCashPeer::ID => 0, PayEmployeeCashPeer::EMPLOYEE_NO => 1, PayEmployeeCashPeer::NAME => 2, PayEmployeeCashPeer::ACCT_CODE => 3, PayEmployeeCashPeer::DESCRIPTION => 4, PayEmployeeCashPeer::FREQUENCY => 5, PayEmployeeCashPeer::REMARKS => 6, PayEmployeeCashPeer::CREATED_BY => 7, PayEmployeeCashPeer::DATE_CREATED => 8, PayEmployeeCashPeer::MODIFIED_BY => 9, PayEmployeeCashPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'acct_code' => 3, 'description' => 4, 'frequency' => 5, 'remarks' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeCashMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeCashMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeCashPeer::getTableMap();
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
		return str_replace(PayEmployeeCashPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeCashPeer::ID);

		$criteria->addSelectColumn(PayEmployeeCashPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeCashPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeCashPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayEmployeeCashPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayEmployeeCashPeer::FREQUENCY);

		$criteria->addSelectColumn(PayEmployeeCashPeer::REMARKS);

		$criteria->addSelectColumn(PayEmployeeCashPeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeCashPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeCashPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeCashPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_cash.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_cash.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeCashPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeCashPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeCashPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeCashPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeCashPeer::populateObjects(PayEmployeeCashPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeCashPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeCashPeer::getOMClass();
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
		return PayEmployeeCashPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeCashPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeCashPeer::ID);
			$selectCriteria->add(PayEmployeeCashPeer::ID, $criteria->remove(PayEmployeeCashPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeCashPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeCashPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeCash) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeCashPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeCash $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeCashPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeCashPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeCashPeer::DATABASE_NAME, PayEmployeeCashPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeCashPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeCashPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeCashPeer::ID, $pk);


		$v = PayEmployeeCashPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeCashPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeCashPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeCashPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeCashMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeCashMapBuilder');
}
