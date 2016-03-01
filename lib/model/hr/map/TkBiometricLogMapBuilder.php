<?php



class TkBiometricLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.TkBiometricLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tk_biometric_log');
		$tMap->setPhpName('TkBiometricLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('USER_ID', 'UserId', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIME_IN', 'TimeIn', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIME_OUT', 'TimeOut', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OT', 'Ot', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('SOURCE', 'Source', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('UPLOAD_DATE', 'UploadDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 