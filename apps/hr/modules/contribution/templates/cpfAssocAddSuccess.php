
<div class="contentBox">
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('contribution/cpfAssocAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table class="table bordered condensed" >

<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td width="70%" class="FORMcell-right" nowrap></td>
</tr>

<tr>
    <td class="bg-clearBlue alignRight" nowrap>Account Code</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateSelect('acct_code', $sf_params->get('acct_code'), PayAccountCodePeer::OptContributionList(), "span3");
    
    ?>
       
    <span class="negative">*</span>
    </td>
</tr>

<tr>
    <td class="bg-clearBlue alignRight" nowrap>Race</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateSelect('race',  $sf_params->get('race'), sfConfig::get('race'), 'span2') ;
    
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Minimum Compensation</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('min',  $sf_params->get('min'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Maximum Compensation</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('max',  $sf_params->get('max'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>
<tr>
    <td class="bg-clearBlue alignRight" nowrap>Contribution</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLLib::CreateInputText('amount',  $sf_params->get('amount'), 'span2');
    ?>
    <span class="negative">*</span>
    </td>
</tr>

<tr>
    <td class="bg-clearBlue alignRight" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="save" value=" Save Details " class="success">
    </td>
</tr>
</table>
</form>
</div>