<?php 
	function display_title(){
		echo "Your Profile";
	}
	function display_content(){
		?>
		<div class="col s12">
		<div class="profile-container">
			<?php
			require 'connectdb.php';
			$user = $_SESSION['username'];
			$sql = "SELECT * FROM users WHERE username = '$user'";
			$results = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($results);
			extract($row);
			?>
			<div class='col s4 user-img'>
			<img class='responsive-img user_img' src='assets/img/no-img.jpg'>
			</div>
			<div class='col s4'>
				<input type="button" class="btn green modal-trigger profile-modal" id="profile" value="Edit Profile" href="#user-profile-modal" data-id=<?php echo $id; ?>>
			</div>
			<div class='clearfix user-name'>
			<strong>Name: </strong><?php echo $first_name ." ". $last_name; ?>
			</div>
			<div class='user-email'>
			<strong class='user-email'> Email: </strong> <?php echo $email; ?>
			</div>
			<div class='user-mobile'>
			<strong> Mobile: </strong> <?php echo $mobile_number; ?>
			</div>
			<div class='user-address'>
			<strong> Address: </strong> <?php echo $address; ?>
			</div>
		</div>
		</div>
		<div class="col s12">
			<div class="profile-divider">
				
			</div>
		</div>
	<!-- User Profile modal -->
      <!-- Modal Structure -->
      <div id="user-profile-modal" class="modal profile-modal update">
        <div class="modal-content">
          <h4 class="modal-title center">Update your profile</h4>
          <div class="user-profile-body" id="user-profile-modal-body">
            
          </div>
        </div>
      </div>
		<?php
		if (isset($_SESSION['username']) && $_SESSION['user_level'] == 2) {
			?>
			<div class='col s12'>
				<div class='order-details-container'>
					<h4>Orders</h4>
						<?php 
							$owner = $_SESSION['user_id'];
							// echo $owner;

							// $sql = "SELECT * FROM users JOIN orders ON (users.id = orders.user_id) GROUP BY user_id";
							$sql = "SELECT * FROM users u, orders o, order_details od, products p
							WHERE u.id = o.user_id
							AND o.id = od.order_id
							AND od.product_id = p.id
							AND p.owner_user_id = '$owner'
							GROUP BY user_id";
							$results = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($results)) {
								extract($row);
								// echo $user_id;
								?>
									<table>
										<thead>
											<tr>
												<th><?php echo $first_name; ?></th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										
								<?php
								$sql1 = "SELECT * FROM orders JOIN order_details ON (orders.id = order_details.order_id) WHERE user_id = '$user_id' GROUP BY order_id";
								// echo $sql1;
								$results1 = mysqli_query($conn, $sql1);
								while ($row1 = mysqli_fetch_assoc($results1)) {
									extract($row1);
									// echo $user_id;
									// echo "<br>";
									$sql2 = "SELECT * FROM products JOIN order_details ON (order_details.product_id = products.id) JOIN orders ON (order_details.order_id = orders.id) WHERE order_id = '$order_id' AND owner_user_id = '$owner'GROUP BY order_id";
									// echo $sql2;
									// echo "<br>";
									$results2 = mysqli_query($conn, $sql2);
									// // echo $results2;
									while ($row2 = mysqli_fetch_assoc($results2)) {
									extract($row2);
									$total = 0;
									?>
										<tr>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<?php
									$sql3 = "SELECT * FROM products JOIN order_details ON (order_details.product_id = products.id) JOIN orders ON (order_details.order_id = orders.id) WHERE order_id = '$order_id' AND owner_user_id = '$owner' AND user_id = '$user_id'";
									$results3 = mysqli_query($conn, $sql3);
									while ($row3 = mysqli_fetch_assoc($results3)) {	
									extract($row3);
									$subtotal = $price * $quantity;
									$total += $subtotal;
									?>
									<tbody>
										<tr>
											<td> <?php echo $name; ?></td>
											<td> <?php echo $quantity; ?></td>
											<td> <?php echo $price; ?></td>
											<td> <?php echo $subtotal; ?></td>
										</tr>
									<?php
									};
									?>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><?php echo $total; ?></td>
										</tr>
							</tbody>
							<?php
									};
								};
								// echo "<hr>";
								?>
								</table>
							<?php	};
						?>
				</div>
			</div>
		<?php }elseif(isset($_SESSION['username']) && $_SESSION['user_level'] == 3){
		?>
		<div class="col s12">
			<div class="order-details-container">
				<h4>Order Details:</h4>
				<?php 
				$user = $_SESSION['username'];
				$sql = "SELECT * FROM orders WHERE user_id = (SELECT id FROM users WHERE username = '$user')";
					$results = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($results)) {
						extract($row);
					// foreach ($row as $key => $value) {
					// 	echo $value."<br>";
					// }
						$sql1 = "SELECT * FROM products JOIN order_details ON 
							(products.id = order_details.product_id) JOIN orders ON
							(order_details.order_id = orders.id) WHERE order_id = '$id'";
						$resultss = mysqli_query($conn, $sql1);
						$row2 = mysqli_fetch_assoc($resultss); 
						extract($row2);
						$total = 0;
						// $total += $subtotal;
						// $subtotal = $price * $quantity;
						?>
						<table>
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php 
						$sql2 = "SELECT * FROM products JOIN order_details ON 
									(products.id = order_details.product_id) JOIN orders ON
									(order_details.order_id = orders.id) WHERE order_id = '$id'";
						$result3 = mysqli_query($conn, $sql2);
						while($row3 = mysqli_fetch_assoc($result3)){
									extract($row3);
									// $total = 0;
									$subtotal = $price * $quantity;
									$total += $subtotal;
									 ?>
									<td><?php echo $name; ?></td>
									<td><?php echo $quantity; ?></td>
									<td><?php echo $price; ?></td>
									<td><?php echo $subtotal; ?></td>
								</tr>
								<?php };
								 ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><?php echo $total; ?></td>
								</tr>
							</tbody>
						</table>
						<?php
					}

				?>
			</div>
		</div>
		<?php
		}else{
			echo "";
		}
	}
	require 'template.php';
 ?>
 <script type="text/javascript">
 		//user profile modal
      $("#profile").click(function(){
      var id = $(this).data('id');
        $.ajax({
          method : 'post',
          url: 'user_profile_update.php',
          data: {
            edit : true,
            id : id
          },
          success: function(data){
          	// console.log(data);
            $('#user-profile-modal-body').html(data);
          }
        });
      });
 </script>