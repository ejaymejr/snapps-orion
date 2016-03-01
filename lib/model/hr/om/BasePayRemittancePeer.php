<?php


abstract class BasePayRemittancePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'pay_remittance';

	
	const CLASS_DEFAULT = 'lib.model.hr.PayRemittance';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pay_remittance.ID';

	
	const EMPLOYEE_NO = 'pay_remittance.EMPLOYEE_NO';

	
	const EMPLOYEE_SHARE = 'pay_remittance.EMPLOYEE_SHARE';

	
	const EMPLOYER_SHARE = 'pay_remittance.EMPLOYER_SHARE';

	
	const PERIOD_CODE = 'pay_remittance.PERIOD_CODE';

	
	const STATUS = 'pay_remittance.STATUS';

	
	const GROSS_PAY = 'pay_remittance.GROSS_PAY';

	
	const EMP_NAME = 'pay_remittance.EMP_NAME';

	
	const DED_INC_CODE = 'pay_remittance.DED_INC_CODE';

	
	const DED_INC_DESC = 'pay_remittance.DED_INC_DESC';

	
	const INCOME_TYPE = 'pay_remittance.INCOME_TYPE';

	
	const DEPT_CODE = 'pay_remittance.DEPT_CODE';

	
	const CREATED_BY = 'pay_remittance.CREATED_BY';

	
	const DATE_CREATED = 'pay_remittance.DATE_CREATED';

	
	const MODIFIED_BY = 'pay_remittance.MODIFIED_BY';

	
	const DATE_MODIFIED = 'pay_remittance.DATE_MODIFIED';

	
	const PAY_ACCOUNT_CODE_ID = 'pay_remittance.PAY_ACCOUNT_CODE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'EmployeeShare', 'EmployerShare', 'PeriodCode', 'Status', 'GrossPay', 'EmpName', 'DedIncCode', 'DedIncDesc', 'IncomeType', 'DeptCode', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'PayAccountCodeId', ),
		BasePeer::TYPE_COLNAME => array (PayRemittancePeer::ID, PayRemittancePeer::EMPLOYEE_NO, PayRemittancePeer::EMPLOYEE_SHARE, PayRemittancePeer::EMPLOYER_SHARE, PayRemittancePeer::PERIOD_CODE, PayRemittancePeer::STATUS, PayRemittancePeer::GROSS_PAY, PayRemittancePeer::EMP_NAME, PayRemittancePeer::DED_INC_CODE, PayRemittancePeer::DED_INC_DESC, PayRemittancePeer::INCOME_TYPE, PayRemittancePeer::DEPT_CODE, PayRemittancePeer::CREATED_BY, PayRemittancePeer::DATE_CREATED, PayRemittancePeer::MODIFIED_BY, PayRemittancePeer::DATE_MODIFIED, PayRemittancePeer::PAY_ACCOUNT_CODE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'employee_share', 'employer_share', 'period_code', 'status', 'gross_pay', 'emp_name', 'ded_inc_code', 'ded_inc_desc', 'income_type', 'dept_code', 'created_by', 'date_created', 'modified_by', 'date_modified', 'pay_account_code_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'EmployeeShare' => 2, 'EmployerShare' => 3, 'PeriodCode' => 4, 'Status' => 5, 'GrossPay' => 6, 'EmpName' => 7, 'DedIncCode' => 8, 'DedIncDesc' => 9, 'IncomeType' => 10, 'DeptCode' => 11, 'CreatedBy' => 12, 'DateCreated' => 13, 'ModifiedBy' => 14, 'DateModified' => 15, 'PayAccountCodeId' => 16, ),
		BasePeer::TYPE_COLNAME => array (PayRemittancePeer::ID => 0, PayRemittancePeer::EMPLOYEE_NO => 1, PayRemittancePeer::EMPLOYEE_SHARE => 2, PayRemittancePeer::EMPLOYER_SHARE => 3, PayRemittancePeer::PERIOD_CODE => 4, PayRemittancePeer::STATUS => 5, PayRemittancePeer::GROSS_PAY => 6, PayRemittancePeer::EMP_NAME => 7, PayRemittancePeer::DED_INC_CODE => 8, PayRemittancePeer::DED_INC_DESC => 9, PayRemittancePeer::INCOME_TYPE => 10, PayRemittancePeer::DEPT_CODE => 11, PayRemittancePeer::CREATED_BY => 12, PayRemittancePeer::DATE_CREATED => 13, PayRemittancePeer::MODIFIED_BY => 14, PayRemittancePeer::DATE_MODIFIED => 15, PayRemittancePeer::PAY_ACCOUNT_CODE_ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'employee_share' => 2, 'employer_share' => 3, 'period_code' => 4, 'status' => 5, 'gross_pay' => 6, 'emp_name' => 7, 'ded_inc_code' => 8, 'ded_inc_desc' => 9, 'income_type' => 10, 'dept_code' => 11, 'created_by' => 12, 'date_created' => 13, 'modified_by' => 14, 'date_modified' => 15, 'pay_account_code_id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/PayRemittanceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.PayRemittanceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PayRemittancePeer::getTableMap();
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
		return str_replace(PayRemittancePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PayRemittancePeer::ID);

		$criteria->addSelectColumn(PayRemittancePeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(PayRemittancePeer::EMPLOYEE_SHARE);

		$criteria->addSelectColumn(PayRemittancePeer::EMPLOYER_SHARE);

		$criteria->addSelectColumn(PayRemittancePeer::PERIOD_CODE);

		$criteria->addSelectColumn(PayRemittancePeer::STATUS);

		$criteria->addSelectColumn(PayRemittancePeer::GROSS_PAY);

		$criteria->addSelectColumn(PayRemittancePeer::EMP_NAME);

		$criteria->addSelectColumn(PayRemittancePeer::DED_INC_CODE);

		$criteria->addSelectColumn(PayRemittancePeer::DED_INC_DESC);

		$criteria->addSelectColumn(PayRemittancePeer::INCOME_TYPE);

		$criteria->addSelectColumn(PayRemittancePeer::DEPT_CODE);

		$criteria->addSelectColumn(PayRemittancePeer::CREATED_BY);

		$criteria->addSelectColumn(PayRemittancePeer::DATE_CREATED);

		$criteria->addSelectColumn(PayRemittancePeer::MODIFIED_BY);

		$criteria->addSelectColumn(PayRemittancePeer::DATE_MODIFIED);

		$criteria->addSelectColumn(PayRemittancePeer::PAY_ACCOUNT_CODE_ID);

	}

	const COUNT = 'COUNT(pay_remittance.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pay_remittance.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PayRemittancePeer::doSelectRS($criteria, $con);
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
		$objects = PayRemittancePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PayRemittancePeer::populateObjects(PayRemittancePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PayRemittancePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PayRemittancePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPayAccountCode(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PayRemittancePeer::PAY_ACCOUNT_CODE_ID, PayAccountCodePeer::ID);

		$rs = PayRemittancePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPayAccountCode(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PayRemittancePeer::addSelectColumns($c);
		$startcol = (PayRemittancePeer::NUM_COLUMNS - PayRemittancePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PayAccountCodePeer::addSelectColumns($c);

		$c->addJoin(PayRemittancePeer::PAY_ACCOUNT_CODE_ID, PayAccountCodePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PayRemittancePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PayAccountCodePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPayAccountCode(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPayRemittance($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPayRemittances();
				$obj2->addPayRemittance($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PayRemittancePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PayRemittancePeer::PAY_ACCOUNT_CODE_ID, PayAccountCodePeer::ID);

		$rs = PayRemittancePeer::doSelectRS($criteria, $con);
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

		PayRemittancePeer::addSelectColumns($c);
		$startcol2 = (PayRemittancePeer::NUM_COLUMNS - PayRemittancePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PayAccountCodePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PayAccountCodePeer::NUM_COLUMNS;

		$c->addJoin(PayRemittancePeer::PAY_ACCOUNT_CODE_ID, PayAccountCodePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PayRemittancePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PayAccountCodePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPayAccountCode(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPayRemittance($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPayRemittances();
				$obj2->addPayRemittance($obj1);
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
		return PayRemittancePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PayRemittancePeer::ID); 

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
			$comparison = $criteria->getComparison(PayRemittancePeer::ID);
			$selectCriteria->add(PayRemittancePeer::ID, $criteria->remove(PayRemittancePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PayRemittancePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PayRemittancePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PayRemittance) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PayRemittancePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PayRemittance $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PayRemittancePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PayRemittancePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PayRemittancePeer::DATABASE_NAME, PayRemittancePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PayRemittancePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PayRemittancePeer::DATABASE_NAME);

		$criteria->add(PayRemittancePeer::ID, $pk);


		$v = PayRemittancePeer::doSelect($criteria, $con);

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
			$criteria->add(PayRemittancePeer::ID, $pks, Criteria::IN);
			$objs = PayRemittancePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePayRemittancePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/PayRemittanceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.PayRemittanceMapBuilder');
}
