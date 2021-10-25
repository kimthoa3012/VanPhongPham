
<section class="hero<?php if(isset($_GET['page_layout'])) if($_GET['page_layout'] != 'home') echo' hero-normal'; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Loại sản phẩm</span>
                        </div>
                        <ul>
                            <?php
                                $sql = "SELECT * FROM loai_hang";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0)
                                    while($row=$result->fetch_array()){

                            ?>
                            <li><a href="./index.php?page_layout=sanpham&loai=<?php echo $row['id']; ?>"><?php echo $row['loai_hang_ten']?></a></li>
                            <?php
                                    }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <?php include('./timkiem/timkiem.php');?>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+85 123456789</h5>
                                <span>hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_GET['page_layout'])){ if($_GET['page_layout'] == 'home'){
                                echo '<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>';
                            
                        }}
                        else{
                            echo '<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>