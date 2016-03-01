<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<div id="DIVPassExpiry">
 Generally two months before your EP is due to expire, an Employment Pass Renewal Form will be sent to your employer’s address. The renewal application should<br> 
 be completed and submitted to MOM at least four weeks before the pass expires. After your renewal application is approved, your employer will receive an<br> 
 approval letter. You will need to visit MOM office to collect your new Employment Pass.<br>
&nbsp;<br>
<span class="negative">Listed below are the pass expiring for the next 90 days</span>
</div>
<table width="100%" class="quantity-table" style="clear:both;" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td width="50" class="section-header alignCenter">NO</td>
    <td width="50" class="section-header alignCenter">EXPIRY DATE</td>
    <td width="200" class="section-header alignCenter">NAME</td>
    <td width="200" class="section-header alignCenter">SECTOR</td>
    <td width="300" class="section-header alignCenter">OCCUPATION</td>
    <?php //echo <td class="section-subheader alignCenter">&nbsp;</td> ?>
    <td class="section-header alignRight"></td>
</tr>
<?php 
$seq = 0;
foreach($cWPpager->getResults() as $record):
	$seq++;
?>
<tr>
	<td class="section-subheader" nowrap wrap="off"><?php echo $seq ?></td>
	<td class="section-subheader" nowrap wrap="off"><?php echo $record->getDateOfExpiry() ?></td>
    <td class="section-subheader" nowrap wrap="off"><?php echo $record->getName() ?></td>
    <td class="section-subheader" nowrap wrap="off"><?php echo $record->getSector() ?></td>
    <td class="section-subheader" nowrap wrap="off"><?php echo $record->getOccupation() ?></td>
    <td class="section-header alignRight"></td>    
</tr>
<?php 
endforeach;
?>
</table>
