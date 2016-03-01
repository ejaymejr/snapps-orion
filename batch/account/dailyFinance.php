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
	$sdate = '2014-01-01';
//	$edate = '2009-12-31';
	$co = '';
	$user = 'SYSTEM';
	$br = "\n\r";
	echo '*------------------------------*'.$br;
	echo 'Processing '.date('F j, Y, g:i a') . $br;
	echo 'HR and Power Utility.'.$br;
	echo 'Processing the Period of: '.DateUtils::DUFormat('F j, Y', $sdate).' to ' .DateUtils::DUFormat('F j, Y', $edate) . $br;	
	echo '*------------------------------*'.$br;
//	var_dump($sdate);
//	var_dump($edate);
//	exit();
	FinanceSummaryPeer::DeleteData($sdate, $edate);
 	HrEmployeeDailyPeer::DeleteData($sdate, $edate);
  	echo 'Delete Data... Ok'.$br;
    HrEmployeeDailyPeer::UpdateDaily($sdate, $edate, $user);
  	echo 'Daily Computation... Ok'.$br;
  	HrEmployeeDailyPeer::UpdateCpf($sdate, $edate, $user);
  	echo 'Cpf... Ok'.$br;
  	$company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                    "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
  	foreach($company as $kcomp=>$co)
  	{
  		HrEmployeeDailyPeer::PostDailyData($sdate, $edate, $user, $co);
  	}
  	echo 'HR Posted... Ok'.$br;
  	PowerUsagePeer::PostDailyData($sdate, $edate, $user);
  	echo 'Utility - Power... Ok'.$br;
	echo 'Success!'.$br;
	
	
//	//--------------------------------------------- PROCESS CURRENT MONTH
//	$sdate = DateUtils::GetThisMonthStartDate();
//	$edate = DateUtils::GetThisMonthEndDate();
//	//---------------- never update the previous month....
////	$sdate = '2008-10-01';
////	$edate = '2008-10-30';
//	$co = '';
//	$user = 'SYSTEM';
//	$br = "\n\r";
//	echo '*------------------------------*'.$br;
//	echo 'Processing '.date('F j, Y, g:i a') . $br;
//	echo 'HR and Power Utility.'.$br;
//	echo 'Processing the Period of: '.DateUtils::DUFormat('F j, Y', $sdate).' to ' .DateUtils::DUFormat('F j, Y', $edate) . $br;
//	echo '*------------------------------*'.$br;
//	FinanceSummaryPeer::DeleteData($sdate, $edate);
// 	HrEmployeeDailyPeer::DeleteData($sdate, $edate);
//  	echo 'Delete Data... Ok'.$br;
//    HrEmployeeDailyPeer::UpdateDaily($sdate, $edate, $user);
//  	echo 'Daily Computation... Ok'.$br;
//  	HrEmployeeDailyPeer::UpdateCpf($sdate, $edate, $user);
//  	echo 'Cpf... Ok'.$br;
//  	$company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
//                    "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
//  	foreach($company as $kcomp=>$co)
//  	{
//  		HrEmployeeDailyPeer::PostDailyData($sdate, $edate, $user, $co);
//  	}
//  	echo 'HR Posted... Ok'.$br;
//  	PowerUsagePeer::PostDailyData($sdate, $edate, $user);
//  	echo 'Utility - Power... Ok'.$br;
//	echo 'Success!'.$br;	
?>
