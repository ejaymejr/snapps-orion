<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'hr');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();

if (Date('d') >= 7):
	$sdt = DateUtils::GetThisMonthStartDate();
	$edt = DateUtils::GetThisMonthEndDate();
else:
	$sdt = DateUtils::GetPrevMonthStartDate();
	$edt = DateUtils::GetPrevMonthEndDate();
endif;
// echo Date('d').' || '. $sdt . ' : ' . $edt ;
// exit();
//$sdt = '2013-05-01';
//$edt = '2013-05-31';
$cdt = $sdt;
$extra = new PayComputeExtra();
while($cdt <= $edt ):
	echo $cdt . ": ";
	echo "Starting... please wait... \n";
	$dailyRecord = TkAttendancePeer::GetDailyRecord($cdt);
	echo "Preparing DTR Data... \n";
	$extra->AutoTopUp12HrsShift($dailyRecord);
	$cdt = DateUtils::AddDate($cdt, 1);
endwhile;
$extra->AutoTopUp12HrsShiftEmployeeNo('035595937090712', $sdt, $edt); //selvaraj
$extra->AutoTopUp12HrsShiftEmployeeNo('035129375240712', $sdt, $edt); //palanichamy
$extra->AutoTopUp12HrsShiftEmployeeNo('035737235060812', $sdt, $edt); //arockiasamy
