<?php



class FullEmployeePayFinalMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.FullEmployeePayFinalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('full_employee_pay_final');
		$tMap->setPhpName('FullEmployeePayFinal');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('HOURLY_RATE', 'HourlyRate', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('NATIONALITY', 'Nationality', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TYPE_OF_EMPLOYEMENT', 'TypeOfEmployement', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('OT1', 'Ot1', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT2', 'Ot2', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT3', 'Ot3', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT_AMOUNT', 'OtAmount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ADVANCE_PAY', 'AdvancePay', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('TOTAL', 'Total', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ACCOUNT_NO', 'AccountNo', 'string', CreoleTypes::VARCHAR, true, 30);

	} 
} 