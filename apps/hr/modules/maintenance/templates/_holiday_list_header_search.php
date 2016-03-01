<?php
// $Source$
// $Id$

?>
<tr class="dgts" style="display:<?php echo $sf_params->get('commit', false) !== false ? '\'\'' : 'none' ?>;" id="<?php echo $searchContainerID ?>">
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>
    <td>&nbsp;</td>
    <td><?php echo input_tag('holiday_code', $sf_params->get('holiday_code'), 'size="15"') ?></td>
    <td><?php echo input_tag('holiday', $sf_params->get('holiday'), 'size="40"') ?></td>
    <td><?php echo HTMLForm::DrawDateInput('date_hol', $sf_params->get('date_hol'), XIDX::next(), XIDX::next(), 'size="15"'); ?></td>    
    <td><?php echo submit_tag('search', 'width="100%" height="100%"') ?></td>    
</tr> 
