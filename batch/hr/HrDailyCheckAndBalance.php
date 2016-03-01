<?php
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/../..'));
define('SF_APP',         'hr');
define('SF_ENVIRONMENT', 'prod');
define('SF_DEBUG',       false);


require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
$databaseManager = new sfDatabaseManager();
$databaseManager->initialize();

$basicData = PayBasicPayPeer::GetListOfCitizenshipBelow3Years();
foreach( $basicData as $r):
	$mess = ' Citizenship Unchange.';
	$empNo = $r->getEmployeeNo();
	$empIC = HrEmployeeIcPeer::GetDataByEmployeeNo($empNo);
	$yDiff = 0;
	if ($empIC):
		$dIssue = $empIC->getDateOfIssue();
		if ($dIssue > 0 ):
			$mDiff = DateUtils::DateDiff('m', $dIssue, DateUtils::DUNow());
			$citizenship = 0;
			$yDiff = $mDiff/12;
			if ($yDiff >= 0 and $yDiff <= 1.99):
				 $citizenship = 1;
				 $mess = ' CPF Citizenship has been updated to 1st year.';
			endif;  
			if ($yDiff >= 2 and $yDiff <= 2.99):
				 $citizenship = 2;
				 $mess = ' CPF Citizenship has been updated to 2 year.';
			endif;  
			if ($yDiff >= 3 ):
				 $citizenship = 3;
				 $mess = ' CPF Citizenship has been updated to 3 year.';
			endif;  		
			if ($citizenship > 0):
				$r->setCpfCitizenship($citizenship);
				$r->save();
			endif;
		endif;
	endif;
	echo $r->getName() . ' - ' . $r->getCpfCitizenship() . ' : (' . $yDiff . ')  ' . $mess ."\n";
endforeach;


//-------------------------------- recompute leaves
		$emp = HrEmployeePeer::GetActiveEmployeeList();
		$req  = new PayComputeExtra();  //request object computecredits
		$data = '';
		$fiscal = HrFiscalYearPeer::getFiscalYear();
		$user = 'CRON SYSTEM (HrDailyCheckandBalance)';
		//$emp = array('S7571257Z'=>'MOO YING KWAN');
		foreach ($emp as $empNo=>$ve)
		{
			if ($empNo)
			{
				//$data = $data . '<br>' . $req->computecredits($ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
				//$this->UpdateLeave($req, $ke, sfConfig::get('fiscal_year'), $this->getUser()->getUsername());
				$req->UpdateFromGlobalLeave($empNo, $fiscal, $user);
				$req->UpdateFromPersonalizedLeave($empNo, $fiscal, $user)  ;
				$req->UpdateConsumedLeave($empNo, $fiscal, $user,'Annual Leave');
				echo $empNo . ': '. $ve ."\n";

			}
		}

 
?>