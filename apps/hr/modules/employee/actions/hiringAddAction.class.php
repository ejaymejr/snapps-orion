<?php

/**
 * maintenance actions.
 *
 * @package    snapps
 * @subpackage maintenance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class hiringAddAction extends SnappsAction
{
	var $preCount = 0;

	public function preExecute()
	{
		if (!$this->preCount)
		{
			sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Hiring Policy');
			$this->preCount++;
		}

		if ($this->getRequest()->getMethod() != sfRequest::POST )
		{
			
		}
	}

	public function execute()
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST  )
		{
			$id = $this->_G('id');
			if ($this->_G('print_singapore')):
				$hireData = HrHiringPeer::retrieveByPK($id);
				if (!$hireData):
					$record = new HrHiring();
					$record->setDateCreated(DateUtils::DUNow());
					$record->setCreatedBy($this->U());
				endif;
				$record->setName($this->_G('name'));
				$record->setContact($this->_G('contact'));
				$record->setNricFin($this->_G('nric_fin'));
				$record->setDateOfEmployment($this->_G('date_of_employment'));
				$record->setPlaceOfWork($this->_G('place_of_work'));
				$record->setJobTitle($this->_G('job_title'));
				$record->setSalary($this->_G('salary'));
				$record->setWorkingDay($this->_G('working_day'));
				$record->setOtherCondition($this->_G('other_condition'));
				$record->setDateModified(DateUtils::DUNow());
				$record->setModifiedBy($this->U());
				$record->save();
			endif;
			
		}


	}
	
	public function PDFEmploymentContract()
	{
		
	}

	public function validateHiringAdd()
	{
		$this->preExecute();
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			return true;
		}
		$localError = 0;
		return ($localError == 0);
	}

	public function handleErrorHiringAdd()
	{
		return sfView::SUCCESS;
	}


}
