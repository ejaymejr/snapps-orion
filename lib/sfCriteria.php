<?php
class sfCriteria extends Criteria {
  
  private $myOrderByColumns = array();
  
  /**
   * Add an ORDER BY FIELD clause.
   *
   * @param String $name The field to order by.
   * @param Array $elements A list to order the elements by.
   * @return unknown
   */
  public function addOrderByField($name, $elements)
  {
    $this->myOrderByColumns[] = ' FIELD(' . $name . ', "' . implode('", "', $elements)  . '" )';
    return $this;
  }
  
  public function getOrderByColumns(){
    return array_merge( $this->myOrderByColumns, parent::getOrderByColumns() );
  }
  
  public function clearOrderByColumns() {
  	$this->myOrderByColumns=array();
  	return parent::clearOrderByColumns();
  }
  
  public function addOrderByCase($name, $elements)
  {
  	$cases = '';
  	$orderNo = 2;
  	$firstOrderArg = '';
  	$cases .= "CASE";
  	$pos = 1;
  	foreach($elements as $e):
  		$cases .= " WHEN ".$name." = '".$e."' then ".$orderNo++ . " ";
  		$firstOrderArg .= $name . " <> '".$e."' " ;
  		if ( $pos < sizeof($elements)):
  			$firstOrderArg .= ' or ';
  			$pos ++;
  		endif;  
  	endforeach;
  	$cases .= " WHEN ( ".$firstOrderArg." ) then 1 ";
//   	HTMLLib::vardump ($orderNo);
//   	HTMLLib::vardump (sizeof($elements));
//   	HTMLLib::vardump($firstOrderArg);
//  	exit();
  	$cases .= "END ";
  	$this->myOrderByColumns[] = $cases;
  	return $this;
  }
  
}
