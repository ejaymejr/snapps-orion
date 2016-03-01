<?php



class CpfAssocTableMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.CpfAssocTableMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpf_assoc_table');
		$tMap->setPhpName('CpfAssocTable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('MIN', 'Min', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('MAX', 'Max', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('ACCT_CODE', 'AcctCode', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('RACE', 'Race', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 