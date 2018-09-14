<?php 

require_once '../app/bigexpression.php';
require_once '../app/calculator.php';
require_once '../app/printer.php';
require_once '../app/utilcalculations.php';


	$arr = array(array('a' => 11, 'b' => 13, 'c' => 17), 
				 array('a' => 19, 'b' => 23, 'c' => 29),
				 array('a' => 31, 'b' => 37, 'c' => 41),
				 );

	var_dump($arr);
	echo "<br><br>";


	$calc = new Calculator();
	$printer = new Printer();
	$bigExp = new BigExpression();

	echo "Вычисляем площадь трапеции и добавляем в массив с ключом 's'<br>";
	$calc->findAndAddSquaire($arr);
	var_dump($arr);
	echo '<br><br>';

	echo 'Вывести размеры трапеции, у которой максимальная площадь, но не больше 1400 (do{}while();<br>'; 	
	print_r($calc->getMaxSquaire($arr));
	echo '<br><br>';

	echo 'Посчитать количество простых чисел в диапазоне от 10 до 53 <br>';
	echo $calc->countSimpleNumbers(10, 53) . "<br><br>";

	echo 'Написать функцию возведения в степень (например 3 в 3).<br>';
	echo Calculator::ext(3, 3) . '<br><br>';

	echo 'Написать функцию определения минимального числа в массиве (3, 2, 16, 5)<br>';
	echo Calculator::getMin(3, 2, 16, 5) . '<br><br>';

	echo 'Написать функцию расчета по формуле f=(a*b^c+(((a/c)^b)%3)^min(a,b,c)) используя написанные ранее функции. Посчитать по данной формуле ранее посчитанные массивы. Циклом, используя ссылки, отметить все трапеции, чья площадь нечетное значение.';
	$bigExp->findAndAddF($arr);
	$calc->addFlag($arr);
	var_dump($arr);

	echo '<br><br> Вторая формула f2=((a+b)^c*(a/c)^min(a,b,c)<br>';
	$bigExp->findSecondF($arr);

	echo 'организуем вывод в табличном виде<br>';
	$printer->printTable($arr);
	echo '<br><br>';
	
	echo 'если строка содержит 2 подстроки, то замена второго вхождения на инвертированную подстроку<br>';
	echo $calc->reverseSecondSubstring('abcdbce', 'bc');
	?>