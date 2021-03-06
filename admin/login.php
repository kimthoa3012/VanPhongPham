<?php
    ob_start();//tắt lỗi header
    session_start();//khởi tạo session
    include_once'../include/config.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(isset($email) && isset($pass)){
            $sql = "select * from admin where admin_email='$email' and admin_pass='$pass'";

            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1){
               $row=mysqli_fetch_array($result);
                    $_SESSION['email']=$email;
                    $_SESSION['pass']=$pass;
                    $_SESSION['name']=$row['admin_name'];
                
                header('location: index.php');
            }else{
                echo '<center class="alert alert-danger">Tài khoản không tồn tại</center>';
            }
        }else{
            echo'<center class="alert alert-danger">Email hoặc mật khẩu không đúng</center>';
        }
    }
    if(isset($_SESSION['email'])){header('location: index.php');}
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
        <title>Login - SB Admin</title>
        <link href="assets/css/login_styles.css" rel="stylesheet" />
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
                                        <form method="POST" action="" name="dang_nhap">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required name="email"/>
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" required name="pass"/>
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <!--<div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>-->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!--<a class="small" href="password.html">Forgot Password?</a>-->
                                                <input class="btn btn-primary" type="submit" name="submit" value="Đăng nhập">
                                                <!--<a class="btn btn-primary" href="index.html">Đăng nhập</a>-->
                                            </div>
                                        </form>
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
        <script src="assets/js/login_scripts.js"></script>
    </body>
</html>
<?php
}
?>