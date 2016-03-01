<?php



class PayEmployeeContribMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayEmployeeContribMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_employee_contrib');
		$tMap->setPhpName('PayEmployeeContrib');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPARTMENT', 'Department', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('SUBCON', 'Subcon', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('WAGE', 'Wage', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('EM_SHARE', 'EmShare', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('ER_SHARE', 'ErShare', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CDAC', 'Cdac', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('SINDA', 'Sinda', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('MBMF', 'Mbmf', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('SDL', 'Sdl', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('LEVY', 'Levy', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('GROSS_INC', 'GrossInc', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('GROSS_DED', 'GrossDed', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('IS_LEVY', 'IsLevy', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 