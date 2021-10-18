
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
                             Loại sản phẩm
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
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result)){
                                                while ($row = mysqli_fetch_array($result)){
                                                    echo"<tr class='odd gradeX'>";
                                                    echo"<td>".$row["id"]."</td>";
                                                    echo"<td>".$row["loai_hang_ten"]."</td>";
                                                    echo"<td class='center'><i class='fa fa-pencil' aria-hidden='true'></i></td>";
                                                    echo"<td class='center'><i class='fa fa-trash' aria-hidden='true'></i></td>";
                                                    echo"</tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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