<?php
    function submit_name(){
        if(isset($_GET['loai_id']))
            return 'edit';
        return 'add';
    }

    function submit_title(){
        if(isset($_GET['loai_id']))
            return 'Lưu thay đổi';
        return 'Thêm mới';
    }

    if(isset($_POST['add'])){
        $ten=$_POST['loai_hang_ten'];
        $sql_them="INSERT INTO loai_hang(loai_hang_ten) VALUES ('$ten')";
        $result_them=$conn->query($sql_them);
        if($result_them){
            header("location: index.php?page_layout=ds_loaiSP");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Thêm không thành công !</h4>";
        }
    }

    if(isset($_GET['loai_id'])){
        $loai_id = $_GET['loai_id'];
        $sql="SELECT * FROM loai_hang WHERE id='$loai_id'";
        $result=$conn->query($sql);
        $row = $result->fetch_array();
        $ten=$row["loai_hang_ten"];
    }

    if(isset($_POST['edit'])){
        $ten=$_POST['loai_hang_ten'];
        $sql_sua="UPDATE loai_hang SET loai_hang_ten='"."$ten"."' WHERE id=".$row['id'];
        echo "<div style='color: white;'>".$sql_sua."</div>";
        $result_sua=$conn->query($sql_sua);
        if($result_sua){
            header("location: index.php?page_layout=ds_loaiSP");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Sửa không thành công !</h4>";
        }
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <style type="text/css">
        th{
            text-align: center;
        }
    </style>
    <script type="text/javascript">
    function reset_btn(){
        if(document.frmloai_them.loai_hang_ten.value != ''){

            document.frmloai_them.loai_hang_ten.value='';
        }
    }
</script>
</head>

<body>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                DANH MỤC LOẠI SẢN PHẨM
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý sản phẩm</a></li>
                  <li class="active">Danh mục loại sản phẩm</li>
            </ol> 
                                    
        </div>
        
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục loại sản phẩm</div>
                        </div>
                        <div class="panel-body">
                            <form name="frmloai_them" class="form-horizontal" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tên loại sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Tên loại sản phẩm" name="loai_hang_ten" value="<?php if(isset($ten)) echo $ten;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="<?php echo submit_name(); ?>" class="btn btn-primary"><?php echo submit_title(); ?></button>
                                    </div>
                                </div>
                            </form>
                            <button onclick="reset_btn();" class="btn btn-default">Làm mới</button>
                            <a onclick="alert('Bạn có chắc chắn hủy thao tác');" href="./index.php?page_layout=ds_loaiSP"  class="btn btn-default">Hủy</a>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Mã loại sản phẩm</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="select * from loai_hang";
                                            $result = $conn->query($sql);
                                            if($result->num_rows >0){
                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["id"];?></td>
                                            <td>
                                                <a href="index.php?page_layout=loaiSP_sua&loai_id=<?php echo $row['id']; ?>"><?php echo $row["loai_hang_ten"];?></a>
                                            </td>
                                            <td class="center" align="center">
                                                <a href="index.php?page_layout=ds_loaiSP&loai_id=<?php echo $row['id']; ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                            </td>
                                            <td class='center' align='center'>
                                                <a onclick="confirm('Bạn có chắc chắn muốn xóa danh mục này không?');" href="loaiSP_xoa.php?loai_id=<?php echo $row['id']; ?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
    </div>
             <!-- /. PAGE INNER  -->
    <!-- /. WRAPPER  -->
</body>

</html>