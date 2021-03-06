<?php use_helper('Validation', 'Javascript') ?>
<form name="FORMadd" id="IDFORMadd" 
	action="<?php echo url_for('employee/employeePersonal?id='.$sf_params->get('id') )?>" method="post"
	enctype="multipart/form-data" >
<table width="100%" class="table bordered" border="0" cellpadding="4" cellspacing="0">
	<tr>
		<td class="bg-lime FORMlabel FORMcell-left" colspan="5" nowrap><span class="fg-white" >PERSONNEL DATA SHEET</span></td>
	</tr>
	<tr>
		<td width="200" class="bg-clearBlue FORMlabel FORMcell-left" nowrap><label>FullName</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('name');
		if (! $sf_params->get('id')):
			echo HTMLLib::CreateInputText('name', $sf_params->get('name'));
		else:
			echo '<label>' .$sf_params->get('name') .'</label>';
		endif; ?>
		</td>
		<td class="FORMcell-right" nowrap rowspan="5">	
		</form>
			<div id="DIVUploadPhoto" class="alignCenter">
			<?php //include_partial('upload_photo',array('id'=> $sf_params->get('id') ))?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Company</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('company');
		echo HTMLLib::CreateSelect('company', $sf_params->get('company'), HrCompanyPeer::OptCompanyNameList(), 'span4');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Department</label></td>
		<td class="FORMcell-right" nowrap><?php
		$teamList = HTMLLib::GetTeamList();
		echo HTMLLib::CreateSelect('team', $sf_params->get('team'), $teamList, 'span4');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Birth Place</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('birth_place');
		echo HTMLLib::CreateInputText('birth_place', $sf_params->get('birth_place'));
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Birth Date</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('date_of_birth');
		echo HTMLLib::CreateDateInput('date_of_birth', $sf_params->get('date_of_birth'), 'span2', 'd-m-Y' );
		echo '<small class="fg-pink">format ( dd-mm-yyyy )</small>';
		?>
		</td>
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Gender</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelect('gender', $sf_params->get('gender'), array('M'=>' - MALE - ', 'F'=>' - FEMALE - '), 'span2' );
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td class="FORMcell-right" nowrap>&nbsp;</td>
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Marital Status</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateSelect('status', $sf_params->get('status'), array('SINGLE'=>' - SINGLE - ', 'MARRIED'=>' - MARRIED - ', ), 'span2' );
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Home Phone</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('home_phone');
		echo HTMLLib::CreateInputText('home_phone', $sf_params->get('home_phone'), 'span3');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Handphone</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('hand_phone');
		echo HTMLLib::CreateInputText('hand_phone', $sf_params->get('hand_phone'), 'span3');
		echo '<small class="fg-pink">&nbsp; * USED TO SMS PAYOUT&nbsp; </small>';?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Address Line 1</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('block_no');
		echo HTMLLib::CreateInputText('block_no', $sf_params->get('block_no'), '');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Address Line 2</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('street');
		echo HTMLLib::CreateInputText('street', $sf_params->get('street'), '');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>
	</tr>


	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Zipcode</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('zipcode');
		echo HTMLLib::CreateInputText('zipcode', $sf_params->get('zipcode'), 'span2');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
		<td colspan="2" class="FORMcell-right" nowrap>&nbsp;</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Country</label></td>
		<td colspan="5" class="FORMcell-right" nowrap>
		<?php echo HTMLLib::CreateSelectCountry($sf_params->get('country'),'span3')?>
		</td>

	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>ID TYPE</label></td>
		<td colspan="5" class="FORMcell-right" nowrap><?php
		$idType = array(
			''=> ' -SELECT ID TYPE-',
			'1'=> ' -NRIC-',
			'2'=> ' -FIN-',
			'3'=> ' -Immigration File-',
			'4'=> ' -Work Permit No-',
			'5'=> ' -Malaysian I/C-',
			'6'=> ' -Passport-'
		);
		echo HTMLLib::CreateSelect('tax_id', $sf_params->get('tax_id'), $idType, 'span2');
		echo HTMLLib::CreateInputText('sin_id', $sf_params->get('sin_id'), 'span3');
		//echo input_tag('sin_id',  $sf_params->get('sin_id'), 'size="40"');
		?>
		<small class="fg-pink">to be used in IRAS ID TYPE</small>
		</td>
		
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>WORK PASS TYPE</label></td>
		<td colspan="5" class="FORMcell-right" nowrap><?php
		$rankType = array(
			''=> ' -SELECT WORK PASS-',
		    'SPR'=> ' -SPR-',
			'SPASS'=> ' -SPASS-',
			'EPASS'=> ' -EPASS-',
			'PEPASS'=> ' -PEPASS-',
			'WP'=> ' -WORK PERMIT-',
			'PRC'=> ' -PRC-',
			'DP'=> ' -DEPENDANTS PASS-',
		);
		echo HTMLLib::CreateSelect('rank_code', $sf_params->get('rank_code'), $rankType, 'span5');
		?>
		<span class="negative"><small>
		<?php 
			echo link_to('epass','http://www.mom.gov.sg/foreign-manpower/passes-visas/employment-pass/before-you-apply/Pages/default.aspx','target="_BLANK"');
			echo ', '; 
			echo link_to('spass','http://www.mom.gov.sg/foreign-manpower/passes-visas/s-pass/before-you-apply/Pages/default.aspx','target="_BLANK"');
			echo ', ';
			echo link_to('p-epass','http://www.mom.gov.sg/foreign-manpower/passes-visas/personalised-employment/before-you-apply/Pages/default.aspx','target="_BLANK"');
		?>
		</small></span></td>
		
	</tr>	
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Profession</label></td>
		<td colspan="5" class="FORMcell-right" nowrap><?php
		$professionGrp = array(
			''=> ' -SELECT PROFESSION GROUP-',
			'Professional, Managers, Executives, Technician'=> ' Professional, Managers, Executives, Technician ',
			'Clerical, Sales, Service Worker'=> ' Clerical, Sales, Service Worker ',
			'Production, Transport, Tradesman, Cleaners, Labourers'=> ' Production, Transport, Tradesman, Cleaners, Labourers '
		);
		echo HTMLLib::CreateSelect('profession', $sf_params->get('profession'), $professionGrp, 'span5');
		?>
		<small class="fg-pink">to be used in Survey</small>
		</td>
		
	</tr>
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>MOM Group</label></td>
		<td colspan="5" class="FORMcell-right" nowrap><?php
		$momType = array(
			''=> ' -SELECT MOM GROUP-',
			'T.C. Khoo Mfg'=> ' -T.C. Khoo Mfg-',
			'T.C. Khoo Svs'=> ' -T.C. Khoo Svs-',
			'NA'=> ' -Not Applicable-'
		);
		echo HTMLLib::CreateSelect('mom_group', $sf_params->get('mom_group'), $momType, 'span5');
		?>
		<small class="fg-pink">to be used in CPF Submission</small>
		</td>
		
	</tr><!--
	<tr>
		<td width="200" class="FORMcell-left FORMlabel bg-clearBlue" nowrap><label>Commence Date</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLLib::CreateDateInput('commence_date', $sf_params->get('commence_date'), 'span2', 'd-m-Y' );
		echo '<small class="fg-pink">format ( dd-mm-yyyy )</small>';
		?>
		</td>
	</tr>	
	--><tr>
		<td class="FORMcell-left FORMlabel bg-clearBlue" nowrap></td>
		<td class="FORMcell-right" nowrap><input type="submit" name="personal"
			value=" Save Personal Detail" class="submit-button success"></td>
	</tr>
</table>
</form>