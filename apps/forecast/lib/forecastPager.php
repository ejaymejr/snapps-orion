<?php
class forecastPager
{
	public static function SearchEmployee($pager, $employeeList)
	{
		$editDel = "";
		$data = array();
		$seq = 0; 
		$editLink = '';
		$deleteLink = '';
		foreach ($pager as $record):
			$seq ++ ;
	        $workid = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($record->getEmployeeNo());
	        $isChecked = '';
	        if (array_key_exists($record->getEmployeeNo(), $employeeList) ):
	        	$isChecked = 'checked ';
	        endif;
			$data[] = array(
					  'seq'=>$seq
					, 'employee_no'=> '<small>'.$record->getEmployeeNo() . '<small>'
					, 'name'=> '<small>'.$record->getName().'</small>'
					, 'company'=> '<small>'.HrCompanyPeer::GetNamebyId($record->getHrCompanyId()).'</small>'
					, 'account_no'=> '<small>'.$record->getAcctNo().'</small>'
					, 'team'=> '<small>'.$record->getTeam().'</small>'
					, 'joined-date'=> '<small>'.$record->getCommenceDate().'</small>'
					, 'work-schedule'=> '<small>'.substr(TkWorktemplatePeer::GetDescriptionbyWorktempNo($workid), 0 ,30).'</small>'
					, 'type'=> '<small>'.$record->getTypeOfEmployment().'</small>'
					, 'mom'=> '<small>'.$record->getMomGroup().'</small>'
					, 'resigned'=> '<small>'.$record->getDateResigned().'</small>'
					, 'pass-type'=> '<small>'.$record->getRankCode().'</small>'
					//, 'action'=> '<small>'.HTMLLib::CreateCheckBox('chk_'.$record->getEmployeeNo() , '', $isChecked ) .'</small>'
					, 'action'=> '<small><input type="checkbox" id="chk_'.$record->getEmployeeNo().'" name="chk_'.$record->getEmployeeNo().'"  '.$isChecked.' ></small>'
					, 'record_id'=>$record->getId()
			);
		endforeach;
		return $data;
	}
	
	public static function SalesVCostPager($pager, $titles)
	{
		$particulars = array();
		foreach ($pager as $header => $costBreakdown):
			$headers[$header] = DateUtils::DUFormat('M', $header);
			foreach($costBreakdown as $part => $anything ):
				$particulars[$part] = $part;
			endforeach;
		endforeach;
		$editDel = "";
		$data = array();
		$seq = 0;
		$cols = array("seq", "particular");//, "jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec");
		foreach($titles as $title):
			$cols[] = strtolower(DateUtils::DUFormat('M', $title)) ;
		endforeach;

		$jan = 0;
		foreach($particulars as $particular):
			$seq ++ ;
			$data[] = array(
					  'seq'=>'<small>'.$seq.'</small>'
					, 'particular'=>'<small>'.$particular.'</small>'
					);
			foreach($cols as $col):
				$data[] = array($col => "test");
			endforeach;
		endforeach;
		return $data;
	}
} //end Class
