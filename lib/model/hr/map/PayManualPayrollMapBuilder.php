<?php



class PayManualPayrollMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayManualPayrollMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_manual_payroll');
		$tMap->setPhpName('PayManualPayroll');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('INCOME_EXPENSE', 'IncomeExpense', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACCT_SOURCE', 'AcctSource', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PROCESSED_AS', 'ProcessedAs', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 