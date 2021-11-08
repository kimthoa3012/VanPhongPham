<?php
    $dh_id = $_GET['dh_id'];
    $sql="select dh.*, kh.kh_hoten, tt.tinh_trang_ten from don_hang dh join khach_hang kh on dh.kh_id=kh.id join tinh_trang_dh tt on dh.tinh_trang_id=tt.id WHERE dh.id=$dh_id";
    $result=$conn->query($sql);
    $row = $result->fetch_array();
    $tongtien=$row['dh_tong_tien'];

    if(isset($_POST['submit'])){
        $tinhtrang=$_POST['tinhtrang'];
        $sql2="UPDATE don_hang SET tinh_trang_id=$tinhtrang WHERE id=".$dh_id;
        $result=$conn->query($sql2);
        if($result){
            header("location: index.php?page_layout=ds_donhang");
        }else{
            $thongbao="<h4 style='color:#dc3545; text-align:center;'>Sửa không thành công !</h4>";
        }
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
              <li><a href="#">Đơn hàng</a></li>
              <li class="active">Sửa đơn hàng</li>
        </ol>                 
    </div>    
    <div id="page-inner">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Nhập thông tin đơn hàng</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên khách hàng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $row['kh_hoten']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên người nhận</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $row['dh_ten_nguoi_nhan']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['dh_email']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diachi" value="<?php echo $row['dh_dia_chi']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SDT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sdt" value="<?php echo $row['dh_sdt']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tình trạng</label>
                                <div class="col-sm-10">
                                    <select name="tinhtrang" class="form-control">
                                        <?php
                                            $sql_tt="SELECT * FROM tinh_trang_dh";
                                            $result_tt=$conn->query($sql_tt);
                                            if($result_tt->num_rows>0){
                                                while ($row_tt=$result_tt->fetch_array()) {
                                                    $selected_tt='';
                                                    if(isset($ncc)){
                                                        if($row_tt['id']==$row_tt['tinh_trang_id']) $selected_tt="selected";
                                                    }
                                                    echo "<option value='".$row_tt['id']."' ".$selected_tt.">".$row_tt['tinh_trang_ten']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày tạo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ngaytao" value="<?php echo $row['dh_ngay_tao']?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ghi chú</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ghichu" value="<?php echo $row['dh_ghi_chu']?>" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật trạng thái đơn hàng</button>
                                     <a onclick="return confirm('Mọi thao tác của bạn sẽ không được lưu');" href="./index.php?page_layout=ds_donhang">Quay lại danh sách</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if(isset($thongbao)) echo $thongbao;?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="title">Chi tiết đơn hàng</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Tên sản phẩm</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Thành tiền</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $sql_ct="select ct.*, sp.sp_ten, sp.sp_gia from ct_don_hang ct join san_pham sp on ct.san_pham_id=sp.id where ct.don_hang_id={$dh_id}";
                                $result_ct=$conn->query($sql_ct);
                                if($result_ct->num_rows>0){
                                    while($row_ct=$result_ct->fetch_array()){
                                        echo"<tr>";
                                        echo"<td>".$row_ct['sp_ten']."</td>";
                                        echo"<td>".$row_ct['chi_tiet_so_luong']."</td>";
                                        $thanhtien=$row_ct['chi_tiet_so_luong']*$row_ct['sp_gia'];
                                        echo"<td>".$thanhtien."</td>";
                                        echo"</tr>";
                                    }
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="font-weight: bold;">Tổng tiền</td>
                                    <td colspan="2"><?php echo $tongtien; ?> VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>