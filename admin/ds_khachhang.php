
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    </script>
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
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                Danh mục khách hàng
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý khách hàng</a></li>
                  <li class="active">Danh mục khách hàng</li>
            </ol> 
                                    
        </div>
        
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục khách hàng</div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Mã khách hàng</th>
                                            <th>Họ tên</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Địa chỉ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="select * from khach_hang";
                                            $result = $conn->query($sql);
                                            if($result->num_rows >0){
                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["id"];?></td>
                                            <td><?php echo $row["kh_hoten"];?></td>
                                            <td><?php echo $row["kh_ngay_sinh"];?></td>
                                            <td><?php echo $row["kh_gioi_tinh"]==1 ? 'Nam' : 'Nữ';?></td>
                                            <td><?php echo $row["kh_email"];?></td>
                                            <td><?php echo $row["kh_sdt"];?></td>
                                            <td><?php echo $row["kh_dia_chi"];?></td>
                                            <td class="center" align="center">
                                                <a href="index.php?page_layout=khachhang_sua&khachhang_id=<?php echo $row['id']; ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                            </td>
                                            <td class='center' align='center'>
                                                <a onclick="confirm('Bạn có chắc chắn muốn xóa danh mục này không?');" href="khachhang_xoa.php?khachhang_id=<?php echo $row['id']; ?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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
                    <!--End Advanced Tables -->
                    <a class="btn btn-primary" href="index.php?page_layout=khachhang_them">Thêm mới</a>
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
    </div>
             <!-- /. PAGE INNER  -->
    <!-- /. WRAPPER  -->
</body>

</html>