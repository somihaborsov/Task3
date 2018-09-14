<?php 


class UtilCalculations 
{
	public static function sqr($arg) 
	{
		return $arg * $arg;
	}
	
	//Является ли число простым
	public static function isPrime($num) 
	{
		if ($num == 1) return false;
		for ($i = 2; self::sqr($i) <= $num; $i++) 
		{
			if ($num % $i == 0) return false;
		}
		return true;
	}
}
?>