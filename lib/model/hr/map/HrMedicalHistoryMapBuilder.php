<?php



class HrMedicalHistoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrMedicalHistoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hr_medical_history');
		$tMap->setPhpName('HrMedicalHistory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('HOSPITAL_CLINIC', 'HospitalClinic', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NAME_EXAMINEE', 'NameExaminee', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SYMPTOMS', 'Symptoms', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIAGNOSIS', 'Diagnosis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DATE_EXAMINED', 'DateExamined', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('HR_EMPLOYEE_ID', 'HrEmployeeId', 'string', CreoleTypes::BIGINT, 'hr_employee', 'ID', false, null);

	} 
} 