<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'van_phong_pham');

$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if($conn->connect_error){
	die("Failed".$conn->connect_error);
}else echo("Successfull");
?>