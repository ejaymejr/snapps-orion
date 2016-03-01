<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php echo input_tag('employee_no', $sf_params->get('employee_no'), 'size="20"') ?></td>
    <td><?php echo input_tag('name', $sf_params->get('name'), 'size="40"') ?></td>
    <td><?php echo input_tag('company', $sf_params->get('leave_type'), 'size="15"') ?></td>
    <td><?php echo input_tag('department', $sf_params->get('reason_leave'), 'size="30"') ?></td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>    
</tr> 
