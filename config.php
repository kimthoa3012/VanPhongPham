<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'van_phong_pham';

	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if(!$conn){
		die("connection failed: ".mysqli_connect_error());
	}
?>