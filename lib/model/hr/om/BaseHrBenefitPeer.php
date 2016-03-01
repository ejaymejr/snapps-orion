<?php


abstract class BaseHrBenefitPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_benefit';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrBenefit';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_benefit.ID';

	
	const BENEFIT_CODE = 'hr_benefit.BENEFIT_CODE';

	
	const DESCRIPTION = 'hr_benefit.DESCRIPTION';

	
	const REMARKS = 'hr_benefit.REMARKS';

	
	const CREATED_BY = 'hr_benefit.CREATED_BY';

	
	const DATE_CREATED = 'hr_benefit.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_benefit.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_benefit.DATE_MODIFIED';

	
	const HR_EMPLOYEE_BENEFIT_ID = 'hr_benefit.HR_EMPLOYEE_BENEFIT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'BenefitCode', 'Description', 'Remarks', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeBenefitId', ),
		BasePeer::TYPE_COLNAME => array (HrBenefitPeer::ID, HrBenefitPeer::BENEFIT_CODE, HrBenefitPeer::DESCRIPTION, HrBenefitPeer::REMARKS, HrBenefitPeer::CREATED_BY, HrBenefitPeer::DATE_CREATED, HrBenefitPeer::MODIFIED_BY, HrBenefitPeer::DATE_MODIFIED, HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'benefit_code', 'description', 'remarks', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_benefit_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'BenefitCode' => 1, 'Description' => 2, 'Remarks' => 3, 'CreatedBy' => 4, 'DateCreated' => 5, 'ModifiedBy' => 6, 'DateModified' => 7, 'HrEmployeeBenefitId' => 8, ),
		BasePeer::TYPE_COLNAME => array (HrBenefitPeer::ID => 0, HrBenefitPeer::BENEFIT_CODE => 1, HrBenefitPeer::DESCRIPTION => 2, HrBenefitPeer::REMARKS => 3, HrBenefitPeer::CREATED_BY => 4, HrBenefitPeer::DATE_CREATED => 5, HrBenefitPeer::MODIFIED_BY => 6, HrBenefitPeer::DATE_MODIFIED => 7, HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'benefit_code' => 1, 'description' => 2, 'remarks' => 3, 'created_by' => 4, 'date_created' => 5, 'modified_by' => 6, 'date_modified' => 7, 'hr_employee_benefit_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrBenefitMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrBenefitMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrBenefitPeer::getTableMap();
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
		return str_replace(HrBenefitPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrBenefitPeer::ID);

		$criteria->addSelectColumn(HrBenefitPeer::BENEFIT_CODE);

		$criteria->addSelectColumn(HrBenefitPeer::DESCRIPTION);

		$criteria->addSelectColumn(HrBenefitPeer::REMARKS);

		$criteria->addSelectColumn(HrBenefitPeer::CREATED_BY);

		$criteria->addSelectColumn(HrBenefitPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrBenefitPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrBenefitPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID);

	}

	const COUNT = 'COUNT(hr_benefit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_benefit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrBenefitPeer::doSelectRS($criteria, $con);
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
		$objects = HrBenefitPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrBenefitPeer::populateObjects(HrBenefitPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrBenefitPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrBenefitPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinHrEmployeeBenefit(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, HrEmployeeBenefitPeer::ID);

		$rs = HrBenefitPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinHrEmployeeBenefit(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		HrBenefitPeer::addSelectColumns($c);
		$startcol = (HrBenefitPeer::NUM_COLUMNS - HrBenefitPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HrEmployeeBenefitPeer::addSelectColumns($c);

		$c->addJoin(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, HrEmployeeBenefitPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrBenefitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = HrEmployeeBenefitPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getHrEmployeeBenefit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addHrBenefit($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHrBenefits();
				$obj2->addHrBenefit($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrBenefitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, HrEmployeeBenefitPeer::ID);

		$rs = HrBenefitPeer::doSelectRS($criteria, $con);
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

		HrBenefitPeer::addSelectColumns($c);
		$startcol2 = (HrBenefitPeer::NUM_COLUMNS - HrBenefitPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HrEmployeeBenefitPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HrEmployeeBenefitPeer::NUM_COLUMNS;

		$c->addJoin(HrBenefitPeer::HR_EMPLOYEE_BENEFIT_ID, HrEmployeeBenefitPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrBenefitPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = HrEmployeeBenefitPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getHrEmployeeBenefit(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addHrBenefit($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHrBenefits();
				$obj2->addHrBenefit($obj1);
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
		return HrBenefitPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrBenefitPeer::ID); 

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
			$comparison = $criteria->getComparison(HrBenefitPeer::ID);
			$selectCriteria->add(HrBenefitPeer::ID, $criteria->remove(HrBenefitPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrBenefitPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrBenefitPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrBenefit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrBenefitPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrBenefit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrBenefitPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrBenefitPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrBenefitPeer::DATABASE_NAME, HrBenefitPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrBenefitPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrBenefitPeer::DATABASE_NAME);

		$criteria->add(HrBenefitPeer::ID, $pk);


		$v = HrBenefitPeer::doSelect($criteria, $con);

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
			$criteria->add(HrBenefitPeer::ID, $pks, Criteria::IN);
			$objs = HrBenefitPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrBenefitPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrBenefitMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrBenefitMapBuilder');
}
