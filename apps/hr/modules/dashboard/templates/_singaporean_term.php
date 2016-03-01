<?php use_helper('Validation', 'Javascript') ?>
<?php
//    $company = array ("0"=>"- ALL -", "Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
//                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );

?>
<div class="alignCenter" id="footer_quality">
<h2>CONTRACT OF SERVICE</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Employment of Mr/Mrs/Ms</td>
    <td class="FORMcell-right" nowrap><?php
    echo input_tag('name', $sf_params->get('name'), "size=50" );
     ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>NRIC</td>
    <td class="FORMcell-right" nowrap><?php
    echo input_tag('nric', $sf_params->get('nric'), "size=20" );
     ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Contact#</td>
    <td class="FORMcell-right" nowrap><?php
    echo input_tag('contact_no', $sf_params->get('contact_no'), "size=20" );
     ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Date of Employment</td>
    <td class="FORMcell-right" nowrap>
    <?php    
        echo HTMLForm::Error('commence_date');
        echo HTMLForm::DrawDateInput('commence_date', $sf_params->get('commence_date', date('Y-m-d')), XIDX::next(), XIDX::next(), ' size="12" '); ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Place of Work</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	$placeofWork = array(''=>'Please Select Desired Options','35 Senoko Way'=>'35 Senoko Way', '29 Senoko Way'=>'29 Senoko Way', 'Customer Onsite'=>'Customer Onsite');
    	echo select_tag('work', options_for_select( $placeofWork, '' ), 'onChange=updateWorkLocation(); return true;' );
    	echo input_tag('place_of_work', $sf_params->get('place_of_work'), 'size=50');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Job Title</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	$jobTitle = array(''=>'Please Select Desired Options','Engineer'=>'Engineer', 'Operator'=>'Operator', 'Production Worker'=>'Production Worker', 'Admin Officer'=>'Admin Officer');
    	echo select_tag('job', options_for_select( $jobTitle, '' ), 'onChange=updateJobTitle(); return true;' );
    	echo input_tag('job_title', $sf_params->get('job_title'), 'size=50');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Salary</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	echo input_tag('salary', $sf_params->get('salary'), 'size=20');
    ?>
     / every month
    </td>
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Working Days</td>
    <td class="FORMcell-right" nowrap>
    <?php
    	$workingDays = array(''=>'Please Select Desired Options','Monday to Saturday'=>'Monday to Saturday', 'Monday to Sunday'=>'Monday to Sunday', 'Monday to Friday'=>'Monday to Friday', 'Onsite Schedule'=>'Onsite Schedule');
    	echo select_tag('workdays', options_for_select( $workingDays, '' ), 'onChange=updateWorkDays(); return true;' );
    	echo input_tag('work_days', $sf_params->get('work_days'), 'size=50');
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Rest Day Work</td>
    <td class="FORMcell-right" nowrap>You may be requested to work on a rest day on the otherhand  you can also request to work on a rest day,<br>if your employer agrees
to such a request.
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Public Holidays</td>
    <td class="FORMcell-right" nowrap>You will be paid full pay for all official public holidays.  If you work on a public holiday, you will be paid an overtime rate.
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Deductions from Renumeration</td>
    <td class="FORMcell-right" nowrap>The employer should not deduct any monies from the employee’s wage other than those allowed under the <br>Employment Act or ordered by the Court.
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Termination of Employment</td>
    <td class="FORMcell-right" nowrap>Either party can terminate this agreement with (1day/1week/2weeks/1month) written notice or by paying salary<br> in lieu of notice for the relevant period.
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Other Condition(s)</td>
    <td class="FORMcell-right" nowrap><?php
		echo textarea_tag('other_condition', $sf_params->get('other_condition'),"size=75x5" );
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>General</td>
    <td class="FORMcell-right" nowrap>Any changes to this agreement will only be valid if they are in writing and have been agreed and signed by both parties.
    </td>    
</tr>
</table>
</div>
<div class="alignCenter" id="footer_quality">
<h2>CONTRACT OF SERVICE</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr >
    <td width="200px" class="FORMcell-left FORMlabel" nowrap>Employment Contract</td>
    <td class="FORMcell-right" nowrap>
    Employment Contract is also known as Employment Agreement, Appointment Letter, Offer Letter, etc. <br>
    It is an agreement between an employee and employer that specifies the terms and conditions of employment. <br>
    It is advisable to have a written employment contract in Singapore. Typically, only senior management employees <br>
    might have the option of negotiating their employment contracts. A violation of one or more of the terms in an <br>
    employment contract by either an employee or employer is considered breach of contract. Most employment contracts <br>
    include several important clauses such as:
    <ul>
    	<li>Commencement of employment</li>
    	<li>Appointment – job title and job scope</li>
    	<li>Hours of work</li>
    	<li>Probation period, if anye</li>
    	<li>Hours of work</li>
    	<li>Employee benefits</li>
    	<li>Probation clause, if applicable</li>
    	<li>Code of conduct</li>
    	<li>Termination</li>
    </ul>
    </td>    
</tr>
</table>
</div>

<div class="alignCenter" id="footer_quality">

<h2>LEAVE ENTITLEMENT</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="200px" class="FORMcell-left FORMlabel" nowrap>Probation</td>
    <td class="FORMcell-right" nowrap>
    He/she has worked for at least three months<br> 
    <?php
//    echo select_tag('company_bday', 
//         options_for_select($company, 
//         $sf_params->get('company_bday') ) );    
    ?>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Leave Computation</td>
    <td class="FORMcell-right" nowrap>
    if an employee has worked for less than one whole year (i.e. less than 12 months), <br>his/her annual leave should be <b>pro-rated</b> using the following formula:
    <br><br>
    <b>(No of months in service/12) x 7<b>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Forfeiture of Annual Leave</td>
    <td class="FORMcell-right" nowrap>
    An employee's annual leave entitlement can be forfeited if the employee:
		<ul>
			<li>Absents him/herself from work without permission or reasonable excuse<br>for more than 20% of the working days in a month or year, as the case may be;</li>
    		<li>Fails to take his/her leave within 12 months after the end of 12 months of continuous service; or</li>
    		<li>Is dismissed on the grounds of misconduct.</li>
    	</ul>
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Sick Leave</td>
    <td class="FORMcell-right" nowrap>An employee covered by the Employment Act is entitled to paid sick leave, including medical leave issued by a dentist if:
    	<ul>
    		<li>The employee has served the employer for at least three months.</li>
    		<li>The employee has informed or attempted to inform the employer of his/her absence within 48 hours. <br>
    		Otherwise, the employee will be deemed to be absent from work without permission or reasonable excuse.</li>
    		<li>The sick leave is certified by the company's doctor, or by a government doctor (including doctors <br>
    		from approved public medical institutions)</li>
    	</ul> 
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Childcare Leave</td>
    <td class="FORMcell-right" nowrap>An employee is entitled to six days of childcare leave per year if he/she <br>
    is covered under the Child Development Co-Savings Act. The Child Development Co-Savings Act covers all <br>
    parents of Singapore citizens, including managerial, executive or confidential staff if all four of the <br>
    following conditions are met:
    	<ul>
    		<li>The child (including legally adopted children or stepchildren) is below seven years of age on or after 31 October 2008; </li>
    		<li>The child is a Singapore Citizen; </li>
    		<li>The child's parents are lawfully married (including divorced or widowed parents); and </li>
    		<li>The employee has worked for the employer for at least three months.</li>
    	</ul> 
    </td>    
</tr>
</table>
</div>

<div class="alignCenter" id="footer_quality">
<h2>TERMINATION</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="200px" class="FORMcell-left FORMlabel" nowrap>Guidelines</td>
    <td class="FORMcell-right" nowrap>
    <ul>
    	<li>The employer or employee who intends to terminate the contract must give notice to the other party in writing.</li>
    	<li>The notice period to be given must be as per contractual terms agreed upon at the time of employment.</li>
    	<li>The day on which the notice is given is included in the notice period.</li>
    	<li>In the absence of notice period being previously agreed upon, the following shall apply:</li>
    		<ul>
		        <li>Employment period of less than 26 weeks <b>1 day</b> notice period</li>
		        <li>Employment period of 26 weeks to 2 years <b>1 week</b> notice period</li>
		        <li>Employment period of 2 to 5 years <b>2 weeks</b> notice period</li>
		        <li>Employment period of 5 years and above <b>4 weeks</b> notice period</li>
	        </ul>
    	<li>The notice period can be waived upon mutual agreement between both parties.</li>
    
    	<li>Employees who have fully served the required notice period, are entitled to <br>Central Provident Fund (CPF) contributions for the notice period salary that they receive.</li>
    </ul>
    	
    </td>    
</tr>
</table>
</div>

<div class="alignCenter" id="footer_quality">
<h2>DOCUMENT SOURCE</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td width="200px" class="FORMcell-left FORMlabel" nowrap>Guidelines</td>
    <td class="FORMcell-right" nowrap>
		<?php echo link_to('MOM Website', 'http://www.mom.gov.sg/employment-practices/employment-rights-conditions/contract-of-service-termination/Pages/contracts-of-service-and-termination.aspx', 'onclick="window.open(this.href);return false;"'); ?>    	
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="print_singapore" value=" Print Singaporean Employment Contract " class="submit-button">
    </td>
</tr>
</table>
</div>


<div>
&nbsp;
</div>

<?php
echo javascript_tag("
function updateWorkLocation()
{
	document.getElementById('place_of_work').value = document.getElementById('work').value
}

function updateJobTitle()
{
	document.getElementById('job_title').value = document.getElementById('job').value
}

function updateWorkDays()
{
	document.getElementById('work_days').value = document.getElementById('workdays').value
}
");
?>