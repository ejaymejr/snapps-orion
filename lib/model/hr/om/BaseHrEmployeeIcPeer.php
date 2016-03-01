<?php


abstract class BaseHrEmployeeIcPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_ic';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeIc';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_ic.ID';

	
	const EMPLOYEE_NO = 'hr_employee_ic.EMPLOYEE_NO';

	
	const NAME = 'hr_employee_ic.NAME';

	
	const SECTOR = 'hr_employee_ic.SECTOR';

	
	const OCCUPATION = 'hr_employee_ic.OCCUPATION';

	
	const PASS_TYPE = 'hr_employee_ic.PASS_TYPE';

	
	const PASS_NO = 'hr_employee_ic.PASS_NO';

	
	const DATE_OF_APPLICATION = 'hr_employee_ic.DATE_OF_APPLICATION';

	
	const DATE_OF_ISSUE = 'hr_employee_ic.DATE_OF_ISSUE';

	
	const DATE_OF_EXPIRY = 'hr_employee_ic.DATE_OF_EXPIRY';

	
	const CREATED_BY = 'hr_employee_ic.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_ic.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_ic.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_ic.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Sector', 'Occupation', 'PassType', 'PassNo', 'DateOfApplication', 'DateOfIssue', 'DateOfExpiry', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeIcPeer::ID, HrEmployeeIcPeer::EMPLOYEE_NO, HrEmployeeIcPeer::NAME, HrEmployeeIcPeer::SECTOR, HrEmployeeIcPeer::OCCUPATION, HrEmployeeIcPeer::PASS_TYPE, HrEmployeeIcPeer::PASS_NO, HrEmployeeIcPeer::DATE_OF_APPLICATION, HrEmployeeIcPeer::DATE_OF_ISSUE, HrEmployeeIcPeer::DATE_OF_EXPIRY, HrEmployeeIcPeer::CREATED_BY, HrEmployeeIcPeer::DATE_CREATED, HrEmployeeIcPeer::MODIFIED_BY, HrEmployeeIcPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'sector', 'occupation', 'pass_type', 'pass_no', 'date_of_application', 'date_of_issue', 'date_of_expiry', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Sector' => 3, 'Occupation' => 4, 'PassType' => 5, 'PassNo' => 6, 'DateOfApplication' => 7, 'DateOfIssue' => 8, 'DateOfExpiry' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeIcPeer::ID => 0, HrEmployeeIcPeer::EMPLOYEE_NO => 1, HrEmployeeIcPeer::NAME => 2, HrEmployeeIcPeer::SECTOR => 3, HrEmployeeIcPeer::OCCUPATION => 4, HrEmployeeIcPeer::PASS_TYPE => 5, HrEmployeeIcPeer::PASS_NO => 6, HrEmployeeIcPeer::DATE_OF_APPLICATION => 7, HrEmployeeIcPeer::DATE_OF_ISSUE => 8, HrEmployeeIcPeer::DATE_OF_EXPIRY => 9, HrEmployeeIcPeer::CREATED_BY => 10, HrEmployeeIcPeer::DATE_CREATED => 11, HrEmployeeIcPeer::MODIFIED_BY => 12, HrEmployeeIcPeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'sector' => 3, 'occupation' => 4, 'pass_type' => 5, 'pass_no' => 6, 'date_of_application' => 7, 'date_of_issue' => 8, 'date_of_expiry' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeIcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeIcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeIcPeer::getTableMap();
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
		return str_replace(HrEmployeeIcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeIcPeer::ID);

		$criteria->addSelectColumn(HrEmployeeIcPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrEmployeeIcPeer::NAME);

		$criteria->addSelectColumn(HrEmployeeIcPeer::SECTOR);

		$criteria->addSelectColumn(HrEmployeeIcPeer::OCCUPATION);

		$criteria->addSelectColumn(HrEmployeeIcPeer::PASS_TYPE);

		$criteria->addSelectColumn(HrEmployeeIcPeer::PASS_NO);

		$criteria->addSelectColumn(HrEmployeeIcPeer::DATE_OF_APPLICATION);

		$criteria->addSelectColumn(HrEmployeeIcPeer::DATE_OF_ISSUE);

		$criteria->addSelectColumn(HrEmployeeIcPeer::DATE_OF_EXPIRY);

		$criteria->addSelectColumn(HrEmployeeIcPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeIcPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeIcPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeIcPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_employee_ic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_ic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeIcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeIcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeIcPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeIcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeIcPeer::populateObjects(HrEmployeeIcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeIcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeIcPeer::getOMClass();
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
		return HrEmployeeIcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeIcPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeIcPeer::ID);
			$selectCriteria->add(HrEmployeeIcPeer::ID, $criteria->remove(HrEmployeeIcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeIcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeIcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeIc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeIcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeIc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeIcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeIcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeIcPeer::DATABASE_NAME, HrEmployeeIcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeIcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeIcPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeIcPeer::ID, $pk);


		$v = HrEmployeeIcPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeIcPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeIcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeIcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeIcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeIcMapBuilder');
}
