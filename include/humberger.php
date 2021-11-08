<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="./assets/img//logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <?php include("./giohang/giohang.php"); ?>
        </div>
        <div class="humberger__menu__widget">
            
            <?php include("./taikhoan/taikhoan.php"); ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Trang chủ</a></li>
                <li><a href="./index.php?page_layout=sanpham">Sản phẩm</a></li>
                <!--<li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>-->
                <li><a href="./index.php?page_layout=timkiem_nc">Tìm kiếm</a></li>
                <li><a href="./index.php?page_layout=baitap&page_bt=1&bai=1">Bài tập</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./index.php?page_layout=baitap&page_bt=1&bai=1">PHP & Form</a></li>
                        <li><a href="./index.php?page_layout=baitap&page_bt=2&bai=1">Mảng,chuỗi & Hàm</a></li>
                        <li><a href="./index.php?page_layout=baitap&page_bt=3&bai=1">PHP & MySQL</a></li>
                    </ul>
                </li>
                <li><a href="./index.php?page_layout=gioithieu">Thông tin cá nhân</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> statstore@gmail.com.com</li>
                <li>Free ship cho đơn hàng từ 200k</li>
            </ul>
        </div>
    </div>