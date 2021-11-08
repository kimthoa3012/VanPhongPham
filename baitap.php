<?php
    if(isset($_GET['page_bt'])){
        $page_bt=$_GET['page_bt'];
        if($page_bt==1){
            $h2="PHP &amp; Form";
            $thumuc="PHP_Form";
            $n=8;
        }
        else if($page_bt==2){
            $h2="Mảng, chuỗi &amp; Hàm";
            $thumuc="MangChuoiHam";
            $n=7;
        }
        else if($page_bt==3){
            $h2="PHP &amp; SQL";
            $thumuc="PHP_SQL";
            $n=9;
        }
    }else{
        header("location: ./index.php");
    }

    if(isset($_GET['bai'])){
        if(is_numeric($_GET['bai']))
            $bai="bai".$_GET['bai'].".php";
        else $bai=$_GET['bai'];
    }else{
        $bai="bai1.php";
    }

?>
<style type="text/css">
    
    .borderless td, .borderless th {
        border: none;
    }
    table{
        background-color: #bee5eb;
        with: 60%;
    }
    table tr th{
        background-color: #17a2b8;
        color: #ffffff;
        text-align: center;
        text-transform: uppercase;
    }
    table td, table th{
        padding: 8px 10px 8px 10px;
    }
    h3 {
    color: #0fbcf9;
    text-align: center;
    }
</style>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $h2;?></h2>
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
                            <h4>Danh sách</h4>
                            <ul>
                                <?php
                                    for($i=1; $i<=$n; $i++){
                                ?>
                                <li><a href="./index.php?page_layout=baitap&page_bt=<?php echo $page_bt;?>&bai=<?php echo $i;?>">Bài tập số <?php echo $i;?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                        <?php
                            $path="./mypage/baitap/".$thumuc."/".$bai;
                            include($path);
                        ?>
                    <div class="product__pagination">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    