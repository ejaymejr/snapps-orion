<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dashboard/attendanceLog'). '?id=' . $sf_params->get('id');?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" width="10%">&nbsp;</td>
    <td class="FORMcell-right" nowrap width="60%"></td>
    <td class="alignCenter" nowrap rowspan='5'><?php echo link_to (image_tag('hr/cautionSign.jpg'),              'dtr/cautionInfo')  ?>
    <br><span class="tk-style6" ><blink>Please be informed that you <br>are being Logged.</blink></span>
    </td>
    <td class="FORMcell-right" nowrap width="10%" rowspan='6'></td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Employee No</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('employee_no'); 
        echo select_tag('employee_no', 
             options_for_select($empList, 
             $sf_params->get('employee_no') ) );
        echo input_tag('empNo', '-employee no-', "id='empNo' type='hidden'");
           
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>From</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::DrawDateInput('sdate', $sf_params->get('sdate'), XIDX::next(), XIDX::next(), 'size="15"');
    echo "<span class='FORMcell-right'>&nbsp;&nbsp;&nbsp;to</span>";
    echo HTMLForm::DrawDateInput('edate', $sf_params->get('edate'), XIDX::next(), XIDX::next(), 'size="15"');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo select_tag('company', 
         options_for_select($company, 
         $sf_params->get('company') ) );    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Notice:</td>
    <td class="FORMcell-right" nowrap>
    <span class="negative">The System will NOT Re-Compute the Previous Month Data</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="search"  value=" Show Monthly DTR " class="submit-button">
    </td>
</tr>

</table>
</form>
<?php 
if ($showLog):
	$company = $sf_params->get('company');
	$sdt = $sf_params->get('sdate');
	$edt = $sf_params->get('edate');
	if ($sf_params->get('employee_no')):
		$empList = array($sf_params->get('employee_no'));
		$empDetail = GetAttendanceRecord($empList, $sdt, $edt);
	else:
		$empList = HrEmployeePeer::GetActiveEmployeeListByCompany($company);
		$empDetail = GetAttendanceRecord($empList, $sdt, $edt);
	endif;
?>
	
		<?php 
		$totalDays = DateUtils::DUFormat('t', $edt);
		echo '<table class="FORMtable" width="'.( ($totalDays * 4 * 70) + 300) .'px" border="0" cellpadding="4" cellspacing="1" style="background-color:green;">';
		echo "<tr ><th width='100px' rowspan='2' style='color: #fff'>Seq</th><th width='200px' rowspan='2' style='color: #fff'>Name</th>";
		for($x=0; $x < $totalDays ; $x++  ):
			echo "<th class='FORMlabel alignCenter' colspan='4' width='70px' style='color: #fff'>".DateUtils::DUFormat('F j - l', DateUtils::AddDate($sdt, $x) )."</th>";
		endfor;
		echo "</tr>";
		
		for($x=0; $x< $totalDays; $x++  ):
			echo "<td class='FORMlabel alignCenter' style='color: #fff'>In</td>";
			echo "<td class='FORMlabel alignCenter' style='color: #fff'>Out</td>";
			echo "<td class='FORMlabel alignCenter' style='color: #fff'>OutOrig</td>";
			echo "<td class='FORMlabel alignCenter' style='color: #fff'>Update</td>";
		endfor;
		
		echo "</tr>";
			$prevDate = DateUtils::DUFormat('Y-m-d', $sdt);
			$seq = 1;
			foreach($empDetail as $name=>$rec):
			$rowClass = (($seq % 2) == 0) ? "dataGridRowOdd" : "dataGridRowEven";
			$rowID = "sq_" . $name;
			?>
			<tr class="<?=$rowClass?>"
			    id="<?=$rowID?>"
			    onMouseOver="rowHovered('<?=$rowID?>');"
			    onMouseOut="rowUnhovered('<?=$rowID?>');"
			    onMouseDown="rowClicked('<?=$rowID?>', null);"
			    >
			  <?php   
				echo '<td class="FORMcell-left FORMlabel" >'.$seq++.'</td><td class="FORMcell-left FORMlabel">'.substr($name, 0, 22).'</td>';
				$cDate = 'current date';
				for($x=0; $x< $totalDays; $x++  ):
					$cDate = DateUtils::AddDate($sdt, $x);
					$pos = SearchEntry($cDate, $rec['time_in']);
					$isonleave = HrEmployeeLeavePeer::IsOnleaveByName($name, $cDate);
					if ($isonleave):
						echo '<td colspan="4" class="FORMlabel alignCenter tk-oran">'.$isonleave->getLeaveType().'</td>';
					else:
	 					if ($pos !== 'norecord'): //'d-H:i'
	 						echo '<td class="FORMlabel alignCenter" >'.DateUtils::DUFormat('H:i', $rec['time_in'][$pos]).'</td>';
	 						echo '<td class="FORMlabel alignCenter">'.DateUtils::DUFormat('H:i', $rec['time_out'][$pos]).'</td>';
	 						echo '<td class="FORMlabel alignCenter">'.DateUtils::DUFormat('H:i', $rec['time_out_orig'][$pos]).'</td>';
	 						echo '<td class="FORMlabel alignCenter">'.$rec['modified'][$pos].'</td>';
	 					else:
	 						echo '<td colspan="4" class="tk-pink alignCenter">'.DateUtils::DUFormat('d', DateUtils::AddDate($prevDate, $x)).' - No Record -</td>';
	 					endif;
	 				endif;
				endfor;
				echo '</tr>';
			endforeach;	
		?>
		
		
	</table>
	
<?php 
endif;

function GetAttendanceRecord($empList, $sdt, $edt){
	$empData = array();
	foreach($empList as $empNo):
	$empDetail = TkAttendancePeer::GetAttendance($empNo, $sdt, $edt);
		foreach($empDetail as $rec):
			$empData[$rec->getName()]['time_in'][] = $rec->getTimeIn();
			$empData[$rec->getName()]['time_out'][] = $rec->getTimeOut();
			$empData[$rec->getName()]['time_out_orig'][] = $rec->getTimeOutOrig();
			$empData[$rec->getName()]['modified'][] = $rec->getModifiedBy();
		endforeach;
	endforeach;

	//var_dump($empData[$rec->getName()]['time_out']);
	return $empData;
}

function SearchEntry($needle, $haystack)
{
	foreach($haystack as $k=>$rec):
 		if ((strpos($rec, $needle)) !== false) return $k;
// 			echo $rec.' : '. $needle .' = '. $k . ' found <br>';
// 		endif;
//		echo $rec.' : '. $needle .' = '. strpos($rec, $needle) . ' found <br>';
	endforeach;
	return "norecord";
}
?>

