<?php use_helper('Form', 'Javascript'); ?>
<div class="contentBox">
<?php
if (isset($pager)):

    $filename = hrPager::PayrollCheckListPager($pager);
	$cols = array('seq', 'employee_no','name', 'company', 'birth_date', 'work_sched', 'has_pay', 'cpf_chk', 'mom_group');
    //$cols = array('seq');
    echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
endif;
?>
</div>