<?php


abstract class BaseHrHiringPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_hiring';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrHiring';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_hiring.ID';

	
	const NAME = 'hr_hiring.NAME';

	
	const CONTACT = 'hr_hiring.CONTACT';

	
	const NRIC_FIN = 'hr_hiring.NRIC_FIN';

	
	const DATE_OF_EMPLOYMENT = 'hr_hiring.DATE_OF_EMPLOYMENT';

	
	const PLACE_OF_WORK = 'hr_hiring.PLACE_OF_WORK';

	
	const JOB_TITLE = 'hr_hiring.JOB_TITLE';

	
	const SALARY = 'hr_hiring.SALARY';

	
	const WORKING_DAYS = 'hr_hiring.WORKING_DAYS';

	
	const OTHER_CONDITION = 'hr_hiring.OTHER_CONDITION';

	
	const CREATED_BY = 'hr_hiring.CREATED_BY';

	
	const DATE_CREATED = 'hr_hiring.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_hiring.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_hiring.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Contact', 'NricFin', 'DateOfEmployment', 'PlaceOfWork', 'JobTitle', 'Salary', 'WorkingDays', 'OtherCondition', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrHiringPeer::ID, HrHiringPeer::NAME, HrHiringPeer::CONTACT, HrHiringPeer::NRIC_FIN, HrHiringPeer::DATE_OF_EMPLOYMENT, HrHiringPeer::PLACE_OF_WORK, HrHiringPeer::JOB_TITLE, HrHiringPeer::SALARY, HrHiringPeer::WORKING_DAYS, HrHiringPeer::OTHER_CONDITION, HrHiringPeer::CREATED_BY, HrHiringPeer::DATE_CREATED, HrHiringPeer::MODIFIED_BY, HrHiringPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'contact', 'nric_fin', 'date_of_employment', 'place_of_work', 'job_title', 'salary', 'working_days', 'other_condition', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Contact' => 2, 'NricFin' => 3, 'DateOfEmployment' => 4, 'PlaceOfWork' => 5, 'JobTitle' => 6, 'Salary' => 7, 'WorkingDays' => 8, 'OtherCondition' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (HrHiringPeer::ID => 0, HrHiringPeer::NAME => 1, HrHiringPeer::CONTACT => 2, HrHiringPeer::NRIC_FIN => 3, HrHiringPeer::DATE_OF_EMPLOYMENT => 4, HrHiringPeer::PLACE_OF_WORK => 5, HrHiringPeer::JOB_TITLE => 6, HrHiringPeer::SALARY => 7, HrHiringPeer::WORKING_DAYS => 8, HrHiringPeer::OTHER_CONDITION => 9, HrHiringPeer::CREATED_BY => 10, HrHiringPeer::DATE_CREATED => 11, HrHiringPeer::MODIFIED_BY => 12, HrHiringPeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'contact' => 2, 'nric_fin' => 3, 'date_of_employment' => 4, 'place_of_work' => 5, 'job_title' => 6, 'salary' => 7, 'working_days' => 8, 'other_condition' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrHiringMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrHiringMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrHiringPeer::getTableMap();
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
		return str_replace(HrHiringPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrHiringPeer::ID);

		$criteria->addSelectColumn(HrHiringPeer::NAME);

		$criteria->addSelectColumn(HrHiringPeer::CONTACT);

		$criteria->addSelectColumn(HrHiringPeer::NRIC_FIN);

		$criteria->addSelectColumn(HrHiringPeer::DATE_OF_EMPLOYMENT);

		$criteria->addSelectColumn(HrHiringPeer::PLACE_OF_WORK);

		$criteria->addSelectColumn(HrHiringPeer::JOB_TITLE);

		$criteria->addSelectColumn(HrHiringPeer::SALARY);

		$criteria->addSelectColumn(HrHiringPeer::WORKING_DAYS);

		$criteria->addSelectColumn(HrHiringPeer::OTHER_CONDITION);

		$criteria->addSelectColumn(HrHiringPeer::CREATED_BY);

		$criteria->addSelectColumn(HrHiringPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrHiringPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrHiringPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_hiring.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_hiring.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrHiringPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrHiringPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrHiringPeer::doSelectRS($criteria, $con);
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
		$objects = HrHiringPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrHiringPeer::populateObjects(HrHiringPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrHiringPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrHiringPeer::getOMClass();
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
		return HrHiringPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrHiringPeer::ID); 

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
			$comparison = $criteria->getComparison(HrHiringPeer::ID);
			$selectCriteria->add(HrHiringPeer::ID, $criteria->remove(HrHiringPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrHiringPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrHiringPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrHiring) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrHiringPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrHiring $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrHiringPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrHiringPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrHiringPeer::DATABASE_NAME, HrHiringPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrHiringPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrHiringPeer::DATABASE_NAME);

		$criteria->add(HrHiringPeer::ID, $pk);


		$v = HrHiringPeer::doSelect($criteria, $con);

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
			$criteria->add(HrHiringPeer::ID, $pks, Criteria::IN);
			$objs = HrHiringPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrHiringPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrHiringMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrHiringMapBuilder');
}
