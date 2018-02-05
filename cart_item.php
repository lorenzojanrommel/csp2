<?php
function display_title() {
	echo "Cart Items || Bacabac Farmers Producer Cooperative";
}
function display_content(){
// session_start();
require 'connectdb.php';
if (isset($_SESSION['cart'])) {
$qtty = $_SESSION['cart'];
$total = 0;
foreach ($qtty as $index => $item) {
// if (isset($index)) {
$sql = "SELECT * FROM products WHERE id = '$index'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($results);
extract($row);
if (is_numeric($price) && is_numeric($item)) {
	$subtotal = $price * $item;
}else{
	$subtotal = 0;
	$mes = "<small>  Your Item Quantity is 0 </small>"; 
}
$total += $subtotal;
echo "<form method='post' action='quantity_change.php?index=$index'>";
echo "<div class='col s12 m6 l6'>";
echo "<div class='card'>";
echo "<div class='card-img'>";
echo "<form method='post' action='quantity_change.php?index=$index'>";
echo "<img class='product-image' src='".$image."'><br>";
echo "</div>";
echo "<div class='card-content'>";
echo "<div class='col s12'>";
echo "<h5 style='color:#ab47bc;'>" .$name. "</h5>";
echo "</div>";
echo "<div class='col s12'>";
echo $description;
echo "</div>";
echo "<div class='col s12'>";
echo "<span style='color:#0d47a1;'> Price: </span> ₱" .$price;
echo "</div>";
echo "<div class='col s12'>";
echo "<br> Quantity: <input type='number' name='quant' min='1' value='$item'>";
echo "</div>";
echo "<div class='col s12'>";
echo "Total price: ". $subtotal;
echo "</div>";
if ($item == 0) {
	echo "<div class='req'> $mes </div>";
}
echo "<input type='submit' class='btn cart-btn indigo darken-4' name='change_quantity' value='Change Quantity'>";
echo "<a href='delete_cart_item.php?index=$index'class='modal-close'><input type='button' class='btn red cart-btn' value='Remove From Cart'></a>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
}
if (isset($total) && $total != 0) {		
echo "<div class='clearfix center'>";
echo "<br>";
echo "<h4> Total:" .$total. "</h4>";
echo "<a href='menu.php'><input type='button' class='btn green total-btn' value='Continue Shopping'></a>";
echo "<a href='cart_proceed.php'><input type='button' class='btn blue total-btn' value='Proceed to Checkout'></a>";
echo "</div>";
}elseif(!isset($item)){
	echo "<small class='req'> Your cart is empty </small>";	
};
}else{
	echo "<div class='home-container white'>";
	echo "<small class='req'> Your cart is empty </small>";
	echo "</div>";
}
};
require 'template.php';
?>
