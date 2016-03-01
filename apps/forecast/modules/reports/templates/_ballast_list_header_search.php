<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td></td>
    <td><?php echo input_tag('trans_date', $sf_params->get('user'), 'size="10"') ?></td>
    <td><?php echo input_tag('component', $sf_params->get('target'), 'size="20"') ?></td>
    <td><?php echo input_tag('value', $sf_params->get('user_action'), 'size="20"') ?></td>
    <td><?php echo input_tag('income_expense', $sf_params->get('action_module'), 'size="20"') ?></td>
    <td><?php echo input_tag('sales_source', $sf_params->get('description'), 'size="30"') ?></td>
    <td><?php echo input_tag('company', $sf_params->get('company'), 'size="30"') ?></td>
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
        
</tr> 
