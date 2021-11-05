<?php
    if(isset($_GET['sanpham_id'])){
        $sanpham_id=$_GET['sanpham_id'];
        $sql_sp="SELECT * FROM san_pham WHERE id={$sanpham_id}";

        $result_sp=$conn->query($sql_sp);
        if($result_sp->num_rows>0){
            $row_sp=$result_sp->fetch_array();
            $ten=$row_sp['sp_ten'];
            $soluong=$row_sp['sp_so_luong'];
            $gia=$row_sp['sp_gia'];
            $mota=$row_sp['sp_mo_ta'];
            $image=$row_sp['sp_anh'];
            $image1=$row_sp['sp_anh1'];
            $image2=$row_sp['sp_anh2'];
            $image3=$row_sp['sp_anh3'];
            $ncc=$row_sp['ncc_id'];
            $loai=$row_sp['loai_id'];
        }

    }

    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $soluong=$_POST['soluong'];
        $gia=$_POST['gia'];
        $mota=$_POST['mota'];

        if($_FILES['image']['name']=='')
            $image=$_POST['image'];
        else
            $image=$_FILES['image']['name'];

        if($_FILES['image1']['name']=='')
            $image1=$_POST['image1'];
        else
            $image1=$_FILES['image1']['name'];

        if($_FILES['image2']['name']=='')
            $image2=$_POST['image2'];
        else
            $image2=$_FILES['image2']['name'];

        if($_FILES['image3']['name']=='')
            $image3=$_POST['image3'];
        else
            $image3=$_FILES['image3']['name'];



        if($_POST['ncc']==0){
            $error_ncc="<span style='color: red;'>Vui lòng chọn nhà cung cấp</span>";
        }else{$ncc=$_POST['ncc'];}

        if($_POST['loai']==0){
            $error_loai="<span style='color: red;'>Vui lòng chọn loại sản phẩm</span>";
        }else{$loai=$_POST['loai'];}

        //if(isset($ten)&&isset($soluong)&&isset($gia)&&isset($mota)&&isset($loai)&&isset($ncc)&&isset($image)&&isset($image1)&&isset($image2)&&isset($image3)){



            $sql_sua="UPDATE `san_pham` SET `sp_ten`= '{$ten}', `sp_so_luong`={$soluong}, `sp_gia`={$gia}, `sp_anh`='{$image}', `sp_anh1`='{$image1}', `sp_anh2`='{$image2}', `sp_anh3`='{$image3}', `sp_mo_ta`='{$mota}', `loai_id`='{$loai}', `ncc_id`='{$ncc}' WHERE id={$sanpham_id}";

            //upload ảnh
            move_uploaded_file($_FILES['image']['tmp_name'], "../image/".$image);
            if($image1!='') move_uploaded_file($_FILES['image1']['tmp_name'], "../image/".$image1);
            if($image2!='') move_uploaded_file($_FILES['image2']['tmp_name'], "../image/".$image2);
            if($image3!='') move_uploaded_file($_FILES['image3']['tmp_name'], "../image/".$image3);


            $result_sua=$conn->query($sql_sua);
            if($result_sua){
                header("location: ./index.php?page_layout=ds_sanpham");
            }else{
                echo "<script> alert('Cập nhật không thành công vui lòng kiểm tra lại');</script>";
            }
        //}
    }

    if(isset($_POST['reset'])){
        $ten="";
        $soluong="";
        $gia="";
        $ncc=0;
        $loai=0;
        $mota="";
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
              <li class="active">Thêm nhà cung cấp</li>
        </ol>                 
    </div>    
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nhập thông tin sản phẩm</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype = "multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten']; else echo $row_sp['sp_ten'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control" placeholder="0" name="soluong" value="<?php if(isset($_POST['soluong'])) echo $_POST['soluong']; else echo $row_sp['sp_so_luong'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Giá</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" step="100" class="form-control" placeholder="0 VNĐ" name="gia" value="<?php if(isset($_POST['gia'])) echo $_POST['gia']; else echo $row_sp['sp_gia'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ảnh chính</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" >
                                    <input type="hidden" class="form-control" name="image" value="<?php echo $row_sp['sp_anh'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ảnh 1</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image1" >
                                    <input type="hidden" class="form-control" name="image1" value="<?php echo $row_sp['sp_anh1'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ảnh 2</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image2" >
                                    <input type="hidden" class="form-control" name="image2" value="<?php echo $row_sp['sp_anh2'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ảnh 3</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image3">
                                    <input type="hidden" class="form-control" name="image3" value="<?php echo $row_sp['sp_anh3'];?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nhà cung cấp</label>
                                <div class="col-sm-10">
                                    <select name="ncc" class="form-control">
                                        <option value="0">Lựa chọn nhà cung cấp</option>
                                        <?php
                                            $sql_ncc="SELECT * FROM nha_cung_cap";
                                            $result_ncc=$conn->query($sql_ncc);
                                            if($result_ncc->num_rows>0){
                                                while ($row_ncc=$result_ncc->fetch_array()) {
                                                    $selected_ncc='';
                                                    if(isset($row_sp['ncc_id'])){
                                                        if($row_sp['ncc_id']==$row_ncc['id']) $selected_ncc="selected";
                                                    }
                                                    echo "<option value='".$row_ncc['id']."' ".$selected_ncc.">".$row_ncc['ncc_ten']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php if(isset($error_ncc)) echo $error_ncc; ?>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <select name="loai" class="form-control">
                                        <option value="0">Lựa chọn loại sản phẩm</option>
                                        <?php
                                            $sql_loai="SELECT * FROM loai_hang";
                                            $result_loai=$conn->query($sql_loai);
                                            if($result_loai->num_rows>0){
                                                while ($row_loai=$result_loai->fetch_array()) {
                                                    $selected_loai='';
                                                    if(isset($row_sp['loai_id'])){
                                                        if($row_sp['loai_id']==$row_loai['id']) $selected_loai=" selected";
                                                    }
                                                    echo "<option value='".$row_loai['id']."' ".$selected_loai.">".$row_loai['loai_hang_ten']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php if(isset($error_loai)) echo $error_loai; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="mota" class="form-control"><?php if(isset($_POST['mota'])) echo $_POST['mota']; else echo $row_sp['sp_mo_ta'];?></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('mota');
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Lưu sửa đổi</button>
                                     <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
                                     <a onclick="alert('Bạn có chắc chắn hủy thao tác');" href="./index.php?page_layout=ds_sanpham"  class="btn btn-default">Hủy</a>
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