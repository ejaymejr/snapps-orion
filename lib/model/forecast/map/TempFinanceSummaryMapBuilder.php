<?php



class TempFinanceSummaryMapBuilder {

	
	const CLASS_NAME = 'lib.model.forecast.map.TempFinanceSummaryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('temp_finance_summary');
		$tMap->setPhpName('TempFinanceSummary');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('COMPANY_ID', 'CompanyId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('COMPONENT', 'Component', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('VALUE', 'Value', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('INCOME_EXPENSE', 'IncomeExpense', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CLASSIFICATION', 'Classification', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('GST', 'Gst', 'double', CreoleTypes::DECIMAL, false, 10);

		$tMap->addColumn('SALES_SOURCE', 'SalesSource', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 