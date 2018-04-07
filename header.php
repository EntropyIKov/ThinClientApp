<?php if(isset($_SESSION['master_id'])): ?>
<div class='header'>
	<div><b>Tavern</b></div>
	<div class='label-master-login'>Hello, <b><?=$_SESSION['master_login']?></b></div>
	<form id="logout-form"></form>
	<input 
		class='button-logout'
		formaction='authorise.php' 
		formmethod='GET' 
		name='action' 
		type="submit" 
		value="Logout"
		form="logout-form">
</div>
<?php endif ?>