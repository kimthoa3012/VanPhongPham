<?php
  if(isset($_POST['submit'])){
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $diemchuan = $_POST['diemchuan'];

    if (is_numeric($toan)&&is_numeric($ly)&&is_numeric($hoa)&&is_numeric($diemchuan) && $toan > 0 && $ly > 0 && $hoa > 0 && $diemchuan>0) {
        $tongdiem = $toan + $ly + $hoa;
        if ($tongdiem >= $diemchuan) {
          $ketqua = 'Đậu';
        } else {
          $ketqua = 'Rớt';
        }
    }else{
      $err="Vui lòng nhập giá trị hợp lệ";
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
   <form  action="" method="post">
      <table class="borderless" align="center">
    <thead>
      <tr>
        <th scope="col" colspan="2">Kết quả thi đại học</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Toán</td>
        <td><input type="text" name="toan" required value="<?php if(isset($toan)) echo $toan ?>"></td>
      </tr>
      <tr>
        <td>Lý</td>
        <td><input type="text" name="ly" required value="<?php if(isset($ly)) echo $ly ?>"></td>
      </tr>
      <tr>
        <td>Hóa</td>
        <td><input type="text" name="hoa" required value="<?php if(isset($hoa)) echo $hoa ?>"></td>
      </tr>
      <tr>
        <td>Điểm chuẩn</td>
        <td><input type="text" required name="diemchuan" value="<?php if(isset($diemchuan)) echo $diemchuan ?>"></td>
      </tr>
      <tr>
        <td>Tổng điểm</td>
        <td><input type="text" name="tongdiem" disabled="disabled" value="<?php if(isset($tongdiem))  echo $tongdiem ?>"/></td>
      </tr>
      <tr>
        <td>Kết quả thi</td>
        <td><input type="text" name="ketqua" disabled="disabled" value="<?php if(isset($ketqua))  echo $ketqua ?>"/></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Tính" class="btn btn-success btn-sm"/></td>
      </tr>
    </tbody>
  </table>
     <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
   </form>
   
 </div>
</body>
</html>
