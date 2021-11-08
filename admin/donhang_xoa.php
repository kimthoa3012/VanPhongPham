<?php
	session_start();
	require("../include/config.php");
	if($_SESSION['email']=="admin@gmail.com" && $_SESSION['pass']=="123456"){
		$dh_id = $_GET['dh_id'];
		$sql_ct="DELETE FROM ct_don_hang WHERE don_hang_id=$dh_id";
		$result_ct=$conn->query($sql_ct);
		if($result_ct){
			$sql_dh="DELETE FROM don_hang WHERE id=$dh_id";
			$result_dh=$conn->query($sql_dh);
			if($result_dh) header("location: index.php?page_layout=ds_donhang");
			else{
				echo"
	                <script type='text/javascript'>
	                    alert('Xóa không thành công!');
	                    location.href = './index.php?page_layout=ds_donhang';
	                </script>
	            ";
			}
		}else{
			echo"
                <script type='text/javascript'>
                    alert('Xóa không thành công!');
                    location.href = './index.php?page_layout=ds_donhang';
                </script>
            ";
		}
	}
	else{
		header("location: index.php");
	}
?>