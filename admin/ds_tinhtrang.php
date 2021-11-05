<?php
    function submit_name(){
        if(isset($_GET['tt_id']))
            return 'edit';
        return 'add';
    }

    function submit_title(){
        if(isset($_GET['tt_id']))
            return 'Lưu thay đổi';
        return 'Thêm mới';
    }

    if(isset($_POST['add'])){
        $ten=$_POST['tinh_trang_ten'];
        $sql_them="INSERT INTO tinh_trang_dh(tinh_trang_ten) VALUES ('$ten')";
        $result_them=$conn->query($sql_them);
        if($result_them){
            header("location: index.php?page_layout=ds_tinhtrang");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Thêm không thành công !</h4>";
        }
    }

    if(isset($_GET['tt_id'])){
        $tt_id = $_GET['tt_id'];
        $sql="SELECT * FROM tinh_trang_dh WHERE id='$tt_id'";
        $result=$conn->query($sql);
        $row = $result->fetch_array();
        $ten=$row["tinh_trang_ten"];
    }

    if(isset($_POST['edit'])){
        $ten=$_POST['tinh_trang_ten'];
        $sql_sua="UPDATE tinh_trang_dh SET tinh_trang_ten='"."$ten"."' WHERE id=".$row['id'];
        echo "<div style='color: white;'>".$sql_sua."</div>";
        $result_sua=$conn->query($sql_sua);
        if($result_sua){
            header("location: index.php?page_layout=ds_tinhtrang");
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
        if(document.frmloai_them.tinh_trang_ten.value != ''){

            document.frmloai_them.tinh_trang_ten.value='';
        }
    }
</script>
</head>

<body>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                DANH MỤC TÌNH TRẠNG
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý đơn hang</a></li>
                  <li class="active">Tình trạng đơn hàng</li>
            </ol> 
                                    
        </div>
        
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục tình trạng</div>
                        </div>
                        <div class="panel-body">
                            <form name="frmloai_them" class="form-horizontal" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tên tình trạng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Tên loại tình trạng" name="tinh_trang_ten" value="<?php if(isset($ten)) echo $ten;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="<?php echo submit_name(); ?>" class="btn btn-primary"><?php echo submit_title(); ?></button>
                                    </div>
                                </div>
                            </form>
                            <button onclick="reset_btn();" class="btn btn-default">Làm mới</button>
                            <a onclick="alert('Bạn có chắc chắn hủy thao tác');" href="./index.php?page_layout=ds_tinhtrang"  class="btn btn-default">Hủy</a>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Mã tình trạng</th>
                                            <th>Tên tình trạng</th>
                                            <th>Mô tả</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="select * from tinh_trang_dh";
                                            $result = $conn->query($sql);
                                            if($result->num_rows >0){
                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["id"];?></td>
                                            <td>
                                                <a href="index.php?page_layout=ds_tinhtrang&tt_id=<?php echo $row['id']; ?>"><?php echo $row["tinh_trang_ten"];?></a>
                                            </td>
                                            <td><?php echo $row["tinh_trang_mo_ta"];?></td>
                                            <td class="center" align="center">
                                                <a href="index.php?page_layout=ds_tinhtrang&tt_id=<?php echo $row['id']; ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                            </td>
                                            <td class='center' align='center'>
                                                <a onclick="confirm('Bạn có chắc chắn muốn xóa danh mục này không?');" href="tinhtrang_xoa.php?tt_id=<?php echo $row['id']; ?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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