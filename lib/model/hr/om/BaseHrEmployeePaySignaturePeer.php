<?php


abstract class BaseHrEmployeePaySignaturePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_pay_signature';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeePaySignature';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_pay_signature.ID';

	
	const EMPLOYEE_NO = 'hr_employee_pay_signature.EMPLOYEE_NO';

	
	const NAME = 'hr_employee_pay_signature.NAME';

	
	const PERIOD_CODE = 'hr_employee_pay_signature.PERIOD_CODE';

	
	const CREATED_BY = 'hr_employee_pay_signature.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_pay_signature.DATE_CREATED';

	
	const DATE_MODIFIED = 'hr_employee_pay_signature.DATE_MODIFIED';

	
	const MODIFIED_BY = 'hr_employee_pay_signature.MODIFIED_BY';

	
	const CASH_SIGNED = 'hr_employee_pay_signature.CASH_SIGNED';

	
	const DATE_CASH_SIGNED = 'hr_employee_pay_signature.DATE_CASH_SIGNED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'PeriodCode', 'CreatedBy', 'DateCreated', 'DateModified', 'ModifiedBy', 'CashSigned', 'DateCashSigned', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeePaySignaturePeer::ID, HrEmployeePaySignaturePeer::EMPLOYEE_NO, HrEmployeePaySignaturePeer::NAME, HrEmployeePaySignaturePeer::PERIOD_CODE, HrEmployeePaySignaturePeer::CREATED_BY, HrEmployeePaySignaturePeer::DATE_CREATED, HrEmployeePaySignaturePeer::DATE_MODIFIED, HrEmployeePaySignaturePeer::MODIFIED_BY, HrEmployeePaySignaturePeer::CASH_SIGNED, HrEmployeePaySignaturePeer::DATE_CASH_SIGNED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'period_code', 'created_by', 'date_created', 'date_modified', 'modified_by', 'cash_signed', 'date_cash_signed', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'PeriodCode' => 3, 'CreatedBy' => 4, 'DateCreated' => 5, 'DateModified' => 6, 'ModifiedBy' => 7, 'CashSigned' => 8, 'DateCashSigned' => 9, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeePaySignaturePeer::ID => 0, HrEmployeePaySignaturePeer::EMPLOYEE_NO => 1, HrEmployeePaySignaturePeer::NAME => 2, HrEmployeePaySignaturePeer::PERIOD_CODE => 3, HrEmployeePaySignaturePeer::CREATED_BY => 4, HrEmployeePaySignaturePeer::DATE_CREATED => 5, HrEmployeePaySignaturePeer::DATE_MODIFIED => 6, HrEmployeePaySignaturePeer::MODIFIED_BY => 7, HrEmployeePaySignaturePeer::CASH_SIGNED => 8, HrEmployeePaySignaturePeer::DATE_CASH_SIGNED => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'period_code' => 3, 'created_by' => 4, 'date_created' => 5, 'date_modified' => 6, 'modified_by' => 7, 'cash_signed' => 8, 'date_cash_signed' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeePaySignatureMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeePaySignatureMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeePaySignaturePeer::getTableMap();
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
		return str_replace(HrEmployeePaySignaturePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::ID);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::NAME);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::PERIOD_CODE);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::CASH_SIGNED);

		$criteria->addSelectColumn(HrEmployeePaySignaturePeer::DATE_CASH_SIGNED);

	}

	const COUNT = 'COUNT(hr_employee_pay_signature.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_pay_signature.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeePaySignaturePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeePaySignaturePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeePaySignaturePeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeePaySignaturePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeePaySignaturePeer::populateObjects(HrEmployeePaySignaturePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeePaySignaturePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeePaySignaturePeer::getOMClass();
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
		return HrEmployeePaySignaturePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeePaySignaturePeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeePaySignaturePeer::ID);
			$selectCriteria->add(HrEmployeePaySignaturePeer::ID, $criteria->remove(HrEmployeePaySignaturePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeePaySignaturePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeePaySignaturePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeePaySignature) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeePaySignaturePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeePaySignature $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeePaySignaturePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeePaySignaturePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeePaySignaturePeer::DATABASE_NAME, HrEmployeePaySignaturePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeePaySignaturePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeePaySignaturePeer::DATABASE_NAME);

		$criteria->add(HrEmployeePaySignaturePeer::ID, $pk);


		$v = HrEmployeePaySignaturePeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeePaySignaturePeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeePaySignaturePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeePaySignaturePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeePaySignatureMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeePaySignatureMapBuilder');
}
