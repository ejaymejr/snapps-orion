<?php


abstract class BasePayScheduledDeductionPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_scheduled_deduction';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayScheduledDeduction';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_scheduled_deduction.ID';

	
	const EMPLOYEE_NO = 'pay_scheduled_deduction.EMPLOYEE_NO';

	
	const NAME = 'pay_scheduled_deduction.NAME';

	
	const ACCT_CODE = 'pay_scheduled_deduction.ACCT_CODE';

	
	const DESCRIPTION = 'pay_scheduled_deduction.DESCRIPTION';

	
	const TOTAL_AMOUNT = 'pay_scheduled_deduction.TOTAL_AMOUNT';

	
	const SCHEDULED_AMOUNT = 'pay_scheduled_deduction.SCHEDULED_AMOUNT';

	
	const TOT_AMT_PAID = 'pay_scheduled_deduction.TOT_AMT_PAID';

	
	const FROM_DATE = 'pay_scheduled_deduction.FROM_DATE';

	
	const TO_DATE = 'pay_scheduled_deduction.TO_DATE';

	
	const FREQUENCY = 'pay_scheduled_deduction.FREQUENCY';

	
	const STATUS = 'pay_scheduled_deduction.STATUS';

	
	const PAID_TYPE = 'pay_scheduled_deduction.PAID_TYPE';

	
	const POST_BATCH = 'pay_scheduled_deduction.POST_BATCH';

	
	const DEDUCTION_PREPOST_BATCH = 'pay_scheduled_deduction.DEDUCTION_PREPOST_BATCH';

	
	const ENTRY_TYPE = 'pay_scheduled_deduction.ENTRY_TYPE';

	
	const CREATED_BY = 'pay_scheduled_deduction.CREATED_BY';

	
	const DATE_CREATED = 'pay_scheduled_deduction.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_scheduled_deduction.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_scheduled_deduction.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'AcctCode', 'Description', 'TotalAmount', 'ScheduledAmount', 'TotAmtPaid', 'FromDate', 'ToDate', 'Frequency', 'Status', 'PaidType', 'PostBatch', 'DeductionPrepostBatch', 'EntryType', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayScheduledDeductionPeer::ID, PayScheduledDeductionPeer::EMPLOYEE_NO, PayScheduledDeductionPeer::NAME, PayScheduledDeductionPeer::ACCT_CODE, PayScheduledDeductionPeer::DESCRIPTION, PayScheduledDeductionPeer::TOTAL_AMOUNT, PayScheduledDeductionPeer::SCHEDULED_AMOUNT, PayScheduledDeductionPeer::TOT_AMT_PAID, PayScheduledDeductionPeer::FROM_DATE, PayScheduledDeductionPeer::TO_DATE, PayScheduledDeductionPeer::FREQUENCY, PayScheduledDeductionPeer::STATUS, PayScheduledDeductionPeer::PAID_TYPE, PayScheduledDeductionPeer::POST_BATCH, PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH, PayScheduledDeductionPeer::ENTRY_TYPE, PayScheduledDeductionPeer::CREATED_BY, PayScheduledDeductionPeer::DATE_CREATED, PayScheduledDeductionPeer::MODIFIED_BY, PayScheduledDeductionPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'acct_code', 'description', 'total_amount', 'scheduled_amount', 'tot_amt_paid', 'from_date', 'to_date', 'frequency', 'status', 'paid_type', 'post_batch', 'deduction_prepost_batch', 'entry_type', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'AcctCode' => 3, 'Description' => 4, 'TotalAmount' => 5, 'ScheduledAmount' => 6, 'TotAmtPaid' => 7, 'FromDate' => 8, 'ToDate' => 9, 'Frequency' => 10, 'Status' => 11, 'PaidType' => 12, 'PostBatch' => 13, 'DeductionPrepostBatch' => 14, 'EntryType' => 15, 'CreatedBy' => 16, 'DateCreated' => 17, 'ModifiedBy' => 18, 'DateModified' => 19, ),
		BasePeer::TYPE_COLNAME => array (PayScheduledDeductionPeer::ID => 0, PayScheduledDeductionPeer::EMPLOYEE_NO => 1, PayScheduledDeductionPeer::NAME => 2, PayScheduledDeductionPeer::ACCT_CODE => 3, PayScheduledDeductionPeer::DESCRIPTION => 4, PayScheduledDeductionPeer::TOTAL_AMOUNT => 5, PayScheduledDeductionPeer::SCHEDULED_AMOUNT => 6, PayScheduledDeductionPeer::TOT_AMT_PAID => 7, PayScheduledDeductionPeer::FROM_DATE => 8, PayScheduledDeductionPeer::TO_DATE => 9, PayScheduledDeductionPeer::FREQUENCY => 10, PayScheduledDeductionPeer::STATUS => 11, PayScheduledDeductionPeer::PAID_TYPE => 12, PayScheduledDeductionPeer::POST_BATCH => 13, PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH => 14, PayScheduledDeductionPeer::ENTRY_TYPE => 15, PayScheduledDeductionPeer::CREATED_BY => 16, PayScheduledDeductionPeer::DATE_CREATED => 17, PayScheduledDeductionPeer::MODIFIED_BY => 18, PayScheduledDeductionPeer::DATE_MODIFIED => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'acct_code' => 3, 'description' => 4, 'total_amount' => 5, 'scheduled_amount' => 6, 'tot_amt_paid' => 7, 'from_date' => 8, 'to_date' => 9, 'frequency' => 10, 'status' => 11, 'paid_type' => 12, 'post_batch' => 13, 'deduction_prepost_batch' => 14, 'entry_type' => 15, 'created_by' => 16, 'date_created' => 17, 'modified_by' => 18, 'date_modified' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayScheduledDeductionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayScheduledDeductionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayScheduledDeductionPeer::getTableMap();
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
		return str_replace(PayScheduledDeductionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayScheduledDeductionPeer::ID);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::NAME);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::TOTAL_AMOUNT);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::SCHEDULED_AMOUNT);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::TOT_AMT_PAID);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::FROM_DATE);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::TO_DATE);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::FREQUENCY);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::STATUS);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::PAID_TYPE);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::POST_BATCH);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::DEDUCTION_PREPOST_BATCH);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::ENTRY_TYPE);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::CREATED_BY);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayScheduledDeductionPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_scheduled_deduction.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_scheduled_deduction.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayScheduledDeductionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayScheduledDeductionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayScheduledDeductionPeer::doSelectRS($criteria, $con);
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
		$objects = PayScheduledDeductionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayScheduledDeductionPeer::populateObjects(PayScheduledDeductionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayScheduledDeductionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayScheduledDeductionPeer::getOMClass();
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
		return PayScheduledDeductionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayScheduledDeductionPeer::ID); 

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
			$comparison = $criteria->getComparison(PayScheduledDeductionPeer::ID);
			$selectCriteria->add(PayScheduledDeductionPeer::ID, $criteria->remove(PayScheduledDeductionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayScheduledDeductionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayScheduledDeductionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayScheduledDeduction) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayScheduledDeductionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayScheduledDeduction $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayScheduledDeductionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayScheduledDeductionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayScheduledDeductionPeer::DATABASE_NAME, PayScheduledDeductionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayScheduledDeductionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayScheduledDeductionPeer::DATABASE_NAME);

		$criteria->add(PayScheduledDeductionPeer::ID, $pk);


		$v = PayScheduledDeductionPeer::doSelect($criteria, $con);

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
			$criteria->add(PayScheduledDeductionPeer::ID, $pks, Criteria::IN);
			$objs = PayScheduledDeductionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayScheduledDeductionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayScheduledDeductionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayScheduledDeductionMapBuilder');
}
