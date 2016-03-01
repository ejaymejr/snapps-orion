<?php



class HrEmployeeBenefitMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrEmployeeBenefitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_employee_benefit');
		$tMap->setPhpName('HrEmployeeBenefit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('BENEFIT_CODE', 'BenefitCode', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('DATE_START', 'DateStart', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DATE_END', 'DateEnd', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('IS_ACTIVE', 'IsActive', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('HR_EMPLOYEE_ID', 'HrEmployeeId', 'string', CreoleTypes::BIGINT, 'hr_employee', 'ID', false, null);

	} 
} 