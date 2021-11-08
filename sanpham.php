<?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];

    }else{
        $page=1;
    }
    $rowsPerPage=6;
    $perRow=$page*$rowsPerPage-$rowsPerPage;
    $totalRow=$conn->query("SELECT * FROM san_pham")->num_rows;
    $totalPages=($totalRow/$rowsPerPage);

    $listPage="";
    for($i=1; $i<=$totalPages; $i++){
        if($page==$i){
            $listPage .="<a href='./index.php?page_layout=sanpham&page=$i' class='active'>$i</a>";
        }else{
            $listPage .="<a href='./index.php?page_layout=sanpham&page=$i'>$i</a>";
        }
    }
?>
<style type="text/css">
    a .active{
        color: green;
    }
</style>

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
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Loại sản phẩm</h4>
                            <ul>
                                <li><a href="./index.php?page_layout=sanpham">Tất cả</a></li>
                                <?php
                                    $sql = "SELECT * FROM loai_hang";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0)
                                        while($row=$result->fetch_array()){

                                ?>
                                <li><a href="/index.php?page_layout=sanpham&loai=<?php echo $row['id']?>"><?php echo $row['loai_hang_ten']?></a></li>
                                <?php
                                        }
                                ?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Nhà cung cấp</h4>
                            <ul>
                                <li><a href="./index.php?page_layout=sanpham">Tất cả</a></li>
                                <?php
                                    $sql = "SELECT * FROM nha_cung_cap";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0)
                                        while($row=$result->fetch_array()){

                                ?>
                                <li><a href="./index.php?page_layout=sanpham&ncc=<?php echo $row['id']?>"><?php echo $row['ncc_ten']?></a></li>
                                <?php
                                        }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <?php
                            $sql = "SELECT id, sp_ten, sp_gia, sp_anh FROM san_pham";
                            if(isset($_GET['loai']))
                                $sql .= " WHERE loai_id=".$_GET['loai'];
                            if(isset($_GET['ncc']))
                                $sql .= " WHERE ncc_id=".$_GET['ncc'];

                            $sql .=" LIMIT {$perRow}, {$rowsPerPage}";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0)
                                while($row=$result->fetch_array()){
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="image/<?php echo $row['sp_anh']?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                                        <li><a href="./giohang/themhang.php?sp_id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><?php echo $row['sp_ten']?></a></h6>
                                    <h5><?php echo $row['sp_gia']?> VNĐ</h5>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                        ?>
                    </div>
                    <div class="product__pagination">
                        <?php
                            echo $listPage;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    