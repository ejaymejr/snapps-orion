<?php



class AttendanceMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.AttendanceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attendance');
		$tMap->setPhpName('Attendance');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TIME_IN', 'TimeIn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('TIME_OUT', 'TimeOut', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('TIME_OUT_ORIG', 'TimeOutOrig', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DURATION', 'Duration', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('NORMAL', 'Normal', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT1', 'Ot1', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT2', 'Ot2', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('OT3', 'Ot3', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 200);

	} 
} 