 <?php use_helper('Form', 'Javascript', 'PagerNavigation');
// sfConfig::set('app_page_heading', 'Trend Income and Expense(s) Summary');
?>

 <table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td>&nbsp;</td>

		<td colspan="2" class="FORMcell-right" nowrap>


		<div class="sales-form-container">
		<div class="afp-form">
		<div id="tab_employeeadd" class="yui-navset tab-group">
		<ul class="yui-nav">
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'signPayslip'); ?>"><a href="#sign"><em>Sign Payslip</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'workpass'); ?>"><a href="#workpass"><em>Work Pass Expiry</em></a></li>
			<li class="<?php echo currentTab($sf_params->get('ctab'), 'qouta'); ?>"><a href="#work"><em>Foreign Workers Qouta</em></a></li>
		</ul>
		<div class="yui-content">

		<div id="workpass">
		<div class="tab-body"><?php include_partial('sign', array('pager' => $pager ) ) ?></div>
		</div>
		
		<div id="workpass">
		<div class="tab-body"><?php include_partial('workpass', array('cWPpager' => $cWPpager ) ) ?></div>
		</div>
		
		<div id="qouta">
		<div class="tab-body"><?php include_partial('quota', array('mfgQuota' => $mfgQuota, 'svsQuota' => $svsQuota  )) ?></div>
		</div>
		
		<div id="qouta">
		<div class="tab-body"><?php //include_partial('quota', array('mfgQuota' => $mfgQuota, 'svsQuota' => $svsQuota  )) ?></div>
		</div>
				
		</div>
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
	$ctab = $ctab ? $ctab : 'personal';
	return ( ($ctab == $tabs)? 'selected' : '');
	
}
 ?>