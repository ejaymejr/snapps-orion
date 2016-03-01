<?php



class TkAttendanceMultipleMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.TkAttendanceMultipleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tk_attendance_multiple');
		$tMap->setPhpName('TkAttendanceMultiple');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIME_IN', 'TimeIn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('TIME_OUT', 'TimeOut', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DURATION', 'Duration', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('NORMAL', 'Normal', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT1', 'Ot1', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT2', 'Ot2', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT3', 'Ot3', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HR_EMPLOYEE_ID', 'HrEmployeeId', 'string', CreoleTypes::BIGINT, false, null);

	} 
} 