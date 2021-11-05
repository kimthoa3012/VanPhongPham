
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
    <div id="page-wrapper" >
        <div class="header"> 
            <h1 class="page-header">
                DANH MỤC SẢN PHẨM
            </h1>
            <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Quản lý sản phẩm</a></li>
                  <li class="active">Danh mục sản phẩm</li>
            </ol> 
                                    
        </div>

            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Danh mục sản phẩm</div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Mã</th>
                                            <th>Ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="select * from san_pham";
                                            $result = $conn->query($sql);
                                            if($result->num_rows >0){
                                                while ($row = $result->fetch_array()){
                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $row["id"];?></td>
                                            <td><img src="../image/<?php echo $row['sp_anh'];?>" width="80px"></td>
                                            <td><a href="index.php?page_layout=sanpham_sua&sanpham_id=<?php echo $row['id']; ?>"><?php echo $row["sp_ten"];?></a></td>
                                            <td><?php echo $row["sp_so_luong"];?></td>
                                            <td><?php echo $row["sp_gia"];?></td>
                                            <td class="center" align="center">
                                                <a href="index.php?page_layout=sanpham_sua&sanpham_id=<?php echo $row['id']; ?>"><i class='fa fa-pencil' aria-hidden='true'></i></a>
                                            </td>
                                            <td class='center' align='center'>
                                                <a onclick="confirm('Bạn có chắc chắn xóa');" href="sanpham_xoa.php?sanpham_id=<?php echo $row['id']; ?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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
                    <a class="btn btn-primary" href="index.php?page_layout=sanpham_them">Thêm mới</a>
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
    <!-- /. WRAPPER  -->
</body>

</html>