<?php
    ob_start();
    session_start();
    include_once'../include/config.php';

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $pass=$_POST['pass'];
        $re_pass=$_POST['re_pass'];

        if($pass==$re_pass){
            $sql="INSERT INTO `khach_hang`(`kh_hoten`, `kh_email`, `kh_pass`, `kh_sdt`, `kh_dia_chi`) VALUES ('$ten','$email','$pass','$sdt','$diachi')";

            $result=$conn->query($sql);

            if($result){
                $_SESSION['khach_hang']['email']=$email;
                $_SESSION['khach_hang']['pass']=$pass;
                $_SESSION['khach_hang']['ten']=$ten;
                $_SESSION['khach_hang']['sdt']=$sdt;
                $_SESSION['khach_hang']['diachi']=$diachi;

                header("location: ./thongtin_tk.php");
            }
        }else{
            echo'<script> alert("Nhập lại mật khẩu không khớp."); </script>';
        }
    }

    if(isset($_SESSION['khach_hang']))
        header("location: ../index.php");
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
        <title>Đăng ký</title>
        <link href="../assets/taikhoan/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputten" type="text" placeholder="Nguyễn Văn A" name="ten" required value="<?php if(isset($ten)) echo $ten;?>"/>
                                                <label for="inputten">Họ tên</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="0987654321" name="sdt" required value="<?php if(isset($sdt)) echo $sdt;?>"/>
                                                        <label for="inputFirstName">SĐT</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" required value="<?php if(isset($email)) echo $email;?>"/>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputdiachi" type="text" placeholder="Địa chỉ" name="diachi" required value="<?php if(isset($diachi)) echo $diachi;?>"/>
                                                <label for="inputdiachi">Địa chỉ</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Mật khẩu" name="pass" required />
                                                        <label for="inputPassword">Mật khẩu</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Nhập lại mật khẩu" name="re_pass" required />
                                                        <label for="inputPasswordConfirm">Nhập lại mật khẩu</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" name="submit"class="btn btn-primary btn-block" value="Đăng ký"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./dangnhap.php">Đã có tài khoản? Đăng nhập.</a></div>
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
<?php } ?>