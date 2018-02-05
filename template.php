<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php display_title() ?> </title>
  <?php require "partials/head.php" ?>
</head>
<body>
<?php require "partials/nav.php"; ?>
	<div class="par2-body">
	<div class="container">
	<div class="row">
	<div class="col s12 white border-all">
	<?php
	// session_start(); 
	if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 1) {
		?>
	<div class="col s12">
		<?php display_content() ?>
	</div>
	</div>
	</div>
	</div>
	<?php
}else {
	?>
	<div class="col s12 m12 l9">
		<?php display_content() ?>
	</div>
	<div class="col s12 m3 l3 hide-on-med-and-down white side">
	<?php require "partials/sidebar.php"; ?>
	</div>
	</div>
	</div>
</div>
</div>
<?php } require "partials/footer.php"; ?>
</div>
</body>
</html>