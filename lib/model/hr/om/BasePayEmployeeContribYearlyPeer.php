<?php


abstract class BasePayEmployeeContribYearlyPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_contrib_yearly';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeContribYearly';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_contrib_yearly.ID';

	
	const EMPLOYEE_NO = 'pay_employee_contrib_yearly.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_contrib_yearly.NAME';

	
	const COMPANY = 'pay_employee_contrib_yearly.COMPANY';

	
	const DEPARTMENT = 'pay_employee_contrib_yearly.DEPARTMENT';

	
	const PERIOD_CODE = 'pay_employee_contrib_yearly.PERIOD_CODE';

	
	const SUBCON = 'pay_employee_contrib_yearly.SUBCON';

	
	const WAGE = 'pay_employee_contrib_yearly.WAGE';

	
	const EM_SHARE = 'pay_employee_contrib_yearly.EM_SHARE';

	
	const ER_SHARE = 'pay_employee_contrib_yearly.ER_SHARE';

	
	const CDAC = 'pay_employee_contrib_yearly.CDAC';

	
	const SINDA = 'pay_employee_contrib_yearly.SINDA';

	
	const MBMF = 'pay_employee_contrib_yearly.MBMF';

	
	const SDL = 'pay_employee_contrib_yearly.SDL';

	
	const DATE_MODIFIED = 'pay_employee_contrib_yearly.DATE_MODIFIED';

	
	const MODIFIED_BY = 'pay_employee_contrib_yearly.MODIFIED_BY';

	
	const DATE_CREATED = 'pay_employee_contrib_yearly.DATE_CREATED';

	
	const CREATED_BY = 'pay_employee_contrib_yearly.CREATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Company', 'Department', 'PeriodCode', 'Subcon', 'Wage', 'EmShare', 'ErShare', 'Cdac', 'Sinda', 'Mbmf', 'Sdl', 'DateModified', 'ModifiedBy', 'DateCreated', 'CreatedBy', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeContribYearlyPeer::ID, PayEmployeeContribYearlyPeer::EMPLOYEE_NO, PayEmployeeContribYearlyPeer::NAME, PayEmployeeContribYearlyPeer::COMPANY, PayEmployeeContribYearlyPeer::DEPARTMENT, PayEmployeeContribYearlyPeer::PERIOD_CODE, PayEmployeeContribYearlyPeer::SUBCON, PayEmployeeContribYearlyPeer::WAGE, PayEmployeeContribYearlyPeer::EM_SHARE, PayEmployeeContribYearlyPeer::ER_SHARE, PayEmployeeContribYearlyPeer::CDAC, PayEmployeeContribYearlyPeer::SINDA, PayEmployeeContribYearlyPeer::MBMF, PayEmployeeContribYearlyPeer::SDL, PayEmployeeContribYearlyPeer::DATE_MODIFIED, PayEmployeeContribYearlyPeer::MODIFIED_BY, PayEmployeeContribYearlyPeer::DATE_CREATED, PayEmployeeContribYearlyPeer::CREATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'company', 'department', 'period_code', 'subcon', 'wage', 'em_share', 'er_share', 'cdac', 'sinda', 'mbmf', 'sdl', 'date_modified', 'modified_by', 'date_created', 'created_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Company' => 3, 'Department' => 4, 'PeriodCode' => 5, 'Subcon' => 6, 'Wage' => 7, 'EmShare' => 8, 'ErShare' => 9, 'Cdac' => 10, 'Sinda' => 11, 'Mbmf' => 12, 'Sdl' => 13, 'DateModified' => 14, 'ModifiedBy' => 15, 'DateCreated' => 16, 'CreatedBy' => 17, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeContribYearlyPeer::ID => 0, PayEmployeeContribYearlyPeer::EMPLOYEE_NO => 1, PayEmployeeContribYearlyPeer::NAME => 2, PayEmployeeContribYearlyPeer::COMPANY => 3, PayEmployeeContribYearlyPeer::DEPARTMENT => 4, PayEmployeeContribYearlyPeer::PERIOD_CODE => 5, PayEmployeeContribYearlyPeer::SUBCON => 6, PayEmployeeContribYearlyPeer::WAGE => 7, PayEmployeeContribYearlyPeer::EM_SHARE => 8, PayEmployeeContribYearlyPeer::ER_SHARE => 9, PayEmployeeContribYearlyPeer::CDAC => 10, PayEmployeeContribYearlyPeer::SINDA => 11, PayEmployeeContribYearlyPeer::MBMF => 12, PayEmployeeContribYearlyPeer::SDL => 13, PayEmployeeContribYearlyPeer::DATE_MODIFIED => 14, PayEmployeeContribYearlyPeer::MODIFIED_BY => 15, PayEmployeeContribYearlyPeer::DATE_CREATED => 16, PayEmployeeContribYearlyPeer::CREATED_BY => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'company' => 3, 'department' => 4, 'period_code' => 5, 'subcon' => 6, 'wage' => 7, 'em_share' => 8, 'er_share' => 9, 'cdac' => 10, 'sinda' => 11, 'mbmf' => 12, 'sdl' => 13, 'date_modified' => 14, 'modified_by' => 15, 'date_created' => 16, 'created_by' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeContribYearlyMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeContribYearlyMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeContribYearlyPeer::getTableMap();
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
		return str_replace(PayEmployeeContribYearlyPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::ID);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::SUBCON);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::WAGE);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::EM_SHARE);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::ER_SHARE);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::CDAC);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::SINDA);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::MBMF);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::SDL);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::CREATED_BY);

	}

	const COUNT = 'COUNT(pay_employee_contrib_yearly.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_contrib_yearly.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeContribYearlyPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeContribYearlyPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeContribYearlyPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeContribYearlyPeer::populateObjects(PayEmployeeContribYearlyPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeContribYearlyPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeContribYearlyPeer::getOMClass();
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
		return PayEmployeeContribYearlyPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeContribYearlyPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeContribYearlyPeer::ID);
			$selectCriteria->add(PayEmployeeContribYearlyPeer::ID, $criteria->remove(PayEmployeeContribYearlyPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeContribYearlyPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeContribYearlyPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeContribYearly) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeContribYearlyPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeContribYearly $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeContribYearlyPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeContribYearlyPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeContribYearlyPeer::DATABASE_NAME, PayEmployeeContribYearlyPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeContribYearlyPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeContribYearlyPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeContribYearlyPeer::ID, $pk);


		$v = PayEmployeeContribYearlyPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeContribYearlyPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeContribYearlyPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeContribYearlyPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeContribYearlyMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeContribYearlyMapBuilder');
}
