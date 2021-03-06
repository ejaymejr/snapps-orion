<?php

/**
 * survey actions.
 *
 * @package    qualityRecords
 * @subpackage survey
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class surveyActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
  
  public function executeLaborMarket()
  {
	if ($this->getRequest()->getMethod() != sfRequest::POST ):
  		$this->_S('labour_survey_sdate', Date('Y-01-01'));
		$this->_S('labour_survey_edate', Date('Y-m-t'));
		$this->showSurvey = false;
	endif;
	if ($this->getRequest()->getMethod() == sfRequest::POST ):
		$this->surveyPaidStart = array();
		$this->surveyNew = array();
		$this->surveyResigned = array();
		$this->surveyPaidStart = PayEmployeeLedgerArchivePeer::SurveyPaidEmployee($this->_G('labour_survey_sdate'), $this->_G('labour_survey_edate'));
		$this->surveyNew  = HrEmployeePeer::SurveyNewEmployee($this->_G('labour_survey_sdate'), $this->_G('labour_survey_edate'));
		$this->surveyResigned  = HrEmployeePeer::SurveyResignedEmployee($this->_G('labour_survey_sdate'), $this->_G('labour_survey_edate'));
		$this->showSurvey = true;
		$this->surveyOT = PayEmployeeLedgerArchivePeer::SurveyOvertime($this->_G('labour_survey_sdate'), $this->_G('labour_survey_edate'));
//		$this->var_dump($this->surveyOT);
//		exit();
	endif;
  }
  
  public function executeAnnualWage()
  {
	if ($this->getRequest()->getMethod() != sfRequest::POST ):
  		$this->_S('labour_survey_sdate', Date('Y-01-01'));
		$this->_S('labour_survey_edate', Date('Y-m-t'));
		$this->_S('labour_survey_year',  HrFiscalYearPeer::getFiscalYear());
		$this->showSurvey = false;
	endif;
	if ($this->getRequest()->getMethod() == sfRequest::POST ):
		$this->surveyPaidStart = array();
		$this->surveyPaidStart = PayEmployeeLedgerArchivePeer::SurveyPaidEmployee($this->_G('labour_survey_sdate'), $this->_G('labour_survey_edate'));
		$periodList = PayEmployeeLedgerArchivePeer::GetPeriodListByDateRange($this->_G('labour_survey_year') - 1 .'-01-01', $this->_G('labour_survey_year').'-12-31' );
		$this->table = array();
		$senior    = PayEmployeeLedgerArchivePeer::GetListSummary($this->surveyPaidStart['senior_management_with_cpf'], $periodList);
		$junior    = PayEmployeeLedgerArchivePeer::GetListSummary($this->surveyPaidStart['junior_management_with_cpf'], $periodList);
		$ranknfile = PayEmployeeLedgerArchivePeer::GetListSummary($this->surveyPaidStart['rank_and_file_no_parttime'], $periodList);
		
		$senior_foreign    = array();
		$junior_foreign    = array();
		$ranknFile_foreign = PayEmployeeLedgerArchivePeer::GetListSummary($this->surveyPaidStart['list']['for'], $periodList );
		
		$this->table = array_merge($senior, $junior, $ranknfile);
		$this->table_foreign =  array_merge($senior_foreign, $junior_foreign, $ranknFile_foreign);
		
		$this->showSurvey = true;
		
// $this->var_dump($this->surveyPaidStart);
// exit();

	endif;
	
	$this->yearList = HrFiscalYearPeer::GetFiscalYearListYK();
  }
}
