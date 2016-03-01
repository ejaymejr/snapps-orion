<?php


abstract class BasePayrollAuditCompliancePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'payroll_audit_compliance';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayrollAuditCompliance';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'payroll_audit_compliance.ID';

	
	const EMPLOYEE_NO = 'payroll_audit_compliance.EMPLOYEE_NO';

	
	const NAME = 'payroll_audit_compliance.NAME';

	
	const PERIOD_CODE = 'payroll_audit_compliance.PERIOD_CODE';

	
	const BASIC_PAY = 'payroll_audit_compliance.BASIC_PAY';

	
	const OT_AMOUNT = 'payroll_audit_compliance.OT_AMOUNT';

	
	const OT_COMPLIANCE_AMOUNT = 'payroll_audit_compliance.OT_COMPLIANCE_AMOUNT';

	
	const OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME = 'payroll_audit_compliance.OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME';

	
	const ALLOWANCE = 'payroll_audit_compliance.ALLOWANCE';

	
	const COMPLIANCE_DEDUCTION_AMOUNT = 'payroll_audit_compliance.COMPLIANCE_DEDUCTION_AMOUNT';

	
	const COMPLIANCE_AMOUNT = 'payroll_audit_compliance.COMPLIANCE_AMOUNT';

	
	const COMPLIANCE_AMOUNT_ORIGINAL_TIME = 'payroll_audit_compliance.COMPLIANCE_AMOUNT_ORIGINAL_TIME';

	
	const PAID_AMOUNT = 'payroll_audit_compliance.PAID_AMOUNT';

	
	const MOM_COMPLIANCE_AMOUNT = 'payroll_audit_compliance.MOM_COMPLIANCE_AMOUNT';

	
	const RATE_PER_HOUR = 'payroll_audit_compliance.RATE_PER_HOUR';

	
	const TOTAL_INCOME = 'payroll_audit_compliance.TOTAL_INCOME';

	
	const POSTED_OT = 'payroll_audit_compliance.POSTED_OT';

	
	const POSTED_HA = 'payroll_audit_compliance.POSTED_HA';

	
	const TOTAL_OT_HOURS = 'payroll_audit_compliance.TOTAL_OT_HOURS';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'PeriodCode', 'BasicPay', 'OtAmount', 'OtComplianceAmount', 'OtComplianceAmountOriginalTime', 'Allowance', 'ComplianceDeductionAmount', 'ComplianceAmount', 'ComplianceAmountOriginalTime', 'PaidAmount', 'MomComplianceAmount', 'RatePerHour', 'TotalIncome', 'PostedOt', 'PostedHa', 'TotalOtHours', ),
		BasePeer::TYPE_COLNAME => array (PayrollAuditCompliancePeer::ID, PayrollAuditCompliancePeer::EMPLOYEE_NO, PayrollAuditCompliancePeer::NAME, PayrollAuditCompliancePeer::PERIOD_CODE, PayrollAuditCompliancePeer::BASIC_PAY, PayrollAuditCompliancePeer::OT_AMOUNT, PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT, PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME, PayrollAuditCompliancePeer::ALLOWANCE, PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT, PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT, PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME, PayrollAuditCompliancePeer::PAID_AMOUNT, PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT, PayrollAuditCompliancePeer::RATE_PER_HOUR, PayrollAuditCompliancePeer::TOTAL_INCOME, PayrollAuditCompliancePeer::POSTED_OT, PayrollAuditCompliancePeer::POSTED_HA, PayrollAuditCompliancePeer::TOTAL_OT_HOURS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'period_code', 'basic_pay', 'ot_amount', 'ot_compliance_amount', 'ot_compliance_amount_original_time', 'allowance', 'compliance_deduction_amount', 'compliance_amount', 'compliance_amount_original_time', 'paid_amount', 'mom_compliance_amount', 'rate_per_hour', 'total_income', 'posted_ot', 'posted_ha', 'total_ot_hours', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'PeriodCode' => 3, 'BasicPay' => 4, 'OtAmount' => 5, 'OtComplianceAmount' => 6, 'OtComplianceAmountOriginalTime' => 7, 'Allowance' => 8, 'ComplianceDeductionAmount' => 9, 'ComplianceAmount' => 10, 'ComplianceAmountOriginalTime' => 11, 'PaidAmount' => 12, 'MomComplianceAmount' => 13, 'RatePerHour' => 14, 'TotalIncome' => 15, 'PostedOt' => 16, 'PostedHa' => 17, 'TotalOtHours' => 18, ),
		BasePeer::TYPE_COLNAME => array (PayrollAuditCompliancePeer::ID => 0, PayrollAuditCompliancePeer::EMPLOYEE_NO => 1, PayrollAuditCompliancePeer::NAME => 2, PayrollAuditCompliancePeer::PERIOD_CODE => 3, PayrollAuditCompliancePeer::BASIC_PAY => 4, PayrollAuditCompliancePeer::OT_AMOUNT => 5, PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT => 6, PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME => 7, PayrollAuditCompliancePeer::ALLOWANCE => 8, PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT => 9, PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT => 10, PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME => 11, PayrollAuditCompliancePeer::PAID_AMOUNT => 12, PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT => 13, PayrollAuditCompliancePeer::RATE_PER_HOUR => 14, PayrollAuditCompliancePeer::TOTAL_INCOME => 15, PayrollAuditCompliancePeer::POSTED_OT => 16, PayrollAuditCompliancePeer::POSTED_HA => 17, PayrollAuditCompliancePeer::TOTAL_OT_HOURS => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'period_code' => 3, 'basic_pay' => 4, 'ot_amount' => 5, 'ot_compliance_amount' => 6, 'ot_compliance_amount_original_time' => 7, 'allowance' => 8, 'compliance_deduction_amount' => 9, 'compliance_amount' => 10, 'compliance_amount_original_time' => 11, 'paid_amount' => 12, 'mom_compliance_amount' => 13, 'rate_per_hour' => 14, 'total_income' => 15, 'posted_ot' => 16, 'posted_ha' => 17, 'total_ot_hours' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayrollAuditComplianceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayrollAuditComplianceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayrollAuditCompliancePeer::getTableMap();
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
		return str_replace(PayrollAuditCompliancePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::ID);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::NAME);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::BASIC_PAY);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::OT_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::OT_COMPLIANCE_AMOUNT_ORIGINAL_TIME);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::ALLOWANCE);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::COMPLIANCE_DEDUCTION_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::COMPLIANCE_AMOUNT_ORIGINAL_TIME);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::PAID_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::MOM_COMPLIANCE_AMOUNT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::RATE_PER_HOUR);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::TOTAL_INCOME);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::POSTED_OT);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::POSTED_HA);

		$criteria->addSelectColumn(PayrollAuditCompliancePeer::TOTAL_OT_HOURS);

	}

	const COUNT = 'COUNT(payroll_audit_compliance.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT payroll_audit_compliance.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayrollAuditCompliancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayrollAuditCompliancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayrollAuditCompliancePeer::doSelectRS($criteria, $con);
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
		$objects = PayrollAuditCompliancePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayrollAuditCompliancePeer::populateObjects(PayrollAuditCompliancePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayrollAuditCompliancePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayrollAuditCompliancePeer::getOMClass();
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
		return PayrollAuditCompliancePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayrollAuditCompliancePeer::ID); 

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
			$comparison = $criteria->getComparison(PayrollAuditCompliancePeer::ID);
			$selectCriteria->add(PayrollAuditCompliancePeer::ID, $criteria->remove(PayrollAuditCompliancePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayrollAuditCompliancePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayrollAuditCompliancePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayrollAuditCompliance) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayrollAuditCompliancePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayrollAuditCompliance $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayrollAuditCompliancePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayrollAuditCompliancePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayrollAuditCompliancePeer::DATABASE_NAME, PayrollAuditCompliancePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayrollAuditCompliancePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayrollAuditCompliancePeer::DATABASE_NAME);

		$criteria->add(PayrollAuditCompliancePeer::ID, $pk);


		$v = PayrollAuditCompliancePeer::doSelect($criteria, $con);

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
			$criteria->add(PayrollAuditCompliancePeer::ID, $pks, Criteria::IN);
			$objs = PayrollAuditCompliancePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayrollAuditCompliancePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayrollAuditComplianceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayrollAuditComplianceMapBuilder');
}
