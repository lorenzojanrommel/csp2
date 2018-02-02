<?php
	$index = $_POST['index'];
    require 'connectdb.php';
    $sql = "SELECT * FROM products WHERE id = $index";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    extract($row);
    // echo "<div class='col s4'>";
    echo "<form method='post' action='delete.php?index=$index'>"; //to save changes
    // echo "<div class='card'>";
    // echo "<div class='card-img'>";
    echo "<img class='product-image' src='".$image."'><br>";
    // echo "</div>";
    echo "<div class='card-content'>";
    echo "<h5>$name</h5>";
    echo "$description<br>";
    echo "$price<br>";
    echo "<input type='submit' class='btn red atc' value='Yes'></a>" ;
    echo "<a href='#!' class='modal-close'><input type='button' class='btn blue atc' value='No'></a>" ;
    // echo "</div>";
    // echo "</div>";
    echo "</form>";
    // echo "</div>";
    echo "</div>";
?>