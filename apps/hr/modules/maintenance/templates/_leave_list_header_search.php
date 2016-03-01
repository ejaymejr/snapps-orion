<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php echo input_tag('leave_type', $sf_params->get('leave_type'), 'size="15"') ?></td>
    <td><?php echo input_tag('description', $sf_params->get('description'), 'size="100"') ?></td>
    <td><?php //echo input_tag('days_entitled', $sf_params->get('days_entitled'), 'size="10"') ?></td>
    <td><?php //echo input_tag('status', $sf_params->get('status'), 'size="30"') ?></td>    
    <td><?php //echo input_tag('remarks', $sf_params->get('remarks'), 'size="30"') ?></td>    
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>    
</tr>