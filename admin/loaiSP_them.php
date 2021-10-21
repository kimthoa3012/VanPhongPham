<?php
    if(isset($_POST['submit'])){
        $ten=$_POST['loai_hang_ten'];
        $sql="INSERT INTO loai_hang(loai_hang_ten) VALUES ('$ten')";
        $result=$conn->query($sql);
        if($result){
            header("location: index.php?page_layout=ds_loaiSP");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Thêm không thành công !</h4>";
        }
    }

    if(isset($_POST['reset'])){
        $ten="";
    }
?>
<div id="page-wrapper" >
    <div class="header"> 
        <h1 class="page-header">
            THÊM LOẠI SẢN PHẨM
        </h1>
        <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Quản lý sản phẩm</a></li>
              <li class="active">Danh mục loại sản phẩm</li>
        </ol>                 
    </div>    
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nhập thông tin loại sản phẩm</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tên loại sản phẩm" name="loai_hang_ten" value="<?php if(isset($ten)) echo $ten;?>">
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