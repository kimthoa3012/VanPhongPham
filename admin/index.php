<?php
require('../include/config.php');
ob_start();
session_start();
    if($_SESSION['email']=="admin@gmail.com" and $_SESSION['pass']=="123456"){
?>
<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template - WebThemez</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
     
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <!--CKeditor-->
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>

</head>

<body>
    <div id="wrapper">
        <?php include("include_navbar_top.php"); ?>
        <!--/. NAV TOP  -->
        <?php include("include_navbar_left.php"); ?>
        <!-- /. NAV SIDE  -->
      
		<?php
            if(isset($_GET['page_layout'])){
                switch($_GET['page_layout']){
                    case 'ds_loaiSP': include_once'ds_loaiSP.php';
                        break;
                    case 'loaiSP_them': include_once'loaiSP_them.php';
                        break;
                    case 'loaiSP_sua': include_once'loaiSP_sua.php';
                        break;
                    case 'ds_ncc': include_once'ds_ncc.php';
                        break;
                    case 'ncc_them': include_once'ncc_them.php';
                        break;
                    case 'ncc_sua': include_once'ncc_sua.php';
                        break;
                    case 'ds_sanpham': include_once'ds_sanpham.php';
                        break;
                    case 'ds_khachhang': include_once'ds_khachhang.php';
                        break;
                    case 'khachhang_them': include_once'khachhang_them.php';
                        break;
                    case 'khachhang_sua': include_once'khachhang_sua.php';
                        break;
                    case 'ds_sanpham': include_once'ds_sanpham.php';
                        break;
                    case 'sanpham_them': include_once'sanpham_them.php';
                        break;
                    case 'sanpham_sua': include_once'sanpham_sua.php';
                        break;
                    case 'ds_tinhtrang': include_once'ds_tinhtrang.php';
                        break;
                    case 'home': include_once'ds_loaiSP.php';
                        break;
                }
            }else include_once'ds_sanpham.php';
        ?>
                <!-- /. ROW  -->
			
		
				<?php include('include_footer.php'); ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    
    
</body>

</html>
<?php
}else{
    header("location: login.php");
}
?>