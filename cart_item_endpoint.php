<?php
session_start();

	$quantity = $_POST['item_qtty']; // quantity from the form
	$index = $_GET['index']; // index of item to be added to $_SESSION['cart'];

	// if (isset($_SESSION['cart'][$index])) {
	//  echo $_SESSION['cart'][$index] += $quantity;
	// }else {
	// $_SESSION['cart'][$index] = $quantity;
	// };
	//ternary
	$_SESSION['cart'][$index] =
	isset($_SESSION['cart'][$index]) ?
	$_SESSION['cart'][$index] + $quantity : 
	$quantity;

		
	// echo count($_SESSION['cart']);
	// print_r($_SESSION['cart']);
	header('location: menu.php')
     // require "partials/head.php"
?>