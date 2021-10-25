<div class="header__top__right__auth">
<?php

    if(isset($_SESSION['khach_hang']['name'])){
        $ten=$_SESSION['khach_hang']['name'];
?>
        <a href="./taikhoan/thongtin_tk.php"><i class="fa fa-user"></i><?php echo $ten; ?></a>
<?php
    }else{
?>
        <a href="./taikhoan/dangnhap.php"><i class="fa fa-user"></i>Đăng nhập</a>
<?php 
    }
?>
</div>
