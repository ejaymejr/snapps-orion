<?php use_helper('Form', 'Javascript'); ?>

<div class="contentBox">            
<h1><?php echo link_to('<i class="icon-arrow-left-3 fg-darker smaller"></i>', '') ?>
	LEAVE <small>APPLICATION | APPROVAL</small></h1>           
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('leave/leaveApplySearch');?>" method="post">

<div class="panel" >
<div class="panel-header bg-orange fg-white">
	EMPLOYEE'S LEAVE INFO
</div>
<div class="panel-content">
	<table class="table condensed bordered">
	  <tr>
	    <td class="bg-clearBlue alignRight span2"><label>FILTER</label></td>
	    <td>
	    <?php
	      if (! $sf_params->get('cMonth')){
	          $sf_params->set('cMonth', $sf_params->get('cDate'));
	          $sf_params->set('cYear', DateUtils::DUFormat('Y', $sf_params->get('cDate')) );
	          $sf_params->set('cMon', $sf_params->get('cDate') );
	      }
	      $optCal = array_merge(sfConfig::get('monthlyCalendar'), array('ALL'=>'ALL'));
		  $xyear = HrFiscalYearPeer::GetFiscalYearList1();
		  echo HTMLLib::CreateSelect('cMonth', $sf_params->get('cMonth'), $optCal, 'span2');
		  echo HTMLLib::CreateSelect('cYear', $sf_params->get('cYear'), $xyear, 'span1');
		  echo input_tag('cMon', $sf_params->get('cMon'), 'id=cMon type=hidden');           
	    ?>    
	    </td>
	    </tr>
	    <tr >
	    	<td class="bg-clearBlue"></td>
	    	<td>
	    		<input type="submit" name="filter" value=" Show Specified Month " class="success"> 
	    		<a id="save" href="<?php echo url_for('leave/leaveApplyAdd') ?>" class="button success" >New Leave Application</a>
	    		
	    	</td>
	    </tr>
	 </tr>
	</table>
</div>
</div>
    
<?php 		

if ($sf_params->get('cMon')!= 'ALL'){
    $nMonth = DateUtils::DUFormat('-m-d', $sf_params->get('cMon'));
}else{
    $nMonth = $sf_params->get('cYear').'-01-01';
}

if (isset($pager)):
    $filename = hrPager::ApplyLeaveSearch($pager);
    $cols = array('seq', 'action', 'name', 'leave', 'reason', 'from', 'to', 'days', 'half_day', 'verified', 'approved');    	
    //echo PagerJson::ShowInFlatTable($cols, $filename, 'EMPLOYEE LEAVE SEARCH');
    echo PagerJson::AkoDataTableForTicking($cols, $filename, 'EMPLOYEE LEAVE SEARCH');
endif;

?>
</div>