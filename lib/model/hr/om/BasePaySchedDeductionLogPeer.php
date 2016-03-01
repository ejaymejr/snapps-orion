<?php


abstract class BasePaySchedDeductionLogPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_sched_deduction_log';

	
	const CLASS_DEFAULT = 'lib.model.hr.PaySchedDeductionLog';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_sched_deduction_log.ID';

	
	const PAY_SCHEDULED_DEDUCTION_ID = 'pay_sched_deduction_log.PAY_SCHEDULED_DEDUCTION_ID';

	
	const EMPLOYEE_NO = 'pay_sched_deduction_log.EMPLOYEE_NO';

	
	const PERIOD_CODE = 'pay_sched_deduction_log.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_sched_deduction_log.ACCT_CODE';

	
	const DESCRIPTION = 'pay_sched_deduction_log.DESCRIPTION';

	
	const AMOUNT = 'pay_sched_deduction_log.AMOUNT';

	
	const CREATED_BY = 'pay_sched_deduction_log.CREATED_BY';

	
	const DATE_CREATED = 'pay_sched_deduction_log.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_sched_deduction_log.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_sched_deduction_log.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PayScheduledDeductionId', 'EmployeeNo', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PaySchedDeductionLogPeer::ID, PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID, PaySchedDeductionLogPeer::EMPLOYEE_NO, PaySchedDeductionLogPeer::PERIOD_CODE, PaySchedDeductionLogPeer::ACCT_CODE, PaySchedDeductionLogPeer::DESCRIPTION, PaySchedDeductionLogPeer::AMOUNT, PaySchedDeductionLogPeer::CREATED_BY, PaySchedDeductionLogPeer::DATE_CREATED, PaySchedDeductionLogPeer::MODIFIED_BY, PaySchedDeductionLogPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pay_scheduled_deduction_id', 'employee_no', 'period_code', 'acct_code', 'description', 'amount', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PayScheduledDeductionId' => 1, 'EmployeeNo' => 2, 'PeriodCode' => 3, 'AcctCode' => 4, 'Description' => 5, 'Amount' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (PaySchedDeductionLogPeer::ID => 0, PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID => 1, PaySchedDeductionLogPeer::EMPLOYEE_NO => 2, PaySchedDeductionLogPeer::PERIOD_CODE => 3, PaySchedDeductionLogPeer::ACCT_CODE => 4, PaySchedDeductionLogPeer::DESCRIPTION => 5, PaySchedDeductionLogPeer::AMOUNT => 6, PaySchedDeductionLogPeer::CREATED_BY => 7, PaySchedDeductionLogPeer::DATE_CREATED => 8, PaySchedDeductionLogPeer::MODIFIED_BY => 9, PaySchedDeductionLogPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pay_scheduled_deduction_id' => 1, 'employee_no' => 2, 'period_code' => 3, 'acct_code' => 4, 'description' => 5, 'amount' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PaySchedDeductionLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PaySchedDeductionLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PaySchedDeductionLogPeer::getTableMap();
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
		return str_replace(PaySchedDeductionLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::ID);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::PAY_SCHEDULED_DEDUCTION_ID);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::ACCT_CODE);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::DESCRIPTION);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::AMOUNT);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::CREATED_BY);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::DATE_CREATED);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PaySchedDeductionLogPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_sched_deduction_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_sched_deduction_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PaySchedDeductionLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PaySchedDeductionLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PaySchedDeductionLogPeer::doSelectRS($criteria, $con);
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
		$objects = PaySchedDeductionLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PaySchedDeductionLogPeer::populateObjects(PaySchedDeductionLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PaySchedDeductionLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PaySchedDeductionLogPeer::getOMClass();
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
		return PaySchedDeductionLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PaySchedDeductionLogPeer::ID); 

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
			$comparison = $criteria->getComparison(PaySchedDeductionLogPeer::ID);
			$selectCriteria->add(PaySchedDeductionLogPeer::ID, $criteria->remove(PaySchedDeductionLogPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PaySchedDeductionLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PaySchedDeductionLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PaySchedDeductionLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PaySchedDeductionLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PaySchedDeductionLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PaySchedDeductionLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PaySchedDeductionLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PaySchedDeductionLogPeer::DATABASE_NAME, PaySchedDeductionLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PaySchedDeductionLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PaySchedDeductionLogPeer::DATABASE_NAME);

		$criteria->add(PaySchedDeductionLogPeer::ID, $pk);


		$v = PaySchedDeductionLogPeer::doSelect($criteria, $con);

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
			$criteria->add(PaySchedDeductionLogPeer::ID, $pks, Criteria::IN);
			$objs = PaySchedDeductionLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePaySchedDeductionLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PaySchedDeductionLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PaySchedDeductionLogMapBuilder');
}
