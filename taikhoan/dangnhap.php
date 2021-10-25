<?php
    ob_start();//tắt lỗi header
    session_start();//khởi tạo session
    include_once'../include/config.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(isset($email) && isset($pass)){
            $sql = "select * from khach_hang where kh_email='$email' and kh_pass='$pass'";

            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1){
               $row=mysqli_fetch_array($result);
                    $_SESSION['khach_hang']['email']=$email;
                    $_SESSION['khach_hang']['pass']=$pass;
                    $_SESSION['khach_hang']['name']=$row['kh_hoten'];
                
                header('location: thongtin_tk.php');
            }else{
                echo '<script> alert("Tài khoản không tồn tại"); </script>';
            }
        }else{
            echo'<script> alert("Email hoặc mật khẩu không đúng"); </script>';
        }
    }
    if(isset($_SESSION['khach_hang']['email'])){header('location: ../index.php');}
    else{
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-3 col-md-3"></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="">
                            <input type="text" placeholder="Email" name="email">
                        </div>
                        <div class="">
                            <input type="password" placeholder="Mật khẩu" name="pass">
                        </div>
                        <div class="row">
                            <div class="col-7 text-left">
                                <a href="./dangky.php">Bạn chưa có tài khoản? Đăng ký!</a>
                            </div>
                            <div class="col-5 text-right">
                                <input type="submit" class="site-btn" value="Đăng nhập" name="submit"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3"></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
    }
?>