<?php


class HrEmployeeDataGrid extends SnappsDataGrid
{
    
    function __construct($configFile = false, $pager = false, $criteria = false)
    {
        parent::__construct($configFile, $pager, $criteria);
    }
    
    public function processRow()
    {
        $this->rows = array();
        if (!$this->pager) {
            return;
        }
        $SN = $this->pager->getFirstIndice();
        foreach ($this->pager->getResults() as $record) {
            
            $row = array();           
        
            $editLink = 'Edit';
            $deleteLink = 'Delete';                               
            
            
            $row['sn'] = array($SN, '', '', '');            
            $row['record_id'] = array($record->getId(), '', '', '');            
            $row['employee_no'] = array($record->getEmployeeNo(), '', '', '');
            $row['date_modified'] = array($record->getDateModified('j M Y H:i:s'), '', '', '');
            
            $row['blank'] = array('&nbsp;', '', '', '');            
            $row['_dbobject_raw'] = $record->toArray(BasePeer::TYPE_NUM);

            $this->rows[] = $row;
            $SN++;
        }
    }
}