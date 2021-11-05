<?php
	if(isset($_SESSION['khach_hang'])){
		$ten_kh=$_SESSION['khach_hang']['ten'];
        $diachi_kh=$_SESSION['khach_hang']['diachi'];
        $email_kh=$_SESSION['khach_hang']['email'];
        $sdt_kh=$_SESSION['khach_hang']['sdt'];

        $result_kh=$conn->query("SELECT id FROM khach_hang WHERE kh_email='{$_SESSION['khach_hang']['email']}'");
        $row_kh=$result_kh->fetch_array();
        $kh_id=$row_kh['id'];
	}else{
		header("location: ./taikhoan/dangnhap.php");
	}

	if(isset($_POST['submit'])){
		$ten=$_POST['ten'];
		$email=$_POST['email'];
		$diachi=$_POST['diachi'];
		$sdt=$_POST['sdt'];

		$sql="UPDATE khach_hang SET kh_hoten='$ten', kh_email='$email', kh_sdt='$sdt', kh_dia_chi='$diachi' WHERE id=$kh_id";
        $result=$conn->query($sql);
        if($result){
        	$_SESSION['khach_hang']['email']=$email;
            $_SESSION['khach_hang']['ten']=$ten;
            $_SESSION['khach_hang']['sdt']=$sdt;
            $_SESSION['khach_hang']['diachi']=$diachi;
            header("location: ./index.php?page_layout=taikhoan_chitiet&page_tk=thongtin_tk");
        }else{
            echo"alert('Chỉnh sửa không thành công');";
        }
	}

?>
<div class="row justify-content-center align-items-center">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col">
<div class="product__discount">
<div class="section-title product__discount__title">
    <h2>Thông tin tài khoản</h2>
</div>
<div class="row">
    <form method="POST">
    	<dl class="row">
		  <dt class="col-sm-3">Họ Tên</dt>
		  <dd class="col-sm-9"><input type="text" name="ten" value="<?php if(isset($ten)) echo $ten; else echo $ten_kh; ?>"></dd>

		  <dt class="col-sm-3">Số điện thoại</dt>
		  <dd class="col-sm-9"><input type="text" name="sdt" value="<?php if(isset($sdt)) echo $sdt; else echo $sdt_kh; ?>"></dd>

		  <dt class="col-sm-3">Email</dt>
		  <dd class="col-sm-9"><input type="email" name="email" value="<?php if(isset($email)) echo $email; else echo $email_kh; ?>"></dd>

		  <dt class="col-sm-3">Địa chỉ</dt>
		  <dd class="col-sm-9"><input type="text" name="diachi" value="<?php if(isset($diachi)) echo $diachi; else echo $diachi_kh; ?>"></dd>

		  <dt class="col-sm-3"></dt>
		  <dd class="col-sm-9">
		  	<input class="btn btn-primary" type="submit" name="submit" value="Lưu sửa đổi" />
		  	<a class="btn btn-default" onclick="confirm('Chỉnh sửa sẽ không được lưu! bạn có chắc chắn hủy.');" href="./index.php?page_layout=taikhoan_chitiet&page_tk=thongtin_tk">Hủy</a></dd>
		</dl>
    </form>
</div>
</div></div></div>