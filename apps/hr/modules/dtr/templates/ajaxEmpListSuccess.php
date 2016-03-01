<?php

echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($pcode), 'span4');
