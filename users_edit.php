<?php
  $id = $_GET['id'];
  require 'connectdb.php';
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $level = mysqli_real_escape_string($conn, $_POST['level']);

  $sql = "UPDATE users SET
                  first_name = '$fname',
                  last_name = '$lname',
                  email = '$email',
                  mobile_number = '$mobile',
                  birthdate = '$birthdate',
                  gender = '$gender',
                  address = '$address',
                  -- username = '',
                  -- password = '',
                  user_level = '$level',
                  user_status = '$status'
                  WHERE id = '$id'";

  mysqli_query($conn, $sql) or die($mysqli_error($conn));
  header('location: user_list.php');
?>