<?php



class PayFixedIncomeMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayFixedIncomeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_fixed_income');
		$tMap->setPhpName('PayFixedIncome');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SCHEDULED_AMOUNT', 'ScheduledAmount', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('TAXABLE_AMOUNT', 'TaxableAmount', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('TAX_PERCENTAGE', 'TaxPercentage', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('FROM_DATE', 'FromDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('TO_DATE', 'ToDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FREQUENCY', 'Frequency', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PAID_TYPE', 'PaidType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('IS_ACTIVE', 'IsActive', 'string', CreoleTypes::CHAR, false, 7);

		$tMap->addColumn('ENTRY_TYPE', 'EntryType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 