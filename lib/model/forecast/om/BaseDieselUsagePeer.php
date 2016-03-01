<?php


abstract class BaseDieselUsagePeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'diesel_usage';

	
	const CLASS_DEFAULT = 'lib.model.forecast.DieselUsage';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'diesel_usage.ID';

	
	const TRANS_DATE = 'diesel_usage.TRANS_DATE';

	
	const CONSUMPTION = 'diesel_usage.CONSUMPTION';

	
	const COST_PER_UNIT = 'diesel_usage.COST_PER_UNIT';

	
	const UNIT = 'diesel_usage.UNIT';

	
	const AMOUNT = 'diesel_usage.AMOUNT';

	
	const CREATED_BY = 'diesel_usage.CREATED_BY';

	
	const DATE_CREATED = 'diesel_usage.DATE_CREATED';

	
	const MODIFIED_BY = 'diesel_usage.MODIFIED_BY';

	
	const DATE_MODIFIED = 'diesel_usage.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TransDate', 'Consumption', 'CostPerUnit', 'Unit', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (DieselUsagePeer::ID, DieselUsagePeer::TRANS_DATE, DieselUsagePeer::CONSUMPTION, DieselUsagePeer::COST_PER_UNIT, DieselUsagePeer::UNIT, DieselUsagePeer::AMOUNT, DieselUsagePeer::CREATED_BY, DieselUsagePeer::DATE_CREATED, DieselUsagePeer::MODIFIED_BY, DieselUsagePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trans_date', 'consumption', 'cost_per_unit', 'unit', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TransDate' => 1, 'Consumption' => 2, 'CostPerUnit' => 3, 'Unit' => 4, 'Amount' => 5, 'CreatedBy' => 6, 'DateCreated' => 7, 'ModifiedBy' => 8, 'DateModified' => 9, ),
		BasePeer::TYPE_COLNAME => array (DieselUsagePeer::ID => 0, DieselUsagePeer::TRANS_DATE => 1, DieselUsagePeer::CONSUMPTION => 2, DieselUsagePeer::COST_PER_UNIT => 3, DieselUsagePeer::UNIT => 4, DieselUsagePeer::AMOUNT => 5, DieselUsagePeer::CREATED_BY => 6, DieselUsagePeer::DATE_CREATED => 7, DieselUsagePeer::MODIFIED_BY => 8, DieselUsagePeer::DATE_MODIFIED => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trans_date' => 1, 'consumption' => 2, 'cost_per_unit' => 3, 'unit' => 4, 'amount' => 5, 'created_by' => 6, 'date_created' => 7, 'modified_by' => 8, 'date_modified' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/DieselUsageMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.DieselUsageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DieselUsagePeer::getTableMap();
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
		return str_replace(DieselUsagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DieselUsagePeer::ID);

		$criteria->addSelectColumn(DieselUsagePeer::TRANS_DATE);

		$criteria->addSelectColumn(DieselUsagePeer::CONSUMPTION);

		$criteria->addSelectColumn(DieselUsagePeer::COST_PER_UNIT);

		$criteria->addSelectColumn(DieselUsagePeer::UNIT);

		$criteria->addSelectColumn(DieselUsagePeer::AMOUNT);

		$criteria->addSelectColumn(DieselUsagePeer::CREATED_BY);

		$criteria->addSelectColumn(DieselUsagePeer::DATE_CREATED);

		$criteria->addSelectColumn(DieselUsagePeer::MODIFIED_BY);

		$criteria->addSelectColumn(DieselUsagePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(diesel_usage.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT diesel_usage.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DieselUsagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DieselUsagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DieselUsagePeer::doSelectRS($criteria, $con);
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
		$objects = DieselUsagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DieselUsagePeer::populateObjects(DieselUsagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DieselUsagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DieselUsagePeer::getOMClass();
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
		return DieselUsagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DieselUsagePeer::ID); 

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
			$comparison = $criteria->getComparison(DieselUsagePeer::ID);
			$selectCriteria->add(DieselUsagePeer::ID, $criteria->remove(DieselUsagePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DieselUsagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DieselUsagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DieselUsage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DieselUsagePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(DieselUsage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DieselUsagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DieselUsagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DieselUsagePeer::DATABASE_NAME, DieselUsagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DieselUsagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DieselUsagePeer::DATABASE_NAME);

		$criteria->add(DieselUsagePeer::ID, $pk);


		$v = DieselUsagePeer::doSelect($criteria, $con);

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
			$criteria->add(DieselUsagePeer::ID, $pks, Criteria::IN);
			$objs = DieselUsagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDieselUsagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/DieselUsageMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.DieselUsageMapBuilder');
}
