<?php
    if(isset($_POST['timkiem'])){
        $sql_sp="SELECT * FROM san_pham WHERE 1";

        if(isset($_POST['ten'])){
            $ten=$_POST['ten'];
            $ten1 = trim($ten);
            $arr_ten1 = explode(' ', $ten1);
            $textNew = implode('%', $arr_ten1);
            $textNew = '%'.$textNew.'%';

            $sql_sp .=" AND sp_ten LIKE ('$textNew')";
        }

        if(isset($_POST['giatu'])&&isset($_POST['giaden']))
            if($_POST['giatu'] < $_POST['giaden']){
                $giatu=$_POST['giatu'];
                $giaden=$_POST['giaden'];

                $sql_sp .=" AND sp_gia BETWEEN {$giatu} AND {$giaden}";
            }else $error_gia="<div style='color:red;'></div>";

        if(isset($_POST['ncc'])){
            $ncc=$_POST['ncc'];
            if($ncc!=0){
                $sql_sp .=" AND ncc_id={$ncc}";
            }
        }

        if(isset($_POST['loai'])){
            $loai=$_POST['loai'];
            if($loai!=0){
                $sql_sp .=" AND loai_id={$loai}";
            }
        }

        $result_sp=$conn->query($sql_sp);
    }
?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
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
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nhập thông tin tìm kiếm</h2>
                </div>
            </div>
        </div>
            <div>
                <form method="POST">
                    <dl class="row">
                      <dt class="col-sm-3">Tên</dt>
                      <dd class="col-sm-9"><input type="text" name="ten" value="<?php if(isset($ten)) echo $ten; ?>"></dd>

                      <dt class="col-sm-3">Giá</dt>
                      <dd class="col-sm-9">
                        <input type="number" min="0" step="100" name="giatu" value="<?php if(isset($giatu)) echo $giatu; else echo '0';?>">VNĐ 
                        <i class="fa fa-arrow-right" aria-hidden="true"></i> 
                        <input type="number" min="0" step="100" name="giaden" value="<?php if(isset($giaden)) echo $giaden; else echo '10000000';?>">VNĐ
                      </dd>

                      <dt class="col-sm-3">Nhà cung cấp</dt>
                      <dd class="col-sm-9">
                          <select name="ncc" class="form-control">
                            <option value="0">Lựa chọn nhà cung cấp</option>
                            <?php
                                $sql_ncc="SELECT * FROM nha_cung_cap";
                                $result_ncc=$conn->query($sql_ncc);
                                if($result_ncc->num_rows>0){
                                    while ($row_ncc=$result_ncc->fetch_array()) {
                                        $selected_ncc='';
                                        if(isset($ncc)){
                                            if($ncc==$row_ncc['id']) $selected_ncc="selected";
                                        }
                                        echo "<option value='".$row_ncc['id']."' ".$selected_ncc.">".$row_ncc['ncc_ten']."</option>";
                                    }
                                }
                            ?>
                        </select>
                      </dd>

                      <dt class="col-sm-3">Loại sản phẩm</dt>
                      <dd class="col-sm-9">
                        <select name="loai" class="form-control">
                            <option value="0">Lựa chọn loại sản phẩm</option>
                            <?php
                                $sql_loai="SELECT * FROM loai_hang";
                                $result_loai=$conn->query($sql_loai);
                                if($result_loai->num_rows>0){
                                    while ($row_loai=$result_loai->fetch_array()) {
                                        $selected_loai='';

                                        if(isset($loai)){
                                            if($loai==$row_loai['id']){ $selected_loai=" selected";}}
                                        echo "<option value='".$row_loai['id']."' ".$selected_loai.">".$row_loai['loai_hang_ten']."</option>";
                                }}
                            ?>
                        </select>

                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <input type="submit" name="timkiem" value="Tìm kiếm"> 
                            <input type="submit" name="reset" value="Làm mới"> 
                        </dd>
                      </dd>
                    </dl>
                </form>
            </div>
            <hr/>
            <h4 align="center" class="pb-3">Kết quả tìm kiếm</h4>
            <div class="">
                <div class="row">
                    <?php
                    if(isset($result_sp))
                        if($result_sp->num_rows > 0)
                            while($row_sp=$result_sp->fetch_array()){
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="image/<?php echo $row_sp['sp_anh']?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row_sp['id']?>"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                                    <li><a href="./giohang/themhang.php?sp_id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row_sp['id']?>"><?php echo $row_sp['sp_ten']?></a></h6>
                                <h5><?php echo $row_sp['sp_gia']?> VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    