<?php
class MyPager
{
	public static function GetStartDate($pcode)
	{
		$dt = substr($pcode, 0, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}

	public static function GetEndDate($pcode)
	{
		$dt = substr($pcode, 9, 8);
		return date('Y-m-d', mktime(1, 1, 1, strval(substr($dt, 4, 2)), strval(substr($dt, 6, 2)), strval(substr($dt, 0, 4)) ) );
	}	
	
	protected function var_dump($vars)
	{
		echo '<pre>';
		print_r($vars);
		echo '</pre>';
		return;
	}
}
