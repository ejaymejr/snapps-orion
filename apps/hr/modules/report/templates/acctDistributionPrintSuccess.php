<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/acctDistributionPrint'). '?id=' . $sf_params->get('id');?>" method="post">
<table class="table bordered condensed" >
<tr>
    <td class="alignRight bg-clearBlue" colspan="2">ACCOUNT DISTRIBUTION</td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue">Account Code</td>
    <td class="" nowrap>
    <?php
        echo HTMLForm::Error('acct_code'); 
       	echo HTMLLib::CreateSelect('acct_code', $sf_params->get('acct_code'), PayAccountCodePeer::GetAcctCodeList(), 'span3');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Period Code</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateSelect('period_code', $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span3');        
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue" nowrap><label>Company</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
    $company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo", "0"=>"- ALL -" );   
    
    echo HTMLLib::CreateSelect('company', $sf_params->get('company'), $company, 'span3');
    
    
    ?>
    </td>    
</tr>
<tr>
    <td class="alignRight bg-clearBlue">Source</td>
    <td class="FORMcell-right" nowrap>
    <?php  
        echo HTMLLib::CreateSelect('source', $sf_params->get('source'), array(''=>'- ALL -', 'BANK'=>' - BANK - ', 'CHEQUE'=>' - CHEQUE - ', 'CASH'=>' - CASH - ', 'CASH-CHECK'=>' - CASH-CHECK - '), 'span3');
    ?>
    <span class="negative">Bank, Cash, Cheque</span>
    </td>
</tr>
<tr>
<tr>
    <td class="alignRight bg-clearBlue" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="printList"  value=" Print Listing " class="success">
    <input type="submit" name="printGroup" value=" Print Per Company Group " class="success">
    </td>
</tr>
</table>
</form>
</div>
