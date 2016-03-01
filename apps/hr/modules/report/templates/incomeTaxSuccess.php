<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd"
	action="<?php echo url_for('report/incomeTax') ?>" method="post">
<table width="100%" class="table bordered condensed" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td class="bg-clearBlue alignRight">Employee</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('employee_no');
		echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameListAll(), 'span4');
		?>
	</td>
	</tr>
		<tr>
		<td class="bg-clearBlue alignRight">Company</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelect('company', $sf_params->get('company'), HrCompanyPeer::GetCompanyListName(), 'span3');
		?> <span class="negative"> * Must Select Company if you want to see the list</span></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Designation</td>
		<td class="FORMcell-right" nowrap><?php
		$assign = array('ADMIN/STAFF'=>'ADMIN/STAFF',  'MANAGER'=>'MANAGER', 'TECHNICIAN'=>'TECHNICIAN', 'OTHER'=>'OTHER');
		echo HTMLLib::CreateSelect('assign', $sf_params->get('assign'), $assign, 'span3');
		echo '&nbsp;&nbsp;&nbsp;';
		echo HTMLLib::CreateInputText('nassign', $sf_params->get('nassign'), 'span3');

		?> &nbsp;&nbsp; <input type="submit" name="retrieve_from_ic" value=" Get Data From IC " class="success"> 
		<span class="negative"></span></td>
	</tr>	
	<tr>
		<td class="bg-clearBlue alignRight">Income Tax for the Year</td>
		<td class="FORMcell-right" nowrap><?php
		//$status = sfConfig::get('years');
		$status = HrFiscalYearPeer::GetFiscalYearList1();
		echo HTMLLib::CreateSelect('cyear', $sf_params->get('cyear'), $status, 'span1');
		?> <span class="negative"> *</span></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Employer Details</td>
		<td class="FORMcell-right" nowrap></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Employer</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('erName');
		echo HTMLLib::CreateInputText('erName', $sf_params->get('erName'), 'span3');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Tax Ref No. (RCB No.)</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('rcb_no');
		echo HTMLLib::CreateInputText('rcb_no', $sf_params->get('rcb_no'), 'span3');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Address</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('erAddr');
		echo HTMLLib::CreateInputText('erAddr', $sf_params->get('erAddr'), 'span3');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Contact Person</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('erCPer');
		echo HTMLLib::CreateInputText('erCPer', $sf_params->get('erCPer'), 'span3');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Designation</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('designation');
		echo HTMLLib::CreateInputText('designation', $sf_params->get('designation'), 'span2');
		?></td>
	</tr>
	<tr>
		<td class="bg-clearBlue alignRight">Contact #</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('contact_no');
		echo HTMLLib::CreateInputText('contact_no', $sf_params->get('contact_no'), 'span2');
		?></td>
	</tr>
	
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Date Prepared</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateDateInput('d_prep', $sf_params->get('d_prep'), 'span2');
    //echo date('Y-m-d');
    ?>
    </td>    
</tr>	
	<tr>
		<td class="bg-clearBlue alignRight" nowrap></td>
		<td class="FORMcell-right" nowrap>
		<input type="submit" name="monthly" value=" Show Monthly / Show Listing " class="success">
		<input type="submit" name="show" value=" Generate Form " class="success">
		</td>
	</tr>
</table>
<div id="divBorder">
<table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td colspan="2" height="25" width="100" nowrap>
		<div class="tk-style53 alignCenter">
		<h2>IR8A MONTHLY</h2>
		</div>
		</td>
	</tr>
	<tr>
		<td><?php
		if ($showMonthly)
		{
			    $filename = hrPager::IR8AMonthlyIncome($pager);
				$cols = array('seq', 'name', 'company', 'period', 'gross_income', 'cpf_total', 'cpf_em', 'cpf_er', 'mbf', 'donation');
				echo PagerJson::ShowInFlatTable($cols, $filename, 'MONTHLY INCOME', array('gross_income', 'cpf_total', 'cpf_em', 'cpf_er', 'mbf', 'donation') ); //create the table
		}
		?></td>
	</tr>
</table>
</div>

</form>
</div>