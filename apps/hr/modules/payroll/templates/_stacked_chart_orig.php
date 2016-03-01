<?php
//var_dump($tickLabels);
//exit();
//echo $colors;
if (! ($tickLabels))
{
	return; 
}

$plots = array();



$chartTitle = isset($chartTitle) ? $chartTitle : $title;

$chartID = XIDX::getInstance()->next();
 
       
$TITLE = $chartTitle;
$XDENSITY = 1;
$VERTGRID = 10;
$COLUMN_WIDTH = 80;

$Y_AXIS_IS_FIX_HEIGHT = 'false';
$Y_AXIS_HEIGHT = '25000';

if ($Y_AXIS_IS_FIX_HEIGHT == 'false') $Y_AXIS_HEIGHT = '';

$_SESSION['yfix'] = $Y_AXIS_IS_FIX_HEIGHT;
$_SESSION['yfixh'] = $Y_AXIS_HEIGHT;
    
        
// get settings    
$settingFile = 'amcolumn_settings_stacked.xml';
$strs = file(   
                SF_ROOT_DIR . DIRECTORY_SEPARATOR .
                'apps' . DIRECTORY_SEPARATOR .
                SF_APP . DIRECTORY_SEPARATOR .
                'modules' . DIRECTORY_SEPARATOR .
                $sf_params->get('module') . DIRECTORY_SEPARATOR .
                'config' . DIRECTORY_SEPARATOR .
                'amcolumn' . DIRECTORY_SEPARATOR . $settingFile);

$settings = array();

foreach ($strs as $str) {

    if (strpos($str, '<!--') === false) {
        $str = trim($str);   
        // var_dump($str);   
        // $str = str_replace("\r", '', $str);
        $str = str_replace('$TITLE', $TITLE, $str);   
        $str = str_replace('$XDENSITY', $XDENSITY, $str);  
        $str = str_replace('$VERTGRID', $VERTGRID, $str);    
        
        $str = str_replace('$Y_AXIS_IS_FIX_HEIGHT', $Y_AXIS_IS_FIX_HEIGHT, $str);  
        $str = str_replace('$Y_AXIS_HEIGHT', $Y_AXIS_HEIGHT, $str);  
        $str = str_replace('$COLUMN_WIDTH', $COLUMN_WIDTH, $str);  
        $str = str_replace('$EXPORT_URL', sfConfig::get('http_intranet') . 'cassette/js/amcolumn/export.php', $str);
        if ($str != '') $settings[] .= '"' . $str . '"';  
    }
} 

$settingString = implode(' + ' . "\n", $settings);

//$tickLabels = array();
//$plotDatas = array();
//$ballonLabels = array();
//$colTotals = array();
         
$chartData = '';
$chartData = '<chart>';
// populate axis


$chartData .= '<series>';
for ($i = 0; $i < sizeof($tickLabels); $i++) {
    $chartData .= '<value xid=\'dur' . $i . '\'>' . str_replace("\n", '\\n', $tickLabels[$i]) . '</value>';
}
$chartData .= '</series>';


// populate graphs
$chartData .= '<graphs>';
$pos = 0;
foreach($plotDatas as $kData=>$vData)
{
	//------------------ Hours Worked
    //$color = "color='#" . $colors[$pos] . "'";
    $color = "";
	$chartData .= '<graph ' . $color . ' title=\'' . $kData . '\'>';           
	for ($i = 0; $i < sizeof($tickLabels); $i++) {
	    $chartData .= '<value xid=\'dur' . $i . '\' description=\'' . $ballonLabels[$i] . '\'>' . $plotDatas[$kData][$i] . '</value>';
	}
	$chartData .= '</graph>';
	$pos++;
}	
$chartData .= '</graphs>';
$chartData .= '</chart>' ;

?>


        
        
<div id="<?php echo $chartID; ?>">
    <strong>You need to upgrade your Flash Player</strong>

</div>

<script type="text/javascript">
    // <![CDATA[        
    var so = new SWFObject("<?php echo sfConfig::get('app_amcolumn_public_swf'); ?>", "amcolumn", "1000", "400", "8", "#FFFFFF");
    so.addVariable("path", "<?php echo sfConfig::get('app_amcolumn_public_path'); ?>");  
    so.addVariable("chart_data", escape("<?php echo $chartData; ?>")); 
    so.addVariable("chart_settings", escape(<?php echo $settingString; ?>));
    so.addVariable("preloader_color", "#000000");
    so.addVariable("additional_chart_settings", "<settings><column><width>30</width></column></settings>");
    so.write("<?php echo $chartID; ?>");
    // ]]>
</script>