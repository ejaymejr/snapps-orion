<?php

class cpfGovtRuleAddAction extends SnappsAction
{
    var $preCount = 0;
    var $comDays  = 30; //computed days in a month <30 days>
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Government CPF Rule');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = CpfGovtRulePeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new CpfGovtRule();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('from_date', '2007-07-01');
            $this->_S('age_min',  0);
            $this->_S('age_max',  35);
            $this->_S('pay_min',  0.00);
            $this->_S('pay_max',  0.00);
            $this->_S('em_share',   20.00);
            $this->_S('er_share',   14.5);
            $this->_S('ordinary',   66.67);
            $this->_S('special',    14.49);
            $this->_S('medisave',   18.84);
            $this->_S('cpf_batch', DateUtils::DUFormat('Yd','2007-07-01')  );
        }
        $this->_S('company_type', 'PRIVATE SECTOR');        
    }  
    
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            $frdt = $this->_G('from_date');
            $todt = $this->_G('to_date');
            $page = '';
            $this->record->setDescription(strtoupper($this->_G('description')));
            $this->record->setCompanyType($this->_G('company_type'));
            $this->record->setFromDate(($frdt)? $frdt : null);
            $this->record->setToDate(($todt)? $todt : null);
            $this->record->setAgeMin($this->_G('age_min'));
            $this->record->setAgeMax($this->_G('age_max'));
            $this->record->setPayMin($this->_G('pay_min'));
            $this->record->setPayMax($this->_G('pay_max'));
            $this->record->setEmShare($this->_G('em_share'));
            $this->record->setErShare($this->_G('er_share'));
            $this->record->setOrdinary($this->_G('ordinary'));
            $this->record->setSpecial($this->_G('special'));
            $this->record->setMedisave($this->_G('medisave'));
            $this->record->setErFormula($this->_G('er_formula'));
            $this->record->setEmFormula($this->_G('em_formula'));
            $this->record->setCpfYear($this->_G('cpf_year'));
            $this->record->setCpfBatch($this->_G('cpf_batch'));
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();
            HrLib::LogThis($this->_U(),  'New/Change CPF Contribution Rate Booklet', '', $this->getModuleName().'/'.$this->getActionName() );
            //HrLib::LogThis($this->_U(), 'New/Change CPF Contribution Rate Booklet', 'See CPF Booklet for Reference', $this->getActionName() .'/' . $this->getModuleName());
            $this->_SUF('Record <b>' . $this->record->getDescription() . '</b> saved.');
            if ($this->_G('page')) $page = '&page=' . $this->_G('page');
            //$this->redirect('contribution/cpfGovtSearch?'.$page );
            $this->redirect('contribution/cpfGovtSearch?hIDs[]=' . $this->record->getId() . $page );
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
