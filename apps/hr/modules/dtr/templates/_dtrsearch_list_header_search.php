<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php  ?></td>
    <td><?php echo input_tag('name', $sf_params->get('name'), 'size="40"') ?></td>
    
    <td class="alignRight" nowrap>
        F: <?php echo HTMLForm::DrawDateInput('tis', $sf_params->get('tis'), XIDX::next(), XIDX::next(), 'size="11"') ?>
        <br />
        T: <?php echo HTMLForm::DrawDateInput('tie', $sf_params->get('tie'), XIDX::next(), XIDX::next(), 'size="11"') ?></td>
        
    <td class="alignRight" nowrap>
        F: <?php echo HTMLForm::DrawDateInput('tos', $sf_params->get('tos'), XIDX::next(), XIDX::next(), 'size="11"') ?>
        <br />
        T: <?php echo HTMLForm::DrawDateInput('toe', $sf_params->get('toe'), XIDX::next(), XIDX::next(), 'size="11"') ?></td>
        
    <td><?php echo input_tag('duration', $sf_params->get('duration'), 'size="10"') ?></td>
    <td><?php echo select_tag('company', options_for_select(sfConfig::get('companies'), $sf_params->get('c'))); ?></td>
    <td><?php echo input_tag('d', $sf_params->get('d'), 'size="10"') ?></td>
    <td><?php echo input_tag('employment', $sf_params->get('employment'), 'size="20"') ?></td>
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
</tr> 
