<?php

/**
 * sms actions.
 *
 * @package    snapps
 * @subpackage sms
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class smsActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeInboxSearch()
  {
// 	$c = new HrEmployeeLeaveCreditsCriteria();
//	$this->pager = HrEmployeeLeaveCreditsPeer::GetPager($c, 15);
	$c = new Criteria();
	$c->addDescendingOrderByColumn(SmsMessageinPeer::RECEIVEDTIME);  
	$c->setLimit(200);	
	$this->pager = SmsMessageinPeer::doSelect($c);
	SmsMessageInPeer::ProcessRequest();
//	DateUtils::AddDate()
  }

  public function executeSendMessage()
  {
  	
  	  if ($this->getRequest()->getMethod() == sfRequest::POST) :
//  	  	$sms = new SmsMessageout();
//  	  	$sms->setReceiver($this->_G('contact_no'));
//  	  	$sms->setMsg($this->_G('message'));
//  	  	$sms->setStatus('send');
//  	  	$sms->save();	
			SmsMessageoutPeer::SendMessage($this->_G('message'), $this->_G('contact_no'));
  	  		$this->_SUC('Message: '. $this->_G('message') .' Has been Sent to ' . $this->_G('contact_no'));
  	  		$this->_S('message', '');
  	  endif;
  }

  public function executeSmsChina()
  {
  	
  	  if ($this->getRequest()->getMethod() == sfRequest::POST) :
			SmsMessageInPeer::ProcessRequest();
  	  endif;
  }
  
  public function executeAjaxGetContactNo()
  {
  	  $empNo = $this->_G('employee_no');
  	  $this->cellNo = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('cell_no'));
  }  
  
  public function executeSpecialPayroll()
  {
  	$pcode = '20110101-20110131-ALL-SPECIAL';
  	$empList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($pcode);
  	$total = 0;
  	foreach($empList as $empNo=>$name){
  		$pay = PayEmployeeLedgerArchivePeer::GetTakeHomePay($empNo, $pcode) * -1;
  		$acct = 'AP';
  		$cdate = date('Y-m-d');
  		PayScheduledDeductionPeer::AddDeductionEntry($empNo, $acct, $pay, $cdate, $name);
  		$total = $total + $pay;
  	}
  	echo $total;
  	exit();
  	return sfView::NONE;
  }
  
	public function executeSmsPayslip()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST) :
			$this->_S('cell_no', '');
			$this->_S('bank_cash', 'BANK');
			$this->_S('deposit_date', Date('Y-m-d'));
			$this->_S('deposit_date_group', Date('Y-m-d'));
		endif; 
		if ($this->getRequest()->getMethod() == sfRequest::POST && $this->_G('personal')) : 
			$pcode = $this->_G('period_code');
			$emp   = $this->_G('employee_no');
			$bankCash = $this->_G('bank_cash'); 
			$depositDate = $this->_G('deposit_date');
			$empList = array();
			if ($emp) {
				$empList = array($emp=>HrEmployeePeer::GetNamebyEmployeeNo($emp));
			}else{
				$empList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($pcode);
			}
			$recepient = array();
			$message   = array();
			$mess = '';
			$content = '';
			$mobile = '';
			foreach($empList as $empNo => $empName){
				$empDet = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('cell_no'));
				$recepient[] = $empDet->get('CELL_NO');
				if ($empDet->get('CELL_NO')) {
					$content = PayEmployeeLedgerArchivePeer::GetSmsMessage($pcode, $empNo, $bankCash, $depositDate);
					$mess = $mess.$empDet->get('CELL_NO').','. $content ."\n";
					$mobile = $this->_G('individual_cell_no') ?  $this->_G('individual_cell_no') : $empDet->get('CELL_NO');
					if ($content):
						SmsMessageoutPeer::SendMessage($content, $mobile, $empNo, $pcode, $bankCash );
					endif;
					$this->_SUC('Message: ' .$content. '<br>has been sent to' . $mobile );
				}else{
					$this->_ERR('Employee Mobile is not Registered.<br>Cannot Send Payslip!');
				}
			}
		endif;
		if ($this->getRequest()->getMethod() == sfRequest::POST && $this->_G('group')) :		
			$pcode = $this->_G('period_code_group');
			$bankCash = $this->_G('bank_cash_group');
			$depositDate = $this->_G('deposit_date_group');
			$c = new Criteria();
			$c->add(PayEmployeeLedgerArchivePeer::PERIOD_CODE, $pcode);
			$c->addGroupByColumn(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO);
			if ($this->_G('company')) $c->add(PayEmployeeLedgerArchivePeer::COMPANY, $this->_G('company'));
			$c->add(PayEmployeeLedgerArchivePeer::BANK_CASH, $bankCash);
			$c->addAscendingOrderByColumn(PayEmployeeLedgerArchivePeer::NAME);
			$this->pager = PayEmployeeLedgerArchivePeer::doSelect($c);
		endif;
		
		if ($this->getRequest()->getMethod() == sfRequest::POST && $this->_G('sendAll')) :
			$hdr = '';
			$val = '';
			$pcode = $this->_G('period_code_group');
			$bankCash = $this->_G('bank_cash_group');
			$depositDate = $this->_G('deposit_date_group');
			foreach($_POST as $values=>$watever):
				$hdr = substr($values, 0, 18);
				$val = substr($values, 18);
				$mess = '';
				if  ($hdr == "gridCheckBox_item_"):
					$empNo = $val;
					//$empNo = '024747352270509';
					$empDet = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('cell_no'));
					//---------------------- start sms data	
					$content = PayEmployeeLedgerArchivePeer::GetSmsMessage($pcode, $empNo, $bankCash, $depositDate);
					if ($empDet):
						$mess = $mess.$empDet->get('CELL_NO').','. $content ."\n";
						$mobile = $empDet->get('CELL_NO');
						if ($this->_G('cell_no_group')):
							$mobile = $this->_G('cell_no_group');
						endif;
						//echo $pcode . ' - ' . $bankCash . '' ;
						//exit(); 
						if ($content):
							SmsMessageoutPeer::SendMessage($content, $mobile, $empNo, $pcode, $bankCash );
						endif;
					endif;
				endif;	
			endforeach;
			
			$pcode = $pcode? $pcode : $this->_G('period_code');
			$bankCash = $bankCash? $bankCash : $this->_G('bank_cash');
//			var_dump($bankCash);
//			echo 'here';
//			exit();
 			$c = new Criteria();
			$c->add(PayEmployeeLedgerArchivePeer::PERIOD_CODE, $pcode);
			$c->addGroupByColumn(PayEmployeeLedgerArchivePeer::EMPLOYEE_NO);
			if ($this->_G('company')) $c->add(PayEmployeeLedgerArchivePeer::COMPANY, $this->_G('company'));
			$c->add(PayEmployeeLedgerArchivePeer::BANK_CASH, $bankCash);
			$c->addAscendingOrderByColumn(PayEmployeeLedgerArchivePeer::NAME);
			$this->pager = PayEmployeeLedgerArchivePeer::GetPager($c, 200);

		endif;
				
	}  
	
 
	
	
	public function executeServerStatus()
	{

	
	}
	
    

    
    



	
//	public function executeSmsPayslip()
//	{
//		if ($this->getRequest()->getMethod() == sfRequest::POST) : 
//			$pcode = $this->_G('period_code');
//			$emp   = $this->_G('employee_no');
//			$empList = array();
//			if ($emp) {
//				$empList = array($emp=>HrEmployeePeer::GetNamebyEmployeeNo($emp));
//			}else{
//				$empList = PayEmployeeLedgerArchivePeer::GetEmployeeNoListByPeriod($pcode);
//			}
//			$recepient = array();
//			$message   = array();
//			$mess = '';
//			$content = '';
//			//$empList = array('S1274480C'=>'aw guat choo');
//			foreach($empList as $empNo => $empName){
//				$empDet = HrEmployeePeer::GetOptimizedDatabyEmployeeNo($empNo, array('cell_no'));
//				$recepient[] = $empDet->get('CELL_NO');
//				//$message[] = 'hi';
//				if ($empDet->get('CELL_NO')) {
//					$content = PayEmployeeLedgerArchivePeer::GetSmsMessage($pcode, $empNo);
//					$mess = $mess.$empDet->get('CELL_NO').','. $content ."\n";
//				}
//				//$sms = SmsMessageOutPeer::GetDataByReceiverPeriod($empNo, $period);
//				 
//			}
//			
//			
////			$exportFilename = 'smsFile.txt';
////	        $this->getResponse()->clearHttpHeaders();
////	        $this->getResponse()->addCacheControlHttpHeader("Cache-control","private");
////	        $this->getResponse()->setHttpHeader("Content-Description","File Transfer");
////	        $this->getResponse()->setContentType('application/octet-stream',TRUE);
////	        $this->getResponse()->setHttpHeader("Content-Length",(string) strlen($mess), TRUE);
////	        $this->getResponse()->setHttpHeader('content-transfer-encoding', 'binary', TRUE);
////	        $this->getResponse()->setHttpHeader("Content-Disposition","attachment; filename=\"".$exportFilename."\"", TRUE);
////	        $this->getResponse()->sendHttpHeaders();
////	        echo $mess;
////	        exit();
////	        return sfView::NONE;
//			
//
//		endif;
//	}  	
}
