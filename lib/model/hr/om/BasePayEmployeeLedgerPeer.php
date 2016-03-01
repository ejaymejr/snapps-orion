<?php


abstract class BasePayEmployeeLedgerPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_ledger';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeLedger';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_ledger.ID';

	
	const EMPLOYEE_NO = 'pay_employee_ledger.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_ledger.NAME';

	
	const DEPARTMENT = 'pay_employee_ledger.DEPARTMENT';

	
	const COMPANY = 'pay_employee_ledger.COMPANY';

	
	const FREQUENCY = 'pay_employee_ledger.FREQUENCY';

	
	const PERIOD_CODE = 'pay_employee_ledger.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_employee_ledger.ACCT_CODE';

	
	const DESCRIPTION = 'pay_employee_ledger.DESCRIPTION';

	
	const AMOUNT = 'pay_employee_ledger.AMOUNT';

	
	const PAY_SCHEDULED_INCOME_ID = 'pay_employee_ledger.PAY_SCHEDULED_INCOME_ID';

	
	const PAY_SCHEDULED_DEDUCTION_ID = 'pay_employee_ledger.PAY_SCHEDULED_DEDUCTION_ID';

	
	const INCOME_EXPENSE = 'pay_employee_ledger.INCOME_EXPENSE';

	
	const ACCT_SOURCE = 'pay_employee_ledger.ACCT_SOURCE';

	
	const PROCESSED_AS = 'pay_employee_ledger.PROCESSED_AS';

	
	const TAX_CODE = 'pay_employee_ledger.TAX_CODE';

	
	const TAXABLE_AMOUNT = 'pay_employee_ledger.TAXABLE_AMOUNT';

	
	const CPF_TOTAL = 'pay_employee_ledger.CPF_TOTAL';

	
	const CPF_ER = 'pay_employee_ledger.CPF_ER';

	
	const IS_PAYSLIP_PRINTED = 'pay_employee_ledger.IS_PAYSLIP_PRINTED';

	
	const RACE = 'pay_employee_ledger.RACE';

	
	const BANK_CASH = 'pay_employee_ledger.BANK_CASH';

	
	const CREATED_BY = 'pay_employee_ledger.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_ledger.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_ledger.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_ledger.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'Company', 'Frequency', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'PayScheduledIncomeId', 'PayScheduledDeductionId', 'IncomeExpense', 'AcctSource', 'ProcessedAs', 'TaxCode', 'TaxableAmount', 'CpfTotal', 'CpfEr', 'IsPayslipPrinted', 'Race', 'BankCash', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerPeer::ID, PayEmployeeLedgerPeer::EMPLOYEE_NO, PayEmployeeLedgerPeer::NAME, PayEmployeeLedgerPeer::DEPARTMENT, PayEmployeeLedgerPeer::COMPANY, PayEmployeeLedgerPeer::FREQUENCY, PayEmployeeLedgerPeer::PERIOD_CODE, PayEmployeeLedgerPeer::ACCT_CODE, PayEmployeeLedgerPeer::DESCRIPTION, PayEmployeeLedgerPeer::AMOUNT, PayEmployeeLedgerPeer::PAY_SCHEDULED_INCOME_ID, PayEmployeeLedgerPeer::PAY_SCHEDULED_DEDUCTION_ID, PayEmployeeLedgerPeer::INCOME_EXPENSE, PayEmployeeLedgerPeer::ACCT_SOURCE, PayEmployeeLedgerPeer::PROCESSED_AS, PayEmployeeLedgerPeer::TAX_CODE, PayEmployeeLedgerPeer::TAXABLE_AMOUNT, PayEmployeeLedgerPeer::CPF_TOTAL, PayEmployeeLedgerPeer::CPF_ER, PayEmployeeLedgerPeer::IS_PAYSLIP_PRINTED, PayEmployeeLedgerPeer::RACE, PayEmployeeLedgerPeer::BANK_CASH, PayEmployeeLedgerPeer::CREATED_BY, PayEmployeeLedgerPeer::DATE_CREATED, PayEmployeeLedgerPeer::MODIFIED_BY, PayEmployeeLedgerPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'company', 'frequency', 'period_code', 'acct_code', 'description', 'amount', 'pay_scheduled_income_id', 'pay_scheduled_deduction_id', 'income_expense', 'acct_source', 'processed_as', 'tax_code', 'taxable_amount', 'cpf_total', 'cpf_er', 'is_payslip_printed', 'race', 'bank_cash', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'Company' => 4, 'Frequency' => 5, 'PeriodCode' => 6, 'AcctCode' => 7, 'Description' => 8, 'Amount' => 9, 'PayScheduledIncomeId' => 10, 'PayScheduledDeductionId' => 11, 'IncomeExpense' => 12, 'AcctSource' => 13, 'ProcessedAs' => 14, 'TaxCode' => 15, 'TaxableAmount' => 16, 'CpfTotal' => 17, 'CpfEr' => 18, 'IsPayslipPrinted' => 19, 'Race' => 20, 'BankCash' => 21, 'CreatedBy' => 22, 'DateCreated' => 23, 'ModifiedBy' => 24, 'DateModified' => 25, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerPeer::ID => 0, PayEmployeeLedgerPeer::EMPLOYEE_NO => 1, PayEmployeeLedgerPeer::NAME => 2, PayEmployeeLedgerPeer::DEPARTMENT => 3, PayEmployeeLedgerPeer::COMPANY => 4, PayEmployeeLedgerPeer::FREQUENCY => 5, PayEmployeeLedgerPeer::PERIOD_CODE => 6, PayEmployeeLedgerPeer::ACCT_CODE => 7, PayEmployeeLedgerPeer::DESCRIPTION => 8, PayEmployeeLedgerPeer::AMOUNT => 9, PayEmployeeLedgerPeer::PAY_SCHEDULED_INCOME_ID => 10, PayEmployeeLedgerPeer::PAY_SCHEDULED_DEDUCTION_ID => 11, PayEmployeeLedgerPeer::INCOME_EXPENSE => 12, PayEmployeeLedgerPeer::ACCT_SOURCE => 13, PayEmployeeLedgerPeer::PROCESSED_AS => 14, PayEmployeeLedgerPeer::TAX_CODE => 15, PayEmployeeLedgerPeer::TAXABLE_AMOUNT => 16, PayEmployeeLedgerPeer::CPF_TOTAL => 17, PayEmployeeLedgerPeer::CPF_ER => 18, PayEmployeeLedgerPeer::IS_PAYSLIP_PRINTED => 19, PayEmployeeLedgerPeer::RACE => 20, PayEmployeeLedgerPeer::BANK_CASH => 21, PayEmployeeLedgerPeer::CREATED_BY => 22, PayEmployeeLedgerPeer::DATE_CREATED => 23, PayEmployeeLedgerPeer::MODIFIED_BY => 24, PayEmployeeLedgerPeer::DATE_MODIFIED => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'company' => 4, 'frequency' => 5, 'period_code' => 6, 'acct_code' => 7, 'description' => 8, 'amount' => 9, 'pay_scheduled_income_id' => 10, 'pay_scheduled_deduction_id' => 11, 'income_expense' => 12, 'acct_source' => 13, 'processed_as' => 14, 'tax_code' => 15, 'taxable_amount' => 16, 'cpf_total' => 17, 'cpf_er' => 18, 'is_payslip_printed' => 19, 'race' => 20, 'bank_cash' => 21, 'created_by' => 22, 'date_created' => 23, 'modified_by' => 24, 'date_modified' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeLedgerPeer::getTableMap();
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
		return str_replace(PayEmployeeLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::ID);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::FREQUENCY);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::PAY_SCHEDULED_INCOME_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::PAY_SCHEDULED_DEDUCTION_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::ACCT_SOURCE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::PROCESSED_AS);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::TAX_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::CPF_TOTAL);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::CPF_ER);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::IS_PAYSLIP_PRINTED);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::RACE);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::BANK_CASH);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_ledger.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_ledger.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeLedgerPeer::populateObjects(PayEmployeeLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeLedgerPeer::getOMClass();
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
		return PayEmployeeLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeLedgerPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeLedgerPeer::ID);
			$selectCriteria->add(PayEmployeeLedgerPeer::ID, $criteria->remove(PayEmployeeLedgerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeLedgerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeLedgerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeLedgerPeer::DATABASE_NAME, PayEmployeeLedgerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeLedgerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeLedgerPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLedgerPeer::ID, $pk);


		$v = PayEmployeeLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeLedgerPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeLedgerMapBuilder');
}
