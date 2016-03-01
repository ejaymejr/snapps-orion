<?php



class PowerUsageMapBuilder {

	
	const CLASS_NAME = 'lib.model.forecast.map.PowerUsageMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('forecast');

		$tMap = $this->dbMap->addTable('power_usage');
		$tMap->setPhpName('PowerUsage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('DATE', 'Date', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIME', 'Time', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('AMPM', 'Ampm', 'string', CreoleTypes::CHAR, true, 2);

		$tMap->addColumn('READING', 'Reading', 'double', CreoleTypes::FLOAT, true, 10);

		$tMap->addColumn('CONSUMPTION', 'Consumption', 'double', CreoleTypes::FLOAT, true, 10);

		$tMap->addColumn('UNIT', 'Unit', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('UNIT_PRICE', 'UnitPrice', 'double', CreoleTypes::FLOAT, true, 12);

		$tMap->addColumn('CONVERSION_FACTOR', 'ConversionFactor', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('TOTAL_COST', 'TotalCost', 'double', CreoleTypes::FLOAT, true, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 