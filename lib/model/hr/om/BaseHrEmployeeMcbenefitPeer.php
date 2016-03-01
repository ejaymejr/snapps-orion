<?php


abstract class BaseHrEmployeeMcbenefitPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_mcbenefit';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeMcbenefit';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_mcbenefit.ID';

	
	const EMPLOYEE_NO = 'hr_employee_mcbenefit.EMPLOYEE_NO';

	
	const NAME = 'hr_employee_mcbenefit.NAME';

	
	const MONTHLY = 'hr_employee_mcbenefit.MONTHLY';

	
	const MID_YEAR = 'hr_employee_mcbenefit.MID_YEAR';

	
	const IS_ACTIVE = 'hr_employee_mcbenefit.IS_ACTIVE';

	
	const CREATED_BY = 'hr_employee_mcbenefit.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_mcbenefit.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_mcbenefit.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_mcbenefit.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Monthly', 'MidYear', 'IsActive', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeMcbenefitPeer::ID, HrEmployeeMcbenefitPeer::EMPLOYEE_NO, HrEmployeeMcbenefitPeer::NAME, HrEmployeeMcbenefitPeer::MONTHLY, HrEmployeeMcbenefitPeer::MID_YEAR, HrEmployeeMcbenefitPeer::IS_ACTIVE, HrEmployeeMcbenefitPeer::CREATED_BY, HrEmployeeMcbenefitPeer::DATE_CREATED, HrEmployeeMcbenefitPeer::MODIFIED_BY, HrEmployeeMcbenefitPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'monthly', 'mid_year', 'is_active', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Monthly' => 3, 'MidYear' => 4, 'IsActive' => 5, 'CreatedBy' => 6, 'DateCreated' => 7, 'ModifiedBy' => 8, 'DateModified' => 9, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeMcbenefitPeer::ID => 0, HrEmployeeMcbenefitPeer::EMPLOYEE_NO => 1, HrEmployeeMcbenefitPeer::NAME => 2, HrEmployeeMcbenefitPeer::MONTHLY => 3, HrEmployeeMcbenefitPeer::MID_YEAR => 4, HrEmployeeMcbenefitPeer::IS_ACTIVE => 5, HrEmployeeMcbenefitPeer::CREATED_BY => 6, HrEmployeeMcbenefitPeer::DATE_CREATED => 7, HrEmployeeMcbenefitPeer::MODIFIED_BY => 8, HrEmployeeMcbenefitPeer::DATE_MODIFIED => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'monthly' => 3, 'mid_year' => 4, 'is_active' => 5, 'created_by' => 6, 'date_created' => 7, 'modified_by' => 8, 'date_modified' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeMcbenefitMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeMcbenefitMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeMcbenefitPeer::getTableMap();
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
		return str_replace(HrEmployeeMcbenefitPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::ID);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::NAME);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::MONTHLY);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::MID_YEAR);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::IS_ACTIVE);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_employee_mcbenefit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_mcbenefit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeMcbenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeMcbenefitPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeMcbenefitPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeMcbenefitPeer::populateObjects(HrEmployeeMcbenefitPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeMcbenefitPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeMcbenefitPeer::getOMClass();
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
		return HrEmployeeMcbenefitPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeMcbenefitPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeMcbenefitPeer::ID);
			$selectCriteria->add(HrEmployeeMcbenefitPeer::ID, $criteria->remove(HrEmployeeMcbenefitPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeMcbenefitPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeMcbenefitPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeMcbenefit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeMcbenefitPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeMcbenefit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeMcbenefitPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeMcbenefitPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeMcbenefitPeer::DATABASE_NAME, HrEmployeeMcbenefitPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeMcbenefitPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeMcbenefitPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeMcbenefitPeer::ID, $pk);


		$v = HrEmployeeMcbenefitPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeMcbenefitPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeMcbenefitPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeMcbenefitPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeMcbenefitMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeMcbenefitMapBuilder');
}
