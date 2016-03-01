<?php


echo select_tag('employee_no',
options_for_select(PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($pcode),
$sf_params->get('employee_no') ) );
