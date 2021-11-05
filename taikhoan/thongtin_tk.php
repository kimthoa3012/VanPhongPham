<?php
	if(isset($_SESSION['khach_hang'])){
		$ten_kh=$_SESSION['khach_hang']['ten'];
        $diachi_kh=$_SESSION['khach_hang']['diachi'];
        $email_kh=$_SESSION['khach_hang']['email'];
        $sdt_kh=$_SESSION['khach_hang']['sdt'];
	}else{
		header("location: ./taikhoan/dangnhap.php");
	}
?>
<div class="row justify-content-center align-items-center">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col">
<div class="product__discount">
<div class="section-title product__discount__title">
    <h2>Thông tin tài khoản</h2>
</div>
    <div>
    	<dl class="row align-items-center">
		  <dt class="col-sm-3">Họ Tên</dt>
		  <dd class="col-sm-9"><?php echo $ten_kh ?></dd>

		  <dt class="col-sm-3">Số điện thoại</dt>
		  <dd class="col-sm-9"><?php echo $sdt_kh ?></dd>

		  <dt class="col-sm-3">Email</dt>
		  <dd class="col-sm-9"><?php echo $email_kh ?></dd>

		  <dt class="col-sm-3">Địa chỉ</dt>
		  <dd class="col-sm-9"><?php echo $diachi_kh ?></dd>

		  <dt class="col-sm-3"></dt>
		  <dd class="col-sm-9">
		  	<a class="btn btn-primary" href="./index.php?page_layout=taikhoan_chitiet&page_tk=chinhsua_tk">Chỉnh sửa</a></dd>
		  </dl>
    </div>
</div></div></div>