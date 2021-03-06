<?php


abstract class BaseHrEmployeeLeaveSignaturePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_leave_signature';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeLeaveSignature';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_leave_signature.ID';

	
	const APPROVAL = 'hr_employee_leave_signature.APPROVAL';

	
	const VERIFIED = 'hr_employee_leave_signature.VERIFIED';

	
	const HR_EMPLOYEE_LEAVE_ID = 'hr_employee_leave_signature.HR_EMPLOYEE_LEAVE_ID';

	
	const DATE_CREATED = 'hr_employee_leave_signature.DATE_CREATED';

	
	const CREATED_BY = 'hr_employee_leave_signature.CREATED_BY';

	
	const MODIFIED_BY = 'hr_employee_leave_signature.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_leave_signature.DATE_MODIFIED';

	
	const DATE_APPROVED = 'hr_employee_leave_signature.DATE_APPROVED';

	
	const DATE_VERIFIED = 'hr_employee_leave_signature.DATE_VERIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Approval', 'Verified', 'HrEmployeeLeaveId', 'DateCreated', 'CreatedBy', 'ModifiedBy', 'DateModified', 'DateApproved', 'DateVerified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeLeaveSignaturePeer::ID, HrEmployeeLeaveSignaturePeer::APPROVAL, HrEmployeeLeaveSignaturePeer::VERIFIED, HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID, HrEmployeeLeaveSignaturePeer::DATE_CREATED, HrEmployeeLeaveSignaturePeer::CREATED_BY, HrEmployeeLeaveSignaturePeer::MODIFIED_BY, HrEmployeeLeaveSignaturePeer::DATE_MODIFIED, HrEmployeeLeaveSignaturePeer::DATE_APPROVED, HrEmployeeLeaveSignaturePeer::DATE_VERIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'approval', 'verified', 'hr_employee_leave_id', 'date_created', 'created_by', 'modified_by', 'date_modified', 'date_approved', 'date_verified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Approval' => 1, 'Verified' => 2, 'HrEmployeeLeaveId' => 3, 'DateCreated' => 4, 'CreatedBy' => 5, 'ModifiedBy' => 6, 'DateModified' => 7, 'DateApproved' => 8, 'DateVerified' => 9, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeLeaveSignaturePeer::ID => 0, HrEmployeeLeaveSignaturePeer::APPROVAL => 1, HrEmployeeLeaveSignaturePeer::VERIFIED => 2, HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID => 3, HrEmployeeLeaveSignaturePeer::DATE_CREATED => 4, HrEmployeeLeaveSignaturePeer::CREATED_BY => 5, HrEmployeeLeaveSignaturePeer::MODIFIED_BY => 6, HrEmployeeLeaveSignaturePeer::DATE_MODIFIED => 7, HrEmployeeLeaveSignaturePeer::DATE_APPROVED => 8, HrEmployeeLeaveSignaturePeer::DATE_VERIFIED => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'approval' => 1, 'verified' => 2, 'hr_employee_leave_id' => 3, 'date_created' => 4, 'created_by' => 5, 'modified_by' => 6, 'date_modified' => 7, 'date_approved' => 8, 'date_verified' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeLeaveSignatureMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeLeaveSignatureMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeLeaveSignaturePeer::getTableMap();
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
		return str_replace(HrEmployeeLeaveSignaturePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::ID);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::APPROVAL);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::VERIFIED);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::DATE_APPROVED);

		$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::DATE_VERIFIED);

	}

	const COUNT = 'COUNT(hr_employee_leave_signature.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_leave_signature.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeLeaveSignaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeLeaveSignaturePeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeLeaveSignaturePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeLeaveSignaturePeer::populateObjects(HrEmployeeLeaveSignaturePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeLeaveSignaturePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeLeaveSignaturePeer::getOMClass();
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
		return HrEmployeeLeaveSignaturePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeLeaveSignaturePeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeLeaveSignaturePeer::ID);
			$selectCriteria->add(HrEmployeeLeaveSignaturePeer::ID, $criteria->remove(HrEmployeeLeaveSignaturePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeLeaveSignaturePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeLeaveSignature) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeLeaveSignaturePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeLeaveSignature $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeLeaveSignaturePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeLeaveSignaturePeer::DATABASE_NAME, HrEmployeeLeaveSignaturePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeLeaveSignaturePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);

		$criteria->add(HrEmployeeLeaveSignaturePeer::ID, $pk);


		$v = HrEmployeeLeaveSignaturePeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeLeaveSignaturePeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeLeaveSignaturePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeLeaveSignaturePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeLeaveSignatureMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeLeaveSignatureMapBuilder');
}
