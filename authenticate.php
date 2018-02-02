<?php
session_start();
require 'connectdb.php';
if (isset($_POST['login'])) {
	$username = htmlspecialchars($_POST['username']);
	$password = sha1($_POST['password']);
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$results = mysqli_query($conn, $sql);
	if (mysqli_num_rows($results)>0) {
		$row = mysqli_fetch_assoc($results);
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_level'] = $row['user_level'];
		$_SESSION['user_status'] = $row['user_status'];
		$_SESSION['fname'] = $row['first_name'];
		$_SESSION['lname'] = $row['last_name'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['mobile'] = $row['mobile_number'];
		if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1 && $_SESSION['user_status'] == 1) {
		header('location: dashboard.php');
		}elseif(($_SESSION['user_level'] == 2 || $_SESSION['user_level'] == 3) && $_SESSION['user_status'] == 1){
		header('location: home.php');
		}elseif ($_SESSION['user_status'] == 2) {
		// header('location: logout.php');
		header('location: home.php');
		}
	}else {
		
		header('location: home.php');
	}
}
if (isset($_POST['register'])) {
	$username = htmlspecialchars($_POST['username']);
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$results = mysqli_query($conn, $sql);
	if (mysqli_num_rows($results)>0) {
		echo "invalid";
	}else {
		echo "valid";
	}
}
?>


<script type="text/javascript">
	$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  })
</script>
		 	<!-- alert('Your Account Has Been Deactivate. Contact us for more info'); -->
