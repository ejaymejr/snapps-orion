<?php


abstract class BaseHrTrainingDevelopmentPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_training_development';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrTrainingDevelopment';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_training_development.ID';

	
	const EMPLOYEE_NO = 'hr_training_development.EMPLOYEE_NO';

	
	const NAME = 'hr_training_development.NAME';

	
	const HR_TRAINING_ID = 'hr_training_development.HR_TRAINING_ID';

	
	const DESCRIPTION = 'hr_training_development.DESCRIPTION';

	
	const PLACE_HELD = 'hr_training_development.PLACE_HELD';

	
	const DATE_HELD = 'hr_training_development.DATE_HELD';

	
	const REMARKS = 'hr_training_development.REMARKS';

	
	const NAME_TRAINOR = 'hr_training_development.NAME_TRAINOR';

	
	const LICENSE_NO = 'hr_training_development.LICENSE_NO';

	
	const CREATED_BY = 'hr_training_development.CREATED_BY';

	
	const DATE_CREATED = 'hr_training_development.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_training_development.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_training_development.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'HrTrainingId', 'Description', 'PlaceHeld', 'DateHeld', 'Remarks', 'NameTrainor', 'LicenseNo', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrTrainingDevelopmentPeer::ID, HrTrainingDevelopmentPeer::EMPLOYEE_NO, HrTrainingDevelopmentPeer::NAME, HrTrainingDevelopmentPeer::HR_TRAINING_ID, HrTrainingDevelopmentPeer::DESCRIPTION, HrTrainingDevelopmentPeer::PLACE_HELD, HrTrainingDevelopmentPeer::DATE_HELD, HrTrainingDevelopmentPeer::REMARKS, HrTrainingDevelopmentPeer::NAME_TRAINOR, HrTrainingDevelopmentPeer::LICENSE_NO, HrTrainingDevelopmentPeer::CREATED_BY, HrTrainingDevelopmentPeer::DATE_CREATED, HrTrainingDevelopmentPeer::MODIFIED_BY, HrTrainingDevelopmentPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'hr_training_id', 'description', 'place_held', 'date_held', 'remarks', 'name_trainor', 'license_no', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'HrTrainingId' => 3, 'Description' => 4, 'PlaceHeld' => 5, 'DateHeld' => 6, 'Remarks' => 7, 'NameTrainor' => 8, 'LicenseNo' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (HrTrainingDevelopmentPeer::ID => 0, HrTrainingDevelopmentPeer::EMPLOYEE_NO => 1, HrTrainingDevelopmentPeer::NAME => 2, HrTrainingDevelopmentPeer::HR_TRAINING_ID => 3, HrTrainingDevelopmentPeer::DESCRIPTION => 4, HrTrainingDevelopmentPeer::PLACE_HELD => 5, HrTrainingDevelopmentPeer::DATE_HELD => 6, HrTrainingDevelopmentPeer::REMARKS => 7, HrTrainingDevelopmentPeer::NAME_TRAINOR => 8, HrTrainingDevelopmentPeer::LICENSE_NO => 9, HrTrainingDevelopmentPeer::CREATED_BY => 10, HrTrainingDevelopmentPeer::DATE_CREATED => 11, HrTrainingDevelopmentPeer::MODIFIED_BY => 12, HrTrainingDevelopmentPeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'hr_training_id' => 3, 'description' => 4, 'place_held' => 5, 'date_held' => 6, 'remarks' => 7, 'name_trainor' => 8, 'license_no' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrTrainingDevelopmentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrTrainingDevelopmentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrTrainingDevelopmentPeer::getTableMap();
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
		return str_replace(HrTrainingDevelopmentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::ID);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::NAME);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::HR_TRAINING_ID);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::DESCRIPTION);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::PLACE_HELD);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::DATE_HELD);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::REMARKS);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::NAME_TRAINOR);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::LICENSE_NO);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::CREATED_BY);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrTrainingDevelopmentPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_training_development.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_training_development.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrTrainingDevelopmentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrTrainingDevelopmentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrTrainingDevelopmentPeer::doSelectRS($criteria, $con);
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
		$objects = HrTrainingDevelopmentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrTrainingDevelopmentPeer::populateObjects(HrTrainingDevelopmentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrTrainingDevelopmentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrTrainingDevelopmentPeer::getOMClass();
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
		return HrTrainingDevelopmentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrTrainingDevelopmentPeer::ID); 

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
			$comparison = $criteria->getComparison(HrTrainingDevelopmentPeer::ID);
			$selectCriteria->add(HrTrainingDevelopmentPeer::ID, $criteria->remove(HrTrainingDevelopmentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrTrainingDevelopmentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrTrainingDevelopmentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrTrainingDevelopment) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrTrainingDevelopmentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrTrainingDevelopment $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrTrainingDevelopmentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrTrainingDevelopmentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrTrainingDevelopmentPeer::DATABASE_NAME, HrTrainingDevelopmentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrTrainingDevelopmentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrTrainingDevelopmentPeer::DATABASE_NAME);

		$criteria->add(HrTrainingDevelopmentPeer::ID, $pk);


		$v = HrTrainingDevelopmentPeer::doSelect($criteria, $con);

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
			$criteria->add(HrTrainingDevelopmentPeer::ID, $pks, Criteria::IN);
			$objs = HrTrainingDevelopmentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrTrainingDevelopmentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrTrainingDevelopmentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrTrainingDevelopmentMapBuilder');
}
