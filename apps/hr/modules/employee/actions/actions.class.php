<?php

/**
 * employee actions.
 *
 * @package    qualityRecords
 * @subpackage employee
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class employeeActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  }
  
  public function executeEmployeeSearch()
  {
  	if ($this->getRequest()->getMethod() != sfRequest::POST):
  		$this->_S('status', 'A');
  	endif;
  	$c = new Criteria();
  	$c->addJoin(HrEmployeePeer::HR_COMPANY_ID, HrCompanyPeer::ID);
  	if ($this->_G('status') == 'A'):
  		$c->add(HrEmployeePeer::DATE_RESIGNED, null, Criteria::ISNULL);
  	endif;
  	$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
  	$users = HrLib::GetHrAdmin(); //array('huiping', 'hr_user');
  	if (! in_array(HrLib::GetUser(), $users) ):
  		$c->add(HrEmployeePeer::CREATED_BY, HrLib::GetUser(), Criteria::IN);
  	endif;
  	$this->pager = 	HrEmployeePeer::doSelect($c);
  }
  
  public function executeGeneralInformation()
  {
    $id = $this->_G('id');
    $this->employeeData = HrEmployeePeer::retrieveByPK($id);
    $this->_S('employee_no', $this->employeeData->getEmployeeNo() );
    if ($this->getRequest()->getMethod() != sfRequest::POST):
    	
    endif;
    if (! $this->_G('active')  ):
    	 $this->_S('active', 'personal');
   	endif;
   	if (! $this->_G('year')  ):
    	 $this->_S('year', HrFiscalYearPeer::getFiscalYear());
   	endif;
   	
    /*initialize personal tab */
    $empData = HrEmployeePeer::GetDatabyEmployeeNo($this->employeeData->getEmployeeNo() );
    if ($empData):
    	$this->_S('name', $empData->getName() );
    	$this->_S('company', HrCompanyPeer::GetNamebyId($empData->getHrCompanyId() ) );
    	$this->_S('team', $empData->getTeam() );
    	$this->_S('birth_place', $empData->getBirthPlace() );
    	$this->_S('date_of_birth', ($empData->getDateOfBirth())? $empData->getDateOfBirth() : date('Y-m-d'));
    	$this->_S('gender', $empData->getGender() );
    	$this->_S('status', $empData->getStatus() );
    	$this->_S('home_phone', $empData->getTelNo() );
    	$this->_S('hand_phone', $empData->getCellNo() );
    	$this->_S('block_no', $empData->getBldgRoomNo() );
    	$this->_S('street', $empData->getStreet() );
    	$this->_S('zipcode', $empData->getZipcode() );
    	$this->_S('country', $empData->getCity() );
    	$this->_S('tax_id', $empData->getTaxId() );
    	$this->_S('sin_id', $empData->getSinId() );
    	$this->_S('rank_code', $empData->getRankCode() );
    	$this->_S('profession', $empData->getProfession() );
    	$this->_S('mom_group', $empData->getMomGroup() );
    	$this->_S('commence_date', $empData->getCommenceDate() );
    
        
	    /*initialize education tab */
	    $empEdu = HrEmployeeEducationPeer::GetDataByEmployeeNo($this->employeeData->getEmployeeNo() );
	    if ($empEdu):
	    	$this->_S('primary_ed', $empEdu->getPrimaryEd() );
	    	$this->_S('primary_grade', $empEdu->getPrimaryGrade() );
	    	$this->_S('secondary', $empEdu->getSecondary() );
	    	$this->_S('secondary_grade', $empEdu->getSecondaryGrade() );
	    	$this->_S('tertiary', $empEdu->getTertiary() );
	    	$this->_S('tertiary_grade', $empEdu->getTertiaryGrade() );
	    	$this->_S('jr_college', $empEdu->getJrCollege() );
	    	$this->_S('jr_college_grade', $empEdu->getJrCollegeGrade() );
	    	$this->_S('post_graduate', $empEdu->getPostGraduate() );
	    	$this->_S('post_graduate_grade', $empEdu->getPostGraduateGrade() );
	    endif;
	    
	    /* Work Info */
	    $dtrMaster = TkDtrmasterPeer::GetDataByEmployeeNo($this->employeeData->getEmployeeNo() );
	    $this->workTemp = array();
	    if ($dtrMaster):
	    	$this->workTemp = TkWorktemplatePeer::GetDatabyWorktemplateNo($dtrMaster->getTkWorktemplateNo());
	    	$this->_S('worktemp_no', $this->workTemp->getWorktempNo() );
	    	$this->_S('am_time_in', $dtrMaster->getAmTimeIn());
	    endif;
	    
	    /* Leave Info */
		$lc = new Criteria();
		$lc->add(HrEmployeeLeaveCreditsPeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$lc->add(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, $this->_G('year'));
		$lc->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE);
		$this->lcpager = HrEmployeeLeaveCreditsPeer::doSelect($lc);
		
		$lh = new Criteria();
		$lh->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$lh->add(HrEmployeeLeavePeer::FISCAL_YEAR, $this->_G('year'));
		$lh->addAscendingOrderByColumn(HrEmployeeLeavePeer::LEAVE_TYPE);
		$this->lhpager = HrEmployeeLeavePeer::doSelect($lh);
		$this->_S('annual_leave', $empData->getAnnualLeave());
	
		/* Identification Card */
		$idCriteria = new Criteria();
		$idCriteria->add(HrEmployeeIcPeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$idCriteria->addDescendingOrderByColumn(HrEmployeeIcPeer::DATE_OF_EXPIRY);
		$this->idPager = HrEmployeeIcPeer::doSelect($idCriteria);
		
		/* document list */
		$docCriteria = new Criteria();
		$docCriteria->add(HrEmployeeDocumentPeer::EMPLOYEE_NO, $this->_G('employee_no'));
		//$docCriteria->add(HrEmployeeDocumentPeer::NAME, '&& || &&', Criteria::CUSTOM);
		$docCriteria->addDescendingOrderByColumn(HrEmployeeDocumentPeer::DATE_CREATED);
		$this->docPager = HrEmployeeDocumentPeer::doSelect($docCriteria);
		
		/* compensation tab */
		$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($this->_G('employee_no'));
		if ($basicDetail):
			$this->_S('acct_no', $empData->getAcctNo());
			$this->_S('commence_date', $empData->getCommenceDate());
			$this->_S('basic_amount', $basicDetail->getBasicAmount());
			$this->_S('effectivity_date', $basicDetail->getEffectivityDate());
			$this->_S('scheduled_amount', $basicDetail->getScheduledAmount());
			$this->_S('frequency', $basicDetail->getFrequency());
			$this->_S('hourly_rate', $basicDetail->getHourlyRate());
			$this->_S('allowance', $basicDetail->getAllowance());
			$this->_S('levy', $basicDetail->getLevy());
			$this->_S('paid_type', $basicDetail->getPaidType());
			$this->_S('type_of_employment', $empData->getTypeOfEmployment());
			$this->_S('remark', $basicDetail->getRemark());
			
			$this->_S('cpf', $basicDetail->getCpf());
			$this->_S('cpf_amount', $basicDetail->getCpfAmount());
			$this->_S('cpf_citizenship', $basicDetail->getCpfCitizenship());
			$this->_S('nationality', $empData->getNationality());
			$this->_S('race', $empData->getRace());
			$this->_S('date_of_birth', $empData->getDateOfBirth());
			$this->_S('remark', $basicDetail->getRemark());
		endif;
		$mcBenefit = HrEmployeeMcbenefitPeer::GetDataByEmployeeNo($this->_G('employee_no'));
		if ($mcBenefit):
			$this->_S('has_mc_benefit', $mcBenefit->getIsActive());
		else:
			$this->_S('has_mc_benefit', 'N');
		endif;
		$this->acctCode = PayAccountCodePeer::GetAcctCodeList();
		
		//----------------------------- basic pay
		$bp = new Criteria();
		$bp->add(PayBasicPayPeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$bp->addDescendingOrderByColumn(PayBasicPayPeer::EFFECTIVITY_DATE);
		$this->bppager = PayBasicPayPeer::doSelect($bp);
		
		//----------------------------- basic pay
		$extraIncome = new Criteria();
		$extraIncome->add(PayFixedIncomePeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$extraIncome->addDescendingOrderByColumn(PayFixedIncomePeer::FROM_DATE);
		$this->extrapager = PayFixedIncomePeer::doSelect($extraIncome);
		
		$this->_S('extra_acct_code', '');
		$this->_S('extra_scheduled_amount', '');
		$this->_S('extra_sdate', '');
		$this->_S('extra_frequency', '');
		$this->_S('extra_is_active', '');
		$this->_S('extra_remark', '');
		
		
	endif; //empData
  }
  
	
  public function executeResigned()
  {
  	if ($this->getRequest()->getMethod() == sfRequest::POST):
  		if ($this->_G('inactive')) {
			$data = HrEmployeePeer::retrieveByPK($this->_G('id'));
			$data->setDateResigned($this->_G('date_resigned'));
			$data->setDateModified(DateUtils::DUNow());
			$data->setModifiedBy($this->_U());
			$data->save();
			HrLib::LogThis($this->_U(), 'SET INACTIVE', '', $this->getModuleName().'/'.$this->getActionName() );
			$bpay = PayBasicPayPeer::GetDatabyEmployeeNo($data->getEmployeeNo());
			if ($bpay){
				$bpay->setStatus('I');
				$bpay->setDateModified(DateUtils::DUNow());
				$bpay->setModifiedBy($this->_U());
				$bpay->save();
				HrLib::LogThis($this->_U(), 'SET INACTIVE', '', $this->getModuleName().'/'.$this->getActionName() );
				$this->_SUF($data->getName() . ' has been marked Active.');
			}
		}	
		
  	if ($this->_G('active')) {
			$data = HrEmployeePeer::retrieveByPK($this->_G('id'));
			$data->setDateResigned(null);
			$data->setDateModified(DateUtils::DUNow());
			$data->setModifiedBy($this->_U());
			$data->save();
			HrLib::LogThis($this->_U(), 'SET ACTIVE', '', $this->getModuleName().'/'.$this->getActionName() );
			$bpay = PayBasicPayPeer::GetDatabyEmployeeNoWhoisInactive($data->getEmployeeNo());
			if ($bpay){
				$bpay->setStatus('A');
				$bpay->setDateModified(DateUtils::DUNow());
				$bpay->setModifiedBy($this->_U());
				$bpay->save();
				HrLib::LogThis($this->_U(), 'SET ACTIVE', '', $this->getModuleName().'/'.$this->getActionName() );
				$this->_SUF($data->getName() . ' has been marked Active.');
			}
		}	
		$this->redirect('employee/generalInformation?id='. $this->_G('id') .'&active=resigned');
	endif;
	
  }
  
  public function executeEmployeeEducation()
  {
  	$id = $this->_G('id');
  	$this->message = 'Last Updated on ' . DateUtils::DUFormat('Y-m-d h:i:s', DateUtils::DUNow() );
  	if ($id):
  		$empData = HrEmployeePeer::retrieveByPK($id);
  		if ($empData):
  			$eduData = HrEmployeeEducationPeer::GetDataByEmployeeNo($empData->getEmployeeNo());
  			if (!$eduData):
  				$eduData = new HrEmployeeEducation();
  				$eduData->setDateCreated(DateUtils::DUNow());
  				$eduData->setCreatedBy($this->_U());
  			endif;
  			$eduData->setPrimaryEd($this->_G('primary_ed'));
  			$eduData->setPrimaryGrade($this->_G('primary_grade'));
  			$eduData->setSecondary($this->_G('secondary'));
  			$eduData->setSecondaryGrade($this->_G('secondary_grade'));
  			$eduData->setTertiary($this->_G('tertiary'));
  			$eduData->setTertiaryGrade($this->_G('tertiary_grade'));
  			$eduData->setJrCollege($this->_G('jr_college'));
  			$eduData->setJrCollegeGrade($this->_G('jr_college_grade'));
  			$eduData->setPostGraduate($this->_G('post_graduate'));
  			$eduData->setPostGraduateGrade($this->_G('post_graduate_grade'));
  			$eduData->setEmployeeNo($empData->getEmployeeNo());
  			$eduData->setName($empData->getName());
  			$eduData->save();
  			$this->_SUF($empData->getName() . ' Education Info has been saved.');
  		endif;
  	endif;
  	$this->redirect('employee/generalInformation?id='. $id .'&active=education');
  }	
	public function executePhotoUpload()
	{
		$active = '';
		$fileName = $this->getRequest()->getFileName('employee_photo');
		$f = $_FILES;
		($this->getRequest()->moveFile('employee_photo', sfConfig::get('sf_app_employee_photo_dir').'/'.$fileName) );
		move_uploaded_file($f["tmp_name"], $dir . $newFileName);
		$empData = HrEmployeePeer::retrieveByPK($this->_G('id'));
		$this->id = $this->_G('record_id');
		if ($empData):
			$empData->setPhoto($fileName);
			$empData->save();
			$this->_SUF($empData->getName() . ' Photo Info has been saved.');
			HrLib::LogThis($this->_U(), 'UPDATE PHOTO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
		endif;
		$this->redirect('employee/generalInformation?id='. $empData->getId() );
	}
	
  public function executeEmployeePersonal()
  {
//  	var_dump($this->_G('department'));
//  	exit();
  		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			if ($this->_G('id')) :
				$data = HrEmployeePeer::retrieveByPK($this->_G('id'));
			else:
				$data = new HrEmployee();
			endif;
			$f = $_FILES['employee_photo'];
			move_uploaded_file($f["tmp_name"], sfConfig::get('sf_app_employee_photo_dir').'/'.$f["name"]) ;
			$companyID = HrCompanyPeer::GetIDbyCompanyName($this->_G('company')) ;
			$data->setHrCompanyId($companyID);
			//$data->setHrDepartmentId($this->_G('department'));
			$data->setTeam($this->_G('team'));
			$data->setBirthPlace($this->_G('birth_place'));
			$data->setDateOfBirth($this->_G('date_of_birth')? $this->_G('date_of_birth') : null);
			$data->setGender($this->_G('gender'));
			$data->setStatus($this->_G('status'));
			$data->setTelNo($this->_G('home_phone'));
			$data->setCellNo($this->_G('hand_phone'));
			$data->setStreet($this->_G('street'));
			$data->setBldgRoomNo($this->_G('block_no'));
			$data->setZipCode($this->_G('zipcode'));
			$data->setCity($this->_G('country'));
			$data->setTaxId($this->_G('tax_id'));
			$data->setSinId($this->_G('sin_id'));
			$data->setMomGroup($this->_G('mom_group'));
			$data->setProfession($this->_G('profession'));
			//$data->setCommenceDate($this->_G('commence_date'));
			if (isset($f["name"])):
				$data->setPhoto($f["name"]);
			endif;
			$data->setDateModified(DateUtils::DUNow());
			$data->setModifiedBy($this->_U());
			if (!$this->_G('rank_code') && strtoupper(substr($this->_G('employee_no'), 0 , 1)) == 'S' ):
            	$this->_S('rank_code','SPR');
            endif;
            $data->setRankCode($this->_G('rank_code'));
			$data->save();
			$this->_SUF($data->getName() . ' Personal Info has been saved.');
			HrLib::LogThis($this->_U(), 'UPDATE PERSONAL INFO', '', $this->getModuleName().'/'.$this->getActionName(), $data->getName() );
			//----------- update related table for the company update
			$extra = new PayComputeExtra();
			$nco = $this->_G('company'); //HrCompanyPeer::GetNamebyId($this->_G('company'));
//			var_dump($this->_G('company'));
//			exit();
			$extra->DoSQL("
	            Update 
	            pay_basic_pay
	            set company = '". $nco."'
	            where employee_no = '". $data->getEmployeeNo() ."'
	            ");
			HrLib::LogThis($this->_U(), 'CHANGE COMPANY NAME', '', $this->getModuleName().'/'.$this->getActionName(), $data->getName() );
			
//			var_dump("
//	            Update 
//	            tk_dtrmaster
//	            set company = '". $nco."'
//	            where employee_no = '". $data->getEmployeeNo() ."'
//	            ");	
//			exit();
			
			$extra->DoSQL("
	            Update 
	            tk_dtrmaster
	            set company = '". $nco."'
	            where employee_no = '". $data->getEmployeeNo() ."'
	            ");			
				
			HrLib::LogThis($this->_U(), 'CHANGE COMPANY NAME', '', $this->getModuleName().'/'.$this->getActionName(), $data->getName() );
		    $this->_SUC('Personal Information has been updated...');
			$this->_S('ctab', 'personal');
		}
		$this->redirect('employee/generalInformation?id='. $this->_G('id') .'&active=personal');
  }
  
  
  public function executeUpdateEmployeeNoName()
  {
  	if ($this->getRequest()->getMethod() == sfRequest::POST && $this->_G('new_employee_no') )
	{
		$name = $this->_G('new_name');
  		$empNo = $this->_G('employee_no');
		$nNo   = trim($this->_G('new_employee_no'));
		$extra = new PayComputeExtra();
		$extra->DoSQL("
            Update 
            hr_employee
            set employee_no = '". $nNo."', name='".$name."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            hr_employee_leave
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            hr_employee_leave_credits
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            hr_employee_daily
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            hr_individual_leave
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_basic_pay
            set employee_no = '". $nNo."', name='".$name."'      
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_scheduled_deduction
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_scheduled_income
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_sched_deduction_log
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");		    
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_sched_income_log
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");		   
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            tk_attendance
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");	
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            tk_attendance_multiple
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            tk_dtrmaster
            set employee_no = '". $nNo."'   , name='".$name."'   
            where employee_no = '". $empNo."'
            ");	
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            tk_dtrsummary
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            tk_meal_summary
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_employee_ledger
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");			        
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_employee_ledger_archive
            set employee_no = '". $nNo."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		$extra->DoSQL("
            Update 
            hr_employee_ic
            set employee_no = '". $nNo."'   , name='".$name."'   
            where employee_no = '". $empNo."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));


		
		$extra->DoSQL("
            Update 
            hr_employee_mcbenefit
            set employee_no = '". $nNo."', name='".$name."'   
            where employee_no = '". $this->_G('employee_no')."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update 
            pay_employee_levy
            set employee_no = '". $nNo."'
            where employee_no = '". $this->_G('employee_no')."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));

		$extra->DoSQL("
            Update
            pay_fixed_income
            set employee_no = '". $nNo."', name='".$name."'   
            where employee_no = '". $this->_G('employee_no')."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
		$extra->DoSQL("
            Update
            hr_employee_document
            set employee_no = '". $nNo."', name='".$name."'   
            where employee_no = '". $this->_G('employee_no')."'
            ");
		HrLib::LogThis($this->_U(), 'CHANGE IC', '', $this->getModuleName().'/'.$this->getActionName() , $this->_G('new_name'));
		
	}
	$this->redirect('employee/generalInformation?id='. $this->_G('id'));
  }
  
  public function executeAjaxWorktemplate()
  {
  	//$this->worktemp_no = $this->_G('worktemp_no');
  	$this->workTemp = TkWorktemplatePeer::GetDatabyWorktemplateNo($this->_G('worktemp_no'));
  }
  
  public function executeEmployeeWorkinfo()
  {
  	$id = $this->_G('id');
  	$empData = HrEmployeePeer::retrieveByPK($id);
  	if ($empData):
  		$wsched = TkDtrmasterPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
  		if ( $wsched ){
	  		$wsched->setEmployeeNo($empData->getEmployeeNo());
			$wsched->setCompany(HrCompanyPeer::GetNamebyId($empData->getHrCompanyId()) );
			$wsched->setHrCompanyId($empData->getHrCompanyId() );
			$wsched->setName($empData->getName());
			$wsched->setTypeOfEmployment($empData->getTypeOfEmployment());
			$wsched->setTkWorktemplateNo($this->_G('worktemp_no'));
			$wsched->setDateModified(DateUtils::DUNow());
			$wsched->setModifiedBy($this->_U());
			$wsched->save();
			HrLib::LogThis($this->_U(), 'UPDATE WORK SCHEDULE', '', $this->getModuleName().'/'.$this->getActionName() );
			$empData->setFinNo(trim($this->_G('fin_no')) );
			$empData->setDateModified(DateUtils::DUNow());
			$empData->setModifiedBy($this->_U());
			$empData->save();		
			HrLib::LogThis($this->_U(), 'UPDATE FIN NUMBER', '', $this->getModuleName().'/'.$this->getActionName() );			
			$this->_SUC('Workschedule has been updated...');
			$this->_S('ctab', 'work');
		}else{
			$wsched = new TkDtrmaster();
			$wsched->setEmployeeNo($empData->getEmployeeNo());
			$wsched->setCompany(HrCompanyPeer::GetNamebyId($empData->getHrCompanyId()) );
			$wsched->setHrCompanyId($empData->getHrCompanyId());
			$wsched->setName($empData->getName());
			$wsched->setTypeOfEmployment($empData->getTypeOfEmployment());
			$wsched->setTkWorktemplateNo($this->_G('worktemp_no'));
			$wsched->setDateModified(DateUtils::DUNow());
			$wsched->setModifiedBy($this->_U());
			$wsched->save();
			HrLib::LogThis($this->_U(), 'NEW TK DTRMASTER', '', $this->getModuleName().'/'.$this->getActionName() );
		}
		$wsched->setAmTimeIn($this->_G('am_time_in'));
		//$wsched->setPmTimeOut($this->_G('am_time_in'));
		$wsched->save();
		$this->_SUF($empData->getName() . ' Workinfo Info has been saved.');
		$this->redirect('employee/generalInformation?id='. $this->_G('id') . '&active=workinfo');
  	endif;
  }
  
  	public function executeAjaxLeaveHistory()
	{
//		$this->year = $this->_G('year');
//		$this->empno = $this->_G('employee_no');
		$lc = new Criteria();
		$lc->add(HrEmployeeLeaveCreditsPeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$lc->add(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, $this->_G('year'));
		$lc->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE);
		$this->lcpager = HrEmployeeLeaveCreditsPeer::doSelect($lc);
		
		$lh = new Criteria();
		$lh->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $this->_G('employee_no'));
		$lh->add(HrEmployeeLeavePeer::FISCAL_YEAR, $this->_G('year'));
		$lh->addAscendingOrderByColumn(HrEmployeeLeavePeer::LEAVE_TYPE);
		$this->lhpager = HrEmployeeLeavePeer::doSelect($lh);
	}
	
	public function executeLeaveInfo()
	{
		$id = $this->_G('id');
		if ($this->getRequest()->getMethod() == sfRequest::POST):
			$data = HrEmployeePeer::retrieveByPK($id);
			$data->setAnnualLeave($this->_G('annual_leave'));
			$data->save();
			$this->_SUF($data->getName() . ' Workinfo Info has been saved.');
			HrLib::LogThis($this->_U(), 'UPDATE ANNUAL LEAVE INCREMENT', '', $this->getModuleName().'/'.$this->getActionName() );
		endif;
		$this->redirect('employee/generalInformation?id='. $id .'&active=leave');
	}
	
    public function executeIndividualLeaveEdit()
    {
		$this->record = HrIndividualLeavePeer::GetDatabyEmployeeNoLeaveType($this->_G('empno'), $this->_G('ltype'));
        if (!$this->record) {
            $this->record = new HrIndividualLeave();
            $this->record->setDateCreated(DateUtils::DUNow());
            $this->record->setCreatedBy($this->_U());   
            $this->_S('employee_no',        $this->_G('empno'));
            $this->_S('current_entitled',   'not set');
        }else{
        	
        	$this->_S('employee_no',        $this->record->getEmployeeNo());
	        $this->_S('leave_id',           $this->record->getHrLeaveId());
	        $this->_S('days_entitled',      $this->record->getDaysEntitled());
	        $this->_S('status',             $this->record->getStatus());        
	        $this->_S('date_modified',      $this->record->getDateModified());
	        $this->_S('modified_by',      	$this->record->getModifiedBy());
	        $this->_S('current_entitled',   $this->record->getDaysEntitled());
        }
        $empData = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no'));
        $this->_S('name', $empData->getName());
        $this->_S('commence_date', $empData->getCommenceDate());
        $this->_S('leave_type', $this->_G('ltype'));  
        $this->_S('leave_id', 		HrLeavePeer::GetIDbyLeaveType($this->_G('ltype')) );
        $this->setTemplate('individualLeaveAdd');
    }
	
	public function executeProrate()
	{
		$this->empData = HrEmployeePeer::GetDatabyEmployeeNo($this->_G('employee_no')) ;
		$this->leaveID = $this->_G('leave_id');
		if (!$this->empData) { 
			exit(); 
		};
	}
	
	public function executeIdentityCard()
	{
		$id = $this->_G('id');
		$data = HrEmployeePeer::retrieveByPK($id);
		if ($id) :
			$idData = new HrEmployeeIc();
			$idData->setEmployeeNo($data->getEmployeeNo());
			$idData->setName($data->getName());
			$idData->setSector($this->_G('sector'));
			$idData->setOccupation($this->_G('occupation'));
			$idData->setPassType($this->_G('pass_type'));
			$idData->setPassNo($this->_G('pass_no'));
			$this->_G('date_of_application') ? $idData->setDateOfApplication($this->_G('date_of_application')) : '';
			$this->_G('date_of_issue') ? $idData->setDateOfIssue($this->_G('date_of_issue')) : '';
			$this->_G('date_of_expiry') ? $idData->setDateOfExpiry($this->_G('date_of_expiry')): '';
			$idData->setDateModified(DateUtils::DUNow());
			$idData->setModifiedBy($this->_U());
			$idData->setDateCreated(DateUtils::DUNow());
			$idData->setCreatedBy($this->_U());
			$idData->save();
			HrLib::LogThis($this->_U(), 'UPDATE IC INFORMATION', '', $this->getModuleName().'/'.$this->getActionName(), $data->getName() );
			$this->_SUF('IDentification Card has been updated ' . $data->getName() );
			$this->redirect('employee/generalInformation?id=' . $data->getId() .'&active=identity');
		endif;
	}
	
	public function executeUploadDocument()
	{
		//$fileName = $this->getRequest()->getFileName('file');
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			$id = $this->_G('id');
			$empData = HrEmployeePeer::retrieveByPK($id);
			$fileName = $this->getRequest()->getFileName('file');
			$this->getRequest()->moveFile('file', sfConfig::get('sf_app_document_dir').'/'.$fileName);
			$rec = new HrEmployeeDocument();
			$rec->setEmployeeNo($empData->getEmployeeNo());
			$rec->setName($empData->getName());
			$rec->setFileName($_FILES['file']['name']);
			$rec->setMimeType($_FILES['file']['type']);
			$rec->setSize($_FILES['file']['size']);
			$rec->setDescription($this->_G('docdesc'));
			$rec->setDateCreated(DateUtils::DUNow());
			$rec->setCreatedBy($this->_U());
			$rec->setDateModified(DateUtils::DUNow());
			$rec->setModifiedBy($this->_U());
			$rec->save();
			HrLib::LogThis($this->_U(), 'UPLOAD DOCUMENT/PHOTO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName()  );
		}
		$this->redirect('employee/generalInformation?id='.$this->_G('id').'&active=document');
	}
	
	public function executeGetDocument()
	{
		$imageDir = sfConfig::get('sf_app_document_dir');
		$id = $this->_G('id');
		$fData = HrEmployeeDocumentPeer::retrieveByPK($id);
		$niceFilename = $fData->getFileName();
		$fsize = $fData->getSize();
		$mime = $fData->getMimeType();


		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); // required for certain browsers
		header("Content-Transfer-Encoding: binary");
		header("Content-Type: " . $mime);
		header("Content-Length: " . $fsize);
		header("Content-Disposition: attachment; filename=\"" . $niceFilename . "\";" );

		$file = $imageDir . $niceFilename;
		$handle = fopen($file, 'r');
		while (!feof($handle))
		{
			$Data = fgets($handle, 256);
			echo $Data;
		}
		fclose($handle);
		exit();
	}
	
	public function executeEditBasicPay()
	{
		$id = $this->_G('id');
		$empData = HrEmployeePeer::retrieveByPK($id);
    	if ($empData):
    		$this->_S('acct_no', $empData->getAcctNo());
			$this->_S('commence_date', $empData->getCommenceDate());
			$this->_S('type_of_employment', $empData->getTypeOfEmployment());
			$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
			if ($basicDetail):
				$this->_S('basic_amount', $basicDetail->getBasicAmount());
				$this->_S('effectivity_date', $basicDetail->getEffectivityDate());
				$this->_S('scheduled_amount', $basicDetail->getScheduledAmount());
				$this->_S('frequency', $basicDetail->getFrequency());
				$this->_S('hourly_rate', $basicDetail->getHourlyRate());
				$this->_S('allowance', $basicDetail->getAllowance());
				$this->_S('levy', $basicDetail->getLevy());
				$this->_S('paid_type', $basicDetail->getPaidType());
				$this->_S('remark', $basicDetail->getRemark());
				
	//			$this->_S('cpf', $basicDetail->getCpf());
	//			$this->_S('cpf_amount', $basicDetail->getCpfAmount());
	//			$this->_S('cpf_citizenship', $basicDetail->getCpfCitizenship());
	//			$this->_S('nationality', $empData->getNationality());
	//			$this->_S('race', $empData->getRace());
	//			$this->_S('remark', $basicDetail->getRemark());
			endif;
			$mcBenefit = HrEmployeeMcbenefitPeer::GetDataByEmployeeNo($empData->getEmployeeNo());
			if ($mcBenefit):
				$this->_S('has_mc_benefit', $mcBenefit->getIsActive());
			else:
				$this->_S('has_mc_benefit', 'N');
			endif;
		endif;
	}
	

	
	public function executeSaveBasicPay()
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$id = $this->_G('id');
			$empData = HrEmployeePeer::retrieveByPK($id);
	    	if ($empData):
				$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
				if (!$basicDetail):
					$basicDetail = new PayBasicPay();
				endif;
				PayBasicPayPeer::SetAllStatusInactive($empData->getEmployeeNo());
				$this->basic = new PayBasicPay();
				$this->basic->setEmployeeNo($empData->getEmployeeNo());
				$this->basic->setName($empData->getName());
				$this->basic->setCompany(HrCompanyPeer::GetNamebyId($empData->getHrCompanyId()) );
				$this->basic->setDepartment('');
				$this->basic->setFrequency($this->_G('frequency'));
				$this->basic->setBasicAmount($this->_G('scheduled_amount'));
				$this->basic->setScheduledAmount($this->_G('scheduled_amount'));
				$this->basic->setHourlyRate($this->_G('hourly_rate'));
				$this->basic->setOtRate('');
				$this->basic->setAllowance($this->_G('allowance'));
				$this->basic->setLevy($this->_G('levy'));
				$this->basic->setTaxableAmount($this->_G('scheduled_amount'));
				$this->basic->setAcctCode('BP');                                    //------- account code 01-basic pay
				$this->basic->setGrossPay(intval($this->_G('scheduled_amount')) * 12);
				$this->basic->setStatus('A');
				$this->basic->setPaidType($this->_G('paid_type'));
				$this->basic->setRemark($this->_G('remark'));
				$this->basic->setEffectivityDate($this->_G('effectivity_date'));
				
				$this->basic->setCpf($basicDetail->getCpf());
				$this->basic->setCpfAmount($basicDetail->getCpfAmount());
				$this->basic->setCpfCitizenship($basicDetail->getCpfCitizenship());
				
				
				$this->basic->setDateCreated(DateUtils::DUNow());
				$this->basic->setCreatedBy($this->_U());
				$this->basic->setDateModified(DateUtils::DUNow());
				$this->basic->setModifiedBy($this->_U());
				$this->basic->save();
				$mcBenefit = HrEmployeeMcbenefitPeer::GetDataByEmployeeNo($empData->getEmployeeNo());
				if (!$mcBenefit):
					$mcBenefit = new HrEmployeeMcbenefit();
					$mcBenefit->setDateCreated(DateUtils::DUNow());
					$mcBenefit->setCreatedBy($this->_U());
				endif;
				
				$mcBenefit->setEmployeeNo($empData->getEmployeeNo());
				$mcBenefit->setName($empData->getName());
				$mcBenefit->setMonthly(HrEmployeeMcbenefitPeer::MONTHLY_BENEFIT);
				$mcBenefit->setMidYear(HrEmployeeMcbenefitPeer::MID_YEAR);
				$mcBenefit->setIsActive($this->_G('has_mc_benefit'));
				$mcBenefit->setDateModified(DateUtils::DUNow());
				$mcBenefit->setModifiedBy($this->_U());
				$mcBenefit->save();
					
				HrLib::LogThis($this->_U(), 'NEW BASIC PAY ADDED', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
				$data = hrEmployeePeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
				$data->setCommenceDate($this->_G('commence_date'));
				$data->setAcctNo($this->_G('acct_no'));
				$data->setTypeOfEmployment($this->_G('type_of_employment'));
				$data->setDateModified(DateUtils::DUNow());
				$data->setModifiedBy($this->_U());
				$data->save();
				
				$dtrmaster = TkDtrmasterPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
				$dtrmaster->setTypeOfEmployment($this->_G('type_of_employment'));
				$dtrmaster->setDateModified(DateUtils::DUNow());
				$dtrmaster->setModifiedBy($this->_U());
				$dtrmaster->save();
				
				HrLib::LogThis($this->_U(), 'UPDATE COMMENCE, ACCT_NO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
				$this->_SUF('Employee Pay has been Updated.');
			endif;
		$this->redirect('employee/generalInformation?id=' . $this->_G('id').'&active=compensation');
		sfView::NONE;
		}//endif post
	}
	
	public function executeEditCpfPay()
	{
		$id = $this->_G('id');
		$empData = HrEmployeePeer::retrieveByPK($id);
    	if ($empData):
			$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
			if ($basicDetail):
				$this->_S('cpf', $basicDetail->getCpf());
				$this->_S('cpf_amount', $basicDetail->getCpfAmount());
				$this->_S('cpf_citizenship', $basicDetail->getCpfCitizenship());
				$this->_S('nationality', $empData->getNationality());
				$this->_S('race', $empData->getRace());
				$this->_S('remark', $basicDetail->getRemark());
			endif;
		endif;
	}
	
	public function executeSaveCpfPay()
	{
		$id = $this->_G('id');
		$empData = HrEmployeePeer::retrieveByPK($id);
    	if ($empData):
			$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
			if (!$basicDetail):
				$this->_ERF('You must save the Basic Pay First');
				$this->redirect('employee/generalInformation?id=' . $this->_G('id').'&active=compensation');
			endif;
			$basicDetail->setCpf($this->_G('cpf'));
			$basicDetail->setCpfAmount($this->_G('cpf_amount'));
			$basicDetail->setCpfCitizenship($this->_G('cpf_citizenship'));
			$basicDetail->save();
			HrLib::LogThis($this->_U(), 'UPDATE CPF INFO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
			$empData->setNationality($this->_G('nationality'));
			$empData->setRace($this->_G('race'));
			$empData->save();
			HrLib::LogThis($this->_U(), 'UPDATE CPF INFO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
		endif;
		$this->redirect('employee/generalInformation?id=' . $this->_G('id').'&active=compensation');
	}
	
	public function executeEditExtraIncome()
	{
		$id = $this->_G('id');
		$empData = HrEmployeePeer::retrieveByPK($id);
    	if ($empData):
			$basicDetail = PayBasicPayPeer::GetDatabyEmployeeNo($empData->getEmployeeNo());
			if ($basicDetail):
				$this->_S('cpf', $basicDetail->getCpf());
				$this->_S('cpf_amount', $basicDetail->getCpfAmount());
				$this->_S('cpf_citizenship', $basicDetail->getCpfCitizenship());
				$this->_S('nationality', $empData->getNationality());
				$this->_S('race', $empData->getRace());
				$this->_S('remark', $basicDetail->getRemark());
			endif;
		endif;
	}
	
	public function executeSaveExtraIncome()
	{
		$id = $this->_G('id');
		//var_dump($id);
		//exit();
		$empData = HrEmployeePeer::retrieveByPK($id);
    	if ($empData):
			$fixedIncome = new PayFixedIncome();
			$fixedIncome->setEmployeeNo($empData->getEmployeeNo());
			$fixedIncome->setName($empData->getName());
			$fixedIncome->setAcctCode(PayAccountCodePeer::GetAcctCodebyDescription($this->_G('extra_acct_code')));
			$fixedIncome->setDescription ($this->_G('extra_acct_code'));
			$fixedIncome->setScheduledAmount($this->_G('extra_scheduled_amount'));
			$fixedIncome->setFromDate($this->_G('extra_sdate'));
			$fixedIncome->setFrequency($this->_G('extra_frequency'));
			$fixedIncome->setIsActive($this->_G('extra_is_active'));
			$fixedIncome->setRemark($this->_G('extra_remark'));
			$fixedIncome->setDateCreated(DateUtils::DUNow());
			$fixedIncome->setDateModified(DateUtils::DUNow());
			$fixedIncome->setCreatedBy($this->_U());
			$fixedIncome->setModifiedBy($this->_U());
			$fixedIncome->save();
			
			HrLib::LogThis($this->_U(), 'UPDATE CPF INFO', '', $this->getModuleName().'/'.$this->getActionName(), $empData->getName() );
		endif;
		$this->redirect('employee/generalInformation?id=' . $this->_G('id').'&active=compensation');
	}
	
	public function executeIndividualPayslip()
	{
		if ($this->getRequest()->getMethod() !== sfRequest::POST):	
			$this->list = array();
		endif;
		if ($this->getRequest()->getMethod() == sfRequest::POST):
			$pcodeList  = $this->_G('period_code');
			$mess  = $this->_G('bank_cash');
			$empno = $this->_G('employee_no');
			$hrLib = new HrLib();
			if ($this->_G('print_payslip')):
				$hrLib->OfficialPayslipPerEmployee( $pcodeList, $mess, $empno);
			endif;
			if ($this->_G('show_period')):
				$this->list = PayEmployeeLedgerArchivePeer::GetPeriodListByEmployeeNo($empno);
			endif;
			if ($this->_G('show_sms_payslip')):
				$this->list = PayEmployeeLedgerArchivePeer::GetPeriodListByEmployeeNo($empno);
				$this->showSMSPayslip = true;
				$mobile = "+65". HrEmployeePeer::GetMobileNoByEmployee($empno);
				$c = new Criteria();
				$c->add(SmsMessageoutPeer::RECEIVER, $mobile);
				$c->addDescendingOrderByColumn(SmsMessageoutPeer::SENTTIME);
				$c->add(SmsMessageoutPeer::MSG, '%Dep%', Criteria::LIKE);
				$this->pager = SmsMessageoutPeer::doSelect($c);
			endif;
		endif;
	}
	
	public function executeAjaxEmpList()
	{
		//echo 'test';
		$this->pcode = $this->_G('period_code');
	}
	
	public function executeAjaxPeriodList()
	{
		$empNo = $this->_G('employee_no');
		$this->list = PayEmployeeLedgerArchivePeer::GetPeriodListByEmployeeNo($empNo);
	}
	
  public function executeEmployeePhoto()
  {
  	  	if ($this->getRequest()->getMethod() != sfRequest::POST):
  			$this->_S('status', 'A');
  		endif;
	    $c = new Criteria();
	  	$c->addJoin(HrEmployeePeer::HR_COMPANY_ID, HrCompanyPeer::ID);
	  	if ($this->_G('status') == 'A'):
	  		$c->add(HrEmployeePeer::DATE_RESIGNED, null, Criteria::ISNULL);
	  	endif;
	  	$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
	  	$record = HrEmployeePeer::doSelect($c);
	  	$this->list = array('name'=>array() );
	  	foreach($record as $r):
	  		$this->list['name'][] = $r->getName(); 
	  		$this->list['photo'][] = $r->getPhoto(); 
	  	endforeach;
	  	//$myphoto = HrEmployeePeer::GetPhoto($id);
		//echo link_to(image_tag('employee/' . $myphoto,'size="130x200"'),'#', 'id="uploadPhoto" ') ;
  }
  
  public function executeMcBenefit()
  {
  	if ($this->getRequest()->getMethod() != sfRequest::POST) :
  		$this->_S('isUpdate', false);
  	endif;
  	if ($this->getRequest()->getMethod() == sfRequest::POST ) :
  	if ($this->_G('saveList')):
  	$co = $this->_G('c_company');
  	$mess = '';

	// check whether the pager has been listed
	if ($this->_G('isUpdate')):
  		HrEmployeeMcbenefitPeer::SetInActiveAll($this->_G('company'), $this->_U() );
	endif;
	foreach($_POST as $k => $v):
		if (substr($k, 0, 18 ) == 'gridCheckBox_item_' ):
			if ($v):  //is checked
				$mess .= HrEmployeeMcbenefitPeer::SetActive($v, $this->_U());
			endif;
			//echo $k . ' = ' . $v .'<br>';
		endif;
	endforeach;
  	if ($mess):
  		$this->_SUC($co. ' Update has been saved to the Following: <br>' . $mess);
  	else:
  		$this->_WRN('No Update Has been Made.');
  	endif;
  	endif;
  	$pcode = $this->_G('period_code');
  	$emp   = $this->_G('employee_no');
  	$bankCash = $this->_G('bank_cash');
  	$c = new Criteria();
  	$c->addJoin(HrEmployeePeer::EMPLOYEE_NO, PayBasicPayPeer::EMPLOYEE_NO);
  	$c->add(PayBasicPayPeer::STATUS, 'A');
  	if ($this->_U() <> 'emmanuel') $c->add(PayBasicPayPeer::SCHEDULED_AMOUNT, 2501, Criteria::LESS_THAN);
  	if ($this->_G('company')) $c->add(PayBasicPayPeer::COMPANY, $this->_G('company') );
  		$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
  		$this->pager = HrEmployeePeer::doSelect($c);
  	endif;
  
  	//exit();
  }
}
