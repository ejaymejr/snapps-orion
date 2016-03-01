<?php


abstract class BaseHrEmployeeDailyPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_daily';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeDaily';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_daily.ID';

	
	const EMPLOYEE_NO = 'hr_employee_daily.EMPLOYEE_NO';

	
	const NAME = 'hr_employee_daily.NAME';

	
	const DEPARTMENT = 'hr_employee_daily.DEPARTMENT';

	
	const IS_ON_LEAVE = 'hr_employee_daily.IS_ON_LEAVE';

	
	const COMPANY = 'hr_employee_daily.COMPANY';

	
	const BASIC = 'hr_employee_daily.BASIC';

	
	const OT = 'hr_employee_daily.OT';

	
	const MEAL = 'hr_employee_daily.MEAL';

	
	const ALLOWANCE = 'hr_employee_daily.ALLOWANCE';

	
	const MONTH_ALLOWANCE = 'hr_employee_daily.MONTH_ALLOWANCE';

	
	const PART_TIME = 'hr_employee_daily.PART_TIME';

	
	const CPF_EM = 'hr_employee_daily.CPF_EM';

	
	const CPF_ER = 'hr_employee_daily.CPF_ER';

	
	const HOURLY_RATE = 'hr_employee_daily.HOURLY_RATE';

	
	const UNDERTIME = 'hr_employee_daily.UNDERTIME';

	
	const ABSENT = 'hr_employee_daily.ABSENT';

	
	const SHIFT = 'hr_employee_daily.SHIFT';

	
	const DURATION = 'hr_employee_daily.DURATION';

	
	const BASIC_ADJUSTMENT = 'hr_employee_daily.BASIC_ADJUSTMENT';

	
	const TRANS_DATE = 'hr_employee_daily.TRANS_DATE';

	
	const CREATED_BY = 'hr_employee_daily.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_daily.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_daily.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_daily.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Department', 'IsOnLeave', 'Company', 'Basic', 'Ot', 'Meal', 'Allowance', 'MonthAllowance', 'PartTime', 'CpfEm', 'CpfEr', 'HourlyRate', 'Undertime', 'Absent', 'Shift', 'Duration', 'BasicAdjustment', 'TransDate', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDailyPeer::ID, HrEmployeeDailyPeer::EMPLOYEE_NO, HrEmployeeDailyPeer::NAME, HrEmployeeDailyPeer::DEPARTMENT, HrEmployeeDailyPeer::IS_ON_LEAVE, HrEmployeeDailyPeer::COMPANY, HrEmployeeDailyPeer::BASIC, HrEmployeeDailyPeer::OT, HrEmployeeDailyPeer::MEAL, HrEmployeeDailyPeer::ALLOWANCE, HrEmployeeDailyPeer::MONTH_ALLOWANCE, HrEmployeeDailyPeer::PART_TIME, HrEmployeeDailyPeer::CPF_EM, HrEmployeeDailyPeer::CPF_ER, HrEmployeeDailyPeer::HOURLY_RATE, HrEmployeeDailyPeer::UNDERTIME, HrEmployeeDailyPeer::ABSENT, HrEmployeeDailyPeer::SHIFT, HrEmployeeDailyPeer::DURATION, HrEmployeeDailyPeer::BASIC_ADJUSTMENT, HrEmployeeDailyPeer::TRANS_DATE, HrEmployeeDailyPeer::CREATED_BY, HrEmployeeDailyPeer::DATE_CREATED, HrEmployeeDailyPeer::MODIFIED_BY, HrEmployeeDailyPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'department', 'is_on_leave', 'company', 'basic', 'ot', 'meal', 'allowance', 'month_allowance', 'part_time', 'cpf_em', 'cpf_er', 'hourly_rate', 'undertime', 'absent', 'shift', 'duration', 'basic_adjustment', 'trans_date', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Department' => 3, 'IsOnLeave' => 4, 'Company' => 5, 'Basic' => 6, 'Ot' => 7, 'Meal' => 8, 'Allowance' => 9, 'MonthAllowance' => 10, 'PartTime' => 11, 'CpfEm' => 12, 'CpfEr' => 13, 'HourlyRate' => 14, 'Undertime' => 15, 'Absent' => 16, 'Shift' => 17, 'Duration' => 18, 'BasicAdjustment' => 19, 'TransDate' => 20, 'CreatedBy' => 21, 'DateCreated' => 22, 'ModifiedBy' => 23, 'DateModified' => 24, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDailyPeer::ID => 0, HrEmployeeDailyPeer::EMPLOYEE_NO => 1, HrEmployeeDailyPeer::NAME => 2, HrEmployeeDailyPeer::DEPARTMENT => 3, HrEmployeeDailyPeer::IS_ON_LEAVE => 4, HrEmployeeDailyPeer::COMPANY => 5, HrEmployeeDailyPeer::BASIC => 6, HrEmployeeDailyPeer::OT => 7, HrEmployeeDailyPeer::MEAL => 8, HrEmployeeDailyPeer::ALLOWANCE => 9, HrEmployeeDailyPeer::MONTH_ALLOWANCE => 10, HrEmployeeDailyPeer::PART_TIME => 11, HrEmployeeDailyPeer::CPF_EM => 12, HrEmployeeDailyPeer::CPF_ER => 13, HrEmployeeDailyPeer::HOURLY_RATE => 14, HrEmployeeDailyPeer::UNDERTIME => 15, HrEmployeeDailyPeer::ABSENT => 16, HrEmployeeDailyPeer::SHIFT => 17, HrEmployeeDailyPeer::DURATION => 18, HrEmployeeDailyPeer::BASIC_ADJUSTMENT => 19, HrEmployeeDailyPeer::TRANS_DATE => 20, HrEmployeeDailyPeer::CREATED_BY => 21, HrEmployeeDailyPeer::DATE_CREATED => 22, HrEmployeeDailyPeer::MODIFIED_BY => 23, HrEmployeeDailyPeer::DATE_MODIFIED => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'department' => 3, 'is_on_leave' => 4, 'company' => 5, 'basic' => 6, 'ot' => 7, 'meal' => 8, 'allowance' => 9, 'month_allowance' => 10, 'part_time' => 11, 'cpf_em' => 12, 'cpf_er' => 13, 'hourly_rate' => 14, 'undertime' => 15, 'absent' => 16, 'shift' => 17, 'duration' => 18, 'basic_adjustment' => 19, 'trans_date' => 20, 'created_by' => 21, 'date_created' => 22, 'modified_by' => 23, 'date_modified' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeDailyMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeDailyMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeDailyPeer::getTableMap();
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
		return str_replace(HrEmployeeDailyPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeDailyPeer::ID);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::NAME);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::DEPARTMENT);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::IS_ON_LEAVE);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::COMPANY);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::BASIC);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::OT);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::MEAL);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::ALLOWANCE);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::MONTH_ALLOWANCE);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::PART_TIME);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::CPF_EM);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::CPF_ER);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::HOURLY_RATE);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::UNDERTIME);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::ABSENT);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::SHIFT);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::DURATION);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::BASIC_ADJUSTMENT);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::TRANS_DATE);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeDailyPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_employee_daily.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_daily.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeDailyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeDailyPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeDailyPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeDailyPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeDailyPeer::populateObjects(HrEmployeeDailyPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeDailyPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeDailyPeer::getOMClass();
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
		return HrEmployeeDailyPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeDailyPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeDailyPeer::ID);
			$selectCriteria->add(HrEmployeeDailyPeer::ID, $criteria->remove(HrEmployeeDailyPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeDailyPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeDailyPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeDaily) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeDailyPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeDaily $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeDailyPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeDailyPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeDailyPeer::DATABASE_NAME, HrEmployeeDailyPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeDailyPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeDailyPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeDailyPeer::ID, $pk);


		$v = HrEmployeeDailyPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeDailyPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeDailyPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeDailyPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeDailyMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeDailyMapBuilder');
}
