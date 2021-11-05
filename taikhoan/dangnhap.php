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
                    $_SESSION['khach_hang']['ten']=$row['kh_hoten'];
                    $_SESSION['khach_hang']['sdt']=$row['kh_sdt'];
                    $_SESSION['khach_hang']['diachi']=$row['kh_dia_chi'];
                
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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng nhập</title>
        <link href="../assets/taikhoan/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" value="<?php if(isset($email)) echo $email;?>" required/>
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Mật khẩu" name="pass" required />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary" name="submit" value="Đăng nhập">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./dangky.php">Chưa có tài khoản? Đâng ký.</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<!--<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    
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

</html>-->
<?php
    }
?>