<?php
    ob_start();
    session_start();
    require("include/config.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include("include/head.php") ?>
    <title>Ogani | Template</title>
</head>

<body>
    <!-- Page Preloder -->
    <!--<div id="preloder">
        <div class="loader"></div>
    </div>-->

    <!-- Humberger Begin -->
    <?php include("include/humberger.php") ?>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php include("include/header.php") ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <?php include("include/hero.php") ?>
    <!-- Hero Section End -->

    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'sanpham': include_once'sanpham.php';
                    break;
                case 'xemchitiet': include_once'xemchitiet.php';
                    break;
                case 'lienhe': include_once'lienhe.php';
                    break;
                case 'ds_timkiem': include_once'timkiem/ds_timkiem.php';
                    break;
                case 'giohang': include_once'./giohang/chitiet_giohang.php';
                    break;
                case 'timkiem_nc': include_once'./timkiem/timkiem_nc.php';
                    break;
                case 'muahang': include_once'./giohang/muahang.php';
                    break;
                case 'taikhoan_chitiet': include_once'./taikhoan/taikhoan_chitiet.php';
                    break;
            }
        }else include_once'home.php';
    ?>

    <!-- Footer Section Begin -->
    <?php include("include/footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php include("include/js_plugin.php"); ?>
</body>

</html>