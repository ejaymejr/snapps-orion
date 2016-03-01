<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<?php echo HTMLLib::CreateBackBanner('', 'CPF', 'Contribution') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/printCpfContribution') ?>" method="post">
<div class="panel">
<div class="panel-header bg-lightBlue fg-white">
	CPF Information Sheet
</div>
<div class="panel-content">
	<table class="table condensed bordered">
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Period Code</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	        echo HTMLLib::CreateSelect('period_code', $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span3');
	    ?>
	    <span class="negative">*</span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Company Group</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	        $cGroup = array('T.C. Khoo Mfg'=>' -T.C. Khoo Mfg- ', 'T.C. Khoo Svs'=>' -T.C. Khoo Svs-');  
	        echo HTMLLib::CreateSelect('mom_group', $sf_params->get('mom_group'), $cGroup, 'span2');
	             
	    ?>
	    <span class="negative">*</span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Company</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php   
	        echo HTMLLib::CreateSelect('company', $sf_params->get('company'), HrCompanyPeer::OptCompanyNameList(), 'span2');
	    ?>
	    <span class="negative">*</span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Source</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php 
	        echo HTMLLib::CreateSelect('source', $sf_params->get('source'), array('BANK'=>' - BANK - ', 'CHEQUE'=>' - CHEQUE - ', 'CASH'=>' - CASH - '), 'span2');
	              
	    ?>
	    <span class="negative">*</span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Penalty Interest</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	        echo HTMLLib::CreateInputText('penalty_interest', $sf_params->get('penalty_interest'), 'span1');
	    ?>
	    <span class="negative"></span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue"><small>Relevant Month</small></td>
	    <td class="FORMcell-right" nowrap>
	    <?php
	        $sf_params->set('rmonth', DateUtils::GetPrevMonthStartDate());   
	        echo HTMLLib::CreateSelect('rmonth', $sf_params->get('rmonth'), sfConfig::get('monthlyCalendar'), 'span2');
	             
	            
	    ?>
	    <span class="negative"></span>
	    </td>
	</tr>
	<tr>
	    <td class="alignRight bg-clearBlue" nowrap></td>
	    <td class="FORMcell-right" nowrap>
	    <input type="submit" name="cpf" value=" Preview CPF Contribution " class="success">
	    <input type="submit" name="cpfnet" value=" Preview Gross and CPF " class="success">
	    <input type="submit" name="cpftemp" value=" Show CPF Proof " class="success">
	    <input type="submit" name="cpfdata" value=" Generate CPF File " class="success" onclick="return confirm('LEVY Submission is done and i want to proceed... '); ">
	    <input type="submit" name="cpfmanual" value=" Print Manual Submission " class="success">
	    </td>
	</tr>
	
	</table>
</div>
</div>
</form>
</div>

