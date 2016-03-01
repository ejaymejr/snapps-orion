<?php


abstract class BasePayScheduledIncomePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_scheduled_income';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayScheduledIncome';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_scheduled_income.ID';

	
	const EMPLOYEE_NO = 'pay_scheduled_income.EMPLOYEE_NO';

	
	const NAME = 'pay_scheduled_income.NAME';

	
	const ACCT_CODE = 'pay_scheduled_income.ACCT_CODE';

	
	const DESCRIPTION = 'pay_scheduled_income.DESCRIPTION';

	
	const TOTAL_AMOUNT = 'pay_scheduled_income.TOTAL_AMOUNT';

	
	const SCHEDULED_AMOUNT = 'pay_scheduled_income.SCHEDULED_AMOUNT';

	
	const TOT_AMT_RECEIVED = 'pay_scheduled_income.TOT_AMT_RECEIVED';

	
	const TAXABLE_AMOUNT = 'pay_scheduled_income.TAXABLE_AMOUNT';

	
	const TAX_PERCENTAGE = 'pay_scheduled_income.TAX_PERCENTAGE';

	
	const FROM_DATE = 'pay_scheduled_income.FROM_DATE';

	
	const TO_DATE = 'pay_scheduled_income.TO_DATE';

	
	const FREQUENCY = 'pay_scheduled_income.FREQUENCY';

	
	const STATUS = 'pay_scheduled_income.STATUS';

	
	const PAID_TYPE = 'pay_scheduled_income.PAID_TYPE';

	
	const POST_BATCH = 'pay_scheduled_income.POST_BATCH';

	
	const ENTRY_TYPE = 'pay_scheduled_income.ENTRY_TYPE';

	
	const INCOME_PREPOST_BATCH = 'pay_scheduled_income.INCOME_PREPOST_BATCH';

	
	const CREATED_BY = 'pay_scheduled_income.CREATED_BY';

	
	const DATE_CREATED = 'pay_scheduled_income.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_scheduled_income.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_scheduled_income.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'AcctCode', 'Description', 'TotalAmount', 'ScheduledAmount', 'TotAmtReceived', 'TaxableAmount', 'TaxPercentage', 'FromDate', 'ToDate', 'Frequency', 'Status', 'PaidType', 'PostBatch', 'EntryType', 'IncomePrepostBatch', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayScheduledIncomePeer::ID, PayScheduledIncomePeer::EMPLOYEE_NO, PayScheduledIncomePeer::NAME, PayScheduledIncomePeer::ACCT_CODE, PayScheduledIncomePeer::DESCRIPTION, PayScheduledIncomePeer::TOTAL_AMOUNT, PayScheduledIncomePeer::SCHEDULED_AMOUNT, PayScheduledIncomePeer::TOT_AMT_RECEIVED, PayScheduledIncomePeer::TAXABLE_AMOUNT, PayScheduledIncomePeer::TAX_PERCENTAGE, PayScheduledIncomePeer::FROM_DATE, PayScheduledIncomePeer::TO_DATE, PayScheduledIncomePeer::FREQUENCY, PayScheduledIncomePeer::STATUS, PayScheduledIncomePeer::PAID_TYPE, PayScheduledIncomePeer::POST_BATCH, PayScheduledIncomePeer::ENTRY_TYPE, PayScheduledIncomePeer::INCOME_PREPOST_BATCH, PayScheduledIncomePeer::CREATED_BY, PayScheduledIncomePeer::DATE_CREATED, PayScheduledIncomePeer::MODIFIED_BY, PayScheduledIncomePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'acct_code', 'description', 'total_amount', 'scheduled_amount', 'tot_amt_received', 'taxable_amount', 'tax_percentage', 'from_date', 'to_date', 'frequency', 'status', 'paid_type', 'post_batch', 'entry_type', 'income_prepost_batch', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'AcctCode' => 3, 'Description' => 4, 'TotalAmount' => 5, 'ScheduledAmount' => 6, 'TotAmtReceived' => 7, 'TaxableAmount' => 8, 'TaxPercentage' => 9, 'FromDate' => 10, 'ToDate' => 11, 'Frequency' => 12, 'Status' => 13, 'PaidType' => 14, 'PostBatch' => 15, 'EntryType' => 16, 'IncomePrepostBatch' => 17, 'CreatedBy' => 18, 'DateCreated' => 19, 'ModifiedBy' => 20, 'DateModified' => 21, ),
		BasePeer::TYPE_COLNAME => array (PayScheduledIncomePeer::ID => 0, PayScheduledIncomePeer::EMPLOYEE_NO => 1, PayScheduledIncomePeer::NAME => 2, PayScheduledIncomePeer::ACCT_CODE => 3, PayScheduledIncomePeer::DESCRIPTION => 4, PayScheduledIncomePeer::TOTAL_AMOUNT => 5, PayScheduledIncomePeer::SCHEDULED_AMOUNT => 6, PayScheduledIncomePeer::TOT_AMT_RECEIVED => 7, PayScheduledIncomePeer::TAXABLE_AMOUNT => 8, PayScheduledIncomePeer::TAX_PERCENTAGE => 9, PayScheduledIncomePeer::FROM_DATE => 10, PayScheduledIncomePeer::TO_DATE => 11, PayScheduledIncomePeer::FREQUENCY => 12, PayScheduledIncomePeer::STATUS => 13, PayScheduledIncomePeer::PAID_TYPE => 14, PayScheduledIncomePeer::POST_BATCH => 15, PayScheduledIncomePeer::ENTRY_TYPE => 16, PayScheduledIncomePeer::INCOME_PREPOST_BATCH => 17, PayScheduledIncomePeer::CREATED_BY => 18, PayScheduledIncomePeer::DATE_CREATED => 19, PayScheduledIncomePeer::MODIFIED_BY => 20, PayScheduledIncomePeer::DATE_MODIFIED => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'acct_code' => 3, 'description' => 4, 'total_amount' => 5, 'scheduled_amount' => 6, 'tot_amt_received' => 7, 'taxable_amount' => 8, 'tax_percentage' => 9, 'from_date' => 10, 'to_date' => 11, 'frequency' => 12, 'status' => 13, 'paid_type' => 14, 'post_batch' => 15, 'entry_type' => 16, 'income_prepost_batch' => 17, 'created_by' => 18, 'date_created' => 19, 'modified_by' => 20, 'date_modified' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayScheduledIncomeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayScheduledIncomeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayScheduledIncomePeer::getTableMap();
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
		return str_replace(PayScheduledIncomePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayScheduledIncomePeer::ID);

		$criteria->addSelectColumn(PayScheduledIncomePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayScheduledIncomePeer::NAME);

		$criteria->addSelectColumn(PayScheduledIncomePeer::ACCT_CODE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::DESCRIPTION);

		$criteria->addSelectColumn(PayScheduledIncomePeer::TOTAL_AMOUNT);

		$criteria->addSelectColumn(PayScheduledIncomePeer::SCHEDULED_AMOUNT);

		$criteria->addSelectColumn(PayScheduledIncomePeer::TOT_AMT_RECEIVED);

		$criteria->addSelectColumn(PayScheduledIncomePeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayScheduledIncomePeer::TAX_PERCENTAGE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::FROM_DATE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::TO_DATE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::FREQUENCY);

		$criteria->addSelectColumn(PayScheduledIncomePeer::STATUS);

		$criteria->addSelectColumn(PayScheduledIncomePeer::PAID_TYPE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::POST_BATCH);

		$criteria->addSelectColumn(PayScheduledIncomePeer::ENTRY_TYPE);

		$criteria->addSelectColumn(PayScheduledIncomePeer::INCOME_PREPOST_BATCH);

		$criteria->addSelectColumn(PayScheduledIncomePeer::CREATED_BY);

		$criteria->addSelectColumn(PayScheduledIncomePeer::DATE_CREATED);

		$criteria->addSelectColumn(PayScheduledIncomePeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayScheduledIncomePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_scheduled_income.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_scheduled_income.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayScheduledIncomePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayScheduledIncomePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayScheduledIncomePeer::doSelectRS($criteria, $con);
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
		$objects = PayScheduledIncomePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayScheduledIncomePeer::populateObjects(PayScheduledIncomePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayScheduledIncomePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayScheduledIncomePeer::getOMClass();
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
		return PayScheduledIncomePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayScheduledIncomePeer::ID); 

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
			$comparison = $criteria->getComparison(PayScheduledIncomePeer::ID);
			$selectCriteria->add(PayScheduledIncomePeer::ID, $criteria->remove(PayScheduledIncomePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayScheduledIncomePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayScheduledIncomePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayScheduledIncome) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayScheduledIncomePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayScheduledIncome $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayScheduledIncomePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayScheduledIncomePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayScheduledIncomePeer::DATABASE_NAME, PayScheduledIncomePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayScheduledIncomePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayScheduledIncomePeer::DATABASE_NAME);

		$criteria->add(PayScheduledIncomePeer::ID, $pk);


		$v = PayScheduledIncomePeer::doSelect($criteria, $con);

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
			$criteria->add(PayScheduledIncomePeer::ID, $pks, Criteria::IN);
			$objs = PayScheduledIncomePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayScheduledIncomePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayScheduledIncomeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayScheduledIncomeMapBuilder');
}
