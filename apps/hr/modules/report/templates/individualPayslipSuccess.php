<?php use_helper('Form', 'Javascript'); ?>
<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for('report/savePayslipSignature'). '?id=' . $sf_params->get('id');?>" method="post">

	<?php

$pos = 0;
$oldno = null;
$gtot  = 0;
//working
//foreach($empNoList as $ke=>$empNo):
	switch($mess)
	{
		case 'BANK':
			$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBank($pcode, $empNo);
			break;
		case 'CASH':
			$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCash($pcode, $empNo);
			break;
		case 'CHEQUE':
			$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCheque($pcode, $empNo);
			break;
		default:
			$data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCashandBank($pcode, $empNo);
			break;
	}
	if (! $data)
	{
		return sfView::SUCCESS;
	}
	$empInfo = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
	$summ    = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $sdt, $edt );
	$bp      = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);
	$dtr     = TkDtrsummaryPeer::GetActualDatabyEmployeeNoDateRange($empNo, $sdt, $edt);
	$ot1    = 0;
	$ot2    = 0;
	$ot3    = 0;
	$ot1amt = 0;
	$ot2amt = 0;
	$ot3amt = 0;
	$ot1rat = 0;
	$ot2rat = 0;
	$ot3rat = 0;

	$cpf    = 0;
	$cdac   = 0;
	$sinda  = 0;
	$cbs    = 0;
	$dinner = 0;
	$mall   = 0;
	$basic  = 0;
	$levy   = 0;
	$tardy  = 0;
	$loan   = 0;
	$ap     = 0;
	$ot     = array();
	$otCode = 0;


	$tot  = 0;
	$etot = 0;
	$inc  = 0;
	$ded  = 0;
	$iother = 0;
	$dother = 0;

	$tothours = 0;
	$mcLeave  = 0;
	$pdLeave  = 0;
	$updLeave = 0;
	$subtot   = 0;

	foreach ($data as $rec)
	{
		switch($rec->getAcctCode())
		{
			case 'CPF':
				$cpf = $cpf + $rec->getAmount();
				break;
			case 'CDAC':
				$cdac = $cdac + $rec->getAmount();
				break;
			case 'SINDA':
				$sinda = $sinda + $rec->getAmount();
				break;
			case 'CBS':
				$cbs = $cbs + $rec->getAmount();
				break;
			case 'MR':
				$dinner = $dinner + $rec->getAmount();
				break;
			case 'MEAL':
				$dinner = $dinner + $rec->getAmount();
				break;
			case 'ML':
				$mall = $mall + $rec->getAmount();
				break;
			case 'BP':
				$basic = $basic + $rec->getAmount();
				break;
			case 'PI':
				$basic = $basic + $rec->getAmount();
				break;
			case 'LV':
				$levy = $levy + $rec->getAmount();
				break;
			case 'UL':
				$tardy = $tardy + $rec->getAmount();
				break;
			case 'TD':
				$tardy = $tardy + $rec->getAmount();
				break;
			case 'LN':
				$loan = $loan + $rec->getAmount();
				break;
			case 'AP':
				$ap = $ap + $rec->getAmount();
				break;
		}
		if ( $rec->getIncomeExpense() == '1' )
		{
			//$pdf->printLn(    $x+135, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
			$inc = $inc + $rec->getAmount();
		}else{
			//$pdf->printLn(    $x+165, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
			$ded = $ded + $rec->getAmount();
		}
		$tot = $tot + $rec->getAmount();

		if ($rec->getAcctCode() == 'OT')
		{
			$etot = 1;
			$bpos   = 0;
			$bpos   =  strpos($rec->getDescription(), '(');
			$otCode = substr($rec->getDescription(), $bpos+1, 17);
		}
	}

	//----------------------------- show overtime
	if ($etot == '1')
	{
		$hrLib = new HrLib();
		$ot     = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $hrLib->GetStartDate($otCode), $hrLib->GetEndDate($otCode) );
		$ot1 = $ot['ot1'];
		$ot2 = $ot['ot2'];
		$ot3 = $ot['ot3'];
		$ot1amt = $ot['ot1amt'];
		$ot2amt = $ot['ot2amt'];
		$ot3amt = $ot['ot3amt'];
		$ot1rat = $ot['ot1rat'];
		$ot2rat = $ot['ot2rat'];
		$ot3rat = $ot['ot3rat'];
	}

	$tothours = $summ['tothours'];

	$mcLeave  = $summ['mcleave'];
	$pdLeave  = $summ['paidleave'];
	$updLeave = $summ['unpaidleave'];

	//     $mcLeave  = HrEmployeeLeavePeer::GetCountLeaves($empNo, '1', sfConfig::get('fiscal_year'));
	//     $pdLeave  = HrEmployeeLeavePeer::GetCountPaidLeaves($empNo, sfConfig::get('fiscal_year'));
	//     $updLeave = HrEmployeeLeavePeer::GetCountLeaves($empNo, '6', sfConfig::get('fiscal_year'));

	$levy     = $summ['levy'];
	$isubtot  = $basic + $ot1amt + $ot2amt + $ot3amt + $dinner + $mall + $cbs;
	$dsubtot  = $tardy + $cpf + $sinda + $cdac + $levy + $loan + $ap;
	$iother   = $inc - $isubtot;
	$dother   = $ded - $dsubtot;


	$x = 12;
	$y = 1;
	$xpos = 1;
	setlocale(LC_MONETARY, 'en_US');
	?>
<?php //$showButton = HTMLForm::DrawButton('pushbutton1', 'button1', 'Print Payslip',    url_for('reports/printIndividualPayslip?employee_no='. $empNo . '&period_code=' . $pcode . '&bank_cash=' . $mess)); ?>
<?php 
$needSignature = true;
$signature = HrEmployeePaySignaturePeer::GetDataByEmployeeNoPeriod($empInfo->getEmployeeNo(), $pcode);
if ($signature):
	if ($signature->getCashSigned()):
		$needSignature = false;
	endif;
endif;
?>
<div class="contentBox">
<nav class="breadcrumbs">
	<ul>
	<li><a href="#" ><i class="icon-home"></i></a></li>
	<li><?php echo link_to('Go Back to Search', 'report/signPayslip') ?></li>
	</ul>
</nav>
<div class="panel"  data-role="panel">
	<div class="panel-header bg-lightBlue fg-white">
	SIGNATURE
	</div>
	<div class="panel-content">
		<table class="table bordered">
			<tr>
				<td class="span5">
					<?php if ($needSignature): ?>
						<div id="signature"><?php echo input_tag('signature_data', $sf_params->get('signature_data'),'type=hidden');?></div>
						<div id="tools"></div>
					<?php else:?>
						<img src="<?php echo $signature->getCashSigned() ?>" class="span6" />
						<small class="text-success"><?php echo $signature->getDateCashSigned() ?></small>
					<?php endif; ?>
				</td>
				<td rowspan="3" class="alignCenter">
					<?php echo image_tag('employee/'.$empInfo->getPhoto(),'class="span3"')  ; ?></td>
			</tr>
			<tr>
				<td class="alignCenter"><h2>
					<?php 
						if ($empInfo):
							echo input_tag('employee_no', $empInfo->getEmployeeNo(), 'type=hidden');
							echo input_tag('name', $empInfo->getName(), 'type=hidden');
							echo input_tag('period_code', $pcode, 'type=hidden');
							echo $empInfo->getName();
						else:
							echo 'Signature';
						endif;
						?>
						</h2>
						<?php if ($needSignature): ?>
						<input type="button" id="save" name="save" class="success" value="SAVE SIGNATURE" />
						<input type="button" id="reset" name="reset" class="default" value="CLEAR SIGNATURE" />
						<?php endif;?>
					</td>
			</tr>
			<tr><td align="center"><h2 class="text-warning">TOTAL: <?php echo money_format('%= #5.2n', $tot) ?></h2></td></tr>
		</table>
	  	
		</div>
	</div>
	<br />
<div class="panel"  data-role="panel">
	<div class="panel-header bg-lightBlue fg-white">
	<?php echo 'PAYSLIP for ' .DateUtils::DUFormat('F j - ', $sdt).DateUtils::DUFormat('j,', $edt).DateUtils::DUFormat(' Y', $sdt).' ('.$mess.')' ?>
	</div>
	<div class="panel-content">

	<table width='100%' class='table bordered' border='0'>
		<tr>
			<td width='25%' class=''><?php echo "NRIC No: ".$empNo ?></td>
			<td colspan='4' class=''><?php echo "NAME: ".$empInfo->getName() ?></td>
			<td width='25%' class=''><?php echo "COMPANY: T.C. KHOO (". HrCompanyPeer::GetNamebyId($empInfo->getHrCompanyId()) .")" ?>
			</td>
		</tr>
	</table>

	<table width='80%' class='table bordered' border='0' cellpadding='4'
		cellspacing='0'>
		<tr>
			<td width='16%' class=''>&nbsp;</td>
			<td width='16%' class=''>BASIC</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$basic) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>HOURLY</td>
			<td width='16%' class='' align='right'><?php echo  0  ?></td>
			<td width='16%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>NORMAL HOURS</td>
			<td width='16%' class='' align='right'><?php echo $tothours ?></td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>ABSENCES/TARDY</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$tardy) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>OT <1.5> <?php echo $ot1 ?> HRS</td>
			<td width='16%' class='' align='right'><?php echo '$'.$ot1rat .' = '. money_format('%-#5n',$ot1amt) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>CPF</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$cpf) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>OT <2.0> <?php echo $ot2 ?> HRS</td>
			<td width='16%' class='' align='right'><?php echo '$'.$ot2rat .' = '. money_format('%-#5n',$ot2amt) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>SINDA</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$sinda) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>OT <2.5> <?php echo $ot3 ?> HRS</td>
			<td width='16%' class='' align='right'><?php echo '$'.$ot3rat .' = '. money_format('%-#5n',$ot3amt) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>CDAC</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$cdac) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>ALLOWANCES</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n', $mall) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>UNPAID LEVY</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n', $levy) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>BANK</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$cbs) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>LOAN</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$loan) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>DINNER</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$dinner) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>ADVANCE PAY</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$ap) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class='' align='right'>SUB-TOTAL</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$isubtot) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class='' align='right'>SUB-TOTAL</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$dsubtot) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>PAID-LEAVE</td>
			<td width='16%' class='' align='right'><?php echo $pdLeave. ' Day(s)     ' ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>UNPAID LEAVES</td>
			<td width='16%' class='' align='right'><?php echo $updLeave . ' Day(s)     ' ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>PAID-MC(S)</td>
			<td width='16%' class='' align='right'><?php echo $mcLeave. ' Day(s)     '  ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>UNPD ALLOWANCE</td>
			<td width='16%' class='' align='right'>0.00</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class=''>OTHERS</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$iother) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class=''>OTHERS</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$dother) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class=''>&nbsp;</td>
			<td width='16%' class='' align='right'>TOTAL</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$inc) ?>
			</td>
			<td width='4%' class=''>&nbsp;</td>
			<td width='16%' class='' align='right'>TOTAL</td>
			<td width='16%' class='' align='right'><?php echo money_format('%-#5n',$ded) ?>
			</td>
			<td width='18%' class=''>&nbsp;</td>
		</tr>

		<tr>
			<td width='18%' class='' colspan='6' align='right'>TOTAL</td>
			<td width='16%' class='' align='right'><?php echo money_format('%= #5.2n', $tot) ?>
			</td>
		</tr>
	</table>
	</div>
	</div>
	<br />
	
	<div class="panel"  data-role="panel">
	<div class="panel-header bg-lightBlue fg-white">
	CALENDAR
	</div>
	<div class="panel-content">
	<?php
 		$cal = new TkCalendar(sfConfig::get('fiscal_year'));
 		echo ($cal->DtrSummaryCalendar($sdt, $empNo, $dtr));
     ?>
	</div>

	</div>
	
</div>

 
 <script>
/*  @preserve
jQuery pub/sub plugin by Peter Higgins (dante@dojotoolkit.org)
Loosely based on Dojo publish/subscribe API, limited in scope. Rewritten blindly.
Original is (c) Dojo Foundation 2004-2010. Released under either AFL or new BSD, see:
http://dojofoundation.org/license for more information.
*/
(function($) {
	var topics = {};
	$.publish = function(topic, args) {
	    if (topics[topic]) {
	        var currentTopic = topics[topic],
	        args = args || {};
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            currentTopic[i].call($, args);
	        }
	    }
	};
	$.subscribe = function(topic, callback) {
	    if (!topics[topic]) {
	        topics[topic] = [];
	    }
	    topics[topic].push(callback);
	    return {
	        "topic": topic,
	        "callback": callback
	    };
	};
	$.unsubscribe = function(handle) {
	    var topic = handle.topic;
	    if (topics[topic]) {
	        var currentTopic = topics[topic];
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            if (currentTopic[i] === handle.callback) {
	                currentTopic.splice(i, 1);
	            }
	        }
	    }
	};
})(jQuery);

$(document).ready(function() {
	
	// This is the part where jSignature is initialized.
	//var $sigdiv = $("#signature").jSignature({'UndoButton':true, height: '200', width: '300'})
	var $sigdiv = $("#signature").jSignature({'UndoButton':false, height: '150', width: '600'})
	
	// All the code below is just code driving the demo. 
	, $tools = $('#tools')
	, $extraarea = $('#displayarea')
	, pubsubprefix = 'jSignature.demo.'
    
	$('#reset').on('click', function(){
		$sigdiv.jSignature('reset');
     });
	
	$('#save').on('click', function(){
		var data = $sigdiv.jSignature('getData', 'svgbase64')
		$.publish(pubsubprefix + 'formatchanged')
		if($.isArray(data) && data.length === 2){
			$('textarea', $tools).val(data.join(','));
			$('#signature_data').val(data.join(','));
			$.publish(pubsubprefix + data[0], data);
		}
		document.FORMadd.submit();
	});
	
	if (Modernizr.touch){
		$('#scrollgrabber').height($('#content').height())		
	}
	
})
</script>
</form>