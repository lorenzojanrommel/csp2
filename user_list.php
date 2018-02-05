<?php
	function display_title(){
		echo "User List || Bacabac Farmers Producer Cooperative";
	}
	function display_content(){
	require 'connectdb.php';
	?>

	<table id="myTable" class="mdl-data-table responsive" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
				<th class="hide-on-med-and-down">Status</th>
				<th class="hide-on-med-and-down">Level</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
	<?php
	$sql = "SELECT * FROM users";
	$results = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($results)) {
		extract($row)
		?>
		<tr>
			<td><?php echo "$first_name $last_name";?></td>
			<td class="hide-on-med-and-down"><?php if (isset($user_status) && $user_status == 1) {
					echo "Active";
			}else{
				echo "Deactivate";
			} ?></td>
			<td class="hide-on-med-and-down"><?php if (isset($user_level) && $user_level == 1) {
				echo "Admin";
			}elseif ($user_level == 2) {
				echo "Seller";
			}elseif ($user_level == 3) {
				echo "Customer";
			}
			?></td>
			<td><?php echo "<button type='button' class='btn amber accent-4 modal-trigger update_user_modal hoverable' href='#update_user_modal' data-id='$id'><i class='material-icons'>edit</i> </button>" ?> </td>
			<td><?php echo "<button type='button' class='btn red accent-4 modal-trigger delete_user_modal render_modal hoverable' href='#delete_user_modal' data-id='$id'><i class='material-icons'>delete</i></button>" ?> </td>
		</tr>
		<?php
	};
	?>
		</tbody>
	</table>
	  <!-- Update user modal -->
      <!-- Modal Structure -->
      <div id="update_user_modal" class="modal user-modal update">
        <div class="modal-content">
          <h4 class="modal-title center">Update User</h4>
          <div class="update_user-modal-body" id="update-user-modal-body">
            
          </div>
        </div>
      </div>

	  <!-- delete user modal -->
      <!-- Modal Structure -->
      <div id="delete_user_modal" class="modal user-modal">
        <div class="modal-content">
          <h4 class="modal-title">Are you sure you want to delete this user?</h4>
          <div class="delete_user-modal-body" id="delete-user-modal-body">
            
          </div>
        </div>
      </div>
	<?php
	}
	require 'template.php';
?>
<script type="text/javascript">
	
	//update user modal
      $(".update_user_modal").click(function(){
      var id = $(this).data('id');
        $.ajax({
          method : 'post',
          url: 'users_update.php',
          data: {
            edit : true,
            id : id
          },
          success: function(data){
          	// console.log(data);
            $('#update-user-modal-body').html(data);
          }
        });
      });
	  //delete user modal
      $(".delete_user_modal").click(function(){
      var id = $(this).data('id');
        $.ajax({
          method : 'post',
          url: 'delete_user_modal.php',
          data: {
            edit : true,
            id : id
          },
          success: function(data){
          	// console.log(data);
            $('#delete-user-modal-body').html(data);
          }
        });
      });
     //pagination
	$(document).ready(function() {
    $('#myTable').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
        responsive: true
    } );
	} );
	//selector
	 $(document).ready(function() {
    $('select').material_select();
  });
</script>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css"> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>