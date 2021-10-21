<?php
	session_start();
	require("../config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$loai_id = $_GET['loai_id'];

		$sql="DELETE FROM loai_hang WHERE id=$loai_id";
		$result=$conn->query($sql);

		header("location: index.php?page_layout=ds_loaiSP");
	}
	else{
		header("location: index.php");
	}
?>