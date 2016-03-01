<?php


abstract class BaseTkBiometricRawDataPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'tk_biometric_raw_data';

	
	const CLASS_DEFAULT = 'lib.model.hr.TkBiometricRawData';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'tk_biometric_raw_data.ID';

	
	const CLKID = 'tk_biometric_raw_data.CLKID';

	
	const BADGENO = 'tk_biometric_raw_data.BADGENO';

	
	const PUNCHIN = 'tk_biometric_raw_data.PUNCHIN';

	
	const XTION = 'tk_biometric_raw_data.XTION';

	
	const ACTIVITY = 'tk_biometric_raw_data.ACTIVITY';

	
	const TRANS_DATE = 'tk_biometric_raw_data.TRANS_DATE';

	
	const SLOT = 'tk_biometric_raw_data.SLOT';

	
	const CLOCK_V = 'tk_biometric_raw_data.CLOCK_V';

	
	const ATE_TIME = 'tk_biometric_raw_data.ATE_TIME';

	
	const ATE = 'tk_biometric_raw_data.ATE';

	
	const DATE_CREATED = 'tk_biometric_raw_data.DATE_CREATED';

	
	const CREATED_BY = 'tk_biometric_raw_data.CREATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Clkid', 'Badgeno', 'Punchin', 'Xtion', 'Activity', 'TransDate', 'Slot', 'ClockV', 'AteTime', 'Ate', 'DateCreated', 'CreatedBy', ),
		BasePeer::TYPE_COLNAME => array (TkBiometricRawDataPeer::ID, TkBiometricRawDataPeer::CLKID, TkBiometricRawDataPeer::BADGENO, TkBiometricRawDataPeer::PUNCHIN, TkBiometricRawDataPeer::XTION, TkBiometricRawDataPeer::ACTIVITY, TkBiometricRawDataPeer::TRANS_DATE, TkBiometricRawDataPeer::SLOT, TkBiometricRawDataPeer::CLOCK_V, TkBiometricRawDataPeer::ATE_TIME, TkBiometricRawDataPeer::ATE, TkBiometricRawDataPeer::DATE_CREATED, TkBiometricRawDataPeer::CREATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'clkid', 'badgeno', 'punchin', 'xtion', 'activity', 'trans_date', 'slot', 'clock_v', 'ate_time', 'ate', 'date_created', 'created_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Clkid' => 1, 'Badgeno' => 2, 'Punchin' => 3, 'Xtion' => 4, 'Activity' => 5, 'TransDate' => 6, 'Slot' => 7, 'ClockV' => 8, 'AteTime' => 9, 'Ate' => 10, 'DateCreated' => 11, 'CreatedBy' => 12, ),
		BasePeer::TYPE_COLNAME => array (TkBiometricRawDataPeer::ID => 0, TkBiometricRawDataPeer::CLKID => 1, TkBiometricRawDataPeer::BADGENO => 2, TkBiometricRawDataPeer::PUNCHIN => 3, TkBiometricRawDataPeer::XTION => 4, TkBiometricRawDataPeer::ACTIVITY => 5, TkBiometricRawDataPeer::TRANS_DATE => 6, TkBiometricRawDataPeer::SLOT => 7, TkBiometricRawDataPeer::CLOCK_V => 8, TkBiometricRawDataPeer::ATE_TIME => 9, TkBiometricRawDataPeer::ATE => 10, TkBiometricRawDataPeer::DATE_CREATED => 11, TkBiometricRawDataPeer::CREATED_BY => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'clkid' => 1, 'badgeno' => 2, 'punchin' => 3, 'xtion' => 4, 'activity' => 5, 'trans_date' => 6, 'slot' => 7, 'clock_v' => 8, 'ate_time' => 9, 'ate' => 10, 'date_created' => 11, 'created_by' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/TkBiometricRawDataMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.TkBiometricRawDataMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TkBiometricRawDataPeer::getTableMap();
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
		return str_replace(TkBiometricRawDataPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TkBiometricRawDataPeer::ID);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::CLKID);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::BADGENO);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::PUNCHIN);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::XTION);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::ACTIVITY);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::TRANS_DATE);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::SLOT);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::CLOCK_V);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::ATE_TIME);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::ATE);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::DATE_CREATED);

		$criteria->addSelectColumn(TkBiometricRawDataPeer::CREATED_BY);

	}

	const COUNT = 'COUNT(tk_biometric_raw_data.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tk_biometric_raw_data.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkBiometricRawDataPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkBiometricRawDataPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TkBiometricRawDataPeer::doSelectRS($criteria, $con);
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
		$objects = TkBiometricRawDataPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TkBiometricRawDataPeer::populateObjects(TkBiometricRawDataPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TkBiometricRawDataPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TkBiometricRawDataPeer::getOMClass();
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
		return TkBiometricRawDataPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TkBiometricRawDataPeer::ID); 

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
			$comparison = $criteria->getComparison(TkBiometricRawDataPeer::ID);
			$selectCriteria->add(TkBiometricRawDataPeer::ID, $criteria->remove(TkBiometricRawDataPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TkBiometricRawDataPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TkBiometricRawDataPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TkBiometricRawData) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TkBiometricRawDataPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TkBiometricRawData $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TkBiometricRawDataPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TkBiometricRawDataPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TkBiometricRawDataPeer::DATABASE_NAME, TkBiometricRawDataPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TkBiometricRawDataPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TkBiometricRawDataPeer::DATABASE_NAME);

		$criteria->add(TkBiometricRawDataPeer::ID, $pk);


		$v = TkBiometricRawDataPeer::doSelect($criteria, $con);

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
			$criteria->add(TkBiometricRawDataPeer::ID, $pks, Criteria::IN);
			$objs = TkBiometricRawDataPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTkBiometricRawDataPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/TkBiometricRawDataMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.TkBiometricRawDataMapBuilder');
}
