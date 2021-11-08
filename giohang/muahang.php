<?php
    if(!isset($_SESSION['giohang'])){
        echo"
            <script type='text/javascript'>
                alert('Chưa sản phẩm nào trong giỏ hàng. Vui lòng mua hàng để tiếp tục');
                location.href = './index.php?page_layout=sanpham';
            </script>
        ";
    }else{
        if(count($_SESSION['giohang'])==0){
            echo"
                <script type='text/javascript'>
                    alert('Chưa sản phẩm nào trong giỏ hàng. Vui lòng mua hàng để tiếp tục');
                    location.href = './index.php?page_layout=sanpham';
                </script>
            ";
        }
    }

    if(!isset($_SESSION['khach_hang'])){
        echo"
            <script language='javascript'>
                alert('Vui lòng đăng nhập để mua hàng');
                location.href = './taikhoan/dangnhap.php';
            </script>
        ";
        //header("location: ./taikhoan/dangnhap.php");
    }else{
        $ten_kh=$_SESSION['khach_hang']['ten'];
        $diachi_kh=$_SESSION['khach_hang']['diachi'];
        $email_kh=$_SESSION['khach_hang']['email'];
        $sdt_kh=$_SESSION['khach_hang']['sdt'];
    }

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $email=$_POST['email'];
        $ghichu=$_POST['ghichu'];
        $hinhthuc_tt=$_POST['hinhthuc_tt'];
        $tongtien=$_POST['tongtien'];
        $ngaytao=date("Y-m-d");
        $tinh_trang_id=1;

        $result_kh=$conn->query("SELECT id FROM khach_hang WHERE kh_email='{$_SESSION['khach_hang']['email']}'");
        $row_kh=$result_kh->fetch_array();
        $kh_id=$row_kh['id'];

        $sql_dh="INSERT INTO `don_hang`(`dh_ten_nguoi_nhan`, `dh_email`, `dh_dia_chi`, `dh_sdt`, `dh_tong_tien`, `tinh_trang_id`, `dh_hinh_thuc_tt`, `dh_ngay_tao`, `dh_ghi_chu`, `kh_id`) VALUES ('$ten','$email','$diachi','$sdt','$tongtien','$tinh_trang_id','$hinhthuc_tt','$ngaytao','$ghichu','$kh_id')";
        $result_dh=$conn->query($sql_dh);
        if($result_dh){
            foreach($_SESSION['giohang'] as $key=>$value){
                $result_id=$conn->query("SELECT * FROM don_hang ORDER BY id DESC LIMIT 1");
                $row_id=$result_id->fetch_array();
                $dh_id=$row_id['id'];

                $sql_ct="INSERT INTO `ct_don_hang`(`san_pham_id`, `chi_tiet_so_luong`, `don_hang_id`) VALUES ('$key','$value','$dh_id')";
                $result_ct=$conn->query($sql_ct);
            }
            exit();
            unset($_SESSION['giohang']);
            echo"
                <script type='text/javascript'>
                    alert('Mua hàng thành công');
                    location.href = './index.php';
                </script>
            ";
        }else{
            echo"
                <script type='text/javascript'>
                    alert('Mua hàng không thành công. Vui lòng kiểm tra lại thông tin.');
                </script>
            ";
        }


    }
    
    if(isset($_SESSION['giohang'])){
        $arrId = array();
        foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
            $arrId[]=$id_sp;
        }
        $strId = implode(',', $arrId);
        $sql = "SELECT * FROM san_pham WHERE id IN ($strId) ORDER BY id DESC";
        $result = $conn->query($sql);
?>
<script type="text/javascript">
</script>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin đơn hàng</h4>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Tên người nhận<span>*</span></p>
                            <input type="text" name="ten" value="<?php if(isset($ten)) echo $ten; else echo $ten_kh;?>" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>SĐT<span>*</span></p>
                                    <input type="text" name="sdt" value="<?php if(isset($sdt)) echo $sdt; else echo $sdt_kh;?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="<?php if(isset($email)) echo $email; else echo $email_kh;?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="diachi" value="<?php if(isset($diachi)) echo $diachi; else echo $diachi_kh;?>" required>
                        </div>

                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <textarea name="ghichu" style="min-width: 100%" rows="auto"><?php if(isset($ghichu)) echo $ghichu; ?></textarea>
                        </div>

                        <div class="checkout__input">
                            <p>Hình thức thanh toán<span>*</span></p>
                            <select style="min-width: 100%" name="hinhthuc_tt" required>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                        
                        
                        <!--<div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>-->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Giỏ hàng</h4>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col" class="checkout__order__products">Sản phẩm</th>
                                  <th scope="col" class="checkout__order__products">Thành tiền</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $tongtien = 0;
                                    if($result){
                                    while($row = $result->fetch_array()){
                                        $thanhtien = $row['sp_gia']*$_SESSION['giohang'][$row['id']];
                                        $tongtien += $thanhtien;
                                        echo"<tr>";
                                        echo"<td scope='row'>".$row['sp_ten']."</td>";
                                        echo"<td><strong>$thanhtien VNĐ</strong></td>";
                                        echo"</tr>";
                                 }} ?>
                              </tbody>
                            </table>
                            <!--<div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li>Vegetable’s Package <span>$75.99</span></li>
                                <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li>
                            </ul>-->
                            <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                            <div class="checkout__order__total">Total <span><?php echo $tongtien; ?></span>
                                <input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button onclick="confirm('Bạn có chắc chắn đặt hàng');" type="submit" class="site-btn" name="submit">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
<?php } ?>