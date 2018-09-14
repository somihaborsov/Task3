<?php 
require_once 'utilcalculations.php';

class Calculator 
{
	// Количество простых чисел от .. и до ..
	public function countSimpleNumbers($from, $to) 
	{
		$count = 0;
		for ($i = $from; $i <= $to; $i++)
		{
			if (UtilCalculations::isPrime($i)) {
			$count++;
			}
		}
		return $count;
	}

	//Вычисляем площадь трапеции и добавляем в массив с ключом 's'
	public function findAndAddSquaire(&$array) 
	{
		foreach ($array as &$value) 
		{
			$value['s'] = 0.5 * ($value['a'] + $value['b']) * $value['c'];
		}
	}


	// размеры трапеции, у которой максимальная площадь, но не больше 1400 (do{}while();).
	public function getMaxSquaire($array)
	{
		$maxsq = $array[0]['s'];
		$i = 0;
		$biggestArr = 0;
		do {
			if ($array[$i]['s'] >= 1400) break;
			if ($array[$i]['s'] > $maxsq) $maxsq = $array[$i]['s'];
			$biggestArr = $array[$i];
			$i++;
		}
		while($i < count($array));
		return $biggestArr;
	}

	//Возведение в степень
	public static function ext($arg, $degree) 
	{
		$result = 0;
		if ($degree == 0) {
			$result = 1;
			return $result;
		} 
		elseif ($degree == 1) {
			$result = $arg;
			return $result;
		} 
		elseif ($degree < 0 || $arg < 0) {
			return "числа должны быть положительными";	
		}
		elseif ($degree > 1) {						
			$result = $arg;
			for ($i = 2; $i <= $degree; $i++)
			{
				$result *= $arg;
			}
			return $result;	
		} 
	} 

	//Минимальное значение в массиве
	public static function getMin(...$array) 
	{
		$min = $array[0];
		foreach ($array as $value) 
		{
			if ($min > $value) {
				$min = $value;
			}
		}
		return $min;
	}

	//добавляем в массивы с нечетными значениями площади соответствующие значения с ключом flag
	public function addFlag(&$array) 
	{
		foreach ($array as &$value)
		{ 
			if ($value['s'] % 2 != 0) {
				$value['flag'] = 'нечетное';
			}
			else $value['flag'] = '';
		}
	}
	
	public function reverseSecondSubstring($haystack, $needle)		{

		if (substr_count($haystack, $needle) == 2) {

		return substr_replace($haystack, strrev($needle), strripos($haystack, $needle), strlen($needle));

		}

		else return "количество подстрок не равно двум";

	}

}
?>