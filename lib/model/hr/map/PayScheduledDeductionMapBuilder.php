<?php



class PayScheduledDeductionMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayScheduledDeductionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_scheduled_deduction');
		$tMap->setPhpName('PayScheduledDeduction');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TOTAL_AMOUNT', 'TotalAmount', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('SCHEDULED_AMOUNT', 'ScheduledAmount', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('TOT_AMT_PAID', 'TotAmtPaid', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('FROM_DATE', 'FromDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TO_DATE', 'ToDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FREQUENCY', 'Frequency', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PAID_TYPE', 'PaidType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('POST_BATCH', 'PostBatch', 'string', CreoleTypes::CHAR, false, 7);

		$tMap->addColumn('DEDUCTION_PREPOST_BATCH', 'DeductionPrepostBatch', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ENTRY_TYPE', 'EntryType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 