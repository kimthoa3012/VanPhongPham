<div class="header__top__right__auth">
<?php

    if(isset($_SESSION['khach_hang']['ten'])){
        $ten=$_SESSION['khach_hang']['ten'];
?>
        <a href="./index.php?page_layout=taikhoan_chitiet"><i class="fa fa-user"></i><?php echo $ten; ?></a>
        <!--<a href="./taikhoan/dangxuat.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>-->
<?php
    }else{
?>
        <a href="./taikhoan/dangnhap.php"><i class="fa fa-user"></i>Đăng nhập</a>
<?php 
    }
?>
</div>
