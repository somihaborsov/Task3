<?php

	require_once '../../app/errorhandler.php';
	require_once '../../app/connect_db.php';
    
   

	if(isset($_POST["submit"])){
		$xml = simplexml_load_file($_FILES['fileToUpload']['tmp_name']);
		
		
		//Добавляем данные из xml в таблицу products
		$insert_products = $pdo->prepare('INSERT INTO products (product_code, product_name) VALUES (?, ?)');
		foreach($xml as $key=>$value) {
			$product_code = (string) $value->attributes()['Код'];
			$product_name = (string) $value->attributes()['Название'];
			$insert_products->bindParam(1, $product_code);
			$insert_products->bindParam(2, $product_name);
			$insert_products->execute();
			echo 'Добавлена запись в таблицу товаров!' . "<br>";
		}
		echo "<br>";
		
		//Добавляем данные из xml в таблицу prices
		$insert_prices = $pdo->prepare('INSERT INTO prices(product_id, price_type, price_value) VALUES(?, ?, ?)');
		
		foreach ($xml as $value) {
			foreach ($value as $value2) {
				if ($value2->getName() == 'Цена') {
					$stmt = $pdo->query("SELECT * FROM products WHERE product_name = '" . $value['Название'] . "'");
					$product_id = $stmt->fetchColumn();
					$price_type = $value2['Тип'];
					$price_value = $value2;
					$insert_prices->bindParam(1, $product_id);
					$insert_prices->bindParam(2, $price_type);
					$insert_prices->bindParam(3, $price_value);
					$insert_prices->execute();
					echo 'Добавлена запись в таблицу цен!' . "<br>";
				}
			}
		}
		echo "<br>";
			
		//Добавляем данные из xml в таблицу features
		$insert_features = $pdo->prepare('INSERT INTO features (product_id, feature_type, feature_value) VALUES (?, ?, ?)');
		
		foreach ($xml as $value) {
			foreach ($value as $value2) {
				foreach ($value2 as $value3){
					if ($value2->getName() == 'Свойства') {
						$stmt = $pdo->query("SELECT * FROM products WHERE product_name = '" . $value['Название'] . "'");
						$product_id = $stmt->fetchColumn();
						$feature_type = $value3->getName();
						$feature_value = $value3;
						$insert_features->bindParam(1, $product_id);
						$insert_features->bindParam(2, $feature_type);
						$insert_features->bindParam(3, $feature_value);
						$insert_features->execute();
						echo 'Добавлена запись в таблицу свойств!' . "<br>";
					}
				}
			}
		}
		echo "<br>";
		
	//Добавляем данные из xml в таблицу products_headings
$insert_headings = $pdo->prepare('INSERT INTO products_headings (product_id, heading_id) VALUES (?, ?)');
		
		foreach ($xml as $value) {
			foreach ($value as $value2) {
				foreach ($value2 as $value3){
					if ($value2->getName() == 'Разделы') {
						$stmt = $pdo->query("SELECT * FROM products WHERE product_name = '" . $value['Название'] . "'");
						$product_id = $stmt->fetchColumn();
						$stmt1 = $pdo->query("SELECT * FROM headings WHERE heading_name = '" . $value3 . "'");
						$heading_id = $stmt1->fetchColumn();
						$insert_headings->bindParam(1, $product_id);
						$insert_headings->bindParam(2, $heading_id);
						$insert_headings->execute();
						echo 'Добавлена запись в таблицу разделов!' . "<br>";
					}
				}
			}
		}
		
	}   
?>