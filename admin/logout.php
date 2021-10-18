<?php
	session_start();
	if(isset($_SESSION['email'])){
		session_destroy();//xóa toàn bộ session
		header("location: login.php");
	}
?>