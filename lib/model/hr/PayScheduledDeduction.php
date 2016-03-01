<?php

/**
 * Subclass for representing a row from the 'pay_scheduled_deduction' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class PayScheduledDeduction extends BasePayScheduledDeduction
{
    static public function GetFrequencyName($no)
    {
        $list = array (  '1'=>   'DAILY', 
                         '2'=>  'WEEKLY', 
                         '3'=>    '15TH', 
                         '4'=>   '15_30',
                         '5'=> 'MONTHLY',
                         '6'=> 'SPECIAL'
                      ) ;    
        
        if (array_key_exists($no, $list)){
            return $list[$no];                             
        }
    }
}
