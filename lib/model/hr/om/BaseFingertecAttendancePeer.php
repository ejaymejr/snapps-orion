<?php


abstract class BaseFingertecAttendancePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'fingertec_attendance';

	
	const CLASS_DEFAULT = 'lib.model.hr.FingertecAttendance';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'fingertec_attendance.ID';

	
	const EMPLOYEE_NO = 'fingertec_attendance.EMPLOYEE_NO';

	
	const NAME = 'fingertec_attendance.NAME';

	
	const TRANS_DATE = 'fingertec_attendance.TRANS_DATE';

	
	const ENROLL_NO = 'fingertec_attendance.ENROLL_NO';

	
	const MACHINE_NO = 'fingertec_attendance.MACHINE_NO';

	
	const IS_PROCESSED = 'fingertec_attendance.IS_PROCESSED';

	
	const DATE_DUMP = 'fingertec_attendance.DATE_DUMP';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'TransDate', 'EnrollNo', 'MachineNo', 'IsProcessed', 'DateDump', ),
		BasePeer::TYPE_COLNAME => array (FingertecAttendancePeer::ID, FingertecAttendancePeer::EMPLOYEE_NO, FingertecAttendancePeer::NAME, FingertecAttendancePeer::TRANS_DATE, FingertecAttendancePeer::ENROLL_NO, FingertecAttendancePeer::MACHINE_NO, FingertecAttendancePeer::IS_PROCESSED, FingertecAttendancePeer::DATE_DUMP, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'trans_date', 'enroll_no', 'machine_no', 'is_processed', 'date_dump', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'TransDate' => 3, 'EnrollNo' => 4, 'MachineNo' => 5, 'IsProcessed' => 6, 'DateDump' => 7, ),
		BasePeer::TYPE_COLNAME => array (FingertecAttendancePeer::ID => 0, FingertecAttendancePeer::EMPLOYEE_NO => 1, FingertecAttendancePeer::NAME => 2, FingertecAttendancePeer::TRANS_DATE => 3, FingertecAttendancePeer::ENROLL_NO => 4, FingertecAttendancePeer::MACHINE_NO => 5, FingertecAttendancePeer::IS_PROCESSED => 6, FingertecAttendancePeer::DATE_DUMP => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'trans_date' => 3, 'enroll_no' => 4, 'machine_no' => 5, 'is_processed' => 6, 'date_dump' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/FingertecAttendanceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.FingertecAttendanceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FingertecAttendancePeer::getTableMap();
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
		return str_replace(FingertecAttendancePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FingertecAttendancePeer::ID);

		$criteria->addSelectColumn(FingertecAttendancePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(FingertecAttendancePeer::NAME);

		$criteria->addSelectColumn(FingertecAttendancePeer::TRANS_DATE);

		$criteria->addSelectColumn(FingertecAttendancePeer::ENROLL_NO);

		$criteria->addSelectColumn(FingertecAttendancePeer::MACHINE_NO);

		$criteria->addSelectColumn(FingertecAttendancePeer::IS_PROCESSED);

		$criteria->addSelectColumn(FingertecAttendancePeer::DATE_DUMP);

	}

	const COUNT = 'COUNT(fingertec_attendance.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fingertec_attendance.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FingertecAttendancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FingertecAttendancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FingertecAttendancePeer::doSelectRS($criteria, $con);
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
		$objects = FingertecAttendancePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FingertecAttendancePeer::populateObjects(FingertecAttendancePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FingertecAttendancePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FingertecAttendancePeer::getOMClass();
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
		return FingertecAttendancePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FingertecAttendancePeer::ID); 

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
			$comparison = $criteria->getComparison(FingertecAttendancePeer::ID);
			$selectCriteria->add(FingertecAttendancePeer::ID, $criteria->remove(FingertecAttendancePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FingertecAttendancePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FingertecAttendancePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FingertecAttendance) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FingertecAttendancePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FingertecAttendance $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FingertecAttendancePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FingertecAttendancePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FingertecAttendancePeer::DATABASE_NAME, FingertecAttendancePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FingertecAttendancePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FingertecAttendancePeer::DATABASE_NAME);

		$criteria->add(FingertecAttendancePeer::ID, $pk);


		$v = FingertecAttendancePeer::doSelect($criteria, $con);

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
			$criteria->add(FingertecAttendancePeer::ID, $pks, Criteria::IN);
			$objs = FingertecAttendancePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFingertecAttendancePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/FingertecAttendanceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.FingertecAttendanceMapBuilder');
}
