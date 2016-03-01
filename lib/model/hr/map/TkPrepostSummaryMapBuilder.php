<?php



class TkPrepostSummaryMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.TkPrepostSummaryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tk_prepost_summary');
		$tMap->setPhpName('TkPrepostSummary');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PREPOST_BATCH', 'PrepostBatch', 'string', CreoleTypes::CHAR, false, 7);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OT_HR', 'OtHr', 'double', CreoleTypes::FLOAT, false, 2);

		$tMap->addColumn('UT_HR', 'UtHr', 'double', CreoleTypes::FLOAT, false, 2);

		$tMap->addColumn('ABSENCES_HR', 'AbsencesHr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('OT_PAY', 'OtPay', 'double', CreoleTypes::FLOAT, false, 5);

		$tMap->addColumn('UT_DED', 'UtDed', 'double', CreoleTypes::FLOAT, false, 5);

		$tMap->addColumn('ABSENCES_DED', 'AbsencesDed', 'double', CreoleTypes::FLOAT, false, 5);

		$tMap->addColumn('POST_BATCH', 'PostBatch', 'string', CreoleTypes::CHAR, false, 7);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('TK_DTRMASTER_ID', 'TkDtrmasterId', 'string', CreoleTypes::BIGINT, 'tk_dtrmaster', 'ID', false, null);

		$tMap->addForeignKey('TK_DTRSUMMARY_ID', 'TkDtrsummaryId', 'string', CreoleTypes::BIGINT, 'tk_dtrsummary', 'ID', false, null);

	} 
} 