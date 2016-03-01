<?php

/**
 * timekeeping actions.
 *
 * @package    snapps
 * @subpackage timekeeping
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class workTemplateEditAction extends SnappsAction
{
    var $preCount = 0;
    
    public function preExecute()
    {
        if (!$this->preCount) 
        {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Edit Work Template');
            //$this->preCount++;
        }  
        $id =$this->_G('id');
        $this->id = $id;
        $this->wrtmp = TkWorktemplatePeer::retrieveByPK($id);
        if (!$this->wrtmp) 
        {
            $this->_ERF('Record not Available!');
            $this->redirect('timekeeping/workTempSearch');
        }
        $vtmp = array();
        //----------------------- get Detail 366 days
        $vtmp = TkWorktemplateDetailPeer::getWorkTempDetailbyWTNo($this->wrtmp->getWorktempNo());
        //----------------------- get holiday
        $this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
        //----------------------- init calendar object
        $this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
        $this->cal->setMonthBaseURL('timekeeping/workTemplateEdit', $id);
        $this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
        $this->cal->setWorkTemplate($vtmp);
        $this->am_pm = $this->wrtmp->getAmPmEv();
        $this->dday  = $this->wrtmp->getDayoffDay();
        $this->vtmp = '';  // re init if not array activate shaded calendar
        if ($this->getRequest()->getMethod() != sfRequest::POST ) 
        {
            $this->cdate = sfConfig::get('fiscal_year').'-01-01';
            $nwk = $this->cal->getweeks($this->cdate);
            $this->cdt = $this->cdate;
            $this->_S('currdate', $this->cdate);
            $this->_S('worktemp_no', $this->wrtmp->getWorktempNo());
            $this->_S('description', $this->wrtmp->getDescription());
            $this->_S('dayoff',      $this->wrtmp->getDayoff());        
            $this->_S('dayoff_day',  $this->wrtmp->getDayoffDay());        
            $this->_S('am_pm_ev',    $this->wrtmp->getAmPmEv());
            $this->_S('days_per_month', $this->wrtmp->getDaysPerMonth());
            $this->_S('hrs_per_day', $this->wrtmp->getHrsPerDay());
            $this->_S('hrs_per_week', $this->wrtmp->getHrsPerWeek());
            $this->_S('break',       $this->wrtmp->getMealBreak());
            $this->_S('acct_code',   $this->wrtmp->getAcctCode());
            $this->_S('allowance_days', $this->wrtmp->getAllowanceDays());
            $this->_S('allowance_amt', $this->wrtmp->getAllowanceAmt());
            $this->_S('base_nohours',  $this->wrtmp->getBaseNohours());
            $this->_S('ot1',  $this->wrtmp->getOt1());
            $this->_S('ot2',  $this->wrtmp->getOt2());
            $this->_S('ot3',  $this->wrtmp->getOt3());
            $this->_S('min_ot',  $this->wrtmp->getMinOt());
            $this->_S('min_time',  $this->wrtmp->getMinTime());
            $this->_S('endurance',  $this->wrtmp->getEndurance());
        }
    }
    

    public function execute(){
        if ($this->getRequest()->getMethod() == sfRequest::POST ) {
        	
            if ($this->_G('UpdateWorkSchedule') && ( $this->_U() == 'emmanuel'  || $this->_U() == 'kathy') )
            {
                $this->vtmp = explode(',',$this->wrtmp->getTemplate());
                $this->cal->setWorkTemplate($this->setAllAsFirstWeek($this->vtmp));
                $this->saveDetWorkTemplate();
                $this->redirect('maintenance/workTemplateSearch');
                return;
            }        	
            //------------- submit form values
            $this->getWTmpinfo();
            $this->_S('currdate', $this->cdate);
            $nwk = $this->cal->getweeks($this->cdate);
            if ($this->_G('savesame'))   {
                $mo =  ($this->_G('mo') == 'mo' ) ? 'mo,' : '00,' ;
                $tu =  ($this->_G('tu') == 'tu' ) ? 'tu,' : '00,' ;
                $we =  ($this->_G('we') == 'we' ) ? 'we,' : '00,' ;
                $th =  ($this->_G('th') == 'th' ) ? 'th,' : '00,' ;
                $fr =  ($this->_G('fr') == 'fr' ) ? 'fr,' : '00,' ;
                $sa =  ($this->_G('sa') == 'sa' ) ? 'sa,' : '00,' ;
                $su =  ($this->_G('su') == 'su' ) ? 'su' : '00';
                $aDays = $mo . $tu . $we . $th . $fr . $sa . $su;
                $this->wrtmp->setAcctCode($this->_G('acct_code'));
                $this->wrtmp->setAcctDesc(PayAccountCodePeer::GetDescriptionbyAcctCode($this->_G('acct_code')));
                $this->wrtmp->setAllowanceDays($aDays);
                $this->wrtmp->setAllowanceAmt($this->_G('allowance_amt'));
                $this->wrtmp->save();
                HrLib::LogThis($this->_U(), 'UPDATE WORKTEMPLATE', '', $this->getModuleName().'/'.$this->getActionName() );
                $this->_SUF('<b>'.$this->wrtmp->getWorktempNo().'</b> Has been successfuly updated.');
                $this->redirect('maintenance/workTemplateSearch?hIDs[]=' . $this->wrtmp->getId());                
            }
            if ($this->_G('savemonth'))   {
                $wrktemp = $this->postWrkTemp($nwk);
                $this->cal->setUpdateWrktmp($wrktemp, $this->cdate);
                $this->saveTmpDetail($this->wrtmp->getWorktempNo());
            }
        }
    }

    public function HandleErrorEditWorkTemplate(){
        $this->preExecute();
        return sfview::SUCCESS;
    }
    
   
    protected function getWTmpinfo(){
        $this->wrtmp->setWorktempNo($this->_G('worktemp_no'));
        $this->wrtmp->setDescription($this->_G('description'));
        $this->wrtmp->setDayoff($this->_G('dayoff'));
        $this->wrtmp->setDayoffDay($this->_G('dayoff_day'));
        $this->wrtmp->setAmPmEv($this->_G('am_pm_ev'));
        $this->cdate = ($this->_G('currdate'));
        $this->wrtmp->setHrsPerDay($this->_G('hrs_per_day'));
        $this->wrtmp->setHrsPerWeek($this->_G('hrs_per_week'));
        $this->wrtmp->setDaysPerMonth($this->_G('days_per_month'));
        $this->wrtmp->setMealBreak($this->_G('break'));
        $this->wrtmp->setBaseNohours($this->_G('base_nohours'));
        $this->wrtmp->setEndurance($this->_G('endurance'));
        $this->wrtmp->setOt1($this->_G('ot1'));
        $this->wrtmp->setOt2($this->_G('ot2'));
        $this->wrtmp->setOt3($this->_G('ot3'));
        $this->wrtmp->setMinOt($this->_G('min_ot'));
        $this->wrtmp->setMinTime($this->_G('min_time'));
        
    }
    
    protected function saveTmpDetail($id){
        $dtail = array();
        $pos = 0;
        $dtail = $this->cal->getWrkTemplate();
        foreach($dtail['date'] as $kd=>$vd)
        {
            $xpos   = null;
            $wtmdet = TkWorktemplateDetailPeer::GetIDbyWTmpNoDate($id, $vd);
            if ($wtmdet) {
                $xpos = array_search($vd, $dtail['date']);
                $wtmdet->setIsWorking($dtail['no_hours'][$xpos]);
                $wtmdet->save();
               $pos++;
            }
        }
    }
    
    public function displayarray($arr){
        $x=1;
        foreach($arr as $key=>$val){
            echo 'key ['.$x++.']: '.$val.'<br>';
        }
    }
    
   protected function setAllAsFirstWeek($val){
        $wtmp = array('index'=>array(), 'date'=>array(), 'no_hours'=>array());
        $cdate = $this->cdate;
        $sdate = $this->cal->getDateByWeekNo(2);
        $dates = $this->cal->getWeeknoDate();
        $pos = 0;
        $x = 0;
        $ndex = 0;
        //--------------- update the first week Jan 01, 200x
        while ( DateUtils::DUFormat('z', $dates[$x]) < DateUtils::DUFormat('z', $sdate) ) :
        $pos = DateUtils::DUFormat('w', $dates[$x]);
        $wtmp['index'][]  = $ndex + 1;
        $wtmp['date'][]   = $dates[$x];
        $wtmp['no_hours'][] = $val[$pos];
        $pos++ ;
        $x++;
        $ndex++;
        endwhile;
        //--------------- start updating second week
        for($x=0; $x< count($dates); $x++){
            //for($x=0; $x<30; $x++){
            if ( DateUtils::DUFormat('z', $dates[$x]) >= DateUtils::DUFormat('z', $sdate) ){
                if ($pos >= 7) {
                    $pos = 0;
                }
                $wtmp['index'][]  = $x + 1;
                $wtmp['date'][]   = $dates[$x];
                $wtmp['no_hours'][] = $val[$pos];
                $pos++ ;
            } // if
        }
        //$this->display_arr($wtmp['index']);
        //$this->display_arr($wtmp['date']);
        //$this->display_arr($wtmp['no_hours']);
        
        return $wtmp;
    }

    protected function postWrkTemp($nweek){
        $val = array();
        $days = $nweek * 7;
        for ($x=0; $x<$days; $x++){
            $val[$x] = $this->_G('wrk'.$x);
        }//for
        return $val;
    }
        
    protected function saveDetWorkTemplate(){
        $dtail = array();
        $pos = 0;
        $dtail = $this->cal->getWrkTemplate();
        foreach($dtail['index'] as $kd=>$vd)
        {
            $wtmdet   = new TkWorktemplateDetail();
            $wtmdet->setDay($dtail['index'][$pos]);
            $wtmdet->setIsWorking($dtail['no_hours'][$pos]);
            $wtmdet->setDateDet($dtail['date'][$pos]);
            $wtmdet->setTkWorktemplateNo($this->wrtmp->getWorktempNo());
            $wtmdet->setCreatedBy($this->_U());
            $wtmdet->setDateCreated(DateUtils::DUNow());
            $wtmdet->setModifiedBy($this->_U());
            $wtmdet->setDateModified(DateUtils::DUNow());
            $wtmdet->save();
            $pos++;
        }
    }
    
}



