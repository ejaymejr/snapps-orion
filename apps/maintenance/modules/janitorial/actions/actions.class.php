<?php

/**
 * janitorial actions.
 *
 * @package    snapps
 * @subpackage janitorial
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class janitorialActions extends SnappsActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {
        $this->redirect('janitorial/mcs');
    }

    public function executeAcro()
    {
        $this->setTemplate('add');
        
        $ds = $this->_G('date_record', date('Y-m-d'));
        
        $c = new Criteria();
        $c->add(JanitorialRecordPeer::DATE_RECORD, $ds);
        $c->add(JanitorialRecordPeer::SET_ID, 1);
        
        $this->record = JanitorialRecordPeer::doSelectOne($c);        
        
        if (!$this->record) {
            $this->record = new JanitorialRecord();
            $this->record->setDateRecord($ds);
            $this->recordItems = array();
            $this->record->setSetId(1);
        }
        
        
        
        $this->set = JanitorialSetPeer::retrieveByPK($this->record->getSetId());
        $this->setItems = $this->set->getJanitorialSetItems();        
        $this->setItemGroups = $this->set->getJanitorialSetGroups();
        
        $this->record->setSetName($this->set->getName());
        
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            
            $this->record->setVerifiedBy($this->_G('verified_by'));
            $this->record->setSupervisedBy($this->_G('supervised_by'));
            
            $this->record->save();
            
            foreach ($this->setItems as $si) {
                $inputName = 'cb_' . $si->getId();
                
                $c = new Criteria();
                $c->add(JanitorialRecordItemPeer::SET_ITEM_ID, $si->getId());
                $c->add(JanitorialRecordItemPeer::RECORD_ID, $this->record->getId());
                
                $ri = JanitorialRecordItemPeer::doSelectOne($c);
                if (!$ri) {
                    $ri = new JanitorialRecordItem();
                    $ri->setSetItemId($si->getId());
                    $ri->setRecordId($this->record->getId());
                }
                $ri->setStatus($this->_G($inputName, 0));
                
                $ri->save();
            }            
            
            $this->_SUC('Record saved.');
        }
        $this->recordItems = $this->record->getJanitorialRecordItems();
        
        $this->_S('id', $this->record->getId());
        $this->_S('set_id', $this->record->getSetId());
        $this->_S('date_record', $this->record->getDateRecord());
        $this->_S('verified_by', $this->record->getVerifiedBy());
        $this->_S('supervised_by', $this->record->getSupervisedBy());
        
        foreach ($this->setItems as $si) {
            $inputName = 'cb_' . $si->getId();
            $this->_S($inputName, false);
            
            if (is_array($this->recordItems) && sizeof($this->recordItems)) {
                foreach ($this->recordItems as $ri) {
                    if ($ri->getSetItemId() == $si->getId() && $ri->getStatus()) {
                        $this->_S($inputName, 1);
                    }
                }
            }
        }    
    }
    public function executeMcs()
    {
        $this->setTemplate('add');
        
        $ds = $this->_G('date_record', date('Y-m-d'));
        
        $c = new Criteria();
        $c->add(JanitorialRecordPeer::DATE_RECORD, $ds);
        $c->add(JanitorialRecordPeer::SET_ID, 2);
        
        $this->record = JanitorialRecordPeer::doSelectOne($c);        
        
        if (!$this->record) {
            $this->record = new JanitorialRecord();
            $this->record->setDateRecord($ds);
            $this->recordItems = array();
            $this->record->setSetId(2);
        }
        
        
        
        $this->set = JanitorialSetPeer::retrieveByPK($this->record->getSetId());
        $this->setItems = $this->set->getJanitorialSetItems();        
        $this->setItemGroups = $this->set->getJanitorialSetGroups();
        
        $this->record->setSetName($this->set->getName());
        
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            
            $this->record->setVerifiedBy($this->_G('verified_by'));
            $this->record->setSupervisedBy($this->_G('supervised_by'));
            
            $this->record->save();
            
            foreach ($this->setItems as $si) {
                $inputName = 'cb_' . $si->getId();
                
                $c = new Criteria();
                $c->add(JanitorialRecordItemPeer::SET_ITEM_ID, $si->getId());
                $c->add(JanitorialRecordItemPeer::RECORD_ID, $this->record->getId());
                
                $ri = JanitorialRecordItemPeer::doSelectOne($c);
                if (!$ri) {
                    $ri = new JanitorialRecordItem();
                    $ri->setSetItemId($si->getId());
                    $ri->setRecordId($this->record->getId());
                }
                $ri->setStatus($this->_G($inputName, 0));
                
                $ri->save();
            }            
            
            $this->_SUC('Record saved.');
        }
        $this->recordItems = $this->record->getJanitorialRecordItems();
        
        $this->_S('id', $this->record->getId());
        $this->_S('set_id', $this->record->getSetId());
        $this->_S('date_record', $this->record->getDateRecord());
        $this->_S('verified_by', $this->record->getVerifiedBy());
        $this->_S('supervised_by', $this->record->getSupervisedBy());
        
        foreach ($this->setItems as $si) {
            $inputName = 'cb_' . $si->getId();
            $this->_S($inputName, false);
            
            if (is_array($this->recordItems) && sizeof($this->recordItems)) {
                foreach ($this->recordItems as $ri) {
                    if ($ri->getSetItemId() == $si->getId() && $ri->getStatus()) {
                        $this->_S($inputName, 1);
                    }
                }
            }
        }    
    }
}
