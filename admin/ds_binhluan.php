
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
</head>

<body>
<?php
    $sql="select bl.*, kh.kh_hoten, sp.sp_ten from binh_luan bl join san_pham sp on bl.sp_id=sp.id join khach_hang kh on kh.id=bl.kh_id";
                                            $result = $conn->query($sql);
                                            if($result){
?>
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Danh mục bình luận
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý bình luận</a></li>
            </ol> 
                                    
        </div>
        
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục Bình luận</div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Bình luận</th>
                                            <th>Ngày tạo</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["kh_hoten"];?></td>
                                            <td><?php echo $row["sp_ten"];?></td>
                                            <td><?php echo $row["binh_luan_noi_dung"];?></td>
                                            <td><?php echo $row["binh_luan_ngay"];?></td>
                                            <td class='center' align='center'>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?');" href="binhluan_xoa.php?bl_id=<?php echo $row['id'];?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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