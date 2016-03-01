<?php

/**
 * Subclass for performing query and update operations on the 'cpf_govt_rule' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class CpfGovtRulePeer extends BaseCpfGovtRulePeer
{
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
        $pager = new sfPropelPager('CpfGovtRule', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }        

    public static function GetAllData($dt, $net, $age, $cpfyear)
    {
        if ($cpfyear >= 3 )
        {
            $cpfyear = 3;
        }
        //age must be rounded 
        //$age = round($age);
        // david ng's and patrick on sept made wrong contribution
        // because age was rounded to 55 when it had to be 55.3

//        var_dump($age);
//        exit();
			
   
		        
        $c = new Criteria();
        $c->add(self::AGE_MIN,  self::AGE_MIN . '<=' . $age, Criteria::CUSTOM);        
        $c->add(self::AGE_MAX,  self::AGE_MAX . '>=' . $age, Criteria::CUSTOM);
        $c->add(self::PAY_MIN,  $net, Criteria::LESS_EQUAL);
        $c->add(self::PAY_MAX,  $net, Criteria::GREATER_EQUAL);
        $c->add(self::CPF_YEAR, $cpfyear);
        //$c->add(self::COMPANY_TYPE, '&& || &&', Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(self::AGE_MAX);
        $rs = self::doSelect($c);
//		if ($age == 60.1)
//		    var_dump($rs);         
        if ($rs)
        {
            foreach($rs as $r)
            {
                if ( ($r->getFromDate() <= $dt && $r->getToDate() >= $dt ) || 
                     ($r->getFromDate() <= $dt && is_null($r->getToDate()) ) )   
                {
                    return $r;
                }
            }
        }
    }
    
    public static function GetPayBracket($dt, $net, $age)
    {
    	//$age = round($age);
        $c = new Criteria();
        $c->add(self::AGE_MIN,  self::AGE_MIN . '<=' . $age, Criteria::CUSTOM);        
        $c->add(self::AGE_MAX,  self::AGE_MAX . '>=' . $age, Criteria::CUSTOM);
        $c->add(self::PAY_MIN,  $net, Criteria::LESS_EQUAL);
        $c->add(self::PAY_MAX,  $net, Criteria::GREATER_EQUAL);
        //$c->add(self::COMPANY_TYPE, '&& || &&', Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(self::AGE_MAX);
        $rs = self::doSelectOne($c); 
		return $rs->getDescription();
    }
    
    public static function ComputeAgeforCPF1($bdate)
    {
        $cyr  = date('Y');
        $cmon = date('m');
        $age = $cyr - DateUtils::DUFormat('Y', $bdate) - 1;
        if (DateUtils::DUFormat('m', $bdate) < $cmon)
        {
            $age++;
        }
        return $age;        
    }
    
	public static function ComputeAgeforCPF2 ($birthday){
		//$birthday = '1978-09-01';
	    list($year,$month,$day) = explode("-",$birthday);
	    $year_diff  = date("Y") - $year;
	    $month_diff = date("m") - $month;
	    $day_diff   = date("d") - $day;
	    if ($month_diff < 0) 
	        $year_diff--;
	    if ($month_diff > 0)
	    	$year_diff = $year_diff + ($month_diff / 100);    
	    return $year_diff;
	}    
	
	public static function ComputeAgeforCPF ($birthday, $baseDate){
		//$birthday = '1978-09-01';
	    $diff = DateUtils::DateDiff('m', $birthday, $baseDate);
	    $age = $diff/12;
	    return $age;
	}	
    
}
