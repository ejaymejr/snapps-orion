<?php use_helper('Validation', 'Javascript') ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('contribution/cpfGovtRuleTest'). '?id=' . $sf_params->get('id');?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" >

<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td width="70%" class="FORMcell-right" nowrap></td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Date</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
     echo select_tag('pdate', 
             options_for_select(sfConfig::get('monthlyCalendar'), 
             $sf_params->get('pdate') ), 'height:"100px"' );
    echo input_tag('year',  $sf_params->get('year'), 'size="5"');             
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Age</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
     echo select_tag('age', 
             options_for_select(
             array( '35'=>35,
                    '36'=>36,
                    '49'=>49,
                    '50'=>50,
                    '51'=>51,
                    '54'=>54,
                    '55'=>55,
                    '56'=>56,
                    '59'=>59,
                    '60'=>60,
                    '61'=>61,
                    '64'=>64,
                    '65'=>65,
                    '66'=>66,
                    '70'=>70                                                                                                                                                           
             ), 
             $sf_params->get('age') ) );
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>CPF Year</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
     echo select_tag('cpf_year', 
             options_for_select(
				HrFiscalYearPeer::GetFiscalYearListYK()
             , 
             $sf_params->get('cpf_year') ) );
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Salary From</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
     echo input_tag('scapmin',  $sf_params->get('scapmin'), 'size="15"');
    ?>
    </td>
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Salary To</td>
    <td width="70%" class="FORMcell-right" nowrap>
    <?php
     echo input_tag('scapmax',  $sf_params->get('scapmax'), 'size="15"');
    ?>
    </td>
</tr>

<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="save" value=" List Income " class="submit-button">
    </td>
</tr>
</table>
</form>
