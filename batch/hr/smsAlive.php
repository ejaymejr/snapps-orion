<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'hr');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();

$space = Date('Y-m-d h:i:s');
$file = "diskspace.txt";
$filename = $file;
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$space .= "\n". substr(trim($contents), -15);
//$space = $space ;
//echo $space;
SmsMessageoutPeer::SendMessage($space,'93828689');

?>
