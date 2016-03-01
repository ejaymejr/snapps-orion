<?php


abstract class BaseHrEmployeeDependantPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_dependant';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeDependant';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_dependant.ID';

	
	const DEP_NAME = 'hr_employee_dependant.DEP_NAME';

	
	const REMARKS = 'hr_employee_dependant.REMARKS';

	
	const DATE_OF_BIRTH = 'hr_employee_dependant.DATE_OF_BIRTH';

	
	const HR_EMPLOYEE_ID = 'hr_employee_dependant.HR_EMPLOYEE_ID';

	
	const CREATED_BY = 'hr_employee_dependant.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_dependant.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_dependant.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_dependant.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DepName', 'Remarks', 'DateOfBirth', 'HrEmployeeId', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDependantPeer::ID, HrEmployeeDependantPeer::DEP_NAME, HrEmployeeDependantPeer::REMARKS, HrEmployeeDependantPeer::DATE_OF_BIRTH, HrEmployeeDependantPeer::HR_EMPLOYEE_ID, HrEmployeeDependantPeer::CREATED_BY, HrEmployeeDependantPeer::DATE_CREATED, HrEmployeeDependantPeer::MODIFIED_BY, HrEmployeeDependantPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'dep_name', 'remarks', 'date_of_birth', 'hr_employee_id', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DepName' => 1, 'Remarks' => 2, 'DateOfBirth' => 3, 'HrEmployeeId' => 4, 'CreatedBy' => 5, 'DateCreated' => 6, 'ModifiedBy' => 7, 'DateModified' => 8, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDependantPeer::ID => 0, HrEmployeeDependantPeer::DEP_NAME => 1, HrEmployeeDependantPeer::REMARKS => 2, HrEmployeeDependantPeer::DATE_OF_BIRTH => 3, HrEmployeeDependantPeer::HR_EMPLOYEE_ID => 4, HrEmployeeDependantPeer::CREATED_BY => 5, HrEmployeeDependantPeer::DATE_CREATED => 6, HrEmployeeDependantPeer::MODIFIED_BY => 7, HrEmployeeDependantPeer::DATE_MODIFIED => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'dep_name' => 1, 'remarks' => 2, 'date_of_birth' => 3, 'hr_employee_id' => 4, 'created_by' => 5, 'date_created' => 6, 'modified_by' => 7, 'date_modified' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeDependantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeDependantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeDependantPeer::getTableMap();
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
		return str_replace(HrEmployeeDependantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeDependantPeer::ID);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::DEP_NAME);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::REMARKS);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::DATE_OF_BIRTH);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::HR_EMPLOYEE_ID);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeDependantPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_employee_dependant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_dependant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeDependantPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeDependantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeDependantPeer::populateObjects(HrEmployeeDependantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeDependantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeDependantPeer::getOMClass();
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
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrEmployeeDependantPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrEmployeeDependantPeer::doSelectRS($criteria, $con);
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

		HrEmployeeDependantPeer::addSelectColumns($c);
		$startcol = (HrEmployeeDependantPeer::NUM_COLUMNS - HrEmployeeDependantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HrEmployeePeer::addSelectColumns($c);

		$c->addJoin(HrEmployeeDependantPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrEmployeeDependantPeer::getOMClass();

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
										$temp_obj2->addHrEmployeeDependant($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHrEmployeeDependants();
				$obj2->addHrEmployeeDependant($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeDependantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrEmployeeDependantPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrEmployeeDependantPeer::doSelectRS($criteria, $con);
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

		HrEmployeeDependantPeer::addSelectColumns($c);
		$startcol2 = (HrEmployeeDependantPeer::NUM_COLUMNS - HrEmployeeDependantPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HrEmployeePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HrEmployeePeer::NUM_COLUMNS;

		$c->addJoin(HrEmployeeDependantPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrEmployeeDependantPeer::getOMClass();


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
					$temp_obj2->addHrEmployeeDependant($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHrEmployeeDependants();
				$obj2->addHrEmployeeDependant($obj1);
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
		return HrEmployeeDependantPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeDependantPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeDependantPeer::ID);
			$selectCriteria->add(HrEmployeeDependantPeer::ID, $criteria->remove(HrEmployeeDependantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeDependantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeDependantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeDependant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeDependantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeDependant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeDependantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeDependantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeDependantPeer::DATABASE_NAME, HrEmployeeDependantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeDependantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeDependantPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeDependantPeer::ID, $pk);


		$v = HrEmployeeDependantPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeDependantPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeDependantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeDependantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeDependantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeDependantMapBuilder');
}
