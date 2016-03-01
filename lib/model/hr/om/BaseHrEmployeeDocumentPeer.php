<?php


abstract class BaseHrEmployeeDocumentPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_employee_document';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrEmployeeDocument';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_employee_document.ID';

	
	const EMPLOYEE_NO = 'hr_employee_document.EMPLOYEE_NO';

	
	const NAME = 'hr_employee_document.NAME';

	
	const FILE_NAME = 'hr_employee_document.FILE_NAME';

	
	const FILE_NAME_ORIGINAL = 'hr_employee_document.FILE_NAME_ORIGINAL';

	
	const MIME_TYPE = 'hr_employee_document.MIME_TYPE';

	
	const SIZE = 'hr_employee_document.SIZE';

	
	const DESCRIPTION = 'hr_employee_document.DESCRIPTION';

	
	const CREATED_BY = 'hr_employee_document.CREATED_BY';

	
	const DATE_CREATED = 'hr_employee_document.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_employee_document.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_employee_document.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EmployeeNo', 'Name', 'FileName', 'FileNameOriginal', 'MimeType', 'Size', 'Description', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDocumentPeer::ID, HrEmployeeDocumentPeer::EMPLOYEE_NO, HrEmployeeDocumentPeer::NAME, HrEmployeeDocumentPeer::FILE_NAME, HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL, HrEmployeeDocumentPeer::MIME_TYPE, HrEmployeeDocumentPeer::SIZE, HrEmployeeDocumentPeer::DESCRIPTION, HrEmployeeDocumentPeer::CREATED_BY, HrEmployeeDocumentPeer::DATE_CREATED, HrEmployeeDocumentPeer::MODIFIED_BY, HrEmployeeDocumentPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'employee_no', 'name', 'file_name', 'file_name_original', 'mime_type', 'size', 'description', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EmployeeNo' => 1, 'Name' => 2, 'FileName' => 3, 'FileNameOriginal' => 4, 'MimeType' => 5, 'Size' => 6, 'Description' => 7, 'CreatedBy' => 8, 'DateCreated' => 9, 'ModifiedBy' => 10, 'DateModified' => 11, ),
		BasePeer::TYPE_COLNAME => array (HrEmployeeDocumentPeer::ID => 0, HrEmployeeDocumentPeer::EMPLOYEE_NO => 1, HrEmployeeDocumentPeer::NAME => 2, HrEmployeeDocumentPeer::FILE_NAME => 3, HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL => 4, HrEmployeeDocumentPeer::MIME_TYPE => 5, HrEmployeeDocumentPeer::SIZE => 6, HrEmployeeDocumentPeer::DESCRIPTION => 7, HrEmployeeDocumentPeer::CREATED_BY => 8, HrEmployeeDocumentPeer::DATE_CREATED => 9, HrEmployeeDocumentPeer::MODIFIED_BY => 10, HrEmployeeDocumentPeer::DATE_MODIFIED => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'employee_no' => 1, 'name' => 2, 'file_name' => 3, 'file_name_original' => 4, 'mime_type' => 5, 'size' => 6, 'description' => 7, 'created_by' => 8, 'date_created' => 9, 'modified_by' => 10, 'date_modified' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrEmployeeDocumentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrEmployeeDocumentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrEmployeeDocumentPeer::getTableMap();
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
		return str_replace(HrEmployeeDocumentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::ID);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::EMPLOYEE_NO);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::NAME);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::FILE_NAME);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::FILE_NAME_ORIGINAL);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::MIME_TYPE);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::SIZE);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::DESCRIPTION);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::CREATED_BY);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrEmployeeDocumentPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(hr_employee_document.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_employee_document.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrEmployeeDocumentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrEmployeeDocumentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrEmployeeDocumentPeer::doSelectRS($criteria, $con);
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
		$objects = HrEmployeeDocumentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrEmployeeDocumentPeer::populateObjects(HrEmployeeDocumentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrEmployeeDocumentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrEmployeeDocumentPeer::getOMClass();
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
		return HrEmployeeDocumentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrEmployeeDocumentPeer::ID); 

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
			$comparison = $criteria->getComparison(HrEmployeeDocumentPeer::ID);
			$selectCriteria->add(HrEmployeeDocumentPeer::ID, $criteria->remove(HrEmployeeDocumentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrEmployeeDocumentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrEmployeeDocumentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrEmployeeDocument) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrEmployeeDocumentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrEmployeeDocument $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrEmployeeDocumentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrEmployeeDocumentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrEmployeeDocumentPeer::DATABASE_NAME, HrEmployeeDocumentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrEmployeeDocumentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrEmployeeDocumentPeer::DATABASE_NAME);

		$criteria->add(HrEmployeeDocumentPeer::ID, $pk);


		$v = HrEmployeeDocumentPeer::doSelect($criteria, $con);

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
			$criteria->add(HrEmployeeDocumentPeer::ID, $pks, Criteria::IN);
			$objs = HrEmployeeDocumentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrEmployeeDocumentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrEmployeeDocumentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrEmployeeDocumentMapBuilder');
}
