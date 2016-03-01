<?php
class maintenancePager
{
	public static function GetStartDate($pcode)
	{
		$dt = substr($pcode, 0, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}

	public static function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}
	
	public static function SearchPowerConsumption($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
			$seq ++ ;
			$editUrl  = link_to('Edit', 'expenses/powerConsumptionEdit?id='. $record->getId());
			$delUrl   = link_to('Delete', 'expenses/powerConsumptionDelete?id='. $record->getId(),
                    	array('confirm' => 'Sure to delete this record?')); 
			$editDel = $editUrl . ' | ' . $delUrl ;
			
			$data[] = array(
					  'seq'=>'<small>'.$seq.'</small>'
					, 'action'=>'<small>'.$editDel.'</small>'
					, 'date'=>'<small>'.$record->getDate().'</small>'
					, 'day_of_week'=> '<small>'.DateUtils::DUFormat('l', $record->getDate()).'</small>'
					, 'ampm'=> '<small>'.$record->getAmPm().'</small>'
					, 'consumption'=> '<small>'. $record->getConsumption().'</small>'
					, 'reading'=> '<small>'. $record->getReading().'</small>'
					, 'unit'=> '<small>'. $record->getUnit().'</small>'
					, 'cov(15)'=> '<small>'. $record->getConversionFactor().'</small>'
					, 'daily_cost'=> '<small>'. $record->getTotalCost() .'</small>'
					, 'record_id'=>$record->getId()
					
			);
		endforeach;
		return $data;
	}
	
	public static function SearchPubPowerConsumption($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = link_to('Edit', 'expenses/pubPowerConsumptionEdit?id='. $record->getId());
		$delUrl   = link_to('Delete', 'expenses/pubPowerConsumptionDelete?id='. $record->getId(),
				array('confirm' => 'Sure to delete this record?'));
		$editDel = $editUrl . ' | ' . $delUrl ;
			
		$data[] = array(
				'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'trans_date'=>'<small>'.$record->getTransDate().'</small>'
				, 'consumption'=> '<small>'.number_format($record->getConsumption(),2).'</small>'
				, 'rate'=> '<small>'. number_format($record->getRate(),4).'</small>'
				, 'amount'=> '<small>'. number_format($record->getAmount(),2).'</small>'
				, 'total_amount_paid'=> '<small>'. number_format($record->getTotalAmountPaid(),2).'</small>'
				, 'record_id'=>$record->getId()
					
		);
		endforeach;
		return $data;
	}
	
	public static function SearchPowerConsumptionMonthly($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = link_to('Edit', 'expenses/powerConsumptionEdit?id='. $record->getId());
		$delUrl   = link_to('Delete', 'expenses/powerConsumptionDelete?id='. $record->getId(),
				array('confirm' => 'Sure to delete this record?'));
		$editDel = $editUrl . ' | ' . $delUrl ;
			
		$pconvert = 0;
		$am = PowerUsagePeer::GetOptimizedDatabyDateAmPm($record->getDate(), 'AM', array( 'reading', 'consumption', 'total_cost', 'conversion_factor') );
		$amread = ($am) ? $am->get('READING') : '';
		$amcons = ($am) ? $am->get('CONSUMPTION') : '';
		$aamt   = ($am) ? $am->get('TOTAL_COST') : '';
		$pconvert = ($am) ? number_format($am->get('CONSUMPTION') * $am->get('CONVERSION_FACTOR'), 2) : $pconvert;
			
		$pm = PowerUsagePeer::GetOptimizedDatabyDateAmPm($record->getDate(), 'PM', array( 'reading', 'consumption', 'total_cost', 'conversion_factor') );
		$pmread = ($pm) ? $pm->get('READING') : '';
		$pmcons = ($pm) ? $pm->get('CONSUMPTION') : '';
		$pamt   = ($pm) ? $pm->get('TOTAL_COST') : '';
		$pconvert = ($pm) ? number_format($pm->get('CONSUMPTION') * $pm->get('CONVERSION_FACTOR'), 2) : $pconvert;
	
			
		$data[] = array(
				'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'date'=>'<small>'.$record->getDate().'</small>'
				, 'day_of_week'=> '<small>'.DateUtils::DUFormat('l', $record->getDate()).'</small>'
				, 'am_reading'=> '<small>'.$amread.'</small>'
				, 'pm_reading'=> '<small>'. $pmread .'</small>'
				, 'am_consumption'=> '<small>'. $amcons.'</small>'
				, 'pm_consumption'=> '<small>'. $pmcons.'</small>'
				, 'unit'=> '<small>'. $record->getUnit().'</small>'
				, 'cov(15)'=> '<small>'. $pconvert.'</small>'
				, 'daily_cost'=> '<small>'. $pamt .'</small>'
				, 'record_id'=>$record->getId()
					
		);
		endforeach;
		return $data;
	}
	
	
	public static function SearchWaterConsumption($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = link_to('Edit', 'expenses/waterConsumptionEdit?id='. $record->getId());
		$delUrl   = link_to('Delete', 'expenses/waterConsumptionDelete?id='. $record->getId(),
				array('confirm' => 'Sure to delete this record?'));
		$editDel = $editUrl . ' | ' . $delUrl ;
			
		$data[] = array(
					  'seq'=>'<small>'.$seq.'</small>'
					, 'action'=>'<small>'.$editDel.'</small>'
					, 'date'=>'<small>'.$record->getDate().'</small>'
					, 'day_of_week'=> '<small>'.DateUtils::DUFormat('l', $record->getDate()).'</small>'
					, 'ampm'=> '<small>'.$record->getAmPm().'</small>'
					, 'reading'=> '<small>'.$record->getReading().'</small>'
					, 'consumption'=> '<small>'. $record->getConsumption().'</small>'
					, 'unit'=> '<small>'. $record->getUnit().'</small>'
					, 'cov(15)'=> '<small>'. $record->getConversionFactor().'</small>'
					, 'daily_cost'=> '<small>'. $record->getTotalCost() .'</small>'
					, 'record_id'=>$record->getId()
					
			);
		endforeach;
		return $data;
	}
	

	public static function SearchPubWaterConsumption($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = link_to('Edit', 'expenses/pubWaterConsumptionEdit?id='. $record->getId());
		$delUrl   = link_to('Delete', 'expenses/pubWaterConsumptionDelete?id='. $record->getId(),
				array('confirm' => 'Sure to delete this record?'));
		$editDel = $editUrl . ' | ' . $delUrl ;
			
		$data[] = array(
				'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'trans_date'=>'<small>'.$record->getTransDate().'</small>'
				, 'consumption'=> '<small>'.number_format($record->getConsumption(),2).'</small>'
				, 'rate'=> '<small>'. number_format($record->getRate(),4).'</small>'
				, 'amount'=> '<small>'. number_format($record->getAmount(),2).'</small>'
				, 'total_amount_paid'=> '<small>'. number_format($record->getTotalAmountPaid(),2).'</small>'
				, 'record_id'=>$record->getId()
					
		);
		endforeach;
		return $data;
	}
	
	
	public static function SearchDieselConsumption($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = link_to('Edit', 'expenses/dieselConsumptionEdit?id='. $record->getId());
		$delUrl   = link_to('Delete', 'expenses/dieselConsumptionDelete?id='. $record->getId(),
				array('confirm' => 'Sure to delete this record?'));
		$editDel = $editUrl . ' | ' . $delUrl ;
			
		$data[] = array(
				'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'trans_date'=>'<small>'.$record->getTransDate().'</small>'
				, 'consumption'=> '<small>'.number_format($record->getConsumption(),2).'</small>'
				, 'unit'=> '<small>'. $record->getUnit().'</small>'
				, 'cost_per_unit'=> '<small>'. number_format($record->getCostPerUnit(),2).'</small>'
				, 'amount'=> '<small>'. number_format($record->getAmount(),2).'</small>'
				, 'record_id'=>$record->getId()
					
		);
		endforeach;
		return $data;
	}
}
