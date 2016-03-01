<?php
/*
 *
* This is the working code on how it appears in HTML Format
*
*
*
<table class="table striped hovered dataTable" id="dataTables-1">
<thead>
<tr>
<th class="text-left">Action</th>
<th class="text-left">Seq</th>
<th class="text-left">Send To</th>
<th class="text-left">Date Sent</th>
<th class="text-left">Sent By</th>
<th class="text-left">Token</th>
</tr>
</thead>

<tbody>
</tbody>

<tfoot>
<tr>
<th class="text-left">Action</th>
<th class="text-left">Seq</th>
<th class="text-left">Send To</th>
<th class="text-left">Date Sent</th>
<th class="text-left">Sent By</th>
<th class="text-left">Token</th>
</tr>
</tfoot>
</table>
<?php
$fileID = HrLib::randomID(20).'.json';
$filename = PagerJson::UploadEdit_EmailPager($fileID, $pager);
?>
<script>
$(function(){
		$('#dataTables-1').dataTable( {
				"bProcessing": true,
				"sAjaxSource": "<?php echo $filename ?>",
				"aoColumns": [
{ "mData": "action" } ,
{ "mData": "seq" } ,
{ "mData": "send_to" },
{ "mData": "date_sent" },
{ "mData": "sent_by" },
{ "mData": "token" }
				]
				} );
		});
</script>

*/
class PagerJson
{
	//const TEST_SERVER_DIRECTORY = '/opt/httpd/htdocs_i/symfony/snapps-micronclean/web/json/';
	//const PROD_SERVER_DIRECTORY = '/opt/sites/ext/app.microncleansingapore.com/symfony/snapps-micronclean/web/json/';
	const TEST_SERVER_DIRECTORY = '/opt/httpd/htdocs_i/symfony/snapps-micronclean/web/json/';
	
	public static function _H()
	{
		//$highlightRow = sfContext::getInstance()->getP
		$highlightRow = sfContext::getInstance()->getRequest()->getParameter('HID');
		echo '<script>
			$(document).ready(function() {
				$("#tr_'.$highlightRow.'").addClass("info ");
			});
			</script>
		';
	}
	
	public function var_dump($vars)
	{
		echo "<pre>";
	    print_r($vars); // or var_dump($data);
	    echo "</pre>";
	}

	public static function Highlight($elementID)
	{
		//$highlightRow = sfContext::getInstance()->getP
		$highlightRow = sfContext::getInstance()->getRequest()->getParameter('HID');
		echo '<script>
			$(document).ready(function() {
				$("#tr_'.$highlightRow.'").addClass("info ");
			});
			</script>
		';
	}
	
	
	public static function CamelCase($str) {
	    $i = array("-","_");
	    $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
	    $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
	    $str = str_replace($i, ' ', $str);
	    $str = str_replace(' ', '', ucwords(strtolower($str)));
	    $str = strtolower(substr($str,0,1)).substr($str,1);
	    $str = ucfirst($str); //upper case first character
	    return $str;
	}
	
	public static function TableHeaderFooter($cols = null, $jsonData=null, $showRow = null, $totalRecord=null)
	{
		$dataTableID = HrLib::randomID(10);
		if (!$cols || !$jsonData):
			return 'no columns specified / filename.json required!';
		endif;
		$mess = '';

		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
					<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
					<script type="text/javascript">
//						 $(window).load(function(){
//							$("#clickToExcel").click(function() { 
//								var dtltbl = $("#table_2").html();     
//								window.open("data:application/vnd.ms-excel," + $("# mytbl").html());
//							});
//						}); 
						
						function ExportToExcel(mytblId)
					    {
					        var htmltable= document.getElementById(mytblId);
					        var html = htmltable.outerHTML;
							// MS OFFICE 2003  : data:application/vnd.ms-excel
							// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
					        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
					    }
					    
					    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
					</script>
				 ';
		
		$mess .= '
				<table class="table striped hovered dataTable" id="'.$dataTableID.'">
                <thead>
                <tr>';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left"><small>'.$header.'<small></th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>';
      
				foreach($cols as $col):
					 $searchNameID = 'search_'.$col;
					 $searchValue = $col ;
                	 $mess .= '<th class="text-left">
                	 			<div class="input-control text">	
                	 				<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
                	 			</div>
                	 		</th>';
                endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
        
        $totalRecord = $totalRecord ?  $showRow .', 25, 50, ' . $totalRecord : 100;
		$jsonData = substr($jsonData, 1, strlen($jsonData) - 2);
		$shownumberOfRows = $totalRecord;
		
        $mess .= '<script>
	        $(function(){
	         	var asInitVals = new Array();
	        	var oTable = $("#'.$dataTableID.'").dataTable( {
	        		"bProcessing": true,
	        		"sPaginationType": "full_numbers",
	        		"aLengthMenu": ['.$shownumberOfRows.'],
	        		'.$jsonData.',
	        		"oLanguage": {
         				"sSearch": "General Search:"},
	        		"aoColumns": [
	        		';
        			foreach($cols as $col):
		        	    $mess .= '{ "mData": "'.$col.'" } ,';
	     			endforeach;
	     $mess .= '   		
	     		]
	        	} );
	     		
	     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
	        });
	        </script>';
		return $mess;
	}
	
	public static function AkoDataTable($cols, $pagerArray, $title=null, $tfoot=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		
		$shownumberOfRows = "10, 20, 100," .sizeof($pagerArray);
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var oTable = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
					     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
				
				oTable.fnFilter( this.value, $("tfoot input").index(this) );
				/*oTable.fnFilter( this.value, $("tfoot select").index(this) );*/
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
			} );
		</script>';
		$mess .= '
				<table class="table bordered hovered" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left  ">'.$header.'</th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
        //populate data here
        if ($tfoot):
	        foreach($tfoot as $k=>$footer):
	        	${"opt_" . $k} = array(''=>'');
	        	${"search_" . $k} = '';
	        endforeach;
        endif;
        
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col;
			 $searchValue = $col ;
			 if (false): // (isset($tfoot[$col])):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select(${"opt_" . $col}, 'test' ) ).'
	                 		</div>
	                 	    </th>';
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}
	
	public static function AkoDataTableForTicking($cols, $pagerArray, $title=null, $tfoot=null, $norows=null, $showCheckBox=null) //$showCheckBox = header name
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$tfoot = $tfoot? $tfoot : $cols;
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="text-info"><small>
			<small>*Note Office 2003 To Remove the Boxes: Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"<br></small>
			<small>*Note Office 2007 To Remove the Boxes: Office Button > Excel Option > Popular : Tick "Show Developer Tab..."</small>
			</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		$shownumberOfRows = "10, 20, 100," .sizeof($pagerArray);
		if ($norows):
			$shownumberOfRows = $norows.",".sizeof($pagerArray);
		endif;
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var '.$dataTableID.' = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"bFilter": true,
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
				';
		$searchPos = 0;
		foreach($cols as $searchPos => $col):
			$searchNameID = 'search_'.$col.'_'.$dataTableID;
			if ($tfoot):
				//$searchPos = in_array($col, $tfoot);
				
				if (in_array($col, $tfoot)):
				$mess .=	'$("#'.$searchNameID.'").change( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
							';
				endif;
			else:
				$mess .=	'$("#'.$searchNameID.'").keyup( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
						';
			endif;
		endforeach;
		$mess .='
//				$("tfoot input").keyup( function () {
//					'.$dataTableID.'.fnFilter( this.value, $("tfoot select").index(this) );
//				} );
//				
//				$("tfoot select").change( function () {
//					'.$dataTableID.'.fnFilter( this.value );
//				} );
//	
//				$("tfoot input").each( function (i) {
//					asInitVals[i] = this.value;
//				} );
//					
//				$("tfoot input").focus( function () {
//					if ( this.className == "search_init" )
//					{
//						this.className = "";
//						this.value = "";
//					}
//				} );
//				
//				$("tfoot input").blur( function (i) {
//					if ( this.value == "" )
//					{
//						this.className = "search_init";
//						this.value = asInitVals[$("tfoot input").index(this)];
//					}
//				} );
//				
								
			});
		</script>';
		$mess .= '
				<table class="table bordered hovered condensed striped" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h4 class="fg-white">'.$title.'</h4></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
					 if($showCheckBox):
						$mess .= ' <script>
									$("#checkAll").change(function () {
									    $("input:checkbox").prop("checked", $(this).prop("checked"));
									});
								   </script>
						';
					 endif;
					 if ($header == self::CamelCase($showCheckBox)):
					 	$header .= HTMLLib::CreateCheckBox('checkAll', ' ', 'checked ');
					 endif;
                	 $mess .= '<th id="td_'.$col.'" class="text-center td_'.$col.'" ><small>'. $header .'</small></th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
		$footerArray = array(''=>'');
		if ($tfoot):
			foreach($tfoot as $tfootname):
				foreach($pagerArray as $nothing => $actualValue):
					$actualValue = strip_tags ($actualValue[$tfootname]);
					$footerArray[$tfootname][''] = '';
					$footerArray[$tfootname][$actualValue] = $actualValue;
				endforeach;
			endforeach;
		endif;
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $recID = $actualValue['record_id']? strip_tags($actualValue['record_id']) : $seq++; 
        $trID = 'tr_'.$recID; //. strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td id="td_'.$head.'" class="td_'.$head.'" nowrap >'. $actualValue[$head] .'</td>' : '<td class="alignCenter" nowrap >'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
        if (sizeof($pagerArray) > 0): // show footer if there are database records;
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col.'_'.$dataTableID;
			 $searchValue = $col ;
			 //var_dump(in_array($col, $tfoot) );
			 if ($tfoot): 
			 	 if(in_array($col, $tfoot)):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select($footerArray[$col], '' ), 'id='. $searchNameID ).'
	                 		</div>
	                 	    </th>';
			 	 endif;
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'" id="'.$searchNameID.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        endif;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}	
	
	public static function AkoTableForDropDownSelect($cols, $pagerArray, $title=null, $tfoot=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$tfoot = $tfoot? $tfoot : $cols;
		$mess = '';
		$shownumberOfRows = "10";
		$mess .= "
		<script type=\"text/javascript\">
			$(document).ready(function() {
				var asInitVals = new Array();
				var ".$dataTableID." = $(\"#".$dataTableID."\").dataTable({
					\"bProcessing\": true,
					\"aLengthMenu\": [".$shownumberOfRows."],
					\"bFilter\": true,
					\"oLanguage\": {
         				\"sSearch\": \"Search:\"},
	        		\"sPaginationType\": \"full_numbers\"
				});			
			});
		</script>";
		$mess .= '
				<table class="table bordered hovered bg-white" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left  bg-white">'.$header.'</th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
		$footerArray = array(''=>'');
		if ($tfoot):
		foreach($tfoot as $tfootname):
			foreach($pagerArray as $nothing => $actualValue):
				$actualValue = strip_tags ($actualValue[$tfootname]);
				$footerArray[$tfootname][''] = '';
				$footerArray[$tfootname][$actualValue] = $actualValue;
			endforeach;
		endforeach;
		endif;
        //self::var_dump($footerArray);
        //exit();
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';

        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}	
	
	public static function DataTableForNamelist($cols, $pagerArray, $cdate, $title=null, $tfoot=null)
	{
		$seagateCalendarUtil = new SeagateFiscalCalendarUtils();
		$seagateCalendar = new SeagateFiscalCalendar( $seagateCalendarUtil->FindSeagateFiscalYear($cdate) );	
		$weekno = ($seagateCalendar->findWeek($cdate));
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		$shownumberOfRows = sizeof($pagerArray);
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var oTable = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
					     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
				
				oTable.fnFilter( this.value, $("tfoot input").index(this) );
				/*oTable.fnFilter( this.value, $("tfoot select").index(this) );*/
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
			} );
		</script>';
		$mess .= '
				<table class="table bordered hovered" id="'.$dataTableID.'">
                <thead>
               	';
//        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
//        $mess .= '
//                <tr class="" >';
//				foreach($cols as $col):
//					 $header = self::CamelCase($col);
//                	 $mess .= '<th class="text-left  ">'.$header.'</th>';
//                endforeach;
        $mess .= '
                </tr>
                <tr class="bg-clearBlue">
                	<td rowspan="2">Seq</td>
                	<td rowspan="2">Gid</td>
                	<td rowspan="2">Name</td>
                	<td rowspan="2">Js</td>
                	<td rowspan="2">Boot</td>
                	<td rowspan="2">SBoot</td>
               		<td colspan="2" class="alignCenter">Week '. $weekno .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 1) .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 2) .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 3) .'</td>
                	<td rowspan="2">Cell</td>
                	<td rowspan="2">Dept</td>
                	<td rowspan="2">Shift</td>
                </tr>
                <tr class="bg-clearBlue">
                    <td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td> 
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
        //populate data here
        if ($tfoot):
	        foreach($tfoot as $k=>$footer):
	        	${"opt_" . $k} = array(''=>'');
	        	${"search_" . $k} = '';
	        endforeach;
        endif;
        
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= '<td>'.$actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
//       	var_dump($search_cell);
//       	exit();
//		$mess .= '
//			<tr class="gradeX">
//				<td>Trident</td>
//				<td>Internet
//					 Explorer 4.0</td>
//				<td>Win 95+</td>
//				<td class="center">4</td>
//				<td class="center">X</td>
//			</tr>
//		var_dump($tfoot);
//		exit();
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col;
			 $searchValue = $col ;
			 if (false): // (isset($tfoot[$col])):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select(${"opt_" . $col}, 'test' ) ).'
	                 		</div>
	                 	    </th>';
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}

	public static function TimekeeperTable($pager)
	{
		$table = '';
		$table .= '
			
		';
	}
	
	protected function CreateCheckBox($id, $label, $chkd=null, $span=null)
	{
		return '
			<div class="input-control checkbox '.$span.' ">
				<label>
				<input id="'.$id.'" name="'.$id.'" type="checkbox"  '.$chkd.' />
				<span class="check"></span>
				'.$label.'	
				<label>
			</div>
		';
	}
	
	
	public static function ShowInFlatTable($cols, $filename, $title, $sum=null, $colspace=null) //$sum = array(cols[1], cols[2]); //colspace = array(1,2,1,1,3,4...)
	{
		$dataTableID = HrLib::randomID(10);
		$sum = sizeof($sum) > 0? $sum : array();
		$msg = self::ExportToExcel($dataTableID);
		$msg .= '
		<div class="panel">
			<div class="panel-header bg-orange fg-white">
			'. $title .'
			</div>
			<div class="panel-content">
			<table id="'.$dataTableID.'" class="table bordered condensed striped clicked">
			    <tr>';
			$total = array();
			foreach ($cols as $k=>$col): 
					$span = sizeof($colspace) > 0 ? 'span'.$colspace[$k] : '';
			    	$msg .='<th class="bg-clearBlue '.$span.' "><small>'. HrLib::CamelCase($col) .'</small></th>';
			    	$total[$col] = 0;
			endforeach;
			$msg .= '</tr>';
			foreach ($filename as $rec): 
			     $msg .= '<tr id="tr_' . $rec["record_id"].'">';
			      foreach ($cols as $col):
			      		$total[$col] += (strip_tags($rec[$col])) ;
			      		if (is_numeric(strip_tags($rec[$col])) && ($col <> 'seq' && $col <> 'employee_no')  ) :
			      			$msg .= '<td nowrap class="alignRight td_' . $col .' " id="td_' . $col .' " >'.  $rec[$col] .'</td>';
			      			/****************** ONLY NUMBERS THAT REFLECT ON $sum ARRAY WILL BE BIG NUMBER ****/
//			      			if (in_array($col, $sum) === true):
//			      				$msg .= '<td class="alignRight td_' . $col .' " id="td_' . $col .' " >'.  (strip_tags($rec[$col]))  .'</td>';
//			      			else:
//			      				$msg .= '<td class="alignRight td_' . $col .' " id="td_' . $col .' " >'.  $rec[$col] .'</td>';
//			      			endif;
			      			/***************** END ENABLE THIS BLOCK IF YOU WANT THIS FEATURE ****/
			      		else:
			    			$msg .= '<td nowrap class="td_' . $col .' " id="td_' . $col .' " >'.  $rec[$col] .'</td>';
			    		endif;
			      endforeach; 
			      $msg .= '</tr>';
			endforeach;
			//************FOOTER / SUM OF VALUES
			if (sizeof($sum) > 0):
		      $msg .= '<tr id="tr_"' . $rec["record_id"].'" class="bg-green fg-white">';
		      $pos = 0;
		      $tot = 0;
		      foreach ($cols as $col):
	      		$pos ++;
	      		if ((in_array($col, $sum)) !== false):
	    			if ($total[$col] == 0):
	    				$msg .= '<td class="alignCenter">-</td>';
	    			else:
	    				$msg .= '<td class="td_' . $col .' " id="td_' . $col .' " >'.  number_format($total[$col],2) .'</td>';
	    			endif;
	    			$tot += $total[$col];
	    		else:
	    			$msg .= '<td class="alignRight">'. ($pos >= sizeof($cols)? number_format($tot, 2) : '&nbsp;') .'</td>';
	    		endif;
		      endforeach; 
		      $msg .= '</tr>';
			endif;
			$msg .=' </table>
			</div>
		</div>
		';
		return $msg;
	}
	
	public static function ExportToExcel($dataTableID)
	{
		return '<a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
				<script type="text/javascript">
					function ExportToExcel(mytblId)
				    {
				        var htmltable= document.getElementById(mytblId);
				        var html = htmltable.outerHTML;
						// MS OFFICE 2003  : data:application/vnd.ms-excel
						// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
				        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
				    }
				</script>
			 ';
	}

}
