<?php



class CpfGovtRuleMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.CpfGovtRuleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpf_govt_rule');
		$tMap->setPhpName('CpfGovtRule');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('COMPANY_TYPE', 'CompanyType', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CPF_YEAR', 'CpfYear', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FROM_DATE', 'FromDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TO_DATE', 'ToDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('AGE_MIN', 'AgeMin', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('AGE_MAX', 'AgeMax', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PAY_MIN', 'PayMin', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('PAY_MAX', 'PayMax', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('EM_SHARE', 'EmShare', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ER_SHARE', 'ErShare', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ORDINARY', 'Ordinary', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('SPECIAL', 'Special', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('MEDISAVE', 'Medisave', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ER_FORMULA', 'ErFormula', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('EM_FORMULA', 'EmFormula', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CPF_BATCH', 'CpfBatch', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 