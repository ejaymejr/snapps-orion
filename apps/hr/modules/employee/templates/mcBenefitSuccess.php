<script>
	function checkedAll () {
		var inputs = document.getElementsByTagName('input');
		checked = document.getElementById('notImportant1').checked;
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type == 'checkbox') {
				alert(inputs[i].id)
				inputs[i].checked = checked;
			}
		}
		document.getElementById('notImportant1').checked = checked;
	 }
</script>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('employee/mcBenefit'). '?id=' . $sf_params->get('id');?>" method="post">
<div><center>
<table class="table bordered condensed" >
<tr>
    <td colspan="2" class="alignRight bg-clearGreen"  height="23px" nowrap>MC Benefit List of Employee</td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel">Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('company'); 
        echo HTMLLib::CreateSelect('company', $sf_params->get('company'), HrCompanyPeer::OptCompanyNameListWithAll(), 'span2');

    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="group" value=" Show Employee List " class="success">
        &nbsp;
        <input type="submit" name="saveList" value=" Save Checked Item " class="success">
        &nbsp;
        
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap><small><pre>
        <span class="negative">S$<?php echo HrEmployeeMcbenefitPeer::MONTHLY_BENEFIT ?></span> as an Extra Income every month.
        And additionally add <span class="negative">S$<?php echo HrEmployeeMcbenefitPeer::SEMI_ANNUAL ?></span> if the employee havent applied MC within the period of 6 Months.
        The <span class="negative">S$<?php echo HrEmployeeMcbenefitPeer::SEMI_ANNUAL ?></span> will be posted on the June and December Payroll. <br>
        The list will not show people that Earns more than <span class="negative">2500</span> per month.  
        Ask Eman to Tick/Untick Specific employee not found on the list. 
    	</pre></small></td>
</tr>
</table>
</div>

<?php if (isset($pager)): ?>
<!-- <div id="DIVSmsBrowse"> -->
<!-- <table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > -->
<!-- <tr> -->
<!--     <td colspan="2" class="alignCenter tk-menu tableHeader"  height="23px" nowrap> -->
    <?php 
//     	echo input_tag('c_company', $sf_params->get('company') , 'type=hidden');
//     	echo $sf_params->get('company') . ' List of Employees' 
    ?></td>
<!-- </tr> -->
<!-- </table> -->
	<?php 
    	
    	if (isset($pager)):
    		$filename = hrPager::McBenefitEmployeeList($pager);
    		$cols = array('seq', 'action', 'employee_no', 'name', 'company', 'joined-date', 'months');
    		echo PagerJson::AkoDataTableForTicking($cols, $filename, '', '', sizeof($filename) ); //create the table
    		echo input_tag('isUpdate', true, 'type="hidden"');
    	endif;
	?>
</div>

<?php endif; ?>
</form>
</div>