<?php



class HrShortlistedApplicantMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrShortlistedApplicantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_shortlisted_applicant');
		$tMap->setPhpName('HrShortlistedApplicant');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('LASTNAME', 'Lastname', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('FIRSTNAME', 'Firstname', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('MIDNAME', 'Midname', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('POSITION_APPLIED_FOR', 'PositionAppliedFor', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CHINESE_NAME', 'ChineseName', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('BIRTH_DATE', 'BirthDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('BIRTH_PLACE', 'BirthPlace', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('STREET', 'Street', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('BLDG_ROOM_NO', 'BldgRoomNo', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('PROVINCE', 'Province', 'string', CreoleTypes::VARCHAR, false, 160);

		$tMap->addColumn('ZIP_CODE', 'ZipCode', 'string', CreoleTypes::VARCHAR, false, 24);

		$tMap->addColumn('TEL_NO', 'TelNo', 'string', CreoleTypes::VARCHAR, false, 68);

		$tMap->addColumn('CELL_NO', 'CellNo', 'string', CreoleTypes::VARCHAR, false, 68);

		$tMap->addColumn('EMAIL_ADD', 'EmailAdd', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('SEX', 'Sex', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HR_EMPLOYEE_ID', 'HrEmployeeId', 'string', CreoleTypes::BIGINT, false, null);

	} 
} 