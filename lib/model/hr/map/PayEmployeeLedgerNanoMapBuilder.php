<?php



class PayEmployeeLedgerNanoMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayEmployeeLedgerNanoMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('hr');

		$tMap = $this->dbMap->addTable('pay_employee_ledger_nano');
		$tMap->setPhpName('PayEmployeeLedgerNano');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPARTMENT', 'Department', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FREQUENCY', 'Frequency', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('PAY_SCHEDULED_INCOME_ID', 'PayScheduledIncomeId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('PAY_SCHEDULED_DEDUCTION_ID', 'PayScheduledDeductionId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('INCOME_EXPENSE', 'IncomeExpense', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACCT_SOURCE', 'AcctSource', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PROCESSED_AS', 'ProcessedAs', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TAX_CODE', 'TaxCode', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TAXABLE_AMOUNT', 'TaxableAmount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CPF_TOTAL', 'CpfTotal', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CPF_ER', 'CpfEr', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('IS_PAYSLIP_PRINTED', 'IsPayslipPrinted', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('RACE', 'Race', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('BANK_CASH', 'BankCash', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 