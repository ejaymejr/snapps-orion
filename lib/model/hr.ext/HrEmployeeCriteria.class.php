<?php

class HrEmployeeCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    
    
    function __construct($hdr = null)
    {
        
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        
		$this->addJoin(HrEmployeePeer::HR_COMPANY_ID, HrCompanyPeer::ID, self::LEFT_JOIN);
        $ref = $req->getParameter('status', '');
        if ($ref == 'A') {
//				$this->addJoin(HrEmployeePeer::EMPLOYEE_NO, PayBasicPayPeer::EMPLOYEE_NO, self::LEFT_JOIN);
//				$criterions[] = $this->getNewCriterion(PayBasicPayPeer::STATUS,"%$ref%", self::LIKE);
			$criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_RESIGNED, null, self::ISNULL);
        }
        
        if ($ref == 'I') {
			$criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_RESIGNED, null, self::ISNOTNULL);
        }
        
        
        $ref = $req->getParameter('employee_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::EMPLOYEE_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::NAME,"%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('company', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrCompanyPeer::COMP_NAME,"%$ref%", self::LIKE);
        }

//        $ref = $req->getParameter('status', '');
//        if ($ref != '') {
//            //$criterions[] = $this->getNewCriterion(HrEmployeePeer::STATUS,"%$ref%", self::LIKE);
//            $criterions[] = $this->getNewCriterion(PayBasicPayPeer::STATUS,"%$ref%", self::LIKE);
//        }
        
        
        $ref = $req->getParameter('street', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::STREET,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('bldg_room_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::BLDG_ROOM_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('city', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::CITY,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('province', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PROVINCE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('zip_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::ZIP_CODE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('tel_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TEL_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('cell_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::CELL_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('email_add', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::EMAIL_ADD,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('gender', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::GENDER,"%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('nationality', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::NATIONALITY,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('race', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::RACE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('cpf_citizenship', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::CPF_CITIZENSHIP,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TYPE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('permit_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PERMIT_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('permit_renew', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PERMIT_RENEW,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('permit_expiry', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PERMIT_EXPIRY,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('passport_expiry', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PASSPORT_EXPIRY,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('remark', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::REMARK,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('commence_date', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::COMMENCE_DATE,"%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('birth_place', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::BIRTH_PLACE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('date_of_birth', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_OF_BIRTH,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('blood_type', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::BLOOD_TYPE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('organ_donor', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::ORGAN_DONOR,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('rank_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::RANK_CODE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('job_title', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::JOB_TITLE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('date_hired', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_HIRED,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('bank', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::BANK,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('acct_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::ACCT_NO,"%$ref%", self::LIKE);
        }
        
        $ref = $req->getParameter('cost_center_code', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::COST_CENTER_CODE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('emp_status', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::EMP_STATUS,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('tax_id', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TAX_ID,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('sin_id', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::SIN_ID,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('fin_id', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::FIN_ID,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('active', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::ACTIVE,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('photo', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::PHOTO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('name_notified', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::NAME_NOTIFIED,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('relation', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::RELATION,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('address', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::ADDRESS,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('contact_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::CONTACT_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('date_resigned', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::DATE_RESIGNED,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('ic_no', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::IC_NO,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('type_of_employment', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TYPE_OF_EMPLOYMENT,"%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('team', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(HrEmployeePeer::TEAM,"%$ref%", self::LIKE);
        }
        if (sizeof($criterions)) {
            
            $this->add($criterions[0]);
            for ($i = 1; $i < sizeof($criterions); $i++) {
                if ($this->critJoin == 'AND') {
                    $this->addAnd($criterions[$i]);
                } else {
                    $this->addOr($criterions[$i]);                    
                }
            }
        }
        switch($hdr)
        {
            default:
                $hs = sfConfig::get('app_employeesearch_grid_headers');
                break;         
        }
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
            $this->addDescendingOrderByColumn(HrEmployeePeer::NAME);
        }
    }
}