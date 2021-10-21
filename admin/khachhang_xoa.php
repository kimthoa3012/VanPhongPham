<?php
	session_start();
	require("../config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$khachhang_id = $_GET['khachhang_id'];

		$sql="DELETE FROM khach_hang WHERE id=$khachhang_id";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_khachhang");
	}
	else{
		header("location: index.php");
	}
?>