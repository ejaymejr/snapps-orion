<?php


abstract class BasePayEmployeeLedgerNanoTemplatePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_ledger_nano_template';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeLedgerNanoTemplate';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_ledger_nano_template.ID';

	
	const EMPLOYEE_NO = 'pay_employee_ledger_nano_template.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_ledger_nano_template.NAME';

	
	const DEPARTMENT = 'pay_employee_ledger_nano_template.DEPARTMENT';

	
	const COMPANY = 'pay_employee_ledger_nano_template.COMPANY';

	
	const FREQUENCY = 'pay_employee_ledger_nano_template.FREQUENCY';

	
	const PERIOD_CODE = 'pay_employee_ledger_nano_template.PERIOD_CODE';

	
	const ACCT_CODE = 'pay_employee_ledger_nano_template.ACCT_CODE';

	
	const DESCRIPTION = 'pay_employee_ledger_nano_template.DESCRIPTION';

	
	const AMOUNT = 'pay_employee_ledger_nano_template.AMOUNT';

	
	const PAY_SCHEDULED_INCOME_ID = 'pay_employee_ledger_nano_template.PAY_SCHEDULED_INCOME_ID';

	
	const PAY_SCHEDULED_DEDUCTION_ID = 'pay_employee_ledger_nano_template.PAY_SCHEDULED_DEDUCTION_ID';

	
	const INCOME_EXPENSE = 'pay_employee_ledger_nano_template.INCOME_EXPENSE';

	
	const ACCT_SOURCE = 'pay_employee_ledger_nano_template.ACCT_SOURCE';

	
	const PROCESSED_AS = 'pay_employee_ledger_nano_template.PROCESSED_AS';

	
	const TAX_CODE = 'pay_employee_ledger_nano_template.TAX_CODE';

	
	const TAXABLE_AMOUNT = 'pay_employee_ledger_nano_template.TAXABLE_AMOUNT';

	
	const CPF_TOTAL = 'pay_employee_ledger_nano_template.CPF_TOTAL';

	
	const CPF_ER = 'pay_employee_ledger_nano_template.CPF_ER';

	
	const IS_PAYSLIP_PRINTED = 'pay_employee_ledger_nano_template.IS_PAYSLIP_PRINTED';

	
	const RACE = 'pay_employee_ledger_nano_template.RACE';

	
	const BANK_CASH = 'pay_employee_ledger_nano_template.BANK_CASH';

	
	const CREATED_BY = 'pay_employee_ledger_nano_template.CREATED_BY';

	
	const DATE_CREATED = 'pay_employee_ledger_nano_template.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_employee_ledger_nano_template.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_employee_ledger_nano_template.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'Company', 'Frequency', 'PeriodCode', 'AcctCode', 'Description', 'Amount', 'PayScheduledIncomeId', 'PayScheduledDeductionId', 'IncomeExpense', 'AcctSource', 'ProcessedAs', 'TaxCode', 'TaxableAmount', 'CpfTotal', 'CpfEr', 'IsPayslipPrinted', 'Race', 'BankCash', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerNanoTemplatePeer::ID, PayEmployeeLedgerNanoTemplatePeer::EMPLOYEE_NO, PayEmployeeLedgerNanoTemplatePeer::NAME, PayEmployeeLedgerNanoTemplatePeer::DEPARTMENT, PayEmployeeLedgerNanoTemplatePeer::COMPANY, PayEmployeeLedgerNanoTemplatePeer::FREQUENCY, PayEmployeeLedgerNanoTemplatePeer::PERIOD_CODE, PayEmployeeLedgerNanoTemplatePeer::ACCT_CODE, PayEmployeeLedgerNanoTemplatePeer::DESCRIPTION, PayEmployeeLedgerNanoTemplatePeer::AMOUNT, PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_INCOME_ID, PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_DEDUCTION_ID, PayEmployeeLedgerNanoTemplatePeer::INCOME_EXPENSE, PayEmployeeLedgerNanoTemplatePeer::ACCT_SOURCE, PayEmployeeLedgerNanoTemplatePeer::PROCESSED_AS, PayEmployeeLedgerNanoTemplatePeer::TAX_CODE, PayEmployeeLedgerNanoTemplatePeer::TAXABLE_AMOUNT, PayEmployeeLedgerNanoTemplatePeer::CPF_TOTAL, PayEmployeeLedgerNanoTemplatePeer::CPF_ER, PayEmployeeLedgerNanoTemplatePeer::IS_PAYSLIP_PRINTED, PayEmployeeLedgerNanoTemplatePeer::RACE, PayEmployeeLedgerNanoTemplatePeer::BANK_CASH, PayEmployeeLedgerNanoTemplatePeer::CREATED_BY, PayEmployeeLedgerNanoTemplatePeer::DATE_CREATED, PayEmployeeLedgerNanoTemplatePeer::MODIFIED_BY, PayEmployeeLedgerNanoTemplatePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'company', 'frequency', 'period_code', 'acct_code', 'description', 'amount', 'pay_scheduled_income_id', 'pay_scheduled_deduction_id', 'income_expense', 'acct_source', 'processed_as', 'tax_code', 'taxable_amount', 'cpf_total', 'cpf_er', 'is_payslip_printed', 'race', 'bank_cash', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'Company' => 4, 'Frequency' => 5, 'PeriodCode' => 6, 'AcctCode' => 7, 'Description' => 8, 'Amount' => 9, 'PayScheduledIncomeId' => 10, 'PayScheduledDeductionId' => 11, 'IncomeExpense' => 12, 'AcctSource' => 13, 'ProcessedAs' => 14, 'TaxCode' => 15, 'TaxableAmount' => 16, 'CpfTotal' => 17, 'CpfEr' => 18, 'IsPayslipPrinted' => 19, 'Race' => 20, 'BankCash' => 21, 'CreatedBy' => 22, 'DateCreated' => 23, 'ModifiedBy' => 24, 'DateModified' => 25, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeLedgerNanoTemplatePeer::ID => 0, PayEmployeeLedgerNanoTemplatePeer::EMPLOYEE_NO => 1, PayEmployeeLedgerNanoTemplatePeer::NAME => 2, PayEmployeeLedgerNanoTemplatePeer::DEPARTMENT => 3, PayEmployeeLedgerNanoTemplatePeer::COMPANY => 4, PayEmployeeLedgerNanoTemplatePeer::FREQUENCY => 5, PayEmployeeLedgerNanoTemplatePeer::PERIOD_CODE => 6, PayEmployeeLedgerNanoTemplatePeer::ACCT_CODE => 7, PayEmployeeLedgerNanoTemplatePeer::DESCRIPTION => 8, PayEmployeeLedgerNanoTemplatePeer::AMOUNT => 9, PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_INCOME_ID => 10, PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_DEDUCTION_ID => 11, PayEmployeeLedgerNanoTemplatePeer::INCOME_EXPENSE => 12, PayEmployeeLedgerNanoTemplatePeer::ACCT_SOURCE => 13, PayEmployeeLedgerNanoTemplatePeer::PROCESSED_AS => 14, PayEmployeeLedgerNanoTemplatePeer::TAX_CODE => 15, PayEmployeeLedgerNanoTemplatePeer::TAXABLE_AMOUNT => 16, PayEmployeeLedgerNanoTemplatePeer::CPF_TOTAL => 17, PayEmployeeLedgerNanoTemplatePeer::CPF_ER => 18, PayEmployeeLedgerNanoTemplatePeer::IS_PAYSLIP_PRINTED => 19, PayEmployeeLedgerNanoTemplatePeer::RACE => 20, PayEmployeeLedgerNanoTemplatePeer::BANK_CASH => 21, PayEmployeeLedgerNanoTemplatePeer::CREATED_BY => 22, PayEmployeeLedgerNanoTemplatePeer::DATE_CREATED => 23, PayEmployeeLedgerNanoTemplatePeer::MODIFIED_BY => 24, PayEmployeeLedgerNanoTemplatePeer::DATE_MODIFIED => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'company' => 4, 'frequency' => 5, 'period_code' => 6, 'acct_code' => 7, 'description' => 8, 'amount' => 9, 'pay_scheduled_income_id' => 10, 'pay_scheduled_deduction_id' => 11, 'income_expense' => 12, 'acct_source' => 13, 'processed_as' => 14, 'tax_code' => 15, 'taxable_amount' => 16, 'cpf_total' => 17, 'cpf_er' => 18, 'is_payslip_printed' => 19, 'race' => 20, 'bank_cash' => 21, 'created_by' => 22, 'date_created' => 23, 'modified_by' => 24, 'date_modified' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeLedgerNanoTemplateMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeLedgerNanoTemplateMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeLedgerNanoTemplatePeer::getTableMap();
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
		return str_replace(PayEmployeeLedgerNanoTemplatePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::NAME);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::FREQUENCY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::ACCT_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::DESCRIPTION);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_INCOME_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::PAY_SCHEDULED_DEDUCTION_ID);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::INCOME_EXPENSE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::ACCT_SOURCE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::PROCESSED_AS);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::TAX_CODE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::TAXABLE_AMOUNT);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::CPF_TOTAL);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::CPF_ER);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::IS_PAYSLIP_PRINTED);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::RACE);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::BANK_CASH);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::CREATED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(pay_employee_ledger_nano_template.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_ledger_nano_template.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeLedgerNanoTemplatePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeLedgerNanoTemplatePeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeLedgerNanoTemplatePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeLedgerNanoTemplatePeer::populateObjects(PayEmployeeLedgerNanoTemplatePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeLedgerNanoTemplatePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeLedgerNanoTemplatePeer::getOMClass();
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
		return PayEmployeeLedgerNanoTemplatePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeLedgerNanoTemplatePeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeLedgerNanoTemplatePeer::ID);
			$selectCriteria->add(PayEmployeeLedgerNanoTemplatePeer::ID, $criteria->remove(PayEmployeeLedgerNanoTemplatePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeLedgerNanoTemplatePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeLedgerNanoTemplatePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeLedgerNanoTemplate) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeLedgerNanoTemplatePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeLedgerNanoTemplate $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeLedgerNanoTemplatePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeLedgerNanoTemplatePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeLedgerNanoTemplatePeer::DATABASE_NAME, PayEmployeeLedgerNanoTemplatePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeLedgerNanoTemplatePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeLedgerNanoTemplatePeer::DATABASE_NAME);

		$criteria->add(PayEmployeeLedgerNanoTemplatePeer::ID, $pk);


		$v = PayEmployeeLedgerNanoTemplatePeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeLedgerNanoTemplatePeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeLedgerNanoTemplatePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeLedgerNanoTemplatePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeLedgerNanoTemplateMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeLedgerNanoTemplateMapBuilder');
}
