<?php

/**
 * data actions.
 *
 * @package    snapps
 * @subpackage data
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class dataActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {

  }
  
  public function executeHrUpdate()
  {
  	 if ($this->getRequest()->getMethod() != sfRequest::POST)
  	 {
  	 	$this->_S('sdate', DateUtils::GetThisMonthStartDate());
  	 	$this->_S('edate', Date('Y-m-d'));
  	 }
  	 
  	 if ($this->getRequest()->getMethod() == sfRequest::POST)
  	 {
  	 	FinanceSummaryPeer::DeleteData($this->_G('sdate'), $this->_G('edate'));
  	 	HrEmployeeDailyPeer::DeleteData($this->_G('sdate'), $this->_G('edate'));
  	 	HrEmployeeDailyPeer::UpdateDaily($this->_G('sdate'), $this->_G('edate'), $this->_U());
  	 	HrEmployeeDailyPeer::UpdateCpf(DateUtils::DUFormat('Y-m-01', $this->_G('sdate') ), DateUtils::DUFormat('Y-m-', $this->_G('edate') ) . DateUtils::DUFormat('t', $this->_G('edate') ), $this->_U());
  	 	$company = array ("Micronclean"=>"Micronclean", "Acro Solution"=>"Acro Solution", 
                      "NanoClean"=>"NanoClean", "T.C. Khoo"=>"T.C. Khoo" );
  	 	foreach($company as $kcomp=>$co)
  	 	{
  	 		HrEmployeeDailyPeer::PostDailyData($this->_G('sdate'), $this->_G('edate'), $this->_U(), $co);
  	 	}
  	 	
  	 	PowerUsagePeer::PostDailyData($this->_G('sdate'), $this->_G('edate'), $this->_U());
        $this->_SUC('Posting Successful!');  	 	
  	 }
  }
}
