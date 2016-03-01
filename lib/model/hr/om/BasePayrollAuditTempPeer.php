<?php


abstract class BasePayrollAuditTempPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'payroll_audit_temp';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayrollAuditTemp';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'payroll_audit_temp.ID';

	
	const EMPLOYEE_NO = 'payroll_audit_temp.EMPLOYEE_NO';

	
	const NAME = 'payroll_audit_temp.NAME';

	
	const PERIOD_CODE = 'payroll_audit_temp.PERIOD_CODE';

	
	const BASIC_PAY = 'payroll_audit_temp.BASIC_PAY';

	
	const OT_AMOUNT = 'payroll_audit_temp.OT_AMOUNT';

	
	const OT_COMPLIANCE_AMOUNT = 'payroll_audit_temp.OT_COMPLIANCE_AMOUNT';

	
	const ALLOWANCE = 'payroll_audit_temp.ALLOWANCE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'PeriodCode', 'BasicPay', 'OtAmount', 'OtComplianceAmount', 'Allowance', ),
		BasePeer::TYPE_COLNAME => array (PayrollAuditTempPeer::ID, PayrollAuditTempPeer::EMPLOYEE_NO, PayrollAuditTempPeer::NAME, PayrollAuditTempPeer::PERIOD_CODE, PayrollAuditTempPeer::BASIC_PAY, PayrollAuditTempPeer::OT_AMOUNT, PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT, PayrollAuditTempPeer::ALLOWANCE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'period_code', 'basic_pay', 'ot_amount', 'ot_compliance_amount', 'allowance', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'PeriodCode' => 3, 'BasicPay' => 4, 'OtAmount' => 5, 'OtComplianceAmount' => 6, 'Allowance' => 7, ),
		BasePeer::TYPE_COLNAME => array (PayrollAuditTempPeer::ID => 0, PayrollAuditTempPeer::EMPLOYEE_NO => 1, PayrollAuditTempPeer::NAME => 2, PayrollAuditTempPeer::PERIOD_CODE => 3, PayrollAuditTempPeer::BASIC_PAY => 4, PayrollAuditTempPeer::OT_AMOUNT => 5, PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT => 6, PayrollAuditTempPeer::ALLOWANCE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'period_code' => 3, 'basic_pay' => 4, 'ot_amount' => 5, 'ot_compliance_amount' => 6, 'allowance' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayrollAuditTempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayrollAuditTempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayrollAuditTempPeer::getTableMap();
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
		return str_replace(PayrollAuditTempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayrollAuditTempPeer::ID);

		$criteria->addSelectColumn(PayrollAuditTempPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayrollAuditTempPeer::NAME);

		$criteria->addSelectColumn(PayrollAuditTempPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayrollAuditTempPeer::BASIC_PAY);

		$criteria->addSelectColumn(PayrollAuditTempPeer::OT_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditTempPeer::OT_COMPLIANCE_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditTempPeer::ALLOWANCE);

	}

	const COUNT = 'COUNT(payroll_audit_temp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT payroll_audit_temp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayrollAuditTempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayrollAuditTempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayrollAuditTempPeer::doSelectRS($criteria, $con);
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
		$objects = PayrollAuditTempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayrollAuditTempPeer::populateObjects(PayrollAuditTempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayrollAuditTempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayrollAuditTempPeer::getOMClass();
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
		return PayrollAuditTempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayrollAuditTempPeer::ID); 

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
			$comparison = $criteria->getComparison(PayrollAuditTempPeer::ID);
			$selectCriteria->add(PayrollAuditTempPeer::ID, $criteria->remove(PayrollAuditTempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayrollAuditTempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayrollAuditTempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayrollAuditTemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayrollAuditTempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayrollAuditTemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayrollAuditTempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayrollAuditTempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayrollAuditTempPeer::DATABASE_NAME, PayrollAuditTempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayrollAuditTempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayrollAuditTempPeer::DATABASE_NAME);

		$criteria->add(PayrollAuditTempPeer::ID, $pk);


		$v = PayrollAuditTempPeer::doSelect($criteria, $con);

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
			$criteria->add(PayrollAuditTempPeer::ID, $pks, Criteria::IN);
			$objs = PayrollAuditTempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayrollAuditTempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayrollAuditTempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayrollAuditTempMapBuilder');
}
