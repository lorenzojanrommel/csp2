<?php 
	function display_title(){
		echo "Check Out || Bacabac Farmers Producer Cooperative";

	}
	function display_content(){
		require 'connectdb.php';
		?>
		<div class="container">
			<div class="row">
				<div class="col s12">
          <div id="invoice">
            <div class="invoice-header">
                <div class="col s12 m6 l6">
                  <img class="icon" src="assets/img/no-img.jpg" alt="company logo">
                  <h4 class="invoice-title">BFPC</h4>
                  <p class="left-align invoice">To,
                    <br/>
                    <span class="strong"><?php echo $_SESSION['fname'] ?></span>
                    <br/>
                    <span><?php echo $_SESSION['address'] ?></span>
                    <br/>
                    <span>New Yourk, USA</span>
                    <br/>
                    <span><?php echo $_SESSION['mobile'] ?></span>
                  </p>
                </div>

                <div class="col s12 m6 l6">
                  <div class="invoce-company-address right-align">
                    <span class="invoice-icon"><i class="mdi-social-location-city cyan-text"></i></span>

                    <p class="right-align"><span class="strong">Company Name LLC</span>
                      <br/>
                      <span>125, ABC Street,</span>
                      <br/>
                      <span>New Yourk, USA</span>
                      <br/>
                      <span>+91-(444)-(333)-(221)</span>
                    </p>
                  </div>

                  <div class="invoce-company-contact right-align">
                    <span class="invoice-icon"><i class="mdi-communication-quick-contacts-mail cyan-text"></i></span>
                    <p class="right-align"><span class="strong">www.exampledomain.com</span>
                      <br/>
                      <span>info@exampledomain.com</span>
                      <br/>
                      <span>admin@exampledomain.com</span>
                    </p>
                  </div>

                </div>
            </div>
            <div class="invoice-table">
            	<div class="col s12 m6 l6 cyan">
                  <h4 class="white-text invoice-text">INVOICE</h4>
                </div>
                <div class="col s12 m6 l6 invoice-brief cyan white-text">
                  <div class="row">
                    <div class="col s12 m3 l3">
                    </div>
                  </div>
                </div>
            </div>
            </div>
			<div class="invoice-data">
				<form method="POST" action="cart_proceed_endpoint.php">
				<table>
					<thead>
						<tr>
							<th class='center'>Product Name</th>
							<th class='center'>Quantity</th>
							<th class='center'>Price</th>
							<th class='center'>Subtotal</th>
						</tr>
					</thead>
		<?php
		if(count($_SESSION['cart'])>0){
		//Count product id
			// $ids = array();
					$total = 0;
			foreach ($_SESSION['cart'] as $ids => $value) {
		// print_r($_SESSION['cart'][$id]);
				// echo $quantity;
				// array_push($ids, $id);
				// echo $id;
			// $quantity = $_SESSION['cart'][$id]['quantity'];
					// $subtotal=$price*$quantity;
				// $subtotal = $price*$quantity
				$sql = "SELECT * FROM products WHERE id = $ids";
				$results = mysqli_query($conn, $sql);
				$quantity = $_SESSION['cart'][$ids];
				// $row = mysqli_fetch_assoc($results);
				$subtotal = 0;
				while ($row = mysqli_fetch_assoc($results)) {
					extract($row);
					$subtotal = $price * $value;
					$total += $subtotal;
					?>
								<tbody>
									<tr>
										<td><?php echo "<input type='text' class='black-text underline' name='pname' value='$name' readonly>"; ?></td>
										<td><?php echo "<input type='text' class='center underline black-text' name='pquantity' value='$quantity' class='center underline' readonly>"?></td>
										<td><?php echo "<input type='text' class='center underline black-text' name='pprice' value='$price' class='center underline' readonly>" ?></td>
										<td class="center"><?php echo $subtotal; ?></td>
									</tr>
					<?php }; };
					?> 				<tr>
										<td class="total"></td>
										<td class="total"></td>
										<td class="total"><strong>Total Price</strong></td>
										<td class="total"><?php echo "<input type='text' name='total_price' value='$total' class='center black-text underline' readonly>"; ?></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td colspan="2"><button class="btn green">Place Order</button></td>
									</tr>
								</tbody>
				</table>
				</form>
			</div>
			</div>
			</div>
			</div>
			<?php
			// print_r($ids);
			// $sql = "SELECT * FROM products WHERE id IN(".implode(',', $ids).")";
			// $results = mysqli_query($conn, $sql);
			// while ($row = mysqli_fetch_assoc($results)) {
			// print_r($row);
			// echo"<hr>";
			// };
			// $row = mysqli_fetch_assoc($results);
		};
	};




	require 'template.php';
 ?>