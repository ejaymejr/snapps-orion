<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('sms/smsPayslip'). '?id=' . $sf_params->get('id');?>" method="post">
<div class="grid fluid">
     <div class="row">
          <div class="span6">
			<div class="panel ">
			<div class="panel-header bg-lightBlue fg-white">
				INDIVIDUAL SEND
			</div>       
			<div class="panel-content">
			    <table class="table condensed bordered" >
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Period Code</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	echo HTMLLib::CreateSelect('period_code',  $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr> 
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Bank Cash</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	$bankCash = array('BANK'=>' -BANK-', 'CASH'=>' -CASH-', 'CHEQUE'=>' -CHEQUE-', 'CASH-CHECK'=>' -CASH-CHECK-');
				    	echo HTMLLib::CreateSelect('bank_cash',  $sf_params->get('bank_cash'), $bankCash, 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Employee No</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
					    echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), HrEmployeePeer::GetEmployeeNameList(), 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Contact Number</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	echo HTMLLib::CreateInputText('individual_cell_no', $sf_params->get('individual_cell_no'), 'span4'); 
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Deposit Date</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	echo HTMLLib::CreateInputText('deposit_date', $sf_params->get('deposit_date'), 'span4'); 
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap></td>
				    <td class="FORMcell-right" nowrap>
				        <input type="submit" name="personal" value=" Send This Info " class="success">
				    </td>
				</tr>
				</table>
			</div> <!-- PANEL CONTENT -->
			</div> <!-- PANEL  -->
		</div> <!-- SPAN6 CONTENT -->

	<div class="span6">
			<div class="panel ">
			<div class="panel-header bg-lightBlue fg-white">
				GROUP SEND
			</div>       
			<div class="panel-content">
			    <table class="table condensed bordered" >
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Period Code</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	echo HTMLLib::CreateSelect('period_code_group',  $sf_params->get('period_code_group'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Bank Cash</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	$bankCash = array('BANK'=>' -BANK-', 'CASH'=>' -CASH-', 'CHEQUE'=>' -CHEQUE-', 'CASH-CHECK'=>' -CASH-CHECK-');
				    	echo HTMLLib::CreateSelect('bank_cash_group',  $sf_params->get('bank_cash_group'), $bankCash, 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight">Company</td>
				    <td class="FORMcell-right" nowrap>
				    <?php  
				        echo HTMLLib::CreateSelect('company',  $sf_params->get('company'), HrCompanyPeer::OptCompanyNameListWithAll(), 'span4');
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Contact Number</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				     //echo input_tag('cell_no_group', '','readonly=readonly');
				    ?>
				    <?php
				    	echo HTMLLib::CreateInputText('cell_no', $sf_params->get('cell_no'), 'span4', '', ' readonly=readonly'); 
				    ?>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap>Deposit Date</td>
				    <td class="FORMcell-right" nowrap>
				    <?php
				    	echo HTMLLib::CreateInputText('deposit_date_group', $sf_params->get('deposit_date_group'), 'span4'); 
				    ?>
				    <span class="negative"></span>
				    </td>
				</tr>
				<tr>
				    <td class="bg-clearBlue alignRight" nowrap></td>
				    <td class="FORMcell-right" nowrap>
				        <input type="submit" name="group" value=" Show Employee List " class="success">
				    </td>
				</tr>
				</table>
			</div> <!-- PANEL CONTENT -->
			</div> <!-- PANEL CONTENT -->
		</div> <!-- SPAN6 CONTENT -->
	</div> <!-- ROW -->
</div> <!-- FLUID -->
</div>
<?php 
if (isset($pager)):
	$filename = hrPager::smsPayslipSend($pager);
	$cols = array('seq', 'date_send', 'employee_no', 'name', 'company','mobile', 'period', 'amount', 'bank_cash');
	
	?>
<div class="panel ">
	<div class="panel-header bg-lightBlue fg-white">
		GROUP SEND
	</div> 
	<div class="panel-content">
    <table class="table bordered condensed striped hovered">
    	<tr>
    		<?php foreach ($cols as $col):?>
    		<th class="bg-clearBlue"><small><small><?php echo HrLib::CamelCase($col) ?></small></small></th>
    		<?php endforeach;?>
    	</tr>
    	<?php foreach ($filename as $rec):?>
    		<tr id="<?php echo "tr_" . $rec["record_id"]?>">
    		<?php foreach ($cols as $col):?>
    			<td class="alignCenter"><?php echo $rec[$col] ?></td>
    		<?php endforeach; ?>
    		</tr>
    	<?php endforeach;?>
		<tr>
			<td><<input type="submit" name="sendAll" value=" Send SMS To Selected Employee " class="submit-button"></td>
		</tr>
	</table>
<?php 
//		$filename = hrPager::smsInbox($pager);
//		$cols = array('seq', 'sender', 'name', 'message', 'sent','recieved', 'operator', 'type', 'updated', 'remarks');
//		//echo PagerJson::TableHeaderFooter($cols, $filename, '', sizeof($pager)); //create the table
//		echo PagerJson::AkoDataTableForTicking($cols, $filename);
?>
</form>
	</div>
<?php 
endif;
?>
</div>
