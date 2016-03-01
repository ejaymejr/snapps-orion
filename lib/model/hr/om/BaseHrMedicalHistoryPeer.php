<?php


abstract class BaseHrMedicalHistoryPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_medical_history';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrMedicalHistory';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_medical_history.ID';

	
	const HOSPITAL_CLINIC = 'hr_medical_history.HOSPITAL_CLINIC';

	
	const NAME_EXAMINEE = 'hr_medical_history.NAME_EXAMINEE';

	
	const SYMPTOMS = 'hr_medical_history.SYMPTOMS';

	
	const DIAGNOSIS = 'hr_medical_history.DIAGNOSIS';

	
	const DATE_EXAMINED = 'hr_medical_history.DATE_EXAMINED';

	
	const REMARKS = 'hr_medical_history.REMARKS';

	
	const CREATED_BY = 'hr_medical_history.CREATED_BY';

	
	const DATE_CREATED = 'hr_medical_history.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_medical_history.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_medical_history.DATE_MODIFIED';

	
	const HR_EMPLOYEE_ID = 'hr_medical_history.HR_EMPLOYEE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'HospitalClinic', 'NameExaminee', 'Symptoms', 'Diagnosis', 'DateExamined', 'Remarks', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeId', ),
		BasePeer::TYPE_COLNAME => array (HrMedicalHistoryPeer::ID, HrMedicalHistoryPeer::HOSPITAL_CLINIC, HrMedicalHistoryPeer::NAME_EXAMINEE, HrMedicalHistoryPeer::SYMPTOMS, HrMedicalHistoryPeer::DIAGNOSIS, HrMedicalHistoryPeer::DATE_EXAMINED, HrMedicalHistoryPeer::REMARKS, HrMedicalHistoryPeer::CREATED_BY, HrMedicalHistoryPeer::DATE_CREATED, HrMedicalHistoryPeer::MODIFIED_BY, HrMedicalHistoryPeer::DATE_MODIFIED, HrMedicalHistoryPeer::HR_EMPLOYEE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'hospital_clinic', 'name_examinee', 'symptoms', 'diagnosis', 'date_examined', 'remarks', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'HospitalClinic' => 1, 'NameExaminee' => 2, 'Symptoms' => 3, 'Diagnosis' => 4, 'DateExamined' => 5, 'Remarks' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, 'HrEmployeeId' => 11, ),
		BasePeer::TYPE_COLNAME => array (HrMedicalHistoryPeer::ID => 0, HrMedicalHistoryPeer::HOSPITAL_CLINIC => 1, HrMedicalHistoryPeer::NAME_EXAMINEE => 2, HrMedicalHistoryPeer::SYMPTOMS => 3, HrMedicalHistoryPeer::DIAGNOSIS => 4, HrMedicalHistoryPeer::DATE_EXAMINED => 5, HrMedicalHistoryPeer::REMARKS => 6, HrMedicalHistoryPeer::CREATED_BY => 7, HrMedicalHistoryPeer::DATE_CREATED => 8, HrMedicalHistoryPeer::MODIFIED_BY => 9, HrMedicalHistoryPeer::DATE_MODIFIED => 10, HrMedicalHistoryPeer::HR_EMPLOYEE_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'hospital_clinic' => 1, 'name_examinee' => 2, 'symptoms' => 3, 'diagnosis' => 4, 'date_examined' => 5, 'remarks' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, 'hr_employee_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrMedicalHistoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrMedicalHistoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrMedicalHistoryPeer::getTableMap();
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
		return str_replace(HrMedicalHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrMedicalHistoryPeer::ID);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::HOSPITAL_CLINIC);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::NAME_EXAMINEE);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::SYMPTOMS);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::DIAGNOSIS);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::DATE_EXAMINED);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::REMARKS);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::CREATED_BY);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrMedicalHistoryPeer::HR_EMPLOYEE_ID);

	}

	const COUNT = 'COUNT(hr_medical_history.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_medical_history.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrMedicalHistoryPeer::doSelectRS($criteria, $con);
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
		$objects = HrMedicalHistoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrMedicalHistoryPeer::populateObjects(HrMedicalHistoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrMedicalHistoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrMedicalHistoryPeer::getOMClass();
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
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrMedicalHistoryPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrMedicalHistoryPeer::doSelectRS($criteria, $con);
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

		HrMedicalHistoryPeer::addSelectColumns($c);
		$startcol = (HrMedicalHistoryPeer::NUM_COLUMNS - HrMedicalHistoryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		HrEmployeePeer::addSelectColumns($c);

		$c->addJoin(HrMedicalHistoryPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrMedicalHistoryPeer::getOMClass();

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
										$temp_obj2->addHrMedicalHistory($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initHrMedicalHistorys();
				$obj2->addHrMedicalHistory($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrMedicalHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(HrMedicalHistoryPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = HrMedicalHistoryPeer::doSelectRS($criteria, $con);
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

		HrMedicalHistoryPeer::addSelectColumns($c);
		$startcol2 = (HrMedicalHistoryPeer::NUM_COLUMNS - HrMedicalHistoryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		HrEmployeePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + HrEmployeePeer::NUM_COLUMNS;

		$c->addJoin(HrMedicalHistoryPeer::HR_EMPLOYEE_ID, HrEmployeePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = HrMedicalHistoryPeer::getOMClass();


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
					$temp_obj2->addHrMedicalHistory($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initHrMedicalHistorys();
				$obj2->addHrMedicalHistory($obj1);
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
		return HrMedicalHistoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrMedicalHistoryPeer::ID); 

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
			$comparison = $criteria->getComparison(HrMedicalHistoryPeer::ID);
			$selectCriteria->add(HrMedicalHistoryPeer::ID, $criteria->remove(HrMedicalHistoryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrMedicalHistoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrMedicalHistoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrMedicalHistory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrMedicalHistoryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrMedicalHistory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrMedicalHistoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrMedicalHistoryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrMedicalHistoryPeer::DATABASE_NAME, HrMedicalHistoryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrMedicalHistoryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrMedicalHistoryPeer::DATABASE_NAME);

		$criteria->add(HrMedicalHistoryPeer::ID, $pk);


		$v = HrMedicalHistoryPeer::doSelect($criteria, $con);

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
			$criteria->add(HrMedicalHistoryPeer::ID, $pks, Criteria::IN);
			$objs = HrMedicalHistoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrMedicalHistoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrMedicalHistoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrMedicalHistoryMapBuilder');
}
