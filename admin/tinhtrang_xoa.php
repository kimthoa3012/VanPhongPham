<?php
	session_start();
	require("../include/config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$tt_id = $_GET['tt_id'];

		$sql="DELETE FROM tinh_trang_dh WHERE id=$tt_id";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_tinhtrang");
	}
	else{
		header("location: index.php");
	}
?>