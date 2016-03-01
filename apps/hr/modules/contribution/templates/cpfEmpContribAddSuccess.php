<?php use_helper('Validation', 'Javascript') ?>


<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('contribution/cpfEmpContribAdd'). '?id=' . $sf_params->get('id');?>" method="post">

<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0"> 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Employee Name</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('employee_no');
    if ($sf_params->get('id'))
    {
        echo input_tag('employee_no',  $sf_params->get('employee_no'), 'type="hidden" size="20"');
        //echo "&nbsp;&nbsp;&nbsp;";
        echo input_tag('name',  $sf_params->get('name'), 'type="hidden" size="30"');
        
        echo $sf_params->get('employee_no') ;
        echo "&nbsp;-&nbsp;";
        echo $sf_params->get('name');         
        
    }else{
        echo select_tag('employee_no', 
                 options_for_select(TkDtrmasterPeer::GetEmployeeNameList(), 
                 $sf_params->get('employee_no') ) );
        echo '<input type="submit" name="employee" value=" Retrieve " class="submit-button">';
        echo '<span class="negative">*</span>';                 
    }    
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Company</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo $sf_params->get('company'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Department</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo $sf_params->get('department');    
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Employment</td>
    <td class="FORMcell-right" nowrap>
    <?php
//    echo HTMLForm::Error('type_of_employment'); 
//    echo select_tag('type_of_employment', 
//        options_for_select(sfConfig::get('htopt_employment', array()), 
//        $sf_params->get('type_of_employment') ) );
    ?>
    <?php
    echo $sf_params->get('type_of_employment');    
    ?>
    
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Race</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('race');    
    echo select_tag('race', options_for_select(sfConfig::get('race'), $sf_params->get('race'))  ) ;    
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Birth Date</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('date_of_birth');    
    echo HTMLForm::DrawDateInput('date_of_birth', $sf_params->get('date_of_birth'), XIDX::next(), XIDX::next(), ' size="10" '); 
    ?>    
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>CPF Citizenship</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('cpf_citizenship'); 
    echo select_tag('cpf_citizenship', 
        options_for_select(array("S'porean/PR Yr 3"=>"S'porean/PR Yr 3", "S'porean/PR Yr 2"=>"S'porean/PR Yr 2", "PR Yr 1 G/G"=>"PR Yr 1 G/G"), $sf_params->get('cpf_citizenship')), 
        $sf_params->get('cpf_citizenship') ) ;
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Ordinary Wage</td>
    <td class="FORMcell-right" nowrap>
    <?php
    echo HTMLForm::Error('cpf_amount'); 
    echo input_tag('cpf_amount',  $sf_params->get('cpf_amount'), 'size="15"');
    $net = $sf_params->get('cpf_amount'); 
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Current Wage</td>
    <td class="FORMcell-right" nowrap>
    <?php
    //$net = PayBasicPayPeer::GetBasicPaybyEmployeeNo($sf_params->get('employee_no'));
    echo "<span class='positive'>".number_format($net, 2)."</span>";
    ?>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>&nbsp;</td>
    <td class="FORMcell-right" nowrap>
    <span class="negative">
    <?php
    if ($net)
    {
        $cpf = new ComputeCPF();
        $val = $cpf->GetCpf(DateUtils::DUNow(), $net, CPFGovtRulePeer::ComputeAgeforCPF($sf_params->get('date_of_birth')) );
        echo "[&nbsp;&nbsp;Employee Share-&nbsp;&nbsp;";    
        echo number_format($val['em_share'], 2);
        
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;Employer Share-&nbsp;&nbsp;";    
        echo number_format($val['er_share'], 2);
        echo "&nbsp;&nbsp;]"; 
        echo "<span class='positive'>&nbsp;&nbsp;(estimate only)</span>";
    }
    ?>
    </span>
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
        <input type="submit" name="save" value=" Save Details " class="submit-button">
    </td>
</tr>
</table>
</form>