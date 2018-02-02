<?php
	
	$index = $_GET['index'];
	require 'connectdb.php';
	$sql = "DELETE FROM products WHERE id = $index";
	mysqli_query($conn, $sql) or die(mysqli_error($conn));
	//delete task form the array $todos
	unset($items[$index]);

	header('location: menu.php');
?>