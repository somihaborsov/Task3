<?php
    require_once '../../app/connect_db.php';
    
  
	if(isset($_GET['submit_search'])){

	$query = "SELECT * FROM products INNER JOIN prices ON products.product_id = prices.product_id WHERE products.product_name LIKE '%" . $_GET["search"] . "%' AND prices.price_type = 'В городе'";
	$stmt = $pdo->query($query);
	echo '<table>';
	while($value = $stmt->fetch()) {
		echo '<tr><td>' . $value['product_name'] . '</td><td>' . $value['price_value'] . '</td></tr>';
	}
	echo '</table>';

}
	
	
	
	
	
?>