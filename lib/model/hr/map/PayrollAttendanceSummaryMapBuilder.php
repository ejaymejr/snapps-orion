<?php



class PayrollAttendanceSummaryMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.PayrollAttendanceSummaryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('payroll_attendance_summary');
		$tMap->setPhpName('PayrollAttendanceSummary');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EMPLOYEE_NO', 'EmployeeNo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MULTIPLIER', 'Multiplier', 'double', CreoleTypes::FLOAT, false, 2);

		$tMap->addColumn('RATE_PER_HOUR', 'RatePerHour', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('NORMAL', 'Normal', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('UNDERTIME', 'Undertime', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('OVERTIMES', 'Overtimes', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('POSTED_AMOUNT', 'PostedAmount', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('EXTRA_OT', 'ExtraOt', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('EXTRA_OT_PAY', 'ExtraOtPay', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('ATTENDANCE', 'Attendance', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('HOLIDAY_CODE', 'HolidayCode', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LEAVE_TYPE', 'LeaveType', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DAYOFF', 'Dayoff', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('DURATION', 'Duration', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('AC_DURA', 'AcDura', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('UNEDITED_DURATION', 'UneditedDuration', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('MEAL', 'Meal', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('ALLOWANCE', 'Allowance', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('PART_TIME_INCOME', 'PartTimeIncome', 'double', CreoleTypes::FLOAT, false, 9);

		$tMap->addColumn('TEAM', 'Team', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('COMPLIANCE_OT', 'ComplianceOt', 'double', CreoleTypes::DECIMAL, true, 2);

		$tMap->addColumn('COMPLIANCE_OT_AMT', 'ComplianceOtAmt', 'double', CreoleTypes::FLOAT, true, 9);

		$tMap->addColumn('COMPLIANCE_OT_ORIGINAL_TIME', 'ComplianceOtOriginalTime', 'double', CreoleTypes::DECIMAL, true, 2);

		$tMap->addColumn('COMPLIANCE_OT_AMT_ORIGINAL_TIME', 'ComplianceOtAmtOriginalTime', 'double', CreoleTypes::FLOAT, true, 9);

	} 
} 