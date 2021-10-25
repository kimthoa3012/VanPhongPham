<?php
	session_start();
	$sp_id = $_GET['sp_id'];

	if(isset($_SESSION['giohang'][$sp_id])){
		$_SESSION['giohang'][$sp_id]=$_SESSION['giohang'][$sp_id]+1;
	}else{
		$_SESSION['giohang'][$sp_id]=1;
	}


	header("location:../index.php?page_layout=giohang");
?>