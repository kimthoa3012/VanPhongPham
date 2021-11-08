<?php
	if(isset($_SESSION['khach_hang'])){
        $dh_id = $_GET['dh_id'];
        $sql="select dh.*, kh.kh_hoten, tt.tinh_trang_ten from don_hang dh join khach_hang kh on dh.kh_id=kh.id join tinh_trang_dh tt on dh.tinh_trang_id=tt.id WHERE dh.id=$dh_id";
        $result=$conn->query($sql);
        $row = $result->fetch_array();
        $tongtien=$row['dh_tong_tien'];

	}else{
		header("location: ./taikhoan/dangnhap.php");
	}

?>
<div class="row">
    <div class="col-md">
        <h4 style="font-weight: bold;">Thông tin đơn hàng đơn hàng</h4>
        <br/>
        <dl class="row">
          <dt class="col-sm-5">Tên người nhận</dt>
          <dd class="col-sm-7"><?php echo $row['dh_ten_nguoi_nhan']?></dd>

          <dt class="col-sm-5">Email</dt>
          <dd class="col-sm-7"><?php echo $row['dh_email']?></dd>

          <dt class="col-sm-5">SĐT</dt>
          <dd class="col-sm-7"><?php echo $row['dh_sdt']?></dd>

          <dt class="col-sm-5">Địa chỉ</dt>
          <dd class="col-sm-7"><?php echo $row['dh_dia_chi']?></dd>

          <dt class="col-sm-5">Hình thức thanh toán</dt>
          <dd class="col-sm-7"><?php echo $row['dh_hinh_thuc_tt']?></dd>

          <dt class="col-sm-5">Ngày tạo</dt>
          <dd class="col-sm-7"><?php echo $row['dh_ngay_tao']?></dd>

          <dt class="col-sm-5">Tình trạng</dt>
          <dd class="col-sm-7"><?php echo $row['tinh_trang_ten']?></dd>

          <dt class="col-sm-5">Ghi chú</dt>
          <dd class="col-sm-7"><?php echo $row['dh_ghi_chu']?></dd>
        </dl>
        <a href="./index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk">Quay lại</a>
    </div>
	<div class="col-md">
		<h4 style="font-weight: bold;"></h4>
        <br/>
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