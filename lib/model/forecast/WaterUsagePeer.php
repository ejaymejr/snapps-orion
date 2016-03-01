<?php

/**
 * Subclass for performing query and update operations on the 'water_usage' table.
 *
 * 
 *
 * @package lib.model.maintenance
 */ 
class WaterUsagePeer extends BaseWaterUsagePeer
{
	const CUSTOM = 'CUSTOM';
    public static function GetPager($cd)
    {        
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }
        
        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1); 
        
        $c = clone($cd);
        $pager = new sfPropelPager("WaterUsage", $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }
    
    public static function getPreviousReading($dt)
    {
    	$c = new Criteria();
    	$c->add(self::DATE,  'DATE(' . self::DATE . ') < \'' . $dt .'\'', self::CUSTOM);
    	$c->addDescendingOrderByColumn(self::READING);
    	$rs = self::doSelectOne($c);
    	return ($rs) ? $rs->getReading() : 0;
    }
    
    public static function GetTodayReading($dt, $ampm)
    {
    	$c = new Criteria();
    	$c->add(self::DATE,  $dt );
    	$c->add(self::AMPM, $ampm);
    	$c->addDescendingOrderByColumn(self::DATE);
    	$rs = self::doSelectOne($c);
    	return ($rs) ? $rs->getReading() : 0;
    }
    

	public static function getConsumptionbyDateRange($sdt, $edt, $ampm)
	{
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->addSelectColumn(self::DATE);
		$c->addSelectColumn(self::CONSUMPTION);
		$c->addSelectColumn(self::TOTAL_COST);
		$c->add(self::DATE,  'DATE(' . self::DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
		$c->add(self::AMPM, $ampm);
		$c->addAscendingOrderByColumn(self::DATE);
		$rs = self::doSelectRS($c);
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
		return $rs;
	}
	
	public static function PostDailyData($sdate, $edate, $user)
	{
		$tempCompany = 1;  //micronclean
	    $usageData = self::getConsumptionbyDateRange($sdate, $edate, 'AM');
        $gtota = 0;
//        var_dump($usageData);
//        exit();
        while($usageData->next())
        {
			$gtota = $usageData->get('TOTAL_COST');
        
	        $record = FinanceSummaryPeer::GetSourceCompanyAndDate('ELECTRICAL UTILITIES', $tempCompany, $usageData->get('DATE'));
    	    if (! ($record) )
        	{
	        	$record = new FinanceSummary();
	        	$record->setCreatedBy($user);
	        	$record->setDateCreated(DateUtils::DUNow());
	        }
	        $record->setCompanyId($tempCompany);
	        $record->setComponent('ELECTRICAL UTILITIES');
	        $record->setValue($gtota);
	        $record->setTransDate($usageData->get('DATE'));
	        $record->setIncomeExpense('EXPENSE');
            $record->setClassification('EXPENSE');
	        $record->setModifiedBy($user);
	        $record->setDateModified(DateUtils::DUNow());
	        $record->save();
        }
   }

    public static function GetOptimizedDatabyDateAmPm($dt, $ampm, $fldList)
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        foreach($fldList as $kf=>$vf)
        {
            switch(strtolower($vf))
            {
                case 'ampm':
                    $c->addSelectColumn(self::AMPM);                    
                    break;
                case 'reading':
                    $c->addSelectColumn(self::READING);                    
                    break;
                case 'consumption':
                    $c->addSelectColumn(self::CONSUMPTION);                    
                    break;
                case 'total_cost':
                    $c->addSelectColumn(self::TOTAL_COST);                    
                    break;
                case 'conversion_factor':
                	$c->addSelectColumn(self::CONVERSION_FACTOR);
                	break;
                    
            }
        }
        $c->add(self::DATE, $dt);
        $c->add(self::AMPM, $ampm);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        while ($rs->next()) 
        {
            return $rs; // nr of column in select clause
        }
    }
    
    public static function ComputeMonthlyConsumption($month)
    {
    	$sdt = DateUtils::DUFormat('Y-m-01', $month);
    	$edt = DateUtils::DUFormat('Y-m-t', $month);
    	$total = 0;
    	$consumption = 0;
    	$powerusage = self::GetPowerConsumptionbyDateRange1($sdt, $edt, 'PM');
    	$x = 0;
    	foreach($powerusage as $r):
    	//    		echo $r->getDate() .' | '.$r->getConsumption() . '<br>';
    	$consumption = $r->getConsumption();
    	if ($consumption < 100000 && $consumption > 0):
    	$total += $consumption;
    	endif;
    	endforeach;
    	return $total;
    }
    
    
    public static function GetPowerConsumptionbyDateRange1($sdt, $edt, $ampm)
    {
    	$c = new Criteria();
    	$c->add(self::DATE,  'DATE(' . self::DATE . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE . ') <= \'' . $edt . '\'', self::CUSTOM);
    	//$c->add(self::AMPM, $ampm);
    	$c->addGroupByColumn(self::DATE);
    	//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
    	$c->addAscendingOrderByColumn(self::DATE);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetWaterConsumptionForTheDay($cdt)
    {
    	$c = new Criteria();
    	$c->add(self::DATE,  $cdt);
    	$c->add(self::AMPM,  'DL');
    	$c->addDescendingOrderByColumn(self::READING);
    	//$c->add(self::DATE_CREATED, '&& || &&', Criteria::CUSTOM);
    	$rs = self::doSelectOne($c);
    	return $rs? $rs->getConsumption() : 0;
    }
    
    
    public static function GetWaterReadingForTheDay($cdt)
    {
    	$c = new Criteria();
    	$c->add(self::DATE,  $cdt);
    	$c->addDescendingOrderByColumn(self::READING);
    	$rs = self::doSelectOne($c);
    	return $rs? $rs->getReading() : 0;
    }
}
