<?php


abstract class BaseFinanceSummaryPeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'finance_summary';

	
	const CLASS_DEFAULT = 'lib.model.forecast.FinanceSummary';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'finance_summary.ID';

	
	const TRANS_DATE = 'finance_summary.TRANS_DATE';

	
	const COMPANY_ID = 'finance_summary.COMPANY_ID';

	
	const COMPONENT = 'finance_summary.COMPONENT';

	
	const VALUE = 'finance_summary.VALUE';

	
	const INCOME_EXPENSE = 'finance_summary.INCOME_EXPENSE';

	
	const CLASSIFICATION = 'finance_summary.CLASSIFICATION';

	
	const GST = 'finance_summary.GST';

	
	const SALES_SOURCE = 'finance_summary.SALES_SOURCE';

	
	const CREATED_BY = 'finance_summary.CREATED_BY';

	
	const DATE_CREATED = 'finance_summary.DATE_CREATED';

	
	const MODIFIED_BY = 'finance_summary.MODIFIED_BY';

	
	const DATE_MODIFIED = 'finance_summary.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TransDate', 'CompanyId', 'Component', 'Value', 'IncomeExpense', 'Classification', 'Gst', 'SalesSource', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (FinanceSummaryPeer::ID, FinanceSummaryPeer::TRANS_DATE, FinanceSummaryPeer::COMPANY_ID, FinanceSummaryPeer::COMPONENT, FinanceSummaryPeer::VALUE, FinanceSummaryPeer::INCOME_EXPENSE, FinanceSummaryPeer::CLASSIFICATION, FinanceSummaryPeer::GST, FinanceSummaryPeer::SALES_SOURCE, FinanceSummaryPeer::CREATED_BY, FinanceSummaryPeer::DATE_CREATED, FinanceSummaryPeer::MODIFIED_BY, FinanceSummaryPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trans_date', 'company_id', 'component', 'value', 'income_expense', 'classification', 'gst', 'sales_source', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TransDate' => 1, 'CompanyId' => 2, 'Component' => 3, 'Value' => 4, 'IncomeExpense' => 5, 'Classification' => 6, 'Gst' => 7, 'SalesSource' => 8, 'CreatedBy' => 9, 'DateCreated' => 10, 'ModifiedBy' => 11, 'DateModified' => 12, ),
		BasePeer::TYPE_COLNAME => array (FinanceSummaryPeer::ID => 0, FinanceSummaryPeer::TRANS_DATE => 1, FinanceSummaryPeer::COMPANY_ID => 2, FinanceSummaryPeer::COMPONENT => 3, FinanceSummaryPeer::VALUE => 4, FinanceSummaryPeer::INCOME_EXPENSE => 5, FinanceSummaryPeer::CLASSIFICATION => 6, FinanceSummaryPeer::GST => 7, FinanceSummaryPeer::SALES_SOURCE => 8, FinanceSummaryPeer::CREATED_BY => 9, FinanceSummaryPeer::DATE_CREATED => 10, FinanceSummaryPeer::MODIFIED_BY => 11, FinanceSummaryPeer::DATE_MODIFIED => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trans_date' => 1, 'company_id' => 2, 'component' => 3, 'value' => 4, 'income_expense' => 5, 'classification' => 6, 'gst' => 7, 'sales_source' => 8, 'created_by' => 9, 'date_created' => 10, 'modified_by' => 11, 'date_modified' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/FinanceSummaryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.FinanceSummaryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FinanceSummaryPeer::getTableMap();
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
		return str_replace(FinanceSummaryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FinanceSummaryPeer::ID);

		$criteria->addSelectColumn(FinanceSummaryPeer::TRANS_DATE);

		$criteria->addSelectColumn(FinanceSummaryPeer::COMPANY_ID);

		$criteria->addSelectColumn(FinanceSummaryPeer::COMPONENT);

		$criteria->addSelectColumn(FinanceSummaryPeer::VALUE);

		$criteria->addSelectColumn(FinanceSummaryPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(FinanceSummaryPeer::CLASSIFICATION);

		$criteria->addSelectColumn(FinanceSummaryPeer::GST);

		$criteria->addSelectColumn(FinanceSummaryPeer::SALES_SOURCE);

		$criteria->addSelectColumn(FinanceSummaryPeer::CREATED_BY);

		$criteria->addSelectColumn(FinanceSummaryPeer::DATE_CREATED);

		$criteria->addSelectColumn(FinanceSummaryPeer::MODIFIED_BY);

		$criteria->addSelectColumn(FinanceSummaryPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(finance_summary.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT finance_summary.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FinanceSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FinanceSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FinanceSummaryPeer::doSelectRS($criteria, $con);
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
		$objects = FinanceSummaryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FinanceSummaryPeer::populateObjects(FinanceSummaryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FinanceSummaryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FinanceSummaryPeer::getOMClass();
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
		return FinanceSummaryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FinanceSummaryPeer::ID); 

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
			$comparison = $criteria->getComparison(FinanceSummaryPeer::ID);
			$selectCriteria->add(FinanceSummaryPeer::ID, $criteria->remove(FinanceSummaryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FinanceSummaryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FinanceSummaryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FinanceSummary) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FinanceSummaryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FinanceSummary $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FinanceSummaryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FinanceSummaryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FinanceSummaryPeer::DATABASE_NAME, FinanceSummaryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FinanceSummaryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FinanceSummaryPeer::DATABASE_NAME);

		$criteria->add(FinanceSummaryPeer::ID, $pk);


		$v = FinanceSummaryPeer::doSelect($criteria, $con);

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
			$criteria->add(FinanceSummaryPeer::ID, $pks, Criteria::IN);
			$objs = FinanceSummaryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFinanceSummaryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/FinanceSummaryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.FinanceSummaryMapBuilder');
}
