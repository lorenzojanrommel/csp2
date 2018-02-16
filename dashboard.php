<?php 
	function display_title(){
		echo "Bacabac Farmers Producer Cooperative";
	}
	function display_content(){
	?>
	<div class="container">
		<div class="row">
			<h4>Dashboard</h4>
			<div class="col s12">
				<div class="col s4">
					<div class="box red">
						<div class="dashboard-details center">
						<h5 class="center white-text dashboard-title">Users</h5>
						</div>
					</div>
				</div>
				<div class="col s4">
					<div class="box green">
						<div class="dashboard-details center">
						<h5 class="center white-text dashboard-title">Products</h5>
						</div>
					</div>
				</div>
				<div class="col s4">
					<div class="box blue">
						<div class="dashboard-details center">
						<h5 class="center white-text dashboard-title">Orders</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}

	require 'template.php';
?>