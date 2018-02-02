<?php 
  function display_title(){
    echo "Menu || Bacabac Farmers Producer Cooperative";
  }
  function display_content(){
  $filter = isset($_GET['category']) ? $_GET['category'] : 'All';
    require 'connectdb.php'; //
    if(isset($_SESSION['user_level']) && $_SESSION['user_level']==2 && $_SESSION['user_status'] == 1){
    // echo "<button class='btn modal-trigger' id='add_item'  href='#modal2'>Add Item</button>";
      echo "<a class='btn-floating btn-large waves-effect waves-light green accent-4 modal-trigger add_item' href='#modal2' id='add_item'><i class='material-icons'>add</i></a>";
    };
    ?>
  <h4 class="">Category:</h4>
    <div class="input-field col s12">
    <form>
    <select name="category">

    <?php
      echo("<option> All </option>");
      $sql = "SELECT * FROM categories";
      $results = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($results)) {
        $id = $row['id'];
        $category = $row['name'];

      echo $filter == $id ? "<option selected value='$id'>$category</option>" : "<option value='$id'> $category </option>" ;
    // }
    };
  ?>
    </select>
    <label>Sort by:</label>
    <button class="btn"> Sort By:</button>
    </form>
  </div>
  <a href=""></a>
 <?php
    $sql = "SELECT * FROM products";
    $results = mysqli_query($conn, $sql);
    echo "<div class='col s12'>";
    echo "<div class='row'>";
    echo "<div class='col s12'>";
    while ($item = mysqli_fetch_assoc($results)) {
      $owner = $item['owner_user_id'];;
      $index = $item['id'];
    if($filter == 'All' || $item['category_id'] == $filter){
      if (!isset($_SESSION['username'])) {
      echo "<div class='col s4'>";
      echo "<div class='card'>";
      echo "<div class='card-img'>";
      echo "<img class='product-image' src='".$item['image']."'><br>";
      echo "</div>";
      echo "<div class='card-content product-content'>";
      echo "<div class='row'>";
      echo "<div class='col s12 product-name'>";
      echo "<strong>". $item['name'] . "</strong>";
      echo "</div>";
      echo "<div class='col s12 product-description'>";
      echo $item['description']. "<br>";
      echo "</div>";
      echo "<div class='col s12 product-price'>";
      echo "Price: ₱" .$item['price'];
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      }
      elseif (isset($_SESSION['username']) && $_SESSION['user_level'] == '2' && $_SESSION['user_id'] == $owner) {
      $sql = "SELECT * FROM products WHERE owner_user_id = '$owner'";
      $results = mysqli_query($conn, $sql);
      while ($item = mysqli_fetch_assoc($results)) {
      echo "<div class='col s4'>";
      echo "<div class='card'>";
      echo "<div class='card-img'>";
      echo "<img class='product-image' src='".$item['image']."'><br>";
      echo "</div>";
      echo "<div class='card-content product-content'>";
      echo "<div class='row'>";
      echo "<div class='col s12 product-name'>";
      echo "<strong>". $item['name'] . "</strong>";
      echo "</div>";
      echo "<div class='col s12 product-description'>";
      echo $item['description']. "<br>";
      echo "</div>";
      echo "<div class='col s12 product-price'>";
      echo "Price: ₱" .$item['price'];
      echo "</div>";
      echo "</div>";
      if (isset($_SESSION['username']) && $_SESSION['user_level'] == '2') {
     echo "<input type='button' class='btn blue accent-1 btn-product modal-trigger render_modal' href='#modal1' data-index='$index' value='Edit'>"; 
      echo "<input type='button' class='btn red btn-product modal-trigger delete_render_modal' href='#delete_modal' data-index='$index' value='delete'>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
            };
          };
      }elseif (isset($_SESSION['username']) && $_SESSION['user_level'] == '3') {
      echo "<div class='col s4'>";
      echo "<div class='card'>";
      echo "<div class='card-img'>";
      echo "<img class='product-image' src='".$item['image']."'><br>";
      echo "</div>";
      echo "<div class='card-content product-content'>";
      echo "<div class='row'>";
      echo "<div class='col s12 product-name'>";
      echo "<strong>". $item['name'] . "</strong>";
      echo "</div>";
      echo "<div class='col s12 product-description'>";
      echo $item['description']. "<br>";
      echo "</div>";
      echo "<div class='col s12 product-price'>";
      echo "Price: ₱" .$item['price'];
      echo "</div>";
      echo "</div>";
      echo "<form method='post' action='cart_item_endpoint.php?index=$index'>";
      echo "QTTY: <input class='quantity' type='number' min='o' class='qttyItem' name='item_qtty'>";
      echo "<button class='btn light-green accent-3 atc'> Add to cart </button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      };
      };
    };
    ?>

  <!-- Add item Modal Structure -->
      <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="center">Add Product</h4>
          <div class="modal-body" id="modal-body">
            
          </div>
        </div>
      </div>
  <!--Edit Modal Structure -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="center">Edit this Product?</h4>
          <div class="modal-body" id="edit-body">
            
          </div>
        </div>
      </div>

      <!-- delete modal -->
      <!-- Modal Structure -->
      <div id="delete_modal" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Are you sure you want to delete this item?</h4>
          <div class="delete-modal-body" id="delete-modal-body">
            
          </div>
        </div>
      </div>
      <?php
    echo "</div>";
    echo "</div>";
    echo "</div>";

};
  require "template.php";
?>

<script type="text/javascript">
  //add item
    $("#add_item").click(function(){
    $.ajax({
      method: 'post',
      url: 'render_modal_body_endpoint.php',
      data: {
        add : true,
      },
      success: function(data){
        // alert(data)
        $("#modal-body").html(data);
      }
    })
  })
    $(".render_modal").click(function(){
      var index = $(this).data('index');
        $.ajax({
          method : 'post',
          url: 'render_modal_body_endpoint.php',
          data: {
            update :true,
            index : index
          },
          success: function(data){
            // alert(data);
            $('#edit-body').html(data);
          }
        });
      });

      //delete modal
      $(".delete_render_modal").click(function(){
      var index = $(this).data('index');
        $.ajax({
          method : 'post',
          url: 'delete_modal_body_endpoint.php',
          data: {
            edit : true,
            index : index
          },
          success: function(data){
            $('#delete-modal-body').html(data);
          }
        });
      });
</script>