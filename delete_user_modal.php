<?php
	$id = $_POST['id'];
    require 'connectdb.php';
    $sql = "SELECT * FROM users WHERE id = $id";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    extract($row);
    // echo "<div class='col s12'>";
    echo "<form method='post' action='delete_user.php?id=$id'>"; //to save changes
    // echo "<div class='card'>";
    // echo "<div class='card-img'>";
    // echo "<img class='product-image' src='".$image."'><br>";
    // echo "</div>";
    // echo "<div class='card-content'>";
    $address = ucwords($address);
    $first_name= ucwords($first_name);
    $last_name = ucwords($last_name);
    echo "<strong class='delete-user-details'>Name:</strong> $first_name $last_name";
    echo "<br> <strong class='delete-user-details'>Email: </strong>$email<br>";
    echo "<strong class='delete-user-details'>Mobile: </strong>$mobile_number<br>";
    echo "<strong class='delete-user-details'>Address:</strong> $address<br>";
    if (isset($user_status) && $user_status ==1) {
        echo "<strong class='delete-user-details'>Status:</strong> Active <br>";
    }else {
        echo "<strong class='delete-user-details'>Status:</strong> Deactive <br>";
    }
    echo "<input type='submit' class='btn red del-btn' value='Yes'></a>" ;
    echo "<a href='#!' class='modal-close'><input type='button' class='btn blue del-btn' value='No'></a>" ;
    // echo "</div>";
    // echo "</div>";
    echo "</form>";
    // echo "</div>";
    echo "</div>";
?>