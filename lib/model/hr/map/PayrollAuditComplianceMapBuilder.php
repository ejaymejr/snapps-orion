<?php



class PayrollAuditComplianceMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayrollAuditComplianceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('payroll_audit_compliance');
		$tMap->setPhpName('PayrollAuditCompliance');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('BASIC_PAY', 'BasicPay', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT_AMOUNT', 'OtAmount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('OT_COMPLIANCE_AMOUNT', 'OtComplianceAmount', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME', 'OtComplianceAmountOriginalTime', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('ALLOWANCE', 'Allowance', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('COMPLIANCE_DEDUCTION_AMOUNT', 'ComplianceDeductionAmount', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('COMPLIANCE_AMOUNT', 'ComplianceAmount', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('COMPLIANCE_AMOUNT_ORIGINAL_TIME', 'ComplianceAmountOriginalTime', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('PAID_AMOUNT', 'PaidAmount', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('MOM_COMPLIANCE_AMOUNT', 'MomComplianceAmount', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('RATE_PER_HOUR', 'RatePerHour', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('TOTAL_INCOME', 'TotalIncome', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('POSTED_OT', 'PostedOt', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('POSTED_HA', 'PostedHa', 'double', CreoleTypes::FLOAT, true, 8);

		$tMap->addColumn('TOTAL_OT_HOURS', 'TotalOtHours', 'double', CreoleTypes::FLOAT, true, 8);

	} 
} 