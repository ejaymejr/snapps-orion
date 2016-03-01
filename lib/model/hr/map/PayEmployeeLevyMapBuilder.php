<?php



class PayEmployeeLevyMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayEmployeeLevyMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_employee_levy');
		$tMap->setPhpName('PayEmployeeLevy');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('TEAM', 'Team', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('FROM', 'From', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TO', 'To', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LEVY_RATE', 'LevyRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('LEVY_DED', 'LevyDed', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 