<?php


abstract class BasePayFixedIncomePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_fixed_income';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayFixedIncome';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_fixed_income.ID';

	
	const EMPLOYEE_NO = 'pay_fixed_income.EMPLOYEE_NO';

	
	const NAME = 'pay_fixed_income.NAME';

	
	const ACCT_CODE = 'pay_fixed_income.ACCT_CODE';

	
	const DESCRIPTION = 'pay_fixed_income.DESCRIPTION';

	
	const SCHEDULED_AMOUNT = 'pay_fixed_income.SCHEDULED_AMOUNT';

	
	const TAXABLE_AMOUNT = 'pay_fixed_income.TAXABLE_AMOUNT';

	
	const TAX_PERCENTAGE = 'pay_fixed_income.TAX_PERCENTAGE';

	
	const FROM_DATE = 'pay_fixed_income.FROM_DATE';

	
	const TO_DATE = 'pay_fixed_income.TO_DATE';

	
	const FREQUENCY = 'pay_fixed_income.FREQUENCY';

	
	const PAID_TYPE = 'pay_fixed_income.PAID_TYPE';

	
	const IS_ACTIVE = 'pay_fixed_income.IS_ACTIVE';

	
	const ENTRY_TYPE = 'pay_fixed_income.ENTRY_TYPE';

	
	const REMARK = 'pay_fixed_income.REMARK';

	
	const CREATED_BY = 'pay_fixed_income.CREATED_BY';

	
	const DATE_CREATED = 'pay_fixed_income.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_fixed_income.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_fixed_income.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'AcctCode', 'Description', 'ScheduledAmount', 'TaxableAmount', 'TaxPercentage', 'FromDate', 'ToDate', 'Frequency', 'PaidType', 'IsActive', 'EntryType', 'Remark', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayFixedIncomePeer::ID, PayFixedIncomePeer::EMPLOYEE_NO, PayFixedIncomePeer::NAME, PayFixedIncomePeer::ACCT_CODE, PayFixedIncomePeer::DESCRIPTION, PayFixedIncomePeer::SCHEDULED_AMOUNT, PayFixedIncomePeer::TAXABLE_AMOUNT, PayFixedIncomePeer::TAX_PERCENTAGE, PayFixedIncomePeer::FROM_DATE, PayFixedIncomePeer::TO_DATE, PayFixedIncomePeer::FREQUENCY, PayFixedIncomePeer::PAID_TYPE, PayFixedIncomePeer::IS_ACTIVE, PayFixedIncomePeer::ENTRY_TYPE, PayFixedIncomePeer::REMARK, PayFixedIncomePeer::CREATED_BY, PayFixedIncomePeer::DATE_CREATED, PayFixedIncomePeer::MODIFIED_BY, PayFixedIncomePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'acct_code', 'description', 'scheduled_amount', 'taxable_amount', 'tax_percentage', 'from_date', 'to_date', 'frequency', 'paid_type', 'is_active', 'entry_type', 'remark', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'AcctCode' => 3, 'Description' => 4, 'ScheduledAmount' => 5, 'TaxableAmount' => 6, 'TaxPercentage' => 7, 'FromDate' => 8, 'ToDate' => 9, 'Frequency' => 10, 'PaidType' => 11, 'IsActive' => 12, 'EntryType' => 13, 'Remark' => 14, 'CreatedBy' => 15, 'DateCreated' => 16, 'ModifiedBy' => 17, 'DateModified' => 18, ),
		BasePeer::TYPE_COLNAME => array (PayFixedIncomePeer::ID => 0, PayFixedIncomePeer::EMPLOYEE_NO => 1, PayFixedIncomePeer::NAME => 2, PayFixedIncomePeer::ACCT_CODE => 3, PayFixedIncomePeer::DESCRIPTION => 4, PayFixedIncomePeer::SCHEDULED_AMOUNT => 5, PayFixedIncomePeer::TAXABLE_AMOUNT => 6, PayFixedIncomePeer::TAX_PERCENTAGE => 7, PayFixedIncomePeer::FROM_DATE => 8, PayFixedIncomePeer::TO_DATE => 9, PayFixedIncomePeer::FREQUENCY => 10, PayFixedIncomePeer::PAID_TYPE => 11, PayFixedIncomePeer::IS_ACTIVE => 12, PayFixedIncomePeer::ENTRY_TYPE => 13, PayFixedIncomePeer::REMARK => 14, PayFixedIncomePeer::CREATED_BY => 15, PayFixedIncomePeer::DATE_CREATED => 16, PayFixedIncomePeer::MODIFIED_BY => 17, PayFixedIncomePeer::DATE_MODIFIED => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'acct_code' => 3, 'description' => 4, 'scheduled_amount' => 5, 'taxable_amount' => 6, 'tax_percentage' => 7, 'from_date' => 8, 'to_date' => 9, 'frequency' => 10, 'paid_type' => 11, 'is_active' => 12, 'entry_type' => 13, 'remark' => 14, 'created_by' => 15, 'date_created' => 16, 'modified_by' => 17, 'date_modified' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayFixedIncomeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayFixedIncomeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayFixedIncomePeer::getTableMap();
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
		return str_replace(PayFixedIncomePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayFixedIncomePeer::ID);

		$criteria->addSelectColumn(PayFixedIncomePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayFixedIncomePeer::NAME);

		$criteria->addSelectColumn(PayFixedIncomePeer::ACCT_CODE);

		$criteria->addSelectColumn(PayFixedIncomePeer::DESCRIPTION);

		$criteria->addSelectColumn(PayFixedIncomePeer::SCHEDULED_AMOUNT);

		$criteria->addSelectColumn(PayFixedIncomePeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayFixedIncomePeer::TAX_PERCENTAGE);

		$criteria->addSelectColumn(PayFixedIncomePeer::FROM_DATE);

		$criteria->addSelectColumn(PayFixedIncomePeer::TO_DATE);

		$criteria->addSelectColumn(PayFixedIncomePeer::FREQUENCY);

		$criteria->addSelectColumn(PayFixedIncomePeer::PAID_TYPE);

		$criteria->addSelectColumn(PayFixedIncomePeer::IS_ACTIVE);

		$criteria->addSelectColumn(PayFixedIncomePeer::ENTRY_TYPE);

		$criteria->addSelectColumn(PayFixedIncomePeer::REMARK);

		$criteria->addSelectColumn(PayFixedIncomePeer::CREATED_BY);

		$criteria->addSelectColumn(PayFixedIncomePeer::DATE_CREATED);

		$criteria->addSelectColumn(PayFixedIncomePeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayFixedIncomePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_fixed_income.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_fixed_income.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayFixedIncomePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayFixedIncomePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayFixedIncomePeer::doSelectRS($criteria, $con);
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
		$objects = PayFixedIncomePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayFixedIncomePeer::populateObjects(PayFixedIncomePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayFixedIncomePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayFixedIncomePeer::getOMClass();
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
		return PayFixedIncomePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayFixedIncomePeer::ID); 

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
			$comparison = $criteria->getComparison(PayFixedIncomePeer::ID);
			$selectCriteria->add(PayFixedIncomePeer::ID, $criteria->remove(PayFixedIncomePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayFixedIncomePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayFixedIncomePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayFixedIncome) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayFixedIncomePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayFixedIncome $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayFixedIncomePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayFixedIncomePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayFixedIncomePeer::DATABASE_NAME, PayFixedIncomePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayFixedIncomePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayFixedIncomePeer::DATABASE_NAME);

		$criteria->add(PayFixedIncomePeer::ID, $pk);


		$v = PayFixedIncomePeer::doSelect($criteria, $con);

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
			$criteria->add(PayFixedIncomePeer::ID, $pks, Criteria::IN);
			$objs = PayFixedIncomePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayFixedIncomePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayFixedIncomeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayFixedIncomeMapBuilder');
}
