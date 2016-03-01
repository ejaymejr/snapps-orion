<?php

/**
 * reports actions.
 *
 * @package    snapps
 * @subpackage reports
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class reportsActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  }
  
  public function executeDailyIncomeExpense()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
            $this->_S('sdate', DateUtils::GetThisMonthStartDate());
            $this->_S('edate', DateUtils::GetThisMonthEndDate());
            $this->_S('week1', DateUtils::DuFormat('W', DateUtils::GetPrevMonthStartDate()) );
            $this->_S('week2', DateUtils::DuFormat('W', DateUtils::GetPrevMonthEndDate()) );
            $this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
            $this->_S('months2', DateUtils::GetThisMonthStartDate() );
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', Date('Y'));            
            $this->_S('year2', Date('Y'));
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->benchmark = '1'; 
        }   	
  	
  }
    
  public function executeTrendIncomeExpense()
  {
        if ( $this->getRequest()->getMethod() != sfRequest::POST) 
        {
            //$this->_S('months1', DateUtils::GetPrevMonthStartDate() ) ;
            $this->_S('months1', '2009-01-01') ;
            $this->_S('months2', DateUtils::GetThisMonthStartDate() );
            $this->_S('eGroup', 'ALL');
            $this->_S('frequency', 'daily');
            $this->_S('year1', Date('Y'));            
            $this->_S('year2', Date('Y'));
        }
        if ( $this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $this->benchmark = '1'; 
        }   	
  }  
  
  public function executeBallastSearch()
  {
//   	$c = new Criteria(); //BallastCriteria();
//   	$c->add(FinanceSummaryPeer::COMPONENT, '%BALLAST%', Criteria::LIKE);
//   	$c->addDescendingOrderByColumn(FinanceSummaryPeer::TRANS_DATE);
//   	$this->pager = FinanceSummaryPeer::GetPager($c);
	  	
  	$expenseApi = new ExpenseApi();
	$this->data = $expenseApi->getBallastTransactions();
  	 
  }
  
  public function executeBallastReport()
  {
  	$this->expenseApi = new ExpenseApi();
  	$data = $this->expenseApi->getBallastTransactions();
  	foreach($data as $r):
  		//echo $r["component"] . '<br>';
  		var_dump($r);
  		exit();
  	endforeach;
  	exit();
  }
  
  
  
}
