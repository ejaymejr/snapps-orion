<?php

/**
 * home actions.
 *
 * @package    snapps
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends SnappsActions
{
  /**publ
   * Executes index action
   *
   */
  public function executeIndex()
  {

  }
  
  public function executeImport()
  {
  	$curdate = HrCurrentMonthPeer::GetCurrent();
  	$sdate = $curdate['start'];
  	$edate = $curdate['end'];
  	$sdate = '2013-01-01';
  	$edate = '2013-07-23';
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
  }
}
