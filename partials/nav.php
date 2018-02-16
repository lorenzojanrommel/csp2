<?php session_start(); 
$username = isset($_SESSION['username']) ? //if
            $_SESSION['username']           //true
            : "";                           //false

?>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="nav-wrapper indigo darken-4">
      <div class="container">
      <a href="index.php" class="brand-logo">BFPC</a>
        <a href="#" data-activates="sidenav" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <?php if (isset($_SESSION['username']) && $_SESSION['user_level'] == 3) {
        ?>
      <ul class="right show-on-med-and-down hide-on-large-only">
            <?php if (!isset($_SESSION['cart'])) {
             echo "<li><a href='cart_item.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>";
             }else{
             echo "<li><a href='cart_item.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i><span class='badge'>".count($_SESSION['cart']) ."</span></a></li>";
             }
      }else{
        ?>
        <ul class="right show-on-med-and-down">
        <?php
        if (isset($_SESSION['username']) && $_SESSION['user_level'] == 2) {
        echo "<li><a href='view_profile.php'><i class='fa fa-user-o' aria-hidden='true'></i></a></li>";
        }else{
          echo "";
        }
      } ?>
      </ul>
      <ul class="right hide-on-med-and-down">
      <?php if (isset($_SESSION['username']) && $_SESSION['user_level'] == 1 && $_SESSION['user_status'] == 1) {
      ?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="user_list.php">Users List</a></li>
        <li><a href="register_admin.php">Add Admin</a></li>
        <?php 
          if(isset($_SESSION['username'])){
            echo '<li><a href="#" class="dropdown-button" data-activates="logout_dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> '. $_SESSION['fname']. ' <i class="fa fa-sort-desc" aria-hidden="true"></i></a></li>';
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }elseif (isset($_SESSION['username']) &&  $_SESSION['user_level'] == 3
          && $_SESSION['user_status'] == 1) {
         ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about.php">About</a></li>
         <?php
          if(isset($_SESSION['username']) && $_SESSION['user_status'] == 1){
             echo '<li><a href="#" class="dropdown-button" data-activates="logout_dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> '. $_SESSION['fname']. ' <i class="fa fa-sort-desc" aria-hidden="true"></i></a></li>';
             if (!isset($_SESSION['cart'])) {
             echo "<li><a href='cart_item.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>";
             }else{
             echo "<li><a href='cart_item.php'><i class='fa fa-shopping-cart' aria-hidden='true'></i><span class='badge white'>".count($_SESSION['cart']) ."</span></a></li>";
             }
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }else {
          ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about.php">About</a></li>
         <?php
          if(isset($_SESSION['username']) && $_SESSION['user_status'] == 1){
             echo '<li><a href="#" class="dropdown-button" data-activates="logout_dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> '. $_SESSION['fname']. ' <i class="fa fa-sort-desc" aria-hidden="true"></i></a></li>';
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }
        ?>
      </ul>
      <ul class="side-nav" id="sidenav">
       <?php if (isset($_SESSION['username']) && $_SESSION['user_level'] == 1 && $_SESSION['user_status'] == 1) {
        ?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="user_list.php">Users List</a></li>
        <li><a href="register_admin.php">Add Admin</a></li>
        <?php 
          if(isset($_SESSION['username']) && $_SESSION['user_status'] == 1){  
            echo "<li><a href='logout.php'>Log Out</a></li>";
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }elseif(isset($_SESSION['username']) &&  ($_SESSION['user_level'] == 2
          || $_SESSION['user_level'] == 3) && $_SESSION['user_status'] == 1){
            ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
            <?php
          if(isset($_SESSION['username']) && $_SESSION['user_status'] == 1){  
            echo "<li><a href='logout.php'>Log Out</a></li>";
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }else{
          ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
          <?php
          if(isset($_SESSION['username']) && $_SESSION['user_status'] == 1){
             echo '<li><a href="#" class="dropdown-button" data-activates="logout_dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> '. $_SESSION['fname']. ' <i class="fa fa-sort-desc" aria-hidden="true"></i></a></li>';
          }else {
            echo "<li><a class='modal-trigger render_modal' href='#login'>Log in</a></li>";
          }
        }
        ?>
      </ul>

    </div>
  </nav>

  <!-- Dropdown Structure -->
  <ul id='logout_dropdown' class='dropdown-content'>
    <li class="indigo darken-4 logout-user" selected disabled><?php echo'<i class="fa fa-user-o" aria-hidden="true"></i> '. $_SESSION['fname']; ?></li>
    <li class="divider"></li>
    <li><a href="view_profile.php">Your Profile</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

      <!-- Modal Structure -->
  <div id="login" class="modal modal-fixed-footer modal-login">
    <div class="modal-content">
      <h4 class="center">Login</h4>
      <div class="modal-body" id="login-modal-body">
    <form action="authenticate.php" method="POST">
      <div class="row">
        <!-- <div class="col s3"></div> -->
        <div class="input-field col s12">
          <i class="fa fa-user-circle fa-2x prefix" aria-hidden="true"></i>
          <input name="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
        <!-- <div class="col s3"></div> -->
        <!-- <div class="col s3 clearfix"></div> -->
        <div class="input-field col s12">
          <i class="fa fa-lock fa-2x prefix" aria-hidden="true"></i>
          <input name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
    <!-- <div class="col s3 clearfix"></div> -->
     <div class="input-field col s12">
    <input type="submit" name='login' class="col s12 btn red darken-4" value='Login'>
    <div class="col s12 center login-flex">
    <a href="register.php"><small class="signup">Sign up for Bacabac Farmers Producer Cooperative</small></a>
    </div>
    </div>
    </div>
  </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="assets/js/customjs.js"></script>
<script type="text/javascript">
    // Nav Bar Dropdown
  $( document ).ready(function(){
  $(".button-collapse").sideNav();

  });
</script>

          