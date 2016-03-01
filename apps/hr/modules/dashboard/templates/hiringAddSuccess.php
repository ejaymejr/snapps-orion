<?php use_helper('Validation', 'Javascript') ?>
<table class="grid-toolbar-2" border="0" cellspacing="0" width="100%">
  <tr>
    <td width="60" class="alignCenter">
        <?php
         echo image_tag('hr/paySlipPrintIcon.gif') ;
        ?>
    </td>
    <td class="tk-style19" width="50%">
    <?php
    echo '&nbsp;&nbsp;Employee MasterLists Printing';
    ?>
    </td>
    <td class="alignLeft" width="100%">
    <?php //echo HTMLForm::DrawButton('pushbutton2', 'button2', 'Print Bank Payslip', url_for('reports/oldPayslipBank')); ?>
    </td>
</table>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('dashboard/singaporeanContract') ?>" method="post">


<table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td>&nbsp;</td>

		<td colspan="2" class="FORMcell-right" nowrap>


		<div class="sales-form-container">
		<div class="afp-form">
		<div id="tab_employeeadd" class="yui-navset tab-group">
		<ul class="yui-nav">
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'singaporean'); ?>"><a href="#singaporean"><em>Singaporean/PR</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'malaysian'); ?>"><a href="#malaysian"><em>Malaysian</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'spass'); ?>"><a href="#spass"><em>SPass</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'prc'); ?>"><a href="#prc"><em>WP-PRC</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'epass'); ?>"><a href="#epass"><em>E-Pass</em></a></li>
		</ul>
		<div class="yui-content">
		<div id="singaporean">
		<div class="tab-body"><?php include_partial('singaporean_term') ?></div>
		</div>
		<div id="malaysian">
		<div class="tab-body"><?php include_partial('malaysian_term') ?></div>
		</div>
		<div id="compensation">
		<div class="tab-body"><?php include_partial('spass_term') ?></div>
		</div>

		<div id="leave">
		<div class="tab-body"><?php //include_partial('survey') ?></div></div>
		</div>

		<div id="ic">
		<div class="tab-body"><?php //include_partial('icchange') ?></div>
		</div>

		<div id="resigned">
		<div class="tab-body"><?php //include_partial('resignation') ?></div></div>
		
		<div id="document">
		<div class="tab-body"><?php //include_partial('document', array('docpager'=>$docpager)) ?></div></div>

		
		</div>
		</div>
		</div>

		
		</td>
	</tr>
</table>
</form>


<script language="Javascript">
var cv_tabView = new YAHOO.widget.TabView('tab_employeeadd'); 
var url = location.href.split('#');
if (url[1]) {
    //We have a hash
    var tabHash = url[1];
    var tabs = cv_tabView.get('tabs');
    for (var i = 0; i < tabs.length; i++) {
        if (tabs[i].get('href') == '#' + tabHash) {
            cv_tabView.set('activeIndex', i);
            break;
        }
    }    
    window.setTimeout('scrollTop()', 500);
}

</script>

<?php
function currentTab($ctab, $tabs)
{
	$ctab = $ctab ? $ctab : 'singaporean';
	return ( ($ctab == $tabs)? 'selected' : '');
	
}
 ?>


