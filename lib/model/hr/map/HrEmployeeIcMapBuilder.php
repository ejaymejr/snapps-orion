<?php



class HrEmployeeIcMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrEmployeeIcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_employee_ic');
		$tMap->setPhpName('HrEmployeeIc');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SECTOR', 'Sector', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OCCUPATION', 'Occupation', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PASS_TYPE', 'PassType', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('PASS_NO', 'PassNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DATE_OF_APPLICATION', 'DateOfApplication', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DATE_OF_ISSUE', 'DateOfIssue', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DATE_OF_EXPIRY', 'DateOfExpiry', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 