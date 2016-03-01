<?php


abstract class BasePayrollAttendanceSummaryPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'payroll_attendance_summary';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayrollAttendanceSummary';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'payroll_attendance_summary.ID';

	
	const TRANS_DATE = 'payroll_attendance_summary.TRANS_DATE';

	
	const EMPLOYEE_NO = 'payroll_attendance_summary.EMPLOYEE_NO';

	
	const NAME = 'payroll_attendance_summary.NAME';

	
	const MULTIPLIER = 'payroll_attendance_summary.MULTIPLIER';

	
	const RATE_PER_HOUR = 'payroll_attendance_summary.RATE_PER_HOUR';

	
	const NORMAL = 'payroll_attendance_summary.NORMAL';

	
	const UNDERTIME = 'payroll_attendance_summary.UNDERTIME';

	
	const OVERTIMES = 'payroll_attendance_summary.OVERTIMES';

	
	const POSTED_AMOUNT = 'payroll_attendance_summary.POSTED_AMOUNT';

	
	const EXTRA_OT = 'payroll_attendance_summary.EXTRA_OT';

	
	const EXTRA_OT_PAY = 'payroll_attendance_summary.EXTRA_OT_PAY';

	
	const ATTENDANCE = 'payroll_attendance_summary.ATTENDANCE';

	
	const HOLIDAY_CODE = 'payroll_attendance_summary.HOLIDAY_CODE';

	
	const LEAVE_TYPE = 'payroll_attendance_summary.LEAVE_TYPE';

	
	const DAYOFF = 'payroll_attendance_summary.DAYOFF';

	
	const DURATION = 'payroll_attendance_summary.DURATION';

	
	const AC_DURA = 'payroll_attendance_summary.AC_DURA';

	
	const UNEDITED_DURATION = 'payroll_attendance_summary.UNEDITED_DURATION';

	
	const MEAL = 'payroll_attendance_summary.MEAL';

	
	const ALLOWANCE = 'payroll_attendance_summary.ALLOWANCE';

	
	const PART_TIME_INCOME = 'payroll_attendance_summary.PART_TIME_INCOME';

	
	const TEAM = 'payroll_attendance_summary.TEAM';

	
	const COMPLIANCE_OT = 'payroll_attendance_summary.COMPLIANCE_OT';

	
	const COMPLIANCE_OT_AMT = 'payroll_attendance_summary.COMPLIANCE_OT_AMT';

	
	const COMPLIANCE_OT_ORIGINAL_TIME = 'payroll_attendance_summary.COMPLIANCE_OT_ORIGINAL_TIME';

	
	const COMPLIANCE_OT_AMT_ORIGINAL_TIME = 'payroll_attendance_summary.COMPLIANCE_OT_AMT_ORIGINAL_TIME';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TransDate', 'EmployeeNo', 'Name', 'Multiplier', 'RatePerHour', 'Normal', 'Undertime', 'Overtimes', 'PostedAmount', 'ExtraOt', 'ExtraOtPay', 'Attendance', 'HolidayCode', 'LeaveType', 'Dayoff', 'Duration', 'AcDura', 'UneditedDuration', 'Meal', 'Allowance', 'PartTimeIncome', 'Team', 'ComplianceOt', 'ComplianceOtAmt', 'ComplianceOtOriginalTime', 'ComplianceOtAmtOriginalTime', ),
		BasePeer::TYPE_COLNAME => array (PayrollAttendanceSummaryPeer::ID, PayrollAttendanceSummaryPeer::TRANS_DATE, PayrollAttendanceSummaryPeer::EMPLOYEE_NO, PayrollAttendanceSummaryPeer::NAME, PayrollAttendanceSummaryPeer::MULTIPLIER, PayrollAttendanceSummaryPeer::RATE_PER_HOUR, PayrollAttendanceSummaryPeer::NORMAL, PayrollAttendanceSummaryPeer::UNDERTIME, PayrollAttendanceSummaryPeer::OVERTIMES, PayrollAttendanceSummaryPeer::POSTED_AMOUNT, PayrollAttendanceSummaryPeer::EXTRA_OT, PayrollAttendanceSummaryPeer::EXTRA_OT_PAY, PayrollAttendanceSummaryPeer::ATTENDANCE, PayrollAttendanceSummaryPeer::HOLIDAY_CODE, PayrollAttendanceSummaryPeer::LEAVE_TYPE, PayrollAttendanceSummaryPeer::DAYOFF, PayrollAttendanceSummaryPeer::DURATION, PayrollAttendanceSummaryPeer::AC_DURA, PayrollAttendanceSummaryPeer::UNEDITED_DURATION, PayrollAttendanceSummaryPeer::MEAL, PayrollAttendanceSummaryPeer::ALLOWANCE, PayrollAttendanceSummaryPeer::PART_TIME_INCOME, PayrollAttendanceSummaryPeer::TEAM, PayrollAttendanceSummaryPeer::COMPLIANCE_OT, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trans_date', 'employee_no', 'name', 'multiplier', 'rate_per_hour', 'normal', 'undertime', 'overtimes', 'posted_amount', 'extra_ot', 'extra_ot_pay', 'attendance', 'holiday_code', 'leave_type', 'dayoff', 'duration', 'ac_dura', 'unedited_duration', 'meal', 'allowance', 'part_time_income', 'team', 'compliance_ot', 'compliance_ot_amt', 'compliance_ot_original_time', 'compliance_ot_amt_original_time', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TransDate' => 1, 'EmployeeNo' => 2, 'Name' => 3, 'Multiplier' => 4, 'RatePerHour' => 5, 'Normal' => 6, 'Undertime' => 7, 'Overtimes' => 8, 'PostedAmount' => 9, 'ExtraOt' => 10, 'ExtraOtPay' => 11, 'Attendance' => 12, 'HolidayCode' => 13, 'LeaveType' => 14, 'Dayoff' => 15, 'Duration' => 16, 'AcDura' => 17, 'UneditedDuration' => 18, 'Meal' => 19, 'Allowance' => 20, 'PartTimeIncome' => 21, 'Team' => 22, 'ComplianceOt' => 23, 'ComplianceOtAmt' => 24, 'ComplianceOtOriginalTime' => 25, 'ComplianceOtAmtOriginalTime' => 26, ),
		BasePeer::TYPE_COLNAME => array (PayrollAttendanceSummaryPeer::ID => 0, PayrollAttendanceSummaryPeer::TRANS_DATE => 1, PayrollAttendanceSummaryPeer::EMPLOYEE_NO => 2, PayrollAttendanceSummaryPeer::NAME => 3, PayrollAttendanceSummaryPeer::MULTIPLIER => 4, PayrollAttendanceSummaryPeer::RATE_PER_HOUR => 5, PayrollAttendanceSummaryPeer::NORMAL => 6, PayrollAttendanceSummaryPeer::UNDERTIME => 7, PayrollAttendanceSummaryPeer::OVERTIMES => 8, PayrollAttendanceSummaryPeer::POSTED_AMOUNT => 9, PayrollAttendanceSummaryPeer::EXTRA_OT => 10, PayrollAttendanceSummaryPeer::EXTRA_OT_PAY => 11, PayrollAttendanceSummaryPeer::ATTENDANCE => 12, PayrollAttendanceSummaryPeer::HOLIDAY_CODE => 13, PayrollAttendanceSummaryPeer::LEAVE_TYPE => 14, PayrollAttendanceSummaryPeer::DAYOFF => 15, PayrollAttendanceSummaryPeer::DURATION => 16, PayrollAttendanceSummaryPeer::AC_DURA => 17, PayrollAttendanceSummaryPeer::UNEDITED_DURATION => 18, PayrollAttendanceSummaryPeer::MEAL => 19, PayrollAttendanceSummaryPeer::ALLOWANCE => 20, PayrollAttendanceSummaryPeer::PART_TIME_INCOME => 21, PayrollAttendanceSummaryPeer::TEAM => 22, PayrollAttendanceSummaryPeer::COMPLIANCE_OT => 23, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT => 24, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME => 25, PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trans_date' => 1, 'employee_no' => 2, 'name' => 3, 'multiplier' => 4, 'rate_per_hour' => 5, 'normal' => 6, 'undertime' => 7, 'overtimes' => 8, 'posted_amount' => 9, 'extra_ot' => 10, 'extra_ot_pay' => 11, 'attendance' => 12, 'holiday_code' => 13, 'leave_type' => 14, 'dayoff' => 15, 'duration' => 16, 'ac_dura' => 17, 'unedited_duration' => 18, 'meal' => 19, 'allowance' => 20, 'part_time_income' => 21, 'team' => 22, 'compliance_ot' => 23, 'compliance_ot_amt' => 24, 'compliance_ot_original_time' => 25, 'compliance_ot_amt_original_time' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayrollAttendanceSummaryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayrollAttendanceSummaryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayrollAttendanceSummaryPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(PayrollAttendanceSummaryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::ID);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::TRANS_DATE);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::NAME);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::MULTIPLIER);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::RATE_PER_HOUR);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::NORMAL);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::UNDERTIME);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::OVERTIMES);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::POSTED_AMOUNT);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::EXTRA_OT);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::EXTRA_OT_PAY);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::ATTENDANCE);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::HOLIDAY_CODE);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::LEAVE_TYPE);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::DAYOFF);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::DURATION);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::AC_DURA);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::UNEDITED_DURATION);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::MEAL);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::ALLOWANCE);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::PART_TIME_INCOME);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::TEAM);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COMPLIANCE_OT);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_ORIGINAL_TIME);

		$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COMPLIANCE_OT_AMT_ORIGINAL_TIME);

	}

	const COUNT = 'COUNT(payroll_attendance_summary.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT payroll_attendance_summary.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayrollAttendanceSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayrollAttendanceSummaryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PayrollAttendanceSummaryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayrollAttendanceSummaryPeer::populateObjects(PayrollAttendanceSummaryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayrollAttendanceSummaryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayrollAttendanceSummaryPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return PayrollAttendanceSummaryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayrollAttendanceSummaryPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(PayrollAttendanceSummaryPeer::ID);
			$selectCriteria->add(PayrollAttendanceSummaryPeer::ID, $criteria->remove(PayrollAttendanceSummaryPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(PayrollAttendanceSummaryPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PayrollAttendanceSummaryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayrollAttendanceSummary) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayrollAttendanceSummaryPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(PayrollAttendanceSummary $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayrollAttendanceSummaryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayrollAttendanceSummaryPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(PayrollAttendanceSummaryPeer::DATABASE_NAME, PayrollAttendanceSummaryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayrollAttendanceSummaryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(PayrollAttendanceSummaryPeer::DATABASE_NAME);

		$criteria->add(PayrollAttendanceSummaryPeer::ID, $pk);


		$v = PayrollAttendanceSummaryPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(PayrollAttendanceSummaryPeer::ID, $pks, Criteria::IN);
			$objs = PayrollAttendanceSummaryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayrollAttendanceSummaryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayrollAttendanceSummaryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayrollAttendanceSummaryMapBuilder');
}
