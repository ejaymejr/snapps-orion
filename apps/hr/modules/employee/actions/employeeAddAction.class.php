<?php

class employeeAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Employee Details');
            $this->preCount++;
        }

        
        $this->record = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
        if (!$this->record)
        {
            $this->record = new HrEmployee();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());
        }

		
		
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
			$this->_S('worktemp_no', 'STANDARD PART-TIMER SCHEDULE');
			$this->_S('type_of_employment', 'PART-TIME');
        }

    }

    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
        	$duplicate = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
        	if ($duplicate):
        		$this->_ERF('Duplicate Employee Number.  It is not allowed. <br>Try to use edit instead.');
        		$this->redirect('employee/employeeSearch' );
        		return;
        	endif;
        	
            $this->record->setEmployeeNo(strtoupper($this->_G('employee_no')) );
            $this->record->setName(strtoupper($this->_G('name')) );
            $this->record->setHrCompanyId($this->_G('company'));
            $this->record->setTeam($this->_G('team'));
            $this->record->setBirthPlace($this->_G('birth_place'));
            $this->record->setDateOfBirth($this->_G('date_of_birth')? $this->_G('date_of_birth') : null);
            $this->record->setGender($this->_G('gender'));
            $this->record->setStatus($this->_G('status'));
            $this->record->setTelNo($this->_G('home_phone'));
            $this->record->setCellNo($this->_G('hand_phone'));
            $this->record->setStreet($this->_G('street'));
            $this->record->setBldgRoomNo($this->_G('block_no'));
            $this->record->setZipCode($this->_G('zipcode'));
            $this->record->setCity($this->_G('country'));
            if (substr(strtoupper($this->_G('employee_no')) , 0, 1) == 'S'):
            	$this->record->setTaxId('1'); //NRIC
            	$this->record->setSinId(strtoupper($this->_G('employee_no')));
            	$this->record->setRankCode('SPR'); 
            endif;
            $this->record->setProfession('Production, Transport, Tradesman, Cleaners, Labourers');
            $this->record->setRankCode($this->_G('mom_group'));
            $this->record->setCommenceDate($this->_G('commence_date')); 
            $this->record->setTypeOfEmployment($this->_G('type_of_employment'));    
            if ($this->_G('employee_no') && $this->_G('name') ):
            	$this->record->save();
				HrLib::LogThis($this->_U(), 'NEW EMPLOYEE', '', $this->getModuleName().'/'.$this->getActionName(), $this->_G('name') );
				$this->_SUF('Record has been saved.');
			else:
				$this->_ERR('MUST Provide Employee Number and Name');
			endif;
			
			$dtrMaster = TkDtrmasterPeer::GetDatabyEmployeeNo($this->_G('employee_no'));
			if (!$dtrMaster):
				$dtrMaster = new TkDtrmaster();
				$dtrMaster->setEmployeeNo(strtoupper($this->record->getEmployeeNo()) );
				$dtrMaster->setName(strtoupper($this->record->getName()) );
				$dtrMaster->setCompany(HrCompanyPeer::GetNamebyId($this->record->getHrCompanyId()) );
				$dtrMaster->setHrCompanyId($this->record->getHrCompanyId() );
				$dtrMaster->setTypeOfEmployment($this->record->getTypeOfEmployment());
				$dtrMaster->setTkWorktemplateNo($this->_G('worktemp_no'));
				$dtrMaster->setDateModified(DateUtils::DUNow());
				$dtrMaster->setModifiedBy($this->_U());
				$dtrMaster->save();
			endif;
			$this->redirect('employee/generalInformation?id=' . $this->record->getId() );
        }
    }

    public function validateEmployeeAdd()
    {
        $this->preExecute();
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            return true;
        }
        
        
        $localError = 0;
        return ($localError == 0);
    }

    public function HandleErrorEmployeeAdd()
    {
        return sfView::SUCCESS;
    }

}

