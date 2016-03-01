<?php


abstract class BasePayEmployeeLedgerNanoPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_ledger_nano';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeLedgerNano';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_ledger_nano.ID';

	
	const EMPLOYEE_NO = 'pay_employee_ledger_nano.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_ledger_nano.NAME';

	
	const DEPARTMENT = 'pay_employee_ledger_nano.DEPARTMENT';

	
	const COMPANY = 'pay_employee_ledger_nano.COMPANY';

	
	const FREQUENCY = 'pay_employee_ledger_nano.FREQUENCY';

	
	const PERIOD_CODE = 'pay_employee_ledger_nano.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_employee_ledger_nano.ACCT_CODE';

	
	const DESCRIPTION = 'pay_employee_ledger_nano.DESCRIPTION';

	
	const AMOUNT = 'pay_employee_ledger_nano.AMOUNT';

	
	const PAY_SCHEDULED_INCOME_ID = 'pay_employee_ledger_nano.PAY_SCHEDULED_INCOME_ID';

	
	const PAY_SCHEDULED_DEDUCTION_ID = 'pay_employee_ledger_nano.PAY_SCHEDULED_DEDUCTION_ID';

	
	const INCOME_EXPENSE = 'pay_employee_ledger_nano.INCOME_EXPENSE';

	
	const ACCT_SOURCE = 'pay_employee_ledger_nano.ACCT_SOURCE';

	
	const PROCESSED_AS = 'pay_employee_ledger_nano.PROCESSED_AS';

	
	const TAX_CODE = 'pay_employee_ledger_nano.TAX_CODE';

	
	const TAXABLE_AMOUNT = 'pay_employee_ledger_nano.TAXABLE_AMOUNT';

	
	const CPF_TOTAL = 'pay_employee_ledger_nano.CPF_TOTAL';

	
	const CPF_ER = 'pay_employee_ledger_nano.CPF_ER';

	
	const IS_PAYSLIP_PRINTED = 'pay_employee_ledger_nano.IS_PAYSLIP_PRINTED';

	
	const RACE = 'pay_employee_ledger_nano.RACE';

	
	const BANK_CASH = 'pay_employee_ledger_nano.BANK_CASH';

	
	const CREATED_BY = 'pay_employee_ledger_nano.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_ledger_nano.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_ledger_nano.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_ledger_nano.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'Company', 'Frequency', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'PayScheduledIncomeId', 'PayScheduledDeductionId', 'IncomeExpense', 'AcctSource', 'ProcessedAs', 'TaxCode', 'TaxableAmount', 'CpfTotal', 'CpfEr', 'IsPayslipPrinted', 'Race', 'BankCash', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerNanoPeer::ID, PayEmployeeLedgerNanoPeer::EMPLOYEE_NO, PayEmployeeLedgerNanoPeer::NAME, PayEmployeeLedgerNanoPeer::DEPARTMENT, PayEmployeeLedgerNanoPeer::COMPANY, PayEmployeeLedgerNanoPeer::FREQUENCY, PayEmployeeLedgerNanoPeer::PERIOD_CODE, PayEmployeeLedgerNanoPeer::ACCT_CODE, PayEmployeeLedgerNanoPeer::DESCRIPTION, PayEmployeeLedgerNanoPeer::AMOUNT, PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID, PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID, PayEmployeeLedgerNanoPeer::INCOME_EXPENSE, PayEmployeeLedgerNanoPeer::ACCT_SOURCE, PayEmployeeLedgerNanoPeer::PROCESSED_AS, PayEmployeeLedgerNanoPeer::TAX_CODE, PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT, PayEmployeeLedgerNanoPeer::CPF_TOTAL, PayEmployeeLedgerNanoPeer::CPF_ER, PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED, PayEmployeeLedgerNanoPeer::RACE, PayEmployeeLedgerNanoPeer::BANK_CASH, PayEmployeeLedgerNanoPeer::CREATED_BY, PayEmployeeLedgerNanoPeer::DATE_CREATED, PayEmployeeLedgerNanoPeer::MODIFIED_BY, PayEmployeeLedgerNanoPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'company', 'frequency', 'period_code', 'acct_code', 'description', 'amount', 'pay_scheduled_income_id', 'pay_scheduled_deduction_id', 'income_expense', 'acct_source', 'processed_as', 'tax_code', 'taxable_amount', 'cpf_total', 'cpf_er', 'is_payslip_printed', 'race', 'bank_cash', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'Company' => 4, 'Frequency' => 5, 'PeriodCode' => 6, 'AcctCode' => 7, 'Description' => 8, 'Amount' => 9, 'PayScheduledIncomeId' => 10, 'PayScheduledDeductionId' => 11, 'IncomeExpense' => 12, 'AcctSource' => 13, 'ProcessedAs' => 14, 'TaxCode' => 15, 'TaxableAmount' => 16, 'CpfTotal' => 17, 'CpfEr' => 18, 'IsPayslipPrinted' => 19, 'Race' => 20, 'BankCash' => 21, 'CreatedBy' => 22, 'DateCreated' => 23, 'ModifiedBy' => 24, 'DateModified' => 25, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerNanoPeer::ID => 0, PayEmployeeLedgerNanoPeer::EMPLOYEE_NO => 1, PayEmployeeLedgerNanoPeer::NAME => 2, PayEmployeeLedgerNanoPeer::DEPARTMENT => 3, PayEmployeeLedgerNanoPeer::COMPANY => 4, PayEmployeeLedgerNanoPeer::FREQUENCY => 5, PayEmployeeLedgerNanoPeer::PERIOD_CODE => 6, PayEmployeeLedgerNanoPeer::ACCT_CODE => 7, PayEmployeeLedgerNanoPeer::DESCRIPTION => 8, PayEmployeeLedgerNanoPeer::AMOUNT => 9, PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID => 10, PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID => 11, PayEmployeeLedgerNanoPeer::INCOME_EXPENSE => 12, PayEmployeeLedgerNanoPeer::ACCT_SOURCE => 13, PayEmployeeLedgerNanoPeer::PROCESSED_AS => 14, PayEmployeeLedgerNanoPeer::TAX_CODE => 15, PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT => 16, PayEmployeeLedgerNanoPeer::CPF_TOTAL => 17, PayEmployeeLedgerNanoPeer::CPF_ER => 18, PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED => 19, PayEmployeeLedgerNanoPeer::RACE => 20, PayEmployeeLedgerNanoPeer::BANK_CASH => 21, PayEmployeeLedgerNanoPeer::CREATED_BY => 22, PayEmployeeLedgerNanoPeer::DATE_CREATED => 23, PayEmployeeLedgerNanoPeer::MODIFIED_BY => 24, PayEmployeeLedgerNanoPeer::DATE_MODIFIED => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'company' => 4, 'frequency' => 5, 'period_code' => 6, 'acct_code' => 7, 'description' => 8, 'amount' => 9, 'pay_scheduled_income_id' => 10, 'pay_scheduled_deduction_id' => 11, 'income_expense' => 12, 'acct_source' => 13, 'processed_as' => 14, 'tax_code' => 15, 'taxable_amount' => 16, 'cpf_total' => 17, 'cpf_er' => 18, 'is_payslip_printed' => 19, 'race' => 20, 'bank_cash' => 21, 'created_by' => 22, 'date_created' => 23, 'modified_by' => 24, 'date_modified' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeLedgerNanoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeLedgerNanoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeLedgerNanoPeer::getTableMap();
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
		return str_replace(PayEmployeeLedgerNanoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::FREQUENCY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::ACCT_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::DESCRIPTION);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_INCOME_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::PAY_SCHEDULED_DEDUCTION_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::ACCT_SOURCE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::PROCESSED_AS);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::TAX_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::CPF_TOTAL);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::CPF_ER);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::IS_PAYSLIP_PRINTED);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::RACE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::BANK_CASH);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_ledger_nano.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_ledger_nano.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeLedgerNanoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeLedgerNanoPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeLedgerNanoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeLedgerNanoPeer::populateObjects(PayEmployeeLedgerNanoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeLedgerNanoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeLedgerNanoPeer::getOMClass();
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
		return PayEmployeeLedgerNanoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeLedgerNanoPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeLedgerNanoPeer::ID);
			$selectCriteria->add(PayEmployeeLedgerNanoPeer::ID, $criteria->remove(PayEmployeeLedgerNanoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeLedgerNanoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeLedgerNanoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeLedgerNano) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeLedgerNanoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeLedgerNano $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeLedgerNanoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeLedgerNanoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeLedgerNanoPeer::DATABASE_NAME, PayEmployeeLedgerNanoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeLedgerNanoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeLedgerNanoPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLedgerNanoPeer::ID, $pk);


		$v = PayEmployeeLedgerNanoPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeLedgerNanoPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeLedgerNanoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeLedgerNanoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeLedgerNanoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeLedgerNanoMapBuilder');
}
