<?php
	session_start();
	require("../include/config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$bl_id = $_GET['bl_id'];

		$sql="DELETE FROM binh_luan WHERE id=$bl_id";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_binhluan");
	}
	else{
		header("location: index.php");
	}
?>