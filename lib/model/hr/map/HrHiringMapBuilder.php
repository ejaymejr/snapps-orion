<?php



class HrHiringMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrHiringMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_hiring');
		$tMap->setPhpName('HrHiring');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('NRIC_FIN', 'NricFin', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_OF_EMPLOYMENT', 'DateOfEmployment', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PLACE_OF_WORK', 'PlaceOfWork', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('JOB_TITLE', 'JobTitle', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SALARY', 'Salary', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('WORKING_DAYS', 'WorkingDays', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('OTHER_CONDITION', 'OtherCondition', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 