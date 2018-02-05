	<div class="sidebar">
 <?php
    if (isset($_SESSION['username']) 
       && ($_SESSION['user_level'] == 1) 
      && $_SESSION['user_status'] == 1) {
       echo "Hello: ".$_SESSION['username'];
      }elseif (isset($_SESSION['username']) 
              && ($_SESSION['user_level'] == 2)
              && $_SESSION['user_status'] == 1){
        echo "Hello: ".$_SESSION['username'];
      } elseif (isset($_SESSION['username']) 
              && $_SESSION['user_level'] == 3
              && $_SESSION['user_status'] == 1){
        echo "Hello: ".$_SESSION['username'];
        echo "<br><a href='cart_item.php'><button class='btn green accent-4 atc'> <i class='fa fa-shopping-cart' aria-hidden='true'></i> Cart </button> </a>";
  }else{ ?>
  <form action="authenticate.php" method="POST">
        <div class="input-field col s12">
          <input id="text" name="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
     <div class="input-field col s12 side-btn">
    <input type="submit" name='login' class="btn waves-effect blue accent-2" value='Login'>
    </div>
  </form>
<?php } ?>
</div>
