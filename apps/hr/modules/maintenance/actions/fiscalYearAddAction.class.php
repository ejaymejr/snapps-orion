<?php

/**
 * maintenance actions.
 *
 * @package    snapps
 * @subpackage maintenance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class fiscalYearAddAction extends SnappsAction
{
    var $preCount = 0;
    
    public function preExecute()
    {
        if (!$this->preCount) 
        {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Define New Fiscal Year');
            $this->preCount++;
        }
        
        $id= $this->_G('id');
        $this->record = HrFiscalYearPeer::retrieveByPK($id);
        if (!$this->record)
        {
            $this->record = new HrFiscalYear();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());            
        }
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('start_date',  Date('Y-m-d'));
            $this->_S('end_date',  Date('Y-m-d'));
        }

    }  
        
    public function execute()
    {
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
        	HrFiscalYearPeer::SetAllInactive();
            $this->record->setFiscalYear($this->_G('fiscal_year') );
            $this->record->setPreviousYear($this->_G('previous_year') );
            $this->record->setStartDate($this->_G('start_date') );
            $this->record->setEndDate($this->_G('end_date') );
            $this->record->setRemarks($this->_G('remarks') );
            $this->record->setIsCurrent($this->_G('is_current') );            
            $this->record->setDateModified(DateUtils::DUNow());
            $this->record->setModifiedBy($this->_U());  
            $this->record->save();      
            HrLib::LogThis($this->_U(),  'Update Fiscal Year', '', $this->getModuleName().'/'.$this->getActionName() );    
            $this->_SUF('Record <b>' . $this->record->getFiscalYear() . '</b> saved.');
            $this->redirect('maintenance/fiscalSearch?hIDs[]=' . $this->record->getId());
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
