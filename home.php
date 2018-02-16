<?php 
	function display_title(){
		echo "Home || Bacabac Farmers Producer Cooperative";
	}
	function display_content(){
		?>
			<div class="parallax-container valign-wrapper">
				<div class="section no-pad-bot">
			      <div class="container">
			        <div class="row center">
						<h1 class="header center white-text text-lighten-2 home-title">Bacabac Farmers Producers Cooperative</h1>
			        </div>
			      </div>
			    </div>
				<div class="parallax"><img src="assets/img/s2.jpg" alt="s"></div>
			</div>
			<div class="speed white">
			<div class="container">
				<div class="section">
					<!--   Icon Section   -->
					<div class="row">
						<div class="col s12 m4">
							<div class="icon-block">
								<h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
								<h5 class="center">Speeds up development</h5>

								<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</div>
						</div>

						<div class="col s12 m4">
							<div class="icon-block">
								<h2 class="center brown-text"><i class="material-icons">group</i></h2>
								<h5 class="center">User Experienced</h5>

								<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</div>
						</div>

						<div class="col s12 m4">
							<div class="icon-block">
								<h2 class="center brown-text"><i class="material-icons">settings</i></h2>
								<h5 class="center">Easy to work</h5>

								<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			</div>
			<div class="parallax-container valign-wrapper">
				<div class="section no-pad-bot">
			      <div class="container">
			        <div class="row center">
						<h1 class="header center white-text text-lighten-2 home-title">Bacabac Farmers Producers Cooperative</h1>
			        </div>
			      </div>
			    </div>
				<div class="parallax"><img src="assets/img/corn.jpg" alt="s"></div>
			</div>
		<?php
	}

	require 'template.php';
?>
<script type="text/javascript">
	$('.carousel.carousel-slider').carousel({
		fullWidth: false,
		duration : 20,
		indicators : true
		});
</script>