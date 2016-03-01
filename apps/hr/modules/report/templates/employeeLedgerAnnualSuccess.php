<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd"
	action="<?php echo url_for('finance/trendIncomeExpense'). '?id=' . $sf_params->get('id');?>"
	method="post">
<div class="panel" data-role="panel">
<div class="panel-header bg-lightBlue">
<span class="fg-white">EMPLOYEE LEDGER ANNUAL</span>
</div>
<div class="panel-content">
	<table class="table bordered" >
		<tr>
			<td class="FORMcell-left FORMlabel bg-clearBlue span1" nowrap><label>Year</label></td>
			<td class="FORMcell-right span4" nowrap><small><?php
			echo HTMLLib::CreateSelect('year', $sf_params->get('year'), $year, 'span2'); ?>
			</small></td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel bg-clearBlue span1" nowrap><label>Name</label></td>
			<td>
			<?php 
				echo HTMLLib::CreateSelect('name', $sf_params->get('name'), $empList); 
			?>
			</td>
		</tr>
		<tr>
			<td class="FORMcell-left FORMlabel bg-clearBlue span1" nowrap><label></label></td>
			<td><small>
			<?php 
				echo AjaxLib::AjaxScript('show_ledger', 'report/showLedgerAnnual', 'name,year', '', 'DIVShowLedger');
				echo HTMLLib::CreateSubmitButton('show_ledger', 'Show Ledger');
			?>
			</small></td>
		</tr>
	</table>
</div>
</div>
</form>

<div class="panel" >
	<div class="panel-header bg-lightBlue">
		<span class="fg-white">EMPLOYEE LEDGER DETAIL</span>
	</div>
	<div class="panel-content">
		<div id="DIVShowLedger"></div>
	</div>
</div>
</div>