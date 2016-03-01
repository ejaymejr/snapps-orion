<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'hr');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();
//$smsIn = new SmsMessageInPeer();

//var_dump(TkDtrmasterPeer::GetAllEmployeeNo());
//exit();
SmsMessageinPeer::ProcessRequestAttendanceOnly();

//echo "date: " ;
//echo Date('Y-m-d h:i:s');
//echo "\n";
?>