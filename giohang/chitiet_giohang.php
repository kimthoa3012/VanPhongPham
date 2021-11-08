
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <?php
                if(isset($_SESSION['giohang'])){
                    if(isset($_POST['sl'])){
                        foreach($_POST['sl'] as $id_sp=>$sl){
                            if($sl==0){
                                unset($_SESSION['giohang'][$id_sp]);
                            }else{
                                $_SESSION['giohang'][$id_sp]=$sl;
                            }
                        }
                    }
                    $arrId = array();
                    foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
                        $arrId[]=$id_sp;
                    }
                    $strId = implode(',', $arrId);
                    $sql = "SELECT * FROM san_pham WHERE id IN ($strId) ORDER BY id DESC";
                    //var_dump($sql); exit;
                    $result = $conn->query($sql);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <form id="giohang" method="POST">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tongtien = 0;
                                        if($result){
                                        while($row = $result->fetch_array()){
                                            $thanhtien = $row['sp_gia']*$_SESSION['giohang'][$row['id']];
                                            $tongtien += $thanhtien;

                                    ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img width="70px" src="./image/<?php echo $row['sp_anh'];?>" alt="">
                                            <h5><?php echo $row['sp_ten'];?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?php echo $row['sp_gia'];?> VNĐ
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="number" name="sl[<?php echo $row['id'];?>]" value="<?php echo $_SESSION['giohang'][$row['id']];?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?php echo $thanhtien;?> VNĐ
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="./giohang/xoa_hang.php?id_sp=<?php echo $row['id'];?>"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }}
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <a href="#" onclick="document.getElementById('giohang').submit();" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <!--<div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>-->
                </div>
                <div class="col-md-4">
                    <div class="shoping__checkout">
                        <ul>
                            <li>Tổng tiền<span><?php echo $tongtien; ?> VNĐ</span></li>
                        </ul>
                        <a href="./index.php?page_layout=muahang" class="primary-btn">Mua hàng</a>
                    </div>
                </div>
            </div>

            <?php
                }else{
                    echo '<script>alert("Không có sản phẩm nào trong giỏ hàng")</script>';
                }
            ?>
        </div>
    </section>
    <!-- Shoping Cart Section End -->