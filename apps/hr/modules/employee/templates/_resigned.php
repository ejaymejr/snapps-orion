<?php use_helper('Validation', 'Javascript') ?>
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/resigned?id=' . $sf_params->get('id') ) ?>" method="post">
<div class="panel" data-role="panel">
    <div class="panel-header bg-green fg-white">
        RESIGNATION
    </div>
    <div class="panel-content ">
	<table class="table bordered" >
			
		<tr>
			<td width="200" class="bg-clearBlue alignRight" nowrap>Resignation Date</td>
			<td class="FORMcell-right alignLeft" nowrap><?php
			$stat =  HrEmployeePeer::GetOptimizedDatabyEmployeeNo($sf_params->get('employee_no'), array('date_resigned') );
			//var_dump($stat);
			$sf_params->set('date_resigned', $stat->get('DATE_RESIGNED'));
			//echo HTMLForm::DrawDateInput('date_resigned', $sf_params->get('date_resigned', date('Y-m-d')), XIDX::next(), XIDX::next(), ' size="12" '); 
			echo HTMLLib::CreateDateInput('date_resigned', $sf_params->get('date_resigned') , 'span2');
			echo '<span class="negative">* '. $sf_params->get('date_resigned') .'</span>';
			?>
			<td class="FORMcell-right alignLeft" nowrap></td>
		</tr>
		<tr>
			<td width="200" class="bg-clearBlue alignRight" nowrap>Remarks</td>
			<td class="FORMcell-right alignLeft" nowrap><?php
			echo textarea_tag('resign_remarks', 'Put Remarks Here...', array('rows' => 5, 'cols' => 80)); 
			?>
			
			<td class="FORMcell-right" nowrap>&nbsp;</td>
		</tr>			
		<tr>
			<td class="bg-clearBlue alignRight" nowrap></td>
			<td class="alignLeft" nowrap><?php echo submit_tag(' Mark as Inactive ', array('confirm' => ' Are you sure you want to mark as in-active this month?', 'name'=> 'inactive', 'class'=>'success')); ?>
			</td>
			<td class=" alignRight" nowrap></td>
		</tr>
	</table>
    </div>
</div>
<br />

<div class="panel" data-role="panel">
    <div class="panel-header bg-green fg-white">
        REACTIVATE
    </div>
    <div class="panel-content ">
	<table class="table bordered" >				
		<tr>
			<td width="200" class="bg-clearBlue alignRight" nowrap><label>Notice</label></td>
			<td class="FORMcell-right alignLeft" nowrap>
			This portion will mark the Employee as Active.  <br>
			Make sure that you will set a new basic pay for the employee.
			<td class="FORMcell-right" nowrap>&nbsp;</td>
		</tr>	
		<tr>
			<td class="bg-clearBlue alignRight" nowrap></td>
			<td class="alignLeft" nowrap><?php echo submit_tag(' Mark as Active ', array('confirm' => ' Are you Sure?', 'name'=> 'active', 'class'=>'success')); ?>
			</td>
		</tr>
	</table>
</div>
</div>
</form>		

