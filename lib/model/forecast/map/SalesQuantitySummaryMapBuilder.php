<?php



class SalesQuantitySummaryMapBuilder {

	
	const CLASS_NAME = 'lib.model.forecast.map.SalesQuantitySummaryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sales_quantity_summary');
		$tMap->setPhpName('SalesQuantitySummary');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PRODUCT_GROUP', 'ProductGroup', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('QUANTITY', 'Quantity', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DATE_TRANSACTION', 'DateTransaction', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMPANY_ID', 'CompanyId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 