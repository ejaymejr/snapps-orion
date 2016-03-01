<?php

/**
 * timekeeping actions.
 *
 * @package    snapps
 * @subpackage timekeeping
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class workTemplateAddAction extends SnappsAction
{
    var $preCount = 0;
    public function preExecute()
    {
        if (!$this->preCount) {
            sfConfig::set('app_page_heading', sfConfig::get('app_page_heading') . ' &raquo; Add Work Template');
            $this->preCount++;
        }
        $id =$this->_G('id');
        $this->wtmplate = TkWorktemplatePeer::retrieveByPK($id);
        if (!$this->wtmplate) {
            $this->wtmplate = new TkWorktemplate();
            $this->wtmplate->setCreatedBy($this->_U());
            $this->wtmplate->setDateCreated(DateUtils::DUNow());
        }
        //--------------------- get holiday
        $this->holinfo = HrHolidayPeer::getDateHolByDate(sfConfig::get('fiscal_year'));
        //--------------------- init calendar object
        $this->cal = new TkCalendar(sfConfig::get('fiscal_year'));
        $this->cal->setMonthBaseURL('timekeeping/workTemplateAdd','');
        $this->cal->SetHolidays($this->holinfo['dates_hol'],$this->holinfo['holname']);
        $this->cdate = sfConfig::get('fiscal_Year').'-01-01';
        $this->nwk = 1;
        $this->cdt = $this->cdate;
        $this->am_pm = '0';
        $this->dday  = 'Saturday';

        if ($this->getRequest()->getMethod() != sfRequest::POST )
        {
            $this->vtmp = array(0, 8, 8, 8, 8, 8, 0);
            $this->am_pm = '0';
            $this->dday  = 'Saturday';
            $this->_S('days_per_month', 24);
            $this->_S('hrs_per_day', 8);
            $this->_S('hrs_per_week', 48);
            $this->_S('break', 0);
            $this->_S('acct_code', 'MR');
            $this->_S('allowance_days', 'mo,tu,we,th,fr,sa,su');
            $this->_S('allowance_amt', 2.50);
            //$this->_S('base_nohours', 8);
            $this->_S('endurance', 10);
            $this->_S('ot1', 1.5);
            $this->_S('ot2', 2.0);
            $this->_S('ot3', 2.5);
            $this->_S('min_ot', 1);
            $this->_S('min_time', '2000');
             
        }
    }

    //------------------------------    add worktemplate
    public function execute(){
        if ($this->getRequest()->getMethod() == sfRequest::POST ) {
            //-------------------------- do same as first week
            if ($this->_G('fweek') || $this->_G('savesame'))
            {
                $this->vtmp = $this->postWrkTemp($this->nwk);
                $this->cal->setWorkTemplate($this->setAllAsFirstWeek($this->vtmp));
            }
            if ($this->_G('savesame'))
            {
                $mo =  ($this->_G('mo') == 'mo' ) ? 'mo,' : '00,' ;
                $tu =  ($this->_G('tu') == 'tu' ) ? 'tu,' : '00,' ;
                $we =  ($this->_G('we') == 'we' ) ? 'we,' : '00,' ;
                $th =  ($this->_G('th') == 'th' ) ? 'th,' : '00,' ;
                $fr =  ($this->_G('fr') == 'fr' ) ? 'fr,' : '00,' ;
                $sa =  ($this->_G('sa') == 'sa' ) ? 'sa,' : '00,' ;
                $su =  ($this->_G('su') == 'su' ) ? 'su' : '00';
                $aDays = $mo . $tu . $we . $th . $fr . $sa . $su;
                $this->wtmplate->setModifiedBy($this->_U());
                $this->wtmplate->setDateModified(DateUtils::DUNow());
                $this->wtmplate->setWorktempNo($this->_G('worktemp_no'));
                $this->wtmplate->setDescription($this->_G('description'));
                $this->wtmplate->setAmPmEv($this->_G('am_pm_ev'));
                $this->wtmplate->setDayoff($this->_G('dayoff'));
                $this->wtmplate->setDayoffDay($this->_G('dayoff_day'));
                $this->wtmplate->setFiscalYear(sfConfig::get('fiscal_Year'));
                $this->wtmplate->setTemplate(implode("," , $this->vtmp));
                $this->wtmplate->setDaysPerMonth($this->_G('days_per_month'));
                $this->wtmplate->setHrsPerDay($this->_G('hrs_per_day'));
                $this->wtmplate->setHrsPerWeek($this->_G('hrs_per_week'));
                $this->wtmplate->setMealbreak($this->_G('break'));
                $this->wtmplate->setAcctCode($this->_G('acct_code'));
                $this->wtmplate->setAcctDesc(PayAccountCodePeer::GetDescriptionbyAcctCode($this->_G('acct_code')));
                $this->wtmplate->setAllowanceDays($aDays);
                $this->wtmplate->setAllowanceAmt($this->_G('allowance_amt'));
                $this->wtmplate->setBaseNohours($this->_G('base_nohours'));
                $this->wtmplate->setEndurance($this->_G('endurance'));
                $this->wtmplate->setOt1($this->_G('ot1'));
                $this->wtmplate->setOt2($this->_G('ot2'));
                $this->wtmplate->setOt3($this->_G('ot3'));
                $this->wtmplate->setMinOt($this->_G('min_ot'));
                $this->wtmplate->setMinTime($this->_G('min_time'));
                $this->wtmplate->save();
                HrLib::LogThis($this->_U(), 'WORK TEMPLATE', '', $this->getModuleName().'/'.$this->getActionName() );
                $this->saveDetWorkTemplate();
                $this->_SUF('Record <b>' . $this->_G('worktemp_no') . '</b> saved.');
                $this->redirect('timekeeping/workTemplateSearch?hIDs[]=' . $this->wtmplate->getId());
            } //------------- if savename

        }
    }


    public function HandleErrorAddWorkTemplate(){
        $this->preExecute();
        //$this->getRequest()->getErrorMsg()->addMsg('Check your entries.');
        return sfView::SUCCESS;
        //return $this->forward404();
    }



    //------------------------------    Support Functions
    protected function postWrkTemp($nweek){
        $val = array();
        $days = $nweek * 7;
        for ($x=0; $x<$days; $x++){
            $val[$x] = $this->_G('wrk'.$x);
        }//for
        return $val;
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

    protected function saveDetWorkTemplate(){
        $dtail = array();
        $pos = 0;
        $dtail = $this->cal->getWrkTemplate();
        foreach($dtail['index'] as $kd=>$vd)
        {
            $wtmdet   = new TkWorktemplateDetail();
            $this->wtmdet = $wtmdet;
            $wtmdet->setDay($dtail['index'][$pos]);
            $wtmdet->setIsWorking($dtail['no_hours'][$pos]);
            $wtmdet->setDateDet($dtail['date'][$pos]);
            $wtmdet->setTkWorktemplateNo($this->wtmplate->getWorktempNo());
            $wtmdet->setCreatedBy($this->_U());
            $wtmdet->setDateCreated(DateUtils::DUNow());
            $wtmdet->setModifiedBy($this->_U());
            $wtmdet->setDateModified(DateUtils::DUNow());
            $wtmdet->save();
            $pos++;
        }
    }

}
