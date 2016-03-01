<?php


abstract class BaseFullEmployeePayFinalPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'full_employee_pay_final';

	
	const CLASS_DEFAULT = 'lib.model.hr.FullEmployeePayFinal';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'full_employee_pay_final.ID';

	
	const EMPLOYEE_NO = 'full_employee_pay_final.EMPLOYEE_NO';

	
	const NAME = 'full_employee_pay_final.NAME';

	
	const COMPANY = 'full_employee_pay_final.COMPANY';

	
	const HOURLY_RATE = 'full_employee_pay_final.HOURLY_RATE';

	
	const NATIONALITY = 'full_employee_pay_final.NATIONALITY';

	
	const TYPE_OF_EMPLOYEMENT = 'full_employee_pay_final.TYPE_OF_EMPLOYEMENT';

	
	const OT1 = 'full_employee_pay_final.OT1';

	
	const OT2 = 'full_employee_pay_final.OT2';

	
	const OT3 = 'full_employee_pay_final.OT3';

	
	const OT_AMOUNT = 'full_employee_pay_final.OT_AMOUNT';

	
	const ADVANCE_PAY = 'full_employee_pay_final.ADVANCE_PAY';

	
	const TOTAL = 'full_employee_pay_final.TOTAL';

	
	const ACCOUNT_NO = 'full_employee_pay_final.ACCOUNT_NO';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'Company', 'HourlyRate', 'Nationality', 'TypeOfEmployement', 'Ot1', 'Ot2', 'Ot3', 'OtAmount', 'AdvancePay', 'Total', 'AccountNo', ),
		BasePeer::TYPE_COLNAME => array (FullEmployeePayFinalPeer::ID, FullEmployeePayFinalPeer::EMPLOYEE_NO, FullEmployeePayFinalPeer::NAME, FullEmployeePayFinalPeer::COMPANY, FullEmployeePayFinalPeer::HOURLY_RATE, FullEmployeePayFinalPeer::NATIONALITY, FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT, FullEmployeePayFinalPeer::OT1, FullEmployeePayFinalPeer::OT2, FullEmployeePayFinalPeer::OT3, FullEmployeePayFinalPeer::OT_AMOUNT, FullEmployeePayFinalPeer::ADVANCE_PAY, FullEmployeePayFinalPeer::TOTAL, FullEmployeePayFinalPeer::ACCOUNT_NO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'company', 'hourly_rate', 'nationality', 'type_of_employement', 'ot1', 'ot2', 'ot3', 'ot_amount', 'advance_pay', 'total', 'account_no', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'Company' => 3, 'HourlyRate' => 4, 'Nationality' => 5, 'TypeOfEmployement' => 6, 'Ot1' => 7, 'Ot2' => 8, 'Ot3' => 9, 'OtAmount' => 10, 'AdvancePay' => 11, 'Total' => 12, 'AccountNo' => 13, ),
		BasePeer::TYPE_COLNAME => array (FullEmployeePayFinalPeer::ID => 0, FullEmployeePayFinalPeer::EMPLOYEE_NO => 1, FullEmployeePayFinalPeer::NAME => 2, FullEmployeePayFinalPeer::COMPANY => 3, FullEmployeePayFinalPeer::HOURLY_RATE => 4, FullEmployeePayFinalPeer::NATIONALITY => 5, FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT => 6, FullEmployeePayFinalPeer::OT1 => 7, FullEmployeePayFinalPeer::OT2 => 8, FullEmployeePayFinalPeer::OT3 => 9, FullEmployeePayFinalPeer::OT_AMOUNT => 10, FullEmployeePayFinalPeer::ADVANCE_PAY => 11, FullEmployeePayFinalPeer::TOTAL => 12, FullEmployeePayFinalPeer::ACCOUNT_NO => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'company' => 3, 'hourly_rate' => 4, 'nationality' => 5, 'type_of_employement' => 6, 'ot1' => 7, 'ot2' => 8, 'ot3' => 9, 'ot_amount' => 10, 'advance_pay' => 11, 'total' => 12, 'account_no' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/FullEmployeePayFinalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.FullEmployeePayFinalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FullEmployeePayFinalPeer::getTableMap();
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
		return str_replace(FullEmployeePayFinalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::ID);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::NAME);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::COMPANY);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::HOURLY_RATE);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::NATIONALITY);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::TYPE_OF_EMPLOYEMENT);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::OT1);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::OT2);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::OT3);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::OT_AMOUNT);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::ADVANCE_PAY);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::TOTAL);

		$criteria->addSelectColumn(FullEmployeePayFinalPeer::ACCOUNT_NO);

	}

	const COUNT = 'COUNT(full_employee_pay_final.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT full_employee_pay_final.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FullEmployeePayFinalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FullEmployeePayFinalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FullEmployeePayFinalPeer::doSelectRS($criteria, $con);
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
		$objects = FullEmployeePayFinalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FullEmployeePayFinalPeer::populateObjects(FullEmployeePayFinalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FullEmployeePayFinalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FullEmployeePayFinalPeer::getOMClass();
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
		return FullEmployeePayFinalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FullEmployeePayFinalPeer::ID); 

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
			$comparison = $criteria->getComparison(FullEmployeePayFinalPeer::ID);
			$selectCriteria->add(FullEmployeePayFinalPeer::ID, $criteria->remove(FullEmployeePayFinalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FullEmployeePayFinalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FullEmployeePayFinalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FullEmployeePayFinal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FullEmployeePayFinalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FullEmployeePayFinal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FullEmployeePayFinalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FullEmployeePayFinalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FullEmployeePayFinalPeer::DATABASE_NAME, FullEmployeePayFinalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FullEmployeePayFinalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FullEmployeePayFinalPeer::DATABASE_NAME);

		$criteria->add(FullEmployeePayFinalPeer::ID, $pk);


		$v = FullEmployeePayFinalPeer::doSelect($criteria, $con);

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
			$criteria->add(FullEmployeePayFinalPeer::ID, $pks, Criteria::IN);
			$objs = FullEmployeePayFinalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFullEmployeePayFinalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/FullEmployeePayFinalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.FullEmployeePayFinalMapBuilder');
}
