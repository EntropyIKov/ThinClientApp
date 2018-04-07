<?php 
	$db_server = 'localhost, 1401';
	$connectionOptions = [
		'Database' => 'labDB',
		'UID' => 'sa',
		'PWD' => 'Strong_Password'
	];
	$conn = sqlsrv_connect($db_server, $connectionOptions);
	if(!$conn) {
     	echo "Connection could not be established.<br />";
    	die( print_r( sqlsrv_errors(), true));
	}
?>