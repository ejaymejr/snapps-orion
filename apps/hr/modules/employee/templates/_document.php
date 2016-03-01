<?php use_helper('Validation', 'Javascript') ?>
<?php //echo form_tag('employee/upload', 'multipart=true') ?>
<form name="FORM_personal" id="IDFORMadd"
	action="<?php echo url_for('employee/uploadDocument?id=' . $sf_params->get('id') ) ?>"
	method="post"
	enctype="multipart/form-data" method="post" multipart=true
	>

		<table class="table bordered" >
			<tr class="bg-orange">
				<td class="bg-lime alignRight fg-white" colspan="3" nowrap>
				DOCUMENT INFORMATION
				</td>
			</tr>
			<tr>
				<td width="200" class="bg-clearBlue alignRight" nowrap>TARGET FILE</td>
				<td class="FORMcell-right alignLeft" nowrap><?php //echo input_file_tag('file', array('size'=>50)) ?>
				<?php echo HTMLLib::CreateFileSelect('file', 'span4') ?>
				<?php echo input_tag('id', $sf_params->get('id'), array('size'=>50 ,'type'=>'hidden')) ?>
				
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
			<tr>
				<td width="200" class="bg-clearBlue alignRight" nowrap>DESCRIPTION</td>
				<td class="FORMcell-right alignLeft" nowrap><?php
				echo HTMLLib::CreateTextArea('docdesc', $sf_params->get('doc_desc')) ;?>
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>
			<tr>
				<td width="200" class="bg-clearBlue alignRight" nowrap>&nbsp;</td>
				<td>
					<?php echo HTMLLib::CreateSubmitButton('send', 'UPLOAD FILE') ?>
				</td>
				<td class="FORMcell-right" nowrap>&nbsp;</td>
			</tr>

		</table>
		<div class="panel" data-role="panel">
		    <div class="panel-header bg-green fg-white">
		        DOCUMENT LIST
		    </div>
		    <div class="panel-content bg-clearBlue">
		        <?php 
					if (isset($docPager))
					{
					    $filename = hrPager::DocumentPager($docPager);
						$cols = array('seq', 'file_name', 'mime_type', 'size', 'description');
						echo PagerJson::AkoDataTableForTicking($cols, $filename ); //create the table
					}
					?>
		    </div>
		</div>
		
		
</form>