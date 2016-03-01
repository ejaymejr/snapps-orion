<?php


abstract class BaseHrLogPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_log';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrLog';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_log.ID';

	
	const USER = 'hr_log.USER';

	
	const TARGET = 'hr_log.TARGET';

	
	const USER_ACTION = 'hr_log.USER_ACTION';

	
	const DESCRIPTION = 'hr_log.DESCRIPTION';

	
	const ACTION_MODULE = 'hr_log.ACTION_MODULE';

	
	const EMPLOYEE_NO = 'hr_log.EMPLOYEE_NO';

	
	const PERIOD_CODE = 'hr_log.PERIOD_CODE';

	
	const ACCT_CODE = 'hr_log.ACCT_CODE';

	
	const AMOUNT = 'hr_log.AMOUNT';

	
	const BANK_CASH = 'hr_log.BANK_CASH';

	
	const MAC_ADDR = 'hr_log.MAC_ADDR';

	
	const DATE_CREATED = 'hr_log.DATE_CREATED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'User', 'Target', 'UserAction', 'Description', 'ActionModule', 'EmployeeNo', 'PeriodCode', 'AcctCode', 'Amount', 'BankCash', 'MacAddr', 'DateCreated', ),
		BasePeer::TYPE_COLNAME => array (HrLogPeer::ID, HrLogPeer::USER, HrLogPeer::TARGET, HrLogPeer::USER_ACTION, HrLogPeer::DESCRIPTION, HrLogPeer::ACTION_MODULE, HrLogPeer::EMPLOYEE_NO, HrLogPeer::PERIOD_CODE, HrLogPeer::ACCT_CODE, HrLogPeer::AMOUNT, HrLogPeer::BANK_CASH, HrLogPeer::MAC_ADDR, HrLogPeer::DATE_CREATED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user', 'target', 'user_action', 'description', 'action_module', 'employee_no', 'period_code', 'acct_code', 'amount', 'bank_cash', 'mac_addr', 'date_created', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'User' => 1, 'Target' => 2, 'UserAction' => 3, 'Description' => 4, 'ActionModule' => 5, 'EmployeeNo' => 6, 'PeriodCode' => 7, 'AcctCode' => 8, 'Amount' => 9, 'BankCash' => 10, 'MacAddr' => 11, 'DateCreated' => 12, ),
		BasePeer::TYPE_COLNAME => array (HrLogPeer::ID => 0, HrLogPeer::USER => 1, HrLogPeer::TARGET => 2, HrLogPeer::USER_ACTION => 3, HrLogPeer::DESCRIPTION => 4, HrLogPeer::ACTION_MODULE => 5, HrLogPeer::EMPLOYEE_NO => 6, HrLogPeer::PERIOD_CODE => 7, HrLogPeer::ACCT_CODE => 8, HrLogPeer::AMOUNT => 9, HrLogPeer::BANK_CASH => 10, HrLogPeer::MAC_ADDR => 11, HrLogPeer::DATE_CREATED => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user' => 1, 'target' => 2, 'user_action' => 3, 'description' => 4, 'action_module' => 5, 'employee_no' => 6, 'period_code' => 7, 'acct_code' => 8, 'amount' => 9, 'bank_cash' => 10, 'mac_addr' => 11, 'date_created' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrLogPeer::getTableMap();
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
		return str_replace(HrLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrLogPeer::ID);

		$criteria->addSelectColumn(HrLogPeer::USER);

		$criteria->addSelectColumn(HrLogPeer::TARGET);

		$criteria->addSelectColumn(HrLogPeer::USER_ACTION);

		$criteria->addSelectColumn(HrLogPeer::DESCRIPTION);

		$criteria->addSelectColumn(HrLogPeer::ACTION_MODULE);

		$criteria->addSelectColumn(HrLogPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrLogPeer::PERIOD_CODE);

		$criteria->addSelectColumn(HrLogPeer::ACCT_CODE);

		$criteria->addSelectColumn(HrLogPeer::AMOUNT);

		$criteria->addSelectColumn(HrLogPeer::BANK_CASH);

		$criteria->addSelectColumn(HrLogPeer::MAC_ADDR);

		$criteria->addSelectColumn(HrLogPeer::DATE_CREATED);

	}

	const COUNT = 'COUNT(hr_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrLogPeer::doSelectRS($criteria, $con);
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
		$objects = HrLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrLogPeer::populateObjects(HrLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrLogPeer::getOMClass();
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
		return HrLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrLogPeer::ID); 

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
			$comparison = $criteria->getComparison(HrLogPeer::ID);
			$selectCriteria->add(HrLogPeer::ID, $criteria->remove(HrLogPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrLogPeer::DATABASE_NAME, HrLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrLogPeer::DATABASE_NAME);

		$criteria->add(HrLogPeer::ID, $pk);


		$v = HrLogPeer::doSelect($criteria, $con);

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
			$criteria->add(HrLogPeer::ID, $pks, Criteria::IN);
			$objs = HrLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrLogMapBuilder');
}
