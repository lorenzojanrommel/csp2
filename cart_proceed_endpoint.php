<?php 
	require 'connectdb.php';
	session_start();
	$customer_id = $_SESSION['user_id'];
	$total = htmlspecialchars($_POST['total_price']);
	$order_status = 1;
	$sql = "INSERT INTO orders (user_id, total_price, id_status) VALUES ('$customer_id', '$total', '$order_status')";
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$user_id = mysqli_insert_id($conn);
	// print_r($_SESSION['cart']);
	foreach ($_SESSION['cart'] as $ids => $value) {
		echo "<br>";
		$sql = "SELECT * FROM products WHERE id = '$ids'";
		$results = mysqli_query($conn, $sql);
		$pquantity = htmlspecialchars($value);
		while ($row = mysqli_fetch_assoc($results)) {
			extract($row);
			$sql = "INSERT INTO order_details (product_id, quantity, order_id) VALUES ('$ids', '$pquantity', '$user_id')";
		}
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	}
	unset($_SESSION['cart']);
	header('location: place_order.php')
 ?>