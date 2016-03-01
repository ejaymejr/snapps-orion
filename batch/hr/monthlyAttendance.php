<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'hr');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();

$sdt = DateUtils::GetThisMonthStartDate();
//$sdt = '2007-12-01';
$edt = DateUtils::GetThisMonthEndDate();
$batch = DateUtils::DUFormat("Ymd",$sdt).'-'.DateUtils::DUFormat("Ymd",$edt) ;
echo "Starting... please wait... \n";
$emparr = TkDtrmasterPeer::GetAllEmployeeNo();
$extra = new PayComputeExtra();
echo "Preparing DTR Data... \n";
$extra->PrepareDtrData($emparr, $sdt, $edt, 'CRON SYSTEM');
$cnt =1;
echo "Preparing DTR Summary... \n";
foreach ($emparr as $emp){
	$cnt++;
	echo $cnt . '. '. $emp->getEmployeeNo(). ' - ' . $emp->getName() . "\n";
	$extra->BuildDtrsummary($emp->getEmployeeNo(), $sdt,$edt, 'CRON SYSTEM', $batch);
}
if (!$emparr){
	echo "Employee Not Found! \n";
}else{
	echo "Finished! \n";
}
?>
