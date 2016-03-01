<?php
//var_dump($tickLabels);
//exit();
//echo $colors;
if (! $tickLabels)
{
	return; 
}

//*******************************************************
//*** BELOW ARE THE PARAMETERS OF THE PARENT 
////*******************************************************
//$colors = sfConfig::get('app_amcharts_colors');
//$para = array('empNo'=>$sf_params->get('employee_no'), 
//	'sdate'=>$sdt, 'edate'=>$edt
//	,'ballonLabels'=>$ballonLabels, 'tickLabels'=>$tickLabels
//	,'colTotals'=>$colTotals
//);
//include_partial('businessIntelligence/actual_work_chart', array_merge($para, array('title'=>'Actual Working Hours','plotDatas'=>$plotDatas['DURA']), array('colors'=>$colors[0])));
//*******************************************************

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

$UNITS = (isset($units)? $units : 'Qty');
        
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
        $str = str_replace('Qty', $UNITS, $str);
        $str = str_replace('( {percents}% )', '', $str);
        if ($UNITS == 'Amount')
        {            
            $str = str_replace('<![CDATA[{value}<br />{percents}%]]>', '<![CDATA[${value}<br />]]>', $str);
        }else{
            
            $str = str_replace('{percents}%', $UNITS, $str);
        }        
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
    $chartData .= '<value xid=\'' . $i . '\'>' . str_replace("\n", '\\n', $tickLabels[$i]) . '</value>';
    }
$chartData .= '</series>';


// populate graphs
$chartData .= '<graphs>';
	//------------------ Hours Worked
    $color = "color='#" . $colors . "'";
	$chartData .= '<graph ' . $color . ' title=\'' . '' . '\'>';           
	for ($i = 0; $i < sizeof($tickLabels); $i++) {
	    $chartData .= '<value xid=\'' . $i . '\' description=\'' . $tickLabels[$i] . '\'>' . $plotDatas[$i] . '</value>';
	}
	$chartData .= '</graph>';
	

//-------------------------------------------------------------
//
//$chartData .= '<graphs>';
//	//------------------ Hours Worked
//	for ($i = 0; $i < sizeof($tickLabels); $i++) {
//    	$color = "color='#" . $colors[$i] . "'";
//		$chartData .= '<graph ' . $color . ' title=\'' . '' . '\'>';           
//	    $chartData .= '<value xid=\'' . $i . '\' description=\'' . $tickLabels[$i] . '\'>' . $plotDatas[$i] . '</value>';
//		$chartData .= '</graph>';	    
//	}
//--------------------------------------------------------------
	
$chartData .= '</graphs>';


$chartData .= '</chart>' ;

?>


<div id="<?php echo $chartID; ?>">
    <strong>You need to upgrade your Flash Player</strong>

</div>

<script type="text/javascript">
    // <![CDATA[        
    var so = new SWFObject("<?php echo sfConfig::get('app_amcolumn_public_swf'); ?>", "amcolumn", "800", "300", "8", "#FFFFFF");
    so.addVariable("path", "<?php echo sfConfig::get('app_amcolumn_public_path'); ?>");  
    so.addVariable("chart_data", escape("<?php echo $chartData; ?>")); 
    so.addVariable("chart_settings", escape(<?php echo $settingString; ?>));
    so.addVariable("preloader_color", "#000000");
    so.addVariable("additional_chart_settings", "<settings><column><width>30</width></column></settings>");
    so.write("<?php echo $chartID; ?>");
    // ]]>
</script>