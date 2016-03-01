<?php


abstract class BaseTkDtrsummaryMealPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'tk_dtrsummary_meal';

	
	const CLASS_DEFAULT = 'lib.model.hr.TkDtrsummaryMeal';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'tk_dtrsummary_meal.ID';

	
	const EMPLOYEE_NO = 'tk_dtrsummary_meal.EMPLOYEE_NO';

	
	const NAME = 'tk_dtrsummary_meal.NAME';

	
	const TRANS_DATE = 'tk_dtrsummary_meal.TRANS_DATE';

	
	const AMOUNT = 'tk_dtrsummary_meal.AMOUNT';

	
	const CREATED_BY = 'tk_dtrsummary_meal.CREATED_BY';

	
	const DATE_CREATED = 'tk_dtrsummary_meal.DATE_CREATED';

	
	const MODIFIED_BY = 'tk_dtrsummary_meal.MODIFIED_BY';

	
	const DATE_MODIFIED = 'tk_dtrsummary_meal.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'TransDate', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (TkDtrsummaryMealPeer::ID, TkDtrsummaryMealPeer::EMPLOYEE_NO, TkDtrsummaryMealPeer::NAME, TkDtrsummaryMealPeer::TRANS_DATE, TkDtrsummaryMealPeer::AMOUNT, TkDtrsummaryMealPeer::CREATED_BY, TkDtrsummaryMealPeer::DATE_CREATED, TkDtrsummaryMealPeer::MODIFIED_BY, TkDtrsummaryMealPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'trans_date', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'TransDate' => 3, 'Amount' => 4, 'CreatedBy' => 5, 'DateCreated' => 6, 'ModifiedBy' => 7, 'DateModified' => 8, ),
		BasePeer::TYPE_COLNAME => array (TkDtrsummaryMealPeer::ID => 0, TkDtrsummaryMealPeer::EMPLOYEE_NO => 1, TkDtrsummaryMealPeer::NAME => 2, TkDtrsummaryMealPeer::TRANS_DATE => 3, TkDtrsummaryMealPeer::AMOUNT => 4, TkDtrsummaryMealPeer::CREATED_BY => 5, TkDtrsummaryMealPeer::DATE_CREATED => 6, TkDtrsummaryMealPeer::MODIFIED_BY => 7, TkDtrsummaryMealPeer::DATE_MODIFIED => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'trans_date' => 3, 'amount' => 4, 'created_by' => 5, 'date_created' => 6, 'modified_by' => 7, 'date_modified' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/TkDtrsummaryMealMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.TkDtrsummaryMealMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TkDtrsummaryMealPeer::getTableMap();
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
		return str_replace(TkDtrsummaryMealPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::ID);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::NAME);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::TRANS_DATE);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::AMOUNT);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::CREATED_BY);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::DATE_CREATED);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::MODIFIED_BY);

		$criteria->addSelectColumn(TkDtrsummaryMealPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(tk_dtrsummary_meal.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tk_dtrsummary_meal.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkDtrsummaryMealPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkDtrsummaryMealPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TkDtrsummaryMealPeer::doSelectRS($criteria, $con);
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
		$objects = TkDtrsummaryMealPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TkDtrsummaryMealPeer::populateObjects(TkDtrsummaryMealPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TkDtrsummaryMealPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TkDtrsummaryMealPeer::getOMClass();
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
		return TkDtrsummaryMealPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TkDtrsummaryMealPeer::ID); 

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
			$comparison = $criteria->getComparison(TkDtrsummaryMealPeer::ID);
			$selectCriteria->add(TkDtrsummaryMealPeer::ID, $criteria->remove(TkDtrsummaryMealPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TkDtrsummaryMealPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TkDtrsummaryMealPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TkDtrsummaryMeal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TkDtrsummaryMealPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TkDtrsummaryMeal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TkDtrsummaryMealPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TkDtrsummaryMealPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TkDtrsummaryMealPeer::DATABASE_NAME, TkDtrsummaryMealPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TkDtrsummaryMealPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TkDtrsummaryMealPeer::DATABASE_NAME);

		$criteria->add(TkDtrsummaryMealPeer::ID, $pk);


		$v = TkDtrsummaryMealPeer::doSelect($criteria, $con);

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
			$criteria->add(TkDtrsummaryMealPeer::ID, $pks, Criteria::IN);
			$objs = TkDtrsummaryMealPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTkDtrsummaryMealPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/TkDtrsummaryMealMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.TkDtrsummaryMealMapBuilder');
}
