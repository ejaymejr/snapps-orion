<?php


abstract class BaseTkAttendanceMultiplePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'tk_attendance_multiple';

	
	const CLASS_DEFAULT = 'lib.model.hr.TkAttendanceMultiple';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'tk_attendance_multiple.ID';

	
	const EMPLOYEE_NO = 'tk_attendance_multiple.EMPLOYEE_NO';

	
	const NAME = 'tk_attendance_multiple.NAME';

	
	const TIME_IN = 'tk_attendance_multiple.TIME_IN';

	
	const TIME_OUT = 'tk_attendance_multiple.TIME_OUT';

	
	const DURATION = 'tk_attendance_multiple.DURATION';

	
	const NORMAL = 'tk_attendance_multiple.NORMAL';

	
	const OT1 = 'tk_attendance_multiple.OT1';

	
	const OT2 = 'tk_attendance_multiple.OT2';

	
	const OT3 = 'tk_attendance_multiple.OT3';

	
	const CREATED_BY = 'tk_attendance_multiple.CREATED_BY';

	
	const DATE_CREATED = 'tk_attendance_multiple.DATE_CREATED';

	
	const MODIFIED_BY = 'tk_attendance_multiple.MODIFIED_BY';

	
	const DATE_MODIFIED = 'tk_attendance_multiple.DATE_MODIFIED';

	
	const HR_EMPLOYEE_ID = 'tk_attendance_multiple.HR_EMPLOYEE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'TimeIn', 'TimeOut', 'Duration', 'Normal', 'Ot1', 'Ot2', 'Ot3', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeId', ),
		BasePeer::TYPE_COLNAME => array (TkAttendanceMultiplePeer::ID, TkAttendanceMultiplePeer::EMPLOYEE_NO, TkAttendanceMultiplePeer::NAME, TkAttendanceMultiplePeer::TIME_IN, TkAttendanceMultiplePeer::TIME_OUT, TkAttendanceMultiplePeer::DURATION, TkAttendanceMultiplePeer::NORMAL, TkAttendanceMultiplePeer::OT1, TkAttendanceMultiplePeer::OT2, TkAttendanceMultiplePeer::OT3, TkAttendanceMultiplePeer::CREATED_BY, TkAttendanceMultiplePeer::DATE_CREATED, TkAttendanceMultiplePeer::MODIFIED_BY, TkAttendanceMultiplePeer::DATE_MODIFIED, TkAttendanceMultiplePeer::HR_EMPLOYEE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'time_in', 'time_out', 'duration', 'normal', 'ot1', 'ot2', 'ot3', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'TimeIn' => 3, 'TimeOut' => 4, 'Duration' => 5, 'Normal' => 6, 'Ot1' => 7, 'Ot2' => 8, 'Ot3' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, 'HrEmployeeId' => 14, ),
		BasePeer::TYPE_COLNAME => array (TkAttendanceMultiplePeer::ID => 0, TkAttendanceMultiplePeer::EMPLOYEE_NO => 1, TkAttendanceMultiplePeer::NAME => 2, TkAttendanceMultiplePeer::TIME_IN => 3, TkAttendanceMultiplePeer::TIME_OUT => 4, TkAttendanceMultiplePeer::DURATION => 5, TkAttendanceMultiplePeer::NORMAL => 6, TkAttendanceMultiplePeer::OT1 => 7, TkAttendanceMultiplePeer::OT2 => 8, TkAttendanceMultiplePeer::OT3 => 9, TkAttendanceMultiplePeer::CREATED_BY => 10, TkAttendanceMultiplePeer::DATE_CREATED => 11, TkAttendanceMultiplePeer::MODIFIED_BY => 12, TkAttendanceMultiplePeer::DATE_MODIFIED => 13, TkAttendanceMultiplePeer::HR_EMPLOYEE_ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'time_in' => 3, 'time_out' => 4, 'duration' => 5, 'normal' => 6, 'ot1' => 7, 'ot2' => 8, 'ot3' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, 'hr_employee_id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/TkAttendanceMultipleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.TkAttendanceMultipleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TkAttendanceMultiplePeer::getTableMap();
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
		return str_replace(TkAttendanceMultiplePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::ID);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::NAME);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::TIME_IN);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::TIME_OUT);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::DURATION);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::NORMAL);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::OT1);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::OT2);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::OT3);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::CREATED_BY);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::DATE_CREATED);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::MODIFIED_BY);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::DATE_MODIFIED);

		$criteria->addSelectColumn(TkAttendanceMultiplePeer::HR_EMPLOYEE_ID);

	}

	const COUNT = 'COUNT(tk_attendance_multiple.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tk_attendance_multiple.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkAttendanceMultiplePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkAttendanceMultiplePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TkAttendanceMultiplePeer::doSelectRS($criteria, $con);
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
		$objects = TkAttendanceMultiplePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TkAttendanceMultiplePeer::populateObjects(TkAttendanceMultiplePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TkAttendanceMultiplePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TkAttendanceMultiplePeer::getOMClass();
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
		return TkAttendanceMultiplePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TkAttendanceMultiplePeer::ID); 

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
			$comparison = $criteria->getComparison(TkAttendanceMultiplePeer::ID);
			$selectCriteria->add(TkAttendanceMultiplePeer::ID, $criteria->remove(TkAttendanceMultiplePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TkAttendanceMultiplePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TkAttendanceMultiplePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TkAttendanceMultiple) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TkAttendanceMultiplePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TkAttendanceMultiple $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TkAttendanceMultiplePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TkAttendanceMultiplePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TkAttendanceMultiplePeer::DATABASE_NAME, TkAttendanceMultiplePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TkAttendanceMultiplePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TkAttendanceMultiplePeer::DATABASE_NAME);

		$criteria->add(TkAttendanceMultiplePeer::ID, $pk);


		$v = TkAttendanceMultiplePeer::doSelect($criteria, $con);

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
			$criteria->add(TkAttendanceMultiplePeer::ID, $pks, Criteria::IN);
			$objs = TkAttendanceMultiplePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTkAttendanceMultiplePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/TkAttendanceMultipleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.TkAttendanceMultipleMapBuilder');
}
