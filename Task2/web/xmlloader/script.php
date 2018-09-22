<?php

require_once '../../app/errorhandler.php';
require_once '../../app/connect_db.php';

	$xml = "<?xml version=\"1.0\"  encoding=\"utf-8\" ?>\n";
	$xml .= "<Товары>\n";

	//Заполняем xml данными о товаре
	$query_products = "SELECT * FROM products";
	$statement_products = $pdo->query($query_products);
	while($catalog_products = $statement_products->fetch()) {
		$xml .= "\t<Товар Код=\"" . $catalog_products['product_code'] . "\" Название=\"" . $catalog_products['product_name'] . "\">\n";	
	
		//Заполняем xml данными о ценах
		$query_prices = "SELECT * FROM prices WHERE product_id = '" . $catalog_products['product_id'] . "'";
		$statement_prices = $pdo->query($query_prices);
		while($catalog_prices = $statement_prices->fetch()) {
			$xml .= "\t\t<Цена Тип=\"" . $catalog_prices['price_type'] . "\">" . $catalog_prices['price_value'] . "</Цена>\n";
		}
		
		//Заполняем xml данными о свойствах
		$query_features = "SELECT * FROM features WHERE product_id = '" . $catalog_products['product_id'] . "'";
		$statement_features = $pdo->query($query_features);
		$xml .= "\t\t<Свойства>\n";
		while($catalog_features = $statement_features->fetch()) {
			$xml .= "\t\t\t<" . $catalog_features['feature_type'] . ">" . $catalog_features['feature_value'] . "</" . $catalog_features['feature_type'] . ">\n";
		}
		$xml .= "\t\t</Свойства>\n";

		//Заполняем xml данными о разделах
		$query_headings = "SELECT * from headings INNER JOIN products_headings ON headings.heading_id = products_headings.heading_id WHERE product_id = '" . $catalog_products['product_id'] . "'";
		$statement_headings = $pdo->query($query_headings);
		$xml .= "\t\t<Разделы>\n";
		while($catalog_headings = $statement_headings->fetch()) {
			$xml .= "\t\t\t<Раздел>" . $catalog_headings['heading_name'] . "</Раздел>\n";
		}
		$xml .= "\t\t</Разделы>\n";
		$xml .= "\t</Товар>\n";
	}


	$xml .= "</Товары>";


	file_put_contents("output.xml", $xml);
	echo "Файл создан!";
?>
