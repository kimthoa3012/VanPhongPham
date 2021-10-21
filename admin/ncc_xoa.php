<?php
	session_start();
	require("../config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$ma_ncc = $_GET['ma_ncc'];

		$sql="DELETE FROM nha_cung_cap WHERE id=$ma_ncc";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_ncc");
	}
	else{
		header("location: index.php");
	}
?>