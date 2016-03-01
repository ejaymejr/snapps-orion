<?php



class ContribCompanyIr8aMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.ContribCompanyIr8aMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contrib_company_ir8a');
		$tMap->setPhpName('ContribCompanyIr8a');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SOURCE', 'Source', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ORG_ID_TYPE', 'OrgIdType', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ORG_ID_NO', 'OrgIdNo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NANO_ORG_ID', 'NanoOrgId', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('AUTHORIZED_PERSON', 'AuthorizedPerson', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('AUTH_DESIGNATION', 'AuthDesignation', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TEL_NO', 'TelNo', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('EMPLOYER', 'Employer', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 