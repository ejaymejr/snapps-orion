<?php



class PayrollAuditTempMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayrollAuditTempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('payroll_audit_temp');
		$tMap->setPhpName('PayrollAuditTemp');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('BASIC_PAY', 'BasicPay', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT_AMOUNT', 'OtAmount', 'double', CreoleTypes::DECIMAL, true, 8);

		$tMap->addColumn('OT_COMPLIANCE_AMOUNT', 'OtComplianceAmount', 'double', CreoleTypes::DECIMAL, true, 8);

		$tMap->addColumn('ALLOWANCE', 'Allowance', 'double', CreoleTypes::DECIMAL, true, 8);

	} 
} 