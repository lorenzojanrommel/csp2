<?php
// start session
// session_start();
 
// remove items from the cart
// session_destroy();

	function display_title(){
		echo "Place Order";
	}
	function display_content(){
		echo "<div class='home-container white'>";
		echo "Thank you for Shopping <br>";
		echo "<a href='menu.php'><button class='btn blue'>Continue Shopping</button></a>";
		echo "</div>";
	}

	require 'template.php';
?>