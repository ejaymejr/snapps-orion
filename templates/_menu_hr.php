
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
                    <li class="divider"></li>
                    <li><?php echo link_to('Request Ticket', 'dashboard/requestTicket'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">EMPLOYEE</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Employee Info', 'employee/employeeSearch'  )?></li>
                    <li><?php echo link_to('Payslip Printing', 'employee/individualPayslip'  )?></li>
                    <li><?php echo link_to('Employee Photo', 'employee/employeePhoto'  )?></li>
                    <li><?php echo link_to('MC Benefit', 'employee/mcBenefit'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Draft Contract', 'employee/hiringAdd'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">DTR</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Scan In', 'dtr/scanIn'  )?></li>
                    <li><?php echo link_to('Timekeeper', 'dtr/timeKeeper'  )?></li>
                    <?php if (HrLib::GetUser() == 'emmanuel'): ?>
                    	<li><?php echo link_to('View Timesheet', 'dtr/timesheet'  )?></li>
                    <?php endif;?>
<!--                     <li><?php echo link_to('Timekeeper', 'http://app.micronclean/cityhall/hr/dtr/timeKeeper'  )?></li>-->
                    <li class="divider"></li>
                    <li><?php echo link_to('Payslip', 'dtr/individualPaySlip'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">LEAVE</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                	<li><?php echo link_to('Leave Application', 'leave/leaveEmployeeApply'  )?></li>
                	<li><?php echo link_to('Leave Credits', 'leave/leaveCreditSearch'  )?></li>
                	<li><?php echo link_to('Leave Application Override', 'leave/leaveApplySearch'  )?></li>
                	<li><?php echo link_to('Leave Aproval', 'leave/leaveApprovalSearch'  )?></li>
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
                    <li><?php echo link_to('Manual Payslip'    , 'payroll/payslipManualEntry'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Nano Payslip'    , 'payroll/nanoManualEntry'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Employee Levy'    , 'payroll/levySearch'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('CPF Government'    , 'contribution/cpfGovtSearch'  )?></li>
                    <li><?php echo link_to('CPF Associations'  , 'contribution/cpfAssocSearch'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Trend Analysis'    , 'payroll/payrollTrend'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">REPORT</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                	<li><?php echo link_to('Bank Transmittal', 'report/bankTransmittal'  )?></li>
                    <li><?php echo link_to('Sign Cash Payslip', 'report/signPayslip'  )?></li>
                    <li><?php echo link_to('Employee Report', 'report/employeeDetailReport'  )?></li>
                    <li><?php echo link_to('Employee Ledger Annual', 'report/employeeLedgerAnnual'  )?></li>
                    <li><?php echo link_to('Employees Annual Income', 'report/employeeAnnualIncome'  )?></li>
                    <li><?php echo link_to('Internal Billing', 'report/internalBilling'  )?></li>
                    <li><?php echo link_to('Journal Listing', 'report/journalListing'  )?></li>
                    <li><?php echo link_to('Account Distribution', 'report/acctDistributionPrint'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('CPF Submission',  'report/printCpfContribution'  )?></li>
                    <li><?php echo link_to('IRAS Submission', 'report/yearlyTax'  )?></li>
                    <li><?php echo link_to('Individual IR8A', 'report/incomeTax'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Govt Paid Child Care', 'claims/govtPaidChildCare'  )?></li>
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
            <?php if (HrLib::GetUser() == 'emmanuel'): ?>
            <li>
                <a class="dropdown-toggle" href="#">SMS</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Send Payslip', 'sms/smsPayslip'  )?></li>
                    <li><?php echo link_to('Send Message', 'sms/sendMessage'  )?></li>
                    <li><?php echo link_to('Show Inbox', 'sms/inboxSearch'  )?></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">MAINTENANCE</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Holiday', 'maintenance/holidaySearch'  )?></li>
                    <li><?php echo link_to('Account Code', 'maintenance/acctTypeSearch'  )?></li>
                    <li><?php echo link_to('Fiscal Year', 'maintenance/fiscalSearch'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Work Template', 'maintenance/workTemplateSearch'  )?></li>
                    <li><?php echo link_to('Workschedule', 'maintenance/workScheduleSearch'  )?></li>
                </ul>
            </li>
            <?php endif;?>
        </ul>
        
               
