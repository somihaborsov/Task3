	<?php 
	require_once 'utilcalculations.php';

class Calculator 
{
	// Количество простых чисел от .. и до ..
	public function countSimpleNumbers($from, $to) 
	{
		if (!is_numeric($from) || !is_numeric($to)) throw new Exception('Аргумент не является числом!');
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
		if ($degree < 0|| $arg < 0) {
			throw new Exception('Значения аргументов могут быть только неотрицательными!');
		}
		if ($degree == 0) {
			$result = 1;
			return $result;
		} 
		elseif ($degree == 1) {
			$result = $arg;
			return $result;
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
			if (!is_numeric($value)) {
				throw new Exception('Аргумент не является числом!');
			}
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
	
	//Замена второго вхождения на инвертированную подстроку
	public function reverseSecondSubstring($haystack, $needle) {

		if (substr_count($haystack, $needle) == 2) {

		return substr_replace($haystack, strrev($needle), strripos($haystack, $needle), strlen($needle));
		}
		else {
			throw new Exception('Количество подстрок не равно двум!');
		}

	}
	
	//Сортировка двумерных массивов по заданному ключу в указанном направлении
	public function mySort(&$array, $key, $isAsc) {
		//Проверяем, во всех ли строках массива есть нужный ключ
		foreach ($array as $val) {
			if (!isset($val[$key])) {
				throw new Exception('Ключ отсутствует в одной или более строк массива');
			}
		}
		
		$tempArray = array_column($array, $key);
		if (!isset($key)) throw Exception("wtf");
		if ($isAsc == TRUE) {
			return array_multisort($tempArray, SORT_NUMERIC, $array);
		}
		else {
		return array_multisort($tempArray, SORT_NUMERIC, SORT_DESC, $array);
		}
	}	
}
?>