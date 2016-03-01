<?php


abstract class BaseHrAwardsRecognitionPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_awards_recognition';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrAwardsRecognition';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_awards_recognition.ID';

	
	const RECOGNITION_DESC = 'hr_awards_recognition.RECOGNITION_DESC';

	
	const PLACE_GIVEN = 'hr_awards_recognition.PLACE_GIVEN';

	
	const DATE_GIVEN = 'hr_awards_recognition.DATE_GIVEN';

	
	const REMARKS = 'hr_awards_recognition.REMARKS';

	
	const CREATED_BY = 'hr_awards_recognition.CREATED_BY';

	
	const DATE_CREATED = 'hr_awards_recognition.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_awards_recognition.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_awards_recognition.DATE_MODIFIED';

	
	const HR_EMPLOYEE_ID = 'hr_awards_recognition.HR_EMPLOYEE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'RecognitionDesc', 'PlaceGiven', 'DateGiven', 'Remarks', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeId', ),
		BasePeer::TYPE_COLNAME => array (HrAwardsRecognitionPeer::ID, HrAwardsRecognitionPeer::RECOGNITION_DESC, HrAwardsRecognitionPeer::PLACE_GIVEN, HrAwardsRecognitionPeer::DATE_GIVEN, HrAwardsRecognitionPeer::REMARKS, HrAwardsRecognitionPeer::CREATED_BY, HrAwardsRecognitionPeer::DATE_CREATED, HrAwardsRecognitionPeer::MODIFIED_BY, HrAwardsRecognitionPeer::DATE_MODIFIED, HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'recognition_desc', 'place_given', 'date_given', 'remarks', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'RecognitionDesc' => 1, 'PlaceGiven' => 2, 'DateGiven' => 3, 'Remarks' => 4, 'CreatedBy' => 5, 'DateCreated' => 6, 'ModifiedBy' => 7, 'DateModified' => 8, 'HrEmployeeId' => 9, ),
		BasePeer::TYPE_COLNAME => array (HrAwardsRecognitionPeer::ID => 0, HrAwardsRecognitionPeer::RECOGNITION_DESC => 1, HrAwardsRecognitionPeer::PLACE_GIVEN => 2, HrAwardsRecognitionPeer::DATE_GIVEN => 3, HrAwardsRecognitionPeer::REMARKS => 4, HrAwardsRecognitionPeer::CREATED_BY => 5, HrAwardsRecognitionPeer::DATE_CREATED => 6, HrAwardsRecognitionPeer::MODIFIED_BY => 7, HrAwardsRecognitionPeer::DATE_MODIFIED => 8, HrAwardsRecognitionPeer::HR_EMPLOYEE_ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'recognition_desc' => 1, 'place_given' => 2, 'date_given' => 3, 'remarks' => 4, 'created_by' => 5, 'date_created' => 6, 'modified_by' => 7, 'date_modified' => 8, 'hr_employee_id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrAwardsRecognitionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrAwardsRecognitionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrAwardsRecognitionPeer::getTableMap();
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
		return str_replace(HrAwardsRecognitionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::ID);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::RECOGNITION_DESC);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::PLACE_GIVEN);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::DATE_GIVEN);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::REMARKS);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::CREATED_BY);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID);

	}

	const COUNT = 'COUNT(hr_awards_recognition.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_awards_recognition.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrAwardsRecognitionPeer::doSelectRS($criteria, $con);
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
		$objects = HrAwardsRecognitionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrAwardsRecognitionPeer::populateObjects(HrAwardsRecognitionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrAwardsRecognitionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrAwardsRecognitionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinHrEmployee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrAwardsRecognitionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinHrEmployee(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HrAwardsRecognitionPeer::addSelectColumns($c);
		$startcol = (HrAwardsRecognitionPeer::NUM_COLUMNS - HrAwardsRecognitionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HrEmployeePeer::addSelectColumns($c);

		$c->addJoin(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrAwardsRecognitionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = HrEmployeePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getHrEmployee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHrAwardsRecognition($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHrAwardsRecognitions();
				$obj2->addHrAwardsRecognition($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrAwardsRecognitionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrAwardsRecognitionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HrAwardsRecognitionPeer::addSelectColumns($c);
		$startcol2 = (HrAwardsRecognitionPeer::NUM_COLUMNS - HrAwardsRecognitionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HrEmployeePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HrEmployeePeer::NUM_COLUMNS;

		$c->addJoin(HrAwardsRecognitionPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrAwardsRecognitionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = HrEmployeePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHrEmployee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHrAwardsRecognition($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHrAwardsRecognitions();
				$obj2->addHrAwardsRecognition($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return HrAwardsRecognitionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrAwardsRecognitionPeer::ID); 

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
			$comparison = $criteria->getComparison(HrAwardsRecognitionPeer::ID);
			$selectCriteria->add(HrAwardsRecognitionPeer::ID, $criteria->remove(HrAwardsRecognitionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrAwardsRecognitionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrAwardsRecognitionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrAwardsRecognition) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrAwardsRecognitionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrAwardsRecognition $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrAwardsRecognitionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrAwardsRecognitionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrAwardsRecognitionPeer::DATABASE_NAME, HrAwardsRecognitionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrAwardsRecognitionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrAwardsRecognitionPeer::DATABASE_NAME);

		$criteria->add(HrAwardsRecognitionPeer::ID, $pk);


		$v = HrAwardsRecognitionPeer::doSelect($criteria, $con);

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
			$criteria->add(HrAwardsRecognitionPeer::ID, $pks, Criteria::IN);
			$objs = HrAwardsRecognitionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrAwardsRecognitionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrAwardsRecognitionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrAwardsRecognitionMapBuilder');
}
