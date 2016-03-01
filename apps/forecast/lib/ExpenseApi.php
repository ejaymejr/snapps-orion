<?php
// $Source$
// $Id$


/*
    public function executeBallastReport()
    {
        $this->expenseApi = new ExpenseApi();
        $data = $this->expenseApi->getBallastTransactions();             
    }
*/
	
	
class ExpenseApi
{
    var $apiKey;
    var $apiUrl;
    
    var $p;
    
    function __construct()
    {
        $this->apiKey = sfConfig::get('expense_api_key', 'Yx8a7pqmfN4D8o4IrdLfm3z2i11q4qS9');
        //$this->apiUrl = sfConfig::get('expense_api_url', 'http://app.micronclean/sym/finance/api/');
        $this->apiUrl = sfConfig::get('expense_api_url', 'http://app.micronclean/sym/finance/api/');
        
        $this->p = new phpWebHacks();
        $this->p->_debugdir = SF_ROOT_DIR . '/log/phphttp';  
        $this->p->setDebug(true);
        $this->p->setProxy('10.10.1.253', 3128);
    }
    
	function getTransactions($cats = false, $company = false, $startDate = false, $endDate = false)
	{
        $form = array('k' => $this->apiKey);
		if ($cats !== false) {
			$form['cats'] = $cats;
		}
		if ($company !== false) {
			$form['company'] = $company;
		}
		if ($startDate !== false) {
			$form['startDate'] = $startDate;
		}
		if ($endDate !== false) {
			$form['endDate'] = $endDate;
		}
        
        $url = $this->apiUrl  . 'exportTransactions';
        $tmp = $this->p->post($url, $form);        
        $response = json_decode($tmp, true);
        return $response['data'];
	
	}
    function getBallastTransactions()
    {
		return $this->getTransactions('BALLAST WATER TREATMENT LAB||LAB EXPENSES - FERRATE||TRAVELLING EXPENSES - FERRATE');
    }    
}
