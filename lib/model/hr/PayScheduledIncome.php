<?php

/**
 * Subclass for representing a row from the 'pay_scheduled_income' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayScheduledIncome extends BasePayScheduledIncome
{
    const FLAG_FREQUENCY_DAILY  = 'DAILY';
    const FLAG_FREQUENCY_WEEKLY = 'WEEKLY';
    const FLAG_FREQUENCY_MID_MONTH   = 'MID_MONTH';
    const FLAG_FREQUENCY_MONTHLY  = 'MONTHLY';
    const FLAG_FREQUENCY_PAYDAY= 'PAYDAY';
    const FLAG_FREQUENCY_SPECIAL= 'SPECIAL';    //customize individual payslip processing
    
    static public function GetFrequencyName($no)
    {
        $list = array(        'DAILY'=>'DAILY',
                              'WEEKLY'=>'WEEKLY',
                              'MID_MONTH'=>'MID_MONTH',
                              'MONTHLY'=>'MONTHLY',
                              'PAYDAY'=>'PAYDAY',
                              'SPECIAL'=>'SPECIAL'
                            );
                
        if (array_key_exists($no, $list)){
            return $list[$no];                             
        }
    }

    static public function GetFrequencyList()
    {
        $list = array(
        					  'MONTHLY'=>'MONTHLY',        
//        					  'DAILY'=>'DAILY',
//                   			  'WEEKLY'=>'WEEKLY',
//                              'MID_MONTH'=>'MID_MONTH',
//                              'PAYDAY'=>'PAYDAY',
                              'SPECIAL'=>'SPECIAL'
                            );
        
        return $list;                             
    }
    
    
    
}
