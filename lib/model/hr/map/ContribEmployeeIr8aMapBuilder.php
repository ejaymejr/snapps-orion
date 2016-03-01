<?php



class ContribEmployeeIr8aMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.ContribEmployeeIr8aMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contrib_employee_ir8a');
		$tMap->setPhpName('ContribEmployeeIr8a');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('PERIOD_CODE', 'PeriodCode', 'string', CreoleTypes::VARCHAR, false, 55);

		$tMap->addColumn('NATIONALITY', 'Nationality', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NATIONALITY_CODE', 'NationalityCode', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FROM', 'From', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TO', 'To', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('MBF', 'Mbf', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('DONATION', 'Donation', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CPF', 'Cpf', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('INSURANCE', 'Insurance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('SALARY', 'Salary', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('BONUS', 'Bonus', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('DIRECTORS_FEE', 'DirectorsFee', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('OTHER_FEE', 'OtherFee', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('COMMISSION', 'Commission', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('TRANSPORT_ALLOWANCE', 'TransportAllowance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('ENTERTAINMENT', 'Entertainment', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('OTHER_ALLOWANCE', 'OtherAllowance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('GROSS_INC', 'GrossInc', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('GROSS_DED', 'GrossDed', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CPF_EM', 'CpfEm', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CPF_ER', 'CpfEr', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 