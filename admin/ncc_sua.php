<?php
    $ncc_id = $_GET['ncc_id'];
    $sql="SELECT * FROM nha_cung_cap WHERE id='$ncc_id'";
    $result=$conn->query($sql);
    $row = $result->fetch_array();

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $sql2="UPDATE nha_cung_cap SET ncc_ten='$ten', ncc_dia_chi='$diachi', ncc_sdt='$sdt', ncc_email='$email' WHERE id=".$row['id'];
        echo "<div style='color: white;'>".$sql."</div>";
        $result=$conn->query($sql2);
        if($result){
            header("location: index.php?page_layout=ds_ncc");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Sửa không thành công !</h4>";
        }
    }

    if(isset($_POST['reset'])){
        $ten="";
    }
?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">
            Thêm nhà cung cấp
        </h1>
        <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Quản lý sản phẩm</a></li>
              <li><a href="#">Nhà cung cấp</li>
              <li class="active">Sửa nhà cung cấp</li>
        </ol>                 
    </div>    
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nhập thông tin nhà cung cấp</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tên nhà cung cấp" name="ten" value="<?php echo $row['ncc_ten']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Địa chỉ nhà cung cấp" name="diachi" value="<?php echo $row['ncc_dia_chi']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SDT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="SDT nhà cung cấp" name="sdt" value="<?php echo $row['ncc_sdt']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Email nhà cung cấp" name="email" value="<?php echo $row['ncc_email']?>">
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