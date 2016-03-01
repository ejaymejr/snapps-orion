<?php


abstract class BaseTkBiometricLogPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'tk_biometric_log';

	
	const CLASS_DEFAULT = 'lib.model.hr.TkBiometricLog';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'tk_biometric_log.ID';

	
	const USER_ID = 'tk_biometric_log.USER_ID';

	
	const EMPLOYEE_NO = 'tk_biometric_log.EMPLOYEE_NO';

	
	const NAME = 'tk_biometric_log.NAME';

	
	const TRANS_DATE = 'tk_biometric_log.TRANS_DATE';

	
	const TIME_IN = 'tk_biometric_log.TIME_IN';

	
	const TIME_OUT = 'tk_biometric_log.TIME_OUT';

	
	const OT = 'tk_biometric_log.OT';

	
	const SOURCE = 'tk_biometric_log.SOURCE';

	
	const UPLOAD_DATE = 'tk_biometric_log.UPLOAD_DATE';

	
	const DATE_CREATED = 'tk_biometric_log.DATE_CREATED';

	
	const CREATED_BY = 'tk_biometric_log.CREATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'EmployeeNo', 'Name', 'TransDate', 'TimeIn', 'TimeOut', 'Ot', 'Source', 'UploadDate', 'DateCreated', 'CreatedBy', ),
		BasePeer::TYPE_COLNAME => array (TkBiometricLogPeer::ID, TkBiometricLogPeer::USER_ID, TkBiometricLogPeer::EMPLOYEE_NO, TkBiometricLogPeer::NAME, TkBiometricLogPeer::TRANS_DATE, TkBiometricLogPeer::TIME_IN, TkBiometricLogPeer::TIME_OUT, TkBiometricLogPeer::OT, TkBiometricLogPeer::SOURCE, TkBiometricLogPeer::UPLOAD_DATE, TkBiometricLogPeer::DATE_CREATED, TkBiometricLogPeer::CREATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'employee_no', 'name', 'trans_date', 'time_in', 'time_out', 'ot', 'source', 'upload_date', 'date_created', 'created_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'EmployeeNo' => 2, 'Name' => 3, 'TransDate' => 4, 'TimeIn' => 5, 'TimeOut' => 6, 'Ot' => 7, 'Source' => 8, 'UploadDate' => 9, 'DateCreated' => 10, 'CreatedBy' => 11, ),
		BasePeer::TYPE_COLNAME => array (TkBiometricLogPeer::ID => 0, TkBiometricLogPeer::USER_ID => 1, TkBiometricLogPeer::EMPLOYEE_NO => 2, TkBiometricLogPeer::NAME => 3, TkBiometricLogPeer::TRANS_DATE => 4, TkBiometricLogPeer::TIME_IN => 5, TkBiometricLogPeer::TIME_OUT => 6, TkBiometricLogPeer::OT => 7, TkBiometricLogPeer::SOURCE => 8, TkBiometricLogPeer::UPLOAD_DATE => 9, TkBiometricLogPeer::DATE_CREATED => 10, TkBiometricLogPeer::CREATED_BY => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'employee_no' => 2, 'name' => 3, 'trans_date' => 4, 'time_in' => 5, 'time_out' => 6, 'ot' => 7, 'source' => 8, 'upload_date' => 9, 'date_created' => 10, 'created_by' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/TkBiometricLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.TkBiometricLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TkBiometricLogPeer::getTableMap();
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
		return str_replace(TkBiometricLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TkBiometricLogPeer::ID);

		$criteria->addSelectColumn(TkBiometricLogPeer::USER_ID);

		$criteria->addSelectColumn(TkBiometricLogPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(TkBiometricLogPeer::NAME);

		$criteria->addSelectColumn(TkBiometricLogPeer::TRANS_DATE);

		$criteria->addSelectColumn(TkBiometricLogPeer::TIME_IN);

		$criteria->addSelectColumn(TkBiometricLogPeer::TIME_OUT);

		$criteria->addSelectColumn(TkBiometricLogPeer::OT);

		$criteria->addSelectColumn(TkBiometricLogPeer::SOURCE);

		$criteria->addSelectColumn(TkBiometricLogPeer::UPLOAD_DATE);

		$criteria->addSelectColumn(TkBiometricLogPeer::DATE_CREATED);

		$criteria->addSelectColumn(TkBiometricLogPeer::CREATED_BY);

	}

	const COUNT = 'COUNT(tk_biometric_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tk_biometric_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkBiometricLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkBiometricLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TkBiometricLogPeer::doSelectRS($criteria, $con);
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
		$objects = TkBiometricLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TkBiometricLogPeer::populateObjects(TkBiometricLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TkBiometricLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TkBiometricLogPeer::getOMClass();
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
		return TkBiometricLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TkBiometricLogPeer::ID); 

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
			$comparison = $criteria->getComparison(TkBiometricLogPeer::ID);
			$selectCriteria->add(TkBiometricLogPeer::ID, $criteria->remove(TkBiometricLogPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TkBiometricLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TkBiometricLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TkBiometricLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TkBiometricLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TkBiometricLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TkBiometricLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TkBiometricLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TkBiometricLogPeer::DATABASE_NAME, TkBiometricLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TkBiometricLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TkBiometricLogPeer::DATABASE_NAME);

		$criteria->add(TkBiometricLogPeer::ID, $pk);


		$v = TkBiometricLogPeer::doSelect($criteria, $con);

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
			$criteria->add(TkBiometricLogPeer::ID, $pks, Criteria::IN);
			$objs = TkBiometricLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTkBiometricLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/TkBiometricLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.TkBiometricLogMapBuilder');
}
