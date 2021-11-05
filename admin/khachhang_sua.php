<link href="assets/css/checkbox3.min.css" rel="stylesheet" >
<?php
    $kh_id = $_GET['khachhang_id'];
    $sql="SELECT * FROM khach_hang WHERE id='$kh_id'";
    $result=$conn->query($sql);
    $row = $result->fetch_array();

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $sql="UPDATE khach_hang SET kh_hoten='$ten', kh_email='$email', kh_sdt='$sdt', kh_dia_chi='$diachi' WHERE id=$kh_id";
        $result=$conn->query($sql);
        if($result){
            header("location: index.php?page_layout=ds_khachhang");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Thêm không thành công !</h4>";
        }
    }

    if(isset($_POST['reset'])){
        $ten='';
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
                                    <input type="text" class="form-control" placeholder="Họ tên khách hàng" name="ten" value="<?php echo $row['kh_hoten'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SDT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="SDT khách hàng" name="sdt" value="<?php echo $row['kh_sdt'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Email khách hàng" name="email" value="<?php echo $row['kh_email'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Địa chỉ khách hàng" name="diachi" value="<?php echo $row['kh_dia_chi'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
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