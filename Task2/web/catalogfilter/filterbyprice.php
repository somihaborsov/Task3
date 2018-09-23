<?php
require_once '../../app/connect_db.php';

	if(isset($_GET['submit_price_filter'])) {
		$count = 0;
		if(($_GET['from'] > $_GET['to'] && !empty($_GET['to'])) || $_GET['from'] < 0 || $_GET['to'] < 0) {
			echo 'Вы ввели неверные суммы<br><br>';
			$query = "SELECT * FROM prices INNER JOIN products "
					. "ON prices.product_id = products.product_id WHERE price_type = 'В городе'";
		}
		else if (empty($_GET['from']) && empty($_GET['to']))	{
			$query = "SELECT * FROM prices INNER JOIN products "
					. "ON prices.product_id = products.product_id WHERE price_type = 'В городе'";
		}
		else if (empty($_GET['from'])) {
			$query = "SELECT * FROM prices INNER JOIN products "
					. "ON prices.product_id = products.product_id "
					. "WHERE price_type = 'В городе' AND prices.price_value <= '" . $_GET['to'] . "'";
		}
		else if (empty($_GET['to'])) {
			$query = "SELECT * FROM prices INNER JOIN products "
					. "ON prices.product_id = products.product_id "
					. "WHERE price_type = 'В городе' AND prices.price_value >= '" . $_GET['from'] . "'";	
		}
		else if (!empty($_GET['from']) && !empty($_GET['to'] && $_GET['from'] < $_GET['to'])) {
			$query = "SELECT * FROM prices INNER JOIN products "
					. "ON prices.product_id = products.product_id "
					. "WHERE price_type = 'В городе' AND prices.price_value BETWEEN '" . $_GET['from'] . "' AND '" . $_GET['to'] . "'";
		}
			
		$stmt = $pdo->query($query);
		while ($catalog = $stmt->fetch()) {
			echo $catalog['product_name'] . ' ' . $catalog['price_value'] . '<br>';
			$count++;
		}
	
		if ($count == 0) {
			echo 'Ничего не найдено!';
		}
	}
	
	
	
	
	
	
	
	

?>
