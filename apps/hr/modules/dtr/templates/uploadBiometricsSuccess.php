<?php use_helper('Validation', 'Javascript') ?>
<?php echo form_tag('dtr/uploadBiometrics', 'multipart=true') ?>
<table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td width="200" class="FORMcell-left FORMlabel" nowrap>
		<div id="divBorder">
		<table width="100%" class="FORMtable" border="0" cellpadding="4"
			cellspacing="0">
			<tr>
				<td colspan="3" height="25" width="100" nowrap>
				<div class="tk-style53 alignCenter">
				<h2>UPLOAD FINGERTEC/BIOMETRIC DATA</h2>
				</div>
				</td>
			</tr>
			<tr>
				<td width="200" class="FORMcell-right FORMlabel" nowrap>Target File</td>
				<td class="FORMcell-right alignLeft" nowrap><?php echo input_file_tag('file', array('size'=>50)) ?>
				<?php echo input_tag('id', $sf_params->get('id'), array('size'=>50 ,'type'=>'hidden')) ?>
				<?php echo submit_tag('Send', 'name=send') ?>
				
				
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
			<tr>
				<td width="200" class="FORMcell-right FORMlabel" nowrap>Reminders</td>
				<td class="FORMcell-right alignLeft" nowrap>
				<span class="positive">Please take note that only employee that have registered FIN Number is processed.<br>
				to update the FIN Number,  goto Employee Info and click the WORK INFO.  <?php echo link_to('click here', 'employee/employeeSearch') ?>
				</span>
				
				</td>				
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
			
			<tr>
				<td width="200" class="FORMcell-right FORMlabel" nowrap>Description</td>
				<td class="FORMcell-right alignLeft" nowrap><?php
				echo textarea_tag('docdesc', 'Uploaded on ' . Date('Y-m-d'), 'size=80x5');
				?>
				
				
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
			<tr>
				<td width="200" class="FORMcell-right FORMlabel" nowrap>TCMS V2 Fingertec SETTINGS</td>
				<td class="FORMcell-right alignLeft" nowrap><?php
				echo image_tag('hr/biometricsExportSettings.jpg');
				?>
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
		</table>
		</form>
		</div>
		</td>
	</tr>
</table>


