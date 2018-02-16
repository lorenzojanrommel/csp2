<?php
// start session
// session_start();
 
// remove items from the cart
// session_destroy();

	function display_title(){
		echo "Place Order";
	}
	function display_content(){
		echo "<div class='container white'>";
		echo "<div class='row'>";
		echo "<div class='col s12'>";
		echo "Thank you for Shopping <br>";
		echo "<a href='menu.php'><button class='btn blue'>Continue Shopping</button></a>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}

	require 'template.php';
?>