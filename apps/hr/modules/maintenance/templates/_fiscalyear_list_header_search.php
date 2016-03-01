<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php echo input_tag('fiscal_year', $sf_params->get('fiscal_year'), 'size="15"') ?></td>
    <td><?php echo input_tag('previous_year', $sf_params->get('previous_year'), 'size="15"') ?></td>
    <td><?php echo input_tag('start_date', $sf_params->get('start_date'), 'size="15"') ?></td>
    <td><?php echo input_tag('end_date', $sf_params->get('end_date'), 'size="15"') ?></td>
    <td><?php echo input_tag('remarks', $sf_params->get('remarks'), 'size="30"') ?></td>
    <td><?php echo input_tag('is_current', $sf_params->get('is_current'), 'size="15"') ?></td>
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>    
</tr> 
