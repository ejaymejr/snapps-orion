<?php


abstract class BaseProductGroupToDepartmentPeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'product_group_to_department';

	
	const CLASS_DEFAULT = 'lib.model.forecast.ProductGroupToDepartment';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'product_group_to_department.ID';

	
	const PRODUCT_GROUP = 'product_group_to_department.PRODUCT_GROUP';

	
	const DEPARTMENT = 'product_group_to_department.DEPARTMENT';

	
	const COMPANY_ID = 'product_group_to_department.COMPANY_ID';

	
	const CREATED_BY = 'product_group_to_department.CREATED_BY';

	
	const DATE_CREATED = 'product_group_to_department.DATE_CREATED';

	
	const MODIFIED_BY = 'product_group_to_department.MODIFIED_BY';

	
	const DATE_MODIFIED = 'product_group_to_department.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ProductGroup', 'Department', 'CompanyId', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (ProductGroupToDepartmentPeer::ID, ProductGroupToDepartmentPeer::PRODUCT_GROUP, ProductGroupToDepartmentPeer::DEPARTMENT, ProductGroupToDepartmentPeer::COMPANY_ID, ProductGroupToDepartmentPeer::CREATED_BY, ProductGroupToDepartmentPeer::DATE_CREATED, ProductGroupToDepartmentPeer::MODIFIED_BY, ProductGroupToDepartmentPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'product_group', 'department', 'company_id', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ProductGroup' => 1, 'Department' => 2, 'CompanyId' => 3, 'CreatedBy' => 4, 'DateCreated' => 5, 'ModifiedBy' => 6, 'DateModified' => 7, ),
		BasePeer::TYPE_COLNAME => array (ProductGroupToDepartmentPeer::ID => 0, ProductGroupToDepartmentPeer::PRODUCT_GROUP => 1, ProductGroupToDepartmentPeer::DEPARTMENT => 2, ProductGroupToDepartmentPeer::COMPANY_ID => 3, ProductGroupToDepartmentPeer::CREATED_BY => 4, ProductGroupToDepartmentPeer::DATE_CREATED => 5, ProductGroupToDepartmentPeer::MODIFIED_BY => 6, ProductGroupToDepartmentPeer::DATE_MODIFIED => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'product_group' => 1, 'department' => 2, 'company_id' => 3, 'created_by' => 4, 'date_created' => 5, 'modified_by' => 6, 'date_modified' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/ProductGroupToDepartmentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.ProductGroupToDepartmentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProductGroupToDepartmentPeer::getTableMap();
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
		return str_replace(ProductGroupToDepartmentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::ID);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::PRODUCT_GROUP);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::DEPARTMENT);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::COMPANY_ID);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::CREATED_BY);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::DATE_CREATED);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::MODIFIED_BY);

		$criteria->addSelectColumn(ProductGroupToDepartmentPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(product_group_to_department.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT product_group_to_department.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProductGroupToDepartmentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProductGroupToDepartmentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProductGroupToDepartmentPeer::doSelectRS($criteria, $con);
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
		$objects = ProductGroupToDepartmentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProductGroupToDepartmentPeer::populateObjects(ProductGroupToDepartmentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProductGroupToDepartmentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProductGroupToDepartmentPeer::getOMClass();
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
		return ProductGroupToDepartmentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ProductGroupToDepartmentPeer::ID); 

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
			$comparison = $criteria->getComparison(ProductGroupToDepartmentPeer::ID);
			$selectCriteria->add(ProductGroupToDepartmentPeer::ID, $criteria->remove(ProductGroupToDepartmentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ProductGroupToDepartmentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProductGroupToDepartmentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ProductGroupToDepartment) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProductGroupToDepartmentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ProductGroupToDepartment $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProductGroupToDepartmentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProductGroupToDepartmentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProductGroupToDepartmentPeer::DATABASE_NAME, ProductGroupToDepartmentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProductGroupToDepartmentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProductGroupToDepartmentPeer::DATABASE_NAME);

		$criteria->add(ProductGroupToDepartmentPeer::ID, $pk);


		$v = ProductGroupToDepartmentPeer::doSelect($criteria, $con);

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
			$criteria->add(ProductGroupToDepartmentPeer::ID, $pks, Criteria::IN);
			$objs = ProductGroupToDepartmentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProductGroupToDepartmentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/ProductGroupToDepartmentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.ProductGroupToDepartmentMapBuilder');
}
