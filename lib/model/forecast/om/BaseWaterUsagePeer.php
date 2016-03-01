<?php


abstract class BaseWaterUsagePeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'water_usage';

	
	const CLASS_DEFAULT = 'lib.model.forecast.WaterUsage';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'water_usage.ID';

	
	const DATE = 'water_usage.DATE';

	
	const TIME = 'water_usage.TIME';

	
	const AMPM = 'water_usage.AMPM';

	
	const READING = 'water_usage.READING';

	
	const CONSUMPTION = 'water_usage.CONSUMPTION';

	
	const UNIT = 'water_usage.UNIT';

	
	const UNIT_PRICE = 'water_usage.UNIT_PRICE';

	
	const CONVERSION_FACTOR = 'water_usage.CONVERSION_FACTOR';

	
	const TOTAL_COST = 'water_usage.TOTAL_COST';

	
	const CREATED_BY = 'water_usage.CREATED_BY';

	
	const DATE_CREATED = 'water_usage.DATE_CREATED';

	
	const MODIFIED_BY = 'water_usage.MODIFIED_BY';

	
	const DATE_MODIFIED = 'water_usage.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Date', 'Time', 'Ampm', 'Reading', 'Consumption', 'Unit', 'UnitPrice', 'ConversionFactor', 'TotalCost', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (WaterUsagePeer::ID, WaterUsagePeer::DATE, WaterUsagePeer::TIME, WaterUsagePeer::AMPM, WaterUsagePeer::READING, WaterUsagePeer::CONSUMPTION, WaterUsagePeer::UNIT, WaterUsagePeer::UNIT_PRICE, WaterUsagePeer::CONVERSION_FACTOR, WaterUsagePeer::TOTAL_COST, WaterUsagePeer::CREATED_BY, WaterUsagePeer::DATE_CREATED, WaterUsagePeer::MODIFIED_BY, WaterUsagePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date', 'time', 'ampm', 'reading', 'consumption', 'unit', 'unit_price', 'conversion_factor', 'total_cost', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Date' => 1, 'Time' => 2, 'Ampm' => 3, 'Reading' => 4, 'Consumption' => 5, 'Unit' => 6, 'UnitPrice' => 7, 'ConversionFactor' => 8, 'TotalCost' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (WaterUsagePeer::ID => 0, WaterUsagePeer::DATE => 1, WaterUsagePeer::TIME => 2, WaterUsagePeer::AMPM => 3, WaterUsagePeer::READING => 4, WaterUsagePeer::CONSUMPTION => 5, WaterUsagePeer::UNIT => 6, WaterUsagePeer::UNIT_PRICE => 7, WaterUsagePeer::CONVERSION_FACTOR => 8, WaterUsagePeer::TOTAL_COST => 9, WaterUsagePeer::CREATED_BY => 10, WaterUsagePeer::DATE_CREATED => 11, WaterUsagePeer::MODIFIED_BY => 12, WaterUsagePeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date' => 1, 'time' => 2, 'ampm' => 3, 'reading' => 4, 'consumption' => 5, 'unit' => 6, 'unit_price' => 7, 'conversion_factor' => 8, 'total_cost' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/WaterUsageMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.WaterUsageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = WaterUsagePeer::getTableMap();
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
		return str_replace(WaterUsagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(WaterUsagePeer::ID);

		$criteria->addSelectColumn(WaterUsagePeer::DATE);

		$criteria->addSelectColumn(WaterUsagePeer::TIME);

		$criteria->addSelectColumn(WaterUsagePeer::AMPM);

		$criteria->addSelectColumn(WaterUsagePeer::READING);

		$criteria->addSelectColumn(WaterUsagePeer::CONSUMPTION);

		$criteria->addSelectColumn(WaterUsagePeer::UNIT);

		$criteria->addSelectColumn(WaterUsagePeer::UNIT_PRICE);

		$criteria->addSelectColumn(WaterUsagePeer::CONVERSION_FACTOR);

		$criteria->addSelectColumn(WaterUsagePeer::TOTAL_COST);

		$criteria->addSelectColumn(WaterUsagePeer::CREATED_BY);

		$criteria->addSelectColumn(WaterUsagePeer::DATE_CREATED);

		$criteria->addSelectColumn(WaterUsagePeer::MODIFIED_BY);

		$criteria->addSelectColumn(WaterUsagePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(water_usage.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT water_usage.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(WaterUsagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(WaterUsagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = WaterUsagePeer::doSelectRS($criteria, $con);
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
		$objects = WaterUsagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return WaterUsagePeer::populateObjects(WaterUsagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			WaterUsagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = WaterUsagePeer::getOMClass();
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
		return WaterUsagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(WaterUsagePeer::ID); 

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
			$comparison = $criteria->getComparison(WaterUsagePeer::ID);
			$selectCriteria->add(WaterUsagePeer::ID, $criteria->remove(WaterUsagePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(WaterUsagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(WaterUsagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof WaterUsage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(WaterUsagePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(WaterUsage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(WaterUsagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(WaterUsagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(WaterUsagePeer::DATABASE_NAME, WaterUsagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = WaterUsagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(WaterUsagePeer::DATABASE_NAME);

		$criteria->add(WaterUsagePeer::ID, $pk);


		$v = WaterUsagePeer::doSelect($criteria, $con);

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
			$criteria->add(WaterUsagePeer::ID, $pks, Criteria::IN);
			$objs = WaterUsagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseWaterUsagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/WaterUsageMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.WaterUsageMapBuilder');
}
