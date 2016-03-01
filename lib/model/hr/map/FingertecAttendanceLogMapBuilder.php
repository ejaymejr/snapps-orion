<?php



class FingertecAttendanceLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.FingertecAttendanceLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fingertec_attendance_log');
		$tMap->setPhpName('FingertecAttendanceLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('ENROLL_NO', 'EnrollNo', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MACHINE_NO', 'MachineNo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('IS_PROCESSED', 'IsProcessed', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('DATE_DUMP', 'DateDump', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 