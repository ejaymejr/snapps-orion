<?php



class PaySchedDeductionLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PaySchedDeductionLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_sched_deduction_log');
		$tMap->setPhpName('PaySchedDeductionLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PAY_SCHEDULED_DEDUCTION_ID', 'PayScheduledDeductionId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 