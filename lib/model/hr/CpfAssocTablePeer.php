<?php

/**
 * Subclass for performing query and update operations on the 'cpf_assoc_table' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class CpfAssocTablePeer extends BaseCpfAssocTablePeer
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
        $pager = new sfPropelPager('CpfAssocTable', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }       

    public static function GetDatabyRace($race)
    {
        $c = new Criteria();
        $c->add(self::RACE, $race);
        $rs = self::doSelect($c);
        return $rs;
    }
    
    public static function GetDonation($salary, $race)
    {
    	$c = new Criteria();
    	$c->add(self::MIN, '('. $salary . ' >= ' . self::MIN . ' and ' . $salary . ' <= ' . self::MAX .')', Criteria::CUSTOM );
     	switch($race):
    		case 'CDAC':
 				$c->add(self::ACCT_CODE, 'CDAC');   			
    			break;
    		case 'MBMF':
    			$c->add(self::ACCT_CODE, 'MBMF');
    			break;
    		case 'SINDA':
    			$c->add(self::ACCT_CODE, 'SINDA');
    			break;
     	endswitch;
     	//$c->add(self::AMOUNT, '&& || &&', Criteria::CUSTOM);
     	$rs = self::doSelectOne($c);
     	return $rs? $rs->getAmount() : 0;
    }

}
