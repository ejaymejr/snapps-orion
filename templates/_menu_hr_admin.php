
        <ul class="element-menu">
            <li>
                <a class="dropdown-toggle" href="#">DASHBOARD</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Dashboard', 'dashboard/index'  )?></li>
                    <li><?php echo link_to('Hiring Policy', 'dashboard/hiringAdd'  )?></li>
                    <li><?php echo link_to('HR Logs', 'dashboard/hrLogSearch'  )?></li>
                    <li><?php echo link_to('Attendance Log', 'dashboard/attendanceLog'  )?></li>
                    <li><?php echo link_to('Work Right', 'dashboard/workRight'  )?></li>
                    <li><?php echo link_to('MFG Qouta Calculator', 'dashboard/mfgQoutaCalculator'  )?></li>
                    <li><?php echo link_to('SVS Qouta Calculator', 'dashboard/svsQoutaCalculator'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">EMPLOYEE</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Employee Info', 'employee/employeeSearch'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">DTR</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Scan In', 'dtr/scanIn'  )?></li>
                    <li><?php echo link_to('Timekeeper', 'dtr/timeKeeper'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">LEAVE</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                	<li><?php echo link_to('Leave Application', 'leave/leaveEmployeeApply'  )?></li>
                	<li class="divider"></li>
                    <li><?php echo link_to('Lucy Approve Leave', 'leave/leaveApprovalSearch'  )?></li>
                    <li><?php echo link_to('Leave Chart', 'leave/leaveChart'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">PAYROLL</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Payroll Processing', 'payroll/payrollProcessing'  )?></li>
                    <li><?php echo link_to('Process Attendance', 'payroll/dtrComputePost'  )?></li>
                    <li><?php echo link_to('Prepare Payslip'   , 'payroll/payslipSearch'  )?></li>
                    <li><?php echo link_to('Manual Payslip'    , 'payroll/payslipManual'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('CPF Government'    , 'contribution/cpfGovtSearch'  )?></li>
                    <li><?php echo link_to('CPF Associations'  , 'contribution/cpfAssocSearch'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">REPORT</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Sign Cash Payslip', 'report/signPayslip'  )?></li>
                    <li><?php echo link_to('Employee Report', 'report/employeeDetailReport'  )?></li>
                    <li><?php echo link_to('Employee Ledger Annual', 'report/employeeLedgerAnnual'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">SURVEY</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Labour Market', 'survey/laborMarket'  )?></li>
                    <li><?php echo link_to('Labour Cost and Medical', 'survey/laborCost'  )?></li>
                    <li><?php echo link_to('Annual Wage Changes', 'survey/annualWage'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">CLAIMS</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Govt Paid Child Care', 'claims/govtPaidChildCare'  )?></li>
                </ul>
            </li>
        </ul>
        
               