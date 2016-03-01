<?php


abstract class BasePayrollProcessPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'payroll_process';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayrollProcess';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'payroll_process.ID';

	
	const PERIOD_CODE = 'payroll_process.PERIOD_CODE';

	
	const EMPLOYEE_DATA = 'payroll_process.EMPLOYEE_DATA';

	
	const EMP_LEAVE = 'payroll_process.EMP_LEAVE';

	
	const ATTENDANCE = 'payroll_process.ATTENDANCE';

	
	const INCOME = 'payroll_process.INCOME';

	
	const DEDUCTION = 'payroll_process.DEDUCTION';

	
	const DEFICIENCY = 'payroll_process.DEFICIENCY';

	
	const PAYSLIP = 'payroll_process.PAYSLIP';

	
	const MANUAL = 'payroll_process.MANUAL';

	
	const LEVY_CONTRIBUTION = 'payroll_process.LEVY_CONTRIBUTION';

	
	const CLOSED = 'payroll_process.CLOSED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PeriodCode', 'EmployeeData', 'EmpLeave', 'Attendance', 'Income', 'Deduction', 'Deficiency', 'Payslip', 'Manual', 'LevyContribution', 'Closed', ),
		BasePeer::TYPE_COLNAME => array (PayrollProcessPeer::ID, PayrollProcessPeer::PERIOD_CODE, PayrollProcessPeer::EMPLOYEE_DATA, PayrollProcessPeer::EMP_LEAVE, PayrollProcessPeer::ATTENDANCE, PayrollProcessPeer::INCOME, PayrollProcessPeer::DEDUCTION, PayrollProcessPeer::DEFICIENCY, PayrollProcessPeer::PAYSLIP, PayrollProcessPeer::MANUAL, PayrollProcessPeer::LEVY_CONTRIBUTION, PayrollProcessPeer::CLOSED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'period_code', 'employee_data', 'emp_leave', 'attendance', 'income', 'deduction', 'deficiency', 'payslip', 'manual', 'levy_contribution', 'closed', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PeriodCode' => 1, 'EmployeeData' => 2, 'EmpLeave' => 3, 'Attendance' => 4, 'Income' => 5, 'Deduction' => 6, 'Deficiency' => 7, 'Payslip' => 8, 'Manual' => 9, 'LevyContribution' => 10, 'Closed' => 11, ),
		BasePeer::TYPE_COLNAME => array (PayrollProcessPeer::ID => 0, PayrollProcessPeer::PERIOD_CODE => 1, PayrollProcessPeer::EMPLOYEE_DATA => 2, PayrollProcessPeer::EMP_LEAVE => 3, PayrollProcessPeer::ATTENDANCE => 4, PayrollProcessPeer::INCOME => 5, PayrollProcessPeer::DEDUCTION => 6, PayrollProcessPeer::DEFICIENCY => 7, PayrollProcessPeer::PAYSLIP => 8, PayrollProcessPeer::MANUAL => 9, PayrollProcessPeer::LEVY_CONTRIBUTION => 10, PayrollProcessPeer::CLOSED => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'period_code' => 1, 'employee_data' => 2, 'emp_leave' => 3, 'attendance' => 4, 'income' => 5, 'deduction' => 6, 'deficiency' => 7, 'payslip' => 8, 'manual' => 9, 'levy_contribution' => 10, 'closed' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayrollProcessMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayrollProcessMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayrollProcessPeer::getTableMap();
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
		return str_replace(PayrollProcessPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayrollProcessPeer::ID);

		$criteria->addSelectColumn(PayrollProcessPeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayrollProcessPeer::EMPLOYEE_DATA);

		$criteria->addSelectColumn(PayrollProcessPeer::EMP_LEAVE);

		$criteria->addSelectColumn(PayrollProcessPeer::ATTENDANCE);

		$criteria->addSelectColumn(PayrollProcessPeer::INCOME);

		$criteria->addSelectColumn(PayrollProcessPeer::DEDUCTION);

		$criteria->addSelectColumn(PayrollProcessPeer::DEFICIENCY);

		$criteria->addSelectColumn(PayrollProcessPeer::PAYSLIP);

		$criteria->addSelectColumn(PayrollProcessPeer::MANUAL);

		$criteria->addSelectColumn(PayrollProcessPeer::LEVY_CONTRIBUTION);

		$criteria->addSelectColumn(PayrollProcessPeer::CLOSED);

	}

	const COUNT = 'COUNT(payroll_process.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT payroll_process.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayrollProcessPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayrollProcessPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayrollProcessPeer::doSelectRS($criteria, $con);
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
		$objects = PayrollProcessPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayrollProcessPeer::populateObjects(PayrollProcessPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayrollProcessPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayrollProcessPeer::getOMClass();
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
		return PayrollProcessPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayrollProcessPeer::ID); 

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
			$comparison = $criteria->getComparison(PayrollProcessPeer::ID);
			$selectCriteria->add(PayrollProcessPeer::ID, $criteria->remove(PayrollProcessPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayrollProcessPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayrollProcessPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayrollProcess) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayrollProcessPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayrollProcess $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayrollProcessPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayrollProcessPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayrollProcessPeer::DATABASE_NAME, PayrollProcessPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayrollProcessPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayrollProcessPeer::DATABASE_NAME);

		$criteria->add(PayrollProcessPeer::ID, $pk);


		$v = PayrollProcessPeer::doSelect($criteria, $con);

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
			$criteria->add(PayrollProcessPeer::ID, $pks, Criteria::IN);
			$objs = PayrollProcessPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayrollProcessPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayrollProcessMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayrollProcessMapBuilder');
}
