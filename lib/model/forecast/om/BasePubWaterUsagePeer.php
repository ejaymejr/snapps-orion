<?php


abstract class BasePubWaterUsagePeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'pub_water_usage';

	
	const CLASS_DEFAULT = 'lib.model.forecast.PubWaterUsage';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pub_water_usage.ID';

	
	const TRANS_DATE = 'pub_water_usage.TRANS_DATE';

	
	const CONSUMPTION = 'pub_water_usage.CONSUMPTION';

	
	const RATE = 'pub_water_usage.RATE';

	
	const AMOUNT = 'pub_water_usage.AMOUNT';

	
	const TOTAL_AMOUNT_PAID = 'pub_water_usage.TOTAL_AMOUNT_PAID';

	
	const CREATED_BY = 'pub_water_usage.CREATED_BY';

	
	const DATE_CREATED = 'pub_water_usage.DATE_CREATED';

	
	const MODIFIED_BY = 'pub_water_usage.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pub_water_usage.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TransDate', 'Consumption', 'Rate', 'Amount', 'TotalAmountPaid', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PubWaterUsagePeer::ID, PubWaterUsagePeer::TRANS_DATE, PubWaterUsagePeer::CONSUMPTION, PubWaterUsagePeer::RATE, PubWaterUsagePeer::AMOUNT, PubWaterUsagePeer::TOTAL_AMOUNT_PAID, PubWaterUsagePeer::CREATED_BY, PubWaterUsagePeer::DATE_CREATED, PubWaterUsagePeer::MODIFIED_BY, PubWaterUsagePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trans_date', 'consumption', 'rate', 'amount', 'total_amount_paid', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TransDate' => 1, 'Consumption' => 2, 'Rate' => 3, 'Amount' => 4, 'TotalAmountPaid' => 5, 'CreatedBy' => 6, 'DateCreated' => 7, 'ModifiedBy' => 8, 'DateModified' => 9, ),
		BasePeer::TYPE_COLNAME => array (PubWaterUsagePeer::ID => 0, PubWaterUsagePeer::TRANS_DATE => 1, PubWaterUsagePeer::CONSUMPTION => 2, PubWaterUsagePeer::RATE => 3, PubWaterUsagePeer::AMOUNT => 4, PubWaterUsagePeer::TOTAL_AMOUNT_PAID => 5, PubWaterUsagePeer::CREATED_BY => 6, PubWaterUsagePeer::DATE_CREATED => 7, PubWaterUsagePeer::MODIFIED_BY => 8, PubWaterUsagePeer::DATE_MODIFIED => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trans_date' => 1, 'consumption' => 2, 'rate' => 3, 'amount' => 4, 'total_amount_paid' => 5, 'created_by' => 6, 'date_created' => 7, 'modified_by' => 8, 'date_modified' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/PubWaterUsageMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.PubWaterUsageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PubWaterUsagePeer::getTableMap();
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
		return str_replace(PubWaterUsagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PubWaterUsagePeer::ID);

		$criteria->addSelectColumn(PubWaterUsagePeer::TRANS_DATE);

		$criteria->addSelectColumn(PubWaterUsagePeer::CONSUMPTION);

		$criteria->addSelectColumn(PubWaterUsagePeer::RATE);

		$criteria->addSelectColumn(PubWaterUsagePeer::AMOUNT);

		$criteria->addSelectColumn(PubWaterUsagePeer::TOTAL_AMOUNT_PAID);

		$criteria->addSelectColumn(PubWaterUsagePeer::CREATED_BY);

		$criteria->addSelectColumn(PubWaterUsagePeer::DATE_CREATED);

		$criteria->addSelectColumn(PubWaterUsagePeer::MODIFIED_BY);

		$criteria->addSelectColumn(PubWaterUsagePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pub_water_usage.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pub_water_usage.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PubWaterUsagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PubWaterUsagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PubWaterUsagePeer::doSelectRS($criteria, $con);
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
		$objects = PubWaterUsagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PubWaterUsagePeer::populateObjects(PubWaterUsagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PubWaterUsagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PubWaterUsagePeer::getOMClass();
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
		return PubWaterUsagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PubWaterUsagePeer::ID); 

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
			$comparison = $criteria->getComparison(PubWaterUsagePeer::ID);
			$selectCriteria->add(PubWaterUsagePeer::ID, $criteria->remove(PubWaterUsagePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PubWaterUsagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PubWaterUsagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PubWaterUsage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PubWaterUsagePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PubWaterUsage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PubWaterUsagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PubWaterUsagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PubWaterUsagePeer::DATABASE_NAME, PubWaterUsagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PubWaterUsagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PubWaterUsagePeer::DATABASE_NAME);

		$criteria->add(PubWaterUsagePeer::ID, $pk);


		$v = PubWaterUsagePeer::doSelect($criteria, $con);

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
			$criteria->add(PubWaterUsagePeer::ID, $pks, Criteria::IN);
			$objs = PubWaterUsagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePubWaterUsagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/PubWaterUsageMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.PubWaterUsageMapBuilder');
}
