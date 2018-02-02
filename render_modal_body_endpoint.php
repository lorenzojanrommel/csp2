
<?php
    require 'connectdb.php';
    if (isset($_POST['add'])) {
        echo "<div class='col s3'>";
        echo "</div>";
        echo "<div class='col s6'>";
        echo "<form method='post' action='add_item.php' enctype='multipart/form-data'>"; //to save changes
        echo "<div class='card-content'>";
        echo "Name: <input type='text' name='name'><br>";
        echo "Description: <textarea name='description'> </textarea> <br>";
        echo "Image: <input type='file' name='image'><br>";
        echo "Price: <input type='number' name='price' min='0'><br>";
        ?>
        <div class="input-field col s12">
        <select name="category_id">
        <option selected disabled> --Select Category </option>";
        <?php
        $sql = "SELECT * FROM categories";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
            extract($row);
            echo "<option value='$id'> $name </option>";
        }
        ?></select>
        <label>Categories</label>
        </div>
        <?php
        echo "<input type='submit' name='submit' id='save' class='btn atc l' value='Save'>";
        echo "<a href='#!' class='modal-close'><input type='button' class='btn red atc' value='Cancel'></a>" ;
        echo "</form>";
        echo "</div>";
        echo "</div>";
    };
    if(isset($_POST['update'])) {
    $index = $_POST['index'];
    // echo $_POST['update'];
    $sql = "SELECT * FROM products WHERE id = '$index'";
    $results =  mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    extract($row);
    echo "<form method='post' action='edit.php?index=$index'>"; //to save changes
    echo "<img class='product-image' src='".$image."'><br>";
    echo "<div class='card-content'>";
    echo "Name: <input type='text' name='name' value='$name'><br>";
    echo "Description: <textarea name='description'> $description</textarea> <br>";
    echo "Price: <input type='number' name='price' min='0' value='$price'><br>";
    echo "<input type='submit' id='save' class='btn atc l' value='Save'>";
    echo "<a href='#!' class='modal-close'><input type='button' class='btn red atc' value='Cancel'></a>";
    echo "</form>";
    echo "</div>";
    };
?>
<script type="text/javascript">
    $(document).ready(function() {
    $('select').material_select();
  });
</script>