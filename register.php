<?php
	function display_title() {
		echo("Register Page");
}
	function display_content() {
	?> <style type="text/css"> 
	p {
		display: inline;
	}
</style>
<div class="form-container">
	<h4 class="center">Register in Bacabac Farmers Producer Cooperative</h4>
	<small class="req"> * Required </small>
<form method="POST" action="add_user.php">
	<div class="row">
	<div class="input-field col s12">
	<div class="input-field col s6">
	<i class="fa fa-user-plus prefix" aria-hidden="true"></i>
	<input type="text" name="fname" class="validate" required>
	<label for="fname">First Name<span class="req"> *</span></label>
	</div>
	<div class="input-field col s6">
	<input type="text" name="lname" class="validate" required>
	<label for="lname">Last Name<span class="req"> *</span></label>
	</div>
     </div>
	<div class="input-field col s12 clearfix">
	<i class="fa fa-envelope prefix" aria-hidden="true"></i>
    <input type="email" name="email" class="validate">
	<label for="email">Email<span class="req"> *</span></label>
     </div>
	<div class="input-field col s12 clearfix">
	<div class="input-field col s6">
	<i class="fa fa-phone prefix" aria-hidden="true"></i>
	<input type="text" name="mobile" class="validate" required>
	<label>Mobile Number <span class="req"> *</span></label>
	</div>
	<div class="input-field col s6">
	<i class="fa fa-calendar prefix" aria-hidden="true"></i>
	<input type="text" name="birthdate" class="datepicker">
	<label>Birthdate <span class="req"> *</span></label>
	</div>
    </div>
    <div class="input-field col s12">
    <i class="fa fa-venus-mars prefix" aria-hidden="true"></i>
    <select name="gender" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="m">Male</option>
      <option value="f">Female</option>
    </select>
    <label>Gender <span class="req"> *</span></label>
  </div>
	<div class="input-field col s12 clearfix">
		<i class="fa fa-address-card prefix" aria-hidden="true"></i>
		<input type="text" name="address" class="validate" required>
		<label>Address</label>
  </div>
	<div class="input-field col s12 clearfix">
      	<i class="fa fa-user prefix" aria-hidden="true"></i>
      	<input name="username" id="username" type="text" class="validate" required>
        <label for="username">Username<span class="req"> *</span></label>
        <p id="username_error"></p>
     </div>
	<div class="input-field col s12">
	<i class="fa fa-lock prefix" aria-hidden="true"></i>
	<input type="password" name="pass" id="pass" required> <br>
	<label for="password">Password<span class="req"> *</span></label>
     </div>
	<div class="input-field col s12">
	<i class="fa fa-unlock-alt prefix" aria-hidden="true"></i>
	<label for="confirmpass">Confirm Password<span class="req"> *</span></label>
	<input type="password" name="confirmpass" id="cpwd" oninput="return validate()" required> <p id="output"> </p><br>
	</div>
	<div class="input-field col s12">
    <i class="fa fa-circle prefix" aria-hidden="true"></i>
    <select name="user_level" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="2">Seller</option>
      <option value="3">Customer</option>
    </select>
    <label>User Type <span class="req"> *</span></label>
  </div>
	<div class="input-field col s12">
	<input type="submit" name="register" id="submit" class="btn green accent-2 validate" value="Register" disabled>
	</div>
	</div>
</form>
</div>
<script type="text/javascript" src="assets/js/customjs.js"></script>
<?php
}
	require "template.php";
?>
