<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/bankTransmittal') ?>" method="post">
<table width="100%" class="table bordered condensed" >
<tr>
    <td class="alignRight bg-clearBlue"></td>
    <td class="FORMcell-right" nowrap><h2>BANK TRANSMITTAL</h2>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Period Code</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        $sf_params->set('to', 'MAYBANK ');
        $sf_params->set('docdate', Date('d-M-Y') );
        $sf_params->set('attn', 'MS KELLIE POH' );
        $sf_params->set('from', 'LUCY ANG' );
        $sf_params->set('mess', 'Kindly arrange to credit pay to our employees saving account as follows:' );
        $sf_params->set('acct_no', '0404-0953532' );
        $sf_params->set('depdate', Date('d-M-Y') );
            
        echo HTMLLib::CreateSelect('period_code', $sf_params->get('period_code'), PayEmployeeLedgerArchivePeer::GetPeriodCode(), 'span3');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Document Date</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('docdate',  $sf_params->get('docdate'), 'span3');    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Deposit Date</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('depdate',  $sf_params->get('depdate'), 'span3');      
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>To</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('to',  $sf_params->get('to'), 'span2');  
    ?>
    <span class="negative">*</span>
    </td>
</tr>

<tr>
    <td class="alignRight bg-clearBlue"><label>From</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLLib::CreateInputText('from',  $sf_params->get('from'), 'span2');  
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Message</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('mess'); 
        echo HTMLLib::CreateTextArea('mess',  $sf_params->get('mess'), 'span5');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="alignRight bg-clearBlue"><label>Account Number</label></td>
    <td class="FORMcell-right" nowrap>
    <?php
        echo HTMLForm::Error('acct_no'); 
        echo HTMLLib::CreateInputText('acct_no',  $sf_params->get('acct_no'), 'span3')   
    ?>
    <span class="negative">*</span>
    </td>
</tr>

<tr>
    <td class="alignRight bg-clearBlue" nowrap><label>Action</label></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="bank" value=" Bank Transmittal " class="success" onClick="">
    <input type="submit" name="cash" value=" Cash Withdrawal " class="success">
    <input type="submit" name="cash_check" value=" Cash Check Withdrawal " class="success">
    <input type="submit" name="cheque" value=" Cheque Withdrawal " class="success">
    <input type="submit" name="all"  value=" Cash / Bank Proof " class="success">
    </td>
</tr>
</table>
</form>
</div>

