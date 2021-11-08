<?php
    if(isset($_POST['submit'])){
        if(!isset($_SESSION['khach_hang'])){
            echo"
                <script type='text/javascript'>
                    alert('Bạn đăng nhập để thực hiện thao tác này');
                    location.href = './taikhoan/dangnhap.php';
                </script>";
        }else{
            $binhluan_noi_dung=$_POST['binhluan'];
            $result_kh=$conn->query("SELECT id FROM khach_hang WHERE kh_email='{$_SESSION['khach_hang']['email']}'");
            $row_kh=$result_kh->fetch_array();
            $kh_id=$row_kh['id'];
            $sp_id=$_GET['sp_id'];
            $binh_luan_ngay=date("Y-m-d");

            $sql_blthem="INSERT INTO `binh_luan`(`kh_id`, `sp_id`, `binh_luan_noi_dung`, `binh_luan_ngay`) VALUES ('$kh_id','$sp_id','$binhluan_noi_dung','$binh_luan_ngay')";
            $result_blthem=$conn->query($sql_blthem);
            if($result_blthem){
                echo"
                <script type='text/javascript'>
                    alert('Bình luận thành công');
                </script>";
            }else{
                echo"
                <script type='text/javascript'>
                    alert('Bình luận thất bại thành công');
                </script>";
            }

        }
    }

    if(isset($_GET['sp_id'])){
        $sql = "SELECT * FROM san_pham sp, loai_hang l, nha_cung_cap ncc WHERE sp.loai_id=l.id AND sp.ncc_id=ncc.id AND sp.id=".$_GET['sp_id'];
        $result=$conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_array();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Chi tiết sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item" width="300px">
                            <img class="product__details__pic__item--large"
                                src="image/<?php echo $row['sp_anh']; ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="image/<?php echo $row['sp_anh1']; ?>"
                                src="image/<?php echo $row['sp_anh1']; ?>" alt="">
                            <img data-imgbigurl="image/<?php echo $row['sp_anh2']; ?>"
                                src="image/<?php echo $row['sp_anh2']; ?>" alt="">
                            <img data-imgbigurl="image/<?php echo $row['sp_anh3']; ?>"
                                src="image/<?php echo $row['sp_anh3']; ?>" alt="">
                            <img data-imgbigurl="image/<?php echo $row['sp_anh1']; ?>"
                                src="image/<?php echo $row['sp_anh']; ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row['sp_ten']; ?></h3>
                        <div class="product__details__price"><?php echo $row['sp_gia']." VNĐ"; ?></div>
                        
                        <a href="./giohang/themhang.php?sp_id=<?php echo $row['id']; ?>" class="primary-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <!--<li><b>Màu sắc</b> <span>In Stock</span></li>
                            <li><b>Kích thước</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Trọng lượng</b> <span>0.5 kg</span></li>-->
                            <li><b>Nhà cung cấp</b> <span><?php echo $row['ncc_ten']; ?></span></li>
                            <li><b>Loại sản phẩm</b> <span><?php echo $row['loai_hang_ten']; ?></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Bình luận</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Mô tả sản phẩm</h6>
                                    <p><?php echo $row['sp_mo_ta']; ?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Bình luận của bạn</h6>
                                    <form action="" method="post">
                                        <textarea class="form-control" name="binhluan" required><?php if(isset($binhlua_noi_dung)) echo $binhluan_noi_dung?></textarea>
                                        <br/>
                                        <input type="submit" name="submit" value="Bình luận">
                                    </form>
                                </div>
                                <div class="mt-4">
                                    <h5 style="font-weight: bold;">Tất cả bình luận</h5>
                                    <table class="table">
                                        <tbody>
                                            <?php
                                                $sql_bl="select bl.*, kh.kh_hoten from binh_luan bl join khach_hang kh on bl.kh_id=kh.id where bl.sp_id=".$_GET['sp_id'];
                                                $result_bl=$conn->query($sql_bl);
                                                if($result_bl->num_rows>0){
                                                    while($row_bl=$result_bl->fetch_array()){
                                                        echo"<tr>";
                                                        echo"<th width='15%'>
                                                            <span style='display: block; font-weight: normal; font-size:12px'>".$row_bl['binh_luan_ngay']."</span>".
                                                            $row_bl['kh_hoten']."</th>";
                                                        echo"<td>".$row_bl['binh_luan_noi_dung']."</td>";
                                                        echo"</tr>";
                                                    };
                                                }
                                            ?>
                                          <tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
            }
        }
    ?>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <!--<section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Related Product Section End -->

    