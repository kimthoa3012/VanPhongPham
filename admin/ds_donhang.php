
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    
    <script type="text/javascript">
        function xoa_dm(){
            var conf=confirm("Bạn có chắc chắn muốn xóa danh mục này không?");
            return conf;
        }
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
                Danh mục nhà cung cấp
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý đơn hàng</a></li>
                  <li class="active">Danh mục đơn hàng</li>
            </ol> 
                                    
        </div>
        
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục Đơn hàng</div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Tên tài khoản</th>
                                            <th>Tên người nhận</th>
                                            <th>SDT</th>
                                            <th>Tình Trạng</th>
                                            <th>Tổng tiền</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="select dh.*, kh.kh_hoten, tt.tinh_trang_ten from don_hang dh join khach_hang kh on dh.kh_id=kh.id join tinh_trang_dh tt on dh.tinh_trang_id=tt.id";
                                            $result = $conn->query($sql);
                                            if($result->num_rows >0){
                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["kh_hoten"];?></td>
                                            <td><?php echo $row["dh_ten_nguoi_nhan"];?></td>
                                            <td><?php echo $row["dh_sdt"];?></td>
                                            <td><?php echo $row["tinh_trang_ten"];?></td>
                                            <td><?php echo $row["dh_tong_tien"];?></td>
                                            <td class="center" align="center">
                                                <a href="index.php?page_layout=donhang_sua&dh_id=<?php echo $row['id']; ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                            </td>
                                            <td class='center' align='center'>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');" href="donhang_xoa.php?dh_id=<?php echo $row['id'];?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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