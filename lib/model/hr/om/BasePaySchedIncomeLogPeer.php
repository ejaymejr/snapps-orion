<?php


abstract class BasePaySchedIncomeLogPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_sched_income_log';

	
	const CLASS_DEFAULT = 'lib.model.hr.PaySchedIncomeLog';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_sched_income_log.ID';

	
	const EMPLOYEE_NO = 'pay_sched_income_log.EMPLOYEE_NO';

	
	const PAY_SCHEDULED_INCOME_ID = 'pay_sched_income_log.PAY_SCHEDULED_INCOME_ID';

	
	const PERIOD_CODE = 'pay_sched_income_log.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_sched_income_log.ACCT_CODE';

	
	const DESCRIPTION = 'pay_sched_income_log.DESCRIPTION';

	
	const AMOUNT = 'pay_sched_income_log.AMOUNT';

	
	const CREATED_BY = 'pay_sched_income_log.CREATED_BY';

	
	const DATE_CREATED = 'pay_sched_income_log.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_sched_income_log.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_sched_income_log.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'PayScheduledIncomeId', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PaySchedIncomeLogPeer::ID, PaySchedIncomeLogPeer::EMPLOYEE_NO, PaySchedIncomeLogPeer::PAY_SCHEDULED_INCOME_ID, PaySchedIncomeLogPeer::PERIOD_CODE, PaySchedIncomeLogPeer::ACCT_CODE, PaySchedIncomeLogPeer::DESCRIPTION, PaySchedIncomeLogPeer::AMOUNT, PaySchedIncomeLogPeer::CREATED_BY, PaySchedIncomeLogPeer::DATE_CREATED, PaySchedIncomeLogPeer::MODIFIED_BY, PaySchedIncomeLogPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'pay_scheduled_income_id', 'period_code', 'acct_code', 'description', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'PayScheduledIncomeId' => 2, 'PeriodCode' => 3, 'AcctCode' => 4, 'Description' => 5, 'Amount' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (PaySchedIncomeLogPeer::ID => 0, PaySchedIncomeLogPeer::EMPLOYEE_NO => 1, PaySchedIncomeLogPeer::PAY_SCHEDULED_INCOME_ID => 2, PaySchedIncomeLogPeer::PERIOD_CODE => 3, PaySchedIncomeLogPeer::ACCT_CODE => 4, PaySchedIncomeLogPeer::DESCRIPTION => 5, PaySchedIncomeLogPeer::AMOUNT => 6, PaySchedIncomeLogPeer::CREATED_BY => 7, PaySchedIncomeLogPeer::DATE_CREATED => 8, PaySchedIncomeLogPeer::MODIFIED_BY => 9, PaySchedIncomeLogPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'pay_scheduled_income_id' => 2, 'period_code' => 3, 'acct_code' => 4, 'description' => 5, 'amount' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PaySchedIncomeLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PaySchedIncomeLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PaySchedIncomeLogPeer::getTableMap();
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
		return str_replace(PaySchedIncomeLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::ID);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::PAY_SCHEDULED_INCOME_ID);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::ACCT_CODE);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::DESCRIPTION);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::AMOUNT);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::CREATED_BY);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::DATE_CREATED);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PaySchedIncomeLogPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_sched_income_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_sched_income_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PaySchedIncomeLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PaySchedIncomeLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PaySchedIncomeLogPeer::doSelectRS($criteria, $con);
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
		$objects = PaySchedIncomeLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PaySchedIncomeLogPeer::populateObjects(PaySchedIncomeLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PaySchedIncomeLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PaySchedIncomeLogPeer::getOMClass();
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
		return PaySchedIncomeLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PaySchedIncomeLogPeer::ID); 

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
			$comparison = $criteria->getComparison(PaySchedIncomeLogPeer::ID);
			$selectCriteria->add(PaySchedIncomeLogPeer::ID, $criteria->remove(PaySchedIncomeLogPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PaySchedIncomeLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PaySchedIncomeLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PaySchedIncomeLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PaySchedIncomeLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PaySchedIncomeLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PaySchedIncomeLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PaySchedIncomeLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PaySchedIncomeLogPeer::DATABASE_NAME, PaySchedIncomeLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PaySchedIncomeLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PaySchedIncomeLogPeer::DATABASE_NAME);

		$criteria->add(PaySchedIncomeLogPeer::ID, $pk);


		$v = PaySchedIncomeLogPeer::doSelect($criteria, $con);

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
			$criteria->add(PaySchedIncomeLogPeer::ID, $pks, Criteria::IN);
			$objs = PaySchedIncomeLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePaySchedIncomeLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PaySchedIncomeLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PaySchedIncomeLogMapBuilder');
}
