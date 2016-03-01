<?php



class PayRemittanceMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayRemittanceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pay_remittance');
		$tMap->setPhpName('PayRemittance');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('EMPLOYEE_SHARE', 'EmployeeShare', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('EMPLOYER_SHARE', 'EmployerShare', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GROSS_PAY', 'GrossPay', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('EMP_NAME', 'EmpName', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DED_INC_CODE', 'DedIncCode', 'string', CreoleTypes::VARCHAR, false, 48);

		$tMap->addColumn('DED_INC_DESC', 'DedIncDesc', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('INCOME_TYPE', 'IncomeType', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DEPT_CODE', 'DeptCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('PAY_ACCOUNT_CODE_ID', 'PayAccountCodeId', 'string', CreoleTypes::BIGINT, 'pay_account_code', 'ID', false, null);

	} 
} 