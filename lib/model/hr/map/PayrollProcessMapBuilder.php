<?php



class PayrollProcessMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayrollProcessMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('payroll_process');
		$tMap->setPhpName('PayrollProcess');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EMPLOYEE_DATA', 'EmployeeData', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('EMP_LEAVE', 'EmpLeave', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('ATTENDANCE', 'Attendance', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('INCOME', 'Income', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('DEDUCTION', 'Deduction', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('DEFICIENCY', 'Deficiency', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('PAYSLIP', 'Payslip', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('MANUAL', 'Manual', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('LEVY_CONTRIBUTION', 'LevyContribution', 'string', CreoleTypes::CHAR, false, 2);

		$tMap->addColumn('CLOSED', 'Closed', 'string', CreoleTypes::CHAR, false, 2);

	} 
} 