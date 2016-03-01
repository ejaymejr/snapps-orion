
<div class="navigation-bar dark">
    <div class="navigation-bar-content container"> 

 <?php        
 $appName = sfConfig::get('app_menu_name');
if (! $sf_user->isAuthenticated()):
	if (  $appName == 'HumanResourceMenu') :
	?>
	        <ul class="element-menu">
            <li>
                <a class="dropdown-toggle" href="<?php echo url_for('dtr/scanIn')?>"><i class="icon-home">&nbsp;</i><?php echo strtoupper(sfConfig::get('app_apps_name')) ?><sup>1.0</sup></a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                	<li><a href="<?php echo url_for('login')?>"><?php echo 'Login' ?></a></li>
                    <li><a href="#"><?php echo 'IP Address: ' . $_SERVER['HTTP_X_FORWARDED_FOR'] . '&nbsp;'?></a></li>
                </ul>
            </li>
        	</ul>
	        <?php 
		include_partial('global/menu_hr_nouser');
	endif;
//	echo '<pre>';
//	print_r($sf_user);
//	echo '</pre>';
//	exit();
endif;

if ($sf_user->isAuthenticated()): 

	
	if (  $appName == 'TicketIssuance') {
		include_partial('global/menu_ticket');
	}
	
	if (  $appName == 'FinanceMenu') {
		?>
		<a href="<?php echo url_for('home/index')?>" class="element"><span class="icon-home ">&nbsp;</span><?php echo strtoupper(sfConfig::get('app_apps_name')) ?><sup>1.0s</sup></a>
			        <span class="element-divider"></span>
			        <a class="element1 pull-menu" href="#"></a> <?php
					        
		include_partial('global/menu_forecast');
	}
	
	if (  $appName == 'UserManagement') {
		include_partial('global/menu_user');
	}	
	
	if (  $appName == 'MaintenanceEntry') {
		?>
			    <ul class="element-menu">
		            <li>
		                <a class="dropdown-toggle " href="<?php echo url_for('dtr/scanIn')?>"><i class="icon-home  ">&nbsp;</i><?php echo strtoupper(sfConfig::get('app_apps_name')) ?><sup>1.0</sup></a>
		                <ul class="dropdown-menu dark" data-role="dropdown">
							<li><?php echo link_to('Sign Out : '. HrLib::GetUser(), 'logout') ?></li>
							<li><?php echo link_to('Password Change', sfCOnfig::get('http_intranet').'orion/user/user/passwordChange', 'target=_BLANK' )?></li>
							<li><a href="#">Message Support</a></li>
							<li><a href="#">Send SMS</a></li>
							<li><a href="#"><?php echo 'IP Address: ' . $_SERVER['HTTP_X_FORWARDED_FOR'] . '&nbsp;'?></a></li>
						</ul>
		            </li>
		        </ul> 
				<span class="element-divider"></span>
				<?php 
		include_partial('global/menu_maintenance');
	}
	
	if (  $appName == 'microncleanSurvey') {
		include_partial('global/menu_survey');
	}
	
	if (  $appName == 'HumanResourceMenu') {
		?>
	    <ul class="element-menu">
            <li>
                <a class="dropdown-toggle " href="<?php echo url_for('dtr/scanIn')?>"><i class="icon-home  ">&nbsp;</i><?php echo strtoupper(sfConfig::get('app_apps_name')) ?><sup>1.0</sup></a>
                <ul class="dropdown-menu dark" data-role="dropdown">
					<li><?php echo link_to('Sign Out : '. HrLib::GetUser(), 'logout') ?></li>
					<li><?php echo link_to('Password Change', sfCOnfig::get('http_intranet').'orion/user/user/passwordChange', 'target=_BLANK' )?></li>
					<li><a href="#">Message Support</a></li>
					<li><a href="#">Send SMS</a></li>
					<li><a href="#"><?php echo 'IP Address: ' . $_SERVER['HTTP_X_FORWARDED_FOR'] . '&nbsp;'?></a></li>
				</ul>
            </li>
        </ul> 
		<span class="element-divider"></span>
		<?php 
		include_partial('global/menu_hr');
	}
	
	if (  $appName == 'cameraViewer') {
		include_partial('global/menu_camera');
	}
	
	if (  $appName == 'dashboardMenu') {
		include_partial('global/menu_dashboard');
	}
endif;
?>
</div>


<?php 
function MenuPhpToJavascript($menuname, $submenu)
{
	$mess = '
		var '.$menuname.'={divclass:"anylinkmenu", inlinestyle:"", linktarget:""} //First menu variable. Make sure "anylinkmenu1" is a unique name!
		'.$menuname.'.items=[';
	foreach($submenu as $sName=>$url) {
	$mess += '
			["'.$sName.'", "'.$url.'"],
    ';
	}
	$mess += '	
		]	
	';
	return $mess;
}
