<?php

/**
 * Subclass for performing query and update operations on the 'hr_leave' table.
 *
 *
 *
 * @package lib.model.hr
 */
class HrLeavePeer extends BaseHrLeavePeer
{
    const FLAG_STATUS_ACTIVE = 'A';
    const FLAG_STATUS_INACTIVE = 'I';

    public static function GetFlagStatus($status)
    {
        return ($status == 'A')? 'ACTIVE' : 'INACTIVE';
    }

    public static function GetOptionRemarks()
    {
        return array('ANNUAL'=>'ANNUAL', 'SITUATIONAL'=>'SITUATIONAL');
    }

    public static function GetOptionStatus()
    {
        return array('ACTIVE'=>'ACTIVE', 'INACTIVE'=>'INACTIVE');
    }

    public static function GetPager($cd)
    {
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }

        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1);

        $c = clone($cd);
        $pager = new sfPropelPager('HrLeave', $rowsPerPage);

        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }

    public static function GetIDbyLeaveType($type) 
    {
        $c = new Criteria();
        $c->add(self::LEAVE_TYPE, $type);
        $leave = self::doSelect($c);
        foreach($leave as $leavetype) {
            return $leavetype->getID();
        }
    }

    public static function GetLeaveTypebyId($id) 
    {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $rs = self::doSelectOne($c);
        return $rs->getLeaveType();
    }

    public static function GetEntitlementById($id) 
    {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $rs = self::doSelectOne($c);
        return $rs->getDaysEntitled();
    }


    public static function GetLeaveTypes() {
        $c = new Criteria();
        $c->add(self::STATUS, FLAG_STATUS_ACTIVE);        
        $c->addAscendingOrderByColumn(self::LEAVE_TYPE);
        $leave = self::doSelect($c);
        $leaves = array();
        foreach($leave as $leavetype)
        {
            $leaves[$leavetype->getLeaveType()] = $leavetype->getLeaveType();
        }
        return $leaves;
    }

    public static function GetLeaveType() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::LEAVE_TYPE);
        $leave = self::doSelect($c);
        $leaves = array();
        foreach($leave as $leavetype)
        {
            $leaves[$leavetype->getId()] = $leavetype->getLeaveType();
        }
        return $leaves;
    }

    public static function RegistrationSearch($xpage){
        $c = new HrLeaveCriteria(self::LEAVE_TYPE);
        $pager = new sfPropelPager('HrLeave', 20);
        $pager->setCriteria($c);
        $pager->setPage($xpage);
        $pager->init();
        return array('pager'=>$pager, 'count'=>self::doCount($c) );
    }

    public static function GetDateHolByDate() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::DATE_HOL);
        $rs = self::doSelect($c);
        $dlv = array();
        $nlv = array();
        foreach($rs as $res)
        {
            $dlv[] = $res->getDateHol();
            $nlv[] = $res->getHoliday();
        }
        return array('dates_hol'=>$dhol, 'holname'=>$nhol);
    }

    public static function GetAnnualLeaves()
    {
        $c = new criteria();
        $c->add(HrLeavePeer::REMARKS, 'ANNUAL');
        $c->add(HrLeavePeer::STATUS, self::FLAG_STATUS_ACTIVE);
        $c->addAscendingOrderByColumn(HrLeavePeer::LEAVE_TYPE);
        $rs = HrLeavePeer::doSelect($c);
        return $rs;
    }
    
    public static function GetActiveLeaves()
    {
        $c = new criteria();
        $c->add(HrLeavePeer::STATUS, self::FLAG_STATUS_ACTIVE);
        $rs = HrLeavePeer::doSelect($c);
        return $rs;
    }    
    
    public static function OptLeaveType() {
        $c = new Criteria();
        $c->add(self::STATUS, self::FLAG_STATUS_ACTIVE);
        $c->addAscendingOrderByColumn(self::LEAVE_TYPE);
        $leave = self::doSelect($c);
        $leaves = array();
        foreach($leave as $leavetype)
        {
            $leaves[$leavetype->getId()] = $leavetype->getLeaveType();
        }
        return $leaves;
    }    

    public static function OptionStatus()
    {
        return array('A'=>'ACTIVE', 'I'=>'INACTIVE');
    }
    
}

