<?php



class HrAwardsRecognitionMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrAwardsRecognitionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_awards_recognition');
		$tMap->setPhpName('HrAwardsRecognition');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('RECOGNITION_DESC', 'RecognitionDesc', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PLACE_GIVEN', 'PlaceGiven', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('DATE_GIVEN', 'DateGiven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('HR_EMPLOYEE_ID', 'HrEmployeeId', 'string', CreoleTypes::BIGINT, 'hr_employee', 'ID', false, null);

	} 
} 