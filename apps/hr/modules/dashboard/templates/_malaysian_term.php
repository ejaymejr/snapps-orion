<?php use_helper('Validation', 'Javascript') ?>
<?php
//    $company = array ("0"=>"- ALL -", "Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
//                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );

?>
<form name="birthdatePrint" id="birthdatePrint" action="<?php echo url_for('dashboard/hiringPolicy'). '?id=' . $sf_params->get('id');?>" method="post">
<div class="alignCenter" id="footer_quality">

<h2>LEAVE ENTITLEMENT</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Probation</td>
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
    if an employee has worked for less than one whole year (i.e. less than 12 months), <br>his/her annual leave should be pro-rated using the following formula:
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
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Other Leave</td>
    <td class="FORMcell-right" nowrap>There is no statutory entitlement for marriage, paternity and compassionate leave <br>under the Employment Act. The entitlement to such leave depends on what is in the employment<br> contract or agreed mutually between employer and employee. 
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="print_assignment" value=" Print Assignment " class="submit-button">
    </td>
</tr>	
</table>
</div>

<div class="alignCenter" id="footer_quality">
<form name="birthdatePrint" id="birthdatePrint" action="<?php echo url_for('dashboard/hiringPolicy'). '?id=' . $sf_params->get('id');?>" method="post">
<h2>TERMINATION</h2>
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0" > 
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Guidelines</td>
    <td class="FORMcell-right" nowrap>
    <ul>
    	<li>The employer or employee who intends to terminate the contract must give notice to the other party in writing.</li>
    	<li>The notice period to be given must be as per contractual terms agreed upon at the time of employment.</li>
    	<li>The day on which the notice is given is included in the notice period.</li>
    	<li>In the absence of notice period being previously agreed upon, the following shall apply:</li>
    		<ul>
		        <li>Employment period of less than 2 weeks | 1 day notice period</li>
		        <li>Employment period of 26 weeks to 2 years | 1 week notice period</li>
		        <li>Employment period of 2 to 5 years | 2 weeks notice period</li>
		        <li>Employment period of 5 years and above | 4 weeks notice period</li>
	        </ul>
    	<li>The notice period can be waived upon mutual agreement between both parties.</li>
    
    	<li>Employees who have fully served the required notice period, are entitled to <br>Central Provident Fund (CPF) contributions for the notice period salary that they receive.</li>
    </ul>
    	
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap>Foreign Employees</td>
    <td class="FORMcell-right" nowrap>
    <ul>
    	<li>Cancellation of Employment Pass/S Pass on termination: Employment termination <br>
    	of foreign employees on an Employment Pass or S Pass, calls for him/her cancelling <br>
    	the Employment Pass/S Pass within seven days of employment termination. A 30-day <br>
    	short term visit pass will be issued upon cancellation. When the main pass is cancelled, <br>
    	all other passes related to the main pass will also be cancelled. Unless the Employment <br>
    	Pass/S Pass holder has received an alternate valid visa (as mentioned above), <br>
    	she/she and related pass holders should not remain in Singapore after the date <br>
    	of employment termination.</li>
    	<li>Tax Clearance is required for Employment Pass/S Pass holders whose employment has been terminated, <br>
    	to ensure that all taxes have been paid by him/her. The employer must notify the tax authority (IRAS) <br>
    	and withhold all payment due to the foreign employee from the day he/she notifies the employer of his/her <br>
    	intention to cease employment or when the employer decides to terminate the employment. Once the IRAS <br>
    	does an assessment and issues a tax clearance certificate, confirming that all taxes have been paid, <br>
    	the employer can release the payment due to the employee.</li>
    </ul>
    	
    </td>    
</tr>
<tr>
    <td class="FORMcell-left FORMlabel" nowrap></td>
    <td class="FORMcell-right" nowrap>
    <input type="submit" name="print_assignment" value=" Print Assignment " class="submit-button">
    </td>
</tr>
</table>
</div>

</form>
<div>
&nbsp;
</div>