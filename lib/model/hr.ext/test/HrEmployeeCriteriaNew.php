<?php

class HrEmployeeCriteriaNew extends SnappsCriteria
{

    function __construct($columns, $sortBy, $sortOrder)
    {
        
        $this->exactSearchFields = array();    
        $this->textSearchFields = array('employee_no');    
        $this->rangeSearchFields = array(
            'date_modified'    => array('ots', 'ote')
        );
        
        /*
        $this->exactSearchFields = array();        
        $this->textSearchFields = array('garment_code', 'customer', 'type', 'color', 'do_number');    
        $this->rangeSearchFields = array(
            'size'    => array('szs', 'sze'),
            'date'    => array('ots', 'ote')
        );
        $this->havingSearchFields = array();   
        
        $this->defaultSortings = array(
            mogOutscanPeer::DATE_TIME => 'DESC',
            mogOutscanPeer::CUSTOMER => 'ASC',
            mogOutscanPeer::GARMENT_CODE => 'ASC',
            mogOutscanPeer::TYPE => 'ASC',
            //mogOutscanPeer::COLOR => 'ASC',
            //mogOutscanPeer::SIZE => 'ASC',
            mogOutscanPeer::DO_NUMBER => 'ASC'
        );
        */
        
        parent::__construct($columns, $sortBy, $sortOrder);   

    }
}