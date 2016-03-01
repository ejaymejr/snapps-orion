<?php



class HrEmployeeDailyMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrEmployeeDailyMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_employee_daily');
		$tMap->setPhpName('HrEmployeeDaily');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPARTMENT', 'Department', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('IS_ON_LEAVE', 'IsOnLeave', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('BASIC', 'Basic', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('OT', 'Ot', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('MEAL', 'Meal', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('ALLOWANCE', 'Allowance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('MONTH_ALLOWANCE', 'MonthAllowance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('PART_TIME', 'PartTime', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CPF_EM', 'CpfEm', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('CPF_ER', 'CpfEr', 'double', CreoleTypes::DECIMAL, false, 9);

		$tMap->addColumn('HOURLY_RATE', 'HourlyRate', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('UNDERTIME', 'Undertime', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('ABSENT', 'Absent', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('SHIFT', 'Shift', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DURATION', 'Duration', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BASIC_ADJUSTMENT', 'BasicAdjustment', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 