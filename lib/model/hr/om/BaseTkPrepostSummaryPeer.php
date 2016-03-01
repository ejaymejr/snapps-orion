<?php


abstract class BaseTkPrepostSummaryPeer {

	
	const DATABASE_NAME = 'hr';

	
	const TABLE_NAME = 'tk_prepost_summary';

	
	const CLASS_DEFAULT = 'lib.model.hr.TkPrepostSummary';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'tk_prepost_summary.ID';

	
	const PREPOST_BATCH = 'tk_prepost_summary.PREPOST_BATCH';

	
	const DESCRIPTION = 'tk_prepost_summary.DESCRIPTION';

	
	const OT_HR = 'tk_prepost_summary.OT_HR';

	
	const UT_HR = 'tk_prepost_summary.UT_HR';

	
	const ABSENCES_HR = 'tk_prepost_summary.ABSENCES_HR';

	
	const OT_PAY = 'tk_prepost_summary.OT_PAY';

	
	const UT_DED = 'tk_prepost_summary.UT_DED';

	
	const ABSENCES_DED = 'tk_prepost_summary.ABSENCES_DED';

	
	const POST_BATCH = 'tk_prepost_summary.POST_BATCH';

	
	const CREATED_BY = 'tk_prepost_summary.CREATED_BY';

	
	const DATE_CREATED = 'tk_prepost_summary.DATE_CREATED';

	
	const MODIFIED_BY = 'tk_prepost_summary.MODIFIED_BY';

	
	const DATE_MODIFIED = 'tk_prepost_summary.DATE_MODIFIED';

	
	const TK_DTRMASTER_ID = 'tk_prepost_summary.TK_DTRMASTER_ID';

	
	const TK_DTRSUMMARY_ID = 'tk_prepost_summary.TK_DTRSUMMARY_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PrepostBatch', 'Description', 'OtHr', 'UtHr', 'AbsencesHr', 'OtPay', 'UtDed', 'AbsencesDed', 'PostBatch', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', 'TkDtrmasterId', 'TkDtrsummaryId', ),
		BasePeer::TYPE_COLNAME => array (TkPrepostSummaryPeer::ID, TkPrepostSummaryPeer::PREPOST_BATCH, TkPrepostSummaryPeer::DESCRIPTION, TkPrepostSummaryPeer::OT_HR, TkPrepostSummaryPeer::UT_HR, TkPrepostSummaryPeer::ABSENCES_HR, TkPrepostSummaryPeer::OT_PAY, TkPrepostSummaryPeer::UT_DED, TkPrepostSummaryPeer::ABSENCES_DED, TkPrepostSummaryPeer::POST_BATCH, TkPrepostSummaryPeer::CREATED_BY, TkPrepostSummaryPeer::DATE_CREATED, TkPrepostSummaryPeer::MODIFIED_BY, TkPrepostSummaryPeer::DATE_MODIFIED, TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'prepost_batch', 'description', 'ot_hr', 'ut_hr', 'absences_hr', 'ot_pay', 'ut_ded', 'absences_ded', 'post_batch', 'created_by', 'date_created', 'modified_by', 'date_modified', 'tk_dtrmaster_id', 'tk_dtrsummary_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PrepostBatch' => 1, 'Description' => 2, 'OtHr' => 3, 'UtHr' => 4, 'AbsencesHr' => 5, 'OtPay' => 6, 'UtDed' => 7, 'AbsencesDed' => 8, 'PostBatch' => 9, 'CreatedBy' => 10, 'DateCreated' => 11, 'ModifiedBy' => 12, 'DateModified' => 13, 'TkDtrmasterId' => 14, 'TkDtrsummaryId' => 15, ),
		BasePeer::TYPE_COLNAME => array (TkPrepostSummaryPeer::ID => 0, TkPrepostSummaryPeer::PREPOST_BATCH => 1, TkPrepostSummaryPeer::DESCRIPTION => 2, TkPrepostSummaryPeer::OT_HR => 3, TkPrepostSummaryPeer::UT_HR => 4, TkPrepostSummaryPeer::ABSENCES_HR => 5, TkPrepostSummaryPeer::OT_PAY => 6, TkPrepostSummaryPeer::UT_DED => 7, TkPrepostSummaryPeer::ABSENCES_DED => 8, TkPrepostSummaryPeer::POST_BATCH => 9, TkPrepostSummaryPeer::CREATED_BY => 10, TkPrepostSummaryPeer::DATE_CREATED => 11, TkPrepostSummaryPeer::MODIFIED_BY => 12, TkPrepostSummaryPeer::DATE_MODIFIED => 13, TkPrepostSummaryPeer::TK_DTRMASTER_ID => 14, TkPrepostSummaryPeer::TK_DTRSUMMARY_ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'prepost_batch' => 1, 'description' => 2, 'ot_hr' => 3, 'ut_hr' => 4, 'absences_hr' => 5, 'ot_pay' => 6, 'ut_ded' => 7, 'absences_ded' => 8, 'post_batch' => 9, 'created_by' => 10, 'date_created' => 11, 'modified_by' => 12, 'date_modified' => 13, 'tk_dtrmaster_id' => 14, 'tk_dtrsummary_id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hr/map/TkPrepostSummaryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hr.map.TkPrepostSummaryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TkPrepostSummaryPeer::getTableMap();
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
		return str_replace(TkPrepostSummaryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TkPrepostSummaryPeer::ID);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::PREPOST_BATCH);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::DESCRIPTION);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::OT_HR);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::UT_HR);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::ABSENCES_HR);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::OT_PAY);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::UT_DED);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::ABSENCES_DED);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::POST_BATCH);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::CREATED_BY);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::DATE_CREATED);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::MODIFIED_BY);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::DATE_MODIFIED);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::TK_DTRMASTER_ID);

		$criteria->addSelectColumn(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID);

	}

	const COUNT = 'COUNT(tk_prepost_summary.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tk_prepost_summary.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
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
		$objects = TkPrepostSummaryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TkPrepostSummaryPeer::populateObjects(TkPrepostSummaryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TkPrepostSummaryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TkPrepostSummaryPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTkDtrmaster(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTkDtrsummary(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTkDtrmaster(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TkPrepostSummaryPeer::addSelectColumns($c);
		$startcol = (TkPrepostSummaryPeer::NUM_COLUMNS - TkPrepostSummaryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TkDtrmasterPeer::addSelectColumns($c);

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TkPrepostSummaryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TkDtrmasterPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTkDtrmaster(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTkPrepostSummary($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTkPrepostSummarys();
				$obj2->addTkPrepostSummary($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTkDtrsummary(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TkPrepostSummaryPeer::addSelectColumns($c);
		$startcol = (TkPrepostSummaryPeer::NUM_COLUMNS - TkPrepostSummaryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TkDtrsummaryPeer::addSelectColumns($c);

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TkPrepostSummaryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TkDtrsummaryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTkDtrsummary(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTkPrepostSummary($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTkPrepostSummarys();
				$obj2->addTkPrepostSummary($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
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

		TkPrepostSummaryPeer::addSelectColumns($c);
		$startcol2 = (TkPrepostSummaryPeer::NUM_COLUMNS - TkPrepostSummaryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TkDtrmasterPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TkDtrmasterPeer::NUM_COLUMNS;

		TkDtrsummaryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TkDtrsummaryPeer::NUM_COLUMNS;

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TkPrepostSummaryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TkDtrmasterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTkDtrmaster(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTkPrepostSummary($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTkPrepostSummarys();
				$obj2->addTkPrepostSummary($obj1);
			}


					
			$omClass = TkDtrsummaryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTkDtrsummary(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTkPrepostSummary($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initTkPrepostSummarys();
				$obj3->addTkPrepostSummary($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTkDtrmaster(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTkDtrsummary(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TkPrepostSummaryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);

		$rs = TkPrepostSummaryPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTkDtrmaster(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TkPrepostSummaryPeer::addSelectColumns($c);
		$startcol2 = (TkPrepostSummaryPeer::NUM_COLUMNS - TkPrepostSummaryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TkDtrsummaryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TkDtrsummaryPeer::NUM_COLUMNS;

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRSUMMARY_ID, TkDtrsummaryPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TkPrepostSummaryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TkDtrsummaryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTkDtrsummary(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTkPrepostSummary($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTkPrepostSummarys();
				$obj2->addTkPrepostSummary($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTkDtrsummary(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TkPrepostSummaryPeer::addSelectColumns($c);
		$startcol2 = (TkPrepostSummaryPeer::NUM_COLUMNS - TkPrepostSummaryPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TkDtrmasterPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TkDtrmasterPeer::NUM_COLUMNS;

		$c->addJoin(TkPrepostSummaryPeer::TK_DTRMASTER_ID, TkDtrmasterPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TkPrepostSummaryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TkDtrmasterPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTkDtrmaster(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTkPrepostSummary($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTkPrepostSummarys();
				$obj2->addTkPrepostSummary($obj1);
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
		return TkPrepostSummaryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TkPrepostSummaryPeer::ID); 

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
			$comparison = $criteria->getComparison(TkPrepostSummaryPeer::ID);
			$selectCriteria->add(TkPrepostSummaryPeer::ID, $criteria->remove(TkPrepostSummaryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TkPrepostSummaryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TkPrepostSummaryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TkPrepostSummary) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TkPrepostSummaryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TkPrepostSummary $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TkPrepostSummaryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TkPrepostSummaryPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TkPrepostSummaryPeer::DATABASE_NAME, TkPrepostSummaryPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TkPrepostSummaryPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TkPrepostSummaryPeer::DATABASE_NAME);

		$criteria->add(TkPrepostSummaryPeer::ID, $pk);


		$v = TkPrepostSummaryPeer::doSelect($criteria, $con);

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
			$criteria->add(TkPrepostSummaryPeer::ID, $pks, Criteria::IN);
			$objs = TkPrepostSummaryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTkPrepostSummaryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hr/map/TkPrepostSummaryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hr.map.TkPrepostSummaryMapBuilder');
}
