<?php


abstract class BaseAttendancePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'attendance';

	
	const CLASS_DEFAULT = 'lib.model.hr.Attendance';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'attendance.ID';

	
	const EMPLOYEE_NO = 'attendance.EMPLOYEE_NO';

	
	const TIME_IN = 'attendance.TIME_IN';

	
	const TIME_OUT = 'attendance.TIME_OUT';

	
	const TIME_OUT_ORIG = 'attendance.TIME_OUT_ORIG';

	
	const DURATION = 'attendance.DURATION';

	
	const NORMAL = 'attendance.NORMAL';

	
	const OT1 = 'attendance.OT1';

	
	const OT2 = 'attendance.OT2';

	
	const OT3 = 'attendance.OT3';

	
	const NAME = 'attendance.NAME';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'TimeIn', 'TimeOut', 'TimeOutOrig', 'Duration', 'Normal', 'Ot1', 'Ot2', 'Ot3', 'Name', ),
		BasePeer::TYPE_COLNAME => array (AttendancePeer::ID, AttendancePeer::EMPLOYEE_NO, AttendancePeer::TIME_IN, AttendancePeer::TIME_OUT, AttendancePeer::TIME_OUT_ORIG, AttendancePeer::DURATION, AttendancePeer::NORMAL, AttendancePeer::OT1, AttendancePeer::OT2, AttendancePeer::OT3, AttendancePeer::NAME, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'time_in', 'time_out', 'time_out_orig', 'duration', 'normal', 'ot1', 'ot2', 'ot3', 'name', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'TimeIn' => 2, 'TimeOut' => 3, 'TimeOutOrig' => 4, 'Duration' => 5, 'Normal' => 6, 'Ot1' => 7, 'Ot2' => 8, 'Ot3' => 9, 'Name' => 10, ),
		BasePeer::TYPE_COLNAME => array (AttendancePeer::ID => 0, AttendancePeer::EMPLOYEE_NO => 1, AttendancePeer::TIME_IN => 2, AttendancePeer::TIME_OUT => 3, AttendancePeer::TIME_OUT_ORIG => 4, AttendancePeer::DURATION => 5, AttendancePeer::NORMAL => 6, AttendancePeer::OT1 => 7, AttendancePeer::OT2 => 8, AttendancePeer::OT3 => 9, AttendancePeer::NAME => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'time_in' => 2, 'time_out' => 3, 'time_out_orig' => 4, 'duration' => 5, 'normal' => 6, 'ot1' => 7, 'ot2' => 8, 'ot3' => 9, 'name' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/AttendanceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.AttendanceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AttendancePeer::getTableMap();
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
		return str_replace(AttendancePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AttendancePeer::ID);

		$criteria->addSelectColumn(AttendancePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(AttendancePeer::TIME_IN);

		$criteria->addSelectColumn(AttendancePeer::TIME_OUT);

		$criteria->addSelectColumn(AttendancePeer::TIME_OUT_ORIG);

		$criteria->addSelectColumn(AttendancePeer::DURATION);

		$criteria->addSelectColumn(AttendancePeer::NORMAL);

		$criteria->addSelectColumn(AttendancePeer::OT1);

		$criteria->addSelectColumn(AttendancePeer::OT2);

		$criteria->addSelectColumn(AttendancePeer::OT3);

		$criteria->addSelectColumn(AttendancePeer::NAME);

	}

	const COUNT = 'COUNT(attendance.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT attendance.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AttendancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AttendancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AttendancePeer::doSelectRS($criteria, $con);
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
		$objects = AttendancePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AttendancePeer::populateObjects(AttendancePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AttendancePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AttendancePeer::getOMClass();
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
		return AttendancePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AttendancePeer::ID); 

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
			$comparison = $criteria->getComparison(AttendancePeer::ID);
			$selectCriteria->add(AttendancePeer::ID, $criteria->remove(AttendancePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AttendancePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AttendancePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Attendance) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AttendancePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Attendance $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AttendancePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AttendancePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AttendancePeer::DATABASE_NAME, AttendancePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AttendancePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AttendancePeer::DATABASE_NAME);

		$criteria->add(AttendancePeer::ID, $pk);


		$v = AttendancePeer::doSelect($criteria, $con);

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
			$criteria->add(AttendancePeer::ID, $pks, Criteria::IN);
			$objs = AttendancePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAttendancePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/AttendanceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.AttendanceMapBuilder');
}
