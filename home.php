<?php 
	function display_title(){
		echo "Home || Bacabac Farmers Producer Cooperative";
	}
	function display_content(){
		?>
		<div class="home-container white">
			<div class="carousel carousel-slider center">
				<a class="carousel-item" href="#one!"><img src="assets/img/s1.jpg"></a>
				<a class="carousel-item" href="#two!"><img src="assets/img/s2.jpg"></a>
				<a class="carousel-item" href="#three!"><img src="assets/img/s3.jpg"></a>
				<a class="carousel-item" href="#four!"><img src="assets/img/s4.jpg"></a>
  			</div>
		<div class="home-details">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
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