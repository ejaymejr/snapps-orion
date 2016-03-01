<?php

$chartTitle = isset($chartTitle) ? $chartTitle : $title;

$chartID = XIDX::getInstance()->next();
 
       
$TITLE = $chartTitle;
$XDENSITY = 1;
$VERTGRID = 10;
$COLUMN_WIDTH = 80;

$Y_AXIS_IS_FIX_HEIGHT = 'false';
$Y_AXIS_HEIGHT = '25000';

if ($Y_AXIS_IS_FIX_HEIGHT == 'false') $Y_AXIS_HEIGHT = '';

$settingFile = 'simple_pie_settings.xml';
$strs = file(   
                SF_ROOT_DIR . DIRECTORY_SEPARATOR .
                'apps' . DIRECTORY_SEPARATOR .
                SF_APP . DIRECTORY_SEPARATOR .
                'modules' . DIRECTORY_SEPARATOR .
                $sf_params->get('module') . DIRECTORY_SEPARATOR .
                'config' . DIRECTORY_SEPARATOR . $settingFile);

$settings = array();

foreach ($strs as $str) {
    if (strpos($str, '<!--') === false) {
    	$str = str_replace('$TITLEHERE', $title, $str);
    	

        if ($str != '') $settings[] .= '\'' . trim($str) . '\'';  
    }
} 

$settingString = implode(' + ' . "\n", $settings);

         
//$chartData = '<pie>' .
//'<slice title="Twice a day" pull_out="true">358</slice>' .
//'<slice title="Once a day" pull_out="false">241</slice>' .
//'<slice title="Once a week" pull_out="false">58</slice>' .
//'<slice title="Never" pull_out="false">120</slice>' .
//'<slice title="After every meal" alpha="30">50</slice>' .
//'</pie>';
$pos = 1;
$chartData = '<pie>';
foreach($data as $title=>$value)
{
	$chartData = $chartData .  '<slice title="'.$title.'" pull_out="'.(($pos == $pullout)? 'true' : 'false' ).'" alpha="'.(($pos == $pullout)? 100 : 100 ).'">'.$value.'</slice>';
	$pos++;
}
$chartData = $chartData . '</pie>';

?>


        
        
<div id="<?php echo $chartID; ?>">
    <strong>You need to upgrade your Flash Player</strong>

</div>

<script type="text/javascript">
    // <![CDATA[        
    var so = new SWFObject("<?php echo sfConfig::get('app_ampie_public_swf'); ?>", "ampie", "500", "600", "1", "#FFFFFF");
    so.addVariable("path", "<?php echo sfConfig::get('app_ampie_public_path'); ?>");  
    so.addVariable("chart_data", escape('<?php echo $chartData; ?>')); 
    so.addVariable("chart_settings", escape(<?php echo $settingString; ?>));
    so.addVariable("preloader_color", "#000000");
    so.write("<?php echo $chartID; ?>");
    // ]]>
</script>