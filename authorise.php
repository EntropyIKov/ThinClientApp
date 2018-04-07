<?php 
session_start();
require_once 'DB_connection.php';
$login = $_GET['login'];
$password = $_GET['password'];
$action = $_GET['action'];

if(isset($_SESSION['master_id']) && $action !== 'Logout') {
	header('Location: /thinclient/');
	exit;
}


switch ($action) {
	case 'Sign In':
		signIn($login, $password, $conn);
		break;

	case 'Sign Up':
		signUp($login, $password, $conn);
		break;

	case 'Logout':
		logout();
		break;
}
if($_GET['action'] == 'Sign In') {
	signIn($login, $password, $conn);
}


function logout()
{
	unset($_SESSION['master_id']);
	session_destroy();
	header('Location: /thinclient/');
}

function signUp($login, $password, $conn)
{
	$status = -1;
	$tsql_callSP = "DECLARE @result int; 
					EXECUTE @result = signUp @login = '$login', @password = '$password'; 
					SELECT @result;";
	$stmt = sqlsrv_query($conn, $tsql_callSP);
	if($stmt === false) {
		echo "Error in executing statement.\n<br>";  
    	die( print_r( sqlsrv_errors(), true));  
	}
	sqlsrv_fetch($stmt);
	$result = sqlsrv_get_field($stmt, 0);
	sqlsrv_free_stmt($stmt);
	switch ($result) {
		case -1: // Unknown error
			echo "Unknown error";
			break;
		case -2: // login or password is null
			echo "Empty login or password";
			break;
		case -3: // password is no valid
			echo "Password is no valid";
			break;
		case -4: // There is user with same login
			echo "There is user with same login";
			break;
		default: // Ok!
			echo "Your id: $result";
			$_SESSION['master_id'] = $result;
			$_SESSION['master_login'] = $login;
			header("Location: /thinclient/");
			break;
	}
}

function signIn($login, $password, $conn)
{
	$tsql_callSP = "{call signIn( ?, ?, ? )}";
	$id = -1;
	$param = [
		[$login, SQLSRV_PARAM_IN, null, SQLSRV_SQLTYPE_VARCHAR],
		[$password, SQLSRV_PARAM_IN, null, SQLSRV_SQLTYPE_VARCHAR],
		[&$id, SQLSRV_PARAM_OUT, null, SQLSRV_SQLTYPE_INT]
	];
	$stmt = sqlsrv_query($conn, $tsql_callSP, $param);
	if($stmt === false) {
		echo "Error in executing statement.\n<br>";  
    	die( print_r( sqlsrv_errors(), true));  
	}
	sqlsrv_free_stmt( $stmt);
	$link = '';
	if($id !== -1) {
		$_SESSION['master_id'] = $id;
		$_SESSION['master_login'] = $login;
	} else {
		$_SESSION['bad_login'] = $login;
	}
	header("Location: /thinclient/");
}
?>