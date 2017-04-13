<div class="container" style="max-width:400px; margin:50px auto;">

	<div class="error-msg"></div>

<?php //echo form_open('id=register'); ?>

	<form method="post" action="" id="register-frm" accept-charset="utf-8">

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label>Password </label>
		<input type="text" class="form-control" name="password">
	</div>

	<div class="form-group">
		<label>Confirm Password </label>
		<input type="text" class="form-control" name="passconf">
	</div>


	<div class="form-group row">
		<span class="pull-left"><input type="checkbox" name="rememberme" value="rmemberme">Remember Me</span>
		<span class="pull-right"><a href="#">Forget Password</a></span>

	</div>

	<div class="form-group">
		<button id="register-btn" class="btn btn-primary pull-left" type="submit">Submit</button>
		<span class="pull-right"><a href="<?=site_url()?>">Login</a></span>
	</div>
</form>

</div>