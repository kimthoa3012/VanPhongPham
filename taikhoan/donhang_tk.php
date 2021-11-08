<?php
	if(isset($_SESSION['khach_hang'])){
		$result_kh=$conn->query("SELECT id FROM khach_hang WHERE kh_email='{$_SESSION['khach_hang']['email']}'");
        $row_kh=$result_kh->fetch_array();
        $kh_id=$row_kh['id'];

	    $sql="select dh.*, kh.kh_hoten, tt.tinh_trang_ten from don_hang dh join khach_hang kh on dh.kh_id=kh.id join tinh_trang_dh tt on dh.tinh_trang_id=tt.id";
	    $result=$conn->query($sql);

	}else{
		header("location: ./taikhoan/dangnhap.php");
	}

    if(isset($_GET['dh_id'])){
        $dh_id=$_GET['dh_id'];
        $result_tt=$conn->query("select dh.*, tt.tinh_trang_ten from don_hang dh join tinh_trang_dh tt on dh.tinh_trang_id=tt.id WHERE dh.id=$dh_id");
        $row_tt=$result_tt->fetch_array();

        if($row_tt['tinh_trang_id']==1){
            $sql2="UPDATE don_hang SET tinh_trang_id=5 WHERE id=".$dh_id;
            $result=$conn->query($sql2);
            if($result){
                echo"
                    <script type='text/javascript'>
                        alert('Đã hủy đơn hàng');
                        location.href = './index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk';
                    </script>";
            }else{
                echo"
                    <script type='text/javascript'>
                        alert('Hủy đơn hàng thất bại');
                        location.href = './index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk';
                    </script>";
            }
        }else if($row_tt['tinh_trang_id']==5){
            echo"
                <script type='text/javascript'>
                    alert('Đơn hàng đã được hủy');
                    location.href = './index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk';
                </script>";
        }else{
            echo"
                <script type='text/javascript'>
                    alert('Đơn hàng đã được duyệt! Không hủy được');
                    location.href = './index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk';
                </script>";
        }

    }

?>
<div class="row justify-content-center align-items-center">
	<div class="col">
		<div class="product__discount">
			<div class="section-title product__discount__title">
			    <h2>Đơn hàng của bạn</h2>
			</div>
		    <div>
		    	<table class="table align-items-center">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>SDT</th>
                            <th>Tình Trạng</th>
                            <th>Tổng tiền</th>
                            <th>Chi tiết</th>
                            <th>Hủy</th>
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
                            <td><?php echo $row["dh_ten_nguoi_nhan"];?></td>
                            <td><?php echo $row["dh_sdt"];?></td>
                            <td><?php echo $row["tinh_trang_ten"];?></td>
                            <td><?php echo $row["dh_tong_tien"];?> VNĐ</td>
                            <td class="center" align="center">
                                <a href="./index.php?page_layout=taikhoan_chitiet&page_tk=donhang_info&dh_id=<?php echo $row['id']; ?>"><i class='fa fa-info' aria-hidden='true'></i></a>
                            </td>
                            <td class='center' align='center'>
                                <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?');" href="./index.php?page_layout=taikhoan_chitiet&page_tk=donhang_tk&dh_id=<?php echo $row['id']; ?>"><i class='fa fa-times-circle-o' aria-hidden='true'></i></a>
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