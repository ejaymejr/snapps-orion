<?php

class QuotaLevy
{
	const mfgMultiplier = 1.5; // local FTE x 1.5 
	const mfgSPassQouta = .20; // 20%
	const mfgPRCQouta   = .25; // 20%
	
	const svsMultiplier = 0.666667; // local FTE x .60 
	const svsSPassQouta = .15; // 15%
	const svsPRCQouta   = .08; // 8%
	
    function __construct()
    {
    }

    function __destruct()
    {
    }

    public function ComputeMfgForeignWorkerQuota($spr)
    {
    	return ($spr * self::mfgMultiplier );
    }
    
    public function FormulaMfgForeignWorkerQuota($spr)
    {
    	return ('Total Fulltime SPR Workers ('.$spr.') x '. self::mfgMultiplier);
    }
    
    public function ComputeMfgSPassQuota($totalWorkForce)
    {
    	return ($totalWorkForce ) * self::mfgSPassQouta ;
    }
    
    public function FormulaMfgSPassQuota($totalWorkForce)
    {
    	return ('Total Existing Workforce ('.$totalWorkForce.') x '. self::mfgSPassQouta );
    }
    
    public function ComputeMfgPRCQuota($totalWorkForce)
    {
    	return ($totalWorkForce) * self::mfgPRCQouta;
    }
    
    public function FormulaMfgPRCQuota($totalWorkForce)
    {
    	return ('Total Existing Workforce ('.$totalWorkForce.') x '. self::mfgPRCQouta );
    }

    
    public function GetForeignWorkersQuotaForManufacturing()
    {
    	$momGroup = 'T.C. Khoo Mfg';
		$spr		 		 = PayEmployeeLedgerArchivePeer::GetFulltimeLocalEmployeesCountForQouta($momGroup);
		$fulltimeSPR         = $spr['fulltime'] + $spr['parttime'];
		$actualForeignWorker = PayEmployeeLedgerArchivePeer::GetForeignWorkerCountForQouta($momGroup);
		$spassHolder 		 = $actualForeignWorker['SPASS'];
		$wpHolder 			 = $actualForeignWorker['WP'];
		$prcHolder 			 = $actualForeignWorker['PRC'];
		$otherHolder 		 = isset($actualForeignWorker['']) ? $actualForeignWorker[''] : 0;		
		$totalActualWorkforce = $fulltimeSPR + $actualForeignWorker['total'];
		$maximumForeignWorkerQouta = self::ComputeSvsForeignWorkerQuota($fulltimeSPR); //($fulltimeSPR ) * $mfgMultiplier;
		$spassQouta = self::ComputeSvsSPassQuota($totalActualWorkforce); //.2  * ($totalActualWorkforce + 1); //103 * .25 = 25 | 104 * .25 = 26  website said its its 25 so must use 103
		$prcQouta   = self::ComputeSvsPRCQuota($totalActualWorkforce); //.25 * ($totalActualWorkforce );  
		$wpQouta    = .15 * ($totalActualWorkforce + 1);
		$levyT1 = .25 * $totalActualWorkforce;
		$levyT2 = (.50 * $totalActualWorkforce) - $levyT1 ;
		$levyT3 = $totalActualWorkforce - $levyT1 - $levyT2;
		
		$qouta = array();				
		$qouta['spr_proof']		 = $spr['proof'];
		$qouta['foreign_proof']		 = $actualForeignWorker['proof'];
		$qouta['total_workforce'] = $totalActualWorkforce;
		$qouta['total_fulltime_spr_worker'] = $fulltimeSPR;
		$qouta['total_fulltime_foreign_worker'] = $actualForeignWorker['total'];
		$qouta['max_fw'] = intval($maximumForeignWorkerQouta);
		$qouta['wp_holder'] = $actualForeignWorker;
		$qouta['spass_holder'] 	= $spassHolder;
		$qouta['wp_holder'] 	= $wpHolder;
		$qouta['prc_holder'] 	= $prcHolder;
		$qouta['quota'] 	= self::mfgMultiplier;
		$qouta['others'] 	= $otherHolder;
		$qouta['maximum_wp'] 	= 0;
		$qouta['spass_quota'] 	= intval($spassQouta);
		$qouta['prc_quota'] 	= intval($prcQouta);
		$qouta['wp_quota'] 		= intval($wpQouta);
		$qouta['spass_holder_T1_list'] = array();
		$qouta['spass_holder_T2_list'] = array();
		$qouta['rpass_holder_T1_list'] = array();
		$qouta['rpass_holder_T2_list'] = array();
		$qouta['rpass_holder_T3_list'] = array();
		foreach($actualForeignWorker['proof']['name'] as $key=>$spassName):
			if ($actualForeignWorker['proof']['epass'][$key] == 'SPASS' && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 1):
				$qouta['spass_holder_T1_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ($actualForeignWorker['proof']['epass'][$key] == 'SPASS' && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 2):
				$qouta['spass_holder_T2_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;	
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 1):
				$qouta['rpass_holder_T1_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 2):
				$qouta['rpass_holder_T2_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 3):
				$qouta['rpass_holder_T3_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
		endforeach;
		
		
		//----------------------------- LEVY ALLOCATION FOR WP/R Pass
		$qouta['levy_t1'] = intval($totalActualWorkforce * .25);
		if ($qouta['levy_t1'] >= $actualForeignWorker['total']):
			$qouta['levy_t1'] = $actualForeignWorker['total'] ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t2'] = intval($totalActualWorkforce * .50) - $qouta['levy_t1'];
		if ($qouta['levy_t2'] >= ($actualForeignWorker['total'] - $qouta['levy_t1']) ):
			$qouta['levy_t2'] = $actualForeignWorker['total'] - $qouta['levy_t1'] ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t3'] = $actualForeignWorker['total'] - $qouta['levy_t1'] - $qouta['levy_t2'];
		//------------------------------
		
		//----------------------------- LEVY ALLOCATION FOR S Pass
		$qouta['levy_t1_sp'] = intval($totalActualWorkforce * .10);
		if ($qouta['levy_t1_sp'] >= $spassHolder):
			$qouta['levy_t1_sp'] = $spassHolder ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t2_sp'] = $spassHolder - $qouta['levy_t1_sp'];
		//------------------------------

		return $qouta;
    }
    
    /*******************************************************
     * SERVICE SECTOR CODE
     * 
     */
    public function ComputeSvsForeignWorkerQuota($spr)
    {
    	return ($spr * self::svsMultiplier );
    }
    
    public function FormulaSvsForeignWorkerQuota($spr)
    {
    	return ('Total Fulltime SPR Workers ('.$spr.') x '. self::svsMultiplier);
    }
    
    public function ComputeSvsSPassQuota($totalWorkForce)
    {
    	return ($totalWorkForce ) * self::mfgSPassQouta ;
    }
    
    public function FormulaSvsSPassQuota($totalWorkForce)
    {
    	return ('Total Existing Workforce ('.$totalWorkForce.') x '. self::svsSPassQouta );
    }
    
    public function ComputeSvsPRCQuota($totalWorkForce)
    {
    	return ($totalWorkForce) * self::svsPRCQouta;
    }
    
    public function FormulaSvsPRCQuota($totalWorkForce)
    {
    	return ('Total Existing Workforce ('.$totalWorkForce.') x '. self::svsPRCQouta );
    }
    
    public function GetForeignWorkersQuotaForService()
    {
    	$momGroup = 'T.C. Khoo Svs';
		$spr		 		 = PayEmployeeLedgerArchivePeer::GetFulltimeLocalEmployeesCountForQouta($momGroup);
		$fulltimeSPR         = $spr['fulltime'] + $spr['parttime'];
		$actualForeignWorker = PayEmployeeLedgerArchivePeer::GetForeignWorkerCountForQouta($momGroup);
		$spassHolder 		 = $actualForeignWorker['SPASS'];
		$wpHolder 			 = $actualForeignWorker['WP'];
		$prcHolder 			 = $actualForeignWorker['PRC'];
		$otherHolder 		 = isset($actualForeignWorker[''])? $actualForeignWorker[''] : 0;
		//$svsMultiplier 		 = .818182; // local FTE x .60 / 1 - .6
		$totalActualWorkforce = $fulltimeSPR + $actualForeignWorker['total'];
		$maximumForeignWorkerQouta = ($fulltimeSPR ) * $svsMultiplier;
		$spassQouta = .2  * ($totalActualWorkforce + 1);
		$prcQouta   = .09 * ($totalActualWorkforce );
		$wpQouta    = .29 * ($totalActualWorkforce + 1);
		$levyT1 = .25 * $totalActualWorkforce;
		$levyT2 = (.50 * $totalActualWorkforce) - $levyT1 ;
		$levyT3 = $totalActualWorkforce - $levyT1 - $levyT2;

		$qouta = array();				
		$qouta['spr_proof']		 = $spr['proof'];
		$qouta['foreign_proof']		 = $actualForeignWorker['proof'];
		$qouta['total_workforce'] = $totalActualWorkforce;
		$qouta['total_fulltime_spr_worker'] = $fulltimeSPR;
		$qouta['total_fulltime_foreign_worker'] = $actualForeignWorker['total'];
		$qouta['max_fw'] = intval($maximumForeignWorkerQouta);
		$qouta['wp_holder'] = $actualForeignWorker;
		$qouta['spass_holder'] 	= $spassHolder;
		$qouta['wp_holder'] 	= $wpHolder;
		$qouta['prc_holder'] 	= $prcHolder;
		$qouta['quota'] 	= $svsMultiplier;
		$qouta['others'] 	= $otherHolder;
		$qouta['maximum_wp'] 	= 0;
		$qouta['spass_quota'] 	= intval($spassQouta);
		$qouta['prc_quota'] 	= intval($prcQouta);
		$qouta['wp_quota'] 		= intval($wpQouta);
		$qouta['spass_holder_T1_list'] = array();
		$qouta['spass_holder_T2_list'] = array();
		$qouta['rpass_holder_T1_list'] = array();
		$qouta['rpass_holder_T2_list'] = array();
		$qouta['rpass_holder_T3_list'] = array();
		foreach($actualForeignWorker['proof']['name'] as $key=>$spassName):
			if ($actualForeignWorker['proof']['epass'][$key] == 'SPASS' && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 1):
				$qouta['spass_holder_T1_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ($actualForeignWorker['proof']['epass'][$key] == 'SPASS' && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 2):
				$qouta['spass_holder_T2_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;	
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 1):
				$qouta['rpass_holder_T1_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 2):
				$qouta['rpass_holder_T2_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
			if ( ($actualForeignWorker['proof']['epass'][$key] == 'PRC' || $actualForeignWorker['proof']['epass'][$key] == 'WP' ) && intval($actualForeignWorker['proof']['levy_tier'][$key]) == 3):
				$qouta['rpass_holder_T3_list'][$key] = $spassName;
				//echo $spassName . ' | '. $actualForeignWorker['proof']['epass'][$key] . ' : ' . $actualForeignWorker['proof']['levy_tier'][$key] . '<br>';
			endif;
		endforeach;
		
		//----------------------------- LEVY ALLOCATION FOR WP/R Pass
		$qouta['levy_t1'] = intval($totalActualWorkforce * .15);
		if ($qouta['levy_t1'] >= $actualForeignWorker['total']):
			$qouta['levy_t1'] = $actualForeignWorker['total'] ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t2'] = intval($totalActualWorkforce * .25) - $qouta['levy_t1'];
		if ($qouta['levy_t2'] >= ($actualForeignWorker['total'] - $qouta['levy_t1']) ):
			$qouta['levy_t2'] = $actualForeignWorker['total'] - $qouta['levy_t1'] ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t3'] = $actualForeignWorker['total'] - $qouta['levy_t1'] - $qouta['levy_t2'];
		//------------------------------
		
		//----------------------------- LEVY ALLOCATION FOR S Pass
		$qouta['levy_t1_sp'] = intval($totalActualWorkforce * .10);
		if ($qouta['levy_t1_sp'] >= $spassHolder):
		$qouta['levy_t1_sp'] = $spassHolder ;  //must not exceed total foreign Workers
		endif;
		$qouta['levy_t2_sp'] = $spassHolder - $qouta['levy_t1_sp'];
		
		return $qouta;
    }

} //class ends here