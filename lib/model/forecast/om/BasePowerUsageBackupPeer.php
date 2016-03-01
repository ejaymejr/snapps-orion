<?php


abstract class BasePowerUsageBackupPeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'power_usage_backup';

	
	const CLASS_DEFAULT = 'lib.model.forecast.PowerUsageBackup';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'power_usage_backup.ID';

	
	const DATE = 'power_usage_backup.DATE';

	
	const TIME = 'power_usage_backup.TIME';

	
	const AMPM = 'power_usage_backup.AMPM';

	
	const READING = 'power_usage_backup.READING';

	
	const CONSUMPTION = 'power_usage_backup.CONSUMPTION';

	
	const UNIT = 'power_usage_backup.UNIT';

	
	const UNIT_PRICE = 'power_usage_backup.UNIT_PRICE';

	
	const CONVERSION_FACTOR = 'power_usage_backup.CONVERSION_FACTOR';

	
	const TOTAL_COST = 'power_usage_backup.TOTAL_COST';

	
	const CREATED_BY = 'power_usage_backup.CREATED_BY';

	
	const DATE_CREATED = 'power_usage_backup.DATE_CREATED';

	
	const MODIFIED_BY = 'power_usage_backup.MODIFIED_BY';

	
	const DATE_MODIFIED = 'power_usage_backup.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Date', 'Time', 'Ampm', 'Reading', 'Consumption', 'Unit', 'UnitPrice', 'ConversionFactor', 'TotalCost', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PowerUsageBackupPeer::ID, PowerUsageBackupPeer::DATE, PowerUsageBackupPeer::TIME, PowerUsageBackupPeer::AMPM, PowerUsageBackupPeer::READING, PowerUsageBackupPeer::CONSUMPTION, PowerUsageBackupPeer::UNIT, PowerUsageBackupPeer::UNIT_PRICE, PowerUsageBackupPeer::CONVERSION_FACTOR, PowerUsageBackupPeer::TOTAL_COST, PowerUsageBackupPeer::CREATED_BY, PowerUsageBackupPeer::DATE_CREATED, PowerUsageBackupPeer::MODIFIED_BY, PowerUsageBackupPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date', 'time', 'ampm', 'reading', 'consumption', 'unit', 'unit_price', 'conversion_factor', 'total_cost', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Date' => 1, 'Time' => 2, 'Ampm' => 3, 'Reading' => 4, 'Consumption' => 5, 'Unit' => 6, 'UnitPrice' => 7, 'ConversionFactor' => 8, 'TotalCost' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (PowerUsageBackupPeer::ID => 0, PowerUsageBackupPeer::DATE => 1, PowerUsageBackupPeer::TIME => 2, PowerUsageBackupPeer::AMPM => 3, PowerUsageBackupPeer::READING => 4, PowerUsageBackupPeer::CONSUMPTION => 5, PowerUsageBackupPeer::UNIT => 6, PowerUsageBackupPeer::UNIT_PRICE => 7, PowerUsageBackupPeer::CONVERSION_FACTOR => 8, PowerUsageBackupPeer::TOTAL_COST => 9, PowerUsageBackupPeer::CREATED_BY => 10, PowerUsageBackupPeer::DATE_CREATED => 11, PowerUsageBackupPeer::MODIFIED_BY => 12, PowerUsageBackupPeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date' => 1, 'time' => 2, 'ampm' => 3, 'reading' => 4, 'consumption' => 5, 'unit' => 6, 'unit_price' => 7, 'conversion_factor' => 8, 'total_cost' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/PowerUsageBackupMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.PowerUsageBackupMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PowerUsageBackupPeer::getTableMap();
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
		return str_replace(PowerUsageBackupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PowerUsageBackupPeer::ID);

		$criteria->addSelectColumn(PowerUsageBackupPeer::DATE);

		$criteria->addSelectColumn(PowerUsageBackupPeer::TIME);

		$criteria->addSelectColumn(PowerUsageBackupPeer::AMPM);

		$criteria->addSelectColumn(PowerUsageBackupPeer::READING);

		$criteria->addSelectColumn(PowerUsageBackupPeer::CONSUMPTION);

		$criteria->addSelectColumn(PowerUsageBackupPeer::UNIT);

		$criteria->addSelectColumn(PowerUsageBackupPeer::UNIT_PRICE);

		$criteria->addSelectColumn(PowerUsageBackupPeer::CONVERSION_FACTOR);

		$criteria->addSelectColumn(PowerUsageBackupPeer::TOTAL_COST);

		$criteria->addSelectColumn(PowerUsageBackupPeer::CREATED_BY);

		$criteria->addSelectColumn(PowerUsageBackupPeer::DATE_CREATED);

		$criteria->addSelectColumn(PowerUsageBackupPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PowerUsageBackupPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(power_usage_backup.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT power_usage_backup.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PowerUsageBackupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PowerUsageBackupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PowerUsageBackupPeer::doSelectRS($criteria, $con);
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
		$objects = PowerUsageBackupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PowerUsageBackupPeer::populateObjects(PowerUsageBackupPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PowerUsageBackupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PowerUsageBackupPeer::getOMClass();
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
		return PowerUsageBackupPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PowerUsageBackupPeer::ID); 

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
			$comparison = $criteria->getComparison(PowerUsageBackupPeer::ID);
			$selectCriteria->add(PowerUsageBackupPeer::ID, $criteria->remove(PowerUsageBackupPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PowerUsageBackupPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PowerUsageBackupPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PowerUsageBackup) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PowerUsageBackupPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PowerUsageBackup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PowerUsageBackupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PowerUsageBackupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PowerUsageBackupPeer::DATABASE_NAME, PowerUsageBackupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PowerUsageBackupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PowerUsageBackupPeer::DATABASE_NAME);

		$criteria->add(PowerUsageBackupPeer::ID, $pk);


		$v = PowerUsageBackupPeer::doSelect($criteria, $con);

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
			$criteria->add(PowerUsageBackupPeer::ID, $pks, Criteria::IN);
			$objs = PowerUsageBackupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePowerUsageBackupPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/PowerUsageBackupMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.PowerUsageBackupMapBuilder');
}
