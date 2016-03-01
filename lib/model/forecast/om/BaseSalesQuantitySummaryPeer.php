<?php


abstract class BaseSalesQuantitySummaryPeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'sales_quantity_summary';

	
	const CLASS_DEFAULT = 'lib.model.forecast.SalesQuantitySummary';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sales_quantity_summary.ID';

	
	const PRODUCT_GROUP = 'sales_quantity_summary.PRODUCT_GROUP';

	
	const QUANTITY = 'sales_quantity_summary.QUANTITY';

	
	const DATE_TRANSACTION = 'sales_quantity_summary.DATE_TRANSACTION';

	
	const COMPANY_ID = 'sales_quantity_summary.COMPANY_ID';

	
	const CREATED_BY = 'sales_quantity_summary.CREATED_BY';

	
	const DATE_CREATED = 'sales_quantity_summary.DATE_CREATED';

	
	const MODIFIED_BY = 'sales_quantity_summary.MODIFIED_BY';

	
	const DATE_MODIFIED = 'sales_quantity_summary.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ProductGroup', 'Quantity', 'DateTransaction', 'CompanyId', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (SalesQuantitySummaryPeer::ID, SalesQuantitySummaryPeer::PRODUCT_GROUP, SalesQuantitySummaryPeer::QUANTITY, SalesQuantitySummaryPeer::DATE_TRANSACTION, SalesQuantitySummaryPeer::COMPANY_ID, SalesQuantitySummaryPeer::CREATED_BY, SalesQuantitySummaryPeer::DATE_CREATED, SalesQuantitySummaryPeer::MODIFIED_BY, SalesQuantitySummaryPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'product_group', 'quantity', 'date_transaction', 'company_id', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ProductGroup' => 1, 'Quantity' => 2, 'DateTransaction' => 3, 'CompanyId' => 4, 'CreatedBy' => 5, 'DateCreated' => 6, 'ModifiedBy' => 7, 'DateModified' => 8, ),
		BasePeer::TYPE_COLNAME => array (SalesQuantitySummaryPeer::ID => 0, SalesQuantitySummaryPeer::PRODUCT_GROUP => 1, SalesQuantitySummaryPeer::QUANTITY => 2, SalesQuantitySummaryPeer::DATE_TRANSACTION => 3, SalesQuantitySummaryPeer::COMPANY_ID => 4, SalesQuantitySummaryPeer::CREATED_BY => 5, SalesQuantitySummaryPeer::DATE_CREATED => 6, SalesQuantitySummaryPeer::MODIFIED_BY => 7, SalesQuantitySummaryPeer::DATE_MODIFIED => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'product_group' => 1, 'quantity' => 2, 'date_transaction' => 3, 'company_id' => 4, 'created_by' => 5, 'date_created' => 6, 'modified_by' => 7, 'date_modified' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/SalesQuantitySummaryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.SalesQuantitySummaryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SalesQuantitySummaryPeer::getTableMap();
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
		return str_replace(SalesQuantitySummaryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::ID);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::PRODUCT_GROUP);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::QUANTITY);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::DATE_TRANSACTION);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::COMPANY_ID);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::CREATED_BY);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::DATE_CREATED);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::MODIFIED_BY);

		$criteria->addSelectColumn(SalesQuantitySummaryPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(sales_quantity_summary.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sales_quantity_summary.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SalesQuantitySummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SalesQuantitySummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SalesQuantitySummaryPeer::doSelectRS($criteria, $con);
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
		$objects = SalesQuantitySummaryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SalesQuantitySummaryPeer::populateObjects(SalesQuantitySummaryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SalesQuantitySummaryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SalesQuantitySummaryPeer::getOMClass();
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
		return SalesQuantitySummaryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SalesQuantitySummaryPeer::ID); 

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
			$comparison = $criteria->getComparison(SalesQuantitySummaryPeer::ID);
			$selectCriteria->add(SalesQuantitySummaryPeer::ID, $criteria->remove(SalesQuantitySummaryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SalesQuantitySummaryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SalesQuantitySummaryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SalesQuantitySummary) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SalesQuantitySummaryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(SalesQuantitySummary $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SalesQuantitySummaryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SalesQuantitySummaryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SalesQuantitySummaryPeer::DATABASE_NAME, SalesQuantitySummaryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SalesQuantitySummaryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SalesQuantitySummaryPeer::DATABASE_NAME);

		$criteria->add(SalesQuantitySummaryPeer::ID, $pk);


		$v = SalesQuantitySummaryPeer::doSelect($criteria, $con);

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
			$criteria->add(SalesQuantitySummaryPeer::ID, $pks, Criteria::IN);
			$objs = SalesQuantitySummaryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSalesQuantitySummaryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/SalesQuantitySummaryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.SalesQuantitySummaryMapBuilder');
}
