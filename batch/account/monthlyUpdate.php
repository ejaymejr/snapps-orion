<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'account');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();

	//--------------------------------------------- PROCESS PREVIOUS MONTH
//	$sdate = DateUtils::GetPrevMonthStartDate();
//	$edate = DateUtils::GetPrevMonthEndDate();
	//---------------- never update the previous month....
	$curdate = HrCurrentMonthPeer::GetCurrent();
	$sdate = $curdate['start'];
	$edate = $curdate['end'];
	$sdate = '2013-08-01';
	$edate = '2013-12-31';
	$year  = '2013';
	$co = '';
  	
  	//HrEmployeeDailyPeer::UpdateCpf($sdate, $edate, $user)
  	//HrEmployeeDailyPeer::UpdateActualCpf('20130101-20130131-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130201-20130228-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130301-20130331-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130401-20130430-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130501-20130531-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130601-20130630-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130701-20130731-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20130801-20130831-ALL-MONTHLY');
 	HrEmployeeDailyPeer::UpdateActualCpf('20130901-20130930-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20131001-20131031-ALL-MONTHLY');
 	//HrEmployeeDailyPeer::UpdateActualCpf('20131101-20131130-ALL-MONTHLY'); 	
	//HrEmployeeDailyPeer::UpdateActualCpf('20131201-20131231-ALL-MONTHLY');
  	//HrEmployeeDailyPeer::UpdateActualCpf('', true);  //use as forecast
?>
