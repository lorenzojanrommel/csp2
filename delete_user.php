<?php
	
	$id = $_GET['id'];
	require 'connectdb.php';
	$sql = "DELETE FROM users WHERE id = $id";
	mysqli_query($conn, $sql) or die(mysqli_error($conn));

	header('location: user_list.php');
?>