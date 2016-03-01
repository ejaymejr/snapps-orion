<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td></td>
    <td width="100px">
     <?php echo HTMLForm::DrawDateInput('tos', $sf_params->get('tos'), XIDX::next(), XIDX::next(), 'size="11"');
           echo '<br>&nbsp; to &nbsp;<br>';
           echo HTMLForm::DrawDateInput('toe', $sf_params->get('toe'), XIDX::next(), XIDX::next(), 'size="11"') ;
     ?>
    </td>
    <td><?php echo input_tag('user', $sf_params->get('user'), 'size="10"') ?></td>
    <td><?php echo input_tag('user_action', $sf_params->get('user_action'), 'size="20"') ?></td>
    <td><?php echo input_tag('action_module', $sf_params->get('action_module'), 'size="20"') ?></td>
    <td><?php echo input_tag('description', $sf_params->get('description'), 'size="20"') ?></td>
    <td></td>
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
        
</tr> 
