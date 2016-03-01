<?php


abstract class BaseCpfGovtRulePeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'cpf_govt_rule';

	
	const CLASS_DEFAULT = 'lib.model.hr.CpfGovtRule';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cpf_govt_rule.ID';

	
	const DESCRIPTION = 'cpf_govt_rule.DESCRIPTION';

	
	const COMPANY_TYPE = 'cpf_govt_rule.COMPANY_TYPE';

	
	const CPF_YEAR = 'cpf_govt_rule.CPF_YEAR';

	
	const FROM_DATE = 'cpf_govt_rule.FROM_DATE';

	
	const TO_DATE = 'cpf_govt_rule.TO_DATE';

	
	const AGE_MIN = 'cpf_govt_rule.AGE_MIN';

	
	const AGE_MAX = 'cpf_govt_rule.AGE_MAX';

	
	const PAY_MIN = 'cpf_govt_rule.PAY_MIN';

	
	const PAY_MAX = 'cpf_govt_rule.PAY_MAX';

	
	const EM_SHARE = 'cpf_govt_rule.EM_SHARE';

	
	const ER_SHARE = 'cpf_govt_rule.ER_SHARE';

	
	const ORDINARY = 'cpf_govt_rule.ORDINARY';

	
	const SPECIAL = 'cpf_govt_rule.SPECIAL';

	
	const MEDISAVE = 'cpf_govt_rule.MEDISAVE';

	
	const ER_FORMULA = 'cpf_govt_rule.ER_FORMULA';

	
	const EM_FORMULA = 'cpf_govt_rule.EM_FORMULA';

	
	const CPF_BATCH = 'cpf_govt_rule.CPF_BATCH';

	
	const CREATED_BY = 'cpf_govt_rule.CREATED_BY';

	
	const DATE_CREATED = 'cpf_govt_rule.DATE_CREATED';

	
	const MODIFIED_BY = 'cpf_govt_rule.MODIFIED_BY';

	
	const DATE_MODIFIED = 'cpf_govt_rule.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Description', 'CompanyType', 'CpfYear', 'FromDate', 'ToDate', 'AgeMin', 'AgeMax', 'PayMin', 'PayMax', 'EmShare', 'ErShare', 'Ordinary', 'Special', 'Medisave', 'ErFormula', 'EmFormula', 'CpfBatch', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (CpfGovtRulePeer::ID, CpfGovtRulePeer::DESCRIPTION, CpfGovtRulePeer::COMPANY_TYPE, CpfGovtRulePeer::CPF_YEAR, CpfGovtRulePeer::FROM_DATE, CpfGovtRulePeer::TO_DATE, CpfGovtRulePeer::AGE_MIN, CpfGovtRulePeer::AGE_MAX, CpfGovtRulePeer::PAY_MIN, CpfGovtRulePeer::PAY_MAX, CpfGovtRulePeer::EM_SHARE, CpfGovtRulePeer::ER_SHARE, CpfGovtRulePeer::ORDINARY, CpfGovtRulePeer::SPECIAL, CpfGovtRulePeer::MEDISAVE, CpfGovtRulePeer::ER_FORMULA, CpfGovtRulePeer::EM_FORMULA, CpfGovtRulePeer::CPF_BATCH, CpfGovtRulePeer::CREATED_BY, CpfGovtRulePeer::DATE_CREATED, CpfGovtRulePeer::MODIFIED_BY, CpfGovtRulePeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'description', 'company_type', 'cpf_year', 'from_date', 'to_date', 'age_min', 'age_max', 'pay_min', 'pay_max', 'em_share', 'er_share', 'ordinary', 'special', 'medisave', 'er_formula', 'em_formula', 'cpf_batch', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Description' => 1, 'CompanyType' => 2, 'CpfYear' => 3, 'FromDate' => 4, 'ToDate' => 5, 'AgeMin' => 6, 'AgeMax' => 7, 'PayMin' => 8, 'PayMax' => 9, 'EmShare' => 10, 'ErShare' => 11, 'Ordinary' => 12, 'Special' => 13, 'Medisave' => 14, 'ErFormula' => 15, 'EmFormula' => 16, 'CpfBatch' => 17, 'CreatedBy' => 18, 'DateCreated' => 19, 'ModifiedBy' => 20, 'DateModified' => 21, ),
		BasePeer::TYPE_COLNAME => array (CpfGovtRulePeer::ID => 0, CpfGovtRulePeer::DESCRIPTION => 1, CpfGovtRulePeer::COMPANY_TYPE => 2, CpfGovtRulePeer::CPF_YEAR => 3, CpfGovtRulePeer::FROM_DATE => 4, CpfGovtRulePeer::TO_DATE => 5, CpfGovtRulePeer::AGE_MIN => 6, CpfGovtRulePeer::AGE_MAX => 7, CpfGovtRulePeer::PAY_MIN => 8, CpfGovtRulePeer::PAY_MAX => 9, CpfGovtRulePeer::EM_SHARE => 10, CpfGovtRulePeer::ER_SHARE => 11, CpfGovtRulePeer::ORDINARY => 12, CpfGovtRulePeer::SPECIAL => 13, CpfGovtRulePeer::MEDISAVE => 14, CpfGovtRulePeer::ER_FORMULA => 15, CpfGovtRulePeer::EM_FORMULA => 16, CpfGovtRulePeer::CPF_BATCH => 17, CpfGovtRulePeer::CREATED_BY => 18, CpfGovtRulePeer::DATE_CREATED => 19, CpfGovtRulePeer::MODIFIED_BY => 20, CpfGovtRulePeer::DATE_MODIFIED => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'description' => 1, 'company_type' => 2, 'cpf_year' => 3, 'from_date' => 4, 'to_date' => 5, 'age_min' => 6, 'age_max' => 7, 'pay_min' => 8, 'pay_max' => 9, 'em_share' => 10, 'er_share' => 11, 'ordinary' => 12, 'special' => 13, 'medisave' => 14, 'er_formula' => 15, 'em_formula' => 16, 'cpf_batch' => 17, 'created_by' => 18, 'date_created' => 19, 'modified_by' => 20, 'date_modified' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/CpfGovtRuleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.CpfGovtRuleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpfGovtRulePeer::getTableMap();
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
		return str_replace(CpfGovtRulePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpfGovtRulePeer::ID);

		$criteria->addSelectColumn(CpfGovtRulePeer::DESCRIPTION);

		$criteria->addSelectColumn(CpfGovtRulePeer::COMPANY_TYPE);

		$criteria->addSelectColumn(CpfGovtRulePeer::CPF_YEAR);

		$criteria->addSelectColumn(CpfGovtRulePeer::FROM_DATE);

		$criteria->addSelectColumn(CpfGovtRulePeer::TO_DATE);

		$criteria->addSelectColumn(CpfGovtRulePeer::AGE_MIN);

		$criteria->addSelectColumn(CpfGovtRulePeer::AGE_MAX);

		$criteria->addSelectColumn(CpfGovtRulePeer::PAY_MIN);

		$criteria->addSelectColumn(CpfGovtRulePeer::PAY_MAX);

		$criteria->addSelectColumn(CpfGovtRulePeer::EM_SHARE);

		$criteria->addSelectColumn(CpfGovtRulePeer::ER_SHARE);

		$criteria->addSelectColumn(CpfGovtRulePeer::ORDINARY);

		$criteria->addSelectColumn(CpfGovtRulePeer::SPECIAL);

		$criteria->addSelectColumn(CpfGovtRulePeer::MEDISAVE);

		$criteria->addSelectColumn(CpfGovtRulePeer::ER_FORMULA);

		$criteria->addSelectColumn(CpfGovtRulePeer::EM_FORMULA);

		$criteria->addSelectColumn(CpfGovtRulePeer::CPF_BATCH);

		$criteria->addSelectColumn(CpfGovtRulePeer::CREATED_BY);

		$criteria->addSelectColumn(CpfGovtRulePeer::DATE_CREATED);

		$criteria->addSelectColumn(CpfGovtRulePeer::MODIFIED_BY);

		$criteria->addSelectColumn(CpfGovtRulePeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(cpf_govt_rule.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpf_govt_rule.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpfGovtRulePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpfGovtRulePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpfGovtRulePeer::doSelectRS($criteria, $con);
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
		$objects = CpfGovtRulePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpfGovtRulePeer::populateObjects(CpfGovtRulePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpfGovtRulePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpfGovtRulePeer::getOMClass();
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
		return CpfGovtRulePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpfGovtRulePeer::ID); 

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
			$comparison = $criteria->getComparison(CpfGovtRulePeer::ID);
			$selectCriteria->add(CpfGovtRulePeer::ID, $criteria->remove(CpfGovtRulePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpfGovtRulePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpfGovtRulePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CpfGovtRule) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpfGovtRulePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CpfGovtRule $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpfGovtRulePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpfGovtRulePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpfGovtRulePeer::DATABASE_NAME, CpfGovtRulePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpfGovtRulePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpfGovtRulePeer::DATABASE_NAME);

		$criteria->add(CpfGovtRulePeer::ID, $pk);


		$v = CpfGovtRulePeer::doSelect($criteria, $con);

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
			$criteria->add(CpfGovtRulePeer::ID, $pks, Criteria::IN);
			$objs = CpfGovtRulePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpfGovtRulePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/CpfGovtRuleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.CpfGovtRuleMapBuilder');
}
