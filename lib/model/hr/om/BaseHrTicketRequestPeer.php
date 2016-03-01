<?php


abstract class BaseHrTicketRequestPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_ticket_request';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrTicketRequest';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_ticket_request.ID';

	
	const EMPLOYEE_NO = 'hr_ticket_request.EMPLOYEE_NO';

	
	const NAME = 'hr_ticket_request.NAME';

	
	const DATE_REQUESTED = 'hr_ticket_request.DATE_REQUESTED';

	
	const DATE_EFFECTIVE = 'hr_ticket_request.DATE_EFFECTIVE';

	
	const REMARKS = 'hr_ticket_request.REMARKS';

	
	const REQUEST_TYPE = 'hr_ticket_request.REQUEST_TYPE';

	
	const CREATED_BY = 'hr_ticket_request.CREATED_BY';

	
	const DATE_CREATED = 'hr_ticket_request.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_ticket_request.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_ticket_request.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'DateRequested', 'DateEffective', 'Remarks', 'RequestType', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrTicketRequestPeer::ID, HrTicketRequestPeer::EMPLOYEE_NO, HrTicketRequestPeer::NAME, HrTicketRequestPeer::DATE_REQUESTED, HrTicketRequestPeer::DATE_EFFECTIVE, HrTicketRequestPeer::REMARKS, HrTicketRequestPeer::REQUEST_TYPE, HrTicketRequestPeer::CREATED_BY, HrTicketRequestPeer::DATE_CREATED, HrTicketRequestPeer::MODIFIED_BY, HrTicketRequestPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'date_requested', 'date_effective', 'remarks', 'request_type', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'DateRequested' => 3, 'DateEffective' => 4, 'Remarks' => 5, 'RequestType' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (HrTicketRequestPeer::ID => 0, HrTicketRequestPeer::EMPLOYEE_NO => 1, HrTicketRequestPeer::NAME => 2, HrTicketRequestPeer::DATE_REQUESTED => 3, HrTicketRequestPeer::DATE_EFFECTIVE => 4, HrTicketRequestPeer::REMARKS => 5, HrTicketRequestPeer::REQUEST_TYPE => 6, HrTicketRequestPeer::CREATED_BY => 7, HrTicketRequestPeer::DATE_CREATED => 8, HrTicketRequestPeer::MODIFIED_BY => 9, HrTicketRequestPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'date_requested' => 3, 'date_effective' => 4, 'remarks' => 5, 'request_type' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrTicketRequestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrTicketRequestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrTicketRequestPeer::getTableMap();
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
		return str_replace(HrTicketRequestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrTicketRequestPeer::ID);

		$criteria->addSelectColumn(HrTicketRequestPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrTicketRequestPeer::NAME);

		$criteria->addSelectColumn(HrTicketRequestPeer::DATE_REQUESTED);

		$criteria->addSelectColumn(HrTicketRequestPeer::DATE_EFFECTIVE);

		$criteria->addSelectColumn(HrTicketRequestPeer::REMARKS);

		$criteria->addSelectColumn(HrTicketRequestPeer::REQUEST_TYPE);

		$criteria->addSelectColumn(HrTicketRequestPeer::CREATED_BY);

		$criteria->addSelectColumn(HrTicketRequestPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrTicketRequestPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrTicketRequestPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_ticket_request.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_ticket_request.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrTicketRequestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrTicketRequestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrTicketRequestPeer::doSelectRS($criteria, $con);
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
		$objects = HrTicketRequestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrTicketRequestPeer::populateObjects(HrTicketRequestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrTicketRequestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrTicketRequestPeer::getOMClass();
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
		return HrTicketRequestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrTicketRequestPeer::ID); 

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
			$comparison = $criteria->getComparison(HrTicketRequestPeer::ID);
			$selectCriteria->add(HrTicketRequestPeer::ID, $criteria->remove(HrTicketRequestPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrTicketRequestPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrTicketRequestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrTicketRequest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrTicketRequestPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrTicketRequest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrTicketRequestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrTicketRequestPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrTicketRequestPeer::DATABASE_NAME, HrTicketRequestPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrTicketRequestPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrTicketRequestPeer::DATABASE_NAME);

		$criteria->add(HrTicketRequestPeer::ID, $pk);


		$v = HrTicketRequestPeer::doSelect($criteria, $con);

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
			$criteria->add(HrTicketRequestPeer::ID, $pks, Criteria::IN);
			$objs = HrTicketRequestPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrTicketRequestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrTicketRequestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrTicketRequestMapBuilder');
}
