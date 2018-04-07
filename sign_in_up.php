<div class='label-auth-big-logo'>Tavern</div>
<div class='authorise-form-wrapper <?php if(isset($_SESSION['bad_login'])): ?> invalid-params <?php endif?>'>
	<div class='authorise-form-label' id='label-auth-form'
	<?php if(!isset($_SESSION['bad_login'])): ?> hidden <?php endif ?>>Wrong login or password</div>
	<form action="authorise.php" method="GET" class='authorise-form'>
		<input name='login' type="text" placeholder="Login" id='input-login' 
		<?php if(isset($_SESSION['bad_login'])): ?> value= <?php echo $_SESSION['bad_login']; endif ?>>
		<input name='password' type='password' placeholder="Password" id='input-pass'>
		<input name='action' class='signin-button' type="submit" value="Sign In">
		<input name='action' class='signup-button' type="submit" value="Sign Up" id='button-signup'>
	</form>
</div>
<?php unset($_SESSION['bad_login']); ?>