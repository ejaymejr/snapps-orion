<?php



class TkBiometricRawDataMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.TkBiometricRawDataMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tk_biometric_raw_data');
		$tMap->setPhpName('TkBiometricRawData');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CLKID', 'Clkid', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('BADGENO', 'Badgeno', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('PUNCHIN', 'Punchin', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('XTION', 'Xtion', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ACTIVITY', 'Activity', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SLOT', 'Slot', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CLOCK_V', 'ClockV', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ATE_TIME', 'AteTime', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ATE', 'Ate', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 