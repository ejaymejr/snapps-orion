<?php

/**
 * Subclass for performing query and update operations on the 'hr_log' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class HrLogPeer extends BaseHrLogPeer
{
	public static function GetPager($cd)
	{
		$startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
		$rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
		$page = (int) ( ($startIndex + 1) / $rowsPerPage);
		if (( ($startIndex + 1) % $rowsPerPage) != 0) {
			$page++;
		}
	
		$page = sfContext::getInstance()->getRequest()->getParameter('page', 1);
	
		$c = clone($cd);
		$pager = new sfPropelPager('HrLog', $rowsPerPage);
	
		$pager->setCriteria($c);
		$pager->setPage($page);
		$pager->init();
		return $pager;
	}
	
	public static function Saver($log)
	{
		$con = Propel::getConnection(HrLogPeer::DATABASE_NAME);
		$sql = $con->getLastExecutedQuery();
//		$rec = new HrLog();
//		$rec->setUser($user);
//		$rec->setUserAction($action);
//		$rec->setDescription($sql);
//		$rec->setActionModule($actionModule);
//		$rec->setDateCreated(DateUtils::DUNow());
//		$rec->setEmployeeNo($empNo);
//		$rec->setPeriodCode($period);
//		$rec->setAcctCode($acct);
//		$rec->setBankCash($bankcash);
//		$rec->save();
		
	}
	
	public static function GetDataWhereDescriptionInsideTableList($tableList)
	{
		$c = new Criteria();
		$cArr = array();
		foreach ($tableList as $table):
			$cArr[] = $c->getNewCriterion(self::DESCRIPTION, '%' . $table . '%', Criteria::LIKE);
		endforeach;
		foreach ($cArr as $cc):
			$c->addOr($cc);
		endforeach;
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		return $rs;
	}
}
