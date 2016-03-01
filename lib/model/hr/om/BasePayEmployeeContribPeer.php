<?php


abstract class BasePayEmployeeContribPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_employee_contrib';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayEmployeeContrib';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_employee_contrib.ID';

	
	const EMPLOYEE_NO = 'pay_employee_contrib.EMPLOYEE_NO';

	
	const NAME = 'pay_employee_contrib.NAME';

	
	const COMPANY = 'pay_employee_contrib.COMPANY';

	
	const DEPARTMENT = 'pay_employee_contrib.DEPARTMENT';

	
	const PERIOD_CODE = 'pay_employee_contrib.PERIOD_CODE';

	
	const SUBCON = 'pay_employee_contrib.SUBCON';

	
	const WAGE = 'pay_employee_contrib.WAGE';

	
	const EM_SHARE = 'pay_employee_contrib.EM_SHARE';

	
	const ER_SHARE = 'pay_employee_contrib.ER_SHARE';

	
	const CDAC = 'pay_employee_contrib.CDAC';

	
	const SINDA = 'pay_employee_contrib.SINDA';

	
	const MBMF = 'pay_employee_contrib.MBMF';

	
	const SDL = 'pay_employee_contrib.SDL';

	
	const LEVY = 'pay_employee_contrib.LEVY';

	
	const GROSS_INC = 'pay_employee_contrib.GROSS_INC';

	
	const GROSS_DED = 'pay_employee_contrib.GROSS_DED';

	
	const IS_LEVY = 'pay_employee_contrib.IS_LEVY';

	
	const DATE_MODIFIED = 'pay_employee_contrib.DATE_MODIFIED';

	
	const MODIFIED_BY = 'pay_employee_contrib.MODIFIED_BY';

	
	const DATE_CREATED = 'pay_employee_contrib.DATE_CREATED';

	
	const CREATED_BY = 'pay_employee_contrib.CREATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Company', 'Department', 'PeriodCode', 'Subcon', 'Wage', 'EmShare', 'ErShare', 'Cdac', 'Sinda', 'Mbmf', 'Sdl', 'Levy', 'GrossInc', 'GrossDed', 'IsLevy', 'DateModified', 'ModifiedBy', 'DateCreated', 'CreatedBy', ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeContribPeer::ID, PayEmployeeContribPeer::EMPLOYEE_NO, PayEmployeeContribPeer::NAME, PayEmployeeContribPeer::COMPANY, PayEmployeeContribPeer::DEPARTMENT, PayEmployeeContribPeer::PERIOD_CODE, PayEmployeeContribPeer::SUBCON, PayEmployeeContribPeer::WAGE, PayEmployeeContribPeer::EM_SHARE, PayEmployeeContribPeer::ER_SHARE, PayEmployeeContribPeer::CDAC, PayEmployeeContribPeer::SINDA, PayEmployeeContribPeer::MBMF, PayEmployeeContribPeer::SDL, PayEmployeeContribPeer::LEVY, PayEmployeeContribPeer::GROSS_INC, PayEmployeeContribPeer::GROSS_DED, PayEmployeeContribPeer::IS_LEVY, PayEmployeeContribPeer::DATE_MODIFIED, PayEmployeeContribPeer::MODIFIED_BY, PayEmployeeContribPeer::DATE_CREATED, PayEmployeeContribPeer::CREATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'company', 'department', 'period_code', 'subcon', 'wage', 'em_share', 'er_share', 'cdac', 'sinda', 'mbmf', 'sdl', 'levy', 'gross_inc', 'gross_ded', 'is_levy', 'date_modified', 'modified_by', 'date_created', 'created_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Company' => 3, 'Department' => 4, 'PeriodCode' => 5, 'Subcon' => 6, 'Wage' => 7, 'EmShare' => 8, 'ErShare' => 9, 'Cdac' => 10, 'Sinda' => 11, 'Mbmf' => 12, 'Sdl' => 13, 'Levy' => 14, 'GrossInc' => 15, 'GrossDed' => 16, 'IsLevy' => 17, 'DateModified' => 18, 'ModifiedBy' => 19, 'DateCreated' => 20, 'CreatedBy' => 21, ),
		BasePeer::TYPE_COLNAME => array (PayEmployeeContribPeer::ID => 0, PayEmployeeContribPeer::EMPLOYEE_NO => 1, PayEmployeeContribPeer::NAME => 2, PayEmployeeContribPeer::COMPANY => 3, PayEmployeeContribPeer::DEPARTMENT => 4, PayEmployeeContribPeer::PERIOD_CODE => 5, PayEmployeeContribPeer::SUBCON => 6, PayEmployeeContribPeer::WAGE => 7, PayEmployeeContribPeer::EM_SHARE => 8, PayEmployeeContribPeer::ER_SHARE => 9, PayEmployeeContribPeer::CDAC => 10, PayEmployeeContribPeer::SINDA => 11, PayEmployeeContribPeer::MBMF => 12, PayEmployeeContribPeer::SDL => 13, PayEmployeeContribPeer::LEVY => 14, PayEmployeeContribPeer::GROSS_INC => 15, PayEmployeeContribPeer::GROSS_DED => 16, PayEmployeeContribPeer::IS_LEVY => 17, PayEmployeeContribPeer::DATE_MODIFIED => 18, PayEmployeeContribPeer::MODIFIED_BY => 19, PayEmployeeContribPeer::DATE_CREATED => 20, PayEmployeeContribPeer::CREATED_BY => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'company' => 3, 'department' => 4, 'period_code' => 5, 'subcon' => 6, 'wage' => 7, 'em_share' => 8, 'er_share' => 9, 'cdac' => 10, 'sinda' => 11, 'mbmf' => 12, 'sdl' => 13, 'levy' => 14, 'gross_inc' => 15, 'gross_ded' => 16, 'is_levy' => 17, 'date_modified' => 18, 'modified_by' => 19, 'date_created' => 20, 'created_by' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayEmployeeContribMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayEmployeeContribMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayEmployeeContribPeer::getTableMap();
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
		return str_replace(PayEmployeeContribPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayEmployeeContribPeer::ID);

		$criteria->addSelectColumn(PayEmployeeContribPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayEmployeeContribPeer::NAME);

		$criteria->addSelectColumn(PayEmployeeContribPeer::COMPANY);

		$criteria->addSelectColumn(PayEmployeeContribPeer::DEPARTMENT);

		$criteria->addSelectColumn(PayEmployeeContribPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayEmployeeContribPeer::SUBCON);

		$criteria->addSelectColumn(PayEmployeeContribPeer::WAGE);

		$criteria->addSelectColumn(PayEmployeeContribPeer::EM_SHARE);

		$criteria->addSelectColumn(PayEmployeeContribPeer::ER_SHARE);

		$criteria->addSelectColumn(PayEmployeeContribPeer::CDAC);

		$criteria->addSelectColumn(PayEmployeeContribPeer::SINDA);

		$criteria->addSelectColumn(PayEmployeeContribPeer::MBMF);

		$criteria->addSelectColumn(PayEmployeeContribPeer::SDL);

		$criteria->addSelectColumn(PayEmployeeContribPeer::LEVY);

		$criteria->addSelectColumn(PayEmployeeContribPeer::GROSS_INC);

		$criteria->addSelectColumn(PayEmployeeContribPeer::GROSS_DED);

		$criteria->addSelectColumn(PayEmployeeContribPeer::IS_LEVY);

		$criteria->addSelectColumn(PayEmployeeContribPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(PayEmployeeContribPeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayEmployeeContribPeer::DATE_CREATED);

		$criteria->addSelectColumn(PayEmployeeContribPeer::CREATED_BY);

	}

	const COUNT = 'COUNT(pay_employee_contrib.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_employee_contrib.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayEmployeeContribPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayEmployeeContribPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayEmployeeContribPeer::doSelectRS($criteria, $con);
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
		$objects = PayEmployeeContribPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayEmployeeContribPeer::populateObjects(PayEmployeeContribPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayEmployeeContribPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayEmployeeContribPeer::getOMClass();
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
		return PayEmployeeContribPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayEmployeeContribPeer::ID); 

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
			$comparison = $criteria->getComparison(PayEmployeeContribPeer::ID);
			$selectCriteria->add(PayEmployeeContribPeer::ID, $criteria->remove(PayEmployeeContribPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayEmployeeContribPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayEmployeeContribPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayEmployeeContrib) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayEmployeeContribPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayEmployeeContrib $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayEmployeeContribPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayEmployeeContribPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayEmployeeContribPeer::DATABASE_NAME, PayEmployeeContribPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayEmployeeContribPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayEmployeeContribPeer::DATABASE_NAME);

		$criteria->add(PayEmployeeContribPeer::ID, $pk);


		$v = PayEmployeeContribPeer::doSelect($criteria, $con);

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
			$criteria->add(PayEmployeeContribPeer::ID, $pks, Criteria::IN);
			$objs = PayEmployeeContribPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayEmployeeContribPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayEmployeeContribMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayEmployeeContribMapBuilder');
}
