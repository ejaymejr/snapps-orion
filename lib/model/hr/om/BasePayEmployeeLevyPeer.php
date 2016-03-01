<?php


abstract class BasePayEmployeeLevyPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_levy';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeLevy';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_levy.ID';

	
	const EMPLOYEE_NO = 'pay_employee_levy.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_levy.NAME';

	
	const COMPANY = 'pay_employee_levy.COMPANY';

	
	const TEAM = 'pay_employee_levy.TEAM';

	
	const PERIOD_CODE = 'pay_employee_levy.PERIOD_CODE';

	
	const FROM = 'pay_employee_levy.FROM';

	
	const TO = 'pay_employee_levy.TO';

	
	const LEVY_RATE = 'pay_employee_levy.LEVY_RATE';

	
	const LEVY_DED = 'pay_employee_levy.LEVY_DED';

	
	const AMOUNT = 'pay_employee_levy.AMOUNT';

	
	const CREATED_BY = 'pay_employee_levy.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_levy.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_levy.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_levy.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Company', 'Team', 'PeriodCode', 'From', 'To', 'LevyRate', 'LevyDed', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLevyPeer::ID, PayEmployeeLevyPeer::EMPLOYEE_NO, PayEmployeeLevyPeer::NAME, PayEmployeeLevyPeer::COMPANY, PayEmployeeLevyPeer::TEAM, PayEmployeeLevyPeer::PERIOD_CODE, PayEmployeeLevyPeer::FROM, PayEmployeeLevyPeer::TO, PayEmployeeLevyPeer::LEVY_RATE, PayEmployeeLevyPeer::LEVY_DED, PayEmployeeLevyPeer::AMOUNT, PayEmployeeLevyPeer::CREATED_BY, PayEmployeeLevyPeer::DATE_CREATED, PayEmployeeLevyPeer::MODIFIED_BY, PayEmployeeLevyPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'company', 'team', 'period_code', 'from', 'to', 'levy_rate', 'levy_ded', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Company' => 3, 'Team' => 4, 'PeriodCode' => 5, 'From' => 6, 'To' => 7, 'LevyRate' => 8, 'LevyDed' => 9, 'Amount' => 10, 'CreatedBy' => 11, 'DateCreated' => 12, 'ModifiedBy' => 13, 'DateModified' => 14, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLevyPeer::ID => 0, PayEmployeeLevyPeer::EMPLOYEE_NO => 1, PayEmployeeLevyPeer::NAME => 2, PayEmployeeLevyPeer::COMPANY => 3, PayEmployeeLevyPeer::TEAM => 4, PayEmployeeLevyPeer::PERIOD_CODE => 5, PayEmployeeLevyPeer::FROM => 6, PayEmployeeLevyPeer::TO => 7, PayEmployeeLevyPeer::LEVY_RATE => 8, PayEmployeeLevyPeer::LEVY_DED => 9, PayEmployeeLevyPeer::AMOUNT => 10, PayEmployeeLevyPeer::CREATED_BY => 11, PayEmployeeLevyPeer::DATE_CREATED => 12, PayEmployeeLevyPeer::MODIFIED_BY => 13, PayEmployeeLevyPeer::DATE_MODIFIED => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'company' => 3, 'team' => 4, 'period_code' => 5, 'from' => 6, 'to' => 7, 'levy_rate' => 8, 'levy_ded' => 9, 'amount' => 10, 'created_by' => 11, 'date_created' => 12, 'modified_by' => 13, 'date_modified' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeLevyMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeLevyMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeLevyPeer::getTableMap();
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
		return str_replace(PayEmployeeLevyPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeLevyPeer::ID);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::TEAM);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::FROM);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::TO);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::LEVY_RATE);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::LEVY_DED);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeLevyPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_levy.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_levy.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeLevyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeLevyPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeLevyPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeLevyPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeLevyPeer::populateObjects(PayEmployeeLevyPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeLevyPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeLevyPeer::getOMClass();
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
		return PayEmployeeLevyPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeLevyPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeLevyPeer::ID);
			$selectCriteria->add(PayEmployeeLevyPeer::ID, $criteria->remove(PayEmployeeLevyPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeLevyPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeLevyPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeLevy) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeLevyPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeLevy $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeLevyPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeLevyPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeLevyPeer::DATABASE_NAME, PayEmployeeLevyPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeLevyPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeLevyPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLevyPeer::ID, $pk);


		$v = PayEmployeeLevyPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeLevyPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeLevyPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeLevyPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeLevyMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeLevyMapBuilder');
}
