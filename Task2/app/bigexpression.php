<?php 

require_once 'calculator.php';

class BigExpression 
{	
	// Вычисление числа f в массиве и добавление в соотв. строку
	public  function findAndAddF(&$array)
	{
		foreach ($array as &$value) 
		{
			$value['f'] = $value['a'] * Calculator::ext($value['b'], $value['c']) + Calculator::ext((Calculator::ext(($value['a'] / $value['c']), $value['b']) % 3), Calculator::getMin($value['a'], $value['b'], $value['c']));
		}
	}
	
	//реализуем расчет по формуле f2=((a+b)^c*(a/c)^min(a,b,c))
	public  function findSecondF($array) 
	{
		foreach ($array as $value) 
		{
			$f = Calculator::ext (Calculator::ext($value['a'] + $value['b'], $value['c']) * ($value['a'] / $value['c']), Calculator::getMin($value['a'], $value['b'], $value['c'])); 
		echo $f . '<br>';
		}
	}
}
?>