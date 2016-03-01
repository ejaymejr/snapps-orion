<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php echo input_tag('cpf_year', $sf_params->get('cpf_year'), 'size="30"') ?></td>
    <td><?php echo input_tag('description', $sf_params->get('description'), 'size="30"') ?></td>
    <td><?php echo input_tag('company_type', $sf_params->get('company_type'), 'size="20"') ?></td>
    <td>
        <?php echo HTMLForm::DrawDateInput('frdt1', $sf_params->get('frdt1'), XIDX::next(), XIDX::next(), 'size="11"') ?>
        <?php echo HTMLForm::DrawDateInput('todt1', $sf_params->get('todt1'), XIDX::next(), XIDX::next(), 'size="11"') ?>
    </td>
    <td>
        <?php echo HTMLForm::DrawDateInput('frdt2', $sf_params->get('frdt2'), XIDX::next(), XIDX::next(), 'size="11"') ?>
        <?php echo HTMLForm::DrawDateInput('todt2', $sf_params->get('todt2'), XIDX::next(), XIDX::next(), 'size="11"') ?>
    </td>    
    <td>&nbsp;</td>    
    <td>&nbsp;</td>    
    <td>&nbsp;</td>    
    <td>&nbsp;</td>    
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>    
</tr> 
