
<div class="contentBox">                       
<?php 
	echo link_to('Add Account Code', 'maintenance/acctCodeAdd', 'class="button success"');
?>
<?php 
if (isset($pager))
{
    $filename = hrPager::AcctCodePager($pager);
	$cols = array('seq', 'action', 'code', 'description', 'remark', 'cpf_deductable');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>

</div>