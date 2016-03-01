<?php

/**
 * contribution actions.
 *
 * @package    snapps
 * @subpackage contribution
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class contributionActions extends SnappsActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {

    }

    public function executeCpfGovtSearch()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(CpfGovtRulePeer::CPF_YEAR);
        $c->addDescendingOrderByColumn(CpfGovtRulePeer::DESCRIPTION);
        $this->pager = CpfGovtRulePeer::doSelect($c);
    }

    public function executeCpfGovtRuleEdit()
    {
        $id = $this->_G('id');
        $this->record = CpfGovtRulePeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit CPF Government Rule');

        $this->_S('description',    $this->record->getDescription());
        $this->_S('company_type',   $this->record->getCompanyType());
        $this->_S('from_date',      $this->record->getFromDate());
        $this->_S('to_date',        $this->record->getToDate());
        $this->_S('age_min',        $this->record->getAgeMin());
        $this->_S('age_max',        $this->record->getAgeMax());
        $this->_S('pay_min',        $this->record->getPayMin());
        $this->_S('pay_max',        $this->record->getPayMax());
        $this->_S('em_share',       $this->record->getEmShare());
        $this->_S('er_share',       $this->record->getErShare());
        $this->_S('ordinary',       $this->record->getOrdinary());
        $this->_S('special',        $this->record->getSpecial());
        $this->_S('medisave',       $this->record->getMedisave());
        $this->_S('er_formula',     $this->record->getErFormula());
        $this->_S('em_formula',     $this->record->getEmFormula());
        $this->_S('cpf_year',       $this->record->getCpfYear());
        $this->_S('cpf_batch',      $this->record->getCpfBatch());
        $this->setTemplate('cpfGovtRuleAdd');
    }
    
    public function executeCpfGovtRuleDelete()
    {
        $id = $this->_G('id');
        $this->record = CpfGovtRulePeer::retrieveByPK($id);
        $rec = $this->record->getDescription();
        $this->record->delete();
        HrLib::LogThis($this->_U(), 'Delete CPF Rule', '', $this->getModuleName().'/'.$this->getActionName() );
        //HrLib::LogThis($this->_U(), 'Delete CPF Rule', 'See CPF Booklet', $this->getActionName() .'/' . $this->getModuleName());
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('contribution/cpfGovtSearch');
    }
    
    public function executeCpfAssocSearch()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(CpfAssocTablePeer::ACCT_CODE);
        $c->addDescendingOrderByColumn(CpfAssocTablePeer::AMOUNT);
        $this->pager = CpfAssocTablePeer::doSelect($c);
    }

    public function executeCpfAssocEdit()
    {
        $id = $this->_G('id');
        $this->record = CpfAssocTablePeer::retrieveByPK($id);

        if (!$this->record) {
            $this->_ERR('Record not found.');
            $this->forward404();
        }

        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit CPF Association Entry');

        $this->_S('acct_code',   $this->record->getAcctCode());
        $this->_S('race',        $this->record->getRace());
        $this->_S('min',         $this->record->getMin());
        $this->_S('max',         $this->record->getMax());
        $this->_S('amount',      $this->record->getAmount());
        $this->setTemplate('cpfAssocAdd');
    }

    public function executeCpfAssocDelete()
    {
        $id = $this->_G('id');
        $this->record =  CpfAssocTablePeer::retrieveByPK($id);
        $rec = $this->record->getRace() .' '. $this->record->getAcctCode();
        $this->record->delete();
        HrLib::LogThis($this->_U(), 'Delete CPF Association', '', $this->getModuleName().'/'.$this->getActionName() );
        //HrLib::LogThis($this->_U(), 'Delete CPF Association', 'CDAC, MBMF, Sinda', $this->getActionName() .'/' . $this->getModuleName());
        $this->_SUF($rec.' has been deleted successfuly.');
        $this->redirect('contribution/cpfAssocSearch');
    }

    public function executeCpfGovtRuleTest()
    {
        if ($this->getRequest()->getMethod() != sfRequest::POST)
        {
            $this->_S('scapmin', 0);
            $this->_S('scapmax', 3000);
            $this->_S('year',    2011);
            $this->_S('pdate', DateUtils::GetThisMonthStartDate());
            $this->_S('cpf_year', 3);
            
        }            
        if ($this->getRequest()->getMethod() == sfRequest::POST) 
        {
            //$extra = new PayComputeExtra();  
            $extra = new ComputeCPF();          
            $cDate = $this->_G('year').DateUtils::DUFormat('-m-d', $this->_G('pdate'));
            $y = 0;
            for($x=$this->_G('scapmin'); $x <= $this->_G('scapmax'); $x += .5)
            {
                if ($y > 50)
                {
                    echo  '/**************************** <br>';
                    $y=1;
                }     
                echo ' Salary: ['.sprintf("%04.1f", $x).']  =  ';
                //echo 'Salary: ['.sprintf("%04.2f", $x).']  =  ';
                $val = $extra->getCpf($cDate, $x, $this->_G('age'), $this->_G('cpf_year'));
                //echo '  - cpf Year: '.$val['cpfyear']. '  - ';
                echo number_format($val['total'],2) .'             ||    Employee Share =>' . $val['em_share']; 
                $y = $y + .5;
                echo '<br>';
            }
        }
    }

    public function executeCpfEmployeeSearch()
    {
//        $c = new TkDtrmasterCriteria('CPF');
//        $c->add(TkDtrmasterPeer::CPF, 'YES');
//        $this->pager = TkDtrmasterPeer::GetPager($c);
        
        $c = new PayBasicPayCriteria('CPF');
        $c->add(PayBasicPayPeer::CPF, 'YES');
        $this->pager = PayBasicPayPeer::GetPager($c);
        
        
    }

    public function executeCpfEmpContribEdit()
    {
        $id = $this->_G('id');
        $this->record = PayBasicPayPeer::retrieveByPK($id);
        $this->rec = HrEmployeePeer::GetDatabyEmployeeNo($this->record->getEmployeeNo());
        $this->_S('employee_no', $this->rec->getEmployeeNo());            
        $this->_S('name', $this->rec->getName());
        $this->_S('company', HrCompanyPeer::GetNamebyId($this->rec->getHrCompanyId()) );
        $this->_S('department', HrDepartmentPeer::GetNamebyId($this->rec->getHrDepartmentId()) );
        $this->_S('type_of_employment', $this->rec->getTypeOfEmployment());
        $this->_S('race', $this->rec->getRace());
        $this->_S('date_of_birth', $this->rec->getDateOfBirth());
        $this->_S('cpf_citizenship', $this->rec->getCpfCitizenship());
        $net = $this->record->getCpfAmount();
        $this->_S('cpf_amount', ($net)? $net : PayBasicPayPeer::GetBasicPaybyEmployeeNo($this->record->getEmployeeNo())   );
        
        
        sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Employee with CPF Contribution');
        
        $this->setTemplate('cpfEmpContribAdd');
    }

    public function executeCpfEmpContribDelete()
    {
        $id = $this->_G('id');
        $this->record = TkDtrmasterPeer::retrieveByPK($id);
        $rec = $this->record->getName();
        $this->record->setCpf(null);
        //HrLib::LogThis($this->_U(), 'Delete Employee Contribution', 'Pay Basic Pay Set CPF Null', $this->getActionName() .'/' . $this->getModuleName());
        $this->record->save();
        HrLib::LogThis($this->_U(), 'Delete Employee Contribution', '', $this->getModuleName().'/'.$this->getActionName() );
        $this->_SUC($rec.' has been deleted successfuly.');
        $this->redirect('contribution/cpfEmployeeSearch');
        
    }
    
    public function executeCpfGovtEmployeeTest()
    {
    	
    }
        
}
