<?php 
function display_title(){
	echo "About || Bacabac Farmers Producer Cooperative";
}
function display_content(){
	?>
	<div class="parallax-container valign-wrapper">
		<div class="container">
			<div class="row center">
				<div class="col s1 l3"></div>
				<div class="col s10 l6 black-text">
					<div class="about-details">
						<h4 class="center about-text">About</h4>
						<h6 class="align-justify"><strong>BFPC</strong> is a cooperative that is composed of farmers from the Municipality of Camiling. They are dealers of different agricultural products needed by the farmers. They also offer loans with lesser interest than other lending companies that farmers go to for their crop loans. The purpose of this cooperative is to help it's members in terms of financial needs and crop production.</h6>
					</div>
				</div>
				<div class="col s1 l3"></div>
			</div>
		</div>
		<div class="parallax"><img src="assets/img/corn1.jpg" alt="s"></div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col s12 m4">
				<div class="icon-block">
					<h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
					<h5 class="center">Speeds up development</h5>

					<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor.</p>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="icon-block">
					<h2 class="center brown-text"><i class="material-icons">group</i></h2>
					<h5 class="center">User Experience Focused</h5>

					<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor.</p>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="icon-block">
					<h2 class="center brown-text"><i class="material-icons">settings</i></h2>
					<h5 class="center">Easy to work with</h5>

					<p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor.</p>
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
		<div class="parallax"><img src="assets/img/s2.jpg" alt="s"></div>
	</div>

	<?php
}

require 'template.php';
?>