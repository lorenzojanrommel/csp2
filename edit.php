<?php
  $index = $_GET['index'];
  require 'connectdb.php';
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);

  $sql = "UPDATE products SET
                  name = '$name',
                  description = '$description',
                  price = '$price'
                  WHERE id = '$index'";

  mysqli_query($conn, $sql) or die($mysqli_error($conn));
  header('location: menu.php');
?>