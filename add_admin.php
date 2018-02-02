<?php
session_start();
	require 'connectdb.php';
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$email = htmlspecialchars($_POST['email']);
	$mobile = htmlspecialchars($_POST['mobile']);
	$birthdate = htmlspecialchars($_POST['birthdate']);
	$gender = htmlspecialchars($_POST['gender']);
	$address = htmlspecialchars($_POST['address']);
	$username = htmlspecialchars($_POST['username']);
	$password = sha1($_POST['pass']);
	$user_level = 1;
	// echo $password;
	$sql = "INSERT INTO users (first_name, last_name, email, mobile_number, birthdate, gender, address, username, password, user_level, user_status) VALUES ('$fname', '$lname', '$email', '$mobile','$birthdate','$gender', '$address','$username', '$password', '$user_level', '1')";
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$results = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($results);
	$_SESSION['username'] = $username;
	$_SESSION['fname'] = $fname;
	$_SESSION['user_level'] = $user_level;
	$_SESSION['user_status'] = $row['user_status'];
	header('location: dashboard.php');
?>