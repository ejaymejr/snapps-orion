<?php


abstract class BaseHrShortlistedApplicantPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'hr_shortlisted_applicant';

	
	const CLASS_DEFAULT = 'lib.model.hr.HrShortlistedApplicant';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'hr_shortlisted_applicant.ID';

	
	const LASTNAME = 'hr_shortlisted_applicant.LASTNAME';

	
	const FIRSTNAME = 'hr_shortlisted_applicant.FIRSTNAME';

	
	const MIDNAME = 'hr_shortlisted_applicant.MIDNAME';

	
	const POSITION_APPLIED_FOR = 'hr_shortlisted_applicant.POSITION_APPLIED_FOR';

	
	const CHINESE_NAME = 'hr_shortlisted_applicant.CHINESE_NAME';

	
	const BIRTH_DATE = 'hr_shortlisted_applicant.BIRTH_DATE';

	
	const BIRTH_PLACE = 'hr_shortlisted_applicant.BIRTH_PLACE';

	
	const STREET = 'hr_shortlisted_applicant.STREET';

	
	const BLDG_ROOM_NO = 'hr_shortlisted_applicant.BLDG_ROOM_NO';

	
	const CITY = 'hr_shortlisted_applicant.CITY';

	
	const PROVINCE = 'hr_shortlisted_applicant.PROVINCE';

	
	const ZIP_CODE = 'hr_shortlisted_applicant.ZIP_CODE';

	
	const TEL_NO = 'hr_shortlisted_applicant.TEL_NO';

	
	const CELL_NO = 'hr_shortlisted_applicant.CELL_NO';

	
	const EMAIL_ADD = 'hr_shortlisted_applicant.EMAIL_ADD';

	
	const SEX = 'hr_shortlisted_applicant.SEX';

	
	const REMARKS = 'hr_shortlisted_applicant.REMARKS';

	
	const CREATED_BY = 'hr_shortlisted_applicant.CREATED_BY';

	
	const DATE_CREATED = 'hr_shortlisted_applicant.DATE_CREATED';

	
	const MODIFIED_BY = 'hr_shortlisted_applicant.MODIFIED_BY';

	
	const DATE_MODIFIED = 'hr_shortlisted_applicant.DATE_MODIFIED';

	
	const HR_EMPLOYEE_ID = 'hr_shortlisted_applicant.HR_EMPLOYEE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Lastname', 'Firstname', 'Midname', 'PositionAppliedFor', 'ChineseName', 'BirthDate', 'BirthPlace', 'Street', 'BldgRoomNo', 'City', 'Province', 'ZipCode', 'TelNo', 'CellNo', 'EmailAdd', 'Sex', 'Remarks', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'HrEmployeeId', ),
		BasePeer::TYPE_COLNAME => array (HrShortlistedApplicantPeer::ID, HrShortlistedApplicantPeer::LASTNAME, HrShortlistedApplicantPeer::FIRSTNAME, HrShortlistedApplicantPeer::MIDNAME, HrShortlistedApplicantPeer::POSITION_APPLIED_FOR, HrShortlistedApplicantPeer::CHINESE_NAME, HrShortlistedApplicantPeer::BIRTH_DATE, HrShortlistedApplicantPeer::BIRTH_PLACE, HrShortlistedApplicantPeer::STREET, HrShortlistedApplicantPeer::BLDG_ROOM_NO, HrShortlistedApplicantPeer::CITY, HrShortlistedApplicantPeer::PROVINCE, HrShortlistedApplicantPeer::ZIP_CODE, HrShortlistedApplicantPeer::TEL_NO, HrShortlistedApplicantPeer::CELL_NO, HrShortlistedApplicantPeer::EMAIL_ADD, HrShortlistedApplicantPeer::SEX, HrShortlistedApplicantPeer::REMARKS, HrShortlistedApplicantPeer::CREATED_BY, HrShortlistedApplicantPeer::DATE_CREATED, HrShortlistedApplicantPeer::MODIFIED_BY, HrShortlistedApplicantPeer::DATE_MODIFIED, HrShortlistedApplicantPeer::HR_EMPLOYEE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'lastname', 'firstname', 'midname', 'position_applied_for', 'chinese_name', 'birth_date', 'birth_place', 'street', 'bldg_room_no', 'city', 'province', 'zip_code', 'tel_no', 'cell_no', 'email_add', 'sex', 'remarks', 'created_by', 'date_created', 'modified_by', 'date_modified', 'hr_employee_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Lastname' => 1, 'Firstname' => 2, 'Midname' => 3, 'PositionAppliedFor' => 4, 'ChineseName' => 5, 'BirthDate' => 6, 'BirthPlace' => 7, 'Street' => 8, 'BldgRoomNo' => 9, 'City' => 10, 'Province' => 11, 'ZipCode' => 12, 'TelNo' => 13, 'CellNo' => 14, 'EmailAdd' => 15, 'Sex' => 16, 'Remarks' => 17, 'CreatedBy' => 18, 'DateCreated' => 19, 'ModifiedBy' => 20, 'DateModified' => 21, 'HrEmployeeId' => 22, ),
		BasePeer::TYPE_COLNAME => array (HrShortlistedApplicantPeer::ID => 0, HrShortlistedApplicantPeer::LASTNAME => 1, HrShortlistedApplicantPeer::FIRSTNAME => 2, HrShortlistedApplicantPeer::MIDNAME => 3, HrShortlistedApplicantPeer::POSITION_APPLIED_FOR => 4, HrShortlistedApplicantPeer::CHINESE_NAME => 5, HrShortlistedApplicantPeer::BIRTH_DATE => 6, HrShortlistedApplicantPeer::BIRTH_PLACE => 7, HrShortlistedApplicantPeer::STREET => 8, HrShortlistedApplicantPeer::BLDG_ROOM_NO => 9, HrShortlistedApplicantPeer::CITY => 10, HrShortlistedApplicantPeer::PROVINCE => 11, HrShortlistedApplicantPeer::ZIP_CODE => 12, HrShortlistedApplicantPeer::TEL_NO => 13, HrShortlistedApplicantPeer::CELL_NO => 14, HrShortlistedApplicantPeer::EMAIL_ADD => 15, HrShortlistedApplicantPeer::SEX => 16, HrShortlistedApplicantPeer::REMARKS => 17, HrShortlistedApplicantPeer::CREATED_BY => 18, HrShortlistedApplicantPeer::DATE_CREATED => 19, HrShortlistedApplicantPeer::MODIFIED_BY => 20, HrShortlistedApplicantPeer::DATE_MODIFIED => 21, HrShortlistedApplicantPeer::HR_EMPLOYEE_ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'lastname' => 1, 'firstname' => 2, 'midname' => 3, 'position_applied_for' => 4, 'chinese_name' => 5, 'birth_date' => 6, 'birth_place' => 7, 'street' => 8, 'bldg_room_no' => 9, 'city' => 10, 'province' => 11, 'zip_code' => 12, 'tel_no' => 13, 'cell_no' => 14, 'email_add' => 15, 'sex' => 16, 'remarks' => 17, 'created_by' => 18, 'date_created' => 19, 'modified_by' => 20, 'date_modified' => 21, 'hr_employee_id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/HrShortlistedApplicantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.HrShortlistedApplicantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HrShortlistedApplicantPeer::getTableMap();
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
		return str_replace(HrShortlistedApplicantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::ID);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::LASTNAME);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::FIRSTNAME);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::MIDNAME);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::POSITION_APPLIED_FOR);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::CHINESE_NAME);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::BIRTH_DATE);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::BIRTH_PLACE);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::STREET);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::BLDG_ROOM_NO);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::CITY);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::PROVINCE);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::ZIP_CODE);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::TEL_NO);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::CELL_NO);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::EMAIL_ADD);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::SEX);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::REMARKS);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::CREATED_BY);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::DATE_CREATED);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::MODIFIED_BY);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(HrShortlistedApplicantPeer::HR_EMPLOYEE_ID);

	}

	const COUNT = 'COUNT(hr_shortlisted_applicant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hr_shortlisted_applicant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HrShortlistedApplicantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HrShortlistedApplicantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HrShortlistedApplicantPeer::doSelectRS($criteria, $con);
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
		$objects = HrShortlistedApplicantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HrShortlistedApplicantPeer::populateObjects(HrShortlistedApplicantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HrShortlistedApplicantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HrShortlistedApplicantPeer::getOMClass();
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
		return HrShortlistedApplicantPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HrShortlistedApplicantPeer::ID); 

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
			$comparison = $criteria->getComparison(HrShortlistedApplicantPeer::ID);
			$selectCriteria->add(HrShortlistedApplicantPeer::ID, $criteria->remove(HrShortlistedApplicantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HrShortlistedApplicantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HrShortlistedApplicantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof HrShortlistedApplicant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HrShortlistedApplicantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(HrShortlistedApplicant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HrShortlistedApplicantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HrShortlistedApplicantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HrShortlistedApplicantPeer::DATABASE_NAME, HrShortlistedApplicantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HrShortlistedApplicantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HrShortlistedApplicantPeer::DATABASE_NAME);

		$criteria->add(HrShortlistedApplicantPeer::ID, $pk);


		$v = HrShortlistedApplicantPeer::doSelect($criteria, $con);

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
			$criteria->add(HrShortlistedApplicantPeer::ID, $pks, Criteria::IN);
			$objs = HrShortlistedApplicantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHrShortlistedApplicantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/HrShortlistedApplicantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.HrShortlistedApplicantMapBuilder');
}
