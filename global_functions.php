<?php 

function getPlatformsByMasterId($id, $conn)
{
	$tsql_callSP = "EXECUTE getPlatformsByMasterId @master_id=$id;";
	$stmt = sqlsrv_query($conn, $tsql_callSP);
	if($stmt === false) {
		echo "Error in executing statement.\n<br>";  
    	die( print_r( sqlsrv_errors(), true));  
	}

	$platforms = [];
	while(sqlsrv_fetch($stmt)){
		$id = sqlsrv_get_field($stmt, 0);
		$domain = sqlsrv_get_field($stmt, 1);
		$platforms[] = [$id, $domain];
	}

	return $platforms;
}

?>