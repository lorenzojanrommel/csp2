<?php
	$id = $_POST['id'];
    require 'connectdb.php';
    $sql = "SELECT * FROM users WHERE id = $id";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    extract($row);
    echo "<div class='col s12'>";
    echo "<form method='post' action='users_edit.php?id=$id'>"; //to save changes
    $address = ucwords($address);
    $first_name= ucwords($first_name);
    $last_name = ucwords($last_name);
    echo "<div class='col s12 m2 l2'>";
    echo "<strong class='user-details'>Name:</strong>";
    echo "</div>";
    echo "<div class='col s12 m5 l5'>";
    echo "<input type='text' name='fname' value='$first_name' required>";
    echo "</div>";
    echo "<div class='col s12 m5 l5'>";
    echo "<input type='text' name='lname' value='$last_name' required>";
    echo "</div>";
    echo "<div class='col s12 m2 l2 clearfix'>";
    echo "<br> <strong class='user-details'>Email: </strong>";
    echo "</div>";
    echo "<div class='col s10'>";
    echo "<input type='text' name='email' value='$email' required>";
    echo "</div>";
    echo "<div class='col s12 m2 l2 clearfix'>";
    echo "<strong class='user-details'>Mobile: </strong>";
    echo "</div>";
    echo "<div class='col s12 m4 l4'>";
    echo "<input type='text' name='mobile' value='$mobile_number' required>";
    echo "</div>";
    echo "<div class='col s12 m2 l2'>";
    echo "<strong class='user-details'>Birthdate: </strong>";
    echo "</div>";
    echo "<div class='col s12 m4 l4'>";
    echo "<input type='text' name='birthdate' class='datepicker' value='$birthdate' required>";
    echo "</div>";
    echo "<div class='col s12 m2 l2'>";
    echo "<strong class='user-details'>Gender: </strong>";
    echo "</div>";
    echo " <div class='input-field col s10'>
    <select name='gender' required>";
         if (isset($gender) && $gender == 'm') {
     echo "<option value='m' selected>Male</option>
      <option value='f'>Female</option>";
    }elseif($gender == f) {
     echo "<option value='f' selected>Female</option>
      <option value='m'>Male</option>";
    }
    echo"
    </select>
    </div>";
    echo "<div class='col s12 m2 l2 clearfix'>";
    echo "<strong class='user-details'>Address:</strong>";
    echo "</div>";
    echo "<div class='col s10'>";
    echo "<input type='text' name='address' value='$address' required>";
    echo "</div>";
    echo "<div class='col s12 m2 l2'>";
    echo "<strong> Status </strong>";
    echo "</div>";
    echo "<div class='col s12 m4 l4'>
    <select name='status' required>";
    if (isset($user_status) && $user_status == 1) {
     echo "<option value='1' selected>Active</option>
      <option value='2'>Deactivate</option>";
    }else {
     echo "<option value='2' selected>Deactivate</option>
      <option value='1'>Active</option>";
    }
    echo "
    </select>
    </div>";
    echo "<div class='col s12 m2 l2'>";
    echo "<strong> Level </strong>";
    echo "</div>";
    echo "<div class='col s12 m4 l4'>
    <select name='level' required>";
    if (isset($user_level) && $user_level == 1) {
     echo "<option value='1' selected>Admin</option>
      <option value='2'>Seller</option>
      <option value='3'>Customer</option>";
    }elseif($user_level == 2) {
     echo "<option value='2' selected>Seller</option>
      <option value='1'>Admin</option>
      <option value='3'>Customer</option>";
    }elseif($user_level == 3) {
     echo "<option value='3' selected>Customer</option>
      <option value='1'>Admin</option>
      <option value='2'>Seller</option>";
    }
    echo "
    </select>
    </div>";
    echo "<input type='submit' class='btn red del-btn' value='Save Update'></a>" ;
    echo "<a href='#!' class='modal-close'><input type='button' class='btn blue del-btn' value='Cancel'></a>" ;
    // echo "</div>";
    // echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
?>

<script type="text/javascript">
    //select status
 $(document).ready(function() {
    $('select').material_select();
  });
 //datepicker
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
    });
</script>
