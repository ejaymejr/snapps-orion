<?php


abstract class BaseContribCompanyIr8aPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'contrib_company_ir8a';

	
	const CLASS_DEFAULT = 'lib.model.hr.ContribCompanyIr8a';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'contrib_company_ir8a.ID';

	
	const SOURCE = 'contrib_company_ir8a.SOURCE';

	
	const ORG_ID_TYPE = 'contrib_company_ir8a.ORG_ID_TYPE';

	
	const ORG_ID_NO = 'contrib_company_ir8a.ORG_ID_NO';

	
	const NANO_ORG_ID = 'contrib_company_ir8a.NANO_ORG_ID';

	
	const AUTHORIZED_PERSON = 'contrib_company_ir8a.AUTHORIZED_PERSON';

	
	const AUTH_DESIGNATION = 'contrib_company_ir8a.AUTH_DESIGNATION';

	
	const TEL_NO = 'contrib_company_ir8a.TEL_NO';

	
	const EMPLOYER = 'contrib_company_ir8a.EMPLOYER';

	
	const EMAIL = 'contrib_company_ir8a.EMAIL';

	
	const CREATED_BY = 'contrib_company_ir8a.CREATED_BY';

	
	const DATE_CREATED = 'contrib_company_ir8a.DATE_CREATED';

	
	const MODIFIED_BY = 'contrib_company_ir8a.MODIFIED_BY';

	
	const DATE_MODIFIED = 'contrib_company_ir8a.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Source', 'OrgIdType', 'OrgIdNo', 'NanoOrgId', 'AuthorizedPerson', 'AuthDesignation', 'TelNo', 'Employer', 'Email', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (ContribCompanyIr8aPeer::ID, ContribCompanyIr8aPeer::SOURCE, ContribCompanyIr8aPeer::ORG_ID_TYPE, ContribCompanyIr8aPeer::ORG_ID_NO, ContribCompanyIr8aPeer::NANO_ORG_ID, ContribCompanyIr8aPeer::AUTHORIZED_PERSON, ContribCompanyIr8aPeer::AUTH_DESIGNATION, ContribCompanyIr8aPeer::TEL_NO, ContribCompanyIr8aPeer::EMPLOYER, ContribCompanyIr8aPeer::EMAIL, ContribCompanyIr8aPeer::CREATED_BY, ContribCompanyIr8aPeer::DATE_CREATED, ContribCompanyIr8aPeer::MODIFIED_BY, ContribCompanyIr8aPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'source', 'org_id_type', 'org_id_no', 'nano_org_id', 'authorized_person', 'auth_designation', 'tel_no', 'employer', 'email', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Source' => 1, 'OrgIdType' => 2, 'OrgIdNo' => 3, 'NanoOrgId' => 4, 'AuthorizedPerson' => 5, 'AuthDesignation' => 6, 'TelNo' => 7, 'Employer' => 8, 'Email' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, ),
		BasePeer::TYPE_COLNAME => array (ContribCompanyIr8aPeer::ID => 0, ContribCompanyIr8aPeer::SOURCE => 1, ContribCompanyIr8aPeer::ORG_ID_TYPE => 2, ContribCompanyIr8aPeer::ORG_ID_NO => 3, ContribCompanyIr8aPeer::NANO_ORG_ID => 4, ContribCompanyIr8aPeer::AUTHORIZED_PERSON => 5, ContribCompanyIr8aPeer::AUTH_DESIGNATION => 6, ContribCompanyIr8aPeer::TEL_NO => 7, ContribCompanyIr8aPeer::EMPLOYER => 8, ContribCompanyIr8aPeer::EMAIL => 9, ContribCompanyIr8aPeer::CREATED_BY => 10, ContribCompanyIr8aPeer::DATE_CREATED => 11, ContribCompanyIr8aPeer::MODIFIED_BY => 12, ContribCompanyIr8aPeer::DATE_MODIFIED => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'source' => 1, 'org_id_type' => 2, 'org_id_no' => 3, 'nano_org_id' => 4, 'authorized_person' => 5, 'auth_designation' => 6, 'tel_no' => 7, 'employer' => 8, 'email' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/ContribCompanyIr8aMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.ContribCompanyIr8aMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContribCompanyIr8aPeer::getTableMap();
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
		return str_replace(ContribCompanyIr8aPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::ID);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::SOURCE);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::ORG_ID_TYPE);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::ORG_ID_NO);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::NANO_ORG_ID);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::AUTHORIZED_PERSON);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::AUTH_DESIGNATION);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::TEL_NO);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::EMPLOYER);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::EMAIL);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::CREATED_BY);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::DATE_CREATED);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::MODIFIED_BY);

		$criteria->addSelectColumn(ContribCompanyIr8aPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(contrib_company_ir8a.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contrib_company_ir8a.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContribCompanyIr8aPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContribCompanyIr8aPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContribCompanyIr8aPeer::doSelectRS($criteria, $con);
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
		$objects = ContribCompanyIr8aPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContribCompanyIr8aPeer::populateObjects(ContribCompanyIr8aPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContribCompanyIr8aPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContribCompanyIr8aPeer::getOMClass();
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
		return ContribCompanyIr8aPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ContribCompanyIr8aPeer::ID); 

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
			$comparison = $criteria->getComparison(ContribCompanyIr8aPeer::ID);
			$selectCriteria->add(ContribCompanyIr8aPeer::ID, $criteria->remove(ContribCompanyIr8aPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ContribCompanyIr8aPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContribCompanyIr8aPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContribCompanyIr8a) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContribCompanyIr8aPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ContribCompanyIr8a $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContribCompanyIr8aPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContribCompanyIr8aPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContribCompanyIr8aPeer::DATABASE_NAME, ContribCompanyIr8aPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContribCompanyIr8aPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContribCompanyIr8aPeer::DATABASE_NAME);

		$criteria->add(ContribCompanyIr8aPeer::ID, $pk);


		$v = ContribCompanyIr8aPeer::doSelect($criteria, $con);

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
			$criteria->add(ContribCompanyIr8aPeer::ID, $pks, Criteria::IN);
			$objs = ContribCompanyIr8aPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContribCompanyIr8aPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/ContribCompanyIr8aMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.ContribCompanyIr8aMapBuilder');
}
