<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Online Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Tài khoản</h4>
                        <ul>
                            <li><a href="./index.php?page_layout=taikhoan_chitiet&page_tk=thongtin_tk">Thông tin tài khoản</a></li>
                            <li><a href="./index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk">Đơn hàng</a></li>
                            <li><a href="./taikhoan/dangxuat.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                
                <?php
                    if(isset($_GET['page_tk'])){
                        switch($_GET['page_tk']){
                            case 'thongtin_tk': include_once'./taikhoan/thongtin_tk.php';
                                break;
                            case 'chinhsua_tk': include_once'./taikhoan/chinhsua_tk.php';
                                break;
                            case 'donhang_tk': include_once'./taikhoan/donhang_tk.php';
                                break;
                            case 'donhang_info': include_once'./taikhoan/donhang_info.php';
                                break;
                        }
                    }else include_once'./taikhoan/thongtin_tk.php';
                ?>
        </div>
    </div>
</section>
<!-- Product Section End -->
    