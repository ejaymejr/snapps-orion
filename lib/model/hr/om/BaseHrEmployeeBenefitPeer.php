<?php


abstract class BaseHrEmployeeBenefitPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_benefit';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeBenefit';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_benefit.ID';

	
	const BENEFIT_CODE = 'hr_employee_benefit.BENEFIT_CODE';

	
	const DATE_START = 'hr_employee_benefit.DATE_START';

	
	const DATE_END = 'hr_employee_benefit.DATE_END';

	
	const AMOUNT = 'hr_employee_benefit.AMOUNT';

	
	const REMARKS = 'hr_employee_benefit.REMARKS';

	
	const IS_ACTIVE = 'hr_employee_benefit.IS_ACTIVE';

	
	const CREATED_BY = 'hr_employee_benefit.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_benefit.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_benefit.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_benefit.DATE_MODIFIED';

	
	const HR_EMPLOYEE_ID = 'hr_employee_benefit.HR_EMPLOYEE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'BenefitCode', 'DateStart', 'DateEnd', 'Amount', 'Remarks', 'IsActive', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeId', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeBenefitPeer::ID, HrEmployeeBenefitPeer::BENEFIT_CODE, HrEmployeeBenefitPeer::DATE_START, HrEmployeeBenefitPeer::DATE_END, HrEmployeeBenefitPeer::AMOUNT, HrEmployeeBenefitPeer::REMARKS, HrEmployeeBenefitPeer::IS_ACTIVE, HrEmployeeBenefitPeer::CREATED_BY, HrEmployeeBenefitPeer::DATE_CREATED, HrEmployeeBenefitPeer::MODIFIED_BY, HrEmployeeBenefitPeer::DATE_MODIFIED, HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'benefit_code', 'date_start', 'date_end', 'amount', 'remarks', 'is_active', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'BenefitCode' => 1, 'DateStart' => 2, 'DateEnd' => 3, 'Amount' => 4, 'Remarks' => 5, 'IsActive' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, 'HrEmployeeId' => 11, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeBenefitPeer::ID => 0, HrEmployeeBenefitPeer::BENEFIT_CODE => 1, HrEmployeeBenefitPeer::DATE_START => 2, HrEmployeeBenefitPeer::DATE_END => 3, HrEmployeeBenefitPeer::AMOUNT => 4, HrEmployeeBenefitPeer::REMARKS => 5, HrEmployeeBenefitPeer::IS_ACTIVE => 6, HrEmployeeBenefitPeer::CREATED_BY => 7, HrEmployeeBenefitPeer::DATE_CREATED => 8, HrEmployeeBenefitPeer::MODIFIED_BY => 9, HrEmployeeBenefitPeer::DATE_MODIFIED => 10, HrEmployeeBenefitPeer::HR_EMPLOYEE_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'benefit_code' => 1, 'date_start' => 2, 'date_end' => 3, 'amount' => 4, 'remarks' => 5, 'is_active' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, 'hr_employee_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeBenefitMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeBenefitMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeBenefitPeer::getTableMap();
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
		return str_replace(HrEmployeeBenefitPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::ID);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::BENEFIT_CODE);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::DATE_START);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::DATE_END);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::AMOUNT);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::REMARKS);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::IS_ACTIVE);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID);

	}

	const COUNT = 'COUNT(hr_employee_benefit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_benefit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeBenefitPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeBenefitPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeBenefitPeer::populateObjects(HrEmployeeBenefitPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeBenefitPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeBenefitPeer::getOMClass();
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
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrEmployeeBenefitPeer::doSelectRS($criteria, $con);
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

		HrEmployeeBenefitPeer::addSelectColumns($c);
		$startcol = (HrEmployeeBenefitPeer::NUM_COLUMNS - HrEmployeeBenefitPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HrEmployeePeer::addSelectColumns($c);

		$c->addJoin(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrEmployeeBenefitPeer::getOMClass();

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
										$temp_obj2->addHrEmployeeBenefit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHrEmployeeBenefits();
				$obj2->addHrEmployeeBenefit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrEmployeeBenefitPeer::doSelectRS($criteria, $con);
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

		HrEmployeeBenefitPeer::addSelectColumns($c);
		$startcol2 = (HrEmployeeBenefitPeer::NUM_COLUMNS - HrEmployeeBenefitPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HrEmployeePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HrEmployeePeer::NUM_COLUMNS;

		$c->addJoin(HrEmployeeBenefitPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrEmployeeBenefitPeer::getOMClass();


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
					$temp_obj2->addHrEmployeeBenefit($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHrEmployeeBenefits();
				$obj2->addHrEmployeeBenefit($obj1);
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
		return HrEmployeeBenefitPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeBenefitPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeBenefitPeer::ID);
			$selectCriteria->add(HrEmployeeBenefitPeer::ID, $criteria->remove(HrEmployeeBenefitPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeBenefitPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeBenefitPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeBenefit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeBenefitPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeBenefit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeBenefitPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeBenefitPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeBenefitPeer::DATABASE_NAME, HrEmployeeBenefitPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeBenefitPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeBenefitPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeBenefitPeer::ID, $pk);


		$v = HrEmployeeBenefitPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeBenefitPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeBenefitPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeBenefitPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeBenefitMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeBenefitMapBuilder');
}
