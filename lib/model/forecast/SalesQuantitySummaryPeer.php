<?php

/**
 * Subclass for performing query and update operations on the 'sales_quantity_summary' table.
 *
 * 
 *
 * @package lib.model.finance
 */ 
class SalesQuantitySummaryPeer extends BaseSalesQuantitySummaryPeer
{
    
    public static function GetServiceListbyDate($sdt, $edt)
    {
       $c = new Criteria();
       $c->add(self::DATE_TRANSACTION,  'DATE(' . self::DATE_TRANSACTION . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE_TRANSACTION . ') <= \'' . $edt . '\'', Criteria::CUSTOM);
       $c->addGroupByColumn(self::PRODUCT_GROUP);
       $c->addAscendingOrderByColumn(self::PRODUCT_GROUP);
       $rs = self::doSelect($c);
       $list = array();
       foreach($rs as $rec)
       {
          $list[$rec->getProductGroup()] = $rec->getProductGroup();    
       }
       return $list;
    }
    
    public static function GetDataByProductGroupDateRange($prod, $sdt, $edt)
    {
        $c = new Criteria();
        $c->add(self::DATE_TRANSACTION,  'DATE(' . self::DATE_TRANSACTION . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE_TRANSACTION . ') <= \'' . $edt . '\'', Criteria::CUSTOM);
        $c->add(self::PRODUCT_GROUP, $prod);
        $rs = self::doSelect($c);
        return $rs;
    }

    public static function GetOptimizedDatabyProductGroupDate($prod, $cDate, $fldList)
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        foreach($fldList as $kf=>$vf)
        {
            switch(strtolower($vf))
            {
                case 'quantity':
                    $c->addSelectColumn(self::QUANTITY);                    
                    break;
            }
        }
        $c->add(self::PRODUCT_GROUP, $prod);
        $c->add(self::DATE_TRANSACTION, $cDate);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        while ($rs->next()) 
        {
            return $rs; // nr of column in select clause
        }
    }
    
	public static function GetSummarizedData($sdt, $edt)
	{
        
	    return array($iData, $eData);
	}
    
	public static function GetOptimizedDatabyProductGroupDateRange($sdt, $edt, $dept)
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(self::PRODUCT_GROUP);
        $c->add(self::DATE_TRANSACTION,  'DATE(' . self::DATE_TRANSACTION . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE_TRANSACTION . ') <= \'' . $edt . '\'', Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(self::PRODUCT_GROUP);
        $c->addJoin(ProductGroupToDepartmentPeer::PRODUCT_GROUP, self::PRODUCT_GROUP);
        foreach($dept as $ke=>$group)
        {
            if ($group)
            {
         	    $c->addor(ProductGroupToDepartmentPeer::DEPARTMENT, $group);
            }
        }
        //---------------------- Gloves not included
        $c->add(self::PRODUCT_GROUP, 'GLOVES', Criteria::NOT_EQUAL);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        $list = array();
        while ($rs->next()) 
        {
            $list[strtoupper($rs->get('PRODUCT_GROUP'))] = strtoupper($rs->get('PRODUCT_GROUP')); 
        }
        return array_unique($list);
    }
	
    public static function GetOptimizedDatabyProductGroupQuantityDateRange($prod, $sdt, $edt)
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(self::QUANTITY);
        $c->add(self::DATE_TRANSACTION,  'DATE(' . self::DATE_TRANSACTION . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE_TRANSACTION . ') <= \'' . $edt . '\'', Criteria::CUSTOM);                            
        $c->add(self::PRODUCT_GROUP, $prod);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        $tot = 0;
        while ($rs->next()) 
        {
            $tot = $tot + $rs->get('QUANTITY');
        }
        return $tot;
    }
    
    public static function GetDatabyByDateRange($sdt, $edt, $companyID)
    {
//     	var_dump($sdt);
//     	var_dump($edt);
//     	var_dump($companyID);
//     	exit();
    	$c = new Criteria();
    	$c->add(self::DATE_TRANSACTION,  'DATE(' . self::DATE_TRANSACTION . ') >= \'' . $sdt . '\' AND DATE(' . self::DATE_TRANSACTION . ') <= \'' . $edt . '\'', Criteria::CUSTOM);
    	$c->add(self::PRODUCT_GROUP, 'GLOVES', Criteria::NOT_EQUAL);
    	$c->add(self::COMPANY_ID, $companyID);
    	$c->addAscendingOrderByColumn(self::PRODUCT_GROUP);
    	$rs = self::doSelect($c);
    	$product = array();
    	foreach($rs as $r):
    		$product[$r->getProductGroup()] = 0;
    	endforeach;
    	
    	foreach($rs as $r):
    		$product[$r->getProductGroup()] += $r->getQuantity();
    	endforeach;
    	 
    	return $product;
    }
    
}
