<?php
class HrLib
{
	function __construct()
	{
	}

	function __destruct()
	{
	}

	static function DisplayArray($data){
		foreach($data as $kd=>$vd){
			echo 'key ['.$kd.']: '.$vd.'<br>';
		}
	}
	
	static function GetHrAdmin()
	{
		$authorizedUsers = array('emmanuel', 'melvin', 'terence', 'adeline', 'nyoman', 'florence');
		return $authorizedUsers;
	}
	static function ExecuteMercurySQL($db = null, $sql)
	{
		//mercury_online_garment
		$db = $db? $db : 'mercury_online_garment';
		$con = Propel::getConnection($db);
		$stmt = $con->PrepareStatement($sql);
		$rs = $stmt->executeQuery(ResultSet::FETCHMODE_ASSOC);
		return $rs;
//          $sql = "select * from garmentInformation order by customer, type, size";
//        	$res = RejectLib::ExecuteSQL('mercury_online_garment', $sql);
//			while ($res->next()):
//				$garments[ $res->getString('garment_code') ] = $res->getString('customer') .'_' . $res->getString('type') .'_' .$res->getString('size') .'_' .$res->getString('color') ;
//			endwhile;		
	}
	
	static function GetMercuryCustomerList()
	{
		$sql = "select customer from garmentInformation group by customer order by customer";
		$res = self::ExecuteMercurySQL('', $sql);
		$customer = array();
		while ($res->next()):
			$customer[ $res->getString('customer') ] = $res->getString('customer');
		endwhile;	
		$customer['WD MEDIA (SINGAPORE) PTE LTD'] = 'WD MEDIA (SINGAPORE) PTE LTD';
		return $customer;
	}


		
	static function GetMercuryColorList($customer= null)
	{
		$where = '';
		$sql = "select color from color_attr"; 
		if ($customer) $where .= 'customer= "' . $customer.'"';  
		if ($where) $where = ' where ' . $where;
		$sql .= $where .  " group by customer order by color";
//		var_dump($sql);
// 		exit();
		$res = self::ExecuteMercurySQL('', $sql);
		$color = array();
		while ($res->next()):
			$color[ $res->getString('color') ] = $res->getString('color');
		endwhile;
		return $color;
	}
	
	static function GetMercuryTypeList($customer= null)
	{
		//$sql = "select type from garmentInformation group by customer order by type";
		$where = '';
		$sql = "select type from type_attr";
		if ($customer) $where .= 'customer= "' . $customer.'"';
		if ($where) $where = ' where ' . $where;
		$sql .= $where .  " group by customer order by type";
		
		$res = self::ExecuteMercurySQL('', $sql);
		$gtype = array();
		while ($res->next()):
			$gtype[ $res->getString('type') ] = $res->getString('type');
		endwhile;
		return $gtype;
	}
	
	static function GetRejectAttrByCompany($co = null )
	{
		$co = $co ? $co : 'micronclean';
		$sql = "select * from reject_attr where customer = '".$co."' order by customer, garment_type, reason";
		$res = self::ExecuteMercurySQL('', $sql);
		$gtype = array();
		while ($res->next()):
			$gtype[ $res->getString('reason') ] = $res->getString('reason');
		endwhile;
		return $gtype;
	}
	
	static function GetMercurySizeList()
	{
		$sql = "select size from garmentInformation group by customer order by size";
		$res = self::ExecuteMercurySQL('', $sql);
		$size = array();
		while ($res->next()):
			$size[ $res->getString('size') ] = $res->getString('size');
		endwhile;
		return $size;
	}
	
	static function GetMercuryDepartmentList()
	{
		//$sql = "select department from department_attr where customer = 'seagate' order by department";
		$sql = "select department from department_attr order by department";
		$res = self::ExecuteMercurySQL("", $sql);
		$deptList = array();
		while ($res->next()):
			$deptList[ $res->getString('department') ] = $res->getString('department');
		endwhile;	
		return $deptList;
	}
	
	static function GetMercuryGarmentList($co = null)
	{
		//$sql = "select department from department_attr where customer = 'seagate' order by department";
		$coList = (implode("','", $co) );
		$where = '';
		if ($coList) $where = " where customer in ( '" . $coList . "' )";
		$sql = "select type from garmentInformation ".$where." group by type order by type";
		$res = self::ExecuteMercurySQL('', $sql);
		$garmentList = array();
		while ($res->next()):
			if ($res->getString('type') <> '')
			$garmentList[ $res->getString('type') ] =  self::ValueAsID($res->getString('type'));
		endwhile;
		//var_dump($garmentList);
		return $garmentList;
	}
	
	static function ValueAsID($value)
	{
		return str_replace(' ', '_', $value );
	}
	static function ExecuteSQL($sql)
	{
		$con = Propel::getConnection('hr');
		$stmt = $con->PrepareStatement($sql);
		$rs = $stmt->executeQuery(ResultSet::FETCHMODE_ASSOC);
		return $rs;
		//        $this->sql = "
		//        SELECT *
		//        FROM inventory_transaction
		//        WHERE transaction_date <= '" . $this->date . "'
		//        AND transaction_date > '2006-12-30'
		//        $wheres
		//        ORDER BY transaction_date DESC
		//        LIMIT 1
		//    ";

	}

	public function GetStartDate($pcode)
	{
		$dt = substr($pcode, 0, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}

	public function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}
	
	

	public function GenerateTextFile($period='sample')
	{
		$filename = $period.'.txt';
		$somecontent = "Add this to the file\n";

		// Let's make sure the file exists and is writable first.
		if (is_writable($filename)) {

			// In our example we're opening $filename in append mode.
			// The file pointer is at the bottom of the file hence
			// that's where $somecontent will go when we fwrite() it.
			if (!$handle = fopen($filename, 'a')) {
				echo "Cannot open file ($filename)";
				exit;
			}

			// Write $somecontent to our opened file.
			if (fwrite($handle, $somecontent) === FALSE) {
				echo "Cannot write to file ($filename)";
				exit;
			}

			echo "Success, wrote ($somecontent) to file ($filename)";

			fclose($handle);

		} else {
			echo "The file $filename is not writable";
		}

	}

	static function ShowLog()
	{
		echo ("
			<script type='text/javascript'>
			function open_win()
			{
				window.open('','_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400');
			}
			</script>
			");
		//echo javascript_tag("open_win();");
	}
	static function GetChartDataforNoDtr($empList)
	{
		foreach($empList as $empNo)
		{
				
		}
	}
	static function GetChartData($empList, $sdt, $edt)
	{
		$tReq    = array();
		$tAbs    = array();
		$tDura   = array();
		$tOt     = array();
		$tUt	 = array();
		$tMeal	 = array();
		$tDt     = array();
		$diff    = DateUtils::DateDiff('d', $sdt, $edt);
		$pos  	 = 0;
		$xpos    = 0;
		$tickLabels = '';
		$ballonLabels = '';
		$initLabels = false;
		$pntr	 = array();
		$empCnt  = 0;

		for($x=0; $x<=$diff; $x++)
		{
			$pntr[]    = DateUtils::AddDate($sdt, $x);
			$tOt []    = '';
			$tReq[]    = '';
			$tAbs[]    = '';
			$tDura[]   = '';
			$tUt[]     = '';
			$tMeal[]   = '';
			$tDt[]     = '';
			$tAllw[]   = '';
			$dPay[]    = 0;	//daily pay
			$otPay[]   = 0;
			$utDed[]   = 0;
			$meal[]    = 0;
			$allw[]    = 0;

		}
		$empData = array();
		$monthCnt = 0;
		foreach($empList as $empNo=>$eName)
		{
			$dtrData   = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdt, $edt);
			$allowance = PayBasicPayPeer::GetOptimizedDatabyEmployeeNo($empNo, array('allowance'));
			$dAll      = ($allowance) ? round($allowance->get('ALLOWANCE') / 26, 2) : 0;
			if ( $dtrData )
			{
				$cpos = 0;
				$monthCnt ++;
				//echo $empCnt .' - '. $empNo . '<br>';
				foreach ($dtrData as $rec)
				{
					$empCnt = $empCnt + (($rec->getAcDura() > 0)? 1: 0 );
					//------------------------ init labels on first pass
					if (!$initLabels)
					{
						$ballonLabels[]		 = $rec->getTransDate();
						$tickLabels[] 	 	 = DateUtils::DUFormat('d', $rec->getTransDate() );
					}

					//------------------------ search date before update
					$pos = $rec->getTransDate();
					if (in_array($pos, $pntr))
					{
						$xpos = array_search($pos, $pntr);
						$tOt[$xpos] 	= $tOt[$xpos]   + $rec->getOvertimes();
						$tReq[$xpos] 	= $tReq[$xpos]  + $rec->getNormal();
						$utDed[$xpos]   = $utDed[$xpos] + ($rec->getPostedAmount() < 0 ? $rec->getPostedAmount() : 0);
						$otPay[$xpos]   = $otPay[$xpos] + ($rec->getPostedAmount() > 0 ? $rec->getPostedAmount() : 0);
						$tMeal[$xpos]   = $tMeal[$xpos] + $rec->getMeal();
						$tAllw[$xpos]   = $tAllw[$xpos] + $dAll + $rec->getAllowance();
						$tDt[$xpos]     = $rec->getTransDate();
						if ( $rec->getUndertime() && $rec->getAttendance() != 'A')
						{
							$tUt[$xpos] = $tUt[$xpos] + ( $rec->getUndertime());
							$tReq[$xpos] 	= $tReq[$xpos] + ($rec->getUndertime()) ;
						}

						if ( $rec->getAttendance() == 'A' && $rec->getDayOff() <> 'Y' )
						{
							$tAbs[$xpos]  	= $tAbs[$xpos] - $rec->getNormal();
							$tReq[$xpos] 	= $tReq[$xpos] - $rec->getNormal();
						}
						$dPay[$xpos] = $dPay[$xpos] + ( $rec->getRatePerHour() * ($rec->getAcDura() - $rec->getOvertimes() + $rec->getUndertime()) );
					}
					$empData['empno'][] = $rec->getEmployeeNo();
					$empData['name'][]  = $rec->getName();
					$empData['date'][]  = $rec->getTransDate();
					$empData['duration'][]= $rec->getAcDura();
					$empData['normal'][]= $rec->getNormal();
					$empData['ot'][]    = $rec->getOvertimes();
					$empData['ut'][]    = $rec->getUndertime();
					$empData['otpay'][] = $rec->getPostedAmount();
					$empData['pi'][]    = $rec->getPartTimeIncome();
					$empData['meal'][]  = $rec->getMeal();
					$empData['absent'][]= 0;
					$empData['allw'][]  = $dAll + $rec->getAllowance();
					//echo  $dAll .' + '. $rec->getAllowance() . '<--- test <br>';
					if ( $rec->getUndertime() && $rec->getAttendance() != 'A')
					{
						$empData['ut'][$cpos]      = $rec->getUndertime();
						$empData['normal'][$cpos]  = $rec->getNormal() + $rec->getUndertime();
					}
					if ( $rec->getAttendance() == 'A' && $rec->getDayOff() <> 'Y' )
					{
						$empData['absent'][$cpos]  = - $rec->getNormal();
						$empData['normal'][$cpos]  = 0;
					}
					$cpos ++;
				} // dtr Data
				$initLabels = true;
			}

		}
		$plotDatas['DATE']   = $tDt;
		$plotDatas['OT']     = $tOt;
		$plotDatas['UT']     = $tUt;
		$plotDatas['ABSENT'] = $tAbs;
		$plotDatas['REQD']   = $tReq;
		$plotDatas['OTPAY']  = $otPay;
		$plotDatas['UTDED']  = $utDed;
		$plotDatas['PAY']    = $dPay;
		$plotDatas['MEAL']   = $tMeal;
		$plotDatas['ALLW']   = $tAllw;

		$sOt = 0;
		$sUt = 0;
		$sAb = 0;
		$sRe = 0;
		$sOP = 0; //summary OT Pay
		$sUD = 0; //summary UnderTime Deduction
		$sDP = 0; //summary Daily Pay
		$sMeal = 0;
		$sAllw = 0;
		$tPay  = 0;  // total pay
		//-------------------- generate Summary
		foreach($plotDatas['OT'] as $ke=>$ve)
		{
			$sOt   += $plotDatas['OT'][$ke];
			$sUt   += $plotDatas['UT'][$ke];
			$sAb   += $plotDatas['ABSENT'][$ke];
			$sRe   += $plotDatas['REQD'][$ke];
			$sOP   += $plotDatas['OTPAY'][$ke];
			$sUD   += $plotDatas['UTDED'][$ke];
			$sDP   += $plotDatas['PAY'][$ke];
			$sMeal += $plotDatas['MEAL'][$ke];
			$sAllw += $plotDatas['ALLW'][$ke];
			//echo $plotDatas['DATE'][$ke] .' - '. $plotDatas['REQD'][$ke] . '<br>';

		}
		$addInfo = array($tickLabels, $ballonLabels, round($sOt), round($sUt), round($sAb), round($sRe), round($sOP), round($sUD), round($sDP), round($sMeal), round($empCnt), round($sAllw), round($monthCnt),);
		return array($plotDatas, $addInfo, $empData);
	}

	public static function GetChartDataLedgerArchive($empNo, $batch, $co=null,  $eGroup)
	{
		if ( $empNo )
		{
			$empInfo = PayEmployeeLedgerArchivePeer::GetJournalListing($empNo, $batch, '', '');
		}else{
			$empInfo = PayEmployeeLedgerArchivePeer::GetJournalListing('', $batch, '', $co, $eGroup);
		}

		$pos = 0;
		$chartData = array();
		$sDp  = 0;
		$sOt  = 0;
		$sAll = 0;
		$sMe  = 0;
		$sOth = 0;
		$oth  = 0;
		$cnt  = 0;

		$chartData['BASIC'] = $empInfo['basic'];
		$chartData['OT'] 	 = $empInfo['ot'];
		$chartData['ALL'] 	 = $empInfo['ml'];
		$chartData['MEAL']  = $empInfo['mr'];

		foreach($empInfo['empno'] as $ke=>$ve)
		{
			//$chartData3['OTHERS']= array(0)
			$sDp  += round($empInfo['basic'][$pos], 2);
			$sOt  += round($empInfo['ot'][$pos], 2);
			$sAll += round($empInfo['ml'][$pos], 2);
			$sMe  += round($empInfo['meal'][$pos], 2);
			$oth  =  round($empInfo['ul'][$pos], 2 );
			$sOth += $oth;
			$pos++;
		}

		$addInfo = array($sDp, $sOt, $sAll, $sMe, $sOth, $pos );
		return array($chartData, $addInfo);
	}

	public static function SumDailyData($cdt, $empData)
	{
		if ( ! is_array($empData))
		{
			return;
		}
		$sDura = 0;
		$sNorm = 0;
		$sOt   = 0;
		$sUt   = 0;
		$sOpay = 0;
		$sPi   = 0;
		$sMeal = 0;
		$sAbs  = 0;
		$pos = 0;
		foreach($empData['date'] as $kd=>$vd)
		{
			if ($vd == $cdt)
			{
				$sDura += $empData['duration'][$pos];
				$sNorm += $empData['normal'][$pos];
				$sOt   += $empData['ot'][$pos];
				$sUt   += $empData['ut'][$pos];
				$sOpay += $empData['otpay'][$pos];
				$sPi   += $empData['pi'][$pos];
				$sMeal += $empData['meal'][$pos];
				$sAbs  += $empData['absent'][$pos];
				//echo $empData['date'][$pos] .' - '. $empData['normal'][$pos] .'<br>';
			}
			$pos ++ ;
		}
		return array($sDura, $sNorm, $sOt, $sUt, $sOpay, $sPi, $sMeal, $sAbs);
	}


	public static function oldcode()
	{
		//$empList = TkDtrmasterPeer::GetEmployeeNameList($sf_params->get('company')) ;
		//			$empList = array('S1723139A'=>'S1723139A', '057936665121007'=>'057936665121007', '512458114220805'=>'512458114220805');

		//		$tReq    = array();
		//		$tAbs    = array();
		//		$tDura   = array();
		//		$tOt     = array();
		//		$tUt	 = array();
		//		$diff    = DateUtils::DateDiff('d', $sdt, $edt);
		//		$pos  	 = 0;
		//		$xpos    = 0;
		//		$tickLabels = '';
		//		$ballonLabels = '';
		//		$initLabels = false;
		//		$pntr	 = array();
		//
		//		for($x=0; $x<=$diff; $x++)
		//		{
		//			$pntr[]  = DateUtils::AddDate($sdt, $x);
		//			$tOt []  = '';
		//			$tReq[]  = '';
		//			$tAbs[]  = '';
		//			$tDura[] = '';
		//			$tUt[]   = '';
		//		}
		//
		//		foreach($empList as $empNo=>$eName)
		//		{
		//			$dtrData = TkDtrsummaryPeer::GetDatabyEmployeeNoDateRange($empNo, $sdt, $edt);
		//			if ( $dtrData )
		//			{
		//				foreach ($dtrData as $rec)
		//				{
		//					//------------------------ init labels on first pass
		//					if (!$initLabels)
		//					{
		//						$ballonLabels[]		 = $rec->getTransDate();
		//						$tickLabels[] 	 	 = DateUtils::DUFormat('d', $rec->getTransDate() );
		//					}
		//
		//					//------------------------ search date before update
		//					$pos = $rec->getTransDate();
		//					if (in_array($pos, $pntr))
		//					{
		//						$xpos = array_search($pos, $pntr);
		//						$tOt[$xpos] = $tOt[$xpos] + $rec->getOvertimes();
		//						$tReq[$xpos] 	= $tReq[$xpos] + $rec->getNormal();
		//
		//						if ( $rec->getUndertime() && $rec->getAttendance() != 'A')
		//						{
		//							$tUt[$xpos] = $tUt[$xpos] + ( $rec->getUndertime() * -1);
		//						    $tReq[$xpos] 	= $tReq[$xpos] + ($rec->getUndertime() * -1) ;
		//						}
		//
		//						if ( $rec->getAttendance() == 'A' )
		//						{
		//							$tAbs[$xpos]  	= $tAbs[$xpos] + $rec->getNormal();
		//							$tReq[$xpos] 	= $tReq[$xpos] - $rec->getNormal();
		//						}
		//
		//
		//						//echo $rec->getName() .''. $rec->getTransDate().''. $rec->getOvertimes().'<br>';
		//					}
		//				} // dtr Data
		//				$initLabels = true;
		//			}
		//		}
		//		$plotDatas['OT']     = $tOt;
		//		$plotDatas['UT']     = $tUt;
		//		$plotDatas['ABSENT'] = $tAbs;
		//		$plotDatas['REQD']   = $tReq;
		//
		//		$sOt = 0;
		//		$sUt = 0;
		//		$sAb = 0;
		//		$sRe = 0;
		//		//-------------------- generate Summary
		//		foreach($plotDatas['OT'] as $ke=>$ve)
		//		{
		//			$sOt += $plotDatas['OT'][$ke];
		//			$sUt += $plotDatas['UT'][$ke];
		//			$sAb += $plotDatas['ABSENT'][$ke];
		//			$sRe += $plotDatas['REQD'][$ke];
		//		}

	}


	function returnmacaddress() {
		// This code is under the GNU Public Licence
		// Written by michael_stankiewicz {don't spam} at yahoo {no spam} dot com
		// Tested only on linux, please report bugs

		// WARNING: the commands 'which' and 'arp' should be executable
		// by the apache user; on most linux boxes the default configuration
		// should work fine

		// get the arp executable path
		$location = `which arp`;
		$location = rtrim($location);
		// Execute the arp command and store the output in $arpTable
		$arpTable = `$location -n`;
		// Split the output so every line is an entry of the $arpSplitted array
		$arpSplitted = split("\n",$arpTable);
		// get the remote ip address (the ip address of the client, the browser)
		$remoteIp = $GLOBALS['REMOTE_ADDR'];
		$remoteIp = str_replace(".", "\\.", $remoteIp);
		// Cicle the array to find the match with the remote ip address
		foreach ($arpSplitted as $value) {
			// Split every arp line, this is done in case the format of the arp
			// command output is a bit different than expected
			$valueSplitted = split(" ",$value);
			foreach ($valueSplitted as $spLine) {
				if (preg_match("/$remoteIp/",$spLine)) {
					$ipFound = true;
				}
				// The ip address has been found, now rescan all the string
				// to get the mac address
				if ($ipFound) {
					// Rescan all the string, in case the mac address, in the string
					// returned by arp, comes before the ip address
					// (you know, Murphy's laws)
					reset($valueSplitted);
					foreach ($valueSplitted as $spLine) {
						if (preg_match("/[0-9a-f][0-9a-f][:-]".
		"[0-9a-f][0-9a-f][:-]".
		"[0-9a-f][0-9a-f][:-]".
		"[0-9a-f][0-9a-f][:-]".
		"[0-9a-f][0-9a-f][:-]".
		"[0-9a-f][0-9a-f]/i",$spLine)) {
						return $spLine;
		}
					}
				}
				$ipFound = false;
			}
		}
		return false;
	}

	public static function selfURL()
	{ 
		if(!isset($_SERVER['REQUEST_URI'])){ 
			$serverrequri = $_SERVER['PHP_SELF']; 
		}else{ 
			$serverrequri = $_SERVER['REQUEST_URI']; 
		} 
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		//var_dump($_SERVER["SERVER_PROTOCOL"]);
		$protocol = 'http' .$s; 
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$serverrequri; 
	}
	
	public static function LogThis($user, $action, $desc, $actionModule, $target=null)
	{
		$rec = new HrLog();
		$rec->setUser($user);
		$rec->setUserAction($action);
		$rec->setDescription($desc);
		$rec->setActionModule($actionModule);
		$rec->setDateCreated(DateUtils::DUNow());
		$rec->save();
	}
	
	public static function randomID($length = null){
		$length = $length ? $length : 10;
	    $key = '';
	    //$keys = array_merge(range(0, 9), range('a', 'z'));
	    $keys = (range('a', 'z'));
	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}
	
	public static function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	
  function getMac(){
      $mac          = "";
      $cmd_info     = "";
      $mac_address  = "";

      
      ob_start();
      system("ipconfig /all");
      $cmd_info=ob_get_contents();
      ob_clean();
      $mac          = strpos($cmd_info, 'Physical');
      $mac_address  = substr($cmd_info,($mac+36),17);//MAC Address
      return $mac_address;
  } 
    
	public static function CamelCase($str) {
	    $i = array("-","_");
	    $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
	    $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
	    $str = str_replace($i, ' ', $str);
	    $str = str_replace(' ', '', ucwords(strtolower($str)));
	    $str = strtolower(substr($str,0,1)).substr($str,1);
	    $str = ucfirst($str); //upper case first character
	    return $str;
	}
	
	public static function uncamelCase($str) {
	    $str = preg_replace('/([a-z])([A-Z])/', "\\1_\\2", $str);
	    $str = strtolower($str);
	    return $str;
	}	
	
	public static function DownloadScript()
	{
		$filename = './upload/'.$_GET['path'];
		// required for IE, otherwise Content-disposition is ignored
		if(ini_get('zlib.output_compression'))
		  ini_set('zlib.output_compression', 'Off');
		
		// addition by Jorg Weske
		$file_extension = strtolower(substr(strrchr($filename,"."),1));
		
		if( $filename == "" ) 
		{
		  echo "<html><title>Download Script</title><body>ERROR: download file NOT SPECIFIED. USE force-download.php?file=filepath</body></html>";
		  exit;
		} elseif ( ! file_exists( $filename ) ) 
		{
		  echo "<html><title>Download Script</title><body>ERROR: File not found. USE force-download.php?file=filepath</body></html>";
		  exit;
		};
		switch( $file_extension )
		{
		  case "pdf": $ctype="application/pdf"; break;
		  case "exe": $ctype="application/octet-stream"; break;
		  case "zip": $ctype="application/zip"; break;
		  case "doc": $ctype="application/msword"; break;
		  case "xls": $ctype="application/vnd.ms-excel"; break;
		  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		  case "gif": $ctype="image/gif"; break;
		  case "png": $ctype="image/png"; break;
		  case "jpeg":
		  case "jpg": $ctype="image/jpg"; break;
		  default: $ctype="application/force-download";
		}
		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); // required for certain browsers 
		header("Content-Type: $ctype");
		// change, added quotes to allow spaces in filenames, by Rajkumar Singh
		header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($filename));
		readfile("$filename");
		exit();

	}
	
	public static function PopUpDialog($trigger, $title, $content)
	{
		$content = self::html_compress($content);
		$mess = '
			<script type="text/javascript">
			$(document).ready(function(){
				$("#'.$trigger.'").on(\'click\', function(){
					$.Dialog({
					shadow: true,
					overlay: false,
					icon: \'<span class="icon-comments-4 fg-white"></span>\',
					title: "'.$title.'",
					width: 500,
					padding: 10,
					content: "'.$content.'"
					});
				});
			});
			</script>';
		return $mess;
	}
	
	public static function html_compress($buf){
	    $buf = str_replace(array("\n","\r","\t"),'',$buf);
	    return str_replace('"',"'",$buf);
	}
	
	public static function StringAsVariable()
	{
		//$pager = ${'pager'.DateUtils::DUFormat('l', $cdate)};
		return;
	}
	
	protected function var_dump($vars)
	{
		echo '<pre>';
		print_r($vars);
		echo '</pre>';
		return;
	}
	
	public static function GetDateByPeriod($pcode)
	{
		//return $pcode;
		return substr($pcode, 0, 4) . '-' . substr($pcode, 4, 2). '-' . substr($pcode, 6, 2) ; //.'('. $pcode;
	}
	
	public static function ArrayDiff($aArray1, $aArray2) {
    $aReturn = array();
  
    foreach ($aArray1 as $mKey => $mValue) {
        if (array_key_exists($mKey, $aArray2)) {
            if (is_array($mValue)) {
                $aRecursiveDiff = arrayRecursiveDiff($mValue, $aArray2[$mKey]);
                if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }
            } else {
                if ($mValue != $aArray2[$mKey]) {
                    $aReturn[$mKey] = $mValue;
                }
            }
        } else {
            $aReturn[$mKey] = $mValue;
        }
    }
  
	    return $aReturn;
	} 

	public static function ArrayToSql($array)
	{
		 $resultStrings = array();
		 foreach ($array as $key => $values) {
		    $subarrayString = "'" . $values . "'";
		    $resultStrings[] = $subarrayString;
		 }
		 $result = implode($resultStrings, ",");
		 return $result;
	}
	
	public static function CreatePeriodCode($cdate)
	{
		return DateUtils::DUFormat('Ym01-', $cdate) . DateUtils::DUFormat('Ymt-', $cdate). 'ALL-MONTHLY';
	}
	
	public static function ComputeAttendance($sdate, $edate, $empNo = null)
	{
		$timer = sfTimerManager::getTimer('process attendance');
		self::processAttendance($sdate, $edate, $empNo);
	}
	
	public static function ProcessAttendance($sdate, $edate, $empNo = null)
	{
		$emparr = $empNo? array(TkDtrmasterPeer::GetDatabyEmployeeNo($empNo)) : TkDtrmasterPeer::GetAllEmployeeNo();
		$sdt = $sdate;
		$edt = $edate;
		$extra = new PayComputeExtra();
		$extra->PrepareDtrData($emparr, $sdt, $edt, sfContext::getInstance()->getUser()->getUsername());
		$extra->BuildDtrsummary($empNo, $sdt, $edt, sfContext::getInstance()->getUser()->getUsername(), 'timekeeper');
		unset($extra);
	}
	
	public static function DisableEnterKey($msg=null)
	{
		return '
		<script type="text/javascript">
		
		function stopRKey(evt) {
		  var evt = (evt) ? evt : ((event) ? event : null);
		  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
		  if ((evt.keyCode == 13) && (node.type=="text"))  {
		  	alert("'.$msg.'");
		  	return false;
		  }
		}
		document.onkeypress = stopRKey;
	</script> 
	';
}

  public static function PeriodStartDate($pcode)
  {
  $dt = substr($pcode, 0, 8);
  //return DateUtils::DUFormat('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
  return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
  }
  
  public static function PeriodGetEndDate($pcode)
  {
  $dt = substr($pcode, 9, 8);
  return date('Y-m-d', mktime(1, 1, 1, intval(substr($dt, 4, 2)), intval(substr($dt, 6, 2)), intval(substr($dt, 0, 4)) ) );
  }
  
	public static function PopulateCpfData($batch, $empNoList, $mess = null)
	{
		//$empNoList = array('S9980000');
		$empData = array('empno'=>array(), 'name'=>array(), 'amount'=>array(),
	                   'er_share'=>array(), 'em_share'=>array(), 'cdac'=>array(),
	                   'sinda'=>array(), 'mbmf'=>array(), 'ecf'=>array(), 
	                   'er_share'=>array(), 'em_share'=>array(), 'tot_cpf'=>array(),
	                   'sdl'=>array(), 'wage'=>array(),
	                   'total'=>array(), 'islevy'=>array(),
				   'grossInc'=>array(), 'grossDed'=>array(), 'mom_group'=>array()
					, 'additional'=>array()
					 );
		$lvyList = PayEmployeeLevyPeer::GetLevyList($batch);
		foreach ($empNoList as $kemp=>$vno)
		{
			if ($mess <> 'CASH')
			{
				if ($vno <> '')
				{
					$data = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBankCheque($batch, $vno);
				}else{
					$data = array();
				}
	
			}else{
				$data = array();
			}
			
// 			HTMLLib::vardump($data);
// 			exit();
			
			$empno = '';
			$name  = '';
			$basic = 0;
			$ot    = 0;
			$bank  = 0;
			$ap    = 0;
			$advot = 0;
			$others= 0;
			$tot   = 0;
			$meal  = 0;
			$cdac  = 0;
			$sinda = 0;
			$mbmf  = 0;
			$all   = 0;
			$bk    = 0;
			$cpf   = 0;
			$ha    = 0;
			$lv    = 0;
			$mr    = 0;
			$ml    = 0;
			$td    = 0;
			$ul    = 0;
			$pi    = 0;
			$ecf   = 0;
			$momGrp = '';
			$co    = '';
			$em_share = 0;
			$er_share = 0;
			$tot_cpf  = 0;
			$total = 0;
			$sdl   = 0;
			$isLevy = 0;	
			$grossInc = 0;
			$grossDed = 0;		
			$additional = 0;
			$wage = 0;
	
			foreach($data as $rec)
			{
				switch($rec->getAcctCode())
				{
					case 'BP':
						$basic = $basic + $rec->getAmount();
						break;
					case 'PI':
						$basic = $basic + $rec->getAmount();
						break;
					case 'CDAC':
						$cdac  = $cdac + $rec->getAmount();
						break;
					case 'SINDA':
						$sinda  = $sinda + $rec->getAmount();
						break;
					case 'MBMF':
						$mbmf  = $mbmf + $rec->getAmount();
						break;
					case 'ECF':
						$ecf  = $ecf + $rec->getAmount();
						break;
					case 'CPF' :
						$cpf  = $cpf + $rec->getAmount();
						$em_share = $em_share + $rec->getAmount();
						$er_share = $er_share + $rec->getCpfEr();
						$tot_cpf  = $tot_cpf  + $rec->getCpfTotal();
						break;
					case 'AP':
						$ap  = $ap + $rec->getAmount() ;
						break;
					case 'OT':
						if ($rec->getAmount() > 0)
						{
							$ot = $ot + $rec->getAmount();
						}else{
							$advot = $advot + $rec->getAmount() ;
						}
						break;
					case 'CBS':
						break;
					case 'TD':
						$basic += $rec->getAmount();
						break;
					case 'UL':
						$basic += $rec->getAmount();
						break;
					case 'ML':
						$ml = $ml + $rec->getAmount();
						break;
					default:
						if ($rec->getIncomeExpense() == '1')
						{
							$others = $others + $rec->getAmount();
						}
						break;
				}
				$empno = $rec->getEmployeeNo();
				$name  = $rec->getName();
				$co    = $rec->getCompany();
				if ($rec->getAmount() > 0 && $rec->getAcctCode() != 'CBS')
				{
					$grossInc= $grossInc + $rec->getAmount();
				}else{
					$grossDed= $grossDed + $rec->getAmount();
				}				
			}
			
		
			$empDetail = HrEmployeePeer::GetDatabyEmployeeNo($vno);
			if (!$empDetail):
				echo $vno .' No Employee Detail';
			endif;
			$momGrp = $empDetail->getMomGroup();
			if ($basic == 0) {
				$basic = PayEmployeeLedgerArchivePeer::GetBasicByEmpNoPeriodCode($vno, $batch );
				$empno = $empDetail? $empDetail->getEmployeeNo() : '';
				$name  = $empDetail? $empDetail->getName() : '';
				$co    = $empDetail? HrCompanyPeer::GetNamebyId($empDetail->getHrCompanyId()) : 'T.C. Khoo';
				$grossInc = PayEmployeeLedgerArchivePeer::GetIncomeSum($vno, $batch);
				$grossDed = PayEmployeeLedgerArchivePeer::GetDeductionSum($vno, $batch);
				
			}
	
		
				
			$basic = $basic + (($basic > 0) ? 0 : (-1 * $ap));
			$basic = $basic + $pi;
	
			$total = $basic + $ot + $advot + $others + $ml;
			$additional = $total - $basic;
			$wage = $basic;
			$sdl = $grossInc * .0025;
			
			if (in_array($empno, $lvyList['empno']) ) {
				$isLevy = 1;
			}
					
			//--------------------- sync with Hr Employee Levy
			if ($vno != 'S7434364C' && $total == 0)
			{
				$empDetail = HrEmployeePeer::GetDatabyEmployeeNo($vno);
				$empno = $empDetail? $empDetail->getEmployeeNo() : '';
				$name  = $empDetail? $empDetail->getName() : '';
				$co    = $empDetail? HrCompanyPeer::GetNamebyId($empDetail->getHrCompanyId()) : 'T.C. Khoo';
				$isLevy = 1;	 
			}			
			
			if ($sdl < 2)
			{
				$sdl = 2;
			}
	
			if ($total >= 4500)
			{
				$sdl = 11.25;
			}
			
			//------------- mistake on october submission
			if ($batch == '20111001-20111031-ALL-MONTHLY' && $empno == 'S7863014J'):
			    $sdl = $sdl + 5;
			endif;
			
			if ($batch == '20140201-20140228-ALL-MONTHLY' && $empno == 'S2198564C'):
				$sdl = $sdl + 3.25;
			endif;
				
			$empData['empno'][]    = $empno;
			$empData['name'][]     = $name;
			$empData['company'][]  = $co;
			$empData['basic'][]    = $basic;
			$empData['ot'][]       = $ot;
			$empData['ap'][]       = (-1 * $ap);
			$empData['adv_ot'][]   = 0; //(-1 * $advot);
			$empData['cdac'][]     = (-1 * $cdac);
			$empData['sinda'][]    = (-1 * $sinda);
			$empData['mbmf'][]     = (-1 * $mbmf);
			$empData['ecf'][]      = (-1 * $ecf);
			$empData['cpf'][]      = $cpf;
			$empData['ml'][]       = $ml;
			$empData['others'][]   = $others;
			$empData['sdl'][]      = round($sdl, 2);
			$empData['em_share'][]   = ($em_share <> 0 )? $em_share * -1 : 0 ;
			$empData['er_share'][]   = ($er_share <> 0 )? $er_share * -1 : 0 ;
			$empData['tot_cpf'][]    = ($tot_cpf <> 0 )?  $tot_cpf * -1 : 0 ;
			$empData['wage'][]       = $basic;
			$empData['islevy'][]     = $isLevy;
			$empData['grossInc'][]   = $grossInc;
			$empData['grossDed'][]   = $grossDed;
			$empData['mom_group'][]  = $momGrp;
			$empData['additional'][] = $additional;			
		}	
		return $empData;
	}
	
	public static function GetUser()
	{
		return sfContext::getInstance()->getUser()->getUsername();
	}
	
	/**************************
	 * PAYROLL RELATED
	 */
	public static function PostScheduledIncomeDeduction($extra, $sdate, $edate, $pcode, $user)
	{
		/**
		 * *****************************************************************
		 * Scheduled Income/Deduction posting here
		 */
		
		$empNos = TkDtrmasterPeer::GetEmployeeNameList();
		//$empNos = array('S0860968C'=>'WONG AH KIEW');
		//--------------------- delete scheduled income/deduction entry
		PayScheduledIncomePeer::DeleteIncomebyBatch('', $pcode);
		PayScheduledDeductionPeer::DeleteDeductionbyBatch('', $pcode);
		$inc = '';
		$ded = '';
		$entry = 'SYSTEM';
		foreach($empNos as $empNo=>$ve)
		{

			$all = 0;
			$mcb = 0;
			$empDet = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $sdate,  $edate );
			$bp     = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);
			//echo 'ehere';
			if ($bp)
			{
				$name = $bp->getName();
				$all  = $bp->getAllowance();

				//----------------------- income
				if (strtolower($bp->getPaidType()) == 'standard'):
					$inc = ($empDet['totalOt']) ? $extra->SaveIncome($empNo, $name, $empDet['totalOt'], $pcode, 'OT', 'OVERTIME', $user, $entry) : '';
				else:
					$inc = ($empDet['otPay']) ? $extra->SaveIncome($empNo, $name, $empDet['otPay'], $pcode, 'OT', 'OVERTIME', $user, $entry) : '';
					$inc = ($empDet['extraOtPay']) ? $extra->SaveIncome($empNo, $name, $empDet['extraOtPay'], $pcode, 'VA', 'VARIABLE ALLOWANCE', $user, $entry) : '';
				endif;
				
				$inc = ($empDet['pt'])      ? $extra->SaveIncome($empNo, $name, $empDet['pt'], $pcode, 'PI', 'PART-TIME INCOME', $user, $entry) : '';
				$inc = ($empDet['meal'])    ? $extra->SaveIncome($empNo, $name, $empDet['meal'], $pcode, 'MR', 'MEAL REIMBURSEMENT', $user, $entry) : '';
				$inc = ($all ? $extra->SaveIncome($empNo, $name, $all + $empDet['all'], $pcode, 'ML', 'MONTHLY ALLOWANCE', $user, $entry) : '' );
                //if ($empDet['mcleave'] == 0):
                if (HrEmployeeMcbenefitPeer::IsActive($empNo)):
                    $mcb = HrEmployeeMcbenefitPeer::GetMonthlyBenefit($empNo, $empDet, $pcode);
                    if ($mcb > 0) $inc = $extra->SaveIncome($empNo, $name, $mcb, $pcode, 'MCB', 'MC BENEFIT', $user, $entry);
                endif;
				foreach($empDet['receivable'] as $kRec=>$vRec):
					$inc = ($extra->SaveIncome($empNo, $name, $vRec, $pcode, $kRec, PayAccountCodePeer::GetDescriptionbyAcctCode($kRec), $user, $entry) );
				endforeach;
					
				//----------------------- deduction
				$ded = ($empDet['levy'])    ? $extra->SaveDeduction($empNo, $name, $empDet['levy'], $pcode, 'LV', 'Levy', $user, $entry) : '';
				$ded = ($empDet['tardy'])   ? $extra->SaveDeduction($empNo, $name, $empDet['tardy'], $pcode, 'TD', 'Tardy/Late Deduction', $user, $entry) : '';
				$ded = ($empDet['absent'])  ? $extra->SaveDeduction($empNo, $name, $empDet['absent'], $pcode, 'UL', 'Unpaid Leave/Absences', $user, $entry) : '';
			}
		}
	}// postscheduledincomededuction

	public static function PreparePayslip($sdate, $edate, $user)
	{
		$save = '';
		$co = 'ALL';
		$pcode = DateUtils::DUFormat('Ymd',$sdate).'-'.DateUtils::DUFormat('Ymd',$edate).'-'.$co.'-'.'MONTHLY';
		
		$cashEmp = PayEmployeeCashPeer::GetAllDatabyFrequency('MONTHLY');
		$empData = TkDtrmasterPeer::GetDatabyCompany($co, $sdate, $edate );
		//$empData = array(TkDtrmasterPeer::GetDatabyEmployeeNo('S7571257Z'));
		foreach($empData as $emplist)
		{
			$empno =  $emplist->getEmployeeNo();
			$cash = null;
			//----------------------- get employee cash base
			if ($cashEmp)
			{
				$cash = array('employee_no'=>array(), 'acct_code'=>array(), 'frequency'=>array());
				foreach($cashEmp as $empCash)
				{
					if ($empCash->getEmployeeNo() == $empno)
					{
						$cash['employee_no'][] = $empCash->getEmployeeNo();
						$cash['acct_code'][]   = $empCash->getAcctCode();
						$cash['frequency'][]   = $empCash->getFrequency();
					}
				}
			}
			$monthly = new PayComputeExtra();
			$save = $save . $monthly->computeFullTimeIndividual($empno, $pcode, $user, 'MONTHLY', $cash);
		}
//		if ($save)
//		{
//		}else{
//			$this->_SUF('Monthly Processing Has been Completed.');
//		}

	}
	
	public static function LockPayslip($sdate, $edate, $user)
	{	
		/*************** write to log */
		$co = 'ALL';
		$pcode = DateUtils::DUFormat('Ymd',$sdate).'-'.DateUtils::DUFormat('Ymd',$edate).'-'.$co.'-'.'MONTHLY';
		$monthly = new PayComputeExtra();
		$save = $monthly->SaveArchiveLogs($pcode, $user, DateUtils::DUNow() );

		/*************** update all scheduled Income */
		$monthly->UpdateAmountReceived(PayScheduledIncomePeer::GetAllIncome());
		$monthly->UpdateAmountPaid(PayScheduledDeductionPeer::GetAllDeduction());
		
	}
	
	
	public function OfficialPayslipPerEmployee( $pcodeList, $mess, $empNo, $dummyPay = null, $showSlip = null)
	{
		$pdf    = new PdfLibrary(array(210, 95));
		foreach($pcodeList as $ke => $pcode)
		{
			switch($mess)
			{
				case 'BANK':
					$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBank($pcode, $empNo);
					break;
				case 'CASH':
					$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCash($pcode, $empNo);
					break;
				case 'CHEQUE':
					$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCheque($pcode, $empNo);
					break;
				default:
					$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCashandBank($pcode, $empNo);
					break;
			}
			$this->OfficialPayslip($pdf, $empNo, $data, $pcode);
		}
		$pdf->closePDF('testing.pdf');
		exit();
		return sfView::NONE;
		/*if (sizeof($empNoList) == 1 && ! $showSlip):
			$dir = sfConfig::get('sf_app_converter_dir') .$pcode .'/';
			$fileName = str_replace('/', '' , $empInfo->get('NAME')) .'_'. $pcode . '_' . $mess.'.pdf';
			$fileName = $dir . $fileName;
			HrLib::Rmkdir($dir);
			$pdf->closePDF($fileName, 'F');
		elseif ($showSlip):
			$pdf->closePDF('testing.pdf');
			exit();
			return sfView::NONE;
		else:
			$pdf->addPage();
			$pdf->printBoldLn(75, 10,'Grand Total: '.money_format('%= #5.2n', $gtot) , 'Arial', '12');
			$pdf->closePDF('testing.pdf');
			exit();
			return sfView::NONE;			
		endif;
		*/
	}
	
	public function OfficialPayslipPerPeriod( $pcode, $mess, $empNoList, $dummyPay = null, $showSlip = null)
	{
		
	}
	
	
	public function OfficialPayslip($pdf, $empNo, $data, $pcode, $dummyPay = null, $showSlip = null)
	{
		$sdt = $this->GetStartDate($pcode);
		$edt = $this->GetEndDate($pcode);
		$pos = 0;
		$oldno = null;
		$gtot  = 0;
		$summ      = TkDtrsummaryPeer::GetDatabyDateRange($sdt, $edt);
		$xcounter = 0;
		$cntpos = 0;			$fldList = array('employee_no', 'name', 'company');
		$empInfo = PayEmployeeLedgerArchivePeer::GetOptimizedDatabyEmployeeNo($empNo, $pcode, $fldList);
		$summ    = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $this->GetStartDate($pcode), $this->GetEndDate($pcode) );
		$bp      = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);
		$ot1    = 0;
		$ot2    = 0;
		$ot3    = 0;
		$ot1amt = 0;
		$ot2amt = 0;
		$ot3amt = 0;
		$ot1rat = 0;
		$ot2rat = 0;
		$ot3rat = 0;

		$cpf    = 0;
		$cdac   = 0;
		$sinda  = 0;
		$cbs    = 0;
		$dinner = 0;
		$mall   = 0;
		$basic  = 0;
		$levy   = 0;
		$tardy  = 0;
		$loan   = 0;
		$ap     = 0;
		$ot     = array();
		$otCode = 0;
		$mcb = 0;
		$otamts = 0;


		$tot  = 0;
		$etot = 0;
		$inc  = 0;
		$ded  = 0;
		$iother = 0;
		$dother = 0;

		$tothours = 0;
		$mcLeave  = 0;
		$pdLeave  = 0;
		$updLeave = 0;
		$subtot   = 0;

		foreach ($data as $rec)
		{
			switch($rec->getAcctCode())
			{
				case 'CPF':
					$cpf = $cpf + $rec->getAmount();
					break;
				case 'CDAC':
					$cdac = $cdac + $rec->getAmount();
					break;
				case 'SINDA':
					$sinda = $sinda + $rec->getAmount();
					break;
				case 'CBS':
					$cbs = $cbs + $rec->getAmount();
					break;
				case 'MR':
					$dinner = $dinner + $rec->getAmount();
					break;
				case 'MEAL':
					$dinner = $dinner + $rec->getAmount();
					break;
				case 'ML':
					$mall = $mall + $rec->getAmount();
					break;
				case 'BP':
					$basic = $basic + $rec->getAmount();
					if ($dummyPay) {
						$basic = $dummyPay;
					}
					break;
				case 'PI':
					$basic = $basic + $rec->getAmount();
					break;
				case 'LV':
					$levy = $levy + $rec->getAmount();
					break;
				case 'UL':
					$tardy = $tardy + $rec->getAmount();
					break;
				case 'TD':
					$tardy = $tardy + $rec->getAmount();
					break;
				case 'LN':
					$loan = $loan + $rec->getAmount();
					break;
				case 'MCB':
					$mcb = $mcb + $rec->getAmount();
					break;
				case 'AP':
					$ap = $ap + ($rec->getAmount() < 0 ? $rec->getAmount() : 0 );
					break;
				case 'OT':
					$otamts = $otamts + $rec->getAmount();
					break;
			}

			if ( $rec->getIncomeExpense() == '1' )
			{
				//$pdf->printLn(    $x+135, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
				if ($dummyPay && $rec->getAcctCode() == 'BP') {
					$inc = $inc + $dummyPay;	
				}else{
					$inc = $inc + $rec->getAmount();
				}
				
			}else{
				//$pdf->printLn(    $x+165, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
				$ded = $ded + $rec->getAmount();
			}
			//$tot = $tot + $rec->getAmount();
			$tot = $inc + $ded;
			//echo $rec->getName() .' '. $rec->getAmount() . ' ' . $rec->getAcctCode() . '<br>';
			if ($otamts > 0)//($rec->getAcctCode() == 'OT')
			{
				$etot = 1;
				$bpos   = 0;
				$bpos   =  strpos($rec->getDescription(), '(');
				$otCode =  substr($rec->getDescription(), $bpos+1, 17);
			}
		}
		
		//----------------------------- show overtime
		if  ($otamts > 0 && sizeof($ot) == 0) //($etot == '1')
		{
			//$ot     = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $this->GetStartDate($otCode), $this->GetEndDate($otCode) );
			$ot     = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $sdt, $edt );
			$ot1 = $ot['ot1'];
			$ot2 = $ot['ot2'];
			$ot3 = $ot['ot3'];
			$ot1amt = $ot['ot1amt'];
			$ot2amt = $ot['ot2amt'];
			$ot3amt = $ot['ot3amt'];
			$ot1rat = $ot['ot1rat'];
			$ot2rat = $ot['ot2rat'];
			$ot3rat = $ot['ot3rat'];
		}

		$tothours = ($summ['tothours'] <= 188 ? $summ['tothours'] : 188);
		$mcLeave  = $summ['mcleave'];
		$pdLeave  = $summ['paidleave'];
		$updLeave = $summ['unpaidleave'];
		$levy     = $summ['levy'];
		$isubtot  = $basic + $ot1amt + $ot2amt + $ot3amt + $dinner + $mall + $cbs + $mcb;
		$dsubtot  = $tardy + $cpf + $sinda + $cdac + $levy + $loan + $ap;
		$iother   = $inc - $isubtot;
		$dother   = $ded - $dsubtot;
		
		setlocale(LC_MONETARY, 'en_US');
			 
			
		$pdf->addPage();
		$x = 12 ;
		$y = 1 + $cntpos;
		$xpos = 1;
		

		//$pdf->printBoldLn($x+40,    $xpos++   + $y, 'PAYSLIP for '.DateUtils::DUFormat('F j - ', $sdt).DateUtils::DUFormat('j,', $edt).DateUtils::DUFormat(' Y', $sdt).' ('.$mess.')','Arial', '12' );
		$pdf->printBoldLn($x+40,    $xpos++   + $y, 'PAYSLIP for '.DateUtils::DUFormat('F j - ', $sdt).DateUtils::DUFormat('j,', $edt).DateUtils::DUFormat(' Y', $sdt),'Arial', '12' );
		
		$pdf->printLn(    $x,       $xpos     + $y, 'T.C. Khoo Pte Ltd' );
		//$pdf->printLn(    $x,       $xpos     + $y, $empInfo->get('COMPANY') . '(S) Pte Ltd', 'Arial', '11' );
		$pdf->printLn(    $x+42, $xpos     + $y, 'Name: ', 'Arial', '12');
		$pdf->printLn(    $x+57,  $xpos   + $y, substr($empInfo->get('NAME'),0, 30) );
		$pdf->printLn(    $x+126,       $xpos + $y     , 'NRIC No: ' );
		$pdf->printLn(    $x+144,    $xpos++ + $y     , $empNo );
		$pdf->printLn(    $x, $xpos++   + $y, '========================================================================================', 'Arial', '10');
		//$pdf->printLn(    $x+158, $xpos++ + $y   , $empInfo->get('COMPANY') );
		$xpos++;
		$y = 0;
		$x = 30;
		$pdf->printLn(    $x, $xpos   + $y, 'BASIC', 'Arial', '9');
		$pdf->printBoldLn(    $x+40, $xpos   + $y, money_format('%-#5n',$basic), 'Arial', '9');
		//$pdf->printLn(    $x+80, $xpos   + $y, 'HOURLY', 'Arial', '9');
		//$pdf->printBoldLn(    $x+118, $xpos   + $y, money_format('%-#5n',($bp? $bp->getHourlyRate() : '0.0' ) ), 'Arial', '9');
		//$pdf->printBoldLn(    $x+118, $xpos   + $y, money_format('%-#5n',($tothours? $basic/188 : $bp->getHourlyRate()) ), 'Arial', '9');
		//$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$xpos++;
		$pdf->printBoldLn(    $x, $xpos   + $y, 'OVERTIME HOURS', 'Arial', '9');
		///$pdf->printLn(    $x+40, $xpos   + $y, $tothours, 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'ABSENCES/TARDY', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$tardy), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'OT <1.5>             HRS', 'Arial', '9');
		$pdf->printLn(    $x+17, $xpos   + $y, $ot1, 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, '$'.$ot1rat .' = '. money_format('%-#5n',$ot1amt), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'CPF', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$cpf), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'OT <2.0>             HRS', 'Arial', '9');
		$pdf->printLn(    $x+17, $xpos   + $y, $ot2, 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, '$'.$ot2rat .' = '. money_format('%-#5n',$ot2amt), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'SINDA', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$sinda), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'OT <2.5>             HRS', 'Arial', '9');
		$pdf->printLn(    $x+17, $xpos   + $y, $ot3 , 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, '$'.$ot3rat .' = '. money_format('%-#5n',$ot3amt), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'CDAC', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$cdac), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'ALLOWANCES', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, money_format('%-#5n', $mall), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'UNPAID ALLOWANCE', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n', $levy), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'BANK', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, money_format('%-#5n',$cbs), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'LOAN', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$loan), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'DINNER', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, money_format('%-#5n',$dinner) , 'Arial', '9'); //. " | ( ".$isubtot.")"
		$pdf->printLn(    $x+80, $xpos   + $y, 'ADVANCE PAY', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, money_format('%-#5n',$ap), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'MC BENEFIT', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, money_format('%-#5n',$mcb), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'SUB-TOTAL', 'Arial', '9');
		$pdf->printLn(    $x+125, $xpos   + $y, money_format('%-#5n',$dsubtot), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'PAID-LEAVE', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, $pdLeave.' DAY(S)', 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'UNPAID LEAVES', 'Arial', '9');
		$pdf->printLn(    $x+118, $xpos   + $y, $updLeave.' DAY(S)', 'Arial', '9');

		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'PAID-MC(S)', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, $mcLeave.' DAY(S)', 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'UNPAID ALLOWANCE', 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printLn(    $x, $xpos   + $y, 'OTHERS', 'Arial', '9');
		$pdf->printLn(    $x+40, $xpos   + $y, money_format('%-#5n',$iother), 'Arial', '9');
		$pdf->printLn(    $x+80, $xpos   + $y, 'OTHERS', 'Arial', '9');
		$pdf->printLn(    $x+120, $xpos   + $y, money_format('%-#5n',$dother), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printBoldLn(    $x+08, $xpos   + $y, 'TOTAL', 'Arial', '9');
		$pdf->printBoldLn(    $x+40, $xpos   + $y, money_format('%-#5n',$inc), 'Arial', '9');
		$pdf->printBoldLn(    $x+88, $xpos   + $y, 'TOTAL', 'Arial', '9');
		$pdf->printBoldLn(    $x+118, $xpos   + $y, money_format('%-#5n',$ded), 'Arial', '9');
		$pdf->printLn(    $x+36, $xpos++   + $y, ':                                                                               :', 'Arial', '10');
		$pdf->printBoldLn(    $x+50, $xpos   + $y, 'TOTAL', 'Arial', '11');
		$pdf->printBoldLn(    $x+70, $xpos   + $y, money_format('%= #5.2n', $tot), 'Arial', '11');
		//$pdf->printLn( 12,     18, date('Y-m-d H:i:s'), 'Arial', '6' );
		$pdf->footer('');
		$gtot = $gtot + $tot;
		$xcounter++;
			
		
	}
	
	public static function GetDateDaysByRange($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) 
	{
	
		$dates = array();
		$current = strtotime($first);
		$last = strtotime($last);
	
		while( $current <= $last ) {
	
			$dates[] = date($output_format, $current);
			$current = strtotime($step, $current);
		}
		return $dates;
		
	}
	
	public static function vardump($mess)
	{
		echo '<pre>';
		print_r($mess);
		echo '</pre>';
		exit();
	}
	
	public static function updateFingerTecScan()
	{
		$fingerTecData;
	}
}
