<?php



class HrLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_log');
		$tMap->setPhpName('HrLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('USER', 'User', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TARGET', 'Target', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('USER_ACTION', 'UserAction', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ACTION_MODULE', 'ActionModule', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('BANK_CASH', 'BankCash', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MAC_ADDR', 'MacAddr', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 