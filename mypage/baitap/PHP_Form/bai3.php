<?php
  if(isset($_POST['submit'])){
    $chuho = $_POST['chuho'];
    $socu = $_POST['socu'];
    $somoi = $_POST['somoi'];
    $dongia = $_POST['dongia'];

    if ($somoi >= $socu) {
      $tien = ($somoi - $socu) * $dongia;
    } else {
      $err = 'Chỉ số mới phải lớn hơn chỉ số cũ';
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
        <th scope="col" colspan="2" style="text-transform: uppercase;">Thanh toán tiền điện</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Tên chủ hộ</td>
        <td><input type="text" name="chuho" required value="<?php if(isset($chuho)) echo $chuho ?>"></td>
      </tr>
      <tr>
        <td>Chỉ số cũ</td>
        <td><input type="number" required name="socu" value="<?php echo $socu ?>"></td>
      </tr>
      <tr>
        <td>Chỉ số mới</td>
        <td><input type="number" name="somoi" value="<?php if(isset($somoi)) echo $somoi ?>"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="number" name="dongia" value="<?php if(isset($dongia)) echo $dongia ?>"></td>
      </tr>
      <tr>
        <td>Số tiền thanh toán</td>
        <td><input type="text" disabled="disabled" value="<?php if(isset($tien))  echo $tien ?>"/></td>
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
  
