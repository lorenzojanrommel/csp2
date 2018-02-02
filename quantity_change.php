<?php
session_start();
if (isset($_POST['change_quantity'])) {
$qtty = $_SESSION['cart'];
$index = $_GET['index'];
$quant = $_POST['quant'];

$_SESSION['cart'][$index] = $quant;

header('location: cart_item.php');
}

?>