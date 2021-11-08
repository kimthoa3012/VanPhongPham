<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php
                    $sql_loai = "SELECT * FROM loai_hang";
                    $result_loai = $conn->query($sql_loai);
                    if($result_loai->num_rows > 0)
                        while($row_loai=$result_loai->fetch_array()){
                ?>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="image/<?php echo $row_loai["anh"]; ?>">
                        <h5><a href="#"><?php echo $row_loai["loai_hang_ten"]; ?></a></h5>
                    </div>
                </div>
                <?php
                        }
                ?>
                <!--<div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                        <h5><a href="#">Dried Fruit</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                        <h5><a href="#">Vegetables</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm mới</h2>
                </div>
                <!--<div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>-->
            </div>
        </div>
        <div class="row featured__filter">
            <?php
                $sql = "SELECT id, sp_ten, sp_gia, sp_anh FROM san_pham ORDER BY id DESC LIMIT 8";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                    while($row=$result->fetch_array()){
            ?>

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="image/<?php echo $row['sp_anh']?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                            <li><a href="./giohang/themhang.php?sp_id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><?php echo $row['sp_ten']?></a></h6>
                        <h5><?php echo $row['sp_gia']?> VNĐ</h5>
                    </div>
                </div>
            </div>
            <?php
                    }
            ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
