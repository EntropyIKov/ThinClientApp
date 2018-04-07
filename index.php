<?php session_start(); ?>
<head>
	<link rel="stylesheet" href='css/sqlapp.css'>
	<script src='js/sqlapp.js'></script>
</head>
<?php
	ini_set('display_errors', 1);
	require_once 'DB_connection.php';
	require_once 'global_functions.php';
	require_once 'header.php';
	if(!isset($_SESSION['master_id'])) {
		require_once 'sign_in_up.php';	
	} else {
		require_once 'personal_office.php';
	}
?>