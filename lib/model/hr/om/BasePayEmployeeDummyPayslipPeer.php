<?php


abstract class BasePayEmployeeDummyPayslipPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_dummy_payslip';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeDummyPayslip';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_dummy_payslip.ID';

	
	const EMPLOYEE_NO = 'pay_employee_dummy_payslip.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_dummy_payslip.NAME';

	
	const DEPARTMENT = 'pay_employee_dummy_payslip.DEPARTMENT';

	
	const COMPANY = 'pay_employee_dummy_payslip.COMPANY';

	
	const FREQUENCY = 'pay_employee_dummy_payslip.FREQUENCY';

	
	const PERIOD_CODE = 'pay_employee_dummy_payslip.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_employee_dummy_payslip.ACCT_CODE';

	
	const DESCRIPTION = 'pay_employee_dummy_payslip.DESCRIPTION';

	
	const AMOUNT = 'pay_employee_dummy_payslip.AMOUNT';

	
	const PAY_SCHEDULED_INCOME_ID = 'pay_employee_dummy_payslip.PAY_SCHEDULED_INCOME_ID';

	
	const PAY_SCHEDULED_DEDUCTION_ID = 'pay_employee_dummy_payslip.PAY_SCHEDULED_DEDUCTION_ID';

	
	const INCOME_EXPENSE = 'pay_employee_dummy_payslip.INCOME_EXPENSE';

	
	const ACCT_SOURCE = 'pay_employee_dummy_payslip.ACCT_SOURCE';

	
	const PROCESSED_AS = 'pay_employee_dummy_payslip.PROCESSED_AS';

	
	const TAX_CODE = 'pay_employee_dummy_payslip.TAX_CODE';

	
	const TAXABLE_AMOUNT = 'pay_employee_dummy_payslip.TAXABLE_AMOUNT';

	
	const CPF_TOTAL = 'pay_employee_dummy_payslip.CPF_TOTAL';

	
	const CPF_ER = 'pay_employee_dummy_payslip.CPF_ER';

	
	const IS_PAYSLIP_PRINTED = 'pay_employee_dummy_payslip.IS_PAYSLIP_PRINTED';

	
	const RACE = 'pay_employee_dummy_payslip.RACE';

	
	const BANK_CASH = 'pay_employee_dummy_payslip.BANK_CASH';

	
	const CREATED_BY = 'pay_employee_dummy_payslip.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_dummy_payslip.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_dummy_payslip.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_dummy_payslip.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'Company', 'Frequency', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'PayScheduledIncomeId', 'PayScheduledDeductionId', 'IncomeExpense', 'AcctSource', 'ProcessedAs', 'TaxCode', 'TaxableAmount', 'CpfTotal', 'CpfEr', 'IsPayslipPrinted', 'Race', 'BankCash', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeDummyPayslipPeer::ID, PayEmployeeDummyPayslipPeer::EMPLOYEE_NO, PayEmployeeDummyPayslipPeer::NAME, PayEmployeeDummyPayslipPeer::DEPARTMENT, PayEmployeeDummyPayslipPeer::COMPANY, PayEmployeeDummyPayslipPeer::FREQUENCY, PayEmployeeDummyPayslipPeer::PERIOD_CODE, PayEmployeeDummyPayslipPeer::ACCT_CODE, PayEmployeeDummyPayslipPeer::DESCRIPTION, PayEmployeeDummyPayslipPeer::AMOUNT, PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_INCOME_ID, PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_DEDUCTION_ID, PayEmployeeDummyPayslipPeer::INCOME_EXPENSE, PayEmployeeDummyPayslipPeer::ACCT_SOURCE, PayEmployeeDummyPayslipPeer::PROCESSED_AS, PayEmployeeDummyPayslipPeer::TAX_CODE, PayEmployeeDummyPayslipPeer::TAXABLE_AMOUNT, PayEmployeeDummyPayslipPeer::CPF_TOTAL, PayEmployeeDummyPayslipPeer::CPF_ER, PayEmployeeDummyPayslipPeer::IS_PAYSLIP_PRINTED, PayEmployeeDummyPayslipPeer::RACE, PayEmployeeDummyPayslipPeer::BANK_CASH, PayEmployeeDummyPayslipPeer::CREATED_BY, PayEmployeeDummyPayslipPeer::DATE_CREATED, PayEmployeeDummyPayslipPeer::MODIFIED_BY, PayEmployeeDummyPayslipPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'company', 'frequency', 'period_code', 'acct_code', 'description', 'amount', 'pay_scheduled_income_id', 'pay_scheduled_deduction_id', 'income_expense', 'acct_source', 'processed_as', 'tax_code', 'taxable_amount', 'cpf_total', 'cpf_er', 'is_payslip_printed', 'race', 'bank_cash', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'Company' => 4, 'Frequency' => 5, 'PeriodCode' => 6, 'AcctCode' => 7, 'Description' => 8, 'Amount' => 9, 'PayScheduledIncomeId' => 10, 'PayScheduledDeductionId' => 11, 'IncomeExpense' => 12, 'AcctSource' => 13, 'ProcessedAs' => 14, 'TaxCode' => 15, 'TaxableAmount' => 16, 'CpfTotal' => 17, 'CpfEr' => 18, 'IsPayslipPrinted' => 19, 'Race' => 20, 'BankCash' => 21, 'CreatedBy' => 22, 'DateCreated' => 23, 'ModifiedBy' => 24, 'DateModified' => 25, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeDummyPayslipPeer::ID => 0, PayEmployeeDummyPayslipPeer::EMPLOYEE_NO => 1, PayEmployeeDummyPayslipPeer::NAME => 2, PayEmployeeDummyPayslipPeer::DEPARTMENT => 3, PayEmployeeDummyPayslipPeer::COMPANY => 4, PayEmployeeDummyPayslipPeer::FREQUENCY => 5, PayEmployeeDummyPayslipPeer::PERIOD_CODE => 6, PayEmployeeDummyPayslipPeer::ACCT_CODE => 7, PayEmployeeDummyPayslipPeer::DESCRIPTION => 8, PayEmployeeDummyPayslipPeer::AMOUNT => 9, PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_INCOME_ID => 10, PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_DEDUCTION_ID => 11, PayEmployeeDummyPayslipPeer::INCOME_EXPENSE => 12, PayEmployeeDummyPayslipPeer::ACCT_SOURCE => 13, PayEmployeeDummyPayslipPeer::PROCESSED_AS => 14, PayEmployeeDummyPayslipPeer::TAX_CODE => 15, PayEmployeeDummyPayslipPeer::TAXABLE_AMOUNT => 16, PayEmployeeDummyPayslipPeer::CPF_TOTAL => 17, PayEmployeeDummyPayslipPeer::CPF_ER => 18, PayEmployeeDummyPayslipPeer::IS_PAYSLIP_PRINTED => 19, PayEmployeeDummyPayslipPeer::RACE => 20, PayEmployeeDummyPayslipPeer::BANK_CASH => 21, PayEmployeeDummyPayslipPeer::CREATED_BY => 22, PayEmployeeDummyPayslipPeer::DATE_CREATED => 23, PayEmployeeDummyPayslipPeer::MODIFIED_BY => 24, PayEmployeeDummyPayslipPeer::DATE_MODIFIED => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'company' => 4, 'frequency' => 5, 'period_code' => 6, 'acct_code' => 7, 'description' => 8, 'amount' => 9, 'pay_scheduled_income_id' => 10, 'pay_scheduled_deduction_id' => 11, 'income_expense' => 12, 'acct_source' => 13, 'processed_as' => 14, 'tax_code' => 15, 'taxable_amount' => 16, 'cpf_total' => 17, 'cpf_er' => 18, 'is_payslip_printed' => 19, 'race' => 20, 'bank_cash' => 21, 'created_by' => 22, 'date_created' => 23, 'modified_by' => 24, 'date_modified' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeDummyPayslipMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeDummyPayslipMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeDummyPayslipPeer::getTableMap();
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
		return str_replace(PayEmployeeDummyPayslipPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::ID);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::FREQUENCY);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::AMOUNT);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_INCOME_ID);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::PAY_SCHEDULED_DEDUCTION_ID);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::ACCT_SOURCE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::PROCESSED_AS);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::TAX_CODE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::CPF_TOTAL);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::CPF_ER);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::IS_PAYSLIP_PRINTED);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::RACE);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::BANK_CASH);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_dummy_payslip.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_dummy_payslip.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeDummyPayslipPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeDummyPayslipPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeDummyPayslipPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeDummyPayslipPeer::populateObjects(PayEmployeeDummyPayslipPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeDummyPayslipPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeDummyPayslipPeer::getOMClass();
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
		return PayEmployeeDummyPayslipPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeDummyPayslipPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeDummyPayslipPeer::ID);
			$selectCriteria->add(PayEmployeeDummyPayslipPeer::ID, $criteria->remove(PayEmployeeDummyPayslipPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeDummyPayslipPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeDummyPayslipPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeDummyPayslip) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeDummyPayslipPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeDummyPayslip $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeDummyPayslipPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeDummyPayslipPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeDummyPayslipPeer::DATABASE_NAME, PayEmployeeDummyPayslipPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeDummyPayslipPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeDummyPayslipPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeDummyPayslipPeer::ID, $pk);


		$v = PayEmployeeDummyPayslipPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeDummyPayslipPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeDummyPayslipPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeDummyPayslipPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeDummyPayslipMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeDummyPayslipMapBuilder');
}
