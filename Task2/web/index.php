<?php 

require_once '../app/bigexpression.php';
require_once '../app/calculator.php';
require_once '../app/printer.php';
require_once '../app/utilcalculations.php';
require_once '../app/errorhandler.php';
require_once '../app/connect_db.php';

// регистрируем свой обработчик ошибок и исключений.
(new ErrorHandler)->register();


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
	echo $calc->countSimpleNumbers(10, 53) . '<br><br>';
		
 	echo 'Написать функцию возведения в степень (например 3 в 3).<br>';
	echo Calculator::ext(3, 3) . '<br><br>';
	
	echo "Написать функцию определения минимального числа в массиве (3, 'aa', 16, 5)<br>";
	echo '(Пример обработки исключения с помощью try...catch)<br>';
	try{
	echo Calculator::getMin(3, 'aa', 16, 5) . '<br><br>';
	}
	catch (Exception $e) {
		echo '<div style="border-style:inset; border-width:2">';
		echo 'Поймали исключение<br><br>';
        echo 'Сообщение: ' . $e->getMessage() . '<br><br>';
		echo "</div>";
	}
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
	echo $calc->reverseSecondSubstring('abcdbce', 'bc') . '<br><br>';
		
	//реализовать сортировку двумерных массивов по заданному ключу в указанном направлении
	
	$arrayForSort =	array (array ('a' => 3),

                           array('a' => 2, 'b' => 8),

                           array('a' => 4, 'b' => 11, 'c' => 7),

                           array('a' => 1, 'b' => 2, 'c' => 3),
						   );
	
	$calc->mySort($arrayForSort, 'a', True);
	var_dump($arrayForSort);

//echo 'Генерируем предупреждение';
//filemtime("test");
	?>