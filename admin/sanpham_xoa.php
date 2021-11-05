<?php
	session_start();
	require("../include/config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$sanpham_id = $_GET['sanpham_id'];

		$sql="DELETE FROM san_pham WHERE id=$sanpham_id";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_sanpham");
	}
	else{
		header("location: index.php");
	}
?>