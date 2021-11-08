<?php
function kiemtra($a, $b, $pt){

  if(is_numeric($a)&&is_numeric($b))
  {
    if($pt=='chia'){
      if($b == 0){
        echo "<script> alert('Lỗi chia cho 0');
          location.href = 'javascript:window.history.back(-1)';
        </script>";
        return False;
      }
    }
    return true;
  }
  echo "<script> alert('Dữ liệu đầu vào phải là số');
      location.href = 'javascript:window.history.back(-1)';
  </script>";
  return False;
}
if(isset($_POST['submit'])){
  $so1 = $_POST['so1'];
  $so2 = $_POST['so2'];
  $pheptinh = isset($_POST['pheptinh'])?$_POST['pheptinh']:NULL;
  if (kiemtra($so1, $so2, $pheptinh)){
    switch($pheptinh) {
      case "cong":
        $kq = $so1 + $so2;
        $ptStr = 'Cộng';
        break;
      case "tru":
        $kq = $so1 - $so2; 
        $ptStr = 'Trừ'; 
        break;
      case "nhan":
        $kq = $so1 * $so2; 
        $ptStr = 'Nhân'; 
        break;
      case "chia":
        $kq = $so1 / $so2;
        $ptStr = 'Chia';
        break;
      default: $err = "Phép tính không hợp lệ"; $kq=" "; break;
    }
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <div class="">
  <table class="borderless" align="center">
    <thead>
      <tr>
        <th scope="col" colspan="2">Phép tính trên 2 số</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Chọn phép tính:</td>
        <td><?php if(isset($ptStr)) echo $ptStr; ?></td>
      </tr>
      <tr>
        <td>Số 1</td>
        <td><input type="text" name="so1" value="<?php if(isset($so1)) echo $so1 ?>"></td>
      </tr>
      <tr>
        <td>Số 2</td>
        <td><input type="text" name="so2" value="<?php if(isset($so2)) echo $so2 ?>"></td>
      </tr>
      <tr>
        <td>Kết quả</td>
        <td><input type="text" name="so2" value="<?php if(isset($kq)) echo $kq ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <a href="javascript:window.history.back(-1);"><i>Quay lại trang trước</i></a>
        </td>
      </tr>
    </tbody>
  </table>
     <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
   
 </div>
</body>

</html>
