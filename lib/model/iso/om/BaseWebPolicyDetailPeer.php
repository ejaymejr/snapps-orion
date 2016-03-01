<?php


abstract class BaseWebPolicyDetailPeer {

	
	const DATABASE_NAME = 'iso';

	
	const TABLE_NAME = 'web_policy_detail';

	
	const CLASS_DEFAULT = 'lib.model.iso.WebPolicyDetail';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'web_policy_detail.ID';

	
	const CONTENT = 'web_policy_detail.CONTENT';

	
	const WEB_POLICY_HEADER_ID = 'web_policy_detail.WEB_POLICY_HEADER_ID';

	
	const INDEX_NO = 'web_policy_detail.INDEX_NO';

	
	const DATE_CREATED = 'web_policy_detail.DATE_CREATED';

	
	const CREATED_BY = 'web_policy_detail.CREATED_BY';

	
	const DATE_MODIFIED = 'web_policy_detail.DATE_MODIFIED';

	
	const MODIFIED_BY = 'web_policy_detail.MODIFIED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Content', 'WebPolicyHeaderId', 'IndexNo', 'DateCreated', 'CreatedBy', 'DateModified', 'ModifiedBy', ),
		BasePeer::TYPE_COLNAME => array (WebPolicyDetailPeer::ID, WebPolicyDetailPeer::CONTENT, WebPolicyDetailPeer::WEB_POLICY_HEADER_ID, WebPolicyDetailPeer::INDEX_NO, WebPolicyDetailPeer::DATE_CREATED, WebPolicyDetailPeer::CREATED_BY, WebPolicyDetailPeer::DATE_MODIFIED, WebPolicyDetailPeer::MODIFIED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'content', 'web_policy_header_id', 'index_no', 'date_created', 'created_by', 'date_modified', 'modified_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Content' => 1, 'WebPolicyHeaderId' => 2, 'IndexNo' => 3, 'DateCreated' => 4, 'CreatedBy' => 5, 'DateModified' => 6, 'ModifiedBy' => 7, ),
		BasePeer::TYPE_COLNAME => array (WebPolicyDetailPeer::ID => 0, WebPolicyDetailPeer::CONTENT => 1, WebPolicyDetailPeer::WEB_POLICY_HEADER_ID => 2, WebPolicyDetailPeer::INDEX_NO => 3, WebPolicyDetailPeer::DATE_CREATED => 4, WebPolicyDetailPeer::CREATED_BY => 5, WebPolicyDetailPeer::DATE_MODIFIED => 6, WebPolicyDetailPeer::MODIFIED_BY => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'content' => 1, 'web_policy_header_id' => 2, 'index_no' => 3, 'date_created' => 4, 'created_by' => 5, 'date_modified' => 6, 'modified_by' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/iso/map/WebPolicyDetailMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.iso.map.WebPolicyDetailMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = WebPolicyDetailPeer::getTableMap();
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
		return str_replace(WebPolicyDetailPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(WebPolicyDetailPeer::ID);

		$criteria->addSelectColumn(WebPolicyDetailPeer::CONTENT);

		$criteria->addSelectColumn(WebPolicyDetailPeer::WEB_POLICY_HEADER_ID);

		$criteria->addSelectColumn(WebPolicyDetailPeer::INDEX_NO);

		$criteria->addSelectColumn(WebPolicyDetailPeer::DATE_CREATED);

		$criteria->addSelectColumn(WebPolicyDetailPeer::CREATED_BY);

		$criteria->addSelectColumn(WebPolicyDetailPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(WebPolicyDetailPeer::MODIFIED_BY);

	}

	const COUNT = 'COUNT(web_policy_detail.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT web_policy_detail.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(WebPolicyDetailPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(WebPolicyDetailPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = WebPolicyDetailPeer::doSelectRS($criteria, $con);
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
		$objects = WebPolicyDetailPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return WebPolicyDetailPeer::populateObjects(WebPolicyDetailPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			WebPolicyDetailPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = WebPolicyDetailPeer::getOMClass();
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
		return WebPolicyDetailPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(WebPolicyDetailPeer::ID); 

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
			$comparison = $criteria->getComparison(WebPolicyDetailPeer::ID);
			$selectCriteria->add(WebPolicyDetailPeer::ID, $criteria->remove(WebPolicyDetailPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(WebPolicyDetailPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(WebPolicyDetailPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof WebPolicyDetail) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(WebPolicyDetailPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(WebPolicyDetail $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(WebPolicyDetailPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(WebPolicyDetailPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(WebPolicyDetailPeer::DATABASE_NAME, WebPolicyDetailPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = WebPolicyDetailPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(WebPolicyDetailPeer::DATABASE_NAME);

		$criteria->add(WebPolicyDetailPeer::ID, $pk);


		$v = WebPolicyDetailPeer::doSelect($criteria, $con);

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
			$criteria->add(WebPolicyDetailPeer::ID, $pks, Criteria::IN);
			$objs = WebPolicyDetailPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseWebPolicyDetailPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/iso/map/WebPolicyDetailMapBuilder.php';
	Propel::registerMapBuilder('lib.model.iso.map.WebPolicyDetailMapBuilder');
}
