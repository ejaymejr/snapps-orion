<?php


abstract class BaseTempFinanceSummaryPeer {

	
	const DATABASE_NAME = 'forecast';

	
	const TABLE_NAME = 'temp_finance_summary';

	
	const CLASS_DEFAULT = 'lib.model.forecast.TempFinanceSummary';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'temp_finance_summary.ID';

	
	const TRANS_DATE = 'temp_finance_summary.TRANS_DATE';

	
	const COMPANY_ID = 'temp_finance_summary.COMPANY_ID';

	
	const COMPONENT = 'temp_finance_summary.COMPONENT';

	
	const VALUE = 'temp_finance_summary.VALUE';

	
	const INCOME_EXPENSE = 'temp_finance_summary.INCOME_EXPENSE';

	
	const CLASSIFICATION = 'temp_finance_summary.CLASSIFICATION';

	
	const GST = 'temp_finance_summary.GST';

	
	const SALES_SOURCE = 'temp_finance_summary.SALES_SOURCE';

	
	const CREATED_BY = 'temp_finance_summary.CREATED_BY';

	
	const DATE_CREATED = 'temp_finance_summary.DATE_CREATED';

	
	const MODIFIED_BY = 'temp_finance_summary.MODIFIED_BY';

	
	const DATE_MODIFIED = 'temp_finance_summary.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TransDate', 'CompanyId', 'Component', 'Value', 'IncomeExpense', 'Classification', 'Gst', 'SalesSource', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (TempFinanceSummaryPeer::ID, TempFinanceSummaryPeer::TRANS_DATE, TempFinanceSummaryPeer::COMPANY_ID, TempFinanceSummaryPeer::COMPONENT, TempFinanceSummaryPeer::VALUE, TempFinanceSummaryPeer::INCOME_EXPENSE, TempFinanceSummaryPeer::CLASSIFICATION, TempFinanceSummaryPeer::GST, TempFinanceSummaryPeer::SALES_SOURCE, TempFinanceSummaryPeer::CREATED_BY, TempFinanceSummaryPeer::DATE_CREATED, TempFinanceSummaryPeer::MODIFIED_BY, TempFinanceSummaryPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trans_date', 'company_id', 'component', 'value', 'income_expense', 'classification', 'gst', 'sales_source', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TransDate' => 1, 'CompanyId' => 2, 'Component' => 3, 'Value' => 4, 'IncomeExpense' => 5, 'Classification' => 6, 'Gst' => 7, 'SalesSource' => 8, 'CreatedBy' => 9, 'DateCreated' => 10, 'ModifiedBy' => 11, 'DateModified' => 12, ),
		BasePeer::TYPE_COLNAME => array (TempFinanceSummaryPeer::ID => 0, TempFinanceSummaryPeer::TRANS_DATE => 1, TempFinanceSummaryPeer::COMPANY_ID => 2, TempFinanceSummaryPeer::COMPONENT => 3, TempFinanceSummaryPeer::VALUE => 4, TempFinanceSummaryPeer::INCOME_EXPENSE => 5, TempFinanceSummaryPeer::CLASSIFICATION => 6, TempFinanceSummaryPeer::GST => 7, TempFinanceSummaryPeer::SALES_SOURCE => 8, TempFinanceSummaryPeer::CREATED_BY => 9, TempFinanceSummaryPeer::DATE_CREATED => 10, TempFinanceSummaryPeer::MODIFIED_BY => 11, TempFinanceSummaryPeer::DATE_MODIFIED => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trans_date' => 1, 'company_id' => 2, 'component' => 3, 'value' => 4, 'income_expense' => 5, 'classification' => 6, 'gst' => 7, 'sales_source' => 8, 'created_by' => 9, 'date_created' => 10, 'modified_by' => 11, 'date_modified' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/forecast/map/TempFinanceSummaryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.forecast.map.TempFinanceSummaryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TempFinanceSummaryPeer::getTableMap();
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
		return str_replace(TempFinanceSummaryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TempFinanceSummaryPeer::ID);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::TRANS_DATE);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::COMPANY_ID);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::COMPONENT);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::VALUE);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::CLASSIFICATION);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::GST);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::SALES_SOURCE);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::CREATED_BY);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::DATE_CREATED);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::MODIFIED_BY);

		$criteria->addSelectColumn(TempFinanceSummaryPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(temp_finance_summary.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT temp_finance_summary.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TempFinanceSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TempFinanceSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TempFinanceSummaryPeer::doSelectRS($criteria, $con);
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
		$objects = TempFinanceSummaryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TempFinanceSummaryPeer::populateObjects(TempFinanceSummaryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TempFinanceSummaryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TempFinanceSummaryPeer::getOMClass();
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
		return TempFinanceSummaryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TempFinanceSummaryPeer::ID); 

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
			$comparison = $criteria->getComparison(TempFinanceSummaryPeer::ID);
			$selectCriteria->add(TempFinanceSummaryPeer::ID, $criteria->remove(TempFinanceSummaryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TempFinanceSummaryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TempFinanceSummaryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TempFinanceSummary) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TempFinanceSummaryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TempFinanceSummary $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TempFinanceSummaryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TempFinanceSummaryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TempFinanceSummaryPeer::DATABASE_NAME, TempFinanceSummaryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TempFinanceSummaryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TempFinanceSummaryPeer::DATABASE_NAME);

		$criteria->add(TempFinanceSummaryPeer::ID, $pk);


		$v = TempFinanceSummaryPeer::doSelect($criteria, $con);

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
			$criteria->add(TempFinanceSummaryPeer::ID, $pks, Criteria::IN);
			$objs = TempFinanceSummaryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTempFinanceSummaryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/forecast/map/TempFinanceSummaryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.forecast.map.TempFinanceSummaryMapBuilder');
}
