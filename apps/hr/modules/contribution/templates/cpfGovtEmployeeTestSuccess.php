<?php
$eList = HrEmployeePeer::GetSingaporean();
//$eList = array('S0663358G');
foreach($eList as $empNo){
	$empData = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
	if ($empData){
		$age = HrEmployeePeer::ComputeAge($empData->getDateOfBirth());
		$contrib   = new ComputeCPF();
		$cpf   = $contrib->GetCPF(date('Y-m-d'), 1000, $age, 3);
		if ($cpf && (intval($age) == 35 || intval($age) == 50 || intval($age) == 60 || intval($age) == 65 || intval($age) == 34 || intval($age) == 49 || intval($age) == 59 ) ) {
			echo $empNo.' - '.$empData->getName() .' -age ( '.$age
				.' ): ( ' 
				. $empData->getDateOfBirth() .' )' 
				 
				.'||   Employee Share: ' . $cpf['em_share']
				.'||   Employer Share: ' . $cpf['er_share']
				.'||   Desc:  '. $cpf['desc']
				;
			echo '<br>';
		}
	}
}


?>