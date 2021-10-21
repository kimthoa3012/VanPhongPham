<link href="assets/css/checkbox3.min.css" rel="stylesheet" >
<?php
    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh=$_POST['gioitinh'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $sql="INSERT INTO khach_hang (kh_hoten, kh_email, kh_gioi_tinh, kh_ngay_sinh, kh_sdt, kh_dia_chi) VALUES ('$ten','$email', '$gioitinh', '$ngaysinh','$sdt','$diachi')";
        $result=$conn->query($sql);
        if($result){
            header("location: index.php?page_layout=ds_khachhang");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Thêm không thành công !</h4>";
        }
    }

    if(isset($_POST['reset'])){
        $ten='';
        $ngaysinh = '';
        $gioitinh='';
        $diachi='';
        $sdt='';
        $email='';
    }
?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">
            Thêm khách hàng
        </h1>
        <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Quản lý khách hàng</a></li>
              <li class="active">Thêm khách hàng</li>
        </ol>                 
    </div>    
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nhập thông tin khách hàng</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Họ và tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Họ tên khách hàng" name="ten" value="<?php if(isset($ten)) echo $ten;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Ngày tháng năm sinh" name="ngaysinh" value="<?php if(isset($ngaysinh)) echo $ngaysinh;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giới tính</label>
                                <div class="col-sm-10">
                                  <div class="radio3 radio-check radio-inline">
                                    <input type="radio" id="radio4" name="gioitinh" value="1">
                                    <label for="radio4">
                                      Nam
                                    </label>
                                  </div>
                                  <div class="radio3 radio-check radio-success radio-inline">
                                    <input type="radio" id="radio5" name="gioitinh" value="0">
                                    <label for="radio5">
                                      Nữ
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SDT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="SDT khách hàng" name="sdt" value="<?php if(isset($sdt)) echo $sdt;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Email khách hàng" name="email" value="<?php if(isset($email)) echo $email;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Địa chỉ khách hàng" name="diachi" value="<?php if(isset($diachi)) echo $diachi;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
                                     <button type="submit" name="reset" class="btn btn-default">Làm mới</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if(isset($thongbao)) echo $thongbao;?>
                </div>
            </div>
        </div>
    </div>
</div> 