<?php

/**
 * expenses actions.
 *
 * @package    snapps
 * @subpackage expenses
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class expensesActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	if( HTMLLib::isMobile() ) :
  		$this->redirect('expenses/mobileReading');
  	endif;
      
  }
  
  public function executeMobileReading()
  {
  	if ( $this->getRequest()->getMethod() <> sfRequest::POST):
  	//   		var_dump(PowerUsagePeer::GetTodayReading(Date('Y-m-d'), 'AM') );
  	//   	exit();
  	$this->_S('power_am_reading', PowerUsagePeer::GetTodayReading(Date('Y-m-d'), 'AM'), '');
  	$this->_S('power_pm_reading', PowerUsagePeer::GetTodayReading(Date('Y-m-d'), 'PM'), '');
  	$this->_S('water_am_reading', WaterUsagePeer::GetTodayReading(Date('Y-m-d'), 'AM'), '');
  	$this->_S('water_pm_reading', WaterUsagePeer::GetTodayReading(Date('Y-m-d'), 'PM'), '');
  	endif;
  	 
  	if ( $this->getRequest()->getMethod() == sfRequest::POST):
  	if ($this->_G('power_am_reading')):
  	$this->_S('ampm', 'AM');
  	$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  	$this->_S('time', Date('H:i:s'));
  	 
  	$pread = PowerUsagePeer::getPreviousReading($this->_G('date')) ;
  	$pread = $this->_G('date') == '2009-11-14'? 0 : $pread;
  	$cons  = $this->_G('power_am_reading') - $pread;
  	$cons  = $cons > 0 ? $cons : 0;
  	$tCost = $cons * 0.02 * 15;
  	$formula = $cons.' x .02 x 15';
  	$id = $this->_G('id');
  	$record = PowerUsagePeer::retrieveByPK($id);
  	if (! $record):
  	$record = new PowerUsage();
  	$record->setCreatedBy('MOBILE');
  	$record->setDateCreated(DateUtils::DUNow());
  	endif;
  	$record->setReading($this->_G('power_am_reading'));
  	$record->setDate($this->_G('date'));
  	$record->setTime($this->_G('time'));
  	$record->setAmpm($this->_G('ampm'));
  	$record->setConsumption($cons);
  	$record->setUnit('KiloWatt Hour');
  	$record->setUnitPrice(.02);
  	$record->setConversionFactor(15);
  	$record->setTotalCost($tCost);
  	$record->setModifiedBy('MOBILE');
  	$record->setDateModified(DateUtils::DUNow());
  	$record->save();
  	endif;
  
  	if ($this->_G('power_pm_reading')):
  	$this->_S('ampm', 'PM');
  	$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  	$this->_S('time', Date('H:i:s'));
  
  	$pread = PowerUsagePeer::getPreviousReading($this->_G('date')) ;
  	$pread = $this->_G('date') == '2009-11-14'? 0 : $pread;
  	$cons  = $this->_G('power_am_reading') - $pread;
  	$cons  = $cons > 0 ? $cons : 0;
  	$tCost = $cons * 0.02 * 15;
  	$formula = $cons.' x .02 x 15';
  	$id = $this->_G('id');
  	$record = PowerUsagePeer::retrieveByPK($id);
  	if (! $record):
  	$record = new PowerUsage();
  	$record->setCreatedBy('MOBILE');
  	$record->setDateCreated(DateUtils::DUNow());
  	endif;
  	$record->setReading($this->_G('power_pm_reading'));
  	$record->setDate($this->_G('date'));
  	$record->setTime($this->_G('time'));
  	$record->setAmpm($this->_G('ampm'));
  	$record->setConsumption($cons);
  	$record->setUnit('KiloWatt Hour');
  	$record->setUnitPrice(.02);
  	$record->setConversionFactor(15);
  	$record->setTotalCost($tCost);
  	$record->setModifiedBy('MOBILE');
  	$record->setDateModified(DateUtils::DUNow());
  	$record->save();
  	endif;
  
  	if ($this->_G('water_am_reading')):
  	$this->_S('ampm', 'AM');
  	$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  	$this->_S('time', Date('H:i:s'));
  	 
  	$pread = PowerUsagePeer::getPreviousReading($this->_G('date')) ;
  	$pread = $this->_G('date') == '2009-11-14'? 0 : $pread;
  	$cons  = $this->_G('power_am_reading') - $pread;
  	$cons  = $cons > 0 ? $cons : 0;
  	$tCost = $cons * 0.02 * 15;
  	$formula = $cons.' x .02 x 15';
  	$id = $this->_G('id');
  	$record = WaterUsagePeer::retrieveByPK($id);
  	if (! $record):
  	$record = new WaterUsage();
  	$record->setCreatedBy('MOBILE');
  	$record->setDateCreated(DateUtils::DUNow());
  	endif;
  	$record->setReading($this->_G('water_am_reading'));
  	$record->setDate($this->_G('date'));
  	$record->setTime($this->_G('time'));
  	$record->setAmpm($this->_G('ampm'));
  	$record->setConsumption($cons);
  	$record->setUnit('Cubic Meter');
  	$record->setUnitPrice(.02);
  	$record->setConversionFactor(15);
  	$record->setTotalCost($tCost);
  	$record->setModifiedBy('MOBILE');
  	$record->setDateModified(DateUtils::DUNow());
  	$record->save();
  	endif;
  
  	if ($this->_G('water_pm_reading')):
  	$this->_S('ampm', 'PM');
  	$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  	$this->_S('time', Date('H:i:s'));
  
  	$pread = PowerUsagePeer::getPreviousReading($this->_G('date')) ;
  	$pread = $this->_G('date') == '2009-11-14'? 0 : $pread;
  	$cons  = $this->_G('power_am_reading') - $pread;
  	$cons  = $cons > 0 ? $cons : 0;
  	$tCost = $cons * 0.02 * 15;
  	$formula = $cons.' x .02 x 15';
  	$id = $this->_G('id');
  	$record = WaterUsagePeer::retrieveByPK($id);
  	if (! $record):
  	$record = new WaterUsage();
  	$record->setCreatedBy('MOBILE');
  	$record->setDateCreated(DateUtils::DUNow());
  	endif;
  	$record->setReading($this->_G('water_pm_reading'));
  	$record->setDate($this->_G('date'));
  	$record->setTime($this->_G('time'));
  	$record->setAmpm($this->_G('ampm'));
  	$record->setConsumption($cons);
  	$record->setUnit('Cubic Meter');
  	$record->setUnitPrice(.02);
  	$record->setConversionFactor(15);
  	$record->setTotalCost($tCost);
  	$record->setModifiedBy('MOBILE');
  	$record->setDateModified(DateUtils::DUNow());
  	$record->save();
  	endif;
  
  	if ($this->_G('save')):
  	$this->_SUF('Power Reading: ( '.$this->_G('reading') . ' ) Data has been successfuly saved');
  	endif;
  	$this->redirect('expenses/mobileReading');
  	endif;
  	$this->setLayout('layout_no_footer');
  }
  
  
  public function executePowerConsumptionSearch()
  {
  	sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Power Reading');
  	$c = new Criteria();
  	$c->add(PowerUsagePeer::AMPM, 'DL', Criteria::NOT_EQUAL);
  	//$c->addGroupByColumn(PowerUsagePeer::DATE);
  	$c->addDescendingOrderByColumn(PowerUsagePeer::DATE);
  	$this->pager = PowerUsagePeer::doSelect($c);
  }
  
  public function executePowerConsumptionMonthlySearch()
  {
  	sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Power Reading');
  	$c = new Criteria();
  	$c->addGroupByColumn(PowerUsagePeer::DATE);
  	$c->addDescendingOrderByColumn(PowerUsagePeer::DATE);
  	$c->addGroupByColumn(' year(power_usage.date) ' );
  	$c->addGroupByColumn(' month(power_usage.date) '  );
  	$this->pager = PowerUsagePeer::doSelect($c);
  }
  
  public function executePowerConsumptionAdd()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('ampm', (DateUtils::DUFormat('H', DateUtils::DUNow()) > 11 )? 'PM': 'AM');
  		$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  		$this->_S('time', Date('H:i:s'));
  		$this->_S('reading', 0);
  		$this->_S('unit', 'KiloWatt Hour');
  		$this->_S('unitprice', 0.2);
  		$this->_S('conversion_factor', 15);
  		$this->_S('totalcost', 0);
  		$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  		$this->_S('pdReading', PowerUsagePeer::getPreviousReading($this->_G('date')) );
  	}
  
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		 
  		$pread = PowerUsagePeer::getPreviousReading($this->_G('date'));
  		$pread = $this->_G('date') == '2009-11-14'? 0 : $pread;
  		$cons  = $this->_G('reading') - $pread;
  		$tCost = $cons * $this->_G('unitprice') * $this->_G('conversion_factor');
  		$this->_S('consumption', $cons);
  		$this->_S('totalcost', $tCost);
  		$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  		$id = $this->_G('id');
  		$record = PowerUsagePeer::retrieveByPK($id);
  		if (! $record)
  		{
  			$record = new PowerUsage();
  			$record->setCreatedBy($this->_U());
  			$record->setDateCreated(DateUtils::DUNow());
  		}
  
  		if ($this->_G('save'))
  		{
  
  			$record->setDate($this->_G('date'));
  			$record->setTime($this->_G('time'));
  			$record->setAmpm($this->_G('ampm'));
  			$record->setReading($this->_G('reading'));
  			$record->setConsumption($cons);
  			$record->setUnit($this->_G('unit'));
  			$record->setUnitPrice($this->_G('unitprice'));
  			$record->setConversionFactor($this->_G('conversion_factor'));
  			$record->setTotalCost($this->_G('totalcost'));
  			$record->setModifiedBy($this->_U());
  			$record->setDateModified(DateUtils::DUNow());
  			$record->save();
  			if ($this->_G('ampm') == 'PM')
  			{
  				//FinanceSummaryPeer::PostThisValue('power', $this->_G('date'), '', $this->_G('totalcost'), $this->_U());
  			}
  			$this->_SUF('Power Reading: ( '.$this->_G('reading') . ' ) Data has been successfuly saved');
  			$this->redirect('expenses/powerConsumptionSearch');
  
  		}
  	}
  
  }
  
  public function executePowerConsumptionEdit()
  {
  	$id = $this->_G('id');
  	$record = PowerUsagePeer::retrieveByPK($id);
  	if (! $record)
  	{
  		$this->redirect404();
  		return;
  	}
  	$this->_S('ampm', $record->getAmpm());
  	$this->_S('date', $record->getDate());
  	$this->_S('time', $record->getTime());
  	$this->_S('reading', $record->getReading());
  	$this->_S('unit', $record->getUnit());
  	$this->_S('unitprice', $record->getUnitPrice());
  	$this->_S('conversion_factor', $record->getConversionFactor());
  	$this->_S('totalCost', $record->getTotalCost());
  	$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  	$this->setTemplate('powerConsumptionAdd');
  }
  
  
  public function executePowerConsumptionDelete()
  {
  	$id = $this->_G('id');
  	$this->record = PowerUsagePeer::retrieveByPK($id);
  	$rec = $this->record->getDate() .' '. $this->record->getAmpm();
  	$this->record->delete();
  	$this->_SUF($rec.' has been deleted successfuly.');
  	$this->redirect('expenses/powerConsumptionSearch');
  }
  
  public function executePowerConsumptionChart()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', '2015-01-01');
  		$this->_S('edate', Date('Y-m-d'));
  		$this->_S('ampm',  'PM');
  		$this->_S('frequency', 'daily');
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$this->benchmark = 1;
  		$sdt = $this->_G('sdate');
  		$edt = $this->_G('edate');
  		$days = HrLib::GetDateDaysByRange( $sdt , $edt);
  		$yesterdayDate = $sdt;
  		$yesterDayRecord = '';
  		$baseReading = 0;
  		$todayReading = 0;
  		$consumption = 0;
  		$reading = array();
  		foreach($days as $day):
  			$reading[$day] = 0;
  		endforeach;
  		
  		foreach($days as $day):
  			$reading[$day] = PowerUsagePeer::GetPowerConsumptionForTheDay($day) ;
  		endforeach;
  		
  		$this->reading = array();
  		$baseReading = 0;
  		$topUp = 0;
  		$dailies = array();
  		foreach($reading as $day => $consumption):
  			$dailies['date'] = $day;
  			$dailies['value'] = $consumption;
  			$this->reading[] = $dailies;
  		endforeach;	
  		$this->chardataJson = json_encode($this->reading);
//    		$this->var_dump( $this->reading );
//    		exit();
  	}
  }
  
  
  public function executeWaterConsumptionChart()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', '2015-01-01');
  		$this->_S('edate', Date('Y-m-d'));
  		$this->_S('ampm',  'PM');
  		$this->_S('frequency', 'daily');
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$this->benchmark = 1;
  		$sdt = $this->_G('sdate');
  		$edt = $this->_G('edate');
  		$days = HrLib::GetDateDaysByRange( $sdt , $edt);
  		$yesterdayDate = $sdt;
  		$yesterDayRecord = '';
  		$baseReading = 0;
  		$todayReading = 0;
  		$consumption = 0;
  		$reading = array();
  		foreach($days as $day):
  		$reading[$day] = 0;
  		endforeach;
  
  		foreach($days as $day):
  		$reading[$day] = WaterUsagePeer::GetWaterConsumptionForTheDay($day) ;
  		endforeach;
  
  		$this->reading = array();
  		$baseReading = 0;
  		$topUp = 0;
  		$dailies = array();
  		foreach($reading as $day => $consumption):
  		$dailies['date'] = $day;
  		$dailies['value'] = $consumption;
  		$this->reading[] = $dailies;
  		endforeach;
  		$this->chardataJson = json_encode($this->reading);
  		//    		$this->var_dump( $this->reading );
  		//    		exit();
  	}
  }
  
  public function executePConsumptionReport()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', DateUtils::GetThisMonthStartDate());
  		$this->_S('edate', DateUtils::GetThisMonthEndDate());
  		$this->_S('week1', DateUtils::DuFormat('W', DateUtils::GetPrevMonthStartDate()) );
  		$this->_S('week2', DateUtils::DuFormat('W', DateUtils::GetPrevMonthEndDate()) );
  		$this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
  		$this->_S('months2', DateUtils::GetThisMonthStartDate() );
  		$this->_S('eGroup', 'ALL');
  	}
  }
  
  public function executeHrForecast()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', DateUtils::GetThisMonthStartDate());
  		$this->_S('edate', DateUtils::GetThisMonthEndDate());
  		$this->_S('week1', DateUtils::DuFormat('W', DateUtils::GetPrevMonthStartDate()) );
  		$this->_S('week2', DateUtils::DuFormat('W', DateUtils::GetPrevMonthEndDate()) );
  		$this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
  		$this->_S('months2', DateUtils::GetThisMonthStartDate() );
  		$this->_S('eGroup', 'ALL');
  		$this->_S('frequency', 'daily');
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		if ( $this->_G('frequency') == 'monthly' )
  		{
  			$this->_S('sdate', DateUtils::DUFormat('Y-m-01', $this->_G('months1')) );
  			$this->_S('edate', DateUtils::DUFormat('Y-m-d',  DateUtils::GetLastDate($this->_G('months2'))) );
  		}
  		$this->benchmark = '1';
  	}
  
  }
  
  public function executeFinanceSummary()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', DateUtils::GetThisMonthStartDate());
  		$this->_S('edate', DateUtils::GetThisMonthEndDate());
  		$this->_S('week1', DateUtils::DuFormat('W', DateUtils::GetPrevMonthStartDate()) );
  		$this->_S('week2', DateUtils::DuFormat('W', DateUtils::GetPrevMonthEndDate()) );
  		$this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
  		$this->_S('months2', DateUtils::GetThisMonthStartDate() );
  		$this->_S('eGroup', 'ALL');
  		$this->_S('frequency', 'daily');
  		$this->_S('year1', Date('Y'));
  		$this->_S('year2', Date('Y'));
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		//        	if ( $this->_G('frequency') == 'monthly' )
  			//        	{
  			//        		$this->_S('sdate', $this->_G('year1').DateUtils::DUFormat('-m-01', $this->_G('months1')) );
  			//        		$this->_S('edate', $this->_G('year2').DateUtils::DUFormat('-m-d',  DateUtils::GetLastDate($this->_G('months2'))) );
  			//        	}
  		$this->benchmark = '1';
  	}
  
  }
  
  
  public function executeWaterConsumptionSearch()
  {
  	sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Water Reading');
  	$c = new Criteria();
  	$c->add(WaterUsagePeer::AMPM, 'DL', Criteria::NOT_EQUAL);
  	//$c->addGroupByColumn(WaterUsagePeer::DATE);
  	$c->addDescendingOrderByColumn(WaterUsagePeer::DATE);
  	$this->pager = WaterUsagePeer::doSelect($c);
  }
  
  public function executeWaterConsumptionAdd()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('ampm', (DateUtils::DUFormat('H', DateUtils::DUNow()) > 11 )? 'PM': 'AM');
  		$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  		$this->_S('time', Date('H:i:s'));
  		$this->_S('reading', 0);
  		$this->_S('unit', 'Cubic Meter');
  		$this->_S('unitprice', 0.2);
  		$this->_S('conversion_factor', 15);
  		$this->_S('totalcost', 0);
  		$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  		$this->_S('pdReading', WaterUsagePeer::getPreviousReading($this->_G('date')) );
  	}
  
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$cons  = $this->_G('reading') - WaterUsagePeer::getPreviousReading($this->_G('date'));
  		$tCost = $cons * $this->_G('unitprice') * $this->_G('conversion_factor');
  		$this->_S('consumption', $cons);
  		$this->_S('totalcost', $tCost);
  		$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  		$id = $this->_G('id');
  		$record = WaterUsagePeer::retrieveByPK($id);
  		if (! $record)
  		{
  			$record = new WaterUsage();
  			$record->setCreatedBy($this->_U());
  			$record->setDateCreated(DateUtils::DUNow());
  		}
  
  		if ($this->_G('save'))
  		{
  
  			$record->setDate($this->_G('date'));
  			$record->setTime($this->_G('time'));
  			$record->setAmpm($this->_G('ampm'));
  			$record->setReading($this->_G('reading'));
  			$record->setConsumption($cons);
  			$record->setUnit($this->_G('unit'));
  			$record->setUnitPrice($this->_G('unitprice'));
  			$record->setConversionFactor($this->_G('conversion_factor'));
  			$record->setTotalCost($this->_G('totalcost'));
  			$record->setModifiedBy($this->_U());
  			$record->setDateModified(DateUtils::DUNow());
  			$record->save();
  			if ($this->_G('ampm') == 'PM')
  			{
  				//FinanceSummaryPeer::PostThisValue('Water', $this->_G('date'), '', $this->_G('totalcost'), $this->_U());
  			}
  			$this->_SUF('Water Reading: ( '.$this->_G('reading') . ' ) Data has been successfuly saved');
  			$this->redirect('expenses/waterConsumptionAdd');
  
  		}
  	}
  
  }
  
  public function executeWaterConsumptionEdit()
  {
  	$id = $this->_G('id');
  	$record = WaterUsagePeer::retrieveByPK($id);
  	if (! $record)
  	{
  		$this->redirect404();
  		return;
  	}
  	$this->_S('ampm', $record->getAmpm());
  	$this->_S('date', $record->getDate());
  	$this->_S('time', $record->getTime());
  	$this->_S('reading', $record->getReading());
  	$this->_S('unit', $record->getUnit());
  	$this->_S('unitprice', $record->getUnitPrice());
  	$this->_S('conversion_factor', $record->getConversionFactor());
  	$this->_S('totalCost', $record->getTotalCost());
  	$this->_S('formula', $this->_G('reading') .' * '.$this->_G('conversion_factor').' * $ '.$this->_G('unitprice'). ' / '. $this->_G('unit'));
  	$this->setTemplate('waterConsumptionAdd');
  }
  
  public function executeWaterConsumptionDelete()
  {
  	$id = $this->_G('id');
  	$this->record = WaterUsagePeer::retrieveByPK($id);
  	$rec = $this->record->getDate() .' '. $this->record->getAmpm();
  	$this->record->delete();
  	$this->_SUF($rec.' has been deleted successfuly.');
  	$this->redirect('expenses/waterConsumptionSearch');
  }
  
  public function executePowerConsumptionCompute()
  {
  	 maintenanceLib::ComputeDailyPowerConsumption();
  	 exit();
  }
  
  public function executeWaterConsumptionCompute()
  {
  	 maintenanceLib::ComputeDailyWaterConsumption();
  	 exit();
  }
  
  
  public function executePubPowerConsumptionSearch()
  {
  	$c = new Criteria();
  	$c->addDescendingOrderByColumn(PubPowerUsagePeer::TRANS_DATE);
  	$this->pager = PubPowerUsagePeer::doSelect($c);
  }
  
  public function executePubPowerConsumptionAdd()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  		$this->_S('usage', '');
  		$this->_S('rate', '');
  		$this->_S('amount', '');
  		$this->_S('total_amount_paid', '');
  	}
  
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{

  		if ($this->_G('save'))
  		{
  			$record = PubPowerUsagePeer::retrieveByPK($this->_G('id'));
  			if (! $record)
  			{
  				$record = new PubPowerUsage();
  				$record->setCreatedBy($this->_U());
  				$record->setDateCreated(DateUtils::DUNow());
  			}
  			
  			$record->setTransDate(DateUtils::DUFormat('Y-m-27', $this->_G('date')) );
  			$record->setConsumption($this->_G('usage'));
  			$record->setRate($this->_G('rate'));
  			$record->setAmount($this->_G('usage') * $this->_G('rate') );
  			$record->setTotalAmountPaid($this->_G('total_amount_paid'));
  			$record->setModifiedBy($this->_U());
  			$record->setDateModified(DateUtils::DUNow());
  			$record->save();
  			if ($this->_G('ampm') == 'PM')
  			{
  				//FinanceSummaryPeer::PostThisValue('power', $this->_G('date'), '', $this->_G('totalcost'), $this->_U());
  			}
  			$this->_SUF('Power Reading: ( '.$this->_G('reading') . ' ) Data has been successfuly saved');
  			$this->redirect('expenses/pubPowerConsumptionSearch');
  
  		}
  	}
  
  }
  
  public function executePubPowerConsumptionEdit()
  {
  	$record = PubPowerUsagePeer::retrieveByPK($this->_G('id'));
  	if ( $record):
	  	$this->_S('date', $record->getTransDate() );
	  	$this->_S('usage', $record->getConsumption() );
	  	$this->_S('rate', $record->getRate() );
	  	$this->_S('amount', $record->getAmount() );
	  	$this->_S('total_amount_paid', $record->getTotalAmountPaid() );
  	endif;
  	$this->setTemplate('pubPowerConsumptionAdd');
  }
  
  public function executePubPowerConsumptionDelete()
  {
  	$id = $this->_G('id');
  	$this->record = PubPowerUsagePeer::retrieveByPK($id);
  	$rec = $this->record->getTransDate() ;
  	$this->record->delete();
  	$this->_SUF($rec.' has been deleted successfuly.');
  	$this->redirect('expenses/pubPowerConsumptionSearch');
  }

  public function executePubPowerConsumptionChart()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', '2015-01-01');
  		$this->_S('edate', Date('Y-m-d'));
  		$this->_S('ampm',  'PM');
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$this->benchmark = 1;
  		$sdt = $this->_G('sdate');
  		$edt = $this->_G('edate');
  		$days = HrLib::GetDateDaysByRange( $sdt , $edt);
  		$yesterdayDate = $sdt;
  		$yesterDayRecord = '';
  		$baseReading = 0;
  		$todayReading = 0;
  		$consumption = 0;
  		$reading = array();
  		
  		$powerData = PubPowerUsagePeer::GetPubPowerConsumptionbyDateRange($sdt, $edt);
  		$reading = array();
  		$this->reading = array();
  		foreach($powerData as $record):
  			$reading[$record->getTransDate()] = $record->getConsumption();
  		endforeach;
  		
  		$baseReading = 0;
  		$topUp = 0;
  		$dailies = array();
  		foreach($reading as $day => $consumption):
  			$dailies['date']  = $day;
  			$dailies['value'] = $consumption;
  			$this->reading[] = $dailies;
  		endforeach;
  		$this->chardataJson = json_encode($this->reading);
  		//    		$this->var_dump( $this->reading );
  		//    		exit();
  	}
  }
  
  
  public function executePubWaterConsumptionSearch()
  {
  	$c = new Criteria();
  	$c->addDescendingOrderByColumn(PubWaterUsagePeer::TRANS_DATE);
  	$this->pager = PubWaterUsagePeer::doSelect($c);
  }
  
  public function executePubWaterConsumptionAdd()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  		$this->_S('usage', '');
  		$this->_S('rate', '1.1700');
  		$this->_S('amount', '');
  		$this->_S('total_amount_paid', '');
  	}
  
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		if ($this->_G('save'))
  		{
  			$record = PubWaterUsagePeer::retrieveByPK($this->_G('id'));
  			if (! $record)
  			{
  				$record = new PubWaterUsage();
  				$record->setCreatedBy($this->_U());
  				$record->setDateCreated(DateUtils::DUNow());
  			}
//   			$this->var_dump( $this->_G('id'));
//   			exit();
  			$record->setTransDate(DateUtils::DUFormat('Y-m-28', $this->_G('date')) );
  			$record->setConsumption($this->_G('usage'));
  			$record->setRate($this->_G('rate'));
  			$record->setAmount($this->_G('usage') * $this->_G('rate') );
  			$record->setTotalAmountPaid($this->_G('total_amount_paid'));
  			$record->setModifiedBy($this->_U());
  			$record->setDateModified(DateUtils::DUNow());
  			$record->save();
  			$this->_SUF('Water Reading: ( '.$this->_G('usage') . ' ) Data has been successfuly saved');
  			$this->redirect('expenses/pubWaterConsumptionSearch');
  
  		}
  	}
  
  }
  
  public function executePubWaterConsumptionEdit()
  {
  	$record = PubWaterUsagePeer::retrieveByPK($this->_G('id'));
  	if ( $record):
	  	$this->_S('date', $record->getTransDate() );
	  	$this->_S('usage', $record->getConsumption() );
	  	$this->_S('rate', $record->getRate() );
	  	$this->_S('amount', $record->getAmount() );
	  	$this->_S('total_amount_paid', $record->getTotalAmountPaid() );
  	endif;
  	$this->setTemplate('pubWaterConsumptionAdd');
  }
  
  public function executePubWaterConsumptionDelete()
  {
  	$id = $this->_G('id');
  	$this->record = PubWaterUsagePeer::retrieveByPK($id);
  	$rec = $this->record->getTransDate() ;
  	$this->record->delete();
  	$this->_SUF($rec.' has been deleted successfuly.');
  	$this->redirect('expenses/pubWaterConsumptionSearch');
  }
  
  public function executePubWaterConsumptionChart()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', '2015-01-01');
  		$this->_S('edate', Date('Y-m-d'));
  		$this->_S('ampm',  'PM');
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$this->benchmark = 1;
  		$sdt = $this->_G('sdate');
  		$edt = $this->_G('edate');
  		$yesterdayDate = $sdt;
  		$yesterDayRecord = '';
  		$baseReading = 0;
  		$todayReading = 0;
  		$consumption = 0;
  		$reading = array();
  
  		$powerData = PubWaterUsagePeer::GetPubWaterConsumptionbyDateRange($sdt, $edt);
  		$reading = array();
  		$this->reading = array();
  		foreach($powerData as $record):
  			$reading[$record->getTransDate()] = $record->getConsumption();
  		endforeach;
  		$baseReading = 0;
  		$topUp = 0;
  		$dailies = array();
  		foreach($reading as $day => $consumption):
	  		$dailies['date']  = $day;
	  		$dailies['value'] = $consumption;
	  		$this->reading[] = $dailies;
  		endforeach;
  		$this->chardataJson = json_encode($this->reading);
//   		   		$this->var_dump( $this->reading );
//   		   		exit();
  	}
  }
  
  public function executeDieselConsumptionSearch()
  {
  	$c = new Criteria();
  	$c->addDescendingOrderByColumn(DieselUsagePeer::TRANS_DATE);
  	$this->pager = DieselUsagePeer::doSelect($c);
  }
  
  public function executeDieselConsumptionAdd()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('date', DateUtils::DUFormat('Y-m-d',DateUtils::DUNow()));
  		$this->_S('usage', 14800);
  		$this->_S('cost_per_unit', .720);
  		$this->_S('unit', 'LITER');
  		$this->_S('amount', $this->_G('usage') * $this->_G('cost_per_unit'));
  	}
  
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		if ($this->_G('save'))
  		{
  			$record = DieselUsagePeer::retrieveByPK($this->_G('id'));
  			if (! $record)
  			{
  				$record = new DieselUsage();
  				$record->setCreatedBy($this->_U());
  				$record->setDateCreated(DateUtils::DUNow());
  			}
  			$amount = str_replace( ',', '', $this->_G('amount')); 
//   			$this->var_dump($amount);
//   			exit();
  			$record->setTransDate(DateUtils::DUFormat('Y-m-d', $this->_G('date')) );
  			$record->setConsumption($this->_G('usage'));
  			$record->setUnit($this->_G('unit'));
  			$record->setCostPerUnit($this->_G('cost_per_unit'));
  			$record->setAmount($this->_G('usage')  * $this->_G('cost_per_unit'));
  			$record->setModifiedBy($this->_U());
  			$record->setDateModified(DateUtils::DUNow());
  			$record->save();
  			$this->_SUF('Diesel Usage: ( '.$this->_G('usage') . ' ) Data has been successfuly saved');
  			$this->redirect('expenses/dieselConsumptionSearch');
  
  		}
  	}
  
  }
  
  public function executeDieselConsumptionEdit()
  {
  	$record = DieselUsagePeer::retrieveByPK($this->_G('id'));
  	if ( $record):
  	$this->_S('date', $record->getTransDate() );
  	$this->_S('usage', $record->getConsumption() );
  	$this->_S('unit', $record->getUnit() );
  	$this->_S('cost_per_unit', $record->getCostPerUnit() );
  	$this->_S('amount', $record->getAmount() );
  	endif;
  	$this->setTemplate('dieselConsumptionAdd');
  }
  
  public function executeDieselConsumptionDelete()
  {
  	$id = $this->_G('id');
  	$this->record = DieselUsagePeer::retrieveByPK($id);
  	$rec = $this->record->getTransDate() ;
  	$this->record->delete();
  	$this->_SUF($rec.' has been deleted successfuly.');
  	$this->redirect('expenses/dieselConsumptionSearch');
  }
  
  public function executeDieselConsumptionChart()
  {
  	if ( $this->getRequest()->getMethod() != sfRequest::POST)
  	{
  		$this->_S('sdate', '2015-01-01');
  		$this->_S('edate', Date('Y-m-d'));
  	}
  	if ( $this->getRequest()->getMethod() == sfRequest::POST)
  	{
  		$this->benchmark = 1;
  		$sdt = $this->_G('sdate');
  		$edt = $this->_G('edate');
  		$yesterdayDate = $sdt;
  		$yesterDayRecord = '';
  		$baseReading = 0;
  		$todayReading = 0;
  		$consumption = 0;
  		$reading = array();
  
  		$powerData = DieselUsagePeer::GetDieselConsumptionbyDateRange($sdt, $edt);
  		$reading = array();
  		$this->reading = array();
  		foreach($powerData as $record):
  			$reading[$record->getTransDate()] = $record->getConsumption();
  		endforeach;
  		$baseReading = 0;
  		$topUp = 0;
  		$dailies = array();
  		foreach($reading as $day => $consumption):
	  		$dailies['date']  = $day;
	  		$dailies['value'] = $consumption;
	  		$this->reading[] = $dailies;
  		endforeach;
  		$this->chardataJson = json_encode($this->reading);
  		//   		   		$this->var_dump( $this->reading );
  		//   		   		exit();
  	}
  }
  
}

