<?php

class cpfEmpContribAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Employee with CPF Contribution');
            $this->preCount++;
        }

        //        $id= $this->_G('id');

        //-------------------------- add mode
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
            $this->record = PayBasicPayPeer::GetDatabyEmployeeNo($this->_G('employee_no'));
            if (! $this->record)
            {
                $this->record = new PayBasicPay();
                $this->record->setDateCreated(DateUtils::DUNow());
                $this->record->setCreatedBy($this->_U());
            }

            $net = $this->record->getCpfAmount();
            $this->_S('cpf_amount', $net);
            $this->rec = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
            if ($this->rec)
            {
                $this->_S('name', $this->rec->getName());
                $this->_S('company', HrCompanyPeer::GetNamebyId($this->rec->getHrCompanyId()) );
                $this->_S('department', HrDepartmentPeer::GetNamebyId($this->rec->getHrDepartmentId()) );
                $this->_S('type_of_employment', $this->rec->getTypeOfEmployment());
            }

        }


    }

    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
            if ($this->_G('employee'))
            {
                $this->_S('race', $this->rec->getRace());
                $this->_S('date_of_birth', $this->rec->getDateOfBirth());
                $this->_S('cpf_citizenship', $this->rec->getCpfCitizenship());
            }

            if ($this->_G('save'))
            {
                $this->rec->setRace($this->_G('race'));
                $this->rec->setDateOfBirth($this->_G('date_of_birth'));
                $this->rec->setCpfCitizenship($this->_G('cpf_citizenship'));
                $this->rec->save();

                $this->record->setEmployeeNo($this->_G('employee_no'));
                $this->record->setName($this->_G('name'));
                $this->record->setCompany($this->_G('company'));
                $this->record->setDepartment($this->_G('department'));
                $this->record->setTypeOfEmployment($this->_G('type_of_employment'));
                $this->record->setCpf('YES');
                $this->record->setCpfAmount($this->_G('cpf_amount'));
                $this->record->setModifiedBy($this->_U());
                $this->record->setDateModified(DateUtils::DUNow());
                $this->record->save();
                HrLib::LogThis($this->_U(), 'New/Change CPF Information', '', $this->getModuleName().'/'.$this->getActionName() );
                //HrLib::LogThis($this->_U(), 'New/Change CPF Information', 'Hr Employee, Pay Basic Pay', $this->getActionName() .'/' . $this->getModuleName());
                $this->_SUF('Record <b>' . $this->record->getName() . '</b> saved.');
                $this->redirect('contribution/cpfEmployeeSearch?hIDs[]=' . $this->record->getId());
            }
        }
    }

    public function validateBasicPayAdd()
    {
        $this->preExecute();
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            return true;
        }
        $localError = 0;
        return ($localError == 0);
    }

    public function handleErrorBasicPayAdd()
    {
        return sfView::SUCCESS;
    }

}