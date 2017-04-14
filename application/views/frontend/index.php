<div class="container" style="max-width:400px; margin:50px auto;">

<form method="post" action="">
	<div class="form-group">
		<label>Username /Email </label>
		<input type="text" class="form-control" name="username_email">
	</div>
	<div class="form-group">
		<label>Password </label>
		<input type="text" class="form-control" name="password">
	</div>

	<div class="form-group row">

		<span class="pull-left"><input type="checkbox" name="rememberme" value="rmemberme">Remember Me</span>
		<span class="pull-right"><a href="#">Forget Password</a></span>

	</div>

	<div class="form-group">
		<button class="btn btn-primary pull-left" type="submit">Login</button>
		<span class="pull-right"><a href="<?=site_url('main/register')?>">Register</a></span>
	</div>
</form>

</div>